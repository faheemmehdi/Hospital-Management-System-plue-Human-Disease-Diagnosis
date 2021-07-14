<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Meeting extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('meeting_model');
        $this->load->model('appointment/appointment_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('patient/patient_model');
        $this->load->model('sms/sms_model');
        $this->load->module('sms');


        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Patient'))) {
            redirect('home/permission');
        }
    }

    public function index() { 
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('meeting', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function live() {
        $data = array();
        $live_id = $this->input->get('id');
        $meeting_id = $this->input->get('meeting_id');
        $live_details = $this->meeting_model->getMeetingById($live_id);
        $data['meeting_id'] = $live_details->meeting_id;
        $data['live_id'] = $live_details->id;
        $data['meeting_password'] = $live_details->meeting_password;
        $doctor_ion_id = $live_details->doctor_ion_id;
        $settings = $this->meeting_model->getMeetingSettingsById($doctor_ion_id);
        $data['api_key'] = $settings->api_key;
        $data['secret_key'] = $settings->secret_key;

        if ($meeting_id == $live_details->meeting_id) {
            $this->load->view('live', $data);
        } else {
            $this->session->set_flashdata('feedback', lang('invaid_meeting_id'));
            redirect('meeting/upcoming');
        }
    }

    function jitsiLive() {
        $appointment_id = $this->input->get('id');
        $data['appointmentid'] = $appointment_id;
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('jitsi', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function jitsi() {
        $appointment_id = $this->input->get('id');
        $appointment_details = $this->appointment_model->getAppointmentById($appointment_id);
        $patient = $appointment_details->patient;
        $doctor = $appointment_details->doctor;
        $start_date = date('Y-m-d H:i');

        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor_details = $this->doctor_model->getDoctorByIonUserId($doctor_ion_id);
            $doctor_id = $doctor_details->id;
            if ($doctor_id != $doctor) {
                $this->session->set_flashdata('feedback', lang('you_do_not_have_permission_to_initiate_this_live_meeting'));
                redirect('appointment');
            }
        } elseif ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient_details = $this->patient_model->getPatientByIonUserId($patient_ion_id);
            $patient_id = $patient_details->id;
            if ($patient_id != $patient) {
                $this->session->set_flashdata('feedback', lang('you_do_not_have_permission_to_initiate_this_live_meeting'));
                redirect('appointment');
            }
        }
        $this->sendSmsDuringMeeting($patient, $doctor, $start_date, $appointment_details);
        redirect('meeting/jitsiLive?id=' . $appointment_id);
    }

    function instantLive() {
        $appointment_id = $this->input->get('id');
        if ($this->settings->live_appointment_type == 'jitsi') {
            redirect('meeting/jitsi?id=' . $appointment_id);
        }
        if ($this->ion_auth->in_group(array('Patient'))) {
            $meeting = $this->meeting_model->getMeetingByAppointmentId($appointment_id);
            if (!empty($meeting)) {
                $status = $this->getMeetingsByMeetingId($meeting->meeting_id);
                if ($status->status == 'started') {
                    redirect('meeting/live?id=' . $meeting->id . '&meeting_id=' . $meeting->meeting_id);
                } else {
                    $this->session->set_flashdata('feedback', lang('error'));
                    redirect('appointment/myTodays');
                }
            } else {
                $this->session->set_flashdata('feedback', lang('error'));
                redirect('appointment/myTodays');
            }
        }
        if (!$this->ion_auth->in_group(array('admin', 'Doctor'))) {
            redirect('home/permission');
        }
        $appointment_details = $this->appointment_model->getAppointmentById($appointment_id);
        $patient = $appointment_details->patient;
        $patient_details = $this->patient_model->getPatientById($patient);
        $patient_name = $patient_details->name;
        $patient_ion_id = $patient_details->ion_user_id;


        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor_details = $this->doctor_model->getDoctorByIonUserId($doctor_ion_id);
            $doctor = $doctor_details->id;
        } else {
            $doctor = $appointment_details->doctor;
            $doctor_details = $this->doctor_model->getDoctorById($doctor);
            $doctor_ion_id = $doctor_details->ion_user_id;
        }

        $doctorname = $doctor_details->name;

        if ($this->ion_auth->in_group(array('Doctor'))) {
            if ($doctor != $appointment_details->doctor) {
                redirect('home/permission');
            }
        }

        $topic = lang('live') . ' ' . lang('appoitment');
        $start_date = date('Y-m-d H:i');
        $data = array(
            'appointment_id' => $appointment_id,
            'patient' => $patient,
            'patientname' => $patient_name,
            'patient_ion_id' => $patient_ion_id,
            'doctor' => $doctor,
            'doctorname' => $doctorname,
            'doctor_ion_id' => $doctor_ion_id,
            'topic' => lang('doctor') . ' ' . lang('appointment'),
            'type' => 2,
            'start_time' => $start_date,
            'timezone' => 'UTC',
            'duration' => 60,
            'meeting_password' => '12345',
            'add_date' => date('m/d/y'),
            'registration_time' => time(),
            'user' => $this->ion_auth->get_user_id(),
        );

        $response = $this->createAMeeting($data, NULL);

        if (!empty($response->id)) {
            $data1 = array('meeting_id' => $response->id);
            $data2 = array_merge($data, $data1);
            $this->meeting_model->insertMeeting($data2);
            $live_id = $this->db->insert_id();
            $this->sendSmsDuringMeeting($patient, $doctor, $start_date);
            redirect('meeting/live?id=' . $live_id . '&meeting_id=' . $response->id);
        } else {
            $this->session->set_flashdata('feedback', lang('error'));
            redirect('appointment');
        }
    }

//API Requests Starts
    public function getMeetingsByMeetingId($meeting_id) {
        $start_time = NULL;
        $data = array();
        $doctor_ion_id = $this->meeting_model->getMeetingByZoomMeetingId($meeting_id)->doctor_ion_id;
        $data['doctor_ion_id'] = $doctor_ion_id;
        $data['start_time'] = $start_time;
        $request_url = 'https://api.zoom.us/v2/meetings/' . $meeting_id;
        $response = $this->sendGetMeetingsRequest($data, $request_url);
        return $response;
    }

    public function createAMeeting($data = array(), $meeting_id) {
        $start_time = $data['start_time'];
        $createAMeetingArray = array();
        $createAMeetingArray['doctor_ion_id'] = $data['doctor_ion_id'];
        $createAMeetingArray['topic'] = $data['topic'];
        $createAMeetingArray['agenda'] = !empty($data['agenda']) ? $data['agenda'] : "";
        $createAMeetingArray['type'] = !empty($data['type']) ? $data['type'] : 2; //Scheduled
        $createAMeetingArray['start_time'] = $start_time;
        $createAMeetingArray['timezone'] = $data['timezone'];
        $createAMeetingArray['password'] = !empty($data['meeting_password']) ? $data['meeting_password'] : "";
        $createAMeetingArray['duration'] = !empty($data['duration']) ? $data['duration'] : 60;
        $createAMeetingArray['settings'] = array(
            'join_before_host' => !empty($data['join_before_host']) ? true : false,
            'host_video' => !empty($data['option_host_video']) ? true : true,
            'participant_video' => !empty($data['option_participants_video']) ? true : true,
            'auto_recording' => !empty($data['option_auto_recording']) ? $data['option_auto_recording'] : "none",
        );
        if (!empty($meeting_id)) {
            $request_url = 'https://api.zoom.us/v2/meetings/' . $meeting_id;
            return $this->sendUpdateRequest($createAMeetingArray, $request_url);
        } else {
            $request_url = 'https://api.zoom.us/v2/users/me/meetings';
            return $this->sendCreateRequest($createAMeetingArray, $request_url);
        }
    }

    public function deleteMeeting($meeting_id) {
        $start_time = NULL;
        $data = array();
        $doctor_ion_id = $this->meeting_model->getMeetingByZoomMeetingId($meeting_id)->doctor_ion_id;
        $data['doctor_ion_id'] = $doctor_ion_id;
        $data['start_time'] = $start_time;
        $request_url = 'https://api.zoom.us/v2/meetings/' . $meeting_id;
        return $this->sendDeleteRequest($data, $request_url);
    }

    protected function sendGetMeetingsRequest($data = array(), $request_url) {
        $jwt = $this->generateJWT($data);
        $headers = array(
            "authorization: Bearer" . $jwt,
            'content-type: application/json'
        );
        $postFields = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if (!$response) {
            return $err;
        }
        return json_decode($response);
    }

    protected function sendCreateRequest($data = array(), $request_url) {
        $jwt = $this->generateJWT($data);
        $headers = array(
            "authorization: Bearer" . $jwt,
            'content-type: application/json'
        );
        $postFields = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if (!$response) {
            return $err;
        }
        return json_decode($response);
    }

    protected function sendUpdateRequest($data = array(), $request_url) {
        $jwt = $this->generateJWT($data);
        $headers = array(
            "authorization: Bearer" . $jwt,
            'content-type: application/json'
        );
        $postFields = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if (!$response) {
            return $err;
        }
        return json_decode($response);
    }

    protected function sendDeleterequest($data = array(), $request_url) {
        $jwt = $this->generateJWT($data);
        $headers = array(
            "authorization: Bearer" . $jwt,
            'content-type: application/json'
        );
        $postFields = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if (!$response) {
            return $err;
        }
        return json_decode($response);
    }

    function generateJWT($data = array()) {
        $settings = $this->meeting_model->getMeetingSettingsById($data['doctor_ion_id']);
        $api_key = $settings->api_key;
        $api_secret = $settings->secret_key;
        if (!empty($data['start_time'])) {
            $start_time = strtotime($data['start_time']);
        } else {
            $start_time = time();
        }
        $exp = $start_time + 3600;
        // Create token header as a JSON string
        $header = json_encode(['alg' => 'HS256', 'typ' => 'JWT']);
        // Create token payload as a JSON string
        $payload = json_encode(['iss' => $api_key, 'exp' => $exp]);
        // Encode Header to Base64Url String
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
        // Encode Payload to Base64Url String
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
        // Create Signature Hash
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $api_secret, true);
        // Encode Signature to Base64Url String
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        // Create JWT
        $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
        return $jwt;
    }

    function settings() {

        if (!$this->ion_auth->in_group(array('Doctor'))) {
            redirect('home/permission');
        }


        $id = $this->input->post('id');

        if (empty($id)) {
            $settings = $this->meeting_model->getMeetingSettingsById($this->ion_auth->get_user_id());
            if (!empty($settings)) {
                $id = $settings->id;
            }
        }

        $api_key = $this->input->post('api_key');
        $api_secret = $this->input->post('api_secret');

        $this->form_validation->set_rules('api_key', 'Api Key', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating SMS Field
        $this->form_validation->set_rules('api_secret', 'Api Secret', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating SMS Field

        if ($this->form_validation->run() == FALSE) {
            $data['settings'] = $this->meeting_model->getMeetingSettingsById($this->ion_auth->get_user_id());
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('settings', $data);
            $this->load->view('home/footer'); // just the footer file
        } else {
            $data = array();
            $data = array(
                'api_key' => $api_key,
                'secret_key' => $api_secret,
            );
            if (empty($id)) {
                $this->meeting_model->addMeetingSettings($data);
                $this->session->set_flashdata('feedback', lang('added'));
            } else {
                $this->meeting_model->updateMeetingSettings($id, $data);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            if ($this->ion_auth->in_group('Doctor')) {
                $data['settings'] = $this->meeting_model->getMeetingSettingsById($this->ion_auth->get_user_id());
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('settings', $data);
                $this->load->view('home/footer'); // just the footer file
            }
        }
    }

// API Requests Ends




    public function request() {
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('meeting_request', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function todays() {
        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('todays', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function upcoming() {
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('upcoming', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function previous() {
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('previous', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function calendar() {
        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
            $data['meetings'] = $this->meeting_model->getMeetingByDoctor($doctor);
        } else {
            $data['meetings'] = $this->meeting_model->getMeeting();
        }
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('calendar', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNewView() {
        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }

        $id = $this->input->post('id');
        $patient = $this->input->post('patient');

        if (empty($id)) {
            if ($this->ion_auth->in_group('Doctor')) {
                $doctor_ion_id = $this->ion_auth->get_user_id();
                $doctor = $this->doctor_model->getDoctorByIonUserId($doctor_ion_id)->id;
            } else {
                $doctor = $this->input->post('doctor');
            }
        } else {
            $doctor = $this->meeting_model->getMeetingById($id)->doctor;
        }

        $topic = $this->input->post('topic');
        $type = $this->input->post('type');
        $start_date = $this->input->post('start_time');
        $duration = $this->input->post('duration');

        if (empty($duration)) {
            $duration = 60;
        }

        $timezone = $this->input->post('timezone');

        $meeting_password = $this->input->post('meeting_password');
        if (empty($meeting_password)) {
            if (!empty($id)) {
                $meeting_password = $this->meeting_model->getMeetingById($id)->meeting_password;
            } else {
                $meeting_password = '12345';
            }
        }


        $remarks = $this->input->post('remarks');
        $redirect = $this->input->post('redirect');
        $user = $this->ion_auth->get_user_id();
        if ($this->ion_auth->in_group(array('Patient'))) {
            $user = '';
        }
        if ((empty($id))) {
            $add_date = date('m/d/y');
            $registration_time = time();
            $patient_add_date = $add_date;
            $patient_registration_time = $registration_time;
        } else {
            $add_date = $this->meeting_model->getMeetingById($id)->add_date;
            $registration_time = $this->meeting_model->getMeetingById($id)->registration_time;
        }

        //  $s_time_key = $this->getArrayKey($s_time);



        $p_name = $this->input->post('p_name');
        $p_email = $this->input->post('p_email');
        if (empty($p_email)) {
            $p_email = $p_name . '-' . rand(1, 1000) . '-' . $p_name . '-' . rand(1, 1000) . '@example.com';
        }
        if (!empty($p_name)) {
            $password = $p_name . '-' . rand(1, 100000000);
        }
        $p_phone = $this->input->post('p_phone');
        $p_age = $this->input->post('p_age');
        $p_gender = $this->input->post('p_gender');
        $patient_id = rand(10000, 1000000);





        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($patient == 'add_new') {
            $this->form_validation->set_rules('p_name', 'Patient Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            $this->form_validation->set_rules('p_phone', 'Patient Phone', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        }

        // Validating Name Field
        $this->form_validation->set_rules('patient', 'Patient', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        if (empty($id)) {
            // Validating Doctor Field
            if (!$this->ion_auth->in_group('Doctor')) {
                $this->form_validation->set_rules('doctor', 'Doctor', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            }
        }
        // Validating Topic Field
        $this->form_validation->set_rules('topic', 'Topic', 'trim|min_length[1]|max_length[100]|xss_clean');
        // Validating Type Field
        $this->form_validation->set_rules('type', 'Type', 'trim|min_length[1]|max_length[100]|xss_clean');
        // Validating Start Time Field
        $this->form_validation->set_rules('start_time', 'Start Time', 'trim|min_length[1]|max_length[100]|xss_clean');
        // Validating Time Zone Field
        $this->form_validation->set_rules('timezone', 'Time Zone', 'trim|min_length[1]|max_length[100]|xss_clean');
        // Validating Duration Field
        $this->form_validation->set_rules('duration', 'Duration', 'trim|min_length[1]|max_length[100]|xss_clean');
        // Validating Meeting Password Field
        $this->form_validation->set_rules('meeting_password', 'Meeting Pawssword', 'trim|min_length[1]|max_length[100]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect("meeting/editMeeting?id=$id");
            } else {
                $data['patients'] = $this->patient_model->getPatient();
                $data['doctors'] = $this->doctor_model->getDoctor();
                $data['settings'] = $this->settings_model->getSettings();
                $this->load->view('home/dashboard', $data); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the header file
            }
        } else {

            // Patient Registration
            if ($patient == 'add_new') {
                $data_p = array(
                    'patient_id' => $patient_id,
                    'name' => $p_name,
                    'email' => $p_email,
                    'phone' => $p_phone,
                    'sex' => $p_gender,
                    'age' => $p_age,
                    'add_date' => $patient_add_date,
                    'registration_time' => $patient_registration_time,
                    'how_added' => 'from_meeting'
                );
                $username = $this->input->post('p_name');
                // Adding New Patient
                if ($this->ion_auth->email_check($p_email)) {
                    $this->session->set_flashdata('feedback', lang('this_email_address_is_already_registered'));
                } else {
                    $dfg = 5;
                    $this->ion_auth->register($username, $password, $p_email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $p_email))->row()->id;
                    $this->patient_model->insertPatient($data_p);
                    $patient_user_id = $this->db->get_where('patient', array('email' => $p_email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->patient_model->updatePatient($patient_user_id, $id_info);
                }
                $patient = $patient_user_id;
                //    }
            }

            // patient Registration
            //$error = array('error' => $this->upload->display_errors());
            $patientname = $this->patient_model->getPatientById($patient)->name;
            $doctorname = $this->doctor_model->getDoctorById($doctor)->name;
            if ($this->ion_auth->in_group('Doctor')) {
                $doctor_ion_id = $this->ion_auth->get_user_id();
            } else {
                $doctor_ion_id = $this->doctor_model->getDoctorById($doctor)->ion_user_id;
            }
            $patient_ion_id = $this->patient_model->getPatientById($patient)->ion_user_id;
            $data = array();
            $data = array(
                'patient' => $patient,
                'patientname' => $patientname,
                'patient_ion_id' => $patient_ion_id,
                'doctor' => $doctor,
                'doctorname' => $doctorname,
                'doctor_ion_id' => $doctor_ion_id,
                'topic' => $topic,
                'type' => $type,
                'start_time' => $start_date,
                'timezone' => $timezone,
                'duration' => $duration,
                'meeting_password' => $meeting_password,
                'remarks' => $remarks,
                'add_date' => $add_date,
                'registration_time' => $registration_time,
                'user' => $user,
            );
            $username = $this->input->post('name');
            if (empty($id)) {     // Adding New Meeting
                $response = $this->createAMeeting($data, NULL);
                if (!empty($response->id)) {
                    $data1 = array('meeting_id' => $response->id);
                    $data2 = array_merge($data, $data1);
                    $this->meeting_model->insertMeeting($data2);
                    $this->sendSmsDuringMeeting($patient, $doctor, $start_date);
                    $this->session->set_flashdata('feedback', lang('added'));
                } else {
                    $this->session->set_flashdata('feedback', lang('error'));
                    redirect('meeting/addNewView');
                }
            } else { // Updating Meeting
                $meeting_details = $this->meeting_model->getMeetingById($id);
                $response = $this->createAMeeting($data, $meeting_details->meeting_id);
                if ($response == "") {
                    $this->meeting_model->updateMeeting($id, $data);
                    $this->sendSmsDuringMeeting($patient, $doctor, $start_date);
                    $this->session->set_flashdata('feedback', lang('updated'));
                } else {
                    $this->session->set_flashdata('feedback', lang('error'));
                    redirect('meeting/editMeeting?id=' . $id);
                }
            }
            // Loading View

            if (!empty($redirect)) {
                redirect($redirect);
            } else {
                redirect('meeting/upcoming');
            }
        }
    }

    function sendSmsDuringMeeting($patient, $doctor, $start_time, $appointment_details) {
        //sms
        $set['settings'] = $this->settings_model->getSettings();
        $patient_details = $this->patient_model->getPatientById($patient);
        $doctor_details = $this->doctor_model->getDoctorById($doctor);

        $autosms = $this->sms_model->getAutoSmsByType('meeting_creation');

        $autoemail = $this->email_model->getAutoEmailByType('meeting_creation');

        $message = $autosms->message;
        $to = $patient_details->phone;
        $name1 = explode(' ', $patient_details->name);
        if (!isset($name1[1])) {
            $name1[1] = null;
        }
        $data1 = array(
            'patient_name' => $patient_details->name,
            'doctor_name' => $doctor_details->name,
            'start_time' => $start_time,
            'hospital_name' => $set['settings']->system_vendor,
            'meeting_link' => $appointment_details->live_meeting_link
        );

        if ($autosms->status == 'Active') {
            $this->load->library('parser');
            $messageprint = $this->parser->parse_string($message, $data1);
            $data2[] = array($to => $messageprint);
            $this->sms->sendSms($to, $message, $data2);
        }
        //end
        //email
        // $autoemail = $this->email_model->getAutoEmailByType('payment');
        if ($autoemail->status == 'Active') {
            $emailSettings = $this->email_model->getEmailSettings();
            $message1 = $autoemail->message;
            $messageprint1 = $this->parser->parse_string($message1, $data1);
            $subject = lang('doctor') . ' ' . lang('appointment');
            $this->email->from($emailSettings->admin_email);
            $this->email->to($patient_details->email);
            $this->email->subject($subject);
            $this->email->message($messageprint1);
            $this->email->send();
        }

        //end
    }

    function getArrayKey($s_time) {
        $all_slot = array(
            0 => '12:00 AM',
            1 => '12:05 AM',
            2 => '12:10 AM',
            3 => '12:15 AM',
            4 => '12:20 AM',
            5 => '12:25 AM',
            6 => '12:30 AM',
            7 => '12:35 AM',
            8 => '12:40 PM',
            9 => '12:45 AM',
            10 => '12:50 AM',
            11 => '12:55 AM',
            12 => '01:00 AM',
            13 => '01:05 AM',
            14 => '01:10 AM',
            15 => '01:15 AM',
            16 => '01:20 AM',
            17 => '01:25 AM',
            18 => '01:30 AM',
            19 => '01:35 AM',
            20 => '01:40 AM',
            21 => '01:45 AM',
            22 => '01:50 AM',
            23 => '01:55 AM',
            24 => '02:00 AM',
            25 => '02:05 AM',
            26 => '02:10 AM',
            27 => '02:15 AM',
            28 => '02:20 AM',
            29 => '02:25 AM',
            30 => '02:30 AM',
            31 => '02:35 AM',
            32 => '02:40 AM',
            33 => '02:45 AM',
            34 => '02:50 AM',
            35 => '02:55 AM',
            36 => '03:00 AM',
            37 => '03:05 AM',
            38 => '03:10 AM',
            39 => '03:15 AM',
            40 => '03:20 AM',
            41 => '03:25 AM',
            42 => '03:30 AM',
            43 => '03:35 AM',
            44 => '03:40 AM',
            45 => '03:45 AM',
            46 => '03:50 AM',
            47 => '03:55 AM',
            48 => '04:00 AM',
            49 => '04:05 AM',
            50 => '04:10 AM',
            51 => '04:15 AM',
            52 => '04:20 AM',
            53 => '04:25 AM',
            54 => '04:30 AM',
            55 => '04:35 AM',
            56 => '04:40 AM',
            57 => '04:45 AM',
            58 => '04:50 AM',
            59 => '04:55 AM',
            60 => '05:00 AM',
            61 => '05:05 AM',
            62 => '05:10 AM',
            63 => '05:15 AM',
            64 => '05:20 AM',
            65 => '05:25 AM',
            66 => '05:30 AM',
            67 => '05:35 AM',
            68 => '05:40 AM',
            69 => '05:45 AM',
            70 => '05:50 AM',
            71 => '05:55 AM',
            72 => '06:00 AM',
            73 => '06:05 AM',
            74 => '06:10 AM',
            75 => '06:15 AM',
            76 => '06:20 AM',
            77 => '06:25 AM',
            78 => '06:30 AM',
            79 => '06:35 AM',
            80 => '06:40 AM',
            81 => '06:45 AM',
            82 => '06:50 AM',
            83 => '06:55 AM',
            84 => '07:00 AM',
            85 => '07:05 AM',
            86 => '07:10 AM',
            87 => '07:15 AM',
            88 => '07:20 AM',
            89 => '07:25 AM',
            90 => '07:30 AM',
            91 => '07:35 AM',
            92 => '07:40 AM',
            93 => '07:45 AM',
            94 => '07:50 AM',
            95 => '07:55 AM',
            96 => '08:00 AM',
            97 => '08:05 AM',
            98 => '08:10 AM',
            99 => '08:15 AM',
            100 => '08:20 AM',
            101 => '08:25 AM',
            102 => '08:30 AM',
            103 => '08:35 AM',
            104 => '08:40 AM',
            105 => '08:45 AM',
            106 => '08:50 AM',
            107 => '08:55 AM',
            108 => '09:00 AM',
            109 => '09:05 AM',
            110 => '09:10 AM',
            111 => '09:15 AM',
            112 => '09:20 AM',
            113 => '09:25 AM',
            114 => '09:30 AM',
            115 => '09:35 AM',
            116 => '09:40 AM',
            117 => '09:45 AM',
            118 => '09:50 AM',
            119 => '09:55 AM',
            120 => '10:00 AM',
            121 => '10:05 AM',
            122 => '10:10 AM',
            123 => '10:15 AM',
            124 => '10:20 AM',
            125 => '10:25 AM',
            126 => '10:30 AM',
            127 => '10:35 AM',
            128 => '10:40 AM',
            129 => '10:45 AM',
            130 => '10:50 AM',
            131 => '10:55 AM',
            132 => '11:00 AM',
            133 => '11:05 AM',
            134 => '11:10 AM',
            135 => '11:15 AM',
            136 => '11:20 AM',
            137 => '11:25 AM',
            138 => '11:30 AM',
            139 => '11:35 AM',
            140 => '11:40 AM',
            141 => '11:45 AM',
            142 => '11:50 AM',
            143 => '11:55 AM',
            144 => '12:00 PM',
            145 => '12:05 PM',
            146 => '12:10 PM',
            147 => '12:15 PM',
            148 => '12:20 PM',
            149 => '12:25 PM',
            150 => '12:30 PM',
            151 => '12:35 PM',
            152 => '12:40 PM',
            153 => '12:45 PM',
            154 => '12:50 PM',
            155 => '12:55 PM',
            156 => '01:00 PM',
            157 => '01:05 PM',
            158 => '01:10 PM',
            159 => '01:15 PM',
            160 => '01:20 PM',
            161 => '01:25 PM',
            162 => '01:30 PM',
            163 => '01:35 PM',
            164 => '01:40 PM',
            165 => '01:45 PM',
            166 => '01:50 PM',
            167 => '01:55 PM',
            168 => '02:00 PM',
            169 => '02:05 PM',
            170 => '02:10 PM',
            171 => '02:15 PM',
            172 => '02:20 PM',
            173 => '02:25 PM',
            174 => '02:30 PM',
            175 => '02:35 PM',
            176 => '02:40 PM',
            177 => '02:45 PM',
            178 => '02:50 PM',
            179 => '02:55 PM',
            180 => '03:00 PM',
            181 => '03:05 PM',
            182 => '03:10 PM',
            183 => '03:15 PM',
            184 => '03:20 PM',
            185 => '03:25 PM',
            186 => '03:30 PM',
            187 => '03:35 PM',
            188 => '03:40 PM',
            189 => '03:45 PM',
            190 => '03:50 PM',
            191 => '03:55 PM',
            192 => '04:00 PM',
            193 => '04:05 PM',
            194 => '04:10 PM',
            195 => '04:15 PM',
            196 => '04:20 PM',
            197 => '04:25 PM',
            198 => '04:30 PM',
            199 => '04:35 PM',
            200 => '04:40 PM',
            201 => '04:45 PM',
            202 => '04:50 PM',
            203 => '04:55 PM',
            204 => '05:00 PM',
            205 => '05:05 PM',
            206 => '05:10 PM',
            207 => '05:15 PM',
            208 => '05:20 PM',
            209 => '05:25 PM',
            210 => '05:30 PM',
            211 => '05:35 PM',
            212 => '05:40 PM',
            213 => '05:45 PM',
            214 => '05:50 PM',
            215 => '05:55 PM',
            216 => '06:00 PM',
            217 => '06:05 PM',
            218 => '06:10 PM',
            219 => '06:15 PM',
            220 => '06:20 PM',
            221 => '06:25 PM',
            222 => '06:30 PM',
            223 => '06:35 PM',
            224 => '06:40 PM',
            225 => '06:45 PM',
            226 => '06:50 PM',
            227 => '06:55 PM',
            228 => '07:00 PM',
            229 => '07:05 PM',
            230 => '07:10 PM',
            231 => '07:15 PM',
            232 => '07:20 PM',
            233 => '07:25 PM',
            234 => '07:30 PM',
            235 => '07:35 PM',
            236 => '07:40 PM',
            237 => '07:45 PM',
            238 => '07:50 PM',
            239 => '07:55 PM',
            240 => '08:00 PM',
            241 => '08:05 PM',
            242 => '08:10 PM',
            243 => '08:15 PM',
            244 => '08:20 PM',
            245 => '08:25 PM',
            246 => '08:30 PM',
            247 => '08:35 PM',
            248 => '08:40 PM',
            249 => '08:45 PM',
            250 => '08:50 PM',
            251 => '08:55 PM',
            252 => '09:00 PM',
            253 => '09:05 PM',
            254 => '09:10 PM',
            255 => '09:15 PM',
            256 => '09:20 PM',
            257 => '09:25 PM',
            258 => '09:30 PM',
            259 => '09:35 PM',
            260 => '09:40 PM',
            261 => '09:45 PM',
            262 => '09:50 PM',
            263 => '09:55 PM',
            264 => '10:00 PM',
            265 => '10:05 PM',
            266 => '10:10 PM',
            267 => '10:15 PM',
            268 => '10:20 PM',
            269 => '10:25 PM',
            270 => '10:30 PM',
            271 => '10:35 PM',
            272 => '10:40 PM',
            273 => '10:45 PM',
            274 => '10:50 PM',
            275 => '10:55 PM',
            276 => '11:00 PM',
            277 => '11:05 PM',
            278 => '11:10 PM',
            279 => '11:15 PM',
            280 => '11:20 PM',
            281 => '11:25 PM',
            282 => '11:30 PM',
            283 => '11:35 PM',
            284 => '11:40 PM',
            285 => '11:45 PM',
            286 => '11:50 PM',
            287 => '11:55 PM',
        );

        $key = array_search($s_time, $all_slot);
        return $key;
    }

    function getMeetingByJasonByDoctor() {
        $id = $this->input->get('id');
        $query = $this->meeting_model->getMeetingByDoctor($id);
        $jsonevents = array();
        foreach ($query as $entry) {

            $doctor = $this->doctor_model->getDoctorById($entry->doctor);
            if (!empty($doctor)) {
                $doctor = $doctor->name;
            } else {
                $doctor = '';
            }
            $time_slot = $entry->time_slot;
            $time_slot_new = explode(' To ', $time_slot);
            $start_time = explode(' ', $time_slot_new[0]);
            $end_time = explode(' ', $time_slot_new[1]);

            if ($start_time[1] == 'AM') {
                $start_time_second = explode(':', $start_time[0]);
                $day_start_time_second = $start_time_second[0] * 60 * 60 + $start_time_second[1] * 60;
            } else {
                $start_time_second = explode(':', $start_time[0]);
                $day_start_time_second = 12 * 60 * 60 + $start_time_second[0] * 60 * 60 + $start_time_second[1] * 60;
            }

            if ($end_time[1] == 'AM') {
                $end_time_second = explode(':', $end_time[0]);
                $day_end_time_second = $end_time_second[0] * 60 * 60 + $end_time_second[1] * 60;
            } else {
                $end_time_second = explode(':', $end_time[0]);
                $day_end_time_second = 12 * 60 * 60 + $end_time_second[0] * 60 * 60 + $end_time_second[1] * 60;
            }

            $patient_details = $this->patient_model->getPatientById($entry->patient);

            if (!empty($patient_details)) {
                $patient_mobile = $patient_details->phone;
                $patient_name = $patient_details->name;
            } else {
                $patient_mobile = '';
                $patient_name = '';
            }

            $info = '<br/>' . lang('status') . ': ' . $entry->status . '<br>' . lang('patient') . ': ' . $patient_name . '<br/>' . lang('phone') . ': ' . $patient_mobile . '<br/> Doctor: ' . $doctor . '<br/>' . lang('remarks') . ': ' . $entry->remarks;
            if ($entry->status == 'Pending Confirmation') {
                //  $color = '#098098';
                $color = 'yellowgreen';
            }
            if ($entry->status == 'Confirmed') {
                $color = '#009988';
            }
            if ($entry->status == 'Treated') {
                $color = '#112233';
            }
            if ($entry->status == 'Cancelled') {
                $color = 'red';
            }

            $jsonevents[] = array(
                'id' => $entry->id,
                'title' => $info,
                'start' => date('Y-m-d H:i:s', $entry->date + $day_start_time_second),
                'end' => date('Y-m-d H:i:s', $entry->date + $day_end_time_second),
                'color' => $color,
            );
        }

        echo json_encode($jsonevents);

        //  echo json_encode($data);
    }

    function getMeetingByJason() {

        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }

        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
            $query = $this->meeting_model->getMeetingByDoctor($doctor);
        } elseif ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient = $this->db->get_where('patient', array('ion_user_id' => $patient_ion_id))->row()->id;
            $query = $this->meeting_model->getMeetingByPatient($patient);
        } else {
            $query = $this->meeting_model->getMeetingForCalendar();
        }
        $jsonevents = array();

        foreach ($query as $entry) {

            $doctor = $this->doctor_model->getDoctorById($entry->doctor);
            if (!empty($doctor)) {
                $doctor = $doctor->name;
            } else {
                $doctor = '';
            }
            $time_slot = $entry->time_slot;
            $time_slot_new = explode(' To ', $time_slot);
            $start_time = explode(' ', $time_slot_new[0]);
            $end_time = explode(' ', $time_slot_new[1]);

            if ($start_time[1] == 'AM') {
                $start_time_second = explode(':', $start_time[0]);
                $day_start_time_second = $start_time_second[0] * 60 * 60 + $start_time_second[1] * 60;
            } else {
                $start_time_second = explode(':', $start_time[0]);
                $day_start_time_second = 12 * 60 * 60 + $start_time_second[0] * 60 * 60 + $start_time_second[1] * 60;
            }

            if ($end_time[1] == 'AM') {
                $end_time_second = explode(':', $end_time[0]);
                $day_end_time_second = $end_time_second[0] * 60 * 60 + $end_time_second[1] * 60;
            } else {
                $end_time_second = explode(':', $end_time[0]);
                $day_end_time_second = 12 * 60 * 60 + $end_time_second[0] * 60 * 60 + $end_time_second[1] * 60;
            }

            $patient_details = $this->patient_model->getPatientById($entry->patient);

            if (!empty($patient_details)) {
                $patient_mobile = $patient_details->phone;
                $patient_name = $patient_details->name;
            } else {
                $patient_mobile = '';
                $patient_name = '';
            }

            $info = '<br/>' . lang('status') . ': ' . $entry->status . '<br>' . lang('patient') . ': ' . $patient_name . '<br/>' . lang('phone') . ': ' . $patient_mobile . '<br/> Doctor: ' . $doctor . '<br/>' . lang('remarks') . ': ' . $entry->remarks;
            if ($entry->status == 'Pending Confirmation') {
                //  $color = '#098098';
                $color = 'yellowgreen';
            }
            if ($entry->status == 'Confirmed') {
                $color = '#009988';
            }
            if ($entry->status == 'Treated') {
                $color = '#112233';
            }
            if ($entry->status == 'Cancelled') {
                $color = 'red';
            }

            $jsonevents[] = array(
                'id' => $entry->id,
                'title' => $info,
                'description' => 'Click to see the patient history',
                'start' => date('Y-m-d H:i:s', $entry->date + $day_start_time_second),
                'end' => date('Y-m-d H:i:s', $entry->date + $day_end_time_second),
                'color' => $color,
            );
        }

        echo json_encode($jsonevents);

        //  echo json_encode($data);
    }

    function getMeetingByDoctorId() {
        $id = $this->input->get('id');
        $data['doctor_id'] = $id;
        $data['meetings'] = $this->meeting_model->getMeeting();
        $data['patients'] = $this->patient_model->getPatient();
        $data['mmrdoctor'] = $this->doctor_model->getDoctorById($id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('meeting_by_doctor', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function editMeeting() {
        $data = array();
        $id = $this->input->get('id');

        $data['settings'] = $this->settings_model->getSettings();
        $data['meeting'] = $this->meeting_model->getMeetingById($id);
        $data['patients'] = $this->patient_model->getPatientById($data['meeting']->patient);
        $data['doctors'] = $this->doctor_model->getDoctorById($data['meeting']->doctor);
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the footer file 
    }

    function editMeetingByJason() {
        $id = $this->input->get('id');
        $data['meeting'] = $this->meeting_model->getMeetingById($id);
        $data['patient'] = $this->patient_model->getPatientById($data['meeting']->patient);
        $data['doctor'] = $this->doctor_model->getDoctorById($data['meeting']->doctor);
        echo json_encode($data);
    }

    function myMeetings() {
        $data['meetings'] = $this->meeting_model->getMeeting();
        $data['settings'] = $this->settings_model->getSettings();
        $user_id = $this->ion_auth->user()->row()->id;
        $data['user_id'] = $this->db->get_where('patient', array('ion_user_id' => $user_id))->row()->id;
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('mymeetings', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function delete() {
        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }
        $data = array();
        $id = $this->input->get('id');
        $meeting_details = $this->meeting_model->getMeetingById($id);
        $response = $this->deleteMeeting($meeting_details->meeting_id);
        if ($response != '') {
            if ($response->code == 3001) {
                $this->meeting_model->delete($id);
                $this->session->set_flashdata('feedback', lang('deleted'));
            } else {
                $this->session->set_flashdata('feedback', lang('can_not_be_deleted'));
            }
        } else {
            $this->meeting_model->delete($id);
            $this->session->set_flashdata('feedback', lang('deleted'));
        }
        $doctor_id = $this->input->get('doctor_id');
        if (!empty($doctor_id)) {
            redirect('meeting/getMeetingByDoctorId?id=' . $doctor_id);
        } else {
            redirect('meeting/upcoming');
        }
    }

    function getMeetingList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['meetings'] = $this->meeting_model->getMeetingBysearch($search);
            } else {
                $data['meetings'] = $this->meeting_model->getMeeting();
            }
        } else {
            if (!empty($search)) {
                $data['meetings'] = $this->meeting_model->getMeetingByLimitBySearch($limit, $start, $search);
            } else {
                $data['meetings'] = $this->meeting_model->getMeetingByLimit($limit, $start);
            }
        }




        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        foreach ($data['meetings'] as $meeting) {
            $status = $this->getMeetingsByMeetingId($meeting->meeting_id);
            if ($status->status == 'started') {
                $i = $i + 1;
                $option1 = '<a class="" href="meeting/editMeeting?id=' . $meeting->id . '"> ' . lang('edit') . '</i></a>';
                $option2 = '<a class="" href="meeting/delete?id=' . $meeting->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"> ' . lang('delete') . ' </a>';
                $option3 = '<a class="btn btn-info btn-xs btn_width green" href="meeting/live?id=' . $meeting->id . '&meeting_id=' . $meeting->meeting_id . '" target="_blank"><i class="fa fa-headphones"> </i> ' . lang('join_live') . ' </a>';
                $patientdetails = $this->patient_model->getPatientById($meeting->patient);
                if (!empty($patientdetails)) {
                    $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $meeting->patient . '"> ' . $patientdetails->name . '</a>';
                } else {
                    $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $meeting->patient . '"> ' . $meeting->patientname . '</a>';
                }
                $doctordetails = $this->doctor_model->getDoctorById($meeting->doctor);
                if (!empty($doctordetails)) {
                    $doctorname = $doctordetails->name;
                } else {
                    $doctorname = ' ';
                }

                if (empty($meeting->meeting_id)) {
                    $meeting_id = '';
                } else {
                    $meeting_id = $meeting->meeting_id;
                }

                if ($status->status == 'started') {
                    $status = '<span style="color: green;">Live</span>';
                } else {
                    $status = '<span style="color: gray;">Waiting</span>';
                }

                $new_option = '<br><br>' . $option1 . ' | ' . $option2;

                if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Patient'))) {
                    $new_option = '';
                }






                $info[] = array(
                    $meeting->topic . $new_option,
                    $patientname,
                    $doctorname,
                    $meeting_id,
                    $meeting->start_time,
                    $meeting->duration,
                    $status,
                    $option3
                );
            }
        }

        if ($i > 0) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('meeting')->num_rows(),
                "recordsFiltered" => $this->db->get('meeting')->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

    function getUpcomingMeetingList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['meetings'] = $this->meeting_model->getMeetingBysearch($search);
            } else {
                $data['meetings'] = $this->meeting_model->getMeeting();
            }
        } else {
            if (!empty($search)) {
                $data['meetings'] = $this->meeting_model->getMeetingByLimitBySearch($limit, $start, $search);
            } else {
                $data['meetings'] = $this->meeting_model->getMeetingByLimit($limit, $start);
            }
        }



        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        foreach ($data['meetings'] as $meeting) {

            if (strtotime($meeting->start_time) > time()) {

                $status = $this->getMeetingsByMeetingId($meeting->meeting_id);

                if ($status->status == 'started') {
                    $join_or_start = 'join_live';
                } else {
                    $join_or_start = 'start_live';
                }


                $i = $i + 1;

                $option1 = '<a class="" href="meeting/editMeeting?id=' . $meeting->id . '"> ' . lang('edit') . '</i></a>';

                $option2 = '<a class="" href="meeting/delete?id=' . $meeting->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"> ' . lang('delete') . ' </a>';

                $option3 = '<a class="btn btn-info btn-xs btn_width green" href="meeting/live?id=' . $meeting->id . '&meeting_id=' . $meeting->meeting_id . '" target="_blank"><i class="fa fa-headphones"> </i> ' . lang($join_or_start) . ' </a>';

                $patientdetails = $this->patient_model->getPatientById($meeting->patient);
                if (!empty($patientdetails)) {
                    $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $meeting->patient . '"> ' . $patientdetails->name . '</a>';
                } else {
                    $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $meeting->patient . '"> ' . $meeting->patientname . '</a>';
                }
                $doctordetails = $this->doctor_model->getDoctorById($meeting->doctor);
                if (!empty($doctordetails)) {
                    $doctorname = $doctordetails->name;
                } else {
                    $doctorname = $meeting->doctorname;
                }

                if (empty($meeting->meeting_id)) {
                    $meeting_id = '';
                } else {
                    $meeting_id = $meeting->meeting_id;
                }


                if ($status->status == 'started') {
                    $status = '<span style="color: green;">Live</span>';
                } else {
                    $status = '<span style="color: gray;">Waiting</span>';
                }

                $new_option = '<br><br>' . $option1 . ' | ' . $option2;

                if ($this->ion_auth->in_group('Patient')) {
                    $new_option = '';
                }



                $info[] = array(
                    $meeting->topic . $new_option,
                    $patientname,
                    $doctorname,
                    $meeting_id,
                    $meeting->start_time,
                    $meeting->duration,
                    $status,
                    $option3
                );
            }
        }

        if (!empty($data['meetings'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('meeting')->num_rows(),
                "recordsFiltered" => $this->db->get('meeting')->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

    function getPreviousMeetingList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['meetings'] = $this->meeting_model->getMeetingBysearch($search);
            } else {
                $data['meetings'] = $this->meeting_model->getMeeting();
            }
        } else {
            if (!empty($search)) {
                $data['meetings'] = $this->meeting_model->getMeetingByLimitBySearch($limit, $start, $search);
            } else {
                $data['meetings'] = $this->meeting_model->getMeetingByLimit($limit, $start);
            }
        }


        if ($this->ion_auth->in_group('Patient')) {
            $join_or_start = 'join_live';
        } else {
            $join_or_start = 'start_live';
        }


        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        foreach ($data['meetings'] as $meeting) {

            if (strtotime($meeting->start_time) < time()) {

                $i = $i + 1;

                $option1 = '<a class="" href="meeting/editMeeting?id=' . $meeting->id . '"> ' . lang('edit') . '</i></a>';

                $option2 = '<a class="" href="meeting/delete?id=' . $meeting->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"> ' . lang('delete') . ' </a>';

                $option3 = '<a class="btn btn-info btn-xs btn_width green" href="meeting/live?id=' . $meeting->id . '&meeting_id=' . $meeting->meeting_id . '" target="_blank"><i class="fa fa-headphones"> </i> ' . lang($join_or_start) . ' </a>';

                $patientdetails = $this->patient_model->getPatientById($meeting->patient);
                if (!empty($patientdetails)) {
                    $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $meeting->patient . '"> ' . $patientdetails->name . '</a>';
                } else {
                    $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $meeting->patient . '"> ' . $meeting->patientname . '</a>';
                }
                $doctordetails = $this->doctor_model->getDoctorById($meeting->doctor);
                if (!empty($doctordetails)) {
                    $doctorname = $doctordetails->name;
                } else {
                    $doctorname = $meeting->doctorname;
                }

                if (empty($meeting->meeting_id)) {
                    $meeting_id = '';
                } else {
                    $meeting_id = $meeting->meeting_id;
                }

                $status = $this->getMeetingsByMeetingId($meeting->meeting_id);

                if ($status->status == 'started') {
                    $status = '<span style="color: green;">Live</span>';
                } else {
                    $status = '<span style="color: gray;">Waiting</span>';
                }

                $new_option = '<br><br>' . $option1 . ' | ' . $option2;

                if ($this->ion_auth->in_group('Patient')) {
                    $new_option = '';
                }



                $info[] = array(
                    $meeting->topic . $new_option,
                    $patientname,
                    $doctorname,
                    $meeting_id,
                    $meeting->start_time,
                    $meeting->duration,
                    $status,
                    $option3
                );
            }
        }

        if ($i > 0) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('meeting')->num_rows(),
                "recordsFiltered" => $this->db->get('meeting')->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

}

/* End of file meeting.php */
    /* Location: ./application/modules/meeting/controllers/meeting.php */
    
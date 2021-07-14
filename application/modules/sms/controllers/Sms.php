<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Twilio\Rest\Client;

class Sms extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('sms_model');
        $this->load->model('patient/patient_model');
        $this->load->model('donor/donor_model');
        $this->load->model('doctor/doctor_model');
    }

    public function index() {
        $data = array();
        $id = $this->ion_auth->get_user_id();
        $data['settings'] = $this->settings_model->getSettings();
        $data['sgateways'] = $this->sms_model->getSmsSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('sgateway', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function sendView() {
        $data = array();
        $id = $this->ion_auth->get_user_id();
        $data['groups'] = $this->donor_model->getBloodBank();
        $data['patients'] = $this->patient_model->getPatient();
        $data['sms'] = $this->sms_model->getSmsSettingsById($id);
        $data['teams'] = $this->doctor_model->getDoctor();
        $type = 'sms';
        $data['templates'] = $this->sms_model->getManualSMSTemplate($type);
        $data['shortcode'] = $this->sms_model->getManualSMSShortcodeTag($type);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('sendview', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function settings() {
        $data = array();
        $id = $this->input->get('id');
        $data['settings'] = $this->sms_model->getSmsSettingsById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('settings', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function addNewSettings() {

        $id = $this->input->post('id');
        //  echo $id;
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $api_id = $this->input->post('api_id');
        $auth_key = $this->input->post('authkey');
        $sender = $this->input->post('sender');
        $sid = $this->input->post('sid');
        $token = $this->input->post('token');
        $sendernumber = $this->input->post('sendernumber');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('username', 'Username', 'trim|min_length[5]|max_length[100]|xss_clean');
        // Validating Password Field
        if (!empty($password)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|max_length[100]|xss_clean');
        }
        // Validating SMS Field
        $this->form_validation->set_rules('api_id', 'Api Id', 'trim|min_length[5]|max_length[100]|xss_clean');

        // Validating SMS Field
        $this->form_validation->set_rules('authkey', 'Auth Key', 'trim|min_length[5]|max_length[100]|xss_clean');

        // Validating SMS Field
        $this->form_validation->set_rules('sender', 'Sender', 'trim|min_length[5]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('sid', 'Sid', 'trim|max_length[100]|xss_clean');

// Validating Email Field
        $this->form_validation->set_rules('token', 'Token', 'trim|max_length[100]|xss_clean');

// Validating Email Field
        $this->form_validation->set_rules('sendernumber', 'Sender Number', 'trim|max_length[100]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $id = $this->ion_auth->get_user_id();
            $data['sms'] = $this->sms_model->getSmsSettingsById($id);
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('settings', $data);
            $this->load->view('home/footer'); // just the footer file
        } else {
            $data = array();
            $username = base64_encode($username);
            $password = base64_encode($password);
            $data = array(
                'username' => $username,
                'password' => $password,
                'api_id' => $api_id,
                'authkey' => $auth_key,
                'sender' => $sender,
                'sid' => $sid,
                'token' => $token,
                'sendernumber' => $sendernumber,
                'user' => $this->ion_auth->get_user_id()
            );
            // print_r($data);
            // echo  $id;
            //  die();

            if (empty($id)) {
                $this->sms_model->addSmsSettings($data);
                $this->session->set_flashdata('feedback', lang('added'));
            } else {
                $this->sms_model->updateSmsSettings($id, $data);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            redirect('sms');
        }
    }

    function sendSms($to, $message, $data) {
        $sms_gateway = $this->settings_model->getSettings()->sms_gateway;
        if (!empty($sms_gateway)) {
            $smsSettings = $this->sms_model->getSmsSettingsByGatewayName($sms_gateway);
        } else {
            $this->session->set_flashdata('feedback', lang('gatewany_not_selected'));
            redirect('sms/sendView');
        }
        $j = sizeof($data);
        foreach ($data as $key => $value) {
            foreach ($value as $key2 => $value2) {
                if ($smsSettings->name == 'Clickatell') {
                    $username = base64_decode($smsSettings->username);
                    $password = base64_decode($smsSettings->password);
                    $api_id = $smsSettings->api_id;

                    file_get_contents('https://platform.clickatell.com/messages/http/send?apiKey=' . $api_id . '&to=' . $key2 . '&content=' . $value2);           // file_get_contents('https://platform.clickatell.com/messages/http/send?apiKey='.$api_id.'&to='.$to.'&content='.$message1);           // file_get_contents('https://api.clickatell.com/http/sendmsg?user=' . $username . '&password=' . $password . '&api_id=' . $api_id . '&to=' . $to . '&text=' . $message1);
                }

                if ($smsSettings->name == 'MSG91') {
                    $authkey = $smsSettings->authkey;
                    $sender = $smsSettings->sender;
                    $value2 = urlencode($value2);
                    //  file_get_contents('http://api.msg91.com/api/v2/sendsms?route=4&sender=' . $sender . '&mobiles=' . $key2 . '&authkey=' . $authkey . '&message=' . $value2 . '&country=0');           // file_get_contents('https://platform.clickatell.com/messages/http/send?apiKey='.$api_id.'&to='.$to.'&content='.$message1);           // file_get_contents('https://api.clickatell.com/http/sendmsg?user=' . $username . '&password=' . $password . '&api_id=' . $api_id . '&to=' . $to . '&text=' . $message1);
                    file_get_contents('http://world.msg91.com/api/v2/sendsms?authkey=' . $authkey . '&mobiles=' . $key2 . '&message=' . $value2 . '&sender=' . $sender . '&route=4&country=0');
                }

                if ($smsSettings->name == 'Twilio') {
                    $sid = $smsSettings->sid;
                    $token = $smsSettings->token;
                    $sendername = $smsSettings->sendernumber;
                    if (!empty($sid) && !empty($token) && !empty($sendername)) {
                        $client = new Client($sid, $token);
                        $client->messages->create(
                                $key2, // Text this number
                                array(
                            'from' => $sendername, // From a valid Twilio number
                            'body' => $value2
                                )
                        );
                    }
                }
                if ($smsSettings->name == 'Bulk Sms') {
                    $username = base64_decode($smsSettings->username);
                    $password = base64_decode($smsSettings->password);
                    $messages = array(
                        array('to' => $key2, 'body' => $value2),
                    );

                    $result = $this->send_message(json_encode($messages), 'https://api.bulksms.com/v1/messages?auto-unicode=true&longMessageMaxParts=30', $username, $password);
                }
                if ($smsSettings->name == 'Bd Bulk Sms') {
                    $token = $smsSettings->token;
                    $to = $key2;
                    $message = $value2;
                    $data = array(
                        'to' => "$to",
                        'message' => "$message",
                        'token' => "$token"
                    );

                    $url = "http://api.greenweb.com.bd/api.php";
                    $ch = curl_init(); // Initialize cURL
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_ENCODING, '');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $smsresult = curl_exec($ch);
                }
            }
        }
    }

    function send_message($post_body, $url, $username, $password) {
        $ch = curl_init();
        $headers = array(
            'Content-Type:application/json',
            'Authorization:Basic ' . base64_encode("$username:$password")
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
        // Allow cUrl functions 20 seconds to execute
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        // Wait 10 seconds while trying to connect
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $output = array();
        $output['server_response'] = curl_exec($ch);
        $curl_info = curl_getinfo($ch);
        $output['http_status'] = $curl_info['http_code'];
        $output['error'] = curl_error($ch);
        curl_close($ch);
        return $output;
    }

    function send() {
        $userId = $this->ion_auth->get_user_id();
        $is_v_v = $this->input->post('radio');
        $settngsname = $this->settings_model->getSettings()->system_vendor;
        if ($is_v_v == 'allpatient') {
            $patients = $this->patient_model->getpatient();
            foreach ($patients as $patient) {
                $to[] = $patient->phone;
                $message = $this->input->post('message');
                $name = explode(' ', $patient->name);
                if (!isset($name[1])) {
                    $name[1] = null;
                }
                $data1 = array(
                    'firstname' => $name[0],
                    'lastname' => $name[1],
                    'name' => $patient->name,
                    'phone' => $patient->phone,
                    'email' => $patient->email,
                    'address' => $patient->address,
                    'company' => $settngsname
                );
                $messageprint = $this->parser->parse_string($message, $data1);
                $data2[] = array($patient->phone => $messageprint);
            }
            $recipient = 'All Patient';
        }

        if ($is_v_v == 'alldoctor') {
            $doctors = $this->doctor_model->getDoctor();
            foreach ($doctors as $doctor) {
                $message = $this->input->post('message');
                $name = explode(' ', $doctor->name);
                if (!isset($name[1])) {
                    $name[1] = null;
                }
                $data1 = array(
                    'firstname' => $name[0],
                    'lastname' => $name[1],
                    'name' => $doctor->name,
                    'phone' => $doctor->phone,
                    'email' => $doctor->email,
                    'address' => $doctor->address,
                    'company' => $settngsname,
                    'department' => $doctor->department
                );
                $messageprint = $this->parser->parse_string($message, $data1);
                $data2[] = array($doctor->phone => $messageprint);
                $to[] = $doctor->phone;
            }
            $recipient = 'All Doctor';
        }

        if ($is_v_v == 'bloodgroupwise') {
            $blood_group = $this->input->post('bloodgroup');
            $donors = $this->donor_model->getDonor();
            foreach ($donors as $donor) {
                if ($donor->group == $blood_group) {
                    $message = $this->input->post('message');
                    $name = explode(' ', $donor->name);
                    if (!isset($name[1])) {
                        $name[1] = null;
                    }
                    $data1 = array(
                        'firstname' => $name[0],
                        'lastname' => $name[1],
                        'name' => $donor->name,
                        'phone' => $donor->phone,
                        'email' => $donor->email,
                        'company' => $settngsname
                    );
                    $messageprint = $this->parser->parse_string($message, $data1);
                    $data2[] = array($donor->phone => $messageprint);
                    $to[] = $donor->phone;
                }
            }
            $recipient = 'All Blood Donors With Blood Group ' . $blood_group;
        }


        if ($is_v_v == 'single_patient') {
            $patient = $this->input->post('patient');

            $patient_detail = $this->patient_model->getPatientById($patient);
            $message = $this->input->post('message');
            $name = explode(' ', $patient_detail->name);
            if (!isset($name[1])) {
                $name[1] = null;
            }
            $data1 = array(
                'firstname' => $name[0],
                'lastname' => $name[1],
                'name' => $patient_detail->name,
                'phone' => $patient_detail->phone,
                'email' => $patient_detail->email,
                'address' => $patient_detail->address,
                'company' => $settngsname
            );
            $messageprint = $this->parser->parse_string($message, $data1);
            $data2[] = array($patient_detail->phone => $messageprint);
            $single_patient_phone = $patient_detail->phone;
            $recipient = 'Patient Id: ' . $patient_detail->id . '<br> Patient Name: ' . $patient_detail->name . '<br> Patient Phone: ' . $patient_detail->phone;
        }

        if (!empty($single_patient_phone)) {
            $to = $single_patient_phone;
        } else {
            if (!empty($to)) {
                $to = implode(',', $to);
            }
        }
        // $message = urlencode("Test Message");
        if (!empty($to)) {
            $message = $this->input->post('message');
            $message1 = urlencode($message);
            $this->sendSms($to, $message1, $data2);
            $data = array();
            $date = time();
            $data = array(
                'message' => $message,
                'date' => $date,
                'recipient' => $recipient,
                'user' => $this->ion_auth->get_user_id()
            );
            $this->sms_model->insertSms($data);
            $this->session->set_flashdata('feedback', lang('message_sent'));
        } else {
            $this->session->set_flashdata('feedback', lang('not_sent'));
        }
        redirect('sms/sendView');
    }

    function appointmentReminder() {
        $id = $this->input->post('id');
        $appointment_details = $this->appointment_model->getAppointmentById($id);

        $patient_detail = $this->patient_model->getPatientById($appointment_details->patient);
        $doctor_detail = $this->doctor_model->getDoctorById($appointment_details->doctor);
        $recipient_p = 'Patient Id: ' . $patient_detail->id . '<br> Patient Name: ' . $patient_detail->name . '<br> Patient Phone: ' . $patient_detail->phone;
        $to = $patient_detail->phone;

        // $message = urlencode("Test Message");
        if (!empty($to)) {
            $message = 'Reminder: Appointment is scheduled for you With Doctor ' . $doctor_detail->name . ' Date: ' . date('d-m-Y', $appointment_details->date) . ' Time: ' . $appointment_details->s_time;
            $message1 = urlencode($message);
            $this->sendSms($to, $message1);
            $data_p = array();
            $date = time();
            $data_p = array(
                'message' => $message,
                'date' => $date,
                'recipient' => $recipient_p,
                'user' => $this->ion_auth->get_user_id()
            );
            $this->sms_model->insertSms($data_p);
            $this->session->set_flashdata('feedback', lang('message_sent'));
        }

        redirect('appointment/upcoming');
    }

    function sendSmsDuringAppointment($patient, $doctor, $date, $s_time, $e_time) {

        $patient_detail = $this->patient_model->getPatientById($patient);
        $doctor_detail = $this->doctor_model->getDoctorById($doctor);

        $recipient_p = 'Patient Id: ' . $patient_detail->id . '<br> Patient Name: ' . $patient_detail->name . '<br> Patient Phone: ' . $patient_detail->phone;
        $recipient_d = 'Doctor Id: ' . $doctor_detail->id . '<br> Patient Name: ' . $doctor_detail->name . '<br> Doctor Phone: ' . $doctor_detail->phone;


        // $message = urlencode("Test Message");
        if (!empty($patient)) {
            $message = 'Appointment is scheduled for you With Doctor ' . $doctor_detail->name . ' Date: ' . date('d-m-Y', $date) . ' Time: ' . $s_time;
            $message1 = urlencode($message);
            $this->sendSms($patient_detail->phone, $message1);
            $data_p = array();
            $date = time();
            $data_p = array(
                'message' => $message,
                'date' => $date,
                'recipient' => $recipient_p,
                'user' => $this->ion_auth->get_user_id()
            );
            $this->sms_model->insertSms($data_p);
        }

        if (!empty($doctor)) {
            $message = 'Appointment is scheduled for you With Patient ' . $patient_detail->name . ' Date: ' . date('d-m-Y', $date) . ' Time: ' . $s_time;
            $message1 = urlencode($message);
            $this->sendSms($doctor_detail->phone, $message1);
            $data_d = array();
            $date = time();
            $data_d = array(
                'message' => $message,
                'date' => $date,
                'recipient' => $recipient_d,
                'user' => $this->ion_auth->get_user_id()
            );
            $this->sms_model->insertSms($data_d);
        }
    }

    function appointmentApproved() {
        $id = $this->input->post('id');
        $appointment_details = $this->appointment_model->getAppointmentById($id);

        $patient_detail = $this->patient_model->getPatientById($appointment_details->patient);
        $doctor_detail = $this->doctor_model->getDoctorById($appointment_details->doctor);
        $recipient_p = 'Patient Id: ' . $patient_detail->id . '<br> Patient Name: ' . $patient_detail->name . '<br> Patient Phone: ' . $patient_detail->phone;
        $to = $patient_detail->phone;

        // $message = urlencode("Test Message");
        if (!empty($to)) {
            $message = 'Approval: Appointment is scheduled for you With Doctor ' . $doctor_detail->name . ' Date: ' . date('d-m-Y', $appointment_details->date) . ' Time: ' . $appointment_details->s_time;
            $message1 = urlencode($message);
            $this->sendSms($to, $message1);
            $data_p = array();
            $date = time();
            $data_p = array(
                'message' => $message,
                'date' => $date,
                'recipient' => $recipient_p,
                'user' => $this->ion_auth->get_user_id()
            );
            $this->sms_model->insertSms($data_p);
        }
    }

    function sendSmsDuringPayment($patient, $amount, $date) {

        $patient_detail = $this->patient_model->getPatientById($patient);

        $recipient_p = 'Patient Id: ' . $patient_detail->id . '<br> Patient Name: ' . $patient_detail->name . '<br> Patient Phone: ' . $patient_detail->phone;

        // $message = urlencode("Test Message");
        if (!empty($patient)) {
            $to = $patient_detail->phone;
            $message = 'Bill For Patient ' . $patient_detail->name . 'Amount: ' . $amount . ' Date: ' . date('d-m-Y', $date);
            $message1 = urlencode($message);
            $this->sendSms($to, $message1);
            $data_p = array();
            $date = time();
            $data_p = array(
                'message' => $message,
                'date' => $date,
                'recipient' => $recipient_p,
                'user' => $this->ion_auth->get_user_id()
            );
            $this->sms_model->insertSms($data_p);
        }
    }

    function sendSmsDuringPatientRegistration($patient) {

        $patient_detail = $this->patient_model->getPatientById($patient);

        $recipient_p = 'Patient Id: ' . $patient_detail->id . '<br> Patient Name: ' . $patient_detail->name . '<br> Patient Phone: ' . $patient_detail->phone;

        // $message = urlencode("Test Message");
        if (!empty($patient)) {
            $to = $patient_detail->phone;
            $message = 'Patient Registration' . $patient_detail->name . 'is successfully registerred';
            $message1 = urlencode($message);
            $this->sendSms($to, $message1);
            $data_p = array();
            $date = time();
            $data_p = array(
                'message' => $message,
                'date' => $date,
                'recipient' => $recipient_p,
                'user' => $this->ion_auth->get_user_id()
            );
            $this->sms_model->insertSms($data_p);
        }
    }

    function sent() {
        if ($this->ion_auth->in_group(array('admin'))) {
            $data['sents'] = $this->sms_model->getSms();
        } else {
            $current_user_id = $this->ion_auth->user()->row()->id;
            $data['sents'] = $this->sms_model->getSmsByUser($current_user_id);
        }

        $this->load->view('home/dashboard');
        $this->load->view('sms', $data);
        $this->load->view('home/footer');
    }

    function delete() {
        $id = $this->input->get('id');
        $this->sms_model->delete($id);
        $this->session->set_flashdata('feedback', lang('deleted'));
        redirect('sms/sent');
    }

    public function autoSMSTemplate() {
        $data['settings'] = $this->settings_model->getSettings();
        $data['shortcode'] = $this->sms_model->getAutoSMSTemplate();
        $this->load->view('home/dashboard', $data);
        $this->load->view('autosmstemplate', $data);
        $this->load->view('home/footer', $data);
    }

    function getAutoSMSTemplateList() {
        $type = $this->input->post('type');
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['cases'] = $this->sms_model->getAutoSMSTemplateBySearch($search);
            } else {
                $data['cases'] = $this->sms_model->getAutoSMSTemplate();
            }
        } else {
            if (!empty($search)) {
                $data['cases'] = $this->sms_model->getAutoSMSTemplateByLimitBySearch($limit, $start, $search);
            } else {
                $data['cases'] = $this->sms_model->getAutoSMSTemplateByLimit($limit, $start);
            }
        }
        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        $count = 0;
        foreach ($data['cases'] as $case) {
            $i = $i + 1;
            if ($this->ion_auth->in_group(array('admin'))) {

                $options1 = ' <a type="button" class="btn btn-success btn-xs btn_width editbutton1" title="' . lang('edit') . '" data-toggle = "modal" data-id="' . $case->id . '"><i class="fa fa-edit"> </i></a>';
                // $options1 = '<a type='button" class="btn btn-success btn-xs btn_width" title="" . lang('edit') . '"data-toggle = "modal" data-id="' . $case->id . '"><i class="fa fa-edit"></i></a>';
                //    $options2 = '<a class="btn btn-danger btn-xs btn_width" title="' . lang('delete') . '" href="sms/deleteTemplate?id=' . $case->id . '&redirect=sms/smsTemplate" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash-o"></i></a>';
            }
            $info[] = array(
                $i,
                $case->name,
                $case->message,
                $case->status,
                $options1
            );
            $count = $count + 1;
        }

        if (!empty($data['cases'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $count,
                "recordsFiltered" => $count,
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

    public function editAutoSMSTemplate() {
        $id = $this->input->get('id');
        $data['autotemplatename'] = $this->sms_model->getAutoSMSTemplateById($id);
        $data['autotag'] = $this->sms_model->getAutoSMSTemplateTag($data['autotemplatename']->type);
        if ($data['autotemplatename']->status == 'Active') {
            $data['status_options'] = '<option value="Active" selected>' . lang("active") . '
                            </option>
                            <option value="Inactive"> ' . lang("inactive") . '
        </option>';
        } else {
            $data['status_options'] = '<option value="Active">' . lang("active") . '
                            </option>
                            <option value="Inactive" selected> ' . lang("inactive") . '
        </option>';
        }
        echo json_encode($data);
    }

    public function addNewAutoSMSTemplate() {
        $message = $this->input->post('message');
        $name = $this->input->post('category');
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('message', 'Message', 'trim|xss_clean|required');
        if ($this->form_validation->run() == FALSE) {

            $data['settings'] = $this->settings_model->getSettings();
            $data['shortcode'] = $this->sms_model->getTag();
            $this->load->view('home/dashboard', $data);
            $this->load->view('autosmstemplate', $data);
            $this->load->view('home/footer', $data);
        } else {
            $data = array();
            $data = array(
                'name' => $name,
                'message' => $message,
                'status' => $status,
            );

            $this->sms_model->updateAutoSMSTemplate($data, $id);
            $this->session->set_flashdata('feedback', lang('updated'));

            redirect('sms/autoSMSTemplate');
        }
    }

    public function addNewManualTemplate() {
        $message = $this->input->post('message');
        $name = $this->input->post('name');
        $type = $this->input->post('type');
        $id = $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating 
        $this->form_validation->set_rules('message', 'Message', 'trim|xss_clean|required');

        // Validating 
        $this->form_validation->set_rules('name', 'Name', 'trim|xss_clean|required');
        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $data = array();
                $data['settings'] = $this->settings_model->getSettings();
                $data['templatename'] = $this->sms_model->getManualSMSTemplateById($id, $type);
                $data['shortcode'] = $this->sms_model->getManualSMSShortcodeTag($type);
                $this->load->view('home/dashboard', $data); // just the header file
                $this->load->view('add_manual_template', $data);
                $this->load->view('home/footer', $data); // just the footer file
            } else {
                $data = array();
                $data['setval'] = 'setval';
                $data['settings'] = $this->settings_model->getSettings();
                $data['shortcode'] = $this->sms_model->getManualSMSShortcodeTag($type);
                $this->load->view('home/dashboard', $data); // just the header file
                $this->load->view('add_manual_template', $data);
                $this->load->view('home/footer', $data); // just the footer file
            }
        } else {
            $data = array();
            $data = array(
                'name' => $name,
                'message' => $message,
                'type' => $type
            );
            if (empty($id)) {
                $this->sms_model->addManualSMSTemplate($data);
                $this->session->set_flashdata('feedback', lang('added'));
            } else {
                $this->sms_model->updateManualSMSTemplate($data, $id);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            redirect('sms/sendView');
        }
    }

    public function manualSMSTemplate() {
        $data['settings'] = $this->settings_model->getSettings();
        $type = 'sms';
        $data['shortcode'] = $this->sms_model->getManualSMSShortcodeTag($type);
        $this->load->view('home/dashboard', $data);
        $this->load->view('manual_sms_template', $data);
        $this->load->view('home/footer', $data);
    }

    function getManualSMSTemplateList() {
        $type = $this->input->post('type');
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['cases'] = $this->sms_model->getManualSMSTemplateBySearch($search, $type);
            } else {
                $data['cases'] = $this->sms_model->getManualSMSTemplate($type);
            }
        } else {
            if (!empty($search)) {
                $data['cases'] = $this->sms_model->getManualSMSTemplateByLimitBySearch($limit, $start, $search, $type);
            } else {
                $data['cases'] = $this->sms_model->getManualSMSTemplateByLimit($limit, $start, $type);
            }
        }
        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        $count = 0;
        foreach ($data['cases'] as $case) {
            $i = $i + 1;
            if ($this->ion_auth->in_group(array('admin'))) {

                $options1 = ' <a type="button" class="btn btn-success btn-xs btn_width editbutton1" title="' . lang('edit') . '" data-toggle = "modal" data-id="' . $case->id . '"><i class="fa fa-edit"> </i></a>';
                // $options1 = '<a type='button" class="btn btn-success btn-xs btn_width" title="" . lang('edit') . '"data-toggle = "modal" data-id="' . $case->id . '"><i class="fa fa-edit"></i></a>';
                $options2 = '<a class="btn btn-danger btn-xs btn_width" title="' . lang('delete') . '" href="sms/deleteManualSMSTemplate?id=' . $case->id . '&redirect=sms/smsTemplate" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash-o"></i></a>';
            }
            $info[] = array(
                $i,
                $case->name,
                ' ' . $options1 . ' ' . $options2
            );
            $count = $count + 1;
        }

        if (!empty($data['cases'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $count,
                "recordsFiltered" => $count,
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

    public function deleteManualSMSTemplate() {
        $id = $this->input->get('id');
        $this->sms_model->deleteManualSMSTemplate($id);
        $this->session->set_flashdata('feedback', lang('deleted'));
        redirect('sms/manualSMSTemplate');
    }

    public function editManualSMSTemplate() {
        $id = $this->input->get('id');
        $type = $this->input->get('type');

        $data['templatename'] = $this->sms_model->getManualSMSTemplateById($id, $type);

        echo json_encode($data);
    }

    public function getManualSMSTemplateinfo() {
        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $type = 'sms';
        // Get users
        $response = $this->sms_model->getManualSMSTemplateListSelect2($searchTerm, $type);

        echo json_encode($response);
    }

    public function getManualSMSTemplateMessageboxText() {
        $id = $this->input->get('id');
        $type = $this->input->get('type');
        $data['user'] = $this->sms_model->getManualSMSTemplateById($id, $type);
        echo json_encode($data);
    }

}

/* End of file profile.php */
/* Location: ./application/modules/profile/controllers/profile.php */

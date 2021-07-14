<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Appointment_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertAppointment($data) {

        $this->db->insert('appointment', $data);
    }

    function getAppointment() {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('appointment');
        return $query->result();
    }
    
    function getAppointmentWithoutSearch($order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentBySearch($search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->like('id', $search);
        $this->db->or_like('patientname', $search);
        $this->db->or_like('doctorname', $search);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentByLimit($limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentByLimitBySearch($limit, $start, $search, $order, $dir) {

        $this->db->like('id', $search);

        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }

        $this->db->or_like('patientname', $search);
        $this->db->or_like('doctorname', $search);

        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentForCalendar() {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentByDoctor($doctor) {
        $this->db->order_by('id', 'desc');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentRequest() {
        $this->db->order_by('id', 'desc');
        $this->db->where('request', 'Yes');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentRequestByDoctor($doctor) {
        $this->db->where('request', 'Yes');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentByPatient($patient) {
        $this->db->order_by('id', 'desc');
        $this->db->where('patient', $patient);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentByStatus($status) {
        $this->db->order_by('id', 'desc');
        $this->db->where('status', $status);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentByStatusByDoctor($status, $doctor) {
        $this->db->order_by('id', 'desc');
        $this->db->where('status', $status);
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('appointment');
        return $query->row();
    }

    function getAppointmentByDate($date_from, $date_to) {
        $this->db->select('*');
        $this->db->from('appointment');
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

    function getAppointmentByDoctorByToday($doctor_id) {
        $today = strtotime(date('Y-m-d'));
        $this->db->where('doctor', $doctor_id);
        $this->db->where('date', $today);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function updateAppointment($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('appointment', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('appointment');
    }

    function updateIonUser($username, $email, $password, $ion_user_id) {
        $uptade_ion_user = array(
            'username' => $username,
            'email' => $email,
            'password' => $password
        );
        $this->db->where('id', $ion_user_id);
        $this->db->update('users', $uptade_ion_user);
    }

    function getRequestAppointment() {
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 'Requested');
        $query = $this->db->get('appointment');
        return $query->result();
    }
    
    function getRequestAppointmentWithoutSearch($order, $dir) {
       if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Requested');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getRequestAppointmentBySearch($search, $order, $dir) {
       if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Requested');
        $this->db->like('id', $search);
        $this->db->or_like('patientname', $search);
        $this->db->or_like('doctorname', $search);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getRequestAppointmentByLimit($limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Requested');
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getRequestAppointmentByLimitBySearch($limit, $start, $search, $order, $dir) {
        $this->db->where('status', 'Requested');
        $this->db->like('id', $search);

       if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }

        $this->db->or_like('patientname', $search);
        $this->db->or_like('doctorname', $search);

        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getPendingAppointment() {
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 'Pending Confirmation');
        $query = $this->db->get('appointment');
        return $query->result();
    }
    
    function getPendingAppointmentWithoutSearch($order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Pending Confirmation');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getPendingAppointmentBySearch($search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Pending Confirmation');
        $this->db->like('id', $search);
        $this->db->or_like('patientname', $search);
        $this->db->or_like('doctorname', $search);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getPendingAppointmentByLimit($limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Pending Confirmation');
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getPendingAppointmentByLimitBySearch($limit, $start, $search, $order, $dir) {
        $this->db->where('status', 'Pending Confirmation');
        $this->db->like('id', $search);

        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }

        $this->db->or_like('patientname', $search);
        $this->db->or_like('doctorname', $search);

        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getConfirmedAppointment() {
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 'Confirmed');
        $query = $this->db->get('appointment');
        return $query->result();
    }
    
    function getConfirmedAppointmentWithoutSearch($order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Confirmed');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getConfirmedAppointmentBySearch($search, $order, $dir) {
       if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Confirmed');
        $this->db->like('id', $search);
        $this->db->or_like('patientname', $search);
        $this->db->or_like('doctorname', $search);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getConfirmedAppointmentByLimit($limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Confirmed');
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getConfirmedAppointmentByLimitBySearch($limit, $start, $search, $order, $dir) {
        $this->db->where('status', 'Confirmed');
        $this->db->like('id', $search);

        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }

        $this->db->or_like('patientname', $search);
        $this->db->or_like('doctorname', $search);

        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getTreatedAppointment() {
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 'Treated');
        $query = $this->db->get('appointment');
        return $query->result();
    }
    
     function getTreatedAppointmentWithoutSearch($order, $dir) {
       if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Treated');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getTreatedAppointmentBySearch($search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Treated');
        $this->db->like('id', $search);
        $this->db->or_like('patientname', $search);
        $this->db->or_like('doctorname', $search);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getTreatedAppointmentByLimit($limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Treated');
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getTreatedAppointmentByLimitBySearch($limit, $start, $search, $order, $dir) {
        $this->db->where('status', 'Treated');
        $this->db->like('id', $search);

        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }

        $this->db->or_like('patientname', $search);
        $this->db->or_like('doctorname', $search);

        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getCancelledAppointment() {
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 'Cancelled');
        $query = $this->db->get('appointment');
        return $query->result();
    }
    
    function getCancelledAppointmentWithoutSearch($order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Cancelled');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getCancelledAppointmentBySearch($search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Cancelled');
        $this->db->like('id', $search);
        $this->db->or_like('patientname', $search);
        $this->db->or_like('doctorname', $search);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getCancelledAppointmentByLimit($limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Cancelled');
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getCancelledAppointmentByLimitBySearch($limit, $start, $search, $order, $dir) {
        $this->db->where('status', 'Cancelled');
        $this->db->like('id', $search);

        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }

        $this->db->or_like('patientname', $search);
        $this->db->or_like('doctorname', $search);

        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentListByDoctor($doctor) {
        $this->db->where('doctor', $doctor);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('appointment');
        return $query->result();
    }
    
    function getAppointmentListByDoctorWithoutSearch($doctor, $order, $dir) {
        $this->db->where('doctor', $doctor);
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentListBySearchByDoctor($doctor, $search, $order, $dir) {
        $this->db->where('doctor', $doctor);
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->like('id', $search);
        $this->db->or_like('patientname', $search);
        $this->db->or_like('doctorname', $search);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentListByLimitByDoctor($doctor, $limit, $start, $order, $dir) {
        $this->db->where('doctor', $doctor);
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentListByLimitBySearchByDoctor($doctor, $limit, $start, $search, $order, $dir) {
        $this->db->where('doctor', $doctor);

        $this->db->like('id', $search);

        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }

        $this->db->or_like('patientname', $search);
        $this->db->or_like('doctorname', $search);

        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getRequestAppointmentByDoctor($doctor) {
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 'Requested');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }
    
    function getRequestAppointmentByDoctorWithoutSearch($doctor, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Requested');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getRequestAppointmentBySearchByDoctor($doctor, $search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Requested')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getRequestAppointmentByLimitByDoctor($doctor, $limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Requested');
        $this->db->where('doctor', $doctor);
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getRequestAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search, $order, $dir) {

       if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Requested')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getCancelledAppointmentByDoctor($doctor) {
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 'Cancelled');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }
    
    function getCancelledAppointmentByDoctorWithoutSearch($doctor, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Cancelled');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getCancelledAppointmentBySearchByDoctor($doctor, $search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Cancelled')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getCancelledAppointmentByLimitByDoctor($doctor, $limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Cancelled');
        $this->db->where('doctor', $doctor);
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getCancelledAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search, $order, $dir) {

        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Cancelled')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getPendingAppointmentByDoctor($doctor) {
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 'Pending Confirmation');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }
    
     function getPendingAppointmentByDoctorWithoutSearch($doctor, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Pending Confirmation');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getPendingAppointmentBySearchByDoctor($doctor, $search, $order, $dir) {
       if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Pending Confirmation')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getPendingAppointmentByLimitByDoctor($doctor, $limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Pending Confirmation');
        $this->db->where('doctor', $doctor);
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getPendingAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search, $order, $dir) {

       if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Pending Confirmation')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getTreatedAppointmentByDoctor($doctor) {
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 'Treated');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }
    
     function getTreatedAppointmentByDoctorWithoutSearch($doctor, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Treated');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getTreatedAppointmentBySearchByDoctor($doctor, $search, $order, $dir) {
       if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Treated')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getTreatedAppointmentByLimitByDoctor($doctor, $limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Treated');
        $this->db->where('doctor', $doctor);
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getTreatedAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search, $order, $dir) {

        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Treated')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getConfirmedAppointmentByDoctor($doctor) {
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 'Confirmed');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }
    
    function getConfirmedAppointmentByDoctorWithoutSearch($doctor, $order, $dir) {
       if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Confirmed');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getConfirmedAppointmentBySearchByDoctor($doctor, $search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Confirmed')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getConfirmedAppointmentByLimitByDoctor($doctor, $limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('status', 'Confirmed');
        $this->db->where('doctor', $doctor);
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getConfirmedAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search, $order, $dir) {

       if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Confirmed')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Meeting extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('meeting_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('patient/patient_model');
        $this->load->model('sms/sms_model');
        $this->load->module('sms');


        if (!$this->ion_auth->in_group(array('admin', 'Nurse', 'Doctor', 'Patient', 'Receptionist'))) {
            redirect('home/permission');
        }
    }

    

}

/* End of file meeting.php */
    /* Location: ./application/modules/meeting/controllers/meeting.php */
    
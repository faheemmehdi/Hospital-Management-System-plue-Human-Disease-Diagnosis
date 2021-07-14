<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertReport($data) {
        $this->db->insert('report', $data);
    }

    function getReport() {
        $query = $this->db->get('report');
        return $query->result();
    }

    function getReportById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('report');
        return $query->row();
    }

    function getReportByType($type) {
        $this->db->where('report_type', $type);
        $query = $this->db->get('report');
        return $query->result();
    }

    function updateReport($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('report', $data);
    }

    function myReport($id) {
        $id = explode('*', $id)[1];
        $this->db->where('patient', $id);
        $this->db->get('report');
    }

    function deleteReport($id) {
        $this->db->where('id', $id);
        $this->db->delete('report');
    }

}

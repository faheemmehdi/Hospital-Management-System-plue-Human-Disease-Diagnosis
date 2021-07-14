<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getEmailSettingsById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('email_settings');
        return $query->row(); 
    }

    function getEmailByUser($user) {
        $this->db->order_by('id', 'desc');
        $this->db->where('user', $user);
        $query = $this->db->get('email');
        return $query->result();
    }

    function getEmailSettings() {
        $query = $this->db->get('email_settings');
        return $query->row();
    }

    function updateEmailSettings($data) {
        $this->db->update('email_settings', $data);
    }

    function addEmailSettings($data) {
        $this->db->insert('email_settings', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('email');
    }

    function insertEmail($data) {
        $this->db->insert('email', $data);
    }

    function getEmail() {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('email');
        return $query->result();
    }

    function getAutoEmailTemplate() {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('autoemailtemplate');
        return $query->result();
    }

    function getAutoEmailTemplateBySearch($search) {
        $this->db->order_by('id', 'asc');
        $this->db->like('id', $search);
        $this->db->or_like('message', $search);
        $query = $this->db->get('autoemailtemplate');
        return $query->result();
    }

    function getAutoEmailTemplateByLimit($limit, $start) {
        $this->db->order_by('id', 'asc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('autoemailtemplate');
        return $query->result();
    }

    function getAutoEmailTemplateByLimitBySearch($limit, $start, $search) {

        $this->db->like('id', $search);
        $this->db->order_by('id', 'asc');
        $this->db->or_like('message', $search);
        $this->db->limit($limit, $start);
        $query = $this->db->get('autoemailtemplate');
        return $query->result();
    }

    function getAutoEmailTemplateById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('autoemailtemplate');
        return $query->row();
    }

    function getAutoEmailTemplateTag($type) {
        $this->db->order_by('id', 'desc');
        $this->db->where('type', $type);
        $query = $this->db->get('autoemailshortcode');
        return $query->result();
    }

    function updateAutoEmailTemplate($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('autoemailtemplate', $data);
    }

    function getManualEmailTemplate($type) {
        $this->db->order_by('id', 'desc');
        $this->db->where('type', $type);
        $query = $this->db->get('manual_email_template');
        return $query->result();
    }

    function getManualEmailShortcodeTag($type) {
        $this->db->order_by('id', 'desc');
        $this->db->where('type', $type);
        $query = $this->db->get('manualemailshortcode');
        return $query->result();
    }

    function getManualEmailTemplateById($id, $type) {
        $this->db->where('id', $id);
        $this->db->where('type', $type);
        $query = $this->db->get('manual_email_template');
        return $query->row();
    }

    function addManualEmailTemplate($data) {
        $this->db->insert('manual_email_template', $data);
    }

    function updateManualEmailTemplate($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('manual_email_template', $data);
    }

    function getManualEmailTemplateBySearch($search, $type) {
        $this->db->order_by('id', 'desc');
        $this->db->like('id', $search);
        $this->db->or_like('message', $search);
        $this->db->where('type', $type);
        $query = $this->db->get('manual_email_template');
        return $query->result();
    }

    function getManualEmailTemplateByLimit($limit, $start, $type) {
        $this->db->order_by('id', 'desc');
        $this->db->where('type', $type);
        $this->db->limit($limit, $start);
        $query = $this->db->get('manual_email_template');
        return $query->result();
    }

    function getManualEmailTemplateByLimitBySearch($limit, $start, $search, $type) {

        $this->db->like('id', $search);
        $this->db->where('type', $type);
        $this->db->order_by('id', 'desc');

        $this->db->or_like('message', $search);


        $this->db->limit($limit, $start);
        $query = $this->db->get('manual_email_template');
        return $query->result();
    }

    function deleteManualEmailTemplate($id) {
        $this->db->where('id', $id);
        $this->db->delete('manual_email_template');
    }

    function getManualEmailTemplateListSelect2($searchTerm, $type) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where("name like '%" . $searchTerm . "%' ");
            $this->db->where('type', $type);
            $fetched_records = $this->db->get('manual_email_template');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(20);
            $fetched_records = $this->db->get('manual_email_template');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name']);
        }
        return $data;
    }

    function getAutoEmailByType($type) {

        $this->db->where('type', $type);
        $query = $this->db->get('autoemailtemplate');
        return $query->row();
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sms_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getSmsSettingsById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('sms_settings');
        return $query->row();
    }

    function getSmsByUser($user) {
        $this->db->order_by('id', 'desc');
        $this->db->where('user', $user);
        $query = $this->db->get('sms');
        return $query->result();
    }

    function getSmsSettings() {
        $query = $this->db->get('sms_settings');
        return $query->result();
    }

    function getSmsSettingsByGatewayName($name) {
        $this->db->where('name', $name);
        $query = $this->db->get('sms_settings');
        return $query->row();
    }

    function updateSmsSettings($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('sms_settings', $data);
    }

    function addSmsSettings($data) {
        $this->db->insert('sms_settings', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('sms');
    }

    function insertSms($data) {
        $this->db->insert('sms', $data);
    }

    function getSms() {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('sms');
        return $query->result();
    }

    function getAutoSMSTemplate() {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('autosmstemplate');
        return $query->result();
    }

    function getAutoSMSTemplateBySearch($search) {
        $this->db->order_by('id', 'asc');
        $this->db->like('id', $search);
        $this->db->or_like('message', $search);
        $query = $this->db->get('autosmstemplate');
        return $query->result();
    }

    function getAutoSMSTemplateByLimit($limit, $start) {
        $this->db->order_by('id', 'asc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('autosmstemplate');
        return $query->result();
    }

    function getAutoSMSTemplateByLimitBySearch($limit, $start, $search) {

        $this->db->like('id', $search);
        $this->db->order_by('id', 'asc');
        $this->db->or_like('message', $search);
        $this->db->limit($limit, $start);
        $query = $this->db->get('autosmstemplate');
        return $query->result();
    }

    function getAutoSMSTemplateById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('autosmstemplate');
        return $query->row();
    }

    function getAutoSMSTemplateTag($type) {
        $this->db->order_by('id', 'desc');
        $this->db->where('type', $type);
        $query = $this->db->get('autosmsshortcode');
        return $query->result();
    }

    function updateAutoSMSTemplate($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('autosmstemplate', $data);
    }

    function getManualSMSTemplate($type) {
        $this->db->order_by('id', 'desc');
        $this->db->where('type', $type);
        $query = $this->db->get('manual_sms_template');
        return $query->result();
    }

    function getManualSMSShortcodeTag($type) {
        $this->db->order_by('id', 'desc');
        $this->db->where('type', $type);
        $query = $this->db->get('manualsmsshortcode');
        return $query->result();
    }

    function getManualSMSTemplateById($id, $type) {
        $this->db->where('id', $id);
        $this->db->where('type', $type);
        $query = $this->db->get('manual_sms_template');
        return $query->row();
    }

    function addManualSMSTemplate($data) {
        $this->db->insert('manual_sms_template', $data);
    }

    function updateManualSMSTemplate($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('manual_sms_template', $data);
    }

    function getManualSMSTemplateBySearch($search, $type) {
        $this->db->order_by('id', 'desc');
        $this->db->like('id', $search);
        $this->db->or_like('message', $search);
        $this->db->where('type', $type);
        $query = $this->db->get('manual_sms_template');
        return $query->result();
    }

    function getManualSMSTemplateByLimit($limit, $start, $type) {
        $this->db->order_by('id', 'desc');
        $this->db->where('type', $type);
        $this->db->limit($limit, $start);
        $query = $this->db->get('manual_sms_template');
        return $query->result();
    }

    function getManualSMSTemplateByLimitBySearch($limit, $start, $search, $type) {

        $this->db->like('id', $search);
        $this->db->where('type', $type);
        $this->db->order_by('id', 'desc');

        $this->db->or_like('message', $search);


        $this->db->limit($limit, $start);
        $query = $this->db->get('manual_sms_template');
        return $query->result();
    }

    function deleteManualSMSTemplate($id) {
        $this->db->where('id', $id);
        $this->db->delete('manual_sms_template');
    }

    function getManualSMSTemplateListSelect2($searchTerm, $type) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where("name like '%" . $searchTerm . "%' ");
            $this->db->where('type', $type);
            $fetched_records = $this->db->get('manual_sms_template');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(20);
            $fetched_records = $this->db->get('manual_sms_template');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name']);
        }
        return $data;
    }

    function getAutoSmsByType($type) {

        $this->db->where('type', $type);
        $query = $this->db->get('autosmstemplate');
        return $query->row();
    }

}

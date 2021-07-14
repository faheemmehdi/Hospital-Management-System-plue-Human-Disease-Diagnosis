<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pgateway_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getPaymentGatewaySettingsById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('paymentGateway');
        return $query->row();
    }
    
     function getPaymentGatewaySettingsByName($name) {
        $this->db->where('name', $name);
        $query = $this->db->get('paymentGateway');
        return $query->row();
    }

    function getPaymentGatewayByUser($user) {
        $this->db->order_by('id', 'desc');
        $this->db->where('user', $user);
        $query = $this->db->get('paymentGateway');
        return $query->result();
    }

    function getPaymentGatewaySettings() {
        $query = $this->db->get('paymentGateway');
        return $query->row();
    }

    function updatePaymentGatewaySettings($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('paymentGateway', $data);
    }

    function addPaymentGatewaySettings($data) {
        $this->db->insert('paymentGateway', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('paymentGateway');
    }

    function insertPaymentGateway($data) {
        $this->db->insert('paymentGateway', $data);
    }

    function getPaymentGateway() {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('paymentGateway');
        return $query->result();
    }

}

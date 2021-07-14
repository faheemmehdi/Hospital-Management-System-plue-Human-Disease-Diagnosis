<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bed_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertBed($data) {
        $this->db->insert('bed', $data);
    }

    function getBed() {
        $query = $this->db->get('bed');
        return $query->result();
    }

    function getBedWithoutSearch($order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $query = $this->db->get('bed');
        return $query->result();
    }

    function getBedBySearch($search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->like('id', $search);
        $this->db->or_like('bed_id', $search);
        $this->db->or_like('description', $search);
        $query = $this->db->get('bed');
        return $query->result();
    }

    function getBedByLimit($limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get('bed');
        return $query->result();
    }

    function getBedByLimitBySearch($limit, $start, $search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->like('id', $search);
        $this->db->or_like('bed_id', $search);
        $this->db->or_like('description', $search);
        $this->db->limit($limit, $start);
        $query = $this->db->get('bed');
        return $query->result();
    }

    function getBedById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('bed');
        return $query->row();
    }

    function updateBed($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('bed', $data);
    }

    function updateBedByBedId($bed_id, $data) {
        $this->db->where('bed_id', $bed_id);
        $this->db->update('bed', $data);
    }

    function insertBedCategory($data) {

        $this->db->insert('bed_category', $data);
    }

    function getBedCategory() {
        $query = $this->db->get('bed_category');
        return $query->result();
    }

    function getBedAllotmentsByPatientId($id) {
        $this->db->where('patient', $id);
        $query = $this->db->get('alloted_bed');
        return $query->result();
    }

    function getBedCategoryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('bed_category');
        return $query->row();
    }

    function updateBedCategory($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('bed_category', $data);
    }

    function deleteBed($id) {
        $this->db->where('id', $id);
        $this->db->delete('bed');
    }

    function deleteBedCategory($id) {
        $this->db->where('id', $id);
        $this->db->delete('bed_category');
    }

    function insertAllotment($data) {
        $this->db->insert('alloted_bed', $data);
    }

    function getAllotment() {
        $query = $this->db->get('alloted_bed');
        return $query->result();
    }

    function getAllotmentWithoutSearch($order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $query = $this->db->get('alloted_bed');
        return $query->result();
    }

    function getBedAllotmentBySearch($search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->like('id', $search);
        $this->db->or_like('bed_id', $search);
        $this->db->or_like('patientname', $search);
        $query = $this->db->get('alloted_bed');
        return $query->result();
    }

    function getBedAllotmentByLimit($limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get('alloted_bed');
        return $query->result();
    }

    function getBedAllotmentByLimitBySearch($limit, $start, $search, $order, $dir) {

        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->like('id', $search);

        $this->db->or_like('bed_id', $search);
        $this->db->or_like('patientname', $search);

        $this->db->limit($limit, $start);
        $query = $this->db->get('alloted_bed');
        return $query->result();
    }

    function getAllotmentById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('alloted_bed');
        return $query->row();
    }

    function updateAllotment($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('alloted_bed', $data);
    }

    function deleteBedAllotment($id) {
        $this->db->where('id', $id);
        $this->db->delete('alloted_bed');
    }

}

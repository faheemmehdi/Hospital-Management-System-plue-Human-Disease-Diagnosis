<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Medicine_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertMedicine($data) {
        $this->db->insert('medicine', $data);
    }

    function getMedicine() {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('medicine');
        return $query->result();
    }

    function getMedicineWithoutSearch($order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'asc');
        }
        $query = $this->db->get('medicine');
        return $query->result();
    }

    function getLatestMedicine() {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('medicine');
        return $query->result();
    }

    function getMedicineLimitByNumber($number) {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('medicine', $number);
        return $query->result();
    }

    function getMedicineByPageNumber($page_number) {
        $data_range_1 = 50 * $page_number;
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('medicine', 50, $data_range_1);
        return $query->result();
    }

    function getMedicineByStockAlert() {
        $this->db->where('quantity <=', 20);
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('medicine');
        return $query->result();
    }

    function getMedicineByStockAlertByPageNumber($page_number) {
        $data_range_1 = 50 * $page_number;
        $this->db->where('quantity <=', 20);
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('medicine', 50, $data_range_1);
        return $query->result();
    }

    function getMedicineById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('medicine');
        return $query->row();
    }

    function getMedicineByKeyByStockAlert($page_number, $key) {
        $data_range_1 = 50 * $page_number;

        $this->db->where('quantity <=', 20);
        $this->db->or_like('name', $key);
        $this->db->or_like('company', $key);



        $this->db->order_by('id', 'asc');
        $query = $this->db->get('medicine', 50, $data_range_1);
        return $query->result();
    }

    function getMedicineByKey($page_number, $key) {
        $data_range_1 = 50 * $page_number;
        $this->db->like('name', $key);
        $this->db->or_like('company', $key);
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('medicine', 50, $data_range_1);
        return $query->result();
    }

    function getMedicineByKeyForPos($key) {
        $this->db->like('name', $key);
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('medicine');
        return $query->result();
    }

    function updateMedicine($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('medicine', $data);
    }

    function insertMedicineCategory($data) {

        $this->db->insert('medicine_category', $data);
    }

    function getMedicineCategory() {
        $query = $this->db->get('medicine_category');
        return $query->result();
    }

    function getMedicineCategoryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('medicine_category');
        return $query->row();
    }

    function totalStockPrice() {
        $query = $this->db->get('medicine')->result();
        $stock_price = array();
        foreach ($query as $medicine) {
            $stock_price[] = $medicine->price * $medicine->quantity;
        }

        if (!empty($stock_price)) {
            return array_sum($stock_price);
        } else {
            return 0;
        }
    }

    function updateMedicineCategory($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('medicine_category', $data);
    }

    function deleteMedicine($id) {
        $this->db->where('id', $id);
        $this->db->delete('medicine');
    }

    function deleteMedicineCategory($id) {
        $this->db->where('id', $id);
        $this->db->delete('medicine_category');
    }

    function getMedicineBySearch($search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->like('id', $search);
        $this->db->or_like('category', $search);
        $this->db->or_like('name', $search);
        $this->db->or_like('e_date', $search);
        $this->db->or_like('generic', $search);
        $this->db->or_like('company', $search);
        $this->db->or_like('effects', $search);
        $query = $this->db->get('medicine');
        return $query->result();
    }

    function getMedicineByLimit($limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get('medicine');
        return $query->result();
    }

    function getMedicineByLimitBySearch($limit, $start, $search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->like('id', $search);
        $this->db->or_like('category', $search);
        $this->db->or_like('name', $search);
        $this->db->or_like('e_date', $search);
        $this->db->or_like('generic', $search);
        $this->db->or_like('company', $search);
        $this->db->or_like('effects', $search);

        $this->db->limit($limit, $start);
        $query = $this->db->get('medicine');
        return $query->result();
    }

    function getMedicineNameByAvailablity($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where("name like '%" . $searchTerm . "%' ");
            $fetched_records = $this->db->get('medicine');
            $query = $fetched_records->result();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('medicine');
            $query = $fetched_records->result();
        }

        return $query;
    }

    function getMedicineInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            //   $this->db->where('quantity >', '0');
            $this->db->where("name like '%" . $searchTerm . "%' ");
            $this->db->or_where("id like '%" . $searchTerm . "%' ");
            $fetched_records = $this->db->get('medicine');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            // $this->db->where('quantity >', '0');
            $this->db->limit(10);
            $fetched_records = $this->db->get('medicine');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'] . '*' . $user['name'], "text" => $user['name']);
        }
        return $data;
    }

    function getMedicineInfoForPharmacySale($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where('quantity >', '0');
            $this->db->where("name like '%" . $searchTerm . "%' ");
            $this->db->or_where("id like '%" . $searchTerm . "%' ");
            $fetched_records = $this->db->get('medicine');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('quantity >', '0');
            $this->db->limit(10);
            $fetched_records = $this->db->get('medicine');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'] . '*' . (float) $user['s_price'] . '*' . $user['name'] . '*' . $user['company'] . '*' . $user['quantity'], "text" => $user['name']);
        }
        return $data;
    }

    function getMedicineExpireAlertBySearch($search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('e_date <', time() + (86500 * 5));
        $this->db->like('id', $search);
        $this->db->or_like('category', $search);
        $this->db->or_like('name', $search);
        $this->db->or_like('e_date', $search);
        $this->db->or_like('generic', $search);
        $this->db->or_like('company', $search);
        $this->db->or_like('effects', $search);
        $query = $this->db->get('medicine');
        return $query->result();
    }

    function getMedicineExpireAlertByLimit($limit, $start, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->limit($limit, $start);
        $this->db->where('e_date <', time() + (86500 * 5));
        $query = $this->db->get('medicine');
        return $query->result();
    }

    function getMedicineExpireAlertByLimitBySearch($limit, $start, $search, $order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'desc');
        }
        $this->db->where('e_date <', time() + (86500 * 5));
        $this->db->like('id', $search);
        $this->db->or_like('category', $search);
        $this->db->or_like('name', $search);
        $this->db->or_like('e_date', $search);
        $this->db->or_like('generic', $search);
        $this->db->or_like('company', $search);
        $this->db->or_like('effects', $search);

        $this->db->limit($limit, $start);
        $query = $this->db->get('medicine');
        return $query->result();
    }

    function getMedicineExpireAlert() {
        $this->db->order_by('id', 'asc');
        $this->db->where('e_date <', time() + (86500 * 5));
        $query = $this->db->get('medicine');
        return $query->result();
    }

    function getMedicineExpireAlertWithoutSearch($order, $dir) {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('id', 'asc');
        }
        $this->db->where('e_date <', time() + (86500 * 5));
        $query = $this->db->get('medicine');
        return $query->result();
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Twocheckoutpay extends MX_Controller {

    function __construct() {
        parent::__construct();
        require APPPATH . 'third_party/twocheckout/Twocheckout.php';
        $this->load->model('finance/finance_model');
        $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row();
        Twocheckout::verifySSL(false);
        Twocheckout::sellerId($twocheckout->merchantcode);
        Twocheckout::privateKey($twocheckout->privatekey);
        //  if ($twocheckout->status == 'test') {
        //    Twocheckout::sandbox(true);
        //} else {
        //   Twocheckout::sandbox(false);
        //}
    }

    function index() {
        $this->load->view('test');
    }

    function createCharge($merchantOrderID, $token, $amount, $data) {
        // corrency code
        // echo 'hi';
        $currency = $this->currencyCode();
        $patientdetails = $this->db->get_where('patient', array('id =' => $data['patient']))->row();
        $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row();
        try {
            // Charge a credit or a debit card 
            if ($twocheckout->status == 'test') {
                $charge = Twocheckout_Charge::auth(array(
                "sellerId" => $twocheckout->merchantcode,
                "privateKey"=> $twocheckout->privatekey,
                "merchantOrderId" => $merchantOrderID,
                "token" => $token,
                "currency" => $currency,
                "total" => $amount,
                "demo" => true,
                "billingAddr" => array(
                "name" => $patientdetails->name,
                "addrLine1" => $patientdetails->address,
                "city" => 'New York',
                "state" =>'New York',
                "zipCode" => '10001',
                "country" => 'USA',
                "email" => $patientdetails->email,
                "phoneNumber" => $patientdetails->phone
                )
                ));
            } else {
                $charge = Twocheckout_Charge::auth(array(
                            "sellerId" => $twocheckout->merchantcode,
                            "merchantOrderId" => $merchantOrderID,
                            "token" => $token,
                            "currency" => $currency,
                            "total" => $amount,
                            "billingAddr" => array(
                                "name" => $data,
                                "addrLine1" => $patientdetails->address,
                                "city" => "Anchorage",
                                "state" => "Alaska",
                                "zipCode" => "99501",
                                "country" => "USA",
                                "email" => $patientdetails->email,
                                "phoneNumber" => $patientdetails->phone
                            )
                ));
            }

            // Retrieve charge information             
            return $charge;
        } catch (Exception $e) {
            $this->api_error = $e->getMessage();
           
            return false;
        }
    }

    function currencyCode() {
        $currency = $this->db->get('settings')->row()->currency;
        if ($currency == '$' || strtoupper($currency) == 'USD') {
            $currency = 'USD';
        }
        if ($currency == 'R' || strtoupper($currency) == 'ZAR') {
            $currency = 'ZAR';
        }
        if (strtoupper($currency) == 'TK' || strtoupper($currency) == 'BDT' || strtoupper($currency) == 'TAKA' || $currency == 'ট') {
            $currency = 'BDT';
        }
        if (strtoupper($currency) == 'CNY') {
            $currency = 'CNY';
        }
        if ($currency == '€' || strtoupper($currency) == 'EUR') {
            $currency = 'EUR';
        }
        if ($currency == '₹' || strtoupper($currency) == 'INR') {
            $currency = 'INR';
        }
        if (strtoupper($currency) == 'CNY') {
            $currency = 'CNY';
        }
        if (strtoupper($currency) == 'BRL' || $currency == 'R$') {
            $currency = 'BRL';
        }
        if (strtoupper($currency) == 'GBP' || $currency == '£') {
            $currency = 'GBP';
        }
        if (strtoupper($currency) == 'IDR' || $currency == 'Rp') {
            $currency = 'IDR';
        }
        if (strtoupper($currency) == 'NGN' || $currency == '₦') {
            $currency = 'NGN';
        }
        if (strtoupper($currency) == 'PKR' || $currency == 'Rs') {
            $currency = 'PKR';
        }
        return $currency;
    }

}

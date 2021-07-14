<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sslcommerzpayment extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('finance/finance_model');
    }

    public function index() {
        $this->load->view('home');
    }

    public function hosted_view() {
        $this->load->view('hostedcheckout');
    }

    public function easycheckout_view() {
        $this->load->view('easycheckout');
    }

    public function request_api_hosted($amount_received, $patient, $inserted_id, $user, $redirectlink) {
        $patientdetails = $this->db->get_where('patient', array('id =' => $patient))->row();
        $setingsdetails = $this->db->get('settings')->row();
        $SSLCOMMERZ = $this->db->get_where('paymentGateway', array('name =' => 'SSLCOMMERZ'))->row();

        $post_data = array();
        $post_data['total_amount'] = $amount_received;
        if ($setingsdetails->currency == '$' || strtolower($setingsdetails->currency) == 'usd') {
            $post_data['currency'] = "USD";
        }
        if (strtolower($setingsdetails->currency) == 'taka' || strtolower($setingsdetails->currency) == 'tk' || strtolower($setingsdetails->currency) == 'bdt' || $setingsdetails->currency == 'ট') {
            $post_data['currency'] = "BDT";
        }
        if (strtolower($setingsdetails->currency) == 'euro') {
            $post_data['currency'] = "EURO";
        }
        $post_data['store_id'] = $SSLCOMMERZ->store_id;
        $post_data['store_passwd'] = $SSLCOMMERZ->store_password;
        $post_data['tran_id'] = "SSLC" . uniqid();
        $post_data['success_url'] = base_url() . "sslcommerzpayment/success";
        $post_data['fail_url'] = base_url() . "sslcommerzpayment/fail_payment";
        $post_data['cancel_url'] = base_url() . "sslcommerzpayment/cancel_payment";
        //  $post_data['ipn_url'] = base_url() . "sslcommerzpayment/ipn_listener";
        //  $post_data['multi_card_name'] = ""; 
        // $post_data['multi_card_name'] = "mastercard,visacard,amexcard,brac_visa,dbbl_visa,city_visa,ebl_visa,brac_master,dbbl_master,city_master,ebl_master,city_amex,qcash,dbbl_nexus,bankasia,abbank,ibbl,mtbl,city,bankasia,mtbl,city";
//$post_data['allowed_bin'] = "371598,371599,376947,376948,376949";
//$post_data['multi_card_name'] = "";
        # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE
        # EMI INFO
        // $post_data['emi_option'] = "1";
        // $post_data['emi_max_inst_option'] = "9";
        // $post_data['emi_selected_inst'] = "9";
        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $patientdetails->name;
        $post_data['cus_email'] = $patientdetails->email;
        $post_data['cus_add1'] = $patientdetails->address;
        //   $post_data['cus_city'] = $this->input->post('state');
        //   $post_data['cus_state'] = $this->input->post('state');
        //  $post_data['cus_postcode'] = $this->input->post('postcode');
        //  $post_data['cus_country'] = $this->input->post('country');
        $post_data['cus_phone'] = $patientdetails->phone;

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = $setingsdetails->system_vendor;
        $post_data['ship_add1'] = $setingsdetails->address;
        /* $post_data['ship_city'] = $this->input->post('state');
          $post_data['ship_state'] = $this->input->post('state');
          $post_data['ship_postcode'] = $this->input->post('postcode');
          $post_data['ship_country'] = $this->input->post('country'); */

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = $inserted_id;
        $post_data['value_b'] = $patient;
        $post_data['value_c'] = $user;
        $post_data['value_d'] = $redirectlink;
        //  $post_data['product_profile'] = "physical-goods";
        //  $post_data['shipping_method'] = "YES";
        //  $post_data['num_of_item'] = $count;
        //   $post_data['product_name'] = "Computer,Speaker";
        //  $post_data['product_category'] = "Ecommerce";
        //  $this->load->library('session');

        /* $session = array(
          'tran_id' => $post_data['tran_id'],
          'amount' => $post_data['total_amount'],
          'currency' => $post_data['currency']
          );
          $this->session->set_userdata('tarndata', $session);

          echo "<pre>";
          //  print_r($post_data);
          $this->load->library('sslcommerz');
          $this->load->helper('sslc');
         */
        if ($SSLCOMMERZ->status == 'test') {
            $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";
        } else {
            $direct_api_url = "https://securepay.sslcommerz.com/gwprocess/v3/api.php";
        }
        $session = array(
            'tran_id' => $post_data['tran_id'],
            'amount' => $post_data['total_amount'],
            'currency' => $post_data['currency']
        );
        $this->session->set_userdata('tarndata', $session);



        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url);
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


        $content = curl_exec($handle);

        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if ($code == 200 && !( curl_errno($handle))) {
            curl_close($handle);
            $sslcommerzResponse = $content;
        } else {
            curl_close($handle);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }

# PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true);

        if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {
            # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
            # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
            echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
            # header("Location: ". $sslcz['GatewayPageURL']);
            exit;
        } else {
            echo "JSON Data parsing error!";
        }
    }

    public function success() {
        $sesdata = $this->session->userdata('tarndata');
        $SSLCOMMERZ = $this->db->get_where('paymentGateway', array('name =' => 'SSLCOMMERZ'))->row();
        $store_id = $SSLCOMMERZ->store_id;
        $store_password = $SSLCOMMERZ->store_password;
        $val_id = urlencode($_POST['val_id']);
        $store_id = urlencode($store_id);
        $store_passwd = urlencode($store_password);
        if ($SSLCOMMERZ->status == 'test') {
            $sesdata = $this->session->userdata('tarndata');
            $requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=" . $val_id . "&store_id=" . $store_id . "&store_passwd=" . $store_passwd . "&v=1&format=json");
        } else {
            $sesdata = $this->session->userdata('tarndata');
            $requested_url = ("https://securepay.sslcommerz.com/validator/api/validationserverAPI.php?val_id=" . $val_id . "&store_id=" . $store_id . "&store_passwd=" . $store_passwd . "&v=1&format=json");
        }


        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $requested_url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

        $result = curl_exec($handle);

        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if ($code == 200 && !( curl_errno($handle))) {
            $sesdata = $this->session->userdata('tarndata');
            # TO CONVERT AS ARRAY
            # $result = json_decode($result, true);
            # $status = $result['status'];
            # TO CONVERT AS OBJECT
            $result = json_decode($result);

            $this->deposit($result);
            // print_r($result);
            //   die();
            # TRANSACTION INFO
            //$status = $result->status;
            /*   $tran_date = $result->tran_date;
              $tran_id = $result->tran_id;
              $val_id = $result->val_id;
              $amount = $result->amount;
              $store_amount = $result->store_amount;
              $bank_tran_id = $result->bank_tran_id;
              $card_type = $result->card_type;

              # EMI INFO
              $emi_instalment = $result->emi_instalment;
              $emi_amount = $result->emi_amount;
              $emi_description = $result->emi_description;
              $emi_issuer = $result->emi_issuer;

              # ISSUER INFO
              $card_no = $result->card_no;
              $card_issuer = $result->card_issuer;
              $card_brand = $result->card_brand;
              $card_issuer_country = $result->card_issuer_country;
              $card_issuer_country_code = $result->card_issuer_country_code;

              # API AUTHENTICATION
              $APIConnect = $result->APIConnect;
              $validated_on = $result->validated_on;
              $gw_version = $result->gw_version; */
            //$user = $_POST['value_c'];
            //    $patient = $_POST['value_b'];
            //    $inserted_id = $_POST['value_a'];
            //    $amount = $result->amount;
            // if ($status == 'valid') {
            //     exit;
            // }
        } else {

            echo "Failed to connect with SSLCOMMERZ";
        }
    }

    public function deposit($post_data) {
        $sesdata = $this->session->userdata('tarndata');
        $date = time();
        if ($post_data->value_d == '1') {

            $data1 = array(
                'date' => $date,
                'patient' => $post_data->value_b,
                'deposited_amount' => $post_data->amount,
                'payment_id' => $post_data->value_a,
                'amount_received_id' => $post_data->value_a . '.' . 'gp',
                'deposit_type' => 'Card',
                'gateway' => 'SSLCOMMERZ',
                'user' => $post_data->value_c
            );

            $this->finance_model->insertDeposit($data1);

            $data_payment = array('amount_received' => $post_data->amount, 'deposit_type' => 'Card');
            $this->finance_model->updatePayment($post_data->value_a, $data_payment);
            redirect("finance/invoice?id=" . $post_data->value_a);
            //    $this->helperFileReWriteAftertransaction();
            // $this->session->set_flashdata('feedback', lang('added'));
        } if ($post_data->value_d == '0') {
            $sesdata = $this->session->userdata('tarndata');
            $data1 = array(
                'date' => $date,
                'patient' => $post_data->value_b,
                'deposited_amount' => $post_data->amount,
                'payment_id' => $post_data->value_a,
                'gateway' => 'SSLCOMMERZ',
                'deposit_type' => 'Card',
                'user' => $post_data->value_c
            );

            $this->finance_model->insertDeposit($data1);
            //  redirect('finance/patientPaymentHistory?patient=' .$post_data->value_b );

            $this->redirectlink($post_data->value_b);
        }
    }

    public function redirectlink($patient) {
        $sesdata = $this->session->userdata('tarndata');
        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect("patient/myPaymentHistory");
        } else {
            $sesdata = $this->session->userdata('tarndata');
            redirect('finance/patientPaymentHistory?patient=' . $patient);
        }
    }

    public function fail_payment() {
        // $this->helperFileReWriteAftertransaction();
        $sesdata = $this->session->userdata('tarndata');

        $this->session->set_flashdata('feedback', '"Transaction Failed"');

        if ($_POST['value_d'] == '0') {
            $sesdata = $this->session->userdata('tarndata');
            $this->redirectlink($_POST['value_b']);
        } else {
            $sesdata = $this->session->userdata('tarndata');
            redirect("finance/invoice?id=" . $_POST['value_a']);
        }
        //exit();
    }

    public function cancel_payment() {
        $sesdata = $this->session->userdata('tarndata');

        $this->session->set_flashdata('feedback', '"Transaction Failed"');

        if ($_POST['value_d'] == '0') {
            $sesdata = $this->session->userdata('tarndata');
            $this->redirectlink($_POST['value_b']);
        } else {
            $sesdata = $this->session->userdata('tarndata');
            redirect("finance/invoice?id=" . $_POST['value_a']);
        }
    }

    public function ipn_listener() {
        $database_order_status = 'Pending'; // Check this from your database here Pending is dummy data,
        $store_passwd = SSLCZ_STORE_PASSWD;
        if ($ipn = $this->sslcommerz->ipn_request($store_passwd, $_POST)) {
            if (($ipn['gateway_return']['status'] == 'VALIDATED' || $ipn['gateway_return']['status'] == 'VALID') && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS') {
                if ($database_order_status == 'Pending') {
                    echo $ipn['gateway_return']['status'] . "<br>";
                    echo $ipn['ipn_result']['hash_validation_status'] . "<br>";
                    /*                     * ***************************************************************************
                      # Check your database order status, if status = 'Pending' then chang status to 'Processing'.
                     * **************************************************************************** */
                }
            } elseif ($ipn['gateway_return']['status'] == 'FAILED' && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS') {
                if ($database_order_status == 'Pending') {
                    echo $ipn['gateway_return']['status'] . "<br>";
                    echo $ipn['ipn_result']['hash_validation_status'] . "<br>";
                    /*                     * ***************************************************************************
                      # Check your database order status, if status = 'Pending' then chang status to 'FAILED'.
                     * **************************************************************************** */
                }
            } elseif ($ipn['gateway_return']['status'] == 'CANCELLED' && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS') {
                if ($database_order_status == 'Pending') {
                    echo $ipn['gateway_return']['status'] . "<br>";
                    echo $ipn['ipn_result']['hash_validation_status'] . "<br>";
                    /*                     * ***************************************************************************
                      # Check your database order status, if status = 'Pending' then chang status to 'CANCELLED'.
                     * **************************************************************************** */
                }
            } else {
                if ($database_order_status == 'Pending') {
                    echo "Order status not " . $ipn['gateway_return']['status'];
                    /*                     * ***************************************************************************
                      # Check your database order status, if status = 'Pending' then chang status to 'FAILED'.
                     * **************************************************************************** */
                }
            }
            echo "<pre>";
            print_r($ipn);
        }
    }

}

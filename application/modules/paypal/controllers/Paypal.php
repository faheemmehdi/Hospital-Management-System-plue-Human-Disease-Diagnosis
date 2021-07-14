<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include("./vendor/autoload.php");

use Omnipay\Omnipay;

class Paypal extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('finance/finance_model');
    }

    public function paymentPaypal($data) {
        $paypal = $this->db->get_where('paymentGateway', array('name =' => 'PayPal'))->row();
        $gateway = Omnipay::create('PayPal_Pro');
        $gateway->setUsername($paypal->APIUsername);
        $gateway->setPassword($paypal->APIPassword);
        $gateway->setSignature($paypal->APISignature);
        if ($paypal->status == 'test') {
            $gateway->setTestMode(true); // here 'true' is for sandbox. Pass 'false' when go live
        } else {
            $gateway->setTestMode(false);
        }
        $arr_expiry = explode("/", $data['expire_date']);
        $cardholdername = explode(" ", $data['cardholdername']);
        $currency = $this->currencyCode();
        $formData = array(
            'firstName' => trim($cardholdername[0]),
            'lastName' => trim($cardholdername[1]),
            'number' => $data['card_number'],
            'expiryMonth' => trim($arr_expiry[0]),
            'expiryYear' => trim($arr_expiry[1]),
            'cvv' => $data['cvv']
        );

        try {
            // Send purchase request
            $response = $gateway->purchase([
                        'amount' => $data['deposited_amount'],
                        'currency' => $currency,
                        'card' => $formData
                    ])->send();

            // Process response
            if ($response->isSuccessful()) {

                // Payment was successful
                if ($data['from'] == 'pos') {
                    $data1 = array(
                        'date' => $date,
                        'patient' => $data['patient'],
                        'deposited_amount' => $data['deposited_amount'],
                        'payment_id' => $data['payment_id'],
                        'amount_received_id' => $data['payment_id'] . '.' . 'gp',
                        'gateway' => 'PayPal',
                        'deposit_type' => 'Card',
                        'user' => $this->ion_auth->get_user_id()
                    );
                    $this->finance_model->insertDeposit($data1);

                    $data_payment = array('amount_received' => $data['deposited_amount'], 'deposit_type' => 'Card');
                    $this->finance_model->updatePayment($data['payment_id'], $data_payment);

                    $this->session->set_flashdata('feedback', lang('payment_successful'));
                    redirect("finance/invoice?id=" . $data['payment_id']);
                } else {
                    $date = time();
                    $data1 = array('patient' => $data['patient'],
                        'date' => $date,
                        'payment_id' => $data['payment_id'],
                        'deposited_amount' => $data['deposited_amount'],
                        'deposit_type' => 'Card',
                        'gateway' => 'PayPal',
                        'user' => $this->ion_auth->get_user_id()
                    );
                    $this->finance_model->insertDeposit($data1);
                    $this->session->set_flashdata('feedback', lang('payment_successful'));
                    if ($this->ion_auth->in_group(array('Patient'))) {
                        redirect('patient/myPaymentHistory');
                    } else {
                        redirect('finance/patientPaymentHistory?patient=' . $data['patient']);
                    }

                    //redirect('finance/patientPaymentHistory?patient=' . $data['patient']);
                }
            } else {
                // Payment failed
                //  echo "Payment failed. " . $response->getMessage();
                if ($data['from'] == 'pos') {
                    $this->session->set_flashdata('feedback', lang('transaction_failed'));
                    redirect("finance/invoice?id=" . $data['payment_id']);
                } else {
                    $this->session->set_flashdata('feedback', lang('transaction_failed'));
                    if ($this->ion_auth->in_group(array('Patient'))) {
                        redirect('patient/myPaymentHistory');
                    } else {
                        redirect('finance/patientPaymentHistory?patient=' . $data['patient']);
                    }
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
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

        if (strtoupper($currency) == 'RS' || strtoupper($currency) == 'INR' || strtoupper($currency) == 'RUPEE') {
            $currency = 'INR';
        }
        if (strtoupper($currency) == 'AUD') {
            $currency = 'AUD';
        }
        if (strtoupper($currency) == 'CAD') {
            $currency = 'CAD';
        }
        return $currency;
    }

}

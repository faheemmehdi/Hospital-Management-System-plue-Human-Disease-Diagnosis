<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

include("./vendor/autoload.php");

use net\authorize\api\contract\v1 as AnetAPI;

class Authorizenet extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('finance/finance_model');
    }

    function index() {
        
    }

    function paymentAuthorize($data, $redirect) {
        //  include("./vendor/autoload.php");
        // $AnetAPI="net\authorize\api\contract\v1";
        //   $AnetController="net\authorize\api\controller";
        //  use net\authorize\api\contract\v1 as AnetAPI;
//  use net\authorize\api\controller as AnetController;
       
        $patientdetails = $this->db->get_where('patient', array('id =' => $data['patient']))->row();



        $authorizenet = $this->db->get_where('paymentGateway', array('name =' => 'Authorize.Net'))->row();
        $apiloginid = $authorizenet->apiloginid;
        $transactionkey = $authorizenet->transactionkey;
        $merchanAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchanAuthentication->setName($apiloginid);
        $merchanAuthentication->setTransactionKey($transactionkey);
        $refId = $data['ref'];
        //$merchant_website = $authorizenet->merchant_website;
        // Create the payment data for a credit card
        $expiredate = explode('/', $data['expire_date']);
        $dt = DateTime::createFromFormat('y', $expiredate['1']);
        $expirecard = $dt->format('Y') . '-' . $expiredate['0'];

        //  $this->load->library('encrypt');
        $card_number = base64_decode($data['card_number']);
        $cvv = base64_decode($data['cvv']);

        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($card_number);
        $creditCard->setExpirationDate($expirecard);
        $creditCard->setCardCode($cvv);

        // Add the payment data to a paymentType object
        $paymentOne = new net\authorize\api\contract\v1\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create order information
        $order = new net\authorize\api\contract\v1\OrderType();
        $order->setInvoiceNumber($data['insertid']);
        //  $order->setDescription("Golf Shirts");
        // Set the customer's Bill To address
        $customerAddress = new net\authorize\api\contract\v1\CustomerAddressType();
        $customerAddress->setFirstName($patientdetails->name);
        // $customerAddress->setLastName("Johnson");
        //  $customerAddress->setCompany("Souveniropolis");
        $customerAddress->setAddress($patientdetails->address);
        //   $customerAddress->setCity("Pecan Springs");
        //   $customerAddress->setState("TX");
        //  $customerAddress->setZip("44628");
        //   $customerAddress->setCountry("USA");
        // Set the customer's identifying information
        $customerData = new net\authorize\api\contract\v1\CustomerDataType();
        $customerData->setType("individual");
        $customerData->setId($patientdetails->id . rand());
        $customerData->setEmail($patientdetails->email);

        // Add values for transaction settings
        $duplicateWindowSetting = new net\authorize\api\contract\v1\SettingType();
        $duplicateWindowSetting->setSettingName("duplicateWindow");
        $duplicateWindowSetting->setSettingValue("60");

        // Add some merchant defined fields. These fields won't be stored with the transaction,
        // but will be echoed back in the response.
        $merchantDefinedField1 = new net\authorize\api\contract\v1\UserFieldType();
        $merchantDefinedField1->setName("insertid");
        $merchantDefinedField1->setValue($data['insertid']);

        $merchantDefinedField2 = new net\authorize\api\contract\v1\UserFieldType();
        $merchantDefinedField2->setName("patient");
        $merchantDefinedField2->setValue($data['patient']);

        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new net\authorize\api\contract\v1\TransactionRequestType();
        $transactionRequestType->setTransactionType("authOnlyTransaction");
        $transactionRequestType->setAmount($data['amount']);
        $transactionRequestType->setOrder($order);
        $transactionRequestType->setPayment($paymentOne);
        $transactionRequestType->setBillTo($customerAddress);
        $transactionRequestType->setCustomer($customerData);
        $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
        $transactionRequestType->addToUserFields($merchantDefinedField1);
        $transactionRequestType->addToUserFields($merchantDefinedField2);

        // Assemble the complete transaction request


        $request = new net\authorize\api\contract\v1\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchanAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);

        // Create the controller and get the response
        $controller = new net\authorize\api\controller\CreateTransactionController($request);
        if( $authorizenet->status=='test'){
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
        }else{
              $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        }
      //  print_r($response);
      //  die();

        if ($response != null) {
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == "Ok") {
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();


                if ($tresponse != null && $tresponse->getMessages() != null) {
                    if ($redirect == 'pos') {
                        $data1 = array(
                            'date' => $date,
                            'patient' => $data['patient'],
                            'deposited_amount' => $data['amount'],
                            'payment_id' => $data['insertid'],
                            'amount_received_id' => $data['insertid'] . '.' . 'gp',
                            'gateway' => 'Authorize.Net',
                            'deposit_type' => 'Card',
                            'user' => $this->ion_auth->get_user_id()
                        );
                        $this->finance_model->insertDeposit($data1);

                        $data_payment = array('amount_received' => $data['amount'], 'deposit_type' => 'Card');
                        $this->finance_model->updatePayment($data['insertid'], $data_payment);

                        $this->session->set_flashdata('feedback', lang('payment_successful'));
                        redirect("finance/invoice?id=" . $data['insertid']);
                    }
                    if ($redirect == 'findep') {
                        $date = time();
                        $data1 = array('patient' => $data['patient'],
                            'date' => $date,
                            'payment_id' => $data['insertid'],
                            'deposited_amount' => $data['amount'],
                            'deposit_type' => 'Card',
                            'gateway' => 'Authorize.Net',
                            'user' => $this->ion_auth->get_user_id()
                        );
                        $this->finance_model->insertDeposit($data1);
                        $this->session->set_flashdata('feedback', lang('payment_successful'));
                        redirect('finance/patientPaymentHistory?patient=' . $data['patient']);
                    }
                    if ($redirect == 'patdep') {
                        $date = time();
                        $data1 = array('patient' => $data['patient'],
                            'date' => $date,
                            'payment_id' => $data['insertid'],
                            'deposited_amount' => $data['amount'],
                            'deposit_type' => 'Card',
                            'gateway' => 'Authorize.Net',
                            'user' => $this->ion_auth->get_user_id()
                        );
                        $this->finance_model->insertDeposit($data1);
                        $this->session->set_flashdata('feedback', lang('payment_successful'));
                        redirect('patient/myPaymentHistory');
                    }
                } else {
                    if ($redirect == 'pos') {
                        $this->session->set_flashdata('feedback', lang('transaction_failed'));
                        redirect("finance/invoice?id=" . $data['insertid']);
                    } if ($redirect == 'findep') {
                        $this->session->set_flashdata('feedback', lang('transaction_failed'));
                        redirect('finance/patientPaymentHistory?patient=' . $data['patient']);
                    }
                    if ($redirect == 'patdep') {
                        $this->session->set_flashdata('feedback', lang('transaction_failed'));
                        redirect('patient/myPaymentHistory');
                    }
                    //  echo ;
                }
                // Or, print errors if the API request wasn't successful
            } else {
                // echo "Transaction Failed \n";
                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getErrors() != null) {
                    if ($redirect == 'pos') {
                        $this->session->set_flashdata('feedback', lang('transaction_failed'));
                        redirect("finance/invoice?id=" . $data['insertid']);
                    } if ($redirect == 'findep') {
                        $this->session->set_flashdata('feedback', lang('transaction_failed'));
                        redirect('finance/patientPaymentHistory?patient=' . $data['patient']);
                    }
                    if ($redirect == 'patdep') {
                        $this->session->set_flashdata('feedback', lang('transaction_failed'));
                        redirect('patient/myPaymentHistory');
                    }
                } else {
                    if ($redirect == 'pos') {
                        $this->session->set_flashdata('feedback', lang('transaction_failed'));
                        redirect("finance/invoice?id=" . $data['insertid']);
                    } if ($redirect == 'findep') {
                        $this->session->set_flashdata('feedback', lang('transaction_failed'));
                        redirect('finance/patientPaymentHistory?patient=' . $data['patient']);
                    }
                    if ($redirect == 'patdep') {
                        $this->session->set_flashdata('feedback', lang('transaction_failed'));
                        redirect('patient/myPaymentHistory');
                    }
                }
            }
        } else {

            if ($redirect == 'pos') {
                $this->session->set_flashdata('feedback', lang('no_response'));
                redirect("finance/invoice?id=" . $data['insertid']);
            }
            if ($redirect == 'findep') {
                $this->session->set_flashdata('feedback', lang('no_response'));
                redirect('finance/patientPaymentHistory?patient=' . $data['patient']);
            }
            if ($redirect == 'patdep') {
                $this->session->set_flashdata('feedback', lang('no_response'));
                redirect('patient/myPaymentHistory');
            }
        }

        //   return $response;
    }

}

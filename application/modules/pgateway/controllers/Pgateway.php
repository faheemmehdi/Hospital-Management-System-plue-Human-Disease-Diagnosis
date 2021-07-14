<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pgateway extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('pgateway_model');
        $this->load->model('patient/patient_model');
        $this->load->model('donor/donor_model');
        $this->load->model('doctor/doctor_model');
    }

    public function index() {
        $data = array();
        $id = $this->ion_auth->get_user_id();
        $data['settings'] = $this->settings_model->getSettings();
        $data['pgateways'] = $this->pgateway_model->getPaymentGateway();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('pgateway', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function settings() {
        $data = array();
        $id = $this->input->get('id');
        $data['settings'] = $this->pgateway_model->getPaymentGatewaySettingsById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('settings', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function addNewSettings() {

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $merchant_key = $this->input->post('merchant_key');
        $merchant_mid = $this->input->post('merchant_mid');
        $merchant_website = $this->input->post('merchant_website');
        $salt = $this->input->post('salt');

        $APIUsername = $this->input->post('APIUsername');
        $APIPassword = $this->input->post('APIPassword');
        $APIUSignature = $this->input->post('APISignature');
//2checkout
        $merchantcode = $this->input->post('merchantcode');
        $privatekey = $this->input->post('privatekey');
        $publishablekey = $this->input->post('publishablekey');
       
        //end
        //authorize net
        $apiloginid = $this->input->post('apiloginid');
        $transactionkey = $this->input->post('transactionkey');
        $apikey = $this->input->post('apikey');
        //end
        $status = $this->input->post('status');
        $secret = $this->input->post('secret');
        $publish = $this->input->post('publish');
        $public_key = $this->input->post('public_key');
        $pgateway = $this->pgateway_model->getPaymentGatewaySettingsById($id);
        $store_id = $this->input->post('store_id');
        $store_password = $this->input->post('store_password');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($pgateway->name == 'Pay U Money') {
            // Validating Name Field
            $this->form_validation->set_rules('merchant_key', 'Merchant Key', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Email Field
            $this->form_validation->set_rules('salt', 'Salt Id', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        }
        if ($pgateway->name == 'Authorize.Net') {
            // Validating Name Field
            $this->form_validation->set_rules('apiloginid', 'API Login Id', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Email Field
            $this->form_validation->set_rules('transactionkey', 'Transaction Key', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Email Field
            //     $this->form_validation->set_rules('apikey', 'API Key', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        }
        if ($pgateway->name == 'Stripe') {

            $this->form_validation->set_rules('secret', 'API Secret Key', 'required|trim|xss_clean');
            $this->form_validation->set_rules('publish', 'API Publish Key', 'required|trim|xss_clean');
        }
        if ($pgateway->name == 'PayPal') {
            // Validating Name Field
            $this->form_validation->set_rules('APIUsername', 'API Username', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Email Field
            $this->form_validation->set_rules('APIPassword', 'API Password', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Email Field
            $this->form_validation->set_rules('APISignature', 'APISignature Signature', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        }
        if ($pgateway->name == '2Checkout') {
            // Validating Name Field
            $this->form_validation->set_rules('merchantcode', 'Merchant Code', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Email Field
            $this->form_validation->set_rules('publishablekey', 'Publishable key', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Email Field
            $this->form_validation->set_rules('privatekey', 'Private key', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        }
        if ($pgateway->name == 'Paytm') {
            // Validating Name Field
            $this->form_validation->set_rules('merchant_website', 'Merchant Website', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Email Field
            $this->form_validation->set_rules('merchant_mid', 'Merchant MID', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Email Field
            $this->form_validation->set_rules('merchant_key', 'Merchant Key', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        }
        if ($pgateway->name == 'Paystack') {
            // Validating Name Field
            $this->form_validation->set_rules('public_key', 'Public Key', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Email Field
            $this->form_validation->set_rules('secret', 'secretkey', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        }
        if ($pgateway->name == 'SSLCOMMERZ') {
            // Validating Name Field
            $this->form_validation->set_rules('store_id', 'store id', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Email Field
            $this->form_validation->set_rules('store_password', 'store password', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        }
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            //  $id = $this->ion_auth->get_user_id();
            $data['settings'] = $this->pgateway_model->getPaymentGatewaySettingsById($id);
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('settings', $data);
            $this->load->view('home/footer'); // just the footer file
        } else {
            $data = array();

            if ($pgateway->name == 'Pay U Money') {
                $data = array(
                    'name' => $name,
                    'merchant_key' => $merchant_key,
                    'salt' => $salt,
                    'status' => $status
                );
            }
            if ($pgateway->name == '2Checkout') {
                $data = array(
                    'name' => $name,
                    'merchantcode' => $merchantcode,
                    'publishablekey' => $publishablekey,
                    'privatekey' => $privatekey,
                    'status' => $status
                );
            }
            if ($pgateway->name == 'Stripe') {
                $data = array(
                    'secret' => $secret,
                    'publish' => $publish,
                    'status' => $status
                );
            }
            if ($pgateway->name == 'Authorize.Net') {
                $data = array(
                    'apiloginid' => $apiloginid,
                    'transactionkey' => $transactionkey,
                    // 'apikey' => $apikey,
                    'status' => $status
                );
            }
            if ($pgateway->name == 'SSLCOMMERZ') {
                $data = array(
                    'store_id' => $store_id,
                    'store_password' => $store_password,
                    'status' => $status
                );
            }
            if ($pgateway->name == 'Paytm') {
                $data = array(
                    'merchant_mid' => $merchant_mid,
                    'merchant_website' => $merchant_website,
                    'merchant_key' => $merchant_key,
                    'status' => $status
                );
            }
            if ($pgateway->name == 'Paystack') {
                $data = array(
                    'secret' => $secret,
                    'public_key' => $public_key,
                    'status' => $status
                );
            }
            if ($pgateway->name == 'PayPal') {
                $data = array(
                    'name' => $name,
                    'APIUsername' => $APIUsername,
                    'APIPassword' => $APIPassword,
                    'APISignature' => $APIUSignature,
                    'status' => $status
                );
            }

            if (empty($this->pgateway_model->getPaymentGatewaySettingsById($id)->name)) {
                $this->pgateway_model->addPaymentGatewaySettings($data);
                $this->session->set_flashdata('feedback', lang('added'));
            } else {
                $this->pgateway_model->updatePaymentGatewaySettings($id, $data);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            redirect('pgateway');
        }
    }

    function sent() {
        if ($this->ion_auth->in_group(array('admin'))) {
            $data['sents'] = $this->pgateway_model->getPaymentGateway();
        } else {
            $current_user_id = $this->ion_auth->user()->row()->id;
            $data['sents'] = $this->pgateway_model->getPaymentGatewayByUser($current_user_id);
        }

        $this->load->view('home/dashboard');
        $this->load->view('pgateway', $data);
        $this->load->view('home/footer');
    }

    function delete() {
        $id = $this->input->get('id');
        $this->pgateway_model->delete($id);
        $this->session->set_flashdata('feedback', lang('deleted'));
        redirect('pgateway/sent');
    }

}

/* End of file profile.php */
/* Location: ./application/modules/profile/controllers/profile.php */

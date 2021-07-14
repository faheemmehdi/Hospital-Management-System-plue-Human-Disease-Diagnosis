<?php
/**
 * Created By Trimmytech
 * Fiverr Handle : @trimmytech
 * Date: 4/14/2018
 * Time: 9:26 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Paytm extends MX_Controller {

    function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('finance/finance_model');
        $paytm = $this->db->get_where('paymentGateway', array('name =' => 'Paytm'))->row();
        $merchant_key = $paytm->merchant_key;
        $merchant_mid = $paytm->merchant_mid;
        $merchant_website = $paytm->merchant_website;
        if ($paytm->status == 'test') {
            $status = 'TEST';
        } else {
            $tatus = 'PROD';
        }
        define('PAYTM_ENVIRONMENT', $status); // PROD
        define('PAYTM_MERCHANT_KEY', $merchant_key); //Change this constant's value with Merchant key received from Paytm.
        define('PAYTM_MERCHANT_MID', $merchant_mid); //Change this constant's value with MID (Merchant ID) received from Paytm.
        define('PAYTM_MERCHANT_WEBSITE', $merchant_website); //Change this constant's value with Website name received from Paytm.

        $PAYTM_STATUS_QUERY_NEW_URL = 'https://securegw-stage.paytm.in/order/status';
        $PAYTM_TXN_URL = 'https://securegw-stage.paytm.in/order/process';
        if (PAYTM_ENVIRONMENT == 'PROD') {
            $PAYTM_STATUS_QUERY_NEW_URL = 'https://securegw.paytm.in/order/status';
            $PAYTM_TXN_URL = 'https://securegw.paytm.in/order/process';
        }

        define('PAYTM_REFUND_URL', '');
        define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
        define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
        define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
    }

    public function Configuration() {
        $paytm = $this->db->get_where('paymentGateway', array('name =' => 'Paytm'))->row();
        $merchant_key = $paytm->merchant_key;
        $merchant_mid = $paytm->merchant_mid;
        $merchant_website = $paytm->merchant_website;
        //$status = $paytm->status;

        $path = APPPATH . 'libraries/paytmlib/config_paytm.php';
        $file = file_get_contents($path);
        $file = trim($file);

        $file = str_replace("merchantkey", $merchant_key, $file);
        $file = str_replace("merchantmid", $merchant_mid, $file);
        $file = str_replace("website", $merchant_website, $file);
        if ($paytm->status == 'test') {
            $file = str_replace("status", 'TEST', $file);
        } else {
            $file = str_replace("status", 'PROD', $file);
        }
        // Write the new database.php file
        $handle = fopen($path, 'w+');
        // Chmod the file, in case the user forgot
        @chmod($path, 0777);
        // Verify file permissions
        if (is_writable($path)) {
            // Write the file
            if (fwrite($handle, $file)) {
                return true;
            } else {
                //file not write
                return false;
            }
        } else {
            //file is not writeable
            return false;
        }
    }

    public function PaytmGateway($payment) {
        // $orderId = 106; /// must be unique
        $this->StartPayment($payment);
    }

    public function StartPayment($orderId) {
        //  require_once(APPPATH . "libraries/paytmlib/config_paytm.php");
        require_once(APPPATH . "libraries/paytmlib/encdec_paytm.php");
        $session = array(
            'insertid' => $orderId['insertid'],
            'patient' => $orderId['patient'],
                //'currency' => $post_data['currency']
        );
        $this->session->set_userdata($session);
        $patientdetails = $this->db->get_where('patient', array('id =' => $orderId['patient']))->row();
        $paramList["MID"] = PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] = $orderId['ref'] . '-' . $orderId['patient'] . '-' . $orderId['insertid'];
        $paramList["CUST_ID"] = $orderId['patient'];   /// according to your logic
        $paramList["INDUSTRY_TYPE_ID"] = 'Retail';
        $paramList["CHANNEL_ID"] = 'WEB';
        $paramList["TXN_AMOUNT"] = $orderId['amount']; // number_format($orderId['amount'], 2);
        //echo number_format($orderId['amount'], 2);
        //die();
        //echo $paramList['TXN_AMOUNT']; 
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

        $paramList["CALLBACK_URL"] = base_url() . "paytm/PaytmResponse";
        // $paramList["MSISDN"] = $patientdetails->phone; //Mobile number of customer
        //   $paramList["EMAIL"] = $patientdetails->email;
        //$paramList["VERIFIED_BY"] = "EMAIL"; //
        //$paramList["IS_USER_VERIFIED"] = "YES"; //
        //   print_r($paramList);
        //  die();
        $checkSum = getChecksumFromArray($paramList, PAYTM_MERCHANT_KEY);
        ?>

        <!--submit form to payment gateway OR in api environment you can pass this form data-->
        <form id="myForm" method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
        <!--   <form id="myForm" action="<?php echo PAYTM_TXN_URL . '?mid=' . PAYTM_MERCHANT_MID . '&orderId=' . $orderId['ref'] ?>" method="get">-->
            <?php
            foreach ($paramList as $a => $b) {
                echo '<input type="hidden" name="' . htmlentities($a) . '" value="' . htmlentities($b) . '">';
            }
            ?>

            <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
        </form>
        <script type="text/javascript">
            document.getElementById('myForm').submit();
        </script>

        <?php
    }

    /////////// response from paytm gateway////////////

    public function PaytmResponse() {
        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");

// following files need to be included
        //  require_once(APPPATH . "libraries/paytmlib/config_paytm.php");
        require_once(APPPATH . "libraries/paytmlib/encdec_paytm.php");

        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";

        $paramList = $_POST;
        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
        $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


        if ($isValidChecksum == "TRUE") {
            //  echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
            if ($_POST["STATUS"] == "TXN_SUCCESS") {

                $orderid = $_POST["ORDERID"];
                //  echo $orderid;
                $orderdetails = explode('-', $orderid);
                $inserted_id = $orderdetails['5'];
                $patient = $orderdetails['4'];
                $redirectlink = $orderdetails['3'];
                //  echo $redirectlink;
                //   die();
                $amount = $_POST["TXNAMOUNT"];


                $date = time();
                if ($redirectlink == '0') {
                    $data1 = array(
                        'date' => $date,
                        'patient' => $patient,
                        'deposited_amount' => $amount,
                        'payment_id' => $inserted_id,
                        'amount_received_id' => $inserted_id . '.' . 'gp',
                        'gateway' => 'Paytm',
                        'deposit_type' => 'Card',
                        'user' => $this->ion_auth->get_user_id()
                    );
                    $data_payment = array('amount_received' => $amount, 'deposit_type' => 'Card');
                    $this->finance_model->updatePayment($inserted_id, $data_payment);
                    $this->finance_model->insertDeposit($data1);
                    redirect("finance/invoice?id=" . $inserted_id);
                } else {
                    $data1 = array(
                        'date' => $date,
                        'patient' => $patient,
                        'deposited_amount' => $amount,
                        'payment_id' => $inserted_id,
                        'gateway' => 'Paytm',
                        'deposit_type' => 'Card',
                        'user' => $this->ion_auth->get_user_id()
                    );
                    $this->finance_model->insertDeposit($data1);
                    if ($this->ion_auth->in_group(array('Patient'))) {
                        $sesdata = $this->session->userdata('insertid');
                        redirect("patient/myPaymentHistory");
                    } else {
                        //  $sesdata = $this->session->userdata('tarndata');
                        redirect('finance/patientPaymentHistory?patient=' . $patient);
                    }
                }

                //echo "<b>Transaction status is success</b>" . "<br/>";
                //Process your transaction here as success transaction.
                //Verify amount & order id received from Payment gateway with your application's order id and amount.
            } else {
                $this->session->set_flashdata('feedback', lang('transaction_failed'));
                // $user= $this->ion_auth->get_user_id();
                $sesdata = $this->session->userdata('insertid');
                $orderid = $_POST["ORDERID"];
                $orderdetails = explode('-', $orderid);
                $inserted_id = $orderdetails['5'];
                $patient = $orderdetails['4'];
                $redirectlink = $orderdetails[3];
                if ($this->ion_auth->in_group(array('Patient'))) {
                    redirect("patient/myPaymentHistory");
                } else {
                    if ($redirectlink == '0') {
                        //$sesdata = $this->session->userdata('insertid');
                        //  $sesdata = $this->session->userdata($session['insertid']);
                        //     echo $sesdata;
                        //     die();
                        redirect("finance/invoice?id=" . $inserted_id);
                    } else {
                        //   $sesdata = $this->session->userdata($session['patient']);
                        //  $sesdata = $this->session->userdata('patient');
                        redirect('finance/patientPaymentHistory?patient=' . $patient);
                    }
                }
                //  echo "<b>Transaction status is failure</b>" . "<br/>";
            }


            /*   if (isset($_POST) && count($_POST) > 0) {
              foreach ($_POST as $paramName => $paramValue) {
              echo "<br/>" . $paramName . " = " . $paramValue;
              }
              } */
        } else {
            $this->session->set_flashdata('feedback', '"Checksum mismatched"');
            if ($this->ion_auth->in_group(array('Patient'))) {
                $sesdata = $this->session->userdata($session['insertid']);
                redirect("patient/myPaymentHistory");
            } else {
                $sesdata = $this->session->userdata($session['insertid']);
                redirect("finance/payment");
            }
            //   echo "<b>Checksum mismatched.</b>";
            //Process transaction as suspicious.
        }
    }

    public function redirectlink($patient) {
        // $sesdata = $this->session->userdata('tarndata');
        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect("patient/myPaymentHistory");
        } else {
            //  $sesdata = $this->session->userdata('tarndata');
            redirect('finance/patientPaymentHistory?patient=' . $patient);
        }
    }

}
?>
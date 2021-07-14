<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");


require_once(APPPATH . "libraries/paytm/config_paytm.php");
require_once(APPPATH . "libraries/paytm/encdec_paytm.php");

class PgResponses extends MX_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('student');
        $this->load->model('course');
	$this->load->model('payment');       
    }

	public function index()
	{

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		if (isset($_POST) && count($_POST)>0 )
		{ 
			$userData= array(
				'order_id' => $_POST['ORDERID'],
				'student_id' => $this->session->userdata('userId'),
				'course_id' => $this->session->userdata('course_id'),
				'txn_id' => $_POST['TXNID'],
				'paid_amt' => $_POST['TXNAMOUNT'],
				'mid' => $_POST['MID'],
				'payment_mode' => $_POST['PAYMENTMODE'],
				'currency' => $_POST['CURRENCY'],
				'txn_date' => $_POST['TXNDATE'],
				'gateway_name' => $_POST['GATEWAYNAME'],
				'bank_txn_id' => $_POST['BANKTXNID'],
				'bank_name' => $_POST['BANKNAME'],
				'check_sum_hash'=> $_POST['CHECKSUMHASH'],
				'status' => $_POST['STATUS']
			);
			$insert=$this->payment->insert($userData); //insert record to order table database.
			if($insert)
			{
				redirect('payment_success'); 
			}
			/*foreach($_POST as $paramName => $paramValue) {
					echo "<br/>" . $paramName . " = " . $paramValue;
					
			}*/
		}
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}



}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}
}
}

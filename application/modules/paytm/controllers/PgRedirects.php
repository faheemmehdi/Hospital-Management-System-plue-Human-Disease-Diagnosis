<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");


require_once(APPPATH . "libraries/paytmlib/config_paytm.php");
require_once(APPPATH . "libraries/paytmlib/encdec_paytm.php");

class PgRedirects extends MX_Controller {

	function __construct() {
		parent::__construct();
		//$this->load->model('student');
		//$this->load->model('course');
		
	}

	public function PaytmGateway($datapayment)
	{
		$this->session->set_userdata('course_id',$datapayment['insertid']);
		$checkSum = "";
		$paramList = array();

		$ORDER_ID = $datapayment['ref'];
		$CUST_ID = $datapayment['patient'];
		$INDUSTRY_TYPE_ID = $datapayment['industry_type'];
		$CHANNEL_ID = $datapayment['channel_id'];
		$TXN_AMOUNT = $datapayment['amount'];

		// Create an array having all required parameters for creating checksum.
		$paramList["MID"] = PAYTM_MERCHANT_MID;
		$paramList["ORDER_ID"] = $ORDER_ID;
		$paramList["CUST_ID"] = $CUST_ID;
		$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
		$paramList["CHANNEL_ID"] = $CHANNEL_ID;
		$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
		$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
		$paramList["CALLBACK_URL"] = base_url()."pgResponses";

		/*
		$paramList["CALLBACK_URL"] = "http://localhost/PaytmKit/pgResponse.php";
		$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
		$paramList["EMAIL"] = $EMAIL; //Email ID of customer
		$paramList["VERIFIED_BY"] = "EMAIL"; //
		$paramList["IS_USER_VERIFIED"] = "YES"; //

		*/

		//Here checksum string will return by getChecksumFromArray() function.
		$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
		$paramList["CHECKSUMHASH"]=$checkSum;	

		$this->load->view('pgRedirect',['paramList'=>$paramList]);
	}


}

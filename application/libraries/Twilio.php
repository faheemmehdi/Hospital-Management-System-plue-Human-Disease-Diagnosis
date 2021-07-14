<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Name:  Twilio
	*
	* Author: Ben Edmunds
	*		  ben.edmunds@gmail.com
	*         @benedmunds
	*
	* Location:
	*
	* Created:  03.29.2011
	*
	* Description:  Modified Twilio API classes to work as a CodeIgniter library.
	*               Added additional helper methods.
	*               Original code and copyright are below.
	*
	*
	*/


	class Twilio
	{
		protected $_ci;
		protected $_twilio;
		protected $mode;
		protected $account_sid;
		protected $auth_token;
		protected $api_version;
		protected $number;

        function __construct()
        {
            //initialize the CI super-object
            $this->_ci =& get_instance();
 
            //load config
            $this->_ci->load->config('twilio', TRUE);
 
            //get settings from config
            $this->mode        = $this->_ci->config->item('mode', 'twilio');
            $this->account_sid = $this->_ci->config->item('account_sid', 'twilio');
            $this->auth_token  = $this->_ci->config->item('auth_token', 'twilio');
            $this->api_version = $this->_ci->config->item('api_version', 'twilio');
            $this->number      = $this->_ci->config->item('number', 'twilio');
 
 
            //initialize the client
            //$this->_twilio = new TwilioRestClient($this->account_sid, $this->auth_token);
		}

		/**
		 * __call
		 *
		 * @desc Interface with rest client
		 *
		 */
		public function __call($method, $arguments)
		{
			if (!method_exists( $this->_twilio, $method) )
			{
				throw new Exception('Undefined method Twilio::' . $method . '() called');
			}

			return call_user_func_array( array($this->_twilio, $method), $arguments);
		}

		/**
		 * Send SMS
		 *
		 * @desc Send a basic SMS
		 *
		 * @param <int> Phone Number
		 * @param <string> Text Message
		 */
		public function sms($from, $to, $message)
		{
                   
			$url = '/' . $this->api_version . '/Accounts/' . $this->account_sid . '/SMS/Messages';

			$data = array(
				        'From'   => $from,
				        'To'   => $to,
				        'Body' => $message,
			);
                        
			if ($this->mode == 'sandbox')
				$data['From'] = $this->number;

                     return $this->request($url, 'POST', $data);
		}
                
                
        }



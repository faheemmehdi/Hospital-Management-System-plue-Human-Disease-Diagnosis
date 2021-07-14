<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Twilio\Rest\Client;
 
class Welcome extends CI_Controller {
 
    public function index()
    {
        $data = ['phone' => '+923157079240', 'text' => 'Hello, CI'];
        print_r($this->sendSMS($data));
    }
 
    protected function sendSMS($data) {
          // Your Account SID and Auth Token from twilio.com/console
            $sid = 'AC2e78b039528cf65d94db68674ba43ead';
            $token = '9859a8217b4cc699d516f46fbb21a0d5';
            $client = new Client($sid, $token);
            
            // Use the client to do fun stuff like send text messages!
             return $client->messages->create(
                // the number you'd like to send the message to
                $data['phone'],
                array(
                    // A Twilio phone number you purchased at twilio.com/console
                    "from" => "+923356765109",
                    // the body of the text message you'd like to send
                    'body' => $data['text']
                )
            );
    }
}
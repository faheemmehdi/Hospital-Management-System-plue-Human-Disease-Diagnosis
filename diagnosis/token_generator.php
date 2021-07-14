<?php
 
    class TokenGenerator
    {
        private $authServiceUrl = 'https://healthservice.priaid.ch'; 
		private $username = 'Qm78K_GMAIL_COM_AUT';
		private $password = 'Hr7k4KBj6x2Y8RaFq';
        
        # constructor
        function __construct($username, $pasword, $authServiceUrl) {
            $this->username = $username;
            $this->password = $pasword;
            $this->authServiceUrl = $authServiceUrl;
        }
        

		public function loadToken()
		{
			$computedHash = base64_encode(hash_hmac ( 'md5' , $this->authServiceUrl , $this->password, true ));
			$authorization = 'Authorization: Bearer '.$this->username.':'.$computedHash;
			
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, '');
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
			curl_setopt($curl, CURLOPT_URL, $this->authServiceUrl);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

			$result = curl_exec($curl);
            $obj = json_decode($result);
            $info = curl_getinfo($curl);
            curl_close($curl);
            
            if($info['http_code'] != '200')
            {
                // print error from the server
                echo($obj);
                return NULL;
            }
            
            return $obj;
		}
    }
?>
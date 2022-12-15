<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Token {

        public function token_get()
        {
                $tokenData = array();
                $tokenData['id'] = 1;        
                $output['token'] = AUTHORIZATION::generateToken($tokenData);
   $this->set_response($output, REST_Controller::HTTP_OK); // <--
            
        }
}
<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;
use \Mailjet\Resources;

class MailController
{
	
	public function send_email($mj_from_email, $mj_from_name, $mj_to_email, $mj_to_name, $mj_subject, $mj_text, $mj_html){

		$mj = new \Mailjet\Client('0c6c639f838e9d48c5670cd3da415444', 'af504444a6348d94ba6c20b94c10090a',true,['version' => 'v3.1']);

		$body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $mj_from_email,
                        'Name' => $mj_from_name
                    ],
                    'To' => [
                        [
                            'Email' => $mj_to_email,
                            'Name' => $mj_to_name
                        ]
                    ],
                    /*'Bcc' => [
                        [
                            'Email' => "maxwellwachira67@gmail.com",
                            'Name' => "Maxwell Wachira"
                        ], 
                        [
                            'Email' => "maxwell@gearbox.co.ke",
                            'Name' => "Maxwell Wachira"
                        ]
                    ],*/
                    'Subject' => $mj_subject,
                    'TextPart' => $mj_text,
                    'HTMLPart' => $mj_html
                ]
            ]
        ];

        do{
            $response = $mj->post(Resources::$Email, ['body' => $body]);
        }while(!$response->success());


        if($response->success()){
            return true;
        }else {
            return false;
        }
    }

    public function sendAutoResponse(){

        $body = Application::$app->request->getBody();
       
        
        
        $mj_from_email = 'info@beyondfiat.net';
    	$mj_from_name = 'NKSS ALUMNI ASSOCIATION'; 
        $mj_to_email = $body['email'];
        $mj_to_name = $body['name'];
        $mj_subject = 'Email Recieved' ;
       
        $mj_text = '';
        $mj_html =  'Hello '.$mj_to_name.'<br>We have received your email. We will get back to you soon<br><br><br>Regards,<br>NKSS Alumni Association';


        $this->send_email($mj_from_email, $mj_from_name, $mj_to_email, $mj_to_name, $mj_subject, $mj_text, $mj_html);

    }

    public function sendContactform(){

        $this->sendAutoResponse();
        
       
        sleep(2);
        $body = Application::$app->request->getBody();
        $sender_name = $body['name'];
        $sender_email = $body['email'];
        $mj_from_email = 'info@beyondfiat.net';
        $mj_from_name = 'Contact Form'; 
        $mj_to_email = 'maxwellwachira67@gmail.com';
        $mj_to_name = $body['name'];
        $mj_subject = 'Contact Us Page' ;
        $message = $body['message'];
        $mj_text = '';
        $mj_html =  'You have recevied a New message from <br>Name: '.$sender_name.' <br> Email: '.$sender_email.'<br>Message: '.$message.'';


        if($this->send_email($mj_from_email, $mj_from_name, $mj_to_email, $mj_to_name, $mj_subject, $mj_text, $mj_html)){
            $params = ['message' => 'success'];
            echo json_encode($params);
            exit;
        }else{
            $params = ['message' => 'Failed'];
            echo json_encode($params);
            exit;
        }

    }

}

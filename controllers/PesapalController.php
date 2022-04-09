<?php
namespace app\controllers;

use app\models\PesapalModel;
use app\core\Application;
use app\core\Controller;
use app\core\Request;

class PesapalController
{
	public $email;
	public $amount;
	public $first_name;
	public $last_name;
	public $phonenumber;
	public $currency;
	public $token = null;
	public $params = null;
	private $consumer_key;
	private $consumer_secret;
	public $iframelink = 'https://www.pesapal.com/API/PostPesapalDirectOrderV4';
	public $callback_url = 'https://nkssalumni.org/payment-verification';
	//public $callback_url = 'http://localhost:9000/payment-verification';
	public $statusrequestAPI = 'https://www.pesapal.com/API/querypaymentdetails';
	public PesapalModel $pesapalModel;

	public function __construct(){
		$this->consumer_key = 'o3d8dbGIR2fN/qQHkNjCZX/4CrUlfV7T';
		$this->consumer_secret = 'vfVpI3/U9skjKkMwxTSz2fTN4w0=';
		$this->pesapalModel = new PesapalModel();
		require __DIR__.'/../api/OAuth/OAuth.php';
		

	}

	public function iframe(){

		session_start();
		if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
			session_destroy();
			$path = Application::$app->request->getFullPath();
		   	Application::$app->request->redirect('/sign-in?returnurl='.$path);
		    exit;
		}
		
		$desc = 'NKSS Alumni Registration Payment';
		$type = 'MERCHANT';
		$reference = time();
		$this->email = $_SESSION['email'];
		$body = $this->pesapalModel->getUserDetails($this->email);
	
		$this->first_name = $_SESSION["fname"];
		$this->last_name = $_SESSION["sname"];
		$this->email =$_SESSION["email"];
		$this->phonenumber = $_SESSION["phonenumber"];
		$this->currency = 'KES';
		if ((int)$_SESSION['membership'] == 1){
			$this->amount = 1;
		}else {
			$this->amount = 1000;
		}
        
        
		$post_xml = '<?xml version="1.0" encoding="utf-8"?>';
		$post_xml .= '<PesapalDirectOrderInfo ';
		$post_xml .= 'xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ';
		$post_xml .= 'xmlns:xsd="http://www.w3.org/2001/XMLSchema" ';
		$post_xml .= 'Currency="'.$this->currency.'" ';
		$post_xml .= 'Amount="'.$this->amount.'" ';
		$post_xml .= 'Description="'.$desc.'" ';
		$post_xml .= 'Type="'.$type.'" ';
		$post_xml .= 'Reference="'.$reference.'" ';
		$post_xml .= 'FirstName="'.$this->first_name.'" ';
		$post_xml .= 'LastName="'.$this->last_name.'" ';
		$post_xml .= 'Email="'.$this->email.'" ';
		$post_xml .= 'PhoneNumber="'.$this->phonenumber.'" ';
		$post_xml .= 'xmlns="http://www.pesapal.com" />';
		$post_xml = htmlentities($post_xml);

		$consumer = new \OAuthConsumer($this->consumer_key, $this->consumer_secret);

		// Construct the OAuth Request URL & post transaction to pesapal
		$signature_method = new \OAuthSignatureMethod_HMAC_SHA1();
		$iframe_src = \OAuthRequest::from_consumer_and_token($consumer, $this->token, 'GET', $this->iframelink, $this->params);
		$iframe_src -> set_parameter('oauth_callback', $this->callback_url);
		$iframe_src -> set_parameter('pesapal_request_data', $post_xml);
		$iframe_src -> sign_request($signature_method, $consumer, $this->token);

		// Display pesapal iframe and pass in iframe_src
	
		echo '<iframe src="'.$iframe_src.'" width="100%" height="800px"  scrolling="no" frameBorder="0">
		    <p>Browser unable to load iFrame</p>
		</iframe>';
	}


	public function ipnListener(){
		$pesapal_notification_type        = $_GET['pesapal_notification_type'];
		$pesapal_transaction_tracking_id  = $_GET['pesapal_transaction_tracking_id'];
		$pesapal_merchant_reference       = $_GET['pesapal_merchant_reference'];

		if ($pesapal_notification_type == 'CHANGE' && $pesapal_transaction_tracking_id != '') {

		    $consumer = new \OAuthConsumer($this->consumer_key, $this->consumer_secret);

		    // Get transaction status
		    $signature_method = new \OAuthSignatureMethod_HMAC_SHA1();
		    $request_status = \OAuthRequest::from_consumer_and_token($consumer, $this->token, 'GET', $this->statusrequestAPI, $this->params);
		    $request_status -> set_parameter('pesapal_merchant_reference', $pesapal_merchant_reference);
		    $request_status -> set_parameter('pesapal_transaction_tracking_id',$pesapal_transaction_tracking_id);
		    $request_status -> sign_request($signature_method, $consumer, $this->token);

	    	$ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, $request_status);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_HEADER, 1);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		    if (defined('CURL_PROXY_REQUIRED')) {
		        if (CURL_PROXY_REQUIRED == 'True') {

		            $proxy_tunnel_flag = (defined('CURL_PROXY_TUNNEL_FLAG') && strtoupper(CURL_PROXY_TUNNEL_FLAG) == 'FALSE') ? false : true;
		            curl_setopt ($ch, CURLOPT_HTTPPROXYTUNNEL, $proxy_tunnel_flag);
		            curl_setopt ($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
		            curl_setopt ($ch, CURLOPT_PROXY, CURL_PROXY_SERVER_DETAILS);
		        }
		    }

		   $response = curl_exec($ch);

		   $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		   $raw_header  = substr($response, 0, $header_size - 4);
		   $headerArray = explode('\r\n\r\n', $raw_header);
		   $header      = $headerArray[count($headerArray) - 1];

		   // Transaction status
		   $elements = preg_split('/=/',substr($response, $header_size));
		   $responseData = $elements[1]; // PENDING, COMPLETED or FAILE

		   $pesapalResponse = explode(",", $responseData);
		   /*$pesapalResponseArray=array('pesapal_transaction_tracking_id'=>$pesapalResponse[0],
				   'payment_method'=>$pesapalResponse[1],
				   'status'=>$pesapalResponse[2],
				   'pesapal_merchant_reference'=>$pesapalResponse[3]);*/

		   curl_close ($ch);

		 	$status = $pesapalResponse[2];
		 	$paymentMethod = $pesapalResponse[1];
		 	$pesapal_merchant_reference = $pesapalResponse[3];
		 	$pesapal_transaction_tracking_id = $pesapalResponse[0];

		  
		   if ($status == 'COMPLETED') {
			   		// Send Pesapal response only if we were able to update DB
	            $resp = 'pesapal_notification_type='.$pesapal_notification_type;
	            $resp .= '&pesapal_transaction_tracking_id='.$pesapal_transaction_tracking_id;
	            $resp .= '&pesapal_merchant_reference='.$pesapal_merchant_reference;
	            ob_start();
	            echo $resp;
	            ob_flush();
		   		/*$params = ['message' => '<div class="alert alert-success animated bounce" role="alert"><i class="fa fa-tick"></i> Payment was Successful.</div>'];
				return Application::$app->router->renderView('payment-verification', $params);*/
        
    	   }elseif ($status == 'FAILED') {
    	   		/*$params = ['message' => '<div class="alert alert-danger animated bounce" role="alert"><i class="fa fa-tick"></i> Payment Failed.</div>'];
				return Application::$app->router->renderView('payment-verification', $params);*/
				// Send Pesapal response only if we were able to update DB
	            $resp = 'pesapal_notification_type='.$pesapal_notification_type;
	            $resp .= '&pesapal_transaction_tracking_id='.$pesapal_transaction_tracking_id;
	            $resp .= '&pesapal_merchant_reference='.$pesapal_merchant_reference;
	            ob_start();
	            echo $resp;
	            ob_flush();

   		   }/*elseif ($status == 'PENDING') {
   		   		$params = ['message' => '<div class="alert alert-warning animated bounce" role="alert"><i class="fa fa-tick"></i> Pending Payment</div>'];
				return Application::$app->router->renderView('payment-verification', $params);
   		   }
*/
		    exit;
		}
	}
	public function verifyPayment(){
		
		session_start();
		if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
			session_destroy();
			$path = Application::$app->request->getFullPath();
		   	Application::$app->request->redirect('/sign-in?returnurl='.$path);
		    exit;
		}

		if(!$_GET['pesapal_transaction_tracking_id'] || !$_GET['pesapal_merchant_reference']){

			$details = $this->pesapalModel->getTransactionDetails();
			$pesapal_transaction_tracking_id = $details['trackingId'];
			$pesapal_merchant_reference = $details['referenceNo'];
		}else{

			$pesapal_transaction_tracking_id  = $_GET['pesapal_transaction_tracking_id'];
			$pesapal_merchant_reference       = $_GET['pesapal_merchant_reference'];
		}
			

		 $consumer = new \OAuthConsumer($this->consumer_key, $this->consumer_secret);

		    // Get transaction status
		    $signature_method = new \OAuthSignatureMethod_HMAC_SHA1();
		    $request_status = \OAuthRequest::from_consumer_and_token($consumer, $this->token, 'GET', $this->statusrequestAPI, $this->params);
		    $request_status -> set_parameter('pesapal_merchant_reference', $pesapal_merchant_reference);
		    $request_status -> set_parameter('pesapal_transaction_tracking_id',$pesapal_transaction_tracking_id);
		    $request_status -> sign_request($signature_method, $consumer, $this->token);

	    	$ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, $request_status);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_HEADER, 1);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		    if (defined('CURL_PROXY_REQUIRED')) {
		        if (CURL_PROXY_REQUIRED == 'True') {

		            $proxy_tunnel_flag = (defined('CURL_PROXY_TUNNEL_FLAG') && strtoupper(CURL_PROXY_TUNNEL_FLAG) == 'FALSE') ? false : true;
		            curl_setopt ($ch, CURLOPT_HTTPPROXYTUNNEL, $proxy_tunnel_flag);
		            curl_setopt ($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
		            curl_setopt ($ch, CURLOPT_PROXY, CURL_PROXY_SERVER_DETAILS);
		        }
		    }

		   $response = curl_exec($ch);

		   $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		   $raw_header  = substr($response, 0, $header_size - 4);
		   $headerArray = explode('\r\n\r\n', $raw_header);
		   $header      = $headerArray[count($headerArray) - 1];

		   // Transaction status
		   $elements = preg_split('/=/',substr($response, $header_size));
		   $responseData = $elements[1]; // PENDING, COMPLETED or FAILE

		   $pesapalResponse = explode(",", $responseData);
		   /*$pesapalResponseArray=array('pesapal_transaction_tracking_id'=>$pesapalResponse[0],
				   'payment_method'=>$pesapalResponse[1],
				   'status'=>$pesapalResponse[2],
				   'pesapal_merchant_reference'=>$pesapalResponse[3]);*/

			 curl_close ($ch);
			 $status = $pesapalResponse[2];
			 $paymentMethod = $pesapalResponse[1];
			 $pesapal_merchant_reference = $pesapalResponse[3];
			 $pesapal_transaction_tracking_id = $pesapalResponse[0];

			 session_start();
			 $id= $_SESSION['id'];

			 $this->pesapalModel->insertPaymentDetails($id, $status, $pesapal_merchant_reference, $pesapal_transaction_tracking_id, $paymentMethod);

			 if ($status == 'COMPLETED'){
			 	
				if($this->pesapalModel->detailsExists($pesapal_transaction_tracking_id)){
					$this->pesapalModel->updateUser($id);
					$params = ['message' => '<div class="alert alert-success animated bounce" role="alert"><i class="fa fa-check"></i> Payment Accepted.</div>'];
				} else {
					$this->pesapalModel->insertPaymentDetails($id, $status, $pesapal_merchant_reference, $pesapal_transaction_tracking_id, $paymentMethod);
					$this->pesapalModel->updateUser($id);
					$params = ['message' => '<div class="alert alert-success animated bounce" role="alert"><i class="fa fa-check"></i> Payment was Successful.</div>'];
				}
			 	

			 	
				return Application::$app->router->renderView('account-verfication', $params);
			 }else if ($status == 'PENDING'){
			 	header( "refresh:15" );
			 	$params = ['message' => '<div class="alert alert-warning animated bounce" role="alert"><i class="fas fa-spinner fa-pulse"></i> Processing Payment</div><div>The process can take up to 3 minutes<br>DO NOT LEAVE THIS PAGE BEFORE PAYMENT IS ACCEPTED</div'];
				return Application::$app->router->renderView('account-verfication', $params);
				
			 }else if ($status == 'FAILED'){
			 	$path = Application::$app->request->getFullPath();
			 	$params = ['message' => '<div class="alert alert-danger animated bounce" role="alert"><i class="<i class="fas fa-exclamation-triangle"></i>"></i> Payment Failed.</div></div><div><a href = "'.$path.'" class = "text-white"> Click here to try again</a></div>'];
				return Application::$app->router->renderView('account-verfication', $params);
			 }

	}

	public function verifyItemPayment(){
		
		session_start();
		if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
			session_destroy();
			$path = Application::$app->request->getFullPath();
		   	Application::$app->request->redirect('/sign-in?returnurl='.$path);
		    exit;
		}

		if(!$_GET['pesapal_transaction_tracking_id'] || !$_GET['pesapal_merchant_reference']){

			$details = $this->pesapalModel->getTransactionDetails();
			$pesapal_transaction_tracking_id = $details['trackingId'];
			$pesapal_merchant_reference = $details['referenceNo'];
		}else{

			$pesapal_transaction_tracking_id  = $_GET['pesapal_transaction_tracking_id'];
			$pesapal_merchant_reference       = $_GET['pesapal_merchant_reference'];
		}
			

		 $consumer = new \OAuthConsumer($this->consumer_key, $this->consumer_secret);

		    // Get transaction status
		    $signature_method = new \OAuthSignatureMethod_HMAC_SHA1();
		    $request_status = \OAuthRequest::from_consumer_and_token($consumer, $this->token, 'GET', $this->statusrequestAPI, $this->params);
		    $request_status -> set_parameter('pesapal_merchant_reference', $pesapal_merchant_reference);
		    $request_status -> set_parameter('pesapal_transaction_tracking_id',$pesapal_transaction_tracking_id);
		    $request_status -> sign_request($signature_method, $consumer, $this->token);

	    	$ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, $request_status);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_HEADER, 1);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		    if (defined('CURL_PROXY_REQUIRED')) {
		        if (CURL_PROXY_REQUIRED == 'True') {

		            $proxy_tunnel_flag = (defined('CURL_PROXY_TUNNEL_FLAG') && strtoupper(CURL_PROXY_TUNNEL_FLAG) == 'FALSE') ? false : true;
		            curl_setopt ($ch, CURLOPT_HTTPPROXYTUNNEL, $proxy_tunnel_flag);
		            curl_setopt ($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
		            curl_setopt ($ch, CURLOPT_PROXY, CURL_PROXY_SERVER_DETAILS);
		        }
		    }

		   $response = curl_exec($ch);

		   $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		   $raw_header  = substr($response, 0, $header_size - 4);
		   $headerArray = explode('\r\n\r\n', $raw_header);
		   $header      = $headerArray[count($headerArray) - 1];

		   // Transaction status
		   $elements = preg_split('/=/',substr($response, $header_size));
		   $responseData = $elements[1]; // PENDING, COMPLETED or FAILE

		   $pesapalResponse = explode(",", $responseData);
		   /*$pesapalResponseArray=array('pesapal_transaction_tracking_id'=>$pesapalResponse[0],
				   'payment_method'=>$pesapalResponse[1],
				   'status'=>$pesapalResponse[2],
				   'pesapal_merchant_reference'=>$pesapalResponse[3]);*/

			 curl_close ($ch);
			 $status = $pesapalResponse[2];
			 $paymentMethod = $pesapalResponse[1];
			 $pesapal_merchant_reference = $pesapalResponse[3];
			 $pesapal_transaction_tracking_id = $pesapalResponse[0];

			 session_start();
			 $id= $_SESSION['id'];

			 $this->pesapalModel->insertPaymentDetails($id, $status, $pesapal_merchant_reference, $pesapal_transaction_tracking_id, $paymentMethod);

			 if ($status == 'COMPLETED'){
			 	
				if($this->pesapalModel->detailsExists($pesapal_transaction_tracking_id)){
					$params = ['message' => '<div class="alert alert-success animated bounce" role="alert"><i class="fa fa-check"></i> Payment Accepted.  We will send you the file via email with one hour</div>'];
				} else {
					$this->pesapalModel->insertPaymentDetails($id, $status, $pesapal_merchant_reference, $pesapal_transaction_tracking_id, $paymentMethod);
					$params = ['message' => '<div class="alert alert-success animated bounce" role="alert"><i class="fa fa-check"></i> Payment was Successful. We will send you the file via email with one hour</div>'];
				}
			 	

			 	
				return Application::$app->router->renderView('account-verfication', $params);
			 }else if ($status == 'PENDING'){
			 	header( "refresh:15" );
			 	$params = ['message' => '<div class="alert alert-warning animated bounce" role="alert"><i class="fas fa-spinner fa-pulse"></i> Processing Payment</div><div>The process can take up to 3 minutes.<br>DO NOT LEAVE THIS PAGE BEFORE PAYMENT IS ACCEPTED</div'];
				return Application::$app->router->renderView('account-verfication', $params);
				
			 }else if ($status == 'FAILED'){
			 	$path = Application::$app->request->getFullPath();
			 	$params = ['message' => '<div class="alert alert-danger animated bounce" role="alert"><i class="<i class="fas fa-exclamation-triangle"></i>"></i> Payment Failed.</div></div><div><a href = "'.$path.'" class = "text-white"> Click here to try again</a></div>'];
				return Application::$app->router->renderView('account-verfication', $params);
			 }

	}
}
?>

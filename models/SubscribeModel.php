<?php
namespace app\models;
use app\config\Database;
use app\controllers\MailController;



class SubscribeModel{

	public Database $database;
	public function __construct(){
		$this->database = new Database();
		$this->con = $this->database->getConnection_pdo();
	}


	public function userExists($email){

		
		$query = "SELECT email FROM 
	     			newletter 
	     			WHERE email = ?
	     			LIMIT 1";

	    
	    // prepare query statement
   		$stmt = $this->con->prepare($query);

	    // bind email 
	    $stmt->bindParam(1, $email);

	    // execute query
	    $stmt->execute();

		// query row count
		$num = $stmt->rowCount();
		// check if more than 0 record found
		if($num > 0){

			return true;
			
		}else if($num === 0){

			return false;
		}
	}


	public function addUser($email){
		$query = "INSERT INTO newletter (email, status, created_at) VALUES (?, ?, ?)";

		$stmt = $this->con->prepare($query);

		date_default_timezone_set("Africa/Nairobi");
		$created_at = date('Y/m/d H:i:s');
		$status = 1;

		$stmt->bindParam(1, $email);
	    $stmt->bindParam(2, $status);
	    $stmt->bindParam(3, $created_at);

	    if($stmt->execute()){
	    	$mailController = new MailController();

	        $mj_from_email = 'info@beyondfiat.net';
	    	$mj_from_name = 'Beyond Fiat'; 
	        $mj_to_email = $email;
	        $mj_to_name = $email;
	        $mj_subject = 'NEWS LETTER COMING SOON' ;
	       
	        $mj_text = '';
	        $mj_html =  'Hello '.$mj_to_name.'<br>Thank you for subscribing to our news letters. <br><br><br>Regards,<br>Admin Beyond Fiat';


	        $mailController->send_email($mj_from_email, $mj_from_name, $mj_to_email, $mj_to_name, $mj_subject, $mj_text, $mj_html);

	    	return true;
	    }else{
	    	return false;
	    }
	}
}
?>
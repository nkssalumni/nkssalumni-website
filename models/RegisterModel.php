<?php

namespace app\models;
use app\core\Model;
use app\config\Database;
use app\controllers\MailController;

/**
 * 
 */
class RegisterModel extends Model
{
	public $con;
	public $firstname;
	public $secondname;
	public $email;
	public $phonenumber;
	public $password;
	public $verified_account;
	public $type;
	public $remember_token;
	public $profilephoto;
	public $deleted;
	public Database $database;

	public function __construct(){
		$this->database = new Database();
		$this->con = $this->database->getConnection_pdo();
		$this->pending_payment = 1;
		$this->type = 2;
		$this->deleted = 0;
		$this->verified_account = 0;
	}

	public function userExists($email){

		$this->email = $email;
		$query = "SELECT email FROM 
	     			users 
	     			WHERE email = ?
	     			LIMIT 1";

	    
	    // prepare query statement
   		$stmt = $this->con->prepare($query);

	    // bind email 
	    $stmt->bindParam(1, $this->email);

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

	public function refExists($ref){

		
		$query = "SELECT referral_code FROM 
	     			users 
	     			WHERE referral_code = ?
	     			LIMIT 1";

	    
	    // prepare query statement
   		$stmt = $this->con->prepare($query);

	    // bind email 
	    $stmt->bindParam(1, $ref);

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

	public function register($firstname, $secondname, $email, $phonenumber, $password, $ref){

		 	$query = "INSERT INTO users (firstname, secondname, email, phonenumber, password, type, verified_account, referral_code, updated_at, created_at, deleted)
            VALUES
                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  
		    // prepare query
		    $stmt = $this->con->prepare($query);
		    
		    $this->firstname = $firstname;
		    $this->secondname = $secondname;
		    $this->email = $email;
		    $this->phonenumber = $phonenumber;
		   	$this->password = password_hash($password, PASSWORD_DEFAULT);
		   	$referral_code = time(). "_".substr(md5(uniqid(rand(1,6))), 0, 8);

		   	date_default_timezone_set("Africa/Nairobi");
		    $created_at = date('Y/m/d H:i:s');

		    // bind values
		    $stmt->bindParam(1, $this->firstname);
		    $stmt->bindParam(2, $this->secondname);
		    $stmt->bindParam(3, $this->email);
		    $stmt->bindParam(4, $this->phonenumber);
		    $stmt->bindParam(5, $this->password);
		    $stmt->bindParam(6, $this->type);
		    $stmt->bindParam(7, $this->verified_account);
		    $stmt->bindParam(8, $referral_code);
		    $stmt->bindParam(9, $created_at);
		    $stmt->bindParam(10, $created_at);
		    $stmt->bindParam(11, $this->deleted);
		


		    // create the user
		    if($stmt->execute()){
		  
		        // set response code - 201 created
		        http_response_code(201);
		        session_start();
				$_SESSION['email'] = $this->email;	
		        if($this->emailVerification($this->email)){

			        if(!$ref){
			        	return true;
			        }else{

			        	 
			        	$query = "INSERT INTO affiliates (referral_code, email, timestamp) VALUES (?, ?, ?)";
				         // prepare query
				    	$stmt = $this->con->prepare($query);
				    	// bind values
					    $stmt->bindParam(1, $ref);
					    $stmt->bindParam(2, $this->email);
					    $stmt->bindParam(3, $created_at);

					    if($stmt->execute()){
		
					    	return true;
					    }else{
					    	return false;
					    }
			        }  
			    } else{
			    	return false;
			    } 
		       
		    }
		  
		    // if unable to create the device, tell the user
		    else{
		  
		        // set response code - 503 service unavailable
		        http_response_code(503);
		        
		  
		        // tell the user
		        //echo json_encode(array("message" => "internal_error"));
		        return false;
		    }

	}
	public function emailVerification($email){

		$query = "INSERT INTO account_token (email, token, created_at) VALUES (?, ?, ?)";
		$stmt = $this->con->prepare($query);

		date_default_timezone_set("Africa/Nairobi");
		$created_at = date('Y/m/d H:i:s');

		$token = md5($email.' '.time());

		$stmt->bindParam(1, $email);
	    $stmt->bindParam(2, $token);
	    $stmt->bindParam(3, $created_at);

	    if($stmt->execute()){
	    	if ($this->sendRecoveryEmail($token)) {
	    		return true;
	    	}else{
	    		return false;
	    	}
	    }else{
	    	return false;
	    }
	}

	public function sendRecoveryEmail($token){

		$query = "SELECT * FROM 
	     			users 
	     			WHERE email = ?
	     			LIMIT 1";
	    // prepare query statement
   		$stmt = $this->con->prepare($query);

	    // bind email 
	    $stmt->bindParam(1, $this->email);

	    // execute query
	    $stmt->execute();

	    $row = $stmt->fetch(\PDO::FETCH_ASSOC);

	    $id = $row['id'];

	    $mj_from_email = 'info@beyond-grades.com';
	    $mj_from_name = 'E menu';
	    $mj_to_email = $row['email'];
	    $mj_to_name = $row['firstname']. ' '.$row['secondname'];
	    $mj_subject = 'Account Activation';
	    $mj_text = '';
	   

	    $mj_html = '<html>
	    				<head>
	    					<!-- Montserrat -->
   							<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
   							<!-- Bootstrap CSS -->
    						<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	    				</head>
	    				<body>
	    					<div class = "container">
	    						<div class = "row">
	    							<div class = "col-sm-12 col-lg-12 col-md-12 d-flex justify-content-left mt-5">
	    								Hello '.$mj_to_name.'<br>Use the link below to activate your account. The link shall expire in 3 hours<br>Account Activation link : http://e-menu.rentlordke.com/activate-account?token='.$token.'&email='.$mj_to_email.'
	    							</div>
	    						</div>
	    					</div>
	    				</body>
	    			</html>'
	    				;

	    $mailController = new MailController();
	    if($mailController->send_email($mj_from_email, $mj_from_name, $mj_to_email, $mj_to_name, $mj_subject, $mj_text, $mj_html)){
	    	return true;
	    }else{
	    	return false;
	    }
	}

	public function tokenExists($token, $email){

		
		$query = "SELECT token FROM 
	     			account_token 
	     			WHERE token = ?
	     			LIMIT 1";

	    
	    // prepare query statement
   		$stmt = $this->con->prepare($query);

	    // bind email 
	    $stmt->bindParam(1, $token);

	    // execute query
	    $stmt->execute();

		// query row count
		$num = $stmt->rowCount();
		// check if more than 0 record found
		if($num > 0){

			if($this->verifyUser($email)){
				return true;
			}else{
				return false;
			}
			
		}else if($num === 0){

			return false;
		}
	}

	public function verifyUser($email){

		$sql = "UPDATE users SET verified_account = :true WHERE email = :email";
		$statement = $this->con->prepare($sql);

		$true = 1;
		
		// bind parameters 
		$statement->bindParam(':true', $true);
	    $statement->bindParam(':email', $email);
	 
	    // execute query
	    if($statement->execute()){
	    	return true;

	    }else{

	    	return false;
	    }
	}

}
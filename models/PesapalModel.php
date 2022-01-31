<?php
namespace app\models;
use app\config\Database;


class PesapalModel
{
	public Database $database;
	public $con;
	public $email;
	public $status;
	public $referenceNo;
	public $trackingId;
	public $paymentMethod;
	public $userId;

	public function __construct(){
		$this->database = new Database();
		$this->con = $this->database->getConnection_pdo();
	}

	public function getUserDetails($email)
	{
		$this->email = $email;

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

	    return $row;
	}

	public function detailsExistsAll($trackingId){

		$query = "SELECT trackingId FROM 
	     			transactions 
	     			WHERE trackingId = ?
	     			LIMIT 1";

	    // prepare query statement
   		$stmt = $this->con->prepare($query);


	    // bind email 
	    $stmt->bindParam(1, $trackingId);

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

	public function detailsExists($trackingId){

		$query = "SELECT trackingId, status FROM 
	     			transactions 
	     			WHERE trackingId = ? AND status = ?
	     			LIMIT 1";

	    // prepare query statement
   		$stmt = $this->con->prepare($query);

   		$completed = 'COMPLETED';

	    // bind email 
	    $stmt->bindParam(1, $trackingId);
	    $stmt->bindParam(2, $completed);

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

	public function insertPaymentDetails($id, $status, $referenceNo, $trackingId, $paymentMethod){

		if($this->detailsExistsAll($trackingId)){
			$sql = "UPDATE transactions SET status = :status, paymentMethod =:paymentMethod WHERE trackingId = :trackingId";
			$statement = $this->con->prepare($sql);

			$false = 0;


			// bind parameters 
			$statement->bindParam(':status', $status);
			$statement->bindParam(':paymentMethod', $paymentMethod);
		    $statement->bindParam(':trackingId', $trackingId);


		    // execute query
		    if($statement->execute()){
		    	return true;

		    }else{

		    	return false;
		    }
		}else{
			$query = "INSERT INTO transactions (status, referenceNo, trackingId, paymentMethod, userId, created_at)
	            VALUES
	                (?, ?, ?, ?, ?, ?)";
	  
		    // prepare query
		    $stmt = $this->con->prepare($query);
		    
		   
		    $this->status = $status;
		    $this->referenceNo = $referenceNo;
		    $this->trackingId = $trackingId;
		    $this->paymentMethod = $paymentMethod;
		    $this->userId = $id;
		  

		   	date_default_timezone_set("Africa/Nairobi");
		    $created_at = date('Y/m/d H:i:s');
		    
		    // bind values
		   
		    $stmt->bindParam(1, $this->status);
		    $stmt->bindParam(2, $this->referenceNo);
		    $stmt->bindParam(3, $this->trackingId);
		    $stmt->bindParam(4, $this->paymentMethod);
		    $stmt->bindParam(5, $this->userId);
		    $stmt->bindParam(6, $created_at);
		   

		    // create the user
		    if($stmt->execute()){
		    	return true;
		    }else{
		    	return false;
		    }
		}

	}
	public function getTransactionDetails(){

		session_start();

		$query = "SELECT * FROM 
	     			transactions 
	     			WHERE userId = ?
	     			LIMIT 1";

	    // prepare query statement
   		$stmt = $this->con->prepare($query);

   		$userId = $_SESSION['id'];

	    // bind email 
	    $stmt->bindParam(1, $userId);

	    // execute query
	    $stmt->execute();
	    
	    $row = $stmt->fetch(\PDO::FETCH_ASSOC);

	    return $row;
	}
	public function updateUser($id){

		$sql = "UPDATE users SET pending_payment = :false, updated_at =:updated_at WHERE id = :id";
		$statement = $this->con->prepare($sql);

		$false = 0;
		


	    date_default_timezone_set("Africa/Nairobi");
		$updated_at = date('Y/m/d H:i:s');


		// bind parameters 
		$statement->bindParam(':false', $false);
	    $statement->bindParam(':id', $id);
	    $statement->bindParam(':updated_at', $updated_at);

	 
	    // execute query
	    if($statement->execute()){
	    	return true;

	    }else{

	    	return false;
	    }
	}

	public function updatePackage($package_id){

		$sql = "UPDATE users SET package = :package WHERE id = :id";
		$statement = $this->con->prepare($sql);


		session_start();
		$userId = $_SESSION['id'];

		// bind parameters 
		$statement->bindParam(':package', $package_id);
	    $statement->bindParam(':id', $userId);
	 
	    // execute query
	    if($statement->execute()){
	    	return true;

	    }else{

	    	return false;
	    }
	}
}

?>
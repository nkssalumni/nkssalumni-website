<?php

namespace app\core;

abstract class Model
{
	public $email;
	
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
}
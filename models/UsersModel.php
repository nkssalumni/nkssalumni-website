<?php 
namespace app\models;
use app\config\Database;
use app\controllers\MailController;



class AdminModel

{
	public Database $database;
	public MailController $mailController;
	public $con;


	public function __construct(){
		$this->database = new Database();
		$this->mailController = new MailController();
		$this->con = $this->database->getConnection_pdo();
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
	public function getDetails($id){
		$query = "SELECT * FROM 
	     			meals 
	     			WHERE id = ?";

	    
	    // prepare query statement
   		$stmt = $this->con->prepare($query);

	    // bind email 
	    $stmt->bindParam(1, $id);

	    // execute query
	    $stmt->execute();

	    $row = $stmt->fetch(\PDO::FETCH_ASSOC);

	    return $row;
	}


	public function addMeal($title, $price, $location, $description, $category){
		$query = "INSERT INTO meals (title, price, image_path, description, category, created_at, updated_at, deleted, hidden)
            VALUES
                (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // prepare query statement
   		$stmt = $this->con->prepare($query);

        date_default_timezone_set("Africa/Nairobi");
		$created_at = date('Y/m/d H:i:s');
		$deleted = 0;
		$hidden = 0;
        $stmt->bindParam(1, $title);
	    $stmt->bindParam(2, $price);
	    $stmt->bindParam(3, $location);
	    $stmt->bindParam(4, $description);
	    $stmt->bindParam(5, $category);
	    $stmt->bindParam(6, $created_at);
	    $stmt->bindParam(7, $created_at);
	    $stmt->bindParam(8, $deleted);
	    $stmt->bindParam(9, $hidden);

	    

	    if($stmt->execute()){
	    	return true;
		}else{
			return false;
		}
	}

	public function updateDetails($id, $title, $price, $location, $description, $category){
		$query = "UPDATE meals SET title = ?, price = ?, image_path = ?, description = ?, category = ?, updated_at = ? WHERE id = ?";
		// prepare query statement
   		$stmt = $this->con->prepare($query);

        date_default_timezone_set("Africa/Nairobi");
        $updated_at = date('Y/m/d H:i:s');


        $stmt->bindParam(1, $title);
	    $stmt->bindParam(2, $price);
	    $stmt->bindParam(3, $location);
	    $stmt->bindParam(4, $description);
	    $stmt->bindParam(5, $category);
	    $stmt->bindParam(6, $updated_at);
	    $stmt->bindParam(7, $id);


	     if($stmt->execute()){
	    	return true;
		}else{
			return false;
		}


	}


	public function hideMealToggle($id){
		$query = "SELECT id, hidden from meals where id = ? limit 1";
		$stmt = $this->con->prepare($query);
		$stmt->bindParam(1, $id);
		 // execute query
	    $stmt->execute();
	    $row = $stmt->fetch(\PDO::FETCH_ASSOC);

	    $sql = "UPDATE meals SET hidden = ? WHERE id = ?";
	    $statement = $this->con->prepare($sql);

	    if((int)$row['hidden'] == 0){
	    	$hidden = 1;
	    }else{
	    	$hidden = 0;
	    }
	    $statement->bindParam(1, $hidden);
		$statement->bindParam(2, $id);

		if($statement->execute()){
	    	return true;
		}else{
			return false;
		}

	}


	public function readMeals($search , $data_view){

		$deleted = 0;

		if (!$search) {
		    $query = "SELECT id, title, price, image_path, description, category, hidden FROM meals where deleted = ?  order by id asc ";
		    // prepare query statement
   			$stmt = $this->con->prepare($query);
   			 // bind email 
	    	$stmt->bindParam(1, $deleted);

		  } else {
		    $search = '%'.$search.'%';
		    $query = "
		       SELECT id, title, price, image_path, description, category, hidden FROM meals where deleted = ? and 
		        (title like ? or price like ? or description like ?) order by id asc ";

		    // prepare query statement
   			$stmt = $this->con->prepare($query);
   			 // bind email 
	    	$stmt->bindParam(1, $deleted);
	    	$stmt->bindParam(2, $search);
	    	$stmt->bindParam(3, $search);
	    	$stmt->bindParam(4, $search);
 		}

 		// execute query
	    if (!$stmt->execute()){
	    	return false;
	    }

	    $total_no = $stmt->rowCount();
	    if($total_no > 0){
	  
		    $numbering = 0;
			$stats_op = '<div class="col-lg-12"><span class="badge badge-pill badge-primary">Total : '.$total_no.' Device(s)</span></div>';
			$data_card = $stats_op . ''; 
			$data_table = $stats_op . '
			    <table class="table table-stripped table-sm" style="box-shadow: 0px 0px 8px #0C0C0C;margin:10px;">
			      <thead class="thead-dark">
			        <tr>
			          <th scope="col">#</th>
			          <th scope="col"></th>
			          <th scope="col">Title</th>
			          <th scope="col">Description</th>
			          <th scope="col">category</th>
			        </tr>
			      </thead>
			      <tbody>';
		    while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
		    	$numbering++;
		    	$int_category = (int)$row["category"];
		    	$category = '';
		    	switch ($int_category) {
		    		case 0:
		    			$category = '6 channel power supply';
		    			break;
		    		case 1:
		    			$category = 'Single channel power supply';
		    			break;
		    		case 2:
		    			$category = 'Sensors';
		    			break;
		    		case 3:
		    			$category = 'Smart water pump';
		    		
		    		default:
		    			$category = '';
		    			break;
		    	}
		    	$hidden = '';
		    	switch ($row["hidden"]) {
		    		case 0:
		    			$hidden = 'Hide';
		    			break;
		    		case 1:
		    			$hidden = 'Unhide';
		    			break;
		    	}
		    	$admin_actions = '
		          <button onclick="getDetails('.$row["id"].')" type="button" class="btn btn-outline-success btn-sm ml-1" style="padding:5px;"><i class="fa fa-pencil"></i> edit</button>
		          <button onclick="hide_toggle('.$row["id"].')" type="button" class="btn btn-outline-warning btn-sm ml-1" style="padding:5px;"><i class="fa fa-lock"></i>'.$hidden.'</button>
		          <button onclick="deleteDetails('.$row["id"].')" type="button" class="btn btn-outline-danger btn-sm ml-1" style="padding:5px;"><i class="fa fa-times"></i> delete</button>
		          ';
		          $data_card .= '    
			        <div style="" class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
			          <div  style="box-shadow: 0px 0px 8px #0C0C0C;margin:5px;">
			            <div class="card" style="width: ;">
			              <img src="'.$row["image_path"].'" class="card-img-top" alt="'.$row["title"].'" height = "180px">
			              <div class="card-body">                
			                <h5 class="card-title"<i class="fas fa-hamburger"></i>'.$row["title"].'</h5>                
			             
			                <p>'.$row["description"].'</p>			  
			      			<div class="row no-gutters">
			                <button onclick="more('.$row["id"].')" type="button" class="btn btn-outline-primary btn-sm" style="padding:5px;"><i class="fa fa-info-circle"></i> more</button>
			                '.$admin_actions.'
			       
			                </div>
			              </div>
			            </div>
			          </div>
			        </div>
			     	';

			     $data_table .= '
			        <tr>
			          <th scope="row">'.$numbering.'</th>
			          <th>
			            '.$admin_actions.'
			            <button onclick="more('.$row["id"].')" type="button" class="btn btn-outline-primary btn-sm" style="padding:5px;"><i class="fa fa-info-circle"></i> more</button>
			          </th>
			          <td>'.$row["title"].'</td>
			          <td>'.$row["description"].'</td> 
			          <td>'.$category.'</td>
			        </tr> 
			        ';
			    }

	    	}else{
	    		// records now found 
			    $data_card = '<div class="alert alert-primary animated bounce" role="alert">No Record</div>';
			    $data_table = '<div class="alert alert-primary animated bounce" role="alert">No Record</div>';
			 }
		$data_table .= '</tbody></table>';

	  if ($data_view == "card") {
	       return $data_card;
	  } else if ($data_view == "table") {
	       return $data_table;
	  } 
	}


	public function readTrash($search , $data_view){

		$deleted = 1;

		if (!$search) {
		    $query = "SELECT id, title, price, image_path, description, category, hidden FROM meals where deleted = ?  order by id asc ";
		    // prepare query statement
   			$stmt = $this->con->prepare($query);
   			 // bind email 
	    	$stmt->bindParam(1, $deleted);

		  } else {
		    $search = '%'.$search.'%';
		    $query = "
		       SELECT id, title, price, image_path, description, category, hidden FROM meals where deleted = ? and 
		        (title like ? or price like ? or description like ?) order by id asc ";

		    // prepare query statement
   			$stmt = $this->con->prepare($query);
   			 // bind email 
	    	$stmt->bindParam(1, $deleted);
	    	$stmt->bindParam(2, $search);
	    	$stmt->bindParam(3, $search);
	    	$stmt->bindParam(4, $search);
 		}

 		// execute query
	    if (!$stmt->execute()){
	    	return false;
	    }

	    $total_no = $stmt->rowCount();
	    if($total_no > 0){
	  
		    $numbering = 0;
			$stats_op = '<div class="col-lg-12"><span class="badge badge-pill badge-primary">Total : '.$total_no.' Meals</span></div>';
			$data_card = $stats_op . ''; 
			$data_table = $stats_op . '
			    <table class="table table-stripped table-sm" style="box-shadow: 0px 0px 8px #0C0C0C;margin:10px;">
			      <thead class="thead-dark">
			        <tr>
			          <th scope="col">#</th>
			          <th scope="col"></th>
			          <th scope="col">Title</th>
			          <th scope="col">Price</th>
			          <th scope="col">Description</th>
			          <th scope="col">category</th>
			        </tr>
			      </thead>
			      <tbody>';
		    while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
		    	$numbering++;
		    	$admin_actions = '
		          <button onclick="restore('.$row["id"].')" type="button" class="btn btn-outline-success btn-sm ml-1" style="padding:5px;"><i class="fa fa-times"></i> Restore</button>
		          ';
		          $data_card .= '    
			        <div style="" class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
			          <div  style="box-shadow: 0px 0px 8px #0C0C0C;margin:5px;">
			            <div class="card" style="width: ;">
			              <img src="'.$row["image_path"].'" class="card-img-top" alt="'.$row["title"].'" height = "180px">
			              <div class="card-body">                
			                <h5 class="card-title"><i class="fa fa-user"></i>'.$row["title"].'</h5>                
			             
			                <p>'.$row["description"].'</p>			  
			      			<div class="row no-gutters">
			                '.$admin_actions.'
			                <p class = "text-pink price">KES '.$row["price"].'</p>
			                </div>
			              </div>
			            </div>
			          </div>
			        </div>
			     	';

			     $data_table .= '
			        <tr>
			          <th scope="row">'.$numbering.'</th>
			          <th>
			            '.$admin_actions.'
			            <button onclick="more('.$row["id"].')" type="button" class="btn btn-outline-primary btn-sm" style="padding:5px;"><i class="fa fa-info-circle"></i> more</button>
			          </th>
			          <td>'.$row["title"].'</td>
			          <td>'.$row["price"].'</td>
			          <td>'.$row["description"].'</td> 
			          <td>'.$category.'</td>
			        </tr> 
			        ';
			    }

	    	}else{
	    		// records now found 
			    $data_card = '<div class="alert alert-primary animated bounce" role="alert">No Record</div>';
			    $data_table = '<div class="alert alert-primary animated bounce" role="alert">No Record</div>';
			 }
		$data_table .= '</tbody></table>';

	  if ($data_view == "card") {
	       return $data_card;
	  } else if ($data_view == "table") {
	       return $data_table;
	  } 
	}


	public function addEmployee($firstname, $secondname, $email, $phonenumber, $pending_payment){


		$unhashed_password = rand(100000, 999999);
		// encrypt password
        $password = password_hash($unhashed_password, PASSWORD_DEFAULT);
        $type = 2;
        $currency = 'USD';
        $deleted = 0;

		$query = "INSERT INTO users (firstname, secondname, email, phonenumber, password, type, currency, pending_payment, created_at, deleted)
            VALUES
                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  
		    // prepare query
		    $stmt = $this->con->prepare($query);
		

		   	date_default_timezone_set("Africa/Nairobi");
		    $created_at = date('Y/m/d H:i:s');
		    
		    // bind values
		    $stmt->bindParam(1, $firstname);
		    $stmt->bindParam(2, $secondname);
		    $stmt->bindParam(3, $email);
		    $stmt->bindParam(4, $phonenumber);
		    $stmt->bindParam(5, $password);
		    $stmt->bindParam(6, $type);
		    $stmt->bindParam(7, $currency);
		    $stmt->bindParam(8, $pending_payment);
		    $stmt->bindParam(9, $created_at);
		    $stmt->bindParam(10, $deleted);

		    // create the user
		    if($stmt->execute()){
		    	$mj_from_email = 'info@beyondfiat.net';
                $mj_from_name = 'Beyond Fiat';
            
                $mj_to_email = $email;
                $mj_to_name = $firstname. ' '.$secondname;
                $mj_subject = 'New Account';
                $mj_text = "Hello " . strtoupper($mj_to_name) . " .\n";
                $mj_text .= "Your Course Facilitator, Aerlene Mugambi has created an account for you.\n";
                $mj_text .= "Your email address is ".$email."  and password is ".$unhashed_password."\n";
                
                $mj_text .= "To learn more about cmapp, visit the following link https://beyondfiat.net\n";
                $mj_html = '';

                $this->mailController->send_email($mj_from_email, $mj_from_name, $mj_to_email, $mj_to_name, $mj_subject, $mj_text, $mj_html);

		    	return true;
		    }else{
		    	return false;
		    }
	}


	public function deleteMeals($id){
		$sql = "UPDATE meals SET deleted = ? WHERE id = ?";
		$statement = $this->con->prepare($sql);
		

		$deleted= 1;
		// bind parameters 
		$statement->bindParam(1, $deleted);
	    $statement->bindParam(2, $id);
	 
	    // execute query
	    if($statement->execute()){
	    	return true;

	    }else{

	    	return false;
	    }
	}


	public function restoreMeal($id){
		$sql = "UPDATE meals SET deleted = ? WHERE id = ?";
		$statement = $this->con->prepare($sql);
		

		$deleted= 0;
		// bind parameters 
		$statement->bindParam(1, $deleted);
	    $statement->bindParam(2, $id);
	 
	    // execute query
	    if($statement->execute()){
	    	return true;

	    }else{

	    	return false;
	    }
	}


	public function totalRevenue(){
		$deleted = 0;
		$type = 2;
		$pending_payment = 0;


	
	    $query = "SELECT  t.id, t.amount, t.userID, t.paymentMethod, t.created_at, u.id, u.deleted, u.type, u.pending_payment, u.firstname, u.secondname, u.phonenumber FROM transactions t
	    	 INNER JOIN users u ON t.userId = u.id
	    	 WHERE u.deleted = ? and u.type = ? and u.pending_payment = ?
	    	 order by t.id desc ";
	    // prepare query statement
			$stmt = $this->con->prepare($query);
			 // bind email 
    	$stmt->bindParam(1, $deleted);
    	$stmt->bindParam(2, $type);
    	$stmt->bindParam(3, $pending_payment);
    	$stmt->execute();
    	$total_no = $stmt->rowCount();
    	return $total_no;
	}


	public function meals(){
		$deleted = 0;
		$type = 2;
		$pending_payment = 0;
	
	    $query = "SELECT firstname, secondname, phonenumber, email, created_at FROM users where deleted = ? and type = ? and pending_payment = ? order by id asc ";
	    // prepare query statement
			$stmt = $this->con->prepare($query);
			 // bind email 
    	$stmt->bindParam(1, $deleted);
    	$stmt->bindParam(2, $type);
    	$stmt->bindParam(3, $pending_payment);

    	$stmt->execute();
    	$total_no = $stmt->rowCount();
    	return $total_no;
	}


	public function deleteEmployee($id){
		$sql = "UPDATE users SET deleted = ? WHERE id = ?";
		$statement = $this->con->prepare($sql);
		

		$deleted= 1;
		// bind parameters 
		$statement->bindParam(1, $deleted);
	    $statement->bindParam(2, $id);
	 
	    // execute query
	    if($statement->execute()){
	    	return true;

	    }else{

	    	return false;
	    }
	}

	
}


?>
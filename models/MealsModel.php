<?php 
namespace app\models;
use app\config\Database;


class MealsModel

{
	public Database $database;
	public $con;


	public function __construct(){
		$this->database = new Database();
		$this->con = $this->database->getConnection_pdo();
	}
	
	public function readMeals($search , $data_view){
		$deleted = 0;
		$hidden = 0;

		if (!$search) {
		    $query = "SELECT id, title, price, image_path, description, category, hidden FROM meals where deleted = ? and hidden = ? order by id asc ";
		    // prepare query statement
   			$stmt = $this->con->prepare($query);
   			 // bind email 
	    	$stmt->bindParam(1, $deleted);
	    	$stmt->bindParam(2, $hidden);

		  } else {
		    $search = '%'.$search.'%';
		    $query = "
		       SELECT id, title, price, image_path, description, category, hidden FROM meals where deleted = ? and 
		        (title like ? or price like ? or description like ?) and hidden = ? order by id asc ";

		    // prepare query statement
   			$stmt = $this->con->prepare($query);
   			 // bind email 
	    	$stmt->bindParam(1, $deleted);
	    	$stmt->bindParam(2, $search);
	    	$stmt->bindParam(3, $search);
	    	$stmt->bindParam(4, $search);
	    	$stmt->bindParam(5, $hidden);
 		}

 		// execute query
	    if (!$stmt->execute()){
	    	return false;
	    }

	    $total_no = $stmt->rowCount();
	    if($total_no > 0){
	  
		    $numbering = 0;
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
		    	$int_category = (int)$row["category"];
		    	$category = '';
		    	switch ($int_category) {
		    		case 0:
		    			$category = 'BreakFast';
		    			break;
		    		case 1:
		    			$category = 'Special';
		    			break;
		    		case 2:
		    			$category = 'Pastry';
		    			break;
		    		case 3:
		    			$category = 'Desert';
		    			break;
		    		case 4:
		    			$category = 'Kids Dish';
		    			break;
		    		case 5:
		    			$category = 'Salad & Soup';
		    			break;
		    		
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
		          $data_card .= '    
			        <div style="" class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
			          <div  style="box-shadow: 0px 0px 8px #0C0C0C;margin:5px;">
			            <div class="card" style="width: ;">
			              <img src="'.$row["image_path"].'" class="card-img-top" alt="'.$row["title"].'" height = "180px">
			              <div class="card-body">                
			                <h5 class="card-title"><i class="fas fa-hamburger"></i>'.$row["title"].'</h5>                
			             
			                <p>'.$row["description"].'</p>			  
			      			<div class="row no-gutters">
			                '.$admin_actions.'
			                <h5 class = "text-pink">KES '.$row["price"].'</h5>
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


	public function readMealsCategory($search , $data_view, $category){
		$deleted = 0;
		$hidden = 0;

		if (!$search) {
		    $query = "SELECT * FROM meals where deleted = ? and hidden = ? and category = ? order by id asc ";
		    // prepare query statement
   			$stmt = $this->con->prepare($query);
   			 // bind email 
	    	$stmt->bindParam(1, $deleted);
	    	$stmt->bindParam(2, $hidden);
	    	$stmt->bindParam(3, $category);
  
		  } else {
		    $search = '%'.$search.'%';
		    $query = "
		       SELECT * FROM meals where deleted = ? and 
		        (title like ? or price like ? or description like ?) and hidden = ?  and category = ? order by id asc ";

		    // prepare query statement
   			$stmt = $this->con->prepare($query);
   			 // bind email 
	    	$stmt->bindParam(1, $deleted);
	    	$stmt->bindParam(2, $search);
	    	$stmt->bindParam(3, $search);
	    	$stmt->bindParam(4, $search);
	    	$stmt->bindParam(5, $hidden);
	    	$stmt->bindParam(6, $category);
 		}

 		// execute query
	    if (!$stmt->execute()){
	    	return false;
	    }

	    $total_no = $stmt->rowCount();
	    if($total_no > 0){
	  
		    $numbering = 0;
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
		    	$int_category = (int)$row["category"];
		    	$category = '';
		    	switch ($int_category) {
		    		case 0:
		    			$category = 'BreakFast';
		    			break;
		    		case 1:
		    			$category = 'Special';
		    			break;
		    		case 2:
		    			$category = 'Pastry';
		    			break;
		    		case 3:
		    			$category = 'Desert';
		    			break;
		    		case 4:
		    			$category = 'Kids Dish';
		    			break;
		    		case 5:
		    			$category = 'Salad & Soup';
		    			break;
		    		
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
		          $data_card .= '    
			        <div style="" class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
			          <div  style="box-shadow: 0px 0px 8px #0C0C0C;margin:5px;">
			            <div class="card" style="width: ;">
			              <img src="'.$row["image_path"].'" class="card-img-top" alt="'.$row["title"].'" height = "180px">
			              <div class="card-body">                
			                <h5 class="card-title"><i class="fas fa-hamburger"></i>'.$row["title"].'</h5>                
			             
			                <p>'.$row["description"].'</p>			  
			      			<div class="row no-gutters">
			                '.$admin_actions.'
			                <h5 class = "text-pink">KES '.$row["price"].'</h5>
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
			    $data_card = '<div class="ml-5 alert alert-primary animated bounce" role="alert">No Record</div>';
			    $data_table = '<div class="ml-5 alert alert-primary animated bounce" role="alert">No Record</div>';
			 }
		$data_table .= '</tbody></table>';

	  if ($data_view == "card") {
	       return $data_card;
	  } else if ($data_view == "table") {
	       return $data_table;
	  } 
	 
	}

}
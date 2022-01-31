<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\AdminModel;

//use app\controllers\MailController;

class AdminController extends Controller
{
	public AdminModel $adminModel;
	public function __construct(){

		session_start();
		if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
			session_destroy();
		   	Application::$app->request->redirect('/sign-in');
		    exit;
		/*} 
		if (!isset($_SESSION["type"]) || $_SESSION["type"] !== 'admin'){
			session_destroy();
			Application::$app->request->redirect('/login');
		    exit;
		}*/
		
	}
	$this->adminModel = new AdminModel();
}

	public function adminDashboard(){
		$params = [
			
					];
		return Application::$app->router->renderView('admin/index', $params);
	}

	
	public function meals(){
		$method = Application::$app->request->getMethod();
		if($method === 'get'){
			return Application::$app->router->renderView('admin/students');
		}

	}

	public function trash(){
		$method = Application::$app->request->getMethod();
		if($method === 'get'){
			return Application::$app->router->renderView('admin/trash');
		}

	}

	

	public function addMeal(){
		$method = Application::$app->request->getMethod();
		$body = Application::$app->request->getBody();
		if($method === 'post'){
			if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != ''){
		        $name = $_FILES['file']['name'];
		        $target_dir = "uploads/meals/";
		        $target_file = $target_dir;
		        $target_file .= $name;
		         // Upload
		        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
		        // Insert record
		        	if($this->adminModel->addMeal($body['title'], $body['price'], $target_file, $body['description'],  $body['category'])){
		        		 $data = ["message" => "success"];;
		        	}else{
		        		$data = ["message" => "Internal Error"];
		        	}
				}else{
					$data = ["message" => "unable to upload image"];
				}
				
			}else{
				$data = ["message" => "unable to upload image"];
			}
			echo json_encode($data);
		}
	}


	public function updateDetails(){
		$method = Application::$app->request->getMethod();
		$body = Application::$app->request->getBody();
		if($method === 'post'){
			if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != ''){
		        $name = $_FILES['file']['name'];
		        $target_dir = "uploads/meals/";
		        $target_file = $target_dir;
		        $target_file .= $name;
		         // Upload
		        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
		        // Insert record
		        	if($this->adminModel->updateDetails($body['id'], $body['title'], $body['price'], $target_file, $body['description'],  $body['category'])){
		        		 $data = ["message" => "success"];;
		        	}else{
		        		$data = ["message" => "Internal Error"];
		        	}
				}else{
					$data = ["message" => "unable to upload image"];
				}
				
			}else{
				$data = ["message" => "unable to upload image"];
			}
			echo json_encode($data);
		}
	}

 



	public function readMeals(){
		$method = Application::$app->request->getMethod();
		if($method === 'get'){
			$body = Application::$app->request->getBody();
			$data = $this->adminModel->readMeals($body['search'], $body['data_view']);
			
			echo $data;
			
		}
	}

	public function hideMealToggle(){
		$method = Application::$app->request->getMethod();
		if($method === 'post'){
			$body = Application::$app->request->getBody();
			if($this->adminModel->hideMealToggle($body['id'])){
				$data = [
		            'status' => 'success'
		        ];
			}else{
				$data = [
		            'status' => 'error'
		        ];
			}
			echo json_encode($data);
		}
	}

	public function addEmployee(){

		$method = Application::$app->request->getMethod();
		if($method === 'post'){
			$body = Application::$app->request->getBody();
        	if($this->adminModel->userExists($body['email'])){
        		$data = [
                'status' => 'error',
                'message' => 'account exists'
                ];
        	}else{
        		if($this->adminModel->addStudent($body['firstname'], $body['secondname'], $body['email'], $body['phone'], $body['payment'])){
        			$data = [
                        'status' => 'success',
                        'message' => 'one record added'
                    ];
        		}else{
        			$data = [
                        'status' => 'error',
                        'message' => 'Internal Error'
                    ];
        		}
        	}

        	$data = json_encode($data);
    		echo $data;
		}
	}

	public function deleteMeals(){
		$method = Application::$app->request->getMethod();
		if($method === 'post'){
			$body = Application::$app->request->getBody();
			if($this->adminModel->deleteMeals($body['id'])){
				$data = [
		            'status' => 'success',
		            'message' => 'one record deleted'
		        ];
			}else{
				$data = [
		            'status' => 'error',
		            'message' => exit(mysqli_error($con))
		        ];
			}
			echo json_encode($data);
		}
	}

	public function readTrash(){

		$method = Application::$app->request->getMethod();
		if($method === 'get'){
			$body = Application::$app->request->getBody();
			$data = $this->adminModel->readTrash($body['search'], $body['data_view']);
			
			echo $data;
			
		}
	}

	public function getDetails(){
		$method = Application::$app->request->getMethod();
		if($method === 'post'){
			$body = Application::$app->request->getBody();
			$row = $this->adminModel->getDetails($body['id']);
			
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
		    	switch ($row["hidden"]) {
		    		case 0:
		    			$hidden = 'false';
		    			break;
		    		case 1:
		    			$hidden = 'true';
		    			break;
		    		default:
		    			$hidden = '';
		    			break;
		    	}

				$data = [
					'status' => 'success',
		            'id' => $row['id'],
		            'title' => $row['title'],
		            'price' => $row['price'],
		            'description' => $row['description'],
		            'category' => $category,
		            'hidden' => $hidden,
		            'updated_at' => $row['updated_at'],
		            'created_at' => $row['created_at']
		        ];
		
			echo json_encode($data);
		}
	}

	public function readRevenue(){
		$method = Application::$app->request->getMethod();
		if($method === 'get'){
			$body = Application::$app->request->getBody();
			$data = $this->adminModel->revenueRead($body['search'], $body['data_view']);
			
			echo $data;
			
		}
	}


	public function deleteStudent(){
		$method = Application::$app->request->getMethod();
		if($method === 'post'){
			$body = Application::$app->request->getBody();
			if($this->adminModel->deleteStudent($body['id'])){
				$data = [
		            'status' => 'success',
		            'message' => 'one record deleted'
		        ];
			}else{
				$data = [
		            'status' => 'error',
		            'message' => exit(mysqli_error($con))
		        ];
			}
			echo json_encode($data);
		}
	}


	public function restoreMeal(){
		$method = Application::$app->request->getMethod();
		if($method === 'post'){
			$body = Application::$app->request->getBody();
			if($this->adminModel->restoreMeal($body['id'])){
				$data = [
		            'status' => 'success'
		        ];
			}else{
				$data = [
		            'status' => 'error'
		        ];
			}
			echo json_encode($data);
		}
	}

}
<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\SubscribeModel;
use app\models\CustomSession;

class PagesController extends Controller
{

	public function home(){
		$params = [];
		return Application::$app->router->renderView('landing', $params);
	}

	public function about(){
		$params = [];
		return Application::$app->router->renderView('about', $params);
	}

	
	public  function contactUs(){
		$params = [];
		return Application::$app->router->renderView('Contact', $params);
	}

	public static function handleContact(Request $request){
		$params = [];
		$body = $request->getBody();	
	}

	public static function adminDashboard(){
		$params = [];
		return Application::$app->router->renderView('admin/index', $params);
	}
	
	public static function ourActivities(){
		$params = [];
		return Application::$app->router->renderView('funpage', $params);
	}
	public static function terms(){
		$params = [];
		return Application::$app->router->renderView('terms', $params);
	}
	public function subscribe(){
		$subscribe = new SubscribeModel();
		$method = Application::$app->request->getMethod();
		if($method === 'post'){
			$body = Application::$app->request->getBody();
			if($subscribe->userExists($body['email'])){
				$params = ['message' => 'exists'];
				echo json_encode($params);
				exit;
			}
			if(!$subscribe->addUser($body['email'])){
				$params = ['message' => 'Unable to add user'];
			}else{
				$params = ['message' => 'success'];
			}
			echo json_encode($params);
			exit;

		}
	}
}
?>
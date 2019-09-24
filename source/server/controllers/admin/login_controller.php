<?php
class login_controller extends vendor_crud_controller {
	protected 	$errors = false;

	public function index() {
		global $app;
		$rolesFlip = array_flip($app['roles']);
		if (isset($_COOKIE['remember_token'])) {
			$auth = new vendor_auth_model();
			$remember_token =$_COOKIE["remember_token"];

			if ($auth->login(null, true, $remember_token)) {
				header( "Location: ".vendor_app_util::url(['ctl'=>'dashboard']));
			} else {
			}
		}
		if (isset($_SESSION['user']['role']) && 
			(	$_SESSION['user']['role']==$rolesFlip["admin"] ||
				$_SESSION['user']['role']==$rolesFlip["adsmanager"] ||
				$_SESSION['user']['role']==$rolesFlip["supplier"]
			)) {
			header( "Location: ".vendor_app_util::url(array('ctl'=>'dashboard')));
		}

		if(isset($_POST['btn_submit'])) {
			$user = $_POST['user'];
			$auth = new vendor_auth_model();	
			if (!vendor_app_util::validationEmail($user['email'])){
				$this->errors['input'] = "Wrong email!";
			}

			else if($auth->login($user, true)) {
				if (isset($_SESSION['link']) && $_SESSION['link'] != "") {
					header( "Location: ".vendor_app_util::url(array('ctl'=>substr($_SESSION['link'],6))));
				} else {
					header( "Location: ".vendor_app_util::url(array('ctl'=>'dashboard')));
				}
			} else {
				$this->errors['input'] = "Wrong username or password!";
			}
		}
	    $this->display();
	}
	
	public function logout() {
		$um = new user_model();
		$um->editRecord(
			$_SESSION['user']['id'],
			[
				'remember_token' 	=> '',
			]
		);

		session_unset(); 
		session_destroy(); 
		$time = 3600;
    	unset($_COOKIE['remember_token']);
    	setcookie('remember_token', '', time() - $time, '/');
    	
		header( "Location: ".vendor_app_util::url(array('ctl'=>'login')));
	}
}
?>
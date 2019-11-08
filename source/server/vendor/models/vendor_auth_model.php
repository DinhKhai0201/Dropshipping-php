<?php
class vendor_auth_model extends vendor_main_model {
	public function login($user=null, $admin=false, $remember=null) {
		
		$result = null;
		$um = new user_model();
		if($user){
			$email = $user['email'];
			$password = vendor_app_util::generatePassword($user['password']);
			$result = $um->getRecordWhere([
				'email' => $email,
				'status' => 1,
				'password' => $password
			]);
		}
		if($remember){
			$remember_token = $remember;
			$result = $um->getRecordWhere([
				'remember_token' => $remember_token,
				'status' => 1,
			]);
		}
		if ($result) {
			$row = $result;
			$_SESSION['user'] = $row;
			if (isset($_POST['remember'])){
				$time = time()+60*60*24*100;
				$identify = vendor_app_util::hashStr();
				if ($um->editRecord($row['id'],[
					'remember_token' => $identify,
					'status' => 1,
				]))
				setcookie("remember_token",$identify, $time, "/");
			}
			if($admin) {
				global $app;
				$rolesFlip = array_flip($app['roles']);
				if (!(
					$row['role']==$rolesFlip["admin"] ||
					$row['role']==$rolesFlip["supplier"] ||
					$row['role']==$rolesFlip["adsmanager"]
				))
				return 0;
			}

			return 1;
		}
		return 0;
		
	}
}
?>
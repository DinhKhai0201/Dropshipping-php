<?php
class login_controller extends vendor_main_controller {
	protected 	$errors = false;

	public function index() {
		global $app;
		$rolesFlip = array_flip($app['roles']);
		if (isset($_COOKIE['remember_token'])) {
			$auth = new vendor_auth_model();
			$remember_token =$_COOKIE["remember_token"];
			if ($auth->login(null, true, $remember_token)) {
				header( "Location: ".vendor_app_util::url(['area' =>'','ctl'=>'']));
			} else {
			}
		}
        if (isset($_SESSION['user']['role']) && $_SESSION['user']['role']==$rolesFlip["admin"]) {
			header( "Location: ".vendor_app_util::url(array('area' => 'admin', 'ctl'=>'dashboard')));
		}

		if(isset($_POST['btn_submit'])) {
            $user = $_POST['user'];
			$auth = new vendor_auth_model();	
			if (!vendor_app_util::validationEmail($user['email'])){
				$this->errors['input'] = "Wrong email!";
			}

			else if($auth->login($user, true)) {
				if (isset($_SESSION['link']) && $_SESSION['link'] != "") {
					header( "Location: ".vendor_app_util::url(array('area' => '', 'ctl'=>substr($_SESSION['link'],6))));
				} else {
					header( "Location: ".vendor_app_util::url(array('area' => '','ctl'=>'')));
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
    	
		header( "Location: ".vendor_app_util::url(array('area' => '', 'ctl'=>'login')));
	}
	public function forgotPassWord()
	{
		global $app;
		if (isset($_POST['btn_submit'])) {
			$um = new user_model();
			$email = $_POST['email'];
			$userData = $um->getRecordWhere([
				'email' => $email
			]);
			$checkemail = new forgotpass_model();
			if ($checkemail->checkOldEmail($email)) {
				$reset_token = time() . rand(10000, 99999);
				$checkemail->add_reset_token($reset_token, $email);

				$mTo = $email;
				$title = '[EMAIL] GUIDE TO GET NEW PASSWORD';
				$href = RootABS .
					vendor_app_util::url([
						'area' =>'',
						'ctl' => 'login',
						'act' => 'resetPassWord',
						'params' => ['reset_token' => $reset_token]
					]);
				$content = "
					<div style='padding: 0 100px;'>
						<div style='padding: 0 20px;border: 1px #ccc solid;border-radius: 4px;'>
							<p>Xin chào <strong>" . $userData['lastname'] . " " . $userData['firstname'] . "</strong>,</p>
							<p>Đây là email giúp tạo lại mật khẩu mới trên <a target='_blank' href='https://dropshipping.vn/'>dropshipping.Vn</a> theo yêu cầu của bạn. Vui lòng <a  target='_blank' href='" . $href . "'>nhấp vào đây</a> để tạo mật khẩu mới.</p>
							<p style='font-style: italic;'>Lưu ý: Xin thứ lỗi nếu bạn nhận được email này do nhầm lẫn; hoặc nếu bạn không muốn thay đổi mật khẩu, xin vui lòng xóa email này và tiếp tục sử dụng mật khẩu hiện tại.</p>
							<p style='font-style: italic;'>Nếu bạn có bất kỳ thắc mắc nào, hãy liên hệ với chúng tôi để nhận được sự hỗ trợ nhanh nhất.</p>
							<p><strong>Mọi ý kiến thắc mắc vui lòng liên hệ:02363.663.688</strong></p>
						</div>
					</div>
				";
				$nTo = 'User';

				vendor_app_util::sendMail($title, $content, $nTo, $mTo);
				$this->errors = ['message' => '<a href="https://mail.google.com/mail">Thank! Check  your gmail to change password!</a>'];
			} else {
				$this->errors = ['message' => 'Tài khoản email không đúng !'];
			}
		}
		$this->display();
	}

	public function resetPassWord()
	{
		global $app;
		$this->reset_token = $app['prs']['reset_token'];
		$checkreset_token = new forgotpass_model();
		if ($checkreset_token->resetPassWord($this->reset_token)) {
			if (isset($_POST['btn_submit'])) {
				if ($_POST['password'] == $_POST['confirmpassword']) {
					$reset_token = $this->reset_token;
					$password = vendor_app_util::generatePassword($_POST['password']);
					if ($checkreset_token->updatePassword($reset_token, $password)) {
						header("Location: " . vendor_app_util::url(array('ctl' => 'login')));
					} else {
						$this->display();
					}
				} else {
					$this->errors = ['message' => 'Lỗi xác nhận mật khẩu!'];
					$this->display();
				}
			}
			$this->display();
		} else {
			$this->errors = ['message' => 'Lỗi! Token không tồn tại, vui lòng kiểm tra token '];
			$this->display(['act' => 'erorsResetPass']);
		}
	}
}

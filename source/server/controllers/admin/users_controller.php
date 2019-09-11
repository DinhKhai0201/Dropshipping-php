<?php
class users_controller extends vendor_backend_controller {
	public function index() {
		global $app;
		$conditions = "";

		if(isset($app['prs']['status'])){
			$status = $app['prs']['status'];
			$conditions .= (($conditions)? " AND ":"")." status=".($status=='active'?1:0);
		}
		
		if(isset($app['prs']['type'])){
			$type = $app['prs']['type'];
			$role='';
			if($type=='admin') 			$role='1';
			if($type=='supplier') 		$role='2';
			if($type=='candidate') 		$role='3';
			if($type=='jobmanager') 	$role='5';
			if($type=='adsmanager') 	$role='4';
			$conditions .= (($conditions)? " AND ":"")." role=".$role;
		}

		if(isset($app['prs']['search'])){
			$conditions .= (($conditions)? " AND ":"").
			" firstname like '%".$app['prs']['search']."%' OR ".
			" lastname like '%".$app['prs']['search']."%' OR".
			" id like '%".$app['prs']['search']."%' OR".
			" email like '%".$app['prs']['search']."%'";
		}

		$user = new user_model();
		$this->records = $user->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
			$um = new user_model();
			$userData = $_POST['user'];
			$valid = $um->validator($userData);
			if($_FILES['image']['tmp_name']){
        $s3 = new vendor_aws();
        $name = $s3->createWithDate($_FILES['image']['name'], $_FILES['image']['tmp_name'], 'users');
        $userData['avata'] = $name;
      }
			if($valid['status']) {
				$userData['password'] = vendor_app_util::generatePassword($userData['password']);
				unset($userData['password_confirm']);
				if($um->addRecord($userData))
					header("Location: ".vendor_app_util::url(["ctl"=>"users"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data!'];
					$this->record = $userData;
				}
			} else {
				$this->errors = $um::convertErrorMessage($valid['message']);
				$this->record = $userData;
			}
		}
		$this->display();
	}

	public function edit($id) {
		$um = new user_model();
		$this->record = $um->getRecord($id);
		if(isset($_POST['btn_submit'])) {
			$userData = $_POST['user'];
			if($_FILES['image']['tmp_name']) {
        $s3 = new vendor_aws();
        $s3->delete($this->record['avata'], $this->controller);
        $name = $s3->createWithDate($_FILES['image']['name'], $_FILES['image']['tmp_name'], $this->controller);
        $userData['avata'] = $name;

			}
			$valid = $um->validator($userData, $id);
			if($valid['status']){
				if($userData['password']){
					unset($userData['password_confirm']);
					$userData['password'] = vendor_app_util::generatePassword($userData['password']);
				}
				else{
					unset($userData['password']);
					unset($userData['password_confirm']);
				}

				if($um->editRecord($id, $userData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"users"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'];
					$this->record = $userData;
				}
			} else {
				$this->errors = $um::convertErrorMessage($valid['message']);
				$this->record = $userData;
				$this->record['id'] = $id;
			}
		}
		$this->display();
	}
	
	public function view($id) {
		$um = new user_model();
		$this->record = $um->getRecord($id);

		if($this->record['role'] == 2){
	        $job = new job_model();
	        $conditions = "jobs.user_id = ".$id;
			$this->records = $job->allp('*',['conditions'=>$conditions, 'joins'=> false, 'order'=>'id ASC']);
			$company_model = new company_model();
			$this->company = $company_model->getRecordWhere(['user_id'=>$id]);
		}
		if($this->record['role'] == 3){
			$cv_user_model = new cv_user_model();
			$this->cvs = $cv_user_model->all('*', [
				'joins' => ['cv_template', 'cv_job_info'],
				'conditions' => ' user_id = ' . $this->record['id'],
				'order'=> 'id ASC',
				'get-child' => true,
				'distinct' => true
			]);
			$cv_user_model = new cv_user_model();
			$this->cv_user = $cv_user_model->getRecordWhere(['user_id'=>$id]);
		}
		// echo "Start <br/>"; echo '<pre>'; print_r($this->cvs);echo '</pre>';exit("End Data");
		$this->display();
	}

	public function changestatus() {
		global $app;
		$id = $app['prs'][1];
		$user = new user_model();
		$userData['status'] = $app['prs'][2]?0:1;
		if($user->editRecord($id, $userData, "role != 1")) echo "Change status successful";
		else echo "error";
	}

	public function del($id) {
    $user = new user_model();
    $s3 = new vendor_aws();
    $image = $user->getRecord($id)['avata'];
    $s3->delete($image, 'users');
		if($user->delRelativeRecord($id, "role != 1")) echo "Delete Successful";
		else echo "error";
	}

	public function delmany() {
		global $app;
		$ids = $app['prs']['ids'];
    $users = new user_model();
    $arrId = explode(',', $ids);
    $s3 = new vendor_aws();
    foreach ($arrId as $key => $value) {
      $image = $users->getRecord($value)['avatar'];
      $s3->delete($image, 'users');
    }
		if($users->delRelativeRecords($ids, "role != 1")) echo "Delete many successful";
		else echo "error";
	}

	public function profile() {
		$um = new user_model();
		$this->record = $um->getRecord($_SESSION['user']['id']);
		$this->display();
	}

	public function changepassword() {
		global $app;
		$curpassword = vendor_app_util::generatePassword($_POST['curpassword']);
		$um = new user_model();
		if( $um->checkOldPassword($curpassword)) {
			$newpassword 	= $_POST['newpassword'];
			$userData['password'] = vendor_app_util::generatePassword($newpassword);

			$id 		= $_SESSION['user']['id'];
			$password 	= $um->getAllRecordsLimit($id);
			if($um->editRecord($id, $userData))
				echo json_encode(['status'=>1, 'message'=>'Update successful!']);
			else echo json_encode(['status'=>0, 'message'=>'Have error when update password!']);
		} else {
			echo json_encode(['status'=>0, 'message'=>'Current password not match!']);
		}
		exit;
	}

	public function register_today() {
		$startDate  = date("Y-m-d")." 00:00:00"; 
    	$endDate    = date("Y-m-d")." 23:59:59";
		global $app;
		$conditions = "";
		$conditions .= (($conditions)? " AND ":"").'role=2 AND created_at <"'.$endDate.'" AND created_at >"'.$startDate.'"';
		if(isset($_POST['search'])){
			$conditions .= (($conditions)? " AND ":"").
			" firstname like '%".$_POST['search']."%' OR ".
			" lastname like '%".$_POST['search']."%' OR".
			" id like '%".$_POST['search']."%' OR".
			" email like '%".$_POST['search']."%'";
		}
		$user = new user_model();
		$this->records = $user->allp('*',['conditions'=>$conditions, 'joins'=>false]);
		$this->display();
	}
 
}
?>
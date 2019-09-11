<?php
class user_model extends vendor_pagination_model
{
	public $nopp = 10;
	public static $avatUrl = UploadREL."users/";
	public static $status = [
						0 => 'Deactive',
						1 => 'Active'
					];
	
	protected $relationships = [
		'hasMany'	=>	[
			['follow',	'key'=>'user_id',	'on_del'=>false],	
			['cv_user',	'key'=>'user_id',	'on_del'=>false],	
		],

	];

	public function rules() {
		global $app;
	    return [
        	'email' 	=> [['required', 'errmsg'=>'email can not bank!'], 'unique', 'string', ['max', 'value'=>60]],
	        'password' 	=> ($app['act']=='edit')? []: [['min', 'value'=> 4], ['max', 'value'=>60]],
	        'password_confirm' => ['matchPassword'],
	    ];
	}

	public static function getAvataUrl() {
		return RootURL.self::$avatUrl.$_SESSION['user']['avata'];
	}

	public static function getFullnameLogined() {
		return isset($_SESSION['user'])?ucfirst($_SESSION['user']['lastname'])." ".ucfirst($_SESSION['user']['firstname']):'';
	}

	public static function getFullname($id) {
		$user = (new self)->getRecord($id);
		return ucfirst($user['lastname'])." ".ucfirst($user['firstname']);
	}

	public function getTopUser()
	{
		$rsAll = $this->getAllData();
		$topUser = array();
		for($id = 0; $id < NUM_TOP_USERS; $id++){
			if(isset($rsAll[$id]))
				$topUser[$id] = $rsAll[$id];
			else break;
		}
		return $topUser;
	}

	public function getAllChangepass()
	{
		$email = ucfirst($_SESSION['user']['email']);
		$sql = "SELECT `password` FROM `users` WHERE `email` = '".$email."'";
		$result = $this->con->query($sql);
		
		return $result;
	}

	public function checkOldPassword($password)
	{
		$email = ucfirst($_SESSION['user']['email']);
		$sql = "SELECT COUNT(id) as total  FROM `users` WHERE `email` = '".$email."' AND `password` = '".$password."'";
		$result = $this->con->query($sql);
		return $result->fetch_assoc()['total'];
	}

	public function checkOldPasswordApi($password, $email)
	{
		$sql = "SELECT COUNT(id) as total  FROM `users` WHERE `email` = '".$email."' AND `password` = '".$password."'";
		$result = $this->con->query($sql);
		return $result->fetch_assoc()['total'];
	}

	public function updatePassword($newpassword)
	{
		$email = ucfirst($_SESSION['user']['email']);
		$sql = "UPDATE users SET password='$newpassword' WHERE `email` = '".$email."'";
		$result = $this->con->query($sql);
		
		return $result;
	}
	
	public function profile(){
		$email = ucfirst($_SESSION['user']['email']);
		$sql = "SELECT * FROM `users` WHERE `email` = '".$email."'";
		$result = $this->con->query($sql);
		if($result) {
			$record = $result->fetch_assoc();
		} else $record=false;
		return $record;
	}

	public function getLongestUser() {
		$join = "";
		$fields = $this->table.".id, ".$this->table.".lastname";
		if(isset($this->relationships)) {
			$joinFields = $join = "";
			foreach($this->relationships as $k=>$rv) {
				if(!vendor_app_util::is_multi_array($rv)) {
					$vtmp = $rv;
					$rv = [];
					$rv[] = $vtmp;
				}
				foreach($rv as $v) {
					if(isset($options['joins']) && ($v[0]!='report'))
						continue;
					$joinTable = $this->getTableNameFromModelName($v[0]);
					$joinTableFields = $this->getAllFieldsOfTable($joinTable);
					if($k=="hasMany") {
						$joinFields .= ", SUM(".$joinTable.".work_time) as user_time";
						$join .= " RIGHT JOIN ".$joinTable." ON ".$this->table.".id=".$joinTable.".".$v['key']." ";
						break;
					}
				}
			}
			if($joinFields)	$fields .= $joinFields;
		}
		$group = " GROUP BY ".$this->table.".id";

		$order = " ORDER BY user_time DESC";
		$limit = " LIMIT 1";
		
		$sql = "SELECT ".$fields." FROM ".$this->table.$join.$group.$order.$limit;
		$result = $this->con->query($sql);
		if($result) {
			$record = $result->fetch_assoc();
		} else $record=false;
		return $record;
	}

	public function checkUser ($id)
	{
		$authorization = $_SERVER['HTTP_AUTHORIZATION'];
		$token_auth = ltrim($authorization, 'Token=');
		$user =  $this->getRecordWhere([
			'token_user' => $token_auth,
			'id' => $id
		]);
		if (!$user) {
			$data = [
				'status' => false,
				'error' => 'User does not exits!'
			];
			http_response_code(401);
			echo json_encode($data);
			exit();
		} else {
			return $user;
		}
	}

}
?>
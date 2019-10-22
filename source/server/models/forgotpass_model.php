<?php 
class forgotpass_model extends vendor_frap_model
{
	public function checkOldEmail($email)
	{
		$sql = "SELECT COUNT(id) as total  FROM `users` WHERE `email` = '".$email."'";
		$result = $this->con->query($sql);
		return $result->fetch_assoc()['total'];
	}

	public function add_reset_token($reset_token,$email)
	{
		$sql = "UPDATE users SET reset_token = '$reset_token' WHERE email = '$email'";
		return mysqli_query($this->con,$sql);
	}
	public function addRememberToken($token,$email)
	{
		$sql = "UPDATE users SET remember_active_token = '$token' WHERE email = '$email'";
		return mysqli_query($this->con,$sql);
	}
	public function deletereset_token($reset_token)
	{
		$sql = "DELETE FROM users WHERE reset_token = '$reset_token'";
		return mysqli_query($this->con,$sql);
	}

	public function resetPassWord($reset_token)
	{
		$sql = "SELECT COUNT(id) as total  FROM `users` WHERE `reset_token` = '".$reset_token."'";
		$result = $this->con->query($sql);
		return $result->fetch_assoc()['total'];
	}
	public function updatePassword($reset_token,$password)
	{
		$sql = "UPDATE users SET password = '$password' WHERE reset_token = '".$reset_token."'";
		return mysqli_query($this->con,$sql);
	}
}

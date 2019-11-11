<?php
class checkout_controller extends vendor_main_controller
{
	public function index() 
	{
		$this->display();
	}
	public function cart()
	{
		if (!isset($_SESSION['user'])) {
			header("Location: " . vendor_app_util::url(array('area' => '', 'ctl' => 'login')));
		} else {
            $this->display();
        }
	} 
}

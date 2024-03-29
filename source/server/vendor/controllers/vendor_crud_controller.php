<?php
class vendor_crud_controller extends vendor_main_controller {
	public function  __construct() {
		global $app;
		$this->controller = $app['ctl'];
		if(isset($app['act'])) $this->action = $app['act'];
		else $app['act'] = $this->action;
		$this->isMobile = false;
		$detect = new Mobile_Detect();
		if ($detect->isMobile()){
			$this->isMobile = true;
		}
		if(method_exists($this, $this->action)) {
			if($this->action=='view' || $this->action=='edit' || $this->action=='del') {
				$id='';
				if(isset($app['prs'][1]))	$id=$app['prs'][1];
				$this->{$this->action}($id);
			} else {
				if(isset($app['prs']) && count($app['prs'])) {
					$this->{$this->action}($app['prs']);
				} else $this->{$this->action}();
			}
		} else {
			return new staticpages_controller();
		}
	}
}
?>
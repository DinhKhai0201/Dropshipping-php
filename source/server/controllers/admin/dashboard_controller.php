<?php
class dashboard_controller extends vendor_manager_controller {
	public function index() {
		global $app;
 		$today  = date("Y-m-d"); 
 		$startDate  = date("Y-m-d")." 00:00:00"; 
    	$endDate    = date("Y-m-d")." 23:59:59";
		$um = new user_model();	
		$this->rolesFlip = array_flip($app['roles']);
		$this->noUsersRegisteredToday = $um->getCountRecords(['conditions'=>'role!=1 AND created <"'.$endDate.'" AND created >"'.$startDate.'"']);
		$this->noUsers = $um->getCountRecords();
		$this->noNonAdminUsers = $um->getCountRecords(['conditions'=>'role!=1']);
		$this->noNonAdminActiveUsers = $um->getCountRecords(['conditions'=>'role!=1 AND status=1']);

		$im = new static_page_model();
		$this->noStaticPages = $im->getCountRecords();

		$coupon = new coupon_model();
		$this->noCoupons = $coupon->getCountRecords();

		if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 3){
			$product = new product_model();
			$this->noProducts = $product->getCountRecords(['conditions'=>'']);
		} else {
			$product = new product_model();
			$this->noProducts = $product->getCountRecords();
		}
		
		$category = new category_model();
		$this->noCategories = $category->getCountRecords();

		$order = new order_model();
		$this->noOrders = $order->getCountRecords();

		$ad = new ad_model();
		$this->noAds = $ad->getCountRecords();
		$this->display();
	}
}
?>
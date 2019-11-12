<?php
class checkout_controller extends vendor_main_controller
{
	public function index() 
	{
		if (!isset($_SESSION['user'])) {
			header("Location: " . vendor_app_util::url(array('area' => '', 'ctl' => 'login')));
		} else {
			$cart = new cart_model();
			$wishlist = new wishlist_model();
			$this->nocart = $cart->getCountRecords();
			$this->products = $cart->getAllRecords('carts.*', [
				'conditions' => 'carts.user_id =' . $_SESSION['user']['id'],
				'joins' => ['product', 'user']
			]);
			// foreach ($this->products as $key => $value) {
			// 	echo (json_encode($value));
			// }
			$this->display();
		}
	}
	public function cart()
	{
		if (!isset($_SESSION['user'])) {
			header("Location: " . vendor_app_util::url(array('area' => '', 'ctl' => 'login')));
		} else {
            $this->display();
        }
	}
	public function addtocart()
	{
		$status = false;
		$pm = new product_model();
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
			$this->record = $pm->getRecord($id);
		}
		$cartData['product_id'] = $id;
		$cartData['user_id'] = $_SESSION['user']['id'];
		$cartData['quantity'] = $_POST['qty'];
		$cartData['price'] = $_POST['price'];
		$cartData['color'] = $_POST['color'];
		$cartData['image'] = $_POST['image'];

		$wm = new cart_model();
		$valid = $wm->validator($cartData);
		if ($valid['status']) {
			if ($res = $wm->addRecord($cartData)) {
				$status = true;
				$cartData['id'] = $res;
			} 
		}
		if ($status == true) {
			echo json_encode($cartData);
		} else {
			echo json_encode($status);
		}
	}
	public  function removecart()
	{
		if (isset($_SESSION['user'])) {
			$id = $_POST['id'];
			$cart = new cart_model();
			$cart->delRelativeRecord($id);
			echo json_encode($id);
		}
	}

	public function removecartmany()
	{
		$status = false;
		if (isset($_SESSION['user'])) {
			$cart = new cart_model();
			if ($cart->delAllCart()) {
				$status = true;
			}
			echo json_encode($status);
		}
	} 
}

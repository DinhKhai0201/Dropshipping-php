<?php
class checkout_controller extends vendor_main_controller
{
	public function index() 
	{
		if (!isset($_SESSION['user'])) {
			header("Location: " . vendor_app_util::url(array('area' => '', 'ctl' => 'login')));
		} else {
			$cart = new cart_model();
			$this->nocart = $cart->getCountRecords(['conditions' => 'carts.user_id =' . $_SESSION['user']['id']]);
			$this->products = $cart->getAllRecords('carts.*', [
				'conditions' => 'carts.user_id =' . $_SESSION['user']['id'],
				'joins' => ['product', 'user']
			]);
			$this->display();
		}
	}
	public function cart()
	{
		if (!isset($_SESSION['user'])) {
			header("Location: " . vendor_app_util::url(array('area' => '', 'ctl' => 'login')));
		} else {
			global $app;
			$cart = new cart_model();
			$this->nocart = $cart->getCountRecords(['conditions' => 'carts.user_id =' . $_SESSION['user']['id']]);
			$this->carts = $cart->getAllRecords('carts.*', [
				'conditions' => 'carts.user_id =' . $_SESSION['user']['id'],
				'joins' => ['product', 'user']
			]);
            $this->display();
        }
	}
	public function orders() {
		$status = false;
		if (isset($_SESSION['user'])) {
			global $app;
			$cart = new cart_model();
			$order = new order_model();
			$order_i = new order_item_model();
			$to_address = $_SESSION['user']['address'];
			$currency = 0;
			$token = md5(random_bytes(16));
			// exit($token);
			$this->carts = $cart->getAllRecords('carts.*', [
				'conditions' => 'carts.user_id =' . $_SESSION['user']['id'],
				'joins' => ['product', 'user']
			]);
			$dataOrder['token'] = $token;
			$dataOrder['user_id'] = $_SESSION['user']['id'];
			$dataOrder['order_status'] = 0;
			$dataOrder['to_address'] =  $to_address;
			$dataOrder['total_price'] = $_POST['total'];
			$dataOrder['info'] = $_POST['info'];
			$dataOrder['currency'] = $currency;
			$valid = $order->validator($dataOrder);
			if ($valid['status']) {
				if ($id_order = $order->addRecord($dataOrder)) {
					foreach ($this->carts as $key => $value) {
						$order_item['order_id'] = $id_order;
						$order_item['product_id'] = $value['product_id'];
						$order_item['supplier_id'] = $value['supplier_id'];
						$order_item['quantity'] = $value['quantity'];
						$order_item['color'] = $value['color'];
						$order_item['size'] = $value['size'];
						$order_item['price'] = $value['price'];
						$valid_order = $order_i->validator($order_item);
						if ($valid_order['status']) {
							if ($ido = $order_i->addRecord($order_item)) {
								$status = true;
							}
						}

					}
					
				}
			}
			if ($status = true) {
				$cart->delAllCart();
				http_response_code(200);
				echo ($token);
			}
			
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
		$cartData['supplier_id'] = $_POST['supplier'];
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
	public function editqty() {
		if (isset($_SESSION['user'])) {
			$cart = new cart_model();
			$id = $_POST['id'];
			$cartData['quantity'] = $_POST['quantity'];
			$valid = $cart->validator($cartData, $id);
			if($valid['status']){
				if($cart->editRecord($id,$cartData)) {
					http_response_code(200);
					echo ($id);
				}
			}
			
		}
	}
	
}

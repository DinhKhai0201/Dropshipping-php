<?php
class cart_model extends vendor_pagination_model
{
	public $nopp = 10;
	protected $relationships = [
		'belongTo' => [
			['product', 'key' => 'product_id'],
			['user', 'key' => 'user_id']

		]
	];
	public function rules()
	{
		global $app;
		return [];
	}
	public function delAllCart()
	{
		$sql = "DELETE FROM carts WHERE user_id = " . $_SESSION['user']['id'];
		if ($this->con->query($sql)) {
			return true;
		} else {
			return false;
		}
	}
}

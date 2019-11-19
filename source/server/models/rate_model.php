<?php
class rate_model extends vendor_pagination_model
{
	public $nopp = 10;

	public function rules() {
		global $app;
	}

	protected $relationships = [
		'belongTo' => [
			['user', 'key' => 'user_id'],
			['product', 'key' => 'product_id']

		]
	];
}

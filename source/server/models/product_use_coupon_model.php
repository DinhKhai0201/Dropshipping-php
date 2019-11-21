<?php
class product_use_coupon_model extends vendor_pagination_model
{

	public function rules() {
		global $app;
	}

	protected $relationships = [
        'belongTo' => [
            ['product', 'key' => 'product_id'],
            ['coupon', 'key' => 'coupon_id'],
        ]
	];
}

<?php
class order_item_model extends vendor_pagination_model
{
    public function rules() {
		global $app;
	    
	}
	protected $relationships = [
		'belongTo' => [
			['product','key'=>'product_id'],
			['user','key'=>'supplier_id']
		]
	];
}
?>
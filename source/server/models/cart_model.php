<?php
class cart_model extends vendor_pagination_model
{
    public $nopp = 10;

	protected $relationships = [
		'belongTo'	=>	[
            ['product',	'key'=>'product_id', 'on_del'=>false],
            ['user',    'key' => 'user_id', 'on_del' => false],
		],
	];
}

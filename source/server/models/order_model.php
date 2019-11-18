<?php
class order_model extends vendor_pagination_model
{
	public $nopp = 10;
	public static $status = [
						0 => 'Pendding',
						1 => 'Cancel',
						2 => 'Shipping',
						3 => 'Complete'
                    ];
  
	public function rules() {
		global $app;
	    
	}
	protected $relationships = [
		'hasMany'	=>	[
			['order_item',	'key'=>'order_id', 'on_del'=>true],
			
		],
		'belongTo' => [
			['user','key'=>'user_id']
		]
	];
	

}
?>
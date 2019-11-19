<?php
class comment_model extends vendor_pagination_model
{
	public $nopp = 10;

	public function rules() {
		global $app;
	}

	protected $relationships = [
		'hasMany'	=>	[
			['reply',	'key'=>'comment_id', 'on_del'=>true],
		],
		'belongTo' => [
			['product', 'key' => 'product_id'],
			['user', 'key' => 'user_id']

		]
	];
}
?>
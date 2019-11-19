<?php
class reply_model extends vendor_pagination_model
{
	public $nopp = 10;

	public function rules() {
		global $app;
	}

	protected $relationships = [
		'belongTo' => [
			['comment', 'key' => 'comment_id'],
			['user', 'key' => 'user_id'],
			['product', 'key' => 'product_id']

		]
	];
}
?>
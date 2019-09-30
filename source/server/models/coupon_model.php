<?php
class coupon_model extends vendor_pagination_model
{
	public $nopp = 10;
	public static $status = [
						0 => 'Inactive',
						1 => 'Active'
                    ];
    public static $type = [
        0 => 'Percent value',
        1 => 'Fix value'
    ];
	public function rules() {
		global $app;
	    return [
        	'name' => ['required', 'unique', 'string', ['max', 'value'=>50]],
        	'coupon_code' 	=> ['required', 'unique', 'string', ['max', 'value'=>50]],
	    ];
	}

	protected $relationships = [
		'hasMany'	=>	[
			['product_use_coupon',	'key'=>'coupon_id', 'on_del'=>true],
		],
	];
}
?>
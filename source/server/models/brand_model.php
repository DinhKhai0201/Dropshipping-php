<?php
class brand_model extends vendor_pagination_model
{
    public $nopp = 10;
	public function rules() {
		global $app;
	    return [
        	'name' => ['required', 'unique', 'string', ['max', 'value'=>50]],
        	'slug' 	=> ['required', 'unique', 'string', ['max', 'value'=>50]],
	    ];
	}

	protected $relationships = [
		'hasMany'	=>	[
			['product',	'key'=>'brand_id', 'on_del'=>true],
		],
	];
}
?>
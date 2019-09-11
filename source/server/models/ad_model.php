<?php
class ad_model extends vendor_pagination_model
{
	public $nopp = 10;
	public static $status = [
						1 => 'Active',
						0 => 'Inactive',
					];
	public function rules() {
		global $app;
	    return [
        	'title' => ['required', 'string'],
        	'description' => ['required', 'string'],
        	'url' => ['required', 'string'],
	    ];
	}
}
?>
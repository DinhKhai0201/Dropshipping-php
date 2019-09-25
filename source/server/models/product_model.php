<?php
class product_model extends vendor_pagination_model
{
	public $nopp = 10;
	public static $status = [
						0 => 'No Exist',
                        1 => 'Exist',
                        2 => 'Running low',
                        3 => 'Out of'
                        
					];
	public function rules() {
		global $app;
	    return [
        	'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'quality' => ['required', 'string'],
        	'price' => ['required', 'int'],
	    ];
	}

}
?>
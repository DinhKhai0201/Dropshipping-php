<?php
class category_type_model extends vendor_pagination_model
{
	public $nopp = 10;
	public static $status = [
						0 => 'Inactive',
						1 => 'Active'
					];
	public function rules() {
		global $app;
	    return [
        	'id' => ['required', 'unique', 'string', ['max', 'value'=>100]],
        	'categoryName' 	=> ['required', 'unique', 'string', ['max', 'value'=>255]],
	    ];
	}

	protected $relationships = [
		'hasMany'	=>	[
			['product',	'key'=>'category_id'],
		],
	];
	
	public function getAllCategory($level)
	{
		$records['data'] = [];
		$recordsCategories = $this->getAllRecords('*',['conditions'=>'category_types.level='.$level, 'joins'=>'', 'order'=>'id ASC']);
		if($recordsCategories) {
			while($row = $recordsCategories->fetch_assoc()) {
	    		$records['data'][] = $row;
	    	}
		}
		return $records['data'];
	}
    	
}
?>
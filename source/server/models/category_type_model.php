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
		$conditions = 'category_types.level=' . $level;
		$records['data'] = [];
		$recordsCategories = $this->getAllRecords('*',['conditions'=> $conditions, 'joins'=>'', 'order'=>'id ASC']);
		if($recordsCategories) {
			while($row = $recordsCategories->fetch_assoc()) {
	    		$records['data'][] = $row;
	    	}
		}
		return $records['data'];
	}
	public function getCategories()
	{
		$data = $this->getAllRecords('*', ['conditions' => '', 'joins' => '', 'order' => 'id ASC']);
		if ($data) {
			while ($row = $data->fetch_assoc()) {
				$records['data'][] = $row;
			}
		}
		return json_encode($records['data']);
	}
    	
}
?>
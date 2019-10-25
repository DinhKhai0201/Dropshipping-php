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
		$records['data'] = [];
		$recordsCategories = $this->getAllRecords('*',['conditions'=>'category_types.level='.$level, 'joins'=>'', 'order'=>'id ASC']);
		if($recordsCategories) {
			while($row = $recordsCategories->fetch_assoc()) {
	    		$records['data'][] = $row;
	    	}
		}
		return $records['data'];
	}
	public function getCategories()
	{
		$sql = "SELECT SUPERVISOR.categoryName AS SuperVisor,
				GROUP_CONCAT(SUPERVISEE.categoryName ORDER BY SUPERVISEE.categoryName ) AS SuperVisee,
				COUNT(*) as countChild
				FROM category_types AS SUPERVISOR
				INNER JOIN category_types SUPERVISEE ON SUPERVISOR.id = SUPERVISEE.parentId
				GROUP BY SuperVisor";
		$value = $this->con->query($sql);
		return $value;
	}
    	
}
?>
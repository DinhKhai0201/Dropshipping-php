<?php
class category_model extends vendor_pagination_model
{
	public $nopp = 10;
	public static $status = [
						0 => 'Inactive',
						1 => 'Active'
					];
	public function rules() {
		global $app;
	    return [
        	'name' => ['required', 'unique', 'string', ['max', 'value'=>50]],
        	'slug' 	=> ['required', 'unique', 'string', ['max', 'value'=>50]],
	    ];
	}

	protected $relationships = [
		'hasMany'	=>	[
			['product',	'key'=>'category_id'],
		],
	];

	public function readPaging($from_record_num, $records_per_page, $filed_oder_by)
	{ 
	    $query = " SELECT *
	            FROM
	                " . $this->table . "
	            ORDER BY {$filed_oder_by} ASC
	            LIMIT {$from_record_num},{$records_per_page}";
	    $result = $this->con->query($query);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}

		foreach ($rows as $key => $row) {
			$rows[$key]['total_job'] = $this->count($row['id']);
		}
		return $rows;
	}

	public function count($id)
	{
		$query = "SELECT COUNT(*) as number_jobs FROM jobs WHERE categories_arr like '%,{$id},%' ";
	    $result = $this->con->query($query);
		if($result) {
			$record = $result->fetch_assoc();
		} else $record=false;
	 
	    return $record['number_jobs'];
	}

	public function getChild($id_str){
		$id_str = rtrim($id_str, ",");
		$id_str = ltrim($id_str, ",");
		$sql = "SELECT * FROM categories where id in ($id_str)";
		$allRow = $this->con->query($sql);
		$categories = array();
		if ($allRow) {
			while( $row =  $allRow->fetch_assoc()) {   
				array_push($categories, $row);
			}
		}
		return ($categories);
	}	
}
?>
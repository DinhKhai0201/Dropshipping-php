<?php
class static_page_model extends vendor_pagination_model
{
    public function rules() {
		global $app;
	    return [
        	'title' 	=> ['required', 'string', ['min', 'value'=>2]],
        	'content' 	=> ['required', 'string'],
        	'title_slug' 	=> ['required', 'unique', 'string', ['min', 'value'=>2]],
	    ];
	}


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
		return $rows;
	}
}
?>
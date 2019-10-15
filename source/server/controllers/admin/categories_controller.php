<?php
class categories_controller extends vendor_backend_controller
{
	public function all() {
		global $app;
		$conditions = "";

		if(isset($app['prs']['status'])){
			$status = $app['prs']['status'];
			$conditions .= (($conditions)? " AND ":"")." status=".($status=='active'?1:0);
		}
		
		if(isset($app['prs']['search'])){
			$conditions .= (($conditions)? " AND ":"").
			" name like '%".$app['prs']['search']."%' OR ".
			" slug like '%".$app['prs']['search']."%' OR".
			" id like '%".$app['prs']['search']."%'";
		}

		$category = new category_model();
		$this->records = $category->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->display();
	}
	public function edit($id) {
		$cm = new category_model();
		$this->record = $cm->getRecord($id);
		if(isset($_POST['btn_submit'])) {
			$categoryData = $_POST['category'];
			$valid = $cm->validator($categoryData, $id);
			if($valid['status']){
				if($cm->editRecord($id, $categoryData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"categories"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'];
					$this->record = $categoryData;
				}
			} else {
				$this->errors = $cm::convertErrorMessage($valid['message']);
				$this->record = $categoryData;
				$this->record['id'] = $id;
			}
		}
		$this->display();
	}

	public function add() {
		
		if(isset($_POST['btn_submit'])) {
			$um = new category_model();
			$categoryData = $_POST['category'];
			$valid = $um->validator($categoryData);
			if($valid['status']) {
				
				if($um->addRecord($categoryData))
					header("Location: ".vendor_app_util::url(["ctl"=>"categories"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data!'];
					$this->record = $categoryData;
				}
			} else {
				$this->errors = $um::convertErrorMessage($valid['message']);
				$this->record = $categoryData;
			}
		}
		$categories = new category_model();
		$this->recordsCategoriesParent = $categories ->getAllRecords('*',['conditions'=>'parent_id is null', 'joins'=>'', 'order'=>'id ASC']);
		$this->recordsCategoriesChildren = $categories ->getAllRecords('*',['conditions'=>'parent_id is not null', 'joins'=>'', 'order'=>'id ASC']);
		$this->display();
	}

	public function view($id) {
		$cm = new category_model();
		$this->record = $cm->getRecord($id);
		$this->display();
	}

	public function changestatus() {
		global $app;
		$id = $app['prs'][1];
		$category = new category_model();
		$categoryData['status'] = $app['prs'][2]?0:1;
		if($category->editRecord($id, $categoryData)) echo "Change status successful";
		else echo "error";
	}

	public function del($id) {
		$category = new category_model();
		if($category->delRelativeRecord($id)) echo "Delete Successful";
		else echo "error";
	}

	public function delmany() {
		global $app;
		$ids = $app['prs']['ids'];
		$categories = new category_model();
		if($categories->delRelativeRecords($ids)) echo "Delete many successful";
		else echo "error";
	}

}
?>
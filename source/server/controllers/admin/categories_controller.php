<?php
class categories_controller extends vendor_backend_controller
{
	public function index() {
		global $app;
		$category = new category_type_model();

		$this->level1= $category->getAllCategory(1);
		$this->level2= $category->getAllCategory(2);
		$this->level3= $category->getAllCategory(3);
		$this->level4= $category->getAllCategory(4);
		$this->display();
	}


	public function addCate(){
		if ($_POST['rankingNo'] == '') {
			$_POST['rankingNo'] = 0;
		}
		$cate = new category_type_model();
		// echo "Start <br/>"; echo '<pre>'; print_r($cate->addRecord($_POST));echo '</pre>';exit("End Data");
		$id = $cate->addRecord($_POST);
		if($id){
			$data = [
				'status' => 1,
				'id' => $id,
				'message' => 'Add category successfully!'
			];
			http_response_code(200);
			echo json_encode($data);
		} else {
			$data = [
				'status' => 0,
				'error' => 'An error occurred when Add data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	} 

	public function editCate(){
		if ($_POST['rankingNo'] == '') {
			$_POST['rankingNo'] = 0;
		}

		$cate = new category_type_model();
		if($cate->editRecord($_POST['id'], $_POST)){

			$data = [
				'status' => 1,
				'categoryName' => $_POST['categoryName'],
				'rankingNo' => $_POST['rankingNo'],
				'message' => 'Edit category successfully!'
			];

			http_response_code(200);
			echo json_encode($data);
		} else {
			$data = [
				'status' => 0,
				'error' => 'An error occurred when Edit data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	} 

	public function deleteCate(){
		$cate = new category_type_model();
		if($cate->delRecord(  "'".$_POST['id']."'" )){
			$data = [
				'status' => 1,
				'message' => 'Delete category successfully!'
			];

			http_response_code(200);
			echo json_encode($data);
		} else {
			$data = [
				'status' => 0,
				'error' => 'An error occurred when Delete data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
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
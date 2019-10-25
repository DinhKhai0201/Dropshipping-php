<?php
class categories_controller extends vendor_main_controller
{
	public function index() 
	{
		global $app;
		$category_model = new category_type_model();
		$this->categories = $category_model->getAllRecords('*', [
			'conditions' => '',
			'order' => 'id ASC'
		]);
		// $categorylist =[];
		$this->ctgr = $category_model->getCategories();
		// foreach ($this->ctgr as  $key => $value) {	
		// 		$categorylist[] = $value;
			
		// }
		// exit((count($categorylist)));
		$this->display();
	} 
}

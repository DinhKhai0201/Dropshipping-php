<?php
class home_controller extends vendor_main_controller {
	public function index() 
	{
			global $app;
			$category_model = new category_type_model();
			$this->categories = $category_model->getAllRecords('*', [
			'conditions' => 'parentId = 0',
				'order'=>'id ASC'
			]);
			$product_model = new product_model();
			$this->products = $product_model->getAllRecords('products.*,(SELECT image FROM galleries WHERE product_id = products.id limit 1) as oneImage', [
				'conditions' => 'best_selling = 1',
				'joins' => '',
				'order' => 'products.id DESC limit 12'
			]);
		
			$this->display();
	
	}

	public function quickview($id)
	{
		$product = new product_model();
        if ($data = $product->getAllRecords('*', ['conditions'=>'id = '.$id, 'joins'=>'', 'order'=>'id ASC'])) {
            http_response_code(200);
            echo(($data));
        } else {
			echo "error";
		}
	}
	
	

}
?>
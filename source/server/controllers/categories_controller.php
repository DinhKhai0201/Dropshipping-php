<?php
class categories_controller extends vendor_main_controller
{
	public function index() 
	{
		global $app;
		// exit($app);
		$conditions = "";
		$category_model = new category_type_model();
		$this->categories = $category_model->getAllRecords('*', [
			'conditions' => '',
			'order' => 'id ASC'
		]);
		$brand_model = new brand_model();
		$this->brands = $brand_model->getAllRecords('*', [
			'conditions' => '',
			'order' => 'id ASC'
		]);
		// $this->ctgr = $category_model->getCategories();

		$this->level1 = $category_model->getAllCategory(1);
		$this->level2 = $category_model->getAllCategory(2);
		$this->level3 = $category_model->getAllCategory(3);
		$this->level4 = $category_model->getAllCategory(4);

		if (isset($app['from'])) {
			$from = $app['from'];
			$conditions .= (($conditions) ? " AND " : "") . " price > {$from}";

		}
		if (isset($app['category-slug'])) {
			exit();
			$catslug = $app['category-slug'];
			// exit($catslug);
			$conditions .= (($conditions) ? " AND " : "") . " category_types_slug = {$catslug}";
		}
		// exit(json_encode($_SERVER['REQUEST_URI']));
		$product_model = new product_model();
		$this->products = $product_model->allp('products.*,(SELECT image FROM galleries WHERE product_id = products.id limit 1) as oneImage', [
			'conditions' => $conditions,
			'joins' => '',
			'order' => 'products.id DESC '
		]);
		// exit(json_encode($app));
		$this->display();

	}
}

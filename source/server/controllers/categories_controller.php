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

		$this->level1 = $category_model->getAllCategory(1);
		$this->level2 = $category_model->getAllCategory(2);
		$this->level3 = $category_model->getAllCategory(3);
		$this->level4 = $category_model->getAllCategory(4);

		if (isset($app['search'])) {
			$search = $app['search'];
			$conditions .= (($conditions) ? " AND " : "") . " products.name like '%{$search}%'";
		}
		$page = 1 ;

		if (isset($app["page"])) {
			$page = $app["page"];
		}

		// exit(json_encode($_SERVER['REQUEST_URI']));
		$product_model = new product_model();
		$this->products = $product_model->allp('products.*,(SELECT image FROM galleries WHERE product_id = products.id limit 1) as oneImage', [
			'conditions' => $conditions,
			'joins' => '',
			'order' => 'products.id DESC ',
			'pagination' => [
				'page' => $page,
				'nopp' => 12
			],
		]);
		// exit(json_encode($this->products['data']));
		$this->display();

	}
	public function fetch_data()
	{
		global $app;
		$conditions ='';
		if (isset($_POST["cat"])) {
			$conditions .="(";
			foreach ($_POST["cat"] as $key => $value) {
				if ($key != 0) {
					$conditions .=" OR ";
				}
				$conditions .= "products.category_type_id like '%" . $value . "%'";
			}
			$conditions .= ")";
		}
		if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
			$conditions .= (($conditions) ? " AND " : ""). "products.price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'";
		}
		if (isset($_POST["color"])) {
			foreach ($_POST["color"] as $key => $value) {
				$conditions .= (($conditions) ? " AND " : "") . " products.color like '%".$value."%'";
			}
		
		}
		
		if (isset($_POST["search"])) {
			$conditions .= (($conditions) ? " AND " : "") . " products.name  like '%" . $_POST["search"] . "%'";
		}
		if (isset($_POST["sort"]) && isset($_POST["type"])) {
			$order = 'products.'.$_POST["sort"].' '. $_POST["type"];
		}
		$page = 1;
		if (isset($_POST["page"])) {
			$page = $_POST["page"];
		}
		if (isset($_POST["brand"])) {
			foreach ($_POST["brand"] as $key => $value) {
				$conditions .= (($conditions) ? " AND " : "") . " products.brand_id like '%" . $value . "%'";
			}
		}
		
		$product_model = new product_model();
		$this->products = $product_model->allp('products.*,(SELECT image FROM galleries WHERE product_id = products.id limit 1) as oneImage', [
			'conditions' => $conditions,
			'joins' => '',
			'order' => $order,
			'pagination' => [
				'page' => $page,
				'nopp' => 12
			],
			
		]);
		// echo (json_encode($conditions));
		echo (json_encode($this->products));
	}
}

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
			$orther = "LEFT JOIN coupons ON product_use_coupons.coupon_id = coupons.id";
			$this->products = $product_model->getAllRecords('products.*,coupons.id as coupons_id,coupons.name as coupons_name,coupons.slug as coupons_slug,coupons.id as coupons_id,coupons.coupon_code as coupons_coupon_code,coupons.status as coupons_status,coupons.decription as coupons_decription,coupons.type as coupons_type,coupons.percent_value as coupons_percent_value,coupons.fix_value as coupons_fix_value,coupons.time_start as coupons_time_start,coupons.time_end as coupons_time_end,(SELECT image FROM galleries WHERE product_id = products.id limit 1) as oneImage', [
				 'orther'=>$orther,
				'conditions' => 'best_selling = 1',
				'joins'=>['product_use_coupon'],
                'search-left-join'=>true,
				'order' => 'products.id DESC limit 12'
			]);
			// exit(json_encode($this->products));
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
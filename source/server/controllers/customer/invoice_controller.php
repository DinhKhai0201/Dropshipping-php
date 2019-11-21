<?php
class invoice_controller extends vendor_main_controller
{
    protected  $errors = false;
	public function view() 
	{
        global $app;
        if (!isset($_SESSION['user'])) {
            header("Location: " . vendor_app_util::url(array('area' => '', 'ctl' => 'login')));
        } else {
            $order_item = new order_item_model();
            $order = new order_model();
            if (isset($app['ordertoken']) && isset($app['id'])) {
                $token = $app['ordertoken'];
                $id = $app['id'];
                $this->order = $order->getAllRecords('orders.*', [
                    'conditions' => 'orders.token ="' . $token . '"'
                ]);
                $orther_cart = "LEFT JOIN product_use_coupons ON order_items.product_id = product_use_coupons.product_id LEFT JOIN coupons ON product_use_coupons.coupon_id = coupons.id";
                $this->order_item = $order_item->getAllRecords('order_items.*,coupons.type as coupons_type,coupons.percent_value as coupons_percent_value,coupons.fix_value as coupons_fix_value,coupons.time_start as coupons_time_start,coupons.time_end as coupons_time_end', [
                    'orther_cart'=>$orther_cart,
                    'conditions' => 'order_items.order_id ="' .$id.'"',
                    'joins' => ['product','user']
                ]);
                $this->display();
            }
        }
		
    }
   
}

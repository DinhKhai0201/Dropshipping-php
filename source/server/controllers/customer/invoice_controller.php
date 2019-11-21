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
                $this->order_item = $order_item->getAllRecords('order_items.*', [
                    'conditions' => 'order_items.order_id ="' . $id . '"',
                    'joins' => ['product', 'user']
                ]);
                $this->display();
            }
        }
		
    }
   
}

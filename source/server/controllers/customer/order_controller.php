<?php
class order_controller extends vendor_main_controller
{
    public function index()
    {
        if (isset($_SESSION['user'])) {
        $order = new order_model();
        $this->noorder = $order->getCountRecords(['conditions' => 'orders.user_id =' . $_SESSION['user']['id']]);
        $this->orders = $order->getAllRecords('orders.*', [
            'conditions' => 'orders.user_id =' . $_SESSION['user']['id'],
            'order' => 'id DESC'
           
        ]);
        $this->display();
        } else {
            header("Location: " . vendor_app_util::url(array('area' => '', 'ctl' => 'login')));
        }
    }
    public function success()
    {
        global $app;
        if (isset($_SESSION['user'])) {
            $order = new order_model();
            $wishlist = new wishlist_model();
            if (isset($app['order_id'])) {
                $token = $app['order_id'];
                $this->id_order = $order->getRecordWhere([
                    'token' => $token
                ]);
                $this->nowishlist = $wishlist->getCountRecords(['conditions' => 'wishlists.user_id =' . $_SESSION['user']['id']]);
                $this->recordswishlist = $wishlist->allp('*', [
                    'conditions' => 'wishlists.user_id =' . $_SESSION['user']['id'],
                    'joins' => ['product', 'user'],
                    'pagination' => [
                        'page' => 1,
                        'nopp' => 5
                    ],
                    'order' => 'id ASC'
                ]);
                $this->display();
            }
            
        } else {
            header("Location: " . vendor_app_util::url(array('area' => '', 'ctl' => 'login')));
        }
    }
    public function vieworder()
    {
        if (isset($_SESSION['user'])) {
            $order_item = new order_item_model();
            $this->orders = $order_item->getAllRecords('order_items.*', [
                'conditions' => 'orders.user_id =' . $_SESSION['user']['id'].' AND id = 1'
            ]);
            $this->display();
        } else {
            header("Location: " . vendor_app_util::url(array('area' => '', 'ctl' => 'login')));
        }
    }
}

<?php
class orders_controller extends vendor_backend_controller { 
    public function index()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1) {
          global $app;
          $conditions = "";

          if(isset($app['prs']['status'])){
            $status = $app['prs']['status']; 
            $conditions .= (($conditions)? " AND ":"")." orders.order_status=".($status =='all'?'':($status=='pendding'?0:($status=='cancel'?1:($status=='shipping'?2:3))));
          }
          if(isset($app['prs']['start']) && isset($app['prs']['end'])){
			$start = $app['prs']['start']; 
			$end = $app['prs']['end']; 
			$conditions .= (($conditions)? " AND ":"")." orders.created BETWEEN '".$start."' AND '".$end."'";
          } else if (isset($app['prs']['start']) && empty($app['prs']['end'])) {
				$start = $app['prs']['start']; 
				$conditions .= (($conditions)? " AND ":"")." orders.created >= '".$start."'";
		  } else if(empty($app['prs']['start']) && isset($app['prs']['end'])) {
				$end = $app['prs']['end']; 
				$conditions .= (($conditions)? " AND ":"")." orders.created <= '".$end."'";
		  } else {

		  }
          if(isset($app['prs']['search'])){
            $conditions .= (($conditions)? " AND ":"").
			" orders.order_status	like '%".$app['prs']['search']."%' OR ".
			" orders.to_address	like '%" . $app['prs']['search'] . "%' OR " .
            " users.firstname	like '%".$app['prs']['search']."%' OR ".
            " users.lastname	like '%".$app['prs']['search']."%' OR ".
            " orders.id like '%".$app['prs']['search']."%'";
          }
          
          $order = new order_model();
          $this->records = $order->allp('orders.*', [
              'conditions' => $conditions,
              'joins' => ['user'],
              'order' => 'id DESC'
            
		  ]);
          $this->display();
        } else {
            header("Location: " . vendor_app_util::url(array('area' => '', 'ctl' => 'login')));
        }
    }
   
  public function view($id) {
		$om = new order_model();
		$oim = new order_item_model();
		$this->record = $om->getAllRecordsId('orders.*', [
			'conditions' => 'orders.id =' . $id,
			'joins' => ['user']
		]);
		// exit(($this->record));
		$this->records = $oim->allp('order_items.*', [
				'conditions' => 'order_items.order_id = '.$id,
				 'joins' => ['product','user'],
				  'order' => 'id DESC'
				  
			]);
		// exit(json_encode($this->records));
		$this->display();
	}

	
	public function changestatus() {
		global $app;
		$id = $app['prs'][1];
		$oim = new order_item_model();
		$oiData['status'] = ($app['prs'][2] == 0)?1:0;
		if($oim->editRecord($id, $oiData)) echo "Change status successful";
		else echo "error";
	}
	public function changeStatusOrder()
	{
		global $app;
		$id = $app['prs'][1];
		$om = new order_model();
		$oData['order_status'] = $app['prs'][2];
		if ($om->editRecord($id, $oData))  echo "Change status successful";
		else echo "error";
	}
	// ok
	public function del($id) {
		$om = new order_model();
		if($om->delRelativeRecord($id)) echo "Delete Successful";
		else echo "error";
	}
	//ok
	public function delmany() {
		global $app;
		$ids = $app['prs']['ids'];
		$om = new order_model();
		if($om->delRelativeRecords($ids)) echo "Delete many successful";
		else echo "error";
	}


}
?>
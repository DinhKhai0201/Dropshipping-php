<?php
class products_controller extends vendor_backend_controller { 
  public function index() {
    global $app;
    $conditions = "";

    if(isset($app['prs']['status'])){
      $status = $app['prs']['status'];
      $conditions .= (($conditions)? " AND ":"")." status=".($status=='active'?1:0);
    }
    
    if(isset($app['prs']['search'])){
      $conditions .= (($conditions)? " AND ":"").
      " name like '%".$app['prs']['search']."%' OR ".
      " sku like '%".$app['prs']['search']."%' OR".
      " description	like '%".$app['prs']['search']."%' OR ".
      " id like '%".$app['prs']['search']."%'";
    }

    $product = new product_model();
    $this->records = $product->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
    // exit(json_encode($this->records));
    $this->display();
  }
  public function edit($id) {
    $cm = new product_model();
    $this->record = $cm->getRecord($id);
    if(isset($_POST['btn_submit'])) {
      $productData = $_POST['product'];
      $valid = $cm->validator($productData, $id);
      if($valid['status']){
        if($cm->editRecord($id, $productData)) {
          header("Location: ".vendor_app_util::url(["ctl"=>"products"]));
        } else {
          $this->errors = ['database'=>'An error occurred when editing data!'];
          $this->record = $productData;
        }
      } else {
        $this->errors = $cm::convertErrorMessage($valid['message']);
        $this->record = $productData;
        $this->record['id'] = $id;
      }
    }
    $this->display();
  }

  public function add() {
    if(isset($_POST['btn_submit'])) {
      $um = new product_model();
      $productData = $_POST['product'];
      // exit(json_encode($_POST));
      $valid = $um->validator($productData);
      if($valid['status']) {      
        if($um->addRecord($productData))
          header("Location: ".vendor_app_util::url(["ctl"=>"products"]));
        else {
          $this->errors = ['database'=>'An error occurred when inserting data!'];
          $this->record = $productData;
        }
      } else {
        $this->errors = $um::convertErrorMessage($valid['message']);
        $this->record = $productData;
      }
    }
    $this->display();
  }

  public function view($id) {
    $cm = new product_model();
    $this->record = $cm->getRecord($id);
    $this->display();
  }

  public function changestatus() {
    global $app;
    $id = $app['prs'][1];
    $product = new product_model();
    $productData['status'] = $app['prs'][2]?0:1;
    if($product->editRecord($id, $productData)) echo "Change status successful";
    else echo "error";
  }

  public function del($id) {
    $product = new product_model();
    if($product->delRelativeRecord($id)) echo "Delete Successful";
    else echo "error";
  }

  public function delmany() {
    global $app;
    $ids = $app['prs']['ids'];
    $product = new product_model();
    if($product->delRelativeRecords($ids)) echo "Delete many successful";
    else echo "error";
  }
  //export data to exel 
	public function exportdata() {
		$pm = new product_model();
		$record = $pm->getAllRecordsExport('products.id, products.sku, products.name, products.description, products.price, products.quantity, products.num_of_brought, products.best_selling, products.status', ['order'=>'id asc']);
		http_response_code(200);
		echo (($record));
	}
}
?>
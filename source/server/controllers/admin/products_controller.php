<?php
// use function GuzzleHttp\json_encode;

class products_controller extends vendor_backend_controller { 
  public function index() {
    global $app;
    $conditions = "";

    if(isset($app['prs']['status'])){
      $status = $app['prs']['status']; 
      $conditions .= (($conditions)? " AND ":"")." products.status=".($status =='all'?'':($status=='exist'?0:($status=='runninglow'?1:2)));
    }
    
    if(isset($app['prs']['search'])){
      $conditions .= (($conditions)? " AND ":"").
      " products.name like '%".$app['prs']['search']."%' OR ".
      " products.sku like '%".$app['prs']['search']."%' OR".
      " products.description	like '%".$app['prs']['search']."%' OR ".
      " category_types.categoryName	like '%".$app['prs']['search']."%' OR ".
      " stores.name	like '%".$app['prs']['search']."%' OR ".
      " brands.name	like '%".$app['prs']['search']."%' OR ".
      " products.id like '%".$app['prs']['search']."%'";
    }
    $category = new category_type_model(); 
    $this->recordsCategory = $category->getAllRecords('*', ['conditions' => '', 'joins' => '', 'order' => 'id ASC']);
    $coupon = new coupon_model();
    $this->coupons = $coupon->getAllRecords('*', ['conditions' => '', 'joins' => '', 'order' => 'id DESC']);
    $product = new product_model();
    $orther = "LEFT JOIN coupons ON product_use_coupons.coupon_id = coupons.id";
    $this->records = $product->allp('products.*,coupons.id as coupons_id,coupons.name as coupons_name,coupons.slug as coupons_slug,coupons.id as coupons_id,coupons.coupon_code as coupons_coupon_code,coupons.status as coupons_status,coupons.decription as coupons_decription,coupons.type as coupons_type,coupons.percent_value as coupons_percent_value,coupons.fix_value as coupons_fix_value,coupons.time_start as coupons_time_start,coupons.time_end as coupons_time_end',['orther'=> $orther,'conditions'=>$conditions, 'joins'=>[ 'brand', 'user','product_use_coupon'], 'search-left-join'=>true, 'order'=>'products.id DESC']);
    // exit(json_encode($this->records));
    $this->display();
  }
  public function edit($id) {
    $pm = new product_model();
    $this->record = $pm->getRecord($id);
    if(isset($_POST['btn_submit'])) {
      $productData = $_POST['product'];
      $valid = $pm->validator($productData, $id);
      if($valid['status']){
        if($pm->editRecord($id, $productData)) {
          header("Location: ".vendor_app_util::url(["ctl"=>"products"]));
        } else {
          $this->errors = ['database'=>'An error occurred when editing data!'];
          $this->record = $productData;
        }
      } else {
        $this->errors = $pm::convertErrorMessage($valid['message']);
        $this->record = $productData;
        $this->record['id'] = $id;
      }
    }
    $brands = new brand_model();
    $this->recordsBrands = $brands ->getAllRecords('*',['conditions'=>'', 'joins'=>'', 'order'=>'id ASC']);
    $stores = new store_model();
    $this->recordsStores = $stores ->getAllRecords('*',['conditions'=>'', 'joins'=>'', 'order'=>'id ASC']);
    $category = new category_type_model();
    $this->level1 = $category->getAllCategory(1);
    $this->level2 = $category->getAllCategory(2);
    $this->level3 = $category->getAllCategory(3);
    $this->level4 = $category->getAllCategory(4);
    $this->display();
  }

  public function add() {
    global $app;
    if(isset($_POST['btn_submit'])) { 
      $um = new product_model();
      $gm = new gallery_model();
      $imageData = array();
      $productData = $_POST['product'];
      $productData['category_type_id'] = [];
      if (isset($_POST['category1']) && (int) $_POST['category1'] != 0) {
        array_push($productData['category_type_id'], (string) ($_POST['category1']) );
      }
      if (isset($_POST['category2']) && (int) $_POST['category2'] != 0) {
        array_push($productData['category_type_id'], (string) ($_POST['category2']) );
      }
      if (isset($_POST['category3']) && (int) $_POST['category3'] != 0) {
        array_push($productData['category_type_id'], (string) ($_POST['category3']) );
      }
      if (isset($_POST['category4']) && (int) $_POST['category4'] != 0) {
        array_push($productData['category_type_id'], (string) ($_POST['category4']) );
      }
      $productData['category_type_id'] = implode(",", $productData['category_type_id']);
      $productData['user_id'] = $_SESSION['user']['id'];
      // $valid = $um->validator($productData);
      // if($valid['status']) {      
        if($id = $um->addRecord($productData)) {
           if($_FILES['image']['size']>0 )
          {
            for($i=0; $i<count($_FILES['image']['name']); $i++)
                  {
                     $randChar=md5(rand());
                      move_uploaded_file($_FILES['image']['tmp_name'][$i], RootURI."media/upload/products/".$randChar.$_FILES['image']['name'][$i]) or die("opps multiple picture not uploaded");
                      $imageData['product_id'] = $id;
                      $imageData['image'] = $randChar.$_FILES['image']['name'][$i];
                      if ($re = $gm->addRecord($imageData)) {
                          echo "Success";
                      } else {
                          $this->errors = ['database' => 'An error occurred when inserting data!'];
                      }
                  }
          }
          header("Location: " . vendor_app_util::url(["ctl" => "products"]));
         
        } else {
          $this->errors = ['database'=>'An error occurred when inserting data!'];
          $this->record = $productData;
        }
      // } else {
      //   $this->errors = $um::convertErrorMessage($valid['message']);
      //   $this->record = $productData;
      // }
    }
    $brand = new brand_model();
    $this->recordsBrands = $brand ->getAllRecords('*',['conditions'=>'', 'joins'=>'', 'order'=>'id ASC']);
    $stores = new store_model();
    $this->recordsStores = $stores ->getAllRecords('*',['conditions'=>'', 'joins'=>'', 'order'=>'id ASC']);
    $category = new category_type_model();
    $this->recordsCategories = $category->getCategories();
    $this->level1 = $category->getAllCategory(1);
    $this->level2 = $category->getAllCategory(2);
    $this->level3 = $category->getAllCategory(3);
    $this->level4 = $category->getAllCategory(4);
    $this->display();
  }

  public function view($id) {
    $pm = new product_model();
    $this->record = $pm->getRecord($id);
    // exit(json_encode($this->record));
    $gm = new gallery_model();
    $this->recordGalleries = $gm->getAllRecords('*',['conditions'=>'product_id ='.$id, 'joins'=>'', 'order'=>'id ASC']);

    $brand = new brand_model();
    $this->recordsBrands = $brand ->getAllRecords('*',['conditions'=>'brands.id ='.$this->record['brand_id'], 'joins'=>'', 'order'=>'id ASC']);
    $user = new user_model();
    $this->recordsuser = $user ->getAllRecords('*',['conditions'=>'users.id='.$this->record['user_id'], 'joins'=>'', 'order'=>'id ASC']);
    $categories = new category_type_model();
    $this->recordsCategories = $categories ->getAllRecords('*',['conditions'=>'', 'joins'=>'', 'order'=>'id ASC']);
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
  // dis

  public function changebestselling() {
		global $app;
		$id = $app['prs'][1];
    $pm = new product_model();
		$oiData['best_selling'] = ($app['prs'][2] == 0)?1:0;
		if($pm->editRecord($id, $oiData)) echo "Change status successful";
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
  //export data 
	public function exportdata() {
		$pm = new product_model();
    $record = $pm->getAllRecordsExport('products.id, products.sku, products.name, products.description, products.price, products.quantity, products.num_of_brought, products.best_selling, products.status',['conditions'=>'', 'joins'=>['category', 'brand', 'store'], 'order'=>'id ASC']);
		http_response_code(200);
		echo (($record));
  }
  public function getCatAjax () {

    $category = new category_type_model();
    if (isset($_POST['level1'])) {
      $id1 = ($_POST['level1']);
     
    }
    http_response_code(200);
    echo (($id1));
  }
}
?>
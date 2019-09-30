<?php
class coupons_controller extends vendor_backend_controller { 
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
        " coupon like '%".$app['prs']['search']."%' OR".
        " id like '%".$app['prs']['search']."%'";
      }

      $coupon = new coupon_model();
      $this->records = $coupon->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
      $this->display();
    }
    public function edit($id) {
      $cm = new coupon_model();
      $this->record = $cm->getRecord($id);
      if(isset($_POST['btn_submit'])) {
        $couponData = $_POST['coupons'];
        $valid = $cm->validator($couponData, $id);
        if($valid['status']){
          if($cm->editRecord($id, $couponData)) {
            header("Location: ".vendor_app_util::url(["ctl"=>"coupons"]));
          } else {
            $this->errors = ['database'=>'An error occurred when editing data!'];
            $this->record = $couponData;
          }
        } else {
          $this->errors = $cm::convertErrorMessage($valid['message']);
          $this->record = $couponData;
          $this->record['id'] = $id;
        }
      }
      $this->display();
    }
  
    public function add() {
      if(isset($_POST['btn_submit'])) {
        $um = new coupon_model();
        $couponData = $_POST['coupon'];
        // exit(json_encode($_POST));
        $valid = $um->validator($couponData);
        if($valid['status']) {
          
          if($um->addRecord($couponData))
            header("Location: ".vendor_app_util::url(["ctl"=>"coupons"]));
          else {
            $this->errors = ['database'=>'An error occurred when inserting data!'];
            $this->record = $couponData;
          }
        } else {
          $this->errors = $um::convertErrorMessage($valid['message']);
          $this->record = $couponData;
        }
      }
      $this->display();
    }
  
    public function view($id) {
      $cm = new coupon_model();
      $this->record = $cm->getRecord($id);
      $this->display();
    }
  
    public function changestatus() {
      global $app;
      $id = $app['prs'][1];
      $coupon = new coupon_model();
      $couponData['status'] = $app['prs'][2]?0:1;
      if($coupon->editRecord($id, $couponData)) echo "Change status successful";
      else echo "error";
    }
  
    public function del($id) {
      $coupon = new coupon_model();
      if($coupon->delRelativeRecord($id)) echo "Delete Successful";
      else echo "error";
    }
  
    public function delmany() {
      global $app;
      $ids = $app['prs']['ids'];
      $categories = new coupon_model();
      if($categories->delRelativeRecords($ids)) echo "Delete many successful";
      else echo "error";
    }
}
?>
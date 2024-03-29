<?php
class ads_controller extends vendor_adsmanager_controller
{
	public function index() {
		global $app;
		$conditions = "";

		if(isset($app['prs']['status'])){
			$status = $app['prs']['status'];
			$conditions .= (($conditions)? " AND ":"")." status=".($status=='active'?1:0);
		}

		if(isset($app['prs']['position'])){
			// $position = array_flip($app['position_ads'])[$app['prs']['position']];
			$position = $app['prs']['position'];
			$conditions .= (($conditions)? " AND ":"")." position=".$position;
		}

		if(isset($app['prs']['page'])){
			// $page = array_flip($app['page_ads'])[$app['prs']['page']];
			$page = $app['prs']['page'];
			$conditions .= (($conditions)? " AND ":"")." page=".$page;
		}
		
		if(isset($app['prs']['search'])){
			$conditions .= (($conditions)? " AND ":"").
			" title like '%".$app['prs']['search']."%' OR ".
			" description like '%".$app['prs']['search']."%'";
		}
		$conditions .= (($conditions)? " AND ":"")." user_id=".$_SESSION['user']['id'];
		$ad = new ad_model();
		$this->records = $ad->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=> 'id DESC']);
		$this->display();
	}
	public function edit($id) {
		$cm = new ad_model();
		$this->record = $cm->getRecord($id);

		if(isset($_POST['btn_submit'])) {
			$adData = $_POST['ad'];
			if($_FILES['image']['tmp_name']) {
				if($this->record['image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->record['image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->record['image']);
				if($this->record['page']==1 && $this->record['position']==4){
					$adData['image'] = $this->uploadImg($_FILES,['folder'=>'ads', 'origin'=> true ]);
				}else if($this->record['page']==3 && $this->record['position']==5){
					$adData['image'] = $this->uploadImg($_FILES,['folder'=>'ads', 'origin'=> true ]);
				}else if($adData['page']==5 && $adData['position']==1){
					$adData['image'] = $this->uploadImg($_FILES,['folder'=>'ads', 'origin'=> true ]);
				}else if($adData['page']==5 && $adData['position']==3){
					$adData['image'] = $this->uploadImg($_FILES,['folder'=>'ads', 'origin'=> true ]);
				}else if($adData['page']==6 && $adData['position']==1){
					$adData['image'] = $this->uploadImg($_FILES,['folder'=>'ads', 'origin'=> true ]);
				}else if($adData['page']==6 && $adData['position']==3){
					$adData['image'] = $this->uploadImg($_FILES,['folder'=>'ads', 'origin'=> true ]);
				}else $adData['image'] = $this->uploadImg($_FILES,['folder'=>'ads', 'origin'=> true]);
			}
			$valid = $cm->validator($adData, $id['1']);
			if($valid['status']){
				if($cm->editRecord($id, $adData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"ads"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'];
					$this->record = $adData;
				}
			} else {
				$this->errors = $cm::convertErrorMessage($valid['message']);
				$this->record = $adData;
				$this->record['id'] = $id;
			}
		}
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {

			$um = new ad_model();
			$adData = $_POST['ad'];
			$adData['user_id'] = $_SESSION['user']['id'];
			// exit(json_encode($adData));
			$valid = $um->validator($adData);
			// exit(json_encode($valid));
			if($_FILES['image']['tmp_name']){
				if($adData['page']==1 && $adData['position']==4){
					$adData['image'] = $this->uploadImg($_FILES,['folder'=>'ads', 'origin'=> true ]);
				}else if($adData['page']==3 && $adData['position']==5){
					$adData['image'] = $this->uploadImg($_FILES,['folder'=>'ads', 'origin'=> true ]);
				}else if($adData['page']==5 && $adData['position']==1){
					$adData['image'] = $this->uploadImg($_FILES,['folder'=>'ads', 'origin'=> true ]);
				}else if($adData['page']==5 && $adData['position']==3){
					$adData['image'] = $this->uploadImg($_FILES,['folder'=>'ads', 'origin'=> true ]);
				}else if($adData['page']==6 && $adData['position']==1){
					$adData['image'] = $this->uploadImg($_FILES,['folder'=>'ads', 'origin'=> true ]);
				}else if($adData['page']==6 && $adData['position']==3){
					$adData['image'] = $this->uploadImg($_FILES,['folder'=>'ads', 'origin'=> true ]);
				}else{
					$adData['image'] = $this->uploadImg($_FILES,['folder'=>'ads', 'origin'=> true]);
				}
			}
			if($valid['status']) {
				
				if($um->addRecord($adData))
					header("Location: ".vendor_app_util::url(["ctl"=>"ads"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data!'];
					$this->record = $adData;
				}
			} else {
				$this->errors = $um::convertErrorMessage($valid['message']);
				$this->record = $adData;
			}
		}
		$this->display();
	}

	public function view($id) {
		$cm = new ad_model();
		$this->record = $cm->getRecord($id);
		$this->display();
	}

	public function changestatus() {
		global $app;
		$id = $app['prs'][1];
		$ad = new ad_model();
		$adData['status'] = $app['prs'][2]?0:1;
		if($ad->editRecord($id, $adData)) echo "Change status successful";
		else echo "error";
	}

	public function del($id) {
		$ad = new ad_model();
		if($ad->delRelativeRecord($id)) echo "Delete Successful";
		else echo "error";
	}

	public function delmany() {
		global $app;
		$ids = $app['prs']['ids'];
		$ads = new ad_model();
		if($ads->delRelativeRecords($ids)) echo "Delete many successful";
		else echo "error";
	}

	public function getpage(){
		global $app;
		$data = $app['ads'][$_GET['id']];
		$data = [
			'status' => true,
			'data' => $data
		];
		http_response_code(200);
		echo json_encode($data);
	}

	public function click($id) {
		$admodel = new ad_model();
		$this->record = $admodel->getRecord($id);
		$adData = $this->record;
		$adData['num_of_click'] = $adData['num_of_click'] + 1;
		$admodel->editRecord($id, $adData);
	}
}
?>
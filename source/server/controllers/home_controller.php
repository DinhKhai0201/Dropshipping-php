<?php
class home_controller extends vendor_main_controller {
	public function index() 
	{
		// if(!vendor_app_util::checkgoogleaccess()) {
			// global $app;
			// $category_model = new category_model();
			// $this->categories = $category_model->allp('*', [
			// 	'pagination'=> [
			// 		'page' => 1,
			// 		'nopp' => 10000000
			// 	],
			// 	'order'=>'slug ASC'
			// ]);

			// $job_model = new job_model();
			// $cat = new category_model();
			// $company_model = new company_model();
			// $application = new application_model();
			// $jobseeker = new jobseeker_model();
			// $this->listCategory = $cat->getAllRecords();
			// $this->isLogged = false;
			// $rolesFlip = array_flip($app['roles']);
			// if(isset($_SESSION['user']['id']) && ($_SESSION['user']['role'] == $rolesFlip['jobseeker'])) {
			// 	$this->isLogged = true;
			// 	$this->jobseeker = $jobseeker->getRecordWhere(['user_id'=>$_SESSION['user']['id']]);
			// 	$condition = '';
			// 	if (isset($this->jobseeker['category_id'])){
			// 		$condition = "jobs.category_id={$this->jobseeker['category_id']}";
			// 	}
			// 	$this->interesting_job = $job_model->allp('jobs.*, companies.*, categories.*, jobs.id as job_id, jobs.created as job_created',['conditions' => $condition,'joins' => ['company', 'category'], 'order'=>'id DESC']);
			// }
			// $ads_model = new ad_model();
			// $this->top_slide  		= $ads_model->getAllRecords('*', ['conditions' => "position=4 and page=1 and status=1", 'order'=>'id ASC']);
			// $this->comapny_featured = $company_model->getAllRecords('*', ['conditions' => "featured=1", 'order'=>'updated DESC limit 12']);
			
			// $this->fascinatingJob 		= $job_model->getAllRecords('*,jobs.id as job_id, jobs.slug as job_slug', ['conditions'=>' job_fascinating = 1 and status = 1 and deadline > now()', 'joins' => ['company'], 'order'=>'created DESC limit 96']);
			// $fascinatingJob = [];
			// foreach($this->fascinatingJob as $key => $item){
			// 	$fascinatingJob[] = $item;
			// }
			// $this->fascinatingJob2 = $fascinatingJob;
			// $this->urgentJob 	= $job_model->getAllRecords('*,jobs.id as job_id,jobs.slug as job_slug',['conditions'=>'job_urgent=1 and status = 1 and deadline > now()','joins' => ['company'], 'order'=>'created DESC limit 30']);
			// $this->highSalaryJobs 	= $job_model->getAllRecords('*,jobs.id as job_id,jobs.slug as job_slug', ['conditions'=>'status = 1 and salary != 1 and deadline > now()','joins' => ['company'], 'order'=>'salary_to DESC, salary_from DESC limit 50']);
			// $highSalary = [];
			// foreach($this->highSalaryJobs as $key => $item){
			// 	$highSalary[] = $item;
			// }
			// $this->highSalaryJobs2 = $highSalary;
			// $this->recentUpdate 		= $job_model->getAllRecords('*,jobs.id as job_id, jobs.slug as job_slug', ['conditions'=>' status = 1 and deadline > now()', 'joins' => ['company'], 'order'=>'jobs.created DESC limit 6']);

			// if (!$this->isMobile) {
			// 	$this->bottom_ads 		= $ads_model->getAllRecords('*', ['conditions' => "position=2 and page=1 and status=1", 'order'=>'id ASC']);
			// 	$this->bottom_ads2 		= $ads_model->getAllRecords('*', ['conditions' => "position=2 and page=1 and status=1", 'order'=>'id ASC']);
			// 	$this->right_ads 		= $ads_model->getAllRecords('*', ['conditions' => "position=5 and page=1 and status=1", 'order'=>'id ASC']);
			// }

			// if(isset($_SESSION['user']) && isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 3){
			// 	$progress_bar_modal = new progress_bar_model();
			// 	$pro_data = $progress_bar_modal->getRecordWhere([
			// 		'user_id' => $_SESSION['user']['id']
			// 	]);
			// 	if(!empty($pro_data)) {
			// 		$percent_pro = ($pro_data['cv_users'] + $pro_data['cv_job_infos'] + $pro_data['cv_work_experiences'] + $pro_data['cv_education_details'] + $pro_data['cv_job_skills'])*100/5;
			// 		$percent_pro != 0 ? $this->percent_pro = $percent_pro : $this->percent_pro = 0;
			// 	} else {
			// 		$this->percent_pro = 0;
			// 	}

			// 	$progressbar = $this->percent_pro;
			// }

			// if(isset($_COOKIE['link'])) {
			// 	$link = $_COOKIE['link'];
			// 	$role = $_COOKIE['role'];
			// 	setcookie("link", "", time() - 3600);
			// 	setcookie("role", "", time() - 3600);
			// 	if(isset($_SESSION['user']) && isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == $role)
			// 	header("Location: ".$link);
			// }

			$this->display();
		// } else {
		// 	global $app;
		// 	$category_model = new category_model();
		// 	$this->categories = $category_model->allp('*', [
		// 		'pagination'=> [
		// 			'page' => 1,
		// 			'nopp' => 10000000
		// 		],
		// 		'order'=>'slug ASC'
		// 	]);
		// 	$job_model = new job_model();
			
		// 	$this->fascinatingJob 		= $job_model->getAllRecords('*,jobs.id as job_id, jobs.slug as job_slug', ['conditions'=>' job_fascinating = 1 and status = 1 and deadline > now()', 'joins' => ['company'], 'order'=>'created DESC limit 12']);
		// 	$fascinatingJob = [];
		// 	foreach($this->fascinatingJob as $key => $item){
		// 		$fascinatingJob[] = $item;
		// 	}
		// 	$this->fascinatingJob2 = $fascinatingJob;
		// 	$this->urgentJob 	= $job_model->getAllRecords('*,jobs.id as job_id,jobs.slug as job_slug',['conditions'=>'job_urgent=1 and status = 1 and deadline > now()','joins' => ['company'], 'order'=>'created DESC limit 15']);
		// 	$this->highSalaryJobs 	= $job_model->getAllRecords('*,jobs.id as job_id,jobs.slug as job_slug', ['conditions'=>'status = 1 and salary != 1 and deadline > now()','joins' => ['company'], 'order'=>'salary_to DESC, salary_from DESC limit 10']);
		// 	$highSalary = [];
		// 	foreach($this->highSalaryJobs as $key => $item){
		// 		$highSalary[] = $item;
		// 	}
		// 	$this->highSalaryJobs2 = $highSalary;
		// 	$this->recentUpdate 		= $job_model->getAllRecords('*,jobs.id as job_id, jobs.slug as job_slug', ['conditions'=>' status = 1 and deadline > now()', 'joins' => ['company'], 'order'=>'jobs.created DESC limit 6']);
		//  	$this->display(['act'=>'static']);
		// }
	} 

	// public function newJobData()
	// {
	// 	$page = $_GET['page'];
	// 	if (!$page) $page = 1;
	// 	$result = [];
	// 	$job_model = new job_model();
	// 	$query = " status = 1";
	// 	$options_query = [
	// 		'joins'=> ['company'],
	// 		'pagination' => [
	// 			'page' => $page,
	// 			'nopp' => 7
	// 		],
	// 		'conditions' => $query,
	// 		'order' => ' jobs.id DESC'
	// 	];

	// 	$data = $job_model->allp('*', $options_query);
	// 	if(isset($_SESSION['user'])){
	// 		$save_model = new save_model();
	// 		foreach ($data['data'] as $key => $value) {
	// 			$data['data'][$key]['isSaved'] = $save_model->checkSaved($_SESSION['user']['id'],$data['data'][$key]['id']);
	// 		}
	// 	}
	// 	echo json_encode($data);
	// }
	
	// public function hotJobData()
	// {
	// 	$page = $_GET['page'];
	// 	if (!$page) $page = 1;
	// 	$result = [];
	// 	$job_model = new job_model();
	// 	$query = " jobs.status = 1";
	// 	$options_query = [
	// 		'joins'=> ['company', 'category'],
	// 		'pagination' => [
	// 			'page' => $page,
	// 			'nopp' => 7
	// 		],
	// 		'conditions' => $query,
	// 		'order' => '*value DESC'
	// 	];

	// 	$data = $job_model->allp('jobs.*, companies.*, categories.*, jobs.id as id, jobs.created as job_created, jobs.salary_to* IF(jobs.currency = "VND" ,1, 23250) as value', $options_query);
	// 	if(isset($_SESSION['user'])){
	// 		$save_model = new save_model();
	// 		foreach ($data['data'] as $key => $value) {
	// 			$data['data'][$key]['isSaved'] = $save_model->checkSaved($_SESSION['user']['id'],$data['data'][$key]['id']);
	// 		}
	// 	}
	// 	echo json_encode($data);
	// }

	// public function interestingJobData()
	// {
	// 	$page = $_GET['page'];
	// 	if (!$page) $page = 1;
	// 	$result = [];
	// 	$job_model = new job_model();
	// 	$query = " jobs.status = 1";
	// 	$jobseeker = new jobseeker_model();		
	// 	$this->jobseeker = $jobseeker->getRecordWhere(['user_id'=>$_SESSION['user']['id']]);
	// 	if (isset($this->jobseeker['category_id'])){
	// 		$query .= " and jobs.category_id={$this->jobseeker['category_id']}";
	// 	}
	// 	$options_query = [
	// 		'joins'=> ['company', 'category', 'save_job'],
	// 		'pagination' => [
	// 			'page' => $page,
	// 			'nopp' => 7
	// 		],
	// 		'conditions' => $query,
	// 		'order' => 'id DESC'
	// 	];

	// 	$data = $job_model->allp('jobs.*, companies.*, categories.*, jobs.id as id, jobs.created as job_created', $options_query);
	// 	if(isset($_SESSION['user'])){
	// 		$save_model = new save_model();
	// 		foreach ($data['data'] as $key => $value) {
	// 			$data['data'][$key]['isSaved'] = $save_model->checkSaved($_SESSION['user']['id'],$data['data'][$key]['id']);
	// 		}
	// 	}
	// 	echo json_encode($data);
	// }
}
?>
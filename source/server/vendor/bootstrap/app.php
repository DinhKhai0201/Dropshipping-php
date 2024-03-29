<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 18000);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(18000);

session_start();
$app['ctl'] = "home";
$prs = [];

$app['linkpage'] = 'home';

if(isset($_GET["pr"])) {
	$str_url = $_SERVER['REQUEST_URI'];
	// exit($str_url);
	if(strpos($str_url, "index.php?pr")){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(strpos($str_url, "employers/view")){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(preg_match('/employers$/', $str_url)){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(preg_match('/employers\/index$/', $str_url)){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(preg_match('/\/jobs\/index/', $str_url) && !preg_match('/employer\/jobs/', $str_url) && !preg_match('/admin\/jobs/', $str_url)  && !preg_match('/jobseeker\/jobs/', $str_url)){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(preg_match('/\/jobs$/', $str_url) && !preg_match('/employer\/jobs/', $str_url) && !preg_match('/admin\/jobs/', $str_url)  && !preg_match('/jobseeker\/jobs/', $str_url)){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(preg_match('/candidates\/index/', $str_url) && !preg_match('/employer\/candidates/', $str_url)){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(preg_match('/candidates$/', $str_url) && !preg_match('/employer\/candidates/', $str_url)){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(preg_match('/pages\/index/', $str_url)){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(preg_match('/home$/', $str_url)){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(preg_match('/register\/index$/', $str_url)){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(preg_match('/login\/index$/', $str_url)){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
		
	}else{
		
		$prs = explode("/",$_GET["pr"]);
		$par = $_GET["pr"];
		if(preg_match('/\/$/', $par) && !preg_match('/\/\/$/', $_SERVER['REQUEST_URI'])){
			$par = substr($par, 0, -1);
		}
		if(preg_match('/\/\/$/', $_SERVER['REQUEST_URI'])){
			$app['linkpage'] = "null";
			$prs = explode("/","404/index");
		}
		else{
			$link_url = $_SERVER['REQUEST_URI'];
			// exit($link_url);

            if (preg_match('/moi-nhat-hot-nhat\/trang-(\d+).html?(.*)/', $link_url, $matches)) {
                $prs = explode("/", "jobs/index?page=".$matches[1]."&".$matches[2]);
                $app['linkpage'] = "moi-nhat-hot-nhat";
                $app['page-current'] = $matches[1];
                $app['page-type'] = 'moi-nhat-hot-nhat';
            }else if(preg_match('/product\/view\/(.*)-(\d+)/', $link_url, $matches)){
				$prs = explode("/", "product/view/" . $matches[1] . "-" . $matches[2]);
				$app['linkpage'] = "product-view";
				$app['slug'] = $matches[1];
				$app['id'] = $matches[2];
				$app['page-type'] = 'product-view';
			// }else if(preg_match('/(.*)/', $link_url, $matches)){
			// 	$prs = explode("/", "static_pages/index/" . $matches[1]);
			// 	$app['linkpage'] = "product-view";
			// 	$app['slug'] = $matches[1];
			// 	$app['page-type'] = 'product-view';
			} else if (preg_match('/product\/quickview\/(.*)-(\d+)/', $link_url, $matches)) {
				$prs = explode("/", "product/quickview/" . $matches[1] . "-" . $matches[2]);
				$app['linkpage'] = "product-quickview";
				$app['slug'] = $matches[1];
				$app['id'] = $matches[2];
				$app['page-type'] = 'product-quickview';
			}else if (preg_match('/customer\/order\/success\/(.*)/', $link_url, $matches)) {
				$prs = explode("/", "customer/order/success/" . $matches[1]);
				$app['linkpage'] = "order-success";
				$app['order_id'] = $matches[1];
				// exit($app['order_id']);
				$app['page-type'] = 'order-success'; 
			} else if (preg_match('/categories\/index\.html\?s\=(.*) /', $link_url, $matches)) {
				// echo ('4');
				$prs = explode("/", "categories/index.html?s=" . $matches[1]);
				$app['linkpage'] = "categories-index";
				$app['search'] = $matches[1];
				$app['page-type'] = 'categories-index';
			} else if (preg_match('/customer\/order\/vieworder\/(.*)-(.*)/', $link_url, $matches)) {
				$prs = explode("/", "customer/order/vieworder/" . $matches[1].'-'.$matches[2]);
				$app['linkpage'] = "order-vieworder";
				$app['ordertoken'] = $matches[1];
				$app['id'] = $matches[2];
				$app['page-type'] = 'order-vieworder';
			}else if (preg_match('/customer\/invoice\/view\/(.*)-(.*)/', $link_url, $matches)) {
				$prs = explode("/", "customer/invoice/view/" . $matches[1].'-'.$matches[2]);
				$app['linkpage'] = "invoice-view";
				$app['ordertoken'] = $matches[1];
				$app['id'] = $matches[2];
				$app['page-type'] = 'invoice-view';
			
			}else{
				switch($par){

					// case "bao-gia-dich-vu-dang-tin":
					// 	$prs = explode("/","page/index/bao-gia-dich-vu-dang-tin");
					// 	$app['linkpage'] = "bao-gia-dich-vu-dang-tin";
					// 	break;
					// case "about-us":
					// 	$prs = explode("/","static_pages/index/about-us");
					// 	$app['linkpage'] = "about-us";
					// 	break;
					// case "dieu-khoan-su-dung":
					// 	$prs = explode("/","page/index/dieu-khoan-su-dung");
					// 	$app['linkpage'] = "dieu-khoan-su-dung";
					// 	break;
					// case "chinh-sach-bao-mat-thong-tin":
					// 	$prs = explode("/","page/index/chinh-sach-bao-mat-thong-tin");
					// 	$app['linkpage'] = "chinh-sach-bao-mat-thong-tin";
					// 	break;
					// case "co-che-giai-quyet-tranh-chap":
					// 	$prs = explode("/","page/index/co-che-giai-quyet-tranh-chap");
					// 	$app['linkpage'] = "co-che-giai-quyet-tranh-chap";
					// 	break;
					// case "huong-dan-nop-cv":
					// 	$prs = explode("/","page/index/applycv");
					// 	$app['linkpage'] = "huong-dan-nop-cv";
					// 	break;
					case "register":
						$prs = explode("/","register");
						$app['linkpage'] = "register";
						break;
					case "login":
						$prs = explode("/","login");
						$app['linkpage'] = "login";
						break;
					case "categories":
						$prs = explode("/", "categories");
						$app['linkpage'] = "categories";
						break;
					case "categories/indedx.html":
						echo ("7");
						$prs = explode("/", "categories/index.html");
						$app['linkpage'] = "categories-index";
						break;
					case "product":
						$prs = explode("/", "product");
						$app['linkpage'] = "product";
						break;
					case "lien-he":
						$prs = explode("/","contact");
						$app['linkpage'] = "contact";
						break;

					case "viec-lam-trong-ngay":
						$prs = explode("/","jobs/index");
						$app['jobinday'] = true;
						$app['linkpage'] = "viec-lam-trong-ngay";
						$app['page-type'] = 'viec-lam-trong-ngay';
						break;
					case "viec-lam-tuyen-gap":
						$prs = explode("/","jobs/index");
						$app['jobinday'] = true;
						$app['linkpage'] = "viec-lam-tuyen-gap";
						$app['page-type'] = 'viec-lam-tuyen-gap';
						break;
					case "viec-lam-hap-dan":
						$prs = explode("/","jobs/index");
						$app['jobinday'] = true;
						$app['linkpage'] = "viec-lam-hap-dan";
						$app['page-type'] = 'viec-lam-hap-dan';
						break;
					case "tuyen-dung":
						$prs = explode("/","employers");
						$app['linkpage'] = "tuyen-dung";
						break;
					default:{

						$arr = explode("/",$_GET["pr"]);


						$link_url = $_SERVER['REQUEST_URI'];
						if(preg_match('/viec-lam\/(.*)-(\d+).html/', $link_url, $matches)){
							$prs = explode("/","jobs/view/".$matches[1].'/'.$matches[2]);
							$app['linkpage'] = "tuyen-dung-viec-lam";
							break;
						}
						if (preg_match('/categories\/page-(.*).html\?s=(.*)/', $link_url, $matches)) {
								// echo ('4');
							$prs = explode("/", "categories/page-".$matches[1].".html?s=" . $matches[2]);
							$app['linkpage'] = "categories-index";
							$app['page'] = $matches[1];
							$app['search'] = $matches[2];
							$app['page-type'] = 'categories-index';
								break;
						}
						
						if(preg_match('/viec-lam\/(.*)-(\d+).amp.html/', $link_url, $matches)){
							$prs = explode("/","jobs/viewAmp/".$matches[1].'/'.$matches[2]);
							$app['linkpage'] = "tuyen-dung-viec-lam";
							break;
						}


						// if(isset($arr[0]) && $arr[0] == 'tuyen-dung-viec-lam' && isset($arr[1])){
						// 	$name = explode(".", $arr[1]);
						// 	if(isset($name) && isset($name[1]) && $name[1] == 'html'){
						// 		$_arr = explode("-", $name[0]);
						// 		if(is_numeric($_arr[count($_arr)-1])){
									
						// 			$_id = array_pop($_arr);
						// 			$_arr=implode("-",$_arr);

						// 			$prs = explode("/","jobs/view/".$_arr.'/'.$_id);
						// 			$app['linkpage'] = "tuyen-dung-viec-lam";
						// 			break;
						// 		}
						// 	}
						// }
						
						// if(isset($arr[0]) && $arr[0] == 'ung-tuyen' && isset($arr[1])){
						// 	$name = explode(".", $arr[1]);
						// 	if(isset($name) && isset($name[1]) && $name[1] == 'html'){
						// 		$_arr = explode("-", $name[0]);
						// 		if(is_numeric($_arr[count($_arr)-1])){
						// 			$_id = array_pop($_arr);
						// 			$_arr=implode("-",$_arr);

						// 			$prs = explode("/","candidates/view/".$_arr.'/'.$_id);
						// 			$app['linkpage'] = "ung-tuyen";
						// 			break;
						// 		}
						// 	}
						// }
					
						// $arr = explode(".",$_GET["pr"]);
						// if(isset($arr[1]) && $arr[1] == 'html'){
						// 	$prs = explode("/","employers/view/".$arr[0]);
						// 	$app['linkpage'] = "nha-tuyen-dung";
						// 	break;
						// }

						$static_page = $_GET["pr"];
						// exit($static_page);
						if(!preg_match('/admin/', $static_page) && !preg_match('/customer/', $static_page) && !preg_match('/jobseeker/', $static_page) && !preg_match('/\//', $static_page) ){
							$prs = explode("/","static_pages/index/".$static_page);
							$app['linkpage'] = $static_page;
							break;
						}
						$app['linkpage'] = "null";

					}
				}
			}
		}
		// check valid url
		$arrParams = explode('/', $_GET['pr']);
		if($arrParams[0] == 'jobs' && isset($arrParams[1]) && $arrParams[1] == 'view'){
			$prs = explode("/","jobs/view/0/0");
		}
	}
}

$noPrs = count($prs);
if($noPrs) {
	// Check if admin area
	//if(isset($prs[0]) && $prs[0]=="admin") {
	if($prs[0]=="admin") {
		$app['area'] = 'admin';
		$app['areaPath'] = 'admin/';
		array_shift($prs);
		$noPrs--;
	} else if($prs[0]=="api" || $prs[0]=="customer" || $prs[0]=="asdasd"){
		$app['area'] = $prs[0];
		$app['areaPath'] = $prs[0].'/';
		array_shift($prs);
		$noPrs--;
	}
	$app['ctl'] = isset($prs[0])?$prs[0]:null;	
	$app['prs'] = [];
	//if(isset($prs[0])) $app['ctl'] = $prs[0];
	if(isset($prs[1])) {
		if(strpos($prs[1],"=") === false) {
			$app['act'] = $prs[1];
		} else {
			$kv = explode("=",$prs[1]);
			$app['prs'][$kv[0]] = $kv[1];
		}
	}
	if($noPrs>2) {
		for($i=2; $i<$noPrs; $i++) {
			if(strpos($prs[$i],"=") !== false) {
				$kv = explode("=",$prs[$i]);
				$app['prs'][$kv[0]] = $kv[1];
			} else {
				$app['prs'][$i-1] = $prs[$i];
			}
		}
	}
}
if($app['area'] == 'admin' && $app['ctl'] == '')
	header("Location: /admin/login");
$c = $app['ctl']."_controller";
// exit("asdasd" . ControllerREL . $app['areaPath'] . $c . ".php");
if(!is_file(ControllerREL.$app['areaPath'].$c.".php")) {
	if($app['area'] == 'admin' && isset($_SESSION['user']) && ($_SESSION['user']['role']=='2' || $_SESSION['user']['role'] == '3' )){
		header("Location: /");
	}else if($app['area'] == 'admin' && !isset($_SESSION['user'])){
		header("Location: /admin/login");
	}else{
		// echo ('4');
		$c = "staticpages_controller";
		$app['ctl'] = "staticpages";	
		$app['act'] = "error";
	}
}

$controller = new $c();
?>
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Config global constant variable

$domain = $_SERVER["SERVER_NAME"];
$domainNoPort = $_SERVER["SERVER_NAME"];
if($_SERVER["SERVER_PORT"] != 80)
	$domain .= ":".$_SERVER["SERVER_PORT"];
//$domain = "pscd.pacificsoftdev.com";

$relRoot = dirname($_SERVER['SCRIPT_NAME']);
//$relRoot = "/";
if(substr($relRoot, -1) != "/") $relRoot .= "/";

//**local**
define('RootURL', 'http://'.$domain.$relRoot);
define('RootABS', 'http://'.$domain);
define('RootABSNoPort', 'http://'.$domainNoPort);

//**server**
// define('RootURL', 'https://'.$domain.$relRoot);
// define('RootABS', 'https://'.$domain);
// define('RootABSNoPort', 'http://'.$domainNoPort);

define('RootREL', $relRoot);
define('UploadREL', 'media/upload/');
define('UploadURI', $relRoot.UploadREL);
define('RootURI', dirname($_SERVER['SCRIPT_FILENAME'])."/");
//define('RootURI', '/home1/softdev/public_html/pacificsoftdev.com/pscd/');
// exit(RootURI);
define('ControllerREL', 'controllers/');
define('AdminPath', 'admin');
define('ControllerAdminREL', ControllerREL."/".AdminPath);
define('AdminEmail', 'noreply@vieclamdanang.vn');
define('PSCDEmail', 'noreply@vieclamdanang.vn');
define('PassEmail', 'Vieclam123123@');
define('NoImg', RootABSNoPort.'/media/img/NoImage.jpg');
define('DefaultImgW', 600);
define('AbsolutePath', str_replace('/config', '', __DIR__));

// Auth token for account PP: 
define('AUTH_TOKEN_PAYPAL', '86FSU0MjMPtb6iO4DiC6VcsrLlL-g7alHsljrqTWacuVjZ2SpDRQz49HnpS');

// Global variables
$app = [];
$app['area'] = 'users';
$app['areaPath'] = '';

$app['roles'] = [
	'1'=>'admin',
	'2'=>'customer',
	'3'=>'supplier',
	'4'=>'shipper',
	'5'=>'adsmanager',
];
$app['currency'] =[
	'0' => 'USD',
	'1' => 'GBP',
	'2' => 'VND',
	'3' => 'EUR',
	'4' => 'ETH',
	'5' => '¥',
	'6' => 'CAD',
	'7' => 'AUD',
	'8' => 'RMB'
];

$app['recordTime'] = [
	'created_at'	=>	'created_at',
	'updated_at'	=>	'updated_at',
	'created'		=>	'created',
	'updated'		=>	'updated'
];

$app['months'] = [
	'01',
	'02',
	'03',
	'04',
	'05',
	'06',
	'07',
	'08',
	'09',
	'10',
	'11',
	'12',
];

$app['weekdays'] = [
	'Monday',
	'Tuesday',
	'Wednesday',
	'Thursday',
	'Friday',
	'Saturday',
	'Sunday'
];

$app['Country'] = [
	'1' => 'Việt Nam',
	'22' => 'Bangladesh',
	'14' => 'Campuchia',
	'4' => 'Canada',
	'25' => 'Công Gô',
	'20' => 'Đài Loan',
	'8' => 'Hàn Quốc',
	'13' => 'Hoa Kỳ',
	'24' => 'Hồng Kông',
	'169' => 'Khác',
	'19' => 'Lào',
	'9' => 'Malaysia',
	'21' => 'Myanmar',
	'2' => 'Nhật Bản',
	'17' => 'Qatar',
	'23' => 'Quốc tế',
	'10' => 'Singapore',
	'5' => 'Trung Quốc',
	'3' => 'Úc',
	'16' => 'Ukraine'
];

$app['languages'] = [
	'1' => 'Việt Nam',
	'2' => 'Anh',
	'3' => 'Pháp',
	'4' => 'Đức',
	'5' => 'Nga',
	'6' => 'Trung Quốc',
	'7' => 'Hàn Quốc',
	'8' => 'Nhật Bản',
	'9' => 'Khác'
];


$app['gender'] = [
	'0' => 'Nam',
	'1' => 'Nữ',
];
$app['gender_all'] = [
	'0' => 'Nam',
	'1' => 'Nữ',
	'2' => 'Nam, Nữ',
];

$app['married'] = [
	'0' => 'Độc thân',
	'1' => 'Đã có gia đình',
];

$app['ads'] = [
	'1' => [
		'name' => 'Trang chủ',
		'position' => [
			// '1' => 'Top',
			// '2' => 'Slide khu vực dưới việc làm tuyển gấp',
			// '3' => 'Slide đầu trang (nhỏ)',
			'4' => 'Slide đầu trang (lớn)',
			'5' => 'Khu vực phải'
		]
	],
	
];


$app['packages_type'] = [
	'1' => 'Day',
	'2' => 'Week',
	'3' => 'Month',
	'4' => 'Year',
];



$app['years'] = [];
for($i = (int)date('Y'); $i >= 1975; $i--) {
	$app['years'][] = $i;
}

$app['font_families'] = [
	'Roboto',
	'Helvetica',
	'Open Sans',
	'Arial',
	'Times New Roman'
];

include_once(__DIR__.'/database.php');

$mediaFiles = [
	'css'	=>	[],
	'js'	=>	[]
];
$obMediaFiles = $mediaFiles;

//define('enableOB',true);
$enableOB = true;
?>
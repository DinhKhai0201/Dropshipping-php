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

$app['province'] = [
	'511' => 'Đà Nẵng',
	'4' => 'Hà Nội',
	'8' => 'Hồ Chí Minh',
	'76' => 'An Giang',
	'64' => 'Bà Rịa - Vũng Tàu',
	'781' => 'Bạc Liêu',
	'281' => 'Bắc Cạn',
	'240' => 'Bắc Giang',
	'241' => 'Bắc Ninh',
	'75' => 'Bến Tre',
	'65' => 'Bình Dương',
	'56' => 'Bình Định',
	'65' => 'Bình Phước',
	'62' => 'Bình Thuận',
	'78' => 'Cà Mau',
	'26' => 'Cao Bằng',
	'71' => 'Cần Thơ',
	'50' => 'Dak Lak',
	'1042' => 'Dak Nông',
	'900' => 'Điện Biên',
	'1064' => 'Đồng Bằng Sông Cửu Long',
	'61' => 'Đồng Nai',
	'67' => 'Đồng Tháp',
	'59' => 'Gia Lai',
	'19' => 'Hà Giang',
	'351' => 'Hà Nam',
	'34' => 'Hà Tây',
	'39' => 'Hà Tĩnh',
	'320' => 'Hải Dương',
	'31' => 'Hải Phòng',
	'780' => 'Hậu Giang',
	'18' => 'Hòa Bình',
	'321' => 'Hưng Yên',
	'901' => 'Khác',
	'58' => 'Khánh Hòa',
	'77' => 'Kiên Giang',
	'60' => 'Kon Tum',
	'1071' => 'KV Bắc Trung Bộ',
	'1069' => 'KV Đông Nam Bộ',
	'1070' => 'KV Nam Trung Bộ',
	'1072' => 'KV Tây Nguyên',
	'23' => 'Lai Châu',
	'25' => 'Lạng Sơn',
	'20' => 'Lào Cai',
	'63' => 'Lâm Đồng',
	'72' => 'Long An',
	'350' => 'Nam Định',
	'38' => 'Nghệ An',
	'30' => 'Ninh Bình',
	'68' => 'Ninh Thuận',
	'210' => 'Phú Thọ',
	'57' => 'Phú Yên',
	'52' => 'Quảng Bình',
	'510' => 'Quảng Nam',
	'55' => 'Quảng Ngãi',
	'33' => 'Quảng Ninh',
	'53' => 'Quảng Trị',
	'79' => 'Sóc Trăng',
	'22' => 'Sơn La',
	'66' => 'Tây Ninh',
	'36' => 'Thái Bình',
	'280' => 'Thái Nguyên',
	'37' => 'Thanh Hóa',
	'54' => 'Thừa Thiên- Huế',
	'73' => 'Tiền Giang',
	'1065' => 'Toàn quốc',
	'74' => 'Trà Vinh',
	'27' => 'Tuyên Quang',
	'70' => 'Vĩnh Long',
	'211' => 'Vĩnh Phúc',
	'29' => 'Yên Bái'
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

$app['districts'] = [
    "hai chau"		=>"Quận Hải Châu",
    "thanh khe"		=>"Quận Thanh Khê",
    "son tra"		=>"Quận Sơn Trà",
    "ngu hanh son"	=>"Quận Ngũ Hành Sơn",
    "lien chieu"	=>"Quận Liên Chiểu",
    "cam le"		=>"Quận Cẩm Lệ",
    "hoa vang"		=>"Huyện Hòa Vang",
	"khu vuc lan can"=>"Khu vực lân cận Đà Nẵng"
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
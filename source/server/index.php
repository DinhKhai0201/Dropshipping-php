<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, Authorization");
include_once(__DIR__.'/config/main.php');
require_once(__DIR__.'/libs/stripe-php/init.php');
include_once(__DIR__.'/vendor/bootstrap/autoload.php');
include_once(__DIR__.'/libs/simplehtmldom/simple_html_dom.php');
include_once(__DIR__.'/vendor/helpers/string/string_helper.php');
include_once(__DIR__.'/vendor/bootstrap/app.php');

?>
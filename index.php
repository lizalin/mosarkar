<?php
ob_start();
header('X-Frame-Options: DENY');
header('Access-Control-Allow-Origin: *');
ini_set('session.cookie_httponly', 1);
$name="PHPSESSID";
$value = session_id();
setcookie($name, $value,time()+1800, "", "", "", TRUE);
ini_set('session.use_only_cookies', 1);
header("pragma", "private");
//header("Cache-Control", " private, max-age=86400");
header('Cache-Control','Cache-Control: private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0');
header('Pragma','no-cache');
header('Expires','Fri, 01 Jan 1990 00:00:00 GMT');
header('X-Powered-By: Mo Sarkar');
include_once("controller/controller.php");
$controller = new Controller();  
?>
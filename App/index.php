<?php
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');   
header("X-XSS-Protection: 1; mode=block");
// Prevents javascript XSS attacks aimed to steal the session ID
ini_set('session.cookie_httponly', 1);
// Session ID cannot be passed through URLs
ini_set('session.use_only_cookies', 1);
$name="PHPSESSID";
$value = session_id();

session_start();
//echo session_id();exit;
setcookie($name, $value,time()+1800, "", "", "", TRUE);

// **PREVENTING SESSION FIXATION**
  include_once("controller/controller.php");
 
  $controller = new Controller();

?>
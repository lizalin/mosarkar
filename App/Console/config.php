<?php
date_default_timezone_set("Asia/Kolkata"); 
ini_set('display_errors', 0);     # don't show any errors...
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);
	define('ABSPATH',realpath(dirname(__FILE__)));
	$hostName	= $_SERVER['HTTP_HOST'];
	$curPath	= $_SERVER['PHP_SELF'];
	$explPath	= explode('/',$curPath);
	$FN1		= $explPath[1];
	$FN2		= $explPath[2];
	//echo $FN1.'=='.$FN2;exit;
	$urlPath	= 'http://'.$hostName.'/'.$FN1.'/'.$FN2.'/Console';
        $appPath	= 'http://'.$hostName.'/'.$FN1.'/'.$FN2;
	define('LINKPATH',$urlPath);        
	define('APP_PATH',$appPath);

	if(!class_exists('createConnection'))
		require(ABSPATH."/includes/DBConnection.php");

	if(!class_exists('commonClass'))
		require(ABSPATH."/class_file/Common_class_inc.php");
		 $adminConsole_Privilege = $_SESSION['adminConsole_Privilege'];                
	
	$com_obj	 = new commonClass;
	$str_path	 = $com_obj->webPath();
	$dirPath	 = explode('/',dirname($_SERVER['PHP_SELF']));
	$consolePath     = $dirPath[3];
	if($adminConsole_Privilege ==2 && strtolower($consolePath)=='console' && strtolower(basename($_SERVER['PHP_SELF']))!='proxy.php'){
        header("location: ".$str_path."../home");}
?>
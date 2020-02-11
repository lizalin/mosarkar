<?php	
	include("../class_file/hierarchy_class.php");	
	include("../class_file/manageTheme_class.php");

	$obj				= new hierarchy;
       // echo "2=<pre>";print_r($_SESSION);
	$objTheme			= new themeClass;
       // echo "3=<pre>";print_r($_SESSION);
	$strPath 			= $obj->webpath();
        //echo "4=<pre>";print_r($_SESSION);
	$readVal			= $objTheme->readHeaderFooter();
        //echo "5=<pre>";print_r($readVal);exit;
	$strheaderText		= $readVal['headerText'];	
	$strcompanyName 	= $readVal['companyName'];
	$intoption		 	= $readVal['option']; 
	$strloginLogo		= $readVal['loginLogo'];
	$strfooterText 		= $readVal['footerText'];
	$strurl		 		= $readVal['url'];
	
?>
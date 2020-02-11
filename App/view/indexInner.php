<?php
/* ================================================
	File Name         	  : indexInner.php
	Description		  : This is for Login.	
	Date Created		  : 19-11-2014
	Created By		  : Sudam Chandra Panda
 *      Devloped By               : Rasmi Ranjan Swain
 *      Devloped On               : 05-Jan-2015
	Update History		  :
	<Updated by>              : <Updated On>		<Remarks>
	include Class             :  manageTheme_class.php,logIn_class.php
	Functions                : webPath(),ExecuteQuery(),readTheme(),doLogin(),forgotPassword();
	==================================================*/
      
	include("Console/config.php");
	require(ABSPATH."/class_file/manageTheme_class.php");
	require(ABSPATH."/class_file/logIn_class.php");
        //echo md5('z9Ba6FXA');
        
        
        $obj				= new commonClass;
	$objTheme			= new themeClass;
	$objLogin			= new login;
	$strPath 			= $obj->webPath();
	$errFlag			= 0;
	$out_msg			= '';
	$requestURI			= $_SERVER['REQUEST_URI'];
        //echo "==========";exit;
	//$explURI			= explode();
        //
	//=========== Unset session values ==============
        /*update log status of a user when logged out By Ashis patra*/

	$strUser        = !empty($_SESSION['adminConsole_UserName'])?$_SESSION['adminConsole_UserName']:'';
        if($strUser!='')
        {
            //$sql		= "CALL USP_ADMIN_LOGIN('ULT','$strUser')";
            //$result		= $obj->ExecuteQuery($sql);
            unset($_SESSION[$siteProjectName.'_flag']);
            unset($_SESSION['adminConsole_userID']);
            unset($_SESSION['adminConsole_UserName']);
            unset($_SESSION['adminConsole_FullName']);
            unset($_SESSION['adminConsole_EMail']);
            unset($_SESSION['expire']);
            unset($_SESSION['step2Verification']);
            session_destroy();
            session_regenerate_id();
            header("location:".URL);
        }
	$siteProjectName	= $_SERVER['HTTP_HOST'];
	if($_SERVER['REMOTE_ADDR'] == '127.0.0.1')
	{
		$projectName 	= explode('/', $_SERVER['REQUEST_URI']);
		$siteProjectName= $projectName[1];
	}
        
	
	//=========== show Theme =====================
	$readVal                = $objTheme->readTheme();
	$strthemeName		= $readVal['themeNmae'];
	$strfileName		= $readVal['fileName'];
	//=========== read header footer ================
	$readVal                = $objTheme->readHeaderFooter();
	$strheaderText		= $readVal['headerText'];	
	$strcompanyName 	= $readVal['companyName'];
	$intoption		= $readVal['option']; 
	$strloginLogo		= $readVal['loginLogo'];  
        
	//====== Button click ===========================
			
	if(isset($_REQUEST["btnLogin"]))			
		$out_msg	= $objLogin->doLogin();
	
	if(isset($_REQUEST["btnSubmit"]))
	{		
		$result 	= $objLogin->forgotPassword();
		$out_msg	=$result['msg'];
		$errFlag	=$result['flag'];
	}	
	  
	//$imagick = new Imagick();
	//$imagick->readImage('C:\Program Files\Apache Software Foundation\Apache2.2\htdocs\CMJOURNAL\Application\Samarpan1.pdf');
	//$imagick->writeImage('output.jpg');

?>
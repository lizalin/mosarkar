<?php
	/* ================================================
	File Name         	  : error.php
	Description		  : This is used for viewing eror page.
	Designed By		  : Sunil Kumar Parida
        Designed On		  : 23-Dec-2014
	Update History		  :	<Updated by>		<Updated On>		<Remarks>
						
	Style sheet           : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css                                          
	Javscript Functions   : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
	includes			  :	header.php, navigation.php, util.php, footer.php,addDownloadInner.php

	==================================================*/
    
	include("Console/config.php");
	require(ABSPATH."/class_file/manageTheme_class.php");
	$objTheme			= new themeClass;
	$errFlag			= 0;
	$out_msg			= '';
        //=========== Unset session values ==============
	$siteProjectName	= $_SERVER['HTTP_HOST'];
	if($_SERVER['REMOTE_ADDR'] == '127.0.0.1')
	{
		$projectName 	= explode('/', $_SERVER['REQUEST_URI']);
		$siteProjectName= $projectName[1];
	}
	unset($_SESSION[$siteProjectName.'_flag']);
	unset($_SESSION['adminConsole_userID']);
	unset($_SESSION['adminConsole_UserName']);
	unset($_SESSION['adminConsole_FullName']);
	unset($_SESSION['adminConsole_EMail']);
        session_destroy();
	//=========== read header footer ================
	$readVal			= $objTheme->readHeaderFooter();
	$strheaderText		= $readVal['headerText'];	
	$strcompanyName 	= $readVal['companyName'];
	$intoption	        = $readVal['option']; 
	$strloginLogo		= $readVal['loginLogo']; 	
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo TITLE;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo APPURL;?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo APPURL;?>css/font-awesome.min.css">
<link href="<?php echo APPURL; ?>css/login.css" rel="stylesheet">
<!-- text fonts -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300">
<!-- ace styles -->
<link rel="stylesheet" href="<?php echo APPURL;?>css/ace.min.css">
<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo APPURL;?>css/ace-part2.min.css" />
		<![endif]-->
<link rel="stylesheet" href="<?php echo APPURL;?>css/ace-skins.min.css">
<link rel="stylesheet" href="<?php echo APPURL;?>css/ace-rtl.min.css">
<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo APPURL;?>css/ace-ie.min.css" />
		<![endif]-->
<!-- custom styles -->
<link href="<?php echo APPURL;?>css/custom.css" rel="stylesheet">
<script language="javascript">
	
        
</script>
   
    <!-- /.page-content -->

 </head>
<body id="loginBodyBg">
<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <div class="loginBox">
             <div class="text-center">
            <h1 id="loginTitle">
                 <?php if($intoption==1){ ?>      
              <h1><span id="CompanyName"><?php echo $strcompanyName; ?></span><br />
                <span id="headerText"><?php echo $strheaderText; ?></span></h1>
            <?php } else {?>
                <span align="center"> <img  src="<?php echo APPURL;?>images/logo.gif" alt="FSCW" style="width:480px;height: 80px;margin-bottom: .5rem;"> </span>
                <br>
                <strong>Mo Sarkar</strong> <br><small style="margin-top: .5rem;color: #000;display: block;font-size: 60%">Government of odisha</small>
            <?php }?>
            </h1>
           
          </div>  
          
        <div class="panel panel-login" style="margin-top:20px;">
      
         <div class="center">        
        
        <h3 style="margin-top:40px;" class="lighter smaller">Your session has been expired!</h3>
        <div class="space">&nbsp;</div>
        <div style="margin-top:25px;">
          <p><a href="javascript:void(0);" onClick="window.location.href='<?php echo URL;?>'" class="btn btn-info">Click here to login again</a></p>
          <div class="space"></div>
        </div>
        
        <div class="space"></div>        
      </div>
        </div>
        <div class="clearfix"></div>
        <div class="loginFooter">Copyright &copy; <?php echo date(Y);?> Mo Sarkar, All Rights Reserved.</div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

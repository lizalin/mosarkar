<?php
/* ================================================
	File Name         	  : colorSchemeInner.php
	Description			  : This page is used to Add update theme.	
	Created By			  :	Rasmi Ranjan Swain
    Created On			  :	07-oct-2013
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>									
	
	includes			  : manageTheme_class.php
	==================================================*/
	include("../class_file/manageTheme_class.php");
	include("../includes/sessioncheck.php");
	$obj				= new themeClass;
	$strPath 			= $obj->webpath();
	$glId				= $_REQUEST['GL'];
	$plId				= $_REQUEST['PL'];
        $prevSessionId                  = htmlspecialchars($_POST['hdnPrevSessionId'],ENT_QUOTES);
        $session_id                     = session_id();
	$obj->isSpclChar($strPath.$glId,'home');
	$obj->isSpclChar($strPath.$plId,'home');
	//========= Set default values ===============
	$outMsg				= '';	
	$strSubmit			= 'Save';
	//============ Read theme for Update =============
	$readVal			= $obj->readTheme();
	$strthemeName		= $readVal['themeNmae'];
	$strfileName		= $readVal['fileName'];		
	$strSubmit			= 'Update';
	//============ Read theme for Update =============
	if(isset($_REQUEST['btnSubmit']))
	{	
             if($session_id==$prevSessionId){
                $result				= $obj->addUpdateTheme();						
		$outMsg				= $result['msg'];
              }else{
                   echo "<script>window.location.href='".APP_PATH."/sessionOut'</script>";
             }
	}
?>
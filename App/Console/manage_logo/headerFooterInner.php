<?php
/* ================================================
	File Name         	  : headerFooterInner.php
	Description			  : This page is used to Add update header footer.	
	Created By			  :	Rasmi Ranjan Swain
    Created On			  :	01-oct-2013
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
          /*for filtering Data By Ashis kumar Patra*/
        if(isset($_POST)){
            $obj->filter_post_data($_POST);
        }
        
	//========= Set default values ===============	
	$intoption		= 1;
	$outMsg			= '';	
	$errFlag		= '0';		
	$strSubmit		= 'Save';
	$strReset		= 'Reset';	
	$strOnclick		= 'onclick=window.location.reload()';
        $prevSessionId                  = htmlspecialchars($_POST['hdnPrevSessionId'],ENT_QUOTES);
        $session_id                     = session_id();
	
	//============ Read header for Update =============
	
	$readVal                = $obj->readHeaderFooter();
	$strheaderText		= $readVal['headerText'];
	$strfooterText 		= $readVal['footerText'];
	$strurl		 		= $readVal['url'];
	$strcompanyName 	= $readVal['companyName'];
	$intoption		 	= $readVal['option'];
	$strloginLogo		= $readVal['loginLogo'];
    $strinnerLogo		= $readVal['innerLogo'];
    $strportalLogo		= $readVal['portalLogo'];
	$strSubmit			= 'Update';		
	
	$loginDisp		= ($strloginLogo=='')?'display:none;':'';
	$InnerDisp		= ($strinnerLogo=='')?'display:none;':'';
	$PortalDisp		= ($strportalLogo=='')?'display:none;':'';
	
	if(isset($_REQUEST['btnSubmit']))
	{	
             
                $result				= $obj->addUpdateHeader();						
		$outMsg				= $result['msg'];
               
	}
?>
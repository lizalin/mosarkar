<?php
/* ================================================
	File Name         	  : addLocationInner.php
	Description			  : This page is used to Add the Location.	
	Created By			  :	Rasmi Ranjan Swain
    Created On			  :	20th-Sept-2013
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>
										
	
	includes			  : manageUser_class.php
	==================================================*/
	include("../class_file/manageUser_class.php");
	$obj				= new user;
	$strPath 			= $obj->webpath();
	$glId				= $_REQUEST['GL'];
	$plId				= $_REQUEST['PL'];
	//========= Set default values ===============
	
	$outMsg			= '';
	$intID			= '0';
	$errFlag		= '0';
	$strTab			= 'Add';	
	$strSubmit		= 'Save';
	$strReset		= 'value=Reset';
	$strOnclick		= "onClick=$('#lblChar').html('500')";
	$numType		= 1;
        $prevSessionId                  = htmlspecialchars($_POST['hdnPrevSessionId'],ENT_QUOTES);
        $session_id                     = session_id();
	//============ Read Designation for Update =============
	if(isset($_REQUEST['ID']))
	{
		$intID			= $_REQUEST['ID'];
		$recNo			= $_REQUEST['RC'];
		$pageNo			= $_REQUEST['PG'];
		$readVal		= $obj->readLocation($intID);
		$selcountry		= $readVal['countryid'];
		$strLocName 	= $readVal['locName'];
		 $strTimeZone	= $readVal['timeZone'];
		$strdescription	= $readVal['description'];			
		$strTab			= "Edit";
		$strSubmit		= 'Update';
		$strReset		= 'value=Cancel';
		$strOnclick		= "onClick=doCancel('viewLocation/".$glId."/".$plId."/".$pageNo."/".$recNo."')";
	}
	
	if(isset($_REQUEST['btnSubmit']))
	{	
           
               $result				= $obj->addUpdateLocation($intID);
		$selcountry			= $result['country'];
		$strLocName			= $result['locName'];
		$strTimeZone		= $result['timeZone'];
		$strdescription		= $result['description'];				
		$outMsg				= $result['msg'];
		$errFlag			= $result['flag'];
               
	}
	$strCountryName = $obj->fillCountry($selcountry);
?>
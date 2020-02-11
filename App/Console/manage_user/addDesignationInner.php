<?php
/* ================================================
	File Name         	  : addDesignationInner.php
	Description               : This page is used to Add the Designation.	
	Created By                : Rasmi Ranjan Swain
        Created On                : 17th-Sept-2013
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
	$numType		= 1;
	$strOnclick		= '';
	$selLoc			= 0;
        $prevSessionId                  = htmlspecialchars($_POST['hdnPrevSessionId'],ENT_QUOTES);
        $session_id                     = session_id();
	//============ Read Designation for Update =============
	if(isset($_REQUEST['ID']))
	{
		$intID			= $_REQUEST['ID'];
		$recNo			= $_REQUEST['RC'];
		$pageNo			= $_REQUEST['PG'];
		$readVal		= $obj->readDesignation($intID);
		$selLoc			= $readVal['location'];
		$strDesgName            = $readVal['desgName'];
		$straliasName           = $readVal['aliasName'];
		$strRankName            = $readVal['rankName'];
		$numType		= $readVal['type'];		
		$strTab			= "Edit";
		$strSubmit		= 'Update';
		$strReset		= 'value=Cancel';
		$strOnclick		= "onClick=doCancel('viewDesignation/".$glId."/".$plId."/".$pageNo."/".$recNo."')";
	}
	//========== on button submit ===============
	if(isset($_REQUEST['btnSubmit']))
	{
            
		$result			= $obj->addUpadateDesignation($intID);
		$selLoc			= $result['loc'];
		$strDesgName            = $result['dgName'];
		$straliasName           = $result['aliasName'];
		$strRankName            = $readVal['rankName'];
		$numType		= $result['type'];		
		$outMsg			= $result['msg'];
		$errFlag		= $result['flag'];
               
	}
	$fillLoc	= $obj->fillLocation($selLoc);
?>
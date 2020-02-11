<?php
/* ================================================
	File Name         	  : addGradeInner.php
	Description			  : This page is used to Add the Grade.	
	Created By			  :	Rasmi Ranjan Swain
    Created On			  :	18th-Sept-2013
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
	$strOnclick		= '';
	$strOnclick		= "onClick=$('#lblChar').html('500')";	
	$numType		= 1;	
	$selLoc			= 0;
	//============ Read Designation for Update =============
	if(isset($_REQUEST['ID']))
	{
		$intID			= $_REQUEST['ID'];
		$recNo			= $_REQUEST['RC'];
		$pageNo			= $_REQUEST['PG'];
		$readVal		= $obj->readGrade($intID);
		$selLoc			= $readVal['location'];
		$strGradeName	= $readVal['GradeName'];
		$strdescription	= $readVal['description'];			
		$strTab			= "Edit";
		$strSubmit		= 'Update';
		$strReset		= 'value=Cancel';
		$strOnclick		= "onClick=doCancel('viewGrade/".$glId."/".$plId."/".$pageNo."/".$recNo."')";
	}
	//========== on button submit ===============
	if(isset($_REQUEST['btnSubmit']))
	{
		$result			= $obj->addUpadateGrade($intID);
		$selLoc			= $result['loc'];
		$strGradeName	= $result['grdgName'];
		$strdescription	= $result['description'];				
		$outMsg			= $result['msg'];
		$errFlag		= $result['flag'];
	}
	$fillLoc			= $obj->fillLocation($selLoc);
	
?>
<?php
/* ================================================
	File Name         	  : addGroupInner.php
	Description			  : This page is used to create group.	
	Created By			  :	Rasmi Ranjan Swain
    Created On			  :	04th-Nov-2013
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
        $prevSessionId                  = htmlspecialchars($_POST['hdnPrevSessionId'],ENT_QUOTES);
        $session_id                     = session_id();
		
	//============ Read Group for Update =============
	if(isset($_REQUEST['ID']))
	{
		$intID				= $_REQUEST['ID'];
		$recNo				= $_REQUEST['RC'];
		$pageNo				= $_REQUEST['PG'];		
		$readVal			= $obj->readGroup($intID);
		$strGroupName                   = $readVal['groupName'];		
		$strdescription                 = $readVal['description'];
		$strGroupAliasName              = $readVal['aliasName'];
		$strTab				= "Edit";
		$strSubmit			= 'Update';
		$strReset			= 'value=Cancel';
		$strOnclick			= "onClick=doCancel('viewGroup/".$glId."/".$plId."/".$pageNo."/".$recNo."')";
	}
	//========== on button submit ===============
	if(isset($_REQUEST['btnSubmit']))
	{
             
		$result				= $obj->addUpdateGroup($intID);		
		$outMsg				= $result['msg'];
		$errFlag			= $result['flag'];
		$strGroupName                   = $result['groupName'];		
		$strdescription                 = $result['description'];
		$strGroupAliasName              = $result['aliasName'];
                
	}
	
	
?>
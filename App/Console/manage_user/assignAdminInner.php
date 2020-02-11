<?php
	/* ================================================
	File Name         	  : assignAdminInner.php
	Description			  : This page is used to assign administrator for a location.
	Devloper Name		  : Sunil kumar parida
	Date Created		  : 20-sep-2013
	Update History		  :
	<Updated by>		<Updated On>		<Remarks>
	Sunil Kumar Parida	11-Nov-2013			Remove administrator
	
	includes			  : manageUser_class.php
	
	==================================================*/
	include("../class_file/manageUser_class.php");
	$obj			= new user;
	$strPath 		= $obj->webpath();
	$outMsg			= '';
	$locId			= 0;
	$userId			= 0;
	$glId			= $_REQUEST['GL'];
	$plId			= $_REQUEST['PL'];
	if(isset($_REQUEST['btnSubmit']))
	{
		$result		= $obj->assignAdmin();
		$outMsg		= $result['msg'];
		$locId		= $result['loc'];
		$userId		= $result['uId'];
	}
	$locName		= $obj->fillDrpLocation($locId);
?>
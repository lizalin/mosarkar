<?php
/* ================================================
	File Name         	  : setPermissionInner.php
	Description			  : This page is used to Set Permission.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 24-Oct-2013
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>						
	
	includes			  : setPermission_class.php

	==================================================*/
	require("../class_file/policestationRange_class.php");
	$obj			= new clsPolicestation;
	$strPath 		= $obj->webpath();
	$glId			= $_REQUEST['GL'];
	$plId			= $_REQUEST['PL'];
	//$groupTable		= $obj->NumRow($obj->ExecuteQuery("SHOW TABLES LIKE 'm_admin_group_permission'"));
	//======= Function to set permission ===========
	if(isset($_REQUEST['btnSave']))
	{
		
		$outMsg		= $obj->tagPolicestation();
	}

?>
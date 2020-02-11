<?php
/* ================================================
	File Name         	  : assignLinkInner.php
	Description			  : This page is used to Set Link  for user or group.
	Author Name			  : Rasmi Ranjan swain
	Date Created		  : 08-NOV-2013
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>						
	
	includes			  : setPermission_class.php

	==================================================*/
	require("../class_file/manageLink_class.php");
	require("../class_file/setPermission_class.php");
	$obj			= new fillPermission;
	$strPath 		= $obj->webpath();
	$glId			= $_REQUEST['GL'];
	$plId			= $_REQUEST['PL'];
	//======= Function to set permission ===========
	if(isset($_REQUEST['btnSave']))
	{
		$outMsg		= $obj->assignLinkPermission();
	}
	
?>
<?php
/* ================================================
	File Name         	  : ViewHierarachymasterInner.php
	Description			  : This page is used to Add Hierarchy node.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 21-Aug-2013
	Update History		  :
				<Updated by>		<Updated On>		<Remarks>
				
	
	includes			  : hierarchy_class.php

	==================================================*/
	require("../class_file/hierarchy_class.php");
	$obj		= new hierarchy;
	$strPath 	= $obj->webpath();	
	$nodeResult	= $obj->viewLevel();
	$outMsg		= $obj->updateHierarchy();
	if(isset($_REQUEST['hdn_qs']) && $_REQUEST['hdn_qs']=='D')
	{
		$ids	= $_REQUEST['hdn_ids'];
		$outMsg	= $obj->deleteHierarchy($ids);
	}
?>
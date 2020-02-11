<?php
/* ================================================
	File Name         	  : hierarchyInner.php
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
	$nodeResult	= $obj->viewLevel('R');
	$ctr		= 0;
	if(isset($_POST['btnSubmit']))
	{
		$outMsg	= $obj->addHierarchy();		
	}
?>
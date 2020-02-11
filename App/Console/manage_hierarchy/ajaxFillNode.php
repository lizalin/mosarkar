<?php
	/*================================================
	File Name         	  : ajaxFillNode.php
	Description			  : This page is used to fill Subnode Values.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 05-Sep-2013
	Update History		  :
				<Updated by>		<Updated On>		<Remarks>
				
	
	includes			  : hierarchy_class.php

	==================================================*/
	require("../class_file/hierarchy_class.php");	
	$obj			= new hierarchy;
	$strPath 		= $obj->webpath();	
	if(isset($_REQUEST['nodeId']) && $_REQUEST['nodeId']>0)
	{
		$selVal	= (isset($_REQUEST['selVal']))?$_REQUEST['selVal']:0;
		$nodeId	= $_REQUEST['nodeId'];
		echo $obj->viewStructure($nodeId,$selVal);
	}
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
	$obj			= new hierarchy;
	$strPath 		= $obj->webpath();
        $glId			= $_REQUEST['GL'];
	$plId			= $_REQUEST['PL'];
	if(isset($_REQUEST['SL']) && $_REQUEST['SL']>0)
		$nodeId		= $_REQUEST['SL'];
	$nodeVal		= $obj->getName('VCH_HIERARCHY_NAME','m_admin_hierarchy','INT_NODE_ID',$nodeId,'BIT_DELETED_FLAG');
	$subNodeResult	= $obj->viewSubNode($nodeId);
	$outMsg		= $obj->updateSubNode();	
	//========== Delete subnode ==========
	if(isset($_REQUEST['hdn_qs']) && $_REQUEST['hdn_qs']=='D')
	{
		$ids	= $_REQUEST['hdn_ids'];
		$outMsg	= $obj->deleteSubnode($ids);
	}
?>
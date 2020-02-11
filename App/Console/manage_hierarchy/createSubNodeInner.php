<?php
	/*================================================
	File Name         	  : createSubNodeInner.php
	Description			  : This page is used to Add Subnode node.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 27-Aug-2013
	Update History		  :
				<Updated by>		<Updated On>		<Remarks>
				
	
	includes			  : hierarchy_class.php

	==================================================*/
	require("../class_file/hierarchy_class.php");	
	$obj			= new hierarchy;
	$strPath 		= $obj->webpath();	
	$outMsg			= '';
        if(isset($_REQUEST['GL']) && $_REQUEST['GL']>0)
		$glId		= $_REQUEST['GL'];
        if(isset($_REQUEST['PL']) && $_REQUEST['PL']>0)
		$plId		= $_REQUEST['PL'];
	if(isset($_REQUEST['SL']) && $_REQUEST['SL']>0)
		$nodeId		= $_REQUEST['SL'];
	$nodeName		= $obj->getName('VCH_HIERARCHY_NAME','m_admin_hierarchy','INT_NODE_ID',$nodeId,0);
	$subNodeResult	= $obj->viewSubNodes($nodeId,'R');
        $prevSessionId                  = htmlspecialchars($_POST['hdnPrevSessionId'],ENT_QUOTES);
        $session_id                     = session_id();
	if(isset($_POST['btnSubmit']))
	{
             if($session_id==$prevSessionId){
		$outMsg	= $obj->addSubNode($nodeId);
                }else{
                   echo "<script>window.location.href='".APP_PATH."/sessionOut'</script>";
             }
	}	
?>

<?php
	/*================================================
	File Name         	  : createDepartmentInner.php
	Description			  : This page is used to Add Subnode Values.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 04-Sep-2013
	Update History		  :
				<Updated by>		<Updated On>		<Remarks>
				
	
	includes			  : hierarchy_class.php

	==================================================*/
         //error_reporting(E_ALL);
	require("../class_file/hierarchy_class.php");	
	$obj			= new hierarchy;
	$strPath 		= $obj->webpath();	
	$outMsg			= '';
	//============== Get node Value ========================
	$glId			= $_REQUEST['GL'];
	$plId			= $_REQUEST['PL'];	
	if(isset($_REQUEST['SL']) && $_REQUEST['SL']>0)
		$nodeId		= $_REQUEST['SL'];
	else
		$nodeId		= 0;
	
	if(isset($_REQUEST['TL']) && $_REQUEST['TL']>0)
		$subNodeId		= $_REQUEST['TL'];	
	else
		$subNodeId		= 0;
	$strTab			= "Add";
	$strSubmit		= 'Submit';
	$intID			= (isset($_REQUEST['ID']))?$_REQUEST['ID']:'0';
	$slId			= (isset($_REQUEST['SL']))?$_REQUEST['SL']:'0';
	$tlId			= (isset($_REQUEST['TL']))?$_REQUEST['TL']:'0';
	$pageNo			= (isset($_REQUEST['PG']))?$_REQUEST['PG']:'0';
	$recNo			= (isset($_REQUEST['RC']))?$_REQUEST['RC']:'0';
	//============ Read subnode value for Update =============
	if(isset($_REQUEST['ID']))
	{		
		$parents		= $obj->fillSubnodeVal($intID);		
		$readVal		= $obj->readSubnodeValues($intID);
		$parentId		= $readVal['ParentNode'];
		$name		 	= $readVal['ValueName'];
		$hCode			= $readVal['HierachyCode'];
		$telNo			= $readVal['TelNo'];
		$faxNo		 	= $readVal['FaxNo'];
		$address		= $readVal['Address'];
		$subNodeId		= $readVal['SubnodeId'];	
		$strTab			= "Edit";
		$strSubmit		= 'Update';
		$strReset		= 'value=Cancel';
		$strOnclick		= "onClick=doCancel('viewDepartment/".$glId."/".$plId."/".$slId	."/".$tlId."/".$pageNo."/".$recNo."')";
		
	}
	//=========== Get level of the node =====================
	
	$subNodeVal		= $obj->getLevel($subNodeId);	
	$level			= $subNodeVal[0];
	$subNodeName	= $subNodeVal[2];
	$subNodeAlias	= $subNodeVal[3];
	$parentLevel	= $level-1;	
	$firstNode		= $nodeId;
	$parentId		= $obj->getNodeId($nodeId);	
	if($parentLevel>0)
	{
		$parentId	= $_REQUEST['ddlNode'.$parentLevel];
		$firstNode	= 0;
	}
	if(isset($_REQUEST['btnSubmit']))
	{		
		$outMsg	= $obj->addSubnodeValues($intID,$parentId,$firstNode,$subNodeId);
	}
        
	if(isset($outMsg['flag']) && $outMsg['flag'] ==2)
	{
		$name	= $outMsg['name'];
		$hCode	= $outMsg['hCode'];
		$telNo	= $outMsg['telNo'];
		$faxNo	= $outMsg['faxNo'];
		$address= $outMsg['address'];
	}
	
	
?>
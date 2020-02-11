<?php
/* ================================================
	File Name         	  : addButtonInner.php
	Description			  : This page is used to Add the Global Links.	
	Created By			  :	Sunil Kumar Parida
    Created On			  :	13th-Sept-2013
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>
										
	
	includes			  : manageLink_class.php
	==================================================*/
	require("../class_file/manageLink_class.php");
	$obj			= new linkClass;
	$strPath 		= $obj->webpath();
	$maxSL			= ($obj->getSerialNo('B')=='')?1:$obj->getSerialNo('B');
	$glId			= $_REQUEST['GL'];
	$plId			= $_REQUEST['PL'];
	//========= Set default values ===============
	
	$outMsg			= '';
	$intID			= '0';
	$errFlag		= '';
	$strTab			= 'Add';
	$selFunc		= '0';
	$intTabAvail	= '1';
	$strSubmit		= 'Save';
	$strReset		= 'Reset';
	$strOnclick		= '';
	//============ Update Button master =============
	if(isset($_REQUEST['ID']))
	{
		$intID			= $_REQUEST['ID'];
		$recNo			= $_REQUEST['RC'];
		$pageNo			= $_REQUEST['PG'];
		$readVal		= $obj->readButton($intID);
		$outMsg			= $readVal['msg'];
		$errFlag		= $readVal['flag'];
		$intFuncId		= $readVal['function'];
		$txtBtnName		= $readVal['btnName'];
		$maxSL			= $readVal['slNo'];			
		$fileName		= $readVal['fileName'];
		$intTabAvail	= $readVal['tabAvail'];
		$intAction1		= $readVal['action1'];
		$intAction2		= $readVal['action2'];	
		$intAction3		= $readVal['action3'];	
		$txtDesc		= $readVal['description'];
		$strTab			= "Edit";
		$strSubmit		= 'Update';
		$strReset		= 'Cancel';
		$strOnclick		= "onClick=\"doCancel('viewButton/".$glId."/".$plId."/".$pageNo."/".$recNo."');\"";
	}
	//========== on button submit ===============
	if(isset($_REQUEST['btnSubmit']))
	{
		$result			= $obj->addButton($intID);
		$outMsg			= $result['msg'];
		$errFlag		= $result['flag'];
		$intFuncId		= $result['function'];
		$txtBtnName		= $result['btnName'];
		$maxSL			= $result['slNo'];			
		$fileName		= $result['fileName'];
		$intTabAvail	= $result['tabAvail'];
		$intAction1		= $result['action1'];
		$intAction2		= $result['action2'];	
		$intAction3		= $result['action3'];	
		$txtDesc		= $result['description'];	
	}
	$fillFunction		= $obj->fillFunctionDrp($intFuncId);
?>
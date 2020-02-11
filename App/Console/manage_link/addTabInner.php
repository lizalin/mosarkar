<?php
/* ================================================
	File Name         	  : addTabInner.php
	Description			  : This page is used to Add the Tab master.	
	Created By			  :	Sunil Kumar Parida
    Created On			  :	16th-Sept-2013
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>
										
	
	includes			  : manageLink_class.php
	==================================================*/
	require("../class_file/manageLink_class.php");
	$obj			= new linkClass;
	$strPath 		= $obj->webpath();
	$maxSL			= ($obj->getSerialNo('T')=='')?1:$obj->getSerialNo('T');
	$glId			= $_REQUEST['GL'];
	$plId			= $_REQUEST['PL'];
	//========= Set default values ===============
	
	$outMsg			= '';
	$intID			= '0';
	$errFlag		= '';
	$strTab			= 'Add';
	$intFuncId		= '0';
	$intBtnId		= '0';
	$intTabAvail	= '1';
	$strSubmit		= 'Save';
	$strReset		= 'Reset';
	$strOnclick		= 'onClick="doReset()"';
	//============ Update Tab master =============
	if(isset($_REQUEST['ID']))
	{
		$intID			= $_REQUEST['ID'];
		$recNo			= $_REQUEST['RC'];
		$pageNo			= $_REQUEST['PG'];
		$readVal		= $obj->readTab($intID);
		$outMsg			= $readVal['msg'];
		$errFlag		= $readVal['flag'];
		$intFuncId		= $readVal['function'];
		$intBtnId		= $readVal['btnId'];
		$txtTabName		= $readVal['tabName'];
		$maxSL			= $readVal['slNo'];			
		$fileName		= $readVal['fileName'];
		$intAction1		= $readVal['action1'];
		$intAction2		= $readVal['action2'];	
		$intAction3		= $readVal['action3'];	
		$txtDesc		= $readVal['description'];
		$strTab			= "Edit";
		$strSubmit		= 'Update';
		$strReset		= 'Cancel';
		$strOnclick		= "onClick=\"doCancel('viewTab/".$glId."/".$plId."/".$pageNo."/".$recNo."');\"";
	}
	//========== on button submit ===============
	if(isset($_REQUEST['btnSubmit']))
	{
		$result			= $obj->addTab($intID);
		$outMsg			= $result['msg'];
		$errFlag		= $result['flag'];
		$intFuncId		= $result['function'];
		$intBtnId		= $result['btnId'];
		$txtTabName		= $result['tabName'];
		$maxSL			= $result['slNo'];			
		$fileName		= $result['fileName'];
		$intAction1		= $result['action1'];
		$intAction2		= $result['action2'];	
		$intAction3		= $result['action3'];	
		$txtDesc		= $result['description'];	
	}
	$fillFunction		= $obj->fillFunctionDrp($intFuncId);
?>
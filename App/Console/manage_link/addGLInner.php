<?php
/* ================================================
	File Name         	  : addGLInner.php
	Description               : This page is used to Add the Global Links.	
	Created By                : Sunil Kumar Parida
        Created On		  : 11th-Sept-2013
	Update History		  :
				<Updated by>			<Updated On>		<Remarks>
										
	
	includes			  : manageLink_class.php
	==================================================*/
	require("../class_file/manageLink_class.php");
	$obj			= new linkClass;
	$strPath 		= $obj->webpath();
	$maxSL			= 1;
	$maxSL			= ($obj->getSerialNo('G')=='')?1:$obj->getSerialNo('G');
	$glId			= $_REQUEST['GL'];
	$plId			= $_REQUEST['PL'];
        $prevSessionId          = htmlspecialchars($_POST['hdnPrevSessionId'],ENT_QUOTES);
        $session_id= session_id();
	//========= Set default values ===============
	$selLoc			= '0';
	$outMsg			= '';
	$intID			= '0';
	$errFlag		= '';
	$strTab			= 'Add';
	$intShow		= '1';
	$strSubmit		= 'Save';
	$strReset		= 'Reset';
	$strOnclick		= '';
	$display		= "display:none;";
	$iconType		= 1;
	//============ Update global link =============
	if(isset($_REQUEST['id']))
	{ 
		$intID		= $_REQUEST['id'];
		$recNo		= $_REQUEST['RC'];
		$pageNo		= $_REQUEST['PG'];
		$readVal	= $obj->readGlobalLink($intID);
		$selLoc		= $readVal['location'];
		$strGLName	= $readVal['glName'];
		$maxSL		= $readVal['slNo'];
		$intShow	= $readVal['show'];
		$strIcon	= $readVal['icon'];
		$strIconCls	= $readVal['iconClass'];
		if($strIcon!='')
			$iconType	= 2;
		else if($strIconCls!='')
			$iconType	= 3;
		else
			$iconType	= 1;
		$display	= ($strIcon!='')?"":"display:none;";
		$strTab		= "Edit";
		$strSubmit	= 'Update';
		$strReset	= 'Cancel';
		$strOnclick	= "onClick=doCancel('viewGL/".$glId."/".$plId."/".$pageNo."/".$recNo."')";
            
	}
	
	//========== on button submit ===============
	if(isset($_REQUEST['btnSubmit']))
	{
           
		$result		= $obj->addGL($intID);
		$selLoc		= $result['loc'];
		$strGLName	= $result['glName'];
		$intSLNo	= $result['slNo'];
		$intShow	= $result['show'];
		$outMsg		= $result['msg'];
		$errFlag	= $result['flag'];
		$strIcon	= $readVal['icon'];
               
	}
	$fillLoc	= $obj->fillLocation($selLoc);				
?>
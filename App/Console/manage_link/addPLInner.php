<?php
/* ================================================
	File Name         	  : addPLInner.php
	Description			  : This page is used to Add the Primary Links.	
	Created By			  :	Sunil Kumar Parida
    Created On			  :	12th-Sept-2013
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>
										
	
	includes			  : manageLink_class.php
	==================================================*/
	require("../class_file/manageLink_class.php");
	$obj			= new linkClass;
	$strPath 		= $obj->webpath();
	$maxSL			= ($obj->getSerialNo('P')=='')?1:$obj->getSerialNo('P');
	$glId			= $_REQUEST['GL'];
	$plId			= $_REQUEST['PL'];
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
	$selLoc			= 0;
	$selGLId		= 0;
	$strPLName		= '';
	$numType		= 1;
	$strFunc		= 0;		
	$intShow		= 1;
         $prevSessionId                  = htmlspecialchars($_POST['hdnPrevSessionId'],ENT_QUOTES);
        $session_id                     = session_id();
	//============ Update global link =============
	if(isset($_REQUEST['ID']))
	{
		$intID		= $_REQUEST['ID'];
		$recNo		= $_REQUEST['RC'];
		$pageNo		= $_REQUEST['PG'];
		$readVal	= $obj->readPrimaryLink($intID);
		$selLoc		= htmlspecialchars_decode($readVal['location']);
		$selGLId	= $readVal['glId'];
		$strPLName	= htmlspecialchars_decode($readVal['plName']);
		$numType	= htmlspecialchars_decode($readVal['linkType']);
		$strFunc	= $readVal['function'];
		$maxSL		= $readVal['slNo'];
		$intShow	= $readVal['show'];
		$strTab		= "Edit";
		$strSubmit	= 'Update';
		$strReset	= 'Cancel';
		$strOnclick	= "onClick=doCancel('viewPL/".$glId."/".$plId."/".$pageNo."/".$recNo."')";
	}
	//========== on button submit ===============
	if(isset($_REQUEST['btnSubmit']))
	{
            
		$result		= $obj->addPL($intID);
		$selLoc		= htmlspecialchars_decode($result['loc']);
		$selGLId	= $result['glId'];
		$strPLName	= htmlspecialchars_decode($result['plName']);
		$maxSL		= htmlspecialchars_decode($result['slNo']);
		$numType	= htmlspecialchars_decode($result['linkType']);
		$strFunc	= $result['function'];		
		$intShow	= $result['show'];
		$outMsg		= $result['msg'];
		$errFlag	= $result['flag'];
               
	}
	$fillLoc		= $obj->fillLocation($selLoc);
	$fillFunction	= $obj->fillFunctionDrp($strFunc);
?>
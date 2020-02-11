<?php
	/* ================================================
	File Name         	  : functionInner.php
	Description               : This page is used to manage functions.
	Author Name		  : Sunil Kumar Parida
	Date Created		  : 11th-sept-2013	
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>
	Style sheet           : style.css                                             
	Javscript Functions   : defaultfocus(),blankFieldValidation(),IsSpecialCharacter()
	Javascript Files	  : jquery.js,bootstrap.min.js,loadscript.js
	includes			  : functionInner.php,header.php,leftmenu.php,navigation.php,title.php,util.php,footer.php

	==================================================*/	
	require("../class_file/manageLink_class.php");
	$obj				= new linkClass;
	$strPath 			= $obj->webpath();	
	$glId				= $_REQUEST['GL'];
	$plId				= $_REQUEST['PL'];
	//=============== Set default values ===============
	$strFuncName		= '';
	$strFileName		= '';
	$strDesc			= '';
	$permission1		= '';
	$permission2		= '';
	$permission3		= '';
	$mailStatus			= 2;
	$intFreebees		= 2;
	$portletFile		= '';
	$outMsg				= '';
	$flag				= '';
	$strTab				= 'Add';
	$strHeader			= 'Add Function Master';
	$strSubmit			= 'Submit';
	$strReset			= 'Reset';
	$strOnclick			= '';
	$functionId			= 0;
        $prevSessionId                  = htmlspecialchars($_POST['hdnPrevSessionId'],ENT_QUOTES);
        $session_id                     = session_id();
	if(isset($_REQUEST['ID']) && $_REQUEST['ID']>0)
	{
		$functionId		= $_REQUEST['ID'];
		$recNo			= $_REQUEST['RC'];
		$pageNo			= $_REQUEST['PG'];
		$fillResult		= $obj->fillFunction($functionId);
		$strFuncName            = htmlspecialchars_decode($fillResult['funcName']);
		$strFileName            = htmlspecialchars_decode($fillResult['fileName']);
		$strDesc		= htmlspecialchars_decode($fillResult['desc']);
		$permission1            = $fillResult['permission1'];
		$permission2            = $fillResult['permission2'];
		$permission3            = $fillResult['permission3'];
		$mailStatus		= $fillResult['mailStatus'];
		$intFreebees            = $fillResult['freebees'];
		$portletFile            = htmlspecialchars_decode($fillResult['portlet']);
		$strHeader		= 'Edit Function Master';
		$strTab			= 'Edit';
		$strSubmit		= 'Update';
		$strReset		= 'Cancel';
		$strOnclick		= "onClick=doCancel('viewfunction/".$glId."/".$plId."/".$pageNo."/".$recNo."')";
               
	}
	//============== on submitting button ================
	if(isset($_REQUEST['btnSave']))
	{
          
		$result			= $obj->addUpdateFunction($functionId);
		$strFuncName            = htmlspecialchars_decode($result['funcName']);
		$strFileName            = htmlspecialchars_decode($result['fileName']);
		$strDesc		= htmlspecialchars_decode($result['desc']);
               // $strPages		= htmlspecialchars_decode($result['txtPages']);
		$permission1            = $result['permission1'];
		$permission2            = $result['permission2'];
		$permission3            = $result['permission3'];
		$mailStatus		= $result['mailStatus'];
		$intFreebees            = $result['freebees'];
		$portletFile            = htmlspecialchars_decode($result['portlet']);
		$outMsg			= $result['msg'];
		$flag			= $result['flag'];
                
	}
?>
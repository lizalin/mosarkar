<?php
/*============================================================
Page Name		:	proxy.php
Description		:	Class for managing classBind 
Created By		:	Rasmi Ranjan Swain
Created On		:	05-Jan-2014
Update History	:
<Updated by>		<Updated On>		<Remarks>

Functions Used	:	
==============================================================*/
require("classBind.php");
$objportalGl		= new portalGl;
$objTheme			= new HeaderClass;
$objButton			= new ButtonMaster;
$objTab				= new tabMaster;
switch($_GET['method']){
	case "upgLink":	
		$userId	= $_REQUEST['UID'];					
		$objportalGl->viewGL($userId);
	break; 
	case "theme":
		$objTheme->viewHeaderFooter();
	break;
	case "button":
		$funId	= $_REQUEST['FID'];	
		$objButton->viewButton($funId);
	break;
	case "tab":
		$funId	= $_REQUEST['FID'];	
		$objTab->viewTab($funId);
	break;
}
?>
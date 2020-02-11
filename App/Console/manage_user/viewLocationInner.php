<?php
/* ================================================
	File Name         	  : viewLocationInner.php
	Description			  : This page is used to View the Location.	
	Created By			  :	Rasmi Ranjan Swain
    Created On			  :	19th-Sept-2013
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>
										
	includes			  : manageLink_class.php
	==================================================*/	
	include("../class_file/manageUser_class.php");
	$obj				= new user;
	$strPath 			= $obj->webpath();
	$glId				= $_REQUEST['GL'];
	$plId				= $_REQUEST['PL'];
	//======================= Pagination ===========================*/
	$isPaging	= 0;
	$pgFlag		= 0;
	$intPgno	= 1;
	$intRecno	= 0;
	if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
		$isPaging=1;
	if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
	{
		$intPgno=$_REQUEST['hdn_PageNo'];
		$pgFlag	= 1;
	}
	if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
	{	
		$intRecno=$_REQUEST['hdn_RecNo'];
		$pgFlag	= 1;
	}
	if(isset($_REQUEST['RC'])&& $pgFlag==0)			
		$intRecno=$_REQUEST['RC'];	
	if(isset($_REQUEST['PG']) && $pgFlag==0)
		$intPgno=$_REQUEST['PG'];
	
	if(isset($_REQUEST['selStatus']))
		$status	=	$_REQUEST['selStatus'];
	else if($_SESSION['pgArray']['status']!='' && $_REQUEST['RC']!='')
		$status	= $_SESSION['pgArray']['status'];
	else
		$status	=0;
		
	if(isset($_REQUEST['selLocation']))
		$locId	=	$_REQUEST['selLocation'];
	else if($_SESSION['pgArray']['location']!='' && $_REQUEST['RC']!='')
		$locId	= $_SESSION['pgArray']['location'];
	else
		$locId	=0;
	//============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs']))
	{
		$qs		= $_REQUEST['hdn_qs'];
		$ids	= $_REQUEST['hdn_ids'];
		
		$outMsg	= $obj->deleteLocation($qs,$ids);
	}
	//============= Search =======================
	if(isset($_REQUEST['btnSearch']))
	{
		$intPgno=1;
		$intRecno=0;	
		$pgArr	= array('location'=>$locId);
		$_SESSION['pgArray']=$pgArr;
	}
	//================ view records =================
	if($isPaging==0)
	 {
		$result		= $obj->manageLocation('PG', $intRecno,'0','', '', '0','0');		
	 }
	  //($action, $locationId, $countryId, $locationName, $timeZone, $description, $updatedBy)
	else
	 {
		$intPgno=1;
		$intRecno=0;
		$result		= $obj->manageLocation('V', $intRecno,'0','', '', '0','0');
	 }
	   $intTotalRec	= $obj->NumRow($obj->manageLocation('V', $intRecno,'0','', '', '0','0'));
	   $intCurrPage	= $intPgno;
	   $intPgSize	= 20;
	 //==== Fill location dropdown =======
	 $fillLoc	= $obj->fillLocation($locId);
	
?>
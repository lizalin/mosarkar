<?php
/* ================================================
	File Name         	  : viewGLInner.php
	Description			  : This page is used to View the Global Links.	
	Created By			  :	Sunil Kumar Parida
    Created On			  :	12th-Sept-2013
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>
										
	includes			  : manageLink_class.php
	==================================================*/	
	require("../class_file/manageLink_class.php");
	$obj		= new linkClass;
	$strPath 	= $obj->webpath();
	$glId		= $_REQUEST['GL'];
	$plId		= $_REQUEST['PL'];
	 
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
		
	//======================= Get Values of Search Controls ===========================*/		
	if(isset($_REQUEST['selStatus']))
		$status	=	$_REQUEST['selStatus'];
	else if($_SESSION['pgArray']['status']!='' && $_REQUEST['RC']!='')
		$status	= $_SESSION['pgArray']['status'];
	else
		$status	=0;
		
	$searchPannelFlag	= ($status!='0')?'S':'';
	
	//============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs']))
	{
		$qs		= $_REQUEST['hdn_qs'];
		$ids	= $_REQUEST['hdn_ids'];
		$outMsg	= $obj->deleteActiveGL($qs,$ids);
	}
	
	//============= Search =======================
	if($status==0)
		unset($_SESSION['pgArray']);
	if(isset($_REQUEST['btnSearch']))
	{
		$intPgno=1;
		$intRecno=0;	
		$pgArr	= array('status'=>$status);
		$_SESSION['pgArray']=$pgArr;
	}
	
	//================ view records =================
	if($isPaging==0)
	 {
		$result		= $obj->manageGL('PG', $intRecno, '', '', '0', '0', $status, '0');
	 }
	  
	else
	 {
		$intPgno=1;
		$intRecno=0;
		$result		= $obj->manageGL('v', 0, '', '',  '0', '0',  $status, 0);
	 }
	   $intTotalRec	= $obj->NumRow($obj->manageGL('v', 0, '', '',  '0', '0', $status, 0));
	   $intCurrPage	= $intPgno;
	   $intPgSize	= 20;
	   $totalResult	= $obj->manageGL('CD', 0, '', '',  '0', '0', 0, 0);
	   $totalRows	= mysqli_fetch_array($totalResult);
	   $totalMenuCtr= $totalRows[0];
?>
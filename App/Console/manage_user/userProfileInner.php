<?php
	/* ================================================
	File Name         	: UserProfileInner.php
	Description			: This page is used to view Ex Employee Profile.	
	Developer Name      : Sunil Kumar Parida
	Date Created		: 07-Oct-2013	
	Update History		:
							<Updated by>		<Updated On>		<Remarks>
							
	includes			 :  ManageUser_class_inc
	Functions Used		: webPath()
	==================================================*/
	include("../class_file/manageUser_class.php");
	$obj			= new user;
	$strPath 		= $obj->webpath();
	$glId			= $_REQUEST['GL'];
	$plId			= $_REQUEST['PL'];
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
	
	//=========== Search Criteria =================
	if(isset($_REQUEST['hdnNo']))
		$hierarchyId	=	$_REQUEST['hdnNo'];
	else
		$hierarchyId	=0;
	
	if(isset($_REQUEST['selGroup']))
		$group	=	$_REQUEST['selGroup'];
	else if($_SESSION['pgArray']['group']!='' && $_REQUEST['RC']!='')
		$group	= $_SESSION['pgArray']['group'];
	else
		$group	='0';
		
	if(isset($_REQUEST['txtName']))
		$fullName	=	$_REQUEST['txtName'];	
	else
		$fullName	='';
		
	$searchPannelFlag	= ($hierarchyId!='0' || $fullName!='' || $group!='0')?'S':'';	
	
	//============= Delete user =================
	if(isset($_REQUEST['hdn_qs']))
	{
		$qs		= $_REQUEST['hdn_qs'];
		$ids	= $_REQUEST['hdn_ids'];
		
		$outMsg	= $obj->userAction($qs,$ids);
	}	
	
	//================ view records =================
	if($isPaging==0)
	 {
		$result		= $obj->manageUser('PG', $intRecno, $fullName, '0', '0000-00-00', '', '', '', '', '', '', '', '', $hierarchyId, '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0',  '0', '2',$group);		
	 }
	else
	 {
		$intPgno=1;
		$intRecno=0;
		$result		= $obj->manageUser('V', '0', $fullName, '0', '0000-00-00', '', '', '', '', '', '', '', '', $hierarchyId, '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0',  '0', '2',$group);
	 }
	   $intTotalRec	= $obj->NumRow($obj->manageUser('V', '0', $fullName, '0', '0000-00-00', '', '', '', '', '', '', '', '', $hierarchyId, '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0',  '0', '2',$group));
	   $intCurrPage	= $intPgno;
	   $intPgSize	= 20;
?>
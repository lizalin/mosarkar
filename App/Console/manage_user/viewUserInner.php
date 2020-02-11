<?php
	/* ================================================
	File Name         	: addUserInner.php
	Description			: This page is used to Add User Profile.	
	Developer Name      : Rasmi Ranjan Swain
	Date Created		: 21-sept-2013	
	Update History		: <Updated by>		<Updated On>		<Remarks>
	Rasmi Ranjan Swain		05/Nov/2013		groupId Added						
	includes			:  ManageUser_class_inc
	Functions Used		: webPath()
	==================================================*/
	include("../class_file/manageUser_class.php");
	$obj			= new user;
	$strPath 		= $obj->webpath();
	$glId			= $_REQUEST['GL'];
	$plId			= $_REQUEST['PL'];
	$searchFlag		= 0;
	$gradeTable		= $obj->NumRow($obj->ExecuteQuery("SHOW TABLES LIKE 'm_admin_grade_master'"));
	$groupTable		= $obj->NumRow($obj->ExecuteQuery("SHOW TABLES LIKE 'm_admin_group_master'"));
	
	$xmlMobNo				= 1;
	$xmlEmail				= 1;
	$xmlLogin				= 1;
	$xmlLocation			= 1;
	$xmlPhoto				= 1;
	//============ Get customize form controls from xml file================
	if(file_exists("../xml/userControls.xml"))
	{
		$xml = file_get_contents ("../xml/userControls.xml");
		$xml_nodes 				= new SimpleXMLElement($xml);		
		$xmlMobNo				= $xml_nodes->xpath('//USER_CONTROLS/MOB_NO');
		$xmlEmail				= $xml_nodes->xpath('//USER_CONTROLS/EMAIL');		
		$xmlLogin				= $xml_nodes->xpath('//USER_CONTROLS/LOGIN');	
		$xmlLocation			= $xml_nodes->xpath('//USER_CONTROLS/LOCATION');
		$xmlPhoto				= $xml_nodes->xpath('//USER_CONTROLS/PHOTO');	
		$xmlMobNo				= $xmlMobNo[0];
		$xmlEmail				= $xmlEmail[0];		
		$xmlLogin				= $xmlLogin[0];
		$xmlLocation			= $xmlLocation[0];
		$xmlPhoto				= $xmlPhoto[0];
	}
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
	
	//=========== Search Criteria =================
	if(isset($_REQUEST['hdnNo']))
		$hierarchyId	=	$_REQUEST['hdnNo'];
	else if($_SESSION['pgArray']['HID']!='' && $_REQUEST['RC']!='')
		$hierarchyId	= $_SESSION['pgArray']['HID'];
	else
		$hierarchyId	=0;
		
	if(isset($_REQUEST['selStatus']))
		$status	=	$_REQUEST['selStatus'];
	else if($_SESSION['pgArray']['status']!='' && $_REQUEST['RC']!='')
		$status	= $_SESSION['pgArray']['status'];
	else
		$status	='0';
		
	if(isset($_REQUEST['selGroup']))
		$group	=	$_REQUEST['selGroup'];
	else if($_SESSION['pgArray']['group']!='' && $_REQUEST['RC']!='')
		$group	= $_SESSION['pgArray']['group'];
	else
		$group	='0';
		
	if(isset($_REQUEST['txtName']))
		$fullName	=	$_REQUEST['txtName'];
	else if($_SESSION['pgArray']['userName']!='' && $_REQUEST['RC']!='')
		$fullName	= $_SESSION['pgArray']['userName'];
	else
		$fullName	='';	
	
	$searchPannelFlag	= ($hierarchyId!='0' || $status!='0' || $group!='0' || $fullName!='')?'S':'';	
	
	//============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs']))
	{
		$qs		= $_REQUEST['hdn_qs'];
		$ids	= $_REQUEST['hdn_ids'];
		
		$outMsg	= $obj->userAction($qs,$ids);
		if($qs=='UG')
		$outMsg	= $obj->updateUserGroup($qs,$ids);
	}
	//============= Search =======================
	if($hierarchyId==0)
		unset($_SESSION['pgArray']['HID']);
	else
		$searchFlag	= 1;
	if($fullName=='')
		unset($_SESSION['pgArray']['userName']);
	else
		$searchFlag	= 1;
	if($status=='0')
		unset($_SESSION['pgArray']['status']);
	else
		$searchFlag	= 1;
	if($group=='0')
		unset($_SESSION['pgArray']['group']);
	else
		$searchFlag	= 1;
			
	if(isset($_REQUEST['btnSearch']))
	{
		$intPgno=1;
		$intRecno=0;			
		$pgArr	= array('HID'=>$hierarchyId,'userName'=>$fullName,'status'=>$status,'group'=>$group);
		$_SESSION['pgArray']=$pgArr;
	}
	//================ view records =================
	if($isPaging==0)
	 {
		$result		= $obj->manageUser('PG', $intRecno, $fullName, '0', '0000-00-00', '', '', $shrtName, '', '', '', '', '', $hierarchyId, '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', $status, '0', '0', '0', '0', '0', '0',  '0', '1',$group);		
	 //print_($result);
         
         }
	else
	 {
		$intPgno=1;
		$intRecno=0;
		$result		= $obj->manageUser('V', '0', $fullName, '0', '0000-00-00', '', '', '', '', '', '', '', '', $hierarchyId, '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', $status, '0', '0', '0', '0', '0', '0',  '0', '1',$group);
	 }
	   $intTotalRec	= $obj->NumRow($obj->manageUser('V', '0', $fullName, '0', '0000-00-00', '', '', '', '', '', '', '', '', $hierarchyId, '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', $status, '0', '0', '0', '0', '0', '0',  '0', '1',$group));
	   $intCurrPage	= $intPgno;
	   $intPgSize	= 20;
	   $totalRecordResult	= $obj->manageUser('CT', '0', '', '0', '0000-00-00', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0',  '0', '1',0,'');
	   $totalRecordRow		= mysqli_fetch_array($totalRecordResult);
	   $totalRecord			= $totalRecordRow[0];
?>
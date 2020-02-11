<?php
	/* ================================================
	File Name         	  : viewGroupInner.php
	Description			  : This page is used to View the Group.	
	Created By			  :	Rasmi Ranjan Swain
    Created On			  :	5th-Nov-2013
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>
										
	includes			  : manageUser_class.php
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
	//============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs']))
	{  
		$qs		= $_REQUEST['hdn_qs'];
		$ids	= $_REQUEST['hdn_ids'];
		
		$outMsg	= $obj->groupAction($qs,$ids);
	}
	//============ Update values ===================
	
	 if(isset($_REQUEST['hdnAction']) && $_REQUEST['hdnAction']=='U')
	 {
	 	$strId	= $_REQUEST['hdnId'];
	 	$outMsg	= $obj->updateGroup($strId);		
	 }
	//================ view records =================
	if($isPaging==0)
	 {
		$result		= $obj->manageGroup('PG',$intRecno,'','','','0','0');		
	 }
	  
	else
	 {
		$intPgno=1;
		$intRecno=0;
		$result		= $obj->manageGroup('V',0,'','','','0','0');
	 }
	  $intTotalRec	= mysqli_num_rows($obj->manageGroup('V',0,'','','', '0','0'));
	  $intCurrPage	= $intPgno;
	   $intPgSize	= 20;
	  
	 
?>
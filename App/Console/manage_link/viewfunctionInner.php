<?php
	/*============================================================
	Page Name		:	viewfunctionInner.php
	Description		:	This page used to view function master
	Created By		:	Sunil Kumar Parida
	Created On		:	11-Sept-2013
	Update History	:
	<Updated by>		<Updated On>		<Remarks>
	
	
	Functions Used	:	connectToDatabase();closeConnection();
	==============================================================*/
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
        $prevSessionId                  = htmlspecialchars($_POST['hdnPrevSessionId'],ENT_QUOTES);
        $session_id                     = session_id();
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
		
	$searchPannelFlag	= ($status!='0')?'S':'';	
	if($status	== 0)
		unset($_SESSION['pgArray']);
        
	//============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs']))
	{
              if($session_id==$prevSessionId){
		$qs     = $_REQUEST['hdn_qs'];
		$ids	= $_REQUEST['hdn_ids'];
		$outMsg	= $obj->deleteActive($qs,$ids);
                }else{
                   //echo "<script>window.location.href='".APP_PATH."/sessionOut'</script>";
             }
	}
	//============= Search =======================
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
		$result		= $obj->manageFunction('PG', $intRecno, '', '', '', '', '', '', 0, 0, '', $status, 0);
	 }
	  
	else
	 {
		$intPgno=1;
		$intRecno=0;
		$result		= $obj->manageFunction('v', 0, '', '', '', '', '', '', 0, 0, '', $status, 0);
	 }
	   $intTotalRec	= $obj->NumRow($obj->manageFunction('v', 0, '', '', '', '', '', '', 0, 0, '', $status, 0));
	   $intCurrPage	= $intPgno;
	   $intPgSize	= 20;
?>
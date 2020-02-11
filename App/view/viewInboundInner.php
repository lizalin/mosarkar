<?php 
    /* ================================================
    File Name       : viewServiceInner.php
    Description		: This page is used to view Service Details.
    Author Name		: Puja Kumari
    Date Created	: 23-09-2019
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsNews
    Functions Used	: manageNews(),
    ==================================================*/
    include_once(CLASS_PATH."clsInBound.php");
    $obj             = new clsInBound;
    $isPaging           = 0;
    $pgFlag	            = 0;
    $intPgno	        = 1;
    $intRecno	        = 0;
    $ctr	            = 0;
    //======================= Permission ===========================*/
    $glId               = $_REQUEST['GL'];
    $plId               = $_REQUEST['PL'];
    $pageName           = $_REQUEST['PAGE'].'.php';
    $userId             = $_SESSION['adminConsole_userID'];
    $explPriv           = $obj->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
    $editPriv           = $explPriv['edit'];
    $noView             = $explPriv['View'];
    $noAdd              = $explPriv['add'];
    $noManage           = $explPriv['Manage'];
    $deletePriv        = $explPriv['delete'];
    $noActive           = $explPriv['active'];
    $noPublish          = $explPriv['publish'];
    $viewOwnRec         = $explPriv['viewOwnRec'];
    $TodayYesterdayAll = date('Y-m-d');
// print_r($_SESSION['TodayYesterdayAll']);exit;
    //======================= Pagination ===========================*/
	
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
	if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
	{
		$intRecno	= (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
		$intPgno	= (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
	}
	else	
		unset($_SESSION['paging']);
     $vchDepartmentId = ($_POST['vchDepartmentId']>0)?$_POST['vchDepartmentId']:0;
     $vchServiceName  = ($_POST['vchServiceName']!='')?$_POST['vchServiceName']:'';
     if($_SESSION['TodayYesterdayAll']==2){
        $TodayYesterdayAll = date('Y-m-d',strtotime('now -1 day'));
        $vchFromDate = $TodayYesterdayAll;
        $vchToDate  = $TodayYesterdayAll;
    }else if($_SESSION['TodayYesterdayAll']==3){
        $TodayYesterdayAll ='';
        $vchFromDate = ($_POST['vchFromDate']  !='')? date('Y-m-d',strtotime($_POST['vchFromDate'])):$TodayYesterdayAll;
        $vchToDate  = ($_POST['vchToDate']!='')? date('Y-m-d',strtotime($_POST['vchToDate'])):$TodayYesterdayAll;

    }else{
        $TodayYesterdayAll = date('Y-m-d');
        $vchFromDate = $TodayYesterdayAll;
        $vchToDate  = $TodayYesterdayAll;

    }
     // $vchFromDate = ($_POST['vchFromDate']  !='')? date('Y-m-d',strtotime($_POST['vchFromDate'])):$TodayYesterdayAll;
     // $vchToDate  = ($_POST['vchToDate']!='')? date('Y-m-d',strtotime($_POST['vchToDate'])):$TodayYesterdayAll;

     $openFlag   = (($vchFromDate>0)|| ($vchToDate!=''))? 'S' :'';
     //============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
        { 
            $qs = $_REQUEST['hdn_qs'];
            $ids    = $_REQUEST['hdn_ids'];
           // print_r($_REQUEST['hdn_ids']);exit;
            $outMsg = $obj->deleteService($qs,$ids);
        }  
    if($isPaging==0){
        // echo $intPgno; exit;
         $result                 = $obj->viewInBound('PG',$intRecno,0,$vchFromDate,$vchToDate);
    }else{
        $intPgno    = 1;
        $intRecno   = 0;
        $result                 = $obj->viewInBound('V',$intRecno,0,$vchFromDate,$vchToDate);
    }
   $totalResult                 = $obj->viewInBound('V',$intRecno,0,$vchFromDate,$vchToDate);
   $intTotalRec                 = $totalResult->num_rows; 
   $intCurrPage                 = $intPgno;
   $intPgSize                   = 10;
   $_SESSION['paging']['recNo'] = $intRecno;
   $_SESSION['paging']['pageNo']= $intPgno;
   $totalAllResult             = $obj->getAllInBound('GTYA');
  // print_r($totalAllResult ); exit;
        
        
    
?>
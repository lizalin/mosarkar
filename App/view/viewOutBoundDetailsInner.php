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
    include_once(CLASS_PATH."clsOutboundMis.php");
    $obj             = new clsOutboundMis;
    $isPaging           = 0;
    $pgFlag	            = 0;
    $intPgno	        = 1;
    $intRecno	        = 0;
    $ctr	            = 0;
    //======================= Permission ===========================*/
    $decparams              = $obj->decrypt($_REQUEST['ID']);
    $jsonDecrypt = json_decode($decparams);
    $arrDecrypt  = (array)$jsonDecrypt;

    $glId               = $_REQUEST['GL'];
    $plId               = $_REQUEST['PL'];
    $pageName           = $_REQUEST['PAGE'].'.php';
    $userId             = $_SESSION['adminConsole_userID'];
    $explPriv           = $obj->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
    $editPriv           = $explPriv['edit'];
    $noView             = $explPriv['View'];
    $noAdd              = $explPriv['add'];
    $noManage           = $explPriv['Manage'];
    $deletePriv         = $explPriv['delete'];
    $noActive           = $explPriv['active'];
    $noPublish          = $explPriv['publish'];
    $viewOwnRec         = $explPriv['viewOwnRec'];
    $dataArr            = array();
    $intDesignationId   = $arrDecrypt['intDesignationId'];
    $intUserId          = $arrDecrypt['intUserId'];
    $status             = $arrDecrypt['status'];
    $vchFromDate           = $arrDecrypt['strFromDate'];
    $vchToDate             = $arrDecrypt['strToDate'];
    // print_r($status);exit;
    //print_r($arrDecrypt);exit;
    // $vchFromDate        = '2019-09-01';
    // $vchToDate          = '2019-09-27';
//print_r($deletePriv);exit;
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
	     $vchDepartmentId = ($_POST['vchDepartmentId']>0 && $_POST['search']=='search')?$_POST['vchDepartmentId']:0;
	     $intServiceId    = ($_POST['intServicesId']!='' && $_POST['search']=='search')?$_POST['intServicesId']:0;
	     $intDistrictId   = ($_POST['intDistrictId'])?$_POST['intDistrictId']:0;
	     $intUserId       = ($_POST['intRequestedBy']!='')?$_POST['intRequestedBy']:$intUserId;
	     $vchMobile       = ($_POST['vchMobile']!='')?$_POST['vchMobile']:'';
	     $status          = ($_POST['intCallStatus']!='')?$_POST['intCallStatus']:$status; 
	
	     $vchFromDate = ($_POST['vchFromDate']  !='' && $_POST['search']=='search')? date('Y-m-d',strtotime($_POST['vchFromDate'])):$vchFromDate;
	     $vchToDate  = ($_POST['vchToDate']!='' && $_POST['search']=='search')? date('Y-m-d',strtotime($_POST['vchToDate'])):$vchToDate;
	 
	     $openFlag   = (($vchDepartmentId>0)|| ($vchServiceName!='') || !empty($vchFromDate) || !empty($vchToDate))? 'S' :'';
	     // print_r($vchFromDate);exit;
     //============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
        { 
            $qs = $_REQUEST['hdn_qs'];
            $ids    = $_REQUEST['hdn_ids'];
           // print_r($_REQUEST['hdn_ids']);exit;
            $outMsg = $obj->deleteService($qs,$ids);
        }  
    if($isPaging==0){
        //if($type==1){ $action='PG'; } elseif ($type==2) { $action='PGI'; } else { $action='PGF'; }
        $action                             = 'VODP'; 
        $dataArr['intPgSize']               = 50;
        $dataArr['intDesignationId']        = $intDesignationId;
        $dataArr['vchDepartmentId']         = $vchDepartmentId;
        $dataArr['intServiceId']            = $intServiceId;
        $dataArr['intDistrictId']           = $intDistrictId;
        $dataArr['vchMobile']               = $vchMobile;
        $dataArr['from_date']               = $vchFromDate;
        $dataArr['to_date']                 = $vchToDate;
        $dataArr['intRequestedById']        = $intUserId;
        $dataArr['intFeedbackStatus']       = $status;
        $dataArr['intRecno']                = $intRecno;
        // print_r($dataArr);exit;

        // echo $intPgno; exit;
         $result                 = $obj->viewOutboundMis($action, $dataArr);
    }else{
        //if($type==1){ $action='V'; } elseif ($type==2) { $action='VI'; } else { $action='VF'; }
        $action                             = 'VODP';
        $dataArr['intPgSize']               = 0;
        $dataArr['intDesignationId']        = $intDesignationId;
        $dataArr['vchDepartmentId']         = $vchDepartmentId;
        $dataArr['intServiceId']            = $intServiceId;
        $dataArr['intDistrictId']           = $intDistrictId;
        $dataArr['vchMobile']               = $vchMobile;
        $dataArr['from_date']      			= $vchFromDate;
        $dataArr['to_date']        			= $vchToDate;
        $dataArr['intRequestedById']        = $intUserId;
        $dataArr['intFeedbackStatus']       = $status;
        $dataArr['intPgno']                 = 1;
        $dataArr['intRecno']                = 0;
        $result                             = $obj->viewOutboundMis($action, $dataArr);
    }
    //if($type==1){ $action='V'; } elseif ($type==2) { $action='VI'; } else { $action='VF'; }
        $action                             = 'VODP';
        $dataArr['intPgSize']               = 0;
        $dataArr['intDesignationId']  		= $intDesignationId;
        $dataArr['vchDepartmentId']         = $vchDepartmentId;
        $dataArr['intServiceId']            = $intServiceId;
        $dataArr['intDistrictId']           = $intDistrictId;
        $dataArr['vchMobile']               = $vchMobile;
        $dataArr['from_date']               = $vchFromDate;
        $dataArr['to_date']                 = $vchToDate;
        $dataArr['intRequestedById']        = $intUserId;
        $dataArr['intFeedbackStatus']       = $status;
        $totalResult                        = $obj->viewOutboundMis($action, $dataArr);
        $intTotalRec                        = $totalResult->num_rows; 
        $intCurrPage                        = $intPgno;
        $intPgSize                          = 50;
        $_SESSION['paging']['recNo']        = $intRecno;
        $_SESSION['paging']['pageNo']       = $intPgno;
  
        // echo $status;exit;
        
    
?>
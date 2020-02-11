<?php 
    /* ================================================
    File Name       : authorityFeedbackReportInner.php
    Description     : This is used for view authority feedback report.
    Author Name     : Niranjan Kumar Pandit
    Date Created    : 08-10-2019
    Update History  :
    <Updated by>        <Updated On>        <Remarks>

    Class Used      : clsMISReport
    =================*/
    include_once(CLASS_PATH."clsMISReport.php");
    $obj             = new clsMISReport;
    $isPaging           = 0;
    $pgFlag             = 0;
    $intPgno            = 1;
    $intRecno           = 0;
    $ctr                = 0;
    //======================= Permission ===========================*/
    $glId               = ($_SESSION['sessGLVal'])?$_SESSION['sessGLVal']:(($_REQUEST['GL'])?$_REQUEST['GL']:0);
    $plId               = ($_SESSION['sessPLVal'])?$_SESSION['sessPLVal']:(($_REQUEST['PL'])?$_REQUEST['PL']:0);
    $pageName           = $_REQUEST['PG'];
    $userId             = $_SESSION['adminConsole_userID'];
    $explPriv           = $obj->checkPrivilege($userId, $glId, $plId, '', $pageName);
    $perManage          = $explPriv['Manage'];
    $perView            = $explPriv['View'];
    $perAdd             = $explPriv['add'];
    $perEdit            = $explPriv['edit'];
    $perDelete          = $explPriv['delete'];

    
    $dataArr            = array();
    $totalCallAttempt   =0;
    $totalNotUpdated    =0;
    $totalNotReachable  =0;
    $totalInvalid       =0;
    $totalNotPicked     =0;
    $totalNotWanted     =0;
    $totalDND           =0;
    $totalCallLatter    =0;
    $totalCallCompleted =0;
    
//print_r($deletePriv);exit;
    //======================= Pagination ===========================*/
    
    if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
        $isPaging=1;
    if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
    {
        $intPgno=$_REQUEST['hdn_PageNo'];
        $pgFlag = 1;
    }
    if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
    {   
        $intRecno=$_REQUEST['hdn_RecNo'];
        $pgFlag = 1;
    } 
    if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' )
    {
        $intRecno   = (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
        $intPgno    = (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;     
    }
    else    
        unset($_SESSION['paging']);

     $intDistrictId       = ($_POST['intDistrictId']>0)?$_POST['intDistrictId']:0;
     $intRequestedBy       = ($_POST['intRequestedBy']>0)?$_POST['intRequestedBy']:0;
     $strFromDate         = (isset($_REQUEST['vchFromDate'])&& strtotime($_REQUEST['vchFromDate'])>0)?date('Y-m-d',strtotime($_REQUEST['vchFromDate'])):date('Y-m-01');
     $strToDate           = (isset($_REQUEST['vchToDate'])&& strtotime($_REQUEST['vchToDate'])>0)?date('Y-m-d',strtotime($_REQUEST['vchToDate'])):date('Y-m-d');
     $userId              = $_SESSION['adminConsole_userID'];
     


     $dataArr['intRecno']    = $intRecno;
     $dataArr['intAuthId']    = $userId;
     $dataArr['from_date']   = $strFromDate;
     $dataArr['to_date']     = $strToDate;
     $dataArr['intDistrictId']     = $intDistrictId;
     $dataArr['intRequestedBy']     = $intRequestedBy;

    $errvchFromDate     = Model::isSpclChar($_REQUEST['vchFromDate']);
    $errvchToDate       = Model::isSpclChar($_REQUEST['vchToDate']);
    $errintRecno        = Model::isSpclChar($_REQUEST['hdn_RecNo']);
    if($errvchFromDate > 0 || $errvchToDate > 0 || $errintRecno > 0){
        $errFlag = 1;
        $outMsg  = 'Special Characters are not allowed';
        $dataArr['from_date']   = date('Y-m-01');
        $dataArr['to_date']     = date('Y-m-d');
        $dataArr['intRecno']    = 0;
    }


     if( $_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==MINISTER_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==DG_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==DG_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==SC_DESIGNATION){

     $dataArr['intUserId']      = $userId;
     $dataArr['intFeedbackCollectedBy']      = 3;
     }elseif($_SESSION['adminConsole_Privilege']==0 ){
      //
     }else{
        $dataArr['intFeedbackCollectedBy']      = 2;
     }
     
    

    $result        = $obj->viewMISReport('VOAR',$dataArr);
    
        
    
?>
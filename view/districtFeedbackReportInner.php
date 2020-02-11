<?php 
    /* ================================================
    File Name       : authorityFeedbackReportInner.php
    Description     : This is used for view authority feedback report.
    Author Name     : Niranjan Kumar Pandit
    Date Created    : 08-10-2019
    Update History  :
    <Updated by>        <Updated On>        <Remarks>

    Class Used      : clsOutboundMis
    =================*/
    include_once(CLASS_PATH."clsOutboundMis.php");
    $obj             = new clsOutboundMis;
    $isPaging           = 0;
    $pgFlag             = 0;
    $intPgno            = 1;
    $intRecno           = 0;
    $ctr                = 0;
    //======================= Permission ===========================*/
    $glId               = $_REQUEST['GL'];
    $plId               = $_REQUEST['PL'];
    $pageName           = $_REQUEST['PAGE'].'.php';
    $userId             = $_SESSION['adminConsole_userID'];
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

    $vchDepartment = ($_SESSION['adminConsole_DeptId'] == 14)?14:(($_SESSION['adminConsole_DeptId'] == 12)?12:0);
    
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
     $intDepartmentId     = ($_POST['intDepartmentId']>0)?$_POST['intDepartmentId']:($vchDepartment)?$vchDepartment:14;
     $vchScoring          = ($_POST['vchScoring']>0)?$_POST['vchScoring']:0;
     $strFromDate         = (isset($_REQUEST['vchFromDate'])&& strtotime($_REQUEST['vchFromDate'])>0)?date('Y-m-d',strtotime($_REQUEST['vchFromDate'])):'';
     $strToDate           = (isset($_REQUEST['vchToDate'])&& strtotime($_REQUEST['vchToDate'])>0)?date('Y-m-d',strtotime($_REQUEST['vchToDate'])):'';
     $userId              = $_SESSION['adminConsole_userID'];
     


     $dataArr['from_date']   = $strFromDate;
     $dataArr['to_date']     = $strToDate;
     $dataArr['intDistrictId']     = $intDistrictId;
     $dataArr['intDepartmentId']     = $intDepartmentId;
     $dataArr['vchScoring']     = $vchScoring;
     if( $_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==MINISTER_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==DG_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==DG_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==SC_DESIGNATION){

     $dataArr['intUserId']      = $userId;
     $dataArr['intFeedbackCollectedBy']      = 3;
     }elseif($_SESSION['adminConsole_Privilege']==0 ){
      //
     }else{
        $dataArr['intFeedbackCollectedBy']      = 2;
     }
     
     
    // print"<pre>";
    // print_r($dataArr);exit;
    $openFlag   = (($intDepartmentId>0)|| ($intDistrictId > 0) || ($vchScoring > 0))? 'S' :'';
    $result        = $obj->viewOutboundMis('DWR',$dataArr);
    // if($intDepartmentId == 12){
    //     $vchDept = 'Health & Family Welfare Department';
    // }else{
    //     $vchDept = 'Home Department';
    // }
    
        
    
?>
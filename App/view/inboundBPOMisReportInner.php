<?php 
    /* ================================================
    File Name       : viewServiceInner.php
    Description     : This page is used to view Service Details.
    Author Name     : Puja Kumari
    Date Created    : 23-09-2019
    Update History  :
    <Updated by>        <Updated On>        <Remarks>

    Class Used      : clsNews
    Functions Used  : manageNews(),
    ==================================================*/
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
     $strFromDate         = (isset($_REQUEST['vchFromDate'])&& strtotime($_REQUEST['vchFromDate'])>0)?date('Y-m-d',strtotime($_REQUEST['vchFromDate'])):'';
     $strToDate           = (isset($_REQUEST['vchToDate'])&& strtotime($_REQUEST['vchToDate'])>0)?date('Y-m-d',strtotime($_REQUEST['vchToDate'])):'';
     $userId              = $_SESSION['adminConsole_userID'];
     

     $dataArr['intRecno']    = $intRecno;
     $dataArr['intAuthId']    = $userId;
     $dataArr['from_date']   = $strFromDate;
     $dataArr['to_date']     = $strToDate;
     $dataArr['intDistrictId']     = $intDistrictId;
     $dataArr['intRequestedBy']     = $intRequestedBy;
     if( $_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==MINISTER_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==DG_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==DG_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==SC_DESIGNATION){

     $dataArr['intUserId']      = $userId;
     $dataArr['intFeedbackCollectedBy']      = 3;
     }elseif($_SESSION['adminConsole_Privilege']==0 ){
      //
     }else{
        $dataArr['intFeedbackCollectedBy']      = 2;
     }
     
    
    if($isPaging==0){
        $result        = $obj->viewOutboundMis('VIBR',$dataArr);
    }     
    else
    {
        $intPgno    = 1;
        $intRecno   = 0;
        $result                 = $obj->viewOutboundMis('VIBR',$dataArr);
    }
        
    
?>
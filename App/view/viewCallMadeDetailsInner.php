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
    include_once('controller/clsService.php');
    $obj = new clsService;
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
    $explPriv           = $obj->checkPrivilege($userId, $glId, $plId, $pageName, 'A');

    if(!empty($_REQUEST['ID'])){
        $homeDecrpt = json_decode($obj->decrypt($_REQUEST['ID']),true);       
    }
    $intfeedbackCollectedBy   = !empty($homeDecrpt['intfeedbackCollectedBy'])?$homeDecrpt['intfeedbackCollectedBy']:0 ;
    $intCallThrough           = !empty($homeDecrpt['intCallThrough'])?$homeDecrpt['intCallThrough']:0 ;
    $AuthId                   = !empty($homeDecrpt['AuthId'])?$homeDecrpt['AuthId']:0 ;
    $fromDate                 =  !empty($homeDecrpt['fromDate'])?$homeDecrpt['fromDate']:'' ;
    $toDate                   =  !empty($homeDecrpt['toDate'])?$homeDecrpt['toDate']:'' ;
  // echo $firstday = date('Y-m-d', strtotime("sunday -1 week"));; exit;
  // print_r($homeDecrpt);exit;
  //print_r($_SESSION); exit;
 

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
    if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
    {
        $intRecno   = (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
        $intPgno    = (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;     
    }
    else  
      {            
            unset($_SESSION['paging']);            
     }
 
  


     $intServicesId       = (isset($_REQUEST['intServicesId']) && $_REQUEST['intServicesId'] != '')?htmlspecialchars($_REQUEST['intServicesId'],ENT_QUOTES):0;
     $intSchemeTypeId     = (isset($_REQUEST['intSchemeTypeId']) && $_REQUEST['intSchemeTypeId'] != '')?htmlspecialchars($_REQUEST['intSchemeTypeId'],ENT_QUOTES):0;
     $intDistrictId       = (isset($_REQUEST['intDistrictId']) && $_REQUEST['intDistrictId'] != '')? htmlspecialchars($_REQUEST['intDistrictId'],ENT_QUOTES):0;
     $vchFromDate         = ($_POST['vchFromDate']  !='')? date('Y-m-d',strtotime($_POST['vchFromDate'])):$fromDate;
     $vchToDate           = ($_POST['vchToDate']!='')? date('Y-m-d',strtotime($_POST['vchToDate'])):$toDate;


    // $openFlag   = (($vchNewDepartmentId>0)|| ($vchServiceName!='') || ($district!='') || ($intInstitutionId!='') || ($intCalledId!='')) ? 'S' :'';

    $dataArr['intServicesId']   = $intServicesId;
    $dataArr['intSchemeTypeId']    = $intSchemeTypeId;
    $dataArr['intDistrictId']    = $intDistrictId;
    $dataArr['from_date']   = $vchFromDate;
    $dataArr['to_date']     = $vchToDate;
    $dataArr['intRecno']    = $intRecno;
    $dataArr['intfeedbackCollectedBy']    = $intfeedbackCollectedBy;
    $dataArr['intCallThrough']    = $intCallThrough;
    $dataArr['AuthId']    = $AuthId;
//print_r($dataArr);exit;
                if($isPaging==0){
                $dataArr['intPgSize']     =20;
                $result		= $obj->viewService('PGCA',$dataArr);

                }else
                {
                $intPgno	= 1;
                $intRecno	= 0;
                $result                      = $obj->viewService('VCA',$dataArr);
                }
                $totalResult                 = $obj->viewService('CTCA',$dataArr); 

                $totalCount                  = $totalResult->fetch_array();
                $intTotalRec                 = $totalCount[0]; 
                $intCurrPage                 = $intPgno;
                $intPgSize                   = 20;
                $_SESSION['paging']['recNo'] = $intRecno;
                $_SESSION['paging']['pageNo']= $intPgno;
?>
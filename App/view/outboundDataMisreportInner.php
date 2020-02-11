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
     $strFromDate         = (isset($_REQUEST['vchFromDate'])&& strtotime($_REQUEST['vchFromDate'])>0)?date('Y-m-d',strtotime($_REQUEST['vchFromDate'])):'';
     $strToDate           = (isset($_REQUEST['vchToDate'])&& strtotime($_REQUEST['vchToDate'])>0)?date('Y-m-d',strtotime($_REQUEST['vchToDate'])):'';

     $dataArr['intRecno']    = $intRecno;
     $dataArr['from_date']   = $strFromDate;
     $dataArr['to_date']     = $strToDate;
     $dataArr['intDistrictId']     = $intDistrictId;
    
    if($isPaging==0){
             $result        = $obj->viewOutboundMis('PG',$dataArr);
        }     
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            $result                 = $obj->viewOutboundMis('V',$dataArr);
    }
       $totalResult                 = $obj->viewOutboundMis('V',$dataArr);
       $intTotalRec                 = $totalResult->num_rows;      
       
   
       if ($result->num_rows > 0) { 
        $cc=0;
            while($row=  $result->fetch_array()){
                $arrAllRecords[$cc]=$row;
                $cc++;
            }
       }
       
        $deptarr      = array(); 
        $servicearr      = array();        
        foreach($arrAllRecords as &$arrRecordss){ 
           $deptarr[] = $arrRecordss['intDepartmentId'];
           $servicearr[] = $arrRecordss['intServiceId'];                  
        }
       // print_r($deptarr); 

       $intCurrPage                 = $intPgno;
       $intPgSize                   = 5;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>
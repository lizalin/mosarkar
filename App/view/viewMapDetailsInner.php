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
    include_once('controller/classBind.php');
    $obj = new clsClassBind;
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
    // $editPriv           = $explPriv['edit'];
    // $noView             = $explPriv['View'];
    // $noAdd              = $explPriv['add'];
    // $noManage           = $explPriv['Manage'];
    // $deletePriv        = $explPriv['delete'];
    // $noActive           = $explPriv['active'];
    // $noPublish          = $explPriv['publish'];
    // $viewOwnRec         = $explPriv['viewOwnRec'];
// print"<pre>";

    if(!empty($_REQUEST['ID'])){
        $homeDecrpt = json_decode($obj->decrypt($_REQUEST['ID']),true);       
    }
  // print_r($homeDecrpt);exit;
   // print_r($homeDecrpt);exit;
    $dataArr            =array();
    $district               =  !empty($homeDecrpt['district_Id'])?$homeDecrpt['district_Id']:0 ;
    $callType               =  !empty($homeDecrpt['callType'])?$homeDecrpt['callType']:0 ;
    $outBoundId               =  !empty($homeDecrpt['outBoundId'])?$homeDecrpt['outBoundId']:0 ;
    $deptSel1               =  !empty($homeDecrpt['deptSel1'])?$homeDecrpt['deptSel1']:0 ;
    $fromDate               =  !empty($homeDecrpt['fromDate'])?$homeDecrpt['fromDate']:'' ;
    $toDate               =  !empty($homeDecrpt['toDate'])?$homeDecrpt['toDate']:'' ;
    $deptLogin               =  !empty($homeDecrpt['deptLogin'])?$homeDecrpt['deptLogin']:0 ;
    $deptFilter               =  !empty($homeDecrpt['deptFilter'])?$homeDecrpt['deptFilter']:0 ;
    $intCallThrough               =  !empty($homeDecrpt['intCallThrough'])?$homeDecrpt['intCallThrough']:0 ;
    $newdeptSel1 = !empty($homeDecrpt['newdeptSel1'])?$homeDecrpt['newdeptSel1']:0 ;
    $deptLogin  = ($_SESSION['adminConsole_Desg_Id']==0 ||$_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CMO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION)? 0:$_SESSION['adminConsole_DeptId'];
    #echo $deptLogin; exit;
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
        if(!empty($_POST['searchType']) && $_POST['searchType']=='search'){ 
            // echo 1; exit;
            unset($_SESSION['paging']);
            // $vchDepartmentId = ($_POST['intDepartmentId']>0)?$_POST['intDepartmentId']:$deptFilter;
             $intServiceId  = ($_POST['intServicesId']!='')?$_POST['intServicesId']:'';
             $district  = ($_POST['intDistrictId']!='')?$_POST['intDistrictId']:'';
             $intInstitutionId  = ($_POST['intInstitutionId']!='')?$_POST['intInstitutionId']:'';
             $intCalledId  = ($_POST['intCalledId']!='')?$_POST['intCalledId']:'';
             $vchDepartmentId = ($_POST['intDepartmentId']>0)?$_POST['intDepartmentId']:$deptFilter;
             $vchNewDepartmentId = $vchDepartmentId;
             $vchDepartmentId = $vchDepartmentId=='14545'?$deptLogin:$vchDepartmentId;
             $vchFromDate = ($_POST['vchFromDate']  !='')? date('Y-m-d',strtotime($_POST['vchFromDate'])):'';
             $vchToDate  = ($_POST['vchToDate']!='')? date('Y-m-d',strtotime($_POST['vchToDate'])):'';
     }
     // echo $vchDepartmentId; exit;
     $vchNewDepartmentId =!empty($vchNewDepartmentId)?$vchNewDepartmentId:$deptFilter;
     // echo $deptFilter; exit;
      
      //if()
      // echo $vchNewDepartmentId; exit;
     $openFlag   = (($vchNewDepartmentId>0)|| ($vchServiceName!='') || ($district!='') || ($intInstitutionId!='') || ($intCalledId!='')) ? 'S' :'';
     // echo $vchDepartmentId; exit;
     //============= Delete/Active/Inactive function =================
    // if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
    //     { 
    //         $qs = $_REQUEST['hdn_qs'];
    //         $ids    = $_REQUEST['hdn_ids'];
    //        // print_r($_REQUEST['hdn_ids']);exit;
    //         $outMsg = $obj->deleteService($qs,$ids);
    //     }  
    if($isPaging==0){
        // $action='PGM';
        if($callType==1){ $action='PGM'; } elseif ($callType==2) { $action='PGI'; } else { $action='PGM'; } 
        // echo $deptLogin; exit;
        if($deptLogin==0 && $vchNewDepartmentId=='14545'){
            $dataArr['deptFilter'] =0;
        }else{
            $vchNewdeptFilter = (!empty($deptFilter) && $deptFilter!='14545')?$deptFilter:$deptLogin;
            $dataArr['deptFilter']  = !empty($vchDepartmentId)?$vchDepartmentId:$vchNewdeptFilter;
        }
        // echo $vchNewDepartmentId; exit;
        $newdeptCC = (!empty($deptFilter) && $deptFilter=='14545')?$deptFilter:0;
        if($outBoundId=='2'){
            $dataArr['deptCC']  = '14545';
        }else{
            $dataArr['deptCC']  = !empty($vchNewDepartmentId)?$vchNewDepartmentId:$newdeptCC;
        }
        $dataArr['intServiceId']  = $intServiceId;
        $dataArr['intInstitutionId']  = $intInstitutionId;
        $dataArr['intCalledId']  = $intCalledId;
        $dataArr['intCallThrough']  = $intCallThrough;
        $dataArr['district_Id']  = !empty($district)?$district:$district;
        $dataArr['callType']               = $callType;
        $dataArr['outBoundId']     = $outBoundId;
        $dataArr['deptSel1']                   = $deptSel1;
       $dataArr['fromDate']                   = !empty($vchFromDate)?$vchFromDate:$fromDate;
        $dataArr['toDate']                   = !empty($vchToDate)?$vchToDate:$toDate;
        $dataArr['deptLogin']                   = $deptLogin;
        // $dataArr['deptFilter']                   = $deptFilter;
        $dataArr['newdeptSel1']                   = $newdeptSel1;
        $dataArr['intRecno']                   = $intRecno;
        // echo $intPgno; exit;
         $result                 = $obj->viewMapData($action, $dataArr);
    }else{
        // $action='VM';
       if($callType==1){ $action='VM'; } elseif ($callType==2) { $action='VI'; } else { $action='VM'; } 
        if($deptLogin==0 && $vchNewDepartmentId=='14545'){
            $dataArr['deptFilter'] =0;
        }else{
            $vchNewdeptFilter = (!empty($deptFilter) && $deptFilter!='14545')?$deptFilter:$deptLogin;
            $dataArr['deptFilter']  = !empty($vchDepartmentId)?$vchDepartmentId:$vchNewdeptFilter;
        }
         if($outBoundId=='2'){
            $dataArr['deptCC']  = '14545';
        }else{
            $dataArr['deptCC']  = !empty($vchNewDepartmentId)?$vchNewDepartmentId:$newdeptCC;
        }
        $dataArr['intServiceId']  = $intServiceId;
        $dataArr['intInstitutionId']  = $intInstitutionId;
        $dataArr['intCalledId']  = $intCalledId;
        $dataArr['intCallThrough']  = $intCallThrough;
        $dataArr['district_Id']  = !empty($district)?$district:$district;
        $dataArr['callType']               = $callType;
        $dataArr['outBoundId']     = $outBoundId;
        $dataArr['deptSel1']                   = $deptSel1;
        $dataArr['fromDate']                   = !empty($vchFromDate)?$vchFromDate:$fromDate;
        $dataArr['toDate']                   = !empty($vchToDate)?$vchToDate:$toDate;
        $dataArr['deptLogin']                   = $deptLogin;
        // $dataArr['deptFilter']                   = $deptFilter;
        $dataArr['newdeptSel1']                   = $newdeptSel1;
         $dataArr['intPgno']     = 1;
        $dataArr['intRecno']         = 0;
        $result                 = $obj->viewMapData($action, $dataArr);
    }
     #$action='VM';
     if($callType==1){ $action='VM'; } elseif ($callType==2) { $action='VI'; } else { $action='VM'; } 
         if($deptLogin==0 && $vchNewDepartmentId=='14545'){
            $dataArr['deptFilter'] =0;
        }else{
            $vchNewdeptFilter = (!empty($deptFilter) && $deptFilter!='14545')?$deptFilter:$deptLogin;
            $dataArr['deptFilter']  = !empty($vchDepartmentId)?$vchDepartmentId:$vchNewdeptFilter;
        }
         if($outBoundId=='2'){
            $dataArr['deptCC']  = '14545';
        }else{
            $dataArr['deptCC']  = !empty($vchNewDepartmentId)?$vchNewDepartmentId:$newdeptCC;
        }
        $dataArr['district_Id']  = !empty($district)?$district:$district;
        $dataArr['intServiceId']  = $intServiceId;
        $dataArr['intInstitutionId']  = $intInstitutionId;
        $dataArr['intCalledId']  = $intCalledId;
        $dataArr['intCallThrough']  = $intCallThrough;
        $dataArr['callType']               = $callType;
        $dataArr['outBoundId']     = $outBoundId;
        $dataArr['deptSel1']                   = $deptSel1;
        $dataArr['fromDate']                   = !empty($vchFromDate)?$vchFromDate:$fromDate;
        $dataArr['toDate']                   = !empty($vchToDate)?$vchToDate:$toDate;
        $dataArr['deptLogin']                   = $deptLogin;
        // $dataArr['deptFilter']                   = $deptFilter;
        $dataArr['newdeptSel1']                   = $newdeptSel1;
        $totalResult                 = $obj->viewMapData($action, $dataArr);
        $intTotalRec                 = $totalResult->num_rows; 
        $intCurrPage                 = $intPgno;
        $intPgSize                   = 50;
        $_SESSION['paging']['recNo'] = $intRecno;
        $_SESSION['paging']['pageNo']= $intPgno;
        $totalCalls=0;
        #print"<pre>";
        #echo $vchNewDepartmentId; exit;
        if ($totalResult->num_rows > 0) {   
             while ($row1 =$totalResult->fetch_array()) { 
                #print_r($row1);
                if($row1['totalCalls']>0  && $row1['vchType']=='Inbound' && $vchNewDepartmentId=='14545'){
                    $totalCalls++;
                }
             }
        }
        #print_r($totalResult); exit;
   // echo  $vchNewDepartmentId  ; exit;
        // echo  $vchDepartmentId ; exit;
        
    
?>
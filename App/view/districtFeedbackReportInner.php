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
    include_once(CLASS_PATH."clsMISReport.php");
    $obj             = new clsMISReport;
    $isPaging           = 0;
    $pgFlag             = 0;
    $intPgno            = 1;
    $intRecno           = 0;
    $ctr                = 0;
    $intHCMAuthority    = 1;
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

    if(!empty($_REQUEST['ID'])){
        $homeDecrpt = json_decode($obj->decrypt($_REQUEST['ID']),true);       
    }
    $district               =  (!empty($_SESSION['adminConsole_HierarchyId']) && $_SESSION['adminConsole_Privilege']==2)?$_SESSION['adminConsole_HierarchyId']:0;
    // $department             =  !empty($homeDecrpt['intDepartmentId'])?$homeDecrpt['intDepartmentId']:0 ;
    // if(empty($department)){
    //     $vchDepartment = ($_SESSION['adminConsole_DeptId'] == 14)?14:(($_SESSION['adminConsole_DeptId'] == 12)?12:0);
    // }


    //$intDistrictId              = ($_POST['intDistrictId']>0)?$_POST['intDistrictId']:$district;
   // $intHCMAuthority            = ($_POST['intHCMAuthority'])?$_POST['intHCMAuthority']:1;
    //$intAuthorityPermission     = ($userId == 1 || $userId == 200 || $userId == 270)?1:0;

    // if(!empty($department) && empty($_POST['intDepartmentId'])){
    //    $intDepartmentId         = $department;
    // }else{
    //    $newVchDepartment        = !empty($vchDepartment)?$vchDepartment:14;
    //    $intDepartmentId         = ($_POST['intDepartmentId']>0)?$_POST['intDepartmentId']:$newVchDepartment;
    // }
    $vchScoring                 = ($_POST['vchScoring']>0)?$_POST['vchScoring']:0;
    $intServiceId               = ($_POST['intServicesId']>0)?$_POST['intServicesId']:2;
    // $strFromDate                = (isset($_REQUEST['vchFromDate'])&& strtotime($_REQUEST['vchFromDate'])>0)?date('Y-m-d',strtotime($_REQUEST['vchFromDate'])):'';
    // $strToDate                  = (isset($_REQUEST['vchToDate'])&& strtotime($_REQUEST['vchToDate'])>0)?date('Y-m-d',strtotime($_REQUEST['vchToDate'])):'';
    $userId                     = $_SESSION['adminConsole_userID'];
     

    $dataArr['from_date']       = $strFromDate;
    $dataArr['to_date']         = $strToDate;
    $dataArr['intDistrictId']   = $intDistrictId;
   // $dataArr['intDepartmentId'] = $intDepartmentId;
    $dataArr['vchScoring']      = $vchScoring;
    $dataArr['intServiceId']    = $intServiceId;

    // $errvchFromDate     = Model::isSpclChar($_REQUEST['vchFromDate']);
    // $errvchToDate       = Model::isSpclChar($_REQUEST['vchToDate']);
    // $errintDepartment   = Model::isSpclChar($_POST['intDepartmentId']);
    // $errintScoring      = Model::isSpclChar($_POST['vchScoring']);
    // $errintDistrict     = Model::isSpclChar($_POST['intDistrictId']);
    
    //if($errvchFromDate > 0 || $errvchToDate > 0 || $errintDepartment > 0 || $errintScoring > 0 || $errintDistrict > 0){
        // $errFlag = 1;
        // $outMsg  = 'Special Characters are not allowed';
        // $dataArr['from_date']   = date('Y-m-01');
        // $dataArr['to_date']     = date('Y-m-d');
        // $dataArr['intDistrictId']   = $district;
        // $dataArr['intDepartmentId'] = $newVchDepartment;
        // $dataArr['vchScoring']      = 0;
    //}

     
    $openFlag   = (($intServiceId>0)|| ($vchScoring > 0))? 'S' :'';
    // if($intHCMAuthority == 1 && $intAuthorityPermission == 1){
    //     $result        = $obj->viewMISReport('VODR',$dataArr);
    // }else if($intHCMAuthority == 3 && $intAuthorityPermission == 1){
        $result        = $obj->viewMISReport('VDCN',$dataArr);
    // }else{
    //     $result        = $obj->viewMISReport('VDAR',$dataArr);
    // }
     
    if($intDepartmentId == 12){
        $vchDept = 'Health & Family Welfare Department';
    }else{
        $vchDept = 'Home Department';
    }
    
        
    
?>
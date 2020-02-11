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
    include_once(CLASS_PATH."clsFAQ.php");
    $obj             = new clsFAQ;
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
    $editPriv           = $explPriv['edit'];
    $noView             = $explPriv['View'];
    $noAdd              = $explPriv['add'];
    $noManage           = $explPriv['Manage'];
    $deletePriv        = $explPriv['delete'];
    $noActive           = $explPriv['active'];
    $noPublish          = $explPriv['publish'];
    $viewOwnRec         = $explPriv['viewOwnRec'];
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
    if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
    {
        $intRecno   = (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
        $intPgno    = (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;     
    }
    else    
        unset($_SESSION['paging']);
     $vchDepartmentId     = ($_POST['vchDepartmentId']>0)?$_POST['vchDepartmentId']:0;
     $vchServicesId       = ($_POST['vchServicesId']>0)?$_POST['vchServicesId']:0;
     $vchFAQQuestion      = ($_POST['vchFAQQuestion']!='')?$_POST['vchFAQQuestion']:'';
     //============= Delete/Active/Inactive function =================
    if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
        { 
            $qs = $_REQUEST['hdn_qs'];
            $ids    = $_REQUEST['hdn_ids'];
           // print_r($_REQUEST['hdn_ids']);exit;
            $outMsg = $obj->deleteFAQ($qs,$ids);
        }  
        if($isPaging==0){
             $result        = $obj->viewFAQ('PG',$intRecno,$vchDepartmentId,$vchServicesId,$vchFAQQuestion);
        }     
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            $result                 = $obj->viewFAQ('V',$intRecno,$vchDepartmentId,$vchServicesId,$vchFAQQuestion);
    }
       $totalResult                 = $obj->viewFAQ('V',$intRecno,$vchDepartmentId,$vchServicesId,$vchFAQQuestion);
       $intTotalRec                 = $totalResult->num_rows; 
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 10;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>
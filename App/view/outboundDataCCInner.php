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
    include_once(CLASS_PATH."clsFeedback.php");
    $obj             = new clsOutboundMis;
    $objFeedback     = new clsFeedback;
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

    if($_POST['hdn_qs'] == 'U'){
        if(count($_POST['question']) > 0){
            $FeedbackAnsQrys     = '';
            $intFeedbackRecIds   = $_POST['intFeedbackRecId'];
            for($i = 0; $i < count($_POST['question']); $i++){
                $checkAnswer    = ($_POST[$_POST['question'][$i]])?implode(",",$_POST[$_POST['question'][$i]]):'';
                if($_POST[$_POST['question'][$i]] && $checkAnswer){
                    $vchQuestion    = $_POST['question'][$i];
                    $vchRemarks     = (trim($_POST['vchRemarks'][$i]))?htmlspecialchars(trim($_POST['vchRemarks'][$i]),ENT_QUOTES):'';
                    $vchAnswer      = implode(",",$_POST[$_POST['question'][$i]]);

                    $FeedbackAnsQrys .= '('.$intFeedbackRecIds.','.$vchQuestion.',"'.$vchAnswer.'","'.$vchRemarks.'",' . $userId . '),';
                }
            }
            $FeedbackAnsQry  = rtrim($FeedbackAnsQrys, ',');
            $feedbackData['FeedbackAnsQry']     = $FeedbackAnsQry;
            $feedbackData['intFeedbackRecId']   = $intFeedbackRecIds;
            $feedbackResult     = $objFeedback->ReadFeedbackData('SFA', $feedbackData);
            if($feedbackResult){
                $outMsg         = 'Feedback submitted successfully';
                $redirectLoc    = URL.'outboundDataMis';
            }
            // print_r($feedbackResult);exit;
        }
        // print_r($FeedbackAnsQry);exit;

        // echo '<pre>';print_r($_POST);exit;
    }

  
     $intDistrictId       = ($_POST['intDistrictId']>0)?$_POST['intDistrictId']:0;
     $intRequestedBy       = ($_POST['intRequestedBy']>0)?$_POST['intRequestedBy']:0;
     $strFromDate         = (isset($_REQUEST['vchFromDate'])&& strtotime($_REQUEST['vchFromDate'])>0)?date('Y-m-d',strtotime($_REQUEST['vchFromDate'])):'';
     $strToDate           = (isset($_REQUEST['vchToDate'])&& strtotime($_REQUEST['vchToDate'])>0)?date('Y-m-d',strtotime($_REQUEST['vchToDate'])):'';
     $vchMobile           = (isset($_REQUEST['vchMobile'])&& $_REQUEST['vchMobile'])?$_REQUEST['vchMobile']:'';
     $userId              = $_SESSION['adminConsole_userID'];
     

    if($userId == 1){
        $intRequestedBy     = ($intRequestedBy)?$intRequestedBy:0;
    }else{
        $intRequestedBy     = ($intRequestedBy)?$intRequestedBy:$userId;
    }


     $dataArr['vchMobile']   = $vchMobile;
     $dataArr['intRecno']    = $intRecno;
     $dataArr['intAuthId']    = $userId;
     $dataArr['from_date']   = $strFromDate;
     $dataArr['to_date']     = $strToDate;
     $dataArr['intDistrictId']     = $intDistrictId;    
     $dataArr['intFeedbackCollectedBy']     =2; 
     // if( $_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==MINISTER_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==DG_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==DG_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==SC_DESIGNATION){

     // $dataArr['intUserId']      = $userId;
     // $dataArr['intFeedbackCollectedBy']      = 3;
     // }elseif($_SESSION['adminConsole_Privilege']==0 ){
     //  //
     // }else{
     //    $dataArr['intFeedbackCollectedBy']      = 2;
     // }
     
    
    if($isPaging==0){
             $dataArr['intPgSize']     =20;
             $result        = $obj->viewOutboundMis('PGCS',$dataArr);
        }     
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            $result                 = $obj->viewOutboundMis('VCS',$dataArr);
    }
       $totalResult                 = $obj->viewOutboundMis('VCS',$dataArr);
    //    $userResult                  = $obj->viewOutboundMis('URI',$dataArr);
    //    $userDetails                 = $userResult->fetch_array();
    //    $userRestiction              = $userDetails['INT_EMP_TYPE'];
       $intTotalRec                 = $totalResult->num_rows;      
       
  // print_r($intTotalRec);exit;
  
       
       

       $intCurrPage                 = $intPgno;
       $intPgSize                   = 20;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    // echo $intRequestedBy;exit;
?>
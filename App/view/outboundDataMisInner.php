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
    $globalData         = unserialize($_SESSION['globalData']);//echo '<pre>';print_r($globalData);
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
                    $vchAnswerText  = '';
                    if(count($_POST['text'.$_POST['question'][$i]])){
                        $vchTextAns = '';
                        for($n = 0; $n < count($_POST['text'.$_POST['question'][$i]]); $n++){
                            $vchTextAns .= htmlspecialchars(trim($_POST['text'.$_POST['question'][$i]][$n]),ENT_QUOTES).'~::~';
                        }
                        $vchAnswerText = rtrim($vchTextAns,'~::~');
                    }

                    $FeedbackAnsQrys .= '('.$intFeedbackRecIds.','.$vchQuestion.',"'.$vchAnswer.'","'.$vchRemarks.'","'.$vchAnswerText.'",' . $userId . '),';
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
    if($_SESSION['adminConsole_Desg_Id']==CSO_DESIGNATION){ 
        if(!empty($_POST['intDistrictId'])) {
             $intDistrictId       = $_POST['intDistrictId'];
          }else{ 
            $intDistrictId       = $_SESSION['adminConsole_HierarchyId'];
          } 
      }else{ 
        if(!empty($_POST['intDistrictId'])) {
             $intDistrictId       = $_POST['intDistrictId'];
          }else{ 
            $intDistrictId       = 0;
          } 
     } 
     $intRequestedBy       = ($_POST['intRequestedBy']>0)?$_POST['intRequestedBy']:0;
     $strFromDate         = (isset($_REQUEST['vchFromDate'])&& strtotime($_REQUEST['vchFromDate'])>0)?date('Y-m-d',strtotime($_REQUEST['vchFromDate'])):'';
     $strToDate           = (isset($_REQUEST['vchToDate'])&& strtotime($_REQUEST['vchToDate'])>0)?date('Y-m-d',strtotime($_REQUEST['vchToDate'])):'';
     $vchMobile           = (isset($_REQUEST['vchMobile'])&& $_REQUEST['vchMobile'])?$_REQUEST['vchMobile']:'';
     $userId              = $_SESSION['adminConsole_userID'];
     $intCallStatus       = ($_POST['intCallStatus']>0)?$_POST['intCallStatus']:0;
     

    if($userId == 1){
        $intRequestedBy     = ($intRequestedBy)?$intRequestedBy:0;
    }else{
        $intRequestedBy     = ($intRequestedBy)?$intRequestedBy:$userId;
    }
    $errvchMobile          = !empty($vchMobile )?Model::isSpclChar($vchMobile):0;
    $errintRecno           = !empty($intRecno)? Model::isSpclChar($intRecno):0;
    $erruserId             = !empty($userId && !is_numeric($userId))? Model::isSpclChar($userId):0;
    $errstrFromDate        = !empty($strFromDate)?Model::isSpclChar($strFromDate):0;
    $errstrToDate          = !empty($strToDate)?Model::isSpclChar($strToDate):0;
    $errintDistrictId      = !empty($intDistrictId && !is_numeric($intDistrictId))?Model::isSpclChar($intDistrictId):0;
    $errintRequestedBy     = !empty($intRequestedBy && !is_numeric($intRequestedBy))?Model::isSpclChar($intRequestedBy):0;
    $errintCallStatus      = !empty($intCallStatus && !is_numeric($intCallStatus))?Model::isSpclChar($intCallStatus):0;
     // echo $intCallStatus; exit;
    // echo $errvchMobile.$errintRecno.$erruserId.$errstrFromDate.$errstrToDate.$errintDistrictId.$errintRequestedBy.$errintCallStatus;exit;

    if($errvchMobile > 0 || $errintRecno > 0 || $erruserId > 0 || $errstrFromDate > 0 || $errstrToDate > 0 || $errintDistrictId > 0 || $errintRequestedBy > 0 || $errintCallStatus > 0){
        $outMsg                             = 'Special Characters are not allowed';
        $dataArr['vchMobile']               = '';
        $dataArr['intRecno']                = 0;
        $dataArr['intAuthId']               = $userId;
        $dataArr['from_date']               = '';
        $dataArr['to_date']                 = '';
        $dataArr['intDistrictId']           = 0;
        $dataArr['intRequestedBy']          = 0;
        $dataArr['intFeedbackCollectedBy']  = 3;
        $dataArr['intCallStatus']           = 0;
    }else{
        $dataArr['vchMobile']               = $vchMobile;
        $dataArr['intRecno']                = $intRecno;
        $dataArr['intAuthId']               = $userId;
        $dataArr['from_date']               = $strFromDate;
        $dataArr['to_date']                 = $strToDate;
        $dataArr['intDistrictId']           = $intDistrictId;
        $dataArr['intRequestedBy']          = $intRequestedBy;
        $dataArr['intFeedbackCollectedBy']  = 3;
        $dataArr['intCallStatus']           = $intCallStatus;
    }
   $openFlag   = (($intDistrictId>0)|| ($userId>0) || ($strFromDate!='')|| ($strToDate!='')|| ($intRequestedBy>0)|| ($intCallStatus>0))? 'S' :'';
     // if( $_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==MINISTER_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==DG_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==DG_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==SC_DESIGNATION){

     // $dataArr['intUserId']      = $userId;
     // $dataArr['intFeedbackCollectedBy']      = 3;
     // }elseif($_SESSION['adminConsole_Privilege']==0 ){
     //  //
     // }else{
     //    $dataArr['intFeedbackCollectedBy']      = 2;
     // }
     
    // print_r($dataArr);exit;
    if($isPaging==0){
             $dataArr['intPgSize']     =50;
             $result        = $obj->viewOutboundMis('PGCS',$dataArr);
        }     
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            $dataArr['intRecno']    = $intRecno;
            $result                 = $obj->viewOutboundMis('VCS',$dataArr);
    }
       $totalResult                 = $obj->viewOutboundMis('VCS',$dataArr);
       $intTotalRec                 = $totalResult->num_rows;
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 50;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    // echo $intRequestedBy;exit;
?>
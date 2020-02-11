<?php

/* ================================================
  File Name         	: proxy.php
  Description		    : This file is used to call ajax methods
  Date Created		    : 19-Sep-2019
  Designed By		    : Niranjan Kumar pandit
  Update History        : 
  <Updated by>		<Updated On>		<Remarks>

  Javscript Functions   :
  includes              : classBind.php

  ================================================== */
require ("classBind.php");
// print_r($_REQUEST['ID']);exit;
$objClassBind = new clsClassBind;
/*To check special charcters in post request BY Niranjan Kumar Pandit*/
$ary = array_map('is_array', $_POST);
if(in_array(1,$ary)){
   $checkCount=1;
}else{
    $checkCount=0;
} 
$validAry= array('1');
$validAry                 = ($checkCount==0)?array_map(array($objClassBind, 'isSpclChar'), $_POST):$validAry;
//if (in_array(1, $validAry, true)) {
//   header("Location:" . URL . "error");
//   // print_r($validAry);
//    exit;
//} 
$objClassBind->updateActivityTime();
$caseVal = (!empty($_REQUEST['ID']) && $_REQUEST['ID']=='notification')?'notification':$_POST['method'];
switch ($caseVal) {
    case "UserLogins":
        $UserId=$_REQUEST['UserId'];
        $objClassBind->UserLogins($UserId);
    break;

    case "getAdminMessage":        
        $objClassBind->getAdminMessage();
    break;

    case "setSessionOuttime":
        $objClassBind->setSessiontime();
    break;

    case "setSessionValues":
        $objClassBind->setSessionValues();
    break;
    case "getDepartmentList":
        $objClassBind->getDepartmentList();
    break;
    case "getDeptWiseService":
        $objClassBind->getDeptWiseService();
    break;
    case "getService":
        $deptId=$_POST['deptId'];
        $objClassBind->getService($deptId);
    break;
    case "getServices":
         $deptId=$_POST['deptId'];
        $objClassBind->getServices($deptId);
    break;
    case 'addSurveyQuestionnaire':
      $objClassBind->addSurveyQuestionnaire();
      break;
    case 'addSurveyQuestionnaire':
      $objClassBind->addSurveyQuestionnaire();
      break;
    case 'getOutBoundData':
      $objClassBind->getOutBoundData();
      break;
    case 'FeedbackSubmit':
      $objClassBind->FeedbackSubmit();
      break;
    case 'setBookMark':
      $objClassBind->setBookMark();
      break;
    case 'getOLUsers':
      $objClassBind->getOLUsers();
      break;
    case 'loadTotalCall':
      $objClassBind->loadTotalCall();
      break;      
    case 'getDistrictList':
      $objClassBind->getDistrictList();
      break;
    case "getAllService":
        $objClassBind->getAllService();
    break;
    case "loadTotalRecordCollected":
        $objClassBind->loadTotalRecordCollected();
    break;
    case 'getCallInformation':
      $objClassBind->getCallInformation();
      break;
    case 'getServiceDetails':
      $objClassBind->getServiceDetails();
      break;

    case "getMapDataDashboard":
        $objClassBind->getMapDataDashboard();
    break;

    case 'getFAQDetails':
      $objClassBind->getFAQDetails();
    break;

    case 'getInboundInformation':
      $objClassBind->getInboundInformation();
    break;

    case 'getInboundSummary':
      $objClassBind->getInboundSummary();
    break;


    case 'getOutboundSummary':
      $objClassBind->getOutboundSummary();
    break;

    case 'UpdateRequestedStatus':
      $objClassBind->UpdateRequestedStatus();
      break;
  case 'getHcmInformation':
      $objClassBind->getHcmInformation();
    break;
    case 'getDgInformation':
      $objClassBind->getDgInformation();
    break;
    case 'getCsInformation':
      $objClassBind->getCsInformation();
    break;
    case 'getItscInformation':
      $objClassBind->getItscInformation();
    break;

    case 'getCallBackRequest':
      $objClassBind->getCallBackRequest();
    break;
    case 'gotoFeedbackpage':
      $objClassBind->gotoFeedbackpage();
    break;

    case 'resetCallBackRequest':
      $objClassBind->resetCallBackRequest();
      break;
    
    case 'getAttenedCallsInformation':
      $objClassBind->getAttenedCallsInformation();
    break;
    case 'updateCallStatus':
      $objClassBind->updateCallStatus();
    break;
    case 'generateActionSheet':
      $objClassBind->generateActionSheet2();
break;
    case 'AuthCallCancel':
      $objClassBind->AuthCallCancel();
      break;
    case 'unAssignCallBackRequest':
      $objClassBind->unAssignCallBackRequest();
      break;
    //===================case for search location  by Ajit Kumar sahoo On: 05-06-2017=================  
    case 'searchLocationName':
        $objClassBind->searchLocationName();
    break;

    case 'getInboundCallRequest':
        $objClassBind->getInboundCallRequest();

    case 'directCallCM':
      $objClassBind->directCallCM();
    break;
    case 'getDeptWisePolice':
        $objClassBind->getDeptWisePolice();
    break;
     case 'getDeptWiseHospital':
        $objClassBind->getDeptWiseHospital();
    break;

    case 'getRequestedByList':
        $objClassBind->getRequestedByList();
    break; 
    case 'setTodayYesterdayAll':
        $objClassBind->setTodayYesterdayAll();
    break;

    case 'showFeedbackQuestionAnswer':
      $objClassBind->showFeedbackQuestionAnswer();
      break;

    case 'getCallBackRequestSession':
      $objClassBind->getCallBackRequestSession();
    break;
    case 'assignCallBackRequest':
      $objClassBind->assignCallBackRequest();
    break;
    case 'fillRangeWisePolicestation':
      $objClassBind->fillRangeWisePolicestation();
    break;
    case 'fillDistrictRangeWise':
      $objClassBind->fillDistrictRangeWise();
    break;
    case 'getCallDetails':
      $objClassBind->getCallDetails();
    break;
    case 'FeedbackSubmitAuthority':
      $objClassBind->FeedbackSubmitAuthority();
      break;
    case 'getOfflineFeedbackData':
      $objClassBind->getOfflineFeedbackData();
      break;
    case "getFilterDepartmentList":
        $objClassBind->getFilterDepartmentList();
    break;
    case "getDeptWiseInstitution":
        $objClassBind->getDeptWiseInstitution();
    break;
    case "notification":
        $objClassBind->getNotification();
    break;

    case "fillJobType":
        $objClassBind->fillJobType(); 
    break;
    case "fillUsers":
        $objClassBind->fillUsers(); 
    break;
    case "exceuteAPI":
        $objClassBind->exceuteAPI(); 
    break;
    case "getServiceWiseScheme":
        $objClassBind->getServiceWiseScheme();
    break;
    case "viewCallRemarkStatus":
      $objClassBind->viewCallRemarkStatus(); 
    break;
    case "showFeedbackQuestionAnswerReceived":
      $objClassBind->showFeedbackQuestionAnswerReceived(); 
    break;
    case "getPeopleDepartment":
      $objClassBind->getPeopleDepartment(); 
    break;
    case "getCallSent":
      $objClassBind->getCallSent(); 
    break;
    case "getCC":
      $objClassBind->getCC(); 
    break;
    case "getDailyAvgCall":
      $objClassBind->getDailyAvgCall(); 
    break;
    case "getDailyAvgCCCall":
      $objClassBind->getDailyAvgCCCall(); 
    break;
    
}
?>
 
<?php
 /* * ******************************************
  File Name    	: Add Feedback
  Description  	: 
  Created By	  : Niranjan Panfit
  Created On	  : 24-09-2019
  Developed By  : Niranjan Pandit
  Developed On  : 
  Update History :
  <Updated by>		<Updated On>		<Remarks>

  Class Used		 : clsFeedback
  Functions Used   : 
==================================================*/

// function encrypt($plaintext, $password) {
//     $method = "AES-256-CBC";
//     $key = hash('sha256', $password, true);
//     $iv = openssl_random_pseudo_bytes(16);

//     $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
//     $hash = hash_hmac('sha256', $ciphertext, $key, true);

//     return $iv . $hash . $ciphertext;
// }
// echo "<div><pre>".encrypt('cctnsfeedback#1234','CcTnS@OD-97#FeEdBacK')."</pre></div>";exit;

    include_once(CLASS_PATH."clsFeedback.php");
    $obj                  = new clsFeedback;
    $urlData              = (isset($_REQUEST['ID']) && $_REQUEST['ID'] != '') ? /*$_REQUEST['ID']*/ json_decode($obj->decrypt($_REQUEST['ID'])):0; 
    // print_r($urlData); exit;
    $id                 = $urlData->intOutboundDataId;
    $feqFrom            = $urlData->requestFrom;
    $dataType           = !empty($urlData->dataType)?$urlData->dataType:0;
    $designationId      = $urlData->designationId;
    $userId            = $urlData->userId;
    // print_r($urlData); exit;
    // echo $feqFrom; exit;
    $intCallBackRequest = 0;
    $intRequestedById   = 0;
    if($feqFrom == 'CC'){
      $intRequestedFrom = 0;
    }elseif($feqFrom == 'CMB'){
      $intRequestedFrom = 1;
      $intCallBackRequest = $designationId;
      $intRequestedById   = $userId;
    }else{
      $intRequestedFrom = 2;
      $intCallBackRequest = $designationId;
      $intRequestedById   = $userId;
    }
    

    // $intRequestedFrom   = 2; 
    // print_r($feqFrom);exit;


    //1 = OURIRkdtOFlCV0hwZkZaSzRZdkdodz09

//========== Default variable ===============				
    $intWinStatus       = 1;
    $flag               = 0;  
    $errFlag            = 0;
    $redirectLoc        = ''; 
    $outMsg             = '';
    $date           = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
    $curentDateTime = $date->format('Y-m-d H:i:s');
    $_SESSION['dtmCallStart']   = $curentDateTime;
    $userId         = $_SESSION['adminConsole_userID'];
   
 //=========== For Permission======================
    $glId               = $_REQUEST['GL'];
    $plId               = $_REQUEST['PL'];  
    //print_r($_POST);exit;

  //=========== For editing ======================
 // print_r($_REQUEST['ID']);exit;
   if(isset($id) && ($id)>0)
	{ 
      try {
       //============ Read value for updation ===========	
          $result                         =  $obj->ReadFeedbackData('RD',array('intOutboundDataId' => $id,'dataType'=>$dataType));
          // print_r($result);exit;
          if($result->num_rows > 0){
            $row  = $result->fetch_array();
            // echo '<pre>';print_r($row);exit;
            $intOutboundDataId      = $row['intOutboundDataId'];
            $intDepartmentId        = $row['intDepartmentId'];
            $intServiceId           = $row['intServiceId'];
            $vchDistrict            = $row['vchDistrict'];
            $vachBlock            = $row['vachBlock'];
            $vchGPName            = $row['vchGPName'];
            $vchVillageName            = $row['vchVillageName'];
            $vchName                = $row['vchName'];
            $intMobile              = $row['intMobile'];
            $intAge                 = $row['intAge'];
            $intGender              = $row['intGender'];
            $dtmRegdDateTime        = $row['dtmRegdDateTime'];
            $jsonRelatedInfo        = ($row['jsonRelatedInfo'])?json_decode($row['jsonRelatedInfo']):'';
            $intBookmark            = $row['intBookmark'];
            $intAssignedTo          = $row['intAssignedTo'];
            $dtmAssignedTime        = $row['dtmAssignedTime'];
            $dtmFeedbackRcvTime     = $row['dtmFeedbackRcvTime'];
            $intFeedbackStatus      = $row['intFeedbackStatus'];
            $vchDeptName            = $row['vchDeptName'];
            $vchServiceName         = $row['vchServiceName'];
            $dataType               = $row['dataType'];
            $vchSchemeTypeName               = $row['vchSchemeTypeName'];
            $vchCardName               = $row['vchCardName'];
            $intNoFamily               = $row['intNoFamily'];
            $vchRationCardNo               = $row['vchRationCardNo'];
            $dtmRegdDateTime               = $row['dtmRegdDateTime'];
            $dtmPaddyDeposite               = $row['dtmPaddyDeposite'];
            $vchTokenNo               = $row['vchTokenNo'];
            $vchTokenNo               = $row['vchTokenNo'];
            $jsonRelatedInfo        = (array)$jsonRelatedInfo;
            $jsonRelatedInfoKey     = array_keys($jsonRelatedInfo);
            $_SESSION['intOutboundDataId']  = $intOutboundDataId;
             if($intOutboundDataId > 0 && $intRequestedFrom   == 1){
              $results  = $obj->ReadFeedbackData('URS',array('intOutboundDataId' => $intOutboundDataId, 'intRequestStatus' => 3, 'intType' => $dataType));
              // print_r($results);exit;
            }
          }else{
            // echo ';;;;';exit;
            // echo '<script>alert("Sorry!!! Please Try Again"); window.location.href="'.APPURL.'viewfeedback"</script>';
             // header("Location: anotherDirectory/anotherFile.php")
          }

          if($intDepartmentId > 0 || $intServiceId > 0){
            $arrSurveyQuestId   = [];
            $arrType            = [];
            $arrQuestionEnglish = [];
            $arrQuestionOdia    = [];
            $arrSurveyOptionId  = [];
            $arrOptionEnglish   = [];
            $arrOptionOdia      = [];
            $arrOptionValue     = [];
            $arrOptionSelection = [];
            $arrRemarksStatus = [];

            $arrQuestion  = $obj->ReadFeedbackData('GQ',array('intDepartmentId' => $intDepartmentId, 'intServicesId' => $intServiceId));
            if($arrQuestion->num_rows > 0){
              while($QRow = $arrQuestion->fetch_array()){
                array_push($arrSurveyQuestId, $QRow['intSurveyQuestId']);
                array_push($arrType, $QRow['intType']);
                array_push($arrQuestionEnglish, $QRow['vchQuestionEnglish']);
                array_push($arrQuestionOdia, $QRow['vchQuestionOdia']);
                array_push($arrOptionSelection, $QRow['intOptionSelection']);
                array_push($arrRemarksStatus, $QRow['intRemarksStatus']);
                array_push($arrSurveyOptionId, explode("~||~",$QRow['intSurveyOptionId']));
                array_push($arrOptionEnglish, explode("~||~",$QRow['vchOptionEnglish']));
                array_push($arrOptionOdia, explode("~||~",$QRow['vchOptionOdia']));
                array_push($arrOptionValue, explode("~||~",$QRow['intOptionValue']));
              } 
            }
          }
          // print_r($arrRemarksStatus);exit;
          // echo '<pre>';print_r($jsonRelatedInfo['date']);exit;
      } 
     catch(Exception $e) 
     {
          $outMsg = 'Sorry..This service is down. Please visit after some time';
     }     
	}else{
    echo '<script>alert("Sorry!!! Please Try Again"); window.location.href="'.APPURL.'viewfeedback"</script>';
  }

  // echo $intRequestedFrom;exit;
 
?>

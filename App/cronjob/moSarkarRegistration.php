<?php

include('../config.php');
include_once(ABS_PATH.'model/customModel.php');
include_once(ABS_PATH.'controller/clsFeedback.php');
session_start();
$_SESSION['START']['ACC5'] =date('h:i:s'); 
// $obj    = new clsFeedback;
$obj    = new Model;
// echo '=========';exit;
$smsData['intMoSarkarRegistrationStatus'] =0;
$res = $obj->callProc('USP_MS_SMS_LOG', 'GOD', $smsData);
//$mobileNos = '7205787329,8908138116,9090095066';
// echo $obj->sendBulkMoSms($mobileNos); exit;
$mobileNoList =array();
// print"<pre>";
$slCnt=0;
if(is_object($res) && $res->num_rows > 0){
    while($row = $res->fetch_assoc()){
        $mobileNoList[] =$row['intMobile'];
        $smsData['intSmsLogId']  = 0;
        $smsData['intInOutboundId']  = $row['intOutboundDataId'];
        $smsData['intType']  = 1;
        $smsData['intSmsStatus']  = 1;
        $smsData['intMobileNumber']  = $row['intMobile'];
        $obj->callProc('USP_MS_SMS_LOG', 'AU', $smsData);
         $slCnt++;
        
    }
    // $mobileNos = implode(',',$mobileNoList );
    // $obj->sendBulkMoSms($mobileNos);
}
if ($slCnt>0) {
    $outMsg = 'Record added successfully ';
       
    $_SESSION['END']['ACC5'] =date('h:i:s');
    
}else{
    $outMsg = 'Error:Occured. Please try again!';
      
    $_SESSION['END']['ACC5'] =date('h:i:s');
}
$logData['msg'] = $outMsg; 
$logData['RowNumber'] =  $slCnt; 
$logData['jobId'] = 5; 
$logData['jobName'] = 'MO_REGISTRATION'; 
$result1 = $obj->writeToLog($logData,'MO_REGISTRATION');
echo "success";

exit; 



?>
<?php

include('../config.php');
include_once(ABS_PATH.'model/customModel.php');
include_once(ABS_PATH.'controller/clsTransactionDataImport.php');
session_start();
$obj    = new clsTransactionDataImport;
$_SESSION['START']['ACC4'] =date('h:i:s'); 
$startDate = date('Y-m-d',strtotime("-1 days")); 
$endDate   = date('Y-m-d');

//$startDate = '2019-10-18'; 
//$endDate   = '2019-10-20';

$startDateApi = date('d-m-Y',strtotime("-1 days"));
$endDateApi = date('d-m-Y');
//$startDateApi = '18-10-2019';
//$endDateApi = '20-10-2019';


$intServiceId = 5;
$intDepartmentId = 14; 


$dataArr = array();
$regdArr = array();
$dataArr['startDate']      = $startDate;
$dataArr['endDate']        = $endDate;
$dataArr['intServiceId']   = $intServiceId;
$dataArr['intDepartmentId']   = $intDepartmentId;

$result              =  $obj->fetchTransactionDataImport('FSR',$dataArr);
if($result ->num_rows>0){
    $cnt=0;
    while($row=$result->fetch_array()){
              array_push($regdArr,$row['vchRegdNo']);
    }
}


$apiUrl= "https://citizenportalaudit.com/Feedbackservice/api/FIR/GetRandomFeedbackDetails?StartDate=".$startDateApi."&EndDate=".$endDateApi."&Category=SERVICE&encpwd=Lf7Nw5q3xqfF85QYvUEKgrqhmkC6WlXjFxUQM1c18SV0G59KTrCw9Mev%2FBMyrHuO";


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $apiUrl,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  
  CURLOPT_SSL_VERIFYHOST=> false,
 CURLOPT_SSL_VERIFYPEER=> false,
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 475972d7-07a6-0a67-c5b4-66ac3acdf711"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    $dataResult = json_decode($response, true);
  echo '<pre>'; print_r($dataResult); echo '</pre>';
$InsertQuery='';
$slCnt=0;
foreach($dataResult as $apidataResult){
       $PS        = $apidataResult['PS'];
       $PS_CD     = $apidataResult['PS_CD'];
       $DISRTICT  = $apidataResult['DISRTICT'];
       $DISRTICT_CD  = $apidataResult['DISRTICT_CD'];
       $Age          = $apidataResult['Age'];
       $Comp_Name    = $apidataResult['Comp_Name'];
       $GENDER       = $apidataResult['GENDER'];

  if($PS_CD>0 && $DISRTICT_CD>0 && !empty($Age) && !empty($GENDER) && !empty($Comp_Name)){ 

    if(!in_array($apidataResult['REG_NUM'],$regdArr)){
       // echo $slCnt.'<br>';
       $Age       = (int)$Age;
       $Comp_Name = $apidataResult['Comp_Name'];
       $GENDER    = $apidataResult['GENDER'];
       if($GENDER =="Male"){
          $genderId=1;
       }elseif($GENDER =="Female"){
          $genderId=2;
       }elseif($GENDER =="Transgender"){
          $genderId=3; 
       }else{
          $genderId=0;   
       }
       $Comp_Name    = htmlspecialchars(addslashes($apidataResult['Comp_Name']),ENT_QUOTES);
       $FIR_REG_NUM  = $apidataResult['REG_NUM'];
       $FIR_NUM      = htmlspecialchars(addslashes($apidataResult['Citizen_Service']),ENT_QUOTES);
       $SLADHEDFIR_DATE = str_replace("/","-",$apidataResult['REG_DT']);
       $FIR_DATE     = date('Y-m-d h:i:s',strtotime($SLADHEDFIR_DATE));

       $MobileNO     = $apidataResult['MobileNO'];
       $combinedOtherArr['Citizen_Service']= $FIR_NUM;                           
       $jsonOtherDetail= json_encode($combinedOtherArr); 

       $InsertQuery.="('".$Comp_Name."',".$Age.",".$genderId.",'".$PS_CD."','".$DISRTICT_CD."', '".$FIR_REG_NUM."','".$jsonOtherDetail."','".$FIR_DATE."','".$MobileNO."', ".$intDepartmentId.", ".$intServiceId."),";
     }
    $slCnt++;
   }
}

$InsertQuery       = rtrim($InsertQuery, ',');
$dataStr['InsertQuery']=$InsertQuery;
//echo '<pre>'; print_r($dataStr); echo '</pre>';exit;
$result = $obj->fetchTransactionDataImport('API',$dataStr);

if ($result) {
    if($slCnt>0)
      $outMsg = 'Record added successfully ';
    else
      $outMsg = 'Nothing Inserted';
       
    $_SESSION['END']['ACC4'] =date('h:i:s');
    
}else{
    $outMsg = 'Error:Occured. Please try again!';
      
    $_SESSION['END']['ACC4'] =date('h:i:s');
}



}

$logData['msg'] = $outMsg; 
$logData['RowNumber'] =  $slCnt; 
$logData['jobId'] = 4; 
$logData['jobName'] = 'HOME_DEPT_SERVICE_API'; 
$result1 = $obj->writeToLog($logData,'HOME_DEPT_SERVICE_API');
echo $outMsg;exit;


//echo ABS_PATH;exit;
// $logData['msg'] = $outMsg; 
// $result1 = $obj->writeToLog($logData,'EXCEL_IMPORT');





?>
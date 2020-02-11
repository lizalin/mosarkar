<?php 
include('../config.php');
include_once(ABS_PATH.'model/customModel.php');
include_once(ABS_PATH.'controller/clsTransactionDataImport.php');
session_start();
$obj    = new clsTransactionDataImport;
$_SESSION['START']['ACC4'] =date('h:i:s'); 
$startDate = date('Y-m-d',strtotime("-1 days")); 
$endDate   = date('Y-m-d',strtotime("-1 days"));


$startDateApi = date('d-M-Y',strtotime("-1 days"));
$endDateApi = date('d-M-Y',strtotime("-1 days"));
//$startDateApi ='20-Oct-2019';
//$endDateApi   = '21-Oct-2019';



$apiUrl= "http://eswasthya.odisha.gov.in/HISUtilities/services/restful/DataService/getFilterWiseDataJSON/2";
$apiPost='{"primaryKeys":["21101","'.$startDateApi.'","'.$endDateApi.'"]}';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $apiUrl,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $apiPost,
  CURLOPT_HTTPHEADER => array(
    "Authorization: Basic bW9zYXJrYXI6bW9zYXJrYXI=",
    "Cache-Control: no-cache",
    "Content-Type: text/plain",
    "Postman-Token: e5723278-5d5e-426d-b1a5-0a0929758368"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;

  $dataResult = json_decode($response, true);
  //echo '<pre>'; print_r($dataResult); echo '</pre>';

  $dataHeading = $dataResult['dataVO']['dataHeading'];
  $dataValue   = $dataResult['dataVO']['dataValue'];
 // echo '<pre>'; print_r($dataValue); echo '</pre>';
     foreach($dataValue as $dataValues){
        
        $dataitemValues=$dataValues['item'];
        $combinedArr= array_combine($dataHeading,$dataitemValues);
        echo '<pre>'; print_r($combinedArr); echo '</pre>';
     }


}
  
  ?>
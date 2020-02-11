<?php 
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
require ("classBind.php");
$objClassBind = new clsClassBind;
// $result = $objClassBind->getNotification();
// $message ='';
//        if($result->num_rows>0){
//            while($row=$result->fetch_array()){
//               $message ="HCM Request for 10 Calls";
//            }

//        }
//        if(!empty($message)){
         
//         }
//        exit;
$time = date('r');
echo "data: The server time is: {$time}\n\n";
flush();
exit;
?>
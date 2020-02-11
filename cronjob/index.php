<?php 
 
    @session_start();
    error_reporting(E_ALL-E_NOTICE); 
    date_default_timezone_set('Asia/Kolkata');
    ini_set("display_errors", 0);
    
    include('../config.php');
        include_once(ABS_PATH."controller/classBindCron.php");
        $classBind= new clsClassBindCron;
        $requestData= $classBind->apiDatasMining();
        // print_r($requestData);
         //echo '<br>'.count($requestData)."<br>";
        // $countArr = count(json_decode($requestData)->result);

        // if($countArr>0)
        // {
        //     $classBind->writeToLog(json_decode($requestData),$type);
        // }


?>
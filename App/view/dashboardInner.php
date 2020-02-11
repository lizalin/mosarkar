<?php 
// unset($_SESSION['AuthCallStart']);
// echo "<pre>";print_r($_SESSION);exit;
include_once('controller/classBind.php');
$objClsBind = new clsClassBind;
$date = $objClsBind->firstDayOf('week');
    //$firstWeek= $date->format('Y-m-d');
    date_sub($date,date_interval_create_from_date_string("1 days"));
      $firstWeek=date_format($date,"Y-m-d");
      $firstWeekfilter=date_format($date,"d-M-Y");
      $deptLogin  = ($_SESSION['adminConsole_Desg_Id']==0 ||$_SESSION['adminConsole_Desg_Id']==FSCWS_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CSO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION)? 0:$_SESSION['adminConsole_DeptId'];
// print_r($deptLogin);exit;
  $fromDate	=  '01-06-2017'; 
  $toDate 	=  date('d-m-Y'); 
  
  $fromDate1 = date('Y-m-d', strtotime($fromDate)); 
  $toDate1 	= date('Y-m-d',strtotime($toDate)); 
  unset($_SESSION['backPathUrl']);
  $_SESSION['backPathUrl'] = $_REQUEST['PG'];
  //echo ADMIN_PRIVILEGE.'=='.$_SESSION['adminConsole_UserType'];exit;
  
      if (ADMIN_PRIVILEGE == 0 || ADMIN_PRIVILEGE==1 || $_SESSION['adminConsole_UserType'] == 1) {
            $officerType              =   3;
        } else {
            $officerType              =   2;
        }
       $userid   = USER_ID; 
        /* =======For Mapping Data Modifications on 16-Dec-2017======= */
            $mappedUserId = $objClsBind->getMappedData($userid);
            if ($officerType == 3 && $mappedUserId > 0) {
                $createdBy = $mappedUserId;
            }else{
                
                    $createdBy = ($officerType==3)? 0:$userid;
            }
  
        
    
    if (ADMIN_PRIVILEGE>1 && $_SESSION['adminConsole_UserType'] == 2){           
            echo "<script>location.href = '".APPURL."ataDashboard';</script>";   
        }
    // $resLeftData = $objClsBind->getLeftDashboard();
   // $resPeopleDepartData = $objClsBind->getPeopleDepartment();
    // print_r($resPeopleDepartData); exit;
   // $resCallSentData = $objClsBind->getCallSent();
  //  $resCCData = $objClsBind->getCC();
    // print_r($resCallSentData); exit;

   // $resDailyAvgCall = $objClsBind->getDailyAvgCall();
   // $resDailyAvgCCCall = $objClsBind->getDailyAvgCCCall();
    // print_r($resDailyAvgCall); exit;
    // $resDailyAvgCallInbound = $objClsBind->getDailyAvgCallInbound();
    // print_r($resDailyAvgCallInbound ); exit;
    
        
?>
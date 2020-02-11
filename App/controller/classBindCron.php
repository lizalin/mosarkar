<?php
set_time_limit(0);
/* ================================================
  File Name         	: classBindCron.php
  Description		  	: Page to manage class bind.
  Date Created		  	: 29-06-2017
  Designed By		  	: Ashok Samal
  Update History            :
  <Updated by>		<Updated On>		<Remarks>
1.ashok Samal        10-07-2017        cron structure Change for multi execution in one call 
  ================================================== */
include_once("../model/customModel.php");


class clsClassBindCron extends Model 
{

    public function apiDatasMining() 
    {  //echo 1;exit;        
        require_once('cls-twitter-scheduler.php');
        $obj                  = new cls_twitter_scheduler;
        $resArr               = array();
        $resultJob            = $obj->findCronJob('FCA',0);
        $ctr                  = 0; 
        //echo "<pre>";print_r($resultJob);exit;
        while($rowJob         = $resultJob->fetch_array())
        {
        //echo "<pre>";print_r($rowJob);
            $jobId                           = $rowJob['intJobId'];
            $jobType                         = $rowJob['IntJobType'];
            $UID                             = $rowJob['intAccountId']; 
            $vchScreenName                   = $rowJob['vchScreenName'];
            //echo API_ACCOUNT_TYPE['API_ACCOUNT_TYPE']; exit;
            //echo "<pre>".$jobType;//exit;

            if($jobType == API_ACCOUNT_TYPE['HEALTHAPI'])
            {
                $_SESSION['START']['ACC'.$jobId] = date('Y-m-d H:i:s');
                $result                          = $obj->importHealthData($rowJob);                
                $obj->UpdateLastCronTime('ULT',$jobId,$UID,$jobType,1,$result['outMsg'],$result['recordFetched'],$result['validCnt'],$result['invalidRec'],$result['duplicateRec']); //2
                $_SESSION['END']['ACC'.$jobId]   = date('Y-m-d H:i:s');   

            }


         if($jobType == API_ACCOUNT_TYPE['HOMEAPI'])
            {//echo 1; exit;
                $_SESSION['START']['ACC'.$jobId] = date('Y-m-d H:i:s');
                $result                          = $obj->importHomeData($rowJob);                              
                $obj->UpdateLastCronTime('ULT',$jobId,$UID,$jobType,1,$result['outMsg'],$result['recordFetched'],$result['validCnt'],$result['invalidRec'],$result['duplicateRec']); //2
                $_SESSION['END']['ACC'.$jobId]   = date('Y-m-d H:i:s');     

            }

           
           
            $ctr++;
        }// end While Loop
        //print_r($_SESSION);
        return json_encode(array('result' => 'success'));
    }// End method
    
   public function writeToLog($logData,$type) 
   {
        $ctrl       = 0;        
        foreach($logData->result as $res)
        { 
            $msg        = "";
            $jobId   = $res->jobId;            
            $msg        .='Job Name :'.$res->jobName.";";

            if($type==TW_MENTION)
            {
                $msg    .='User Name:'.$res->vchScreenName. " (". $res->vchUserName.");";
            } 
            else if($type==FB_POST) 
            {
                $msg    .='UserName :'.$res->vchScreenName.";";
            }
            else if($type==FB_COMMENT) 
            {
                $msg    .='UserName :'.$res->vchScreenName.";";
            }
            else if($type==FB_ANALYTICS) 
            {
                $msg    .='UserName :'.$res->vchScreenName.";";
            }

            $msg     .='Start Time :'.$_SESSION['START']['ACC'.$jobId].";";
            $msg     .='Message :'.$res->msg.";";
            $msg     .='Total count :'.$res->count.";";
            $msg     .='End Time :'.$_SESSION['END']['ACC'.$jobId].";";
            //$msg     .= "\r\n";
            //$msg      .= '------------------------------------------'." ;";

           
            $ctrl++;  // counter 
            $filename = $res->jobId.'_'.date('Ymd').'.txt';
                // WRITE TEXTFILE START///
            $myfile     = fopen(SITE_PATH.'cronLog/'.$filename, "a") or die("Unable to open file!");
            /*$txt        = "Cronjob Updated on :".date('d-m-Y H:i:s')." \r\n";
            fwrite($myfile, "\r\n". $txt);
            $txt        = "==============================================\r\n";
            fwrite($myfile, $txt);*/
            $txt        = $msg;
            fwrite($myfile, "\r\n". $txt);
            fclose($myfile);
            // WRITE TEXTFILE END///
        }
         echo "Successfully updated";
        unset($_SESSION['START']);
        unset($_SESSION['END']);
    }// Write to log function End


}// End Class Bind

?>
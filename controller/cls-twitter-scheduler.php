<?php
    /*************************************
    Class Name	: cls_scheduler
    Description	: Class used to manage social scheduler
    Include	: Extends model class
    Created By	: sukanta kumar mishra
    Created On	: 08-Sep-2016
    *************************************/
    class cls_twitter_scheduler extends model
    {
        public function manageScheduler($action,$id,$account,$tweetId,$tweetRefId,$userScreenName,$tweetText,$tweetTime,$query,$attr1,$attr2,$attr3,$query2,$query3,$query4,$query5,$query6,$query7){
            $sql	= "CALL USP_MS_SOCIAL_SCHEDULER('$action','$id','$account','$tweetId','$tweetRefId','$userScreenName','$tweetText','$tweetTime','$query','$attr1','$attr2','$attr3','$query2','$query3','$query4','$query5','$query6','$query7');";       
            //if($action=='FCA'){echo $sql; exit;}
            
            $result = Model::executeQry($sql);
            return $result;
        }

        public function importHomeData($rowJob){
            // echo "<pre>";print_r($rowJob);//exit;
            require_once('clsTransactionDataImport.php');
            $objDataImport                   = new clsTransactionDataImport;
            $jobId                           = $rowJob['intJobId'];
            $jobType                         = $rowJob['IntJobType'];
            $UID                             = $rowJob['intAccountId']; // 44- FIR ,46-Citizen service
            $vchScreenName                   = $rowJob['vchScreenName'];
            $vchApiUrl                       = $rowJob['vchPhoto'];
            $vchAccessSecret                 = $rowJob['vchAccessSecret'];
            $intDepartmentId                 = 14;
            
            $startDate = date('Y-m-d',strtotime("-1 days")); 
            $endDate   = date('Y-m-d');            
            //$startDate = '2019-10-18'; 
            //$endDate   = '2019-10-20';            
            $startDateApi = date('d-m-Y',strtotime("-1 days"));
            $endDateApi = date('d-m-Y');
            //$startDateApi = '18-10-2019';
            //$endDateApi = '20-10-2019';
// FOR FIR 
            if($UID==44){
                $intServiceId = 4;                
                $catogoryName ='FIR';
            }else if($UID==45){
                $intServiceId = 6;                
                $catogoryName ='PETITION';
            }
            else if($UID==46){
                $intServiceId = 5;                
                $catogoryName ='SERVICE';
            }
            $dataCntArr = array();
            $dataArr    = array();
            $regdArr    = array();
            $dataArr['startDate']      = $startDate;
            $dataArr['endDate']        = $endDate;
            $dataArr['intServiceId']   = $intServiceId;
            $dataArr['intDepartmentId']   = $intDepartmentId;           
            $dupresult              =  $objDataImport->fetchTransactionDataImport('FSR',$dataArr);
            // echo "<pre>";print_r($dupresult);//exit;
            if($dupresult ->num_rows>0){
            $cnt=0;
                while($duprow=$dupresult->fetch_array()){
                      array_push($regdArr,$duprow['vchRegdNo']);
                }
            }
            $apiUrl      = $vchApiUrl."?StartDate=".$startDateApi."&EndDate=".$endDateApi."&Category=".$catogoryName."&encpwd=".$vchAccessSecret;
            $dataResult  = Model::callAPIGET($apiUrl);      
            //echo '<pre>'; print_r($dataResult); echo '</pre>';//exit;
                    $recordFetched = count($dataResult);
                    $InsertQuery   = '';
                    $validCnt      = 0;
                    $invalidRec    = 0;
                    $duplicateRec  = 0;
                    foreach($dataResult as $apidataResult){
                        $PS        = $apidataResult['PS'];
                        $PS_CD     = $apidataResult['PS_CD'];
                        $DISRTICT  = $apidataResult['DISRTICT'];
                        $DISRTICT_CD  = $apidataResult['DISRTICT_CD'];
                        $Comp_Name = $apidataResult['Comp_Name'];
                        $GENDER    = $apidataResult['GENDER'];
                        $Age       = $apidataResult['Age'];
                                if($PS_CD>0 && $DISRTICT_CD>0 && !empty($Age) && !empty($GENDER) && !empty($Comp_Name)){ 

                                        if($intServiceId==4){
                                                    if(!in_array($apidataResult['FIR_REG_NUM'],$regdArr)){                                            
                                                        $Age = (int)$Age;
                                                        if($GENDER =="Male"){
                                                            $genderId=1;
                                                        }elseif($GENDER =="Female"){
                                                            $genderId=2;
                                                        }else{
                                                            $genderId=3; 
                                                        }
                                                        $Comp_Name    = htmlspecialchars(addslashes($apidataResult['Comp_Name']),ENT_QUOTES);
                                                        $FIR_REG_NUM  = $apidataResult['FIR_REG_NUM'];
                                                        $FIR_NUM      = htmlspecialchars(addslashes($apidataResult['FIR_NUM']),ENT_QUOTES);
                                                        $SECTION      = htmlspecialchars(addslashes($apidataResult['SECTION']),ENT_QUOTES);
                                                        $SLADHEDFIR_DATE = str_replace("/","-",$apidataResult['FIR_DATE']);
                                                        $FIR_DATE     = date('Y-m-d h:i:s',strtotime($SLADHEDFIR_DATE));
                                                    
                                                        $MobileNO     = $apidataResult['MobileNO'];
                                                        $combinedOtherArr['FIR_NUM']= $FIR_NUM; 
                                                        $combinedOtherArr['SECTION']= $SECTION;                          
                                                        $jsonOtherDetail= json_encode($combinedOtherArr);
                                                        $InsertQuery.="('".$Comp_Name."',".$Age.",".$genderId.",'".$PS_CD."','".$DISRTICT_CD."', '".$FIR_REG_NUM."','".$jsonOtherDetail."','".$FIR_DATE."','".$MobileNO."', ".$intDepartmentId.", ".$intServiceId."),";
                                                        
                                                        $validCnt++;  
                                                        }
                                                    else{
                                                        $duplicateRec++;   
                                                    }
                                        }
                                        if($intServiceId==6){
                                                    if(!in_array($apidataResult['COMPL_REG_NUM'],$regdArr)){                   
                                                        $Age = (!empty($apidataResult['Age']))? (int)$apidataResult['Age']:0;
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
                                                        $FIR_REG_NUM  = $apidataResult['COMPL_REG_NUM'];
                                                        $FIR_NUM      = '';
                                                        $SLADHEDFIR_DATE = str_replace("/","-",$apidataResult['COMPLAIN_DATE']);
                                                        $FIR_DATE     = date('Y-m-d h:i:s',strtotime($SLADHEDFIR_DATE));
                                                        $MobileNO     = $apidataResult['MobileNO'];
                                                                            
                                                        $jsonOtherDetail= '';

                                                        $InsertQuery.="('".$Comp_Name."',".$Age.",".$genderId.",'".$PS_CD."','".$DISRTICT_CD."', '".$FIR_REG_NUM."','".$jsonOtherDetail."','".$FIR_DATE."','".$MobileNO."', ".$intDepartmentId.", ".$intServiceId."),";
                                                        $validCnt++;  
                                                    }
                                                    else{
                                                        $duplicateRec++;   
                                                    }



                                        }
                                        if($intServiceId==5){
                                                if(!in_array($apidataResult['REG_NUM'],$regdArr)){
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
                                                            $validCnt++;  
                                                }
                                                else{
                                                    $duplicateRec++;   
                                                }
                                        }

                            
                                }  
                                else {
                                $invalidRec++;
                            }
                    }

                    $InsertQuery       = rtrim($InsertQuery, ',');
                    $dataStr['InsertQuery']=$InsertQuery;
                    //echo '<pre>'; print_r($dataStr); echo '</pre>';exit;
                    $result = $objDataImport->fetchTransactionDataImport('API',$dataStr);
                    $dataCntArr['invalidRec']=$invalidRec;
                    $dataCntArr['duplicateRec']=$duplicateRec;
                    $dataCntArr['validCnt']=$validCnt;
                    $dataCntArr['recordFetched']=$recordFetched;

                    if ($result) {                        
                            if($validCnt>0){
                                $outMsg = 'Record added successfully ';
                            }                           
                            else
                            {
                                $outMsg = 'Nothing Inserted';
                            }
                    }else{
                                $outMsg = 'Error:Occured. Please try again!';
                    }
                    $dataCntArr['outMsg']=$outMsg;

                return $dataCntArr;

        }


        public function importHealthData($rowJob){
        require_once('clsTransactionDataImport.php');
        $objDataImport                   = new clsTransactionDataImport;
        $jobId                           = $rowJob['intJobId'];
        $jobType                         = $rowJob['IntJobType'];
        $UID                             = $rowJob['intAccountId']; // 44- FIR ,46-Citizen service
        $vchScreenName                   = $rowJob['vchScreenName'];
        $vchApiUrl                       = $rowJob['vchPhoto'];
        $vchAccessSecret                 = $rowJob['vchAccessSecret'];
        $intDepartmentId                 = 12;
        $pushArr                         = array();        
       
        $startDateApi = date('d-M-Y',strtotime("-1 days"));
        $endDateApi   = date('d-M-Y',strtotime("-1 days"));

        $dataArr    = array();
        $regdArr    = array();
        $dataArr['startDate']      = $startDate;
        $dataArr['endDate']        = $endDate;
        //$dataArr['intServiceId']   = $intServiceId;
        $dataArr['intDepartmentId']   = $intDepartmentId;           
        $dupresult              =  $objDataImport->fetchTransactionDataImport('FSR',$dataArr);
        // echo "<pre>";print_r($dupresult);//exit;
        if($dupresult ->num_rows>0){
        $cnt=0;
            while($duprow=$dupresult->fetch_array()){
                  array_push($regdArr,$duprow['vchRegdNo']);
            }
        }


        $apiUrl= $vchApiUrl;
        $apiPost='{"primaryKeys":["21101","'.$startDateApi.'","'.$endDateApi.'"]}';
        $dataResult  = Model::callAPIPOST($apiUrl,$apiPost); 
            $dataHeading =  array_map('trim', $dataResult['dataVO']['dataHeading']);;
            $dataValue   =$dataResult['dataVO']['dataValue'];
            // echo '<pre>'; print_r($dataValue); echo '</pre>';exit;
            $recordFetched = count($dataValue);
            $InsertQuery   = '';
            $validCnt      = 0;
            $invalidRec    = 0;
            $duplicateRec  = 0;
            foreach($dataValue as $dataValues){
            $dataitemValues=$dataValues['item'];
            $combinedArr= array_combine($dataHeading,$dataitemValues);
            array_push($pushArr,$combinedArr);
            }
           //  echo '<pre>'; print_r($pushArr); echo '</pre>';
            // exit;
            $x=0;
            foreach($pushArr as $apidataResult){

                //echo '<pre>'; print_r($apidataResult['PATIENTID']); echo '</pre>';exit;
                $PATIENTID       = $apidataResult['PATIENTID'];                
                $PATIENTTYPEID   = $apidataResult['PATIENTTYPEID'];
                $MOBILE          = $apidataResult['MOBILE'];
                $PATIENTNAME     = $apidataResult['PATIENTNAME'];
                $GENDER          = $apidataResult['GENDER'];
                $Age             = $apidataResult['AGE'];
                        if( !empty($PATIENTID)&& ($PATIENTTYPEID>0) && !empty($MOBILE)  && !empty($Age) && !empty($GENDER) && !empty($PATIENTNAME)){  
                            if(!in_array($PATIENTID,$regdArr)){
                                if($GENDER =="Male"){
                                $genderId=1;
                                }elseif($GENDER =="Female"){
                                $genderId=2;
                                }elseif($GENDER =="Transgender"){
                                $genderId=3; 
                                }else{
                                $genderId=0;   
                                }
                                if($PATIENTTYPEID ==1){
                                $serviceId=2;
                                }elseif($PATIENTTYPEID ==2){
                                $serviceId=1;
                                }elseif($PATIENTTYPEID ==3){
                                $serviceId=3; 
                                }
                                $distictId=20;
                                $hispitalId=19;
                                $visitDate =date('Y-m-d');//{''regd_date'':''2019-09-27''}
                                $combinedOtherArr['regd_date']= $visitDate;                           
                                $jsonOtherDetail= json_encode($combinedOtherArr);   

                                $InsertQuery.="('".$intDepartmentId."',".$serviceId.",".$distictId.",'".$PATIENTNAME."', '".$MOBILE."',".$Age.",".$genderId.",".$hispitalId.",'".$visitDate."','".$jsonOtherDetail."','".$PATIENTID."'),";
                                $validCnt++;  
                            }                        
                            else{
                                $duplicateRec++;   
                            }
                        }else{
                            $invalidRec++;
                        }
            
            }


            $dataCntArr['invalidRec']=$invalidRec;
            $dataCntArr['duplicateRec']=$duplicateRec;
            $dataCntArr['validCnt']=$validCnt;
            $dataCntArr['recordFetched']=$recordFetched;

            $InsertQuery       = rtrim($InsertQuery, ',');
            $dataStr['InsertQuery']=$InsertQuery;
           // echo '<pre>'; print_r($dataCntArr); echo '</pre>';exit;
            $result = $objDataImport->fetchTransactionDataImport('APIH',$dataStr);
            

            if ($result) {                        
                    if($validCnt>0){
                        $outMsg = 'Record added successfully ';
                    }                           
                    else
                    {
                        $outMsg = 'Nothing Inserted';
                    }
            }else{
                        $outMsg = 'Error:Occured. Please try again!';
            }
            $dataCntArr['outMsg']=$outMsg;

        return $dataCntArr;





        }





        public function importfacebookAnalytics($accountType,$accountId,$pageId,$vchAccessToken){
            $VAL = array(15=>'page_fans',16=>'page_fans_city',17=>'page_fans_country',18=>'page_fans_gender_age',9=>'page_fans_online_per_day',12=>'page_fan_removes',11=>'page_fan_adds');
            //define('FBMETRICS', $VAL); // not working in staging server. :: removed on:02-08-2017 
            //$accountId  = $accountId;
            //$pageId = '214515285554134';
            //$vchAccessToken = 'EAAY3X9QB8eoBAEXMj6rMxMhQsmEXqyADNZAdIhGPBlmEj8DwxYF6jbGiVDEceDna6350KrJhNprnB3TIClFrDzYPl9eyp6ZAkf8xfwQ5KJv1oCVZAntzfgjZBhobUAegYIRDFxcdcAdvYm6aVSidwItExTDgoQfCvntZCfHB0gESnlRfLMghiPZC0kZAWBtWzEZD';
            //date_default_timezone_set("UTC");            
         
            //echo date('H');exit;
            if(date('H')>=13)
            {
            $datem = date('Y-m-d', strtotime('-1 day'));
            include_once( CLASS_PATH.'clsFanAnalysis.php');
            $objFan               = new clsFanAnalysis;
            $resultd              = $objFan->fanNobsLocation('CD',$accountId,'','',$datem,0,0,'','');
            $rowd                 = $resultd->fetch_array(); 
            $recCount             = $rowd['recCount'];
            if($recCount>0)
            {
                $msg    = 'Data already inserted' ;
                $ctrl   = 0;
            }
            else
            {
            $time = strtotime(date('Y-m-d H:i:s') . '-1 days');
            //exit;
            $since      = "&since=". $time;
            $fields     = "page_fans,page_fans_city,page_fans_country,page_fans_gender_age";
           
           
            $json_link  = "https://graph.facebook.com/" . $pageId . "/insights?access_token=" . $vchAccessToken . "&metric=" . $fields . $since.'&period=lifetime&limit=100';
           
            $json           = file_get_contents($json_link);
            $objArrData     = json_decode($json, true);
            $objArr         = $objArrData['data'];
          //print_r($objArr);//exit;
            $count          = count($objArr);
            $ctrl           = 0;// Added BY :Ashok kumar Samal:: ON: 10-07-2017
            $cntMet1        = 0;
            $cntMet2        = 0;
            $cntMet3        = 0;
            // $importArr      = array();
            // $metArr1        = array();
             if($count>0){
                    foreach ($objArr as $objArrs) {
                      
                    $metricName     = $objArrs['name'];
                    $metricid       = array_search($metricName, $VAL);
                    if($metricid==15)
                    {
                    $values         = $objArrs['values'][0]['value'];
                    $end_time       = date('Y-m-d',strtotime($objArrs['values'][0]['end_time']));
                    
                    $query1         .= '('.$accountId.',"'.$metricid.'","'.$values.'","'.$end_time.'"),';
                    $cntMet1++;                 
                    }
                    
                    if($metricid==16 || $metricid==17)
                    {
                        $valuesArr         = $objArrs['values'][0]['value'];
                        $end_time2          = date('Y-m-d',strtotime($objArrs['values'][0]['end_time']));

                        foreach ($valuesArr as $key => $value) {
                         $query2         .= '('.$accountId.',"'.$metricid.'","'.$key.'","'.$value.'","'.$end_time2.'"),';
                         $cntMet2++;  
                        }
                    }
                    if($metricid==18)
                    {
                        $valuesArr3         = $objArrs['values'][0]['value'];
                        $end_time3          = date('Y-m-d',strtotime($objArrs['values'][0]['end_time']));

                        foreach ($valuesArr3 as $key3 => $value3) {
                        $keyArr           = explode('.', $key3);
                        $gender           = $keyArr[0];
                        $ageGroup         = $keyArr[1];
                        $query3         .= '('.$accountId.',"'.$metricid.'","'.$gender.'","'.$ageGroup.'","'.$value3.'","'.$end_time3.'"),'; 
                        $cntMet3++;   
                        }
                    }
                    
                    //echo $metricid."=================";    
                    $ctrl++;// Added BY :Ashok kumar Samal:: ON: 10-07-2017
                    }
                    
                    }
                    
                $fields2       = 'page_impressions,page_impressions_by_country_unique,page_impressions_by_age_gender_unique,page_engaged_users,page_post_engagements,page_consumptions,page_negative_feedback,page_fans_online,page_fans_online_per_day,page_actions_post_reactions_total,page_fan_adds,page_fan_removes,page_views_total,page_posts_impressions';
                $json_link2    = "https://graph.facebook.com/" . $pageId . "/insights?access_token=" . $vchAccessToken . "&metric=" . $fields2 . $since.'&period=day&limit=100';
                $json2         = file_get_contents($json_link2);
                $objArrData2   = json_decode($json2, true);
                $objArr2       = $objArrData2['data'];
                $count2        = count($objArr2);   
               // echo "<pre>";print_r($objArr2);    exit;
                  if($count2>0){
                    foreach ($objArr2 as $objArrs2) {
                    $metricName2     = $objArrs2['name'];
                   
                    $metricid2       = array_search($metricName2, $VAL);
                     //echo $metricid2."====";
                    if($metricid2==9 || $metricid2==11 || $metricid2==12)
                    {
                    $values2         = $objArrs2['values'][0]['value'];
                    $end_time2       = date('Y-m-d',strtotime($objArrs2['values'][0]['end_time']));
                    
                    $query1         .= '('.$accountId.',"'.$metricid2.'","'.$values2.'","'.$end_time2.'"),';                
                    }
                    }  
                  }
                    
                    
                    
                    if($query1!=''){
                        $query1	= substr($query1,0,-1); 
                    }
                    if($query2!=''){
                        $query2	= substr($query2,0,-1); 
                    }
                    if($query3!=''){
                        $query3	= substr($query3,0,-1); 
                    }
                     //echo $query1;exit;
                    
                    $result     = $this->manageScheduler('FAN',0,$accountId,'','','','','',$query1,0,0,0,$query2,$query3,'','','','');
                    $resultRow  = $result->fetch_array();
                    $status     = $resultRow['@P_STATUS'];
                    if($status==0){
                        $msg = 'Data Imported Successfully';
                    }
                    else{
                        $msg = 'No Records To Import';
                    }
             
                }
            }
            else
            {
               $msg = 'You can not insert analytic befor 1:00 PM IST';
               $ctrl = 0;
            }
            
           
            return array('msg'=>$msg,'count'=>$ctrl); // Added BY :Ashok kumar Samal:: ON: 10-07-2017
            
            //echo "<pre>";print_r($objArr);exit;
            
            
            //return array('msg'=>$msg);
        }
        
        
        
        
        public function findCronJob($vchAction,$intJobType,$intJobId=0){ 
        $resultJob               = $this->manageScheduler($vchAction,$intJobId,'','','','','','','',$intJobType,0,0,'','','','','','');
        return $resultJob;
        }

        public function UpdateManualCronJob($vchAction,$intJobId,$intJobType){
        $resultJob               = $this->manageScheduler($vchAction,$intJobId,'','','','','','','',$intJobType,0,0,'','','','','','');
        return $resultJob;
        }


        public function UpdateLastCronTime($vchAction,$jobId,$userId,$intJobType,$mode=1,$message='',$recordFetched=0,$validCnt=0,$invalidRec=0,$duplicateRec=0){
            $startTime = $_SESSION['START']['ACC'.$jobId];
            $endTime   = $_SESSION['END']['ACC'.$jobId];
        $resultJob               = $this->manageScheduler($vchAction,$jobId,'','','','','',$endTime,$startTime,$intJobType,$userId,$mode,$message,$recordFetched,$validCnt,$invalidRec,$duplicateRec,'');
        return $resultJob;
        }
        
       
        
        
    }

?>
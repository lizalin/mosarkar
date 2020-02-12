<?php
/**
 * Description of clsTransactionDataImport
 * 
 * @author Chinmayee
 * @date  24-09-2019
 */
class clsTransactionDataImport extends Model {

    private function manageTransactionDataImport($action, $arrCondition) {

        //print_r($arrCondition);exit;
        $operatorResult = $this->callProc('USP_MG_SERVICE_TRANSACTION_IMPORT', $action, $arrCondition);

        /* Activity log Tracker End */
        return $operatorResult;
    }
    
    /*Action: Read, */
    public function transactionDataImport() {
        $dataStr                = array();
        $logData                = array();
        $query                  = '';
        $uploadPath             = SITE_PATH.'temp/';
        $fileProgress           = $_FILES['vchExcelFile']['name']; 
        $fileSize               = $_FILES['vchExcelFile']['size'];
        $fileTemp               = $_FILES['vchExcelFile']['tmp_name']; 
        $intDepartmentId        = $_POST['vchDepartmentId']; 
        $intServiceId           = $_POST['intServiceId']; 
        $withFeedback           = $_POST['dataType'];
      // exit;

        $ext                    = pathinfo($fileProgress, PATHINFO_EXTENSION);
        $fileProgress           = ($fileProgress != '')?'TraineeDetails'.date("Ymd_His").'.'.$ext:'';
        $fileMimetype           = ($fileProgress != '')?mime_content_type($fileTemp):'';

        if ($ext!="xls") {
            $flag=0;
            $outMsg = 'Upload .xls file only';
      
           }else{



                    if(move_uploaded_file($fileTemp,$uploadPath.$fileProgress))
                    {
                        chmod($uploadPath.$fileProgress, 0777);
                            include (SITE_PATH.'spreadSheetReader/excel_reader.php');     // include the class

                            // creates an object instance of the class, and read the excel file data
                        $excel = new PhpExcelReader; 
                        $excel->read($uploadPath.$fileProgress); 
                        $nr_sheets = count($excel->sheets);       // gets the number of sheets
                        $excel_data = ''; 
                        $arrRow  = array();                         // to store the the html tables with data of each sheet
                        // traverses the number of sheets and sets html table with each sheet data in $excel_data
                        //for($i=0; $i<$nr_sheets; $i++) 
                       // {
                            //echo $i;exit;
                        $flag        =1;
                        array_push($arrRow, $excel->sheets[0]);
                        $arrRow         =  json_encode(($arrRow)); //print_r($excel->sheets[0]);exit;
                        if($withFeedback           ==5)
                        {///If Raw data
                        $excel_data_res = $this->sheetData($excel->sheets[0],$intDepartmentId,$intServiceId,$arrRow) ;//.'<br/>';


                        $error_flag     =$excel_data_res['flag'];
                        if($error_flag ==1)
                        {
                        $excel_data= "Error : ". "file could not be uploaded";
                        $flag=0;
                        }else{
                        $excel_data     .=$excel_data_res['idata'].',';
                        $flag=1;
                        }
                    
                   // }
                    if($flag==1){
                        
                        $logData['jobId']          = 1;
                        $logData['vchScreenName']  = 'Service Transcation Excel Import';
                        $logData['jobName']        = 'Excel Import';
                        $logData['vchUserName']    = $_SESSION['adminConsole_FullName'];  
                        $logData['counterArr']     = $excel_data_res['counterArr'];                        
                        $dataStr['excel_data_query']       = rtrim($excel_data, ',');
                        $dataStr['intDepartmentId']        = $intDepartmentId;
                        $dataStr['intServiceId']           = $intServiceId;
                        $result = $this->manageTransactionDataImport('A',$dataStr);
                        if ($result) {
                            $outMsg = 'Record added successfully ';
                            $flag=1;
                            $logData['msg'] = $outMsg;
                            $_SESSION['END']['ACC1'] =date('h:i:s');
                        }else{
                            $outMsg = 'Error:Occured. Please try again!';
                            $flag=0;
                            $logData['msg'] = $outMsg;
                            $logData['counterArr']     = '';
                            $_SESSION['END']['ACC1'] =date('h:i:s');
                        }
                        $result1 = $this->writeToLog($logData,'EXCEL_IMPORT');

                    }else{
                        $outMsg =$excel_data_res['idata'];
                        $flag=0; 
                    }







                        } else{
                        $excel_data_res = $this->sheetDataFeedback($excel->sheets[0],$intDepartmentId,$intServiceId,$arrRow) ;//.'<br/>'; 
                        $outMsg =$excel_data_res['insertStr'];
                        $flag=0; 
                        
                        }
                        
                           //print_r($excel->sheets[0]); exit;
                        
                    }
                    else
                    {
                        $excel_data= "Error : ". "file could not be uploaded";
                        $flag=0;
                    }
                }
        $arrResult = array('flag'=>$flag,'excel_data'=>$excel_data,'arrRow'=>$arrRow,'msg'=>$outMsg);

        return $arrResult;

    }

//Function for preparing multiple insert query from spread Sheet :: Chinmayee :: 23-09-2019

    public function sheetData($sheet,$intDepartmentId,$intServiceId,$arrRow) 
    {   
      $re                       = '';
      $error_flag               = 0; 
           
      $totalrow1                = json_decode($arrRow,true);     
      $firstRow1                = array();
      $queryRow1                = array();
      $queryRow1                = array();
      $ctr1                     = 1;
      
               if(count($totalrow1)>0) 
               {
                $firstRow1=$totalrow1[0]['cells'];                
                $allcolName   = array_map('strtolower', $firstRow1[1]); //print_r($allcolName);exit;
                $matchedCol   = array_intersect(REQUIED_XLS_COL, $allcolName);
                $extraCol     = array_diff($allcolName,REQUIED_XLS_COL);
                $x=0;
                foreach($extraCol as $extCol){
                   $extraColLeft[$x]=$extCol; 
                   $x++;                 
                }               
                if(count($matchedCol)==count(REQUIED_XLS_COL)){
                    $error_flag=0;                   
                    $insertStr='';
                    $success=0;
                    $fail=0;
                    $rec_cnt=0;
                    $_SESSION['START']['ACC1'] =date('h:i:s');
                    //echo '<pre>';print_r($firstRow1);exit;
                    foreach ($firstRow1 as $row22) 
                    {  $record_error             = 0;                     
                       
                        if($ctr1>1)
                            { $rec_cnt++;
                                        $jsonOtherDetail= '';
                                        $combinedArr= array_combine($allcolName,$row22);
                                        $Name                   = (!empty($combinedArr['name']))?$combinedArr['name']:'';
                                        $Mobile                 = (!empty($combinedArr['mobile']))?$combinedArr['mobile']:'';
                                        $District               = (!empty($combinedArr['district']))?$combinedArr['district']:'';
                                        // $Date                   = (strtotime($combinedArr['Date'])>0)?date('Y-m-d h:i:s',strtotime($combinedArr['Date'])):'0000-00-00 00:00:00';
                                        // $Date                   = (!empty($combinedArr['Date']))?date('Y-m-d h:i:s',strtotime($combinedArr['Date'])):'';
                                        $Age                    = (!empty($combinedArr['age']))?$combinedArr['age']:'0';
                                        $Gender                 = (!empty($combinedArr['gender']))?$combinedArr['gender']:'';                           
                                        $districtId             = $this->getDistrictId($District);
                                        $District               = $districtId;
                                        $ps_hs_id               = (!empty($combinedArr['ps_hs_id']))?$combinedArr['ps_hs_id']:'0'; 
                                        
                                                if('male' == strtolower($Gender) ){
                                                    $genderId =1;
                                                }else if('female' == strtolower($Gender)){
                                                    $genderId =2; 
                                                }else if('transgender' == strtolower($Gender)){
                                                    $genderId =3; 
                                                }
                                                else{
                                                    $genderId =$Gender;   
                                                }
                                                $Gender=$genderId;                         
                                                    $otherArray = array();
                                                    foreach($extraColLeft as $extrCol){                        
                                                        array_push($otherArray,$combinedArr[$extrCol]);
                                                    }
                                                    if(!is_numeric($Mobile)){
                                                        $record_error   = 1;
                                                        //echo 1;
                                                    }
                                                    if(!strlen($Mobile)==10 ){
                                                        $record_error   = 1;
                                                        //echo 2;
                                                    }
                                                    // if(!is_numeric($Age)){
                                                    //     $record_error   = 1;
                                                    //     //echo 3;
                                                    // }
                                                    if(!is_numeric($Gender)){
                                                        $record_error   = 1;
                                                        //echo 4;
                                                    }
                                                    if($ps_hs_id==0){
                                                        $record_error   = 1;
                                                        //echo 4;
                                                    }

                                        $combinedOtherArr= array_combine($extraColLeft,$otherArray);                           
                                        $jsonOtherDetail= json_encode($combinedOtherArr); 
                                        if($record_error   == 0){  $success++;                   
                                             $insertStr="(".$intDepartmentId.",".$intServiceId.",'".$Name."',".$Mobile.",".$District.",".$Age.",".$Gender.",'".$jsonOtherDetail."',1,".$ps_hs_id."),";

                                        }else{
                                             $fail++;
                                        }




                            }
                       $ctr1++;
                    }
                    $insertStr       = rtrim($insertStr, ',');
                    $counterArr['total'] =$rec_cnt;
                    $counterArr['success'] =$success;
                    $counterArr['fail'] =$fail;
               
                }else{
                    $error_flag=1;
                    $insertStr = "Error:Invalid File Format";
                }
                 
                }else{
                    $error_flag=1;
                    $insertStr = "Error:Occured"; 
                }
                
                $arrResult = array('flag' => $error_flag,'idata'=>$insertStr,'counterArr'=>$counterArr);
                return $arrResult ;
    }





//Function for preparing multiple insert query from spread Sheet :: Chinmayee :: 23-09-2019

public function sheetDataFeedback($sheet,$intDepartmentId,$intServiceId,$arrRow) 
{   
  $re                       = '';
  $error_flag               = 0; 
   
  $totalrow1                = json_decode($arrRow,true);     
  $firstRow1                = array();
  $queryRow1                = array();
  $queryRow1                = array();
  $ctr1                     = 1;
  //print_r($sheet);exit;
           if(count($totalrow1)>0) 
           {
            $firstRow1=$totalrow1[0]['cells'];                
            $allcolName   = array_map('strtolower', $firstRow1[1]); 
            $matchedCol   = array_intersect(REQUIED_XLS_COL, $allcolName);
            
                          
            if(count($matchedCol)==count(REQUIED_XLS_COL)){
                $error_flag=0;                   
                $insertStr='';
                $success=0;
                $fail=0;
                $successInsert=0;
                $failInsert=0;
                $rec_cnt=0;
                

                //$extraCol     = array_diff($allcolName,REQUIED_XLS_COL);
                $requiredCol=REQUIED_XLS_COL;
                $Question1              = $firstRow1[1][8];
                $Question2              = $firstRow1[1][9];
                $Remarks1               = $firstRow1[1][10];
                $Question3              = $firstRow1[1][11];
                $Question4              = $firstRow1[1][12];
                $Remarks4               = $firstRow1[1][13];
                $Question5              = $firstRow1[1][14];
                $Question6              = $firstRow1[1][15];
                $Question7              = $firstRow1[1][16];
                $Remarks7               = $firstRow1[1][17];                
                $Feedback               = $firstRow1[1][19];
                $CallingDate            = $firstRow1[1][20];
                $departmentid           = $firstRow1[1][1];
                $serviceid              = $firstRow1[1][2];

                 array_push($requiredCol,$Question1);
                 array_push($requiredCol,$Question2);
                 array_push($requiredCol,$Remarks1);
                 array_push($requiredCol,$Question3);
                 array_push($requiredCol,$Question4);
                 array_push($requiredCol,$Remarks4);
                 array_push($requiredCol,$Question5);
                 array_push($requiredCol,$Question6);
                 array_push($requiredCol,$Question7);
                 array_push($requiredCol,$Remarks7);
                 array_push($requiredCol,$Feedback);
                 array_push($requiredCol,$CallingDate);
                 array_push($requiredCol,$departmentid);
                 array_push($requiredCol,$serviceid);
                 $requiredCol=array_map('strtolower',$requiredCol);
                 $extraCol     = array_diff($allcolName,$requiredCol);
                 $x=0;
                 foreach($extraCol as $extCol){
                    $extraColLeft[$x]=$extCol; 
                    $x++;                 
                 } 



                
                foreach ($firstRow1 as $row22) 
                {  $record_error             = 0;                     
                    $_SESSION['START']['ACC1'] =date('h:i:s');   
                    if($ctr1>1)
                        { $rec_cnt++;
                                    $jsonOtherDetail= '';
                                    $insertStr ='';
                                   // $combinedArr= array_combine($allcolName,$row22);
                                    //echo '<pre>';print_r($row22);exit;
                                    $Name                   = (!empty($row22['4']))?$row22['4']:'';
                                    $Mobile                 = (!empty($row22['5']))?$row22['5']:'';
                                    $District               = (!empty($row22['3']))?$row22['3']:'0';                                    
                                    $Age                    = (!empty($row22['6']))?$row22['6']:'';
                                    $Gender                 = (!empty($row22['7']))?$row22['7']:'';
                                    $ps_hs_id               = (!empty($row22['8']))?$row22['8']:'0';
                                    $Question1              = (!empty($row22[9]))?$row22[9]:'';
                                    $Question2              = (!empty($row22[10]))?$row22[10]:'';
                                    $Remarks2               = (!empty($row22[11]))?$row22[11]:'';
                                    $Question3              = (!empty($row22[12]))?$row22[12]:'';
                                    $Question4              = (!empty($row22[13]))?$row22[13]:'';
                                    $Remarks4               = (!empty($row22[14]))?$row22[14]:'';
                                    $Question5              = (!empty($row22[15]))?$row22[15]:'';
                                    $Question6              = (!empty($row22[16]))?$row22[16]:'';
                                    $Question7              = (!empty($row22[17]))?$row22[17]:'';
                                    $Remarks7               = (!empty($row22[18]))?$row22[18]:'';
                                    $FeedbackStatus         = (!empty($row22[19]))?$row22[19]:'0';
                                    $Feedback               = (!empty($row22[20]))?$row22[20]:'';
                                    $CallingDate            = (strtotime($row22[21])>0)?date('Y-m-d h:i:s',strtotime($row22[21])):'0000-00-00 00:00:00';;
                                    $questionAnswerQuery='';
                                    if(!empty($Question1)){
                                            $arrCondition1['answerSlno']=$Question1;
                                            $arrCondition1['intDepartmentId']=$intDepartmentId;
                                            $arrCondition1['intServiceId']=$intServiceId;
                                            $arrCondition1['questionSlno']=1;
                                            $Question1Res=$this->manageTransactionDataImport('FQD', $arrCondition1);
                                            if($Question1Res->num_rows>0){
                                                $Question1ResRow=$Question1Res->fetch_array();
                                                $RETURNVAL=$Question1ResRow['@RETURNVAL'];
                                            }
                                            $explodeRETURNVAL1=explode('~~',$RETURNVAL);
                                            $question1Id =$explodeRETURNVAL1[0];
                                            $Answer1Ids  =$explodeRETURNVAL1[1];
                                            if($FeedbackStatus==1){
                                        
                                                $questionAnswerQuery.="(@FBCID,".$question1Id.",'".$Answer1Ids."',''),";
                                            }
                                    }else{
                                           
                                    }
                                    if(!empty($Question2)){
                                        $arrCondition2['answerSlno']=$Question2;
                                        $arrCondition2['intDepartmentId']=$intDepartmentId;
                                        $arrCondition2['intServiceId']=$intServiceId;
                                        $arrCondition2['questionSlno']=2;
                                        $Question2Res=$this->manageTransactionDataImport('FQD', $arrCondition2);
                                        if($Question2Res->num_rows>0){
                                            $Question2ResRow=$Question2Res->fetch_array();
                                            $RETURNVAL2=$Question2ResRow['@RETURNVAL'];
                                        }
                                        $explodeRETURNVAL2=explode('~~',$RETURNVAL2);
                                        $question2Id =$explodeRETURNVAL2[0];
                                        $Answer2Ids  =$explodeRETURNVAL2[1];
                                        $questionAnswerQuery.="(@FBCID,".$question2Id.",'".$Answer2Ids."','".$Remarks2."'),";
                                   }  
                                   if(!empty($Question3)){
                                    $arrCondition3['answerSlno']=$Question3;
                                    $arrCondition3['intDepartmentId']=$intDepartmentId;
                                    $arrCondition3['intServiceId']=$intServiceId;
                                    $arrCondition3['questionSlno']=3;
                                    $Question3Res=$this->manageTransactionDataImport('FQD', $arrCondition3);
                                    if($Question3Res->num_rows>0){
                                        $Question3ResRow=$Question3Res->fetch_array();
                                        $RETURNVAL=$Question3ResRow['@RETURNVAL'];
                                    }
                                    $explodeRETURNVAL3=explode('~~',$RETURNVAL);
                                    $question3Id =$explodeRETURNVAL3[0];
                                    $Answer3Ids  =$explodeRETURNVAL3[1];

                                    $questionAnswerQuery.="(@FBCID,".$question3Id.",'".$Answer3Ids."',''),";
                                   }
                                   if(!empty($Question4)){
                                    $arrCondition4['answerSlno']=$Question4;
                                    $arrCondition4['intDepartmentId']=$intDepartmentId;
                                    $arrCondition4['intServiceId']=$intServiceId;
                                    $arrCondition4['questionSlno']=4;
                                    $Question4Res=$this->manageTransactionDataImport('FQD', $arrCondition4);
                                    if($Question4Res->num_rows>0){
                                        $Question4ResRow=$Question4Res->fetch_array();
                                        $RETURNVAL=$Question4ResRow['@RETURNVAL'];
                                    }
                                    $explodeRETURNVAL4=explode('~~',$RETURNVAL);
                                    $question4Id =$explodeRETURNVAL4[0];
                                    $Answer4Ids  =$explodeRETURNVAL4[1];
                                    $questionAnswerQuery.="(@FBCID,".$question4Id.",'".$Answer4Ids."','".$Remarks4."'),";
                                  }
                                  if(!empty($Question5)){
                                    $arrCondition5['answerSlno']=$Question5;
                                    $arrCondition5['intDepartmentId']=$intDepartmentId;
                                    $arrCondition5['intServiceId']=$intServiceId;
                                    $arrCondition5['questionSlno']=5;
                                    $Question5Res=$this->manageTransactionDataImport('FQD', $arrCondition5);
                                    if($Question5Res->num_rows>0){
                                        $Question5ResRow=$Question5Res->fetch_array();
                                        $RETURNVAL=$Question5ResRow['@RETURNVAL'];
                                    }
                                    $explodeRETURNVAL5=explode('~~',$RETURNVAL);
                                    $question5Id =$explodeRETURNVAL5[0];
                                    $Answer5Ids  =$explodeRETURNVAL5[1];
                                    $questionAnswerQuery.="(@FBCID,".$question5Id.",'".$Answer5Ids."',''),";
                                  }
                                  if(!empty($Question6)){
                                    $arrCondition6['answerSlno']=$Question6;
                                    $arrCondition6['intDepartmentId']=$intDepartmentId;
                                    $arrCondition6['intServiceId']=$intServiceId;
                                    $arrCondition6['questionSlno']=6;
                                    $Question6Res=$this->manageTransactionDataImport('FQD', $arrCondition6);
                                    if($Question6Res->num_rows>0){
                                        $Question6ResRow=$Question6Res->fetch_array();
                                        $RETURNVAL=$Question6ResRow['@RETURNVAL'];
                                    }
                                    $explodeRETURNVAL6=explode('~~',$RETURNVAL);
                                    $question6Id =$explodeRETURNVAL6[0];
                                    $Answer6Ids  =$explodeRETURNVAL6[1];
                                    $questionAnswerQuery.="(@FBCID,".$question6Id.",'".$Answer6Ids."',''),";

                                  }
                                  if(!empty($Question7)){
                                    $arrCondition7['answerSlno']=$Question7;
                                    $arrCondition7['intDepartmentId']=$intDepartmentId;
                                    $arrCondition7['intServiceId']=$intServiceId;
                                    $arrCondition7['questionSlno']=7;
                                    $Question7Res=$this->manageTransactionDataImport('FQD', $arrCondition7);
                                    if($Question7Res->num_rows>0){
                                        $Question7ResRow=$Question7Res->fetch_array();
                                        $RETURNVAL=$Question7ResRow['@RETURNVAL'];
                                    }
                                    $explodeRETURNVAL7=explode('~~',$RETURNVAL);
                                    $question7Id =$explodeRETURNVAL7[0];
                                    $Answer7Ids  =$explodeRETURNVAL7[1];
                                    $questionAnswerQuery.="(@FBCID,".$question7Id.",'".$Answer7Ids."','".$Remarks7."'),";
                                  }

                                   //echo 'chimnayee'; exit;  
                                    $feebackQuery="";
                                   if($FeedbackStatus!=0){
                                    $feebackQuery .="(@OBID,'".$CallingDate."','".$Feedback."',".$FeedbackStatus.",1)";
                                   }
                                    
                                    






                                    $otherArray = array();
                                    if(!empty($extraColLeft)){
                                            foreach($extraColLeft as $extrCol){                        
                                                array_push($otherArray,$combinedArr[$extrCol]);
                                            }
                                    }
                                    if(!is_numeric($Mobile)){
                                        $record_error   = 1;
                                        //echo 1;
                                    }
                                    if(!strlen($Mobile)==10 ){
                                        $record_error   = 1;
                                        //echo 2;
                                    }
                                    if(!is_numeric($Age)){
                                        $record_error   = 1;
                                        //echo 3;
                                    }
                                    if(!is_numeric($Gender)){
                                        $record_error   = 1;
                                        //echo 4;
                                    }
                                  if(!empty($extraColLeft)){
                                            $combinedOtherArr= array_combine($extraColLeft,$otherArray);                           
                                            $jsonOtherDetail= json_encode($combinedOtherArr); 
                                   } 


                                    if($record_error   == 0){  $success++;                   
                                         $insertStr.="(".$intDepartmentId.",".$intServiceId.",'".$Name."',".$Mobile.",".$District.",".$Age.",".$Gender.",'".$jsonOtherDetail."',1,".$FeedbackStatus.", ".$ps_hs_id.")";
                                    }else{
                                         $fail++;
                                    }






                                    $questionAnswerQuery       = rtrim($questionAnswerQuery, ',');
  
                                    $logData['jobId']          = 1;
                                    $logData['vchScreenName']  = 'Service Transcation Excel Import';
                                    $logData['jobName']        = 'Excel Import';
                                    $logData['RowNumber']      = $ctr1;
                                    $logData['vchUserName']    = $_SESSION['adminConsole_FullName']; 
                                                         
                                    
                                    $dataStr['intDepartmentId']        = $intDepartmentId;
                                    $dataStr['intServiceId']           = $intServiceId;
                                    $dataStr['insertStr']              = $insertStr;
                                    $dataStr['questionAnswerQuery']    = $questionAnswerQuery;
                                    $dataStr['feebackQuery']           = $feebackQuery;
                                    $dataStr['FeedbackStatus']         = $FeedbackStatus;


//echo '<pre>';print_r($dataStr);exit;
                                    $result = $this->manageTransactionDataImport('AF',$dataStr);
                                    if ($result) {
                                        $outMsg = 'Record added successfully ';
                                        $flag=1;
                                        $logData['msg'] = $outMsg;
                                        $_SESSION['END']['ACC1'] =date('h:i:s');
                                        //$success++; 
                                    }else{
                                        $outMsg = 'Error:Occured. Please try again!';
                                        $flag=0;
                                        $logData['msg'] = $outMsg;
                                       // $logData['counterArr']     = '';
                                        $_SESSION['END']['ACC1'] =date('h:i:s');
                                    }
                                    $result1 = $this->writeToLog($logData,'EXCEL_IMPORT');












                        }
                   $ctr1++;
                }
                 $insertStr       = $outMsg;
                // $counterArr['total'] =$rec_cnt;
                // $counterArr['success'] =$success;
                // $counterArr['fail'] =$fail;
           
            }else{
                $error_flag=1;
                $insertStr = "Error:Invalid File Format";
            }
             
            }else{
                $error_flag=1;
                $insertStr = "Error:Occured"; 
            }
            
            $arrResult = array('flag' => $error_flag,'insertStr'=>$insertStr);
            return $arrResult ;
}

// Function for managing the clsTransactionDataImport :: Chinmayee :: 24-09-2019

    public function fetchTransactionDataImport($vchAction,$dataArr=array()){
        $arrResult  = $this->manageTransactionDataImport($vchAction,$dataArr);
        return $arrResult;
    }
}
?>
<?php
    /*************************************
    Class Name	: clsCronConfig
    Description	: Class used to configure cronjob 
    Include	    : Extends model class
    Created By	: Ashok kumar Samal
    Created On	: 08-Sep-2016
    *************************************/
    class clsCronConfig extends model
    {

        private function manageCronConfig($vchAction,$intId,$intJobType,$vchJobName,$intAccountId,$vchDuration,$txtLastMessage,$intAttr1,$intAttr2,$vchAttr3,$vchAttr4,$dtAttr5)
        {
            $dtAttr5= ($dtAttr5=='0000-00-00')?'1970-01-01':$dtAttr5;
          
            $sql	= "CALL USP_MS_CRON_CONFIG('$vchAction',$intId,$intJobType,'$vchJobName',$intAccountId,'$vchDuration','$txtLastMessage',$intAttr1,$intAttr2,'$vchAttr3','$vchAttr4','$dtAttr5');";       
            //echo '<br><br><br><br>'.$sql;//exit;
            
            $result = Model::executeQry($sql);
            return $result;
        }

        public function viewData($vchAction,$intId,$intJobType,$vchJobName,$intAccountId,$vchDuration,$txtLastMessage,$intAttr1,$intAttr2,$vchAttr3,$vchAttr4,$dtAttr5)
        {
            $result = $this->manageCronConfig($vchAction,$intId,$intJobType,$vchJobName,$intAccountId,$vchDuration,$txtLastMessage,$intAttr1,$intAttr2,$vchAttr3,$vchAttr4,$dtAttr5);
            return $result;
        }

        public function addUpdateCronjob($intJobId) 
        {
            
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];
            if ($newSessionId == $hdnPrevSessionId) 
            {   
                $userId                  = $_SESSION['adminConsole_userID'];

                $selJobType              = !empty($_POST['selJobType'])?$_POST['selJobType']:0;
                
                $selUser                 = ($_POST['selUser']>0)?$_POST['selUser']:0;

                $txtFrequency            = !empty($_POST['txtFrequency'])?$_POST['txtFrequency']:'';
                $blankFrequency          = Model::isBlank($txtFrequency);
               // $errFrequency            = Model::isSpclChar($_POST['txtFrequency']);
                $lenFrequency            = Model::chkLength('max', $txtFrequency,16);

                
                $txtJobName              = htmlspecialchars(($_POST['txtJobName']), ENT_QUOTES);
                $blankJobName            = Model::isBlank($txtJobName);
                //$errJobName              = Model::isSpclChar($_POST['txtJobName']);
                $lenJobName              = Model::chkLength('max', $txtJobName,500);
                
                $outMsg                 = '';
                $flag                   = ($intJobId != 0) ? 1 : 0;
                $action                 = ($intJobId == 0) ? 'A' : 'U';
                $errFlag                = 0 ;

                if($lenFrequency>0 ||  $lenJobName>0 )
                {
                        $errFlag    = 1;
                        $outMsg     = "Length should not excided maxlength";
                        $flag       = 1;
                }
                else if(($errFrequency>0) || ($errJobName>0))
                {
                        $errFlag    = 1;
                        $outMsg     = "Special Characters are not allowed";
                        $flag       = 1;
                }
                else if(count($selUser)==0)
                {
                        $errFlag    = 1;
                        $outMsg     = "Please Select At least one user";
                        $flag       = 1;
                }
                // Check for duplicate data By : Ashok kumar Samal :: ON: 06-07-2017
                    $success        = 0;
                    $fail           = '';
                    $failCnt        = 0;
                
                    /*foreach ($selUser as $cdUser)
                    {            
                        $chkDup = $this->manageCronConfig('CD',0,$selJobType,$txtJobName,$cdUser,'','',0,0,'','','0000-00-00');
                        $cdRow  = $chkDup->fetch_array();
                        if ($cdRow[0] == 0)
                        { 
                            $success++;
                        } 
                        else 
                        {
                            $fail .= $cdRow[0] . ',';
                            $failCnt++;                           
                        }
                    }

                    if($failCnt>0)
                    {
                        $errFlag    = 1;
                        $flag       = 1;
                        $outMsg     = $fail." Duplicate Record(S) Exist";
                    }*/

                $chkDup = $this->manageCronConfig('CD',$intJobId,$selJobType,$txtJobName,$selUser,'','',0,0,'','','0000-00-00');
                        $cdRow  = $chkDup->fetch_array();
                        if ($cdRow[0]> 0)
                        { 
                            $errFlag    = 1;
                            $flag       = 1;
                            $outMsg     = $fail." Duplicate Record(S) Exist";
                        } 

                if($errFlag==0)
                {

                /*$query='';
                foreach($selUser as $userIds)
                {  
                    $query .= '("'.$selJobType.'",'.$userIds.',"'.$txtFrequency.'",1,"'.$txtJobName.'"),';
                }
                $query = substr($query,0, -1);*/

                     $result = $this->manageCronConfig($action,$intJobId,$selJobType,$txtJobName,$selUser,$txtFrequency,'',0,0,'','','0000-00-00');

                    if($result)
                    {
                         $numRow   = $result-> fetch_array();
                         $Statusflag = $numRow['@P_STATUS']; 
                        if($action == 'A'  && $Statusflag=='1'){
                            $outMsg = 'Record with this name already exists';
                            $errFlag = 1;  
                        }
                        else if($action == 'A'  && $Statusflag=='2')
                        {
                            $outMsg = 'Record added successfully';
                            $errFlag = 0;
                        }
                        else if($action == 'U'  && $Statusflag=='2')
                        {
                            $outMsg = 'Record updated successfully';
                            $errFlag = 0;
                        }
                        else if($action == 'U'  && $Statusflag=='1')
                        {
                            $outMsg = 'Record with this name already exists';
                            $errFlag = 1;
                        }
                        else if($Statusflag=='4')
                        {
                             $outMsg = $numRow['@P_STATUS'];
                             $errFlag = 1;
                        }
                    }                   
                }
            $selJobType         = ($errFlag == 1) ? $selJobType : '';
            $selUser            = ($errFlag == 1) ? $selUser : '';
            $txtFrequency       = ($errFlag == 1) ? $txtFrequency : '2'; 
            $txtJobName         = ($errFlag == 1) ? $txtJobName : '0';
            $arrResult          = array('msg' => $outMsg, 'flag' => $flag,'selJobType' => $selJobType,'selUser' => $selUser, '$txtFrequency' => $txtFrequency, 'txtJobName'=>$txtJobName);
            return $arrResult;
        }
        else
        {
        header("Location:" . APPURL . "error"); 
        }
    }


    public function readCronConfig($intJobId) 
    {
        $result = $this->manageCronConfig('R',$intJobId,0,'',0,'','',0,0,'','','0000-00-00');
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_array())
            {
                $intJobId           = $row["intJobId"];
                $intJobType         = $row["IntJobType"];
                $intAccountId       = $row["intAccountId"];
                $vchJobName         = $row["vchJobName"];
                $txtFrequency       = $row["vchDuration"];
                $intActiveStatus    = $row["bitActive"];
                $intAccountType     = $row['intAccountType'];
                
            }
        }

        $arrResult = array('intJobId'=>$intJobId,'intJobType'=>$intJobType,'intAccountId'=>$intAccountId,'vchJobName'=>$vchJobName,'txtFrequency'=>$txtFrequency,'intActiveStatus'=>$intActiveStatus,'intAccountType'=>$intAccountType);
        return $arrResult;
    }


    // Function To Delete Configuration By::Ashok Samal   :: On:: 06-07-2017 
    public function deleteCronConfig($action, $ids) 
    {

        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];
        if ($newSessionId == $hdnPrevSessionId) 
        {
            $ctr            = 0;
            $msg            = 0;
            $success        = 0;
            $fail           = '';
            $explIds        = explode(',', $ids);
            $msgTitle       = 'Configuration details';
            foreach ($explIds as $indIds)
            {            
                $result = $this->manageCronConfig($action,$indIds,0,'',0,'','',0,0,'','','0000-00-00');
                $row = $result->fetch_array();
                if ($row[0] == 0)
                { 
                    $ctr++;
                    $success++;
                } 
                else 
                {
                    $fail .= $row[0] . ',';
                }
            }

            if ($action == 'D') {
                    $outMsg .= $msgTitle.' deleted successfully';
            }
            else if ($action == 'IN')
                $outMsg =  $msgTitle.' unpublished successfully';

            else if($action == 'P'){
                $outMsg =  $msgTitle.' Published successfully';
            }
            return $outMsg;
        }
        else
        {
            header("Location:" . APP_URL . "error"); 
        }
    }


        
    }// End Class 

?>
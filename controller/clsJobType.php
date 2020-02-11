<?php
    /*************************************
    Class Name	: clsJobType
    Description	: Class used to configure cronjob 
    Include	    : Extends model class
    Created By	: Ashok kumar Samal
    Created On	: 08-07-2017
    *************************************/
    class clsJobType extends model
    {

        private function manageJobType($vchAction,$intId,$intJobType,$vchJobName,$intAccountId,$vchDuration,$txtLastMessage,$intAttr1,$intAttr2,$vchAttr3,$vchAttr4,$dtAttr5)
        {
            $dtAttr5= ($dtAttr5=='0000-00-00')?'1000-01-01':$dtAttr5;
            $sql	= "CALL USP_MS_JOB_TYPE('$vchAction',$intId,$intJobType,'$vchJobName',$intAccountId,'$vchDuration','$txtLastMessage',$intAttr1,$intAttr2,'$vchAttr3','$vchAttr4','$dtAttr5');";       
            //echo '<br><br><br><br>'.$sql;//exit;
            
            $result = Model::executeQry($sql);
            return $result;
        }

        public function viewJobData($vchAction,$intId,$intJobType,$vchJobName,$intAccountId,$vchDuration,$txtLastMessage,$intAttr1,$intAttr2,$vchAttr3,$vchAttr4,$dtAttr5)
        {
            $result = $this->manageJobType($vchAction,$intId,$intJobType,$vchJobName,$intAccountId,$vchDuration,$txtLastMessage,$intAttr1,$intAttr2,$vchAttr3,$vchAttr4,$dtAttr5);
            return $result;
        }

        


    public function readCronConfig($intJobId) 
    {
        $result = $this->manageJobType('R',$intJobId,0,'',0,'','',0,0,'','','0000-00-00');
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
                
            }
        }

        $arrResult = array('intJobId'=>$intJobId,'intJobType'=>$intJobType,'intAccountId'=>$intAccountId,'vchJobName'=>$vchJobName,'txtFrequency'=>$txtFrequency,'intActiveStatus'=>$intActiveStatus);
        return $arrResult;
    }

        
  }// End Class 

?>
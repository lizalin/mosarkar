<?php
/**
 * Description of clsService
 *
 * @author Puja 
 */
class clsFAQ extends Model {

    private function manageFAQ($action, $arrCondition) {

        //print_r($arrCondition);exit;
        $operatorResult = $this->callProc('USP_MG_FAQ', $action, $arrCondition);
//echo $operatorResult;exit;
        /* Activity log Tracker End */
        return $operatorResult;
    }
    public function addUpdateFAQ($id) 
    {       
        //print_r($_POST);exit;
        $vchDepartment               =$_POST['vchDepartmentId'];
        $vchServices                 =$_POST['vchServicesId'];
        $vchFAQQuestion              =$_POST['vchFAQQuestion'];
        $FAQQuestionLen              = strlen($vchFAQQuestion);
        $vchFAQAnswer                =$_POST['vchFAQAnswer'];
        $FAQAnswerLen                = strlen($vchFAQAnswer);
        $intCreatedBy                = (!empty($_SESSION['adminConsole_userID'])) ? $_SESSION['adminConsole_userID'] : 0;

        $idata['id']                 = $id;
        $idata['intCreatedBy']       = $intCreatedBy; 
        $idata['vchDepartment']      = $vchDepartment;
        $idata['vchServices']        = $vchServices;
        $idata['vchFAQQuestion']     = $vchFAQQuestion;
        $idata['vchFAQAnswer']       = $vchFAQAnswer;
       

        if ($vchDepartment== 0||  $vchServices==0 ||  $vchFAQQuestion='' || $vchFAQAnswer ='') 
        {
            $errFlag    = 1;
            $flag       = 1;
            $outMsg     = 'Mandatory fields should not be blank';
        }
        if ($FAQQuestionLen > 100) 
        {
            $errFlag    = 1;
            $flag       = 1;
            $outMsg     = 'FAQ Question Should not exceed 100 charecters';
        }
        if ($FAQAnswerLen== 200 ) 
        {
            $errFlag    = 1;
            $flag       = 1;
            $outMsg     = 'FAQ Answer Should not exceed 200 charecters';
        }
        $action         = 'AU';
       
        if($errFlag == 0){
             
            $dupResult  = $this->manageFAQ('CD',$idata);
            if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                $flagval = $numRows['@FLAG'];

                if ($flagval > 0) {
                    $outMsg     = 'Duplicate record exists';
                    $errFlag    = 1;
                } else {
                    $result     = $this->manageFAQ($action, $idata);
                    $errFlag    = 0;
                    if ($result) {
                        if($id==0){
                            $outMsg = 'Record Added successfully ';
                        }else{
                            $outMsg = 'Record Updated successfully ';
                        }
                    }else{
                        $outMsg = ERROR_MSG;
                    }
                }
            }else{
                $outMsg = ERROR_MSG;  
            }
        }else{
            $outMsg = $outMsg;
        }

    
     $userId                    = ($errFlag == 1) ? $userId : '';
     $sectorId                  = ($errFlag == 1) ? $sectorId : '';
     
     $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'idata'=>$idata);
        return $arrResult;
    }

   /*Action to view FAQ by:Puja kumari on dt:24-09-2019*/
     public function viewFAQ($action,$intRecno,$vchDepartmentId,$vchServicesId,$vchFAQQuestion) 
    { 
        $idata['intRecno']        = $intRecno;
        $idata['vchDepartmentId'] = $vchDepartmentId;
        $idata['vchServicesId']   = $vchServicesId;
        $idata['vchFAQQuestion']  = $vchFAQQuestion;
          
        $result = $this->manageFAQ($action,$idata);
        return $result;
    }
 /*Action: Read, */
    public function readFAQ($intAction,$id) {

        $idata['intId'] = $id;
        $result = $this->manageFAQ($intAction, $idata);
        //print_r( $result);exit;
        if ($result->num_rows > 0) {
          $row                = mysqli_fetch_array($result);
         // print_r($row);exit;
          $intServiceRegistrationId       =  $row['intServiceRegistrationId']; 
          $intDepartmentId                =  $row['intDepartmentId']; 
          $vchFaqQuestion                 =  $row['vchFaqQuestion']; 
          $vchFaqAnswer                   =  $row['vchFaqAnswer'];  
      }
        $arrResult = array('intServiceRegistrationId' => $intServiceRegistrationId,'intDepartmentId' => $intDepartmentId,'vchFaqQuestion' => $vchFaqQuestion,'vchFaqAnswer' => $vchFaqAnswer);
        return $arrResult;
    }
//------ Delete/Active/InActive function for Blog By:: Amiatshree Mallick date: 25-Dec-2017
  public function deleteFAQ($action, $ids) 
    {
        $newSessionId = session_id();
        $hdnPrevSessionId = $_POST['hdnPrevSessionId'];
        $createdBy = (!empty($_SESSION['USER_ID'])) ? $_SESSION['USER_ID'] : 0;
        if ($newSessionId == $hdnPrevSessionId) {
            $ctr = 0;
            $explIds = explode(',', $ids);
            $fail = '';
             $idata['ids']  = $ids;
            
            //foreach ($explIds as $indIds) {
                $result = $this->manageFAQ($action,$idata);
                //print_r($result);exit;
                $row = $result->fetch_array();
              
                if ($row[0] == '0')
                    $delRec++;
                else
                    $fail .= $row[0] . ',';
                $ctr++;
            //}
            if ($action == 'D') {
               $outMsg = 'Record Deleted Successfully'; 
            }
            else if ($action == 'IN')
                $outMsg = 'Record(s) unpublished successfully';
            else if ($action == 'P')
                $outMsg = 'Record(s) published successfully';
           
            return $outMsg;
        } else {
            header("Location" . APPURL . "error");
        }
    }// end delete function
}// end Class
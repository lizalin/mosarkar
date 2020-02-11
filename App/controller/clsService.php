<?php
/**
 * Description of clsService
 *
 * @author Chinmayee 
 */
class clsService extends Model {

    private function manageService($action, $arrCondition) {

        //print_r($arrCondition);exit;
        $operatorResult = $this->callProc('USP_MG_SERVICE', $action, $arrCondition);
//echo $operatorResult;exit;
        /* Activity log Tracker End */
        return $operatorResult;
    }
    
    /*Action: Read, */
    public function readService($intAction,$id) {

        $idata['intId'] = $id;
        $result = $this->manageService($intAction, $idata);
        if ($result->num_rows > 0) {
          $row                = mysqli_fetch_array($result);
          $intServiceRegistrationId       =  $row['intServiceRegistrationId'];  
      }
        $arrResult = array('intServiceRegistrationId' => $intServiceRegistrationId);
        return $arrResult;
    }


  
    /** Function for Get Department Data **/
    public function getDepartmentMaster($vchAction){
        $arrDepartment  = $this->manageService($vchAction,[]);
        return $arrDepartment;
    }
      /** Function for Get Sevice Data **/
    public function getService($vchAction,$deptId){
        $idata['deptId']=$deptId;
        $arrDepartment  = $this->manageService($vchAction,$idata);
        return $arrDepartment;
    }

     /** Function for Get Department Data **/
    public function getDistrictMaster($vchAction,$idata=[]){
        $arrDistrict  = $this->manageService($vchAction,$idata);
        return $arrDistrict;
    }

    /*Action: Read all data */
    public function viewService($intAction, $array) {        
        $result = $this->manageService($intAction, $array);
        return $result;
    }
    


    public function addUpdateSerivice($id) 
    {       
        
        $dataArray                  = $_POST;
        $serviceArr                 = $dataArray['vchServiceName'];
        $serviceid                  = $dataArray['hdnserviceId']; 
       // print_r($serviceid);exit;
        $intCreatedBy               = (!empty($_SESSION['adminConsole_userID'])) ? $_SESSION['adminConsole_userID'] : 0;
        $allservices                = '';
        $query                      = '';
        
            for ($i = 0; $i < count($serviceArr); $i++) 
            {
                $allservicesId .= !empty($serviceid[$i])?$serviceid[$i] . ',':'0,';
                if($serviceid[$i]==0){
                $allservices .= $serviceArr[$i] . ',';}

               
                $allservicesIdval = !empty($serviceid[$i])?$serviceid[$i] . ',':'0,';
                $query       .= '('.$allservicesIdval.$dataArray['vchDepartmentId'].',"'.$serviceArr[$i].'",'.$intCreatedBy.'),';    
            }
            $allservices = rtrim($allservices, ',');
            $allservicesId = rtrim($allservicesId, ',');
            $query       = rtrim($query, ',');
            
        
        $idata['allservices']       = $allservices;
        $idata['allservicesId']       = $allservicesId;
        $idata['query']             = $query;
        $idata['intDepartmentId']   = $dataArray['vchDepartmentId'];
        $idata['intCreatedBy']      = $intCreatedBy; 
        $idata['serviceid']         = $serviceid;
       

        if ($dataArray['vchDepartmentId']== 0 ) 
        {
            $errFlag    = 1;
            $flag       = 1;
            $outMsg     = 'Mandatory fields should not be blank';
        }
        $action         = 'AU';
       
        if($errFlag == 0){
             
            $dupResult  = $this->manageService('CD',$idata);
            if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                $flagval = $numRows['@FLAG'];

                if ($flagval > 0) {
                    $outMsg     = 'Duplicate record exists';
                    $errFlag    = 1;
                } else {
                    $result     = $this->manageService($action, $idata);
                    $errFlag    = 0;
                    if ($result) {
                        $outMsg = 'Record added successfully ';
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

    public function viewManageOperator($action, $arrCond) 
    {       
        $result = $this->manageOperator($action, $arrCond);
        return $result;
    }
    /*Action to view Services by:Puja kumari on dt:23-09-2019*/
     public function viewServices($action,$intRecno,$vchDepartmentId,$vchServiceName) 
    {   $idata['intRecno']        = $intRecno;
        $idata['vchDepartmentId'] = $vchDepartmentId;
        $idata['vchServiceName']  = $vchServiceName;
        $idata['intDepartmentId']  = $_SESSION['adminConsole_DeptId'];
        $idata['intDesg_Id']  = ($_SESSION['adminConsole_Desg_Id']==OPERATOR)?$_SESSION['adminConsole_Desg_Id']:0;
          
        $result = $this->manageService($action,$idata);
        return $result;
    }
    //------ Delete/Active/InActive function for Blog By:: Amiatshree Mallick date: 25-Dec-2017
    public function deleteService($action, $ids) 
    {
        $newSessionId = session_id();
        $hdnPrevSessionId = $_POST['hdnPrevSessionId'];
        $createdBy = (!empty($_SESSION['USER_ID'])) ? $_SESSION['USER_ID'] : 0;
        if ($newSessionId == $hdnPrevSessionId) {
            $ctr = 0;
            //$explIds = explode(',', $ids);
            //print_r($explIds);exit;
            $fail = '';
             $idata['ids']  = $ids;
                $result = $this->manageService($action,$idata);

            // print_r($row);exit;
                if ($row[0] == '0')
                    $delRec++;
                else
                    $fail .= $row[0] . ',';
                $ctr++;
            //}
            if ($action == 'D') {
               $outMsg = 'Record Deleted Successfully'; 
            }
            else if ($action == 'UP')
                $outMsg = 'Record(s) unpublished successfully';
            else if ($action == 'P')
                $outMsg = 'Record(s) published successfully';
           
            return $outMsg;
        } else {
            header("Location" . APPURL . "error");
        }
    }// end delete function
    public function getMapData($action,$fromDate,$toDate,$deptFilter,$outBoundId,$deptSel1) 
    {
        $idata['fromDate'] = $fromDate;
        $idata['toDate']  = $toDate;
        $idata['deptFilter'] = $deptFilter;
        $idata['outBoundId'] = $outBoundId;
        $idata['deptSel1'] = $deptSel1;
         if($_SESSION['adminConsole_agency']!=0){
          $arrCondition['rangeId'] = $_SESSION['adminConsole_agency'];
          $operatorResult = $this->callProc('USP_MS_RANGE_TAGGING','FT', $arrCondition);
          $str ='';
          if($operatorResult->num_rows>0){               
            while($row  = $operatorResult->fetch_array()){
               $str .= $row['intPolicestationId'].',';
            }
            $str = trim($str, ',');
          }else{
            $str = '0';
          }
        
          $idata['int_hs_ps_id']  = 1;
          $idata['intPolicestationId']  = $str;
        }else{
            $idata['int_hs_ps_id'] =0;
        }   
        $result = $this->manageService($action,$idata);
        return $result;
        
    }
    public function getInboundSummary($action,$fromDate,$toDate) 
    {
        $idata['fromDate'] = $fromDate;
        $idata['toDate']  = $toDate;
        $idata['intDepartmentId']  = 1;//($_SESSION['adminConsole_Desg_Id']==0 ||$_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CMO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION)? 0:$_SESSION['adminConsole_DeptId'];
        //$idata['intCreatedBy']  = ($_SESSION['adminConsole_Desg_Id']==OPERATOR)?$_SESSION['adminConsole_userID']:0;
        $idata['intCreatedBy']  = ($_SESSION['adminConsole_Privilege']==2)?$_SESSION['adminConsole_userID']:0; 

        // if($_SESSION['adminConsole_agency']!=0){
        //   $arrCondition['rangeId'] = $_SESSION['adminConsole_agency'];
        //   $operatorResult = $this->callProc('USP_MS_RANGE_TAGGING','FT', $arrCondition);
        //   $str ='';
        // //   if($operatorResult->num_rows>0){               
        // //     while($row  = $operatorResult->fetch_array()){
        // //        $str .= $row['intPolicestationId'].',';
        // //     }
        // //     $str = trim($str, ',');
        // //   }else{
        // //     $str = '0';
        // //   }
        
        //   $idata['int_hs_ps_id']  = 1;
        //   $idata['intPolicestationId']  = $str;
        // }else{
        //     $idata['int_hs_ps_id'] =0;
        // }    
        $result = $this->manageService($action,$idata);
        return $result;
    }

    public function getLeftDashboard($action) 
    {
        $idata['fromDate'] = $fromDate;
        $idata['toDate']  = $toDate;

        $result = $this->manageService($action,$idata);
        return $result;
    }

     public function getPeopleDepartment($action) 
    {
        $idata['fromDate'] = $fromDate;
        $idata['toDate']  = $toDate;
        $idata['intDepartmentId']  = 1;//($_SESSION['adminConsole_Desg_Id']==0 ||$_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CMO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION)? 0:$_SESSION['adminConsole_DeptId'];
        $idata['intCreatedBy']  = ($_SESSION['adminConsole_Desg_Id']==OPERATOR)?$_SESSION['adminConsole_userID']:0;
        $idata['intDistrictId']  = (empty($_SESSION['adminConsole_HierarchyId']) || $_SESSION['adminConsole_HierarchyId'] == 1)?0:$_SESSION['adminConsole_HierarchyId'];
        
          
        $result = $this->manageService($action,$idata);
        return $result;
    }

     public function getPeopleInbound($action) 
    {
        $idata['fromDate'] = $fromDate;
        $idata['toDate']  = $toDate;
        $idata['intDepartmentId']  = ($_SESSION['adminConsole_Desg_Id']==0 ||$_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CMO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION)? 0:$_SESSION['adminConsole_DeptId'];
        $idata['intCreatedBy']  = ($_SESSION['adminConsole_Desg_Id']==OPERATOR)?$_SESSION['adminConsole_userID']:0;
        if($_SESSION['adminConsole_agency']!=0){
          $arrCondition['rangeId'] = $_SESSION['adminConsole_agency'];
          $operatorResult = $this->callProc('USP_MS_RANGE_TAGGING','FT', $arrCondition);
          $str ='';
          if($operatorResult->num_rows>0){               
            while($row  = $operatorResult->fetch_array()){
               $str .= $row['intPolicestationId'].',';
            }
            $str = trim($str, ',');
          }else{
            $str = '0';
          }
        
          $idata['int_hs_ps_id']  = 1;
          $idata['intPolicestationId']  = $str;
        }else{
            $idata['int_hs_ps_id'] =0;
        } 
        $result = $this->manageService($action,$idata);
        return $result;
    } 
    public function getCallSent($action) 
    {
        $idata['fromDate'] = $fromDate;
        $idata['toDate']  = $toDate;
        $idata['intDepartmentId']  =1; //($_SESSION['adminConsole_Desg_Id']==0 ||$_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CMO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION)? 0:$_SESSION['adminConsole_DeptId'];
        if($action=='DVC' || $action=='GCS'){
        $idata['intCreatedBy']  = ($_SESSION['adminConsole_Privilege']==2 && $_SESSION['adminConsole_Desg_Id'] != FSCWS_DESIGNATION && $_SESSION['adminConsole_Desg_Id'] != PA_DESIGNATION)?$_SESSION['adminConsole_userID']:0; 
        }
        if($action=='DVCC'){
            $idata['intDistrictId']  = (empty($_SESSION['adminConsole_HierarchyId']))?0:$_SESSION['adminConsole_HierarchyId'];   
        }
        
        //  if($_SESSION['adminConsole_agency']!=0){
        //   $arrCondition['rangeId'] = $_SESSION['adminConsole_agency'];
        //   $operatorResult = $this->callProc('USP_MS_RANGE_TAGGING','FT', $arrCondition);
        //   $str ='';
        // //   if($operatorResult->num_rows>0){               
        // //     while($row  = $operatorResult->fetch_array()){
        // //        $str .= $row['intPolicestationId'].',';
        // //     }
        // //     $str = trim($str, ',');
        // //   }else{
        // //     $str = '0';
        // //   }
        
        //   $idata['int_hs_ps_id']  = 1;
        //   $idata['intPolicestationId']  = $str;
        // }else{
        //     $idata['int_hs_ps_id'] =0;
        // } 
         // print_r($idata); exit;
        $result = $this->manageService($action,$idata);
        return $result;
    }

    public function getCC($action) 
    {
        $idata['fromDate'] = $fromDate;
        $idata['toDate']  = $toDate;
        $idata['intDepartmentId']  = 1; //($_SESSION['adminConsole_Desg_Id']==0 ||$_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CMO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION)? 0:$_SESSION['adminConsole_DeptId'];
       // $idata['intCreatedBy']  = ($_SESSION['adminConsole_Privilege']==2)?$_SESSION['adminConsole_userID']:0; 
        $idata['intDistrictId']  = (empty($_SESSION['adminConsole_HierarchyId']))?0:$_SESSION['adminConsole_HierarchyId'];     

        //  if($_SESSION['adminConsole_agency']!=0){
        //   $arrCondition['rangeId'] = $_SESSION['adminConsole_agency'];
        //   $operatorResult = $this->callProc('USP_MS_RANGE_TAGGING','FT', $arrCondition);
        //   $str ='';
        //   if($operatorResult->num_rows>0){               
        //     while($row  = $operatorResult->fetch_array()){
        //        $str .= $row['intPolicestationId'].',';
        //     }
        //     $str = trim($str, ',');
        //   }else{
        //     $str = '0';
        //   }
        
        //   $idata['int_hs_ps_id']  = 1;
        //   $idata['intPolicestationId']  = $str;
        // }else{
        //     $idata['int_hs_ps_id'] =0;
        // } 
       // print_r($idata);exit;
        $result = $this->manageService($action,$idata);
        return $result;
    }

     public function getDailyAvgCall($action) 
    {
        $idata['fromDate'] = $fromDate;
        $idata['toDate']  = $toDate;
        $idata['intDepartmentId']  = ($_SESSION['adminConsole_Desg_Id']==0 ||$_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CMO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION)? 0:$_SESSION['adminConsole_DeptId'];
        $idata['intCreatedBy']  = ($_SESSION['adminConsole_Desg_Id']==OPERATOR)?$_SESSION['adminConsole_userID']:0;     
        $result = $this->manageService($action,$idata);
        return $result;
    }

     public function getAvgCall($action) 
    {
        $idata['fromDate'] = $fromDate;
        $idata['toDate']  = $toDate;
        $idata['intDepartmentId']  = ($_SESSION['adminConsole_Desg_Id']==0 ||$_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CMO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION)? 0:$_SESSION['adminConsole_DeptId'];
        $idata['intCreatedBy']  = ($_SESSION['adminConsole_Desg_Id']==OPERATOR)?$_SESSION['adminConsole_userID']:0;     
        $result = $this->manageService($action,$idata);
        return $result;
    }

     public function getDailyAvgCallInbound($action) 
    {
        $idata['fromDate'] = $fromDate;
        $idata['toDate']  = $toDate;
          
        $result = $this->manageService($action,$idata);
        return $result;
    }
    public function viewMapData($action, $dataArr){
        // $idata['fromDate'] = $fromDate;
        // $idata['toDate']  = $toDate;
        // $idata['deptFilter'] = $deptFilter;
        // $idata['outBoundId'] = $outBoundId;
              // print_r($dataArr );
        // $idata['deptSel1'] = $deptSel1;
        if($_SESSION['adminConsole_agency']!=0){
          $arrCondition['rangeId'] = $_SESSION['adminConsole_agency'];
          $arrCondition['districtId'] = $dataArr['district_Id'];
          $operatorResult = $this->callProc('USP_MS_RANGE_TAGGING','FT', $arrCondition);
          $str ='';
          if($operatorResult->num_rows>0){               
            while($row  = $operatorResult->fetch_array()){
               $str .= $row['intPolicestationId'].',';
            }
            $str = trim($str, ',');
          }else{
            $str = '0';
          }
        
          $dataArr['int_hs_ps_id']  = 1;
          $dataArr['intPolicestationId']  = $str;
        }else{
            if(!empty($dataArr['intInstitutionId'])){
              $dataArr['int_hs_ps_id'] =1;
              $dataArr['intPolicestationId']  = $dataArr['intInstitutionId'];
            }else{
              $dataArr['int_hs_ps_id'] =0;
            }
        }  
        // exit; 
        $result = $this->manageService($action,$dataArr);
        return $result;
        
    }
    function getCallDetails($action ,$dataArr){
        $result = $this->manageService($action,$dataArr);
        // print_r($result->); exit;
        return $result;
    }

     /*Action: Read all data */
    public function getNotification($intAction, $array) {   
        // echo $intAction; exit;     
        $result = $this->manageService($intAction,$array);
        return $result;
        #flush();
    }
    
}// end Class
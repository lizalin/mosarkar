<?php
/**
 * Description of clsService
 *
 * @author Puja 
 */
class clsInBound extends Model {

    private function manageInBound($action, $arrCondition) {

        //print_r($arrCondition);exit;
        $operatorResult = $this->callProc('USP_MS_INBOUND', $action, $arrCondition);
//echo $operatorResult;exit;
        /* Activity log Tracker End */
        return $operatorResult;
    }
    public function addUpdateInBound($id) 
    {       
       // print_r($_POST);exit;

        $vchName          = htmlspecialchars(addslashes($_POST['vchName']), ENT_QUOTES);
        $blankvchName     = Model::isBlank($vchName);
        $errvchName       = Model::isSpclChar($vchName);
        $lenvchName       = Model::chkLength('max', $vchName, 100); 
        // $vchEmail               = htmlspecialchars(addslashes($_POST['vchEmail']), ENT_QUOTES);
        // $blankvchEmail          = Model::isBlank($vchEmail);
        // $errvchEmail            = Model::isSpclChar($vchEmail);
        // $lenvchEmail            = Model::chkLength('max', $vchEmail, 50);
        $vchMobileNo                  = htmlspecialchars(addslashes($_POST['vchMobileNo']), ENT_QUOTES);
        $blankvchMobileNo             = Model::isBlank($vchMobileNo);
        $errtxtvchMobileNo            = Model::isSpclChar($vchMobileNo);
        $lentxtvchMobileNo            = Model::chkLength('max', $vchMobileNo, 10);
        $intGenderId              = htmlspecialchars(addslashes($_POST['intGenderId']), ENT_QUOTES);
        $blankintGenderId         = Model::isBlank($intGenderId);
        // $intDistrictId              = htmlspecialchars(addslashes($_POST['intDistrictId']), ENT_QUOTES);
        // $blankintDistrictId         = Model::isBlank($intDistrictId);
        $intLocation              = htmlspecialchars(addslashes($_POST['hdnPropId']), ENT_QUOTES);
        $blankintLocation         = Model::isBlank($intLocation);
        $vchAddress          = htmlspecialchars(addslashes($_POST['vchAddress']), ENT_QUOTES);
        $blankvchAddress     = Model::isBlank($vchAddress);
        $errvchAddress       = Model::isSpclChar($vchAddress);
        $lenvchAddress       = Model::chkLength('max', $vchAddress, 300);
        // $intServicesId              = htmlspecialchars(addslashes($_POST['intServicesId']), ENT_QUOTES);
        // $blankintServicesId         = Model::isBlank($intServicesId);
        $vchComplain          = htmlspecialchars(addslashes($_POST['vchComplain']), ENT_QUOTES);
        $blankvchComplain     = Model::isBlank($vchComplain);
        $errvchComplain       = Model::isSpclChar($vchComplain);
        $lenvchComplain       = Model::chkLength('max', $vchComplain, 500);
        $intCreatedBy                = (!empty($_SESSION['adminConsole_userID'])) ? $_SESSION['adminConsole_userID'] : 0;
        $intBlockId              = htmlspecialchars(addslashes($_POST['intBlockId']), ENT_QUOTES);
        $intBlockId              = htmlspecialchars(addslashes($_POST['intBlockId']), ENT_QUOTES);
        $intGPId              = htmlspecialchars(addslashes($_POST['intGPId']), ENT_QUOTES);
        $intGPId              = htmlspecialchars(addslashes($_POST['intGPId']), ENT_QUOTES);
        $intVillageId              = htmlspecialchars(addslashes($_POST['intVillageId']), ENT_QUOTES);
        $intAge                  = htmlspecialchars(addslashes($_POST['intAge']), ENT_QUOTES);
        $blankintAge             = Model::isBlank($intAge);
        $errintAge            = Model::isSpclChar($intAge);

        $lenintAge            = Model::chkLength('max', $intAge, 3);

        $intDepartmentId              = htmlspecialchars(addslashes($_POST['intDepartmentId']), ENT_QUOTES);
        $blankintDepartmentId         = Model::isBlank($intDepartmentId);
        $intServicesId              = htmlspecialchars(addslashes($_POST['intServicesId']), ENT_QUOTES);
        $blankintServicesId         = Model::isBlank($intServicesId);
        $intDistrictId =0;
        $blankintDistrictId =1; 
        $int_hs_ps_id =0;
        $blankint_hs_ps_id =1;
        $intAnonymousUserStatus              = htmlspecialchars(addslashes($_POST['intAnonymousUserStatus']), ENT_QUOTES);
        if($intDepartmentId == DEPART_HEALTH ){
            $intDistrictId              = htmlspecialchars(addslashes($_POST['intHospitalDistrictId']), ENT_QUOTES);
            $blankintDistrictId         = Model::isBlank($intDistrictId);
            $int_hs_ps_id              = htmlspecialchars(addslashes($_POST['intHospitalId']), ENT_QUOTES);
            $blankint_hs_ps_id         = Model::isBlank($int_hs_ps_id);
        }else if($intDepartmentId == DEPART_HOME ){
            $intDistrictId              = htmlspecialchars(addslashes($_POST['intPoliceDistrictId']), ENT_QUOTES);
            $blankintDistrictId         = Model::isBlank($intDistrictId);
            $int_hs_ps_id              = htmlspecialchars(addslashes($_POST['intPoliceId']), ENT_QUOTES);
            $blankint_hs_ps_id         = Model::isBlank($int_hs_ps_id);
        }
        $vchOther = '';
        if($int_hs_ps_id=='other'){
             $vchOther = htmlspecialchars(addslashes($_POST['vchOther']), ENT_QUOTES);
        }
        $dtmCallStart               = $_SESSION['dtmCallStart'];
        $date           = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
        $dtmCallEnd                 = $date->format('Y-m-d H:i:s');
        $idata['intInboundDataId']   = $id;
        $idata['intCreatedBy']       = $intCreatedBy; 
        $idata['vchName']      = !empty($vchName)?$vchName:'';
        // $idata['vchEmail']        = $vchEmail;
        $idata['intMobile']        = $vchMobileNo;
        $idata['intGender']     = $intGenderId;
        $idata['intDistrictId']       = $intDistrictId;
        $idata['intDepartmentId']       = $intDepartmentId;
        // $idata['intServicesId']       = $intServicesId;
        $idata['intBlockId']       = !empty($intBlockId)?$intBlockId:0;
        $idata['intGPId']       = !empty($intGPId)?$intGPId:0;
        $idata['intVillageId']       = !empty($intVillageId)?$intVillageId:0;
        $idata['vchAddress']       = !empty($vchAddress)?$vchAddress:'';
        $idata['intServiceId']       = !empty($intServicesId)?$intServicesId:0;
        $idata['vchComplain']       = $vchComplain;
        $idata['vchComplain']       = $vchComplain;
        $idata['dtmCallStart']       = $dtmCallStart;
        $idata['dtmCallEnd']         = $dtmCallEnd;
        $idata['intAge']         = !empty($intAge)?$intAge:0;
        $idata['intLocation']         = !empty($intLocation)?$intLocation:0 ;
        $idata['vchServiceDate']         = !empty($_POST['vchServiceDate'])?date('Y-m-d',strtotime($_POST['vchServiceDate'])):NULL;
        $idata['varReferenceNo']         = 'MS'.time();
        $idata['intType']         = 2;

        $idata['int_hs_ps_id']         = ($int_hs_ps_id!='other')?$int_hs_ps_id:0;
        $idata['intAnonymousUserStatus']         = $intAnonymousUserStatus;
        $idata['vchOther']         = $vchOther;
        // print"<pre>";
        // print_r($idata); exit;
        $outMsg                 = '';
        $errFlag = 0;
        if($intAnonymousUserStatus==0){
            if ($blankvchName > 0 || $blankvchMobileNo > 0 || $blankintGenderId > 0 || $blankintLocation > 0 || $blankvchAddress > 0  || $blankvchComplain > 0 && $blankintAge>0 && $blankintDepartmentId>0 && $blankintServicesId && $blankintDistrictId > 0 && $blankint_hs_ps_id>0) {
                $errFlag = 1;
                $outMsg = "Mandatory Fields should not be blank";
            }
        }else if($intAnonymousUserStatus==0){
             if ($blankvchMobileNo > 0 || $blankintGenderId > 0 || $blankvchComplain > 0 && $blankintAge>0 && $blankintDepartmentId>0 && $blankintServicesId && $blankintDistrictId > 0 && $blankint_hs_ps_id>0) {
                $errFlag = 1;
                $outMsg = "Mandatory Fields should not be blank";
            }
         }else if ( $lenvchName > 0 || $lentxtvchMobileNo > 0 ||  $lenvchAddress > 0 || $lenvchComplain > 0 || $lenintAge > 0) {
            $errFlag = 1;
            $outMsg = "Length should not excided maxlength";
        } else if ( $errvchName > 0 ||  $errtxtvchMobileNo > 0 || $errvchAddress > 0 || $errvchComplain > 0|| $errintAge > 0) {
            $errFlag = 1;
            $outMsg = "Special Characters are not allowed";
        }
        $action         = 'AU';
        if($errFlag == 0){
            $result     = $this->manageInBound($action, $idata);
            $errFlag    = 0;
            if ($result->num_rows) {
                $row = $result->fetch_array();
                $intInboundDataId = $row['intInboundDataId'];
                if($id==0){
                    $smsRespone =  $this->sendMoSms($vchMobileNo);
                    $pos = strpos(strtolower($smsRespone), 'error');
                    if(!$pos){
                        $smsData['intSmsLogId']  = 0;
                        $smsData['intInOutboundId']  = $intInboundDataId;
                        $smsData['intType']  = 2;
                        $smsData['intSmsStatus']  = 1;
                        $smsData['intMobileNumber']  = $vchMobileNo;
                        $this->callProc('USP_MS_SMS_LOG', 'AU', $smsData);
                    }
                    $outMsg = 'Record Added successfully ';
                    unset($_SESSION['onlyOnce']);
                }else{
                    $outMsg = 'Record Updated successfully ';
                }
                // echo 2; exit;
            }else{
                $outMsg = ERROR_MSG;
            }
        }else{
            $outMsg = $outMsg;
        }

    
     $userId                    = ($errFlag == 1) ? $userId : '';
     $sectorId                  = ($errFlag == 1) ? $sectorId : '';
     // exit;
     $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'idata'=>$idata);
        return $arrResult;
    }


    public function addUpdateInBoundNotRegister($id){

        $vchNotRegMobile             = htmlspecialchars(addslashes($_POST['vchNotRegMobile']), ENT_QUOTES);
        $blankvchMobileNo            = Model::isBlank($vchNotRegMobile);
        $errtxtvchMobileNo           = Model::isSpclChar($vchNotRegMobile);
        $lentxtvchMobileNo           = Model::chkLength('max', $vchNotRegMobile, 10);

        $vchNoteCallSummary          = htmlspecialchars(addslashes($_POST['vchNoteCallSummary']), ENT_QUOTES);
        $blankvchComplain            = Model::isBlank($vchNoteCallSummary);
        $errvchComplain              = Model::isSpclChar($vchNoteCallSummary);
        $lenvchComplain              = Model::chkLength('max', $vchNoteCallSummary, 200);
        $intCreatedBy                = (!empty($_SESSION['adminConsole_userID'])) ? $_SESSION['adminConsole_userID'] : 0;

        $vchNotRegDistrict           = htmlspecialchars(addslashes($_POST['vchNotRegDistrict']), ENT_QUOTES);
        $blankintDistrictId          = Model::isBlank($vchNotRegDistrict);

        $idata['intMobile']          = $vchNotRegMobile;
        $idata['vchComplain']        = $vchNoteCallSummary;
        $idata['intDistrictId']      = $vchNotRegDistrict;
        $idata['intCreatedBy']       = $intCreatedBy;


        $outMsg                 = '';
        $errFlag = 0;


         if ($blankvchMobileNo > 0 || $blankvchComplain > 0 || $blankintDistrictId > 0) {
            $errFlag = 1;
            $outMsg = "Mandatory Fields should not be blank";
         }else if ($lentxtvchMobileNo > 0 || $lenvchComplain > 0) {
            $errFlag = 1;
            $outMsg = "Length should not excided maxlength";
        } else if ($errtxtvchMobileNo > 0 || $errvchComplain > 0) {
            $errFlag = 1;
            $outMsg = "Special Characters are not allowed";
        }
        $action         = 'AR';
        if($errFlag == 0){
            $result     = $this->manageInBound($action, $idata);
            $errFlag    = 0;
            if ($result->num_rows) {
                $row = $result->fetch_array();
                $intNotRegInboundId = $row['intNotRegInboundId'];
                if($id==0){
                    // $smsRespone =  $this->sendMoSms($vchNotRegMobile);
                    // $pos = strpos(strtolower($smsRespone), 'error');
                    // if(!$pos){
                    //     $smsData['intSmsLogId']  = 0;
                    //     $smsData['intInOutboundId']  = $intNotRegInboundId;
                    //     $smsData['intType']  = 3;
                    //     $smsData['intSmsStatus']  = 1;
                    //     $smsData['intMobileNumber']  = $vchNotRegMobile;
                    //     $this->callProc('USP_MS_SMS_LOG', 'AU', $smsData);
                    // }
                    $outMsg = 'Record Added successfully ';
                    unset($_SESSION['onlyOnce']);
                }else{
                    $outMsg = 'Record Updated successfully ';
                }
                // echo 2; exit;
            }else{
                $outMsg = ERROR_MSG;
            }
        }else{
            $outMsg = $outMsg;
        }

    
     $userId                    = ($errFlag == 1) ? $userId : '';
     $sectorId                  = ($errFlag == 1) ? $sectorId : '';
     // exit;
     $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'idata'=>$idata);
        return $arrResult;
    }

   /*Action to view InBound by:Puja kumari on dt:24-09-2019*/
     public function viewInBound($action,$intRecno,$vchDistrictId,$vchFromDate,$vchToDate) 
    { 
        $idata['intRecno']        = $intRecno;
        $idata['vchDistrictId'] = $vchDistrictId;
        $idata['vchFromDate']   = $vchFromDate;
        $idata['vchToDate']  = $vchToDate;
        // echo $_SESSION['adminConsole_Desg_Id']; exit;
       $idata['intDepartmentId']  = ($_SESSION['adminConsole_Desg_Id']==0 ||$_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CMO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION)? 0:$_SESSION['adminConsole_DeptId'];
        $idata['intCreatedBy']  = ($_SESSION['adminConsole_Desg_Id']==OPERATOR)?$_SESSION['adminConsole_userID']:0;
        // print_r($_SESSION); exit;
          
        $result = $this->manageInBound($action,$idata);
        return $result;
    }
 /*Action: Read, */
    public function readInBound($intAction,$id) {

        $idata['intId'] = $id;
        $result = $this->manageInBound($intAction, $idata);
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
  public function deleteInBound($action, $ids) 
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
                $result = $this->manageInBound($action,$idata);
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

    //------ Get All Inbound function for Blog By::Jaideep Kumar date: 25-Sept-2019
    function getInboundInformation(){
        $vchMobileNo                  = htmlspecialchars(addslashes($_POST['vchMobileNo']), ENT_QUOTES);
        $blankvchMobileNo             = Model::isBlank($vchMobileNo);
        $errtxtvchMobileNo            = Model::isSpclChar($vchMobileNo);
        $lentxtvchMobileNo            = Model::chkLength('max', $vchMobileNo, 10);
        $outMsg                 = '';
        $errFlag = 0;
        $idata['intMobile']        = $vchMobileNo;
        $resData = array();
        if ($blankvchMobileNo > 0 ) {
            $errFlag = 1;
            $outMsg = "Mandatory Fields should not be blank";
        } else if ( $lentxtvchMobileNo > 0 ) {
            $errFlag = 1;
            $outMsg = "Length should not excided maxlength";
        } else if ($errtxtvchMobileNo > 0) {
            $errFlag = 1;
            $outMsg = "Special Characters are not allowed";
        }
        $action         = 'R';
        if($errFlag == 0){
            $result     = $this->manageInBound($action, $idata);
            $errFlag    = 0;
            if ($result->num_rows) {
                $outMsg = 'Success';
                $resData = $result->fetch_array();
                $errFlag    = 1;
            }else{
                $outMsg = 'Sorry, No Record Found';
            }
        }else{
            $outMsg = $outMsg;
        }
        // print_r($result); exit;
    
     // $userId                    = ($errFlag == 1) ? $userId : '';
     // $sectorId                  = ($errFlag == 1) ? $sectorId : '';
     
     $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'result'=>$resData);
     echo json_encode($arrResult);
     // return $arrResult;
    }

    public function getData($vchaction, $intId, $intparentId, $intuserId, $intlvlId, $vchattr1, $vchattr2, $vchattr3, $vchattr4, $vchattr5, $intnodeId, $intsubNodeId, $intupdatedBy, $intCompTypeId, $intCatId, $intSubCatId, $intDesgId, $vchHierarchy) {
        //$result = $this->manageInBound($vchaction, $intId, $intparentId, $intuserId, $intlvlId, $vchattr1, $vchattr2, $vchattr3, $vchattr4, $vchattr5, $intnodeId, $intsubNodeId, $intupdatedBy, $intCompTypeId, $intCatId, $intSubCatId, $intDesgId, $vchHierarchy);
        $DemographSql = "CALL USP_DEMOGRAPHY_MAPPING('$vchaction',$intId,$intparentId,$intuserId, $intlvlId,'$vchattr1','$vchattr2','$vchattr3','$vchattr4','$vchattr5',$intnodeId,$intsubNodeId,$intupdatedBy,$intCompTypeId,$intCatId,$intSubCatId,$intDesgId,'$vchHierarchy',@OUT);";
         $path = MODEL::webPath();
        $errAction = MODEL::isSpclChar($vchaction);
        $errId = MODEL::isSpclChar($intId);
        $errParentId = MODEL::isSpclChar($intparentId);
        $errNodeVal = MODEL::isSpclChar($intuserId);
        $errHCode = MODEL::isSpclChar($intlvlId);
        $attr1 = MODEL::isSpclChar($vchattr1);
        $attr2 = MODEL::isSpclChar($vchattr2);
        $attr3 = MODEL::isSpclChar($vchattr3);
        $attr4 = MODEL::isSpclChar($vchattr4);
        $attr5 = MODEL::isSpclChar($vchattr5);
        $errNodeId = MODEL::isSpclChar($intnodeId);
        $errSubnodeId = MODEL::isSpclChar($intsubNodeId);
        $errUpdatedBy = MODEL::isSpclChar($intupdatedBy);
        if ($errAction == 0 && $errId == 0 && $errParentId == 0 && $errNodeVal == 0 && $errHCode == 0 && $errTelNo == 0 && $errFaxNo == 0 && $errAddress == 0 && $errNodeId == 0 && $errSubnodeId == 0 && $errUpdatedBy == 0) {
            $demographResult = Model::executeQry($DemographSql); //print_r($demographResult);
            return $demographResult;
        } else {
            // /header("Location: ".$path."/home");
        }

        
        return $demographResult;
    }

    public function requestInBound($intAction,$id,$userId) {

        $idata['intId'] = $id;
        $idata['userId'] = $userId;
        $status = 0;
        $result = $this->manageInBound($intAction, $idata);
        if($result){
            $status = 1;
        }

        return $status;
    }

    /*Action to view InBound by:Puja kumari on dt:24-09-2019*/
     public function getAllInBound($action) 
    { 
        // $idata['intRecno']        = $intRecno;
        // $idata['vchDistrictId'] = $vchDistrictId;
        // $idata['vchFromDate']   = $vchFromDate;
        // $idata['vchToDate']  = $vchToDate;
        // echo $_SESSION['adminConsole_Desg_Id']; exit;
        $idata['intDepartmentId']  = ($_SESSION['adminConsole_Desg_Id']==0 ||$_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CMO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION)? 0:$_SESSION['adminConsole_DeptId'];
        $idata['intCreatedBy']  = ($_SESSION['adminConsole_Desg_Id']==OPERATOR)?$_SESSION['adminConsole_userID']:0;
        // print_r($idata); exit;
          
        $result = $this->manageInBound($action,$idata);
        return $result->fetch_array();
    }

    // public function setTodayYesterdayAll(){
    //     print_r($_POST); exit;
    // }
}// end Class
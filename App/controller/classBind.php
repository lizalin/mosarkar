<?php

/* ================================================
  File Name             : classBind.php
  Description           : Page to manage class bind.
  Date Created          : 19-Sep-2019
  Designed By           : Niranjan Kumar Pandit
  Update History        : Added by Ajit

  <Updated by>      <Updated On>        <Remarks>

  ================================================== */
include_once(SITE_PATH . "model/customModel.php");

//include_once("cls-cm-journal.php");

class clsClassBind extends Model
{
    /*
      Function for Single signon for ATA Users
      By: Manali Ranjan
      On: 22-Jan-2018
    */
    public function UserLogins($UserId)
    {
        $resArr     = array();
        $newId      = $_SESSION['adminConsole_userID'] . '~' . $UserId;
        $sql        = "CALL USP_ADMIN_LOGIN('UL','$newId')";
        $result     = Model::executeQry($sql);
        if ($result->num_rows > 0) {
            $row                = $result->fetch_array();
            $accessType         = $row["INT_ACCESS_TYPE"];
            $strFName           = $row["VCH_FULL_NAME"];
            $intPrivilege       = $row["INT_PRIVILEGE"];
            $strImage           = $row["VCH_IMAGE"];
            $strDesignation     = $row["DESIGNATION"];
            $intDesignation     = $row["INT_DESIGNATION_ID"];
            $strGrade           = $row["GRADE"];
            $strTimeZone        = $row["TIME_ZONE"];
            $strCheckPass       = $row["INT_PASS_CHECK"];
            $dtmPasswordChange  = $row['DTM_PASSWORD_CHANGE'];
            $intNodeVal         = $row["INT_SUBNODEVAL_ID"];
            $strUserName        = $row['VCH_USER_NAME'];
            $userType           = $row['INT_EMP_TYPE'];
            $agency             = $row['INT_GROUP_ID'];
            $adminDeptId        = $row['INT_PH_LOCATION'];
            $_SESSION['adminConsole_userID']         = '';
            $_SESSION['adminConsole_UserName']       = '';
            $_SESSION['adminConsole_FullName']       = '';
            $_SESSION['adminConsole_Privilege']      = '';
            $_SESSION['adminConsole_Image']          = '';
            $_SESSION['adminConsole_Desg']           = '';
            $_SESSION['adminConsole_Desg_Id']        = '';
            $_SESSION['adminConsole_Grade']          = '';
            $_SESSION['adminConsole_Node']           = '';
            $_SESSION['adminConsole_TimeZone']       = '';
            $_SESSION['adminConsole_UserType']       = '';
            $_SESSION['adminConsole_agency']         = '';
            $_SESSION['adminConsole_HierarchyId']    = '';
            $_SESSION['adminConsole_DeptId']         = '';

            $switch                                 = 'switch';                     
            $_SESSION['AccountType']                = $switch;
            $_SESSION['adminConsole_userID']        = $UserId;
            $_SESSION['adminConsole_UserName']      = $strUserName;
            $_SESSION['adminConsole_FullName']      = $strFName;
            $_SESSION['adminConsole_Privilege']     = $intPrivilege;
            $_SESSION['adminConsole_Image']         = $strImage;
            $_SESSION['adminConsole_Desg']          = $strDesignation;
            $_SESSION['adminConsole_Desg_Id']       = $intDesignation;
            $_SESSION['adminConsole_Grade']         = $strGrade;
            $_SESSION['adminConsole_Node']          = $intNodeVal;
            $_SESSION['adminConsole_TimeZone']      = $strTimeZone;
            $_SESSION['adminConsole_UserType']      = $userType;
            $_SESSION['adminConsole_agency']        = $agency;
            $_SESSION['adminConsole_HierarchyId']   = $intNodeVal;
            $_SESSION['adminConsole_DeptId']        = $adminDeptId;
            array_push($resArr, $_SESSION);
        }
        echo json_encode(array('result' => $resArr));
    }

    public function setSessiontime()
    {
        $sessExpireTime = 1800;
        $strUser = $_SESSION['adminConsole_userID'];
        $sql = "CALL USP_ADMIN_LOGIN('UAT','$strUser')";
        $result = Model::executeQry($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_array();
            $activityTime = strtotime($row['LAST_ACTIVITY_TIME']);
        }
        $_SESSION['start'] = $activityTime;
        $_SESSION['expire'] = $_SESSION['start'] + ($sessExpireTime);
        echo json_encode(array('expireTime' => $_SESSION['expire']));
    }

    public function updateActivityTime()
    {
        $strUser = $_SESSION['adminConsole_UserName'];
        $sql = "CALL USP_ADMIN_LOGIN('UAT','$strUser')";
        $result = $this->executeQry($sql);
    }

    /*
      Function to get twit repliers
      By: sukanta kumar mishra
      On: 25-Mar-2016
     */

    public function setSessionValues()
    {
        $GL = $_REQUEST['Gl'];
        $PL = $_REQUEST['Pl'];
        $_SESSION['sessGLVal'] = $GL;
        $_SESSION['sessPLVal'] = $PL;
        unset($_SESSION['TodayYesterdayAll']);
        echo json_encode(array('retval' => 1));
    }
    /*
      Function to get department list in drop down
      By: Chinmayee
      On: 23-09-2019
     */

    public function getDepartmentList()
    {   
        include_once(CLASS_PATH."clsService.php");
             $obj         = new clsService;  
              $selVal = $_REQUEST['selVal'];    
             $result      = $obj->getDepartmentMaster('GDL');  
             $opt         = '<option value="0">--Select Department--</option>';
           
            if($result->num_rows>0)
            {               
                while($row  = $result->fetch_array())
                { // echo "<pre>";print_r($row);
                   $intDeptId  = $row["intDeptId"];
                   $vchDeptName  = $row["vchDeptName"];
                    $select = ($intDeptId==$selVal)?'selected="selected"':'';

                    $opt .= '<option value="'.$intDeptId.'" title="'.$vchDeptName.'" '.$select;
                   
                    $opt .= '>'.$vchDeptName.'</option>';

                }
                
            }
           
            echo json_encode(array('department'=>$opt));
    }
    
     public function  getFilterDepartmentList()
    {   
        $deptLogin  = ($_SESSION['adminConsole_Desg_Id']==0 ||$_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CMO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION)? 0:$_SESSION['adminConsole_DeptId'];
        include_once(CLASS_PATH."clsService.php");
             $obj         = new clsService;  
              $selVal = $_REQUEST['selVal'];    
             $result      = $obj->getDepartmentMaster('GDL');  
             $opt         = '<option value="0">--Select Department--</option>';
           
            if($result->num_rows>0)
            {               
                while($row  = $result->fetch_array())
                { // echo "<pre>";print_r($row);
                   $intDeptId  = $row["intDeptId"];
                   $vchDeptName  = $row["vchDeptName"];
                    $select = ($intDeptId==$selVal)?'selected="selected"':'';
                    if($deptLogin == 0 || $deptLogin== $intDeptId){
                        $opt .= '<option value="'.$intDeptId.'" title="'.$vchDeptName.'" '.$select;
                        $opt .= '>'.$vchDeptName.'</option>';
                    }

                }
                if($selVal =='14545'){
                    $opt .= '<option value="14545" selected="selected">Contact Center</option>';
                }else{
                    $opt .= '<option value="14545">Contact Center</option>';
                }
                
            }
           
            echo json_encode(array('department'=>$opt));
    }
     /*
      Function to get department wise service list in drop down
      By: Chinmayee
      On: 23-09-2019
     */

    public function getDeptWiseService()
    {
        include_once(CLASS_PATH."clsService.php");
        $obj             = new clsService;
        $deptId          = $_REQUEST['deptId'];
        $selVal          = $_REQUEST['selVal'];
        $dataArr         = array();
        $opt             = '<option value="0">---Select Service---</option>';
        $dataArr['intDepartmentId']         =$deptId;
        $result          = $obj->viewService('FAS',$dataArr);
        if($result->num_rows>0){
            $x=0;
                while($row=$result->fetch_array()){
                    if($row["intServiceRegistrationId"]==$selVal){
                        $selected='selected="selected"';
                    }else{
                        $selected='';
                    }
                    $opt.='<option value="'.$row["intServiceRegistrationId"].'" '.$selected.' >'.$row["vchServiceName"].'</option>';

                }
        }else{
           // Nothing to do
        }
        
        echo json_encode(array('opt' => $opt));
    }
     /*
      Function to get service wise scheme list in drop down
      By: Chinmayee
      On: 23-09-2019
     */

    public function getServiceWiseScheme()
    {
        include_once(CLASS_PATH."clsService.php");
        $obj             = new clsService;
        $serviceId          = $_REQUEST['serviceId'];
        $selVal          = $_REQUEST['selVal'];
        $dataArr         = array();
        $opt             = '<option value="0">---Select Scheme---</option>';
        $dataArr['intServiceId']         =$serviceId;
        $result          = $obj->viewService('FAST',$dataArr);
        if($result->num_rows>0){
            $x=0;
                while($row=$result->fetch_array()){
                    if($row["intSchemeTypeId"]==$selVal){
                        $selected='selected="selected"';
                    }else{
                        $selected='';
                    }
                    $opt.='<option value="'.$row["intSchemeTypeId"].'" '.$selected.' >'.$row["vchSchemeTypeName"].'</option>';

                }
        }else{
           // Nothing to do
        }
        
        echo json_encode(array('opt' => $opt));
    }

      /*
      Function to get all service list in drop down
      By: Chinmayee
      On: 25-09-2019
     */

    public function getAllService()
    {
        include_once(CLASS_PATH."clsService.php");
        $obj             = new clsService;
        $deptId          = $_REQUEST['deptId'];
        $selVal          = $_REQUEST['selVal'];
        $dataArr         = array();
        $opt             = '<option value="0">---Select Service---</option>';
        // $dataArr['intDepartmentId']         =$deptId;
        $result          = $obj->viewService('FAS',$dataArr);
        if($result->num_rows>0){
            $x=0;
                while($row=$result->fetch_array()){
                    if($row["intServiceRegistrationId"]==$selVal){
                        $selected='selected="selected"';
                    }else{
                        $selected='';
                    }
                    $opt.='<option value="'.$row["intServiceRegistrationId"].'" '.$selected.' >'.$row["vchServiceName"].'</option>';

                }
        }else{
           // Nothing to do
        }
        
        echo json_encode(array('opt' => $opt));
    }


    /*Function for get servies According to dept Data By:: Puja Kumari On:: 23-09-2019*/
          public function getService($deptId)
          {
           include_once(CLASS_PATH."clsService.php");
             $obj         = new clsService;  
             $deptId      =$_POST['deptId'];    
             $result      = $obj->getService('SDL',$deptId); 
             //$opt         = '<option value="0">--Select--</option>';
            //echo '<pre>';print_r($result);exit;
            $arrRes = array();
            if($result->num_rows>0)
            {               
                while($row  = $result->fetch_array())
                {  //echo "<pre>";print_r($row);exit;
                    $data['id'] = $row["intServiceRegistrationId"];
                    $data['serviceName'] = $row["vchServiceName"];
                    array_push($arrRes, $data);

                }
                echo json_encode(array('status' => 200, 'result' => $arrRes));
            }
                //else{
            //   echo json_encode(array('status' => 400));
            // }
           
       
          } 
        /*Function for get servies According to dept Data By:: Puja Kumari On:: 23-09-2019*/
          public function getServices($deptId)
          {
           include_once(CLASS_PATH."clsService.php");
             $obj         = new clsService;  
             $deptId      =$_POST['deptId'];    
             $result      = $obj->getService('SDL',$deptId); 
             $opt         = '<option value="0">--Select--</option>';
            if($result->num_rows>0)
            {               
                while($row  = $result->fetch_array())
                { //echo "<pre>";print_r($row);
                   $intServiceRegistrationId    = $row["intServiceRegistrationId"];
                   $vchServiceName               = $row["vchServiceName"];
                    $select = ($intServiceRegistrationId==$deptId)?'selected="selected"':'';

                    $opt .= '<option value="'.$intServiceRegistrationId.'" title="'.$vchServiceName.'" '.$select;
                   
                    $opt .= '>'.$vchServiceName.'</option>';

                }
                
            }
           
            echo json_encode(array('service'=>$opt));
    }
          


    /*
    Function to Add Survay Question 
    By: Niranjan Kumar
    On: 23-09-2019
    */

    public function addSurveyQuestionnaire(){
        include_once(CLASS_PATH."clsSurveyQuestionnaire.php");
        $objSurvey  = new clsSurveyQuestionnaire;
        return $objSurvey->addSurveyQuestionnaire();
    }

    /*
    Function to Receive Feedback Submit
    By: Niranjan Kumar Pandit
    On: 24-09-2019 
    */
    public function FeedbackSubmit(){
      include_once(CLASS_PATH."clsFeedback.php");
      $objSurvey  = new clsFeedback;
      return $objSurvey->FeedbackSubmit();
    }




   
     /*
      Function to get pull , revert, bookmarked data
      By: Chinmayee
      On: 25-09-2019
     */

    public function getOutBoundData()
    {
        include_once(CLASS_PATH."clsfetchOutboundData.php");
        $obj             = new clsfetchOutboundData;//, ctrlId, revertIds, numberofrec,vchDepartmentId,intServiceId,district,gender,agegroup
        $dataArr         = array();
        $action          = $_REQUEST['action'];
        $pulledBy        = $_REQUEST['pulledBy'];
        $revertIds       = $_REQUEST['revertIds'];
        $numberofrec     = $_REQUEST['numberofrec'];
        $vchDepartmentId = (!empty($_REQUEST['vchDepartmentId']))?$_REQUEST['vchDepartmentId']:DEPART_FSCW;
        $intServiceId    = (!empty($_REQUEST['intServiceId']))?$_REQUEST['intServiceId']:0;//$_REQUEST['intServiceId'];
        $intSchemeTypeId = (!empty($_REQUEST['intSchemeTypeId']))?$_REQUEST['intSchemeTypeId']:0;
        if(!empty($_REQUEST['district'])){
           $district        = $_REQUEST['district'];
        }else{
          if($_SESSION['adminConsole_Desg_Id']==CSO_DESIGNATION){
            $district        = $_SESSION['adminConsole_HierarchyId'];
          }else{
            $district        = 0;
          }
        }
        $gender          = (!empty($_REQUEST['gender']))?$_REQUEST['gender']:0;//$_REQUEST['gender'];
        $agegroup        = $_REQUEST['agegroup'];

        $dataArr['numberofrec']      = $numberofrec;
        $dataArr['vchDepartmentId']  = $vchDepartmentId;
        $dataArr['intServiceId']     = $intServiceId;
        $dataArr['intSchemeTypeId']  = $intSchemeTypeId;
        $dataArr['district']         = $district;
        $dataArr['gender']           = $gender;
        $dataArr['agegroup']         = $agegroup; 
        $dataArr['user_Id']          = (!empty($_SESSION['adminConsole_userID'])) ? $_SESSION['adminConsole_userID'] : 1;
        $dataArr['rank_Id']          = (!empty($_SESSION['adminConsole_rankId'])) ? $_SESSION['adminConsole_rankId'] : 0;
        $dataArr['intFeedbackStatus']= 0;
        
        $dataArr['intByDesignationId'] = (!empty($_SESSION['adminConsole_Desg_Id'])) ? $_SESSION['adminConsole_Desg_Id'] : 0;
        $dataArr['vchCitizenFromDate'] = (!empty($_REQUEST['vchCitizenFromDate'])) ? date('Y-m-d',strtotime($_REQUEST['vchCitizenFromDate'])) : '';
        $dataArr['vchCitizenToDate']   = (!empty($_REQUEST['vchCitizenToDate'])) ? date('Y-m-d',strtotime($_REQUEST['vchCitizenToDate'])) : '';
        $dataArr['intHospitalPolice']  = (!empty($_REQUEST['intHospitalPolice'])) ? $_REQUEST['intHospitalPolice'] : 0;
        $dataArr['range_id']           = (!empty($_SESSION['adminConsole_agency'])) ? $_SESSION['adminConsole_agency'] : 0;
        
        

        // $query = '';
        // if (count($keyAry) > 0) {
        //     foreach ($keyAry as $val2) { 
        //         $query .= 'vchTweetText like "%_' . $val2 . '_%" OR ';
        //     }
        //     $query = "(" . trim($query, ' OR') . ")";
        // }
        
        //$revertIds = (!empty($_POST['revertIds'])) ? implode(',', $_REQUEST['revertIds']) : array();
        $dataArr['revertIds']      =  rtrim($revertIds, ','); ;
        //exit();
        // $resultCount = $objDeskData->viewPostData('RC', 0, '', 0, '', '', '0000-00-00', '0000-00-00', '', $userId, 0, 0, 0, '', '');
        // $rowResultCount = $resultCount->fetch_array();
        // $readCount = $rowResultCount['readCount'];
        // $unReadCount = $rowResultCount['unreadCount'];
        // $bookmarkCount = $rowResultCount['bookmarkCount'];

//print_r($dataArr);exit;
        switch ($action) {
            case 'pull':
             if($pulledBy==1){
                $result = $obj->viewfetchOutboundData('VAA', $dataArr);
             }else{
                $result = $obj->viewfetchOutboundData('VCM', $dataArr); 
             }
                              
                break;
            case 'pullPrv':
                $result = $obj->viewfetchOutboundData('VXP', $dataArr);
                break;
            case 'revert':
                $resultData = $obj->viewfetchOutboundData('RP', $dataArr);
                break;
            case 'Bookmark':
                $result = $obj->viewfetchOutboundData('VA',$dataArr);
                break;
        }
        if ($result->num_rows > 0) {
            $ctr = 0;
            $encArry = array();
            while ($row = $result->fetch_array()) {
            
                //$userImg                                = $objDeskData->createAcronym($row['vchUserName']);
               // print_r($row);exit;
                $pageAry[$ctr]['intOutboundDataId']     = ($row['intOutboundDataId'])?$row['intOutboundDataId']:'--';
                $pageAry[$ctr]['intDepartmentId']       = ($row['intDepartmentId'])?$row['intDepartmentId']:'--';
                $pageAry[$ctr]['intServiceId']          = ($row['intServiceId'])?$row['intServiceId']:'--';
                $pageAry[$ctr]['vchServiceName']        = ($row['vchServiceName'])?$row['vchServiceName']:'--';
                $pageAry[$ctr]['vchSchemeTypeName']        = ($row['vchSchemeTypeName'])?$row['vchSchemeTypeName']:'--';
                $pageAry[$ctr]['vchCardName']        = ($row['vchCardName'])?$row['vchCardName']:'--';
                $pageAry[$ctr]['vchCardName']        = ($row['vchCardName'])?$row['vchCardName']:'--';
                $pageAry[$ctr]['vchRationCardNo']        = ($row['vchRationCardNo'])?$row['vchRationCardNo']:'--';
                $pageAry[$ctr]['intNoFamily']        = ($row['intNoFamily'])?$row['intNoFamily']:'--';
                $pageAry[$ctr]['vchTokenNo']        = ($row['vchTokenNo'])?$row['vchTokenNo']:'--';
                $pageAry[$ctr]['vchRegdNo']        = ($row['vchRegdNo'])?date('d-m-Y',strtotime($row['vchRegdNo'])):'--';
                $pageAry[$ctr]['dtmPaddyDeposite']        = ($row['dtmPaddyDeposite'])?date('d-m-Y',strtotime($row['dtmPaddyDeposite'])):'--';
               // $pageAry[$ctr]['DistrictName']          = ($row['DistrictName'])?$row['DistrictName']:'--';
                if($_SESSION['adminConsole_agency']==9){
                  if($row['intDistrictId']==8){
                    $pageAry[$ctr]['DistrictName']          = 'UPD, Cuttack';
                  }
                  if($row['intDistrictId']==20){
                    $pageAry[$ctr]['DistrictName']          = 'UPD, Bhubaneswar';
                  }
                  
                }else{
                  $pageAry[$ctr]['DistrictName']          = ($row['DistrictName'])?$row['DistrictName']:'--';
                }
                                
                $pageAry[$ctr]['intDistrictId']         = ($row['intDistrictId'])?$row['intDistrictId']:'--';
                $pageAry[$ctr]['BlockName']         = ($row['BlockName'])?$row['BlockName']:'--';
                $pageAry[$ctr]['GPName']         = ($row['GPName'])?$row['GPName']:'--';
                $pageAry[$ctr]['VillageName']         = ($row['VillageName'])?$row['VillageName']:'--';
                $pageAry[$ctr]['vchDeptName']           = ($row['vchDeptName'])?$row['vchDeptName']:'--';
                $pageAry[$ctr]['vchName']               = ($row['vchName'])?$row['vchName']:'--';
                $pageAry[$ctr]['intMobile']             = ($row['intMobile'])?$row['intMobile']:'--';
                $pageAry[$ctr]['intAge']                = ($row['intAge'])?$row['intAge']:'--';
                $pageAry[$ctr]['intGender']             = ($row['intGender'])?$row['intGender']:'--';
                $pageAry[$ctr]['intBookmark']           = ($row['intBookmark'])?$row['intBookmark']:'--';
                $pageAry[$ctr]['intAssignedTo']         = ($row['intAssignedTo'])?$row['intAssignedTo']:'--';
                $pageAry[$ctr]['dtmAssignedTime']       = date('d-M-Y',strtotime($row['dtmAssignedTime']));
                $pageAry[$ctr]['dtmFeedbackRcvTime']    = $row['dtmFeedbackRcvTime'];
                $pageAry[$ctr]['intFeedbackStatus']     = $row['intFeedbackStatus']; 
                $pageAry[$ctr]['dataType']              = $row['dataType']; 
                $pageAry[$ctr]['dtmCreatedOn']          = ($row['dtmCreatedOn'])?date('d-m-Y',strtotime($row['dtmCreatedOn'])):'--'; 
                $pageAry[$ctr]['vchCountCallHistory']   = ($row['vchCountCallHistory'])?$row['vchCountCallHistory']:'--'; 
                $pageAry[$ctr]['dtmRegdDateTime']       = ($row['dtmRegdDateTime'])?date('d-m-Y',strtotime($row['dtmRegdDateTime'])):'--'; 
                $pageAry[$ctr]['PO_Hospital']           = ($row['PO_Hospital'])?$row['PO_Hospital']:(($row['vchOther'])?$row['vchOther']:'--'); 
                $encArry['intOutboundDataId']=$row['intOutboundDataId'];
                $encArry['requestFrom']='CC';

                $returnText = '';
                    /*if($row['jsonRelatedInfo']){
                        $jsonRelatedInfo    = json_decode($row['jsonRelatedInfo'],true);
                      if($row['intServiceId'] == RCMS){
                        // echo "01/".$jsonRelatedInfo['dtmAllotment'];
                            if(strstr($jsonRelatedInfo['dtmAllotment'], '/')){
                               $allotDateArr =  explode('/', $jsonRelatedInfo['dtmAllotment']);
                                $dtmAllotment = date('Y-m-d',strtotime('01-'.$allotDateArr['0'].'-'.$allotDateArr['1']));
                            }else{
                              $dtmAllotment = date('Y-m-d',strtotime('01-'.$jsonRelatedInfo['dtmAllotment']));
                            } 
                            $dtmAllotment = date('M-Y',strtotime($dtmAllotment));
                            $returnText .= '<small class="text-info"><strong>Allotment Date: </strong>'.$dtmAllotment.'</small><br><small class="text-info"><strong>Rice in Kg: </strong>'.$jsonRelatedInfo['intRice'].'</small>,<small class="text-info"><strong>Wheat in Kg: </strong>'.$jsonRelatedInfo['intWheat'].'</small>,<small class="text-info"><strong>Kerosene in Ltr: </strong>'.$jsonRelatedInfo['floatKerosene'].'</small>';
                      }else{
                          $returnText = '---';
                      }
                    }*/

                    if($row['jsonRelatedInfo'] != '' /*&& $row['intServiceId'] == RCMS*/){
                      $jsonRelatedInfo    = json_decode($row['jsonRelatedInfo']);
                      $arrReletedInfo     = (array)$jsonRelatedInfo;
                      if(count($arrReletedInfo) > 0){
                          foreach($arrReletedInfo as $key => $infoVal){
                              // $vchRelatedInfo = str_replace("_"," ",$key).' : '.$infoVal;
                              $returnText .= '<small class="text-info"><div>'. str_replace("_"," ",$key) .' : '. $infoVal .'</div></small>';
                          }
                      }
                    }else{
                        $returnText .= '--';
                    }
                    // echo $returnText;
                    //<div><strong>Department : </strong>Health &amp; Family Welfare</div>
                
                $pageAry[$ctr]['encOutboundDataId']     = $obj->encrypt(json_encode($encArry));//$obj->encrypt($encArry);  
                $pageAry[$ctr]['vchOtherDetails']   = $returnText;//$obj->encrypt($encArry);  
                          
                $ctr++;
            }
            // print_r(json_encode($pageAry));  
        }
        // print_r($pageAry); exit;
        echo json_encode(array('SocialDeskResult' => $pageAry));
    }


/*
      Function to se bookmark for the data
      By: Chinmayee
      On: 25-09-2019
     */

    public function setBookMark()
    {
        include_once(CLASS_PATH."clsfetchOutboundData.php");
        $obj                = new clsfetchOutboundData;
        $intOutboundDataId  = $_REQUEST['intOutboundDataId'];        
        $dataArr            = array();
        $bookmarkStatus     = 0;
        $dataArr['intOutboundDataId']  = $intOutboundDataId;
        $result          = $obj->viewfetchOutboundData('SB',$dataArr);
        if($result){
            $bookmarkStatus=1;
            
        }else{
           // Nothing to do
            $bookmarkStatus=0;
        }
        
        echo json_encode(array('bookmarkStatus' => $bookmarkStatus));
    }

     /*
      Function to get department list in drop down
      By: Chinmayee
      On: 23-09-2019
     */


     /* Function to get Online users  BY: Chinmayee ON: 25-09-2019 */

     public function getOLUsers()
     {
         //$this->sendDailyStatusReport();exit;
         include_once("Console/config.php");
         include_once(ABSPATH . "/class_file/Common_class_inc.php");
         $pageAry = array();
         $objComCls = new commonClass();
         $sql = "CALL USP_ADMIN_LOGIN('OU','')";
         $result = $objComCls->ExecuteQuery($sql);
         if ($result->num_rows > 0) {
             $ctr = 0;
             while ($row = $result->fetch_array()) {
                 $pageAry[$ctr]['totusers'] = $result->num_rows;
                 $pageAry[$ctr]['username'] = $row['VCH_USER_NAME'];
                 $pageAry[$ctr]['fullName'] = $row['VCH_FULL_NAME'];
                 $pageAry[$ctr]['intUserId'] = $row['INT_USER_ID'];
                 $pageAry[$ctr]['totusers'] = $result->num_rows;
                 $ctr++;
             }
         }
         echo json_encode(array('OLUserResult' => $pageAry));
         //echo "data:{$ctr}\n\n";	
         // flush();
     }
    
     /* Function to get total called today BY: Chinmayee ON: 25-09-2019 */

     public function loadTotalCall()
     {
        include_once(CLASS_PATH."clsfetchOutboundData.php");
        $obj                         = new clsfetchOutboundData;
        $dataArr                     = array();
        $recCnt=0;
        $dataArr['user_Id']          = (!empty($_SESSION['adminConsole_userID'])) ? $_SESSION['adminConsole_userID'] : 1;
        $result                      = $obj->viewfetchOutboundData('CCH', $dataArr); 
        if ($result->num_rows > 0) {
            $ctr = 0;
            $row = $result->fetch_array();
            $recCnt= $row['CNT'];
            
        } 

         echo json_encode(array('recCnt' => $recCnt));
         
     }

    public function getDistrictList()
    {   
        include_once(CLASS_PATH."clsService.php");
             $obj         = new clsService;  
            $selVal = $_REQUEST['selVal'];   
            $idata['intDistrictId'] = !empty($_REQUEST['intDistrictId'])?$_REQUEST['intDistrictId']:0;  
             $result      = $obj->getDistrictMaster('GDM',$idata);  
             $opt         = '<option value="0">--Select District--</option>';

            if($result->num_rows>0)
            {               
                while($row  = $result->fetch_array()){ 
                  // echo "<pre>";print_r($row);exit;
                   $intDistrictId  = $row["INT_SUBNODEVAL_ID"];
                   $vchDistrictName  = $row["VCH_VALUE_NAME"];
                    $select = ($intDistrictId==$selVal)?'selected="selected"':'';

                    $opt .= '<option value="'.$intDistrictId.'" title="'.$vchDistrictName.'" '.$select;
                   
                    $opt .= '>'.$vchDistrictName.'</option>';

                }
                
            }
           
            echo json_encode(array('district'=>$opt));
    }


    public function getMapDataDashboard()//To show map at dashboard
    {   
        include_once(CLASS_PATH."clsService.php");
             $obj         = new clsService;  
              $fromDate   = '';
              $toDate     = '';
              // $fromDate   = $_REQUEST['fromDate'];
              // $toDate     = $_REQUEST['toDate'];
              
              $callType   = $_REQUEST['callType'];
              $outBoundId = $_REQUEST['outBoundId'];
              $deptSel1 = $_REQUEST['deptSel1'];
              $deptLogin  = ($_SESSION['adminConsole_Desg_Id']==0 ||$_SESSION['adminConsole_Desg_Id']==HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CMO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CS_DESIGNATION)? 0:$_SESSION['adminConsole_DeptId'];
              $deptFilter = !empty($_REQUEST['deptFilter'])? $_REQUEST['deptFilter']: 0;
              $deptFilter1 = !empty($_REQUEST['deptFilter'])? $_REQUEST['deptFilter']:$deptLogin;
               // print_r($callType ==2 && empty($deptFilter) && $deptSel1==2);exit;
              $newdeptSel1 =0;
               
               // else if($callType ==2 && !empty($deptFilter) && $deptSel1==1){
               //      $newdeptSel1=1;
               // }
               // echo $newdeptSel1 ; exit;
                // print_r($deptFilter); exit;
              $arrData = array();
              //if($callType == 0 ){    
                $result      = $obj->getMapData('GD',$fromDate,$toDate,$deptFilter, $outBoundId,$deptSel1);  
                if($callType ==2 && $deptSel1==2){
                    $newdeptSel1 =2;
                    $resultCall      = $obj->getMapData('GDC',$fromDate,$toDate,$deptFilter1, $outBoundId,$newdeptSel1);  
               }
                #$resultCall      = $obj->getMapData('GDC',$fromDate,$toDate,$deptFilter, $outBoundId,$newdeptSel1); 
            //}else{
                // if($callType == 3){
                //     $resultCall      = $obj->getMapData('GDC',$fromDate,$toDate,$deptFilter, $outBoundId);  
                // }
                
            //}
            if($result->num_rows>0)
            {               
                $totalOutbound=0;
                $totalInbound=0;
                $totalSrvcTransaction=0;
                $totalCalls;
                $i=0;
                while($row  = $result->fetch_array()){ 
                    $arrData[$i]['district_Id']      = $row['intDistrictId'];
                    $arrData[$i]['district_name']    = $row['districtName'];
                    $arrData[$i]['outbound']         = $row['outBoundCall'];
                    $arrData[$i]['inbound']          = $row['inBoundCall'];
                    $queryString['district_Id']          = $row['intDistrictId'];
                    $queryString['callType']          = $callType;
                    $queryString['outBoundId']          = $outBoundId;
                    $queryString['deptSel1']          = $deptSel1;
                    // $queryString['fromDate']          = $fromDate;
                    // $queryString['toDate']          = $toDate;
                    $queryString['deptLogin']          = $deptLogin;
                    $queryString['deptFilter']          = $deptFilter;
                    $queryString['newdeptSel1']          = $newdeptSel1;
                    $outBoundTodayEncrypt   = $obj->encrypt(json_encode($queryString));
                    $arrData[$i]['queryString']         = $outBoundTodayEncrypt;
                    // $p_arr['srvcTransaction']  = $row['srvcTransaction'];
                    // $p_arr['FeedbackRecieved'] = $row['calls'];
                    // array_push($arrData,$p_arr);
                    $totalOutbound= $totalOutbound+$row['outBoundCall'];
                    $totalInbound= $totalInbound+$row['inBoundCall'];
                   // $totalSrvcTransaction=$totalSrvcTransaction+$row['srvcTransaction'];
                    //$totalCalls =  $totalCalls+$row['calls'];
                    $i++;
                }
                // print_r($p_arr['inbound']);exit;
            }

            // print_r($resultCall);exit;
            // $outBoundToday['type']='1';            
            // $outBoundTodayEncrypt   = $objClsBind->encrypt(json_encode($outBoundToday));
            $arrDatas   = array();
            if($resultCall->num_rows > 0){
                $i = 0;
                $p_arrs = [];
                while ($rows = $resultCall->fetch_array()) {
                    $arrData[$i]['district_Id']      = $arrData[$i]['district_Id'];
                    $arrData[$i]['district_name']    = $arrData[$i]['district_name'];
                    $arrData[$i]['outbound']         = $arrData[$i]['outbound'];
                    $arrData[$i]['inbound']          = ($arrData[$i]['inbound'] + $rows['inBoundCall']);
                    $queryString['district_Id']          = $arrData[$i]['district_Id'];
                    $queryString['callType']          = $callType;
                    $queryString['outBoundId']          = $outBoundId;
                    $queryString['deptSel1']          = $deptSel1;
                    // $queryString['fromDate']          = $fromDate;
                    // $queryString['toDate']          = $toDate;
                    $queryString['deptLogin']          = $deptLogin;
                    $queryString['deptFilter']          = $deptFilter;
                    $queryString['newdeptSel1']          = $newdeptSel1;
                    $outBoundTodayEncrypt   = $obj->encrypt(json_encode($queryString));
                    $arrData[$i]['queryString']         = $outBoundTodayEncrypt;
                    // $p_arrs['srvcTransaction']  = $arrData[$i]['srvcTransaction'];
                    // $p_arrs['FeedbackRecieved'] = $arrData[$i]['FeedbackRecieved'];
                    $totalInbound = $totalInbound + $rows['inBoundCall'];
                    // array_push($arrData, $p_arrs);
                    // print_r($rows);exit;
                   $i++;
                }
            }
            // print_r($totalInbound);exit;
           
            echo json_encode(array('districtdetails'=>$arrData,'totalOutbound'=>$totalOutbound,'totalInbound'=>$totalInbound,'totalSrvcTransaction'=>$totalSrvcTransaction,'totalCalls'=>$totalCalls));
       }

      /* Function to get total called today BY: Chinmayee ON: 25-09-2019 */

      public function loadTotalRecordCollected()
      {
        include_once(CLASS_PATH."clsTransactionDataImport.php");
        $obj             = new clsTransactionDataImport;
        $result          =  $obj->fetchTransactionDataImport('CTR');
        $totalRecCnt     = 0;
        if($result->num_rows >0){
          $cntRow=$result->fetch_array();
          $totalRecCnt=$cntRow['totalRec'];
        }
 
          echo json_encode(array('recCnt' => $totalRecCnt));
          
      }
 
    /*
      Function to get Call Log Information
      By: Niranjan Kumar Pandit
      On: 24-09-2019
     */

    public function getCallInformation()
    {   
      include_once(CLASS_PATH."clsFeedback.php");
      $objFeedback  = new clsFeedback; 
      return $objFeedback->getCallInformation();
    }

    /*
      Function to get Services Details
      By: Niranjan Kumar Pandit
      On: 24-09-2019
     */

    public function getServiceDetails()
    {   
      include_once(CLASS_PATH."clsFeedback.php");
      $objFeedback  = new clsFeedback; 
      return $objFeedback->getServiceDetails();
    }

    /*
      Function to get FAQ Details
      By: Niranjan Kumar Pandit
      On: 24-09-2019
     */

    public function getFAQDetails()
    {   
      include_once(CLASS_PATH."clsFeedback.php");
      $objFeedback  = new clsFeedback; 
      return $objFeedback->getFAQDetails();
    }

     /*
      Function to get Inbound Information
      By: Niranjan Kumar Pandit
      On: 25-09-2019
     */
    public function getInboundInformation()
    {   
      include_once(CLASS_PATH."clsInBound.php");
      $objInBound  = new clsInBound; 
      return $objInBound->getInboundInformation();
    }

    /** Method For Get Offline Feedback Data From Mobile Number :: By: Niranjan Pandit :: On: 17-10-2019 **/
    public function getOfflineFeedbackData()
    {   
      include_once(CLASS_PATH."clsOfflineFeedback.php");
      $objOfflineFeedback  = new clsOfflineFeedback; 
      return $objOfflineFeedback->getOfflineFeedbackData();
    }


    public function getInboundSummary() // For InBound Call Sumarry Graph At Dashboard
    {   
    include_once(CLASS_PATH."clsService.php");
         $obj         = new clsService;  
          $fromDate = !empty($_REQUEST['fromDate'])?date('Y-m-d',strtotime($_REQUEST['fromDate'])):date('Y-m-d',strtotime('now -7 day'));
             $toDate   = !empty($_REQUEST['toDate'])? date('Y-m-d',strtotime($_REQUEST['toDate'])): date('Y-m-d');
          $arrData = array();  
          // echo $fromDate; exit;  
         $result      = $obj->getInboundSummary('GIC',$fromDate,$toDate);  
        $resList = array();
        $p_arr['totalInbound'] =0;
        $p_arr['inboundCalls'] =array();
        $p_arr['date'] = array();
        $begin = new DateTime($fromDate);
        $end = new DateTime(date('Y-m-d',strtotime($toDate.' + 1 day')));

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);
        if($result->num_rows>0)
        {               
            
            $totalInbound = 0;
            while($row  = $result->fetch_array()){ 
                  $resList[$row['dtmDate']] = intVal($row['calls']);

                  $totalInbound = $totalInbound+intVal($row['calls']);
              }
           
            // print_r($p_arr); exit;
       }
        foreach ($period as $dt) {
                $dt_new = $dt->format("Y-m-d");
                // echo $resList[$dt_new];
                // var_dump(in_array($dt_new, array_flip($resList)));
               if (!empty($resList[$dt_new])){
                  $p_arr['inboundCalls'][] = $resList[$dt_new];
                  $p_arr['date'][] = date('M, d', strtotime($dt_new));
               }else{
                 $p_arr['inboundCalls'][] = 0;
                  $p_arr['date'][] = date('M, d', strtotime($dt_new));
               }
            }

    $p_arr['totalInbound']= $totalInbound;
    echo json_encode(array('inboundSummary'=>$p_arr));
 }
      public function getOutboundSummary() // For InBound Call Sumarry Graph At Dashboard
    {   
        include_once(CLASS_PATH."clsService.php");
             $obj         = new clsService;  
             $fromDate = !empty($_REQUEST['fromDate'])?date('Y-m-d',strtotime($_REQUEST['fromDate'])):date('Y-m-d',strtotime('now -7 day'));
             $toDate   = !empty($_REQUEST['toDate'])? date('Y-m-d',strtotime($_REQUEST['toDate'])): date('Y-m-d');
             // echo $fromDate; exit;
              $arrData = array();
              $totalArr= array();
             $Totalresult      = $obj->getInboundSummary('GTO',$fromDate,$toDate);

             $result           = $obj->getInboundSummary('GOC',$fromDate,$toDate);  
            if($result->num_rows>0)
            {               

                while($row  = $result->fetch_array()){ 
                    // print_r($row); exit;
                  $newTotal=intVal($row['notRechable'])+intVal($row['notPicked'])+intVal($row['invalidNo'])+intVal($row['notIntrested'])+intVal($row['callRecieved'])+intVal($row['dnd'])+intVal($row['notCalled'])+intVal($row['CallLetter'])+intVal($row['NoIncomFacility'])+intVal($row['switchedOff']);
                    $p_arr['total']      = $newTotal;
                    $p_arr['name'] =array("Not Reachable","Did not Pick","Invalid Number","Did not want to talk / DND","Feedback Collected","Govt. Employee","To Be Updated","Call Later","No Incoming Call Facility","Switched Off");
                     $p_arr['resData'] =array(
                        array("Not Reachable (". intVal($row['notRechable']) .")" ,intVal($row['notRechable'])),
                        array("Did not Pick (". intVal($row['notPicked']) .")" , intVal($row['notPicked'])),
                        array("Invalid Number (". intVal($row['invalidNo']) .")" ,intVal($row['invalidNo'])),
                        array("Did not want to talk / DND (". intVal($row['notIntrested']) .")", intVal($row['notIntrested'])),
                        array("Feedback Collected (". intVal($row['callRecieved']) .")", intVal($row['callRecieved'])),
                        // array("DND (". intVal($row['dnd']) .")",intVal($row['dnd'])),
                        array("Govt. Employee (". intVal($row['govServant']) .")",intVal($row['govServant'])),
                        array("To Be Updated (". intVal($row['notCalled']) .")",intVal($row['notCalled'])),
                        array("Call Later (". intVal($row['CallLetter']) .")",intVal($row['CallLetter'])),
                        array("No Incoming Call Facility (". intVal($row['NoIncomFacility']) .")",intVal($row['NoIncomFacility'])),
                        array("Switched Off (". intVal($row['switchedOff']) .")",intVal($row['switchedOff']))
                    );
                }
            }
            if($Totalresult->num_rows>0)
            {               

                $row  = $Totalresult->fetch_array();
                // print_r($row); exit;
                    $p_arr['totalDept']                = $row['totalDepartment'];
                    $p_arr['totalContactCenter']       = $row['totalContactCenter'];
                    

                
            }
           
            echo json_encode(array('outboundSummary'=>$p_arr));
       }

      /*
      Function to Update Requested Status
      By: Niranjan Kumar Pandit
      On: 26-09-2019
     */
    public function UpdateRequestedStatus()
    {   
      include_once(CLASS_PATH."clsFeedback.php");
      $objFeedback  = new clsFeedback; 
      $intRequestStatus   = $_POST['intRequestStatus'];
      $intOutboundDataId  = $_POST['intOutboundDataId'];
      $arrResult          = $objFeedback->ReadFeedbackData('URS',array('intOutboundDataId' => $intOutboundDataId, 'intRequestStatus' => $intRequestStatus));
      if($arrResult){
        echo json_encode(array('result' => 'ok'));
      }
  }

    public function getHcmInformation(){   
      include_once(CLASS_PATH."clsAgentdashboard.php");
      $clsAgentdashboard  = new clsAgentdashboard; 
      return $clsAgentdashboard->getHcmInformation();
    }

    public function getDgInformation(){   
      include_once(CLASS_PATH."clsAgentdashboard.php");
      $clsAgentdashboard  = new clsAgentdashboard; 
      return $clsAgentdashboard->getDgInformation();
    }

    public function getCsInformation(){   
      include_once(CLASS_PATH."clsAgentdashboard.php");
      $clsAgentdashboard  = new clsAgentdashboard; 
      return $clsAgentdashboard->getCsInformation();
    }
    
    public function getItscInformation(){   
      include_once(CLASS_PATH."clsAgentdashboard.php");
      $clsAgentdashboard  = new clsAgentdashboard; 
      return $clsAgentdashboard->getItscInformation();
    }
   
    public function getCallBackRequestSession(){
        $_SESSION['AuthCallStart']          = $vchOutBoundId;
        $_SESSION['AuthCallStartType']      = $OutBoundType;
    }

    public function getCallBackRequest(){
        $userId         = $_SESSION['adminConsole_userID'];
        $vchOutBoundId  = rtrim($_POST['vchOutBoundId'],',');
        $OutBoundType   = rtrim($_POST['OutBoundType'],',');
        

        $arrOutBoundId    = explode(",",$vchOutBoundId);
        $arrOutBoundType  = explode(",",$OutBoundType);
        $arrOutId         = array();
        $arrInId          = array();
        if(count($arrOutBoundType) > 0){
          for($i = 0; $i < count($arrOutBoundType); $i++){
              array_push($arrOutId, $arrOutBoundId[$i]);
              // if($arrOutBoundType[$i] == 1){
              // }
              // else{
              //     array_push($arrInId, $arrOutBoundId[$i]);
              // }
          }
        }
        if(count($arrInId) > 0){
          $inBoundId  = implode(",",$arrInId);
        }else{
          $inBoundId  = '';
        }
        if(count($arrOutId) > 0){
          $outBoundId     = implode(',', $arrOutId);
        }else{
          $outBoundId     = '';
        }
        // print_r($outBoundId);echo '<br>';print_r($inBoundId);exit;

        include_once(CLASS_PATH."clsFeedback.php");
        $objFeedback  = new clsFeedback;

        $callInQueue        = 0;
        $callInConnecting   = 0;
        $callInConnected    = 0;
        $callInCompleted    = 0;

        $arrResult    = $objFeedback->ReadFeedbackData('GCR', array('intOutboundDataId' => $outBoundId, 'intInBoundId' => $inBoundId, 'intUserId' => $userId, 'vchOutBoundId'=>$vchOutBoundId));
        $returnText   = '';
        $i            = 0;
        while($row    = $arrResult->fetch_array()){
         // echo $row['intFeedbackRecId'] ;exit;
            if($row['intRequestStatus'] == 1){
                $vchStatus = "In Progress";
                ++$callInQueue;
                $vchStatusClass = 'badge badge-primary';
            }elseif($row['intRequestStatus'] == 2){
                $vchStatus = "Calling...";
                ++$callInConnecting;
                $vchStatusClass     = 'badge badge-warning';
            }elseif($row['intRequestStatus'] == 3){
                $vchStatus = "Connecting...";
                ++$callInConnected;
                $vchStatusClass     = 'badge badge-warning';
            }elseif($row['intRequestStatus'] == 4){
                ++$callInCompleted;
                $vchStatus = FEEDBACK_CALL_STATUS[$row['intFeedbackStatus']];
                if($row['intFeedbackStatus'] == 1){
                    $vchStatusClass = 'badge badge-success';
                }else{
                    $vchStatusClass = 'badge badge-danger';
                }
            }

            $OtherServicesText = '';
            // if($row['intServiceId'] == RCMS){
            //     if(!empty($row['vchCardName'])){
            //         $OtherServicesText .= '<small><div class="text-muted"><strong>Card Type: </strong>'. $row['vchCardName'] .'</div></small>';
            //     }
                
            // }
              $otherInfoTxt = '';
              /*if($row['jsonRelatedInfo']){
                  $jsonRelatedInfo    = json_decode($row['jsonRelatedInfo'],true);
                if($row['intServiceId'] == RCMS){
                  // echo "01/".$jsonRelatedInfo['dtmAllotment'];
                      if(strstr($jsonRelatedInfo['dtmAllotment'], '/')){
                         $allotDateArr =  explode('/', $jsonRelatedInfo['dtmAllotment']);
                          $dtmAllotment = date('Y-m-d',strtotime('01-'.$allotDateArr['0'].'-'.$allotDateArr['1']));
                      }else{
                        $dtmAllotment = date('Y-m-d',strtotime('01-'.$jsonRelatedInfo['dtmAllotment']));
                      } 
                      $dtmAllotment = date('M-Y',strtotime($dtmAllotment));
                      $otherInfoTxt .= '<small class="text-primary"><strong>Allotment Date: </strong>'.$dtmAllotment.'</small><br><small class="text-primary"><strong>Rice in Kg: </strong>'.$jsonRelatedInfo['intRice'].'</small>,<small class="text-primary"><strong>Wheat in Kg: </strong>'.$jsonRelatedInfo['intWheat'].'</small>,<small class="text-primary"><strong>Kerosene in Ltr: </strong>'.$jsonRelatedInfo['floatKerosene'].'</small>';
                }else{
                    $otherInfoTxt = '---';
                }
              }*/
              if($row['jsonRelatedInfo'] != '' /*&& $row['intServiceId'] == RCMS*/){
                $jsonRelatedInfo    = json_decode($row['jsonRelatedInfo']);
                $arrReletedInfo     = (array)$jsonRelatedInfo;
                if(count($arrReletedInfo) > 0){
                    foreach($arrReletedInfo as $key => $infoVal){
                        // $vchRelatedInfo = str_replace("_"," ",$key).' : '.$infoVal;
                        $otherInfoTxt .= '<small class="text-info"><div>'. str_replace("_"," ",$key) .' : '. $infoVal .'</div></small>';
                    }
                }
              }else{
                  $otherInfoTxt .= '--';
              }
            $vchGender  = ($row['intGender'] == 1)?'Male':'Female';
            $vchServiceDate = ($row['vchServiceDate'])?date('d-m-Y', strtotime($row['vchServiceDate'])):'--';
            $returnText .= '<tr>';
            $returnText .= '<td width="40px">'. ++$i .'</td>';
            $returnText .= '<td>';
            $returnText .= ($row['vchName'])?$row['vchName']:'--';
            $returnText .= '<div>';
            $returnText .= '<small><span class="text-primary">Age: '. $row['intAge'] .' Years, Gender: '. $vchGender .'</span></small><br>';
            $returnText .= '<small><span class="text-primary">Reg. Date: '. date('d-m-Y',strtotime($row['dtmRegdDateTime'])).'</span></small>';
            if($row['intServiceId']==RCMS){
              // $returnText .= '<br><small><span class="text-primary">Card Type: '. $row['vchCardName'].'</span></small>';
              $returnText .= '<br><small><span class="text-primary">Ration Card No.: '. $row['vchRationCardNo'].'</span></small>';
              $returnText .= '<br><small><span class="text-primary">No. of Family Member: '. $row['intNoFamily'].'</span></small>';
            }else{
               $returnText .= '<br><small><span class="text-primary">Token No.: '. $row['vchTokenNo'].'</span></small>';
              $returnText .= '<br><small><span class="text-primary">Deposite Date.: '. date('d-m-Y',strtotime($row['dtmPaddyDeposite'])).'</span></small>';
            }
            $returnText .= '</div>';
            $returnText .= '</td>';
            $returnText .= '<td>'. $row['intMobile'] .'</td>';
              $returnText .= '<td>';
              $returnText .= $row['vchDistrictName'];
            // $returnText .= '<small><div class="text-muted"><strong>District: </strong>'. $row['vchDistrictName'] .'</div></small>'.$OtherServicesText;
            // $returnText .= '<small><div class="text-muted"><strong>Block: </strong>'. $row['vchBlock'] .'</div></small>';
            // $returnText .= '<small><div class="text-muted"><strong>GP: </strong>'. $row['vchGP'] .'</div></small>';
            $returnText .= '</td>';
            $returnText .= '<td>';
            $returnText .= 'Service: '.$row['vchServiceName'];
            $returnText .= '<small><div class="text-muted"><strong>Scheme: </strong>'. $row['vchSchemeTypeName'] .'</div></small>'.$OtherServicesText;
            $returnText .= '</td>';
            $returnText .= '<td>';
            $returnText .= $otherInfoTxt;
            // if($row['intServiceId']==RCMS){
            //   $returnText .= '<small><div class="text-muted"><strong>Ration Card No.: </strong>'. $row['vchRationCardNo'] .'</div></small>';
            //   $returnText .= '<small><div class="text-muted"><strong>Card Type: </strong>'. $row['vchCardName'] .'</div></small>';
            //   $returnText .= '<small><div class="text-muted"><strong>No. of Family: </strong>'. $row['intNoFamily'] .'</div></small>';

            // }else{
            //   $returnText .= '<small><div class="text-muted"><strong>Token No.: </strong>'. $row['vchTokenNo'] .'</div></small>';
            //   $returnText .= '<small><div class="text-muted"><strong>Deposite Date: </strong>'. date('d-m-Y',strtotime($row['dtmPaddyDeposite'])) .'</div></small>';
            // }
            $returnText .= '</td>';
            $returnText .= '<td>'. $vchServiceDate .'</td>';
            $returnText .= '<td><span class="'. $vchStatusClass .'">'. $vchStatus .'</span>';
            if($row['intFeedbackStatus'] == 1 && $row['intFeedbackRecId'] > 0 && $row['intCountFeedbackAns'] == 0){
                $varFeedback      = "showFeedbackQuestionAnswer(". $row['intDepartmentId'] .",". $row['intServiceId'] .", ". $row['intFeedbackRecId'] .",'".$row['vchRationCardNo']."')";
                $returnText .= '<br><a href="javascript:void(0)" onclick="return '.$varFeedback.'" title="Collect Feedback" style="margin-top:5px;" class="btn btn-primary btn-xs">Feedback</a>';
            }
            $returnText .= '</td>';
            $returnText .= '</tr>';

            // print_r($row);
            $vchCurrentStatus       = ($row['vchCurrentStatus'])?FEEDBACK_CALL_STATUS[$row['vchCurrentStatus']]:0;
            $vchConnectingName      = ($row['vchConnectingName'])?$row['vchConnectingName']:'';
            $vchConnectingMobile    = ($row['vchConnectingMobile'])?$row['vchConnectingMobile']:'';
            $intStatus              = $row['vchCurrentStatus'];
        }
        
        // print_r($arrResult);exit;
        

        // $callInQueue            = $row['callInQueue'];
        // $callInConnected        = $row['callInConnected'];
        // $callInConnecting       = $row['callInConnecting'];
        // if($row['intPreviousStatus'] > 0){
        //     $vchStatus          = FEEDBACK_CALL_STATUS[$row['intPreviousStatus']];
        // }
        // $_SESSION['AuthCallStart']          = $vchOutBoundId;
        // $_SESSION['AuthCallStartType']      = $OutBoundType;
        if(($callInQueue + $callInConnecting + $callInConnected) == 0){
            unset($_SESSION['AuthCallStart']);
            unset($_SESSION['AuthCallStartType']);
        }
        $arrCountCall['callInQueue']        = $callInQueue;
        $arrCountCall['callInConnecting']   = $callInConnecting;
        $arrCountCall['callInConnected']    = $callInConnected;
        $arrCountCall['callInCompleted']    = $callInCompleted;
        $arrCountCall['vchCurrentStatus']   = $vchCurrentStatus;
        $arrCountCall['vchConnectingName']  = $vchConnectingName;
        $arrCountCall['vchConnectingMobile']= $vchConnectingMobile;
        $arrCountCall['intStatus']          = $intStatus;
        // print_r($_SESSION['AuthCallStart']);exit;
      echo json_encode(array('result' => $arrCountCall,'vchStatus' => $vchStatus,'vchTableData' => $returnText));
    }
    public function assignCallBackRequest(){
        $userId         = $_SESSION['adminConsole_userID'];
        $vchOutBoundId  = rtrim($_POST['vchOutBoundId'],',');
        $OutBoundType   = rtrim($_POST['OutBoundType'],',');
        

        $arrOutBoundId    = explode(",",$vchOutBoundId);
        $arrOutBoundType  = explode(",",$OutBoundType);
        $arrOutId         = array();
        $arrInId          = array();
        if(count($arrOutBoundType) > 0){
          for($i = 0; $i < count($arrOutBoundType); $i++){
              // if($arrOutBoundType[$i] == 1){
              //     array_push($arrOutId, $arrOutBoundId[$i]);
              // }
              // else{
              // }
              array_push($arrOutId, $arrOutBoundId[$i]);
          }
        }
        if(count($arrInId) > 0){
          $inBoundId  = implode(",",$arrInId);
        }else{
          $inBoundId  = '';
        }
        if(count($arrOutId) > 0){
          $outBoundId     = implode(',', $arrOutId);
        }else{
          $outBoundId     = '';
        }
        // print_r($outBoundId);echo '<br>';print_r($inBoundId);exit;

        include_once(CLASS_PATH."clsFeedback.php");
        $objFeedback  = new clsFeedback;

        $arrResult    = $objFeedback->ReadFeedbackData('ACR', array('intOutboundDataId' => $outBoundId, 'intInBoundId' => $inBoundId, 'intUserId' => $userId, 'vchOutBoundId'=>$vchOutBoundId));
        $_SESSION['AuthCallStart']          = $vchOutBoundId;
        $_SESSION['AuthCallStartType']      = $OutBoundType;

      echo json_encode(array('result' => $arrResult));
    }

    public function directCallCM(){
        $userId         = $_SESSION['adminConsole_userID'];
        $desigId        = ($_SESSION['adminConsole_Desg_Id'])?$_SESSION['adminConsole_Desg_Id']:0;
        include_once(CLASS_PATH."clsFeedback.php");
        $objFeedback  = new clsFeedback;

        $vchOutBoundId  = rtrim($_POST['vchOutBoundId'],',');
        $OutBoundType   = rtrim($_POST['OutBoundType'],',');

        $arrOutBoundId    = explode(",",$vchOutBoundId);
        $arrOutBoundType  = explode(",",$OutBoundType);
        $arrOutId         = array();
        $arrInId          = array();
        if(count($arrOutBoundType) > 0){
          $feedbackSubmitQrys     = '';
          for($i = 0; $i < count($arrOutBoundType); $i++){
            $intType = ($arrOutBoundType[$i] == 1)?1:2;
            $arrRetResult = $objFeedback->ReadFeedbackData('GDD', array('intOutboundId' => $arrOutBoundId[$i], 'intType' => $intType));
            if($arrRetResult->num_rows > 0){
                $arrRow         = $arrRetResult->fetch_array();
                // print_r($arrRow); exit;
                $intDepartmentId= $arrRow['intDepartmentId'];
                $intServiceId   = $arrRow['intServiceId'];
                $intDistrictId  = $arrRow['intDistrictId'];
                $intMobile  = $arrRow['intMobile'];
                // $int_hs_ps_id   = $arrRow['int_hs_ps_id'];
            }else{
                $intDepartmentId= 0;
                $intServiceId   = 0;
                $intDistrictId  = 0;
                $intMobile  = 0;
                // $int_hs_ps_id   = 0;
            }
            array_push($arrOutId, $arrOutBoundId[$i]);
            // if($arrOutBoundType[$i] == 1){
            // }
            // else{
            //     array_push($arrInId, $arrOutBoundId[$i]);
            // }
            // print_r($arrOutId); exit;
            $feedbackSubmitQrys .= '('. $arrOutBoundId[$i] .','.$userId.',2,3,now(),'.$userId.','.$desigId.','.$intDepartmentId.','.$intServiceId.','.$intDistrictId.','.$intMobile.'),';
            // echo $feedbackSubmitQrys; exit;
          }
        }
        $feedbackSubmitQry  = rtrim($feedbackSubmitQrys, ',');
        // print_r($feedbackSubmitQrys); exit;
        // if(count($arrInId) > 0){
        //   $inBoundId  = implode(",",$arrInId);
        // }else{
        //   $inBoundId  = '';
        // }
        if(count($arrOutId) > 0){
          $outBoundId     = implode(',', $arrOutId);
        }else{
          $outBoundId     = '';
        }
        // print_r($outBoundId);echo '<br>';print_r($inBoundId);exit;
        // print_r($outBoundId);exit;
        
        $arrResult    = $objFeedback->ReadFeedbackData('DCA', array('intOutboundDataId' => $outBoundId, 'intInBoundId' => $inBoundId, 'intUserId' => $userId, 'feedbackQry' => $feedbackSubmitQry));
        $row          = 1;
        // print_r($row);exit;
        // print_r($_SESSION['AuthCallStart']);exit;
      echo json_encode(array('result' => $row));
    }

    public function unAssignCallBackRequest(){
        $vchOutBoundId          = rtrim($_POST['vchOutBoundId'],',');
        $OutInBoundNotType      = rtrim($_POST['OutInBoundNotType'],',');

        $arrOutBoundId    = explode(",",$vchOutBoundId);
        $arrOutBoundType  = explode(",",$OutInBoundNotType);
        $arrOutId         = array();
        $arrInId          = array();
        if(count($arrOutBoundType) > 0){
          for($i = 0; $i < count($arrOutBoundType); $i++){
              if($arrOutBoundType[$i] == 1){
                  array_push($arrOutId, $arrOutBoundId[$i]);
              }
              else{
                  array_push($arrInId, $arrOutBoundId[$i]);
              }
          }
        }
        if(count($arrInId) > 0){
          $inBoundId  = implode(",",$arrInId);
        }else{
          $inBoundId  = '';
        }
        if(count($arrOutId) > 0){
          $outBoundId     = implode(',', $arrOutId);
        }else{
          $outBoundId     = '';
        }
        
        include_once(CLASS_PATH."clsFeedback.php");
        $objFeedback  = new clsFeedback;
        $arrResult    = $objFeedback->ReadFeedbackData('UCR', array('intOutboundDataId' => $outBoundId, 'intInBoundId' => $inBoundId));
        $row          = 1;
        // print_r($_SESSION['AuthCallStart']);exit;
      echo json_encode(array('result' => $row));
    }

    public function resetCallBackRequest(){
      $vchOutBoundId    = rtrim($_POST['vchOutBoundId'],',');
      $OutInBoundType   = rtrim($_POST['OutInBoundType'],',');
      $arrOutBoundId    = explode(",",$vchOutBoundId);
      $arrOutBoundType  = explode(",",$OutInBoundType);
      $arrOutId         = array();
      $arrInId          = array();
      if(count($arrOutBoundType) > 0){
        for($i = 0; $i < count($arrOutBoundType); $i++){
            if($arrOutBoundType[$i] == 1){
                array_push($arrOutId, $arrOutBoundId[$i]);
            }
            else{
                array_push($arrInId, $arrOutBoundId[$i]);
            }
        }
      }
      if(count($arrInId) > 0){
        $inBoundId  = implode(",",$arrInId);
      }else{
        $inBoundId  = '';
      }
      if(count($arrOutId) > 0){
        $outBoundId     = implode(',', $arrOutId);
      }else{
        $outBoundId     = '';
      }
      

      include_once(CLASS_PATH."clsFeedback.php");
      $objFeedback  = new clsFeedback;
      $arrResult    = $objFeedback->ReadFeedbackData('RCR', array('intOutboundDataId' => $outBoundId, 'intInBoundId' => $inBoundId));
      echo json_encode(array('result' => $arrResult->fetch_array()));
    }
    /*Function for get servies According to dept Data By:: Puja Kumari On:: 23-09-2019*/
      public function getLeftDashboard()
      {
       include_once(CLASS_PATH."clsService.php");
         $obj         = new clsService;  
         $result      = $obj->getLeftDashboard('GLD'); 
         $resData = array();
         if($result->num_rows>0){   
            $i=0;            
            while($row  = $result->fetch_array()){ 
                // print_r($row); exit;
                $resData[$i]['vchDeptName'] = $row['vchDeptName'];
                $resData[$i]['vchServiceName'] = $row['vchServiceName'];
                $resData[$i]['srvcTransaction'] = $row['srvcTransaction'];
                $resData[$i]['calls'] = $row['calls'];
                $i++;
                // print_r($row);
            }
        }
        // print_r($resData); exit;
        return $resData;
        // echo json_encode(array('service'=>$opt));
    }

    public function getAttenedCallsInformation(){   
      include_once(CLASS_PATH."clsAgentdashboard.php");
      $clsAgentdashboard  = new clsAgentdashboard; 
      return $clsAgentdashboard->getAttenedCallsInformation();
    }

    public function getPeopleDepartment()
      {
       include_once(CLASS_PATH."clsService.php");
         $obj         = new clsService;  
        $result      = $obj->getPeopleDepartment('GPD'); 
        // $result1      = $obj->getPeopleInbound('GPI'); 
        // print_r($_SESSION); exit;
         $resData = array();
         $resData['totalHome'] = 0;
         $resData['totalHealth'] = 0;
         $resData['totalCalls'] = 0;
         $resData['totalPeople'] = 0;
         if($result->num_rows>0){   
            // $i=0;            
            while($row  = $result->fetch_array()){ 
                // print_r($row);
               if($row['intServiceId']==PADDY){
                    $resData['totalHealth'] = $row['totalDepart'];
                    $citizenHomeContact['callType']          = "No";
                    $citizenHomeContact['district']          = (empty($_SESSION['adminConsole_HierarchyId']) || $_SESSION['adminConsole_HierarchyId']==1)?0:$_SESSION['adminConsole_HierarchyId'];
                    $citizenHomeContact['serviceId']         = PADDY;
                    //$citizenHomeContact['porteletId1']         = PADDY;
                    $citizenHomeContactQuery   = $obj->encrypt(json_encode($citizenHomeContact));
                    $resData['citizenHomeContactQuery'] = URL.'viewDataDetails/'.$citizenHomeContactQuery;
                    
               }else if($row['intServiceId']==RCMS){
                    $resData['totalHome'] = $row['totalDepart'];
                    $citizenHealthContact['callType']          = "No";
                    $citizenHealthContact['district']          = (empty($_SESSION['adminConsole_HierarchyId']) || $_SESSION['adminConsole_HierarchyId']==1)?0:$_SESSION['adminConsole_HierarchyId'];
                    $citizenHealthContact['serviceId']         = RCMS;
                    $citizenHealthContactQuery   = $obj->encrypt(json_encode($citizenHealthContact));
                    $resData['citizenHealthContactQuery'] = URL.'viewDataDetails/'.$citizenHealthContactQuery;
               }
                
            }
        }
        if($result1->num_rows>0){   
            $row  = $result1->fetch_array() ;
            $resData['totalCalls'] = $row['totalCalls'];
        }
        $resData['totalPeople'] = $resData['totalHealth'] + $resData['totalHome'];
        // print_r($resData); exit;
        echo json_encode($resData);// return $resData;
        
    }

    public function getCallSent()
      {
       include_once(CLASS_PATH."clsService.php");
         $obj         = new clsService;  
        $result      = $obj->getCallSent('GCS'); 
        //$
         // print_r($result); exit;
         $resData = array();
         $resData['callCenter'] = 0;
         $resData['auth'] = 0;
         $resData['totalCallSent'] = 0;
         if($result->num_rows>0){   
            // $i=0;            
            while($row  = $result->fetch_array()){ 
                $resData[$row['callSent']] = $row['totalCallSent'];
            }
        }
        
        $resData['totalCallSent'] = $resData['auth'] + $resData['callCenter'];
        if(!empty($resData['auth'])){
          $directCall['callType']          = "Yes";
          $directCall['AuthId']            = ($_SESSION['adminConsole_Privilege']==2 && $_SESSION['adminConsole_Desg_Id'] != FSCWS_DESIGNATION && $_SESSION['adminConsole_Desg_Id'] != PA_DESIGNATION)?$_SESSION['adminConsole_userID']:0; 
          $directCall['intCallThrough']    = '2';
          $directCall['intfeedbackCollectedBy']    = '3';
          $directCallQuery   = $obj->encrypt(json_encode($directCall));
          $resData['directCallQuery'] = URL.'viewCallMadeDetails/'.$directCallQuery;
        }else{
           $resData['directCallQuery'] = "javascript:void(0);";
        }
        if(!empty($resData['callCenter'])){
          $ccCall['callType']          = "Yes";
          $ccCall['AuthId']            = ($_SESSION['adminConsole_Privilege']==2 && $_SESSION['adminConsole_Desg_Id'] != FSCWS_DESIGNATION && $_SESSION['adminConsole_Desg_Id'] != PA_DESIGNATION)?$_SESSION['adminConsole_userID']:0; 
          $ccCall['intCallThrough']    = '1';
          $ccCall['intfeedbackCollectedBy']    = '3';
          $ccCallQuery   = $obj->encrypt(json_encode($ccCall));
          $resData['ccCallQuery'] = URL.'viewCallMadeDetails/'.$ccCallQuery;
        }else{
           $resData['ccCallQuery'] = "javascript:void(0);";
        }

        echo json_encode($resData);
    }
     public function getCC()
      {
       include_once(CLASS_PATH."clsService.php");
         $obj         = new clsService;  
        $result      = $obj->getCC('GCC'); 
        //$
         // print_r( $result->fetch_array()); exit;
         $resData = array();
         $resData['inbound'] = 0;
         $resData['outbound'] = 0;
         $resData['totalCC'] = 0;
         if($result->num_rows>0){   
            $row  = $result->fetch_array();
            //print_r($row);
            //$resData['inbound'] = $row['inbound'];
            $resData['outbound'] = $row['outbound'];           
        }        
        $resData['totalCC'] = $resData['inbound'] + $resData['outbound'];
          $ccCall['callType']                        = "Yes";
          $ccCall['intfeedbackCollectedBy']      = '2';
          $ccCall['district']          = (!empty($_SESSION['adminConsole_HierarchyId']) && $_SESSION['adminConsole_Privilege']==2)?$_SESSION['adminConsole_HierarchyId']:0;
          $ccCallQuery   = $obj->encrypt(json_encode($ccCall));
          $resData['ccCallQuery'] = URL.'viewCallMadeDetails/'.$ccCallQuery;

        echo json_encode($resData); 
    }
     public function getDailyAvgCall()
      {
       include_once(CLASS_PATH."clsService.php");
         $obj         = new clsService;  
        $result      = $obj->getCallSent('DVC'); 
         // print_r($result->fetch_array()); exit;
         $resData = array();
         $resData['TODAYCNT'] = 0;
         $resData['WEEKCNT'] = 0;
         $resData['MONTHCNT'] = 0;
         $resData['AVGCNT'] = 0;
         if($result->num_rows>0){   
            $row  = $result->fetch_array();
            $resData['AVGCNT'] = $row['AVGCNT'];
            $resData['TODAYCNT'] = $row['TODAYCNT'];
            $resData['WEEKCNT'] = $row['WEEKCNT'];
            $resData['MONTHCNT'] = $row['MONTHCNT'];
            if(!empty($resData['TODAYCNT'])){
              $todayContact['callType']          = 2;
             
              $todayContact['fromDate']= date('Y-m-d');
              $todayContact['toDate']= date('Y-m-d');
              $todayContact['intfeedbackCollectedBy']    = '3';
              $todayContact['AuthId']            = ($_SESSION['adminConsole_Privilege']==2)?$_SESSION['adminConsole_userID']:0; 
              $todayContactQuery   = $obj->encrypt(json_encode($todayContact));
              $resData['todayContactQuery'] = URL.'viewCallMadeDetails/'.$todayContactQuery;
            }else{
              $resData['todayContactQuery'] = "javascript:void(0);";
            }
             if(!empty($resData['WEEKCNT'])){
              $weekContact['callType']          = 2;  
              $weekContact['intfeedbackCollectedBy']    = '3';  
              $weekContact['AuthId']            = ($_SESSION['adminConsole_Privilege']==2)?$_SESSION['adminConsole_userID']:0;          
              $weekContact['fromDate']= date('Y-m-d', strtotime("last sunday"));//date('Y-m-d', strtotime('-'.$day.' days'));
              $weekContact['toDate']= date('Y-m-d', strtotime('+'.(6-$day).' days'));
              $weekContactQuery   = $obj->encrypt(json_encode($weekContact));
              $resData['weekContactQuery'] = URL.'viewCallMadeDetails/'.$weekContactQuery;
            }else{
               $resData['weekContactQuery'] = "javascript:void(0);";
            }
            if(!empty($resData['MONTHCNT'])){
              $monthContact['callType']          = 2;
              $monthContact['intfeedbackCollectedBy']    = '3'; 
              $monthContact['AuthId']            = ($_SESSION['adminConsole_Privilege']==2)?$_SESSION['adminConsole_userID']:0;              
              $monthContact['fromDate']= date('Y-m-01');
              $monthContact['toDate']= date('Y-m-d');
              $monthContactQuery   = $obj->encrypt(json_encode($monthContact));
              $resData['monthContactQuery'] = URL.'viewCallMadeDetails/'.$monthContactQuery;
            }else{
              $resData['monthContactQuery'] = "javascript:void(0);";
            }

        $resData['TODAYCNT'] = number_format($resData['TODAYCNT']);
        $resData['WEEKCNT'] = number_format($resData['WEEKCNT']);
        $resData['MONTHCNT'] = number_format($resData['MONTHCNT']);
        $resData['AVGCNT'] = number_format(round($resData['AVGCNT']));


        }
        // print_r($resData); exit;
        echo json_encode($resData); 
        
    }
    public function getDailyAvgCCCall()
      {
       include_once(CLASS_PATH."clsService.php");
         $obj         = new clsService;  
        $result      = $obj->getCallSent('DVCC'); 
         // print_r($result->fetch_array()); exit;
         $resData = array();
         $resData['TODAYCNT'] = 0;
         $resData['WEEKCNT'] = 0;
         $resData['MONTHCNT'] = 0;
         $resData['AVGCNT'] = 0;
         if($result->num_rows>0){   
            $row  = $result->fetch_array();
            //print_r($row);exit;

            $resData['TODAYCNT'] = $row['TODAYCNT'];
            $resData['WEEKCNT'] = $row['WEEKCNT'];
            $resData['MONTHCNT'] = $row['MONTHCNT'];
            $resData['AVGCNT'] = $row['AVGCNT'];
            if(!empty($resData['TODAYCNT'])){
              $todayContact['callType']          = 2;
              $todayContact['district']          = (!empty($_SESSION['adminConsole_HierarchyId']) && $_SESSION['adminConsole_Privilege']==2)?$_SESSION['adminConsole_HierarchyId']:0;
              $todayContact['intfeedbackCollectedBy']    = '2'; 
              $todayContact['fromDate']= date('Y-m-d');
              $todayContact['toDate']= date('Y-m-d');
              // $citizenContact['deptCC']= '14545';
              $todayContactQuery   = $obj->encrypt(json_encode($todayContact));
              $resData['todayContactQuery'] = URL.'viewCallMadeDetails/'.$todayContactQuery;
            }else{
              $resData['todayContactQuery'] = "javascript:void(0);";
            }
             if(!empty($resData['WEEKCNT'])){
              $weekContact['callType']          = 2;
              $weekContact['district']          = (!empty($_SESSION['adminConsole_HierarchyId']) && $_SESSION['adminConsole_Privilege']==2)?$_SESSION['adminConsole_HierarchyId']:0;
              $weekContact['intfeedbackCollectedBy']    = '2'; 

              $weekContact['fromDate']=date('Y-m-d', strtotime("last sunday"));;
              $weekContact['toDate']= date('Y-m-d', strtotime('+'.(6-$day).' days'));
              $weekContactQuery   = $obj->encrypt(json_encode($weekContact));
              $resData['weekContactQuery'] = URL.'viewCallMadeDetails/'.$weekContactQuery;
            }else{
               $resData['weekContactQuery'] = "javascript:void(0);";
            }
            if(!empty($resData['MONTHCNT'])){
              $monthContact['callType']          = 2;
              $monthContact['district']          = (!empty($_SESSION['adminConsole_HierarchyId']) && $_SESSION['adminConsole_Privilege']==2)?$_SESSION['adminConsole_HierarchyId']:0;
              $monthContact['intfeedbackCollectedBy']    = '2'; 
              $monthContact['fromDate']= date('Y-m-01');
              $monthContact['toDate']= date('Y-m-d');
              $monthContactQuery   = $obj->encrypt(json_encode($monthContact));
              $resData['monthContactQuery'] = URL.'viewCallMadeDetails/'.$monthContactQuery;
            }else{
              $resData['monthContactQuery'] = "javascript:void(0);";
            }






        }
        // print_r($resData); exit;
        echo json_encode($resData); 
        
    }
    public function getDailyAvgCallInbound()
      {
       include_once(CLASS_PATH."clsService.php");
         $obj         = new clsService;  
        $result      = $obj->getCallSent('DVI'); 
         // print_r($result->fetch_array()); exit;
         $resData = array();
         $resData['TODAYCNT'] = 0;
         $resData['WEEKCNT'] = 0;
         $resData['MONTHCNT'] = 0;
         $resData['AVGCNT'] = 0;
         if($result->num_rows>0){   
            $row  = $result->fetch_array();
            // print_r($row); exit;
            $resData['TODAYCNT'] = $row['TODAYCNT'];
            $resData['WEEKCNT'] = $row['WEEKCNT'];
            $resData['MONTHCNT'] = $row['MONTHCNT'];
            $resData['AVGCNT'] = $row['AVGCNT'];
        }
        // print_r($resData); exit;
        return $resData;;
        
    }
     public function getAvgCall()
      {
       include_once(CLASS_PATH."clsService.php");
         $obj         = new clsService;  
        $result      = $obj->getCallSent('VR'); 
        // $
         // print_r($result); exit;
         $resData = array();
         $resData['TODAYCNT'] = 0;
         $resData['WEEKCNT'] = 0;
         $resData['MONTHCNT'] = 0;
         $resData['AVGCNT'] = 0;
         if($result->num_rows>0){   
            $row  = $result->fetch_array() ;
            $resData['TODAYCNT'] = $row['TODAYCNT'];
            $resData['WEEKCNT'] = $row['WEEKCNT'];
            $resData['MONTHCNT'] = $row['MONTHCNT'];
            $resData['AVGCNT'] = $row['AVGCNT'];
            
        }
        
        // $resData['totalCallSent'] = $resData['auth'] + $resData['callCenter'];
        // print_r($resData); exit;
        return $resData;
        
    }
/*
Function to Update Call status after self made call
By: Chinmayee 
On: 29-09-2019
*/
    public function updateCallStatus()
    {
     include_once(CLASS_PATH."clsFeedback.php");
       $obj         = new clsFeedback;  
       $intFeedbackRecId            = $_REQUEST['intFeedbackRecId'];
       $selFeebackStatus            = $_REQUEST['selFeebackStatus'];
       $intDirectCallFeedbackStatus = $_REQUEST['intDirectCallFeedbackStatus'];
       $arrData["intFeedbackRecId"] = $intFeedbackRecId;
       $arrData["selFeebackStatus"] = $selFeebackStatus; 
       $arrData["intDirectCallFeedbackStatus"] = $intDirectCallFeedbackStatus; 
       $sucessSts=0;

       $result      = $obj->ReadFeedbackData('UCS',$arrData);  
            if($result)
            {               
              $sucessSts++;
                
            }
           
            echo json_encode(array('sucessSts'=>$sucessSts));
      
      
  }



    public function AuthCallCancel(){
        $vchOutBoundId  = rtrim($_POST['vchOutBoundId'],',');
        $OutBoundType   = rtrim($_POST['OutBoundType'],',');

        $arrOutBoundId    = explode(",",$vchOutBoundId);
        $arrOutBoundType  = explode(",",$OutBoundType);
        $arrOutId         = array();
        $arrInId          = array();
        if(count($arrOutBoundType) > 0){
          for($i = 0; $i < count($arrOutBoundType); $i++){
                  array_push($arrOutId, $arrOutBoundId[$i]);
              // if($arrOutBoundType[$i] == 1){
              // }
              // else{
              // array_push($arrInId, $arrOutBoundId[$i]);
              // }
          }
        }
        // if(count($arrInId) > 0){
        //   $inBoundId  = implode(",",$arrInId);
        // }else{
        //   $inBoundId  = '';
        // }
        if(count($arrOutId) > 0){
          $outBoundId     = implode(',', $arrOutId);
        }else{
          $outBoundId     = '';
        }

        include_once(CLASS_PATH."clsFeedback.php");
        $objFeedback  = new clsFeedback;
        // print_r($vchOutBoundId);exit;
        $arrResult    = $objFeedback->ReadFeedbackData('CCR', array('intOutboundDataId' => $outBoundId, 'intInboundDataId' => $inBoundId, 'intRequestedById' => $_SESSION['adminConsole_userID'], 'intCallBackRequest' => $_SESSION['adminConsole_Desg_Id']));
        if($arrResult)
            $row = 1;

        unset($_SESSION['AuthCallStartType']);
        unset($_SESSION['AuthCallStart']);
        //$row          = $arrResult->fetch_array();
        /*$_SESSION['AuthCallStart']    = $vchOutBoundId;
        $callInQueue            = $row['callInQueue'];
        $callInConnected        = $row['callInConnected'];
        $callInConnecting       = $row['callInConnecting'];
        if(($callInQueue + $callInConnecting + $callInConnected) == 0){
            unset($_SESSION['AuthCallStart']);
        }*/
      echo json_encode(array('result' => $row));
    }
    public function searchLocationName()
    {
        include('clsInBound.php');
        $obj = new clsInBound;
        $locationVal = $_REQUEST['selVal'];
        $result = $obj->getData('SBN', 0, 0, 0, 0, $locationVal, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, '');
        $arrRow = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                //print_r($row);
                $arrRow[] = array('intSubnodeValId' => $row['INT_SUBNODEVAL_ID'], 'intParentId' => $row['INT_PARENT_NODE'], 'VCH_VALUE_NAME' => $row['VCH_VALUE_NAME'], 'vchLocationName' => $row['locationName'], 'intSubNodeId' => $row['nodeVal']);
            }
        }

        echo json_encode(array('locationName' => $arrRow));
    }

    public function getInboundCallRequest(){
        $intInboundDataId  = $_REQUEST['intInboundDataId'];
        $userId            = $_REQUEST['userId'];

        

        include_once(CLASS_PATH."clsInBound.php");
        $obj  = new clsInBound;
        $result    = $obj->requestInBound('RIC',$intInboundDataId,$userId);
        // print_r($result); exit;
        if($result==1){

            // unset($_SESSION['AuthCallStart']);
            // unset($_SESSION['AuthCallStartType']);
            $_SESSION["AuthCallStart"] = $intInboundDataId;
            $_SESSION["AuthCallStartType"] = 2;
        }


        // print_r($_SESSION['AuthCallStart']);exit;
      echo json_encode(array('result' => $result));
      exit;
    }
      /*
Function to generate action sheet
By: Chinmayee 
On: 29-09-2019
*/
public function generateActionSheet2()
{
 include_once(CLASS_PATH."clsOutboundMis.php");
   $obj         = new clsOutboundMis;  
   $intFeedbackRecId = rtrim($_REQUEST['intFeedbackRecId'], ','); 
   
   $fileName="actionsheet".time().".pdf";

   $arrData["intFeedbackRecId"] =  $intFeedbackRecId; 
   // print_r($arrData); exit;
   $sucessSts=0;
   //echo 1;exit;
    $result      = $obj->viewOutboundMis('VCR',$arrData);  
        if($result)
         {                       
          include_once(SITE_PATH.'view/actionSheet.php');        
          $docUrl=URL.'uploadDocuments/' . $fileName;
       }
  //       // ob_end_clean();
  //       // header("Content-Type: application/octet-stream");
  //       // header("Content-Disposition: attachment;filename=$fileName");
  //        ob_clean();
  //        flush();
        // readfile(DOC_SERVER_UPLOAD_PATH . $fileName);
        
        //exit;  
    echo json_encode(array('sucessSts'=>1, 'docUrl'=>$docUrl));
}
    public function getDeptWisePolice()
    {   
         include_once(CLASS_PATH."clsService.php");
        $obj             = new clsService;
        $districtId          = $_REQUEST['districtId'];
        $selVal          = $_REQUEST['selVal'];
        $dataArr         = array();
        $opt             = '<option value="0">---Select Police Station---</option>';
        $dataArr['intDistrictId']         =$districtId;
        $result          = $obj->viewService('GMP',$dataArr);
        if($result->num_rows>0){
            $x=0;
                while($row=$result->fetch_array()){
                    if($row["intPolicestationId"]==$selVal){
                        $selected='selected="selected"';
                    }else{
                        $selected='';
                    }
                    $opt.='<option value="'.$row["intPolicestationId"].'" '.$selected.' >'.$row["vchPolicestationName"].'</option>';

                }
        }else{
           // Nothing to do
        }
        // $opt             .= '<option value="other">OTHER</option>';
        echo json_encode(array('opt' => $opt));
    }

    public function getDeptWiseHospital()
    {   
         include_once(CLASS_PATH."clsService.php");
        $obj             = new clsService;
        $districtId          = $_REQUEST['districtId'];
        $selVal          = $_REQUEST['selVal'];
        $dataArr         = array();
        $opt             = '<option value="0">---Select Hospital---</option>';
        $dataArr['intDistrictId']         =$districtId;
        $result          = $obj->viewService('GMH',$dataArr);
        if($result->num_rows>0){
            $x=0;
                while($row=$result->fetch_array()){
                    if($row["intHospitalId"]==$selVal){
                        $selected='selected="selected"';
                    }else{
                        $selected='';
                    }
                    $opt.='<option value="'.$row["intHospitalId"].'" '.$selected.' >'.$row["vchHospitalName"].'</option>';

                }
        }else{
           // Nothing to do
        }
        // $opt             .= '<option value="other">OTHER</option>';
        echo json_encode(array('opt' => $opt));
    }
    function firstDayOf($period, DateTime $date = null)
{
    $period = strtolower($period);
    $validPeriods = array('year', 'quarter', 'month', 'week');
 
    if ( ! in_array($period, $validPeriods))
        throw new InvalidArgumentException('Period must be one of: ' . implode(', ', $validPeriods));
 
    $newDate = ($date === null) ? new DateTime() : clone $date;
 
    switch ($period) {
        case 'year':
            $newDate->modify('first day of january ' . $newDate->format('Y'));
            break;
        case 'quarter':
            $month = $newDate->format('n') ;
 
            if ($month < 4) {
                $newDate->modify('first day of january ' . $newDate->format('Y'));
            } elseif ($month > 3 && $month < 7) {
                $newDate->modify('first day of april ' . $newDate->format('Y'));
            } elseif ($month > 6 && $month < 10) {
                $newDate->modify('first day of july ' . $newDate->format('Y'));
            } elseif ($month > 9) {
                $newDate->modify('first day of october ' . $newDate->format('Y'));
            }
            break;
        case 'month':
            $newDate->modify('first day of this month');
            break;
        case 'week':
            $newDate->modify(($newDate->format('w') === '0') ? 'monday last week' : 'monday this week');
            break;
    }
 
    return $newDate;
}
public function getRequestedByList()
    {   
        include_once(CLASS_PATH."clsService.php");
             $obj         = new clsService;  
              $selVal = $_REQUEST['selVal'];    
             $result      = $obj->getDepartmentMaster('GRB');  
             $opt         = '<option value="0">--Select Authority--</option>';
           
            if($result->num_rows>0)
            {               
                while($row  = $result->fetch_array())
                { // echo "<pre>";print_r($row);
                   $intRequestedById  = $row["INT_USER_ID"];
                   $vchFullName  = $row["VCH_FULL_NAME"];
                    $select = ($intRequestedById==$selVal)?'selected="selected"':'';

                    $opt .= '<option value="'.$intRequestedById.'" title="'.$vchFullName.'" '.$select;
                   
                    $opt .= '>'.$vchFullName.'</option>';

                }
                
            }
           
            echo json_encode(array('department'=>$opt));
    }

     /*
      Function to get Inbound Information
      By: Niranjan Kumar Pandit
      On: 25-09-2019
     */
    public function setTodayYesterdayAll()
    {   
        $_SESSION['TodayYesterdayAll'] = $_POST['selVal'];
         $arrResult = array('status' =>1);
        echo json_encode($arrResult);
        exit;
      // include_once(CLASS_PATH."clsInBound.php");
      // $objInBound  = new clsInBound; 
      // return $objInBound->setTodayYesterdayAll();
    }

     /** Function for Get Question and Answer **/
    public function showFeedbackQuestionAnswer(){
        include(CLASS_PATH.'clsFeedback.php');
        // print_r($_REQUEST); exit;
        $obj = new clsFeedback;
        $intDepartmentId    = $_REQUEST['intDepartmentId'];
        $intServiceId       = $_REQUEST['intServiceId'];
        $cardNo             = ($_REQUEST['cardNo'])?$_REQUEST['cardNo']:'';

        if($intDepartmentId > 0 || $intServiceId > 0){
            $arrSurveyQuestId   = [];
            $arrType            = [];
            $arrQuestionEnglish = [];
            $arrQuestionOdia    = [];
            $arrSurveyOptionId  = [];
            $arrOptionEnglish   = [];
            $arrOptionOdia      = [];
            $arrOptionValue     = [];
            $arrOptionSelection = [];
            $arrRemarksStatus = [];

            $arrQuestion  = $obj->ReadFeedbackData('GQ',array('intDepartmentId' => $intDepartmentId, 'intServicesId' => $intServiceId));
            // print_r($arrQuestion); exit;
            if($arrQuestion->num_rows > 0){
              while($QRow = $arrQuestion->fetch_array()){
                array_push($arrSurveyQuestId, $QRow['intSurveyQuestId']);
                array_push($arrType, $QRow['intType']);
                array_push($arrQuestionEnglish, $QRow['vchQuestionEnglish']);
                array_push($arrQuestionOdia, $QRow['vchQuestionOdia']);
                array_push($arrOptionSelection, $QRow['intOptionSelection']);
                array_push($arrRemarksStatus, $QRow['intRemarksStatus']);
                array_push($arrSurveyOptionId, explode("~||~",$QRow['intSurveyOptionId']));
                array_push($arrOptionEnglish, explode("~||~",$QRow['vchOptionEnglish']));
                array_push($arrOptionOdia, explode("~||~",$QRow['vchOptionOdia']));
                array_push($arrOptionValue, explode("~||~",$QRow['intOptionValue']));
              } 
            }
        }


        $returnHtml = '';

        $returnHtml .= '<div class="tab-content form-group">';
        if($cardNo){
          $returnHtml .= '<div class="col-sm-12">';
          $returnHtml .= '<div class="form-group">';
          $returnHtml .= '<div class="clsRCardNo"><h5>Ration Card No:- '.$cardNo.'</h5></div>';
          $returnHtml .= '</div>';
          $returnHtml .= '</div>';
        }
          if(count($arrSurveyQuestId) > 0){
            for($i = 0; $i < count($arrSurveyQuestId); $i++){
              $active   = ($i == 0)?'active':'';
              
            //$returnHtml .= '<div id="question_'. $i .'" class="tab-pane  in '. $active .'">';
            $returnHtml .= '<div id="question_'. $i .'" class="col-sm-6">';
            $returnHtml .= '<div class="feedback-categories">';
            $returnHtml .= '<h6><span class="english">'. $arrQuestionEnglish[$i] .'</span><span class="odiya">'. $arrQuestionOdia[$i] .'</span></h6>';
            $returnHtml .= '<div class="form-group">';
            $returnHtml .= '<input type="hidden" name="question[]" value="'. $arrSurveyQuestId[$i] .'">';
                
                if(count($arrSurveyOptionId[$i]) > 0){
                  for($j = 0; $j < count($arrSurveyOptionId[$i]); $j++){
                    if($arrOptionSelection[$i] == 1){
                    
                        // $returnHtml .= '<div class="radio">';
                        $returnHtml .= '<input id="option-redio-'.$arrSurveyOptionId[$i][$j] .'" value="'. $arrSurveyOptionId[$i][$j] .'" class="magic-radio option-redio" type="radio" name="'. $arrSurveyQuestId[$i] .'[]">';
                        $returnHtml .= '<label for="option-redio-'. $arrSurveyOptionId[$i][$j] .'"><span class="english">'. $arrOptionEnglish[$i][$j] .'</span><span class="odiya">'. $arrOptionOdia[$i][$j] .'</span></label>&nbsp;&nbsp;';
                        // $returnHtml .= '</div>';
                    }else if($arrOptionSelection[$i] == 2){
                        // $returnHtml .= '<div class="checkbox">';
                        $returnHtml .= '<input id="option-redio-'.$arrSurveyOptionId[$i][$j].'" value="'.$arrSurveyOptionId[$i][$j].'" class="magic-checkbox option-checkbox" type="checkbox" name="'.$arrSurveyQuestId[$i].'[]">';
                        $returnHtml .= '<label for="option-redio-'.$arrSurveyOptionId[$i][$j] .'"><span class="english">'.$arrOptionEnglish[$i][$j].'</span><span class="odiya">'.$arrOptionOdia[$i][$j].'</span></label>&nbsp;&nbsp;';
                        // $returnHtml .= '</div>';
                    }else{
                        // $returnHtml .= '<div class="checkbox">';
                        $returnHtml .= '<input id="option-redio-'.$arrSurveyOptionId[$i][$j].'" value="'.$arrSurveyOptionId[$i][$j].'" class="magic-checkbox option-checkbox" checked type="checkbox" name="'.$arrSurveyQuestId[$i].'[]">';
                        $returnHtml .= '<input type="hidden" name="'.$arrSurveyQuestIds[$i].'[]" disabled value="'.$arrSurveyOptionId[$i][$j].'">';
                        $returnHtml .= '<label for="option-redio-'.$arrSurveyOptionId[$i][$j] .'"><span class="english">'.$arrOptionEnglish[$i][$j].'</span><span class="odiya">'.$arrOptionOdia[$i][$j].'</span></label> : <input type="tel" maxlength="2" onkeypress="return isNumberKey(event)" name="text'.$arrSurveyQuestId[$i].'[]" class="form-controls" autocomplete="off">&nbsp;&nbsp;';
                        // $returnHtml .= '</div>';
                    }
                  }
                }
                if($arrRemarksStatus[$i] == 1){
                  $d_none = 'style="display:block;"';
                }else{
                  $d_none = 'style="display:none;"';
                }

                $returnHtml .= '</div>';
                $returnHtml .= '<div class="form-group" '.$d_none.'>';
                $returnHtml .= '<input type="text" name="vchRemarks[]" '.$d_none.' maxlength="80" placeholder="Remarks" class="form-control" id="vchRemarks_'. $arrSurveyQuestId[$i] .'">';
                $returnHtml .= '</div>';
                $returnHtml .= '</div>';
                $returnHtml .= '</div>';
            }
            // $returnHtml .= '<div class="qs-skiper">';
            // $returnHtml .= '<a href="javascript:void(0)" class="prevtab ">Prev</a> ';
            // $returnHtml .= '<a href="javascript:void(0)"  class="nexttab active">Next</a>';
            // $returnHtml .= '</div>';
        }
        $returnHtml .= '</div>';
        $returnHtml .= '<div class="form-group"><div class="col-sm-6">';
        $returnHtml .= '<button type="button" class="btn btn-success" id="submitBtnFeedbackAnswer" onclick="return submitFeedbackAnswer()">Submit</button>';
        $returnHtml .= '</div></div>';
        // if(count($arrSurveyQuestId) > 0){
        // $returnHtml .= '<div class="question-tabs">';
        // $returnHtml .= '<ul class="nav nav-tabs">';
        //     for($i = 0; $i < count($arrSurveyQuestId); $i++){
        //     $active   = ($i == 0)?'active':'';
        //     $returnHtml .= '<li class="'.$active.' '.'quest_'.$arrSurveyQuestId[$i] .'"><a data-toggle="tab" href="#question_'. $i .'">'. ($i+1) .'</a></li>';
        //     }
        //   $returnHtml .= '</ul>';
        //   $returnHtml .= '<div class="clearfix"></div>';
        //   $returnHtml .= '</div>';
        // }
        // echo $returnHtml; exit;
        echo json_encode(array('result'=>$returnHtml));
    }

    function viewMapData($action, $dataArr){
        include_once(CLASS_PATH."clsService.php");
        $obj         = new clsService;  
        $result      = $obj->viewMapData($action,$dataArr);  
        return  $result ; 
    }


    function fillRangeWisePolicestation(){
      include_once(CLASS_PATH."clsPolicestation.php");
      $obj         = new clsPolicestation;
      $dataArr     = array();
      $rangeId     = $_REQUEST['rangeId'];
      $selVal     = $_REQUEST['selVal'];
      
      $dataArr['rangeId']     = $rangeId;
      $dataArr['districtId']     = $selVal;

      $result      = $obj->viewPolicestation('FT',$dataArr);  
      $opt         = '<option value="0">--Select Police Station--</option>';
           
            if($result->num_rows>0)
            {               
                while($row  = $result->fetch_array())
                { // echo "<pre>";print_r($row);
                   $intPolicestationId  = $row["intPolicestationId"];
                   $vchPolicestationName  = $row["vchPolicestationName"];
                   $select = ($intPolicestationId==$selVal)?'selected="selected"':'';

                    $opt .= '<option value="'.$intPolicestationId.'" title="'.$vchPolicestationName.'" '.$select;
                   
                    $opt .= '>'.$vchPolicestationName.'</option>';

                }
                
            }

            echo json_encode(array('result'=>$opt));

  }


  function fillDistrictRangeWise(){
    include_once(CLASS_PATH."clsPolicestation.php");
    $obj         = new clsPolicestation;
    $dataArr     = array();
    $rangeId     = $_REQUEST['rangeId'];
    $selVal     = $_REQUEST['selVal'];
    $opt         = '<option value="0">--Select District--</option>';
    if($rangeId==9){
      $opt       .= '<option value="20">UPD, Bhubaneswar</option>';
      $opt       .= '<option value="8">UPD, Cuttack</option>';
      
    }else{
    $dataArr['rangeId']     = $rangeId;
    $result      = $obj->viewPolicestation('FD',$dataArr);  
    
         
          if($result->num_rows>0)
          {               
              while($row  = $result->fetch_array())
              { // echo "<pre>";print_r($row);
                 $intConsoleDistId  = $row["intConsoleDistId"];
                 $districtName  = $row["districtName"];
                 $select = ($intConsoleDistId==$selVal)?'selected="selected"':'';

                  $opt .= '<option value="'.$intConsoleDistId.'" title="'.$districtName.'" '.$select;
                 
                  $opt .= '>'.$districtName.'</option>';

              }
              
          }
        }

          echo json_encode(array('result'=>$opt));

}

function getCallDetails(){
    include_once(CLASS_PATH."clsService.php");
    $obj         = new clsService;  
    $intOutboundDataId   = $_POST['intOutboundDataId'];
    $dataArr['intOutboundDataId'] = $intOutboundDataId;
    $result      = $obj->getCallDetails('GFD',$dataArr);  
    // $str = ""
    if($result->num_rows > 0){
        $vchReturnText  = '<div class="table-responsive"><table data-toggle="table" class="table table-hover table-bordered"><thead><tr><th width="40px">Sl#</th> <th>Date</th> <th>Requested By</th> <th>Feedback Collected By</th> <th>Call Type</th><th>Call Through</th></tr></thead><tbody>';
        $i=0;
        while($row = $result->fetch_array()){
            $vchReturnText .= "<tr>";
            $vchReturnText .= "<td>".(++$i)."</td>";
            $vchReturnText .= !empty($row['dtmCreatedOn'])?"<td>".date('d-m-Y',strtotime($row['dtmCreatedOn']))."</td>":"<td>---</td>";
            $vchReturnText .= !empty($row['VCH_FULL_NAME'])?"<td>".$row['VCH_FULL_NAME']."</td>":"<td>---</td>";
            $vchReturnText .= !empty($row['vchCallect'])?"<td>".$row['vchCallect']."</td>":"<td>---</td>";
            $vchReturnText .= !empty($row['vchType'])?"<td>".$row['vchType']."</td>":"<td>---</td>";
            $vchReturnText .= !empty($row['vchCall'])?"<td>".$row['vchCall']."</td>":"<td>---</td>";
            $vchReturnText .= "</tr>";
        }
        $vchReturnText .= '</tbody></table></div>';
    }else{
        $vchReturnText = '<h4 class="empty-content">Sorry! No record found.</h4>';
    }
    echo $vchReturnText; exit;
    // if($result->num_rows>0){               
  //     while($row  = $result->fetch_array())
  //     { echo "<pre>";print_r($row);exit;
  //        $intConsoleDistId  = $row["intConsoleDistId"];
  //        $districtName  = $row["districtName"];
  //        $select = ($intConsoleDistId==$selVal)?'selected="selected"':'';

  //         $opt .= '<option value="'.$intConsoleDistId.'" title="'.$districtName.'" '.$select;
         
  //         $opt .= '>'.$districtName.'</option>';

  //     }
      
  // }
}

    /*
    Function to Feedback Submit for Authority Calling Time
    By: Niranjan Kumar Pandit
    On: 16-10-2019 
    */
    function FeedbackSubmitAuthority(){
        $userId             = $_SESSION['adminConsole_userID'];
        include_once(CLASS_PATH."clsFeedback.php");
        $objFeedback     = new clsFeedback;
        // print_r($_POST);exit;
        if(count($_POST['question']) > 0){
            $FeedbackAnsQrys     = '';
            $intFeedbackRecIds   = $_POST['intFeedbackRecId'];
            for($i = 0; $i < count($_POST['question']); $i++){
                $checkAnswer    = ($_POST[$_POST['question'][$i]])?implode(",",$_POST[$_POST['question'][$i]]):'';
                if($_POST[$_POST['question'][$i]] && $checkAnswer){
                    $vchQuestion    = $_POST['question'][$i];
                    $vchRemarks     = (trim($_POST['vchRemarks'][$i]))?htmlspecialchars(trim($_POST['vchRemarks'][$i]),ENT_QUOTES):'';
                    $vchAnswer      = implode(",",$_POST[$_POST['question'][$i]]);
                    $vchAnswerText  = '';
                    if(count($_POST['text'.$_POST['question'][$i]])){
                        $vchTextAns = '';
                        for($n = 0; $n < count($_POST['text'.$_POST['question'][$i]]); $n++){
                            $vchTextAns .= htmlspecialchars(trim($_POST['text'.$_POST['question'][$i]][$n]),ENT_QUOTES).'~::~';
                        }
                        $vchAnswerText = rtrim($vchTextAns,'~::~');
                    }
                    
                    $FeedbackAnsQrys .= '('.$intFeedbackRecIds.','.$vchQuestion.',"'.$vchAnswer.'","'.$vchRemarks.'","'.$vchAnswerText.'",' . $userId . '),';
                }
            }
            $FeedbackAnsQry  = rtrim($FeedbackAnsQrys, ',');
            $feedbackData['FeedbackAnsQry']     = $FeedbackAnsQry;
            $feedbackData['intFeedbackRecId']   = $intFeedbackRecIds;
            // print_r($feedbackData);exit;
            $feedbackResult     = $objFeedback->ReadFeedbackData('SFA', $feedbackData);
            if($feedbackResult){
                $flag           = 0;
                $outMsg         = 'Feedback submitted successfully';
            }else{
                $flag           = 1;
                $outMsg         = "Something is wrong!!!";
            }
            // print_r($feedbackResult);exit;
        }

        echo json_encode(array('result'=>$outMsg));

    }

    /*
      Function to get department wise service list in drop down
      By: Chinmayee
      On: 23-09-2019
     */

    public function getDeptWiseInstitution()
    {
        include_once(CLASS_PATH."clsService.php");
        $obj             = new clsService;
        $deptId          = $_REQUEST['deptId'];
        $selVal          = $_REQUEST['selVal'];
        $dataArr         = array();
        $opt             = '<option value="0">---Select Institution---</option>';
        if(!empty($deptId)){
          $dataArr['intDepartmentId']         =$deptId;
          $result          = $obj->viewService('FAI',$dataArr);
          if($result->num_rows>0){
              $x=0;
                  while($row=$result->fetch_array()){
                      if($row["intInstitutionId"]==$selVal){
                          $selected='selected="selected"';
                      }else{
                          $selected='';
                      }
                      $opt.='<option value="'.$row["intInstitutionId"].'" '.$selected.' >'.$row["vchInstitutionName"].'</option>';

                  }
          }else{
             // Nothing to do
          }
        }
        echo json_encode(array('opt' => $opt));
    }

    function getNotification(){

      include_once(CLASS_PATH."clsService.php");
       $obj             = new clsService;
       $dataArr = array();
       $result          = $obj->getNotification('GN',$dataArr);
       $message ='';
       if($result->num_rows>0){
           while($row=$result->fetch_array()){
            #print_r($row);//exit;
              $message =$row['VCH_FULL_NAME']." is request for arrange ".$row['intTotalCalls']." call(s)";
           }

       }
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
       // echo $message; exit;
       if(!empty($message)){
          echo "data: {$message}\n\n";
          flush();
        }
       exit;
    }

 /* Function to get Job Types  BY: Chinmayee */

      public function fillJobType()
      {
          $selval = $_POST['intSelval'];
          require(CLASS_PATH . 'clsJobType.php');
          $objSocial = new clsJobType;
          $result = $objSocial->viewJobData('V', 0, 0, '', 0, '', '', 0, 0, '', '', '0000-00-00');
          $options = '<option value="">--Select--</option>';
          $selected = '';

          if ($result->num_rows > 0) {
              $ctr = 0;
              while ($row = $result->fetch_array()) {
                  if ($row['intJobTypeId'] == $selval)
                      $selected = "selected";
                  else
                      $selected = "";
                  $options .= '<option value="' . $row['intJobTypeId'] . '" data-val="' . $row['intAccountType'] . '" ' . $selected . ' >' . $row['vchJobName'] . '</option>';

                  $ctr++;
              }
          }

          echo json_encode(array('jobTypeList' => $options));
      }


 /* Function to get Api list cron job wise...  BY: Chinmayee */

    public function fillUsers()
     {
        $accountType = $_POST['intAccountType'];
        $userId = $_POST['intUserid'];
        $selval = $_POST['intSelval'];
        require(CLASS_PATH . 'cls-social-account.php'); 
        $objSocial = new clsSocialAccount;
        $result = $objSocial->manageAccount('V', $userId, $accountType, '', '', '', '', '', 0, '', 1, 0, '');
        $options = '<option value="">--Select--</option>';
        $selected = '';

        if ($result->num_rows > 0) {
            $ctr = 0;
            while ($row = $result->fetch_array()) {
                if ($row['intId'] == $selval)
                    $selected = "selected";
                else
                    $selected = "";
                $options .= '<option value="' . $row['intId'] . '" ' . $selected . ' >' . $row['vchScreenName'] . '</option>';

                $ctr++;
            }
        }

        echo json_encode(array('userList' => $options));
    }
 


 /* Function to execute cron manually  BY: Chinmayee */

 public function exceuteAPI()
 {
    unset($_SESSION['START']);
    unset($_SESSION['END']);
    $intJobId = $_POST['intJobId'];
    $intJobType = $_POST['intJobType'];
    $excStatus=0;
    require_once(CLASS_PATH . 'cls-twitter-scheduler.php');
    $obj                  = new cls_twitter_scheduler;
    $resultJob            = $obj->findCronJob('MCA',$intJobType,$intJobId); 
    $rowJob               = $resultJob->fetch_array();
    $jobId                           = $rowJob['intJobId'];
    $jobType                         = $rowJob['IntJobType'];
    $UID                             = $rowJob['intAccountId']; 
    $vchScreenName                   = $rowJob['vchScreenName'];
    if($jobType == API_ACCOUNT_TYPE['HEALTHAPI'])
    {
        $_SESSION['START']['ACC'.$jobId] = date('Y-m-d H:i:s');
        $result                          = $obj->importHealthData($rowJob);                
        $exctRes=$obj->UpdateLastCronTime('ULT',$jobId,$UID,$jobType,2,$result['outMsg'],$result['recordFetched'],$result['validCnt'],$result['invalidRec'],$result['duplicateRec']); //2
        $_SESSION['END']['ACC'.$jobId]   = date('Y-m-d H:i:s');   

    }


 if($jobType == API_ACCOUNT_TYPE['HOMEAPI'])
    {//echo 1; exit;
        $_SESSION['START']['ACC'.$jobId] = date('Y-m-d H:i:s');
        $result                          = $obj->importHomeData($rowJob);                              
        $exctRes=$obj->UpdateLastCronTime('ULT',$jobId,$UID,$jobType,2,$result['outMsg'],$result['recordFetched'],$result['validCnt'],$result['invalidRec'],$result['duplicateRec']); //2
        $_SESSION['END']['ACC'.$jobId]   = date('Y-m-d H:i:s');     

    } 
    if($exctRes){
     $excStatus=1;
    }
    unset($_SESSION['START']);
    unset($_SESSION['END']);
    echo json_encode(array('excStatus' => $excStatus));
}

 /* function get to Send Daily Status Report BY Chinmayee */

  function viewCallRemarkStatus()
  {
    include_once(CLASS_PATH."clsFeedback.php");
    $obj         = new clsFeedback;  
    $intFeedbackRecId            = $_POST['intFeedbackRecId'];    
    $arrData["intFeedbackRecId"] = $intFeedbackRecId;
   
    
    $result      = $obj->ReadFeedbackData('FFO',$arrData); 
    
       if($result->num_rows>0)
         {  
          $row =$result->fetch_array();
          $intDirectCallFeedbackStatus              = $row['intDirectCallFeedbackStatus'];
          $vchQuery                                 = $row['vchQuery'];                 
         }
      
       echo json_encode(array('intDirectCallFeedbackStatus'=>$intDirectCallFeedbackStatus,'vchQuery'=>$vchQuery));
   
  }




     /** Function for Get Question and Answer **/
     public function showFeedbackQuestionAnswerReceived(){
      include(CLASS_PATH.'clsFeedback.php');
      // print_r($_REQUEST); exit;
      $obj = new clsFeedback;
      $intDepartmentId    = $_REQUEST['intDepartmentId'];
      $intServiceId       = $_REQUEST['intServiceId'];
      $intFeedbackRecId   = $_REQUEST['intFeedbackRecId'];
      $cardNo             = ($_REQUEST['cardNo'])?$_REQUEST['cardNo']:'';

      if($intDepartmentId > 0 || $intServiceId > 0){
          $arrSurveyQuestId   = [];
          $arrType            = [];
          $arrQuestionEnglish = [];
          $arrQuestionOdia    = [];
          $arrSurveyOptionId  = [];
          $arrOptionEnglish   = [];
          $arrOptionOdia      = [];
          $arrOptionValue     = [];
          $arrOptionSelection = [];
          $arrRemarksStatus = [];
          $arrAnswerId = [];
          $arrAnswerText = [];

          $arrQuestion  = $obj->ReadFeedbackData('GQA',array('intDepartmentId' => $intDepartmentId, 'intServicesId' => $intServiceId,'intFeedbackRecId' => $intFeedbackRecId));
          // print_r($arrQuestion); exit;
          if($arrQuestion->num_rows > 0){
            while($QRow = $arrQuestion->fetch_array()){
              array_push($arrSurveyQuestId, $QRow['intSurveyQuestId']);
              array_push($arrType, $QRow['intType']);
              array_push($arrQuestionEnglish, $QRow['vchQuestionEnglish']);
              array_push($arrQuestionOdia, $QRow['vchQuestionOdia']);
              array_push($arrOptionSelection, $QRow['intOptionSelection']);
              array_push($arrRemarksStatus, $QRow['intRemarksStatus']);
              array_push($arrSurveyOptionId, explode("~||~",$QRow['intSurveyOptionId']));
              array_push($arrOptionEnglish, explode("~||~",$QRow['vchOptionEnglish']));
              array_push($arrOptionOdia, explode("~||~",$QRow['vchOptionOdia']));
              array_push($arrOptionValue, explode("~||~",$QRow['intOptionValue']));
              array_push($arrAnswerId, $QRow['intAnswerId']);
              array_push($arrAnswerText, $QRow['vchAnswerWritten']);
            } 
          }
      }

 // print_r($arrAnswerText); exit;
      $returnHtml = '';

      $returnHtml .= '<div class="tab-content form-group">';

      if($cardNo){
        $returnHtml .= '<div class="col-sm-12">';
        $returnHtml .= '<div class="form-group">';
        $returnHtml .= '<div class="clsRCardNo"><h5>Ration Card No:- '.$cardNo.'</h5></div>';
        $returnHtml .= '</div>';
        $returnHtml .= '</div>';
      }

        if(count($arrSurveyQuestId) > 0){
          for($i = 0; $i < count($arrSurveyQuestId); $i++){
            $active   = ($i == 0)?'active':'';
            
          //$returnHtml .= '<div id="question_'. $i .'" class="tab-pane  in '. $active .'">';
          $returnHtml .= '<div id="question_'. $i .'" class="col-sm-6">';
          $returnHtml .= '<div class="feedback-categories">';
          $returnHtml .= '<h6><span class="english">'. $arrQuestionEnglish[$i] .'</span><span class="odiya">'. $arrQuestionOdia[$i] .'</span></h6>';
          $returnHtml .= '<div class="form-group">';
          $returnHtml .= '<input type="hidden" name="question[]" value="'. $arrSurveyQuestId[$i] .'">';
              
              if(count($arrSurveyOptionId[$i]) > 0){
                for($j = 0; $j < count($arrSurveyOptionId[$i]); $j++){
                    if(in_array($arrSurveyOptionId[$i][$j], explode(',',$arrAnswerId[$i])))
                    // if($arrAnswerId[$i]==$arrSurveyOptionId[$i][$j])
                    { $checked='checked="checked"';}
                    else{
                      $checked='';
                    }
                  if($arrOptionSelection[$i] == 1){
                  
                      // $returnHtml .= '<div class="radio">';
                      $returnHtml .= '<input id="option-redio-'.$arrSurveyOptionId[$i][$j] .'" value="'. $arrSurveyOptionId[$i][$j] .'" class="magic-radio option-redio" type="radio" name="'. $arrSurveyQuestId[$i] .'[]"  '.$checked.' disabled="true" >';
                      $returnHtml .= '<label for="option-redio-'. $arrSurveyOptionId[$i][$j] .'"><span class="english">'. $arrOptionEnglish[$i][$j] .'</span><span class="odiya">'. $arrOptionOdia[$i][$j] .'</span></label>&nbsp;&nbsp;';
                      // $returnHtml .= '</div>';
                  }else if($arrOptionSelection[$i] == 2){
                      // $returnHtml .= '<div class="checkbox">';
                      $returnHtml .= '<input id="option-redio-'.$arrSurveyOptionId[$i][$j].'" value="'.$arrSurveyOptionId[$i][$j].'" class="magic-checkbox option-checkbox" type="checkbox" name="'.$arrSurveyQuestId[$i].'[]"  '.$checked.' disabled="true" >';
                      $returnHtml .= '<label for="option-redio-'.$arrSurveyOptionId[$i][$j] .'"><span class="english">'.$arrOptionEnglish[$i][$j].'</span><span class="odiya">'.$arrOptionOdia[$i][$j].'</span></label>&nbsp;&nbsp;';
                      // $returnHtml .= '</div>';
                  }else{
                      $vchAnswerTextVal   = explode('~::~', $arrAnswerText[$i]);
                      // $returnHtml .= '<div class="checkbox">';
                      $returnHtml .= '<input id="option-redio-'.$arrSurveyOptionId[$i][$j].'" value="'.$arrSurveyOptionId[$i][$j].'" class="magic-checkbox option-checkbox" type="checkbox" name="'.$arrSurveyQuestId[$i].'[]"  '.$checked.' disabled="true" >';
                      $returnHtml .= '<input type="hidden" disabled>';
                      $returnHtml .= '<label for="option-redio-'.$arrSurveyOptionId[$i][$j] .'"><span class="english">'.$arrOptionEnglish[$i][$j].'</span><span class="odiya">'.$arrOptionOdia[$i][$j].'</span></label> : <input type="tel" maxlength="15" name="text'.$arrSurveyQuestId[$i].'[]" value="'.$vchAnswerTextVal[$j].'" class="form-controls" disabled>&nbsp;&nbsp;';
                      // $returnHtml .= '</div>';
                  }
                }
              }
              if($arrRemarksStatus[$i] == 1){
                $d_none = 'style="display:block;"';
              }else{
                $d_none = 'style="display:none;"';
              }

              $returnHtml .= '</div>';
              $returnHtml .= '<div class="form-group" '.$d_none.'>';
              $returnHtml .= '<input type="text" name="vchRemarks[]" '.$d_none.' maxlength="80" placeholder="Remarks" class="form-control" id="vchRemarks_'. $arrSurveyQuestId[$i] .'">';
              $returnHtml .= '</div>';
              $returnHtml .= '</div>';
              $returnHtml .= '</div>';
          }
          // $returnHtml .= '<div class="qs-skiper">';
          // $returnHtml .= '<a href="javascript:void(0)" class="prevtab ">Prev</a> ';
          // $returnHtml .= '<a href="javascript:void(0)"  class="nexttab active">Next</a>';
          // $returnHtml .= '</div>';
      }
      $returnHtml .= '</div>';
      $returnHtml .= '<div class="form-group" style="display:none;"><div class="col-sm-6">';
      $returnHtml .= '<button type="button" class="btn btn-success" id="submitBtnFeedbackAnswer" onclick="return submitFeedbackAnswer()">Submit</button>';
      $returnHtml .= '</div></div>';
      // if(count($arrSurveyQuestId) > 0){
      // $returnHtml .= '<div class="question-tabs">';
      // $returnHtml .= '<ul class="nav nav-tabs">';
      //     for($i = 0; $i < count($arrSurveyQuestId); $i++){
      //     $active   = ($i == 0)?'active':'';
      //     $returnHtml .= '<li class="'.$active.' '.'quest_'.$arrSurveyQuestId[$i] .'"><a data-toggle="tab" href="#question_'. $i .'">'. ($i+1) .'</a></li>';
      //     }
      //   $returnHtml .= '</ul>';
      //   $returnHtml .= '<div class="clearfix"></div>';
      //   $returnHtml .= '</div>';
      // }
      // echo $returnHtml; exit;
      echo json_encode(array('result'=>$returnHtml));
  }



}
// End Class Bind

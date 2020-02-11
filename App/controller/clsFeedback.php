<?php
/**
 * Description of clsService
 *
 * @author Niranjan
 */
class clsFeedback extends Model {

    private function manageFeedback($action, $arrCondition) {

        //print_r($arrCondition);exit;
        $operatorResult = $this->callProc('USP_MG_FEEDBACK_RECEIVE', $action, $arrCondition);
//echo $operatorResult;exit;
        /* Activity log Tracker End */
        return $operatorResult;
    }

    /** Action for Read Feedback Data **/
    public function ReadFeedbackData($vchAction, $intId){
        return $this->manageFeedback($vchAction,$intId);
    }

    public function FeedbackSubmit(){
        $userId         = $_SESSION['adminConsole_userID'];
        $date           = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
        // print_r($_POST); exit;
        $result         =  $this->ReadFeedbackData('RD',array('intOutboundDataId' => $_SESSION['intOutboundDataId'],'dataType'=>$_POST['dataType']));
        if($result->num_rows > 0){
            $row  = $result->fetch_array();
          // print_r($row);exit;
            $intOutboundDataId      = $row['intOutboundDataId'];
            $intDepartmentId        = $row['intDepartmentId'];
            $intServiceId           = $row['intServiceId'];
            $vchDistrict            = $row['vchDistrict'];
            $intDistrictId            = $row['intDistrictId'];
            $vchName                = $row['vchName'];
            $intMobile              = $row['intMobile'];
        }
        // echo 1; exit;
        $cooDtmCallStart            = ($_COOKIE['dtmCallStart'])?date('Y-m-d h:i:s', strtotime($_COOKIE['dtmCallStart'])):'';
        $cooDtmCallEnd              = ($_COOKIE['dtmCallEnd'])?date('Y-m-d h:i:s', strtotime($_COOKIE['dtmCallEnd'])):'';
        // echo $cooDtmCallStart.' == '.$cooDtmCallEnd;
        setcookie('dtmCallStart', '', time()-3600,'/');
        setcookie('dtmCallEnd', '', time()-3600,'/');
        // print_r($_COOKIE);exit;
        $dtmCallStart               = ($cooDtmCallStart)?$cooDtmCallStart:$_SESSION['dtmCallStart'];//htmlspecialchars(trim($_POST['dtmCallStart']),ENT_QUOTES);
        $dtmCallEnd                 = $date->format('Y-m-d H:i:s');
        $intFeedbackStatus          = htmlspecialchars(trim($_POST['intFeedbackStatus']),ENT_QUOTES);
        $vchAdditionalInfo          = htmlspecialchars(trim($_POST['vchAdditionalInfo']),ENT_QUOTES);
        $vchQuery                   = htmlspecialchars(trim($_POST['vchQuery']),ENT_QUOTES);
        $intCallBackRequest         = htmlspecialchars(trim($_POST['intCallBackRequest']),ENT_QUOTES);
        $intRequestedById           = htmlspecialchars(trim($_POST['intRequestedById']),ENT_QUOTES);
        $intRequestedFrom           = htmlspecialchars(trim($_POST['intRequestedFrom']),ENT_QUOTES);
        $intOverallRating           = ($_POST['intOverallRating'])?htmlspecialchars(trim($_POST['intOverallRating']),ENT_QUOTES):0;
        $intType                    = !empty($_POST['dataType'])?$_POST['dataType']:2;
        $intCallType                    = !empty($_POST['dataType'])?$_POST['dataType']:1;
        if($intRequestedFrom == 0){
            $intFeedbackCollectedBy     = 2;
        }else{
            $intFeedbackCollectedBy     = 3; 
        }
        // print_r($_POST);exit;
        if(count($_POST['question']) > 0){
            $FeedbackAnsQrys     = '';
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
                    $FeedbackAnsQrys .= '(@p_intFeedbackRecId,'.$vchQuestion.',"'.$vchAnswer.'","'.$vchRemarks.'","'.$vchAnswerText.'",' . $userId . '),';

                }
            }
            $FeedbackAnsQry  = ($intRequestedFrom == 0)?rtrim($FeedbackAnsQrys, ','):'';
        }

        // print_r($FeedbackAnsQry);exit;
        // For Call Log
        $arrPageData['dtmCallStart']       = $dtmCallStart;
        $arrPageData['dtmCallEnd']         = ($cooDtmCallEnd)?$cooDtmCallEnd:$dtmCallEnd;
        $arrPageData['intMobile']          = $intMobile;
        $arrPageData['intType']            = $intType;
        $arrPageData['intFeedbackStatus']  = $intFeedbackStatus;
        $arrPageData['intCreatedBy']       = $userId;
// echo $intCallType; exit;
        // For Update OutBound Data
        $arrPageData['intOutboundDataId']      = $intOutboundDataId;
        $arrPageData['intDepartmentId']      = $intDepartmentId;
        $arrPageData['intServiceId']      = $intServiceId;
        $arrPageData['intDistrictId']      = $intDistrictId;
        $arrPageData['dtmFeedbackRcvTime']     = ($cooDtmCallEnd)?$cooDtmCallEnd:$dtmCallEnd;
        $arrPageData['intFeedbackStatus']      = $intFeedbackStatus;
        $arrPageData['vchAdditionalInfo']      = $vchAdditionalInfo;
        $arrPageData['vchQuery']               = $vchQuery;
        $arrPageData['intReceivedBy']          = $userId;
        $arrPageData['intCallBackRequest']     = $intCallBackRequest;
        $arrPageData['intRequestedById']       = $intRequestedById;
        $arrPageData['intByDesignationId']     = $_SESSION['adminConsole_Desg_Id'];
        $arrPageData['intFeedbackCollectedBy'] = $intFeedbackCollectedBy;
        $arrPageData['intOverallRating']       = $intOverallRating;

        // For Feedback Answer
        $arrPageData['FeedbackAnsQry']         = ($FeedbackAnsQry)?$FeedbackAnsQry:'';
        $arrPageData['intCallType']            = ($intCallBackRequest)?$intCallType:'CC';
        // print_r($arrPageData);exit;
        // Action for Submit Feedback
        // echo '<pre>';print_r($arrPageData);exit;
        $arrResult         =  $this->ReadFeedbackData('SF',$arrPageData);
        if($arrResult){
            // Mobile Message Configuration
            $vchMessageOdiya    = '';
            $vchMessageEnglish  = '';
            $vchMobileNo        = $intMobile;
        }

        echo json_encode(array('result' => array('flag' => 0, 'outMsg' => 'Record updated successfully!!!' , 'userId'=>$userId)));
    }


    public function getCallInformation(){
        $vchMobile  = ($_POST['vchMobile'])?$_POST['vchMobile']:'';
        if($vchMobile != ''){
            $arrResult  = $this->manageFeedback('GCL', array('vchMobile' => $vchMobile));
            if($arrResult->num_rows > 0){
                $vchReturnText  = '<div class="table-responsive">
           <table class="table table-bordered"><tr><th width="40px">Sl#</th><th>Called Date</th><th>Feedback Recived By</th><th>Call Summary</th></tr>';
                while($row = $arrResult->fetch_array()){
                    // print_r($row);//exit;
                    $intType            = (($row['intType'] == 1 || $row['intType'] == 2) && $row['intFeedbackStatus'] > 0)?'OutBound':'Inbound';
                    if($row['intType'] == 2){
                        if(strlen($row['vchComplain']) > 100){
                            $vchComplain    = substr($row['vchComplain'],0,100).' <a data-toggle="tooltip" title="'.$row['vchComplain'].'"><i class="icon-more-horizontal1"></i></a>';
                        }else{
                            $vchComplain    = $row['vchComplain'];
                        }
                        if($row['intFeedbackStatus'] > 0){
                            $vchFeedbackStatus = '<div><strong>Status : </strong>'. FEEDBACK_CALL_STATUS[$row['intFeedbackStatus']] .'</div>';
                        }else{
                            $vchFeedbackStatus = '';
                        }
                        //$vchReturnText .= '<tr><td>'.(++$i).'</td><td>'.date('d-m-Y h:i:s A',strtotime($row['dtmCreatedOn'])).'</td><td>'.$intType.'</td><td>'. $vchComplain .'</td></tr>';

                        $vchDetails     = '<div><strong>Service : </strong>'.$row['vchServicesName'].'</div><div><strong>Scheme : </strong>'.$row['vchSchemeTypeName'].'</div><div><strong>Summary : </strong>'. $vchComplain .'</div>'.$vchFeedbackStatus;
                        $vchReturnText .= '<tr><td>'.(++$i).'</td><td>'.date('d-m-Y h:i:s A',strtotime($row['dtmCreatedOn'])).'</td><td>'.$row['vchFeedbackCollect'].'</td><td>'. $vchDetails .'</td></tr>';
                    }else{
                        $vchDetails     = '<div><strong>Service : </strong>'.$row['vchServicesName'].'</div><div><strong>Scheme : </strong>'.$row['vchSchemeTypeName'].'</div><div><strong>Status : </strong>'. FEEDBACK_CALL_STATUS[$row['intFeedbackStatus']] .'</div>';
                        $vchReturnText .= '<tr><td>'.(++$i).'</td><td>'.date('d-m-Y h:i:s A',strtotime($row['dtmCreatedOn'])).'</td><td>'.$row['vchFeedbackCollect'].'</td><td>'. $vchDetails .'</td></tr>';
                    }
                }
                $vchReturnText .= '</table></div>';
            }else{
                $vchReturnText = '<div class="text-center no-content"><h4>No Records Found...</h4></div>';
            }
        }else{
            $vchReturnText = '<div class="text-center no-content"><h4>No Records Found...</h4></div>';
        }
        echo json_encode(array('result' => $vchReturnText));
    }

    public function getServiceDetails(){
        $vchMobile  = ($_POST['vchMobile'])?$_POST['vchMobile']:'';
        if($vchMobile != ''){
            $arrResult  = $this->manageFeedback('GSD', array('vchMobile' => $vchMobile));
            if($arrResult->num_rows > 0){
                $vchReturnText  = '<div class="table-responsive">
           <table class="table table-bordered"><tr><th width="40px">Sl#</th><th>Department</th><th>Details</th><th width="100px">Avail Date </th></tr>';
                while($row = $arrResult->fetch_array()){
                    $jsonRelatedInfo        = ($row['jsonRelatedInfo'])?json_decode($row['jsonRelatedInfo']):'';
                    $jsonRelatedInfo        = (array)$jsonRelatedInfo;
                    $vchServiceAvailDate    = ($jsonRelatedInfo['date'])?$this->getFormatDate($jsonRelatedInfo['date']):'--';
                    $vchReturnText .= '<tr><td>'.(++$i).'</td><td>'.$row['vchDeptName'].'</td><td>'.$row['vchServiceName'].'</td><td>'.$vchServiceAvailDate.'</td></tr>';
                }
                $vchReturnText .= '</table></div>';
            }else{
                $vchReturnText = '<div class="text-center no-content"><h4>No Records Found...</h4></div>';
            }
        }else{
            $vchReturnText = '<div class="text-center no-content"><h4>No Records Found...</h4></div>';
        }

        echo json_encode(array('result' => $vchReturnText));

    }


    public function getFAQDetails(){
        $intDepartmentId    = ($_POST['intDepartmentId'])?$_POST['intDepartmentId']:0;
        $intServiceId       = ($_POST['intServiceId'])?$_POST['intServiceId']:0;
        if($intDepartmentId > 0 && $intServiceId > 0){
            $arrResult  = $this->manageFeedback('GFD', array('intDepartmentId' => $intDepartmentId, 'intServiceId' => $intServiceId));
            if($arrResult->num_rows > 0){
                $arrQuestion    = [];
                $arrAnswer      = [];
                while($row = $arrResult->fetch_array()){
                    array_push($arrQuestion, $row['vchFaqQuestion']);
                    array_push($arrAnswer, $row['vchFaqAnswer']);
                }
            }else{
                $vchReturnText = '<div class="text-center no-content"><h4>No Records Found...</h4></div>';
            }
        }else{
            $vchReturnText = '<div class="text-center no-content"><h4>No Records Found...</h4></div>';
        }
        if(count($arrQuestion) > 0){
            $vchReturnText = '<input type="text"  class="form-control search-input" id="InpSearch" name="" placeholder="Enter text"><ul class="search-list">';
                for($i = 0; $i < count($arrQuestion); $i++){
                    $vchReturnText .= '<li><a href="javascript:void(0)">'.$arrQuestion[$i].'</a></li>';
                }
            $vchReturnText  .= '</ul><ul class="faq-list">';
                for($i = 0; $i < count($arrQuestion); $i++){
                    $vchReturnText .= '<li><span>'.$arrQuestion[$i].'</span>'.$arrAnswer[$i].'</li>';
                }
            $vchReturnText .= '</ul>';
        }
        // print_r($arrQuestion);exit;

        echo json_encode(array('result' => $vchReturnText));

    }
    
}// end Class
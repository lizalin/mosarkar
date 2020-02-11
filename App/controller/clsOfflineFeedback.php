<?php
/**
 * Description of clsService
 *
 * @author Puja 
 */
class clsOfflineFeedback extends Model {

    private function manageOfflineFeedback($action, $arrCondition) {

        $operatorResult = $this->callProc('USP_MS_OFFLINE_FEEDBACK', $action, $arrCondition);
        return $operatorResult;

    }

    public function getOfflineFeedbackData(){
        $userId                   = $_SESSION['adminConsole_userID'];
        $arrPageData['intMobile'] = $_POST['vchMobileNo'];
        $arrPageData['intUserId'] = $userId;
        $returnText = '';
        $arrResult  = $this->manageOfflineFeedback('GOF', $arrPageData);
        // print_r($arrResult);exit;
        if($arrResult->num_rows > 0){
            $returnText .= '<div class="portlet__body">';
            $returnText .= '<div class="table-responsive">';
            $returnText .= '<table data-toggle="table" class="table table-hover table-bordered"> ';
            $returnText .= '<tr>';
            $returnText .= '<th width="40px">Sl#</th>';
            $returnText .= '<th>Name</th>';
            $returnText .= '<th>Mobile</th>';
            $returnText .= '<th>District</th>';
            $returnText .= '<th>Source</th>';
            $returnText .= '<th>Department &amp; Service</th>';
            $returnText .= '<th>Institution</th>';
            $returnText .= '<th>Date</th>';
            $returnText .= '<th>Service Details</th>';
            $returnText .= '<th>Call History</th>';
            $returnText .= '<th>Status</th>';
            $returnText .= '<th>Action</th>';
            $returnText .= '</tr>'; 
            while($row = $arrResult->fetch_array()){
                $vchGender  = ($row['intGender'] == 1)?'Male':'Female';
                $vchSource  = ($row['dataType'] == 1)?'Dept.':'CC';
                $vchRegDate = ($row['dtmRegdDateTime'])?date('d-m-Y',strtotime($row['dtmRegdDateTime'])):'--';
                $vchCallHis = ($row['vchCountCallHistory'] > 0)?'<a class="btn btn-primary  btn-sm" href="javascript:void(0)" onclick="DisplayCallLog('. $row['intMobile'] .')">View</a>':'--';
                $vchCallStatus = ($row['vchCallStatus'] > 0)?FEEDBACK_CALL_STATUS[$row['intFeedbackStatus']]:'--';
                $vchAction     = ($row['vchCallStatus'] > 0 && ($row['intFeedbackStatus'] == 1 || $row['intFeedbackStatus'] == 3 || $row['intFeedbackStatus'] == 5 || $row['intFeedbackStatus'] == 6 || $row['intFeedbackStatus'] == 8 || $row['intFeedbackStatus'] == 11))?'--':'<a class="btn btn-success btn-sm" href="javascript:void(0)" onclick="showFeedbackQuestionAnswer('. $row['intDepartmentId'] .','. $row['intServiceId'] .','. $row['intOutboundDataId'] .','. $row['dataType'] .')">Update Status</a>';
                $vchAgeYears   = ($row['intAge']==1)?'Year':'Years';

                
                $returnText .= '<tr>';
                $returnText .= '<td>'. ++$i .'</td>';
                $returnText .= '<td>'. $row['vchName'] .'<br><small class="text-info"><strong>Gender:</strong> '. $vchGender .', <strong>Age:</strong> '. $row['intAge'] .' '. $vchAgeYears .'</small></td>';
                $returnText .= '<td>'. $row['intMobile'] .'</td> ';
                $returnText .= '<td>'. $row['DistrictName'] .'</td> ';
                $returnText .= '<td>'. $vchSource .'</td> ';
                $returnText .= '<td>'. $row['vchDeptName'] .' <br><small class="text-info"><strong>Service:</strong> '. $row['vchServiceName'] .'</small></td>';
                $returnText .= '<td>'. $row['PO_Hospital'] .' </td>';
                $returnText .= '<td>'. $vchRegDate .'</td>';
                $returnText .= '<td>';
                                    if($row['intDepartmentId'] == DEPART_HOME){
                                        if($row['vchRegdNo']){
                                            $returnText .= '<div><strong>Reg No. : </strong>'. $row['vchRegdNo'] .'</div>';
                                        }
                                        if($row['jsonRelatedInfo']){
                                            $jsonRelatedInfo    = json_decode($row['jsonRelatedInfo']);
                                            $arrReletedInfo     = (array)$jsonRelatedInfo;
                                            if(count($arrReletedInfo) > 0){
                                                foreach($arrReletedInfo as $key => $infoVal){
                                                    // $vchRelatedInfo = str_replace("_"," ",$key).' : '.$infoVal;
                                                    $returnText .= '<div><strong>'. str_replace("_"," ",$key) .' : </strong>'. $infoVal .'</div>';
                                                }
                                            }
                                        }
                                        //<div><strong>Department : </strong>Health &amp; Family Welfare</div>
                                    }else{
                                        $returnText .= '--';
                                    }
                $returnText .= '</td>';
                $returnText .= '<td>'. $vchCallHis .'</td>';
                $returnText .= '<td>'. $vchCallStatus .'</td>';
                $returnText .= '<td>'. $vchAction .'</td>';
                $returnText .= '</tr>';
                
            }
            $returnText .= '</table>';
            $returnText .= '</div>';
            $returnText .= '</div>';
        }else{
            $returnText = '<div class="text-center no-content"><h4>No Records Found...</h4></div>';
        }
        echo json_encode(array('result'=>$returnText));
        // print_r($arrResult);exit;
    }

    /**

    **/
    public function submitFeedback(){
        $userId             = $_SESSION['adminConsole_userID'];
        $desigId            = $_SESSION['adminConsole_Desg_Id'];
        // echo '<pre>';print_r($_POST);exit;
        if(count($_POST['question']) > 0){
            $FeedbackAnsQrys        = '';
            $intOutboundDataId      = $_POST['intOutboundDataId'];
            $dataType               = $_POST['dataType'];
            for($i = 0; $i < count($_POST['question']); $i++){
                $checkAnswer    = ($_POST[$_POST['question'][$i]])?implode(",",$_POST[$_POST['question'][$i]]):'';
                if($_POST[$_POST['question'][$i]] && $checkAnswer){
                    $vchQuestion    = $_POST['question'][$i];
                    $vchRemarks     = (trim($_POST['vchRemarks'][$i]))?htmlspecialchars(trim($_POST['vchRemarks'][$i]),ENT_QUOTES):'';
                    $vchAnswer      = implode(",",$_POST[$_POST['question'][$i]]);

                    $FeedbackAnsQrys .= '(@p_intFeedbackRecId,'.$vchQuestion.',"'.$vchAnswer.'","'.$vchRemarks.'",' . $userId . '),';
                }
            }
            $FeedbackAnsQry  = rtrim($FeedbackAnsQrys, ',');
            $feedbackData['FeedbackAnsQry']         = $FeedbackAnsQry;
            $feedbackData['intOutboundDataId']      = $intOutboundDataId;
            $feedbackData['intFeedbackStatus']      = $_POST['intFeedbackStatus'];
            $feedbackData['intRequestedById']       = $userId;
            $feedbackData['intCallBackRequest']     = $desigId;
            $feedbackData['intFeedbackCollectedBy'] = 3;
            $feedbackData['intCallType']            = $dataType;
            $feedbackData['intCreatedBy']           = $userId;
            $feedbackData['intCallThrough']         = 2;
            $feedbackData['vchMobileNo']            = $_POST['vchMobileNo'];
            // echo '<pre>';print_r($feedbackData);exit;
            $feedbackResult     = $this->manageOfflineFeedback('SOFA', $feedbackData);
            if($feedbackResult){
                $outMsg         = 'Feedback submitted successfully';
                $redirectLoc    = URL.'collectOfflineFeedback';
            }else{
                $outMsg         = 'Something is wrong!!!';
                $redirectLoc    = URL.'collectOfflineFeedback';
            }

            $arrReturn['outMsg']        = $outMsg;
            $arrReturn['redirectLoc']   = $redirectLoc;
            return $arrReturn;
            // print_r($feedbackResult);exit;
        }
    }
    
}// end Class
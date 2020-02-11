<?php
/**
 * Description of clsSurveyQuestionnaire
 *
 * @author Niranjan 
 */
class clsSurveyQuestionnaire extends Model {

    private function manageSurveyQuestionnaire($action, $arrCondition) {

        // print_r($arrCondition);exit;
        $operatorResult = $this->callProc('USP_MG_QUESTIONNAIRE', $action, $arrCondition);

        /* Activity log Tracker End */
        return $operatorResult;
    }
    
    
    public function addSurveyQuestionnaire()
    {       
        $flag       = 0;
        $outMsg     = '';
        $userId     = $_SESSION['adminConsole_userID'];

        $intDepartmentId        = $_POST['intDepartmentId'];
        $intServicesId          = $_POST['intServicesId'];
        $intNoOfQuestion        = $_POST['intNoOfQuestion'];
        $intType                = $_POST['intType'];

        if($intNoOfQuestion > 0){
            for($i = 0; $i < $intNoOfQuestion; $i++){
                $vchQuestionEnglish     = htmlspecialchars(trim($_POST['vchQuestionEnglish_'.$i]),ENT_QUOTES);
                $vchQuestionOdia        = htmlspecialchars(trim($_POST['vchQuestionOdia_'.$i]),ENT_QUOTES);
                $vchShortName           = htmlspecialchars(trim($_POST['vchShortName_'.$i]),ENT_QUOTES);
                $intOptionSelection     = htmlspecialchars(trim($_POST['intOptionSelection_'.$i]),ENT_QUOTES);
                $vchDescription         = htmlspecialchars(trim($_POST['vchDescription_'.$i]),ENT_QUOTES);

                $blankQuestionEnglish   = Model::isBlank($vchQuestionEnglish);
                $blankQuestionOdia      = Model::isBlank($vchQuestionOdia);
                $blankShortName         = Model::isBlank($vchShortName);
                $blankOptionSelection   = Model::isBlank($intOptionSelection);
                $blankDescription       = Model::isBlank($vchDescription);

                $errQuestionEnglish     = Model::isSpclChar(trim($_POST['vchQuestionEnglish_'.$i]));
                $errQuestionOdia        = Model::isSpclChar(trim($_POST['vchQuestionOdia_'.$i]));
                $errShortName           = Model::isSpclChar(trim($_POST['vchShortName_'.$i]));
                $errOptionSelection     = Model::isSpclChar(trim($_POST['intOptionSelection_'.$i]));
                $errDescription         = Model::isSpclChar(trim($_POST['vchDescription_'.$i]));

                $lenQuestionEnglish     = Model::chkLength('max',trim($_POST['vchQuestionEnglish_'.$i]),100);
                $lenQuestionOdia        = Model::chkLength('max',trim($_POST['vchQuestionOdia_'.$i]),100);
                $lenShortName           = Model::chkLength('max',trim($_POST['vchShortName_'.$i]),80);
                $lenOptionSelection     = Model::chkLength('max',trim($_POST['intOptionSelection_'.$i]),5);
                $lenDescription         = Model::chkLength('max',trim($_POST['vchDescription_'.$i]),200);

                if($blankQuestionEnglish > 0 || $blankQuestionOdia > 0 || $blankShortName > 0 || $blankOptionSelection > 0 || $blankDescription > 0){
                    $flag   = 1;
                    $outMsg = "Mandatory fields cannot be left blank";
                }elseif($errQuestionEnglish > 0 || $errQuestionOdia > 0 || $errShortName > 0 || $errOptionSelection > 0 || $errDescription > 0){
                    $flag   = 1;
                    $outMsg = "Special Characters are not allowed";
                }elseif($lenQuestionEnglish > 0 || $lenQuestionOdia > 0 || $lenShortName > 0 || $lenOptionSelection > 0 || $lenDescription > 0){
                    $flag   = 1;
                    $outMsg = 'Length should not exceed maxlength';
                }else{
                    $arrResult  = $this->manageSurveyQuestionnaire('CD', array('vchQuestionEnglish' => $vchQuestionEnglish));
                    $countResult    = $arrResult->fetch_array()[0];
                    if($countResult > 0){
                        $flag       = 1;
                        $outMsg     = 'Duplicate Record exists';
                    }
                }

                // $countOption            = count($_POST['vchOptionEnglish_'.$i]);
                // if($countOption > 0){
                //     for($j = 0; $j < $countOption; $j++){
                //         $vchOptionEnglish   = htmlspecialchars(trim($_POST['vchOptionEnglish_'.$i][$j]),ENT_QUOTES);
                //         $vchOptionOdia      = htmlspecialchars(trim($_POST['vchOptionOdia_'.$i][$j]),ENT_QUOTES);
                //         if($intType == 2)
                //             $intOptionValue     = htmlspecialchars(trim($_POST['intOptionValue_'.$i][$j]),ENT_QUOTES);
                //         else
                //             $intOptionValue     = '';
                //     }
                // }

            }
                // echo $blankQuestionEnglish.$blankQuestionOdia.$blankShortName.$blankOptionSelection.$blankDescription.$flag;exit;


            for($i = 0; $i < $intNoOfQuestion; $i++){
                $vchQuestionEnglish     = htmlspecialchars(trim($_POST['vchQuestionEnglish_'.$i]),ENT_QUOTES);
                $vchQuestionOdia        = htmlspecialchars(trim($_POST['vchQuestionOdia_'.$i]),ENT_QUOTES);
                $vchShortName           = htmlspecialchars(trim($_POST['vchShortName_'.$i]),ENT_QUOTES);
                $intOptionSelection     = htmlspecialchars(trim($_POST['intOptionSelection_'.$i]),ENT_QUOTES);
                $vchDescription         = htmlspecialchars(trim($_POST['vchDescription_'.$i]),ENT_QUOTES);

                if($flag == 0){
                    
                    $countOption            = count($_POST['vchOptionEnglish_'.$i]);
                    if($countOption > 0){
                        $querys  = '';
                        for($j = 0; $j < $countOption; $j++){
                            $vchOptionEnglish   = htmlspecialchars(trim($_POST['vchOptionEnglish_'.$i][$j]),ENT_QUOTES);
                            $vchOptionOdia      = htmlspecialchars(trim($_POST['vchOptionOdia_'.$i][$j]),ENT_QUOTES);
                            if($intType == 2){
                                $intOptionValue     = htmlspecialchars(trim($_POST['intOptionValue_'.$i][$j]),ENT_QUOTES);
                            }
                            else{
                                $intOptionValue     = '0';
                            }
                            $querys .= '(@p_intSurveyQuestId,"' . $vchOptionEnglish . '","' . $vchOptionOdia . '","' . $intOptionValue . '",' . $userId . '),'; 
                        }
                        $query  = rtrim($querys, ',');
                    }
                    $arrPageData['vchQuestionEnglish']      = $vchQuestionEnglish;
                    $arrPageData['vchQuestionOdia']         = $vchQuestionOdia;
                    $arrPageData['vchShortName']            = $vchShortName;
                    $arrPageData['intOptionSelection']      = $intOptionSelection;
                    $arrPageData['vchDescription']          = $vchDescription;
                    $arrPageData['intDepartmentId']         = $intDepartmentId;
                    $arrPageData['intServicesId']           = $intServicesId;
                    $arrPageData['intType']                 = $intType;
                    $arrPageData['intCreatedBy']            = $userId;
                    $arrPageData['vchQuery']                = $query;
                    // print_r($arrPageData);exit;

                    $arrResult  = $this->manageSurveyQuestionnaire('A', $arrPageData);
                    if($arrResult){
                        $flag       = 0;
                        $outMsg     = 'Data Saved successfully';
                    }
                }

            }

        }
        echo json_encode(array('result' => array('flag' => $flag, 'outMsg' => $outMsg)));
    }

    

    //------ Delete/Active/InActive function for Blog By:: Amiatshree Mallick date: 25-Dec-2017
    public function deleteTaggedOperator($action, $ids) 
    {
        $newSessionId = session_id();
        $hdnPrevSessionId = $_POST['hdnPrevSessionId'];
        $createdBy = (!empty($_SESSION['USER_ID'])) ? $_SESSION['USER_ID'] : 0;
        if ($newSessionId == $hdnPrevSessionId) {
            $ctr = 0;
            $explIds = explode(',', $ids);
            $fail = '';

            foreach ($explIds as $indIds) {
                $result = $this->manageOperator($action, $indIds, 0, 0, '', '', '', '', '', '0000-00-00', $createdBy, '', '', 0, 0);
                $row = $result->fetch_array();
                //print_r($row);exit();
                if ($row[0] == '0')
                    $delRec++;
                else
                    $fail .= $row[0] . ',';
                $ctr++;
            }
            if ($action == 'D') {
                if ($delRec > 0)
                    $msgSuccess .= 'Tag(s) deleted successfully';
                if ($fail != '')
                    $msgFail .= 'Dependency record exists, Record can not be deleted';
                $outMsg = $msgFail . ' ' . $msgSuccess;
            }
            else if ($action == 'IN')
                $outMsg = 'Tag(s) unpublished successfully';
            else if ($action == 'P')
                $outMsg = 'Tag(s) published successfully';
            else if ($action == 'AC')
                $outMsg = 'Tag(s) enabled successfully';
           
            return $outMsg;
        } else {
            header("Location" . APPURL . "error");
        }
    }// end delete function

}// end Class
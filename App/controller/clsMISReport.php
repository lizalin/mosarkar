<?php
/**
 * Description of clsMISReport
 * 
 * @author Chinmayee
 * @date  25-09-2019
 */
class clsMISReport extends Model {

    private function manageMISReport($action, $arrCondition) {

        //print_r($arrCondition);exit;
        $operatorResult = $this->callProc('USP_MS_MIS_REPORT', $action, $arrCondition);

        /* Activity log Tracker End */
        return $operatorResult;
    }
    
 
// Function for managing the managefetchOutboundData :: Chinmayee :: 25-09-2019

    public function viewMISReport($vchAction,$dataArr=array()){
        $arrResult  = $this->manageMISReport($vchAction,$dataArr);
        return $arrResult;
    }
}
?>
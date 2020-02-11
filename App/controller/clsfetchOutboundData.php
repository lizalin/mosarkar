<?php
/**
 * Description of clsfetchOutboundData
 * 
 * @author Chinmayee
 * @date  25-09-2019
 */
class clsfetchOutboundData extends Model {

    private function managefetchOutboundData($action, $arrCondition) {

        //print_r($arrCondition);exit;
        $operatorResult = $this->callProc('USP_MG_PULL_DATA', $action, $arrCondition);

        /* Activity log Tracker End */
        return $operatorResult;
    }
    
 
// Function for managing the managefetchOutboundData :: Chinmayee :: 25-09-2019

    public function viewfetchOutboundData($vchAction,$dataArr=array()){
        $arrResult  = $this->managefetchOutboundData($vchAction,$dataArr);
        return $arrResult;
    }
}
?>
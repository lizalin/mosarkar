<?php
/**
 * Description of clsOutboundMis
 * 
 * @author Chinmayee
 * @date  25-09-2019
 */
class clsOutboundMis extends Model {

    private function manageOutboundMis($action, $arrCondition) {

        //print_r($arrCondition);exit;
        $operatorResult = $this->callProc('USP_MS_MISREPORT_OUTBOUND', $action, $arrCondition);

        /* Activity log Tracker End */
        return $operatorResult;
    }
    
 
// Function for managing the managefetchOutboundData :: Chinmayee :: 25-09-2019

    public function viewOutboundMis($vchAction,$dataArr=array()){
        $arrResult  = $this->manageOutboundMis($vchAction,$dataArr);
        return $arrResult;
    }
}
?>
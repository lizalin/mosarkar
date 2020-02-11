<?php
/**
 * Description of clsService
 *
 * @author Chinmayee 
 */
class clsPolicestation extends Model {

    private function managePolicestation($action, $arrCondition) {

        //print_r($arrCondition);exit;
        $operatorResult = $this->callProc('USP_MS_RANGE_TAGGING', $action, $arrCondition);
//echo $operatorResult;exit;
        /* Activity log Tracker End */
        return $operatorResult;
    }
    
      /*Action: Read all data */
    public function viewPolicestation($intAction, $array) {        
        $result = $this->managePolicestation($intAction, $array);
        return $result;
    }
 
    
}// end Class
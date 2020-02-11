<?php

/* * **** Class to view User's Report  ********************
  'By                     : Manali Ranjan
  'On                     : 27-Sept-2017 '
  'Procedure Used         : USP_MOBILE_DATA '
 * ************************************************** */

class clsQueryAuthentication extends Model {
    
    // Function To Manage Query  By::Manali Ranjan  :: On:: 27-Sept-2017 
    private function manageQuery($action,$pStatus,$pMobile,$pOTP,$pUserId,$intAttr1,$intAttr2,$vchAttr3,$vchAttr4){
        //ho $action ;exit;
        $QuerySql        = "CALL USP_MOBILE_DATA('$action','$pStatus','$pMobile','$pOTP','$pUserId','$intAttr1','$intAttr2','$vchAttr3','$vchAttr4');";
       //echo $QuerySql;exit;
        $errAction          = Model::isSpclChar($action);
        $errUserid          = Model::isSpclChar($pUserId); 
        if ($errAction > 0 || $errUserid > 0) 
            header("Location:" . APPURL . "error");
        else { 
            $QueryResult = Model::executeQry($QuerySql);
              // echo $QuerySql;
            return $QueryResult;
        }
    }
  
    // Function To Insert in Query  By::Manali Ranjan  :: On:: 27-Sept-2017 
    public function InsertQuery($action,$pStatus,$pMobile,$pOTP,$pUserId,$intAttr1,$intAttr2,$vchAttr3,$vchAttr4) {
       
        $result = $this->manageQuery($action,$pStatus,$pMobile,$pOTP,$pUserId,$intAttr1,$intAttr2,$vchAttr3,$vchAttr4);
        return $result;
    }
    
     
    
}
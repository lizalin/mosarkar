<?php
require_once('config.php');
require_once('model/customModel.php');

class Controller {

    public function __construct() {
        $this->invoke();
    }

// === Function for call pages and created by Sunil Kumar Parida on 1-Sept-2014 ===//
    public function invoke() { 
        // include('config.php');
        $wthSessionAry = array('error','resolvedCasehtml','getEventData','getReadUnreadData','exportPdf','convertFileToPDF','testSMS','sendMail','otpCheck','testFile','deptReport');
        $page = (isset($_REQUEST['PG']) && $_REQUEST['PG'] != '') ? $_REQUEST['PG'] : 'home';
        $id = (isset($_REQUEST['ID']) && $_REQUEST['ID'] > 0) ? $_REQUEST['ID'] : '0';
        $blk_id = (isset($_REQUEST['BID']) && $_REQUEST['BID'] > 0) ? $_REQUEST['BID'] : '0';
        $ltr_id = (isset($_REQUEST['CID']) && $_REQUEST['CID'] > 0) ? $_REQUEST['CID'] : '0';
         $newSessionId           = session_id();
         $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];

         include_once("controller/clsCSRFprevent.php");
        /* ==================Generate CSRF TOKEN AND CHECK IN EVERY PAGE BY :: NIRANJAN PANDIT ON :: 12-11-2019 START================================== */
        $csrf = new clsCSRFprevent();
        //Generate Token Id and Valid
        $token_id = $csrf->get_token_id();
        $token_value = $csrf->get_token($token_id);
        // print_r($token_value);exit;
        if ($page == 'home'){
            
            include 'view/index.php'; 
        
           
        }
          
        else if ($page == 'sessionOut')
            include 'view/sessionOut.php';
        else if ($page == 'proxy')
            include ('proxy.php');
        else if($page=='actionSheet')
            {
                include 'view/' . $page . 'Inner.php';        
                include 'view/' . $page . '.php';
                        
            }
       
        else if (file_exists("view/" . $page . ".php")) {
                        //echo $page;exit;
                        if(!in_array($page,$wthSessionAry)){
                            include 'sessionCheck.php';
                        }
                        if (file_exists("view/" . $page . "Inner.php")) {
                            include 'view/' . $page . 'Inner.php';
                        }
                        if(!in_array($page,$wthSessionAry)){
                                include('includes/header.php');
                        }
                        include 'view/' . $page . '.php';
                        if(!in_array($page,$wthSessionAry)){
                              include('includes/footer.php');
                        }
               
        }
        else if($page=='cronLog')
        {
                    //include('includes/doctype.php');
                    include 'sessionCheck.php';
                    include('includes/header.php');
                    include 'cronLog/readLog.php';
                    include('includes/footer.php');
        }
        else if($page=='HomeDepartFIRAPI')
        {                   
                    include 'cronjob/HomeDepartFIRAPI.php';                  
        }
        else if($page=='HomeDepartPetitionAPI')
        {                   
                    include 'cronjob/HomeDepartPetitionAPI.php';                  
        }
        else if($page=='HomeDepartServiceAPI')
        {                   
                    include 'cronjob/HomeDepartServiceAPI.php';                  
        }
        else if($page=='HealthDeptCapitalHosAPI')
        {                   
                    include 'cronjob/HealthDeptCapitalHosAPI.php';                  
        }
        else if($page=='cronjob')
        {                   
                    include 'cronjob/index.php';                  
        }
        

       
       else {
                include 'view/error.php';
                
        }
        
        
    }

}

/* * ********************
  Class to view visit type
 * ******************** */

class cls_visit_type extends model {

    public function manageVisitType($action, $visitId, $visitName) {
        $sql = "CALL USP_VISIT_TYPE('$action', $visitId, '$visitName');";
        $err_visitId = Model::isSpclChar($visitId);
        $err_visitName = Model::isSpclChar($visitName);
        if ($err_visitId > 0 || $err_visitName > 0) {
            header('location:' . URL . 'error');
        } else {
            $result = Model::executeQry($sql);
            return $result;
        }
    }

}

class clsQuery extends Model {

    public function manageQuery($query) {
        //echo $query;
        $query = $query;
        $result = Model::executeQryAnalyzer($query);
        return $result;
    }
     public function manageQuery2($query) {
        //echo $query;
        $query = $query;
        if(isset($_REQUEST['btnExecute']) && $_REQUEST['dqs']!=''){
        $querySearch = trim($_REQUEST['dqs']);
        $sql1 = 'insert into t_query_log (intUserId, vchQuery) VALUES ("'.$_SESSION['adminConsole_userID'].'","'.$querySearch.'");';
        $result1 = Model::executeQryAnalyzer($sql1);
        }
       
        $result = Model::executeQryAnalyzer($query);
        return $result;
    }

}

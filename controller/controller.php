<?php
require_once('App/config.php');
require_once('App/model/customModel.php');

class Controller {

    public function __construct() {
        $this->invoke();
    }

// === Function for call pages and created by Ajit  ===//
    public function invoke() { 
        $page = (isset($_REQUEST['PG']) && $_REQUEST['PG'] != '') ? $_REQUEST['PG'] : 'home';
        // $id = (isset($_REQUEST['ID']) && $_REQUEST['ID'] > 0) ? $_REQUEST['ID'] : '0';
        // $blk_id = (isset($_REQUEST['BID']) && $_REQUEST['BID'] > 0) ? $_REQUEST['BID'] : '0';
        // $ltr_id = (isset($_REQUEST['CID']) && $_REQUEST['CID'] > 0) ? $_REQUEST['CID'] : '0';
        //  $newSessionId           = session_id();
        //  $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];
        // /echo $page;exit;
        if ($page == 'home'){
            include 'view/indexInner.php';
            include 'view/index.php'; 
        }   
        else if ($page == 'sessionOut'){
            include 'view/sessionOut.php';
        }
        else if ($page == 'proxy'){
            include ('proxy.php');
        }
       
        else if (file_exists("view/" . $page . ".php")) {
            include 'sessionCheck.php';           
            if (file_exists("view/" . $page . "Inner.php")) {
                include 'view/' . $page . 'Inner.php';
            }
            include('includes/header.php');
            include 'view/' . $page . '.php';
            include('includes/footer.php');
                       
               
        }
        
       else {
                include 'view/error.php';
                
        }
        
        
    }

}


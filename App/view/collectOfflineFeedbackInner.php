<?php 
    /* ================================================
    File Name       : collectOfflineFeedbackInner.php
    Description     : This is used for Collect Offline Feedback.
    Author Name     : Niranjan Pandit
    Date Created    : 17-10-2019
    Update History  :
    <Updated by>        <Updated On>        <Remarks>

    ==================================================*/
    include_once(CLASS_PATH."clsOfflineFeedback.php");
    $obj             = new clsOfflineFeedback;

    //======================= Permission ===========================*/
    $glId               = $_REQUEST['GL'];
    $plId               = $_REQUEST['PL'];
    $pageName           = $_REQUEST['PAGE'].'.php';
    $userId             = $_SESSION['adminConsole_userID'];
    $dataArr            = array();
    
    if($_POST['hdn_qs'] == 'U'){
        $arrResult = $obj->submitFeedback();
        
        $outMsg         = $arrResult['outMsg'];
        $redirectLoc    = $arrResult['redirectLoc'];
    }

?>
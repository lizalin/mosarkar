<?php
    /* ================================================
    File Name                     : config.php
    Description			  : This is to set default data, configuration datas.
    Author Name			  : Sudam Chandra Panda
    Date Created		  : 19-Nov-2014	
    Update History		  :	<Updated by>			<Updated On>		<Remarks>

    includes			  : dbConfig.php
    ==================================================*/
    @session_start();
    error_reporting(E_ALL-E_NOTICE-E_WARNING);
    //error_reporting(-1);
    
    ini_set("display_errors", 1);    

      
    date_default_timezone_set("Asia/Kolkata");
    $host		= $_SERVER['HTTP_HOST'].'/';
 
    $projectName 	= explode('/', $_SERVER['REQUEST_URI']);
    $host           = $_SERVER['HTTP_HOST'].'/'.$projectName[1];
    $curPath	    = $_SERVER['PHP_SELF'];
    $explPath	    = explode('/',$curPath);
    $FN1            = $explPath[1];
    $FN2            = $explPath[2].'/';
    $absPath        = $_SERVER['DOCUMENT_ROOT'];
    define('WEBSITE_URL', 'http://'.$host.'/');        
    define('WEBSITE_APPURL', 'http://'.$host.'/App/');
    define('URL', 'http://'.$host .'/'.$FN2);
    define('APPURL', 'http://'.$host .'/'.$FN2);
    define('ABS_PATH',$absPath.'/'.$FN1.'/'.$FN2);
    define('SITE_PATH',$absPath.'/'.$FN1.'/'.$FN2); 
    define('CLASS_PATH',$absPath.'/'.$FN1.'/'.$FN2.'controller/');
    define('CONSOLE_CLASS_PATH',$absPath.'/'.$FN1.'/'.$FN2.'/Console/controller/');
    define('DOC_SERVER_UPLOAD_PATH',SITE_PATH.'uploadDocuments/');
    define('MPDF_PATH', SITE_PATH.'MPDF57/');

    
    
    define('TITLE', "FSCW");
    include("Console/includes/dbConfig.php");
    define('DB_HOST', $dbHost);
    define('DB_NAME', $dbName);
    define('DB_USER', $dbUser);
    define('DB_PASS', $dbPass);
    define('DB_PORT', $dbPort);	
    define('SPLCHRS',"',<,>,");
    define('MB_1', 1000000);
    define('MB_2', 2000000);
    define('MB_5', 5000000);
    define('MB_10', 10000000);
    define('MB_20', 20000000);
    define('BLANK_DATE','1000-01-01');
    $requiredColXls = array('vchName','intMobile','intAge','intGender','dtmRegdDateTime','dtmFeedbackRcvTime','intFeedbackStatus','intCreatedThrough','Have You received the payment ?','Do you faced any diffcuties during selling of paddy?','Have you recived token for the selling of paddy?','PACSCODE','PACSNAME','FARMERCODE');
    define('REQUIED_XLS_COL',$requiredColXls);
    define('EXCEL_IMPORT','EXCEL_IMPORT');

    define('FEEDBACK_CALL_STATUS', array('0' => 'To Be Updated','1' => 'Call Connected', '2' => 'Not Reachable', '3' => 'Invalid No. / Wrong No.', '4' => 'Did not Pick', '5' => 'Did not want to talk / DND', /*'6' => 'DND',*/ '7' => 'Call Later', '8' => 'No Incoming Call Facility', '9' => 'Switched off', '11' => 'Not Visited', '12' => 'Govt. Employee')); // Please Not Add 10 id of Status
    //$requiredQstnColXls = array('Question1','Question2','Question3','Question4','Question5','Question6','Question7',);
    //define('REQUIED_XLS_QSTN_COL',$requiredQstnColXls);
    define('FSCWS_DESIGNATION', 1);
    define('CSO_DESIGNATION', 2);
    define('PA_DESIGNATION', 4);
    define('CS_DESIGNATION', 6);
    // define('CMO_DESIGNATION', 20);
    // define('MINISTER_DESIGNATION', 18);
    // define('DIG_DESIGNATION', 19);
    // define('SC_DESIGNATION', 1);
    // define('CP_DESIGNATION', 21);
    // define('IGP_DESIGNATION', 22);
    define('OPERATOR', 3);
    define('DESIGNATION', array('0',FSCWS_DESIGNATION,CSO_DESIGNATION, PA_DESIGNATION, '6','17','14','18','19','20'));

    define('DEPART_FSCW', 1);
    define('DEPART_HOME', 14);
    define('RCMS', 1);
    define('PADDY', 2);
    

    //SMS details By:Ajit
    define('SMS_SENDER_ID','MOSRKR');
    define('SMS_USER_NAME','opscsms2012-mosrkr');
    define('SMS_PASSWORD','Mosrkr$54321');
    define('SMS_DEPT_KEY','d52f086f-f273-432c-a0f9-d30246c9dd60');
    define('SMS_MESSAGE',"ଆପଣଙ୍କ ମୋବାଇଲ ନମ୍ବର 'ମୋ ସରକାର' ରେ ପଞ୍ଜିକୃତ ହେଲା | Your mobile number is registered in 'MO SARKAR'.");

    define('DIRECT_CALL_STATUS', array('0' => 'All','1' => 'Poor', '2' => 'Average', '3' => 'Good', '4' => 'Bad', '5' => 'Outstanding')); // Authority Feedback report Drilldown.
    define('NEW_BADGE',array('0'=>'collectOfflineFeedbacks'));
    define('API_ACCOUNT_TYPE',array('HEALTHAPI'=>'1', 'HOMEAPI'=>'2'));
?>

<?php
$sessExpireTime	= 1800;
        if(!class_exists('commonClass')){

		require(ABSPATH."\class_file\Common_class_inc.php");
	}
	$commonObj	= new commonClass;
	$homePath	= $commonObj->webpath();
        
	$siteProjectName	= $_SERVER['HTTP_HOST'];

	if($_SERVER['REMOTE_ADDR'] == '127.0.0.1')
	{ 
		$projectName 	= explode('/', $_SERVER['REQUEST_URI']);
		$siteProjectName= $projectName[1];
	}
        
	if($_SESSION[$siteProjectName.'_flag']=='' && trim($_SESSION['adminConsole_UserName'])=='')
        {
          // echo "1asdsa <pre>".print_r($_SESSION);exit;
		unset($_SESSION[$siteProjectName.'_flag']);
		unset($_SESSION['adminConsole_userID']);
		unset($_SESSION['adminConsole_UserName']);
		unset($_SESSION['adminConsole_FullName']);
		unset($_SESSION['adminConsole_EMail']);
		unset($_SESSION['adminConsole_Desg']);
		unset($_SESSION['adminConsole_Desg_Id']);
		unset($_SESSION['adminConsole_Grade']);
		unset($_SESSION['adminConsole_Node']);
		unset($_SESSION['expire']);
                session_destroy();
		 echo "<script>window.location.href='".$homePath."../sessionOut'</script>";
	}
	
	$strUser        = $_SESSION['adminConsole_userID'];
        $sql		= "CALL USP_ADMIN_LOGIN('UAT','$strUser')";
     
	$sess_result		= $commonObj->ExecuteQuery($sql);
        if($sess_result->num_rows >0){
            $rows          = $sess_result->fetch_array();
            $activityTime = strtotime($rows['LAST_ACTIVITY_TIME']);
        }
	$_SESSION['start'] = $activityTime;
    //if(!isset($_SESSION['expire'])){
        $_SESSION['expire'] = $_SESSION['start']+ ($sessExpireTime);
    //}
        
    $now = time();
    if($now > $_SESSION['expire'])
    {
                session_destroy();
               echo "<script>window.location.href='".$homePath."../sessionOut'</script>";
                //header("Location:".$homePath."../sessionOut");
		unset($_SESSION['expire']);
                exit;
    }
	else 
		$_SESSION['expire'] = $_SESSION['start']+ (1800) ;
?> 
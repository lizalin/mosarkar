<?php
include_once("Console/config.php");
include_once(ABSPATH."/class_file/Common_class_inc.php");
$objComCls= new commonClass();
$sessExpireTime	= 1800;
//echo "<pre>";print_r($_SESSION);
	if($_SESSION['adminConsole_userID']=='')
	{
           // exit('123');
		unset($_SESSION['adminConsole_userID']);
		unset($_SESSION['adminConsole_UserName']);
		unset($_SESSION['adminConsole_FullName']);
		unset($_SESSION['adminConsole_EMail']);
		unset($_SESSION['adminConsole_Desg']);
		unset($_SESSION['adminConsole_Desg_Id']);
		unset($_SESSION['adminConsole_Grade']);
		unset($_SESSION['adminConsole_Node']);
		unset($_SESSION['expire']);
                unset($_SESSION['step2Verification']);
		header("Location:".URL."sessionOut");
	}

       //echo "<pre>";print_r($_SESSION);
        $strUser        = $_SESSION['adminConsole_userID'];
	$sql= "CALL USP_ADMIN_LOGIN('UAT','$strUser')";
	$result		= $objComCls->ExecuteQuery($sql);
        if($result->num_rows >0){
            $row          = $result->fetch_array();
            $activityTime = strtotime($row['LAST_ACTIVITY_TIME']);
        }
	$_SESSION['start'] = $activityTime;

       //echo "AT: ".$activityTime."</br>";
      //  echo "expar : ".$sessExpireTime."</br>";
        //echo $_SESSION['expire']."<br>";
        //if(!isset($_SESSION['expire'])){
            $_SESSION['expire'] = $_SESSION['start']+ ($sessExpireTime);
            //echo "IN sess:".$_SESSION['expire']."</br>";
       // }
	$now = time();

    //echo $now.'===='.$_SESSION['expire']."</br>";exit;
    if($now > $_SESSION['expire'])
    {
       
        $strUser = $_SESSION['adminConsole_UserName'];
        $sql		= "CALL USP_ADMIN_LOGIN('ULT','$strUser')";
	$result		= $objComCls->ExecuteQuery($sql);
        session_destroy();
        header("Location:".URL."sessionOut");
		unset($_SESSION['expire']);
    }
	else 
		$_SESSION['expire'] = $_SESSION['start']+ ($sessExpireTime) ;
   //echo "<pre>";print_r($_SESSION);exit;
        
?>
<?php
/*============================================================
Page Name		:	logIn_class.php
Description		:	Class for log in
Created By		:	Sunil Kumar Parida
Created On		:	31-Oct-2013
Update History	:
<Updated by>		<Updated On>		<Remarks>

Functions Used	:	connectToDatabase();closeConnection();
==============================================================*/ 
if(file_exists('../config.php'))
	include('../config.php');
	
class login extends commonClass
{
	//=========== Function to login user By Sunil Kumar parida On 31-10-2013 ==============
	function doLogin()
	{
		$bad_login_limit = 5;
		$lockout_time    = 6000; 
            //$strCaptcha		= trim($_POST["txtCaptcha"]);
            // if($_SESSION['captcha']==$strCaptcha)//$_SESSION['captcha']==$strCaptcha
            // {
		$strUser 	= $_POST['htxtuserID'];
		$strPass 	= $_POST['htxtPassword'];
		$intsalt	= $_SESSION['salt'];
                
                
		$sql		= "CALL USP_ADMIN_LOGIN('UD','$strUser')";
            // echo $sql; exit;    
		$result		= commonClass::ExecuteQuery($sql);
		// print_r($result); exit;
		if(mysqli_num_rows($result)>0)
		{
                   
                   
			$logStatus		= 1;
			if($row = mysqli_fetch_assoc($result))
			{
                          // echo "<pre>";print_r($row);exit;
								$intUserID	 	= $row["INT_USER_ID"];
								$accessType	 	= $row["INT_ACCESS_TYPE"];
								$strPassword            = $row["VCH_PASSWORD"];
								$strFName	 	= $row["VCH_FULL_NAME"];
								$intPrivilege 	        = $row["INT_PRIVILEGE"];
								$strImage	 	= $row["VCH_IMAGE"];
								$strDesignation         = $row["DESIGNATION"];
								$intDesignation	        = $row["INT_DESIGNATION_ID"];

								$strGrade		= $row["GRADE"];
								$strTimeZone            = $row["TIME_ZONE"];
								$strCheckPass           = $row["INT_PASS_CHECK"];
								//$LoggedStatus           = $row['LOGGED_STATUS'];
								$LogInStatus           = $row['LOGIN_STATUS'];
								$dtmPasswordChange      = $row['DTM_PASSWORD_CHANGE'];
								$intNodeVal		= $row["INT_SUBNODEVAL_ID"];
								$strUserName            = $row['VCH_USER_NAME'];
								$userType               = $row['INT_EMP_TYPE'];
								$agency                 = $row['INT_GROUP_ID'];
								$adminDeptId            = $row['INT_PH_LOCATION'];
								$DeptName               = $row['DeptName'];
								$selSourceId            = $row['sourceId'];

								$first_failed_login     = strtotime($row['FIRST_FAILED_LOGIN']); 
								$failed_login_count     = $row['FAILED_LOGIN_COUNT'];
								$user_status     = $row['USER_STATUS'];
								$login_time     = $row['LOGIN_TIME'];
								$INT_RANK_ID     = $row['INT_RANK_ID'];
                                if($strUserName==$strUser)
                                        $flag=1;		
                                else
                                        $flag=0;
			}





							

                        

                                $lastResetDate      = (isset($dtmPasswordChange) && ($dtmPasswordChange)!='')?(strtotime($dtmPasswordChange)):'0000-00-00 00:00:00';
                                //$lastResetDate      = strtotime($dtmPasswordChange)."<br/>";
                                $Currnow            = time();
                                $datePassdiff       = $Currnow - $lastResetDate;
                                $daysPassDiff       = floor($datePassdiff / (60 * 60));
						if($LogInStatus==5 && $daysPassDiff>8){

						$out_msg="New reset password has expired";

						}
						else if($accessType==3){

						$out_msg="You are not authorized";

						}

						else if(($failed_login_count >= $bad_login_limit) && (time() - $first_failed_login < $lockout_time)  )
						{
						$out_msg = "You are currently locked out.";
						}
						else if(($failed_login_count >= $bad_login_limit) && (time() - $first_failed_login < $lockout_time)  && (trim($strPass)==trim($strNewPass) ))
						{
						$out_msg = "You are currently locked out.";
						}

						else{
						// echo md5($strPassword.$intsalt).'==='.$strPass;exit;
						if($flag==1 && md5($strPassword.$intsalt)==$strPass)
						{
						$logStatus		= 2;
						/*Update user activity and login status*/
						$updatesql		= "CALL USP_ADMIN_LOGIN('UAT',$intUserID)";
						$updateresult           = commonClass::ExecuteQuery($updatesql);
						// update login history

						$system_IP          = getHostByName(getHostName());
						$userAgent          = $_SERVER['HTTP_USER_AGENT'];
						$public_Ip          = $_SERVER['REMOTE_ADDR'];

						$loginHistorySql    = "CALL USP_LOGIN_HISTORY('IN',0,$intUserID,'0000-00-00',1,'$system_IP','$public_Ip','$userAgent','','','')";
						$loginHistoryResult = commonClass::ExecuteQuery($loginHistorySql);

						session_regenerate_id();
						//include('hierarchy_class.php');
						//$hierarchyObj	        = new hierarchy;
						//$allNodes		= $hierarchyObj->fillSubnodeVal($intNodeVal);
						$siteProjectName	= $_SERVER['HTTP_HOST'];
						if($_SERVER['REMOTE_ADDR'] == '127.0.0.1')
						{
						$projectName 	= explode('/', $_SERVER['REQUEST_URI']);
						$siteProjectName= $projectName[1];
						}
						$_SESSION[$siteProjectName.'_flag']		= $intUserID;
						$_SESSION['adminConsole_userID'] 		= $intUserID;
						$_SESSION['adminConsole_UserName']		= $strUser;
						$_SESSION['adminConsole_FullName']		= $strFName;
						$_SESSION['adminConsole_Privilege']		= $intPrivilege;
						$_SESSION['adminConsole_Image']			= $strImage;
						$_SESSION['adminConsole_Desg']			= $strDesignation;
						$_SESSION['adminConsole_Desg_Id']		= $intDesignation;
						$_SESSION['adminConsole_Grade']			= $strGrade;
						$_SESSION['adminConsole_Node']			= $intNodeVal;
						$_SESSION['adminConsole_TimeZone']		= $strTimeZone;
						//$_SESSION['adminConsole_allNodes']		= $allNodes;
						$_SESSION['adminConsole_UserType']		= $userType;
						$_SESSION['adminConsole_agency']		= $agency;
						$_SESSION['adminConsole_HierarchyId']	= $intNodeVal;
						$_SESSION['adminConsole_DeptId']		= $adminDeptId;
						$_SESSION['adminConsole_ServiceId']		= $adminsServiceId;
						$_SESSION['DeptName']=$DeptName;
						$_SESSION['selSourceId']=$selSourceId;
						$_SESSION['adminConsole_rankId']		= $INT_RANK_ID;

						$authArea_sql		= "SELECT VCH_VALUE_NAME FROM m_admin_subnode_values WHERE INT_SUBNODEVAL_ID=".$intNodeVal;
						$authArea_res = commonClass::ExecuteQuery($authArea_sql);
						if($authArea_res->num_rows>0)
						{
						$authArea_Row		= $authArea_res->fetch_array();
						$authArea			= ', '.$authArea_Row[0];
						}		
						$_SESSION['adminConsole_Area']	= $authArea;
						setcookie("storedUserName",$strUser);
						setcookie("storedUserImage",$strImage);
						$lastChangeDate = strtotime($dtmPasswordChange);
						$now            = time();
						$datediff       = $now - $lastChangeDate;;
						$daysDiff       = floor($datediff / (60 * 60 * 24));
						//echo $strCheckPass;exit;
						//                                echo $daysDiff;
						//                                echo $daysPassDiff;
						//                                echo $LogInStatus;exit;
						// print_r($_SESSION); exit;
						// if($strCheckPass==0 || $daysDiff>=30 || ($daysPassDiff<=8 && $LogInStatus==5))
						// 	header("location:".APP_PATH."/dashboard");
						// 	// header("location:".APP_PATH."/changePassword/1");

						// else{
						if($_SESSION['adminConsole_Privilege']==0 || $_SESSION['adminConsole_Privilege']==1  || $_SESSION['adminConsole_Desg_Id']==FSCWS_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CSO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==PA_DESIGNATION){ 
						// echo LINKPATH;exit;
						header("location:".APP_PATH."/dashboard");
						}else{
						// echo 1; exit;
						header("location:".APP_PATH."/viewfeedback");  
						}
						// }
						}
						else
						{



									if( time() - $first_failed_login > $lockout_time ) {
									// first unsuccessful login since $lockout_time on the last one expired
									$first_failed_login = date('Y-m-d H:i:s'); // commit to DB
									$failed_login_count = 1; // commit to db\


									$sqlUT		        = "CALL USP_ADMIN_LOGIN_CHECK('UT','$strUser','$first_failed_login',$failed_login_count)";
									//echo  $sqlUT;
									$resultUT		= commonClass::ExecuteQuery($sqlUT);

									$out_msg = 'Invalid User ID and Password ! ' .($bad_login_limit-$failed_login_count).' attempts remaining.';
									} else {
									$failed_login_count++; // commit to db.
									$attempt_remains = ($bad_login_limit-$failed_login_count);

									$sqlUC		        = "CALL USP_ADMIN_LOGIN_CHECK('UC','$strUser','0000-00-00',$failed_login_count)";
									$resultUC		= commonClass::ExecuteQuery($sqlUC);

									$out_msg = 'Invalid User ID and Password ! ' .($bad_login_limit-$failed_login_count).' attempts remaining.';

									}




						//$out_msg="Invalid User ID and Password";
						}
						}
                        
			if($intPrivilege!=0)
			{
				$ipAddress		= $_SERVER['REMOTE_ADDR'];
				$logSql			= "CALL USP_LOGIN_LOG('A', 0, 1, $intUserID, 0, 0, '0000-00-00', '$ipAddress', '', $logStatus)";
				$logRes 		= commonClass::ExecuteQuery($logSql);
			}
		}
		else
		{
			$out_msg="Invalid User ID and Password";
		}
		
	  //}
            // else
            // {
            //         $out_msg		= "The Captcha code is invalid! Please try it again"; 
            // }  
            return $out_msg;
        }
	
	//=========== Function to check login time By Sunil Kumar parida On 31-10-2013 ==============
	function checkLogIn()
	{
		$userId				= $_SESSION['adminConsole_userID'];
		$strTimeZone                    = $_SESSION['adminConsole_TimeZone'];
		$timeSql			= "CALL USP_ATTENDANCE('S', $userId, '$strTimeZone', '');";
		$timeResult			= commonClass::ExecuteQuery($timeSql);
		$timeRow			= mysqli_fetch_array($timeResult);
		$loc_time			= $timeRow['LOC_TIME'];		
		$start_time			= date("Y-m-d H:i:s", strtotime($timeRow['START_TIME']));
		$grace_time			= $timeRow['GRACE_TIME'];
		$currentDay			= $timeRow['DAY_NUMBER'];
		if($currentDay!=6)
			$actual_time	= date("Y-m-d H:i:s",strtotime('+'.$grace_time.' minutes', strtotime($start_time)));
		else		
			$actual_time	= date("Y-m-d H:i:s", strtotime($grace_time));
				
		if(strtotime($loc_time)>strtotime($actual_time))
		{
			$flag			= 1;
			$checkSql		= "CALL USP_ATTENDANCE('CL', $userId, '$strTimeZone', '');";
			$checkResult	= commonClass::ExecuteQuery($checkSql);
			$checkRow		= mysqli_fetch_array($checkResult);
			if($checkRow[0]>0)
				$flag		= 0;
			return $flag;
		}
		else
		{
			$loginSql		= "CALL USP_ATTENDANCE('LI', $userId, '$strTimeZone', '');";
			$loginResult	= commonClass::ExecuteQuery($loginSql);
		}
	}
	
	//=========== Function to check late login time By Sunil Kumar parida On 1-11-2013 ==============
	function latelogIn($remark)
	{
		$userId				= $_SESSION['adminConsole_userID'];
		$strTimeZone                    = $_SESSION['adminConsole_TimeZone'];
		$loginSql			= "CALL USP_ATTENDANCE('LI', $userId, '$strTimeZone', '$remark');";
		$loginResult                    = commonClass::ExecuteQuery($loginSql);
	}
	
	//=========== Function to view timing By Sunil Kumar parida On 1-11-2013 ==============
	function viewTimings()
	{
		$userId				= $_SESSION['adminConsole_userID'];
		$strTimeZone		        = $_SESSION['adminConsole_TimeZone'];
		$timeSql			= "CALL USP_ATTENDANCE('V', $userId, '$strTimeZone', '');";
		$timeResult			= commonClass::ExecuteQuery($timeSql);
		$timeRow			= mysqli_fetch_array($timeResult);
		$loginDate			= $timeRow['DTM_DATE'];
		$loginTime			= $timeRow['VCH_LOGIN_TIME'];
		$recessOut			= $timeRow['VCH_RECESS_FROM'];
		$recessIn			= $timeRow['VCH_RECESS_TO'];
		$logoutTime			= $timeRow['VCH_LOGOUT_TIME'];
		$resultArr			= array($loginDate,$loginTime,$recessOut,$recessIn,$logoutTime);
		return $resultArr;
	}
	//=============Function to handle Forgot Password By Kishore Patra On 18-09-2014============
	function forgotPassword()
	{

		//$userId				= $_SESSION['adminConsole_userID'];
		$strUser 			= htmlspecialchars(trim($_POST['htxtuserID']));
		$strEmail 			= htmlspecialchars(trim($_POST['htxtEmailID']));
		$random				= rand(1000,9999);
		$msg				= '';
		$errFlag			= 0;
		
		$SpclCharUser   	= commonClass::isSpclChar($strUser);
		$SpclCharEmail   	= commonClass::isSpclChar($strEmail);
		if($SpclCharUser>0 || $SpclCharEmail>0)
		{
			$msg			= "Special Characters are not allowed";
			$errFlag		=1;
		}
		if($errFlag==0)
		{
			$fpSql			= "CALL USP_ADMIN_USER('FP', 0, '', 0, '0000-00-00', '', '', '', '', '', '', '$strEmail', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, '$strUser', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,'','','','','', @OUT)";
		    $fpResult			= commonClass::ExecuteQuery($fpSql);
			$fprow                  = mysqli_fetch_array($fpResult);
			if($fprow[0]==0)
			{
				$msg		 ="Invalid User ID or Email or mobile number";
				$errFlag	 =1;
			}
			else
			{
				if (filter_var($strEmail, FILTER_VALIDATE_EMAIL)) {
				  	
				} else {
				  $strOTP      = rand(1000,9999);
				  $userId  	   = $fprow[0];
				  $strMobileNo = $strEmail;
				  //commonClass::sendSMS($strMobileNo,'Your OTP for change password request :- '.$strOTP);
				  $sendOtp = "CALL USP_ADMIN_USER('SO', $userId, '', 0, '0000-00-00', '', '','' , '', '$strOTP', '$strMobileNo', '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,'','','','','', @OUT)";
				  $sotpRes			= commonClass::ExecuteQuery($sendOtp);
				  $userId           = commonClass::encrypt($fprow[0]."-".$strMobileNo."-".$strOTP);
				  /*<?php echo APPURL ?>addOfficeMaster/<?php echo $row['intId']; ?>*/
				  header("location:".APPURL.'otpCheck/'.$userId);
				}
				
			}
		}
		$arrResult		=array('msg'=>$msg,'flag'=>$errFlag);
		return $arrResult;
	}
}
?>

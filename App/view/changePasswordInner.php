<?php
/* =========================================================================================
	File Name         	  : changePasswordInner.php
	Description               : This page is to change the password.	
	Date Created		  : 05-Jan-2015
	Created By		  : Rasmi Ranjan Swain  
	Developed By		  : Rasmi Ranjan Swain 
	Developed On		  : 05-Jan-2015
	Update History		  :
	<Updated by>				<Updated On>		<Remarks>
	
	Include Files    	  : customModel.php,config.php
	Functions Used		  : manageUser(),isBlank(),chkLength(),isSpclChar()
	========================================================================================*/
	include_once("model/customModel.php");
	include("Console/config.php");	
	require(ABSPATH."/class_file/manageUser_class.php");
	
	$objUser			= new user;
	//$objLogin			= new login;
	$userId				= $_SESSION['adminConsole_userID'];	
	$outmsg				= '';
	$errFlag			= 0;
	if(isset($_POST['btnSubmit']))
	{
		$txtOldPassword		= $_POST["txtOldPwd"];
		$txtNewPassword		= $_POST["txtNewPwd"];	
		
		$isBlankOPwd			= model::isBlank($txtOldPassword);
		$isBlankNPwd			= model::isBlank($txtNewPassword);
		$chkLengthNPwd			= model::chkLength('MIN',$txtNewPassword,8);
		$spclCharOPwd			= model::isSpclChar($txtOldPassword);
		$spclCharNPwd			= model::isSpclChar($txtNewPassword);
		if($isBlankOPwd>0 || $isBlankNPwd>0)
		{
			$outmsg				= "Mandatory field should not be blank.";
			$errFlag			= 1;
		}
		else if($spclCharOPwd>0 || $spclCharNPwd >0)
		{
			$outmsg				= "Special Characters are not allowed.";
			$errFlag			= 1;
		}
		else if($chkLengthNPwd>0)
		{
			$outmsg				= "Password shouldn't be less than 8 characters";
			$errFlag			= 1;
		}
			
		if($errFlag==0)
		{
		//======OldPassword is sent in the DomainName field to the Procedure==========
			$sql=$objUser->manageUser('CP',$userId, '', 0, '0000-00-00', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, '',md5($txtNewPassword), md5($txtOldPassword), 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
			if($sql->num_rows>0)
			{
				$row	= mysqli_fetch_array($sql);
				if($row[0]==0)
				{
					$Subject 	 = "Password Details";
					$strFrom	 = "contact@sociomatic.in";
					$MailMessage.= "<div style='margin-bottom:10px'>Dear</div>";
					$MailMessage.= "<div style='margin-bottom:10px'>Below is the password Details</div>";
					$MailMessage.= "<table cellspacing='0' cellpadding='2'>";
					$MailMessage.= "<tr>";
					$MailMessage.= "<td>User ID</td>";
					$MailMessage.= "<td>".$strUser."</td>";
					$MailMessage.= "</tr>";
					$MailMessage.= "<tr>";
					$MailMessage.= "<td>Password</td>";
					$MailMessage.= "<td>".$strNewPass."</td>";
					$MailMessage.= "</tr>";
					$MailMessage.= "</table>";
					$MailMessage.= "<div style='margin-bottom:10px'>Don't Reply on this mail</div>";
					if(SendMail=='Y')
						commonClass::Sendmail($strFrom, $strEmail, $Subject, $MailMessage,$row[0]);
					$outmsg	= "Password Changed Successfully";
				}
				else
				{
					$outmsg	    = "Invalid oldPassword";
					$errFlag	= 1;
				}
			}
		}
	}
?>
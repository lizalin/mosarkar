<?php
/*============================================================
Page Name		:	setPermission_class.php
Description		:	Class for set the permission
Created By		:	Sunil Kumar Parida
Created On		:	24-sept-2013
Update History	:
<Updated by>		<Updated On>		<Remarks>


Functions Used	:	connectToDatabase();closeConnection();
==============================================================*/
if(file_exists('../config.php'))
	include('../config.php');
if(!class_exists('commonClass'))
	require(ABSPATH."/class_file/Common_class_inc.php");
if(!class_exists('user'))
	require(ABSPATH."/class_file/manageUser_class.php");
include_once( ABSPATH."/includes/sessioncheck.php");

//=========== Ckass for set the link ==========
class fillPermission extends commonClass
{
	// ============ Function to manage set permission By Sunil Kumar Parida On 24/10/2013 ==========
	function managePermission($action, $pId, $userId, $glId, $plId, $action1, $action2, $action3, $updatedBy, $query)
	{
		$permissionSql	= "CALL USP_ADMIN_PERMISSION('$action', '$pId', '$userId', '$glId', '$plId', '$action1', '$action2', '$action3', '$updatedBy', '$query', @OUT);"; //echo $permissionSql;
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errPId			= commonClass::isSpclChar($pId);
		$errUserId		= commonClass::isSpclChar($userId);
		$errGlId		= commonClass::isSpclChar($glId);
		$errPlId		= commonClass::isSpclChar($plId);
		$errAction1		= commonClass::isSpclChar($action1);		
		$errAction2		= commonClass::isSpclChar($action2);	
		$errAction3		= commonClass::isSpclChar($action3);	
		$errUpdate		= commonClass::isSpclChar($updatedBy);
		$errQuery		= commonClass::isSpclChar($query);
              
		if($errAction == 0 && $errPId == 0 && $errUserId == 0 && $errGlId == 0 && $errPlId == 0 && $errAction1 == 0 && $errAction2 == 0 && $errAction3 == 0 && $errUpdate == 0 && $errQuery == 0)	
		{
			$permissionResult	= commonClass::ExecuteQuery($permissionSql);
			return $permissionResult;		
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	// ============ Function to set permission By Sunil Kumar Parida On 25/10/2013 ==========
	function setPermission()
	{
		$userObj		= new user();
		$sessId			= $_SESSION['adminConsole_userID'];
		$radType		= $_POST['radType'];
		$links			= $_POST['hdnLinks'];
		$chkCopyUser	= $_POST['chkCopyUser'];
		$errFlag		= 0;		
		if($errFlag==0)
		{
			$explLinks		= explode(',',$links);
			if($radType!=2)
				$userIds		= $_POST['hdnUsers'];
			else
			{
				$groupId		= $_POST['selGroup'];
				
				$userResult		= $userObj->manageUser('V', 0, '', 0, '0000-00-00', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, 0,  0, 1, $groupId);
				
				if(mysqli_num_rows($userResult)>0)
				{
					while($userRow	= mysqli_fetch_array($userResult))
					{
						$userIds	.= $userRow['INT_USER_ID'].',';
					}
					$userIds		= substr($userIds,0,-1);
				}
				
			}	
			if($userIds!='')
			{
				$explUsers		= explode(',',$userIds);
				$flag			= 0;
				
				for($j=0;$j<count($explUsers); $j++)
				{
					$query		= '';
					$indUserId	= $explUsers[$j];
					for($i=0; $i<count($explLinks); $i++)
					{
						$glPl			= $explLinks[$i];
						$explGlPl		= explode('_',$glPl);
						$explAction	= explode(',',$copyAction);
						if($chkCopyUser==1)
							$action		= $explAction[$i];
						else
							$action		= ($_POST['rad'.$glPl]!='')?$_POST['rad'.$glPl]:0;
						
						$gl			= $explGlPl[0];
						$pl			= $explGlPl[1];
						$query		.= '('.$indUserId.','.$gl.','.$pl.','.$action.','.$sessId.'),';
						
					}	
						$query		= substr($query,0,-1);
						$result		= $this->managePermission('A', 0, $indUserId, 0, 0, 0, 0, 0, 0, $query);	
						if($result)
							$flag++;		
				}
			}
			if($radType==2)
			{
				$grp_result	= '';
				for($i=0; $i<count($explLinks); $i++)
				{
					$gl_Pl			= $explLinks[$i];
					$expl_GlPl		= explode('_',$gl_Pl);
					$expl_action	= explode(',',$copyAction);
					if($chkCopyUser==1)
						$actions	= $expl_action[$i];
					else
						$actions		= ($_POST['rad'.$gl_Pl]!='')?$_POST['rad'.$gl_Pl]:0;
					$gl_id			= $expl_GlPl[0];
					$pl_id			= $expl_GlPl[1];
									
					$grp_query		.= '('.$groupId.','.$gl_id.','.$pl_id.','.$actions.','.$sessId.'),';
				}				
				$grp_query			= substr($grp_query,0,-1);
				$grp_result			= $this->manageGroupPermission('A', 0, $groupId, 0, 0, 0, $grp_query, 0);
				if($grp_result)
					$flag	= 1;
			}
			
			if($flag>0)
			{
				$msg		= "Permission set successfully";
			}
		}
		return $msg;
	}
	
	// ============ Function to manage group permission By Sunil Kumar Parida On 06/11/2013 ==========
	function manageGroupPermission($action, $gId, $groupId, $glId, $plId, $permission, $query, $updatedBy)
	{
		$permissionSql	= "CALL USP_GROUP_PERMISSION('$action', '$gId', '$groupId', '$glId', '$plId', '$permission', '$query', '$updatedBy');";
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errGId			= commonClass::isSpclChar($gId);
		$errGroupId		= commonClass::isSpclChar($groupId);
		$errGlId		= commonClass::isSpclChar($glId);
		$errPlId		= commonClass::isSpclChar($plId);
		$errPermission	= commonClass::isSpclChar($permission);		
		$errQuery		= commonClass::isSpclChar($query);	
		$errUpdatedBy	= commonClass::isSpclChar($updatedBy);
		if($errAction==0 && $errGId==0 && $errGroupId==0 && $errGlId==0 && $errPlId==0 && $errPermission==0 && $errQuery==0 && $errUpdatedBy==0 )
		{
			$permissionResult	= commonClass::ExecuteQuery($permissionSql);
			return $permissionResult;
		}
		else
		{
			header("Location: ".$path."../home");
		}		
	}
	/*=========== function to add Group ==================
	By				: Rasmi Ranjan Swain
	ON				: 09/Nov/2013
	Function Used 	: managePermission()
	=======================================================*/
	function assignLinkPermission()
	{
		$userObj		= new user();
		$sessId			= $_SESSION['adminConsole_userID'];
		$radType		= $_POST['radType'];
		$intGroupid		= $_POST['selGroup'];
		$intGLid		= $_POST['selGL'];
		$intPLid		= $_POST['selPL'];
		$intAction		= $_POST['radAction'];
		if($radType!=2)
		   $userIds		= $_POST['hdnUsers']; 

		else
		{
			$groupId		= $_POST['selGroup'];				
			$userResult		= $userObj->manageUser('V', 0, '', 0, '0000-00-00', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, 0,  0, 1, $groupId);				
			if(mysqli_num_rows($userResult)>0)
			{
				while($userRow	= mysqli_fetch_array($userResult))
				{
					$userIds	.= $userRow['INT_USER_ID'].',';
				}
				$userIds		= substr($userIds,0,-1);
			}
		}	
		if($userIds!='')
		{
			$explUsers		= explode(',',$userIds);
			$flag			= 0;
			for($j=0;$j<count($explUsers); $j++)
			{
				$indUserId	= $explUsers[$j];				
				$result		= $this->managePermission('AL',0,$indUserId,$intGLid, $intPLid,$intAction,0,0,$sessId,0);
			}
			if($result)
			$outMsg		= 'Link Assigned successfully';
		}
		if($radType==2)
		{
			$result		= $this->manageGroupPermission('AL',0,$intGroupid,$intGLid, $intPLid,$intAction,0,$sessId);
			if($result)
			$outMsg		= 'Link Assigned successfully';

		}
		return $outMsg;
	}
}


?>
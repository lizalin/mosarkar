<?php
/*============================================================
Page Name		:	manageUser_class.php
Description		:	Class for managing user module
Created By		:	Sunil Kumar Parida
Created On		:	10-sept-2013
Update History	:
<Updated by>		<Updated On>		<Remarks>
Sunil Kumar Parida	28-Sept-2013		Add User
Rasmi Ranjan Swain	04-NOV-2013			addGroup
Sunil Kumar Parida	01-Sept-2014		Customize user form control
Functions Used	:	connectToDatabase();closeConnection();
==============================================================*/
if(file_exists('../config.php'))
	include('../config.php');

include_once(ABSPATH."/includes/sessioncheck.php");

class clsPolicestation extends commonClass
{
    public function managePolicestation($action,$arrCondition)
	{	

        $operatorResult = commonClass::callProc('USP_MS_RANGE_TAGGING', $action, $arrCondition);
       // echo $operatorResult;exit;
                
        return $operatorResult;
        
      /*  
		if($errAction==0 && $errLocId==0 && $errName==0 && $errAlias==0 && $errType==0 && $errUpdatedBy==0)	
		{
			$designationSql		= "CALL USP_DESIGNATION('$action', $desgid, '$locationId', '$DesignationName', '$DesignationAliasName','$Type',$updatedBy,$txtRankName, @OUT);";
			//echo $designationSql;//exit;
                        $designationResult	= commonClass::ExecuteQuery($designationSql);
			return $designationResult;	
		}
		else
		{
			header("Location: ".$path."../home");
                        exit;
		}	*/
	}
		

// Tag Police station. Chinmayee

	function tagPolicestation()
	{//print_r($_REQUEST);exit;
		//$userObj		= new user();
		$sessId			= $_SESSION['adminConsole_userID'];
		// $radType		= $_POST['radType'];
		$userIds			= $_POST['hdnUsers'];
		$selRange	        = $_POST['selRange'];
		$dataArr        = array();
		$errFlag		= 0;		
		if($errFlag==0)
		{
			    $query		= '';		
				$explUsers		= explode(',',$userIds);
				$flag			= 0;
				
				for($j=0;$j<count($explUsers); $j++)
				{
					
					$indUserId	= $explUsers[$j];					
					$query		.= '('.$indUserId.','.$selRange.','.$sessId.'),';
				}
		


				$query		= substr($query,0,-1);
				$dataArr['query']       = $query;
				$dataArr['selRange']    = $selRange;
//print_r($dataArr);exit;
				$result		= $this->managePolicestation('A',$dataArr);	
				if($result){
					$flag++;
				}
					

			// if($radType==2)
			// {
			// 	$grp_result	= '';
			// 	for($i=0; $i<count($explLinks); $i++)
			// 	{
			// 		$gl_Pl			= $explLinks[$i];
			// 		$expl_GlPl		= explode('_',$gl_Pl);
			// 		$expl_action	= explode(',',$copyAction);
			// 		if($chkCopyUser==1)
			// 			$actions	= $expl_action[$i];
			// 		else
			// 			$actions		= ($_POST['rad'.$gl_Pl]!='')?$_POST['rad'.$gl_Pl]:0;
			// 		$gl_id			= $expl_GlPl[0];
			// 		$pl_id			= $expl_GlPl[1];
									
			// 		$grp_query		.= '('.$groupId.','.$gl_id.','.$pl_id.','.$actions.','.$sessId.'),';
			// 	}				
			// 	$grp_query			= substr($grp_query,0,-1);
			// 	$grp_result			= $this->manageGroupPermission('A', 0, $groupId, 0, 0, 0, $grp_query, 0);
			// 	if($grp_result)
			// 		$flag	= 1;
			// }
			
			if($flag>0)
			{
				$msg		= "Police Station Tagged successfully";
			}else{
				$msg		= "Error Occured. Try Again";
			}
		}
		return $msg;
	}

	
}
?>
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

class user extends commonClass
{
	//=========== function to fill country names ================
	public function fillCountry($selVal)	
	{
		$sql 	= "CALL CSP_ADMIN_COUNTRY_MASTER()";
		$result	= commonClass::FillDropdown($sql,$selVal);
		return $result;
	}
	
	//=========== function to get location name ===========
	public function getLocation($locId)
	{
		$locName	= '';
		$locSql		= "CALL USP_ADMIN_HIERARCHY('F', '$locId', '', '', '0', '0',@out);";
		
		$locResult	= commonClass::ExecuteQuery($locSql);
		if(commonClass::NumRow($locResult)>0)
		{
			$locRow		= mysqli_fetch_array($locResult);
			$locName	= $locRow['VCH_HIERARCHY_NAME'];
		}
		return $locName;
	}
	
	//=========== function to manage functions ================
	public function manageLocation($action, $locationId, $countryId, $locationName, $timeZone, $description, $updatedBy)
	{
		$locationSql	= "CALL USP_LOCATION('$action', '$locationId', '$countryId', '$locationName', '$timeZone', '$description', '$updatedBy', @OUT);";
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errLocId		= commonClass::isSpclChar($locationId);
		$errCountryId	= commonClass::isSpclChar($countryId);
		$errLocName		= commonClass::isSpclChar($locationName);
		$errTimeZone	= commonClass::isSpclChar($timeZone);
		$errUpdatedBy	= commonClass::isSpclChar($updatedBy);
		if($errAction==0 && $errLocId==0 && $errCountryId==0 && $errLocName==0 && $errTimeZone==0 && $errUpdatedBy==0)
		{
			$locationResult= commonClass::ExecuteQuery($locationSql);
			return $locationResult;	
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	//=========== function to fill location =============
	public function fillLocation($selVal)
	{
		$viewLocationSql	= "CALL USP_ADMIN_HIERARCHY('F', '0', '', '', '0', '0',@out)";
		$result				= commonClass::FillMultiDropdown($viewLocationSql,$selVal);
		return $result;
	}
	
	//=========== function to fill location =============
	public function fillDrpLocation($selVal)
	{
		$viewLocationSql	= "CALL USP_ADMIN_HIERARCHY('F', '0', '', '', '0', '0',@out)";
		$result				= commonClass::FillDropdown($viewLocationSql,$selVal);
		return $result;
	}
	
	//=========== function to fill working location =============
	public function fillPhyLocation($selVal)
	{
		$viewLocationSql	= "CALL USP_LOCATION('F', '0', '0', '', '', '', '0', @OUT)";
		$result				= commonClass::FillDropdown($viewLocationSql,$selVal);
		return $result;
	}
	
	//=========== function to Read  Location =#####BY######Rasmi Ranjan Swain##ON####20/09/2013 ================
	public function readLocation($id)
	{
		$intLocId		= 0;		
		$strDesgName	= '';
		$straliasName	= '';
		$inttype		= 0;		
		$result			= $this->manageLocation('R',$id,'0','','','',0);
		if(commonClass::NumRow($result)>0)
		{
			$row				= mysqli_fetch_array($result);
			$intCountryId		= $row['INT_COUNTRY_ID'];
			$strlocName			= $row['VCH_LOCATION'];
			$intTimeZone		= $row['VCH_TIME_ZONE'];			
			$strdesc			= $row['VCH_DESCRIPTION'];
		}
		$arrResult	= array('countryid'=>$intCountryId, 'locName'=>$strlocName, 'timeZone'=>$intTimeZone, 'description'=>$strdesc);
		return $arrResult;
	}
	
	//=========== function to add location ===================
	public function addUpdateLocation($id)
	{
		$userId			= $_SESSION['adminConsole_userID'];
		$ddlCountryId	= $_POST['selCountry'];
		$txtLocation	= $_POST['txtLocation'];
		$ddlTimeZone	= $_POST['ddlTimeZone'];
		$txtDesc		= $_POST['txtDescription'];
		$outMsg			= '';		
		$flag			= ($id!=0)?1:0;
		$action			= ($id==0)?'A':'U';
		$dupResult		= $this->manageLocation('CD',$id,$ddlCountryId,$txtLocation,'','',0);
		if($dupResult)
		{
			$numRow	= mysqli_fetch_array($dupResult);
			if($numRow[0]>0)
			{
				$flag		= 2;
				$outMsg		= 'Location name already exists';
			}
			
			else
			{
		$result			= $this->manageLocation($action,$id, $ddlCountryId, $txtLocation, $ddlTimeZone, $txtDesc, $userId);
		if($result)
			$outMsg		= ($action=='A')?'Location Details added successfully':'Location Details updated successfully';			
			}
		}
		$intCountryId		= ($flag==1 || $flag==2)?$ddlCountryId:0;
		$strlocName			= ($flag==1 || $flag==2)?$txtLocation:'';
		$intTimeZone		= ($flag==1 || $flag==2)?$ddlTimeZone:'0';
		$strdesc			= ($flag==1 || $flag==2)?$txtDescription:'';		
		$arrResult	= array('msg'=>$outMsg, 'flag'=>$flag, 'country'=>$intCountryId, 'locName'=>$strlocName, 'timeZone'=>$intTimeZone, 'description'=>$strdesc);
		return $arrResult;
	}
	
	//=========== function to Delete Location =#####BY######Rasmi Ranjan Swain##ON####17/09/2013 ================
	public function deleteLocation($qs,$id)
	{
		$userId		= $_SESSION['adminConsole_userID'];
		$intID		= explode(',',$id);
		$pass		= 0;
		$fail		= 0;
		$action		= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];			
			$result		= $this->manageLocation($action, $indvidualID, '0','', '','', $userId);
			$msg		= '';
			if($result && $action=='D')
			{
				$row	= mysqli_fetch_array($result);
				$success= $row[0];
				if($success==0)
					$fail++;
				else
					$pass++;
			}
		}
		if($action=='D')
		{
			if($pass>0)
				$msg	.= 'Record(s) deleted successfully';
			if($fail>0)
				$msg	.= $fail." record(s) linked with user and can't be deleted.";
		}
		return $msg;
	}	
	
		
	//=========== function to manage Designation =#####BY######Rasmi Ranjan Swain##ON####17/09/2013===============
	public function manageDesignation($action,$desgid, $locationId, $DesignationName, $DesignationAliasName, $Type,$updatedBy,$txtRankName)
	{	
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errLocId		= commonClass::isSpclChar($locationId);
		$errName		= commonClass::isSpclChar($DesignationName);
		$errAlias		= commonClass::isSpclChar($DesignationAliasName);
		$errType		= commonClass::isSpclChar($Type);
		$errUpdatedBy   = commonClass::isSpclChar($updatedBy);	
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
		}	
	}
	
	//=========== function to Read  Designation =#####BY######Rasmi Ranjan Swain##ON####17/09/2013 ================
	public function readDesignation($id)
	{
		$intLocId		= 0;		
		$strDesgName	= '';
		$straliasName	= '';
		$inttype		= 0;		
		$result			= $this->manageDesignation('R',$id,0,'','',0,0,'0');
		if(commonClass::NumRow($result)>0)
		{
			$row			= mysqli_fetch_array($result);
			$intLocId		= htmlspecialchars_decode($row['VCH_LOC_ID']);
			$strDesgName            = htmlspecialchars_decode($row['VCH_DESG_NAME']);
			$straliasName           = htmlspecialchars_decode( $row['VCH_ALIAS_NAME']);
			$strrankName            = htmlspecialchars_decode( $row['INT_RANK_ID']);			
			$inttype		= htmlspecialchars_decode($row['INT_TYPE']);
						
		}
		$arrResult	= array('location'=>$intLocId, 'desgName'=>$strDesgName, 'aliasName'=>$straliasName, 'type'=>$inttype,'rankName'=>$strrankName);
		return $arrResult;
	}
	
	//=========== function to Add/Update  Designation =#####BY######Rasmi Ranjan Swain##ON####17/09/2013 ================
	public function addUpadateDesignation($id)
	{
            //print_r($_POST);
		$userId			= $_SESSION['adminConsole_userID'] ;
		$ddllocationId          = $_POST['selLocation'];
		$txtDesgName            = htmlspecialchars($_POST['txtDesgName'],ENT_QUOTES);
		$txtAliasName           = htmlspecialchars($_POST['txtAliasName'],ENT_QUOTES);
		$txtRankName            = htmlspecialchars($_POST['txtRankName'],ENT_QUOTES);
		$radType		= htmlspecialchars($_POST['radType'],ENT_QUOTES);
		$outMsg			= '';	
		$flag			= ($id!=0)?1:0;
		$action			= ($id==0)?'A':'U';
		$location		= '';
         //       print_r($ddllocationId)."ashsgdhs";
		 for($i=0;$i<count($ddllocationId);$i++)
		{
			$location	.= $ddllocationId[$i].',';
			if($ddllocationId[0]=='All')
				break;
		}
		$location		= substr($location, 0, -1);
		$dupResult		= $this->manageDesignation('C',$id,'',$txtDesgName,'',0,0,'0');
		if($dupResult)
		{
			$numRow	= mysqli_num_rows($dupResult);
			if($numRow>0)
			{
				$flag		= 2;
				$outMsg		= 'Designation name already exists';
			}
			else
			{
				$result			= $this->manageDesignation($action,$id,$location,$txtDesgName,$txtAliasName,$radType,$userId,$txtRankName);
				
                                if(!empty($result)){
					$outMsg		= ($action=='A')?'Designation added successfully':'Designation updated successfully';
                                }else{
                                    $outMsg = 'Error in Operation';
                                }
			}
		}
		$intLocId		= ($flag==1 || $flag==2)?$location:0;
		$strDesgName            = ($flag==1 || $flag==2)?$txtDesgName:'';
		$straliasName           = ($flag==1 || $flag==2)?$txtAliasName:'';
		$strrankName            = ($flag==1 || $flag==2)?$txtRankName:'0';
		$inttype		= ($flag==1 || $flag==2)?$radType:1;		
		$arrResult	= array('msg'=>$outMsg, 'flag'=>$flag, 'loc'=>$intLocId, 'dgName'=>$strDesgName, 'aliasName'=>$straliasName, 'type'=>$inttype,'rankName'=>$strrankName);
		return $arrResult;
	}
	
	//============= function to delete Designation ==#####BY######Rasmi Ranjan Swain##ON####17/09/2013 ==================
	public function deleteDesignation($qs,$id,$type)
	{
		$userId		= $_SESSION['adminConsole_userID'];
		$intID		= explode(',',$id);
		$pass		= 0;
		$fail		= 0;
		$action		= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];			
			$result		= $this->manageDesignation($action, $indvidualID,'0', '', '',$type,$userId,'');
			$msg		= '';
			if($result && $action=='D')
			{
				$row	= mysqli_fetch_array($result);
				$success= $row[0];
				if($success==0)
					$fail++;
				else
					$pass++;
			}
		}
		if($action=='D')
		{
			if($pass>0)
				$msg	.= 'Record(s) deleted successfully';
			if($fail>0)
				$msg	.= $fail.' record(s) have User and can not deleted.';
		}
		if($action=='AT' && $type==2)	
			$msg	.= 'Designation changed to Temporary ';			
		if($action=='AT' && $type==1)	
			$msg	.= 'Designation changed to Permanent  ';	
		
		return $msg;
	}
	
	//=========== function to manage  GRADE =#####BY######Rasmi Ranjan Swain##ON####18/09/2013===============
	public function manageGrade($action,$gradeID, $locationId, $gradeName, $Description,$updatedBy)
	{	
		$gradeSql		= "CALL USP_GRADE('$action', $gradeID, '$locationId', '$gradeName', '$Description','$updatedBy', @OUT);";		
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errLocId		= commonClass::isSpclChar($locationId);
		$errName		= commonClass::isSpclChar($gradeName);
		$errDescr		= commonClass::isSpclChar($Description);		
		$errUpdatedBy	= commonClass::isSpclChar($updatedBy);		
		if($errAction == 0 && $errLocId == 0 && $errName == 0 && $errDescr == 0 && $errUpdatedBy == 0 )
		{
			$gradeResult= commonClass::ExecuteQuery($gradeSql);
			return $gradeResult;
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	//=========== function to Read  grade =#####BY######Rasmi Ranjan Swain##ON####18/09/2013 ================
	public function readGrade($id)
	{
		$intLocId		= 0;		
		$strGradeName	= '';
		$strDesc		= '';				
		$result			= $this->manageGrade('R',$id,0,'','',0);
		if(commonClass::NumRow($result)>0)
		{
			$row			= mysqli_fetch_array($result);
			$intLocId		= $row['VCH_LOC_ID'];
			$strGradeName	= $row['VCH_GRADE_NAME'];
			$strDesc		= $row['VCH_DES'];				
		}
		$arrResult	= array('location'=>$intLocId, 'GradeName'=>$strGradeName, 'description'=>$strDesc);
		return $arrResult;
	}
	
	//=========== function to Add/Update Grade =#####BY######Rasmi Ranjan Swain##ON####17/09/2013 ================
	public function addUpadateGrade($id)
	{
		$userId			= $_SESSION['adminConsole_userID'];
		$ddllocationId	= $_POST['selLocation'];
		$txtGradeName	= $_POST['txtGradeName'];
		$txtDescription	= $_POST['txtDescription'];	
		$outMsg			= '';	
		$flag			= ($id!=0)?1:0;
		$action			= ($id==0)?'A':'U';
		$location		= '';
		 for($i=0;$i<count($ddllocationId);$i++)
		{
			$location	.= $ddllocationId[$i].',';
			if($ddllocationId[0]=='All')
				break;
		}
		
		$location	= substr($location, 0, -1);
		
		$dupResult		= $this->manageGrade('C',$id,'',$txtGradeName,'',0,0);
			if($dupResult)
			{
				$numRow	= mysqli_fetch_array($dupResult);
				if($numRow>0)
				{
					$flag		= 2;
					$outMsg		= 'Grade name already exists';
				}
				
				else
				{
					$result			= $this->manageGrade($action,$id,$location,$txtGradeName,$txtDescription,$userId);
				if($result)
				$outMsg		= ($action=='A')?'Grade Details added successfully':'Grade Details updated successfully';			
				}
			}
			
		$intLocId		= ($flag==1 || $flag==2)?$location:0;
		$strGradeName	= ($flag==1 || $flag==2)?$txtGradeName:'';
		$strDesc		= ($flag==1 || $flag==2)?$txtDescription:'';			
		$arrResult	= array('msg'=>$outMsg, 'flag'=>$flag, 'loc'=>$intLocId, 'grdgName'=>$strGradeName, 'description'=>$strDesc);
		return $arrResult;
	}
	
	//=========== function to Delete Grade =#####BY######Rasmi Ranjan Swain##ON####17/09/2013 ================
	public function deletegrade($qs,$id)
	{
		$userId		= $_SESSION['adminConsole_userID'];
		$intID		= explode(',',$id);
		$pass		= 0;
		$fail		= 0;
		$action		= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];			
			$result		= $this->manageGrade($action, $indvidualID, '0','', '', $userId);
			$msg		= '';
			if($result && $action=='D')
			{
				$row	= mysqli_fetch_array($result);
				$success= $row[0];
				if($success==0)
					$fail++;
				else
					$pass++;
			}
		}
		if($action=='D')
		{
			if($pass>0)
				$msg	.= 'Grades(s) deleted successfully';
			if($fail>0)
				$msg	.= $fail.' Grades(s) have employee and can not deleted.';
		}
		
		return $msg;
	}	
	
	//=========== function to check Hierirchy Location =#####BY######Rasmi Ranjan Swain##ON####21/09/2013 ================
	public function fillHierichyLocation($selVal)
	{
	    $viewLocationSql	= "CALL USP_ADMIN_HIERARCHY('V','0','', '', '0','0',@OUT)";
		$result				= commonClass::FillDropdown($viewLocationSql,$selVal);
		return $result;
	}
	
	//=========== function to manage  User ### By Sunil Kumar Parida ### ON 01/10/2013 ===============
	public function manageUser($action, $uId, $fullName, $gender, $birthDate, $qualification, $specillisation, $hobby, $image, $offPhNo, $mobileNo, $email, $address, $hierarchyId, $phyLocation, $empType, $offType, $doj, $probationDate, $desgId, $gradeId, $previlege, $attendance, $payRoll, $epf, $userName, $password, $domainName, $status, $slno, $primaryRa, $secondaryRa, $optionalRa, $raCheck, $passCheck,  $updatedBy, $exEmployee,$groupID)
	{	 
		$path                   = commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errUserId		= commonClass::isSpclChar($uId);

		$errFullName	= commonClass::isSpclChar($fullName);
                //$errShortName	= commonClass::isSpclChar($shrtName);
		$errGender		= commonClass::isSpclChar($gender);	
		$errBirthDate           = commonClass::isSpclChar($birthDate);	
		$errQualific	        = commonClass::isSpclChar($qulification);	
		$errSpecializ	        = commonClass::isSpclChar($specillisation);	
		$errHobby		= commonClass::isSpclChar($hobby);	
		$errImage		= commonClass::isSpclChar($image);			
		$errPhNo		= commonClass::isSpclChar($offPhNo);	
		$errMobile		= commonClass::isSpclChar($mobileNo);
		$errEmail		= commonClass::isSpclChar($email);
		$errHierarchyId	= commonClass::isSpclChar($hierarchyId);
		$errPHLocId		= commonClass::isSpclChar($phyLocation);			
		$errEmpType		= commonClass::isSpclChar($empType);
		$errOffType		= commonClass::isSpclChar($offType);
		$errJoinDate	= commonClass::isSpclChar($doj);
		$errProbDate	= commonClass::isSpclChar($probationDate);
		$errDesgId		= commonClass::isSpclChar($desgId);
		$errGradeId		= commonClass::isSpclChar($gradeId);
		$errPrevilege	= commonClass::isSpclChar($previlege);
		$errAttendance	= commonClass::isSpclChar($attendance);
		$errPayRoll		= commonClass::isSpclChar($payRoll);
		$errEPF			= commonClass::isSpclChar($epf);
		$errUserName	= commonClass::isSpclChar($userName);
		$errPassword	= commonClass::isSpclChar($password);
		$errDomain		= commonClass::isSpclChar($domainName);
		$errStatus		= commonClass::isSpclChar($status);
		$errSLNo		= commonClass::isSpclChar($slno);
		$errPrimaryRA	= commonClass::isSpclChar($primaryRa);
		$errSecondaryRA	= commonClass::isSpclChar($secondaryRa);
		$errOptionalRA	= commonClass::isSpclChar($optionalRa);
		$errRACheck		= commonClass::isSpclChar($raCheck);
		$errPassCheck	= commonClass::isSpclChar($passCheck);
		$errGrpId		= commonClass::isSpclChar($groupID);	
		if($errAction == 0 && $errUserId == 0 && $errFullName == 0 && $errGender == 0 && $errBirthDate == 0 && $errQualific == 0 && $errSpecializ == 0 && $errHobby == 0 && $errImage == 0 && $errPhNo == 0 && $errMobile == 0 && $errEmail == 0 && $errHierarchyId == 0 &&$errPHLocId  == 0 && $errEmpType == 0 && $errOffType == 0 && $errJoinDate == 0 && $errProbDate == 0 && $errDesgId == 0 && $errGradeId == 0 && $errPrevilege == 0 && $errAttendance == 0 && $errPayRoll == 0 && $errEPF == 0 && $errUserName == 0 && $errPassword == 0 && $errDomain == 0 && $errStatus == 0 && $errSLNo == 0 && $errPrimaryRA == 0 && $errSecondaryRA == 0 && $errOptionalRA == 0 && $errRACheck == 0 && $errPassCheck == 0 && $errGrpId == 0 )	
		{	
                   // echo $action.'==='.$primaryRa;//exit;
			$userSql	= "CALL USP_ADMIN_USER('$action', '$uId', '$fullName', '$gender', '$birthDate', '$qualification', '$specillisation', '$hobby', '$image', '$offPhNo', '$mobileNo', '$email', '$address', '$hierarchyId', '$phyLocation', '$empType', '$offType', '$doj', '$probationDate', '$desgId', '$gradeId', '$previlege', '$attendance', '$payRoll', '$epf', '$userName', '$password', '$domainName', '$status', '$slno', '$primaryRa', '$secondaryRa', '$optionalRa', '$raCheck', '$passCheck', '$updatedBy', '$exEmployee','$groupID','','','','','', @OUT);";
			//if($action=='A'){echo $userSql.'<br />';exit;}
			$userResult= commonClass::ExecuteQuery($userSql);
			return $userResult;		
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	//=========== function to add update user === By Sunil Kumar Parida On 05/10/2013 ================
	public function addUpdateuser($id,$gradeTbl,$groupTbl)
	{	
            
                
    
		$xmlFullName			= 1;
                //$xmlShortName                   =1;
		$xmlGender				= 1;
		$xmlDOB					= 1;
		$xmlQualification		= 1;
		$xmlSpecialization		= 1;
		$xmlHobby				= 1;
		$xmlPhoto				= 1;
		$xmlPhNo				= 1;
		$xmlMobNo				= 1;
		$xmlEmail				= 1;
		$xmlAddress				= 1;
		$xmlLocation			= 1;
		$xmlPhyLoc				= 1;
		$xmlEmpType				= 1;
		$xmlDOJ					= 1;
		$xmlProbDate			= 1;
		$xmlDesg				= 1;
		$xmlPrivilege			= 1;
		$xmlLogin				= 1;
		$xmlRA					= 1;
		//============ Get customize form controls from xml file================
		if(file_exists("../xml/userControls.xml"))
		{
			$xml = file_get_contents ("../xml/userControls.xml");
			$xml_nodes 				= new SimpleXMLElement($xml);
			$xmlFullName			= $xml_nodes->xpath('//USER_CONTROLS/FULL_NAME');
                        //$xmlShortName			= $xml_nodes->xpath('//USER_CONTROLS/SHORT_NAME');
			$xmlGender				= $xml_nodes->xpath('//USER_CONTROLS/GENDER');
			$xmlDOB					= $xml_nodes->xpath('//USER_CONTROLS/DOB');
			$xmlQualification		= $xml_nodes->xpath('//USER_CONTROLS/QUALIFICATION');
			$xmlSpecialization		= $xml_nodes->xpath('//USER_CONTROLS/SPECIALIZATION');
			$xmlHobby				= $xml_nodes->xpath('//USER_CONTROLS/HOBBY');
			$xmlPhoto				= $xml_nodes->xpath('//USER_CONTROLS/PHOTO');
			$xmlPhNo				= $xml_nodes->xpath('//USER_CONTROLS/PH_NO');
			$xmlMobNo				= $xml_nodes->xpath('//USER_CONTROLS/MOB_NO');
			$xmlEmail				= $xml_nodes->xpath('//USER_CONTROLS/EMAIL');
			$xmlAddress				= $xml_nodes->xpath('//USER_CONTROLS/ADDRESS');
			$xmlLocation			= $xml_nodes->xpath('//USER_CONTROLS/LOCATION');
			$xmlPhyLoc				= $xml_nodes->xpath('//USER_CONTROLS/PHY_LOC');
			$xmlEmpType				= $xml_nodes->xpath('//USER_CONTROLS/EMP_TYPE');
			$xmlDOJ					= $xml_nodes->xpath('//USER_CONTROLS/DOJ');
			$xmlProbDate			= $xml_nodes->xpath('//USER_CONTROLS/PROB_DATE');
			$xmlDesg				= $xml_nodes->xpath('//USER_CONTROLS/DESG');
			$xmlPrivilege			= $xml_nodes->xpath('//USER_CONTROLS/PRIVILEGE');
			$xmlLogin				= $xml_nodes->xpath('//USER_CONTROLS/LOGIN');
			$xmlRA					= $xml_nodes->xpath('//USER_CONTROLS/RA');
			$xmlFullName			= $xmlFullName[0];
                        //$xmlShortName			= $xmlShortName[0];
			$xmlGender				= $xmlGender[0];
			$xmlDOB					= $xmlDOB[0];
			$xmlQualification		= $xmlQualification[0];
			$xmlSpecialization		= $xmlSpecialization[0];
			$xmlHobby				= $xmlHobby[0];
			$xmlPhoto				= $xmlPhoto[0];
			$xmlPhNo				= $xmlPhNo[0];
			$xmlMobNo				= $xmlMobNo[0];
			$xmlEmail				= $xmlEmail[0];
			$xmlAddress				= $xmlAddress[0];
			$xmlLocation			= $xmlLocation[0];
			$xmlPhyLoc				= $xmlPhyLoc[0];
			$xmlEmpType				= $xmlEmpType[0];
			$xmlDOJ					= $xmlDOJ[0];
			$xmlProbDate			= $xmlProbDate[0];
			$xmlDesg				= $xmlDesg[0];
			$xmlPrivilege			= $xmlPrivilege[0];
			$xmlLogin				= $xmlLogin[0];
			$xmlRA					= $xmlRA[0];		
		}
		$folderPath				= "../uploadDocuments/UserImage/";
		$userId					= $_SESSION['adminConsole_userID'];
		$txtName				= ($xmlFullName==1)?$_POST['txtName']:'';
                //$txtSName				= ($_POST['txtSName']!='')?$_POST['txtSName']:'';
                //echo $txtSName;exit;
		$radGender				= ($xmlGender==1)?$_POST['radGender']:0;			
		$txtBirthDate			= ($xmlDOB==1)?$_POST['ddlYY'] . '-' . $_POST['ddlMM'] . '-' . $_POST['ddlDD']:'0000-00-00';		
		$txtQualification		= ($xmlQualification==1)?$_POST['txtQualification']:'';
		$txtSpecialisation		= ($xmlSpecialization==1)?$_POST['txtSpecialisation']:'';
                // Hobby is used for Short Name
		$txtHobby			= ($_POST['txtSName']!='')?$_POST['txtSName']:'';
		$txtImageFile			= $_FILES['FileImage']['name'];
		$imgTemp			= $_FILES['FileImage']['tmp_name'];
		$prevImageFile			= $_POST['hdnImageFile'];
		$txtPhNo			= ($xmlPhNo==1)?$_POST['txtOffPh'].'/'.$_POST['txtExtn']:'';
		$txtMobileNo			= ($xmlMobNo==1)?$_POST['txtMobile']:'';
                
		$txtEmail			= ($xmlEmail==1)?$_POST['txtEmail']:''; 
		$txtAddress			= ($xmlAddress==1)?$_POST['txtAddress']:''; 
		$hierarchyId			= ($xmlLocation==1)?$_POST['hdnNo']:0; 
		$phyLocationId			= ($_POST['selphyLoc']>0)?$_POST['selphyLoc']:0; 
		$groupID			= ($groupTbl>0)?$_POST['selGroup']:0; 
		$ddlEmpType			= ($xmlEmpType==1)?$_POST['selempType']:0;
		$txtJoinDate			= ($_POST['txtDoj']!='')?commonClass::dbDateFormat($_POST['txtDoj']):'';
		$txtJoinDate			= ($xmlDOJ==1)?$txtJoinDate:'0000-00-00';
		$txtProbotionDate		= ($_POST['txtProbation']!='')?commonClass::dbDateFormat($_POST['txtProbation']):'';
		$txtProbotionDate		= ($xmlProbDate==1)?$txtProbotionDate:'0000-00-00';
		$ddlDesignation			= ($xmlDesg==1)?$_POST['selDesignation']:0;
		$ddlGrade			= ($gradeTbl>0)?$_POST['selGrade']:0;
		$chkPrivilege			= ($_POST['chkPrivilege']==1)?1:2;
		$chkAttendance			= ($_POST['chkAttendance']==1)?1:2;
		$chkPayroll			= ($_POST['chkPayroll']==1)?1:2;
		$radEPF				= ($_POST['chkOfcPrivilege']==1)?1:0;//($chkPayroll==1)?$_POST['radEPF']:'0';
		$txtUserName			= ($xmlLogin==1)?$_POST['txtUser']:''; 		
		$txtConfirmpass			= ($xmlLogin==1)?$_POST['txtConfirmPwd']:''; 
		$encrypted_cpass		= ($xmlLogin==1)?md5($txtConfirmpass):'';		
		$domainName				= ($xmlLogin==1)?$_POST['txtDomainUserName']:''; 	
		$checkRA				= ($xmlRA==1)?$_POST['chkAuthority']:0;
		$status					= $_POST['hdnStatus'];
		$intSLNo				= $_POST['hdnSLNo'];
				$selAccessType                          = $_POST['selAccessType'];
				$selRange                          = (isset($_POST['selRange']))?$_POST['selRange']:0;
               // echo $_POST['selAccessType'];exit;
		if($checkRA==1)			
		{
			$primaryRA			= ($_POST['hdnPrimaryRa']!='')?$_POST['hdnPrimaryRa']:0;
			$secondaryRA                    = ($_POST['hdnSecondaryRa']!='')?$_POST['hdnSecondaryRa']:0;
			$optionalRA			= ($_POST['hdnOptionalRa']!='')?$_POST['hdnOptionalRa']:0;
		}
		else
		{
			$checkRA			= 0;
			$primaryRA			= 0;
			$secondaryRA                    = 0;
			$optionalRA			= 0;
		}	
		$image			= $txtImageFile;
		if($id>0)		
			$image		= ($txtImageFile=='')?$prevImageFile:$txtImageFile;				
		$action			= ($id>0)?'U':'A';
		$flag			= ($id>0)?1:0;
		$primaryRA              = $selAccessType;
		$addUpdateResult= $this->manageUser($action, $id, $txtName, $radGender, $txtBirthDate, $txtQualification, $txtSpecialisation, $txtHobby, $image, $txtPhNo, $txtMobileNo, $txtEmail, $txtAddress, $hierarchyId, $phyLocationId, $ddlEmpType, 0, $txtJoinDate, $txtProbotionDate, $ddlDesignation, $ddlGrade, $chkPrivilege, $chkAttendance, $chkPayroll, $radEPF, $txtUserName, $encrypted_cpass, $domainName, $status, $intSLNo, $primaryRA, $secondaryRA, $optionalRA, $checkRA, 0,$userId,1,$selRange);
		
                //exit;
                
		if(file_exists($folderPath.$prevImageFile) && $prevImageFile!='' && !empty($_SESSION['adminConsole_UserName']))
			unlink($folderPath.$prevImageFile);	
		if($txtImageFile!='' && !empty($_SESSION['adminConsole_UserName']))
                    
	        $fileMsg=commonClass::GetResizeImage('FileImage',$folderPath,100);
                if($fileMsg==0){
                    
                    if($addUpdateResult)
                    {

                            if($action=='A')
                            
                                    $msg	= "User Added successfully";
                                    //echo $msg;exit;

                            else if($action=='U')
                                    $msg	= "User Updated successfully";
                    }
               }else{
                   
                     if($action=='A')
                            {
                                    $msg	= "User Added successfully. Error in Image Uploading";

                            }
                            else if($action=='U')
                                    $msg	= "User Updated successfully. Error in Image Uploading";
                   
               }
		$arrResult	= array('msg'=>$msg, 'flag'=>$flag, 'txtName'=>$txtName, 'radGender'=>$radGender, 'birthDate'=>$txtBirthDate, 'qualification'=>$txtQualification,'specialisation'=>$txtSpecialisation, 'hobby'=>$txtHobby, 'image'=>$image, 'offPhNo'=>$txtPhNo, 'mobileNo'=>$txtMobileNo, 'email'=>$txtEmail,'address'=>$txtAddress, 'hierarchyId'=>$hierarchyId, 'phyLocationId'=>$phyLocationId, 'empType'=>$ddlEmpType, 'joinDate'=>$txtJoinDate, 'probotionDate'=>$txtProbotionDate,'designation'=>$ddlDesignation, 'grade'=>$ddlGrade, 'privilege'=>$chkPrivilege, 'attendance'=>$chkAttendance, 'payroll'=>$chkPayroll, 'EPF'=>$radEPF,'userName'=>$txtUserName, 'domainName'=>$domainName, 'status'=>$status, 'primaryRA'=>$primaryRA, 'secondaryRA'=>$secondaryRA, 'optionalRA'=>$optionalRA, 'checkRA'=>$checkRA,'groupID'=>$groupID);
		//print_r($arrResult);exit;
                return $arrResult;
               
	}
	
	//=========== function to get user serial number === By Sunil Kumar Parida On 05/10/2013 =====
	function getUserSlNo()
	{
		$maxSLResult	= $this->manageUser('GM', '0', '', '0', '0000-00-00', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0',  '0','1','0');
		$maxSLRow		= mysqli_fetch_array($maxSLResult);
		$maxSlNo		= ($maxSLRow['MAX_SL']>0)?$maxSLRow['MAX_SL']:1;
		return $maxSlNo;
	}
	
	//=========== function to fill user drop down === By Sunil Kumar Parida On 05/10/2013 =============
	public function fillUserDrp($userId,$hierarchyId,$selVal)
	{		
		$userResult	= $this->manageUser('F', $userId, '', '0', '0000-00-00', '', '', '', '', '', '', '', '', $hierarchyId, '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0',  '0','1','0');
		$opt		= '<option value="0">--Select--</option>';
		if(mysqli_num_rows($userResult)>0)
		{							
			while($row	= mysqli_fetch_array($userResult))
			{
				$userId			= $row["INT_USER_ID"];
				$designation	= $row["DESIGNATION_NAME"];
				$userName		= $row["VCH_FULL_NAME"];
				$select			= ($userId==$selVal)?'selected="selected"':'';	
				$opt .= '<option value="'.$userId.'" title="'.$userName.' ('.$designation.')" '.$select.'>'.$userName.' ('.$designation.')</option>';
			}				
		}
		return $opt;
	}

        
        //===== function to fill user drop down for demography Mapping === By Ashok Kumar Samal::On 7/9/2016======
	public function fillUserDrp1($userId,$hierarchyId,$selVal)
	{		
		//$userResult	= $this->manageUser('DU', $userId, '','','', '0', '0000-00-00', '','','', '', '', '', '', '', '', '', $hierarchyId, '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0',  '0','1','0');
		$userResult	= $this->manageUser('DU', $userId, '', '0', '0000-00-00', '', '', '', '', '', '', '', '', $hierarchyId, '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0',  '0','1','0');
                //echo $selVal.'hhhhhhhh';
                $opt		= '<option value="0">--Select--</option>';
		if(mysqli_num_rows($userResult)>0)
		{							
			while($row	= mysqli_fetch_array($userResult))
			{//print_r($row);exit;
				$userId			= $row["INT_USER_ID"];
				$designation            = $row["DESIGNATION_NAME"];
				$userName		= $row["VCH_FULL_NAME"];
				$desigId                = $row["DESIGNATION_ID"];
				$select			= ($userId==$selVal)?'selected="selected"':'';	
				$opt .= '<option data-val="'.$userName.'" value="'.$userId.'_'.$desigId.'" title="'.$userName.' ('.$designation.')" '.$select.'>'.$userName.' ('.$designation.')</option>';
			}				
		}
		return $opt;
	}
	


	function getUserNumbers()
	{
		$getResult	= $this->manageUser('GT', '0', '', '0', '0000-00-00', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0',  '0','0','0');
		$getRow		= mysqli_fetch_array($getResult);
		return $getRow;
	}
	
	// ========== Function to delete,active,inactive and make ex employee user === By Sunil Kumar Parida On 07/10/2013 =====
	public function userAction($qs,$id)
	{
		$sessUserId		= $_SESSION['adminConsole_userID'];
		$intID			= explode(',',$id);
		$pass			= 0;
		$fail			= 0;
		$action			= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];	
			$slNumber	= 0;
			//====== update serial number =======	
			if($action=='US')
			{
				$slNumber	= $_POST['txtSlNo'.$indvidualID];
			}		
			$result		= $this->manageUser($action, $indvidualID, '', '0', '0000-00-00', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', $slNumber, '0', '0', '0', '0', '0',  $sessUserId,'0','0');
			$msg		= '';
			if($result && $action=='EX')
			{
				$row	= mysqli_fetch_array($result);
				$success= $row[0];
				if($success==0)
					$fail++;
				else
					$pass++;
			}
		}
		
		if($action=='D')
				$msg	= 'Record(s) deleted successfully';	
						
		if($action=='EX')	
		{	
			if($pass>0)
				$msg	= 'User(s) became ex-employee successfully';
			if($fail>0)
				$msg	.= $fail.' User(s) are assigned as administrator of location(s). \nRemove them as administrator before making ex-employee.';
		}		
				
		if($action=='AC')		
			$msg	= 'User(s) Acivated successfully';	
					
		if($action=='IN')		
			$msg	= 'User(s) inactived successfully';
			
		if($action=='US')		
			$msg	= 'Serial number updated successfully';	
		if($action=='ER')		
			$msg	= 'Roaming Access Acivated for the user';
		if($action=='DR')		
			$msg	= 'Roaming Access Deacivated for the user';	
			
		return $msg;
	}
	
	//=========== Function to manage assign admin ==== By Sunil Kumar Parida On 09/10/2013 =====
	public function manageAssignAdmin($action, $locationId, $userId, $updatedBy)
	{
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errLocId		= commonClass::isSpclChar($locationId);
		$errUserId		= commonClass::isSpclChar($userId);
		$errUpdatedBy	= commonClass::isSpclChar($updatedBy);	
		if($errAction == 0 && $errLocId == 0 && $errUserId == 0 && $errUpdatedBy == 0)	
		{
			$adminSql	= "CALL USP_ADMIN_ASSIGN('$action', 0, '$locationId', '$userId', '$updatedBy', @OUT);";
			$adminResult= commonClass::ExecuteQuery($adminSql);
			return $adminResult;
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	//=========== Function to assign admin ==== By Sunil Kumar Parida On 09/10/2013 =====
	public function assignAdmin()
	{
		$sessUserId		= $_SESSION['adminConsole_userID'];
		$ddllocationId	= $_POST['selphyLoc'];
		$intUserId		= $_POST['selUsers'];
		$result			= $this->manageAssignAdmin('A', $ddllocationId, $intUserId, $sessUserId);
		if($result)
			$msg		= 'Admin assigned successfully';
		$arr_msg		= array('msg'=>$msg,'loc'=>$ddllocationId,'uId'=>$intUserId);
		return $arr_msg;
	}
	
	/*=========== function to manage Group ===============
		By				: Rasmi Ranjan Swain
		ON				: 05/Nov/2013
		Procedure Used 	: USP_GROUP_MASTER
	=======================================================*/
	public function manageGroup($action,$groupID,$groupName,$groupAliasName,$description,$Type,$updatedBy)
	{
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errGrpId		= commonClass::isSpclChar($groupID);
		$errGrpName		= commonClass::isSpclChar($groupName);
		$errAlias		= commonClass::isSpclChar($groupAliasName);
		$errDescr		= commonClass::isSpclChar($description);
		$errType		= commonClass::isSpclChar($Type);
		$errUpdatedBy           = commonClass::isSpclChar($updatedBy);
                $groupName              = htmlspecialchars($groupName, ENT_QUOTES);
                $groupAliasName         = htmlspecialchars($groupAliasName, ENT_QUOTES);
                $description            = htmlspecialchars($description, ENT_QUOTES);
                $Type                   = htmlspecialchars($Type, ENT_QUOTES);
		if($errAction == 0 && $errGrpId == 0 && $errGrpName == 0 && $errAlias == 0 && $errDescr == 0 && $errType == 0 && $errUpdatedBy == 0 )	
		{
		$groupSql	= "CALL USP_GROUP_MASTER('$action',$groupID,'$groupName','$groupAliasName', '$description','$Type','$updatedBy', @OUT);";
		
		$groupResult = commonClass::ExecuteQuery($groupSql);
		return $groupResult;	
		}
		else
		{
                    
			header("Location: ".$path."../home");
                        exit;
		}
	}
	
	/*=========== function to add Group ==================
	By				: Rasmi Ranjan Swain
	ON				: 05/Nov/2013
	Function Used 	: manageGroup()
	=======================================================*/
	public function addUpdateGroup($id)
	{
		$userId				= $_SESSION['adminConsole_userID'];		
		$txtgroupName                   = $_POST['txtGroupName'];
		$txtGroupAliasName              = $_POST['txtGroupAliasName'];
		$txtDescription                 = $_POST['txtDescription'];		
		$outMsg				= '';		
			
		$flag			= ($id!=0)?1:0;
		$action			= ($id==0)?'A':'U';
		$dupResult		= $this->manageGroup('C',$id,$txtgroupName,'','','0',0);
		if($dupResult)
		{
			$numRow	= mysqli_num_rows($dupResult);
			if($numRow>0)
			{
				$flag		= 2;
				$outMsg		= 'Group name already exists';
			}
			
			else
			{
				$result			= $this->manageGroup($action,$id,$txtgroupName,$txtGroupAliasName, $txtDescription,1,$userId);
				if($result)
					$outMsg		= ($action=='A')?'Group Details added successfully':'Group Details updated successfully';			
			}
		}
		
		$strGroupName		= ($flag==1 || $flag==2)?$txtgroupName:'';
		$strDescription		= ($flag==1 || $flag==2)?$txtDescription:'';
		$strGroupAliasName	= ($flag==1 || $flag==2)?$txtGroupAliasName:'';			
		$arrResult	= array('msg'=>$outMsg, 'flag'=>$flag,'groupName'=>$strGroupName,'aliasName'=>$strGroupAliasName, 'description'=>$strdesc);
		return $arrResult;
	}
	
	/*=========== function to Update Group ==================
	By				: Rasmi Ranjan Swain
	ON				: 06/Nov/2013
	Function Used 	: manageGroup()
	=======================================================*/
	function updateGroup($id)
	{		
		$userId				= $_SESSION['adminConsole_userID'];	
		$txtgroupName		= $_REQUEST['txtgroupName'.$id];
		$txtGroupAliasName	= $_REQUEST['txtgroupAliasName'.$id];
		$txtDescription		= $_REQUEST['txtDescription'.$id];	
		$outMsg				= '';		
		
			
		$outMsg				= '';
		$flag				= 0;
		$dupResult		= $this->manageGroup('C',$id,$txtgroupName,'','','0',0);
		if($dupResult)
		{
			$numRow	= mysqli_num_rows($dupResult);
			if($numRow>0)
			{
				$outMsg		= 'Group name already exists';
				$flag		= 1;
			}
			else
			{
				$result			= $this->manageGroup('U',$id,$txtgroupName,$txtGroupAliasName, $txtDescription,1,$userId);
				if($result)
			$outMsg		= 'Group Details updated successfully';
			}
		}		
		
		return $outMsg;
	}
	
	/*=========== function to Read  Group ==================
	By				: Rasmi Ranjan Swain
	ON				: 05/Nov/2013
	Function Used 	: manageGroup()
	=======================================================*/	
	public function readGroup($id)
	{		
		$strGroupName	= '';		
		$strDescription = '';		
		$result			= $this->manageGroup('R',$id,'','','','0',0);
		if(commonClass::NumRow($result)>0)
		{
			$row				= mysqli_fetch_array($result);			
			$strGroupName		= $row['VCH_GROUP_NAME'];
			$strDescription		= $row['VCH_DESCRIPTION'];
			$strGroupAliasName	= $row['VCH_ALIAS_NAME'];
		}
		$arrResult	= array('groupName'=>$strGroupName,'aliasName'=>$strGroupAliasName,'description'=>$strDescription);
		return $arrResult;
	}
	
	/*=========== function to fill working group ==================
	By				: Rasmi Ranjan Swain
	ON				: 05/Nov/2013
	Function Used 	: FillDropdown()
	procedure Used  : USP_GROUP_MASTER
	=======================================================*/
	public function fillGroup($selVal)
	{
		$fillGroupSql	= "CALL USP_GROUP_MASTER('F', '0','','','', '1','0', @OUT)";		
		$result				= commonClass::FillDropdown($fillGroupSql,$selVal);
		return $result;
	}
	
	/*==========Function to acitve/inactive/delete group ===================	
	By				: Rasmi Ranjan Swain
	ON				: 05/Nov/2013
	Function Used 	: manageGroup()
	=======================================================*/
	public function groupAction($qs,$id)
	{
		$sessUserId		= $_SESSION['adminConsole_userID'];
		$intID			= explode(',',$id);
		$pass			= 0;
		$fail			= 0;
		$action			= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];			
			$result		= $this->manageGroup($action,$indvidualID,'','','','0',0);		
			
			$msg		= '';
			if($result && $action=='IN')
			{
				$row	= mysqli_fetch_array($result);
				$success= $row[0];
				if($success==0)
					$fail++;
				else
					$pass++;
			}
			if($result && $action=='D')
			{
				$row	= mysqli_fetch_array($result);
				$success= $row[0];
				if($success==0)
					$fail++;
				else
					$pass++;
			}
		}	
		if($action=='D')	
		{	
			if($pass>0)
				$msg	= 'Group(s) deleted successfully';
			if($fail>0)
				$msg	.= $fail.' Group(s) Contains User(s). \nRemove them  before Delete.';
		}		
				
		if($action=='AC')		
			$msg	= 'Group(s) activated successfully';	
					
		if($action=='IN')
		{	
			if($pass>0)
				$msg	= 'Group(s) Inactived successfully';
			if($fail>0)
				$msg	.= $fail.' Group(s) Contains User(s). \nRemove them  before Inactive.';
				
		}
			
		return $msg;
	}
		
	/*==========Function to Update group In user ===================	
	By				: Rasmi Ranjan Swain
	ON				: 05/Nov/2013
	Function Used 	: manageGroup()
	=======================================================*/
	public function updateUserGroup($qs,$id)
	{
		$sessUserId		= $_SESSION['adminConsole_userID'];
		$intID			= explode(',',$id);
		$pass			= 0;
		$fail			= 0;
		$action			= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID	= $intID[$i];
			$groupID		= $_POST['ddlGroup'.$indvidualID];
			
			$result		= $this->manageUser($action, $indvidualID, '', '0', '0000-00-00', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0',0, '0', '0', '0', '0', '0',$sessUserId,'0',$groupID);				
			$msg		= '';
		}
		if($action=='UG')		
		$msg	= 'Group(s) Updated successfully';
		return $msg;	
	}
	
}
?>
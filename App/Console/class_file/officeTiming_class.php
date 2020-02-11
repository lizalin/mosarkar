<?php
/*============================================================
Page Name		:	officeTiming_class.php
Description		:	Class for managing Office timing module
Created By		:	Sunil Kumar Parida
Created On		:	10-sept-2013
Update History	:
<Updated by>		<Updated On>		<Remarks>
Sunil Kumar Parida  15-Oct-2013			Create function for manage office timing

Functions Used	:	connectToDatabase();closeConnection();
==============================================================*/
if(file_exists('../config.php'))
	include('../config.php');
include_once(ABSPATH."/includes/sessioncheck.php");
class offTiming extends commonClass
{		
	//=========== function to manage Shift master === By Sunil Kumar Parida On 10/10/2013 =============
	public function manageShiftMaster($action, $shiftId, $locationId, $shiftName, $description, $shiftType, $default, $updatedBy)
	{
		$shiftSql		= "CALL USP_ADMIN_SHIFT_MASTER('$action', '$shiftId', '$locationId', '$shiftName', '$description', '$shiftType', '$default', '$updatedBy', @OUT);";
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errShiftId		= commonClass::isSpclChar($shiftId);
		$errLocId		= commonClass::isSpclChar($locationId);
		$errShiftName	= commonClass::isSpclChar($shiftName);
		$errDescr		= commonClass::isSpclChar($description);
		$errType		= commonClass::isSpclChar($shiftType);		
		$errDefault		= commonClass::isSpclChar($default);		
		$errUpdatedBy	= commonClass::isSpclChar($updatedBy);	
		if($errAction == 0 && $errShiftId == 0 && $errLocId == 0 && $errShiftName == 0 && $errDescr==0 && $errType == 0 && $errDefault == 0 && $errUpdatedBy == 0)	
		{
			$shiftResult	= commonClass::ExecuteQuery($shiftSql);
			return $shiftResult;	
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
		
	//=========== function to fill shift according to location  === By Sunil Kumar Parida On 15/10/2013 =============
	public function fillShiftMaster($locationId, $selectedVal)
	{
		$shiftSql		= "CALL USP_ADMIN_SHIFT_MASTER('F', '0', '$locationId', '', '', '0', '0', '0', @OUT);";
		$shiftOption	= commonClass::FillDropdown($shiftSql,$selectedVal);
		return $shiftOption;
	}
	
	//=========== function to add Shift master === By Sunil Kumar Parida On 10/10/2013 =============
	public function addUpdateShift($id)
	{
		$sessUserId		= $_SESSION['adminConsole_userID'];
		$ddlLocation	= $_POST['selLocation'];
		$txtShiftName	= $_POST['txtShift'];
		$txtDesc		= $_POST['txtDescription'];
		$chkCrossShift	= (isset($_POST['chkCrossShift']))?1:0;
		$chkDefault		= (isset($_POST['chkDefault']))?1:0;
		$outMsg			= '';	
		$flag			= ($id!=0)?1:0;
		$action			= ($id==0)?'A':'U';
		if(($ddlLocation==0 || '') || ($txtShiftName==''))
			$outMsg		= 'Enter mandatory fields';
		else
		{
			$dupResult		= $this->manageShiftMaster('CD',$id,$ddlLocation,$txtShiftName,'','0','0','0');
			if($dupResult)
			{
				$numRow	= mysqli_fetch_array($dupResult);
				if($numRow[0]>0)
				{
					$flag		= 2;
					$outMsg		= 'Shift already exists in this location';
				}
				
				else
				{
					$result			= $this->manageShiftMaster($action,$id, $ddlLocation, $txtShiftName, $txtDesc, $chkCrossShift, $chkDefault, $sessUserId);
					if($result)
						$outMsg		= ($action=='A')?'Shift added successfully':'Shift updated successfully';			
				}
			}
		}
		$intLocationId		= ($flag==1 || $flag==2)?$ddlLocation:0;
		$strShiftName		= ($flag==1 || $flag==2)?$txtShiftName:'';		
		$strdesc			= ($flag==1 || $flag==2)?$txtDesc:'';	
		$intCrossShift		= ($flag==1 || $flag==2)?$chkCrossShift:'0';
		$intDefault			= ($flag==1 || $flag==2)?$chkDefault:'0';	
		$arrResult	= array('msg'=>$outMsg, 'flag'=>$flag, 'location'=>$intLocationId, 'shiftName'=>$strShiftName, 'description'=>$strdesc, 'crossShift'=>$intCrossShift, 'default'=>$intDefault);
		return $arrResult;
	}
	
	//=========== function to delete Shift master === By Sunil Kumar Parida On 10/10/2013 =============
	public function deleteShift($qs,$id)
	{
		$userId		= $_SESSION['adminConsole_userID'];
		$intID		= explode(',',$id);
		$pass		= 0;
		$fail		= 0;
		$action		= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];			
			$result		= $this->manageShiftMaster($action, $indvidualID, '0','', '','0', '0', $userId);
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
				$msg	.= $fail.' record(s) have Designation and can not deleted.';
		}
		
		return $msg;
	}	
	
	//=========== function to manage office time === By Sunil Kumar Parida On 15/10/2013 =============
	public function manageOffTime($action, $type, $timingId, $dateFrom, $dateTo, $locationId, $shiftId, $startTime, $graceTime, $recessFrom, $recessTo, $exitTime, $lateExitTime, $extraLateExit, $earlyEntry, $lateEntry, $halfStartTime, $halfEarlyEntry, $halfLateEntry, $halfExitTime, $halfLateExit, $updatedBy)
	{
		$offTimeSql		= "CALL USP_ADMIN_OFFICE_TIME('$action', '$type', '$timingId', '$dateFrom', '$dateTo', '$locationId', '$shiftId',  '$startTime', '$graceTime', '$recessFrom', '$recessTo', '$exitTime', '$lateExitTime', '$extraLateExit', '$earlyEntry', '$lateEntry', '$halfStartTime', '$halfEarlyEntry', '$halfLateEntry', '$halfExitTime', '$halfLateExit', '$updatedBy', @OUT);";
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errType		= commonClass::isSpclChar($type);
		$errTimingId	= commonClass::isSpclChar($timingId);
		$errDateFrom	= commonClass::isSpclChar($dateFrom);
		$errDateTo		= commonClass::isSpclChar($dateTo);
		$errLocId		= commonClass::isSpclChar($locationId);		
		$errShiftId		= commonClass::isSpclChar($shiftId);	
		$errStartTime	= commonClass::isSpclChar($startTime);
		$errGraceTime	= commonClass::isSpclChar($graceTime);
		$errRecessFrom	= commonClass::isSpclChar($recessFrom);
		$errRecessTo	= commonClass::isSpclChar($recessTo);
		$errExitTime	= commonClass::isSpclChar($exitTime);
		$errLateExit	= commonClass::isSpclChar($lateExitTime);
		$errExtraLate	= commonClass::isSpclChar($extraLateExit);
		$errEarlyEntry	= commonClass::isSpclChar($earlyEntry);
		$errlateEntry	= commonClass::isSpclChar($lateEntry);
		$errHWStartTime	= commonClass::isSpclChar($halfStartTime);
		$errHWEarlyEntry= commonClass::isSpclChar($halfEarlyEntry);
		$errHWLateEntry	= commonClass::isSpclChar($halfLateEntry);
		$errHWExitTime	= commonClass::isSpclChar($halfExitTime);
		$errHWLateExit	= commonClass::isSpclChar($halfLateExit);
		$errUpdatedBy	= commonClass::isSpclChar($updatedBy);
		if($errAction == 0 && $errType == 0 && $errTimingId == 0 && $errDateFrom == 0 && $errDateTo == 0 && $errLocId == 0 && $errShiftId == 0 && $errStartTime == 0 && $errGraceTime  == 0 && $errRecessFrom == 0 && $errRecessTo == 0 && $errExitTime == 0 && $errLateExit == 0 && $errExtraLate == 0 && $errEarlyEntry == 0 && $errlateEntry == 0 && $errHWStartTime == 0 && $errHWEarlyEntry == 0 && $errHWLateEntry == 0 && $errHWExitTime == 0 && $errHWLateExit == 0 && $errUpdatedBy == 0 )
		{
			$offTimeResult	= commonClass::ExecuteQuery($offTimeSql);
			return $offTimeResult;		
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	//=========== function to add office time === By Sunil Kumar Parida On 15/10/2013 =============
	public function addUpdateOffTime($type)
	{
		$flag					= 0;		
		$dateFrom				= ($type=='E')?commonClass::dbDateFormat($_REQUEST['txtDateFrom']):'';
		$dateTo					= ($type=='E')?commonClass::dbDateFormat($_REQUEST['txtDateTo']):'';
		$sessUserId				= $_SESSION['adminConsole_userID'];
		$ddlLocationId			= $_REQUEST['selLocation'];
		$ddlShiftId				= $_REQUEST['selshift'];
		$txtStartTime			= $_REQUEST['txtStartTime'];
		$ddlGraceTime			= $_REQUEST['ddlGraceTime'];
		$txtRecessFrom			= $_REQUEST['txtRecessFrom'];
		$txtRecessTo			= $_REQUEST['txtRecessTo'];
		$txtExitTime			= $_REQUEST['txtExitTime'];
		$txtLateExitTime		= $_REQUEST['txtLateExitTime'];
		$txtExtraLateExitTime	= $_REQUEST['txtExtraLateExitTime'];
		$txtEarlyEntry			= $_REQUEST['txtEarlyEntry'];
		$txtLateEntry			= $_REQUEST['txtLateEntry'];
		$chkWeekHalfDay			= $_REQUEST['chkWeekHalfDay'];
		$txtStartTimeWH			= ($chkWeekHalfDay==1)?$_REQUEST['txtStartTimeWH']:'';
		$txtEarlyEntryWH		= ($chkWeekHalfDay==1)?$_REQUEST['txtEarlyEntryWH']:'';
		$txtLateEntryWH			= ($chkWeekHalfDay==1)?$_REQUEST['txtLateEntryWH']:'';
		$txtExitTimeWH			= ($chkWeekHalfDay==1)?$_REQUEST['txtExitTimeWH']:'';
		$txtLateExitTimeWH		= ($chkWeekHalfDay==1)?$_REQUEST['txtLateExitTimeWH']:'';
		if(($ddlLocationId==0 || $ddlLocationId=='') || ($ddlShiftId==0 || $ddlShiftId==''))
			$outMsg		= 'Enter mandatory fields';
		else
		{
			$result		= $this->manageOffTime('A', $type, '0', $dateFrom, $dateTo, $ddlLocationId, $ddlShiftId, $txtStartTime, $ddlGraceTime, $txtRecessFrom, $txtRecessTo, $txtExitTime, $txtLateExitTime, $txtExtraLateExitTime, $txtEarlyEntry, $txtLateEntry, $txtStartTimeWH, $txtEarlyEntryWH, $txtLateEntryWH, $txtExitTimeWH, $txtLateExitTimeWH, $sessUserId);
			if($result)
			{
				$row		= mysqli_fetch_array($result);
				$rowFlag	= $row[0];
				if($rowFlag==0)
					$outMsg		= 'Office Timing added successfully';
				else if($rowFlag==1)
				{
					$outMsg		= 'Office Timing updated successfully';
					$flag		= 1;
				}
			}
		}
		$arr_val	= array('msg'=>$outMsg,'flag'=>$flag);
		return $arr_val;
	}
	
	//=========== function to delete Office timing === By Sunil Kumar Parida On 16/10/2013 =============
	public function deleteOffTime($qs,$id,$type)
	{
		$userId		= $_SESSION['adminConsole_userID'];
		$intID		= explode(',',$id);
		$pass		= 0;
		$fail		= 0;
		$action		= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];			
			$result		= $this->manageOffTime($action, $type, $indvidualID, '', '', '0', '0', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', $userId);
			$msg		= '';
		}
		if($result)
		{
			if($action=='D')
				$msg	= 'Record(s) deleted successfully';
		}		
		
		return $msg;
	}
	
	//=========== function to manage flexi time === By Sunil Kumar Parida On 22/10/2013 =============
	public function manageFlexiTime($action, $Id, $locId, $hierarchyId, $userId, $phyLocId, $shiftId, $dateFrom, $dateTo, $startTime, $graceTime, $recessFrom, $recessTo, $exitTime, $lateExitTime, $extraLateExit, $earlyEntry, $lateEntry, $halfStartTime, $halfEarlyEntry, $halfLateEntry, $halfExitTime, $halfLateExit, $updatedBy)
	{
		$flexiTimeSql		= "CALL USP_ADMIN_FLEXI_TIME('$action', '$Id', '$locId', '$hierarchyId', '$userId', '$phyLocId', '$shiftId', '$dateFrom', '$dateTo', '$startTime', '$graceTime', '$recessFrom', '$recessTo', '$exitTime', '$lateExitTime', '$extraLateExit', '$earlyEntry', '$lateEntry', '$halfStartTime', '$halfEarlyEntry', '$halfLateEntry', '$halfExitTime', '$halfLateExit', '$updatedBy', @OUT);";
		$path				= commonClass::webPath();
		$errAction			= commonClass::isSpclChar($action);
		$errId				= commonClass::isSpclChar($Id);
		$errLocId			= commonClass::isSpclChar($locId);
		$errHierarchyId		= commonClass::isSpclChar($hierarchyId);
		$errUserId			= commonClass::isSpclChar($userId);
		$errPHLocId			= commonClass::isSpclChar($phyLocId);
		$errShiftId			= commonClass::isSpclChar($shiftId);		
		$errDateFrom		= commonClass::isSpclChar($dateFrom);
		$errDateTo			= commonClass::isSpclChar($dateTo);
		$errStartTime		= commonClass::isSpclChar($startTime);
		$errGraceTime		= commonClass::isSpclChar($graceTime);
		$errRecessFrom		= commonClass::isSpclChar($recessFrom);
		$errRecessTo		= commonClass::isSpclChar($recessTo);
		$errExitTime		= commonClass::isSpclChar($exitTime);
		$errLateExit		= commonClass::isSpclChar($lateExitTime);
		$errExtraLate		= commonClass::isSpclChar($extraLateExit);
		$errEarlyEntry		= commonClass::isSpclChar($earlyEntry);
		$errlateEntry		= commonClass::isSpclChar($lateEntry);
		$errHWStartTime		= commonClass::isSpclChar($halfStartTime);
		$errHWEarlyEntry	= commonClass::isSpclChar($halfEarlyEntry);
		$errHWLateEntry		= commonClass::isSpclChar($halfLateEntry);
		$errHWExitTime		= commonClass::isSpclChar($halfExitTime);
		$errHWLateExit		= commonClass::isSpclChar($halfLateExit);
		$errUpdatedBy		= commonClass::isSpclChar($updatedBy);
		if($errAction == 0 && $errId == 0 && $errLocId == 0 && $errHierarchyId == 0 && $errUserId == 0 && $errPHLocId == 0 &&  $errShiftId == 0 && $errDateFrom == 0 && $errDateTo == 0 && $errStartTime == 0 && $errGraceTime  == 0 && $errRecessFrom == 0 && $errRecessTo == 0 && $errExitTime == 0 && $errLateExit == 0 && $errExtraLate == 0 && $errEarlyEntry == 0 && $errlateEntry == 0 && $errHWStartTime == 0 && $errHWEarlyEntry == 0 && $errHWLateEntry == 0 && $errHWExitTime == 0 && $errHWLateExit == 0 && $errUpdatedBy == 0 )
		{
		$flexiTimeResult	= commonClass::ExecuteQuery($flexiTimeSql);
		return $flexiTimeResult;
		}
		else
		{
			header("Location: ".$path."../home");
		}		
	}
	
	public function readFlexiTime($id)
	{
		$result	= $this->manageFlexiTime('V', $id, 0, 0, 0, 0, 0, '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '0');
		if(commonClass::NumRow($result)>0)
		{
			$row					= mysqli_fetch_array($result);
			$strDateFrom			= commonClass::dbDateFormat($row['DTM_DATE_FROM']);
			$strDateTo				= commonClass::dbDateFormat($row['DTM_DATE_TO']);
			$intLocId				= $row['INT_NODE_ID'];	
			$strHierarchyId			= $row['INT_SUBNODEVAL_ID'];	
			$intUserId				= $row['INT_USER_ID'];	
			$intPhyLoc				= $row['INT_LOC_ID'];
			$intShiftId				= $row['INT_SHIFT_ID'];			
			$strStartTime			= ($row['VCH_START_TIME']!='')?$row['VCH_START_TIME']:'';
			$intGraceTime			= $row['INT_GRACE_TIME'];
			$strRecessFrom			= ($row['VCH_RECESS_FROM']!='')?$row['VCH_RECESS_FROM']:'';
			$strRecessTo			= ($row['VCH_RECESS_TO']!='')?$row['VCH_RECESS_TO']:'';
			$strExitTime			= ($row['VCH_EXIT_TIME']!='')?$row['VCH_EXIT_TIME']:'';
			$strLateExitTime		= ($row['VCH_LATE_EXIT_TIME']!='')?$row['VCH_LATE_EXIT_TIME']:'';
			$strExtraLateExitTime	= ($row['VCH_EXTRA_LATE_EXIT']!='')?$row['VCH_EXTRA_LATE_EXIT']:'';
			$strEarlyEntry			= ($row['VCH_EARLY_ENTRY']!='')?$row['VCH_EARLY_ENTRY']:'';
			$strLateEntry			= ($row['VCH_LATE_ENTRY']!='')?$row['VCH_LATE_ENTRY']:'';			
			$strStartTimeWH			= ($row['VCH_HALF_START_TIME']!='')?$row['VCH_HALF_START_TIME']:'';
			$strEarlyEntryWH		= ($row['VCH_HALF_EARLY_ENTRY']!='')?$row['VCH_HALF_EARLY_ENTRY']:'';
			$strLateEntryWH			= ($row['VCH_HALF_LATE_ENTRY']!='')?$row['VCH_HALF_LATE_ENTRY']:'';
			$strExitTimeWH			= ($row['VCH_HALF_EXIT_TIME']!='')?$row['VCH_HALF_EXIT_TIME']:'';
			$strLateExitTimeWH		= ($row['VCH_HALF_LATE_EXIT']!='')?$row['VCH_HALF_LATE_EXIT']:'';
			if($strStartTimeWH	!='' || $strEarlyEntryWH!='' || $strLateEntryWH!='' || $strExitTimeWH!='' || $strLateExitTimeWH!='' )
				$intWeekHalfDay		= 1;
		}
		else
		{
			$outMsg	= "Wrong user id for flexi time";
			$flag	= 1;
		}
			$arr_val	= array('msg'=>$outMsg,'flag'=>$flag, 'locId'=>$intLocId, 'hierarhy'=>$strHierarchyId,'userId'=>$intUserId,'PhyLoc'=>$intPhyLoc,'ShiftId'=>$intShiftId, 'DateFrom'=>$strDateFrom, 'DateTo'=>$strDateTo, 'StartTime'=>$strStartTime, 'GraceTime'=>$intGraceTime, 'RecessFrom'=>$strRecessFrom, 'RecessTo'=>$strRecessTo, 'ExitTime'=>$strExitTime, 'LateExitTime'=>$strLateExitTime, 'ExtraLateExitTime'=>$strExtraLateExitTime, 'EarlyEntry'=>$strEarlyEntry, 'LateEntry'=>$strLateEntry, 'WeekHalfDay'=>$intWeekHalfDay, 'StartTimeWH'=>$strStartTimeWH, 'EarlyEntryWH'=>$strEarlyEntryWH, 'LateEntryWH'=>$strLateEntryWH	, 'ExitTimeWH'=>$strExitTimeWH, 'LateExitTimeWH'=>$strLateExitTimeWH);
		return $arr_val;
	}
	
	//=========== function to add flexi time === By Sunil Kumar Parida On 22/10/2013 =============
	public function addUpdateFlexiTime($id)
	{
		$flag					= 0;		
		$dateFrom				= commonClass::dbDateFormat($_REQUEST['txtDateFrom']);
		$dateTo					= commonClass::dbDateFormat($_REQUEST['txtDateTo']);
		$sessUserId				= $_SESSION['adminConsole_userID'];
		$ddlLocationId			= $_REQUEST['selLocation'];
		$txtHierarchyId			= $_REQUEST['hdnNo'];	
		$ddlUserId				= $_REQUEST['selUser'];	
		$ddlPhyLoc				= $_REQUEST['selphyLoc'];
		$ddlShiftId				= $_REQUEST['selshift'];
		$txtStartTime			= $_REQUEST['txtStartTime'];
		$ddlGraceTime			= $_REQUEST['ddlGraceTime'];
		$txtRecessFrom			= $_REQUEST['txtRecessFrom'];
		$txtRecessTo			= $_REQUEST['txtRecessTo'];
		$txtExitTime			= $_REQUEST['txtExitTime'];
		$txtLateExitTime		= $_REQUEST['txtLateExitTime'];
		$txtExtraLateExitTime	= $_REQUEST['txtExtraLateExitTime'];
		$txtEarlyEntry			= $_REQUEST['txtEarlyEntry'];
		$txtLateEntry			= $_REQUEST['txtLateEntry'];
		$chkWeekHalfDay			= $_REQUEST['chkWeekHalfDay'];
		$txtStartTimeWH			= ($chkWeekHalfDay==1)?$_REQUEST['txtStartTimeWH']:'';
		$txtEarlyEntryWH		= ($chkWeekHalfDay==1)?$_REQUEST['txtEarlyEntryWH']:'';
		$txtLateEntryWH			= ($chkWeekHalfDay==1)?$_REQUEST['txtLateEntryWH']:'';
		$txtExitTimeWH			= ($chkWeekHalfDay==1)?$_REQUEST['txtExitTimeWH']:'';
		$txtLateExitTimeWH		= ($chkWeekHalfDay==1)?$_REQUEST['txtLateExitTimeWH']:'';
		$action					= ($id>0)?'U':'A';
		if(($ddlLocationId==0 || $ddlLocationId=='') || ($ddlShiftId==0 || $ddlShiftId==''))
			$outMsg		= 'Enter mandatory fields';
		else
		{
			$dupResult	= $this->manageFlexiTime('CD', $id, 0, 0, $ddlUserId, 0, 0, $dateFrom, $dateTo, '', '0', '', '', '', '', '', '', '', '', '', '', '', '', 0);
			$dupRow		= mysqli_fetch_array($dupResult);
			if($dupRow[0]>0)
			{
				$outMsg					= 'This user is already assigned with flexi time within this period';
				$strDateFrom			= commonClass::dbDateFormat($dateFrom);
				$strDateTo				= commonClass::dbDateFormat($dateTo);
				$intLocId				= $ddlLocationId;
				$strHierarchyId			= $txtHierarchyId;	
				$intUserId				= $ddlUserId;	
				$intPhyLoc				= $ddlPhyLoc;
				$intShiftId				= $ddlShiftId;
				$strStartTime			= $txtStartTime;
				$intGraceTime			= $ddlGraceTime;
				$strRecessFrom			= $txtRecessFrom;
				$strRecessTo			= $txtRecessTo;
				$strExitTime			= $txtExitTime;
				$strLateExitTime		= $txtLateExitTime;
				$strExtraLateExitTime	= $txtExtraLateExitTime;
				$strEarlyEntry			= $txtEarlyEntry;
				$strLateEntry			= $txtLateEntry;
				$intWeekHalfDay			= $chkWeekHalfDay;
				$strStartTimeWH			= $txtStartTimeWH;
				$strEarlyEntryWH		= $txtEarlyEntryWH;
				$strLateEntryWH			= $txtLateEntryWH;
				$strExitTimeWH			= $txtExitTimeWH;
				$strLateExitTimeWH		= $txtLateExitTimeWH;
			}
			else
			{
				$result		= $this->manageFlexiTime($action, $id, $ddlLocationId, $txtHierarchyId, $ddlUserId, $ddlPhyLoc, $ddlShiftId, $dateFrom, $dateTo, $txtStartTime, $ddlGraceTime, $txtRecessFrom, $txtRecessTo, $txtExitTime, $txtLateExitTime, $txtExtraLateExitTime, $txtEarlyEntry, $txtLateEntry, $txtStartTimeWH, $txtEarlyEntryWH, $txtLateEntryWH, $txtExitTimeWH, $txtLateExitTimeWH, $sessUserId);
				if($result)
				{
					$row		= mysqli_fetch_array($result);
					$rowFlag	= $row[0];
					if($rowFlag==0)
					{
						$outMsg		= 'Flexi Time added successfully';
						$strDateFrom			= commonClass::dbDateFormat($dateFrom);
					$strDateTo				= commonClass::dbDateFormat($dateTo);
					$intLocId				= $ddlLocationId;
					$strHierarchyId			= $txtHierarchyId;	
					$intUserId				= $ddlUserId;	
					$intPhyLoc				= $ddlPhyLoc;
					$intShiftId				= $ddlShiftId;
					$strStartTime			= $txtStartTime;
					$intGraceTime			= $ddlGraceTime;
					$strRecessFrom			= $txtRecessFrom;
					$strRecessTo			= $txtRecessTo;
					$strExitTime			= $txtExitTime;
					$strLateExitTime		= $txtLateExitTime;
					$strExtraLateExitTime	= $txtExtraLateExitTime;
					$strEarlyEntry			= $txtEarlyEntry;
					$strLateEntry			= $txtLateEntry;
					$intWeekHalfDay			= $chkWeekHalfDay;
					$strStartTimeWH			= $txtStartTimeWH;
					$strEarlyEntryWH		= $txtEarlyEntryWH;
					$strLateEntryWH			= $txtLateEntryWH;
					$strExitTimeWH			= $txtExitTimeWH;
					$strLateExitTimeWH		= $txtLateExitTimeWH;
				}
					else if($rowFlag==1)
					{
						$outMsg		= 'Flexi Time updated successfully';
						$flag		= 1;
					}
				}				
			}
		
		$arr_val	= array('msg'=>$outMsg,'flag'=>$flag,'locId'=>$intLocId, 'hierarhy'=>$strHierarchyId,'userId'=>$intUserId,'PhyLoc'=>$intPhyLoc,'ShiftId'=>$intShiftId, 'DateFrom'=>$strDateFrom, 'DateTo'=>$strDateTo, 'StartTime'=>$strStartTime, 'GraceTime'=>$intGraceTime, 'RecessFrom'=>$strRecessFrom, 'RecessTo'=>$strRecessTo, 'ExitTime'=>$strExitTime, 'LateExitTime'=>$strLateExitTime, 'ExtraLateExitTime'=>$strExtraLateExitTime, 'EarlyEntry'=>$strEarlyEntry, 'LateEntry'=>$strLateEntry, 'WeekHalfDay'=>$intWeekHalfDay, 'StartTimeWH'=>$strStartTimeWH, 'EarlyEntryWH'=>$strEarlyEntryWH, 'LateEntryWH'=>$strLateEntryWH	, 'ExitTimeWH'=>$strExitTimeWH, 'LateExitTimeWH'=>$strLateExitTimeWH);
		}
		return $arr_val;
	}
	
	//=========== function to delete flexi timing === By Sunil Kumar Parida On 22/10/2013 =============
	public function deleteFlexiTime($qs,$id)
	{
		$userId		= $_SESSION['adminConsole_userID'];
		$intID		= explode(',',$id);
		$pass		= 0;
		$fail		= 0;
		$action		= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];			
			$result		= $this->manageFlexiTime($action, $indvidualID, 0, 0, 0, 0, 0, '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', $userId);
			$msg		= '';
		}
		if($result)
		{
			if($action=='D')
				$msg	= 'Record(s) deleted successfully';
		}		
		
		return $msg;
	}
	
	//=========== Function to manage assign shift to user By sunil kumar parida on 22/10/2013 ==========
	public function manageAssignShift($action, $id, $locId, $shiftId, $userId, $updatedBy, $userName = '')
	{
		$assignShiftSql	= "CALL USP_SHIFT_ASSIGN('$action', '$id', '$locId', '$shiftId', '$userId', '$updatedBy', '$userName');";
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errId			= commonClass::isSpclChar($id);
		$errLocId		= commonClass::isSpclChar($locId);
		$errShiftId		= commonClass::isSpclChar($shiftId);
		$errUserId		= commonClass::isSpclChar($userId);		
		$errUpdatedBy	= commonClass::isSpclChar($updatedBy);
		$errUsername	= commonClass::isSpclChar($userName);
		if($errAction == 0 && $errId== 0 && $errLocId== 0 && $errShiftId== 0 && $errUserId== 0 && $errUpdatedBy== 0 && $errUsername== 0)
		{
			$assignShiftResult	= commonClass::ExecuteQuery($assignShiftSql);
			return $assignShiftResult;	
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	//============ Function to assign shift to user By Sunil Kumar Parida On 22/10/2013 ===============
	public function assignShift()
	{
		$sessUserId			= $_SESSION['adminConsole_userID'];
		$intLocId			= $_REQUEST['ddlLocation'];
		$intShiftId			= $_REQUEST['selshift'];
		$allUserId			= $_REQUEST['hdnAllUsers'];
		$errLocId			= commonClass::isSpclChar($intLocId);
		$errShiftId			= commonClass::isSpclChar($intShiftId);
		$errUserId			= commonClass::isSpclChar($allUserId);
		if($errLocId ==1 || $errShiftId ==1 || $errUserId ==1)
			header("Location: ".$path."../home");
			
		$explAllUser		= explode(',',$allUserId);
		$queryParam			= '';
		$dupIds				= 0;
		$success			= 0;
		$dupUserName		= '';
		for($i=0; $i<count($explAllUser); $i++)
		{
			$dupResult		= $this->manageAssignShift('CD', 0, 0, 0, $explAllUser[$i], 0);
			$dupRow			= mysqli_fetch_array($dupResult);
			if($dupRow[0]==0)
			{
				$queryParam		.= '('.$intLocId.','.$intShiftId.','.$explAllUser[$i].','.$sessUserId.'),';
				$success++;
			}
			else
			{
				$dupIds++;
				$dupUserName.=$dupRow[1].',';
			}
		}
		$queryParam			= substr($queryParam,0,-1);
		$dupUserName		= substr($dupUserName,0,-1);
		
		if($allUserId!='' && $success>0)
		{
			//$deleteResult		= $this->manageAssignShift('RM', 0, $intLocId, $intShiftId, 0, 0);			
			$insertSql			= "INSERT INTO m_shift_assign (INT_NODE_ID,INT_SHIFT_ID,INT_USER_ID,INT_CREATED_BY) VALUES ".$queryParam;
			$assignShiftResult	= commonClass::ExecuteQuery($insertSql);
		}
		if($assignShiftResult)
			$msg				= "Shift assigned successfully";
		if($dupIds>0)
			$msg				.= " (".$dupUserName." already assigned to a shift and can not be re-assigned)";
		return $msg;
	}
	
	//=========== function to get location name ===========
	public function fillLocation($selVal)
	{
		$viewLocationSql	= "CALL USP_ADMIN_HIERARCHY('F', '0', '', '', '0', '0',@out)";
		$result				= commonClass::FillDropdown($viewLocationSql,$selVal);
		return $result;
	}
	
	//=========== function to update shift assign =========
	public function updateShiftAssign($id, $shiftId)
	{
		$sessUserId			= $_SESSION['adminConsole_userID'];
		$updateResult		= $this->manageAssignShift('U', $id, 0, $shiftId, 0, $sessUserId);
		if($updateResult)
		{
			$msg			= "Record updated successfully";
		}
		return $msg;
	}
	
	//=========== function to delete shift assign === By Sunil Kumar Parida On 22/10/2013 =============
	public function deleteShiftAssign($qs,$id)
	{
		$userId		= $_SESSION['adminConsole_userID'];
		$intID		= explode(',',$id);
		$pass		= 0;
		$fail		= 0;
		$action		= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];			
			$result		= $this->manageAssignShift($action, $indvidualID, 0, 0, 0, $userId);
			$msg		= '';
		}
		if($result)
		{
			if($action=='D')
				$msg	= 'Record(s) deleted successfully';
		}		
		return $msg;
	}
}
?>

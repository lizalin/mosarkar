<?php
/*============================================================
Page Name		:	manageLink_class.php
Description		:	Class for managing Link
Created By		:	Sunil Kumar Parida
Created On		:	21-Aug-2013
Update History	:
<Updated by>		<Updated On>		<Remarks>


Functions Used	:	connectToDatabase();closeConnection();
==============================================================*/
if(file_exists('../config.php'))
	include('../config.php');
	
include_once(ABSPATH."/includes/sessioncheck.php");

class linkClass extends commonClass
{	
	
	//=========== function to fill location =============
	public function fillLocation($selVal)
	{
		$viewLocationSql	= "CALL USP_ADMIN_HIERARCHY('F', '0', '', '', '0', '0',@out)";
		$result				= commonClass::FillMultiDropdown($viewLocationSql,$selVal);
		return $result;
	}
	
	//=========== function to get location name ===========
	public function getLocation($locId)
	{
		$locName	= '';
		$locSql		= "CALL USP_ADMIN_HIERARCHY('V', '$locId', '', '', '0', '0',@out);";
		$locResult	= commonClass::ExecuteQuery($locSql);
		if(commonClass::NumRow($locResult)>0)
		{
			$locRow		= mysqli_fetch_array($locResult);
			$locName	= $locRow['VCH_HIERARCHY_NAME'];
		}
		return $locName;
	}
	
	###################################################################################################################
	#								Manage Function																	  #
	###################################################################################################################
	//=========== function to manage functions ================
	public function manageFunction($action, $funcId, $funcName, $fileName, $desc, $action1, $action2, $action3, $mailStatus, $freebees, $portlet, $status, $updatedBy)
	{
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errFuncId		= commonClass::isSpclChar($funcId);
		$errFuncName            = commonClass::isSpclChar($funcName);
		$errFilename            = commonClass::isSpclChar($fileName);
		$errAction1		= commonClass::isSpclChar($action1);
		$errAction2		= commonClass::isSpclChar($action2);
		$errAction3		= commonClass::isSpclChar($action3);
		$errMailStatus          = commonClass::isSpclChar($mailStatus);
		$errFreebees            = commonClass::isSpclChar($freebees);
		$errPortlet		= commonClass::isSpclChar($portlet);
                $errStatus		= commonClass::isSpclChar($status);
                $errUpdatedBy           = commonClass::isSpclChar($updatedBy);
              
                
              $funcName     = htmlspecialchars($funcName,ENT_QUOTES);
              $fileName     = htmlspecialchars($fileName,ENT_QUOTES);
              $action1      = htmlspecialchars($action1,ENT_QUOTES);
              $action2      = htmlspecialchars($action2,ENT_QUOTES);
              $action3      = htmlspecialchars($action3,ENT_QUOTES);
              $mailStatus   = htmlspecialchars($mailStatus,ENT_QUOTES);
              $freebees     =  htmlspecialchars($freebees,ENT_QUOTES);
              $portlet      =  htmlspecialchars($portlet,ENT_QUOTES);
              $status       =  htmlspecialchars($status,ENT_QUOTES);
              
		if($errAction == 0 && $errFuncId == 0 && $errFuncName == 0 && $errFilename == 0 && $errAction1 == 0 && $errAction2 == 0 && $errAction3 == 0 && $errMailStatus == 0 && $errFreebees == 0 && $errPortlet == 0 && $errStatus == 0 && $errUpdatedBy == 0 )
		{
			$functionSql	= "CALL USP_ADMIN_FUNCTION_MASTER('$action', '$funcId', '$funcName', '$fileName', '$desc', '$action1', '$action2', '$action3', '$mailStatus', '$freebees', '$portlet', '$status', '$updatedBy', @OUT);";
			   //echo $functionSql;//exit;
                        $functionResult	= commonClass::ExecuteQuery($functionSql);
			return $functionResult;		
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	//=========== function to fill function =============
	public function fillFunctionDrp($selVal)
	{
		$viewFunctionSql	= "CALL USP_ADMIN_FUNCTION_MASTER('F', '0', '', '', '', '', '', '', '0', '0', '', '0', '0', @OUT);";
		$result				= commonClass::FillDropdown($viewFunctionSql,$selVal);
		return $result;
	}
	
	//=========== function to add function master ===================
	public function addUpdateFunction($id)
	{
           
		$userId				= $_SESSION['adminConsole_userID'];
		$txtFunName			= $_POST['txtFunName'];
		$txtFileName                    = $_POST['txtFileName'];
		$txtDesc			= $_POST['txtDesc'];
                //$txtPages			= $_POST['txtPages'];
		$txtPermission1                 = $_POST['txtPermission1'];
		$txtPermission2                 = $_POST['txtPermission2'];
		$txtPermission3                 = $_POST['txtPermission3'];
		$radMailStatus                  = $_POST['radMailStatus'];
		$radFreebees                    = $_POST['radFreebees'];
		$txtPFileName                   = $_POST['txtPages'];
		$radStatus			= 1;
		$outMsg				= '';
		$flag				= ($id!=0)?1:0;
		$action				= ($id==0)?'A':'U';
		
			
		$dupResult			= $this->manageFunction('CD', $id, $txtFunName, '', '', '', '', '', 0, 0, '', 0, 0);
		if($dupResult)
		{
			$numRow	= mysqli_fetch_array($dupResult);
			if($numRow[0]>0)
			{
				$flag		= 2;
				$outMsg		= 'Function with this name already exists';				
			}
			else
			{
				$result		= $this->manageFunction($action, $id, $txtFunName, $txtFileName, $txtDesc, $txtPermission1, $txtPermission2, $txtPermission3, $radMailStatus, $radFreebees, $txtPFileName, $radStatus, $userId);
				if($result)				
					$outMsg		= ($action=='A')?'Function added successfully':'Function updated successfully';
					
			}
		}		
		$strFunName		= ($flag==1 || $flag==2)?$txtFunName:'';
		$strFileName		= ($flag==1 || $flag==2)?$txtFileName:'';
		$strDesc		= ($flag==1 || $flag==2)?$txtDesc:'';
		$strPermission1		= ($flag==1 || $flag==2)?$txtPermission1:'';
		$strPermission2		= ($flag==1 || $flag==2)?$txtPermission2:'';
		$strPermission3		= ($flag==1 || $flag==2)?$txtPermission3:'';
		$mailStatus		= ($flag==1 || $flag==2)?$radMailStatus:2;
		$freebees		= ($flag==1 || $flag==2)?$radFreebees:2;
		$strPFileName		= ($flag==1 || $flag==2)?$txtPFileName:'';
		$status				= ($flag==1 || $flag==2)?$radStatus:'';	
		$arrResult	= array('msg'=>$outMsg, 'flag'=>$flag, 'funcName'=>$strFunName, 'fileName'=>$strFileName, 'desc'=>$strDesc, 'permission1'=>$strPermission1, 'permission2'=>$strPermission2, 'permission3'=>$strPermission3, 'mailStatus'=>$mailStatus, 'freebees'=>$freebees, 'portlet'=>$strPFileName, 'status'=>$status);
		return $arrResult;
	}
	
	//================== Function to fill records ========================
	public function fillFunction($id)
	{
		$strFunName		= '';
		$strFileName	= '';
		$strDesc		= '';
		$strPermission1	= '';
		$strPermission2	= '';
		$strPermission3	= '';
		$mailStatus		= 2;
		$freebees		= 2;
		$strPFileName	= '';
		$status			= 1;
		$result			= $this->manageFunction('V', $id, '','', '', '', '', '', 0, 0, '', 0, 0);
		if(commonClass::NumRow($result)>0)
		{
			$row			= mysqli_fetch_array($result);
			$strFunName		= $row['VCH_FUN_NAME'];
			$strFileName	= $row['VCH_FILE_NAME'];
			$strDesc		= $row['VCH_DESCRIPTION'];
			$strPermission1	= $row['VCH_ACTION1'];
			$strPermission2	= $row['VCH_ACTION2'];
			$strPermission3	= $row['VCH_ACTION3'];
			$mailStatus		= $row['INT_MAIL'];
			$freebees		= $row['INT_FREEBEES'];
			$strPFileName	= $row['VCH_RELATED_PAGES'];
			$status			= $row['INT_STATUS'];
		}
		$arrResult	= array('funcName'=>$strFunName, 'fileName'=>$strFileName, 'desc'=>$strDesc, 'permission1'=>$strPermission1, 'permission2'=>$strPermission2, 'permission3'=>$strPermission3, 'mailStatus'=>$mailStatus, 'freebees'=>$freebees, 'portlet'=>$strPFileName, 'status'=>$status);
		return $arrResult;
	}
	
	//============= function to delete active and inactive function master ===================
	public function deleteActive($qs,$id)
	{
		$userId		= $_SESSION['adminConsole_userID'];
		$intID		= explode(',',$id);
		$pass		= 0;
		$fail		= 0;
		$action		= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];			
			$result		= $this->manageFunction($action, $indvidualID, '','', '', '', '', '', 0, 0, '', 0, $userId);
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
				$msg	.= $fail.' record(s) linked with primary link and can not deleted.';
		}
		else if($action=='AC')
			$msg	= 'Record(s) activated successfully';
		else if($action=='IN')
			$msg	= 'Record(s) inactivated successfully';
		return $msg;
	}
	###################################################################################################################
	#								Manage Global Link																  #
	###################################################################################################################
	//============= function to manage global link ====================
	public function manageGL($action, $glId, $locId, $glName, $slNo, $showOnHome, $status, $updatedBy, $icon='')
	{
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errGlId		= commonClass::isSpclChar($glId);
		$errLocId		= commonClass::isSpclChar($locId);
		$errGlName		= commonClass::isSpclChar($glName);
		$errSlNo		= commonClass::isSpclChar($slNo);
		$errShow		= commonClass::isSpclChar($showOnHome);
		$errStatus		= commonClass::isSpclChar($status);
		$errIcon		= commonClass::isSpclChar($icon);
		$errUpdatedBy	= commonClass::isSpclChar($updatedBy);
		if($errAction == 0 && $errGlId == 0 && $errLocId == 0 && $errGlName == 0 && $errSlNo == 0 && $errShow == 0 && $errStatus == 0 &&$errUpdatedBy  == 0 && $errIcon == 0)
		{
			$glSql		= "CALL USP_ADMIN_GLINK('$action', '$glId', '$locId', '$glName', '$slNo', '$showOnHome', '$status', '$icon', '$updatedBy', @OUT);";
			$glResult	= commonClass::ExecuteQuery($glSql);
			return $glResult;
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	//=========== read global link =========================
	public function readGlobalLink($id)
	{
		$intLocId		= 0;
		$strGLName		= '';
		$intSLNo		= 1;
		$intShow		= 1;
		$result			= $this->manageGL('V', $id, 0, '', 0, 0, 0, 0);
		if(commonClass::NumRow($result)>0)
		{
			$row			= mysqli_fetch_array($result);
			$intLocId		= $row['VCH_LOC_ID'];
			$strGLName		= $row['VCH_GL_NAME'];
			$intSLNo		= $row['INT_SL_NO'];
			$intShow		= $row['INT_SHOW_ON_HOME'];		
			$strIcon		= $row['VCH_ICON_NAME'];	
			$iconClass		= $row['VCH_ICON_CLASS'];			
		}
		$arrResult	= array('location'=>$intLocId, 'glName'=>$strGLName, 'slNo'=>$intSLNo, 'show'=>$intShow, 'icon'=>$strIcon, 'iconClass'=>$iconClass);
		return $arrResult;
	}
	
	//=========== function to add global link =======================
	public function addGL($id)
	{
		$userId			= $_SESSION['adminConsole_userID'];
		$ddlLocation            = $_POST['selLocation'];
		$txtGLink		= $_POST['txtGLink'];
		$ddlSL			= $_POST['intSL'];
		$radShow		= $_POST['radShow'];
		$iconStatus		= $_POST['radIcon'];
		$iconClass		= $_POST['txtIconClass'];
		$txtIconFile	= '';
		$hdnIconFile	= '';
		$hdnPreIconFile	= '';
//               $file_info = new finfo(FILEINFO_MIME);
//                echo APP_PATH.'/jsonConfig/socialCompares.json';
//                $mime_type = $file_info->buffer(file_get_contents(APP_PATH.'jsonConfig/socialCompares.json'));
//                echo $mime_type;exit;
		if($iconStatus==2)
		{
			$txtIconFile	        = $_FILES['fileIcon']['name'];
			$iconTemp		= $_FILES['fileIcon']['tmp_name'];
			$iconType		= $_FILES['fileIcon']['type'];
			$iconSize		= $_FILES['fileIcon']['size'];
			$hdnIconFile	= $_POST['hdnIconFile'];
			$hdnPreIconFile	= $_POST['hdnPreIconFile'];
						
			$iconFileName	= "GL_".rand(0,9).time();
			$extn			= pathinfo($txtIconFile, PATHINFO_EXTENSION);
                        
                        
			if($txtIconFile!='')
				$fileName		= $iconFileName.'.'.$extn;
			else if($hdnIconFile!='')
				$fileName		= $hdnIconFile;
			else
				$fileName		= '';
		}
		else if($iconStatus==3)
		{
			$fileName	= htmlspecialchars( $iconClass, ENT_QUOTES);
		}
		else
		{
			$fileName	= '';
		}
		$folderPath		= "../uploadDocuments/Icons/";	
		$outMsg			= '';
		$flag			= ($id!=0)?1:0;
		$action			= ($id==0)?'A':'U';
		$location		= '';		
		for($i=0;$i<count($ddlLocation);$i++)
		{
			$location	.= $ddlLocation[$i].',';
			if($ddlLocation[0]=='All')
				break;
		}
		$location	= substr($location, 0, -1);
		
		$errFlag	= 0;
		if($iconStatus==2)
		{
                    $imginfo_array = getimagesize($iconTemp);
			if($imginfo_array !== false && ($iconType=="image/x-png" || $iconType=="image/png" || $iconType=="image/gif") && $txtIconFile!='' )
			{
				if($iconSize<=5000 && $txtIconFile!='')
				{					
					$errFlag	= 1;
				}
				else
				{
					$flag		= 2;
					$outMsg		= 'Icon Image size should be less than 5kb';
				}
			}
			else
			{
				$flag		= 2;
				$outMsg		= 'Invalid image type. Accepted .png & .gif only';	
			}
		}
		else if($iconStatus==3 || $iconStatus==1)
		{
			$errFlag	= 1;
		}
		if($errFlag==1)
		{
			$dupResult		= $this->manageGL('CD', $id, '', $txtGLink, 0, 0, 0, 0);
			if($dupResult)
			{
				$numRow	= mysqli_fetch_array($dupResult);
				if($numRow[0]>0)
				{
					$flag		= 2;
					$outMsg		= 'Global link with this name already exists';				
				}
				else
				{					
					
					$result		= $this->manageGL($action, $id, $location, $txtGLink, $ddlSL, $radShow, $iconStatus, $userId, $fileName);
					if($result)
						$outMsg		= ($action=='A')?'Global link added successfully':'Global link updated successfully';
					
					if($iconStatus==2 && $txtIconFile!='')	
					{
                                            //echo $_SESSION['adminConsole_UserName'];exit;
						if(file_exists($folderPath.$hdnPreIconFile) && $hdnPreIconFile!=''&& !empty($_SESSION['adminConsole_UserName']) )
							unlink($folderPath.$hdnPreIconFile);	
						move_uploaded_file($iconTemp,$folderPath.$fileName);
					}
					if($txtIconFile=='' && $hdnIconFile=='')
					{
						if(file_exists($folderPath.$hdnPreIconFile) && $hdnPreIconFile!='' && !empty($_SESSION['adminConsole_UserName']))
							unlink($folderPath.$hdnPreIconFile);
					}
				}
			}
		}
		$intLocId	= ($flag==1 || $flag==2)?$location:0;
		$strGLName	= ($flag==1 || $flag==2)?$txtGLink:'';
		$intSLNo	= ($flag==1 || $flag==2)?$ddlSL:0;
		$intShow	= ($flag==1 || $flag==2)?$radShow:1;
		$strIcon	= ($flag==1 || $flag==2)?$iconFileName:'';
		$arrResult	= array('msg'=>$outMsg,'flag'=>$flag,'loc'=>$intLocId,'glName'=>$strGLName,'slNo'=>$intSLNo,'show'=>$intShow, 'icon'=>$strIcon);
		return $arrResult;
	}
	
	//============= function to delete active and inactive function master ===================
	public function deleteActiveGL($qs,$id)
	{
		$userId		= $_SESSION['adminConsole_userID'];
		$intID		= explode(',',$id);
		$pass		= 0;
		$fail		= 0;
		$action		= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];	
			$slNumber	= 0;
			//====== update serial number =======	
			if($action=='US')
			{
				$slNumber	= $_POST['txtSLNo'.$indvidualID];
			}
			$result		= $this->manageGL($action, $indvidualID, '0','', $slNumber, 0, 0, $userId);
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
				$msg	.= $fail.' record(s) have primary link and can not deleted.';
		}
		else if($action=='AC')
			$msg	= 'Record(s) activated successfully';
		else if($action=='IN')
			$msg	= 'Record(s) inactivated successfully';
		else if($action=='US')
			$msg	= 'Serial number updated successfully';
		return $msg;
	}	
	
	###################################################################################################################
	#								Manage Primary Link																  #
	###################################################################################################################
	//============= function to manage primary link ====================
	public function managePL($action, $plId, $locId, $glId, $plName, $slNo, $linkType, $funcId, $showOnHome, $status, $updatedBy)
	{
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errPlId		= commonClass::isSpclChar($plId);
		$errGlId		= commonClass::isSpclChar($glId);
		$errLocId		= commonClass::isSpclChar($locId);
		$errPlName		= commonClass::isSpclChar($plName);
		$errSlNo		= commonClass::isSpclChar($slNo);
		$errLinkType            = commonClass::isSpclChar($linkType);
		$errFuncId		= commonClass::isSpclChar($funcId);
		$errShow		= commonClass::isSpclChar($showOnHome);
		$errStatus		= commonClass::isSpclChar($status);
		$errIcon		= commonClass::isSpclChar($icon);
		$errUpdatedBy	        = commonClass::isSpclChar($updatedBy);
              
                $plId                   = htmlspecialchars($plId,ENT_QUOTES);
                $glId                   = htmlspecialchars($glId,ENT_QUOTES);
                $locId                  = htmlspecialchars($locId,ENT_QUOTES);
                $plName                 = htmlspecialchars($plName,ENT_QUOTES);
                $slNo                   = htmlspecialchars($slNo,ENT_QUOTES);
                $linkType               = htmlspecialchars($linkType,ENT_QUOTES);
                $funcId                 = htmlspecialchars($funcId,ENT_QUOTES);
                $showOnHome             = htmlspecialchars($showOnHome,ENT_QUOTES);
                $status                 = htmlspecialchars($status,ENT_QUOTES);
                $icon                   = htmlspecialchars($icon,ENT_QUOTES);
                
		if($errAction == 0 && $errPlId == 0 && $errGlId == 0 && $errLocId == 0 && $errPlName == 0 && $errSlNo == 0 && $errLinkType == 0 && $errFuncId == 0 && $errShow == 0 && $errStatus == 0 && $errUpdatedBy  == 0 )
		{
			$plSql		= "CALL USP_ADMIN_PLINK('$action', '$plId', '$glId', '$locId', '$plName', '$slNo', '$linkType', '$funcId', '$showOnHome', '$status', '$updatedBy', @OUT);";
			$plResult	= commonClass::ExecuteQuery($plSql);
			return $plResult;
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	//=========== read global link =========================
	public function readPrimaryLink($id)
	{
		$intLocId		= 0;
		$intGlId		= 0;
		$strPLName		= '';
		$intSLNo		= 1;
		$intFunc		= 0;
		$intShow		= 1;
		$result			= $this->managePL('V', $id, 0, 0, '', 0, 0, '', 0, 0, 0);
		if(commonClass::NumRow($result)>0)
		{
			$row			= mysqli_fetch_array($result);
			$intLocId		= $row['VCH_LOC_ID'];
			$intGlId		= $row['INT_GL_ID'];
			$strPLName		= $row['VCH_PL_NAME'];			
			$intSLNo		= $row['INT_SL_NO'];
			$linkType		= $row['INT_LINK_TYPE'];
			$funcName		= $row['VCH_FUNC_FILE'];
			$intShow		= $row['INT_SHOW_ON_HOME'];		
		}
		$arrResult	= array('location'=>$intLocId, 'glId'=>$intGlId, 'plName'=>$strPLName, 'slNo'=>$intSLNo, 'linkType'=>$linkType, 'function'=>$funcName, 'show'=>$intShow);
		return $arrResult;
	}
	
	//=========== function to add global link =======================
	public function addPL($id)
	{
		$userId			= $_SESSION['adminConsole_userID'];
		$ddlLocation            = $_POST['selLocation'];
		$ddlGLink		= $_POST['selGL'];
		$txtPLink		= $_POST['PLName'];
		$ddlSL			= $_POST['intSL'];
		$radLinkType            = $_POST['radLinkType'];
		$ddlFunc		= ($radLinkType==1)?$_POST['selFunc']:$_POST['txtLink'];
		$radShow		= $_POST['radShow'];
		$outMsg			= '';
		$flag			= ($id!=0)?1:0;
		$action			= ($id==0)?'A':'U';
		for($i=0;$i<count($ddlLocation);$i++)
		{
			$location	.= $ddlLocation[$i].',';
			if($ddlLocation[0]=='All')
				break;
		}
		$location		= substr($location, 0, -1);		
		$dupResult		= $this->managePL('CD', $id, '', $ddlGLink, $txtPLink, 0, 0, '', 0, 0, 0);
		if($dupResult)
		{
			$numRow	= mysqli_fetch_array($dupResult);
			if($numRow[0]>0)
			{
				$flag		= 2;
				$outMsg		= 'Primary link with this name already exists';				
			}
			else
			{				
				$result		= $this->managePL($action, $id, $location, $ddlGLink, $txtPLink, $ddlSL, $radLinkType, $ddlFunc, $radShow, 1, $userId);
				if($result)
					$outMsg		= ($action=='A')?'Primary link added successfully':'Primary link updated successfully';
			}
		}
			
			
		$intLocId		= ($flag==1 || $flag==2)?$location:0;
		$intGLId		= ($flag==1 || $flag==2)?$ddlGLink:0;
		$strPLName		= ($flag==1 || $flag==2)?$txtPLink:'';
		$intSLNo		= ($flag==1 || $flag==2)?$ddlSL:1;
		$intLinkType	= ($flag==1 || $flag==2)?$radLinkType:1;
		$intFunc		= ($flag==1 || $flag==2)?$ddlFunc:1;
		$intShow		= ($flag==1 || $flag==2)?$radShow:0;
		
		$arrResult	= array('msg'=>$outMsg, 'flag'=>$flag, 'loc'=>$intLocId, 'glId'=>$intGLId, 'plName'=>$strPLName, 'slNo'=>$intSLNo, 'linkType'=>$intLinkType, 'function'=>$intFunc, 'show'=>$intShow);
		return $arrResult;
	}
	
	//============= function to delete active and inactive function master ===================
	public function deleteActivePL($qs,$id)
	{
		$userId		= $_SESSION['adminConsole_userID'];
		$intID		= explode(',',$id);
		$pass		= 0;
		$fail		= 0;
		$action		= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];		
			$slNumber	= 0;
			//====== update serial number =======	
			if($action=='US')
			{
				$slNumber	= $_POST['txtSLNo'.$indvidualID];
			}	
			$result		= $this->managePL($action, $indvidualID, '0', '0', '', $slNumber, 0, 0, 0, 0, $userId);
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
				$msg	.= $fail.' record(s) have primary link and can not deleted.';
		}
		else if($action=='AC')
			$msg	= 'Record(s) activated successfully';
		else if($action=='IN')
			$msg	= 'Record(s) inactivated successfully';
		else if($action=='US')
			$msg	= 'Serial number updated successfully';
		return $msg;
	}
	
	###################################################################################################################
	#								Manage Button Master															  #
	###################################################################################################################
	//============= function to manage button master ====================
	public function manageButton($action, $btnId, $funcId, $btnName, $slNo, $fileName, $tabAvail, $action1, $action2, $action3, $status, $description, $updatedBy)
	{
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errBtnId		= commonClass::isSpclChar($btnId);
		$errFuncId		= commonClass::isSpclChar($funcId);
		$errBtnName		= commonClass::isSpclChar($btnName);
		$errSlNo		= commonClass::isSpclChar($slNo);
		$errFileName	= commonClass::isSpclChar($fileName);
		$errTabAvail	= commonClass::isSpclChar($tabAvail);
		$errAction1		= commonClass::isSpclChar($action1);
		$errAction2		= commonClass::isSpclChar($action2);
		$errAction3		= commonClass::isSpclChar($action3);
		$errStatus		= commonClass::isSpclChar($status);
		$errUpdatedBy	= commonClass::isSpclChar($updatedBy);
		if($errAction ==0 && $errBtnId ==0 && $errFuncId ==0 && $errBtnName ==0 && $errSlNo ==0 && $errFileName ==0 && $errTabAvail ==0 && $errAction1 ==0 && $errAction2 ==0 && $errAction3 ==0 && $errStatus ==0 && $errUpdatedBy ==0 )
		{
			$btnSql		= "CALL USP_ADMIN_BUTTON('$action', '$btnId', '$funcId', '$btnName', '$slNo', '$fileName', '$tabAvail', '$action1', '$action2', '$action3', '$status', '$description', '$updatedBy', @OUT);";
			$btnResult	= commonClass::ExecuteQuery($btnSql);
			return $btnResult;
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	//=========== read global link =========================
	public function readButton($id)
	{
		$intFuncId		= 0;
		$txtBtnName		= '';
		$intSLNo		= 1;
		$fileName		= '';
		$intTabAvail	= 1;
		$intAction1		= 0;
		$intAction2		= 0;
		$intAction3		= 0;
		$intStatus		= 1;
		$txtDesc		= '';
		$result			= $this->manageButton('V', $id, '0', '', '0', '', '0', '0', '0', '0', '0', '', '0');
		if(commonClass::NumRow($result)>0)
		{
			$row			= mysqli_fetch_array($result);
			$intFuncId		= $row['INT_FUN_ID'];
			$txtBtnName		= $row['VCH_BUTTON_NAME'];
			$intSLNo		= $row['INT_SL_NO'];			
			$fileName		= $row['VCH_FILE_NAME'];
			$intTabAvail	= $row['INT_TAB_AVAILABLE'];
			$intAction1		= $row['INT_ACTION1'];
			$intAction2		= $row['INT_ACTION2'];	
			$intAction3		= $row['INT_ACTION3'];	
			$intStatus		= $row['INT_STATUS'];	
			$txtDesc		= $row['VCH_DESCRIPTION'];			
		}
		$arrResult	= array('function'=>$intFuncId, 'btnName'=>$txtBtnName, 'slNo'=>$intSLNo, 'fileName'=>$fileName, 'tabAvail'=>$intTabAvail, 'action1'=>$intAction1, 'action2'=>$intAction2, 'action3'=>$intAction3, 'status'=>$intStatus, 'description'=>$txtDesc);
		return $arrResult;
	}
	
	//=========== function to add global link =======================
	public function addButton($id)
	{
		$userId			= $_SESSION['adminConsole_userID'];
		$numFuncId		= $_POST['selFunc'];
		$txtBtnName		= $_POST['txtBtnName'];
		$numSlNo		= $_POST['intSL'];
		$txtFileName	= $_POST['txtFileName'];
		$numTabAvail	= $_POST['radTab'];
		$numAction1		= ($_POST['chkPermission1']=='')?0:$_POST['chkPermission1'];
		$numAction2		= ($_POST['chkPermission2']=='')?0:$_POST['chkPermission2'];
		$numAction3		= ($_POST['chkPermission3']=='')?0:$_POST['chkPermission3'];
		$numStatus		= 1;
		$txtDesc		= $_POST['txtDescription'];
		$outMsg			= '';
		$flag			= ($id!=0)?1:0;
		$action			= ($id==0)?'A':'U';
		
		$dupResult		= $this->manageButton('CD', $id, $numFuncId, $txtBtnName, '0', '', '0', '0', '0', '0', '0', '', '0');
		if($dupResult)
		{
			$numRow	= mysqli_fetch_array($dupResult);
			if($numRow[0]>0)
			{
				$flag		= 2;
				$outMsg		= 'Button with this name already exists';				
			}
			else
			{
				$result		= $this->manageButton($action, $id, $numFuncId, $txtBtnName, $numSlNo, $txtFileName, $numTabAvail,  $numAction1, $numAction2, $numAction3, $numStatus, $txtDesc, $userId);
				if($result)
					$outMsg		= ($action=='A')?'Button added successfully':'Button updated successfully';
			}
		}
		$intFuncId		= ($flag==1 || $flag==2)?$numFuncId:0;
		$strBtnName		= ($flag==1 || $flag==2)?$txtBtnName:'';
		$intSLNo		= ($flag==1 || $flag==2)?$numSlNo:1;
		$strFileName	= ($flag==1 || $flag==2)?$txtFileName:'';
		$intTabAvail	= ($flag==1 || $flag==2)?$numTabAvail:1;
		$intAction1		= ($flag==1 || $flag==2)?$numAction1:0;
		$intAction2		= ($flag==1 || $flag==2)?$numAction2:0;
		$intAction3		= ($flag==1 || $flag==2)?$numAction3:0;
		$intStatus		= ($flag==1 || $flag==2)?$numStatus:1;
		$strDesc		= ($flag==1 || $flag==2)?$txtDesc:'';	
		$arrResult	= array('msg'=>$outMsg, 'flag'=>$flag, 'function'=>$intFuncId, 'btnName'=>$strBtnName, 'slNo'=>$intSLNo, 'fileName'=>$strFileName, 'tabAvail'=>$intTabAvail, 'action1'=>$intAction1, 'action2'=>$intAction2, 'action3'=>$intAction3, 'status'=>$intStatus, 'description'=>$strDesc);
		return $arrResult;
	}
	
	//============= function to delete active and inactive function master ===================
	public function deleteActiveButton($qs,$id)
	{
		$userId		= $_SESSION['adminConsole_userID'];
		$intID		= explode(',',$id);
		$pass		= 0;
		$fail		= 0;
		$action		= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];		
			$slNumber	= 0;
			//====== update serial number =======	
			if($action=='US')
			{
				$slNumber	= $_POST['txtSLNo'.$indvidualID];
			}	
			$result		= $this->manageButton($action, $indvidualID, '0', '', $slNumber, '', '0', '0', '0', '0', '0', '', $userId);
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
				$msg	.= $fail.' record(s) linked with Tab master and can not deleted.';
		}
		else if($action=='AC')
			$msg	= 'Record(s) activated successfully';
		else if($action=='IN')
			$msg	= 'Record(s) inactivated successfully';
		else if($action=='US')
			$msg	= 'Serial number updated successfully';
		return $msg;
	}
	
	###################################################################################################################
	#									Manage Tab Master															  #
	###################################################################################################################
	//============= function to manage tab master ====================
	public function manageTab($action, $tabId, $funcId, $btnId, $tabName, $slNo, $fileName, $action1, $action2, $action3, $status, $description, $updatedBy)
	{
		$path			= commonClass::webPath();
		$errAction		= commonClass::isSpclChar($action);
		$errTabId		= commonClass::isSpclChar($tabId);
		$errFuncId		= commonClass::isSpclChar($funcId);
		$errBtnId		= commonClass::isSpclChar($btnId);
		$errTabName		= commonClass::isSpclChar($tabName);
		$errSlNo		= commonClass::isSpclChar($slNo);
		$errFilename	= commonClass::isSpclChar($fileName);
		$errAction1		= commonClass::isSpclChar($action1);
		$errAction2		= commonClass::isSpclChar($action2);
		$errAction3		= commonClass::isSpclChar($action3);
		$errStatus		= commonClass::isSpclChar($status);
		$errUpdatedBy	= commonClass::isSpclChar($updatedBy);
		if($errAction ==0 && $errTabId ==0 && $errFuncId ==0 && $errBtnId ==0 && $errTabName ==0 && $errSlNo ==0 && $errFilename ==0 && $errAction1 ==0 && $errAction2 ==0 && $errAction3 ==0 && $errStatus ==0 && $errUpdatedBy ==0)
		{
			$btnSql		= "CALL USP_ADMIN_TAB('$action', '$tabId', '$funcId', '$btnId', '$tabName', '$slNo', '$fileName', '$action1', '$action2', '$action3', '$status', '$description', '$updatedBy', @OUT);";			
			$btnResult	= commonClass::ExecuteQuery($btnSql);
			return $btnResult;
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	//=========== read Tab master =========================
	public function readTab($id)
	{
		$intFuncId		= 0;
		$intBtnId		= 0;
		$strTabName		= '';
		$intSLNo		= 1;
		$fileName		= '';
		$intAction1		= 0;
		$intAction2		= 0;
		$intAction3		= 0;
		$intStatus		= 1;
		$txtDesc		= '';
		$result			= $this->manageTab('V', $id, '0', '0', '', '0', '', '0', '0', '0', '0', '', '0');
		if(commonClass::NumRow($result)>0)
		{
			$row			= mysqli_fetch_array($result);
			$intFuncId		= $row['INT_FUN_ID'];
			$intBtnId		= $row['INT_BTN_ID'];
			$strTabName		= $row['VCH_TAB_NAME'];
			$intSLNo		= $row['INT_SL_NO'];			
			$fileName		= $row['VCH_FILE_NAME'];
			$intAction1		= $row['INT_ACTION1'];
			$intAction2		= $row['INT_ACTION2'];	
			$intAction3		= $row['INT_ACTION3'];	
			$intStatus		= $row['INT_STATUS'];	
			$txtDesc		= $row['VCH_DESCRIPTION'];			
		}
		$arrResult	= array('function'=>$intFuncId, 'btnId'=>$intBtnId, 'tabName'=>$strTabName, 'slNo'=>$intSLNo, 'fileName'=>$fileName, 'action1'=>$intAction1, 'action2'=>$intAction2, 'action3'=>$intAction3, 'status'=>$intStatus, 'description'=>$txtDesc);
		return $arrResult;
	}
	
	//=========== function to add Tab master =======================
	public function addTab($id)
	{
		$userId			= $_SESSION['adminConsole_userID'];
		$numFuncId		= $_POST['selFunc'];
		$numBtnId		= $_POST['selButton'];
		$txtTabName		= $_POST['txtTabName'];
		$numSlNo		= $_POST['intSL'];
		$txtFileName	= $_POST['txtFileName'];
		$numAction1		= ($_POST['chkPermission1']=='')?0:$_POST['chkPermission1'];
		$numAction2		= ($_POST['chkPermission2']=='')?0:$_POST['chkPermission2'];
		$numAction3		= ($_POST['chkPermission3']=='')?0:$_POST['chkPermission3'];
		$numStatus		= 1;
		$txtDesc		= $_POST['txtDescription'];
		$outMsg			= '';
		$flag			= ($id!=0)?1:0;
		$action			= ($id==0)?'A':'U';
		
		$dupResult		= $this->manageTab('CD', $id, $numFuncId, $numBtnId, $txtTabName, '0', '', '0', '0', '0', '0', '', '0');
		if($dupResult)
		{
			$numRow	= mysqli_fetch_array($dupResult);
			if($numRow[0]>0)
			{
				$flag		= 2;
				$outMsg		= 'Tab with this name already exists';				
			}
			else
			{
				$result		= $this->manageTab($action, $id, $numFuncId, $numBtnId, $txtTabName, $numSlNo, $txtFileName,   $numAction1, $numAction2, $numAction3, $numStatus, $txtDesc, $userId);
				if($result)
					$outMsg		= ($action=='A')?'Tab added successfully':'Tab updated successfully';
			}
		}
		$intFuncId		= ($flag==1 || $flag==2)?$numFuncId:0;
		$intBtnId		= ($flag==1 || $flag==2)?$numBtnId:0;
		$strTabName		= ($flag==1 || $flag==2)?$txtTabName:'';
		$intSLNo		= ($flag==1 || $flag==2)?$numSlNo:1;
		$strFileName	= ($flag==1 || $flag==2)?$txtFileName:'';
		$intAction1		= ($flag==1 || $flag==2)?$numAction1:'';
		$intAction2		= ($flag==1 || $flag==2)?$numAction2:'';
		$intAction3		= ($flag==1 || $flag==2)?$numAction3:'';
		$intStatus		= ($flag==1 || $flag==2)?$numStatus:1;
		$strDesc		= ($flag==1 || $flag==2)?$txtDesc:'';	
		$arrResult	= array('msg'=>$outMsg, 'flag'=>$flag, 'function'=>$intFuncId, 'btnId'=>$intBtnId, 'tabName'=>$strTabName, 'slNo'=>$intSLNo, 'fileName'=>$strFileName, 'action1'=>$intAction1, 'action2'=>$intAction2, 'action3'=>$intAction3, 'status'=>$intStatus, 'description'=>$strDesc);
		return $arrResult;
	}
	
	//============= function to delete active and inactive function master ===================
	public function deleteActiveTab($qs,$id)
	{
		$userId		= $_SESSION['adminConsole_userID'];
		$intID		= explode(',',$id);
		$pass		= 0;
		$fail		= 0;
		$action		= $qs;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];	
			$slNumber	= 0;
			//====== update serial number =======	
			if($action=='US')
			{
				$slNumber	= $_POST['txtSLNo'.$indvidualID];
			}		
			$result		= $this->manageTab($action, $indvidualID, '0', '0', '', $slNumber, '', '0', '0', '0', '0', '', $userId);
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
				$msg	.= $fail.' record(s) linked with Tab master and can not deleted.';
		}
		else if($action=='AC')
			$msg	= 'Record(s) activated successfully';
		else if($action=='IN')
			$msg	= 'Record(s) inactivated successfully';
		else if($action=='US')
			$msg	= 'Serial number updated successfully';
		return $msg;
	}
	
	//============ function to get serial number =============
	public function getSerialNo($type)
	{
		// $type as 'G' for Global link, 'P' for primary link, 'B' for button master and 'T' for tab master
		$maxSL	= 1;
		if($type=='G')		
			$result	= $this->manageGL('MS', 0, 0, '', 0, 0, 0, 0);
		else if($type=='P')
			$result	= $this->managePL('MS', 0, 0, 0, '', 0, 0, '', 0, 0, 0);
		else if($type=='B')
			$result	= $this->manageButton('MS', 0, '0', '', '0', '', '0', '0', '0', '0', '0', '', '0');
		else if($type=='T')
			$result	= $this->manageTab('MS', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '', '0');
		if($result)
		{
			$maxRow	= mysqli_fetch_array($result);
			$maxSL	= $maxRow[0];
		}
		return $maxSL;
	}
}
?>
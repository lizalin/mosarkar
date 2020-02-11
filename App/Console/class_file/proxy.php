<?php

require ("classBind.php");
//echo "=======================";exit;
$objLink		= new viewLinks;
$objNode		= new viewNode;
$objdept		= new viewdept;
$objTheme		= new HeaderClass;
$objTiming		= new timing;
$objRoaming		= new classviewIP;
$objPermission	        = new permission;
$objuser		= new UserPass;
$objPolicestation		= new Policestation;
switch($_REQUEST['method']){
	case "gLink":	
		$selVal		= $_REQUEST['SelVal'];		
		$objLink->viewGLDrp($selVal);
	break; 
	case "action":	
		$funcId		= $_REQUEST['FID'];		
		$objLink->viewFuncActions($funcId);
	break; 	
	case "button":	
		$function	= $_REQUEST['FID'];	
		$selVal		= $_REQUEST['SelVal'];		
		$objLink->viewBtnDrp($function,$selVal);
	break; 
	case "SubNode":	
           
		$parentId		= $_REQUEST['parentId'];
		$subNodeId		= $_REQUEST['subNodeId'];	
		$selVal		= $_REQUEST['SelVal'];
                $adminHVal		= ($_REQUEST['adminHID']>0)?$_REQUEST['adminHID']:0;
		$objNode->viewSubnodeValue($subNodeId,$parentId,$selVal,$adminHVal);
	break;
	case "desg":	
		$locId		= $_REQUEST['locId'];
		$selVal		= $_REQUEST['SelVal'];	
		$objdept->viewdeptDrp($locId,$selVal);
	break;
	case "grade":	
		$locId		= $_REQUEST['locId'];
		$selVal		= $_REQUEST['SelVal'];	
		$objdept->viewGardeDrp($locId,$selVal);
	break;
	case "hierarchy":			
		$selVal		= $_REQUEST['SelVal'];	
		$objNode->viewHierarchy($selVal);
	break;	
	case "SubNodevalues":	
		$subNodeId	= $_REQUEST['subNodeId'];
		$selVal		= $_REQUEST['SelVal'];
		$objNode->viewSubnodeValue($subNodeId,0,$selVal);
	break;	
	case "SubNodeParent":	
		$parentId	= $_REQUEST['ParentId'];
		$selVal		= $_REQUEST['SelVal'];
		$objNode->viewSubnodeValue(0,$parentId,$selVal);
	break;	
	case "fillHierarchy":			
		$hID		= $_REQUEST['HID'];
		$objNode->fillLevel($hID);
	break;	
	case "fillHierarchy2":			
		$hID		= $_REQUEST['HID'];
		$objNode->fillLevel($hID);
	break;
	case "fillParent":			
		$pID		= $_REQUEST['ParentId'];
		$class		= $_REQUEST['class'];
		$hdn		= $_REQUEST['hdn'];
		$objNode->fillParent($pID,$class,$hdn);
	break;	
	case "showParent":			
		$pID		= $_REQUEST['ParentId'];		
		$objNode->fillParentLabel($pID);
	break;
	case "userFill":			
		$HID		= $_REQUEST['HID'];
		$selVal		= $_REQUEST['selVal'];
		$objdept->fillUser($HID,$selVal);
	break;
	case "phyLoc":			
		$selVal		= $_REQUEST['SelVal'];
		$objdept->fillPhyLoc($selVal);
	break;
	case "checkUserName":			
		$userName		= $_REQUEST['UName'];
		$objdept->checkUName($userName,'');
	break;
	case "checkMail":			
		$userMail		= $_REQUEST['Mail'];
		$objdept->checkUName('',$userMail);
	break;
	case "UName":			
		$userName		= $_REQUEST['UName'];
		$selVal			= $_REQUEST['selVal'];
		$objdept->fillUName($userName,$selVal);
	break;
	case "theme":
		$objTheme->viewHeaderFooter();
	break;
	case "userDetails":			
		$UID		= $_REQUEST['UID'];
		$objdept->viewUserDetails($objNode,$UID);
	break;
	case "setGL":			
		$UID		= $_REQUEST['UID'];
		$objLink->setPermission($UID);
	break;
	case "showAdmin":			
		$LID		= $_REQUEST['locId'];
		$objdept->showAdmin($LID);
	break;
	case "removeAdmin":			
		$LID		= $_REQUEST['locId'];
		$objdept->removeAdmin($LID);
	break;
	case "shift":			
		$LID		= $_REQUEST['locId'];
		$selVal		= $_REQUEST['SelVal'];
		$objTiming->fillShift($LID,$selVal);
	break;
	case "nShift":			
		$shiftId	= $_REQUEST['shiftId'];
		$type		= $_REQUEST['Type'];
		$objTiming->readNOffTime(0,$shiftId,$type);
	break;
	case "showTiming":			
		$timingId	= $_REQUEST['timingId'];
		$type		= $_REQUEST['Type'];
		$objTiming->readNOffTime($timingId,0,$type);
	break;
	case "showIP":			
		$LID		= $_REQUEST['locId'];
		$objRoaming->viewIP($LID);
	break;
	case "DeleteConfig":			
		$CID		= $_REQUEST['configId'];
		$objRoaming->deleteIP($CID);
	break;
	case "showFlexi":			
		$FID		= $_REQUEST['flexiId'];
		$objTiming->showFlexiTiming($FID);
	break;
	case "ShiftUser":			
		$locId		= $_REQUEST['locId'];
		$shiftId	= $_REQUEST['shiftId'];
		$objTiming->viewShiftUser($locId, $shiftId);
	break;
	case "permission":			
		$UID		= $_REQUEST['UID'];
		$objPermission->viewPermission($UID);
	break;
	case "viewPermission":			
		$ID			= $_REQUEST['ID'];
		$TYPE		= $_REQUEST['TYPE'];
		$objPermission->viewUserPermission($ID,$TYPE);
	break;
	case "ipcount":			
		$LID		= $_REQUEST['locId'];
		$objRoaming->countIP($LID);
	break;
	case "group":			
		$selVal		= $_REQUEST['SelVal'];
		$objdept->fillGroup($selVal);
	break;
	case "grpPermission":			
		$GID		= $_REQUEST['GID'];
		$objPermission->viewGrpPermission($GID);
	break;
	case "grpUsers":			
		$GID		= $_REQUEST['grpId'];
		$objdept->viewGrpUsers($GID);
	break;
	case "plLink":			
		$PID		= $_REQUEST['plId'];
		$selVal		= $_REQUEST['SelVal'];
		$objLink->fillPrimaryLink($PID,$selVal);
	break;
	case "linkPermission":			
		$PID		= $_REQUEST['plId'];		
		$objLink->assignLinkPl($PID);
	break;
        case "setAssemblyTag":			 
		$villageId	= $_REQUEST['villageId'];	
                $assemblyId		= $_REQUEST['assemblyId'];	
		$objNode->setAssemblyTag($villageId,$assemblyId);
	break;
        case "DemographyUserFill":
                $HID		= $_REQUEST['HID'];
		$selVal		= $_REQUEST['selVal'];
		$objdept->fillDemographyUser($HID,$selVal);
	break;
    
    case "resetPass":			
            $UserId		= $_POST['UserId'];
	    $objuser->resetPass($UserId);
	break;
	case "fillRange":			
            $selVal	= $_POST['selVal'];
	        $objPolicestation->fillRange($selVal);
	break;
	case "fillPoliceStation":			
			$selVal	= $_POST['selVal'];
			$exceptId	= $_POST['exceptId'];
	        $objPolicestation->fillPoliceStation($selVal,$exceptId);
	break;
	case "fillPoliceStionExist":			
            $rangeId	= $_POST['rangeId'];
	        $objPolicestation->fillPoliceStionExist($rangeId);
	break;
	case "fillDistrict":			
            $objPolicestation->fillDistrict();
	break;
	case "searchPoliceStion":
	        $districtId  	= $_POST['districtId'];			
            $objPolicestation->searchPoliceStion($districtId);
	break;
	
	

}

?>
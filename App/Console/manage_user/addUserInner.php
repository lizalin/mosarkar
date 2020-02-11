<?php
	/* ================================================
	File Name         	: addUserInner.php
	Description		: This page is used to Add User Profile.	
	Developer Name          : Rasmi Ranjan Swain
	Date Created		: 21-sept-2013	
	Update History		: 
	<Updated by>		<Updated On>		<Remarks>
	Sunil Kumar Parida	27-Sept-2013		Add user
	Rasmi Ranjan Swain	05-Nov-2013	        group filed,filGroup()
	Sunil Kumar Parida	01-Sept-2014		Customize form controls	
	includes			:  ManageUser_class_inc
	Functions Used		: webPath()
	==================================================*/
	include("../class_file/manageUser_class.php");
	$obj			= new user;
	$strPath 		= $obj->webpath();
	$glId			= $_REQUEST['GL'];
	$plId			= $_REQUEST['PL'];
	$pageNo			= $_REQUEST['PG'];
	$recNo			= $_REQUEST['RC'];
	$userId			= (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
    $prevSessionId          = htmlspecialchars($_POST['hdnPrevSessionId'],ENT_QUOTES);
    $session_id             = session_id();
	$gradeTable		= $obj->NumRow($obj->ExecuteQuery("SHOW TABLES LIKE 'm_admin_grade_master'"));
	$groupTable		= $obj->NumRow($obj->ExecuteQuery("SHOW TABLES LIKE 'm_admin_group_master'"));
	$intPhyLocId			= 0;
	$xmlFullName			= 1;
        $xmlShortName			= 1;
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
                $xmlShortName			= $xml_nodes->xpath('//USER_CONTROLS/SHORT_NAME');
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
                 $xmlShortName			= $xmlShortName[0];
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
	//========== Get user max serial no ===========
	$maxSL			= $obj->getUserSlNo();
	
	//========== view user Nmber =================
	$userNumbers	= $obj->getUserNumbers();
	$totalUsers	= $userNumbers[0];
	$activeUsers	= $userNumbers[1];
	$inactiveUsers	= $userNumbers[2];
	$exEmployees	= $userNumbers[3];
	//========= Set default values ===============
	$outMsg			= '';
	$errFlag		= '0';
	$strTab			= 'Add';	
	$strSubmit		= 'Save';
	$strReset		= 'Reset';
	$strOnclick		= 'onclick=window.location.reload()';
        //$strOnclick		= 'onclick=window.location.href= '".APPURL."viewUser';
        
	//$strOnclick		= "onClick=$('#lblChar').html('500'),$('#lblChar1').html('500')";	
	$intGender		= 1;
	$intEPF			= 2;
	$intStatus		= 1;
	$display		= 'display:none;';
	//=========== In case of edit ===============
	if($userId>0)
	{
		$strTab			= 'Edit';	
		$strSubmit		= 'Update';
		$strReset		= 'Cancel';
		$readUser		= $obj->manageUser('V', $userId, '', '0', '0000-00-00', '', '', '', '', '', '', '', 
                        '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', 
                        '0', '0', '0', '0', '0', '0', '0','0');
		if(mysqli_num_rows($readUser)>0)
		{
			$readUserRow		= mysqli_fetch_array($readUser);
			$strFullName		= $readUserRow['VCH_FULL_NAME2'];
                        $strShortName		= $readUserRow['VCH_FULL_NAME'];
                        $accessType		= $readUserRow['INT_ACCESS_TYPE'];
			$intGender		= $readUserRow['INT_GENDER'];
			$dtmDtOfBirth		= date("d-m-Y",strtotime($readUserRow['DTM_DATE_OF_BIRTH']));
			$explDOB		= explode('-',$dtmDtOfBirth);
			$strQualification	= $readUserRow['VCH_QUALIFICATION'];
			$strSpecialization	= $readUserRow['VCH_SPECIALIZATION'];
			//$strHobby		= $readUserRow['VCH_HOBBY'];
			$strImage		= $readUserRow['VCH_IMAGE'];
			$strPhExtnNo		= $readUserRow['VCH_PH_NO'];
			$explPhExtnNo		= explode('/',$strPhExtnNo);
			$strPhNo			= $explPhExtnNo[0];
			$strExtnNo			= $explPhExtnNo[1];
			$strMobNo			= $readUserRow['VCH_MOBILE_NO'];
			$strEmail			= $readUserRow['VCH_EMAIL'];
			$strAddress			= htmlspecialchars_decode($readUserRow['VCH_ADDRESS'],ENT_NOQUOTES);
			$intHierarchyId		= $readUserRow['INT_SUBNODEVAL_ID'];
			$intPhyLocId		= $readUserRow['INT_PH_LOCATION'];
			$intEmpType			= $readUserRow['INT_EMP_TYPE'];
			$dtmDtOfJoin		= date("d-m-Y",strtotime($readUserRow['VCH_DATE_OF_JOIN']));
			$dtmProbotionDt		= ($readUserRow['VCH_PROBATION_DATE']!='')?date("d-m-Y",strtotime($readUserRow['VCH_PROBATION_DATE'])):'';
			$intDesgId			= $readUserRow['INT_DESIGNATION_ID'];
			$intGradeId			= $readUserRow['INT_GRADE_ID'];
			$intPrivilege		= $readUserRow['INT_PRIVILEGE'];
			$intAttendance		= $readUserRow['INT_ATTENDANCE'];
			$intPayRoll			= $readUserRow['INT_PAY_ROLL'];
			$intOfcPrivilege		= $readUserRow['INT_EPF'];
			$strUserName		= $readUserRow['VCH_USER_NAME'];
			$strDomainName		= $readUserRow['VCH_DOMAIN_USER_NAME'];
			$maxSL				= $readUserRow['INT_SLNO'];
			$intStatus			= $readUserRow['INT_STATUS'];
			$intPrimaryRA		= $readUserRow['INT_PRIMARY_RA'];
			$strPrimaryRAName	= $readUserRow['PRIMARY_RA_NAME'];
			$intSecondaryRA		= $readUserRow['INT_SECONDARY_RA'];
			$strSecondaryRAName	= $readUserRow['SECONDARY_RA_NAME'];
			$intOptionalRA		= $readUserRow['INT_OPTIONAL_RA'];
			$strOptionalRAName	= $readUserRow['OPTIONAL_RA_NAME'];
			$intRACheck			= $readUserRow['INT_RA_CHECK'];
			$intGroupId			= $readUserRow['INT_GROUP_ID'];
                        
			$readOnly			= 'readonly="readonly"';
			$strOnclick			= "onClick=doCancel('viewUser/".$glId."/".$plId."/".$pageNo."/".$recNo."');";
			$display			= ($strImage!='')?'':'display:none;';
		  }
            
       }
	if(isset($_POST['btnSubmit']))
	{
           //echo "<pre>";print_r($_POST);exit;
             
		$result		= $obj->addUpdateuser($userId,$gradeTable,$groupTable);
		$outMsg		= $result['msg'];
                //print_r($outMsg);exit;
		$errFlag	= $result['flag'];
                $redirectLoc            = URL . "viewUser";
            
	}
	
	$officeSql	= "CALL USP_DEPARTMENT('F', 0, '', 0,'','0','0','0','','');";
	$officeRes	= $obj->ExecuteQuery($officeSql);
	$offOpts	= '<option value="0">--Select--</option>';
	if($officeRes->num_rows>0)
	{
		while($offRow = $officeRes->fetch_array())
		{
			$selected	= ($intPhyLocId==$offRow[0])?'selected="selected"':'';
			$offOpts .= '<option value="'.$offRow[0].'" '.$selected.'>'.$offRow[1].'</option>';
		}
	}
?>
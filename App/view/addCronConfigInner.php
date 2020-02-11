<?php
	/* ================================================
	File Name         	    : addEscalationInner.php
	Description		    : This is used to add escalation level.
	Developed By		    : Amitashree Mallick
	Developed On		    : 27-Sept-2016
	Update History              :
	<Updated by>		<Updated On>		<Remarks>
     
	Class Used		    : clsEscalation()
	Functions Used              : readEscalation(),addUpdateEscalation(),
	==================================================*/	
    //======================= Permission ===========================  
//print_r($_REQUEST);exit;

    $id              = (isset($_REQUEST['ID'])) ? $_REQUEST['ID'] : 0; 
        include_once(CLASS_PATH.'clsCronConfig.php');
        $objCron        = new clsCronConfig;
       // $model          = new Model();
        $userId         = $_SESSION['adminConsole_userID']; 
        $adminConsole_Privilege = $_SESSION['adminConsole_Privilege'];
        $glId           = $_SESSION['sessGLVal'];    
        $plId           = $_SESSION['sessPLVal'];    
        $page           =(trim(htmlspecialchars_decode($_REQUEST['PG'])));
        $explPriv       = $objCron->checkPrivilege($userId, $glId, $plId, 'A',$page); 
        $editPriv       = $explPriv['edit'];    
        $noView         = $explPriv['View'];    
        $noAdd          = $explPriv['add'];    
        $noManage       = $explPriv['Manage'];    
        $delete         = $explPriv['delete'];
        if ($adminConsole_Privilege>1 && $noAdd == 'no' || ($_REQUEST['ID']!='' && $noEdit=='no')){           
            echo "<script>location.href = '".APPURL."viewCronConfig';</script>";   
        }
    //======================= Permission ===========================
    require(CLASS_PATH.'cls-social-account.php');
    $objSocial       = new clsSocialAccount;    
    $accountResult   = $objSocial->manageAccount('V', 0, '', '', '', '', '','',0,0,1,0,'');

    
    //echo $gl."=".$pl."=".$id;exit;
    $strSubmit       = ($id > 0) ? 'Update' : 'Submit';
    $strReset        = ($id > 0) ? 'Cancel' : 'Reset';
    $strTab          = ($id > 0) ? 'Edit' : 'Add';
    $strclick        = ($id > 0) ? "window.location.href='" . APPURL . "viewCronConfig'" : "";
    //========== Default variable ===============	
    $flag            = 0;
    $errFlag         = 0;
    $outMsg          = '';
    $intCategory     = 0;
    $intType         = 0;
    $intLinkType     = 1;
    $intCategoryType = 0;
   // $ddComplaintType = $id;
    
//============ Button Submit ===================
if(isset($_POST['hdnQs']) && $_POST['hdnQs'])
{
//print_r($_POST);exit;
    $result             = $objCron->addUpdateCronjob($id);
    $outMsg             = $result['msg'];
    $flag               = $result['flag'];
    $selJobType         = $result['selJobType'];
    $selUser            = $result['selUser'];
    $txtFrequency       = $result['txtFrequency'];
    $txtJobName         = $result['txtJobName'];
    $redirectLoc        = APPURL . "viewCronConfig/".$id;
}

//=========== For editing ======================
if (isset($_REQUEST['ID'])) 
{

    $result             = $objCron->readCronConfig($id);
    $intJobId           = $result['intJobId'];
    $selJobType         = $result['intJobType'];
    $selUser            = $result['intAccountId'];
    $txtFrequency       = $result['txtFrequency'];
    $jobName            = $result['vchJobName'];
    $accountType        = $result['intAccountType'];
    //$redirectLoc        =  APPURL."viewEscalation/";
}
?>
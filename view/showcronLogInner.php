<?php

    /* ================================================
    File Name           : viewCronConfig.php
    Description		      : This page is used for escalation Level.
    Devloper Name	      : Ashok Kumar Samal
    Date Created	      : 01-07-2017
    Update History	    :
    <Updated by>	   <Updated On>		<Remarks>

    Class Used		    : clsEscalation()
    ================================================== */
    //======================= Permission ===========================  




        include_once(CLASS_PATH.'clsCronConfig.php');
        $objCron        = new clsCronConfig;
        

//        try{
//            $objCron->executeQry($q1);
//        }
//        catch(Exception  $e){
//           print_r($e); 
//        }
//        exit;
        
        $isPaging       = 0;
        $pgFlag         = 0;
        $intPgno        = 1;
        $intRecno       = 0;
        $ctr            = 0;
        $radType        = 0;
        $userId         = $_SESSION['adminConsole_userID']; 
        //======================= Permission ===========================
        $adminConsole_Privilege = $_SESSION['adminConsole_Privilege'];
        $pageName       = $_REQUEST['PAGE'].'.php';
        $glId           = $_SESSION['sessGLVal'];    
        $plId           = $_SESSION['sessPLVal'];    
        $page           =(trim(htmlspecialchars_decode($_REQUEST['PG'])));
        $explPriv       = $objCron->checkPrivilege($userId, $glId, $plId, 'V',$page);
        $editPriv       = $explPriv['edit'];    
        $noView         = $explPriv['View'];    
        $noAdd          = $explPriv['add'];    
        $noManage       = $explPriv['Manage'];    
        $delete         = $explPriv['delete'];

        if ($adminConsole_Privilege>1 && $noView == 'no')
        {           
            echo "<script>location.href = '".APPURL."dashboard';</script>";   
        }


    //======================= Pagination ===========================*/
	
	if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
		$isPaging=1;
	if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
	{
		$intPgno=$_REQUEST['hdn_PageNo'];
		$pgFlag	= 1;
	}
	if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
	{	
		$intRecno=$_REQUEST['hdn_RecNo'];
		$pgFlag	= 1;
	}
	if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
	{
		$intRecno	= (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
		$intPgno	= (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
	}
	else	
		unset($_SESSION['paging']);
        
        $selJobType       = (isset($_REQUEST['selJobType']) && $_REQUEST['selJobType'] != '')?htmlspecialchars($_REQUEST['selJobType'],ENT_QUOTES):0;
        $userId           = (isset($_REQUEST['selUser']) && $_REQUEST['selUser'] != '')?htmlspecialchars($_REQUEST['selUser'],ENT_QUOTES):0;
        $jobName          = (isset($_REQUEST['txtJobName']) && $_REQUEST['txtJobName'] != '')? htmlspecialchars($_REQUEST['txtJobName'],ENT_QUOTES):'';
       
         //============= Delete/Active function =================
	if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
	{
		$qs             = $_REQUEST['hdn_qs'];
		$ids            = $_REQUEST['hdn_ids'];
		$outMsg         = $objCron->deleteCronConfig($qs,$ids);
	}
        if($isPaging==0)
                              
            $result		= $objCron->viewData('PGH',$intRecno,$_REQUEST['ID'],'',0,'','',0,0,'','','0000-00-00');

       else
	{
      $intPgno	= 1;
      $intRecno	= 0;
      $result                      = $objCron->viewData('VH',0,$_REQUEST['ID'],'',0,'','',0,0,'','','0000-00-00');
	}
      $totalResult                 = $objCron->viewData('CTH',0,$_REQUEST['ID'],'',0,'','',0,0,'','','0000-00-00'); 
       
      $totalCount                  = $totalResult->fetch_array();
      $intTotalRec                 = $totalCount[0]; 
      $intCurrPage                 = $intPgno;
      $intPgSize                   = 10;
      $_SESSION['paging']['recNo'] = $intRecno;
      $_SESSION['paging']['pageNo']= $intPgno;
        
      	//============ Button Submit ===================

        
    
?>
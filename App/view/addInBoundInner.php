<?php
 /* * ******************************************
  File Name    	: add InBound
  Description  	: 
  Created By	: Puja Kumari
  Created On	: 23-09-2019
  Developed By  : Puja Kumari
  Developed On  : 
  Update History :
  <Updated by>		<Updated On>		<Remarks>

  Class Used		 : clsInBound
  Functions Used   : 
==================================================*/
    include_once(CLASS_PATH."clsInBound.php");
    $obj             = new clsInBound;
    $id              = (isset($_REQUEST['ID']) && $_REQUEST['ID'] != '') ? $obj->decrypt($_REQUEST['ID']):0; 
    // echo $id;exit;
    $strSubmit       = ($id>0)?'Update':'Submit';
    $strReset        = ($id>0)?'Cancel':'Reset';
    $strTab          = ($id>0)?'Edit':'Add';
    $strclick        = ($id>0)?"window.location.href='". APPURL."view-trade-nature/".$obj->decrypt($_REQUEST['ID'])."';":"";  
//========== Default variable ===============				
    $intWinStatus       = 1;
    $flag               = 0;  
    $errFlag            = 0;
    $redirectLoc        = ''; 
    $outMsg             = '';
 //=========== For Permission======================
    $glId               = $_REQUEST['GL'];
    $plId               = $_REQUEST['PL'];  
    // print"<pre>"; 
    // print_r($_POST);exit;
    $intServiceRegistrationId       =  0;
          $intDepartmentId          =  0;
          $vchFaqQuestion           =  '';
          $vchFaqAnswer             =  '';
 //============ Button Submit ===================//
 if(isset($_POST['hdnQs']) && $_POST['hdnQs'] == 'U' &&   !empty($_SESSION['onlyOnce']) && $_SESSION['onlyOnce']==1)
 {
     try {
           $result              =  $obj->addUpdateInBound($id);
           $outMsg              =  $result['msg']; 
           $errFlag             =  $result['errFlag'];
         
		if($result['errFlag']==1){
			$redirectLoc	      =  APPURL."addInBound";
		}else{        
              $redirectLoc	      =  APPURL."addInBound";
      }
       
      }
     catch(Exception $e) 
      {
          $outMsg = 'Sorry..This service is down. Please visit after some time';
      }  
     
 }else if(isset($_POST['hdnQs']) && $_POST['hdnQs'] == 'A' && !empty($_SESSION['onlyOnce']) && $_SESSION['onlyOnce']==1){
    try {
      $result              =  $obj->addUpdateInBoundNotRegister($id);
      $outMsg              =  $result['msg']; 
      $errFlag             =  $result['errFlag'];
      if($result['errFlag']==1){
        $redirectLoc        =  APPURL."addInBound";
      }else{        
        $redirectLoc        =  APPURL."addInBound";
      }
       
    }
    catch(Exception $e) 
    {
      $outMsg = 'Sorry..This service is down. Please visit after some time';
    }  
 }else if(isset($_POST['hdnQs']) && $_POST['hdnQs'] && empty($_SESSION['onlyOnce'])){
    $outMsg = 'Sorry..This service is down. Please visit after some time';
    $redirectLoc        =  APPURL."addInBound";
    header("Location: ".$redirectLoc);
 }

  //=========== For editing ======================
   if(isset($id) && $id>0)
	{ 
      try {
       //============ Read value for updation ===========	
          $result                         =  $obj->readInBound('R',$id);
          $intServiceRegistrationId       =  $result['intServiceRegistrationId'];
          $intDepartmentId                =  $result['intDepartmentId'];
          $vchFaqQuestion                 =  $result['vchFaqQuestion'];
          $vchFaqAnswer                   =  $result['vchFaqAnswer'];
          //print_r($intServiceRegistrationId);exit;
      	 // $redirectLoc	                  =  APPURL."view-trade-nature/".($id);
      } 
     catch(Exception $e) 
     {
          $outMsg = 'Sorry..This service is down. Please visit after some time';
     }     
	}	
 
?>

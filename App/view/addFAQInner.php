<?php
 /* * ******************************************
  File Name    	: add FAQ
  Description  	: 
  Created By	: Puja Kumari
  Created On	: 23-09-2019
  Developed By  : Puja Kumari
  Developed On  : 
  Update History :
  <Updated by>		<Updated On>		<Remarks>

  Class Used		 : clsFAQ
  Functions Used   : 
==================================================*/

    include_once(CLASS_PATH."clsFAQ.php");
    $obj             = new clsFAQ;
    $id              = (isset($_REQUEST['ID']) && $_REQUEST['ID'] != '') ? $obj->decrypt($_REQUEST['ID']):0; 
    //echo $id;exit;
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
    //print_r($_POST);exit;
    $intServiceRegistrationId       =  0;
          $intDepartmentId          =  0;
          $vchFaqQuestion           =  '';
          $vchFaqAnswer             =  '';
 //============ Button Submit ===================//
 if(isset($_POST['hdnQs']) && $_POST['hdnQs'])
 {
     try {
           $result              =  $obj->addUpdateFAQ($id);
           $outMsg              =  $result['msg']; 
           $errFlag             =  $result['errFlag'];
         
		if($result['errFlag']==1){
			$redirectLoc	      =  APPURL."addFAQ";
		}else{        
                        $redirectLoc	      =  APPURL."viewFAQ";
                }
       
      }
     catch(Exception $e) 
      {
          $outMsg = 'Sorry..This service is down. Please visit after some time';
      }  
     
 }

  //=========== For editing ======================
   if(isset($id) && $id>0)
	{ 
      try {
       //============ Read value for updation ===========	
          $result                         =  $obj->readFAQ('R',$id);
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

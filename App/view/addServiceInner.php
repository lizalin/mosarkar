<?php
 /* * ******************************************
  File Name    	: 
  Description  	: 
  Created By	: 
  Created On	: 
  Developed By  : 
  Developed On  : 
  Update History :
  <Updated by>		<Updated On>		<Remarks>

  Class Used		 : clsGmsReport
  Functions Used   : 
==================================================*/

    include_once(CLASS_PATH."clsService.php");
    $obj             = new clsService;
    $id              = (isset($_REQUEST['ID']) && $_REQUEST['ID'] != '') ? $obj->decrypt($_REQUEST['ID']):0; 
    //echo $id;
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
 //============ Button Submit ===================//
 if(isset($_POST['hdnQs']) && $_POST['hdnQs'])
 {
     try {
           $result              =  $obj->addUpdateSerivice($id);
       
            $outMsg              =  $result['msg']; 
            $errFlag             =  $result['errFlag'];
         
		if($result['errFlag']==1){
			$redirectLoc	      =  APPURL."addService";
		}else{        
                        $redirectLoc	      =  APPURL."viewService";
                }
       
      }
     catch(Exception $e) 
      {
          $outMsg = 'Sorry..This service is down. Please visit after some time';
      }  
     
 }

  //=========== For editing ======================
 // print_r($_REQUEST['ID']);exit;
 //   if(isset($id) && $id>0)
	// { 
 //      try {
 //       //============ Read value for updation ===========	
 //          $result                         =  $obj->readService('R',$id);
 //          $intServiceRegistrationId       =  $result['intServiceRegistrationId'];
 //          //print_r($intServiceRegistrationId);exit;
 //      	 // $redirectLoc	                  =  APPURL."view-trade-nature/".($id);
 //      } 
 //     catch(Exception $e) 
 //     {
 //          $outMsg = 'Sorry..This service is down. Please visit after some time';
 //     }     
	// }	
 
?>

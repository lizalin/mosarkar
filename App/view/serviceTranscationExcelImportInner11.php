<?php
 /* * ******************************************
  File Name    	: serviceTranscationExcelImportInner.php
  Description  	: Used for import the excel data in to the table
  Created By	: Chinmayee
  Created On	: 23-09-2019
  Developed By  : Chinmayee
  Developed On  : 23-09-2019
  Update History :
  <Updated by>		<Updated On>		<Remarks>

  Class Used		 : clsTransactionDataImport
  Functions Used   : transactionDataImport,
==================================================*/
//print_r($_SESSION);
    include_once(CLASS_PATH."clsTransactionDataImport.php");
    $obj             = new clsTransactionDataImport;
    $id              = (isset($_REQUEST['ID']) && $_REQUEST['ID'] != '') ? $obj->decrypt($_REQUEST['ID']):0; 
//========== Default variable ===============				
    $intWinStatus       = 1;
    $flag               = 0;  
    $errFlag            = 0;
    $redirectLoc        = ''; 
    $outMsg             = '';
   

    // print_r($_FILES);exit;
 //============ Button Submit ===================//
 if(isset($_POST['hdnQs']) && $_POST['hdnQs']=='U')
 {
     try {
           $result              =  $obj->transactionDataImport();
       
           $flag            		=  $result['flag'];
           $excel_data        		=  $result['excel_data'];
           $arrRow                  =  $result['arrRow'];
           $outMsg          		=  $result['msg'];
         
		if($result['errFlag']==1){
			$redirectLoc	      =  APPURL."serviceTranscationExcelImport";
		}else{        
            $redirectLoc	      =  APPURL."serviceTranscationExcelImport";
         }
       
      }
     catch(Exception $e) 
      {
          $outMsg = 'Sorry..This service is down. Please visit after some time';
      }  
     
 }

	
 
?>

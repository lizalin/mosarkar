<?php 
/* =================================================
  File Name         	  : viewfeedbackInner.php
  Description		      : This is used for display assigned transcation for the corresponding logged In user.
  Developed By            : Ashis kumar Patra
  Developed On            : 01-Jan-2017
  Update History          : <Updated by>		<Updated On>		<Remarks>

  Style sheet             :
  Javscript Files         :
  includes		  :

  ================================================== */
  //print_r($_REQUEST);exit;
  $id=  (isset($_REQUEST['ID']) && $_REQUEST['ID'] != '') ?$_REQUEST['ID']:0; 

  // include_once(CLASS_PATH."clsTransactionDataImport.php");
  // $obj             = new clsTransactionDataImport;
  // $result          =  $obj->fetchTransactionDataImport('CTR');
  // $totalRecCnt     = 0;
  // if($result->num_rows >0){
  //   $cntRow=$result->fetch_array();
  //   $totalRecCnt=$cntRow['totalRec'];
  // }
  //print_r($result);



?>
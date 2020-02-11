<?php
//echo "<pre>";print_r($_SESSION);exit;
/* 
    File Name         	: viewNewsInner.php
    Description		: This is used for analyze the query.
    Devloped By		: Ajit Kumar Sahoo
    Date Created	: 22-June-2016
    Update History	:
    <Updated by>		<Updated On>		<Remarks>
 */
$permission         = 'N';
$step2Verification  = 0;
if($_SESSION['adminConsole_userID']==1){
  $permission         = 'Y';
if ($_SESSION['step2Verification']==1){
    $step2Verification  = 1; 
    }else {
    $step2Verification  = 0; 
    }
}else{
  $permission  = 'N';  
}
$objQuery      = new clsQuery;
$elementsSql	= "
	SELECT TABLE_NAME, 'TABLE' AS ROUTINE_TYPE, TABLE_TYPE AS DEFINATION
	FROM information_schema.tables
	WHERE TABLE_TYPE = 'BASE TABLE' AND information_schema.tables.table_schema = '".DB_NAME."'
	
	UNION ALL
	
	SELECT TABLE_NAME, 'VIEW' AS ROUTINE_TYPE, VIEW_DEFINITION AS DEFINATION
	FROM information_schema.views
	WHERE information_schema.views.table_schema  = '".DB_NAME."'
    UNION ALL 
    
    SELECT ROUTINE_NAME, ROUTINE_TYPE, ROUTINE_DEFINITION FROM information_schema.ROUTINES 
	WHERE information_schema.ROUTINES.ROUTINE_SCHEMA  = '".DB_NAME."';
	";
        
	$resElements	= $objQuery->manageQuery($elementsSql);




$query         = trim($_REQUEST['dqs']);
if($query!='')
{
        $result        = $objQuery->manageQuery2($query);
   
}

if (isset($_POST['btnSubmit2nd'])) 
  {
      $txtPass2nd = $_POST['txtPass2nd'];
      if($txtPass2nd=='query@admin#123'){
        $_SESSION['step2Verification']=1;  
      }
      else{
        $_SESSION['step2Verification']=0;   
      }
  }

//if(is_object($result))
//{
//  print_r($result);  
//  $field_count   = $result->field_count;
//}
//else{
//    print_r ($result);
//}




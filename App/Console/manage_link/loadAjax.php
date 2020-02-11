<?php
/* ================================================
	File Name         	  : loadAjax.php
	Description			  : This page is used to Add the Global Links.	
	Created By			  :	Sunil Kumar Parida
    Created On			  :	19th-Nov-2012
	Update History		  :
	<Updated by>			<Updated On>		<Remarks>
	Sunil Kumar Parida		29-11-2012			Class Implement									
	
	includes			  : consoleconnection.php,commonfunction.php,errorcheck.php,sessioncheck.php
	==================================================*/
	include("../class_file/PLink_controler.php");
	if(isset($_REQUEST['GL']) && $_REQUEST['GL']>0)
	{
		$intGlId	= $_REQUEST['GL'];
		$sql = "CALL USP_ADMIN_PLINK('GM','0','$intGlId','','0','0','0','0',@OUT);";
		$result = $commonObj->ExecuteQuery($sql);
		$row	= mysqli_fetch_assoc($result);
		$intSlNo= intval($row['MAX_SL'])+1;
		echo $intSlNo;
	}
?>

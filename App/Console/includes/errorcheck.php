<?php
/* ================================================
File Name		:		ErrorCheck.php
Created By		:		Sudam Chandra Panda
Created Dae		:		28th-mar-2011
Modified Date	:		
Description		:		This page is used to Check the special character.
==================================================*/

?>
<?php 
	error_reporting(E_ALL - E_NOTICE);
	
	function isSpclChar($strToCheck,$redirectTo)
	{
		$splCharToCheck	=	"<,>,',%,;,=,--";
		$arrySplChar	=	explode(',',$splCharToCheck);
		//$strpath 		=   $arrySplChar[3];
		for ($i=0; $i<count($arrySplChar); $i++)
		{
			$intPos=substr_count($strToCheck,trim($arrySplChar[$i]));
			if ($intPos>0)
				{
					header("Location:".$strPath.$redirectTo."?splChar=".$i);
				}
		}
	}
?>



<?php
/*============================================================
Page Name		:	Function_controler.php
Description		:	Controler Function & Business logic
Created By		:	Sunil Kumar Parida
Created On		:	29-Nov-2012
Update History	:
<Updated by>		<Updated On>		<Remarks>
Sunil Kumar Parida	29-Nov-2012			Methods in class

Functions Used	:	connectToDatabase();closeConnection();
==============================================================*/
	if(file_exists('../config.php'))
	{
		include('../config.php');
	}
$commonObj	= new commonClass();
include(ABSPATH."\includes\errorcheck.php");
include_once(ABSPATH."\includes\sessioncheck.php");
$strPath = webpath();
//============== function for Get the Function details ===============================
	function GetDataDetails($obj,$action,$FID)
	{		
		$intSessionID	= $_SESSION['userID'];		
		$result = $obj->ExecuteQuery("CALL CSP_ADMIN_FUNCTION_MASTER('$action','$FID','','','',$intSessionID,@P_OUT);");
		return $result;
	}
//======== View Function Details ==============
	function ViewFunction($Obj,$action,$start)
	{
		$intSessionID	= $_SESSION['userID'];
		$result = $Obj->ExecuteQuery("CALL CSP_ADMIN_FUNCTION_MASTER('$action','$start','','','',$intSessionID,@P_OUT);");
		return $result;
	}
	//======== Delete Function Details ==============
	function DeleteFunction($Obj,$action,$FID)
	{
		$intSessionID	= $_SESSION['userID'];
		$intFID = explode(',',$FID);
		for($cnt=0;$cnt<=count($intFID);$cnt++)
		{
			$thing=$intFID[$cnt];
			$intSessionID	= $_SESSION['userID'];
			$result = $Obj->ExecuteQuery("CALL CSP_ADMIN_FUNCTION_MASTER('$action','$thing','','','',$intSessionID,@P_OUT);");
		}
		if($result)
		{
			$out_msg="Record(s) Deleted Successfully";
			GenerateXML($commonObj,'RX',$Fid);
		}
		
		return $out_msg;
	}
	// ************** Generate Function Master XML  and Created By Sudam Chandra Panda 01_08_2012 *************************
	function GenerateXML($Obj,$action,$FID)
	{		
		$sqlXML="CALL CSP_ADMIN_FUNCTION_MASTER('$action',$FID,'','','',0,@out);";
		$XMLResult=$Obj->ExecuteQuery($sqlXML);
			if($XMLResult)
			{
				$ctr	= 0;
				$file= fopen("../xml/Function.xml", "w");
				$strXMLData="<?xml version='1.0' encoding='UTF-8' ?>\n";
				$strXMLData.="<Master>\n";
					while($rows=mysqli_fetch_array($XMLResult))
					{
						$ctr++;
						$strXMLData.="\t<Function ID='".$ctr."'>\n";		
						$strXMLData.="\t\t<ID>".$rows['INT_FUN_ID']."</ID>\n";
						$strXMLData.="\t\t<FunctionName>".$rows['VCH_FUN_NAME']."</FunctionName>\n";
						$strXMLData.="\t\t<FileName>".$rows['VCH_FILE_NAME']."</FileName>\n";
						$strXMLData.="\t\t<Description>".$rows['VCH_DESCRIPTION']."</Description>\n";
						$strXMLData.="\t</Function>\n";
					}
				$strXMLData.="</Master>";
				fwrite($file, $strXMLData);
				fclose($file);
			}
	}
?>

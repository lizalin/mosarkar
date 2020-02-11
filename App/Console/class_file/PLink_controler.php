<?php
/*============================================================
Page Name		:	PLink_controler.php
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
//========= Read Primary Link Details ==========================
	function GetDataDetails($obj,$action,$PLID)
	{		
		$sql 	= "CALL USP_ADMIN_PLINK('$action','$PLID','0','','0','0','0','0',@OUT);";
		$result = $obj->ExecuteQuery($sql);
		return $result;
	}
 //============ View Primary Link Details ===================
	function ViewPL($obj,$action,$start,$GLID)
	{		
		$arrParam = array($action,$start,$GLID,'','0','0','0','0');
		$result = $obj->callProcedure("USP_ADMIN_PLINK",$arrParam,'@P_OUT',false);
		return $result;
	}
	//============ Delete Function Details ======================
	function DeleteGL($obj,$action,$FID)
	{
		$intSessionID	= $_SESSION['userID'];
		$intFID = explode(',',$FID);
		for($cnt=0;$cnt<=count($intFID);$cnt++)
		{
			$thing=$intFID[$cnt];
			$arrParam = array($action,$thing,'0','','0','0','0',$intSessionID);
			$result=$obj->callProcedure("USP_ADMIN_PLINK",$arrParam,'@P_OUT',false);			
		}
		if($result)
		{
			$out_msg='<span class="greenTxt">Link(s) Deleted Successfully</span>';
			GenerateXML($obj);
		}
		return $out_msg;
	}
	
	// =============== Generate Primary Link Master XML and Created By Sunil Kumar Parida On 16-11-2012 ==================
	function GenerateXML($obj)
	{			
		$sqlXML="CALL USP_ADMIN_PLINK('V','0','0','','0','0','0','0',@P_OUT);";
		$XMLResult=$obj->ExecuteQuery($sqlXML);
			if($XMLResult)
			{
				$file= fopen("../xml/PLink.xml", "w");
				$strXMLData="<?xml version='1.0' encoding='UTF-8' ?>\n";
				$strXMLData.="<PLMaster>\n";
					while($rows=mysqli_fetch_array($XMLResult))
					{
						$strXMLData.="\t<PLink>\n";		
						$strXMLData.="\t\t<PLID>".$rows['INT_PL_ID']."</PLID>\n";
						$strXMLData.="\t\t<GLID>".$rows['INT_GL_ID']."</GLID>\n";
						$strXMLData.="\t\t<PLName>".$rows['VCH_PL_NAME']."</PLName>\n";
						$strXMLData.="\t\t<SlNo>".$rows['INT_SL_NO']."</SlNo>\n";
						$strXMLData.="\t\t<FuncID>".$rows['INT_FUN_ID']."</FuncID>\n";
						$strXMLData.="\t\t<Status>".$rows['INT_STATUS']."</Status>\n";
						$strXMLData.="\t</PLink>\n";
					}
				$strXMLData.="</PLMaster>";
				fwrite($file, $strXMLData);
				fclose($file);
			}
	}
?>
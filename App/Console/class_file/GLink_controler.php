<?php
/*============================================================
Page Name		:	GLink_controler.php
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
//========= Read Global Link Details =================
	function GetDataDetails($clasObj,$action,$GLID)
	{		
		$sql = "CALL USP_ADMIN_GLINK('$action','$GLID','',0,0,0,@OUT);";
		$result = $clasObj->ExecuteQuery($sql);
		return $result;
	}
//======== View Function Details ==============
	function ViewGL($obj,$action,$start)
	{		
		$intSessionID	= $_SESSION['userID'];
		$arrParam = array($action,$start,'','0','0','0');
		$result = $obj->callProcedure("USP_ADMIN_GLINK",$arrParam,'@P_OUT',false);
		return $result;
	}
	//======== Delete Function Details ==============
	function DeleteGL($obj,$action,$FID)
	{
		$intSessionID	= $_SESSION['userID'];
		$intFID = explode(',',$FID);
		for($cnt=0;$cnt<=count($intFID);$cnt++)
		{
			$thing=$intFID[$cnt];
			$arrParam = array($action,$thing,'','0','0',$intSessionID);
			$obj->callProcedure("USP_ADMIN_GLINK",$arrParam,'@P_OUT',false);			
			$out_msg='<span class="greenTxt">Link(s) Deleted Successfully</span>';
		}
		return $out_msg;
	}
	// =============== Generate Golbal Link Master XML and Created By Sunil Kumar Parida On 16-11-2012 ==================
	function GenerateXML($obj)
	{			
		$sqlXML="CALL USP_ADMIN_GLINK('V','0','','0','0','0',@P_OUT);";
		$XMLResult=$obj->ExecuteQuery($sqlXML);
			if($XMLResult)
			{
				$file= fopen("../xml/GLink.xml", "w");
				$strXMLData="<?xml version='1.0' encoding='UTF-8' ?>\n";
				$strXMLData.="<GLMaster>\n";
					while($rows=mysqli_fetch_array($XMLResult))
					{
						$strXMLData.="\t<GLink>\n";		
						$strXMLData.="\t\t<GLID>".$rows['INT_GL']."</GLID>\n";
						$strXMLData.="\t\t<GLName>".$rows['VCH_GL_NAME']."</GLName>\n";
						$strXMLData.="\t\t<SlNo>".$rows['INT_SL_NO']."</SlNo>\n";
						$strXMLData.="\t\t<Status>".$rows['INT_STATUS']."</Status>\n";
						$strXMLData.="\t</GLink>\n";
					}
				$strXMLData.="</GLMaster>";
				fwrite($file, $strXMLData);
				fclose($file);
			}
	}
?>
<?php 
	error_reporting(E_ALL - E_NOTICE);
	session_start();
	$strTitle = "Project Master :: e-PMS (Project Monitoring System), Bihar Medical Service and Infrastructure Corporation Limited";
// ************** GET Get format Date Path and Created By Sudam Chandra Panda 27_06_2012 *************************
function pubFormatDate($date)
	{
		$date = dateconvert("date", 1);
		echo $date;
	}
// ************** GET Query Stsring path Path and Created By Sudam Chandra Panda 27_06_2012 *************************
function webPath()
	{
		$strPath 		= "../";
		$strQS			= $_SERVER['QUERY_STRING'];
		$intQSCount		= count(explode("&",$strQS));
		//echo $intQSCount."<br>";
		if($intQSCount>0)
			{
				for($i=1;$i<$intQSCount;$i=$i+1)
					{
						$strPath="../".$strPath;
					}
			}
		return $strPath;
	}
//echo $strPath;
// ************** ExecuteScalar and created by Sudam Chandra Panda on 27_06_2012 *************************
function ExecuteQuery($strSql)
	{
		$con = OpenConn();
		$result=mysqli_query($con,$strSql);
		CloseConn($con);
		return $result;
	}
// ************** Escape Spcial Character and created by Sudam Chandra Panda on 27_06_2012 *************************
function EscapeString($string)
	{
		$con = OpenConn();
		$result=mysqli_real_escape_string($con,$string);
		CloseConn($con);
		return $result;
	}
// ************** Fill Country Name and created by Sudam Chandra Panda on 2_07_2012 *************************
function GetCountryName()
	{
		$con = OpenConn();
		$strOption = "";
		$sql ="call CSP_ADMIN_COUNTRY_MASTER()";
		$result=mysqli_query($con,$sql);
		$strOption.="<option value='0' title='Select Country Name'>-- Select --</option>";
		while($rows=mysqli_fetch_array($result))
			{
				$strSelected ="";
				if($rows[0]==99)
					{
						$strSelected ="selected=selected";
					}
				$strOption.="<option value='".$rows[0]."' $strSelected>".$rows[1]."</option>";
			}
		return $strOption;
		CloseConn($con);
	}
// ********** Function for call Prcodedure Name, Parameter Name and created by Sudam Chandra Panda on 23_07_2012 ***************
function callProcedure($strProcName,$strParmList,$strOutParam)
	{
		$sqlCom="CALL $strProcName(";
		$sqlParam="";
		if(count($strParmList)>0)
		{
			for($cnt=0;$cnt<count($strParmList);$cnt++)
			{
				$sqlParam.=",'".$strParmList[$cnt]."'";
			}
		}
		if(strlen($sqlParam)>0)
			{
				$sqlParam=substr($sqlParam,1);
			}
			if($strOutParam!="")
				$sqlParam.=",".$strOutParam;
				//echo $sqlCom.$sqlParam.")";
				$result=ExecuteQuery($sqlCom.$sqlParam.")");
		if($result)
		{
			$row = mysqli_fetch_row($result);
			$out_msg ="<font color='#009900'>".$row[0]."</font>";
		}
		return $out_msg;
	}
// ********** Function for call Prcodedure Name, Parameter Name and created by Sudam Chandra Panda on 23_07_2012 ***************
function callVProcedure($strProcName,$strParmList,$strOutParam)
	{
		$sqlCom="CALL $strProcName(";
		$sqlParam="";
		if(count($strParmList)>0)
		{
			for($cnt=0;$cnt<count($strParmList);$cnt++)
			{
				$sqlParam.=",'".$strParmList[$cnt]."'";
			}
		}
		if(strlen($sqlParam)>0)
			{
				$sqlParam=substr($sqlParam,1);
			}
			if($strOutParam!="")
				$sqlParam.=",".$strOutParam;
				//echo $sqlCom.$sqlParam.")";
				$result=ExecuteQuery($sqlCom.$sqlParam.")");
		return $result;
	}

// ************** Generate Function Master XML  and Created By Sudam Chandra Panda 01_08_2012 *************************
function callXMLProcedure($strProcName,$strParmList,$strFileName,$strHeader,$strSHeader,$strTitle1,$strTitle12,$strTitle3,$strOutParam)
	{
		$sqlXML="CALL $strProcName(";
		$sqlParam="";
		if(count($strParmList)>0)
		{
			for($cnt=0;$cnt<count($strParmList);$cnt++)
			{
				$sqlParam.=",'".$strParmList[$cnt]."'";
			}
		}
		if(strlen($sqlParam)>0)
			{
				$sqlParam=substr($sqlParam,1);
			}
		if($strOutParam!="")
			$sqlParam.=",".$strOutParam;
			//echo $sqlXML.$sqlParam.")";
			$XMLResult=ExecuteQuery($sqlXML.$sqlParam.")");
			if($XMLResult)
			{
				$file= fopen("../xml/$strFileName", "w");
				$strXMLData="<?xml version='1.0' encoding='UTF-8' ?>\n";
				$strXMLData.="<$strHeader>\n";
					while($rows=mysqli_fetch_array($XMLResult))
					{
						$strXMLData.="<$strSHeader>\n";		
						$strXMLData.="<$strTitle1>".$rows[0]."</$strTitle1>\n";
						$strXMLData.="<$strTitle2>".$rows[1]."</$strTitle2>\n";
						$strXMLData.="<$strTitle3>".$rows[2]."</$strTitle3>\n";
						$strXMLData.="</$strSHeader>\n";
					}
				$strXMLData.="</$strHeader>";
				fwrite($file, $strXMLData);
				fclose($file);
			}
			return $strXMLData;
	}
// ************** Show Paging and created by Debabrata Das on 3-12-2011 *************************
function ShowPaging($intTotalRec,$intCurrPage,$intPgSize)
{	
	//echo $strPgURL."<br>";
	$intPagecount=ceil($intTotalRec/$intPgSize); // Total no of pages

	if($intCurrPage>$intPagecount)
		$intCurrPage = $intPagecount;
	$intMaxPage		= $intCurrPage+10;
	$intPrevPgno 	= $intCurrPage-1;
	$intRecPrev	 	= ($intCurrPage-2) * $intPgSize;
	$intNextPgno 	= $intCurrPage+1;
	$intRecNext 	= $intCurrPage * $intPgSize;
	
	// set max page number to show ===============
	if($intMaxPage > $intPagecount)
		$intMaxPage=$intPagecount;

	// First Page Link ====================================
	if($intCurrPage>1)
	$strPages.="<a onclick='DoPaging(1,0)' href='#' title='First'>&laquo;</a>";
	
	// set previous page link ========================
	
	if($intPrevPgno>0)
		$strPages.="<a onclick='DoPaging(".$intPrevPgno.",".$intRecPrev.")' href='#' title='Previous'>Previous</a>";
		
		

	// Create page number links =======================
	$intStartPg=1;
	$intEndPg=10;
	if($intCurrPage<=10)
		{
		$intStartPg=1;
		$intEndPg=10;
		}
	else
		{
		$intStartPg=floor($intCurrPage/10)*$intPgSize;
		$intEndPg=ceil($intCurrPage/10)*$intPgSize;
		}
	if($intEndPg>$intPagecount)
		$intEndPg=$intPagecount;
		
	for($intCtr=$intStartPg; $intCtr<=$intEndPg; $intCtr++)
		{	
		if($intCtr>=1)
			{			
				$intRec=$intPgSize*($intCtr-1);
			}
		if($intCurrPage==$intCtr)	
			{
			$strPages.="<span>".$intCtr."</span>";
			}
		else
			{
				$strPages.="<a onclick='DoPaging(".$intCtr.",".$intRec.")' href='#' title='".$intCtr."'>".$intCtr."</a>";		
			}
		}
	// set next page link ========================
	if($intCurrPage < $intPagecount)
		{
		$strPages.="<a onclick='DoPaging(".$intNextPgno.",".$intRecNext.")' href='#' title='Next'>Next</a>";
		}
		
	// Last Page Link ====================================
	$intLastPageRec=($intPagecount-1)*$intPgSize;
	if($intCurrPage<$intPagecount)
	$strPages.="<a onclick='DoPaging(".$intPagecount.",".$intLastPageRec.")' href='#' title='Last'>&raquo;</a>";
	//================================================
	$intStartRec=($intCurrPage-1)*$intPgSize+1;
	$intEndRec=$intRecNext;
	if($intEndRec>$intTotalRec)
		$intEndRec=$intTotalRec;
	$strShowing="Showing Results ".$intStartRec."&nbsp;-&nbsp;".$intEndRec;
	$ArrPaging[0]=$strShowing;
	$ArrPaging[1]=$strPages;
	return $ArrPaging;
	//return $strShowing."&nbsp;&nbsp;&nbsp;&nbsp;".$strPages;
}
//*************** Fill dropdown select option by Sunil kumar parida on 28-09-12 ******************************
	function FillDropdown($sqlQuery,$dbValueField,$dbTextField,$strSelVal)
	{		
		$strOption = "";
		$result	=ExecuteQuery($sqlQuery);
		$strOption.='<option value="0" title="Select">--Select--</option>';
		while($row=mysqli_fetch_array($result))
		{
			if($row[$dbValueField]==$strSelVal)
			{
				$selected	='selected="selected"';
			}
			else
			{
				$selected	='';
			}
			$strOption.='<option value="'.$row[$dbValueField].'" '.$selected.' title="'.$row[$dbTextField].'">'.$row[$dbTextField].'</option>';
		}
		return $strOption;
	}

?>
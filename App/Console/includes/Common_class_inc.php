<?php
/*============================================================
Page Name		:	Common_class_inc.php
Description		:	Common Class
Created By		:	Sunil Kumar Parida
Created On		:	29-Aug-2013
Update History          :
<Updated by>		<Updated On>		<Remarks>
Sunil Kumar Parida	10-Sept-2012		Add dateFormat Methods in class

Functions Used	:	connectToDatabase();closeConnection();
==============================================================*/
	require("DBConnection.php");
	error_reporting(E_ALL - E_NOTICE);
	session_start();
	date_default_timezone_set("Asia/Kolkata");
	$strTitle = "FSCW";
	//============== Function to get host path of a file ## By Sunil Kumar Parida On 30_10_2013 ======
	function getPath()
	{
		$webHost	= $_SERVER['HTTP_HOST'];
		$webPath	= $webHost.$_SERVER['PHP_SELF']; 
		$explPath	= explode('/',$webPath);
		$path1		= $explPath[1];
		$path2		= $explPath[2];
		$strPath	= $webHost.'/'.$path1.'/';
		return $strPath;	
	}
	define('ABSPATH',realpath(dirname(__FILE__)));
class commonClass extends createConnection
{
	// ============= Execute Query ## By Sunil Kumar Parida ## on 29_08_2013 =========================
	function __construct()
	{
		$queryString	= $_SERVER['QUERY_STRING'];	
		//$qsPath			= $this->webpath();	
		//$this->isSpclChar($queryString,$qsPath.'../home');
	}
	
	// ============= Execute Query ## By Sunil Kumar Parida ## on 29_08_2013 =========================
	function ExecuteQuery($sqlQuery)
	{
		$con= $this->connectToDatabase();
		$result	= mysqli_query($con,$sqlQuery);
		$this->closeConnection($con);
		return $result;
	}
	// ============= Escape Spcial Character ## By Sunil Kumar Parida ## on 29_08_2013 =========================
	function EscapeString($string)
	{
		$con = $this->connectToDatabase();
		$result=mysqli_real_escape_string($con,$string);
		$this->closeConnection($con);
		return $result;
	}
	// ============= Count Row Number ## By Sunil Kumar Parida ## on 29_08_2013 =========================
	function NumRow($result)
	{		
		$num=mysqli_num_rows($result);		
		return $num;
	}
	// ============= Fill dropdown select option ## By Sunil Kumar Parida ## 29_08_2013 =========================
	function FillDropdown($sqlQuery,$strSelVal)
	{
		$strOption = "";
		$result	=$this->ExecuteQuery($sqlQuery);
		$strOption.='<option value="0">--Select--</option>';
		while($row=mysqli_fetch_array($result))
		{
			if($row[0]==$strSelVal)
			{
				$selected	='selected="selected"';
			}
			else
			{
				$selected	='';
			}
			$strOption.='<option value="'.$row[0].'" '.$selected.'>'.$row[1].'</option>';
		}
		return $strOption;
	}
	// ============= Fill dropdown select option ## By Sunil Kumar Parida ## on 29_08_2013 =========================
	function FillMultiDropdown($sqlQuery,$strSelVal,$all='A')
	{
		$strOption 	= "";
		$result		= $this->ExecuteQuery($sqlQuery);		
		$explSel	= explode(",",$strSelVal);
		$selectDefault	= ($strSelVal=='0' )?'selected="selected"':'';
		$strOption	.= '<option value="0" '.$selectDefault.'>--Select--</option>';
		$selectAll	= ($explSel[0]=='All')?'selected="selected"':'';	
		if($all=='A')	
			$strOption	.= '<option value="All" '.$selectAll.'>All</option>';
			
		while($row=mysqli_fetch_array($result))
		{
			$selected	='';
			$explSelVal	= explode(",",$strSelVal);
			for($i=0; $i<count($explSelVal); $i++)
			{
				if($row[0]==$explSelVal[$i])
					$selected	='selected="selected"';
				if($explSelVal[0]=='All')
					$selected	='';
			}
			$strOption.='<option value="'.$row[0].'" '.$selected.'>'.$row[1].'</option>';
		}
		return $strOption;
	}
	//============ Call a procedure =====================
	function callProcedure($strProcName,$strParmList,$strOutParam,$return)
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
				
				$result=$this->ExecuteQuery($sqlCom.$sqlParam.")");
		if($return == true)
		{
			$row = mysqli_fetch_row($result);
			$out_msg ="<font color='#009900'>".$row[0]."</font>";
		}
		return $result;
	}
	
	//==================== Function to get absolute path ========================
	function webPath()
	{
		$strPath 		= "../";
		$strQS			= $_SERVER['QUERY_STRING'];
		$intQSCount		= count(explode("&",$strQS));
		if($intQSCount>0)
			{
				for($i=1;$i<$intQSCount;$i=$i+1)
					{
						$strPath="../".$strPath;
					}
			}
		return $strPath;
	}
	
	//================= Function for pagination =============================
	function ShowPaging($intTotalRec,$intCurrPage,$intPgSize)
	{	
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
		$strPages.="<li><a onclick='DoPaging(1,0)' href='#' title='First'>&laquo;</a></li>";
		
		// set previous page link ========================
		
		if($intPrevPgno>0)
			$strPages.="<li><a onclick='DoPaging(".$intPrevPgno.",".$intRecPrev.")' href='#' title='Previous'>Previous</a></li>";
			
			
	
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
				$strPages.="<li class='active'><a href='javascript:void(0)'>".$intCtr."</a></li>";
				}
			else
				{
					$strPages.="<li><a onclick='DoPaging(".$intCtr.",".$intRec.")' href='#' title='".$intCtr."'>".$intCtr."</a></li>";		
				}
			}
		// set next page link ========================
		if($intCurrPage < $intPagecount)
			{
			$strPages.="<li><a onclick='DoPaging(".$intNextPgno.",".$intRecNext.")' href='#' title='Next'>Next</a></li>";
			}
			
		// Last Page Link ====================================
		$intLastPageRec=($intPagecount-1)*$intPgSize;
		if($intCurrPage<$intPagecount)
		$strPages.="<li><a onclick='DoPaging(".$intPagecount.",".$intLastPageRec.")' href='#' title='Last'>&raquo;</a></li>";
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
	//============== Function for checking special character ================
	function isSpclChar($strToCheck)
	{
		$splCharToCheck	=	"<,>,',%,=";
		$arrySplChar	=	explode(',',$splCharToCheck);
		$errFlag		= 0;
		for ($i=0; $i<count($arrySplChar); $i++)
		{
			$intPos=substr_count($strToCheck,trim($arrySplChar[$i]));
			if ($intPos>0)
			{
				$errFlag++;
			}
		}
		$flag	=($errFlag>0)?1:0;
		return $flag;
	}
	
	function getName($colName,$tableName,$colId,$id,$deletedFlag='')
	{		
		$sql	= "SELECT ".$colName." FROM ".$tableName." WHERE ".$colId."='".$id."'";
		if($deletedFlag!='')
			$sql.= ' AND '.$deletedFlag.'=0 ';		
		$result=$this->ExecuteQuery($sql);
		$row=mysqli_fetch_array($result);
		return $row[0];
	}
	 // ============= Execute Query ## By Rasmi Ranjan Swain  ## on 29-May-2013 =========================
	function GetResizeImage($fieldName,$folderPath,$reqWidth)
		{	
			$errors=0;
			$errMsg="";
			$image =$_FILES[$fieldName]["name"];
			$uploadedfile = $_FILES[$fieldName]['tmp_name'];	
	        if ($image) 
				{
					$filename = stripslashes($_FILES[$fieldName]['name']);
					$extension = $this->getExtension($filename);
					$extension = strtolower($extension);
					if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
	  					{
							$errMsg=' Unknown Image extension ';
							$errors=1;
	  					}
			else
	 			{
					$size=filesize($_FILES[$fieldName]['tmp_name']);
			if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES[$fieldName]['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);
				}
			else if($extension=="png")
				{
					$uploadedfile = $_FILES[$fieldName]['tmp_name'];
						//$src = imagecreatefrompng($uploadedfile);
					move_uploaded_file($folderPath,$uploadedfile);
				}
			else 
				{
					$src = imagecreatefromgif($uploadedfile);
				}

			list($width,$height)=getimagesize($uploadedfile);		
			$newwidth=$reqWidth;
			$newheight=($height/$width)*$newwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);		
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);                              
			$filename = $folderPath. $_FILES[$fieldName]['name'];                                                
			imagejpeg($tmp,$filename,100);		
			imagedestroy($src);
			imagedestroy($tmp);
			}
		}
		return $errors;//."==".$errMsg;
				
	}
	function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
	}
	
	//============== function to get date format === By Sunil Kumar Parida on 10/09/2013 ============
	function dbDateFormat($date)
	{
		$explDate		= explode('-',$date);
		$formattedDate	= $explDate[2].'-'.$explDate[1].'-'.$explDate[0];
		return $formattedDate;
	}
	
}
?>

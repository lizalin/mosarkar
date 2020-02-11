<?php
/*============================================================
Page Name		:	Common_class_inc.php
Description		:	Common Class
Created By		:	Sunil Kumar Parida
Created On		:	29-Aug-2013
Update History	:
<Updated by>		<Updated On>		<Remarks>
Sunil Kumar Parida	10-Sept-2012		Add dateFormat Methods in class

Functions Used	:	connectToDatabase();closeConnection();
==============================================================*/
	error_reporting(E_ALL - E_NOTICE);
	session_start();
	$strTitle = "SOCIOMATIC";
	
	class commonClass extends createConnection
	{		
		// ============= Execute Query ## By Sunil Kumar Parida ## on 29_08_2013 =========================
		function ExecuteQuery($sqlQuery)
		{
			$con= $this->connectToDatabase();
			$result	= mysqli_query($con,$sqlQuery);
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
			return $errors;
					
		}
		
		
		
		function resizeImage($fieldName, $folderPath, $modifiedImageName, $width, $height)
		{
			/* Get original image x y*/
			list($w, $h) = getimagesize($_FILES[$fieldName]['tmp_name']);
			/* calculate new image size with ratio */
			$ratio = max($width/$w, $height/$h);
			$h = ceil($height / $ratio);
			$x = ($w - $width / $ratio) / 2;
			$w = ceil($width / $ratio);
			/* new file name */
			if($modifiedImageName!='')
			{
				$extn			= pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
				$path = $folderPath.$modifiedImageName.'.'.$extn;
			}
			else
			{
				$path = $folderPath.$_FILES[$fieldName]['name'];
			}
			
			/* read binary data from image file */
			$imgString = file_get_contents($_FILES[$fieldName]['tmp_name']);
			/* create image from string */
			$image = imagecreatefromstring($imgString);
			$tmp = imagecreatetruecolor($width, $height);
			
			/* create transparent image */
			imagealphablending($tmp, false);
			imagesavealpha($tmp,true);
			$transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
			imagefilledrectangle($tmp, 0, 0, $width, $height, $transparent);
 
 
			imagecopyresampled($tmp, $image,
			0, 0,
			$x, 0,
			$width, $height,
			$w, $h);
			
			
			/* Save image */
			switch ($_FILES[$fieldName]['type']) {
				case 'image/jpeg':
					imagejpeg($tmp, $path, 100);
					break;
				case 'image/png':
					
					imagepng($tmp, $path, 0);
					break;
				case 'image/gif':
					imagegif($tmp, $path);
					break;
				default:
					exit;
					break;
			}
			return $path;
			/* cleanup memory */
			imagedestroy($image);
			imagedestroy($tmp);
		}
		
		function getExtension($str) 
		{
	
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
		
	// ======================Function to send mail By Sunil Kumar Parida==========================	
	function Sendmail($strFrom,$strTo,$strSubject,$strMessage,$name='')
	{			
		$MailMessage	= "";
		$headers		= "";
		$name			= ($name!='')?$name:'Sir / Madam';
		if($strTo!="")
		{
			$mailTo=$strTo;
			$MailMessage.="<table cellspacing='0' cellpadding='2' border='0' bgcolor='#cccccc'>";
			$MailMessage.="<tr bgcolor='#FFFFFF'>";
			$MailMessage.="<td>Dear ".ucwords(strtolower($name)).",<br></td>";
			$MailMessage.="</tr>";		
			$MailMessage.="<tr bgcolor='#FFFFFF'>";
			$MailMessage.="<td>".$strMessage."</td>";
			$MailMessage.="</tr>";
			$MailMessage.="<tr>";
			//$MailMessage.="<td><br />Regards,<br /><strong>Nagar Seva</strong><br/>Urban Development and Housing Department,<br/>Govt. of Bihar</td>";
			$MailMessage.="</tr>";
			$MailMessage.="</table>";
			$headers.= "FROM:".$strFrom."\n";
			$headers.= "BCC: sudam@csmpl.com\n";
			$headers.= 'MIME-Version: 1.0' . "\n";
			$headers.= "Content-Type: text/html; charset=ISO-8859-1\n";
			mail($mailTo, $strSubject, $MailMessage, $headers); 
		}
	}


// ======================Function to send send OTP for commonclass==========================	
	 public function sendSMS($mobileno,$message){
                   //echo $mobileno;
                        $fields = '';
                        $url = "http://msdgweb.mgov.gov.in/esms/sendsmsrequest";
                         $data = array(
                        "username" => "opscsms2012-ODIGOV", // type your assigned username here(for example: "username" => "CDACMUMBAI")
                        "password" => "Odisha#2018#", //type your password
                        "senderid" =>"ODIGOV", //type your senderID
                        "smsservicetype" =>"singlemsg", //*Note* for single sms enter ”singlemsg” , for bulk
                        "Key" => '88f6ae42-6a35-46d1-a038-bee1fdad08d7',
                        "mobileno" =>$mobileno, //enter the mobile number
                        "content" =>  $message //type the message. 
                        );
                        $fields = '';
                        foreach($data as $key => $value) {
                           $fields .= $key . '=' . $value . '&';
                        }
                        $fields=rtrim($fields, '&');

                      //echo $fields;exit;
                        $post = curl_init();
                        curl_setopt($post, CURLOPT_URL, $url);
                        curl_setopt($post, CURLOPT_POST, count($data));
                        curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
                        curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
                        $result = curl_exec($post);
                        curl_close($post);
                    }



// ======================Function to encrypt for commonclass==========================	
   
               public $crypKey="SOCIOMATICSMGMAP";
               public function encrypt($data)
                {
                   
                        $encrKey	= $this->crypKey;
                        $encData	= base64_encode(
                                mcrypt_encrypt(
                                MCRYPT_RIJNDAEL_128,
                                $encrKey,
                                $data,
                                MCRYPT_MODE_CBC,
                                "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"
                                )
                        );
                        $newString	= $data.'|'.$encData;
                        $newEncStr	= base64_encode(
                                mcrypt_encrypt(
                                MCRYPT_RIJNDAEL_128,
                                $encrKey,
                                $newString,
                                MCRYPT_MODE_CBC,
                                "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"
                                )
                        );
                        $replacedStr	= str_replace("/","-",$newEncStr);
                        $replacedStr	= str_replace("=","_",$replacedStr);
                        $replacedStr	= str_replace("+","$",$replacedStr);
                        return $replacedStr;
                }


// ======================Function to decrypt for commonclass==========================	
                public function decrypt($data)
                {
                        $replacedStr	= str_replace("-","/",$data);
                        $replacedStr	= str_replace("_","=",$replacedStr);
                        $replacedStr	= str_replace("$","+",$replacedStr);
                        $decrKey	= $this->crypKey;
                        $decode 	= base64_decode($replacedStr);
                        $decrData	= mcrypt_decrypt(
                        MCRYPT_RIJNDAEL_128,
                        $decrKey,
                        $decode,
                        MCRYPT_MODE_CBC,
                        "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"
                        );
                        $explDecrData	= explode('|',$decrData);
                        $decrData1	 	= base64_decode($explDecrData[1]);		
                        $decrData2		= mcrypt_decrypt(
                        MCRYPT_RIJNDAEL_128,
                        $decrKey,
                        $decrData1,
                        MCRYPT_MODE_CBC,
                        "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"
                        );		
                        if(trim($explDecrData[0]) == trim($decrData2))
                        {
                                return trim($decrData2);
                        }
                        else
                        {
                                return '';
                        }
				}
				
		public function callProc($strProcName, $strProcAction, $arrVals)
			{    
				$parmaset = '';       
				if (!empty($arrVals)) {
					foreach ($arrVals as $key => $val) {
						$parmaset .= '@p_' . $key . "='" . str_replace(array("'", "\\", '"'), array("''", "\\\\\\\\", '\"'), $val) . "',";
					}
						/*used for debug sql */
						$parmaset .= "@p_debug=1"; // For get the select Statement from procedure           
					$parmaset = rtrim($parmaset, ',');
				} else {
					$parmaset .= "@p_empty='1'";
				}        
				$sql = "CALL $strProcName('$strProcAction', \"$parmaset\")";
				/*used for check sql */
		    	//if($strProcAction=='API') {echo $sql.";"; }
				//echo $sql.";";exit;

				$result_set = $this->ExecuteQuery($sql); //print_r($result_set);exit;
				return $result_set; 
			}


}
?>

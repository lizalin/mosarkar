<?php
	/* ================================================
	File Name         	  : customModel.php
	Description	          : This is to manage model class and its function. This also used to maintain connection to database.
	Author Name		  : Rasmi Ranjan Swain
	Date Created		  : 05-Jan-2015	
	Update History		  :
				<Updated by>		<Updated On>		<Remarks>
						
	includes			  : config.php

	==================================================*/
class Model {
	public $conn	= null;
	public $db = null;
	function __construct() 
	{
        try 
		{ 
			if(strtolower(basename($_SERVER['PHP_SELF'])) != 'index.php')
				{
				//exit();
				}
			
        } 
		catch (Exception $e) 
		{
            exit('Exception occured.');
        }
    }
	/*================function to create connection ====================
			By      :Rasmi ranjan swain
			ON	:05/Jan/2015
	===================================================================*/	
	private function createConnection()
	{
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME,DB_PORT);                
		$this->db->set_charset('latin1');
                if ($this->db->connect_errno) {
			echo "Failed to connect!!! Wrong user id, password or database name";
			exit();
		}
	}	
	/*================function to execute query ====================
			By	:Rasmi ranjan Swain
			ON	:05/jan/2015
	================================================================*/
	public function executeQry($sql)
	{
		$this->createConnection();
		$result	= $this->db->query($sql);
		$this->db->close();
		return $result;
	}
	/*================function to execute query ====================
			By	:Ashis kumar Patra
			ON	:26/Sept/2017
	================================================================*/
          public function executeMultiQry($sql) {
                $this->createConnection(); 
                $i = 1; 
                if ($this->db->multi_query($sql))
                { 
                $result["Data0"] = "success"; 
                do {
                $rs = array();
                // Lets work with the first result set
                if ($result1 = $this->db->use_result())
                {
                // Loop the first result set, reading it into an array
                while ($row = $result1->fetch_array(MYSQLI_ASSOC))
                {
                $rs[] = $row;
                }
                // print_r($rs);
                $result["Data".$i] = $rs;
                $i=$i+1; 
                //array_push($result, $rs);
                // Close the result set
                $result1->close();
                }

                } while ($this->db->more_results() && $this->db->next_result());
                } 


                $this->db->close();
                return $result;
              }
	
	//========= Check Special Character ==============
	public function isSpclChar($strToCheck)
	{
           //exit;
		$arrySplChar	= explode(',',SPLCHRS);	
		// print_r($arrySplChar); exit;	
		$errFlag        = 0;
       if(isset($strToCheck)){
		for ($i=0; $i<count($arrySplChar); $i++)
		{
			$intPos=substr_count($strToCheck,trim($arrySplChar[$i]));
			if ($intPos>0)
				$errFlag++;	
		}
                }
		return $errFlag;
	}
	/*==============function to check blank value ==================
			By  : Rasmi Ranjan Swain
			ON  : 05-Jan-2014
	================================================================*/
	public function isBlank($strToCheck)
	{	
		$errFlag		= 1;
		if($strToCheck!='')
			$errFlag	= 0;
		return $errFlag;
	}
	/*======== function to check Max, Min or Equal length ==========
			By  : Rasmi Ranjan Swain
			ON  : 05/Jan/2015
	================================================================*/
	public function chkLength($flag, $strToCheck, $length)
	{	
		//======= $flag= 'MAX'/'MIN'/'EQ' for Maximum Minimum or Equal length
		$errFlag		= 0;
		if($strToCheck!='')
		{
			if(strtolower($flag)=='max')
			{
				if(strlen($strToCheck)>$length)
					$errFlag		= 1;
			}
			else if(strtolower($flag)=='min')
			{
				if(strlen($strToCheck)<$length)
					$errFlag		= 1;
			}
			else if(strtolower($flag)=='eq')
			{
				if(strlen($strToCheck)!=$length)
					$errFlag		= 1;
			}	
		}	
		return $errFlag;
	}
	/*============== function to check dropdown field ==============
			By  : Rasmi Ranjan Swain
			ON  : 05/Jan/2015
	================================================================*/
	public function chkDropdown($drpVal)
	{	
		$errFlag		= 1;
		if($drpVal>0 && $drpVal!='')
			$errFlag		= 0;
		return $errFlag;
	}
	/*============ function to check only numeric data =============
			By  : Rasmi Ranjan Swain
			ON  : 05/Jan/2015
	================================================================*/
	public function isNumericData($data)
	{	
		$errFlag		= 1;
		if(preg_match('/^\d+$/',$data))
		   $errFlag		= 0;
		return $errFlag;
	}
	/*============ function to check only character data =============
			By  : Rasmi Ranjan Swain
			ON  : 05/Jan/2015
	================================================================*/
	public function isCharData($data)
	{	
		$errFlag		= 1;
		if(preg_match('/^[a-zA-Z.,-\s]+$/i',$data))
		   $errFlag		= 0;
		return $errFlag;
	}
	/*============ function to check decimal data =============
			By  : Rasmi Ranjan Swain
			ON  : 05/Jan/2015
	================================================================*/
	public function isDecimal($data,$afterDecimal=2)
	{			
		$errFlag		= 1;
		if(preg_match('/^[0-9]+(\.[0-9]{1,'.$afterDecimal.'})?$/',$data))
		   $errFlag		= 0;
		return $errFlag;
	}
	//=========== Function to get paging ===============
	public function getPaging($intTotalRec,$intCurrPage,$intPgSize,$isPaging)
	{	
		$pageDropDown = '<li class="pull-left" style="padding-right:12px">'.$this->selectPageNumber($intTotalRec,$intPgSize,$intCurrPage,1).'</li>';
		$paging	= $this->ShowPaging($intTotalRec,$intCurrPage,$intPgSize,$isPaging);
		return $pageDropDown.$paging[1];
		//return $paging[1];
	}

	//============ Function to get page number ==========
	public function getPageNumbers($intTotalRec,$intCurrPage,$intPgSize,$isPaging)
	{
		$paging	= $this->ShowPaging($intTotalRec,$intCurrPage,$intPgSize,$isPaging);
		return $paging[0];
	}
	
	//================= Function for pagination =============================
	public function ShowPaging($intTotalRec,$intCurrPage,$intPgSize,$isPaging)
	{	
            
		$intPagecount		= ceil($intTotalRec/$intPgSize); // Total no of pages
	
		if($intCurrPage>$intPagecount)
			$intCurrPage 	= $intPagecount;
		$intMaxPage	        = $intCurrPage+10;
		$intPrevPgno 		= $intCurrPage-1;
		$intRecPrev	 		= ($intCurrPage-2) * $intPgSize;
		$intNextPgno 		= $intCurrPage+1;
		$intRecNext 		= $intCurrPage * $intPgSize;
	
		
		// set max page number to show ===============
		if($intMaxPage > $intPagecount)
			$intMaxPage=$intPagecount;
	
		// First Page Link ====================================
		if($intCurrPage>1)
		$strPages.="<li class='prev'><a onclick='DoPaging(1,0)' href='#' title='First'><i class='fa fa-angle-double-left'></i></a></li>";
		
		// set previous page link ========================
		if($intPrevPgno>0)
			$strPages.="<li class='prev'><a onclick='DoPaging(".$intPrevPgno.",".$intRecPrev.")' href='#' title='Previous'><i class='fa fa-angle-left'></i></a></li>";
		// Create page number links =======================
		$intStartPg=1;
		$intEndPg=3;
		if($intCurrPage<=3)
		{
			$intStartPg=1;
			$intEndPg=3;
		}
		else
		{
			//$intStartPg	= floor($intCurrPage/$intPgSize)*$intPgSize;
			//$intEndPg	= ceil($intCurrPage/$intPgSize)*$intPgSize;
                    $intStartPg = $intCurrPage;
                    $intEndPg   = $intCurrPage+2;
		}
		if($intEndPg>$intPagecount)
			$intEndPg	= $intPagecount;
			
		for($intCtr=$intStartPg; $intCtr<=$intEndPg; $intCtr++)
		{	
			if($intCtr>=1)
				$intRec=$intPgSize*($intCtr-1);
			if($intCurrPage==$intCtr)	
				$strPages.="<li class='active'><a href='javascript:void(0)'>".$intCtr."</a></li>";
			else
					$strPages.="<li><a onclick='DoPaging(".$intCtr.",".$intRec.")' href='#' title='".$intCtr."'>".$intCtr."</a></li>";		
		}
		// set next page link ========================
		if($intCurrPage < $intPagecount)
			$strPages	.= "<li class='next'><a onclick='DoPaging(".$intNextPgno.",".$intRecNext.")' href='#' title='Next'><i class='fa fa-angle-right'></i></a></li>";
			
		// Last Page Link ====================================
		$intLastPageRec	= ($intPagecount-1)*$intPgSize;
		if($intCurrPage<$intPagecount)
			$strPages	.= "<li><a onclick='DoPaging(".$intPagecount.",".$intLastPageRec.")' href='#' title='Last'>&raquo;</a></li>";
		//================================================
		$intStartRec	= ($intCurrPage-1)*$intPgSize+1;
		$intEndRec		= $intRecNext;
		if($intEndRec>$intTotalRec)
			$intEndRec	= $intTotalRec;
			
		$strShowing		= ($isPaging==0)?"Showing ".$intStartRec."&nbsp;to&nbsp;".$intEndRec." of ".$intTotalRec." entries":"Showing ".$intStartRec."&nbsp;to&nbsp;".$intTotalRec." of ".$intTotalRec." entries";
		$ArrPaging[0]	= $strShowing;
		$ArrPaging[1]	= $strPages;
		return $ArrPaging;
	}
	/*
		**This function will create a dropdown to select page Number
		**Created By Jagadish on 13-Oct-2017
		**variables : 
			$intTotalRec 	- Total number of records
			$intPgSize		- No. of record in a page index to display
			$intPgno		- Current page number
	*/
	function selectPageNumber($intTotalRec,$intPgSize,$intPgno,$intRecno){
		$check = $intTotalRec/$intPgSize;
		if($check>1){
			$display = 'block';
		}else{
			$display = 'none';
		} 
		//$dropdown = "<div style='display:$display'><div class='input-group'>";
		$dropdown .= "Page <select id='txtPageNo' name='txtPageNo'>";
		for($pageIndex=1; $pageIndex<=ceil($intTotalRec/$intPgSize); $pageIndex++){
			if($intPgno==$pageIndex){
				$selected = 'selected';
			}else{
				$selected = '';
			}
			$dropdown .= "<option value='".$pageIndex."' ".$selected.">".$pageIndex;
			$dropdown .= "</option>";
		}
		$dropdown .= "</select>";
		/*$dropdown .= 	"<span class='input-group-btn'>
							<button class='btn btn-info' type='button' onclick='callPageNo(".$intPgSize.");'>Go</button>
						</span>";*/
		$dropdown .= 	"<button class='btn btn-info' type='button' onclick='callPageNo(".$intPgSize.");'>Go</button>
						";
		//$dropdown .= "</div></div>";
		return $dropdown;
	}
//        function ShowPaging($intTotalRec,$intCurrPage,$intPgSize)
//           {
//                    $intPagecount = ceil($intTotalRec/$intPgSize); // Total no of pages
//
//                    if($intCurrPage>$intPagecount)
//                    $intCurrPage = $intPagecount;
//                    $intMaxPage = $intCurrPage+10;
//                    $intPrevPgno = $intCurrPage-1;
//                    $intRecPrev = ($intCurrPage-2) * $intPgSize;
//                    $intNextPgno = $intCurrPage+1;
//                    $intRecNext = $intCurrPage * $intPgSize;
//
//                    // set max page number to show ===============
//                    if($intMaxPage > $intPagecount)
//                    $intMaxPage=$intPagecount;
//
//
//
//                    // First Page Link ====================================
//                    if($intCurrPage>1)
//                    $strPages.="<a onclick='DoPaging(1,0)' href='#' title='First'>&laquo;</a>";
//
//                    // set previous page link ========================
//                    if($intPrevPgno>0)
//                    $strPages.="<a onclick='DoPaging(".$intPrevPgno.",".$intRecPrev.")' href='#' title='Previous'>Previous</a>";
//
//                    // Create page number links =======================
//                    $intStartPg=1;
//                    $intEndPg=10;
//                    if($intCurrPage<=10)
//                    {
//                    $intStartPg=1;
//                    $intEndPg=10;
//                    }
//                    else
//                    {
//                    //$intStartPg=floor($intCurrPage/10)*$intPgSize;echo $intStartPg;
//                    //$intEndPg=ceil($intCurrPage/10)*$intPgSize;
//                    $intStartPg=$intCurrPage-4;
//                    $intEndPg=$intCurrPage+5;
//                    }
//                    if($intEndPg>$intPagecount)
//                    $intEndPg=$intPagecount;
//
//                    for($intCtr=$intStartPg; $intCtr<=$intEndPg; $intCtr++)
//                    {
//
//                    if($intCtr>=1)
//                    {
//                    $intRec=$intPgSize*($intCtr-1);
//                    }
//                    if($intCurrPage==$intCtr)
//                    {
//                    $strPages.="<span>".$intCtr."</span>";
//                    }
//                    else
//                    {
//                    $strPages.="<a onclick='DoPaging(".$intCtr.",".$intRec.")' href='#' title=".$intCtr.">".$intCtr."</a>";
//                    }
//                    }
//                    // set next page link ========================
//                    if($intCurrPage < $intPagecount)
//                    {
//                    $strPages.="<a onclick='DoPaging(".$intNextPgno.",".$intRecNext.")' href='#' title='Next'>Next</a>";
//                    }
//
//                    // Last Page Link ====================================
//                    $intLastPageRec=($intPagecount-1)*$intPgSize;
//                    if($intCurrPage<$intPagecount)
//                    $strPages.="<a onclick='DoPaging(".$intPagecount.",".$intLastPageRec.")' href='#' title='Last'>&raquo;</a>";
//                    //================================================
//                    $intStartRec=($intCurrPage-1)*$intPgSize+1;
//                    $intEndRec=$intRecNext;
//                    if($intEndRec>$intTotalRec)
//                    $intEndRec=$intTotalRec;
//                    $strShowing="Showing Results ".$intStartRec."&nbsp;-&nbsp;".$intEndRec;
//                    $ArrPaging[0]=$strShowing;
//                    $ArrPaging[1]=$strPages;
//                    return $ArrPaging;
//                    //return $strShowing."&nbsp;&nbsp;&nbsp;&nbsp;".$strPages;
//                    }
	
	/* ============= Fill dropdown select option ## By  : Rasmi Ranjan Swain
			ON  : 05/Jan/2015
           ========================================================================*/
	public function FillDropdown($sqlResult,$strSelVal)
	{
		$strOption 	= "";
		$strOption	.='<option value="0">--Select--</option>';	
		if($sqlResult->num_rows>0)	
		{
			while($row=$sqlResult->fetch_array())
			{
				$selected	=($row[0]==$strSelVal)?'selected="selected"':'';			
				$strOption.='<option value="'.$row[0].'" '.$selected.' title="'.$row[1].'">'.$row[1].'</option>';
			}
		}
		return $strOption;
	}
	
	//==================== Function to format date ## By Rasmi Ranjan Swain ## 05-jan-2014 ========================
	public function dbDateFormat($date)
	{
			$explDate	= explode('-',$date);
			return $explDate[2].'-'.$explDate[1].'-'.$explDate[0];
	}
	
	// ======================Function to send mail ## By Rasmi Ranjan Swain ## 05-jan-2014==========================	
	function Sendmail($strTo,$strFrom,$strSubject,$strMessage,$name='')
	{			
		$MailMessage	= "";
		$headers		= "";
		$name			= ($name!='')?$name:'Sir / Madam';
		if($strTo!="")
		{
			$mailTo		 = $strTo;
			$MailMessage.="<table cellspacing='0' cellpadding='2' border='0' bgcolor='#cccccc'>";
			$MailMessage.="<tr bgcolor='#FFFFFF'>";
			//$MailMessage.="<td>Dear ".ucwords(strtolower($name)).",<br></td>";
			$MailMessage.="</tr>";		
			$MailMessage.="<tr bgcolor='#FFFFFF'>";
			$MailMessage.="<td>".$strMessage."</td>";
			$MailMessage.="</tr>";
			$MailMessage.="<tr>";			
			$MailMessage.="</tr>";
			$MailMessage.="</table>";
                        $headers  = "From: SOCIOMATIC < ".$strFrom." >\n";
                        $headers .= "Cc: Rasmikant Das< rasmikant@csmpl.com >\n"; 
                        $headers .= "X-Sender: SOCIOMATIC  < ".$strFrom." >\n";
                        $headers .= 'X-Mailer: PHP/' . phpversion();
                        $headers .= "X-Priority: 1\n"; // Urgent message!
                        $headers .= "Return-Path: ashishkumar.patra20@gmail.com\n"; // Return path for errors
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
			mail($mailTo, $strSubject, $MailMessage, $headers); 
		}
               // echo $MailMessage;
	}
        // ======================Function to send mail with attachment ## By Rasmi Ranjan Swain ## 25-Feb-2015==========================
        function mail_attachment($filename, $path, $mailto, $from_mail, $from_name,$subject, $message) {
        $MailMessage	= "";
	$headers	= "";  
        if($mailto!="")
	{
        $MailMessage.="<table cellspacing='0' cellpadding='2' border='0' bgcolor='#cccccc'>";
	$MailMessage.="<tr bgcolor='#FFFFFF'>";
	$MailMessage.="<td>".$message."</td>";
	$MailMessage.="</tr>";
	$MailMessage.="<tr>";			
	$MailMessage.="</tr>";
	$MailMessage.="</table>";
        if($filename!=''){
            $file = $path.$filename;
            $file_size = filesize($file);
            $handle = fopen($file, "r");
            $content = fread($handle, $file_size);
            fclose($handle);
            $content = chunk_split(base64_encode($content));
            $uid = md5(uniqid(time()));
            $name = basename($file);
         }
        $header = "From: ".$from_name." <".$from_mail.">\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
        $header .= "This is a multi-part message in MIME format.\r\n";
        if($filename!=''){
            $header .= "--".$uid."\r\n";
            $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
            $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
            $header .= "--".$uid."\r\n";
            $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
            $header .= "Content-Transfer-Encoding: base64\r\n";
            $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
            $header .= $content."\r\n\r\n";
            $header .= "--".$uid."--";
          } 
          mail($mailTo, $strSubject, $MailMessage, $header); 
        }
        
        }
        // Function to get Max Val
	function getMaxVal($colName,$tableName,$deletedFlag)
	{
		$sql	= "SELECT MAX(".$colName.") AS MAXNO FROM ".$tableName;
		if($deletedFlag!='')
			$sql.= ' WHERE '.$deletedFlag.'=0 ';		
		$result=$this->executeQry($sql);
		$row=mysqli_fetch_array($result);
		return $row[0]+1;
	}
	 // Function to get permission details       
        function getPermission($glid,$plid,$userid)
	{
		 $sql = "CALL USP_ADMIN_PERMISSION('CP','0',$userid,$glid,$plid,'0','0','0','0','',@OUT);";
                 
                $result=$this->executeQry($sql);
                 if ($result->num_rows > 0) {
					$row	= $result->fetch_array();
					return $row[0];
                 }
	}
	
	// Function to get number of unpublished data on CMS dashboard
    function getDashboardCount($tableName)
	{
		 $sql 		= "CALL USP_CMS_DASHBOARD('V','0',0,0,'$tableName');";                 
         $result	= $this->executeQry($sql);
         if ($result->num_rows > 0) 
		 {
			$row	= $result->fetch_array();
			return $row[0];
		 }
	}
	
	//======== Function for visitors counter === By Sunil Kumar Parida On 01-Feb-2015
	function hitCounter()
	{
		$curDate	= date("Y-m-d");
		$ipAddr		= $_SERVER['REMOTE_ADDR'];
		$hitSql	= "CALL USP_HIT_COUNTER('A','$curDate','$ipAddr')";
		$result	= $this->executeQry($hitSql);
		 if ($result->num_rows > 0) 
		 {
			$row	= $result->fetch_array();
			return $row[0];
		 }
	}
	
	//============ Function to view in money format By ## By Rasmi Ranjan Swain ## 05-jan-2014=========
	function custom_money_format($n, $d = 2) 
	{
		$n	= str_replace(",","",$n);
		$n = number_format((double)$n, $d, '.', '');
		$n = strrev($n);
	
		if ($d) $d++;
		$d += 3;
	
		if (strlen($n) > $d)
			$n = substr($n, 0, $d) . ','. implode(',', str_split(substr($n, $d), 2));
		return strrev($n);
	}
	//============ Function to Get name by ## By Rasmi Ranjan Swain ## 05-jan-2014=========
	public function getName($colName,$tableName,$colId,$id,$deletedFlag)
	{		
		$sql	= "SELECT ".$colName." FROM ".$tableName." WHERE ".$colId."='".$id."'";
		if($deletedFlag!='')
			$sql.= ' AND '.$deletedFlag.'=0 ';		
		$result=$this->executeQry($sql);
		$row=mysqli_fetch_array($result);
		return $row[0];
	}
	//===========Function to create image from Bite code ## By Rasmi Ranjan Swain ## 05-jan-2014
	public function getImage($imgCode,$height,$width,$imagePath,$file)
		{
			$data = base64_decode($imgCode);			
				$im = imagecreatefromstring($data);
			// assign new width/height for resize purpose
			$newwidth 	= $height;
			$newheight  = $width;
			// Create a new image from the image stream in the string
			$thumb = imagecreatetruecolor($newwidth, $newheight); 
			if ($im !== false) {
				// alter or save the image  
				$fileName = $imagePath.$file.date('ymdhis').'.png'; // path to png image
				imagealphablending($im, false); // setting alpha blending on
				imagesavealpha($im, true); // save alphablending setting (important)
				// Generate image and print it
				$resp = imagepng($im, $fileName);
				// resizing png file
				imagealphablending($thumb, false); // setting alpha blending on
				imagesavealpha($thumb, true); // save alphablending setting (important)
				$source = imagecreatefrompng($fileName); // open image
				imagealphablending($source, true); // setting alpha blending on
				list($width, $height, $type, $attr) = getimagesize($fileName);
				imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
				$newFilename = $imagePath.$file.date('ymdhis').'.png';
				$resp = imagepng($thumb,$newFilename);
				// frees image from memory
				imagedestroy($im);
				imagedestroy($thumb);
				$image = $file.date('ymdhis').'.png';
				return $image;
			}
			
		}
    // function to get file comments
  function getFileComments($file)
    {
        $tokens = token_get_all(file_get_contents($file));
        $comments = array();
        foreach($tokens as $token) {
            if($token[0] == T_COMMENT || $token[0] == T_DOC_COMMENT) {
                $comments[] = $token[1];
            }
        }
        return $comments;
    }

   //========= Function to get hierarchy first node By Sunil Kumar Parida on 05-Feb-2015
   function getFirstNode()
   {
   		$hierarchySql	= "CALL USP_ADMIN_HIERARCHY('V', '0', '', '', '0', '0', @OUT);";
		$result			= $this->executeQry($hierarchySql);
		 if ($result->num_rows > 0) 
		 {
			$row	= $result->fetch_array();
			return $row['INT_NODE_ID'];
		 }
   } 
   //========= Function to get hierarchy sub node By Sunil Kumar Parida on 05-Feb-2015
   function getSubNodes()
   {
   		$nodeId			= $this->getFirstNode();
   		$subNodeSql		= "CALL USP_ADMIN_SUBNODE('R', '0', '', '', '$nodeId', '0', '0', @OUT);";
               
		$result			= $this->executeQry($subNodeSql);
		return $result;		 
   }
   
    //========= Function to get hierarchy sub node By Sunil Kumar Parida on 05-Feb-2015
   function getHierarchyGroup()
   {
   		$NodeSql		= "CALL USP_ADMIN_SUBNODE('VG', 0, '', '', 0, 0, 0, @OUT);";
		$result			= $this->executeQry($NodeSql);
		return $result;		 
   }
   
   function getHierarchy($subNodeId)
   {
   		$NodeSql		= "CALL USP_ADMIN_SUBNODE('VH', $subNodeId, '', '', 0, 0, 0, @OUT);";
		$result			= $this->executeQry($NodeSql);
		return $result;		 
   }
   
   //======== Function to view as number By Sunil Kumar Parida On 09-Feb-2015
   function viewNumber($decimalVal)
   {
   		$lastval	= substr($decimalVal, strpos($decimalVal, ".") + 1);
		if($lastval==0)
		{
			$decimalExpl	= explode('.',$decimalVal);
			$decimalVal		= $decimalExpl[0];
		}
		return $decimalVal;
   }
  
   //======== Function to get designation Name ======
   function getDesgName($desgId)
   {
   		$desgSql	= "CALL USP_DESIGNATION('R',$desgId,'','','', 0, 0, @out);";
		$desgResult	= $this->executeQry($desgSql);
		if ($desgResult->num_rows > 0) 
		{
			$row	= $desgResult->fetch_array();
			return $row['VCH_DESG_NAME'];
		}
   }
   function showNodeDetails($id)
   {   
		$sql            = "SELECT FN_ALL_PARENT($id);"; 
		$idResult       = $this->executeQry($sql);
		$ids   			= $idResult->fetch_array();
		$allIds			= substr($ids[0], 0, strrpos($ids[0], ","));
		$explIds		= explode(',',$allIds);
		$ctr            = 0;
		$arrList 		= array();
		$pageArr 		= array();
		foreach($explIds as $indIds)
		{			
			 $subNodeSql	= "SELECT areaName, nodeLabel FROM m_hierarchy_details WHERE INT_SUBNODEVAL_ID=$explIds[$ctr]";
			 $result		= $this->executeQry($subNodeSql);
			 if($result->num_rows>0)
			 {
				 $nrow                 	= $result->fetch_array();
				 $pageArr['areaName']   = $nrow['areaName'];
				 $pageArr['nodeLabel']  = $nrow['nodeLabel'];
				 array_push($arrList, $pageArr);                            
				 $ctr++; 
			 }
		} 
		return $arrList;
	}
	
	//========= Function to get all parent nodes of an Id ===
	function getAllNodes($hierarchyId)	
	{
		$sql        = "SELECT FN_ALL_PARENT($hierarchyId);"; 
		$idResult   = $this->executeQry($sql); 
		$ids   		= $idResult->fetch_array(); 
		return $ids[0];
	}
	
	//========= Function to get node index id ===
	function getNodeId($hierarchyId, $nodeVal)	
	{
		$sql        = "SELECT FN_NODE_INDEX_DATA($hierarchyId,$nodeVal);"; 
		$idResult   = $this->executeQry($sql); 
		if($idResult->num_rows>0)
			$ids   		= $idResult->fetch_array(); 
		return $ids[0];
	}
	
	//========= Function to get node name ===
	function getNodeName($hierarchyId)	
	{
		$sql        = "SELECT areaName FROM vw_hierarchy_details WHERE INT_SUBNODEVAL_ID=$hierarchyId"; 
		$idResult   = $this->executeQry($sql); 
		if($idResult->num_rows>0)
			$ids   		= $idResult->fetch_array(); 
		return $ids[0];
	}
	
	//========= Function to get Assembly name ===
	function getAssemlyName($hierarchyId)	
	{
		$sql        = "SELECT assemblyName FROM vw_hierarchy_details WHERE assemblyId=$hierarchyId limit 1"; 
		$idResult   = $this->executeQry($sql); 
		if($idResult->num_rows>0)
			$ids   		= $idResult->fetch_array(); 
		return $ids[0];
	}
	//========= Function to get Assembly name ===
	function getAssemlyDistrict($hierarchyId)	
	{
		$sql        = "SELECT VCH_VALUE_NAME FROM m_admin_subnode_values WHERE INT_SUBNODEVAL_ID=(SELECT Dist FROM vw_hierarchy_details where assemblyId=$hierarchyId limit 1);"; 
		$idResult   = $this->executeQry($sql); 
		if($idResult->num_rows>0)
			$ids   		= $idResult->fetch_array(); 
		return $ids[0];
	}
	//========= Function to get Assembly name ===
	function getAssemlyDistrictId($hierarchyId)	
	{
		$sql        = "SELECT Dist FROM vw_hierarchy_details where assemblyId=$hierarchyId limit 1;"; 
		$idResult   = $this->executeQry($sql); 
		if($idResult->num_rows>0)
			$ids   		= $idResult->fetch_array(); 
		return $ids[0];
	}
	
	//======== Function to convert number to word ======	
	function convert_number_to_words($number) {
		$hyphen      = '-';
		$conjunction = ' and ';
		$separator   = ', ';
		$negative    = 'negative ';
		$decimal     = ' point ';
		$dictionary  = array(
			0                   => 'zero',
			1                   => 'one',
			2                   => 'two',
			3                   => 'three',
			4                   => 'four',
			5                   => 'five',
			6                   => 'six',
			7                   => 'seven',
			8                   => 'eight',
			9                   => 'nine',
			10                  => 'ten',
			11                  => 'eleven',
			12                  => 'twelve',
			13                  => 'thirteen',
			14                  => 'fourteen',
			15                  => 'fifteen',
			16                  => 'sixteen',
			17                  => 'seventeen',
			18                  => 'eighteen',
			19                  => 'nineteen',
			20                  => 'twenty',
			30                  => 'thirty',
			40                  => 'fourty',
			50                  => 'fifty',
			60                  => 'sixty',
			70                  => 'seventy',
			80                  => 'eighty',
			90                  => 'ninety',
			100                 => 'hundred',
			1000                => 'thousand',
			1000000             => 'million',
			1000000000          => 'billion',
			1000000000000       => 'trillion',
			1000000000000000    => 'quadrillion',
			1000000000000000000 => 'quintillion'
		);
	
		if (!is_numeric($number)) {
			return false;
		}
	
		if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
			// overflow
			trigger_error(
				'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
				E_USER_WARNING
			);
			return false;
		}
	
		if ($number < 0) {
			return $negative . $this->convert_number_to_words(abs($number));
		}
	
		$string = $fraction = null;
	
		if (strpos($number, '.') !== false) {
			list($number, $fraction) = explode('.', $number);
		}
	
		switch (true) {
			case $number < 21:
				$string = $dictionary[$number];
				break;
			case $number < 100:
				$tens   = ((int) ($number / 10)) * 10;
				$units  = $number % 10;
				$string = $dictionary[$tens];
				if ($units) {
					$string .= $hyphen . $dictionary[$units];
				}
				break;
			case $number < 1000:
				$hundreds  = $number / 100;
				$remainder = $number % 100;
				$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
				if ($remainder) {
					$string .= $conjunction . $this->convert_number_to_words($remainder);
				}
				break;
			default:
				$baseUnit = pow(1000, floor(log($number, 1000)));
				$numBaseUnits = (int) ($number / $baseUnit);
				$remainder = $number % $baseUnit;
				$string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
				if ($remainder) {
					$string .= $remainder < 100 ? $conjunction : $separator;
					$string .= $this->convert_number_to_words($remainder);
				}
				break;
		}
	
		if (null !== $fraction && is_numeric($fraction)) {
			$string .= $decimal;
			$words = array();
			foreach (str_split((string) $fraction) as $number) {
				$words[] = $dictionary[$number];
			}
			$string .= implode(' ', $words);
		}
	
		return $string;
	}
	
	//=========== Function to get json file data ========
	function get_json_value($json, $nodeName, $checkId, $valueNode, $textNode)
	{
		//$strJsonfile   	= file_get_contents($fileName);
		//$json		   	= json_decode($strJsonfile, true); 
		$counter		= 0;
		$types			= '';
		foreach($json[$nodeName] as $type)
		{
			$userTypes	= $json[$nodeName][$counter][$valueNode];
			if($userTypes==$checkId)
			{
				$types	= $json[$nodeName][$counter][$textNode];
				break;
			}
			$counter++;
		}
		return $types;
	} 
        
	// ***function to Get address from Latitude and Longitude Coordinates **BY**RASMI RANJAN SWAIN ON 08 March 2015 *** 
	function getAddress($lat, $lon){
	   $url  = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".
				$lat.",".$lon."&sensor=false";
	   $json = @file_get_contents($url);
	   $data = json_decode($json);
	   $status = $data->status;
	   $address = '';
	   if($status == "OK"){
		  $address = $data->results[0]->formatted_address;
		}
	   return $address;
  }
	
	//====== Function to fill form numbers =========
	public function allDistrictList()
	{
		$sql		= "SELECT INT_SUBNODEVAL_ID,VCH_VALUE_NAME FROM m_admin_subnode_values WHERE INT_PARENT_NODE = 1 AND BIT_DELETED_FLAG = 0 ORDER BY VCH_VALUE_NAME ASC;";
		$formResult = $this->executeQry($sql); 
		return $formResult;
	}
        //====== Function to fill form numbers =========
	public function allDepartmentList()
	{
		$sql		= "CALL USP_DEPARTMENT('F', 0, '', 0,'','0','0','0','','');";
		$formResult = $this->executeQry($sql); 
		return $formResult;
	}
        //====== Function to fill form numbers =========
	public function fillDept($deptId, $selVal)
	{
		$sql		= "CALL USP_DEPARTMENT('F', $deptId, '',0,'','0','0','0','','');";
              
		$formResult = $this->executeQry($sql); 
		$options	= $this->FillDropdown($formResult,$selVal,'$txtDeptAName','$createdBy','$intAttr1','$intAttr2','$vchAttr3','$vchAttr4');
		return $options;
	}
	//====== Function to fill Country names =========
	public function fillCountry($selVal)
	{
		$sql		= "CALL USP_COUNTRY_STATE('FC', 0, '');";
		$formResult = $this->executeQry($sql); 
		$options	= $this->FillDropdown($formResult,$selVal);
		return $options;
	}
	//====== Function to fill form numbers =========
	public function fillState($selVal)
	{
		$sql		= "CALL USP_COUNTRY_STATE('FS', 0, '');";
		$formResult = $this->executeQry($sql); 
		$options	= $this->FillDropdown($formResult,$selVal);
		return $options;
	}
	//====== Function to count number of pdf pages ## By## Rasmi Ranjan Swain =========
	function count_pages($pdfname) {
      $pdftext = file_get_contents($pdfname);
      $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
      return $num;
 	}
	//====== Function to delete All a file ## By## Rasmi Ranjan Swain =========
	function EmptyDir($dir) {
		$handle=opendir($dir);
		while (($file = readdir($handle))!==false) {
		@unlink($dir.'/'.$file);
		}
		closedir($handle);
		}

	
	//====== Function to auto link twitter =========
	public function twitterify($ret) {
	  //$ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2", $ret);
	  //$ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2", $ret);
	  $ret = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $ret);
	  $ret = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $ret);
	return $ret;
	}
        public function twitterifyMention($ret) {
	  //$ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2", $ret);
	  //$ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2", $ret);
	  $ret = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $ret);
	  //$ret = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $ret);
          $ret = preg_replace("/#(\w+)/", "<a href=\"http://www.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $ret);
	return $ret;
	}
        public function unTwitterifyMention($text) {
         $modifiedText = preg_replace("#<a.*?>([^>]*)</a>#i", "$1", $text);      
           return $modifiedText;
	}
        public function tweetLink($text) {
          
	 $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
           
         if(preg_match($reg_exUrl, $text, $url)) {
            // echo $url[0];exit;//http://www.twitter.com/csmtechWeb"
          $retxt =  preg_replace($reg_exUrl, "<a href=".$url[0]." target='_blank'>.$url[0].</a> ", $text);

        } else {

               // if no urls in the text just return the text
               $retxt = $text;

        }
         
	return $retxt;
	}
        
        public function getPermissionDetails($userId,$gl,$pl)
	{
            $gl = ($gl!='')?$gl:0;
            $pl = ($pl!='')?$pl:0;
            $sql		= "CALL USP_ADMIN_PERMISSION('VP','0','$userId','$gl','$pl','0','0','0','0','',@out);";
            $formResult     = $this->executeQry($sql); 
            $row            = $formResult->fetch_array();
            $result         = $row['INT_PERMISSION'];
            return $result;
	}
        public function uploadFTP($server, $username, $password, $local_file, $remote_file) {
        // connect to server
        $connection = ftp_connect($server);

        // login
        if (@ftp_login($connection, $username, $password)) {
            // successfully connected
        } else {
            return false;
        }
        //mode FTP_BINARY/FTP_ASCII
        if (ftp_put($connection, $remote_file, $local_file, FTP_BINARY))
            return 1;
        else
            return 0;
        ftp_close($connection);
        // return true;
    }
    
    function getCategoryNames($vchCategory){
        if($vchCategory!=''){
            $catArr         = explode(",",$vchCategory);
            $count          = count($catArr);
            for($x=0;$x<$count;$x++){
                $sql            = "CALL USP_VISIT_TYPE('V',".$catArr[$x].",'', '');";
                $formResult     = $this->executeQry($sql); 
                $row            = $formResult->fetch_array();
                $catName       .= $row['vchVisitType'].', ';
            }
            $catName	= substr($catName,0,-2);	
            return $catName;
        }
    }
    
    // ***function to get WebPath **BY**RASMI RANJAN SWAIN ON 10-Feb-2016 *** 
        function webPath() {
            if (basename($_SERVER['PHP_SELF']) == 'index.php')
                $strPath = "";
            else
                $strPath = "../";

            $strQS = $_SERVER['QUERY_STRING'];
            $intQSCount = count(explode("&", $strQS));
            //echo $intQSCount."<br>";
            if ($intQSCount > 0) {
                for ($i = 1; $i < $intQSCount; $i = $i + 1) {
                    $strPath = "../" . $strPath;
                }
            }
            return $strPath;
        }
    
    // ***function to Get previlage details **BY**Chinmayee ON 19-Sep-2016 ***  
       public function checkPrivilege($userId, $glId, $plId, $pagetype,$pageName)
        {
            $strPath = model::webPath();
            $flag = 0;
            //echo $glId."==".$plId;
            $redirectVal=(ADMIN_PRIVILEGE == 1 || ADMIN_PRIVILEGE==0 || USER_TYPE==1)?'dashboard':'ataDashboard';
            if (ADMIN_PRIVILEGE == 1 || ADMIN_PRIVILEGE==0) {
                 return array('Manage' => 'yes', 'View' => 'yes', 'add' => 'yes','edit' =>'yes','delete' => 'yes');
            } else {
               
                //assign $page as 'A' for Add&View, 'V' for view&edit , 'M' for add,view&edit
                if($glId!='' && $plId!=''){
                    $sql = "CALL USP_ADMIN_PERMISSION('VP', '0', '$userId', '0', '0', '0', '0', '0', '0', '$pageName', @OUT);";
                 //echo $sql;exit;  
                //$sql = "CALL USP_ADMIN_PERMISSION('VPS',0,$userId,$glId,$plId,'0','0','0','0','0','0',@out);";
               
                $result = $this->executeQry($sql);
                $row = $result->fetch_array();
                $_SESSION['sessGLVal']=$row['INT_GL_ID'];    
                $_SESSION['sessPLVal']=$row['INT_PL_ID'];
                
                $functionName = trim($row['FUNCTION_NAME']);
               $relatedPageAry = !empty($row['VCH_RELATED_PAGES'])?explode(',',$row['VCH_RELATED_PAGES']):array();
                array_push($relatedPageAry, $functionName);
                if ($result->num_rows > 0 && in_array($pageName,$relatedPageAry)) {
                    $noAdd    = '';
                    $noManage = '';
                    $noView   = '';
                    $noEdit   = '';
                    $noDelete = 'yes';
                    $noActive = 'yes';
                    $nopublish = 'yes';
                     if ($row['INT_PERMISSION'] == 1) {
                                $noAdd    = 'yes';
                                $noView   = 'yes';
                                $noManage = 'no';
                                $noEdit   = 'no';
                                $noDelete = 'no';
                            }
                  
                      if ($row['INT_PERMISSION'] == 2) {
                                $noAdd    = 'no';
                                $noView   = 'yes';
                                $noManage = 'no';
                                $noEdit   = 'no';
                                $noDelete = 'no';
                            }
                 
                      if ($row['INT_PERMISSION'] == 3) {
                                $noAdd    = 'yes';
                                $noView   = 'yes';
                                $noManage = 'yes';
                                $noEdit   = 'yes';
                                $noDelete = 'yes';
                            }
                  
                        return array( 'Manage' => $noManage, 'View' => $noView, 'add' => $noAdd, 'edit' =>$noEdit,'delete' => $noDelete);
                    } else {
                        
                      // echo "<script>location.href = '".APPURL.$redirectVal."/'</script>";
                    } 
                  } else {
                       //echo "<script>location.href = '".APPURL.$redirectVal."/'</script>";
                } 

            }
        }
        
        public function executeQryAnalyzer($sql)
	{
		$this->createConnection();
		$result	= $this->db->query($sql) or $result = mysqli_error($this->db);
		$this->db->close();
		return $result;
	}
        public function getUserDetailsbyId($userId)
	{
		$sql = "SELECT VCH_FULL_NAME,(SELECT VCH_DESG_NAME FROM m_admin_desg_master WHERE INT_DESG_ID = INT_DESIGNATION_ID)AS DESIGNATION FROM m_admin_user WHERE INT_USER_ID = ".$userId;
                $result = $this->executeQry($sql);
                $userRow = $result->fetch_array();
                $name = $userRow['VCH_FULL_NAME'];
                $designation = $userRow['DESIGNATION'];
                return array('name'=>$name,'designation'=>$designation);
	}
    //     public function getAccessTokens()
	// {
	// 	$sql = "SELECT intId, vchAccountType, vchAccountName, vchScreenName, vchUserName,vchAccessToken, vchAccessSecret, intCreatedBy, dtmCreatedOn FROM m_ms_api_account WHERE bitDeletedFlag=0  AND vchAccountType = 'Twitter' AND tinDisplayStatus = 1 ORDER BY dtmCreatedOn DESC";
    //             $result = $this->executeQry($sql);
    //             $userRow = $result->fetch_array();
    //             $accessToken     = $userRow['vchAccessToken'];
    //             $accessTokenSecret       = $userRow['vchAccessSecret'];
    //             $screenName       = $userRow['vchScreenName'];
    //             $screenUserName       = $userRow['vchUserName'];
    //             return array('accessToken' => $accessToken,'accessTokenSecret'=>$accessTokenSecret,'screenName'=>$screenName,'screenUserName'=>$screenUserName);
	// }
    //     public function getFacebookPages() {
    //     $pageArr            = array();
    //     $sql                = "SELECT intId, vchAccountName, vchUserName, vchScreenName, vchAccessToken, tinDisplayStatus, intCreatedBy, dtmCreatedOn, bitDeletedFlag FROM m_social_account WHERE tinDisplayStatus = 1 AND vchAccountName='FB Page' ORDER BY vchScreenName ASC;";
    //     //echo $sql;
    //     $result             = $this->executeQry($sql);
    //     while($row = $result->fetch_array()){
    //         $arr['pageId']      = $row['vchUserName'];
    //         $arr['pageName']    = $row['vchScreenName'];
    //         $arr['pageAT']      = $row['vchAccessToken'];
    //         $arr['intId']       = $row['intId'];
    //         $arr['parentAN']    = $row['vchAccountName'];
    //         array_push($pageArr, $arr);
    //     }
    //     return array('facebookPageArr' => $pageArr);
    // }
    public function removeAnchor($text){
       // echo "---";exit;
        //$modifiedText = preg_replace("/&lt;a.*&gt;(.+)&lt;\/a&gt;/", "", $text);
        $modifiedText = preg_replace("/<a.*>(.+)<\/a>/", "", $text);
        return $modifiedText;
    }
    public function removeAnchorTag($text){
        $modifiedText = preg_replace("/<a.*>(.+)<\/a>/", "", $text);
        return $modifiedText;
    }
     /*
        Function to check Validations for Multiple fields atonce
        By: Ashis Kumar Patra  
        On: 05-JUly-2017
        */  
         public function chkFieldAry($fieldarray,$function){
             $msg ='';
             if(count($fieldarray)>0 && $function !=''){
                 switch(trim($function)){
                     
                     case 'isBlank':
                            $blankchkAry = array_map(array($this, 'isBlank'), array_reverse($fieldarray));
                            foreach ($blankchkAry as $key => $value) {
                                if ($value == 1) {
                                    $msg = $key . " cannot be left blank";
                                    $errFlag = 1;
                                    $flag = 1;
                                }
                            }
                         break;
                     case 'chkDropdown':
                         $blankchkAry = array_map(array($this, 'chkDropdown'), array_reverse($fieldarray));
                            foreach ($blankchkAry as $key => $value) {
                                if ($value == 1) {
                                    $msg = $key . " cannot be left blank";
                                    $errFlag = 1;
                                    $flag = 1;
                                }
                            }
                         break;
                     case 'isSpclChar':
                          $specialchkAry = array_map(array($this, 'isSpclChar'), array_reverse($fieldarray));
                        foreach ($specialchkAry as $key => $value) {
                            if ($value == 1) {
                                $msg = "Special Characters are not allowed in " . $key;
                                $errFlag = 1;
                                $flag = 1;
                            }
                        }
                         break;
                     default:
                      break;
                 } 
             }
          return $msg;
        }
        
        public function format_decimals($string) {
        $decVal = str_replace(".00", "", (string)number_format ($string, 2, ".", ""));
        return $decVal;
        }
        
        function getMax($array) {
                    $maxArray = array();
                    array_walk_recursive($arr, function($val, $key) use(&$maxArray){
                  if( ( !$maxArray[$key] ) || $maxArray[$key] < $val ){
                      $maxArray[$key] = $val;
                  }
              });
              return $maxArray;
        }
        
        //Function to verify JWT token By  Ashis kumar Patra on 23-Feb-2016
         public function verifyJWT()
        {
            $headerArr = getallheaders();
            $securityToken = $headerArr['auth_token'];
            $status = 0;
            if(JWT::decode($securityToken, JWTkey)){
               $status = 1;
            } else{
            $status = 2;
            }
            return $status;
            
        }
       /*Funtion to send Notification to officer when Complaint registered*/
        function sendAndroidNotification($devices, $message) {
        $apiKey = "AAAA_6pB4Q8:APA91bGj7j85CyN_hTpejx8IRy2Yf2mGmb4rHEq6IC1sQGuoF23umuztPKqHQ3JrJZwprGQ-WvlmBOGb4EeYq5wLKGDjbJu-tcjQpGmyOfaOZmc4xZud8hd4EOFnOfNWVPaQTb-B4EF0j_sPnYi7u-nwDak4owIWyg";
        #API access key from Google API's Console
        define('API_ACCESS_KEY', $apiKey);
        
        echo '<script>
          
            endpoint = "https://cordova-plugin-fcm.appspot.com"


            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if(xhttp.readyState == 4){
            
             }
            };
            xhttp.open("POST", endpoint+\'/push/freesend\', true);
            xhttp.setRequestHeader("Content-type", "application/json");
            xhttp.setRequestHeader("Access-Control-Allow-Origin", "*");
            var payload={
            recipient:"'.$devices.'",
            isTopic:false,
            title:"SMGM",
            body:"'.$message.'",
            apiKey:"'.API_ACCESS_KEY.'",
            application:"com.csm.smgm"
            }
            xhttp.send(JSON.stringify(payload));
        
            </script>';
        
        /*if(xhttp.status == 200){
            var response = JSON.parse(xhttp.responseText);
            console.log( response );
            if(response.result == 1) alert( \'ERROR: \' + response.message )
            else alert( \'Push notification sent successfully!\' )
            }

          alert(JSON.stringify(payload));  */
       
    }
    
    function sendAndroidNotify($devices, $message, $type) {
        
        $apiKey = "AAAABHeDYAE:APA91bHl6cWF6iEqryUtm4o_roDyjILl4m79aWJF9RpvoBUhMcrnomZ3jQF2EhMTCit-dc1AUB1Ln-WGCWdYI8x2syTbV04mO3wh6Xe13bjMyTHiGpJkZnWQ6Fv4D2g3MEPs903bFKWp";
       // $senderId = '1098073104655';
        #API access key from Google API's Console
        define('API_ACCESS_KEY', $apiKey);

        #prep the bundle
        $msg = array
            (
            'body' => $message,
            'title' => 'CM GRIEVANCE',
            'click_action'=>'FCM_PLUGIN_ACTIVITY',
            'icon' => '', 
            'sound' => ''
           );
        $key = array
            (
                'param' => "1",
                'message'=>$message
               
            );
        
        //$fields = array('to' => $devices, 'notification' => $msg);
        //$fields = json_encode($fields);
        //echo '<pre>';print_r($fields);echo '</pre>';exit;
        //$fields = array('registration_ids' => $devices, 'data' => $msg);
        if($type == 1){
            //$fields = array('to' => $devices, 'notification' => $msg,'data' => $key);
            $fields = array('to' => $devices, 'notification' => $msg,'data' => $key);
        }
        if($type == 2){
            $fields = array('registration_ids' => $devices, 'notification' => $msg,'data' => $key);
        }
        
        $headers = array
            (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        #Send Reponse To FireBase Server	
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        #Echo Result Of FireBase Server
        $resArr = json_decode($result, true);
        
        //print_r($resArr);exit;
       
    }
    public function findMatch($arr,$str) {
        //print_r($arr);echo "<br/>";
        //print_r($str);echo "<br/>";
        
        //echo strpos('<a href="http://www.twitter.com/csmtechWeb" target="_blank">@csmtechWeb</a> <a href="http://www.twitter.com/AsaramBapuJi" target="_blank">@AsaramBapuJi</a> be sure to use the strict checking when searching for a string in the array <a href="http://www.twitter.com/search?q=FloodReliefSevaByBapuji" target="_blank">#FloodReliefSevaByBapuji</a>','AsaramBapuJi');
        //exit;
        $count      = 0;   
        foreach ($arr as $value) {
           //echo $str.'============'.$value.'</br></br></br></br>'; 
            $retVal = strpos($str, trim($value));
            //echo '******'.$retVal.'****';
            if($retVal!== false)
            {
                $count++;
            }
            
        }
        return $count;
    }
    
     // ======================Function to send Authenticated mail By Ashis kumar Patra==========================	
        public function sendAuthMail($jsData){
            define('PHP_MAILER_PATH',SITE_PATH.'PHPMailer/');
            include_once(PHP_MAILER_PATH."PHPMailerAutoload.php");
            $data           = json_decode($jsData);
            $mail           = new PHPMailer;
            //Enable SMTP debugging. 
            $mail->SMTPDebug = false;                               
            //Set PHPMailer to use SMTP.
            $mail->isSMTP();            
            //Set SMTP host name                          
            $mail->Host = $data->host;
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;                          
            //Provide username and password     
            $mail->Username = $data->user;                 
            $mail->Password = $data->pass;                           
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = $data->enct;                           
            //Set TCP port to connect to 
            $mail->Port = $data->port;                                   

            $mail->From = $data->from;
            $mail->FromName = "Sociomatic";
            
            $countMail = count($data->to);
            $countccMail = count($data->cc);
            $countbccMail = count($data->bcc);
            if($countMail>0)
			{
				foreach($data->to as $mailTo)
				{                
					$mail->addAddress($mailTo, $data->name);
				}
            }
			if($countccMail>0)
			{
				foreach($data->cc as $ccMail)
				{					
					$mail->AddCC($ccMail);
				}
            }
			if($countbccMail)
			{
				foreach($data->bcc as $bccMail)
				{                
					$mail->AddBCC($bccMail);
				}
            }
           
            if($data->FileName !=''){
            $mail->AddAttachment($data->FileName);
                $url = APP_PATH."uploadDocuments/notification/".$data->FileName;
                 $mail->AddAttachment($url, $name = 'Notification_pdf',  $encoding = 'base64', $type = 'application/pdf');
            }
            
            $mail->isHTML(true);

            $mail->Subject = $data->sub;
            $mail->Body = $data ->message;

            if(!$mail->send()) {
                $res['msg'] = "Mailer Error: " . $mail->ErrorInfo;
            } 
            else{
                $res['msg'] = "Mail Sent";
            }
            $jsRes = json_encode($res);
            return $jsRes;
        }
        
        /*================function to encrypt decrypt string====================
			By				:Ashis kumar Patra
			ON				:06-Jan-2017
	================================================================*/
   
               public $crypKey="SOCIOMATICSMGMAP";
               public function encrypt($data)
                {
                   
                        $encrKey	= $this->crypKey;
                        $output         = false;
                        $encrypt_method = "AES-256-CBC";
                        //pls set your unique hashing key
                        $secret_key     = $encrKey;
                        $secret_iv      = 'csm#123@809';
                        // hash
                        $key            = hash('sha256', $secret_key);
                        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
                        $iv             = substr(hash('sha256', $secret_iv), 0, 16);
                        $output         = openssl_encrypt($data, $encrypt_method, $key, 0, $iv);
                        $output         = base64_encode($output);
                        
                        $replacedStr	= str_replace("/","-",$output);
                        $replacedStr	= str_replace("=","_",$replacedStr);
                        $replacedStr	= str_replace("+","$",$replacedStr);
                        return $replacedStr;
                }

                public function decrypt($data)
                {
                       // echo $data;
                        $replacedStr	= str_replace("-","/",$data);
                        $replacedStr	= str_replace("_","=",$replacedStr);
                        $replacedStr	= str_replace("$","+",$replacedStr);
                        
                        $decrKey	= $this->crypKey;
                        $output         = false;
                        $encrypt_method = "AES-256-CBC";
                        //pls set your unique hashing key
                        $secret_key     = $decrKey;
                        $secret_iv      = 'csm#123@809';
                        // hash
                        $key            = hash('sha256', $secret_key);
                        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
                        $iv             = substr(hash('sha256', $secret_iv), 0, 16);
                        
                        $output         = openssl_decrypt(base64_decode($data), $encrypt_method, $key, 0, $iv);
                        return $output;
                }
                
                
                public function sentimateFacebook()
                {
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => SENTIMATE_FACEBOOK_URL,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                      "authorization: Basic YWN1bWFuOmFjdW1hbkAxMiQyMQ==",
                      "cache-control: no-cache",
                       "Username:".SENTIMATE_ACCESS_USER,
                      "Password: ".SENTIMATE_ACCESS_PASS
                    ),
                  ));
                  $response = curl_exec($curl);
                  $err = curl_error($curl);
                  curl_close($curl);
                  if ($err) {
                    return "cURL Error #:" . $err;
                  } else {
                    return $response;
                  }
                }
                
                public function sentimateTwitter()
                {
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => SENTIMATE_TWITTER_URL,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                      "authorization: Basic YWN1bWFuOmFjdW1hbkAxMiQyMQ==",
                      "cache-control: no-cache",
                      "Username:".SENTIMATE_ACCESS_USER,
                      "Password: ".SENTIMATE_ACCESS_PASS
                    ),
                  ));
                  $response = curl_exec($curl);
                  $err = curl_error($curl);
                  curl_close($curl);
                  if ($err) {
                    return "cURL Error #:" . $err;
                  } else {
                    return $response;
                  }
                }
                
                public function sendSMS($mobileno,$message){
                	// echo 1; exit;
                		/*
                   //echo $mobileno;
                        $fields = '';
                        https://mgov.gov.in/msdp_techarticle.jsp
                        $url = "https://msdgweb.mgov.gov.in/esms/sendsmsrequest";
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
                        */
                    }
                    
         /*** Function to generate OTP & password By Ashis kumar Patra on 12-Jan-2016
            Returns a randomized string of chars/sybols/numbers for specified length
            @param $l = length (default=8)
            @param $s = use symbols? T/F
            @param $a = use alpha characters? T/F
            @param $n = use numbers? T/F ***/
            function generateOTP($l=8,$s=1,$a=1,$n=1) 
            {
                $string = ''; $chars = array();
                    if ($s) $chars = array_merge($chars,array(
                                       33,35,36,37,38,40,41,42,43,44,45,
                                       46,47,58,59,60,61,62,63,64,91,93,
                                       94,95,123,124,125,126
                                       ));
                    if ($a) $chars = array_merge($chars,array(
                                       65,66,67,68,69,70,71,72,73,74,
                                       75,76,77,78,79,80,81,82,83,84,
                                       85,86,87,88,89,90,
                                       97,98,99,100,101,102,103,104,105,106,
                                       107,108,109,110,111,112,113,114,115,116,
                                       117,118,119,120,121,122
                                       ));
                    if ($n) $chars = array_merge($chars,array(
                                       48,49,50,51,52,53,54,55,56,57
                                       ));
                for ($i=0;$i<$l;$i++) {shuffle($chars);$string.=chr(reset($chars));}
                return $string;
            }
            
        public function get_http_response_code($url)
        {
            $headers = get_headers($url);
            return substr($headers[0], 9, 3);
        }
 //FUnction for socialTiming **BY** Ashok Samal ON 18-AUG-2017 *** /
function socialTiming ($gdt)
{
	$time = strtotime($gdt);
    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    
    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}   

/*
      Function to Check User Mapping Data
      By: Ashis kumar Patra
      On: 16-Dec-2017
     */

    public function getMappedData($userId) {
        $mappedUserId = 0;

        if ($userId != '' && $userId != 0) {
            include_once(CLASS_PATH.'clsGroupingConfig.php');
            $objAppGroup = new clsUserGrouping;

            $result = $objAppGroup->viewUserGrouping('CMU', 0, $userId);
            if ($result->num_rows > 0) {
                $rowsData = $result->fetch_array();
                $mappedUserId = $rowsData['intMappedUserId'];
            }
        }
        return $mappedUserId;
    }




    /*
      Function to get username from fb ID
      By: Samir Kumar
      On: 17-Jan-2018
    */  
    public function getFacebookNameById($userId) {
        $json_link = "https://graph.facebook.com/" . $userId . "?access_token=".DEV_AT; 
        $json = file_get_contents($json_link);
        $objArrData = json_decode($json, true);
        $objArr = $objArrData['name'];
        return $objArr;
    }
    
     /*
      Function to Call Node js API for Notification
      By: Ashis kumar Patra
      On: 02-Feb-2018
    */
    
     public function callNodeAPI($method,$params) {
             $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_PORT => "3000",
              CURLOPT_URL => NODE_SERVER_ADDRESS.$method,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => json_encode($params),
              CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json"
              ),
            ));

            $response = curl_exec($curl);
            $err       = curl_error($curl);
            curl_close($curl);
            exit($response);
            if ($err) {
              return  array('message'=>$err,'status'=>2,'count'=>0);
            } else {
              return  json_decode($response,true);
            }
         }
         
         /*
      Function for error logging
      On: 16-Mar-2018
         */
         
     public function writeException($e) {
            $msg = $e->getMessage();
            $trace = $e->getTrace();
            $result .= 'Class: '.$trace[0]['class'].', ';
            $result .= 'Function: '.$trace[0]['function'].',';
            $result .= 'Line: '.$trace[0]['line'].', ';
            $result .= 'File: '.$trace[0]['file'];
            //echo 'Caught exception: <pre>'.print_r($e->getMessage())."</pre>\n";
            // WRITE TEXTFILE START///
            $filename = 'errorLogs'.date('d-m-Y').'.txt';
            $myfile = fopen(SITE_PATH.'uploadDocuments/errorLogs/'.$filename, "a") or die("Unable to open file!");
            $txt = "Error Occured On :".date('d-m-Y H:i:s')." \r\n";
            fwrite($myfile, "\r\n". $txt);
            $txt = "==============================================\r\n";
            fwrite($myfile, $txt);
            $txt = "Error Message: ".$msg." \r\n";
            fwrite($myfile, "\r\n". $txt);
            $txt = $result."\r\n";
            fwrite($myfile, $txt);
            fclose($myfile);
            // WRITE TEXTFILE END///
            }
    
       
                function array_column(array $input, $columnKey, $indexKey = null) {
                    $array = array();
                    foreach ($input as $value) {
                        if ( !array_key_exists($columnKey, $value)) {
                            trigger_error("Key \"$columnKey\" does not exist in array");
                            return false;
                        }
                        if (is_null($indexKey)) {
                            $array[] = $value[$columnKey];
                        }
                        else {
                            if ( !array_key_exists($indexKey, $value)) {
                                trigger_error("Key \"$indexKey\" does not exist in array");
                                return false;
                            }
                            if ( ! is_scalar($value[$indexKey])) {
                                trigger_error("Key \"$indexKey\" does not contain scalar value");
                                return false;
                            }
                            $array[$value[$indexKey]] = $value[$columnKey];
                        }
                    }
                    return $array;
                }
                
                function wardWrap($ward, $minNum) {
                $returnWard = $ward;
                    if (strlen($ward) > $minNum) {
                        $remainText = substr($ward, 0, $minNum);
                        $string = $remainText;
                        $string = explode(' ', $string);
                        array_pop($string);
                        $string = implode(' ', $string);
                        $returnWard = $string . ' ...';               
                    }
                    return $returnWard;
            }
            // this function is used to create acronym of full name BY: Rudra On: 23-July-2019
            public function createAcronym($string, $onlyCapitals = false) {
                $output = null;
                $token  = strtok($string, ' ');
                while ($token !== false) {
                    $character = mb_substr($token, 0, 1);
                    if ($onlyCapitals and mb_strtoupper($character) !== $character) {
                        $token = strtok(' ');
                        continue;
                    }
                    $output .= $character;
                    $token = strtok(' ');
                }
                return strtoupper(substr($output, 0, 3));
            }


            function GetResizeImage($objCusModel,$folderPath,$reqWidth,$fieldName,$txtTempName)
				{ 
				$errors=0;
				$errMsg="";
				$image = $fieldName;
				$uploadedfile = $txtTempName; 
				        if ($image) 
				{
				$filename = stripslashes($fieldName);
				$extension = $objCusModel->getExtension($filename);
				$extension = strtolower($extension);
				if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
				  {
				$errMsg=' Unknown Image extension ';
				$errors=1;
				  }
				else
				{
				$size=filesize($txtTempName);
				if($extension=="jpg" || $extension=="jpeg" )
				{
				$uploadedfile = $txtTempName;
				$src = imagecreatefromjpeg($uploadedfile);
				}
				else if($extension=="png")
				{
				$uploadedfile = $txtTempName;
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
				$filename = $folderPath. $fieldName;                                                
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
        
      /*================function to execute query ====================
			By	:Chinmayee
			ON	:21-09-2019
	================================================================*/
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
 	  //if($strProcAction=='GQ') {echo $sql.";";exit;}
 	   // echo $sql.";";exit;
 	 //if($strProcAction=='VODP') {echo $sql.";";}
 	   // echo $sql.";";//exit;

	 // if($strProcAction=='GQoutboundDataMisInner') {echo $sql.";";exit; }

	 // if($strProcAction=='VAA') {echo $sql.";";exit; }

 	  // if($strProcAction=='APIH') {echo $sql.";"; }
 	    // echo $sql.";";exit;
// 

        include_once("controller/clsCSRFprevent.php");
        $csrf = new clsCSRFprevent();
        if(isset($_POST['csrf_token_id'])){
        	$_POST[$csrf->get_token_id()] = $_POST['csrf_token_id']	;
        	unset($_POST['csrf_token_id']);
        }
        // print_r($_POST);exit;
        $varAction = [];
        if(!in_array($action, $varAction)){
            
            if(!empty($_POST)) {
                if(!($csrf->check_valid('post'))) {
                    header('HTTP/1.0 403 Found');
                    http_response_code(403);
                    echo 'Access Forbiden'; exit;
                }
            }
        }
        
        $result_set = $this->executeQry($sql); //print_r($result_set);exit;
        return $result_set; 
    }


     /*================function to get District Id from name ====================
			By	:Chinmayee
			ON	:23-09-2019
	================================================================*/
	public function getDistrictId($strDistName)
    {    
        $sql	= "SELECT INT_SUBNODEVAL_ID FROM m_admin_subnode_values WHERE INT_PARENT_NODE=1 AND BIT_DELETED_FLAG=0 AND VCH_VALUE_NAME LIKE '%".$strDistName."%'";
        $result = $this->executeQry($sql);
       // print_r($result);exit;
		$row   = $result->fetch_array();
		return $row[0];
    }

     /*================function to write log  ====================
			By	:Chinmayee
			ON	:24-09-2019
	================================================================*/

    public function writeToLog($logData, $type)
    {    
            $ctrl = 0;
            $total=0;
            $success=0;
            $fail=0;
            //foreach ($logData as $res) {
                $res=   $logData;
                 // print_r($res);exit;
            $msg = "";
            $jobId = $res['jobId'];
            $counterArr =$res['counterArr'];
            $RowNumber  =$res['RowNumber'];
            if(!empty($counterArr)){
                $total=$counterArr['total'];
                $success=$counterArr['success'];
                $fail=$counterArr['fail'];
            }
            $msg .= 'Job Name :' . $res['jobName'] . ";";
                    if ($type == EXCEL_IMPORT) {
                    $msg .= 'User Name:' . $res['vchScreenName'] . " (" . $res['vchUserName'] . ");";
                    }
                    $msg .= 'Row Number :' .$res['RowNumber'] . ";";
                    
                    $msg .= 'Start Time :' . $_SESSION['START']['ACC'. $jobId] . ";";
                    $msg .= 'Message :' . $res['msg']. ";";
                    if($total>0){
                        $msg .= 'Total Count :' . $total . ";";
                    }
                    if($success>0){
                        $msg .= 'Total Success Count :' . $success . ";";
                    }
                    if($fail>0){
                        $msg .= 'Total Fail Count :' . $fail . ";";
                    }
                    
                    $msg .= 'End Time :' . $_SESSION['END']['ACC'. $jobId] . ";";
                    // echo $msg; exit;
                    $ctrl++; // counter 
                    $filename = $jobId. '_' . date('Ymd') . '.txt';
                    // WRITE TEXTFILE START///
                    $myfile = fopen(SITE_PATH . 'cronLog/' . $filename, "a") or die("Unable to open file!");
                    $txt = $msg;
                    fwrite($myfile, "\r\n" . $txt);
                    fclose($myfile);
            // WRITE TEXTFILE END///
            //}
           // unset($_SESSION['START']);
           // unset($_SESSION['END']);
    }

    // Method for Get Date with Format from Date Time
    public function getFormatDate($vchDateTime){
    	$vchConvertedDate = date('d-m-Y',strtotime($vchDateTime));
    	if($vchConvertedDate == '01-01-1970'){
    		$vchDate 	= substr($vchDateTime,0,2);
    		$vchMonth 	= substr($vchDateTime,3,2);
    		$vchYear 	= substr($vchDateTime,6,4);
    		$vchConvertedDate = $vchDate.'-'.$vchMonth.'-'.$vchYear;	
    	}
    	return $vchConvertedDate;//exit;
    }

    // Method for Get Call Duration
    public function getCallDuration($fromDateTime, $toDateTime){

    	$fromDateTime = strtotime($fromDateTime);// strtotime("2016-06-01 22:45:00");  
		$toDateTime = strtotime($toDateTime);//strtotime("2018-09-21 10:44:01");

		// Formulate the Difference between two dates 
		$diff = abs($toDateTime - $fromDateTime);  
		  
		  
		// To get the year divide the resultant date into 
		// total seconds in a year (365*60*60*24) 
		$years = floor($diff / (365*60*60*24));  
		  
		  
		// To get the month, subtract it with years and 
		// divide the resultant date into 
		// total seconds in a month (30*60*60*24) 
		$months = floor(($diff - $years * 365*60*60*24) 
		                               / (30*60*60*24));  
		  
		  
		// To get the day, subtract it with years and  
		// months and divide the resultant date into 
		// total seconds in a days (60*60*24) 
		$days = floor(($diff - $years * 365*60*60*24 -  
		             $months*30*60*60*24)/ (60*60*24)); 
		  
		  
		// To get the hour, subtract it with years,  
		// months & seconds and divide the resultant 
		// date into total seconds in a hours (60*60) 
		$hours = floor(($diff - $years * 365*60*60*24  
		       - $months*30*60*60*24 - $days*60*60*24) 
		                                   / (60*60));  
		  
		  
		// To get the minutes, subtract it with years, 
		// months, seconds and hours and divide the  
		// resultant date into total seconds i.e. 60 
		$minutes = floor(($diff - $years * 365*60*60*24  
		         - $months*30*60*60*24 - $days*60*60*24  
		                          - $hours*60*60)/ 60);  
		  
		  
		// To get the minutes, subtract it with years, 
		// months, seconds, hours and minutes  
		$seconds = floor(($diff - $years * 365*60*60*24  
		         - $months*30*60*60*24 - $days*60*60*24 
		                - $hours*60*60 - $minutes*60));  
		  
		// Print the result 
		// printf("%d years, %d months, %d days, %d hours, "
		//      . "%d minutes, %d seconds", $years, $months, 
		//              $days, $hours, $minutes, $seconds); 
		$hours 	= ($hours > 0)?sprintf("%02d", $hours).':':'';
		return $hours.sprintf("%02d", $minutes).':'.sprintf("%02d", $seconds);
    }



            public function generatePdfP($content,$savePath,$fileName){	
            require_once(MPDF_PATH."mpdf.php");
            $mpdf=new mPDF('c','A4','','' , 10 , 10 , 10 , 30 , 10 , 10); 
            $stylesheet = file_get_contents(URL.'css/custom.css');            
            $mpdf->WriteHTML($stylesheet,1);
            $mpdf->WriteHTML($content);
           
            $mpdf->Output($savePath.$fileName,'F');
            }

     //function to send bulk unicode sms
	function sendBulkUnicode($username,$encryp_password,$senderid,$messageUnicode,$mobileNos,$deptSecureKey){
	    $finalmessage=$this->string_to_finalmessage(trim($messageUnicode));
	    $key=hash('sha512',trim($username).trim($senderid).trim($finalmessage).trim($deptSecureKey));
	    
	    $data = array(
	    "username" => trim($username),
	    "password" => trim($encryp_password),
	    "senderid" => trim($senderid),
	    "content" => trim($finalmessage),
	    "smsservicetype" =>"unicodemsg",
	    "bulkmobno" =>trim($mobileNos),
	    "key" => trim($key)
	    );
	   	$res = $this->post_to_url_unicode("https://msdgweb.mgov.gov.in/esms/sendsmsrequest",$data); //calling post_to_url_unicode to send bulk unicode sms
	   	return $res;
	   }


            
       /* SMS */
       //function to send single unicode sms
	function sendSingleUnicode($username,$encryp_password,$senderid,$messageUnicode,$mobileno,$deptSecureKey){
	 	$finalmessage=$this->string_to_finalmessage(trim($messageUnicode));
		 $key=hash('sha512',trim($username).trim($senderid).trim($finalmessage).trim($deptSecureKey));
		 
		 $data = array(
		 "username" => trim($username),
		 "password" => trim($encryp_password),
		 "senderid" => trim($senderid),
		 "content" => trim($finalmessage),
		 "smsservicetype" =>"unicodemsg",
		 "mobileno" =>trim($mobileno),
		 "key" => trim($key)
		 );
		 // print"<pre>";
		 // print_r($data); exit;
		 $res = $this->post_to_url_unicode("https://msdgweb.mgov.gov.in/esms/sendsmsrequest",$data); //calling post_to_url_unicode to send single unicode sms
		 return $res;
 	}

 	 function post_to_url_unicode($url, $data) {
	    $fields = '';
	    foreach($data as $key => $value) {
	    $fields .= $key . '=' . urlencode($value) . '&';
	    }
	    rtrim($fields, '&');

	    $post = curl_init();
	    //curl_setopt($post, CURLOPT_SSLVERSION, 5); // uncomment for systems supporting TLSv1.1 only
	    curl_setopt($post, CURLOPT_SSLVERSION, 6); // use for systems supporting TLSv1.2 or comment the line
	    curl_setopt($post,CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($post, CURLOPT_URL, $url);	 
	    curl_setopt($post, CURLOPT_POST, count($data));
	    curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
	    curl_setopt($post, CURLOPT_HTTPHEADER, array("Content-Type:application/x-www-form-urlencoded"));
	    curl_setopt($post, CURLOPT_HTTPHEADER, array("Content-length:"
	    . strlen($fields) ));
	    curl_setopt($post, CURLOPT_HTTPHEADER, array("User-Agent:Mozilla/4.0 (compatible; MSIE 5.0; Windows 98; DigExt)"));
	    curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
	    $result = curl_exec($post); //result from mobile seva server
	    // print_r($result); exit;
	    curl_close($post);
	    return $result;
	}

	//function to convert unicode text in UTF-8 format
	function string_to_finalmessage($message){
	    $finalmessage="";
	    $sss = "";
	    for($i=0;$i<mb_strlen($message,"UTF-8");$i++) {
	    $sss=mb_substr($message,$i,1,"utf-8");
	    $a=0;
	    $abc="&#".$this->ordutf8($sss,$a).";";
	    $finalmessage.=$abc;
	    }
	    return $finalmessage;
	}

	//function to convet utf8 to html entity
	function ordutf8($string, &$offset){
	    $code=ord(substr($string, $offset,1));
	    if ($code >= 128)
	    { //otherwise 0xxxxxxx
	    if ($code < 224) $bytesnumber = 2;//110xxxxx
	    else if ($code < 240) $bytesnumber = 3; //1110xxxx
	    else if ($code < 248) $bytesnumber = 4; //11110xxx
	    $codetemp = $code - 192 - ($bytesnumber > 2 ? 32 : 0) -
	    ($bytesnumber > 3 ? 16 : 0);
	    for ($i = 2; $i <= $bytesnumber; $i++) {
	    $offset ++;
	    $code2 = ord(substr($string, $offset, 1)) - 128;//10xxxxxx
	    $codetemp = $codetemp*64 + $code2;
	    }
	    $code = $codetemp;

	    }
	    return $code;
	}

	function sendMoSms($mobileno){
		 header('Content-Type: text/html;');
		 $username=SMS_USER_NAME; //username of the department
		 $password=SMS_PASSWORD; //password of the department
		 $senderid=SMS_SENDER_ID; //senderid of the deparment
		 //$message="Your Normal message here "; //message content
		 $messageUnicode=SMS_MESSAGE;//message content in unicode
		 // $mobileno="9439913992"; //if single sms need to be send use mobileno keyword
		 //$mobileNos= "9861159636"; //if bulk sms need to send use mobileNos as keyword and mobile number seperated by commas as value
		 $deptSecureKey= SMS_DEPT_KEY; //departsecure key for encryption of message...
		 $encryp_password=sha1(trim($password));
		 $res = $this->sendSingleUnicode($username,$encryp_password,$senderid,$messageUnicode,$mobileno,$deptSecureKey);
		 return $res; 
	}

	function sendBulkMoSms($mobileNos){
		 header('Content-Type: text/html;');
		 $username=SMS_USER_NAME; //username of the department
		 $password=SMS_PASSWORD; //password of the department
		 $senderid=SMS_SENDER_ID; //senderid of the deparment
		 //$message="Your Normal message here "; //message content
		 $messageUnicode=SMS_MESSAGE;//message content in unicode
		 // $mobileno="9439913992"; //if single sms need to be send use mobileno keyword
		 //$mobileNos= "9861159636"; //if bulk sms need to send use mobileNos as keyword and mobile number seperated by commas as value
		 $deptSecureKey= SMS_DEPT_KEY; //departsecure key for encryption of message...
		 $encryp_password=sha1(trim($password));
		 $res = $this->sendBulkUnicode($username,$encryp_password,$senderid,$messageUnicode,$mobileNos,$deptSecureKey);
		 return $res; 
	}

	// Function to call api using curl with get method .. Chinmayee

	function callAPIGET($apiUrl){
		
					$dataResult =array();
					$curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => $apiUrl,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",

                    CURLOPT_SSL_VERIFYHOST=> false,
                    CURLOPT_SSL_VERIFYPEER=> false,
                    CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                    "content-type: application/json",
                    "postman-token: 475972d7-07a6-0a67-c5b4-66ac3acdf711"
                    ),
                    ));
                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    curl_close($curl);
                    if ($err) {
                    echo "cURL Error #:" . $err;
                    } else {
					$dataResult = json_decode($response, true);
					}
					//print_r($dataResult);exit;
		return $dataResult; 
   }
   // Function to call api using curl with get method .. Chinmayee

	function callAPIPOST($apiUrl,$apiPost){		
		$dataResult =array();
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => $apiUrl,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $apiPost,
		CURLOPT_HTTPHEADER => array(
			"Authorization: Basic bW9zYXJrYXI6bW9zYXJrYXI=",
			"Cache-Control: no-cache",
			"Content-Type: text/plain",
			"Postman-Token: e5723278-5d5e-426d-b1a5-0a0929758368"
		),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		echo "cURL Error #:" . $err;
		} else {
		$dataResult = json_decode($response, true);
		}
		//print_r($dataResult);exit;
return $dataResult; 
}

 }
?>
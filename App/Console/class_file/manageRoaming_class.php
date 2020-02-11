<?php
/*============================================================
Page Name		:	manageRoaming_class.php
Description		:	Manage Roaming access
Created By		:	Rasmi Ranjan Swain
Created On		:	10/10/2013
Update History	:
<Updated by>		<Updated On>		<Remarks>

Functions Used	:	connectToDatabase();closeConnection();
==============================================================*/
if(file_exists('../config.php'))
{
	include('../config.php');
}
include_once(ABSPATH."/includes/sessioncheck.php");

//class to manage romaing access
class romaingAccess extends commonClass
{
	//function to manage IP configure
	public function manageIPconfigre($action,$configID,$locationID,$lowerIp,$upperIp,$updatedBy, $query)
	{
		$path	= commonClass::webPath();
		commonClass::isSpclChar($action,$path.'../home');
		commonClass::isSpclChar($configID,$path.'../home');
		commonClass::isSpclChar($locationID,$path.'../home');
		commonClass::isSpclChar($lowerIp,$path.'../home');
		commonClass::isSpclChar($upperIp,$path.'../home');
		commonClass::isSpclChar($updatedBy,$path.'../home');
		$configSql		="CALL USP_ADMIN_IP_CONFIGURE('$action','$configID','$locationID','$lowerIp','$upperIp','$updatedBy', '$query',@out);";		
		$configResult	= commonClass::ExecuteQuery($configSql);
		return $configResult;
	} 
	
	//function to add update IP
	public function addUpdateIp($id)
	{	
		$userId				= $_SESSION['adminConsole_userID'];
		$herarchyId			= $_POST['selLocation'];
		$flag				= 0;		
		$noOfRow			= $_POST['noofRow'];
		$countlowerIP		= count($_POST['txtLow1']);
		$counthigherIP		= count($_POST['txtHigh1']);
		$txtlowip  			= '';
		$txthighip 			= '';
		 for ($ii=0;$ii<$countlowerIP;$ii++)
		 {
		 	$txtlow1ip		= $_POST['txtLow1'][$ii];
			$txtlow2ip		= $_POST['txtLow2'][$ii];
			$txtlow3ip		= $_POST['txtLow3'][$ii];
			$txtlow4ip		= $_POST['txtLow4'][$ii];
			 $txtlowip 	   .= $txtlow1ip.'.'.$txtlow2ip.'.'.$txtlow3ip.'.'.$txtlow4ip.',';
			 $txthigh1ip	= $_POST['txtHigh1'][$ii];
			$txthigh2ip		= $_POST['txtHigh2'][$ii];
			$txthigh3ip		= $_POST['txtHigh3'][$ii];
			$txthigh4ip		= $_POST['txtHigh4'][$ii];
			 $txthighip     .= $txthigh1ip.'.'.$txthigh2ip.'.'.$txthigh3ip.'.'.$txthigh4ip.',';
			
		 }
		 $txtlowip		= substr($txtlowip,0,-1);
		 $txthighip		= substr($txthighip,0,-1);
		 $explLowIP		= explode(',',$txtlowip);
		 $explhighIP	= explode(',',$txthighip);		 
			
		 $query			= '';
		for($j=0;$j<count($explLowIP);$j++)
		{			
			$lowerIP 	= $explLowIP[$j];
			$higherIp	= $explhighIP[$j];
			$query		.= '('.$herarchyId.',"'.$lowerIP.'","'.$higherIp.'",'.$userId.'),';
		}		
		$query		= substr($query,0,-1);		 
		$result		= $this->manageIPconfigre('A',0,$herarchyId, '0','0',0,$query);
		
		if($result)
		{
			$flag++;
		}
		if($flag>0)
		{
			$msg		= "IP Configured successfully";
		}
		return $msg;
	}
	
	// Function to count no of rows
	public function rowCount($locId)
	{
		$rowSql		= "CALL USP_ADMIN_IP_CONFIGURE('CR','0',$locId,0,0,0,'0',@out);";
		$rowResult	= commonClass::ExecuteQuery($rowSql);
		if(commonClass::NumRow($rowResult)>0)
		{
			$ipRow		= mysqli_fetch_array($rowResult);
			$noofRow	= $ipRow['NOOFROW'];
		}
		return $noofRow;
	}
}
?>
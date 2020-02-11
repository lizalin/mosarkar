<?php
/*============================================================
Page Name		:	hierarchy_class.php
Description		:	Class for managing hierarchy master
Created By		:	Sunil Kumar Parida
Created On		:	21-Aug-2013
Update History	:
<Updated by>		<Updated On>		<Remarks>
samir Kumar 		17-Nov-2017			Nodeid parameter position change in fillNodeDropdown(); function

Functions Used	:	connectToDatabase();closeConnection();
==============================================================*/
if(file_exists('../config.php'))
	include('../config.php');
require(ABSPATH."/includes/sessioncheck.php");

//============ hierarchy property extends from commonClass =============
class hierarchy extends commonClass
{
	
        // Function to get assembly details | By: Sukanta kumar mishra | On: 18 Mar 2016
        public function manageAssembles($action,$assemblyId,$tagId,$heirarchyId,$name,$attr1,$attr2,$attr3,$attr4){
            $assemblySql = "CALL USP_ASSEMBLY('$action','$assemblyId','$tagId','$heirarchyId','$name','$attr1','$attr2','$attr3','$attr4');";
            $assemblyResult= commonClass::ExecuteQuery($assemblySql);
            return $assemblyResult;
        }
        public function fillAssemblyList()
        {
            $options = '<option value="0">- Select -</option>';
            $result = $this->manageAssembles('V','0','0','0','','0','0','0','0');
            while($assRow = mysqli_fetch_array($result)){
                $options .= '<option value="'.$assRow['intAssemblyId'].'">'.$assRow['vchAssemblyName'].'</option>';
            }
            return $options;
        }
	//=========== function to manage hierarchy ================
	public function manageHierarchy($action, $hierarchyId, $hierarchyName, $aliasName, $level, $updatedBy)
	{
		$hierarchySql		= "CALL USP_ADMIN_HIERARCHY('$action', '$hierarchyId', '$hierarchyName', '$aliasName', '$level', '$updatedBy', @OUT);";
		$path				= commonClass::webPath();
		$errAction			= commonClass::isSpclChar($action);
		$errHierarchyId		= commonClass::isSpclChar($hierarchyId);
		$errHierarchyName	= commonClass::isSpclChar($hierarchyName);
		$errAliasName		= commonClass::isSpclChar($aliasName);
		$errLevel			= commonClass::isSpclChar($level);
		$errUpdatedBy		= commonClass::isSpclChar($updatedBy);
		if($errAction == 0 && $errHierarchyId == 0 && $errHierarchyName == 0 && $errAliasName == 0 && $errLevel == 0 && $errUpdatedBy == 0 )
		{
			$hierarchyResult= commonClass::ExecuteQuery($hierarchySql);
			return $hierarchyResult;	
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	//=========== function to view hirarchy level =============
	public function viewLevel($action='V')
	{
		$viewLevelResult	= $this->manageHierarchy($action, '0', '', '', '0', '0');
		return $viewLevelResult;
	}
	
	//=========== function to add hierarchy ===================
	public function addHierarchy()
	{
		$nodeLevel	= $_POST['txtNodeNo'];
		$userId		= $_SESSION['adminConsole_userID'];
		$counter	= 0;
		$outMsg		= '';
		for($i=1; $i<=$nodeLevel; $i++)
		{
			$nodeVal	= $_POST['txtNode'.$i];
			$alias		= $_POST['txtAlias'.$i];
			$dupResult	= $this->manageHierarchy('CD', '0', '', '', $i, '0');
			$dupRow		= mysqli_fetch_array($dupResult);
			if($dupRow[0]==0)
			{
				$addRow		= $this->manageHierarchy('A', '0', $nodeVal, $alias, $i, $userId);
				$counter	= 1;
			}			
			else
			{
				$updateRow	= $this->manageHierarchy('U', 0, $nodeVal, $alias, $i, $userId);
				$counter	= 1;
			}
		}		
		if($counter>0)
		{
			$outMsg	= "Hierarchy updated successfully";
		}
		return $outMsg;
	}
	
	//================== Function to update hierarchy ====================
	public function updateHierarchy()
	{
		$outMsg	= '';
		if(isset($_POST['hdnID']) && $_POST['hdnID']!='')
		{
			$userId			= $_SESSION['adminConsole_userID'];
			$hierarchyId	= $_POST['hdnID'];
			$hierarchyName	= $_POST['hdnHierarchyName'];
			$aliasName		= $_POST['hdnAliasName'];
			$updateRow		= $this->manageHierarchy('U', $hierarchyId, $hierarchyName, $aliasName, 0, $userId);
			if($updateRow)
				$outMsg	= "Hierarchy updated successfully";
		}
		return $outMsg;
	}	
	
	//==================== function to delete hierarchy =====================
	public function deleteHierarchy($ID)
	{
		$userId			= $_SESSION['adminConsole_userID'];
		$intID	= explode(',',$ID);
		$pass		= 0;
		$fail		= 0;
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];
			$result		= $this->manageHierarchy('D',$indvidualID,'','',0,$userId);
			$msg		= '';
			if($result)
			{
				$row	= mysqli_fetch_array($result);
				$success= $row[0];
				if($success==0)
					$fail++;
				else
					$pass++;
			}
		}
		if($pass>0)
			$msg	.= 'Record(s) deleted successfully';
		if($fail>0)
			$msg	.= $fail.' record(s) have subnode and can not deleted.';
		return $msg;
	}
	
	
	
	//================== Function to manage subnode ====================
	function manageSubNode($action,$subNodeId,$subNodeName,$subNodeAlias,$nodeId,$level,$updatedBy)
	{
		$subNodeSql                     = "CALL USP_ADMIN_SUBNODE('$action', '$subNodeId', '$subNodeName', '$subNodeAlias', '$nodeId', '$level', '$updatedBy', @OUT);";
		$path				= commonClass::webPath();
		$errAction			= commonClass::isSpclChar($action);
		$errSubNodeId                   = commonClass::isSpclChar($subNodeId);
		$errSubNodeName                 = commonClass::isSpclChar($subNodeName);
		$errSubNodeAlias                = commonClass::isSpclChar($subNodeAlias);
		$errNodeId			= commonClass::isSpclChar($nodeId);
		$errLevel			= commonClass::isSpclChar($level);
		$errUpdatedBy                   = commonClass::isSpclChar($updatedBy);
                
                
                $subNodeId     = htmlspecialchars($subNodeId,ENT_QUOTES);
                $subNodeName   = htmlspecialchars($subNodeName,ENT_QUOTES);
                $subNodeAlias  = htmlspecialchars($subNodeAlias,ENT_QUOTES);
                $level         = htmlspecialchars($level,ENT_QUOTES);
                
		if($errAction == 0 && $errSubNodeId == 0 && $errSubNodeName == 0 && $errSubNodeAlias == 0 && $errNodeId == 0 && $errLevel == 0 && $errUpdatedBy == 0 )
		{
			$subNodeResult= commonClass::ExecuteQuery($subNodeSql);
			return $subNodeResult;	
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	//=========== function to view hirarchy sub node =============
	public function viewSubNodes($nodeId,$action='V')
	{
		$viewSubNodeResult	= $this->manageSubNode($action, '0', '', '',$nodeId, '0', '0');
		return $viewSubNodeResult;
	}
	
	//=========== function to add hierarchy sub node===================
	public function addSubNode($nodeId)
	{
		$nodeLevel	= $_POST['txtsubnodeNo'];
		$userId		= $_SESSION['adminConsole_userID'];
		$counter	= 0;
		$success	= 0;
		$outMsg		= '';
		$dupName	= '';
		$dupAlias	= '';
		$dupLevel	= '';
		$fail		= 0;
		for($i=1; $i<=$nodeLevel; $i++)
		{
			$nodeVal	= $_POST['txtSubNode'.$i];
			$alias		= $_POST['txtSubAlias'.$i];			
			$dupResult	= $this->manageSubNode('CD', '0', '', '', $nodeId, $i, '0');			
			$dupRow		= mysqli_fetch_array($dupResult);
			if($dupRow[0]==0)
			{
				$addRow		= $this->manageSubNode('A', '0', $nodeVal, $alias, $nodeId, $i, $userId);				
				if($addRow)
					$success	= 1;
			}
			else
			{
				$updateRow	= $this->manageSubNode('U', 0, $nodeVal, $alias, $nodeId, $i, $userId);
				if($updateRow)
					$success	= 1;
			}				
		}
		if($success>0)
		{
			$outMsg	= "Subnode updated successfully";
		}
		return $outMsg;
	}
	
	//================== Function to update hierarchy ====================
	public function updateSubNode()
	{
		$outMsg	= '';
		if(isset($_POST['hdnID']) && $_POST['hdnID']!='')
		{
			$userId			= $_SESSION['adminConsole_userID'];
			$subNodeId		= $_POST['hdnID'];
			$subNodeName            =  htmlspecialchars($_POST['hdnHierarchyName'],ENT_QUOTES);
			$aliasName		=  htmlspecialchars($_POST['hdnAliasName'],ENT_QUOTES);
			$updateRow		= $this->manageSubNode('U', $subNodeId, $subNodeName, $aliasName, 0, 0, $userId);
			if($updateRow)
				$outMsg	= "Subnode updated successfully";
		}
		return $outMsg;
	}
	
	//==================== function to delete subnode =====================
	public function deleteSubnode($ID)
	{
		$userId		= $_SESSION['adminConsole_userID'];
		$intID		= explode(',',$ID);
		$pass		= 0;
		$fail		= 0;
		$msg		= '';
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];
			$result		= $this->manageSubNode('D',$indvidualID,'','',0,0,$userId);
			
			if($result)
			{
				$row	= mysqli_fetch_array($result);
				$success= $row[0];
				if($success==0)
					$fail++;
				else
					$pass++;
			}
		}
		if($pass>0)
			$msg	.= 'Record(s) deleted successfully';
		if($fail>0)
			$msg	.= $fail.' record(s) have Values and can not deleted.';
		return $msg;
	}
	
	
	//==================== Function to manage subnode values ================================
	function manageNodeValues($action,$Id,$parentId,$nodeValue,$hCode,$telNo,$faxNo,$address,$nodeId,$subNodeId,$updatedBy)
	{
		$nodeValuesSql	= "CALL USP_ADMIN_SUBNODE_VALUES('$action', '$Id', '$parentId', '$nodeValue', '$hCode', '$telNo', '$faxNo', '$address', '$nodeId', '$subNodeId', '$updatedBy', @OUT);";
	    //echo $nodeValuesSql;
                $path				= commonClass::webPath();
		$errAction			= commonClass::isSpclChar($action);
		$errId				= commonClass::isSpclChar($Id);
		$errParentId                    = commonClass::isSpclChar($parentId);
		$errNodeVal			= commonClass::isSpclChar($nodeValue);
		$errHCode			= commonClass::isSpclChar($hCode);
		$errTelNo			= commonClass::isSpclChar($telNo);
		$errFaxNo			= commonClass::isSpclChar($faxNo);
		$errAddress			= commonClass::isSpclChar($address);
		$errNodeId			= commonClass::isSpclChar($nodeId);
		$errSubnodeId		= commonClass::isSpclChar($subNodeId);
		$errUpdatedBy		= commonClass::isSpclChar($updatedBy);
		if($errAction == 0 && $errId == 0 && $errParentId == 0 && $errNodeVal == 0 && $errHCode == 0 && $errTelNo == 0 && $errFaxNo == 0 && $errAddress == 0 && $errNodeId == 0 && $errSubnodeId == 0 && $errUpdatedBy == 0)
		{
			$nodeValueResult= commonClass::ExecuteQuery($nodeValuesSql);
			return $nodeValueResult;	
		}
		else
		{
			header("Location: ".$path."../home");
		}
	}
	
	//==================== Function to view hierarchy value structure ===============
	function viewStructure($parentId,$selVal=0)
	{		
		$viewNodeResult	= $this->manageNodeValues('V',0,$parentId,'','','','','',0,0,0);		
		$nodeOption	= '<option value="0" title="Select">--Select--</option>';
		
		if(commonClass::NumRow($viewNodeResult)>0)
		{
			while($viewNodeRow	= mysqli_fetch_array($viewNodeResult))
			{
				$selected	= '';
				if($viewNodeRow['INT_SUBNODEVAL_ID']==$selVal)
					$selected	= 'selected="selected"';
				$nodeOption	.= '<option value="'.$viewNodeRow['INT_SUBNODEVAL_ID'].'" title="'.$viewNodeRow['VCH_VALUE_NAME'].'" '.$selected.'>'.$viewNodeRow['VCH_VALUE_NAME'].'</option>';
			}
		}
		return $nodeOption;
	}
	
	//==================== Fill node dropdown ======================
	//Modified added parent node to get child by :: samir kumar on 17-Nov-2017
	function fillNodeDropdown($NodeId,$selVal)
	{
		//$viewNodeResult	= $this->manageNodeValues('F',0,0,'','','','','',$NodeId,0,0);		
		$viewNodeResult	= $this->manageNodeValues('F',0,$NodeId,'','','','','',0,0,0);	
		$nodeOption	= '<option value="0" title="Select">--Select--</option>';
		
		if(commonClass::NumRow($viewNodeResult)>0)
		{
			while($viewNodeRow	= mysqli_fetch_array($viewNodeResult))
			{
				$selected	= '';
				if($viewNodeRow['INT_SUBNODEVAL_ID']==$selVal)
					$selected	= 'selected="selected"';
				$nodeOption	.= '<option value="'.$viewNodeRow['INT_SUBNODEVAL_ID'].'" title="'.$viewNodeRow['VCH_VALUE_NAME'].'" '.$selected.'>'.$viewNodeRow['VCH_VALUE_NAME'].'</option>';
			}
		}
		return $nodeOption;
	}
	
	//=================== Get level of subnode ==========================
	function getLevel($subnodeId)
	{
		$levelResult	= $this->manageSubNode('V', $subnodeId, '', '', 0, 0, 0);
		if(commonClass::NumRow($levelResult)>0)
		{
			$levelRow		= mysqli_fetch_array($levelResult);
			$subnodeLevel	= $levelRow['INT_SUB_LEVEL'];
			$subnodeId		= $levelRow['INT_SUBNODE_ID'];	
			$subnodeName	= $levelRow['VCH_SUBNODE_NAME'];
			$subnodeAlias	= $levelRow['VCH_SUBALIAS_NAME'];	
			$subNodeValues	= array($subnodeLevel,$subnodeId,$subnodeName,$subnodeAlias);		
		}
		return $subNodeValues;
	}
		
	//=================== View subnode according to level ==========================
	function getSubnode($nodeId,$level)
	{
		$subnodeResult	= $this->manageSubNode('V', 0, '', '', $nodeId, $level, 0);
		if(commonClass::NumRow($subnodeResult)>0)
		{
			$subnodeRow		= mysqli_fetch_array($subnodeResult);			
			$subnodeId		= $subnodeRow['INT_SUBNODE_ID'];	
			$subnodeName	= $subnodeRow['VCH_SUBNODE_NAME'];			
		}
		return $subnodeName;
	}
	
	public function fillSubnodeVal($id, $nodeId=0)
	{		
			
			$subnodeResult	= hierarchy::manageNodeValues('V',$id,'0','','','','','',0,'0',0);	
			$nodeValRow		= mysqli_fetch_array($subnodeResult);			
			$parent			= $nodeValRow['INT_PARENT_NODE'];
			$nodeId			= $nodeValRow['INT_SUBNODE_ID'];
			if($parent	>='0')
			{				
				if($parent!=0)
				{
					$id	.= ','.$this->fillSubnodeVal($parent,$nodeId);			
				}
			}		
			return $id;		
		}		
	
	//=================== Function to get node id =====================
	function getNodeId($nodeId)
	{
		$nodeResult	= $this->manageNodeValues('GP',0,0,'','','','','',$nodeId,0,0);
		if(commonClass::NumRow($nodeResult)>0)
		{
			$nodeRow		= mysqli_fetch_array($nodeResult);
			$intNodeId		= $nodeRow['INT_SUBNODEVAL_ID'];		
		}
		return $intNodeId;
	}
	
	//=================== Function to get node id =====================
	function getHierarchyNodeId($subNodeValId)
	{
		$nodeResult	= $this->manageNodeValues('GN',$subNodeValId,0,'','','','','',0,0,0);
		if(commonClass::NumRow($nodeResult)>0)
		{
			$nodeRow		= mysqli_fetch_array($nodeResult);			
			$intNodeId		= $nodeRow['NODE_ID'];		
		}
		return $intNodeId;
	}
	
	//=================== Add subnode Values ==========================
	function addSubnodeValues($id,$parentId,$nodeId,$subNodeId)
	{		
		$userId			= $_SESSION['adminConsole_userID'];
		$valueName		= trim($_REQUEST['txtDept']);
		$hierarchyCode	= $_REQUEST['txtHierarchyCode'];
		$txtTelNo		= $_REQUEST['txtTelNo'];
		$txtFaxNo		= $_REQUEST['txtFaxNo'];
		$txtAddress		= $_REQUEST['txtAddress'];
		$outMsg			= '';
		$action			= ($id==0)?'A':'U';
		$flag			= ($id==0)?'0':'1';
		$subnodeResult	= $this->manageNodeValues($action,$id,$parentId,$valueName,$hierarchyCode,$txtTelNo,$txtFaxNo,$txtAddress,$nodeId,$subNodeId,$userId);				
		if($subnodeResult)
		{
			$row		= mysqli_fetch_array($subnodeResult);
			if($row[0]==1)
			$outMsg		= ($action=='A')?'Record added successfully':'Record updated successfully';
				
			else
			{
				$outMsg	= 'Duplicate value already exist';
				$flag	= 2;
			}
		}
		
		$arr	= array('outMsg'=>$outMsg,'flag'=>$flag,'name'=>$valueName,'hCode'=>$hierarchyCode,'telNo'=>$txtTelNo,'faxNo'=>$txtFaxNo,'address'=>$txtAddress);
		
		return $arr;
	}
	
	/*=========== function to Read Subnode ===============
		By				: Rasmi Ranjan Swain
		ON				: 15/Nov/2013
		Procedure Used 	: USP_GROUP_MASTER
	=======================================================*/
	public function readSubnodeValues($id)
	{
		$intLocId		= 0;		
		$strGradeName	= '';
		$strDesc		= '';				
		$result			= $this->manageNodeValues('R',$id,0,'','','','','',0,0,0);
		if(commonClass::NumRow($result)>0)
		{
			$row				= mysqli_fetch_array($result);
			 $intParentNode		= $row['INT_PARENT_NODE'];
			 $strValueName		= $row['VCH_VALUE_NAME'];
			$strHierachyCode	= $row['VCH_HIERARCHY_CODE'];
			$strTelNo			= $row['VCH_TEL_NO'];
			$strFaxNo			= $row['VCH_FAX_NO'];
			$strAddress			= $row['VCH_ADDRESS'];
			$intNodeId			= $row['INT_NODE_ID'];
			$intSubnodeId		= $row['INT_SUBNODE_ID'];
		}
		$arrResult	= array('ParentNode'=>$intParentNode, 'ValueName'=>$strValueName, 'HierachyCode'=>$strHierachyCode, 'TelNo'=>$strTelNo, 'FaxNo'=>$strFaxNo, 'Address'=>$strAddress, 'NodeId'=>$intNodeId, 'SubnodeId'=>$intSubnodeId);
		return $arrResult;
	}
	
	//======================= Update subnode values ==================
	function updateValues($id,$parentId)
	{
		$userId			= $_SESSION['adminConsole_userID'];		
		$valueName		= $_REQUEST['txtName'.$id];
		$hierarchyCode	= $_REQUEST['txtHCode'.$id];
		$txtAddress		= $_REQUEST['txtAddress'.$id];
		$txtTelNo		= $_REQUEST['txtTelNo'.$id];
		$txtFaxNo		= $_REQUEST['txtFaxNo'.$id];
		$outMsg			= '';
		$flag			= 0;
		$subnodeResult	= $this->manageNodeValues('U',$id,$parentId,$valueName,$hierarchyCode,$txtTelNo,$txtFaxNo,$txtAddress,0,0,0);
		if($subnodeResult)
		{
			$row	= mysqli_fetch_array($subnodeResult);
			if($row[0]==1)
				$outMsg	= 'Values updated successfully';
			else
			{
				$outMsg	= 'Duplicate value already exist';
				$flag	= 1;
			}
		}
		$arr	= array('outMsg'=>$outMsg,'flag'=>$flag,'name'=>$valueName,'hCode'=>$hierarchyCode,'telNo'=>$txtTelNo,'faxNo'=>$txtFaxNo,'address'=>$txtAddress);
		
		return $arr;
	}
	
	//======================= Delete subnode values =======================
	function deleteValues($ID)
	{
		$userId		= $_SESSION['adminConsole_userID'];
		$intID		= explode(',',$ID);
		$pass		= 0;
		$fail		= 0;
		$msg		= '';
		for($i=0;$i < count($intID);$i++)
		{
			$indvidualID= $intID[$i];
			$result		= $this->manageNodeValues('D',$indvidualID,'0','','','','','',0,0,$userId);
			
			if($result)
			{
				$row	= mysqli_fetch_array($result);
				$success= $row[0];
				if($success==0)
					$fail++;
				else
					$pass++;
			}
		}
		if($pass>0)
			$msg	.= 'Record(s) deleted successfully';
		if($fail>0)
			$msg	.= $fail.' record(s) have Values and can not deleted.';
		$arr	= array('outMsg'=>$msg);
		return $arr;
	}
}
?>

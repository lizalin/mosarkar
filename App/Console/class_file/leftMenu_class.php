<?php
/*============================================================
Page Name		:	hierarchy_class.php
Description		:	Class for managing hierarchy master
Created By		:	Sunil Kumar Parida
Created On		:	21-Aug-2013
Update History	:
<Updated by>		<Updated On>		<Remarks>


Functions Used	:	connectToDatabase();closeConnection();
==============================================================*/
if(file_exists('../config.php'))
	include('../config.php');
class leftMenu extends commonClass
{
	//=========== function to manage hierarchy ================
	public function manageLeftMenu($action, $hierarchyId, $hierarchyName, $aliasName, $level, $updatedBy)
	{
		$hierarchySql		= "CALL USP_ADMIN_HIERARCHY('$action', '$hierarchyId', '$hierarchyName', '$aliasName', '$level', '$updatedBy', @OUT);";
		$hierarchyResult	= commonClass::ExecuteQuery($hierarchySql);
		return $hierarchyResult;		
	}
	
	//=========== function to view hirarchy level =============
	public function viewLeftMenu()
	{
		$viewLevelResult	= $this->manageLeftMenu('V', '0', '', '', '0', '0');
		return $viewLevelResult;
	}
	
	//================== Function to manage subnode ====================
	function manageSubMenu($action,$subNodeId,$subNodeName,$subNodeAlias,$nodeId,$level,$updatedBy)
	{
		$subNodeSql	= "CALL USP_ADMIN_SUBNODE('$action', '$subNodeId', '$subNodeName', '$subNodeAlias', '$nodeId', '$level', '$updatedBy', @OUT);";
		$subNodeResult= commonClass::ExecuteQuery($subNodeSql);
		return $subNodeResult;	
	}
	
	//=========== function to view hirarchy sub node =============
	public function viewSubMenu($nodeId)
	{
		$viewSubNodeResult	= $this->manageSubMenu('R', '0', '', '', $nodeId, '0', '0');
		return $viewSubNodeResult;
	}
}
?>

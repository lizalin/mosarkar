<?php

	/*================================================
	File Name         	  : viewDepartmentInner.php
	Description			  : This page is used to view Subnode Values.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 05-Sep-2013
	Update History		  :
				<Updated by>		<Updated On>		<Remarks>
			Rasmi Ranjan Swain		15/11/2013			glid,plid updated	
	
	includes			  : hierarchy_class.php

	==================================================*/
	require("../class_file/hierarchy_class.php");	
	$obj				= new hierarchy;
	$strPath 			= $obj->webpath();	
	$outMsg				= '';
	$glId				= $_REQUEST['GL'];
	$plId				= $_REQUEST['PL'];
	$slId				= $_REQUEST['SL'];
	$tlId				= $_REQUEST['TL'];
	
	//============== Get node Value ========================
	if(isset($_REQUEST['SL']) && $_REQUEST['SL']>0)
		$nodeId		= $_REQUEST['SL'];
	else
		$nodeId		= 0;
	if(isset($_REQUEST['TL']) && $_REQUEST['TL']>0)
		$subNodeId		= $_REQUEST['TL'];	
	else
		$subNodeId		= 0;	
	
	//=========== Get level of the node =====================
	$subNodeVal		= $obj->getLevel($subNodeId);
	$level			= $subNodeVal[0];
	$subNodeName	= $subNodeVal[2];
	$subNodeAlias	= $subNodeVal[3];
	
	//======================= Delete records =======================
	
	if(isset($_REQUEST['hdn_qs']) && $_REQUEST['hdn_qs']=='D')
	{
		$ids	= $_REQUEST['hdn_ids'];
		$outMsg	= $obj->deleteValues($ids);
	}
	//======================= Pagination ===========================*/
	$isPaging	= 0;
	$pgFlag		= 0;
	$intPgno	= 1;
	$intRecno	= 0;
	if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
		$isPaging=1;
	if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
	{
		$intPgno=$_REQUEST['hdn_PageNo'];
		$pgFlag	= 1;
	}
	if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
	{	
		$intRecno=$_REQUEST['hdn_RecNo'];
		$pgFlag	= 1;
	}
	if(isset($_REQUEST['RC'])&& $pgFlag==0)			
		$intRecno=$_REQUEST['RC'];	
	if(isset($_REQUEST['PG']) && $pgFlag==0)
		$intPgno=$_REQUEST['PG'];
		
	$parentLevel	= $level-1;
	$parentId		= 0;
	if($parentLevel>0)		
		$parentId	= (isset($_REQUEST['ddlNode'.$parentLevel]))?$_REQUEST['ddlNode'.$parentLevel]:0;
		
	$searchPannelFlag	= ($parentId!='0')?'S':'';
		
	//============ Update values ===================
	 if(isset($_REQUEST['hdnAction']) && $_REQUEST['hdnAction']=='U')
	 {
	 	$strId	= (isset($_REQUEST['hdnId']))?$_REQUEST['hdnId']:0;
	 	$outMsg	= $obj->updateValues($strId,$parentId);		
	 }
		
	if($isPaging==0)
	 {
		$result		= $obj->manageNodeValues('PG',$intRecno,$parentId,'','','','','',0,$subNodeId,0);
	 }
	  
	else
	 {
		$intPgno=1;
		$intRecno=0;
		$result		= $obj->manageNodeValues('V',0,$parentId,'','','','','',0,$subNodeId,0);
	 }
	   $intTotalRec	= $obj->NumRow($obj->manageNodeValues('V',0,$parentId,'','','','','',0,$subNodeId,0));
	   $intCurrPage	= $intPgno;
	   $intPgSize	= 10;
         
           //$assemblyResult		= $obj->fillAssemblyList();
           
?>
<?php 
	/* ================================================
	File Name         	  : viewSubNode.php
	Description			  : This page is used to View Hierarchy Subnode.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 21-Aug-2013
	Update History		  :
				<Updated by>		<Updated On>		<Remarks>
			Sunil kumar Parida		11/10/2013			Remove mandatory of alias	
	
	includes			  : createSubNodeInner.php
	Style sheet           : style.php,bootstrap.css                                            
	Javscript Functions   : jquery.js,bootstrap.min.js,loadScript.js
	==================================================*/
	require("viewSubNodeInner.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $strTitle;?></title>
<link href="<?php echo $strPath;?>styles/bootstrap.css" rel="stylesheet" type="text/css">
<?php include("../includes/incStylesheet.php")?>
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/loadscript.js"></script>
<script language="javascript">
	pageHeader="View Subnode"
	strFirstLink="Hierarchy Master"
	strLastLink="<?php echo $nodeVal;?>"
	printMe="yes"
	backMe="yes"
	refreshMe="yes"	
	$(document).ready(function(){
		$('#frmAdmin').attr('autocomplete', 'off');
		RowColChange()
		setupLabel();
		$('.label_check').click(function(){
		setupLabel();
	});
				
				
			$("#txtNodeName").hide();
			$("#txtNodeAlias").hide();
			$("#update").hide();
			
			$("#edit").click(function(){
				$("#txtNodeName").show();
				$("#txtNodeAlias").show();
				$("#update").show();
				$("#edit").hide();
				$("#nodeName").hide();
				$("#nodeAlias").hide();
			});	
			$("#update").click(function(){
				$("#txtNodeName").hide();
				$("#txtNodeAlias").hide();
				$("#update").hide();
				$("#edit").show();
				$("#nodeName").show();
				$("#nodeAlias").show();
			});	
			<?php if($outMsg!=''){?>
				alert("<?php echo $outMsg;?>");	
				$('form').submit();						
			<?php }?>
		});
</script>
</head>
<body>
<form id="frmAdmin" name="frmAdmin" method="post" enctype="multipart/form-data">
  <div id="mainTable">
    <!-- Header Area-->
    <?php include("../includes/header.php")?>
    <!-- Header Area-->
    <!-- Login Area-->
    <div id="MidTab">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td id="LeftMenu" valign="top"><?php include("../includes/leftmenu.php") ?></td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php include("../includes/navigation.php")?></td>
              </tr>
              <tr>
                <td valign="top"><div id="ContArea">
                    <?php include('../includes/title.php'); ?>
                    <div class="MyTab">
                      <ul class="nav nav-tabs">
                        <li><a href="<?php echo $strPath;?>createSubNode/<?php echo $glId;?>/<?php echo $plId;?>/<?php echo $nodeId;?>">Add</a></li>
                        <li class="active"><a href="#">View</a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>
                    </div>
                    <div id="viewTable">
					<?php
						if($obj->NumRow($subNodeResult)>0){
						$ctr	= 0;
					?>
                      <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
                        <tr>
                          <th class="noPrint" width="20" style="display:none;"><label class="label_check">
                              <input name="cbBOX" id="cbBOX" value="checkbox"  onClick="isSelectAll(this,'frmAdmin')" type="checkbox">
                            </label>
                          </th>
                          <th width="20">Sl#</th>
                          <th>Subnode Name</th>
                          <th>Alias Name</th>
                          <th class="noPrint" width="35">Edit </th>
                        </tr>
						<?php
							while($row=mysqli_fetch_array($subNodeResult)){
							$ctr++;
						?>
                        <tr>
                          <td class="noPrint" style="display:none;"><label class="label_check">                             
							  <input name="cbItem<?php echo $ctr;?>" id="cbItem<?php echo $ctr;?>" value="<?php echo $row['INT_SUBNODE_ID'];?>" type="checkbox"></label>
							<input name="hdnId<?php echo $ctr;?>" id="hdnId<?php echo $ctr;?>" value="<?php echo $row['INT_SUBNODE_ID'];?>" type="hidden">
						  </td>
                          <td><?php echo $ctr;?></td>
                          <td height="30" valign="middle"><span id="subNodeName<?php echo $row['INT_SUBNODE_ID'];?>" class="spn noPrint"><?php echo $row['VCH_SUBNODE_NAME'];?></span>
                            <input type="text" name="txtSubNodeName<?php echo $row['INT_SUBNODE_ID'];?>" id="txtSubNodeName<?php echo $row['INT_SUBNODE_ID'];?>" style="width:200px; display:none;" class="txt"   value="<?php echo $row['VCH_SUBNODE_NAME'];?>" />
							 <input type="hidden" name="hdnNodeName<?php echo $row['INT_SUBNODE_ID'];?>" id="hdnNodeName<?php echo $row['INT_SUBNODE_ID'];?>" value="<?php echo $row['VCH_SUBNODE_NAME'];?>" />
							</td>
                          <td><span id="nodeAlias<?php echo $row['INT_SUBNODE_ID'];?>" class="spn noPrint"><?php echo $row['VCH_SUBALIAS_NAME'];?></span>
                            <input type="text" name="txtSubNodeAlias<?php echo $row['INT_SUBNODE_ID'];?>" id="txtSubNodeAlias<?php echo $row['INT_SUBNODE_ID'];?>" style="width:200px; display:none;"  class="txt" value="<?php echo $row['VCH_SUBALIAS_NAME'];?>" />
							<input type="hidden" name="hdnNodeAlias<?php echo $row['INT_SUBNODE_ID'];?>" id="hdnNodeAlias<?php echo $row['INT_SUBNODE_ID'];?>" value="<?php echo $row['VCH_SUBALIAS_NAME'];?>" />
							</td>
                          <td class="noPrint" align="center" width="90px">
							<a href="javascript:void(0);" id="edit<?php echo $row['INT_SUBNODE_ID'];?>" title="Edit" class="btn btn-info edit" onclick="doUpdate('<?php echo $row['INT_SUBNODE_ID'];?>',1);"><i class="icon-white icon-edit"></i></a>
                           
						 	<a href="javascript:void(0);" id="update<?php echo $row['INT_SUBNODE_ID'];?>" class="btn btn-success update" title="Update" style="display:none;" onclick="updateVal('<?php echo $row['INT_SUBNODE_ID'];?>');"><i class="icon-white icon-upload"></i></a>
                            
                            <a href="javascript:void(0);" id="cancel<?php echo $row['INT_SUBNODE_ID'];?>" class="btn btn-danger cancel" title="Cancel" style="display:none;" onclick="doUpdate('<?php echo $row['INT_SUBNODE_ID'];?>',0);"><i class="icon-white icon-remove"></i></a>
						  </td>
                        </tr>
						<?php }?>   
						<input type="hidden" name="hdnHierarchyName" id="hdnHierarchyName" value="" />
						<input type="hidden" name="hdnAliasName" id="hdnAliasName" value="" />
						<input type="hidden" name="hdnID" id="hdnID" value="" />  
						<input name="hdn_qs" id="hdn_qs" type="hidden" />
                      	<input name="hdn_ids" id="hdn_ids" type="hidden" />
						<input type="hidden" name="hdnStartIndex" id="hdnStartIndex" value="0"/>
					  	<input type="hidden" name="hdnEndIndex" id="hdnEndIndex" value="<?php echo $ctr;?>"/>                  
                      </table>
					  <?php }else{?>
					  <div align="center">No records found</div>
					  <?php }?>
                    </div>                   
                  </div></td>
              </tr>
            </table></td>
        </tr>
      </table>
    </div>
    <!-- Login Area-->
    <!-- Footer Area-->
    <?php include("../includes/footer.php")?>
    <!-- Footer Area-->
  </div>
</form>
<script type="text/javascript">
	function doUpdate(id,flag)
	{ 
		$('.txt').hide();
		$('.spn').show();		
		$('.update').hide();
		$('.cancel').hide();
		$('.edit').show();
		if(flag==1)
		{			
			$('#subNodeName'+id).hide();
			$('#nodeAlias'+id).hide();	
			$('#update'+id).show();		
			$('#txtSubNodeName'+id).val($('#hdnNodeName'+id).val());
			$('#txtSubNodeName'+id).show();
			$('#txtSubNodeAlias'+id).val($('#hdnNodeAlias'+id).val());
			$('#txtSubNodeAlias'+id).show();
			$('#edit'+id).hide();
			$('#update'+id).show();
			$('#cancel'+id).show();
		}		
	}
	function updateVal(id)
	{
		if (!blankFieldValidation('txtSubNodeName'+id, 'Hierarchy Subnode Name')) 
			return false;
		
		if (!IsSpecialCharacter('txtSubNodeName'+id, 'Special Character Not Allowed !'))
			return false;
		
		if (!IsSpecialCharacter('txtSubNodeAlias'+id, 'Special Character Not Allowed !')) 
			return false;
			
		var errofFlag	= 0;
		$('input[type=hidden]').not('#hdnNodeName'+id+',#hdnNodeAlias'+id).each(function(){
			var hdnValue	= $.trim(this.value);
			var subNodeName	= $.trim($('#txtSubNodeName'+id).val());
			var subNodeAlias= $.trim($('#txtSubNodeAlias'+id).val());
			if((hdnValue.toLowerCase()==subNodeName.toLowerCase()) && subNodeName!='')
			{
				errofFlag	= 1;				
				return false;
			}
			if((hdnValue.toLowerCase()==subNodeAlias.toLowerCase()) && subNodeAlias!='')
			{
				errofFlag	= 2;				
				return false;
			}
		});
		
		if(errofFlag	== 1)
		{
			alert("Duplicate entries can't be possible");
				$('#txtSubNodeName'+id).focus();
				return false;
		}
		else if(errofFlag	== 2)
		{
			alert("Duplicate entries can't be possible");
				$('#txtSubNodeAlias'+id).focus();
				return false;
		}
		
		
		if(!confirm("Are you sure to update this record"))		
			return false;
			
		$('#hdnID').val(id);
		$('#hdnHierarchyName').val($('#txtSubNodeName'+id).val());
		$('#hdnAliasName').val($('#txtSubNodeAlias'+id).val());
		$('#frmAdmin').submit();
	}	
</script>
</body>
</html>
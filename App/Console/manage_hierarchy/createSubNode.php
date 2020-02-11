<?php 
/* ================================================
	File Name         	  : createSubNode.php
	Description			  : This page is used to Add Hierarchy Subnode.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 21-Aug-2013
	Update History		  :
				<Updated by>		<Updated On>		<Remarks>
			Sunil kumar Parida		11/10/2013			update design and remove mandatory of alias	
	
	includes			  : createSubNodeInner.php
	Style sheet           : style.php,bootstrap.css                                            
	Javscript Functions   : jquery.js,bootstrap.min.js,loadScript.js
	==================================================*/
	require("createSubNodeInner.php");
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
	pageHeader="Create Subnode"
	strFirstLink="Hierarchy Master"
	strLastLink="<?php echo $nodeName;?>"
	indicate="yes"
	$(document).ready(function(){
		defaultfocus("txtsubnodeNo");
		$('#frmAdmin').attr('autocomplete', 'off');
		
		$('#tblRecord input[type=text]').blur(function(){
			var currentId	= this.id;
			var currentVal	= this.value;
			if(currentId.indexOf('txtSubNode') != -1){
				var rowId		= currentId.replace('txtSubNode','');
				var flag		= 'N';
			}
			else if(currentId.indexOf('txtSubAlias') != -1){
				var rowId		= currentId.replace('txtSubAlias','');
				var flag		= 'A';
			}	
			checkDuplicate(rowId,currentVal,flag);
		});
		$("#txtsubnodeNo").blur(function() {
			var x= $("#txtsubnodeNo").val();
			var y= $("#hdnSubnodeNo").val();
			if(x==''){
				alert('Node number can not be blank');
				$("#txtsubnodeNo").val(y);
				return false;
			}	
			if(x=='0'){
				alert('Node number can not be 0');
				$("#txtsubnodeNo").val(y);
				return false;
			}			
			if(Number(x)<Number(y)){
				alert('Node number can not less than previous node value');
				$("#txtsubnodeNo").val(y);
				return false;
			}
		});
		$("#txtsubnodeNo").keyup(function() {
			$("#divMsg").html('');
			var x= $("#txtsubnodeNo").val();
			var y= $("#hdnSubnodeNo").val();
			var z	= Number(y)-1;
			$("#tblRecord tr:gt("+z+")").detach();	
			
  			var tempHTML = "";						
			for(var i=Number(y)+1; i<=x; i++)
			{				
				 tempHTML = "";
				 tempHTML += '<tr id="nodeTr'+i+'">';
         		 tempHTML += '<td> Subnode '+ i +'</td>';
				 tempHTML +=  '<td align="center" valign="middle">:</td>';
				 tempHTML += '<td> <input type="text"  id="txtSubNode'+i+'" name="txtSubNode'+i+'" style="width:200px;"  value="" maxlength="50" onKeyUp="return blockspecialchar_first(this);"  onBlur="checkDuplicate('+i+',this.value,\'N\');" /> <span class="mandatory">*</span></td>';
         		 tempHTML += '<td>  Alias</td>';
				 tempHTML +=  '<td align="center" valign="middle">:</td>';
				 tempHTML += '<td> <input type="text"  id="txtSubAlias'+i+'"  name="txtSubAlias'+i+'" style="width:200px;"  value="" maxlength="50" onKeyUp="return blockspecialchar_first(this);"  onBlur="checkDuplicate('+i+',this.value,\'A\');" /> </td>';
				 tempHTML += '</tr>';
				$("#tblRecord").append(tempHTML);
			}
		});
		<?php if($outMsg!= ''){?>			
			alert("<?php echo $outMsg;?>");	
			$('form').submit();	
		<?php }?>
	});

	function validator()
	{
		if (!blankFieldValidation('txtsubnodeNo', 'Subnode Number')) 
			return false;
		
		var nodeNo= $("#txtsubnodeNo").val();
		for(var i=1; i<=nodeNo; i++)
		{
			if (!blankFieldValidation('txtSubNode'+i, 'Subnode '+i+' Name')) 
				return false;
			
			if (!IsSpecialCharacter('txtSubNode'+i, 'Special Character Not Allowed !')) 
				return false;
			
			if (!IsSpecialCharacter('txtSubAlias'+i, 'Special Character Not Allowed !')) 
				return false;
		}
	}
	
	function checkDuplicate(rowId,curVal,flag)
	{
			
			$('#tblRecord input[type=text]').not('#txtSubNode'+rowId+', #txtSubAlias'+rowId).each(function() {
				if(this.value.toLowerCase()==curVal.toLowerCase() && this.value!='')
				{
					alert("Duplicate entries can't be possible");
					if(flag=='N')
						$('#txtSubNode'+rowId).focus();
					else
						$('#txtSubAlias'+rowId).focus();
					return false;
				}
			});
	}
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
                <td valign="top"><div id="ContArea" style="min-height:450px;">
                    <?php include('../includes/title.php'); ?>
                    <div class="MyTab">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#">Add</a></li>
                        <li><a href="<?php echo $strPath; ?>viewSubNode/1/1/<?php echo $nodeId;?>">view</a></li>
					  </ul>
                      <?php include('../includes/util.php'); ?>
                    </div>
                    <div id="addTable">
                    <table border="0" cellspacing="0" cellpadding="0">
					  <?php
						if($obj->NumRow($subNodeResult)>0){
							$ctr	= $obj->NumRow($subNodeResult);
						}
					  ?>
					  <tr>
						<td>Total Subnode No.</td>
						<td align="center" valign="middle">:</td>
						<td>	
							<input type="text" name="txtsubnodeNo" id="txtsubnodeNo" style="width:200px;" value="<?php echo ($ctr==0)?1:$ctr;?>" onkeypress="return isNumberKey(event);"  maxlength="2" />&nbsp;<span class="mandatory">*</span>
							<input type="hidden" name="hdnSubnodeNo" id="hdnSubnodeNo" value="<?php echo ($ctr==0)?1:$ctr;?>" />
						</td>
						<td colspan="3">&nbsp;</td>
					  </tr>
					  <tbody id="tblRecord">
					  <?php
						if($ctr>0){
							while($row	= mysqli_fetch_array($subNodeResult)){
					  ?>
					  <tr>
						<td>Subnode <?php echo $row['INT_SUB_LEVEL'];?></td>
						<td align="center" valign="middle">:</td>
						<td><input type="text" name="txtSubNode<?php echo $row['INT_SUB_LEVEL'];?>" id="txtSubNode<?php echo $row['INT_SUB_LEVEL'];?>" style="width:200px;"  value="<?php echo $row['VCH_SUBNODE_NAME'];?>" maxlength="50" /> <span class="mandatory">*</span></td>
					  
						<td>Alias</td>
						<td align="center" valign="middle">:</td>
						<td><input type="text" name="txtSubAlias<?php echo $row['INT_SUB_LEVEL'];?>" id="txtSubAlias<?php echo $row['INT_SUB_LEVEL'];?>" style="width:200px;"  value="<?php echo $row['VCH_SUBALIAS_NAME'];?>" maxlength="50" /></td>
					  </tr>
					  <?php
						}}else{
					  ?>  
					  <tr>
						<td>Subnode 1 </td>
						<td align="center" valign="middle">:</td>
						<td><input type="text" name="txtSubNode1" id="txtSubNode1" style="width:200px;"  value="" maxlength="50" /> <span class="mandatory">*</span>
						</td>
						<td>Alias</td>
						<td align="center" valign="middle">:</td>
						<td><input type="text" name="txtSubAlias1" id="txtSubAlias1" style="width:200px;"  value="" maxlength="50" /></td>
					  </tr>
					  <?php }?>
					  </tbody>
					  <tr>
						<td>&nbsp;</td>
						<td align="center" valign="middle"></td>
						<td><input name="btnSubmit" type="submit" class="btn btn-success" id="btnSubmit" value="Update" onclick="return validator();"/></td>
					  </tr>
                    </table>

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
</body>
</html>
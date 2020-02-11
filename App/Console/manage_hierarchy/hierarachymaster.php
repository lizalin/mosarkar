<?php 
/* ================================================
	File Name         	  : hierarchymaster.php
	Description			  : This page is used to Add Hierarchy node.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 21-Aug-2013
	Update History		  :
			<Updated by>		<Updated On>		<Remarks>
			Sunil Kumar Parida	11/10/2013			update design and remove mandatory of alias	
	
	includes			  : hierarachyInner.php
	Style sheet           : style.php,bootstrap.css                                            
	Javscript Functions   : jquery.js,bootstrap.min.js,loadScript.js
	==================================================*/
	require("hierarachyInner.php");
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
	pageHeader="Add Hierarchy"
	strFirstLink=""
	strLastLink="Hierarchy Master"
	indicate="yes"
	$(document).ready(function(){
		defaultfocus("txtNodeNo");
		$('#frmAdmin').attr('autocomplete', 'off');
		
		$('#tblRecord input[type=text]').blur(function(){
			var currentId	= this.id;
			var currentVal	= this.value;
			if(currentId.indexOf('txtNode') != -1){
				var rowId		= currentId.replace('txtNode','');
				var flag		= 'N';
			}
			else if(currentId.indexOf('txtAlias') != -1){
				var rowId		= currentId.replace('txtAlias','');
				var flag		= 'A';
			}	
			checkDuplicate(rowId,currentVal,flag);
		});
		$("#txtNodeNo").blur(function() {
			var x= $("#txtNodeNo").val(); 
			var y= $("#hdnNodeNo").val();	
			if(x==''){
				alert('Node number can not be blank');
				$("#txtNodeNo").val(y);
				return false;
			}	
			if(x=='0'){
				alert('Node number can not be 0');
				$("#txtNodeNo").val(y);
				return false;
			}
			if(Number(x)<Number(y)){
				alert('Node number can not less than previous node value');
				$("#txtNodeNo").val(y);
				return false;
			}
		});
		$("#txtNodeNo").keyup(function() {
			var x= $("#txtNodeNo").val(); 
			var y= $("#hdnNodeNo").val();
			var z	= Number(y)-1;
			$("#tblRecord tr:gt("+z+")").detach();			
  			var tempHTML = "";						
			for(var i=Number(y)+1; i<=x; i++)
			{				
				 tempHTML = "";
				 tempHTML += '<tr id="nodeTr'+i+'">';
         		 tempHTML += '<td> Hierarchy '+ i + '</td>';
				 tempHTML +=  '<td align="center" valign="middle">:</td>';
				 tempHTML += '<td> <input type="text"  id="txtNode'+i+'" name="txtNode'+i+'" style="width:200px;"  value="" maxlength="50" onKeyUp="return blockspecialchar_first(this);" class="txtNode" onBlur="checkDuplicate('+i+',this.value,\'N\');" /> <span class="mandatory">*</span></td>';
				 tempHTML += '<td>Alias</td>';
				 tempHTML +=  '<td align="center" valign="middle">:</td>';
				 tempHTML += '<td> <input type="text"  id="txtAlias'+i+'"  name="txtAlias'+i+'" style="width:200px;"  value="" maxlength="50" onKeyUp="return blockspecialchar_first(this);" class="txtAlias" onBlur="checkDuplicate('+i+',this.value,\'A\');" /> </td>';
				 tempHTML += '</tr>';				
				$("#tblRecord").append(tempHTML);
			}
		});
		<?php if($outMsg!=''){?>			
			alert("<?php echo $outMsg;?>");	
			$('form').submit();
		<?php }?>
});

	function validator()
	{
		if (!blankFieldValidation('txtNodeNo', 'Hierarchy Node Number')) 
			return false;
		
		if (!IsSpecialCharacter('txtNodeNo', 'Special Character Not Allowed !')) 
			return false;
		
		var nodeNo= $("#txtNodeNo").val();
		for(var i=1; i<=nodeNo; i++)
		{
			if (!blankFieldValidation('txtNode'+i, 'Hierarchy Node '+i+' Name')) 
				return false;
			
			if (!IsSpecialCharacter('txtNode'+i, 'Special Character Not Allowed !')) 
				return false;
			
			if (!IsSpecialCharacter('txtAlias'+i, 'Special Character Not Allowed !')) 
				return false;
			
		}
	}
	
	function checkDuplicate(rowId,curVal,flag)
	{
			
			$('#tblRecord input[type=text]').not('#txtNode'+rowId+', #txtAlias'+rowId).each(function() {
				if(this.value.toLowerCase()==curVal.toLowerCase() && this.value!='')
				{
					alert("Duplicate entries can't be possible");
					if(flag=='N')
						$('#txtNode'+rowId).focus();
					else
						$('#txtAlias'+rowId).focus();
					return false;
				}
			});
	}
</script>
</head>
<body>
<form id="frmAdmin" name="frmAdmin" method="post" enctype="multipart/form-data" >
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
                        <li><a href="<?php echo $strPath; ?>ViewHierarachymaster/1/1">view</a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>
                    </div>
                    <div id="addTable">
                    <table border="0" cellspacing="0" cellpadding="0">
				  <?php
					if($obj->NumRow($nodeResult)>0){
						$ctr	= $obj->NumRow($nodeResult);		
					}
				  ?>
				  <tr>
					<td>Total Node No.</td>
					<td align="center" valign="middle">:</td>
					<td>
						<input type="text" name="txtNodeNo" id="txtNodeNo" style="width:200px;" value="<?php echo ($ctr==0)?1:$ctr;?>" onkeypress="return isNumberKey(event);"  maxlength="2" />&nbsp;<span class="mandatory">*</span>
						<input type="hidden" name="hdnNodeNo" id="hdnNodeNo" value="<?php echo ($ctr==0)?1:$ctr;?>" />
					</td>
					<td colspan="3">&nbsp;</td>
				  </tr>
				  <tbody id="tblRecord">
				  <?php
					if($ctr>0){
						while($row	= mysqli_fetch_array($nodeResult)){
				  ?>
					<tr>
					<td>Hierarchy <?php echo $row['INT_NO_LEVEL'];?></td>
					<td align="center" valign="middle">:</td>
					<td><input type="text" name="txtNode<?php echo $row['INT_NO_LEVEL'];?>" id="txtNode<?php echo $row['INT_NO_LEVEL'];?>" style="width:200px;"  value="<?php echo $row['VCH_HIERARCHY_NAME'];?>" class="txtNode" maxlength="50" onKeyUp="return blockspecialchar_first(this);" /> <span class="mandatory">*</span></td>
				  <!--</tr>
				  <tr>-->
					<td>Alias </td>
					<td align="center" valign="middle">:</td>
					<td><input type="text" name="txtAlias<?php echo $row['INT_NO_LEVEL'];?>" id="txtAlias<?php echo $row['INT_NO_LEVEL'];?>" style="width:200px;"  value="<?php echo $row['VCH_ALIAS_NAME'];?>" class="txtAlias" maxlength="50" onKeyUp="return blockspecialchar_first(this);" /></td>
				  </tr>
				  <?php
					}}else{
				  ?>
				  <tr>
					<td>Hierarchy 1 </td>
					<td align="center" valign="middle">:</td>
					<td><input type="text" name="txtNode1" id="txtNode1" class="txtNode" style="width:200px;"  value="" maxlength="50" onKeyUp="return blockspecialchar_first(this);" /> <span class="mandatory">*</span></td>
				  
					<td>Alias </td>
					<td align="center" valign="middle">:</td>
					<td><input type="text" name="txtAlias1" id="txtAlias1" class="txtAlias" style="width:200px;"  value="" maxlength="50" onKeyUp="return blockspecialchar_first(this);" /></td>
				  </tr>
				  <?php
					}
				  ?>
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
<?php 
/* ================================================
	File Name         	  : assignLink.php
	Description			  : This page is used to asign Link.
	Author Name			  : Rasmi Ranjn Swain
	Date Created		  : 07-Nov-2013
	Update History		  :
		<Updated by>			<Updated On>		<Remarks>	
										
	Style sheet           : bootstrap.css                                           
	Javscript Files		  : jquery.js,bootstrap.min.js,loadscript.js,loadJson.js
	includes			  : setPermissionInner.php,header.php,leftmenu.php,navigation.php,title.php,util.php,footer.php

	==================================================*/
	require("assignLinkInner.php");
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
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/loadJson.js"></script>
<script language="javascript">
	pageHeader="Assign Link"
	strFirstLink="Manage User"
	strLastLink="Assignment"
	indicate="yes"
	$(document).ready(function(){
		defaultfocus("selGL");
		$(document).keyup(function(){
		defaultBtn(event,validator);
		});
		RowColChange()
		setupLabel();
		$(document).on("click",'.label_check', function (){
			setupLabel();
		});
                
                $('#gfg ul li').eq(index).css({'background-color':'#343434'});
                
		doMultiple(0);
		fillGlink(0);
		fillHierarchy(0,'SelLocation');	
		fillgroup('0','selGroup');
		<?php if($outMsg!=''){?>
			alert('<?php echo $outMsg;?>');				
		<?php }?>
	});
	
	
	function validator()
	{
	var chkVal	= $('input:radio[name=radType]:checked').val();
		if(chkVal=='2')
		{
			if(!DropDownValidation('selGroup','Group Name'))
			return false;
			if(!DropDownValidation('selGL','Global Link'))
			return false;
			if(!DropDownValidation('selPL','Primary Link'))
			return false;
		}
		else
		{
			if(chkVal=='0')
			{
				if(!DropDownValidation('selGL','Global Link'))
				return false;
				if(!DropDownValidation('selPL','Primary Link'))
				return false;
				if(!DropDownValidation('SelLocation','Location'))
				return false;
			}
			var userCount		= $( "#selAllUser option:selected" ).length;
			if(userCount=='0' || (userCount== 1 && ($("#selAllUser").val()==0)))
			{
				alert('Please select User');
				$('#selAllUser').focus();
				return false;
			}
		}
			var chkIds	='';
			$('.firstChk').each(function(){
				if($(this).is(':checked'))
				{
					chkIds	+= $(this).val()+',';
				}
			});
			chkIds	= chkIds.slice(0,-1);		
			$('#hdnLinks').val(chkIds);
			var userIds	= '';
			$( "#selAllUser option" ).each(function() {			
				if($(this).val()!='0')
					userIds += $(this ).val() + ",";
			});	
			userIds	= userIds.slice(0,-1);
			$('#hdnUsers').val(userIds);
			
			
			
		
		
	}
	function assignUser()
	{
		var userCount		= $( "#selUser option:selected" ).length;
		if(userCount=='0' || (userCount== 1 && ($("#selUser").val()==0)))
		{
			alert('Please select User');
			$('#selUser').focus();
			return false;
		}
		var selUser	= 'selUser';
		var selAll	= 'selAllUser'
		
		$("#"+selUser+" > option:selected").each(function(){
			var userVal	= this.value;
			if(userVal!=0){
				var flag	= 0;
				$("#"+selAll+" > option").each(function(){				
            		var selectUser	= this.value;
					if(selectUser==userVal)
						flag=1;
				});
				if(flag==0)
					$(this).remove().appendTo("#"+selAll);
				else
					alert('This user is already selected');
			}
        });
		getOptions();
	}
	function removeUser()
	{
		var userCount		= $( "#selAllUser option:selected" ).length;
		if(userCount=='0' || (userCount== 1 && ($("#selAllUser").val()==0)))
		{
			alert('Please select User');
			$('#selAllUser').focus();
			return false;
		}
		var selUser	= 'selUser';
		var selAll	= 'selAllUser'
		
		$("#"+selAll+" > option:selected").each(function(){
			var userVal	= this.value;
			if(userVal!=0){
				var flag	= 0;
				$("#"+selUser+" > option").each(function(){				
            		var selectUser	= this.value;
					if(selectUser==userVal)
						flag=1;
				});
				if(flag==0)
					$(this).remove().appendTo("#"+selUser);
				else
					alert('This user is exist in destination list');
			}
        });
		getOptions();
	}
	
	
	function doMultiple(flag)
	{
		if(flag==0)
		{
				$("#grpTr").hide();
				$("#userTr").hide();
				$("#tr").show();
				$("#userDrpTr").show();
				$('#txtUserName').val('');
				$("#selUser > option").remove();
				$("#selUser").append('<option value="0">--Select--</option>');
				
				
		}
		else if(flag==1)
		{
				$("#grpTr").hide();
				$("#userTr").show();
				$("#tr").hide();
				$("#userDrpTr").show();
				$('.dynamic').not(':first').remove();
				$('#SelLocation').val('0');
				$('#txtUserName').val('');
				$("#selUser > option").remove();
				$("#selUser").append('<option value="0">--Select--</option>');
				
		}
		else
		{		
				$("#grpTr").show();
				$("#userTr").hide();
				$("#tr").hide();
				$("#userDrpTr").hide();
				$('.dynamic').not(':first').remove();
				$('#SelLocation').val('0');
				$('#txtUserName').val('');
				$("#selUser > option").remove();
				$("#selUser").append('<option value="0">--Select--</option>');
				$("#selAllUser > option").remove();
				$("#selAllUser").append('<option value="0">--Select--</option>');
		}
	}
	
	function getOptions()
	{
		var allUser	= '';
		$("#selAllUser > option").not(':first').each(function(){				
			allUser	+= this.value+',';
		});
		allUser	= allUser.substring(0,allUser.length - 1)
		$.showUserImage(allUser,'showImg','40','40');
	}
</script>
</head>
<body>
<form id="frmAdmin" name="frmAdmin" method="post" enctype="multipart/form-data">
  <div id="mainTable">  
    <!-- Header Area-->
    <?php include("../includes/header.php");?>
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
                       <li><a href="<?php echo $strPath;?>assignAdmin/<?php echo $glId;?>/<?php echo $plId;?>">Assign Admin </a></li>
                        <li class="active"><a href="#">Assign Link</a></li>
                      </ul>
                    </div>
                     <div id="addTable">
					   <table border="0" cellspacing="0" cellpadding="0">
					     
						 
                         <tr>
                          <td>Global Link</td>
                          <td align="center" valign="middle">:</td>
                          <td><select name="selGL" id="selGL" style="width:207px;" onchange="fillPlink(this.value,0);">
                              <option>-Select-</option>
                            </select>
                            &nbsp;&nbsp;<span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <td>Primary Link</td>
                          <td align="center" valign="middle">:</td>
                          <td><select name="selPL" id="selPL" style="width:207px;" onchange="setlinkPl(this.value)">
                              <option>-Select-</option>
                            </select>
                            &nbsp;&nbsp;<span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <td>Permission </td>
                          <td align="center" valign="middle">&nbsp;</td>
                          <td>
						  	<div id="divAction"></div>
						  	<input type="radio" name="radAction" id="radAction1"  value="1" checked="checked" />
                            <span id="spnAction1">Action 1</span>&nbsp; 
                            <input type="radio" name="radAction" id="radAction2"  value="2"/>
							<span id="spnAction2">Action 2</span>&nbsp; 
							<input type="radio" name="radAction" id="radAction3"   value="3"/>
							<span id="spnAction3">Action 3</span>&nbsp; 
						  </td>
                        </tr>
						<tr>
					       <td>User Type</td>
					       <td align="center" valign="middle">&nbsp;</td>
					       <td><input type="radio" name="radType" id="radHierarchy" onclick="doMultiple(0);" value="0" checked="checked"/>
					         Hierarchy Wise
					         <input type="radio" name="radType" id="radUser"  onclick="doMultiple(1);" value="1"/>
					         Name Wise 
							 <input type="radio" name="radType" id="radGroup"  onclick="doMultiple(2);" value="2"/>
					         Group Wise 
						   </td>
					     </tr>
						 <tr id="grpTr">
					        <td>Group Name</td>
					        <td align="center" valign="middle">:</td>
					        <td>
							 <select name="selGroup" id="selGroup" style="width:207px;" >
								<option value="0">--Select--</option>
							</select>&nbsp;&nbsp; <span class="mandatory">*</span>&nbsp;
							<a href="#myModal" data-toggle="modal" onclick="showGroupUser($('#selGroup').val(),'divModal');" class="btn btn-info">View User List</a>

							</td>
					     </tr>
						 <tr id="userTr">
					        <td>Name </td>
					        <td align="center" valign="middle">:</td>
					        <td> <input type="text" name="txtUserName" id="txtUserName" maxlength="100" onkeyup="showUser(this.value,0,'selUser');" style="width:200px;" /></td>
					     </tr>
					     <tr id="tr" class="dynamic">
					       <td><span class="lbldynamic">Location</span></td>
					       <td align="center" valign="middle">:</td>
					       <td> <select name="SelLocation" id="SelLocation" style="width:207px;"  class="seldynamic" onchange="fillSubnode(this.value,0,0,'tr','dynamic','hdnNo','U','selUser');">                              
					         </select> 
					       &nbsp;<span class="mandatory">*</span>						  </td>
					       </tr>
					     
					     <tr id="userDrpTr">
					       <td>User Name</td>
					       <td align="center" valign="middle">:</td>
					       <td>
					         <table border="0" cellspacing="0" cellpadding="0" align="center">
					           <tr>
					             <td rowspan="2"><select name="selUser" id="selUser" style="width:207px;" multiple="multiple">
					               <option value="0">--Select--</option>
					               </select>
					               &nbsp;<span class="mandatory">*</span><br/>																  </td>
					             <td align="center" valign="middle" class="multipleTd"><a href="javascript:void(0);" class="btn btn-small" onclick="assignUser();"><i class="icon-forward"></i></a></td>
					             <td rowspan="2" class="multipleTd">
					               <select multiple="multiple" name="selAllUser" id="selAllUser" style="width:207px;">
					                 <option value="0" selected="selected">--Select--</option>
					                 </select>
					               &nbsp;&nbsp;<span class="mandatory">*</span><span id="showImg"></span></td>
					             </tr>
					           <tr>
					             <td align="center" valign="middle" class="multipleTd"><a href="javascript:void(0);" class="btn btn-small" onclick="removeUser();"><i class="icon-backward"></i></a></td>
					             </tr>
					           </table><input type="hidden" name="hdnFlag" id="hdnFlag" /></td>
					       </tr>
					    
					     </table>	
					     
				       			  
					  <input type="hidden" name="hdnNo" id="hdnNo" />					  			  
                    </div>
                    <div class="permissionList" id="permissionList">   
                    </div>
					<input type="hidden" name="hdnLinks" id="hdnLinks" />
					<input type="hidden" name="hdnUsers" id="hdnUsers" />
                    <input type="submit" name="btnSave" id="btnSave" value="Assign Link Permission" class="btn btn-success"  onclick="return validator();" />                   
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
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Users</h3>
	  </div>
	  <div class="modal-body viewTable" id="divModal"></div>
	</div>
  </div>
</form>
</body>
</html>
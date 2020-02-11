<?php 
/* ================================================
	File Name         	  : setPermission.php
	Description			  : This page is used to Set Permission.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 24-Oct-2013
	Update History		  :
	<Updated by>			<Updated On>		<Remarks>	
	Sunil Kumar Parida		05/11/2013			Update set permission as group wise
										
	Style sheet               : bootstrap.css                                           
	Javscript Files		  : jquery.js,bootstrap.min.js,loadscript.js,loadJson.js
	includes                  : setPermissionInner.php,header.php,leftmenu.php,navigation.php,title.php,util.php,footer.php

	==================================================*/
	require("setPermissionInner.php");
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
<link rel="stylesheet" href="<?php echo $appPath; ?>/css/chosen.min.css">
<script src="<?php echo $appPath; ?>/js/chosen.jquery.min.js"></script>
<script language="javascript">
	pageHeader="View Permission"
	strFirstLink="Manage User"
	strLastLink="Set Permission"
	indicate="yes"
	$(document).ready(function(){	
	
		defaultfocus("SelLocation");
		$(document).keyup(function(){
		//defaultBtn(event,validator);
		});
		RowColChange()
		setupLabel();
		$(document).on("click",'.label_check', function (){
			setupLabel();
		});
		doMultiple(0);
		fillHierarchy(0,'SelLocation');		
		setGlobal(0,'permissionList');
		<?php if($groupTable>0){?>fillgroup('0','selGroup');<?php }?>
		<?php if($outMsg!=''){?>
			alert('<?php echo $outMsg;?>');				
		<?php }?>
	});
	//check radio button 
	//start
	$(document).on('click','.radAction',function(){
			var rowId	= $(this).closest('tr').attr('id');
			$('#chkBox'+rowId).attr('checked',true);
			$('#chkBox'+rowId).parent().addClass('c_on');
		});
		$(document).on('click','input[type="checkbox"]',function(){
			var chkId	= $(this).val();
			var rowId	= $(this).closest('tr').attr('id');
			if($(this).is(':checked'))
			{	
				$('#rad'+rowId+'_2').attr('checked',true);
			}
			else
			{
				for(var i=1;i<=3;i++)
				{
					 $('#rad'+rowId+'_'+i).attr('checked',false);
					
				}
			}
		});
		//end
	function validator()
	{
	var chkVal	= $('input:radio[name=radType]:checked').val();
		if(chkVal=='2')
		{
			if(!DropDownValidation('selGroup','Group Name'))
			return false;
		}
		else
		{
			if(chkVal=='0')
			{
				if(!DropDownValidation('SelLocation','Location '))
				return false;
			}
			var userCount		= $( "#selUser option:selected" ).length;
			if(userCount=='0' || (userCount== 1 && ($("#selUser").val()==0)))
			{
				alert('Please select User');
				$('#selUser').focus();
				return false;
			}
		}
			var userIds	= '';
		if(chkVal=='2')
		{	
			$( "#selUser option" ).each(function() {			
				if($(this).val()!='0')
					userIds += $(this ).val() + ",";
			});			
			userIds	= userIds.slice(0,-1);
		}
		else
		{
			userIds	= $( "#selUser").val();
		}
			$('#hdnUsers').val(userIds);
		if($('#chkCopyUser').is(':checked'))
		{
			if(!DropDownValidation('ddlCopyUser','Copy from user name'))
				return false;
		}
		else
		{
			var chkIds	='';
			$('.firstChk').each(function(){
				if($(this).is(':checked'))
				{
					chkIds	+= $(this).val()+',';
				}
			});
			chkIds	= chkIds.slice(0,-1);		
			$('#hdnLinks').val(chkIds);
		}
			
			
			
			if(chkIds=='')
			{
				alert('Select link permission');
				return false;
			}
		
		
	}
	function viewPermission()
	{		
		
		
		if($('#txtUserName').val()=='')
		{
			if($('.seldynamic:last').val()==0)
			{
				var lastLabel	= $('.lbldynamic:last').text();
				alert('Please Select '+lastLabel);
				$('.seldynamic:last').focus();
				return false;
			}
		}		
		if(!DropDownValidation('selUser','User'))
			return false;
		var userId		= $('#selUser').val();
		showPermission(userId);
	}
	
	function doMultiple(flag)
	{		
		
		$('#showImg').html('');
		$('input[type=checkbox]').attr('checked', false); 
		$('input[type=radio]').not('.topRad').attr('checked', false);
		$('input[type=checkbox]').parent().removeClass('c_on');		
		 
		if(flag==0)
		{
				$("#grpTr").hide();
				$("#userTr").hide();
				$("#userDrpTr").show();
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
				$("#userDrpTr").show();
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
				$("#userDrpTr").hide();
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
                        <li><a href="<?php echo $strPath;?>setPermission/<?php echo $glId;?>/<?php echo $plId;?>">Set Permission</a></li>
                        <li class="active"><a href="#">View Permission</a></li>
                      </ul>
                    </div>
                     <div id="addTable">
					   <table border="0" cellspacing="0" cellpadding="0">
					     <tr>
					       <td>User Type</td>
					       <td align="center" valign="middle">&nbsp;</td>
					       <td><input type="radio" name="radType" class="topRad" id="radHierarchy" onclick="doMultiple(0);" value="0" checked="checked"/>
					         Hierarchy Wise
					         <input type="radio" name="radType" class="topRad" id="radUser"  onclick="doMultiple(1);" value="1"/>
					         Name Wise 
							 <?php if($groupTable>0){?><input type="radio" name="radType" class="topRad" id="radGroup"  onclick="doMultiple(2);" value="2"/>
					         Group Wise <?php }?>
						   </td>
					     </tr>
						 <tr id="grpTr">
					        <td>Group Name</td>
					        <td align="center" valign="middle">:</td>
					        <td>
							 <select name="selGroup" id="selGroup" style="width:207px;" onchange="showGroupPermission(this.value);" >
								<option value="0">--Select--</option>
							</select>
							 &nbsp;
							<a href="#myModal" data-toggle="modal" onclick="showGroupUser($('#selGroup').val(),'divModal');"  class="btn btn-info">View User List</a>
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
					         </select></td>
					       </tr>
					     
					     <tr id="userDrpTr">
					       <td>User Name</td>
					       <td align="center" valign="middle">:</td>
					       <td><select name="selUser" id="selUser" style="width:207px;" onchange="showPermission(this.value,'V'); ">
					               <option value="0">--Select--</option>
					               </select>&nbsp;<span class="mandatory">*</span>
				           <input type="hidden" name="hdnFlag" id="hdnFlag" /><span id="showImg"></span></td>
				         </tr>
					     </table>	
						 
					     
				       			  
					  <input type="hidden" name="hdnNo" id="hdnNo" />					  			  
                    </div>
                    <div class="permissionList" id="permissionList">   
                    </div>
					<input type="hidden" name="hdnLinks" id="hdnLinks" />
					<input type="hidden" name="hdnUsers" id="hdnUsers" />
                    <input type="submit" name="btnSave" id="btnSave" value="Update Permission" class="btn btn-success" onclick="return validator();" />
                                  
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
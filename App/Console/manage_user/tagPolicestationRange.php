<?php 
/* ================================================
	File Name         	  : setPermission.php
	Description			  : This page is used to Set Permission.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 24-Oct-2013
	Update History		  :
		<Updated by>			<Updated On>		<Remarks>	
		Sunil Kumar Parida		05/11/2013			Update set permission as group wise
										
	Style sheet           : bootstrap.css                                           
	Javscript Files		  : jquery.js,bootstrap.min.js,loadscript.js,loadJson.js
	includes			  : setPermissionInner.php,header.php,leftmenu.php,navigation.php,title.php,util.php,footer.php

	==================================================*/
	require("tagPolicestationRangeInner.php");
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
	pageHeader="Set Permission"
	strFirstLink="Manage User"
	strLastLink="Set Permission"
	indicate="yes"
	$(document).ready(function(){
		// defaultfocus("SelLocation");
		// RowColChange()
		// setupLabel();		
		// doMultiple(0);
		// fillHierarchy(0,'SelLocation');		
        // setGlobal(0,'permissionList');
        fillRange(0,'selRange');
        fillPoliceStation(0,'selPoliceStation');
		fillDistrict('selDistrict');
                
		<?php if($groupTable>0){?>fillgroup('0','selGroup');<?php }?>
		$(document).on('click','.radAction',function(){
			var rowId	= $(this).closest('tr').attr('id');
			$('#chkBox'+rowId).attr('checked',true);
			$('#chkBox'+rowId).parent().addClass('c_on');
		});
		$(document).on('click','input[type="checkbox"]',function(){
			setupLabel();	
			var chkId	= $(this).val();
			var rowId	= $(this).closest('tr').attr('id');
			if($(this).is(':checked'))
			{
				$('#rad'+rowId+'_2').attr('checked', 'checked');
			}
			else
			{		
				for(var i=1;i<=3;i++)
				{
					 $('#rad'+rowId+'_'+i).prop('checked',false);
				}
			}			
		});
		
		<?php if($outMsg!=''){?>
			alert('<?php echo $outMsg;?>');				
		<?php }?>
	});
	
	function assignUser()
	{
		var userCount		= $( "#selPoliceStation option:selected" ).length;
		if(userCount=='0' || (userCount== 1 && ($("#selPoliceStation").val()==0)))
		{
			alert('Please Select Police Station');
			$('#selPoliceStation').focus();
			return false;
		}
		var selUser	= 'selPoliceStation';
		var selAll	= 'selAllPoliceStation'
		
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
					alert('This Police Station is already selected');
			}
        });
		getOptions();
	}

	function removeUser()
	{
		if($('#selAllPoliceStation').val()==0)
		{
			alert("Please Select Police Station");
			$('#selAllPoliceStation').focus();
			return false;
		}
		var selUser	= 'selPoliceStation';
		var selAll	= 'selAllPoliceStation'
		
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
					alert('This police station is exist in the list');
			}
        });
		getOptions();
	}
	function getOptions()
	{
		var allUser	= '';
		$("#selAllPoliceStation > option").not(':first').each(function(){				
			allUser	+= this.value+',';
		});
		allUser	= allUser.substring(0,allUser.length - 1)
		//$.showUserImage(allUser,'showImg','40','40');
	}

	function validator()
	{

		
				if(!DropDownValidation('selRange','Range '))
				return false;
			
			var userCount		= $( "#selAllPoliceStation option:selected" ).length;
			if(userCount=='0' || (userCount== 1 && ($("#selAllPoliceStation").val()==0)))
			{
				alert('Please select Police Station');
				$('#selAllPoliceStation').focus();
				return false;
			}
		
			var userIds	= '';
			$( "#selAllPoliceStation option" ).each(function() {			
				if($(this).val()!='0')
					userIds += $(this ).val() + ",";
			});			
			userIds	= userIds.slice(0,-1);
			$('#hdnUsers').val(userIds);
		
			
		
		
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
                        <li class="active"><a href="#">Tag Police Station</a></li>
                        
                      </ul>
                    </div>
                     <div id="addTable">
					   <table border="0" cellspacing="0" cellpadding="0">
					     
						 <tr id="grpTr">
					        <td>Range Name</td>
					        <td align="center" valign="middle">:</td>
					        <td>
							 <select name="selRange" id="selRange" style="width:402px;" onchange="fillPoliceStionExist(this.value,'selAllPoliceStation');" >
								<option value="0">--Select--</option>
							</select>
							 &nbsp;<span class="mandatory">*&nbsp;</span>
							</td>
					     </tr>
						 
						 <tr id="">
					        <td>District</td>
					        <td align="center" valign="middle">:</td>
					        <td>
							 <select name="selDistrict" id="selDistrict" style="width:402px;" onchange="searchPoliceStion(this.value,'selPoliceStation');" >
								<option value="0">--Select--</option>
							</select>
							
							</td>
					     </tr>
						 <!-- <tr id="userTr">
					        <td> Police Staion Name Search </td>
					        <td align="center" valign="middle">:</td>
					        <td> <input type="text" name="txtUserName" id="txtUserName" maxlength="100" onkeyup="showUser(this.value,0,'selUser');" style="width:200px;" /></td>
					     </tr> -->
					    
					     
					     <tr id="userDrpTr">
					       <td>Police Staion </td>
					       <td align="center" valign="middle">:</td>
					       <td>
					         <table border="0" cellspacing="0" cellpadding="0" align="center">
					           <tr>
					             <td rowspan="2"><select name="selPoliceStation" id="selPoliceStation" style="width:402px;     min-height: 180px;" multiple="multiple">
					               <option value="0">--Select--</option>
					               </select>
					             </td>
					             <td align="center" valign="middle" class="multipleTd"><a href="javascript:void(0);" class="btn btn-small" onclick="assignUser();"><i class="icon-forward"></i></a></td>
					             <td rowspan="2" class="multipleTd">
					               <select multiple="multiple" name="selAllPoliceStation" id="selAllPoliceStation" style="width:402px;     min-height: 180px;">
					                 <option value="0" selected="selected">--Select--</option>
					                 </select>
					               &nbsp;&nbsp;<span class="mandatory">*</span>
								   <span id="showImg"></span>
								   </td>
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
                    <input type="submit" name="btnSave" id="btnSave" value="Tag Police Station" class="btn btn-success" onclick="return validator();" />                   
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
		<h3 id="myModalLabel"></h3>
	  </div>
	  <div class="modal-body viewTable" id="divModal"></div>
	</div>
  </div>
</form>
</body>
</html>
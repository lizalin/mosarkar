<?php 
	/* ================================================
	File Name         	  : assignAdmin.php
	Description			  : This page is used to assign administrator for a location.
	Devloper Name		  : Sunil kumar parida
	Date Created		  : 20-sep-2013
	Update History		  :
	<Updated by>		<Updated On>		<Remarks>
	Sunil Kumar Parida	11-Nov-2013			Remove administrator
	
	Style sheet           : style.php, bootstrap.css                                             
	Javscript Functions   : jquery.js,loadComponent.js,bootstrap.min.js, validator.js
	includes			  : header.php,leftmenu.php,navigation.php,util.php,footer.php,assignAdminInner.php
	
	==================================================*/
	require("assignAdminInner.php");
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
	pageHeader="Assign Admin"
	strFirstLink="Manage User"
	strLastLink="Assignment"
	//printMe="yes"
	//backMe="yes"
	//refreshMe="yes"
	//deleteMe="yes"
	indicate="yes"
	$(document).ready(function(){
		defaultfocus("selphyLoc");
		
		
		<?php if($outMsg!=''){?>
			alert('<?php echo $outMsg;?>');
		<?php }else{?>
			$('#tblAdmin tr').not($('#trPhyLoc')).hide();
		<?php }?>
		
		//fillHierarchy(<?php echo $locId;?>,'selphyLoc');
		showAssigningUser(<?php echo $locId;?>,'adminName');	
		fillHierarchy('0','SelLocation');	
		
	});
	function displayAdmin(locId)
	{
		if(locId>0)
			$('#tblAdmin tr').show();
		else
		{
			$('#tblAdmin tr').not($('#trPhyLoc')).hide();
			$('.dynamic').not(':first').remove();
			$('#SelLocation').val(0);
			$('#selUsers option').remove();
			$('#selUsers').html('<option value="0">--Select--</option>');
		}
	}
	function validator()
	{
		if(!DropDownValidation('selphyLoc','Location'))
			return false;
			
		if(!DropDownValidation('SelLocation','Location'))
			return false;
			
		if(!DropDownValidation('selUsers','User Name'))
			return false;	
	}
	$(document).keyup(function(){
		defaultBtn(event,validator);
	});
	function removeAdmin()
	{
		if(!confirm("Are you sure to remove administrator for this location?"))
			return false;
		var nodeId		= $('#selphyLoc').val();
		removeAssigningUser(nodeId);		
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
                <td valign="top"><div id="ContArea">
                    <?php include('../includes/title.php'); ?>
                    <div class="MyTab">
                      <ul class="nav nav-tabs">
                        <li class="active"><a>Assign Administrator</a></li>
                        <li><a href="<?php echo $strPath;?>assignLink/<?php echo $glId;?>/<?php echo $plId;?>">Assign Link </a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>
                    </div>
                    <div id="addTable">
                      <table border="0" cellspacing="0" cellpadding="0" id="tblAdmin">
                        <tr id="trPhyLoc">
                          <td width="120">Administrator for</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2">
							  <select name="selphyLoc" id="selphyLoc" style="width:207px;" onchange="showAssigningUser(this.value,'adminName');displayAdmin(this.value);">
							  <?php echo $locName;?>
							  </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Current Administrator</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><strong id="adminName"></strong><a href="javascript:void(0);" style="float:right;" id="remAdmin" class="mandatory" title="Remove Administrator" onclick="removeAdmin();">X</a></td>
                        </tr>
                        <tr id="tr" class="dynamic">
                          <td>Location</td>
                          <td align="center" valign="middle">:</td>
                          <td>
						  	<select name="SelLocation" id="SelLocation" style="width:207px;" onchange="fillSubnode(this.value,0,0,'tr','dynamic','hdnNo','U','selUsers')">                              
                            </select>&nbsp;<span class="mandatory">*</span>
						  </td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>Users</td>
                          <td align="center" valign="middle">:</td>
                          <td>
							  <select name="selUsers" id="selUsers" style="width:207px;" onchange="$.showUserImage(this.value,'showImg','30','30');">
								<option value="0" selected="selected">--Select--</option>                            
							  </select>&nbsp;<span class="mandatory">*</span>
							  
						  </td>
                          <td rowspan="2" valign="top"><span id="showImg"></span></td>
                        </tr>
                        <tr id="btns">
                          <td colspan="2">&nbsp;</td>						  
                          <td>
						  	<input name="btnSubmit" type="submit" class="btn btn-success" id="button" value="Update" onclick="return validator();" />
                          </td>
                        </tr>
                      </table>
					  <input type="hidden" name="hdnNo" id="hdnNo" />
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
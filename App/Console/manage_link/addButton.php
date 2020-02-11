<?php 
	/* ================================================
	File Name         	  : addButton.php
	Description			  : This page is used to Add the Button.	
	Created By			  :	Sunil Kumar Parida
    Created On			  :	13th-Sept-2013
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>
										
	
	includes			  : addButtonInner.php
	==================================================*/
	require("addButtonInner.php");
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
	pageHeader="<?php echo $strTab;?> Button Master"
	strFirstLink="Manage Link"
	strLastLink="Button Master"
	indicate="yes"
	$(document).ready(function(){
		defaultfocus("selFunc");
		TextCounter('txtDescription','lblChar1',500)
		setupLabel();
		$('.label_check').click(function(){
			setupLabel();
		});
		<?php if($outMsg!=''){?>
			alert('<?php echo $outMsg;?>');
		<?php  }if($errFlag==1){?>
			doCancel('viewButton/<?php echo $glId;?>/<?php echo $plId;?>/<?php echo $pageNo?>/<?php echo $recNo;?>');
		<?php }if($errFlag=='0'){?>		
			$('form').submit();
		<?php }?>
		fillAction('<?php echo $intFuncId;?>');
	});
	
	$(document).keyup(function(event){
		defaultBtn(event,validator);
	});
	
	function validator(){
		if(!DropDownValidation('selFunc','Function'))
			return false;		
			
		if (!blankFieldValidation('txtBtnName', 'Button Name')) 
			return false;		

		if (!IsSpecialCharacter('txtBtnName', 'Special Character Not Allowed !')) 
			return false;
		
		if (!blankFieldValidation('txtFileName', 'File Name')) 
			return false;
				
		if (!IsSpecialCharacter('txtFileName', 'Special Character Not Allowed !')) 
			return false;
		
		if($('#chkPermission1').is(':checked')==false && $('#chkPermission2').is(':checked')==false && $('#chkPermission3').is(':checked')==false)
		{
			alert('Choose atleast one action');
			$('#chkPermission1').focus();
			return false;
		}
		
		if(!MaxlengthValidation('txtDescription','Description','500'))
			return false;
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
                        <li class="active"><a href="#"><?php echo $strTab;?></a></li>
                        <li><a href="<?php echo $strPath;?>viewButton/<?php echo $glId;?>/<?php echo $plId;?>">View</a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>
                    </div>
                    <div id="addTable">
                      <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td >Function Name</td>
                          <td align="center" valign="middle">:</td>
                          <td>
						  	<select name="selFunc" id="selFunc" style="width:207px;" onchange="fillAction(this.value);">
                            	<?php echo $fillFunction;?>
                          	</select>
                          &nbsp;&nbsp;<span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <td>Button Name</td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="text" name="txtBtnName" id="txtBtnName" style="width:200px;" maxlength="50"  value="<?php echo $txtBtnName;?>" />
                          &nbsp;&nbsp;<span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <td>Sl. No</td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="text" name="intSL" id="intSL" style="width:200px;" readonly="readonly"  value="<?php echo $maxSL;?>" maxlength="5" />
                          &nbsp;&nbsp;<span class="mandatory">*</span> Highlights the latest Sl. No.</td>
                        </tr>
                        <tr>
                          <td>File Name</td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="text" name="txtFileName" id="txtFileName" style="width:200px;" maxlength="100"  value="<?php echo $fileName;?>"  />
                            &nbsp;&nbsp;<span class="mandatory">*</span>
                           </td>
                        </tr>
                        <tr>
                          <td>Tab Available</td>
                          <td align="center" valign="middle">:</td>
                          <td>
                          	<input type="radio" name="radTab" id="radYes" value="1" <?php if($intTabAvail==1){;?>checked="checked"<?php }?> /> 
                          	Yes
                            <input type="radio" name="radTab" id="radNo" value="2" <?php if($intTabAvail==2){;?>checked="checked"<?php }?>/> 
                            No 
                            &nbsp;&nbsp;<span class="mandatory">*</span>                           </td>
                        </tr>
                        <tr>
                          <td>Button Available for </td>
                          <td align="center" valign="middle">:</td>
                          <td>
						  <input type="checkbox" name="chkPermission1" id="chkPermission1" value="1" <?php if($intAction1==1){;?>checked="checked"<?php }?> /> &nbsp;
						  <span id="spnAction1">Action 1</span>&nbsp; 
						  <input type="checkbox" name="chkPermission2" id="chkPermission2" value="1" <?php if($intAction2==1){;?>checked="checked"<?php }?>/> &nbsp;
						  <span id="spnAction2">Action 2</span>&nbsp; 
						  <input type="checkbox" name="chkPermission3" id="chkPermission3" value="1" <?php if($intAction3==1){;?>checked="checked"<?php }?>/> &nbsp;
                          <span id="spnAction3">Action 3</span>&nbsp;
						  <span class="mandatory">*</span></td>
                        </tr>                       
                        <tr>
                          <td>Description</td>
                          <td align="center" valign="middle">:</td>
                          <td><textarea name="txtDescription" id="txtDescription" rows="3" cols="20" style="width:200px;" onkeyup="return TextCounter('txtDescription','lblChar1',500)"><?php echo $txtDesc;?></textarea>
                            &nbsp;
                            &nbsp; Maximum <span id="lblChar1"></span> &nbsp;characters                            </td>
                        </tr>
                        
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td><input name="btnSubmit" type="submit" class="btn btn-success" id="button"  value="<?php echo $strSubmit; ?>" onclick="return validator();"/>
                          <input name="button2" type="reset" class="btn btn-danger" id="button2"  value="<?php echo $strReset;?>" <?php echo $strOnclick; ?>/>						  
						  </td>
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
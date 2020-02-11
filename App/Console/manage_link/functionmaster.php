<?php 
	/* ================================================
	File Name         	  : functionmaster.php
	Description			  : This page is used to manage functions.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 11th-sept-2013
	Designed By			  :	
    Designed On			  :	
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>
	Style sheet           : style.css                                             
	Javscript Functions   : defaultfocus(),blankFieldValidation(),IsSpecialCharacter()
	Javascript Files	  : jquery.js,bootstrap.min.js,loadscript.js
	includes			  : functionInner.php,header.php,leftmenu.php,navigation.php,title.php,util.php,footer.php

	==================================================*/
	require("functionInner.php");
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
	pageHeader="<?php echo $strHeader;?>"
	strFirstLink="Manage Link"
	strLastLink="Function Master"
	indicate="yes"
	
	function validator(){
				
		if (!blankFieldValidation('txtFunName', 'Function Name')) 
			return false;
		
		if (!IsSpecialCharacter('txtFunName', 'Special Character Not Allowed !')) 
			return false;
		
		if (!blankFieldValidation('txtFileName', 'File Name')) 
			return false;

		if (!IsSpecialCharacter('txtFileName', 'Special Character Not Allowed !')) 
			return false;

		if (!IsSpecialCharacter('txtDesc', 'Special Character Not Allowed !')) 
			return false;		
		
		if(!MaxlengthValidation('txtDesc','Description','500'))
			return false;
			
		if($('#txtPermission1').val()=='' && $('#txtPermission2').val()=='' && $('#txtPermission3').val()=='')
		{
			alert('Enter atleast one permission');
			$('#txtPermission1').focus();
			return false;
		}
	}
	$(document).ready(function(){
		defaultfocus("txtFunName");
		$('#dispFreebees').hide();
		TextCounter('txtDesc','lblChar',500)
		setupLabel();
		$('.label_check').click(function(){
			setupLabel();
		});
		<?php if($outMsg!=''){?>			
			alert('<?php echo $outMsg;?>');
		<?php }?>
		<?php if($flag==1){?>
			doCancel('viewfunction/<?php echo $glId;?>/<?php echo $plId;?>/<?php echo $pageNo;?>/<?php echo $recNo;?>');
		<?php }?>
		
		$('input[name=radFreebees]').click(function(){
			if($(this).val()=='1')
				$('#dispFreebees').show();
			else
			{
				$('#txtPFileName').val('');
				$('#dispFreebees').hide();
			}
		});
	});
	
	
</script>
</head>
<body>
<form id="frmAdmin" name="frmAdmin" method="post"  enctype="multipart/form-data">
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
                        <li><a href="<?php echo $strPath;?>viewfunction/<?php echo $glId;?>/<?php echo $plId;?>">View</a></li>
                      </ul>
                      <div class="greenTxt"><?php echo $out_msg;?></div>
                      <?php include('../includes/util.php'); ?>
                    </div>
                    <div id="addTable">
                      <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="100"> Function Name </td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="text" name="txtFunName" id="txtFunName" maxlength="100" value="<?php echo $strFuncName;?>" style="width:200px;" />
                            <span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <td> File Name </td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="text" name="txtFileName" id="txtFileName" maxlength="100" value="<?php echo $strFileName;?>" style="width:200px;"  />
                            <span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <td> Related Pages </td>
                          <td align="center" valign="middle">:</td>
                          <td><textarea name="txtPages" id="txtPages" rows="5" cols="20" style="width:200px;"   onkeyup="return TextCounter('txtPages','lblPages',500)"><?php echo $portletFile;?></textarea>
                            &nbsp; Maximum <span id="lblPages"></span> &nbsp;characters </td>
                        </tr>
                        <tr>
                          <td> Description </td>
                          <td align="center" valign="middle">:</td>
                          <td><textarea name="txtDesc" id="txtDesc" rows="5" cols="20" style="width:200px;"   onkeyup="return TextCounter('txtDesc','lblChar',500)"><?php echo $strDesc;?></textarea>
                            &nbsp; Maximum <span id="lblChar"></span> &nbsp;characters </td>
                        </tr>
                        <tr>
                          <td>Permission</td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="text" name="txtPermission1" id="txtPermission1" maxlength="20" value="<?php echo $permission1;?>" style="width:55px;" /> &nbsp; <input type="text" name="txtPermission2" id="txtPermission2" maxlength="20" value="<?php echo $permission2;?>" style="width:55px;"  /> &nbsp; <input type="text" name="txtPermission3" id="txtPermission3" maxlength="20" value="<?php echo $permission3;?>" style="width:57px;" />&nbsp;&nbsp;<span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <td>Mail Required</td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="radio" name="radMailStatus" id="yes" value="1" <?php if($mailStatus==1){?>checked="checked"<?php }?> />
                            Yes
                            &nbsp;
                            <input type="radio" name="radMailStatus" id="no" value="2" <?php if($mailStatus==2){?>checked="checked"<?php }?> />
                            No 
                            &nbsp;&nbsp;<span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <input type="hidden" name="radFreebees" id="freebeesYes" value="<?php echo $intFreebees;?>" />
                        </tr>
<!--                        <tbody id="dispFreebees">
                        <tr>
                           <td>Portlet File Name</td>
                           <td align="center" valign="middle">:</td>
                           <td><input type="text" name="txtPFileName" id="txtPFileName" maxlength="500" value="<?php //echo $portletFile;?>" style="width:200px;"  /></td>
                        </tr>
                        </tbody>-->
                        <tr>
                          <td>&nbsp;</td>
                          <td align="center" valign="middle">&nbsp;</td>
                          <td>
						  <input type="submit" name="btnSave" id="btnSave" class="btn btn-success" value="<?php echo $strSubmit;?> " onclick="return validator();" />                            
						  <input type="reset" name="btnReset" id="btnReset" class="btn btn-danger" value="<?php echo $strReset;?>" <?php echo $strOnclick;?> />
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
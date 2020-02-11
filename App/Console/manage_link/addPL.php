<?php 
/* ================================================
	File Name         	  : addPL.php
	Description			  : This page is used to Add the Primary Links.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 11th-sept-2013
	Designed By			  :	
    Designed On			  :	
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>
	Style sheet           : style.css                                             
	Javscript Functions   : defaultfocus(),blankFieldValidation(),IsSpecialCharacter()
	Javascript Files	  : jquery.js,bootstrap.min.js,loadscript.js,loadJson.js
	includes			  : addPLInner.php,header.php,leftmenu.php,navigation.php,title.php,util.php,footer.php

	==================================================*/
	require("addPLInner.php");
	
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
	pageHeader="<?php echo $strTab?> Primary Link"
	strFirstLink="Manage Link"
	strLastLink="Primary Link"
	indicate="yes"	
	function validator(){
		
		var locationSel		=$("#selLocation option:selected").length;
			
		if(!DropDownValidation('selGL','Global Link'))
			return false;
							
		if (!blankFieldValidation('PLName', 'Primary Link Name')) 
			return false;
						
		if (!IsSpecialCharacter('PLName', 'Special Character Not Allowed !')) 
			return false;
		
		if (!blankFieldValidation('intSL', 'Serial Number')) 
			return false;
				
		if (!IsSpecialCharacter('intSL', 'Special Character Not Allowed !')) 
			return false;
		
		if(locationSel==0)	
		{
			alert("Please select Location");
			$('#selLocation').focus();
			return false;
		}
		if(!DropDownValidation('selLocation','Location')){
			return false;		
		}		
		if($('#internal').is(':checked'))
		{
			if(!DropDownValidation('selFunc','Function Name'))
				return false;	
		}
		else
		{
			if (!blankFieldValidation('txtLink', 'URL')) 
				return false;
				
			if (!chkURL('txtLink')) 
				return false;	
		}
		
	}
	$(document).ready(function(){
			defaultfocus("selGL");
			txtBoxEffect();
			selectType('<?php echo $numType;?>')
			fillGlink('<?php echo $selGLId;?>');
			<?php if($outMsg!=''){?>
				alert('<?php echo $outMsg;?>');
			<?php }if($errFlag==1){?>
				doCancel('viewPL/<?php echo $glId;?>/<?php echo $plId;?>/<?php echo $pageNo;?>/<?php echo $recNo;?>');
			<?php }if($errFlag=='0'){?>		
				$('form').submit();
			<?php }?>
			
	});
	$(document).keyup(function(){
		defaultBtn(event,validator);
	});
	function selectType(type)
	{
		if(type==1)
		{
			$('#txtLink').hide();
			$('#selFunc').show();
			$('#lblFunc').html('Function Name');
		}
		else if(type==2)
		{
			$('#selFunc').hide();
			$('#txtLink').show();
			$('#lblFunc').html('URL');
		}
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
                        <li class="active"><a href="#"><?php echo $strTab?></a></li>
                        <li><a href="<?php echo $strPath;?>viewPL/<?php echo $glId;?>/<?php echo $plId;?>">View</a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>					 
                    </div>
                    <div id="addTable">
                      <table border="0" cellspacing="0" cellpadding="0">                        
                        <tr>
                          <td>Global Link</td>
                          <td align="center" valign="middle">:</td>
                          <td>
						  <select name="selGL" id="selGL" style="width:207px;">
							<option value="0">--Select--</option>
                          </select>&nbsp;<span class="mandatory">*</span>
						  </td>
                        </tr>
                        <tr>
                          <td>Primary Link </td>
                          <td align="center" valign="middle">:</td>
                          <td>
						  <input type="text" name="PLName" id="PLName" style="width:200px;" maxlength="50" value="<?php echo $strPLName;?>" />&nbsp;<span class="mandatory">*</span>
						  </td>
                        </tr>
                        <tr>
                          <td>Sl. No</td>
                          <td align="center" valign="middle">:</td>
                          <td>
						  <input type="text" name="intSL" id="intSL" style="width:200px;" maxlength="5"  value="<?php echo $maxSL;?>"  onKeyPress="return  isNumberKey(event);" readonly="readonly"/>&nbsp;<span class="mandatory">*</span>
						  </td>
                        </tr>                       
						<tr>
                          <td>Location</td>
                          <td align="center" valign="middle">:</td>
                          <td><select multiple="multiple" size="5" name="selLocation[]" id="selLocation" style="width:207px;">
                            <?php echo $fillLoc;?>
                          </select>
                          &nbsp;<span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <td>Link Type</td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="radio" name="radLinkType" id="internal" value="1" <?php if($numType==1){?>checked="checked"<?php }?> onclick="if(this.checked==true){selectType(1);}"/>
                            Internal
                            &nbsp;
                            <input type="radio" name="radLinkType" id="external" value="2" <?php if($numType==2){?>checked="checked"<?php }?>  onclick="if(this.checked==true){selectType(2);}"/>
                            External</td>
                        </tr> 
						<tr>
                          <td><span id="lblFunc"></span></td>
                          <td align="center" valign="middle">:</td>
                          <td>
							  <select name="selFunc" id="selFunc" style="width:207px;" > 
								<?php echo $fillFunction;?>
							  </select>
							  <input type="text" name="txtLink" id="txtLink" style="display:none; width:200px;" maxlength="100" value="<?php echo ($numType==2)?$strFunc:'';?>"/>&nbsp;<span class="mandatory">*</span>
						  </td>
                        </tr>
                        <tr>
                          <td>Show on Home Page</td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="radio" name="radShow" id="Yes" value="1" <?php if($intShow==1){?>checked="checked"<?php }?>/>
                            Yes
                            &nbsp;
                            <input type="radio" name="radShow" id="No" value="2" <?php if($intShow==2){?>checked="checked"<?php }?> />
                            No</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>
						  <input name="btnSubmit" type="submit" class="btn btn-success" id="btnSubmit" value="<?php echo $strSubmit; ?>" onclick="return validator();" />
                          <input name="button2" type="reset" class="btn btn-danger" id="button2" value="<?php echo $strReset;?>" <?php echo $strOnclick; ?> />
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
<?php 
/* ================================================
	File Name         	  : addGL.php
	Description			  : This page is used to Add the Global Links.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 11th Sept 2013
	Designed By			  :	
    Designed On			  :	
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>
						
	Style sheet           : style.css                                             
	Javscript includes	  : jquery.js,loadscript.js,bootstrap.min.js
	includes			  : addGLInner.php,header.php,leftmenu.php,util.php,footer.php
	==================================================*/
	require("addGLInner.php");
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
	pageHeader="<?php echo $strTab;?> Global Link"
	strFirstLink="Manage Link"
	strLastLink="Global Link"
	indicate="yes"	
	function validator(){	
		
		var locationSel		=$("#selLocation option:selected").length;
		
		if (!blankFieldValidation('txtGLink', 'Global Link Name')) {
			return false;
		}		
		if (!IsSpecialCharacter('txtGLink', 'Special Character Not Allowed !')) {
			return false;
		}
		if (!blankFieldValidation('intSL', 'Serial Number')) {
			return false;
		}		
		if (!IsSpecialCharacter('intSL', 'Special Character Not Allowed !')) {
			return false;
		}
		if(locationSel==0)	
		{
			alert("Please select Location");
			$('#selLocation').focus();
			return false;
		}
		if(!DropDownValidation('selLocation','Location')){
			return false;		
		}		
	}
	$(document).ready(function(){
			defaultfocus("txtGLink");			
			txtBoxEffect();
			<?php if($iconType==2){?> 
			$('.imgIcon').show(); 
			$('.classIcon').hide();
			<?php }else if($iconType==3){?>
			$('.imgIcon').hide(); 
			$('.classIcon').show();
			<?php }else{?>
			$('.imgIcon').hide(); 
			$('.classIcon').hide();
			<?php }?>
			<?php if($outMsg!=''){?>
				alert('<?php echo $outMsg;?>');
			<?php }?>			
			<?php if($errFlag==1){?>
				doCancel('viewGL/<?php echo $glId;?>/<?php echo $plId;?>/<?php echo $pageNo;?>/<?php echo $recNo;?>');
			<?php }if($errFlag=='0'){?>
				$('form').submit();
			<?php }?>
			
	});
	function readImage(input) 
	{
		$('#iconImage').show();
		$('#iconClose').show();
		if (input.files && input.files[0]) {
			var reader = new FileReader();
	
			reader.onload = function (e) {
				$('#iconImage').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	function removeImg()
	{
		$('#fileIcon').val('');
		$('#hdnIconFile').val('');
		$('#iconImage').hide();
		$('#iconClose').hide();
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
                        <li><a href="<?php echo $strPath;?>viewGL/<?php echo $glId;?>/<?php echo $plId;?>" title="View">View</a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>
                    </div>
                    <div id="addTable">
                      <table border="0" cellspacing="0" cellpadding="0">
                        
                        <tr>
                          <td style="width:200px;">Global Link</td>
                          <td align="center" valign="middle">:</td>
                          <td>
						  <input type="text" name="txtGLink" id="txtGLink" value="<?php echo $strGLName;?>" maxlength="50" style="width:200px;" />
						  &nbsp; <span class="mandatory">*</span>						  </td>
                        </tr>
                        <tr>
                          <td>Sl. No</td>
                          <td align="center" valign="middle">:</td>
                          <td>
						  <input type="text" name="intSL" id="intSL"  value="<?php echo $maxSL;?>" maxlength="5" readonly="readonly" style="width:200px;" onKeyPress="return  isNumberKey(event);"/> 
						  &nbsp; <span class="mandatory">*</span>						  </td>
                        </tr>
						<tr>
                          <td>Location</td>
                          <td align="center" valign="middle">:</td>
                          <td><select multiple="multiple" size="5" name="selLocation[]" id="selLocation" style="width:207px;">
                            <?php echo $fillLoc;?>
                          </select>
                           &nbsp;&nbsp;<span class="mandatory">*</span></td>
                        </tr>						
                        <tr>
                          <td>Icon Type </td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="radio" name="radIcon" id="radNoIcon" value="1" <?php if($iconType==1){?>checked="checked"<?php }?> onclick="$('.imgIcon').hide(); $('.classIcon').hide();"/>
No Icon
                            &nbsp;
                            <input type="radio" name="radIcon" id="radImgIcon" value="2" <?php if($iconType==2){?>checked="checked"<?php }?> onclick="$('.imgIcon').show(); $('.classIcon').hide();"/> 
                            &nbsp;
                            Image
                            <input type="radio" name="radIcon" id="radClassIcon" value="3" <?php if($iconType==3){?>checked="checked"<?php }?> onclick="$('.imgIcon').hide(); $('.classIcon').show();"/>
                            Class</td>
                        </tr>
                        <tr class="imgIcon" style="display:none;">
                          <td>Icon (.png/.gif file only. Max 5kb)</td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="file" name="fileIcon" id="fileIcon" style="width:200px;"  onchange="readImage(this);"/>
						  	<input type="hidden" name="hdnIconFile" id="hdnIconFile" value="<?php echo $strIcon;?>" />
							<input type="hidden" name="hdnPreIconFile" id="hdnPreIconFile" value="<?php echo $strIcon;?>" />
                            <img name="iconImage" id="iconImage" style="<?php echo $display;?>" src="<?php echo $strPath.'uploadDocuments/Icons/'.$strIcon;?>" alt="userImage"  width="20" height="20" />							
							<a class="mandatory" id="iconClose" style="<?php echo $display;?>" onclick="removeImg();">X</a>						  </td>
                        </tr>
                        <tr class="classIcon" style="display:none;">
                          <td>Icon Class </td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="text" name="txtIconClass" id="txtIconClass" value="<?php echo $strIconCls;?>" maxlength="100" style="width:200px;" /></td>
                        </tr>
                        <tr>
                          <td>Show on Home Page</td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="radio" name="radShow" id="Yes" value="1" <?php if($intShow==1){?>checked="checked"<?php }?>/>
                            Yes
                            &nbsp;
                            <input type="radio" name="radShow" id="No" value="2" <?php if($intShow==2){?>checked="checked"<?php }?>/>
                            No</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td></td>
                          <td>
						  <input name="btnSubmit" type="submit" class="btn btn-success" id="btnSubmit" value="<?php echo $strSubmit; ?>" onclick="return validator();" />
                          <input name="button2" type="reset" class="btn btn-danger" id="button2" value="<?php echo $strReset;?>" <?php echo $strOnclick; ?> />						  </td>
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
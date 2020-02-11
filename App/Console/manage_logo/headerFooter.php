<?php 
	/* ================================================
	File Name         	  : headerfooter.php
	Description		  : This page is used to Add update Header footer.
	Devloper Name		  : Rasmi Ranjan Swain
	Date Created		  : 01-oct-2013
	Designed By		  : Ramakanta Mishra
	Designed On	          : 15-April-2013
	Update History		  :
	<Updated by>		<Updated On>		<Remarks>
	
	Style sheet           : style.php, bootstrap.css                                             
	Javscript Functions   : jquery.js,loadComponent.js,bootstrap.min.js, validator.js
	includes			  : header.php,leftmenu.php,navigation.php,util.php,footer.php
	
	==================================================*/
	require("headerFooterInner.php");
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
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/validator.js"></script>
<script language="javascript">
	pageHeader="Header and Footer"
	strFirstLink="Manage Theme"
	strLastLink="Header and Footer"	
	indicate="yes"
	function validator()
	{	
		if($('#radoption1').is(':checked'))
			{
				if (!blankFieldValidation('txtCompanyName', 'Company Name')) 
					return false;		
				if (!WhiteSpaceValidation1st('txtCompanyName'))
					return false;		
				if (!IsSpecialCharacter('txtCompanyName', 'Special Character Not Allowed !')) 
					return false;
				if (!blankFieldValidation('txtHeaderText', 'Header Text')) 
					return false;
				if (!WhiteSpaceValidation1st('txtHeaderText'))
					return false;		
				if (!IsSpecialCharacter('txtHeaderText', 'Special Character Not Allowed !')) 
					return false;
				if (!blankFieldValidation('txtFooterText', 'Footer Text')) 
					return false;		
				if (!WhiteSpaceValidation1st('txtFooterText'))
					return false;		
				if (!IsSpecialCharacter('txtFooterText', 'Special Character Not Allowed !')) 
					return false;
				if (!IsSpecialCharacter('txtURL', 'Special Character Not Allowed !')) 
					return false;
				if (!blankFieldValidation('txtURL', 'URL')) 
					return false;		
				if (!WhiteSpaceValidation1st('txtURL'))
					return false;
				if (!chkURL('txtURL'))
					return false;		
			}
		if($('#radoption2').is(':checked'))
		{	
//			if (!WhiteSpaceValidation1st('LoginLogo'))
//				return false;				
//			if(!IsCheckFile('LoginLogo', 'upload a valid filetype','gif,jpeg,jpg,pjpeg,png'))
//				return false;		
//			if (!WhiteSpaceValidation1st('InnerLogo'))
//				return false;				
//			if(!IsCheckFile('InnerLogo', 'upload a valid filetype','gif,jpeg,jpg,pjpeg,png'))
//				return false;
//			if (!WhiteSpaceValidation1st('portalLogo'))
//				return false;			
//			if(!IsCheckFile('portalLogo', 'upload a valid filetype','gif,jpeg,jpg,pjpeg,png'))
//				return false;
//			if (!blankFieldValidation('txtFooterTextImage', 'Footer')) 
//				return false;		
//			if (!WhiteSpaceValidation1st('txtFooterTextImage'))
//				return false;		
//			if (!IsSpecialCharacter('txtFooterTextImage', 'Special Character Not Allowed !')) 
//				return false;
//			if (!IsSpecialCharacter('txtURL', 'Special Character Not Allowed !')) 
//				return false;
//			if (!IsSpecialCharacter('txtURLimage', 'Special Character Not Allowed !')) 
//				return false;
//			if (!blankFieldValidation('txtURLimage', 'URL')) 
//				return false;		
//			if (!WhiteSpaceValidation1st('txtURLimage'))
//				return false;
//			if (!chkURL('txtURLimage'))
//				return false;
		}
	}
	
$(document).ready(function(){
		defaultfocus("txtCompanyName");
		handleBClick('<?php echo $intoption;?>');
		<?php if($outMsg!=''){?>			
			alert('<?php echo $outMsg;?>');
			$('form').submit();
		<?php }?>
});
	function handleBClick(myRadio)
	{
		
		if (myRadio == "1")
			{      
				$("#image").hide();
				 $("#text").show();	        
			}
		 if (myRadio == "2") 
			 {			   
				$("#text").hide();
				 $("#image").show();				
			}  
    }
function readLoginImage(input) {
		$('#loginImage').show();
		if (input.files && input.files[0]) {
			var reader = new FileReader();
	
			reader.onload = function (e) {
				$('#loginImage').attr('src', e.target.result);
			}
	
			reader.readAsDataURL(input.files[0]);
		}
	}
function readInnerImage(input) {
	$('#innerimage').show();
		if (input.files && input.files[0]) {
			var reader = new FileReader();
	
			reader.onload = function (e) {
				$('#innerimage').attr('src', e.target.result);
			}
	
			reader.readAsDataURL(input.files[0]);
		}
	}
function readPortalImage(input) {
	$('#portalimage').show();
		if (input.files && input.files[0]) {
			var reader = new FileReader();
	
			reader.onload = function (e) {
				$('#portalimage').attr('src', e.target.result);
			}
	
			reader.readAsDataURL(input.files[0]);
		}
	}

</script>
</head>
<body>
<form id="frmAdmin" name="frmAdmin" method="post"  enctype="multipart/form-data" >
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
                        <li class="active"><a href="#">Add Header And Footer Text</a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>
                    </div>
                    <div id="addTable">
                      <table border="0">
                        <tr>
                          <td >Select Option</td>
                          <td align="center" valign="middle">:</td>
                          <td ><input type="radio" name="radoption" id="radoption1" value="1" <?php if($intoption==1){;?>checked="checked"<?php }?>  onclick="handleBClick(this.value);"/>
                            Text
                            <input type="radio" name="radoption" id="radoption2" value="2" <?php if($intoption==2){;?>checked="checked"<?php }?>  onclick="handleBClick(this.value);"/>
                            Image </td>
                        </tr>
                      </table>
                    </div>
                    <div id="text">
                      <div id="addTable">
                        <table  border="0">
                          <tr>
                            <td>Company Name</td>
                            <td align="center" valign="middle">:</td>
                            <td ><input type="text" name="txtCompanyName" id="txtCompanyName" value="<?php echo $strcompanyName; ?>" maxlength="100"/>
                              &nbsp;&nbsp;<span class="mandatory">*</span></td>
                          </tr>
                          <tr>
                            <td>Header Text</td>
                            <td align="center" valign="middle">:</td>
                            <td><input type="text" name="txtHeaderText" id="txtHeaderText" value="<?php echo  $strheaderText; ?>" maxlength="100" />
                              &nbsp;&nbsp;<span class="mandatory">*</span></td>
                          </tr>
                          <tr>
                            <td>Footer Text</td>
                            <td align="center" valign="middle">:</td>
                            <td><input type="text" name="txtFooterText" id="txtFooterText" value="<?php  echo ($intoption==1)? $strfooterText:""; ?>" maxlength="100"  />
                              &nbsp;&nbsp;<span class="mandatory">*</span></td>
                          </tr>
                          <tr>
                            <td>URL</td>
                            <td>:</td>
                            <td><input type="text" name="txtURL" id="txtURL" value="<?php echo ($intoption==1)?$strurl:""; ?>" maxlength="100" />
                              &nbsp;&nbsp;<span class="mandatory">*</span></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <div id="image">
                      <div id="addTable">
                        <table  border="0">
                          <tr>
                            <td  >Login Logo</td>
                            <td  align="center" valign="middle">:</td>
                            <td ><input type="file" name="LoginLogo" id="LoginLogo" onchange="readLoginImage(this);" maxlength="50" style="width:238px;"/>
                              <input type="hidden" name="hdLoginLogo" id="hdLoginLogo" value="<?php echo $strloginLogo;?>"/>
							  <input type="hidden" name="hdPreLoginLogo" id="hdPreLoginLogo" value="<?php echo $strloginLogo;?>"/>  
							</td>
                            <td><img name="loginImage" id="loginImage" style="<?php echo $loginDisp;?>"  src="<?php echo $strPath.'uploadDocuments/Logo/login_logo/'.$strloginLogo;?>" alt="loginImage"  width="75" height="30"  /><span > Accepted file types are .bmp,.jpg,.jpeg .</span></td>
                          </tr>
                          <tr>
                            <td>Inner Logo</td>
                            <td align="center" valign="middle">:</td>
                            <td><input type="file" name="InnerLogo" id="InnerLogo" onchange="readInnerImage(this);" maxlength="50" style="width:238px;" />
                              <input type="hidden" name="hdInnerLogo" id="hdInnerLogo" value="<?php echo $strinnerLogo;?>"/>
							  <input type="hidden" name="hdPreInnerLogo" id="hdPreInnerLogo" value="<?php echo $strinnerLogo;?>"/>
							  </td>
                            <td><img name="innerimage" id="innerimage" style="<?php echo $InnerDisp;?>"    src="<?php echo ($strinnerLogo!='')? $strPath.'uploadDocuments/Logo/Inner_logo/'.$strinnerLogo : $strPath.'images/image_missing.png';?>" alt="userImage"  width="75" height="30" /> <span >Accepted file types are .bmp,.jpg,.jpeg .</span></td>
                          </tr>
                          <tr>
                            <td>Portal Logo</td>
                            <td align="center" valign="middle">:</td>
                            <td><input type="file" name="portalLogo" id="portalLogo" onchange="readPortalImage(this);" maxlength="50" style="width:238px;" />
                              <input type="hidden" name="hdportalLogo" id="hdportalLogo" value="<?php echo $strportalLogo;?>"/>
							  <input type="hidden" name="hdPreportalLogo" id="hdPreportalLogo" value="<?php echo $strportalLogo;?>"/>
							  </td>
                            <td><img id="portalimage" style="<?php echo $PortalDisp;?>"    src="<?php echo( $strportalLogo!='')?$strPath.'uploadDocuments/Logo/portal_logo/'.$strportalLogo : $strPath.'images/image_missing.png';?>" alt="portalimage"  width="75" height="20"  /><span > Accepted file types are .bmp,.jpg,.jpeg .</span></td>
                          </tr>
                          <tr>
                            <td>Footer Text</td>
                            <td align="center" valign="middle">:</td>
                            <td><input type="text" name="txtFooterTextImage" id="txtFooterTextImage"  value="<?php echo ($intoption==2)? $strfooterText:"";?>" maxlength="100" style="width:238px;"/>
                              &nbsp;&nbsp;<span class="mandatory">*</span></td>
                          </tr>
                          <tr>
                            <td>URL</td>
                            <td align="center" valign="middle">:</td>
                            <td><input type="text" name="txtURLimage" id="txtURLimage" value="<?php echo ($intoption==2)? $strurl:"";?>"  maxlength="100" style="width:238px;" />
                              &nbsp;&nbsp;<span class="mandatory">*</span></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <div>
                      <div id="addTable">
                        <table  border="0">
                          <tr>
                            <td colspan="2">&nbsp;</td>
                            <td><input name="btnSubmit" type="submit" class="btn btn-success" id="btnSubmit" value="<?php echo $strSubmit; ?>" onclick="return validator();" />
                              <input name="btnReset" type="reset" class="btn btn-danger" id="btnReset" value="<?php echo $strReset;?>" <?php echo $strOnclick; ?> /></td>
                          </tr>
                        </table>
                      </div>
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
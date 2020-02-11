<?php
	/* ================================================
	File Name         	  : addDesignation.php
	Description			  : This page is used to Add Designation.
	Devloper Name		  : Rasmi Ranjan Swain
	Date Created		  : 17-sep-2013
	Designed By			  :	Ramakanta Mishra
	Designed On			  :	15-April-2013
	Update History		  :
	<Updated by>		<Updated On>		<Remarks>
	
	Style sheet           : style.php, bootstrap.css                                             
	Javscript Functions   : jquery.js,loadComponent.js,bootstrap.min.js, validator.js
	includes			  : header.php,leftmenu.php,navigation.php,util.php,footer.php
	
	==================================================*/
	require("addDesignationInner.php");
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
	pageHeader="<?php echo $strTab?> Designation"
	strFirstLink="Manage User"
	strLastLink="Designation"
	indicate="yes"
	function validator()
	{
		if(!DropDownValidation('selLocation','Location'))
				return false;
		if (!blankFieldValidation('txtDesgName', 'Designation Name')) 
				return false;		
		if (!WhiteSpaceValidation1st('txtDesgName'))
			return false;
		
		if (!IsSpecialCharacter('txtDesgName', 'Special Character Not Allowed !')) 
			return false;	
		if (!blankFieldValidation('txtAliasName', 'Alias Name')) 
			return false;		
		if (!WhiteSpaceValidation1st('txtAliasName'))
			return false;
		
		if (!IsSpecialCharacter('txtAliasName', 'Special Character Not Allowed !')) 
			return false;
	}
	$(document).ready(function(){
		defaultfocus("selLocation");
		<?php if($outMsg!='' && isset($_REQUEST['btnSubmit'])){?>
			alert('<?php echo $outMsg;?>');
			<?php }if($errFlag==1 && $intID!=0){?>				
				doCancel('viewDesignation/<?php echo $glId;?>/<?php echo $plId;?>/<?php echo $pageNo;?>/<?php echo $recNo;?>');
			<?php }?>
	});
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
                <td valign="top"><div id="ContArea">
                    <?php include('../includes/title.php'); ?>
                    <div class="MyTab">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#"><?php echo $strTab?></a></li>
                        <li><a href="<?php echo $strPath;?>viewDesignation/<?php echo $glId;?>/<?php echo $plId;?>">View</a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>
                    </div>
                    <div id="addTable">
                      <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>Location</td>
                          <td align="center" valign="middle">:</td>
                          <td><select name="selLocation[]" id="selLocation" style="width:207px;" multiple="multiple">
                               <?php echo $fillLoc;?>
                          </select>&nbsp;<span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <td>Designation Name</td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="text" name="txtDesgName" id="txtDesgName" style="width:200px;" maxlength="50"  value="<?php echo $strDesgName ?>" />&nbsp;<span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <td>Alias Name</td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="text" name="txtAliasName" id="txtAliasName" style="width:200px;" maxlength="50"  value="<?php echo $straliasName ?>" />&nbsp;<span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <td>Designation Rank</td>
                          <td align="center" valign="middle">:</td>
                          <td><input type="number" name="txtRankName" id="txtRankName" style="width:200px;" maxlength="50"  value="<?php echo $strRankName ?>" />&nbsp;<span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <td>Type</td>
                          <td align="center" valign="middle">:</td>
                          <td><input name="radType" id="radType" type="radio" value="1" <?php if($numType==1){?>checked="checked"<?php }?> />
                            Permanent
                            <input name="radType" id="radType" type="radio" value="2" <?php if($numType==2){?>checked="checked"<?php }?> />
                            Temporary</td>
                        </tr>
                        
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><input name="btnSubmit" type="submit" class="btn btn-success" id="btnSubmit" value="<?php echo $strSubmit; ?>" onclick="return validator();" />
                            <input name="btnReset" type="reset" class="btn btn-danger" id="btnReset" <?php echo $strReset;?> <?php echo $strOnclick; ?> />
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
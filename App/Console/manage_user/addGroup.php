<?php 
	/* ================================================
	File Name         	  : addGroup.php
	Description			  : This page is used to Add Group.
	Devloper Name		  : Rasmi Ranjan Swain
	Date Created		  : 04-Nov-2013	
	Update History		  :
	<Updated by>		<Updated On>		<Remarks>
	
	Style sheet           :  bootstrap.css                                             
	Javscript Functions   : jquery.js,loadComponent.js,bootstrap.min.js, validator.js
	includes			  : header.php,leftmenu.php,navigation.php,util.php,footer.php,incStylesheet.php
	
	==================================================*/
	require("addGroupInner.php");
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
	pageHeader="<?php echo $strTab;?> Group"
	strFirstLink="Manage User"
	strLastLink="Group Master"	
	indicate="yes"
	function validator()
	{
		
		if (!blankFieldValidation('txtGroupName', 'Group Name')) 
			return false;		
		if (!IsSpecialCharacter('txtGroupName', 'Special Character Not Allowed !')) 
			return false;		
		if (!IsSpecialCharacter('txtGroupAliasName', 'Special Character Not Allowed !')) 
			return false;
		if (!IsSpecialCharacter('txtDescription', 'Special Character Not Allowed !'))
			return false;
		if(!MaxlengthValidation('txtDescription','Description',500))
			return false;
	}
	$(document).ready(function(){
			defaultfocus("txtGroupName");
			TextCounter('txtDescription','lblChar',500);
			<?php if($outMsg!='' && isset($_REQUEST['btnSubmit'])){?>
				alert('<?php echo $outMsg;?>');
			<?php }if($errFlag==1) {?>				
				doCancel('viewGroup/<?php echo $glId;?>/<?php echo $plId;?>/<?php echo $pageNo;?>/<?php echo $recNo;?>');
			<?php }?>
	});
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
                        <li class="active"><a href="#"><?php echo $strTab; ?></a></li>
                        <li><a href="<?php echo $strPath;?>viewGroup/<?php echo $glId;?>/<?php echo $plId;?>">View</a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>
                    </div>
                    <div id="addTable">
                      <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>Group Name</td>
                          <td><input type="text" name="txtGroupName" id="txtGroupName" style="width:200px;"  value="<?php echo $strGroupName?>" maxlength="50" />
                            &nbsp;<span class="mandatory">*</span></td>
                        </tr>   
                        <tr>
                          <td>Alias Name</td>
                          <td><input type="text" name="txtGroupAliasName" id="txtGroupAliasName" style="width:200px;"  value="<?php echo $strGroupAliasName?>" maxlength="20" />
                            </td>
                        </tr>
                        <tr>
                          <td valign="top">Description</td>
                          <td><textarea name="txtDescription" id="txtDescription" rows="3" cols="20" style="width:200px;"   onkeyup="blockspecialchar_first(this);return TextCounter('txtDescription','lblChar',500)"><?php echo $strdescription ?></textarea>
                            &nbsp; Maximum <span id="lblChar"></span> &nbsp;characters</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>
                          	<input name="btnSubmit" type="submit" class="btn btn-success" id="btnSubmit" value="<?php echo $strSubmit; ?>" onclick="return validator();" />
                            <input name="btnReset" type="reset" class="btn btn-danger" id="btnReset" <?php echo $strReset;?> <?php echo $strOnclick; ?> /></td>
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
<?php 
/* ================================================
	File Name         	  :	loginLogo.php
	Description			  : This page is used to Add update Logo.
	Devloper Name		  : Rasmi Ranjan Swain
	Date Created		  : 01-oct-2013
	Designed By			  :	Ramakanta Mishra
	Designed On			  :	15-April-2013
	Update History		  :
	<Updated by>		<Updated On>		<Remarks>
	
	Style sheet           : style.php, bootstrap.css                                             
	Javscript Functions   : jquery.js,loadComponent.js,bootstrap.min.js, validator.js
	includes			  : header.php,leftmenu.php,navigation.php,util.php,footer.php
	
	==================================================*/
	require("loginLogoInner.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $strTitle;?></title>
<link href="<?php echo $strPath;?>styles/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo $strPath;?>styles/style.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/loadscript.js"></script>
<script language="javascript">
	pageHeader="Login Logo"
	strFirstLink="Manage Logo"
	strLastLink="Login Logo"
	indicate=""	
	//start TO preview uploaded file
	
	oFReader = new FileReader(), rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;
	oFReader.onload = function (oFREvent) {
  document.getElementById("uploadPreview").src = oFREvent.target.result;
};
function loadImageFile() {
  if (document.getElementById("fileField").files.length === 0) { return; }
  var oFile = document.getElementById("fileField").files[0];
  if (!rFilter.test(oFile.type)) { alert("You must select a valid image file!"); return; }
  oFReader.readAsDataURL(oFile);
}
	//end 
	
$(function(){
    Test = {
        UpdatePreview: function(obj){
          // if IE < 10 doesn't support FileReader
          if(!window.FileReader){
             // don't know how to proceed to assign src to image tag
          } else {
             var reader = new FileReader();
             var target = null;
             
             reader.onload = function(e) {
              target =  e.target || e.srcElement;
               $("uploadPreview").prop("src", target.result);
             };
              reader.readAsDataURL(obj.files[0]);
          }
        }
    };
});
</script>
</head>
<body>
<form method="post" enctype="multipart/form-data" name="frmAdmin" id="frmAdmin">
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
                      </ul>
                    </div>
<div id="addTable">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="2">Add your logo in the size specified.The position of the logo would be at the left hand corner of the page </th>
    </tr>
  <tr>
    <td width="150">Upload Home Page Logo</td>
    <td><label>
      <input type="file" name="fileField" id="fileField"  style="width:200px;" onchange="loadImageFile();"/>
    </label></td>
    <td  align="right"><img id="uploadPreview" style="width: 100px; height: 100px;" src="" /></td>
  </tr>
  <tr>
    <td>Upload Inner Page Logo</td>
    <td><input type="file" name="fileField2" id="fileField2" style="width:200px;" onchange='Test.UpdatePreview(this)'/></td>
    <td  align="right"><img id="uploadPreview" style="width: 100px; height: 100px;" src="" /></td>
  </tr>
  <tr>
    <td>Upload Portal Logo</td>
    <td><input type="file" name="fileField3" id="fileField3" style="width:200px;" onchange='Test.UpdatePreview(this)' /></td>
    <td  align="right"><img id="uploadPreview" style="width: 100px; height: 100px;" src="" /></td>
  </tr>
  <tr>
    <td>Your Company Name</td>
    <td><input type="text" name="intSL3" id="intSL3" style="width:200px;"  value="" /></td>
  </tr>
  <tr>
    <td valign="top"><span id="TabContainer1_TabNew_HierarchyForAllLocation2_Labels3">Preview</span> </td>
    <td><img src="<?php echo $strPath;?>images/Theme/CSM-logo2.gif" width="150" height="56" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="btnSubmit" type="submit" class="btn btn-success" id="button" value="Show" /></td>
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
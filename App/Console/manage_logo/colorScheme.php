<?php 
/* ================================================
	File Name         	  :	colorScheme.php
	Description			  : This page is used to Add update Theme.
	Devloper Name		  : Rasmi Ranjan Swain
	Date Created		  : 07-oct-2013	
	Update History		  :
	<Updated by>		<Updated On>		<Remarks>
	
	Style sheet           : style.php, bootstrap.css
	Javscript Functions   : jquery.js,loadComponent.js,bootstrap.min.js, validator.js
	includes			  : header.php,leftmenu.php,navigation.php,util.php,footer.php
	
	==================================================*/
	require("colorSchemeInner.php");
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
	pageHeader="Theme Master"
	strFirstLink="Manage Theme"
	strLastLink="Theme Master"
	
	$(document).ready(function(){							  
		var value ="<?php echo $strthemeName?>";	
		changeTheme(value);
		<?php if($outMsg!=''){?>			
			alert('<?php echo $outMsg;?>');
			$('form').submit();
		<?php }?>
 		
	}); 
	
	// function to change theme
	function changeTheme(value)
		{
			var bgColor = new Array('#0080b0','#9a0000','#008c09','#797979','#d9c301','#393939');
			for(var i=1; i<=6; i++)
			{
				if(value==i)
				{
					$(".bgColor").css("background-color",bgColor[Number(i)-1]);
					$("#hdndefault").val(i);
					
				}
			}
		}	
</script>
</head>
<body>
<form id="frmAdmin" name="frmAdmin" method="post">
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
                    <div class="ch_color">
                      <ul>
                        <li><a href="javascript:void(0);" class="default" id="defaultTheme" name="defaultTheme" onclick="changeTheme(1);"></a></li>
                        <li><a href="javascript:void(0);" class="red" id="redTheme" name="redTheme" onclick="changeTheme(2);"></a></li>
                        <li><a href="javascript:void(0);" class="green" id="greenTheme" name="greenTheme" onclick="changeTheme(3);"></a></li>
                        <li><a href="javascript:void(0);" class="white" id="grayTheme" name="grayTheme" onclick="changeTheme(4);"></a></li>
                        <li><a href="javascript:void(0);" class="yellow" id="yellowTheme" name="yellowTheme" onclick="changeTheme(5);"></a></li>
                        <li><a href="javascript:void(0);" class="black" id="blackTheme" name="blackTheme" onclick="changeTheme(6);"></a></li>
                      </ul>
                    </div>
                    <div class="clear"></div>
                    <div class="theme">
                      <div id="default">
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="30" colspan="2" id="tdTheme1" class="bgColor"><span id="themeHeader"></span></td>
                            <td width="2px" rowspan="3" id="tdTheme2" class="bgColor"></td>
                          </tr>
                          <tr>
                            <td width="110" height="200" id="tdTheme3" class="bgColor">&nbsp;</td>
                            <td align="center"><h2 style="color:#ddd; font-size:20px;">Welcome Administrator</h2></td>
                          </tr>
                          <tr>
                            <td id="tdTheme4" height="10" colspan="2"  class="bgColor" style="color:#fff; padding:5px;"><span id="themeFooter"></span></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <div class="clear"></div>
                    <div style="margin:0px 0px 10px 10px;">
                      <input name="btnSubmit" type="submit" class="btn btn-success" id="btnSubmit" value="<?php echo $strSubmit; ?>"  />
                    </div>
                    <input type="hidden" id="hdndefault" name="hdndefault"/>
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
<?php 
	require("welcomeInner.php");
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
	pageHeader="Create Function Name"
	strFirstLink="Console"
	strLastLink="Welcome"
</script>
</head>
<body>
    <div id="mainTable">
    <!-- Header Area-->
    <?php include("../includes/header.php")?>
    <!-- Header Area-->
     
      <!-- Login Area-->
<div id="MidTab">
          		<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td id="LeftMenu" valign="top"><?php include("../includes/leftmenu.php"); ?>
                    	
                    </td>
                    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><?php include("../includes/navigation.php")?></td>
                      </tr>
                      <tr>
                        <td height="480" valign="top"><h1>WELCOME ADMINISTRATOR</h1></td>
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
</body>
</html>
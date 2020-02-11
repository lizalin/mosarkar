<?php 
/* ================================================
	File Name         	  : incStylesheet.php
	Description			  : This page is used to Add update theme.	
	Created By			  :	Rasmi Ranjan Swain
    Created On			  :	17-oct-2013
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>									
	
	includes			  : manageTheme_class.php
	==================================================*/
	include("../class_file/portalThemeClass.php");
	$objThemeportal			= new themeportalClass;
	$readVal				= $objThemeportal->readportalTheme();
	$strthemeName			= $readVal['themeNmae'];
	$strfileName			= $readVal['fileName'];
	
	
	if($strthemeName=="2"){?>
	<link href="<?php echo $strPath;?>styles/style_Red.css" rel="stylesheet" type="text/css">
	<?php }
	else if($strthemeName=="3"){?>
	<link href="<?php echo $strPath;?>styles/style_Green.css" rel="stylesheet" type="text/css">
	<?php }
	
	else if($strthemeName=="4"){?>
	<link href="<?php echo $strPath;?>styles/style_Gray.css" rel="stylesheet" type="text/css">
	<?php }
	else if($strthemeName=="5"){?>
	<link href="<?php echo $strPath;?>styles/style_Yellow.css" rel="stylesheet" type="text/css">
	<?php }
	else if($strthemeName=="6"){?>
	<link href="<?php echo $strPath;?>styles/style_Black.css" rel="stylesheet" type="text/css">
	<?php }
	else { ?>
	<link href="<?php echo $strPath;?>styles/style.css" rel="stylesheet" type="text/css">
<?php }?>
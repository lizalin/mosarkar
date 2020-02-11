<?php
/*============================================================
Page Name		:	manageTheme_class.php
Description		:	Manage Logo,Theme,Header footer
Created By		:	RAsmi Ranjan Swain
Created On		:	01/10/2013
Update History	:
<Updated by>		<Updated On>		<Remarks>

Functions Used	:	connectToDatabase();closeConnection();
==============================================================*/
if(file_exists('../config.php'))
{
	include('../config.php');
}
class themeportalClass extends commonClass
{
	//common function to manage theme
	public function manageportalTheme($action,$themeId,$themeName,$themeFile,$updatedBy)
	{
		$path	= commonClass::webPath();
		commonClass::isSpclChar($action,$path.'home');
		commonClass::isSpclChar($themeId,$path.'home');
		commonClass::isSpclChar($themeName,$path.'home');
		commonClass::isSpclChar($themeFile,$path.'home');
		commonClass::isSpclChar($updatedBy,$path.'home');
		$themeSql="CALL USP_THEME_MASTER('$action','$themeId','$themeName','$themeFile','$updatedBy',@out);";
		$themeResult	= commonClass::ExecuteQuery($themeSql);
		return $themeResult;
	}
	// function to read theme
	public function readportalTheme()
	{
		$result	= $this->manageportalTheme('R',1,'','',0);
		if(commonClass::NumRow($result)>0)
		{
			$row			= mysqli_fetch_array($result);
			$strthemeName	= $row['VCH_THEME_NAME'];
			$strfileName	= $row['VCH_THEME_NAME'];
		}
		$arrResult		=array('themeNmae'=>$strthemeName,'fileName'=>$strfileName);
		return $arrResult;
	}
}
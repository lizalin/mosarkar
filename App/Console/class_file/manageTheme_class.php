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
	include('../config.php');

//=================Class to manage Header Footer
class themeClass extends commonClass
{
	//common function for header footer
	public function manageHeaderFooter($action,$headerId,$option,$headerText,$footerText,$url,$companyName,$loginLogo,$innerLogo,$portalLogo,$updatedBy)
	{
		$path	= commonClass::webPath();
		commonClass::isSpclChar($action,$path.'home');
		commonClass::isSpclChar($headerId,$path.'home');
		commonClass::isSpclChar($headerText,$path.'home');
		commonClass::isSpclChar($footerText,$path.'home');
                commonClass::isSpclChar($companyName,$path.'home');
                 commonClass::isSpclChar($companyName,$path.'home');
		commonClass::isSpclChar($updatedBy,$path.'home');
                
                $headerId         = htmlspecialchars($headerId, ENT_QUOTES);
                $headerText       = htmlspecialchars($headerText, ENT_QUOTES);
                $footerText       = htmlspecialchars($footerText, ENT_QUOTES);
                $companyName       = htmlspecialchars($companyName, ENT_QUOTES);
                
		$headerSql		= "CALL USP_ADMIN_HEADER_FOOTER('$action','$headerId','$option','$headerText','$footerText','$url','$companyName','$loginLogo','$innerLogo','$portalLogo','$updatedBy',@out);";		
                //echo $headerSql;
		$headerResult	= commonClass::ExecuteQuery($headerSql);
		return $headerResult;
	}
	
	// function to add update header footer
	public function addUpdateHeader()
	{
		$resultview			= $this->manageHeaderFooter('V',0,0,'','','','','','','',0);
		$id					= commonClass::NumRow($resultview)>0?1:0;	
		$folderPath			= "../uploadDocuments/Logo/Inner_logo/";
		$folderPath1		= "../uploadDocuments/Logo/login_logo/";
		$folderPath2		= "../uploadDocuments/Logo/portal_logo/";
		$userId				= $_SESSION['adminConsole_userID'];
		$numOption			= $_POST['radoption'];
		$txtCompanyName		= $_POST['txtCompanyName'];
		$txtHeaderText		= $_POST['txtHeaderText'];
		$txtfooterText		= $_POST['txtFooterText'];
		$txtUrl			= $_POST['txtURL'];
		$txtLoginLogo		= $_FILES['LoginLogo']['name'];
		$loginTemp		= $_FILES['LoginLogo']['tmp_name'];
                $loginLogoType          = $_FILES['LoginLogo']['type'];
		$prevLoginLogo		= $_POST['hdLoginLogo'];
		$loginLogoPrev		= $_POST['hdPreLoginLogo'];
		$loginLogoName		= ($txtLoginLogo!='')?"LOGO_".rand(1,9).time().".".pathinfo($txtLoginLogo, PATHINFO_EXTENSION):$prevLoginLogo;
		$txtInnerLogo		= $_FILES['InnerLogo']['name'];
		$innerTemp			= $_FILES['InnerLogo']['tmp_name'];
                $innerLogoType          = $_FILES['InnerLogo']['type'];
		$prevInnerLogo		= $_POST['hdInnerLogo'];
		$innerLogoPrev		= $_POST['hdPreInnerLogo'];
		$innerLogoName		= ($txtInnerLogo!='')?"ILOGO_".rand(1,9).time().".".pathinfo($txtInnerLogo, PATHINFO_EXTENSION):$prevInnerLogo;
		$txtportalLogo		= $_FILES['portalLogo']['name'];
		$portalTemp             = $_FILES['portalLogo']['tmp_name'];
                $portalLogoType         = $_FILES['portalLogo']['type'];
		$prevportalLogo		= $_POST['hdportalLogo'];
		$portalLogoPrev		= $_POST['hdPreportalLogo'];
		$portalLogoName		= ($txtportalLogo!='')?"PLOGO_".rand(1,9).time().".".pathinfo($txtportalLogo, PATHINFO_EXTENSION):$prevportalLogo;
		
		$txtfooterTextImage	= $_POST['txtFooterTextImage'];
		$txtUrlImage		= $_POST['txtURLimage'];
		$outMsg				= '';
		$flag				= ($id!=0)?1:0;
		$action				= ($id==0)?'A':'U';	
		if($numOption==1)
		{
			$txtLoginLogo	= '';
			$prevLoginLogo	= '';
			$txtInnerLogo	= '';
			$prevInnerLogo	= '';
			$txtportalLogo	= '';
			$prevportalLogo	= '';
			
			$result				= $this->manageHeaderFooter($action,$id,$numOption,$txtHeaderText,$txtfooterText,$txtUrl,$txtCompanyName,'','','', $userId);		
		}
		if($numOption==2)
			$result				= $this->manageHeaderFooter($action,$id,$numOption,'',$txtfooterTextImage,$txtUrlImage,'',$loginLogoName,$innerLogoName,$portalLogoName,$userId);	
		if($result)				
			$outMsg			= ($action=='A')?'Header Footer added successfully':'Header Footer updated successfully';
			
		$validFileAry = array('image/jpg','image/gif','image/jpeg','image/png','image/pjpeg','image/x-png');
                //echo $loginLogoType;exit;
		if($txtLoginLogo!='')
		{
			if($loginLogoPrev!='' && file_exists($folderPath1.$loginLogoPrev))
				unlink($folderPath1.$loginLogoPrev);
                        if((getimagesize($loginTemp)!== false) && in_array($loginLogoType, $validFileAry) ){
                            move_uploaded_file($loginTemp,$folderPath1.$loginLogoName);
                        }else{
                            $outMsg			= 'Invalid image type. Accepted .jpg,.png & .gif only';
                        }
		}
		if($txtLoginLogo=='' && $prevLoginLogo=='')
		{
			if(file_exists($folderPath1.$loginLogoPrev))
				unlink($folderPath1.$loginLogoPrev);
		}
		//===============
		if($txtInnerLogo!='')
		{
			if($innerLogoPrev!='' && file_exists($folderPath.$innerLogoPrev))
				unlink($folderPath.$innerLogoPrev);
                        if((getimagesize($innerTemp)!== false) && in_array($innerLogoType, $validFileAry) ){
                           move_uploaded_file($innerTemp,$folderPath.$innerLogoName);
                        }else{
                            $outMsg			= 'Invalid image type. Accepted .jpg,.png & .gif only';
                        }
			
		}
		if($txtInnerLogo=='' && $prevInnerLogo=='')
		{
			if(file_exists($folderPath.$innerLogoPrev))
				unlink($folderPath.$innerLogoPrev);
		}
		//===============
		if($txtportalLogo!='')
		{
			if($portalLogoPrev!='' && file_exists($folderPath2.$portalLogoPrev))
				unlink($folderPath2.$portalLogoPrev);
                        if((getimagesize($portalTemp)!== false) && in_array($portalLogoType, $validFileAry) ){
                           move_uploaded_file($portalTemp,$folderPath2.$portalLogoName);
                        }else{
                            $outMsg			= 'Invalid image type. Accepted .jpg,.png & .gif only';
                        }
			
		}
		if($txtportalLogo=='' && $prevportalLogo=='')
		{
			if(file_exists($folderPath2.$portalLogoPrev))
				unlink($folderPath2.$portalLogoPrev);
		}
		$arrResult			= array('msg'=>$outMsg);
		return $arrResult;			
	}
	
	// function to read header footer
	public function readHeaderFooter() 
	{			
		$result	= $this->manageHeaderFooter('R',1,0,'','','','','','','',0);
		if(commonClass::NumRow($result)>0)
		{
			$row			= mysqli_fetch_array($result);
			$strheaderText	= htmlspecialchars_decode($row['VCH_HEADER_TEXT']);
			$strfooterText	= htmlspecialchars_decode($row['VCH_FOOTER_TEXT']);
			$strUrl			= $row['VCH_URL'];
			$strCompanyName	= htmlspecialchars_decode($row['VCH_COMPANY_NAME']);
			$strloginLogo	= $row['VCH_LOGIN_LOGO'];
			$strInnerLogo	= $row['VCH_INNER_LOGO'];
			$strPortalLogo	= $row['VCH_PORTAL_LOGO'];
			$intoption		= $row['INT_OPTION'];
			
		}
		$arrResult		=array('headerText'=>$strheaderText,'footerText'=>$strfooterText,'url'=>$strUrl,'companyName'=>$strCompanyName,'loginLogo'=>$strloginLogo,'innerLogo'=>$strInnerLogo,'portalLogo'=>$strPortalLogo,'option'=>$intoption);
		return $arrResult;
	}
	
	//common function to manage theme
	public function manageTheme($action,$themeId,$themeName,$themeFile,$updatedBy)
	{
		$path			= commonClass::webPath();
		commonClass::isSpclChar($action,$path.'home');
		commonClass::isSpclChar($themeId,$path.'home');
		commonClass::isSpclChar($themeName,$path.'home');
		commonClass::isSpclChar($themeFile,$path.'home');
		commonClass::isSpclChar($updatedBy,$path.'home');
		$themeSql		= "CALL USP_THEME_MASTER('$action','$themeId','$themeName','$themeFile','$updatedBy',@out);";
		$themeResult	= commonClass::ExecuteQuery($themeSql);
			return $themeResult;
	}
	
	// function to add update theme
	public function addUpdateTheme()
	{
		$resultview			= $this->manageTheme('V',0,'','',0);
		$id					= commonClass::NumRow($resultview)>0?1:0;
		$userId				= $_SESSION['adminConsole_userID'];
		$themeName			= $_POST['hdndefault'];
		$outMsg				= '';
		$flag				= ($id!=0)?1:0;
		$action				= ($id==0)?'A':'U';	
		$result				= $this->manageTheme($action,$id,$themeName,'',$userId);
		if($result)				
			$outMsg			= ($action=='A')?'Theme added successfully':'Theme updated successfully';
		$arrResult			= array('msg'=>$outMsg);
		return $arrResult;
	}
	
	// function to read theme
	public function readTheme()
	{
		$result	= $this->manageTheme('R',1,'','',0);
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

?>



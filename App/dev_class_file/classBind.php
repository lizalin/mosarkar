<?php 
/*============================================================
Page Name		:	classBind.php
Description		:	Class for managing classes
Created By		:	Rasmi Ranjan Swain
Created On		:	05-Jan-2015
Update History	:
<Updated by>		<Updated On>		<Remarks>

includes		: commonClass,manageLink_class,manageTheme_class
==============================================================*/
	include("../console/config.php");
	if(!class_exists('commonClass'))
		require(ABSPATH."\class_file\Common_class_inc.php");
	if(!class_exists('linkClass'))
		include(ABSPATH."\class_file\manageLink_class.php");
	include (ABSPATH."\class_file\manageTheme_class.php");
	include (ABSPATH."\class_file\setPermission_class.php");
	
	//Class to manage Gl in user Portal
	class portalGl extends linkClass
	{
		
		//function to show GL in user portal
		public function viewGL()
		{
			$userID		= $_GET['UID'];
			$GL			= $_GET['GL'];
			$PL			= $_GET['PL'];
			$obj		= new commonClass;
			$strPath 	= $obj->webpath();
			$adminConsole_Privilege = $_SESSION['adminConsole_Privilege'];
			$adminConsole_Emp_Type  = $_SESSION['adminConsole_Emp_Type'];
			$dashboardActive		= ($GL==0 && $PL==0)?"active":"";
			$menuContent	='<li id="dashboard" class="'.$dashboardActive.'" > <a href="javascript:void(0);" onClick="goToPage(\''. APP_PATH.'/dashboard\',0,0,&quot;Dashboard&quot;,&quot;&quot;)" title="Dashboard"> <i class="menu-icon fa fa-tachometer"></i> <span class="menu-text"> Dashboard </span> </a> <b class="arrow"></b> </li>';
			if($adminConsole_Privilege ==0 || $adminConsole_Privilege ==1)
			{				
				$arrList	= array(); 
				$permissionResult = linkClass::manageGL('S',0,0,0,0, 0,0,0);
				if(mysqli_num_rows($permissionResult)>0)
				{
					
					while($perRow	= mysqli_fetch_array($permissionResult))
					{
						$GL_Menu			= '';						
						$display			= '';
						$int_GL_Id		    = $perRow["INT_GL_ID"];						
						$str_Gl_Name		= $perRow["VCH_GL_NAME"];
						$str_icon			= $perRow["VCH_ICON_NAME"];	
						$str_icon_class		= $perRow["VCH_ICON_CLASS"];
						$icon				= '';
						if($str_icon!='')
						{
							$icon	= '<img src="'.APP_PATH.'/Console/uploadDocuments/Icons/'.$str_icon.'" width="25" height="16" style="padding:0px 5px; margin-bottom:3px;"/>';
						}
						else if($str_icon_class!='')
						{
							$icon	= '<i class="'.$str_icon_class.'"></i>';
						}
						$active_GL			= ($int_GL_Id==$GL)?'active':'';					
						$plResult			= linkClass::managePL('S',0,0,$int_GL_Id,0,0,0, 0, 0,1,0);
						$plCtr				= 0;
						if(mysqli_num_rows($plResult)>0)
							$plCtr	= 1;							
						
						$menuContent 	.='<li class="hsub '.$active_GL.'"> <a href="javascript:void(0);" class="dropdown-toggle" title="'.$str_Gl_Name.'">'.$icon.'<span class="menu-text">'. $str_Gl_Name .'</span> <b class="arrow fa fa-angle-down"></b></a> <b class="arrow"></b>';										
						if($plCtr>0)
						{
							$menuContent 	.= '<ul class="submenu">';
							while($plRowvalue=mysqli_fetch_array($plResult))
							{
								$href_Pl			= '';
								$PL_Menu			= '';
								$active_Pl			= '';
								$PL_id				= $plRowvalue['INT_PL_ID'];
								$PL_Name			= $plRowvalue['VCH_PL_NAME'];
								$pl_function_Name	= $plRowvalue['FUNCTION_NAME'];
								$href_Pl			= APP_PATH.'/'.$pl_function_Name;								
								if($PL==$PL_id )
								{
									$active_Pl	= "active";
								}								
								$menuContent .='<li class="'.$active_Pl.'"><a href="javascript:void(0);" onClick="goToPage(\''. $href_Pl.'\','.$int_GL_Id.','.$PL_id.',&quot;'.$str_Gl_Name.'&quot;,&quot;'.$PL_Name.'&quot;)" title="'.$PL_Name.'"><i class="menu-icon fa fa-caret-right"></i> '.$PL_Name.'</a> <b class="arrow"></b></li>';								
							}
							$menuContent .='</ul>';
						}				
						$menuContent .='</li>';
					}
				}
				array_push($arrList,array("menuValue"=> $menuContent));
				echo(json_encode($arrList));	
			}
			else
			{	
				$arrList	= array();
				$permissionResult = fillPermission::managePermission('VG',0,$userID, 0, 0, 0, 0, 0, 0, '0');
				if(mysqli_num_rows($permissionResult)>0)
				{
					while($perRow	= mysqli_fetch_array($permissionResult))
					{
						$GL_Menu			= '';
						$active_GL			= '';
						$display			= '';
						$int_GL_Id		    = $perRow["INT_GL_ID"];
						$str_Gl_Name		= $perRow["GL_NAME"];
						$str_icon			= $perRow["VCH_ICON_NAME"];	
						$str_icon_class		= $perRow["VCH_ICON_CLASS"];
						$icon				= '';
						if($str_icon!='')
						{
							$icon	= '<img src="'.APP_PATH.'/Console/uploadDocuments/Icons/'.$str_icon.'" width="25" height="16" style="padding:0px 5px; margin-bottom:3px;"/>';
						}
						else if($str_icon_class!='')
						{
							$icon	= '<i class="'.$str_icon_class.'"></i>';
						}
						$active_GL			= ($GL==$int_GL_Id)?'active':'';							
						$plResult=fillPermission::managePermission('VP',0,$userID,$int_GL_Id, 0, 0, 0, 0, 0, '0');
						$plCtr			= 0;
						if(mysqli_num_rows($plResult)>0)
							$plCtr	= 1;							
						$menuContent 	.='<li class="hsub '.$active_GL.'"> <a href="javascript:void(0);" class="dropdown-toggle" title="'.$str_Gl_Name.'">'.$icon.'<span class="menu-text">'. $str_Gl_Name .'</span> <b class="arrow fa fa-angle-down"></b></a> <b class="arrow"></b>';							
						if($plCtr>0)
						{
							$menuContent .='<ul class="submenu">';
							while($plRowvalue=mysqli_fetch_array($plResult))
							{
								$href_Pl			= '';
								$PL_Menu			= '';
								$active_Pl			= '';
								$PL_id				= $plRowvalue['INT_PL_ID'];
								$PL_Name			= $plRowvalue['PL_NAME'];
								$pl_function_Name	= $plRowvalue['FUNCTION_NAME'];
								$href_Pl			= APP_PATH.'/'.$pl_function_Name;
								if($PL==$PL_id )
								{
									$active_Pl	= "active";
								}
								$menuContent .='<li class="'.$active_Pl.'"><a  href="javascript:void(0);" onClick="goToPage(\''. $href_Pl.'\','.$int_GL_Id.','.$PL_id.',&quot;'.$str_Gl_Name.'&quot;,&quot;'.$PL_Name.'&quot;)" title="'.$PL_Name.'"><i class="menu-icon fa fa-caret-right"></i> '.$PL_Name.'</a> <b class="arrow"></b></li>';
							}
							$menuContent .='</ul>';
						}						
						$menuContent .='</li>';
					}					
				}
				array_push($arrList,array("menuValue"=> $menuContent));
				echo(json_encode($arrList));
			}
			
		}
		
	}
	//Class to Show Logo and Header Footer
	
	class HeaderClass extends themeClass
	{
		public function viewHeaderFooter()
		{
			$arrList=array();
                       
			$headerResult=themeClass::manageHeaderFooter('V',0,0,'','','','','','','',0);
			if(mysqli_num_rows($headerResult)>0)
			{
				$headerRow=mysqli_fetch_array($headerResult);
				array_push($arrList,array("headerTExt"=>$headerRow['VCH_HEADER_TEXT'],"footerText"=>$headerRow['VCH_FOOTER_TEXT'],"url"=>$headerRow['VCH_URL'],"companyName"=>$headerRow['VCH_COMPANY_NAME'],"loginLogo"=>$headerRow['VCH_LOGIN_LOGO'],"innerLogo"=>$headerRow['VCH_INNER_LOGO'],"portalLogo"=>$headerRow['VCH_PORTAL_LOGO'],"option"=>$headerRow['INT_OPTION']));
			}
                        print_r($arrList);
                        echo(json_encode($arrList));
		}
	}
	
//	// class to show button on page
//	
	class ButtonMaster extends linkClass
	{
		public function viewButton($funID)
		{
			$arrList=array();
			$buttonResult=linkClass::manageButton('VB','0',$funID,'',0,'',0,0,0,0,0,'',0);
			if(mysqli_num_rows($buttonResult)>0)
			{
				while ($buttonRow=mysqli_fetch_array($buttonResult))
				{
					array_push($arrList,array("buttonName"=>$buttonRow['VCH_BUTTON_NAME'],"buttonName"=>$buttonRow['VCH_BUTTON_NAME']));
				}echo(json_encode($arrList));
			}
		}
	}
	
	//	// class to show Tab on page
//	
	class tabMaster extends linkClass
	{
		public function viewTab($funID)
		{ 
			$arrList=array();
			$tabResult=linkClass::manageTab('V',0, $funID, '0', '', '0', '', '0', '0', '0', '0', '', '0');
			if(mysqli_num_rows($tabResult)>0)
			{
				while ($tabRow=mysqli_fetch_array($tabResult))
				{
					array_push($arrList,array("tabName"=>$tabRow['VCH_TAB_NAME'],"tabName"=>$tabRow['VCH_TAB_NAME']));
				}echo(json_encode($arrList));
			}
		}
	}
//?>
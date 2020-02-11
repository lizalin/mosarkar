<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$('.submenu').click(function(e){
			e.stopImmediatePropagation();
		});
		$('.hsub').on("click",function(){
			if($(this).find('li').hasClass('active') && $(this).find('ul').is(':visible'))
			{			
					$(this).find('ul').hide();
					return false;			
			}
			$('.active ul').hide();  						  
		});	
		var gLink=(getCookie("GLink")!='' && getCookie("GLink")>0)?getCookie("GLink"):0;
		var pLink=(getCookie("PLink")!='' && getCookie("PLink")>0)?getCookie("PLink"):0;	
		$('.mainLi').each(function(){
			var dataVal	= $(this).data('val');
			if(dataVal==gLink)
			{
				$(this).addClass('open');
				$(this).find('.submenu').addClass('nav-show');
				$(this).find('.submenu').show();
				$(this).find('li').each(function(){
					var dataSubVal	= $(this).data('subval');	
					if(dataSubVal==pLink)
					{
						$(this).addClass('active');
					}
				});								 
			}			
		});
		
		if('<?php echo strtolower($page);?>'=='dashboard')
		{
			gLink	= 0;
			pLink	= 0;
			removeCookie("GLink");
			removeCookie("PLink");
		}
        //bindGLPL('<?php echo $_SESSION['adminConsole_userID']?>',gLink,pLink);
		//bindHeader('header','footertext','footerUrl');
                //getHowdiCount(<?php echo USER_ID;?>);
});
</script>

<div id="sidebar" class="sidebar responsive">
   
    <ul class="nav nav-list" style="top: 0px;" id="menulft">
        <?php 
                
                 
                        $userID                 = $_SESSION['adminConsole_userID'];
			$GL			= (isset($_COOKIE['GLink']))?$_COOKIE['GLink']:'';
			$PL			= (isset($_COOKIE['PLink']))?$_COOKIE['PLink']:'';
			$obj                    = new cls_visit_type;
			$adminConsole_Privilege = $_SESSION['adminConsole_Privilege'];
			$adminConsole_Emp_Type  = (isset($_SESSION['adminConsole_Emp_Type']))?$_SESSION['adminConsole_Emp_Type']:0;
			$dashboardActive	= ($GL==0 && $PL==0 && $page!='scheduler')?"active":"";
                        $schedulerActive	= ($page=='scheduler')?"active":"";
                        if($_SESSION['adminConsole_Privilege']==0 || $_SESSION['adminConsole_Privilege']==1){
			echo '<li id="dashboard" class="'.$dashboardActive.'" > <a href="javascript:void(0);" onClick="goToPage(\''. APPURL.'dashboard\',0,0,&quot;Ticket Summary&quot;,&quot;&quot;)" title="Grievance Dashboard"> <i class="menu-icon fa fa-tachometer"></i> <span class="menu-text"> Dashboard </span> </a> <b class="arrow"></b> </li>';
                        }else{
                           echo '<li id="dashboard" class="'.$dashboardActive.'" > <a href="javascript:void(0);" onClick="goToPage(\''. APPURL.'ataDashboard\',0,0,&quot;Ticket Summary&quot;,&quot;&quot;)" title="Grievance Dashboard"> <i class="menu-icon fa fa-tachometer"></i> <span class="menu-text"> Dashboard </span> </a> <b class="arrow"></b> </li>'; 
                        }
                       $userid = USER_ID; 
                       $glMSql = "CALL USP_ADMIN_PLINK('B', '0', '0', '0', '0', '0', '0', '0', '0', '1', $userid, @OUT);";  
                       //echo  $glMSql;//exit;
                      $pendingResult = $obj->executeQry($glMSql); 
                      
                      if ($pendingResult->num_rows > 0) {
                        
                            $row = $pendingResult->fetch_array();
                           
                            $int_Pending    = $row['COUNTER'];
                      }
                        //echo $int_Pending;
                       //$spanValue = '<span id="mentionCount" class="badge-danger badge" style="color:#fff;padding-bottom: 0px;">'.$int_Pending.'</span>';
                        
                        if($adminConsole_Privilege ==0 || $adminConsole_Privilege ==1)
			{				
				$arrList	= array(); 
				$glSql		= "CALL USP_ADMIN_GLINK('s', '0', '0', '0', '0', '0', '0', '0', '0', @OUT);";
                //echo  $glSql;//exit;
                                $permissionResult = $obj->executeQry($glSql);
				if(mysqli_num_rows($permissionResult)>0)
				{
					
					while($perRow	= mysqli_fetch_array($permissionResult))
					{
						$GL_Menu		= '';						
						$display		= '';
						$int_GL_Id		= $perRow["INT_GL_ID"];						
						$str_Gl_Name		= $perRow["VCH_GL_NAME"];
						$str_icon		= $perRow["VCH_ICON_NAME"];	
						$str_icon_class		= $perRow["VCH_ICON_CLASS"];
						$icon			= '';
						if($str_icon!='')
						{
							$icon	= '<img src="'.APPURL.'Console/uploadDocuments/Icons/'.$str_icon.'" width="25" height="16" style="padding:0px 5px; margin-bottom:3px;"/>';
						}
						else if($str_icon_class!='')
						{
							$icon	= '<i class="'.$str_icon_class.'"></i>';
						}
						$active_GL	= ($int_GL_Id==$GL)?'active':'';					
						
                                                 $plSql		= "CALL USP_ADMIN_PLINK('S', '0', '$int_GL_Id', '0', '0', '0', '0', '0', '0', '1', '0', @OUT);";
                               //echo $plSql;
                                                $plResult	=$obj->executeQry($plSql);
						$plCtr				= 0;
						if(mysqli_num_rows($plResult)>0)
							$plCtr	= 1;							
						//echo $pl_function_Name;exit;
						echo '<li class="hsub '.$active_GL.'"> <a href="javascript:void(0);" class="dropdown-toggle" title="'.$str_Gl_Name.'">'.$icon.'<span class="menu-text">'. $str_Gl_Name .'</span> <b class="arrow fa fa-angle-down"></b></a> <b class="arrow"></b>';										
						if($plCtr>0)
						{
							echo  '<ul class="submenu">';
							while($plRowvalue=mysqli_fetch_array($plResult))
							{
//print_r($plRowvalue);
								$href_Pl			= '';
								$PL_Menu			= '';
								$active_Pl			= '';
								$PL_id				= $plRowvalue['INT_PL_ID'];
								$PL_Name			= $plRowvalue['VCH_PL_NAME'];
								$pl_function_Name               = $plRowvalue['FUNCTION_NAME'];
$pl_link_type             = $plRowvalue['INT_LINK_TYPE'];
$pl_external_url =  $plRowvalue['VCH_FUNC_FILE'];



								$href_Pl			= APPURL.$pl_function_Name;
								
							if($pl_link_type==1){

                                                                if($PL_id==5 && USER_ID !=1){
                                                                    $spanValue = '<span id="mentionCount" class="badge-danger badge" style="color:#fff;padding-bottom: 0px;">'.$int_Pending.'</span>';
                                                                }else{
                                                                    $spanValue ='';
                                                                }
								if($PL==$PL_id )
								{
									$active_Pl	= "active";
								}
                                                                if($pl_function_Name=='Messenger'){
                                                                    if(USER_ID > 1){
                                                                        echo '<li class="'.$active_Pl.'"><a href="javascript:void(0);" onClick="openK2('.USER_ID.')" title="'.$PL_Name.'"><i class="menu-icon fa fa-caret-right"></i> '.$PL_Name.'</a> <b class="arrow"></b></li>';
                                                                    }                                                                    
                                                                }
                                                                else{
                                                                    echo '<li class="'.$active_Pl.'"><a href="javascript:void(0);" onClick="goToPage(\''. $href_Pl.'\','.$int_GL_Id.','.$PL_id.',&quot;'.$str_Gl_Name.'&quot;,&quot;'.$PL_Name.'&quot;)" title="'.$PL_Name.'"><i class="menu-icon fa fa-caret-right"></i> '.$PL_Name.''.$spanValue.'</a> <b class="arrow"></b></li>';								
                                                                }
							}
else if($pl_link_type==2){
echo '<li class="'.$active_Pl.'"><a href="'.$pl_external_url.'"  target ="_blank" title="'.$PL_Name.'"><i class="menu-icon fa fa-caret-right"></i> '.$PL_Name.''.$spanValue.'</a> <b class="arrow"></b></li>';

}

							}
							echo '</ul>';
						}				
						echo '</li>';
					}
				}
					
			}
			else
			{	
				$arrList	= array();
				
                                $permissionSql	= "CALL USP_ADMIN_PERMISSION('VG', '0', '$userID', '0', '0', '0', '0', '0', '0', '', @OUT);";
                                //echo $permissionSql;exit;
                                $permissionResult = $obj->executeQry($permissionSql);
				if(mysqli_num_rows($permissionResult)>0)
				{
					while($perRow	= mysqli_fetch_array($permissionResult))
					{
						$GL_Menu			= '';
						$active_GL			= '';
						$display			= '';
						$int_GL_Id                      = $perRow["INT_GL_ID"];
						$str_Gl_Name                    = $perRow["GL_NAME"];
						$str_icon			= $perRow["VCH_ICON_NAME"];	
						$str_icon_class                 = $perRow["VCH_ICON_CLASS"];
						$icon				= '';
						if($str_icon!='')
						{
							$icon	= '<img src="'.APPURL.'Console/uploadDocuments/Icons/'.$str_icon.'" width="25" height="16" style="padding:0px 5px; margin-bottom:3px;"/>';
						}
						else if($str_icon_class!='')
						{
							$icon	= '<i class="'.$str_icon_class.'"></i>';
						}
						$active_GL			= ($GL==$int_GL_Id)?'active':'';							
						
                                                 $plSql="CALL USP_ADMIN_PERMISSION('VP', '0', '$userID', '$int_GL_Id', '0', '0', '0', '0', '0', '', @OUT);";
                                                $plResult=$obj->executeQry($plSql);
						$plCtr			= 0;
						if(mysqli_num_rows($plResult)>0)
							$plCtr	= 1;		
                                                
                                                if($str_Gl_Name == 'Manage Content'){
                                                    $howdiCount = '<span class="chartCntId badge badge-warning"></span>';
                                                }else{
                                                    $howdiCount = '';
                                                }
						echo '<li class="hsub '.$active_GL.'"> <a href="javascript:void(0);" class="dropdown-toggle" title="'.$str_Gl_Name.'">'.$icon.'<span class="menu-text">'. $str_Gl_Name .'</span> '.$howdiCount.' <b class="arrow fa fa-angle-down"></b></a> <b class="arrow"></b>';							
						if($plCtr>0)
						{
							echo '<ul class="submenu">';
							while($plRowvalue=mysqli_fetch_array($plResult))
							{
								$href_Pl			= '';
								$PL_Menu			= '';
								$active_Pl			= '';
								$PL_id				= $plRowvalue['INT_PL_ID'];
								$PL_Name			= $plRowvalue['PL_NAME'];
								$pl_function_Name               = $plRowvalue['FUNCTION_NAME'];
								$href_Pl			= APPURL.$pl_function_Name;
								if($PL==$PL_id )
								{
									$active_Pl	= "active";
								}
                                                                 if($PL_id==5 && USER_ID !=1){
                                                                    $spanValue = '<span id="mentionCount" class="badge-danger badge" style="color:#fff;padding-bottom: 0px;">'.$int_Pending.'</span>';
                                                                }else{
                                                                    $spanValue ='';
                                                                }
                                                                if($pl_function_Name=='Messenger'){
                                                                    echo '<li class="'.$active_Pl.'"><a href="javascript:void(0);" onClick="openK2('.USER_ID.')" title="'.$PL_Name.'"><i class="menu-icon fa fa-caret-right"></i> '.$PL_Name.''.$spanValue.'</a> <b class="arrow"></b></li>';
                                                                }
                                                                else{
                                                                    echo '<li class="'.$active_Pl.'"><a  href="javascript:void(0);" onClick="goToPage(\''. $href_Pl.'\','.$int_GL_Id.','.$PL_id.',&quot;'.$str_Gl_Name.'&quot;,&quot;'.$PL_Name.'&quot;)" title="'.$PL_Name.'"><i class="menu-icon fa fa-caret-right"></i> '.$PL_Name.''.$spanValue.'</a> <b class="arrow"></b></li>';							
                                                                }
								
							}
							echo '</ul>';
						}						
						echo '</li>';
					}					
				}
				
			}
        ?>
    </ul>
  <!-- /.nav-list -->

</div>
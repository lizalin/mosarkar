<?php
$current_session = session_id(); 
$hdnSession_id   = (isset($_POST['hdnPrevSessionId']))?$_POST['hdnPrevSessionId']:'';
 
    if(isset($_POST['hdnPrevSessionId'])){
              if($current_session !=$hdnSession_id){
                  session_destroy();
                  echo "<script>window.location.href='".URL."/sessionOut'</script>";
                  exit;
              }
        }
    $obj		= new cls_visit_type();
    $headerSql		= "CALL USP_ADMIN_HEADER_FOOTER('V','0','0','','','','','','','','0',@out);";		
    $headerResult       = $obj->executeQry($headerSql);
    if(mysqli_num_rows($headerResult)>0)
    {
            $headerRow  = mysqli_fetch_array($headerResult);
            $headerText = $headerRow['VCH_HEADER_TEXT'];
            $footerText = $headerRow['VCH_FOOTER_TEXT'];
            $url        = $headerRow['VCH_URL'];
            $companyName= $headerRow['VCH_COMPANY_NAME'];
            $loginLogo  = $headerRow['VCH_LOGIN_LOGO'];
            $innerLogo  = $headerRow['VCH_INNER_LOGO'];
            $portalLogo = $headerRow['VCH_PORTAL_LOGO'];
            $option     = $headerRow['INT_OPTION'];
    }
    
    // $accessRow          = $obj->getAccessTokens();
    $accessToken        = $accessRow['accessToken'];
    $accessTokenSecret  = $accessRow['accessTokenSecret'];
    $twScreenName       = $accessRow['screenName'];
    $twScreenUserName   = '@'.$accessRow['screenUserName'];
    //$_SESSION['adminConsole_Desg_Id']=15;
    
    if($_SESSION['adminConsole_Desg_Id']==13){
       
        $theme = 'deskuserTheme';
    }
    else if($_SESSION['adminConsole_Desg_Id']==15)
    {
     $theme = 'supervisorTheme' ;  
    }
    else if($_SESSION['adminConsole_Desg_Id']==5 || $_SESSION['adminConsole_Desg_Id']==6 || $_SESSION['adminConsole_Desg_Id']==9 || $_SESSION['adminConsole_Desg_Id']==10 || $_SESSION['adminConsole_Desg_Id']==11 || $_SESSION['adminConsole_Desg_Id']==12 || $_SESSION['adminConsole_Desg_Id']==14 || $_SESSION['adminConsole_Desg_Id']==16 || $_SESSION['adminConsole_Desg_Id']==17 || $_SESSION['adminConsole_Desg_Id']==18 || $_SESSION['adminConsole_Desg_Id']==19 || $_SESSION['adminConsole_Desg_Id']==20)
    {
     $theme = 'ATATheme' ;  
    }
    else{
       $theme = ''; 
    }
    //echo "===".$theme;exit;
    
    
       /*Single signon for ATA Users By: Manali Ranjan On: 23-Jan-2018*/
   
     $objModel		 = new Model();
     $UserId             = $_SESSION['adminConsole_userID'];

     $loginsql		 = "CALL USP_ADMIN_LOGIN('US',$UserId);";
    //$loginsql		= "CALL USP_ADMIN_LOGIN('US',2);";
   
     $resultList           = $objModel->executeQry($loginsql);

    // print_r($result);exit;
   
     

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title><?php echo TITLE;?></title>
<meta name="description" content="overview &amp; stats">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
 
<!-- START: meta tag for PWA Splash Screen -->
<!-- <meta name="apple-mobile-web-app-capable" content="yes" />
<link href="pwa/images/splashscreens/iphone5_splash.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="pwa/images/splashscreens/iphone6_splash.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="pwa/images/splashscreens/iphoneplus_splash.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="pwa/images/splashscreens/iphonex_splash.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="pwa/images/splashscreens/iphonexr_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="pwa/images/splashscreens/iphonexsmax_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="pwa/images/splashscreens/ipad_splash.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="pwa/images/splashscreens/ipadpro1_splash.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="pwa/images/splashscreens/ipadpro3_splash.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" /> -->
<!-- <link href="pwa/images/splashscreens/ipadpro2_splash.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" /> -->
<!-- END HERE: meta tag for PWA Splash Screen -->
<!-- END HERE: meta tag for PWA Launch Icon -->
<!-- <link rel="apple-touch-icon" href="pwa/images/icons/icon-512x512.png">
<link rel="apple-touch-icon" sizes="76x76" href="pwa/images/icons/icon-96x96.png">
<link rel="apple-touch-icon" sizes="120x120" href="pwa/images/icons/icon-128x128.png">
<link rel="apple-touch-icon" sizes="152x152" href="pwa/images/icons/icon-512x512.png"> -->
<!-- END HERE: meta tag for PWA Launch Icon -->

<!-- bootstrap & fontawesome -->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<link rel="stylesheet" href="<?php echo URL;?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo URL;?>css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo URL;?>css/font-awesome.min.css">
<!-- text fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300">
<!-- ace styles -->
<link rel="stylesheet" href="<?php echo URL;?>css/ace.min.css">
<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo URL;?>css/ace-part2.min.css" />
		<![endif]-->
<link rel="stylesheet" href="<?php echo URL;?>css/ace-skins.min.css">
<link rel="stylesheet" href="<?php echo URL;?>css/ace-rtl.min.css">
<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo URL;?>css/ace-ie.min.css" />
		<![endif]-->
<!-- custom styles -->
<link href="<?php echo URL;?>css/custom.css" rel="stylesheet">
<link href="<?php echo URL;?>css/icons.css" rel="stylesheet">
<link href="<?php echo URL;?>css/customnew.css" rel="stylesheet">
<link href="<?php echo URL;?>css/slimscrollbar.min.css" rel="stylesheet">

<!-- ace settings handler -->
<script src="<?php echo URL;?>js/jquery-3.3.1.min.js"></script>
<!-- extra custom script -->
<script src="<?php echo URL;?>js/bootstrap.min.js"></script> 

<script src="<?php echo URL;?>js/loadComponent.js"></script>
<script src="<?php echo URL;?>js/loadAjax.js"></script>
<script src="<?php echo URL;?>js/validatorchklist.js"></script>
<link rel="shortcut icon" href="<?php echo SITE_PATH; ?>images/favicon.png" type="image/png">


<script>
    //Session Time alert Check By Sunil Kumar Parida On 07-Sept-2016
            var unixTimer;
            function startUnixTimer()
            {
                // setSessionOutTime();
                //     var i = 0;
                //     var totalExpireTime	= Number('<?php echo $sessExpireTime;?>');
                //     unixTimer = setInterval(function(){
                //     var remainTime	= Number(totalExpireTime)-i;
                //     i++;
                //    // console.log(remainTime);
                //                     if(Number(remainTime)<=180)
                //                     {
                //                             if(Number(remainTime)==180)
                //                             {
                //                                     $('#sessionModal').modal({backdrop: 'static', keyboard: false});
                //                             }
                //                             $('.sessionMessage').html(remainTime);
                //                     }
                //                     if(Number(remainTime)==60 && !$('#sessionModal').is(':visible'))
                //                     {
                //                             $('#sessionModal').modal({backdrop: 'static', keyboard: false});
                //                     }
                //                     //console.log(remainTime);
                //                     if(Number(remainTime)<=0)
                //                     {
                //                             window.location.href='<?php echo URL;?>sessionOut';
                //                             stopUnixTimer(unixTimer);
                //                     }			
                //             },1000);
            }

            function stopUnixTimer()
            {
                    clearInterval(unixTimer);
            }
	$(document).ready(function () {
            
             // $('#messageModal').modal('show');
             $("#messageModal").on("hidden.bs.modal", function () {
                 var msgId=$('#readBtn').data('rowid');
                     updateMsgReadStatus(msgId,'<?php echo USER_ID;?>');
                    
             });
                 startUnixTimer();
		$('#btnStayLogin').on('click',function(){stopUnixTimer(unixTimer);
                    startUnixTimer();});
		dateTime('clock');
		$('form').find('input[type=text],textarea,select').not('.date-picker').filter(':visible:first').focus();
		$('form').find('input[type=text],textarea').attr('autocomplete','off');  
		 
	
	});
        function viewAlert(msg, ctrlId,redLoc)
	{	
            $('#btnAlertOk').off('click');
            if(typeof(ctrlId)=='undefined')
            {
                ctrlId	= '';
            }
            if(typeof(redLoc)=='undefined')
            {
                redLoc	= '';
            }
            $('#alertModal').modal({backdrop: 'static', keyboard: false});
            $('.alertMessage').html(msg);
            $('#btnAlertOk').on('click',function(){
                if(ctrlId !='')
                {
                    $('#'+ctrlId).focus();
                }
                if(redLoc!='')
                {
                    window.location.href =redLoc;
                }
            });
	}
        /*
	function viewAlert(msg, ctrlId)
	{		
		$('#btnAlertOk').off('click');
		if(typeof(ctrlId)=='undefined')
		{
			ctrlId	= '';
		}
		$('#alertModal').modal({backdrop: 'static', keyboard: false});
		$('.alertMessage').html(msg);
		$('#btnAlertOk').on('click',function(){
			if(ctrlId !='')
			{
				$('#'+ctrlId).focus();
			}
		});
		
	}
        */
     
        
        //function UserLogins(id)
       // {
              
           // alert(id);
            //alert("hello");
        //}
        
	function confirmAlert(msg)
	{
		$('#confirmModal').modal({backdrop: 'static', keyboard: false});
		$('.confirmMessage').html(msg);
	}
</script>

<script type="text/javascript" language="javascript">
$(document).ready(function(){

    
    var gLink=(getCookie("GLink")!='' && getCookie("GLink")>0)?getCookie("GLink"):0;
    var pLink=(getCookie("PLink")!='' && getCookie("PLink")>0)?getCookie("PLink"):0;  
    $('.mainLi').each(function(){
      var dataVal = $(this).data('val');
      if(dataVal==gLink)
      {
        $(this).addClass('open');
        $(this).find('.submenu').addClass('nav-show');
        $(this).find('.submenu').show();
        $(this).find('li').each(function(){
          var dataSubVal  = $(this).data('subval'); 
          if(dataSubVal==pLink)
          {
            $(this).addClass('active');
          }
        });                
      }     
    });
    
    if('<?php echo strtolower($page);?>'=='dashboard')
    {
      gLink = 0;
      pLink = 0;
      removeCookie("GLink");
      removeCookie("PLink");
    }
        //bindGLPL('<?php echo $_SESSION['adminConsole_userID']?>',gLink,pLink);
    //bindHeader('header','footertext','footerUrl');
                //getHowdiCount(<?php echo USER_ID;?>);

$(".hsub").on( "mouseenter", function() {
          $(this).addClass('on');         
              
            })
           .on( "mouseleave", function() {
             $(this).removeClass('on');  
            });

});
var csrf_token_val = '<?php echo $token_value; ?>';
</script>

</head>
<body class="no-skin ">
<form class="form-horizontal" role="form" name="frmCMO" id="frmCMO" method="post" enctype="multipart/form-data">
    <input type="hidden" name="hdnPrevSessionId" id="hdnPrevSessionId" value="<?php echo session_id(); ?>" />
    <input type="hidden" id="csrf_token" name="<?php echo $token_id; ?>" value="<?php echo $token_value; ?>" />
    <input type="hidden" name="hdnAccessToken"   id="hdnAccessToken" value="" />
    <input type="hidden" name="hdnAccessTokenSecret" id="hdnAccessTokenSecret" value="" />
    <input type="hidden" name="hdnAccessTokenDR" id="hdnAccessTokenDR" value="" />
    <input type="hidden" name="hdnAccessTokenSecretDR" id="hdnAccessTokenSecretDR" value="" />
<!--[if lte IE 8]>
<script src="<?php echo URL;?>js/html5shiv.js"></script>
<script src="<?php echo URL;?>js/respond.min.js"></script>
<![endif]-->

<div id="navbar" class="navbar navbar-default navbar-fixed-top">
  <script type="text/javascript">
	try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>
  <div class="navbar-container" id="navbar-container">
   
    
    <div class="navbar-header pull-left" id="header">
    <?php 
        if($option==1)
        {
               echo '<h1 style=" margin:2px 0px 0px 10px; padding:0px;">';
               echo $companyName ;
               echo '<br/>';
               echo $hederText;
               echo '</h1>';		
             
        }
        if($option==2)
        { 
                echo '<span class="navbar-brand"><img src="'.APPURL.'Console/uploadDocuments/Logo/Inner_logo/'.$innerLogo.'"></span>';
             //   echo "<span class='navbar-brand txtOnly'>".TITLE."</span>";

           
        }
        else
        {
              echo'<h1 style=" margin:2px 0px 0px 10px; padding:0px;">Header Text</h1>';
              
        }?></div>
       <div class="menubtn" > <i class="ace-icon fa fa-bars" data-icon1="ace-icon fa fa-outdent" data-icon2="ace-icon fa fa-indent" title=""></i> </div> 


    <div class="navbar-buttons navbar-header pull-right" role="navigation" >
      <ul class="nav ace-nav settingNav"> 
        <li class="userSetting"> 
			<?php
                        
				$userImage	= (isset($_SESSION['adminConsole_Image']) && $_SESSION['adminConsole_Image']!='')?'Console/uploadDocuments/UserImage/'.$_SESSION['adminConsole_Image']:'Console/images/noPhoto.jpg';
				$adminConsole_Privilege = $_SESSION['adminConsole_Privilege'];
			?>
            <a data-toggle="dropdown" href="javascript: void(0);" class="dropdown-toggle">  
            <span class="user-info"> 
		
		<?php //echo $_SESSION['adminConsole_FullName']; ?>
		<div>
		<?php  
		if($adminConsole_Privilege>0 && $_SESSION['adminConsole_HierarchyId']>0)
                {	
                   echo $_SESSION['adminConsole_FullName'];
		}
                else { echo $_SESSION['adminConsole_FullName']; }
		?>
		</div>           
		
         </span> 
        <i class="ace-icon fa fa-caret-down"></i> </a>
          <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
              
<!--              /* dropdown for ATA users By: Manali Ranjan On: 23-Jan-2018*/-->
              <?php
              if ($resultList->num_rows > 0) {
                while ($row = $resultList->fetch_array()){
                   // print_r($row);
                    //echo $row['USER_ID'];
                        $UserIds = explode(',', $row['USER_ID']);
                        $UserNames = explode('::', $row['FULL_NAME']);
                        $Total=$row['TOTAL'];
                }
                $newAry=array_combine($UserIds,$UserNames);
                unset($newAry[$UserId]);
                //print_r($newAry);
                if($Total==1){
                    foreach($newAry as $key=>$val){
                        $name= htmlspecialchars($val,ENT_QUOTES);
                        $name=htmlspecialchars_decode($name,ENT_QUOTES);
                    ?>
                        <li><a href="javascript:void(0);" id="link" data-uid="<?php echo $key;?>" onclick="UserLogins(this.getAttribute('data-uid'))"><span><img alt='' src="<?php echo URL;?>img/user-switch.png"/><?php echo $name;?></span></a></li>                        
                         <?php  }
                }
              }
              ?>
              
              
              

           
			<li> <a href="javascript:void(0);"  onclick="goToPage('<?php echo URL;?>changePassword',0,0,'Change Password','');"> <i class="ace-icon fa fa-key"></i> Change Password </a> </li>
            <?php if($adminConsole_Privilege==0|| $adminConsole_Privilege==1){?>
            <li> <a href="<?php echo URL;?>Console/welcome"> <i class="ace-icon fa fa-user"></i> Admin Console </a> </li>
             <?php }?>
            <li class="divider"></li>
            <li> <a href="<?php echo URL;?>"> <i class="ace-icon fa fa-power-off"></i> Logout </a> </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="top-menu">
   
    <ul class="menu-list" style="top: 0px;" id="menulft">
        <?php 
                
                 
                        $userID                 = $_SESSION['adminConsole_userID'];
      $GL     = (isset($_COOKIE['GLink']))?$_COOKIE['GLink']:'';
      $PL     = (isset($_COOKIE['PLink']))?$_COOKIE['PLink']:'';
      $obj                    = new cls_visit_type;
      $adminConsole_Privilege = $_SESSION['adminConsole_Privilege'];
      $adminConsole_Emp_Type  = (isset($_SESSION['adminConsole_Emp_Type']))?$_SESSION['adminConsole_Emp_Type']:0;
      $dashboardActive  = ($GL==0 && $PL==0 && $page!='scheduler')?"active":"";
      $schedulerActive  = ($page=='scheduler')?"active":"";
     // echo "<pre>";print_r($_SESSION);exit;
      if($_SESSION['adminConsole_Privilege']==0 || $_SESSION['adminConsole_Privilege']==1 || $_SESSION['adminConsole_Desg_Id']==FSCWS_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CSO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==MINISTER_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==DG_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==DIG_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CMO_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==CP_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==IGP_DESIGNATION || $_SESSION['adminConsole_Desg_Id']==SC_DESIGNATION){
      echo '<li id="dashboard" class="'.$dashboardActive.'" > <a href="javascript:void(0);" onClick="goToPage(\''. APPURL.'dashboard\',0,0,&quot;Ticket Summary&quot;,&quot;&quot;)" title="review Board"> <i class="menu-icon icon-dashboard"></i> <span class="menu-text"> Review Board </span> </a> <b class="arrow"></b> </li>';
      }else{
          //echo '<li id="dashboard" class="'.$dashboardActive.'" > <a href="javascript:void(0);" onClick="goToPage(\''. APPURL.'agentdashboard\',0,0,&quot;Ticket Summary&quot;,&quot;&quot;)" title="Agent Dashboard"> <i class="menu-icon icon-dashboard"></i> <span class="menu-text"> Agent Dashboard </span> </a> <b class="arrow"></b> </li>'; 
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
        $arrList  = array(); 
        $glSql    = "CALL USP_ADMIN_GLINK('s', '0', '0', '0', '0', '0', '0', '0', '0', @OUT);";
                //echo  $glSql;//exit;
                                $permissionResult = $obj->executeQry($glSql);
        if(mysqli_num_rows($permissionResult)>0)
        {
          
          while($perRow = mysqli_fetch_array($permissionResult))
          {
            $GL_Menu    = '';           
            $display    = '';
            $int_GL_Id    = $perRow["INT_GL_ID"];           
            $str_Gl_Name    = $perRow["VCH_GL_NAME"];
            $str_icon   = $perRow["VCH_ICON_NAME"]; 
            $str_icon_class   = $perRow["VCH_ICON_CLASS"];
            $icon     = '';
            if($str_icon!='')
            {
              $icon = '<img src="'.APPURL.'Console/uploadDocuments/Icons/'.$str_icon.'" width="25" height="16" style="padding:0px 5px; margin-bottom:3px;"/>';
            }
            else if($str_icon_class!='')
            {
              $icon = '<i class="'.$str_icon_class.'"></i>';
            }
            $active_GL  = ($int_GL_Id==$GL)?'active':'';          
            
                                                 $plSql   = "CALL USP_ADMIN_PLINK('S', '0', '$int_GL_Id', '0', '0', '0', '0', '0', '0', '1', '0', @OUT);";
                               //echo $plSql;
                                                $plResult =$obj->executeQry($plSql);
            $plCtr        = 0;
            if(mysqli_num_rows($plResult)>0)
              $plCtr  = 1;              
            //echo $pl_function_Name;exit;
            echo '<li class="hsub '.$active_GL.'"> <a href="javascript:void(0);" class="dropdown-toggle" title="'.$str_Gl_Name.'">'.$icon.'<span class="menu-text">'. $str_Gl_Name .'</span> <b class="arrow fa fa-angle-down"></b></a> <b class="arrow"></b>';                   
            if($plCtr>0)
            {
              echo  '<ul class="submenu">';
              while($plRowvalue=mysqli_fetch_array($plResult))
              {
//print_r($plRowvalue);
                $href_Pl      = '';
                $PL_Menu      = '';
                $active_Pl      = '';
                $PL_id        = $plRowvalue['INT_PL_ID'];
                $PL_Name      = $plRowvalue['VCH_PL_NAME'];
                $pl_function_Name               = $plRowvalue['FUNCTION_NAME'];
                if(in_array($pl_function_Name, NEW_BADGE)){
                  $newClass = 'new';
                }
                else {
                  $newClass = '';
                }
$pl_link_type             = $plRowvalue['INT_LINK_TYPE'];
$pl_external_url =  $plRowvalue['VCH_FUNC_FILE'];



                $href_Pl      = APPURL.$pl_function_Name;
                
              if($pl_link_type==1){

                                                                if($PL_id==5 && USER_ID !=1){
                                                                    $spanValue = '<span id="mentionCount" class="badge-danger badge" style="color:#fff;padding-bottom: 0px;">'.$int_Pending.'</span>';
                                                                }else{
                                                                    $spanValue ='';
                                                                }
                if($PL==$PL_id )
                {
                  $active_Pl  = "active";
                }
                                                                if($pl_function_Name=='Messenger'){
                                                                    if(USER_ID > 1){
                                                                        echo '<li class="'.$active_Pl.'"><a href="javascript:void(0);" onClick="openK2('.USER_ID.')" title="'.$PL_Name.'" class ="'.$newClass.'"><i class="menu-icon fa fa-caret-right"></i> '.$PL_Name.'</a> <b class="arrow"></b></li>';
                                                                    }                                                                    
                                                                }
                                                                else{
                                                                    echo '<li class="'.$active_Pl.'"><a href="javascript:void(0);" onClick="goToPage(\''. $href_Pl.'\','.$int_GL_Id.','.$PL_id.',&quot;'.$str_Gl_Name.'&quot;,&quot;'.$PL_Name.'&quot;)" title="'.$PL_Name.'" class ="'.$newClass.'"><i class="menu-icon fa fa-caret-right"></i> '.$PL_Name.''.$spanValue.'</a> <b class="arrow"></b></li>';               
                                                                }
              }
else if($pl_link_type==2){
echo '<li class="'.$active_Pl.'"><a class ="'.$newClass.'" href="'.$pl_external_url.'"  target ="_blank" title="'.$PL_Name.'"><i class="menu-icon fa fa-caret-right"></i> '.$PL_Name.''.$spanValue.'</a> <b class="arrow"></b></li>';

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
        $arrList  = array();
        
                                $permissionSql  = "CALL USP_ADMIN_PERMISSION('VG', '0', '$userID', '0', '0', '0', '0', '0', '0', '', @OUT);";
                                //echo $permissionSql;exit;
                                $permissionResult = $obj->executeQry($permissionSql);
        if(mysqli_num_rows($permissionResult)>0)
        {
          while($perRow = mysqli_fetch_array($permissionResult))
          {
            $GL_Menu      = '';
            $active_GL      = '';
            $display      = '';
            $int_GL_Id                      = $perRow["INT_GL_ID"];
            $str_Gl_Name                    = $perRow["GL_NAME"];
            $str_icon     = $perRow["VCH_ICON_NAME"]; 
            $str_icon_class                 = $perRow["VCH_ICON_CLASS"];
            $icon       = '';
            if($str_icon!='')
            {
              $icon = '<img src="'.APPURL.'Console/uploadDocuments/Icons/'.$str_icon.'" width="25" height="16" style="padding:0px 5px; margin-bottom:3px;"/>';
            }
            else if($str_icon_class!='')
            {
              $icon = '<i class="'.$str_icon_class.'"></i>';
            }
            $active_GL      = ($GL==$int_GL_Id)?'active':'';              
            
                                                 $plSql="CALL USP_ADMIN_PERMISSION('VP', '0', '$userID', '$int_GL_Id', '0', '0', '0', '0', '0', '', @OUT);";
                                                $plResult=$obj->executeQry($plSql);
            $plCtr      = 0;
            if(mysqli_num_rows($plResult)>0)
              $plCtr  = 1;    
                                                
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
                $href_Pl      = '';
                $PL_Menu      = '';
                $active_Pl      = '';
                $PL_id        = $plRowvalue['INT_PL_ID'];
                $PL_Name      = $plRowvalue['PL_NAME'];
                $pl_function_Name               = $plRowvalue['FUNCTION_NAME'];
                if(in_array($pl_function_Name, NEW_BADGE)){
                  $newClass = 'new';
                }
                else {
                  $newClass = '';
                }
                $href_Pl      = APPURL.$pl_function_Name;
                if($PL==$PL_id )
                {
                  $active_Pl  = "active";
                }
                                                                 if($PL_id==5 && USER_ID !=1){
                                                                    $spanValue = '<span id="mentionCount" class="badge-danger badge" style="color:#fff;padding-bottom: 0px;">'.$int_Pending.'</span>';
                                                                }else{
                                                                    $spanValue ='';
                                                                }
                                                                if($pl_function_Name=='Messenger'){
                                                                    echo '<li class="'.$active_Pl.'"><a href="javascript:void(0);" onClick="openK2('.USER_ID.')" title="'.$PL_Name.'" class="'.$newClass.'"><i class="menu-icon fa fa-caret-right"></i> '.$PL_Name.''.$spanValue.'</a> <b class="arrow"></b></li>';
                                                                }
                                                                else{
                                                                    echo '<li class="'.$active_Pl.'"><a  href="javascript:void(0);" class="'.$newClass.'" onClick="goToPage(\''. $href_Pl.'\','.$int_GL_Id.','.$PL_id.',&quot;'.$str_Gl_Name.'&quot;,&quot;'.$PL_Name.'&quot;)" title="'.$PL_Name.'"><i class="menu-icon fa fa-caret-right"></i> '.$PL_Name.''.$spanValue.'</a> <b class="arrow"></b></li>';              
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

  </div>
  <!-- /.navbar-container -->
</div>
<div class="main-container" id="main-container">
  
    <?php 
    $page = $_REQUEST['PG'];
    $id   = (isset($_REQUEST['ID']))?$_REQUEST['ID']:'';
    if($page=='changePassword')
    {
        if($id!=1)
            {
           // include('includes/left_panel.php');
            }
    }
    else {
       //include('includes/left_panel.php');
    }
    ?>
  <div class="main-content">
  <!-- <?php include('includes/navigation.php'); ?> -->
<?php if($_REQUEST['PG']=='addCase' || $_REQUEST['PG']=='viewCase' || $_REQUEST['PG']=='addDepartment'|| $_REQUEST['PG']=='addComplaintType' || $_REQUEST['PG']=='addCategory' || $_REQUEST['PG']=='addSubCategory' || $_REQUEST['PG']=='viewDepartment'|| $_REQUEST['PG']=='viewComplaintType' || $_REQUEST['PG']=='viewCategory' || $_REQUEST['PG']=='viewSubCategory') {?>
<div class="srvc_hdr_nav">

<a href="<?php echo URL; ?>addComplaintType" class="btn btn-info btn-sm <?php if($_REQUEST['PG']=='addComplaintType' || $_REQUEST['PG']=='viewComplaintType') echo 'active'; ?>" >Type Master</a>
<a href="<?php echo URL; ?>addDepartment" class="btn btn-info btn-sm <?php if($_REQUEST['PG']=='addDepartment' || $_REQUEST['PG']=='viewDepartment') echo 'active'; ?>" >Department Master</a>
<a href="<?php echo URL; ?>addCategory" class="btn btn-info btn-sm <?php if($_REQUEST['PG']=='addCategory' || $_REQUEST['PG']=='viewCategory') echo 'active'; ?>">Category Master</a>
<a href="<?php echo URL; ?>addSubCategory" class="btn btn-info btn-sm <?php if($_REQUEST['PG']=='addSubCategory' || $_REQUEST['PG']=='viewSubCategory') echo 'active'; ?>">Sub Category Master</a>
<a href="<?php echo URL; ?>addCase" class="btn btn-info btn-sm <?php if($_REQUEST['PG']=='addCase' || $_REQUEST['PG']=='addCase') echo 'active'; ?>" >Case Master</a>
</div>
<?php } ?>

<?php if($_REQUEST['PG']=='addEscalation' || $_REQUEST['PG']=='viewEscalation' || $_REQUEST['PG']=='addDemography' || $_REQUEST['PG']=='viewDemography') {?>
<div class="srvc_hdr_nav">
<a href="<?php echo URL; ?>addEscalation" class="btn btn-info btn-sm <?php if($_REQUEST['PG']=='addEscalation' || $_REQUEST['PG']=='viewEscalation') echo 'active'; ?>" >Escalation Config</a>
<!--<a href="<?php echo URL; ?>addDemography" class="btn btn-info btn-sm <?php //if($_REQUEST['PG']=='addDemography' || $_REQUEST['PG']=='viewDemography') echo 'active'; ?>">Demography Mapping</a>-->
</div>
<?php } ?>

<?php if($_REQUEST['PG']=='add-social-account' || $_REQUEST['PG']=='view-social-account' || $_REQUEST['PG']=='add-tag' || $_REQUEST['PG']=='view-tag' || $_REQUEST['PG']=='view-reply-tw-confg' || $_REQUEST['PG']=='view-reply-fb-confg') {?>
<div class="srvc_hdr_nav">
<a href="<?php echo URL; ?>add-social-account" class="btn btn-info btn-sm <?php if($_REQUEST['PG']=='add-social-account' || $_REQUEST['PG']=='view-social-account') echo 'active'; ?>" >SM handle Listening</a>
<a href="<?php echo URL; ?>add-tag" class="btn btn-info btn-sm <?php if($_REQUEST['PG']=='add-tag' || $_REQUEST['PG']=='view-tag') echo 'active'; ?>">Twitter Hashtag  Listening</a>
<a href="<?php echo URL; ?>view-reply-tw-confg" class="btn btn-info btn-sm <?php if($_REQUEST['PG']=='view-reply-tw-confg' || $_REQUEST['PG']=='view-reply-fb-confg') echo 'active'; ?>">Reply Config</a>

</div>
<?php } ?>
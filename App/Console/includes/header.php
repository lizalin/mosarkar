<?php
include_once(ABSPATH."/includes/sessioncheck.php");

//$userImage	= isset($_SESSION['adminConsole_Image'])?'uploadDocuments/UserImage/'.$_SESSION['adminConsole_Image']:'images/noPhoto.jpg';
date_default_timezone_set("Asia/Kolkata");
$userImage	= (isset($_SESSION['adminConsole_Image']) && $_SESSION['adminConsole_Image']!='')?'Console/uploadDocuments/UserImage/'.$_SESSION['adminConsole_Image']:'images/noPhoto.jpg';

if(isset($_POST['hdnPrevSessionId'])){

      $current_session=session_id(); 
      $hdnSession_id= $_POST['hdnPrevSessionId'];
      if($current_session !=$hdnSession_id){
            echo "<script>window.location.href='".APP_PATH."/sessionOut'</script>";
        }
}


?>
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/loadJson.js"></script>


<div id="InnerHeader">
    <span id="header">
        
        
    </span>
  <div style="float:right; margin:3px 10px 0px 0px;">
  <div  style="float:left;">
    <div class="input-append">
         <input type="hidden" name="hdnPrevSessionId" id="hdnPrevSessionId" value="<?php echo session_id(); ?>" />
      <div class="photo" style="position:relative; padding-right:10px;"><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer;"><img src="<?php echo $strPath.$userImage;?>" class="img-circle bordered" style="height:45px; width:45px;"> <span class="caret" style="margin:20px 0px 0px 6px; border-top-color: #ffffff; border-bottom-color: #ffffff;"></span></span>
        <div class="dropdown-menu pull-right">
        <ul>
        	<li><strong><?php echo $_SESSION['adminConsole_FullName']; ?></strong></li>
            <li><?php echo $_SESSION['adminConsole_Desg']; ?></li>
            <li><?php echo $_SESSION['adminConsole_Grade']; ?></li>
  		</ul>
        <div class="btn-group" style="padding:0px 7px;">
        <a href="<?php echo $strPath;?>../dashboard/" class="btn btn-success"><i class="icon-white icon-home"></i> Home</a>
        <a href="<?php echo $strPath;?>../home" class="btn btn-danger"><i class="icon-white icon-off"></i> Logout</a></div>
      </div>
      </div>
    </div>
    </div>
    <div style="float:left; margin:13px 0px 0px 10px; color:#FFF;" class="date">
      <?php
           $strDate=getdate(date("U"));
           print("$strDate[weekday], $strDate[month] $strDate[mday], $strDate[year]");
      ?>
      </div>
	  <div class="clearfix"></div>
	  
  </div>
</div>
<div class="clear">&nbsp;</div>


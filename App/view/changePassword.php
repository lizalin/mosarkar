<?php
	/* ================================================
	File Name         	  : changePassword.php
	Description		  : This is used to change password
	Designed By		  : Rasmi Ranjan Swain
        Designed On		  : 17-Dec-2014
        Devloped On               : 05-Jan-2014
        Devloped By               : Rasmi ranjan swain
	Update History		  :	<Updated by>		<Updated On>		<Remarks>
						
	Style sheet           : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css                                            
	Javscript Functions   : jquery.min.js, bootstrap.min.js, custom.js
	includes			  : changePasswordInner

	==================================================*/
	
?>
<script src="<?php echo APPURL;?>js/validatorchklist.js"></script>
<script language="javascript">
    
	$(document).ready(function () {
		loadNavigation('Change Password');
		
                $('#txtOldPwd').focus();
		<?php if($outmsg!='' && $errFlag>0){?>
			alert('<?php echo $outmsg;?>');
		<?php }else if($outmsg!='' && $errFlag==0){?>
			alert('<?php echo $outmsg;?>');
                        <?php 
                        if($_SESSION['adminConsole_Privilege']==0 || $_SESSION['adminConsole_Privilege']==1 || $_SESSION['adminConsole_UserType']==1){ 
                        ?>
			window.location='<?php echo APPURL;?>dashboard/';
                        <?php } else  {?>
                        window.location='<?php echo APPURL;?>ataDashboard/';
                        <?php } ?>
		<?php }?>
	});
        function validator()
	{
		if(!blankCheck('txtOldPwd','Old Password can not left blank'))
			return false;
		if(!checkSpecialChar('txtOldPwd'))
			return false;
		if(!blankCheck('txtNewPwd','New Password can not left blank'))
			return false;
		if(!checkSpecialChar('txtNewPwd'))
			return false;
		if(!blankCheck('txtConfPwd','Confirm Password can not left blank'))
			return false;
		if(!checkSpecialChar('txtConfPwd'))
			return false;
		if($('#txtNewPwd').val().length<8)
		{
			alert("Password must be 8 digit");
			$('#txtNewPwd').focus();
			return false;
		}
		if($('#txtNewPwd').val() != $('#txtConfPwd').val())
		{
			alert("Passwords must be matched");
			$('#txtConfPwd').focus();
			return false;
		}
	}
</script>

    <div class="page-content">
      <div class="page-header">
        <h1 id="title"></h1>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <div class="top_tab_container"> <a href="<?php echo APPURL?>changePassword" class="btn btn-info active">Change Password</a></div>
          <?php // include('includes/util.php'); ?>
          <div class="hr hr-solid"></div>
            <div class="col-xs-12">
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtOldPwd">Old Password</label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="password" id="txtOldPwd" name="txtOldPwd" placeholder="" class="form-control sentenceCase">
                  <span class="mandatory">*</span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtNewPwd">New Password</label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="password" id="txtNewPwd" name="txtNewPwd" placeholder="" class="form-control sentenceCase">
                  <span class="mandatory">*</span>
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtConfPwd">Confirm Password</label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="password" id="txtConfPwd" name="txtConfPwd" placeholder="" class="form-control sentenceCase">
                  <span class="mandatory">*</span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2 no-padding-right"></div>
                <div class="col-sm-4">
                    <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" class="btn btn-success" onclick="return validator();"/>
                  
                  <input type="reset" id="btnReset" name="btnReset"  class="btn btn-danger" value="Reset"/>
                </div>
              </div>
            </div>
          <div class="hr hr32 hr-dotted"></div>
          <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.page-content -->

 

<?php
/* ================================================
  File Name               : index.php
  Description		: This is page is used for login propose.
  Designed By		: Ramakanta Mishra
  Designed On	      		: 10-02-2016
  Devloped By       		:
  Devloped On       		:
  Update History	  	:
  <Updated by>		<Updated On>		<Remarks>

  Style sheet           	: bootstrap.min.css , login.css
  Javscript Functions   	: jquery.min.js, bootstrap.min.js, custom.js,validator.js,md5.js,loadscript.js
  includes			  	:

  ================================================== */
//if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
//    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//    header('HTTP/1.1 301 Moved Permanently');
//    header('Location: ' . $redirect);
//    exit();
//}
include('indexInner.php'); 
$random = (rand() % 1000);
$_SESSION["salt"] = $random;
//echo $_SESSION["salt"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo TITLE; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="<?php echo URL; ?>styles/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>css/login.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo URL; ?>styles/icons.css">
        <link rel="stylesheet" href="<?php echo URL; ?>css/font-awesome.min.css">
        <script src="<?php echo URL; ?>js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo URL;?>js/jquery.blockUI.js"></script>
        <script src="<?php echo URL; ?>js/custom.js"></script>
        <link rel="shortcut icon" href="<?php echo URL; ?>images/favicon.png" type="image/png">
        <script language="javascript" src="<?php echo APPURL; ?>Console/scripts/validator.js"></script>
        <script language="javascript" src="<?php echo APPURL; ?>Console/scripts/md5.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('form').attr('autocomplete', 'off');
                $('#txtuserID').focus();
                $('#passwordTitle').hide();
                $('.emailInput').hide();
                $('#btnSubmit').hide();
                $('#btnBack').hide();
                $('#forgotPwdLink').click(function () {
                    $('.passwordInput').hide();
                    $('#btnLogin').hide();
                    $('#loginTitle').hide();
                    $('.emailInput').show();
                    $('#btnSubmit').show();
                    $('#btnBack').show();
                    $('#passwordTitle').show();
                    $('.passInput').hide();
                    $('.forgotPwd').hide();
                    $('.captchaLoad').hide();
                    $('.chngTxt').html('Reset Password');
                });

                $('#btnBack').click(function () {
                    $('.passwordInput').show();
                    $('#btnLogin').show();
                    $('#loginTitle').show();
                    $('.emailInput').hide();
                    $('#btnSubmit').hide();
                    $('#btnBack').hide();
                    $('#passwordTitle').hide();
                    $('.passInput').show();
                    $('.forgotPwd').show();
                     $('.captchaLoad').show();
                    $('.chngTxt').html('Sign In');
                });

                $('#btnBack').click(function () {
                    $('.passwordInput').show();
                    $('#btnLogin').show();
                    $('#loginTitle').show();
                    $('.emailInput').hide();
                    $('#btnSubmit').hide();
                    $('#btnBack').hide();
                    $('#passwordTitle').hide();
                });

<?php if ($out_msg != '' && isset($_REQUEST['btnLogin'])) { ?>
                    alert('<?php echo $out_msg; ?>');
<?php } ?>

<?php if ($out_msg != '' && $errFlag > 0) { ?>
                    alert('<?php echo $out_msg; ?>');
                    
<?php } ?>

                //submit the form and assign the values
                $('.login_form').submit(function () {
                    

                    var str = hex_md5($("#txtPassword").val()) + "<?php echo $random; ?>";
                    $("#htxtPassword").val(hex_md5(str));
                    $("#htxtuserID").val($("#txtuserID").val());
                    $("#hdntxtEmailID").val($("#txtEmailID").val());
                    $("#txtuserID").val('');
                    $("#txtPassword").val('');
                    $("#txtEmailID").val('');

                });
            });

            function Validate()
            {
                if (!blankFieldValidation('txtuserID', 'User Id'))
                    return false;
                if (!WhiteSpaceValidation1st('txtuserID'))
                    return false;
                if (!IsSpecialCharacter('txtuserID', 'Special Character Not Alowed !'))
                    return false;
                if (!blankFieldValidation('txtPassword', 'Password'))
                    return false;
                if (!WhiteSpaceValidation1st('txtPassword'))
                    return false;
                if (!IsSpecialCharacter('txtPassword', 'Special Character Not Alowed !'))
                    return false;
                  $.blockUI({ message: '<h4><img style="display: block;margin: 0 auto;" src="<?php echo URL; ?>img/loader-white1.gif" /> Just a moment...</h4>' });
                    // $("#btnLogin").attr('disabled','disabled');
                // if (!blankFieldValidation('txtCaptcha', 'Captcha can not be left blank'))
                //     return false;
            }
            function FPValidate()
            {
                if (!blankFieldValidation('txtuserID', 'User ID'))
                    return false;
                if (!IsSpecialCharacter('txtuserID', 'Special Character Not Alowed !'))
                    return false;
                if (!WhiteSpaceValidation1st('txtuserID'))
                    return false;
                if (!blankFieldValidation('txtEmailID', 'Email-ID'))
                    return false;
                // if (!EmailValidation('txtEmailID'))
                //     return false;
            }
            function generateCaptcha()
            {
                var ranNo = Math.floor((Math.random() * 100) + 1);
                $('#captchaImage').attr('src', '<?php echo URL; ?>includes/captcha.php?' + ranNo);
            }
        </script>

<!--<link rel="manifest" href="<?php //echo URL;?>manifest.json">
 <script src="<?php //echo URL;?>pwa/app.js" defer></script> -->
       <style>
       .maintenance_msg{
        font-size: 18px;
    color: red;
    line-height: 29px;
    text-align: center;
    left: 155px;
    top: 55px;
    font-weight: bold;
}
       }
       </style> 
<!-- <style>
    #snackbar {
      visibility: hidden;
      min-width: 250px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
      z-index: 9999;
      left: 16px;
      right: 16px;
      top: 30px;
      font-size: 14px;
    }
    
    #snackbar.show {
      visibility: visible;
      -webkit-animation: fadein 1s, fadeout 1s 5s;
      animation: fadein 1s, fadeout 1s 5s;
    }
    
    @-webkit-keyframes fadein {
      from {top: 0; opacity: 0;} 
      to {top: 30px; opacity: 1;}
    }
    
    @keyframes fadein {
      from {top: 0; opacity: 0;}
      to {top: 30px; opacity: 1;}
    }
    
    @-webkit-keyframes fadeout {
      from {top: 30px; opacity: 1;} 
      to {top: 0; opacity: 0;}
    }
    
    @keyframes fadeout {
      from {top: 30px; opacity: 1;}
      to {top: 0; opacity: 0;}
    }
    @media (min-width:768px) {
        #snackbar {
            display: none;
        }
    }
  </style> -->
    </head>
    <body id="loginBodyBg">
  <!-- <div id="snackbar">Please add this app to home screen</div> -->
 <div class="login">
          <!-- <p class="text-left">Officials can now record feedbacks online, even those are collected offline, through the link <br><span class="text-primary">Calls->Offline Feedback Entry</span></p>  -->
            <div class="login__back">
               <div class="login__header">
                  <img src="<?php echo APPURL; ?>images/logo.gif" alt="FSCW" style="width:480px;height: 80px;">
                <!--   <h4>FSCW <br> <small>Government of Odisha</small></h4> -->
               </div>
               <div class="login__back__content">
                  <div class="form-group">
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="icon-user1"></i></span>
                        </div>
                        
                          <input tabindex="1" type="text" class="form-control" placeholder="User Id" size="70" id="txtuserID" name="txtuserID"/>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group mb-2">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="icon-lock1"></i></span>
                        </div>
                        
                        <input tabindex="3" type="password" placeholder="Password" size="70" id="txtPassword" class="passInput form-control" autocomplete="off" name="txtPassword"/>
                        <input tabindex="2" type="text" placeholder="Enter Email / Mobile no" size="70" class="emailInput form-control" autocomplete="off" id="txtEmailID" name="txtEmailID"/>
                     </div>
                  </div>
                    <form role="form" class="login_form" method="post">
                        <!-- <div style="display: flex;align-items: center;" class="captchaLoad">

                            <div style="flex: 1;">
                                <input tabindex="4"  name="txtCaptcha" type="text" autocomplete="off" class="passwordinput form-control" tabindex="4" style="width: calc(100% - 30px);padding: 12px;" id="txtCaptcha" onKeyUp="return blockspecialchar_first(this);" autocomplete="off" maxlength="20" placeholder="Captcha"/>

                            </div>

                            <div style="width: 118px;padding-top: 9px;">
                                <img src="<?php echo URL; ?>includes/captcha.php" style="height: 38px; " alt="captcha image" align="absmiddle" style="" id="captchaImage"/>
                            </div> 
                            <div style="text-align: right;">
                                <button type="button" style="border: 0px;height: 36px;cursor: pointer;width: 36px;background: transparent;"> <i class="fa fa-refresh" id="reload" onClick="generateCaptcha();" aria-hidden="true" style=""></i></button>
                            </div>

                        </div> -->
                        <input type="hidden"  id="htxtuserID" name="htxtuserID"  />
                        <input type="hidden"  id="htxtPassword" name="htxtPassword" />
                        <!-- <input type="hidden"  id='hdntxtEmailID' name="txtEmailID" value=""> -->
                        <input type="submit" id="btnLogin" name="btnLogin" value="Login" class="login-btn mt-4 " onClick="return Validate();" style="cursor:pointer;"/>

                        <!-- <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" class="login-btn mb-2" onClick="return FPValidate();" style="cursor:pointer;"/> -->
                        <!-- <input type="button" id="btnBack" name="btnBack" value="Back" class="backBtn login-btn"/> -->

                    </form>
                    <div class="clearfix"></div>

                
                   <!-- <p class="forgotPwd">Forgot Password? <a href="javascript:void(0);" id="forgotPwdLink" class="">Click here</a></p> -->
               </div>
            </div>
         </div>
<!-- <div class="footer text-center mt-4 text-light">Copyright &copy; <?php echo date('Y'); ?> Mosarkar, All Rights Reserved.</div> -->


      


    </body>
</html>

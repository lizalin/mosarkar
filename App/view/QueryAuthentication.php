<?php
/* ================================================
  File Name      : Query-Authentication.php
  Description	 : This is used for Query Authentication .
  Created On     : 27 Sept 2017
  Created By     : Manali Ranjan

  Update History :	<Updated by>		<Updated On>		<Remarks>

  Style sheet    : datepicker.css
  Javscript Functions   : bootstrap-datepicker.min.js, validatorchklist.js
  includes		: util.php
  ================================================== */

?>
<link rel="stylesheet" href="<?php echo URL; ?>css/datepicker.css">
<script src="<?php echo URL; ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo URL; ?>js/validatorchklist.js"></script>

<script language="javascript">
    $(document).ready(function () {
        loadNavigation('Query Authentication');
        $('[data-rel=tooltip]').tooltip();
//        /*Used for Datepicker*/
//        $('.date-picker').datepicker({
//            autoclose: true,
//            todayHighlight: true
//        });

           $('#OTP').hide();
    });
    function queryAuth(){
      var mobileNo = $('#txtmobilenm').val();  
       if(!validMobileNo('txtmobilenm','Give the valid Mobile Number '))
            return false;
       $('#loader').html('<i class="fa fa-spinner fa-spin"></i> Procesing...')  ;
       var userId = '<?php echo USER_ID;?>';
        Query(mobileNo,userId);
       // $('#OTP').show();
    }
</script>
<style>
    .tdBold{font-weight: bold;}
</style>
<div class="page-content">
    <div class="page-header">
        <h1 id="title" class="col-sm-5"></h1>
    </div>


    <div class="row">

        <div class="col-xs-12"> 
        <div class="form-group" id="mobno" >
            <label class="col-sm-2 control-label no-padding-right">ENTER YOUR MOBILE NUMBER </label>
            <div class="col-sm-3"> <span class="colon">:</span>
                <input type="text" class="form-control" id="txtmobilenm" value="" name="txtmobilenm" autocomplete="off"> 
            <span class="mandatory">*</span>                                 

            </div>
            <div class="col-sm-1 col-sm-offset-0.5">
            <input type="button" id="mblnm" name="btnSubmit" value="Send" class="btn btn-success"  onclick="return queryAuth();"><span id="loader"></span><span id="readonly"></span>
<!--       alert();-->
        </div>
     
     </div>

    <div class="row" id="OTP">

        <div class="col-xs-12">
        <div class="form-group" id="otp" >
            <label class="col-sm-2 control-label no-padding-right"> GENERATE OTP</label>
            <div class="col-sm-3"> <span class="colon">:</span>
            <input type="text" class="form-control" id="txtotp" value="" name="txtotp" autocomplete="off">
              </div>
            <div class="col-sm-1 col-sm-offset-0.5">
            <input type="button" id="btnSubmit" name="btnSubmit" value="Verify" class="btn btn-success" onclick="return validator();">
       
            </div>                             

        </div>
        </div>
        </div>
    </div>
    </div>

   
    




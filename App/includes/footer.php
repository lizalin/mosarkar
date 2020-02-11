<div class="modal fade in" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4 class="alertMessage center"></h4>
        <div class="form-group">
          <div class="center"> <a class=" btn btn-danger btn-sm" id="btnAlertOk" data-dismiss="modal" style="width:100px; margin-top:30px;">Ok</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade in" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4 class="confirmMessage center"></h4>
        <div class="form-group">
          <div class="center"> 
		  <a class=" btn btn-success btn-sm" id="btnConfirmOk" data-dismiss="modal" style="width:100px; margin-top:30px;">Ok</a> 
		  <a class=" btn btn-danger btn-sm" id="btnConfirmCancel" data-dismiss="modal" style="width:100px; margin-top:30px;">Cancel</a> 
		  
		  </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Session Alert Modal-->
<div class="modal fade in" id="sessionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-sm-3"><img src="<?php echo URL; ?>img/alert-warning.png" width="100" /></div>
                    <div class="col-sm-8">
                        <h4 class="center">Your session will expire in <span class="sessionMessage red"></span> Seconds.<br/>Save your application </h4>

                    </div>
                    <div class="center"> 
                        <a class=" btn btn-success btn-sm" id="btnStayLogin" data-dismiss="modal" style="width:100px; margin-top:30px;">Stay Login</a>
                        <a class=" btn btn-danger btn-sm" data-dismiss="modal" style="width:100px; margin-top:30px;">Close</a> 

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Pop up for Buzz feature-->
<div class="modal fade" id="buzzModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel10">&nbsp;&nbsp;Buzz Ticket <img src="<?php echo URL . 'img/alarm.png'; ?>" alt="Buzz" class="pull-left cls-social-logo-place" /></h4>
            </div>
            <div class="modal-body" id="">
                
                <div id="firstSection">
                    <input type="hidden" name="buzzTicketId" id="buzzTicketId" value="" />
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" id="txt-buzz-message" for="txt-to-date">Buzz Message</label>
                        <div class="col-lg-6 col-sm-3"> <span class="colon">:</span>

                            <textarea name="txtBuzzMessage" id="txtBuzzMessage" class="form-control" onKeyUp="return TextCounter('txtBuzzMessage', 'lblChar1', 500)" onMouseUp="return TextCounter('txtBuzzMessage', 'lblChar1', 500)"></textarea>
                            <span class="red"> Maximum <span id="lblChar1">500</span> characters</span>
                            <span class="mandatory">*</span> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <input type="button" name="btnSend" id="btnSend" value="Send" class="btn btn-success" onclick="sendBuzzNotification();" /><span id="buzzLoader"></span>
                            
                        </div>
                    </div>
                </div>
                  
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalReport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalReportLbl">Report</h4>
            </div>
            <div id="imgLoader" align="center"></div>
            <div class="modal-body" id="">
                <div class="form-group" >
                    <label class="col-sm-3 control-label no-padding-right" for="ddl-status">Total No Of Records </label>
                    <div class="col-sm-3"> <span class="colon">:</span>
                        <select name="selRecords" id="selRecords" class="form-control">
                            <option value="0-100">0-100</option>
                            <option value="100-500">100-500</option>
                            <option value="500-1000">500-1000</option>
                            <option value="0">ALL</option>
                        </select> 
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-sm-3 control-label no-padding-right" for="ddl-status"></label>
                    <div class="col-sm-3"> <span class="colon"></span>
                        <input type="submit" name="btnRec" id="btnRec" value="Submit" class="btn btn-info" onclick="$('#myModalReport').modal('toggle');" />
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--Custom Message Div-->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="mymessageModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="mymessageModalLabel">Message</h4> 
      </div>
      <div class="modal-body">
           <div class="alert alert-info" id="manualMessage">
            
            </div>
      </div>
           <div class="modal-footer">
                <button type="button" class="btn btn-default confirm" id="readBtn" data-rowid="" data-dismiss="modal">OK</button>
            </div>
      
    </div>
  </div>
</div>


 

<!-- /.main-content -->
</div>
<!-- /.main-container -->
</div>
<!--<div class="footer footer-fixed">
  <div class="footer-inner">
    <div class="footer-content" style="padding-left:10px;">Copyright &copy; <?php echo date(Y);?> Accuman, All Rights Reserved.</div>
  </div>
</div>-->

<!-- basic scripts -->
<input type="hidden" name="hdnActionType" id="hdnActionType" value="">
<input type="hidden" id="hdnMediafrom" name="hdnMediafrom" value="0" />
<input type="hidden" id="hdnMediaPopup" name="hdnMediaPopup" value="0" />
</form>
<script src="<?php echo APPURL;?>dev_scripts/loadJson.js"></script>

<script src="<?php echo URL;?>js/bootstrap-datepicker.min.js"></script> 

<script src="<?php echo URL;?>js/slimscrollbar.min.js"></script> 

<script type="text/javascript">
  // Slim scroll funtion
  (function($){
    $(" .dashboard-portlet__content__details, .fixed-height ,.agent-portlet-body,.dashboard-left,.fixed-height,.action-list").mCustomScrollbar({
      theme:"inset-2-dark"
    });

  })(jQuery);
// Slim scroll funtion
  

$(document).ready(function(){
// Tool Tip
    $('[data-toggle="tooltip"]').tooltip();
// Tool Tip
// Date picker
$('.datepicker').datepicker({
format: "dd-M-yyyy",
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true
});
// Date picker

$('.menubtn').on("click",function(){
$('.top-menu').toggleClass('active');

});


$('.sidebar-collapse').on("click",function(){
  $('.main-container').toggleClass('active');
})

$(".hsub").on("click",function(e){
  
  e.stopPropagation();
  $('.nav-list').css("display","block");
  $(this).find('.submenu').show();
  $('.menu-list').css("display","block!important");
})
    // Btn web effect

$(".btn").click(function (e) {
  

  $(".ripple").remove();

  var posX = $(this).offset().left,
      posY = $(this).offset().top,
      buttonWidth = $(this).width(),
      buttonHeight =  $(this).height();
  
  
  $(this).prepend("<span class='ripple'></span>");

  
 
  if(buttonWidth >= buttonHeight) {
    buttonHeight = buttonWidth;
  } else {
    buttonWidth = buttonHeight; 
  }
  
 
  var x = e.pageX - posX - buttonWidth / 2;
  var y = e.pageY - posY - buttonHeight / 2;
  
 
  
  $(".ripple").css({
    width: buttonWidth,
    height: buttonHeight,
    top: y + 'px',
    left: x + 'px'
  }).addClass("rippleEffect");
});

// Btn web effect

// Search panel
$('.searchopen').on('click',function(){
$('.search-sec').slideToggle('open');
$(this).find('i').toggleClass('icon-up-arrow icon-angle-arrow-down')
})
// Search panel
})


</script>

</body></html>

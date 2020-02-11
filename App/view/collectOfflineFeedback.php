<?php 
/* =================================================
  File Name             : collectOfflineFeedback.php
  Description           : This is used for Collect Offline Feedback.
  Developed By          : Niranjan Pandit
  Developed On          : 17-Oct-2019
  Update History        : <Updated by>    <Updated On>    <Remarks>

  Style sheet           :
  Javscript Files       :
  includes              :

  ================================================== */
?>

<style>
  .radio label:before{
    top: 0px!important;
  }
  .odiya{
    display: none;
  }
  .feedback-categories {
    background: none;
    padding: 10px;
    margin-bottom: 0px; 
    min-height: 0px; 
    position: relative;
  }
  .feedback-label {
    font-size: 1rem;
    color: #000;
    margin-bottom: .3rem;
    line-height: 1.4rem;
  }

</style>
  <div class="mainpanel">
    <div class="section">
    <!-- <div class="text-center txt-center-center loader"><img style="width: 6%;" src="<?php echo APPURL;?>img/loader-white1.gif" ></div> -->
       <div class="row">
          <div class="col-md-  col-sm-12">
             <div class="card">
                <div class="card-header">
                  <div class="indicatorslist">
                    <p class="ml-2">(*) Indicates mandatory </p>
                  </div>
                  <h6>
                    Collect Offline Feedback
                  </h6>
                  <div class="clearfix"></div>
                </div>
                <!-- BASIC FORM ELEMENTS -->
                <!--===================================================-->
                <div class="card-body">
                   <!--Static-->
                  <input type="hidden" name="hdn_qs" id="hdn_qs" value="">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-lg-2 col-md-2  control-label" for="demo-email-input">Mobile No. <span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-4">
                          <span class="colon">:</span>
                          <div class="input-group">
                          <input type="text" id="vchMobileNo" name="vchMobileNo" class="form-control"  maxlength="10" onkeypress="return isNumberKey(event);">
                          <span class="input-group-addon" onclick="getOfflineFeedbackData();" style="cursor: pointer;"><i class="icon-search1"></i></span>
                          </div>
                        </div>
                     </div>
                      <hr>
                      <div class="form-group">
                        <div id="feedbackData">
                          <!-- <div class="portlet__body">
                            <div class="table-responsive">
                              <table data-toggle="table" class="table table-hover table-bordered"> 
                                <tr> 
                                  <th width="40px">Sl#</th>
                                  <th>Name</th>
                                  <th>Mobile</th>
                                  <th>District</th>
                                  <th>Source</th>
                                  <th>Department &amp; Service</th>
                                  <th>Institution</th>
                                  <th>Date</th>
                                  <th>Call History</th>
                                  <th>Action</th>
                                </tr>
                                <tr id="bookMarked74329_1">
                                  <td>1</td>
                                  <td>INDU NAYAK<br><small class="text-info"><strong>Gender:</strong> Female, <strong>Age:</strong> 55 years</small></td>
                                  <td>7789902575</td> 
                                  <td>Ganjam</td> 
                                  <td>Dept.</td> 
                                  <td>Health &amp; Family Welfare <br><small class="text-info"><strong>Service:</strong> OPD</small></td>
                                  <td>Sohela CHC </td>
                                  <td>09-10-2019</td>
                                  <td><a class="btn btn-primary  btn-sm" href="javascript:void(0)" onclick="DisplayCallLog(6371702524)">View</a></td>
                                  <td><a class="btn btn-success btn-sm" href="javascript:void(0)" onclick="showFeedbackQuestionAnswer(12,2,555,1)">Feedback</a></td>
                                </tr>
                              </table>
                            </div>
                          </div> -->
                          <!-- <div class="text-center  no-content" style="font-size: 100px; padding: 0.5em 0px;">
                            <i class="fa icon-loader1 fa-spin"></i>
                          </div>
                          <div class="text-center no-content"><h4>No Records Found...</h4></div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END BASIC FORM ELEMENTS -->
             </div>
          </div>
       </div>
    </div>
 </div>
<div class="modal fade" id="DisplayCallLog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Call History</h4>

            </div>
            <div class="modal-body" id="divCallInfo" style="padding: 20px;">
                 
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="UpdateFeedbackAnswer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Feedback</h4>
                <input type="hidden" name="intOutboundDataId" id="intOutboundDataId" value="0">
                <input type="hidden" name="dataType" id="dataType" value="0">
            </div>
            <div class="modal-body" style="padding: 20px;">
                <div class="form-group" style="padding-bottom: 20px;">
                  <div class="col-sm-6">
                    <div class="col-sm-4 feedback-label">
                      <h6><strong>Status :</strong></h6>
                    </div>
                    <div class="col-sm-8">
                      <select onchange="showHideFeedbackQuestionAsnwer(this.value)" class="from-control container-fluid"  id="intFeedbackStatus" name="intFeedbackStatus">
                        <option value="0">-Select Status-</option>
                      <?php foreach (FEEDBACK_CALL_STATUS as $key => $statusName) {  if($key > 0){ ?>         
                        <option value="<?php echo $key; ?>"><?php echo $statusName; ?></option>
                      <?php } } ?>
                      </select> 
                    </div>
                  </div>
                </div>
                <div class="form-group" id="btnFeedbackSubmit">
                  <div class="col-sm-6">
                    <button type="button" class="btn btn-success" id="submitBtnFeedbackAnswer" onclick="return submitFeedbackAnswer()">Submit</button>
                  </div>
                </div>
                <div class="form-group">
                 <div id="divFeedbackAnswer" style="display: none;">

                 </div>
               </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URL;?>js/jquery.blockUI.js"></script>
<script language="javascript">
  $(document).ready(function(){
    <?php  
    if($outMsg != ''){
    ?>
    viewAlert('<?php echo $outMsg ?>','','<?php echo $redirectLoc ?>');
    <?php
    }
    ?>
  })

  function showHideFeedbackQuestionAsnwer(vchValues){
    if(vchValues == 1){
      $('#divFeedbackAnswer').show();
      $('#btnFeedbackSubmit').hide();
    }else{
      $('#divFeedbackAnswer').hide();
      $('#btnFeedbackSubmit').show();
    }
  }

  function DisplayCallLog(vchMobile){
    $('#DisplayCallLog').modal('show');
    getCallInformation(vchMobile)
  }
  $(document).on('keypress', '#vchMobileNo', function (e) {
    if (e.keyCode == 13) {
      e.preventDefault(); 
      getOfflineFeedbackData();
    }
  });
  function submitFeedbackAnswer(){
    if(!selectDropdown('intFeedbackStatus', 'Please Select Status')){
      return false;
    }
    var vchStatus = 0;
    if($('#intFeedbackStatus').val() == 1){
      $('.feedback-categories').each(function(){
        var vchOptionName = $(this).find('.option-redio').attr('name');
        if(!$(this).find("input[name='"+vchOptionName+"']:checked").val()){
          viewAlert('Please Select Answer for All Questions');
          ++vchStatus;
          return false;
        }
      })
    }
    if(vchStatus == 0){
      $('#hdn_qs').val('U');
      $('#submitBtnFeedbackAnswer').attr('onclick', '');
      $('#submitBtnFeedbackAnswer').attr('disabled', 'disabled');
      $('#submitBtnFeedbackAnswer').html('<i class="fa fa-spinner fa-spin"></i>');
      $('form').submit();
      // FeedbackSubmitAuthority();
    }
  }
  function showFeedbackQuestionAnswer(intDepartmentId, intServiceId, intOutboundDataId, dataType){
    $('#UpdateFeedbackAnswer').modal('show');
    $('#divFeedbackAnswer').html('<div class="text-center"><i class="fa icon-loader1 fa-spin"></i></div>');
    $('#intOutboundDataId').val(intOutboundDataId);
    $('#dataType').val(dataType);
    $.ajax({
      type: "POST",
      url: URL + '/proxy',
      dataType: "json",
      data: {method: 'showFeedbackQuestionAnswer',intDepartmentId:intDepartmentId,intServiceId:intServiceId,csrf_token_id:csrf_token_val},
      success: function (data) {
        $('#divFeedbackAnswer').html(data.result);
      }
    });
  }



</script>
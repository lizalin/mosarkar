<?php 
/* =================================================
  File Name             : dashboard.php
  Description     : This is used for  display new dashboard.
  Developed By            : Ashis kumar Patra
  Developed On            : 01-Jan-2017
  Update History          : <Updated by>    <Updated On>    <Remarks>

  Style sheet             :
  Javscript Files         :
  includes      :

  ================================================== */
?>


          <div class="mainpanel">
            <div class="section">
            <div class="text-center txt-center-center loader"><img style="width: 6%;" src="<?php echo APPURL;?>img/loader-white1.gif" ></div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                            <div class="indicatorslist">
                              <!-- <a title="" href="javascript:void(0)" id="refreshIcon" data-toggle="tooltip" data-placement="top" onclick="return location.reload();" data-original-title="Refresh"><i class="icon-reuse"></i></a>
                              <a title="" href="javascript:void(0)" onclick="window.history.back()" id="backIcon" data-toggle="tooltip" data-placement="top" data-original-title="Back"><i class="icon-arrow-left1"></i></a> -->
                              <p class="ml-2">(*) Indicates mandatory </p>
                           </div>
                           <h6>
                             Inbound Call Registration
                           </h6>
                          
                           <div class="clearfix"></div>
                        </div>
                        <!-- BASIC FORM ELEMENTS -->
                   
                        <!--===================================================-->
                        <div class="card-body">
                           <!--Static-->
                          <div class="row">
                            <div class="col-md-6">
                                   <div class="form-group row">
                              <label class="col-lg-3 col-md-4  control-label" for="demo-email-input">Mobile No. <span class="text-danger">*</span></label>
                              <div class="col-lg-6 col-md-6">
                                 <span class="colon">:</span>
                                 <div class="input-group">
                                <!-- <input type="text" class="form-control" > -->
                                <input type="text" id="vchMobileNo" aria-label="Amount (rounded to the nearest dollar)" name="vchMobileNo" class="form-control" value='<?php echo($vchMobileNo); ?>'  maxlength="10" onKeyPress="return isNumberKey(event);">
                                <span class="input-group-addon" onclick="getInboundInformation();" style="cursor: pointer;"><i class="icon-search1"></i></span>
                                </div>
                               
                              </div>
                              <div class="col-lg-2 col-md-2">
                                <button type="button" class="btn btn-danger" onclick="showNotRegisterModel()">Other Calls</button>
                                <!-- <span class="input-group-addon" onclick="getInboundInformation();" style="cursor: pointer;">Not Register</span> -->
                              </div>
                           </div>
                           <hr>
                           <div class="form-group row">
                              <label class="col-lg-3 col-md-4  control-label" for="demo-email-input">Is Anonymous User ?</label>
                              <div class="col-lg-8 col-md-7">
                                 <div class="checkbox">
                                    <input id="anonymous-form-checkbox" value="0" class="magic-checkbox" name="intAnonymousUserStatus" type="checkbox" onclick="checkAnonymousUser();">
                                    <label for="anonymous-form-checkbox">Yes</label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-lg-3 col-md-4  control-label" for="demo-email-input">Name <span class="text-danger anonymous-cls">*</span></label>
                              <div class="col-lg-8 col-md-7">
                                 <span class="colon">:</span>
                                 <input type="text" id="vchName" name="vchName" class="form-control"placeholder="Enter Name" value='<?php echo($vchName); ?>' maxlength="100"  onKeyPress="return isCharKey(event);">
                              </div>
                           </div>
                          <!--  <div class="form-group row">
                              <label class="col-lg-3 col-md-4 control-label" for="demo-email-input">Email <span class="text-danger">*</span></label>
                              <div class="col-lg-8 col-md-7">
                                 <span class="colon">:</span>
                                  <input type="text" id="vchEmail" name="vchEmail" class="form-control"placeholder="Enter Email" value='<?php //echo($vchEmail); ?>'  maxlength="50" >
                              </div>
                           </div> -->
                           <div class="form-group row">
                              <label class="col-lg-3 col-md-4 control-label" for="demo-email-input">Gender <span class="text-danger anonymous-cls">*</span></label>
                              <div class="col-lg-8 col-md-7">
                                 <span class="colon">:</span>
                                 <div class="radio">
                                    <input id="intGenderId_1" class="magic-radio" value="1" type="radio" name="intGenderId" <?php echo (empty($intGenderId) ||$intGenderId == 1)?"checked":''; ?>>
                                    <label for="intGenderId_1">Male</label> &nbsp;&nbsp;
                                    <input id="intGenderId_2" class="magic-radio" type="radio" value="2" name="intGenderId" <?php echo (!empty($intGenderId) ||$intGenderId == 2)?"checked":''; ?>>
                                    <label for="intGenderId_2">Female</label>
                                   <input id="intGenderId_3" class="magic-radio" type="radio" value="3" name="intGenderId" <?php echo (!empty($intGenderId) ||$intGenderId == 3)?"checked":''; ?>>
                                    <label for="intGenderId_3">Transgender</label>

                                 </div>
                                 <!-- <small class="help-block text-primary">Please enter your email</small> -->
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-lg-3 col-md-4  control-label" for="demo-email-input">Age <span class="text-danger anonymous-cls">*</span></label>
                              <div class="col-lg-8 col-md-7">
                                 <span class="colon">:</span>
                                 <input type="text" id="intAge" name="intAge" class="form-control"placeholder="Enter Age" value='<?php echo($intAge); ?>' maxlength="3" onKeyPress="return isNumberKey(event);">
                              </div>
                           </div>
                           <!-- <div class="form-group row">
                              <label class="col-lg-3 col-md-4 control-label" for="demo-email-input">District<span class="text-danger">*</span></label>
                              <div class="col-lg-8 col-md-7">
                                 <span class="colon">:</span>
                                 <select class="form-control seldynamic" name="intDistrictId" id="intDistrictId" onchange="showHospitalPolice();">
                                 </select>
                                 <input type="hidden" name="hdnNo" id="hdnNo"/>
                              </div>
                           </div> -->
                           <div class="form-group row">
                              <label class="col-lg-3 col-md-4 control-label" for="demo-email-input">Department <span class="text-danger">*</span></label>
                              <div class="col-lg-8 col-md-7">
                                 <span class="colon">:</span>
                                 <select class="form-control" name="intDepartmentId" id="intDepartmentId"  onchange="getDeptWiseService('intServicesId',this.value,0);showHospitalPolice();">
                                    <!-- <option>--Select--</option>
                                    <option value="">FIR Service</option> -->
                                 </select>
                                 <!-- <small class="help-block text-primary">Please enter your email</small> -->
                              </div>
                           </div>
                             <div class="form-group row">
                              <label class="col-lg-3 col-md-4 control-label" for="demo-email-input">Service <span class="text-danger">*</span></label>
                              <div class="col-lg-8 col-md-7">
                                 <span class="colon">:</span>
                                 <select class="form-control" name="intServicesId" id="intServicesId">
                                    <option>--Select Service--</option>
                                    <!-- <option value="">FIR Service</option> -->
                                 </select>
                                 <!-- <small class="help-block text-primary">Please enter your email</small> -->
                              </div>
                           </div>
                           
                            <div class="form-group row" style="display: none;" id="PoliceStationId">
                              <label class="col-lg-3 col-md-4 control-label" for="demo-email-input" id="">Police Station Name<span class="text-danger">*</span></label>
                              <div class="col-lg-3 col-md-3">
                                 <span class="colon">:</span>
                                 <select class="form-control seldynamic" name="intPoliceDistrictId" id="intPoliceDistrictId" onchange="getDeptWisePolice('intPoliceId',this.value,0);">
                                 </select>
                                 <input type="hidden" name="hdnNo" id="hdnNo"/>
                              </div>
                               <div class="col-lg-5 col-md-4">
                                 <select class="form-control seldynamic" name="intPoliceId" id="intPoliceId"  onclick="checkPoliceOther();">
                                   <option value="0">--Select Police Station--</option>
                                 </select>
                              </div>
                              <!-- <div class="col-lg-8 col-md-7">
                                 <span class="colon">:</span>
                                 <input type="text" id="int_hs_ps_id" name="int_hs_ps_id" class="form-control" maxlength="256"  >
                                  <div id="proposalVal" class="resultBox"></div>
                                 
                              </div> -->
                           </div>
                           <div class="form-group row" style="display: none;" id="HospitalId">
                              <label class="col-lg-3 col-md-4 control-label" for="demo-email-input" id="">Hospital Name<span class="text-danger">*</span></label>
                              <div class="col-lg-3 col-md-3">
                                 <span class="colon">:</span>
                                 <select class="form-control seldynamic" name="intHospitalDistrictId" id="intHospitalDistrictId" onchange="getDeptWiseHospital('intHospitalId',this.value,0);">
                                 </select>
                                 <input type="hidden" name="hdnNo" id="hdnNo"/>
                              </div>
                               <div class="col-lg-5 col-md-4">
                                 <select class="form-control seldynamic" name="intHospitalId" id="intHospitalId" onclick="checkHospitalOther();">
                                   <option value="0">--Select Hospital--</option>
                                 </select>
                              </div>
                           </div>
                          <div class="form-group row" id="otherId" style="display: none;">
                              <label class="col-lg-3 col-md-4  control-label" for="demo-email-input" id="label-service-name">Name <span class="text-danger">*</span></label>
                              <div class="col-lg-8 col-md-7">
                                 <span class="colon">:</span>
                                 <input type="text" id="vchOther" name="vchOther" class="form-control" placeholder="" value='<?php echo($vchOther); ?>' maxlength="100" >
                              </div>
                           </div>
                            <div class="form-group row">
                              <label class="col-lg-3 col-md-4  control-label" for="demo-email-input" >Service Availed Aate </label>
                              <div class="col-lg-8 col-md-7">
                                 <span class="colon">:</span>
                                 <input type="text" id="vchServiceDate" name="vchServiceDate" class="form-control" placeholder="" readonly="readonly" >
                              </div>
                           </div>
                          <div class="form-group row">
                              <label class="col-lg-3 col-md-4 control-label" for="demo-email-input">Tag Location<span class="text-danger anonymous-cls">*</span></label>
                              <div class="col-lg-8 col-md-7">
                                 <span class="colon">:</span>
                                 <input type="text" id="intLocation" name="intLocation" class="form-control" maxlength="256" onKeyup="$.fillLocationNameValue('proposalVal','intLocation',this.value);" >
                                  <div id="proposalVal" class="resultBox"></div>
                                 <input type="hidden" id="hdnPropId" name="hdnPropId" value="0">
                                 <input type="hidden" id="hdnNamefrm" name="hdnNamefrm" value="<?php echo $namefrm; ?>">
                                 
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-lg-3 col-md-4 control-label" for="demo-text-input">Address <span class="text-danger anonymous-cls">*</span></label>
                                <div class="col-lg-8 col-md-7">
                                  <span class="colon">:</span>
                                  <textarea id="vchAddress" rows="5" name="vchAddress" class="form-control" placeholder="Enter Address" maxlength="300"></textarea>
                                </div>
                           </div>
                           
                           <div class="form-group row">
                              <label class="col-lg-3 col-md-4 control-label" for="demo-text-input">Call Summary <span class="text-danger">*</span></label>
                                <div class="col-lg-8 col-md-7">
                                  <span class="colon">:</span>
                                  <textarea id="vchComplain" rows="5" name="vchComplain" class="form-control" placeholder="Enter Call Summary"  maxlength="500"></textarea>
                                </div>
                           </div>
                            <div class="form-group row">
                              <label class="col-lg-3 col-md-4 control-label"></label>
                              <div class="col-lg-8 col-md-7">
                                 <button type="button" class="btn btn-primary mb-1" onclick="return validateForm();" id="addInboundBtn">Submit</button>
                                 <button type="reset" class="btn btn-danger mb-1">Reset</button>
                                  <input type="hidden" name="hdnQs" id="hdnQs" value="">
                              </div>
                           </div>
                          
                            </div>
                            <div class="col-md-6">
                               <h6>Call History</h6>
                               <div class="call-history" id="divCallInfo">

                                  <?php /*<div class="table-responsive">
                                   <table class="table table-bordered">
                                    <tr><th width="40px">Sl#</th><th width="100px">Date</th><th>Type</th><th>Call Summary</th></tr>
                                    <tr>
                                      <td>1</td>
                                      <td>02-Aug-2019</td>
                                      <td>Inbound </td>
                                      <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<a data-toggle="tooltip" title="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled"><i class="icon-more-horizontal1"></i></a></td>
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>03-Aug-2019</td>
                                      <td>Outbound </td>
                                      <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<a data-toggle="tooltip" title="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled"><i class="icon-more-horizontal1"></i></a>

                                      <span class="d-block"><strong>Date : </strong><span>04-Jly-2019</span></span>
                                      <span class="d-block"><strong>Status : </strong><span>--</span></span>
                                      </td>
                                    </tr>
                                  </table>
                                </div> */ ?>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!--===================================================-->
                        <!-- END BASIC FORM ELEMENTS -->
                     </div>
                  </div>
               </div>
            </div>
         </div>

<div class="modal fade" id="NotRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Not Registered Call</h4>

            </div>
            <div class="modal-body" style="padding: 20px;">
                 <div class="form-group row">
                    <label class="col-lg-3 col-md-4 control-label" for="vchNotRegMobile">Mobile No <span class="text-danger anonymous-cls">*</span></label>
                      <div class="col-lg-8 col-md-7">
                        <span class="colon">:</span>
                        <input type="tel" name="vchNotRegMobile" maxlength="10" id="vchNotRegMobile" class="form-control" placeholder="Mobile No" onkeypress="return isNumberKey(event)">
                      </div>
                 </div>
                 <div class="form-group row">
                    <label class="col-lg-3 col-md-4 control-label" for="vchNotRegDistrict">District <span class="text-danger anonymous-cls">*</span></label>
                      <div class="col-lg-8 col-md-7">
                        <span class="colon">:</span>
                        <select name="vchNotRegDistrict" id="vchNotRegDistrict" class="form-control">
                          <option>--Select District--</option>
                        </select>
                      </div>
                 </div>
                 <div class="form-group row">
                    <label class="col-lg-3 col-md-4 control-label" for="vchNoteCallSummary">Call Summary <span class="text-danger anonymous-cls">*</span></label>
                      <div class="col-lg-8 col-md-7">
                        <span class="colon">:</span>
                        <textarea id="vchNoteCallSummary" rows="5" name="vchNoteCallSummary" class="form-control" placeholder="Call Summary" maxlength="200"></textarea>
                      </div>
                 </div>
                 <div class="form-group row">
                    <div class="col-lg-3 col-md-4"></div>
                      <div class="col-lg-8 col-md-7">
                    <button type="button" class="btn btn-primary mb-1" onclick="return validateFormNotRegister();" id="NotRegisterSubmit">Submit</button>
                  </div>
                 </div>
            </div>
        </div>
    </div>
</div>
<?php 
         $date = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
        $curentDateTime = $date->format('Y-m-d H:i:s');
        $_SESSION['dtmCallStart']   = $curentDateTime;
        $_SESSION['onlyOnce']   = 1;
    ?>
    <script src="<?php echo URL;?>js/jquery.blockUI.js"></script>
<script language="javascript">
    function showNotRegisterModel(){
      getDistrictList('vchNotRegDistrict',0);
      $('#vchNotRegMobile').val($('#vchMobileNo').val());
      $('#NotRegister').modal('show');
    }
    function validateFormNotRegister(){
      if(!blankCheck('vchNotRegMobile','Mobile No. can not be left blank'))
          return false;
      if (!equalLength('vchNotRegMobile', 10, 'Mobile No.'))
           return false;
      if(!blankCheck('vchNoteCallSummary','Call Summary can not be left blank'))
          return false;
      if(!maxLength('vchNoteCallSummary',200,'Call Summary'))
          return false;
      if(!checkSpecialChar('vchNoteCallSummary')) 
          return false; 

      $('#hdnQs').val('A');
      $.blockUI({ message: '<h4><img style="display: block;margin: 0 auto;" src="'+URL+'/img/loader-white1.gif" /> Just a moment...</h4>' });
      $("#NotRegisterSubmit").attr('disabled','disabled');
      $('form').submit();
    }
    $(document).ready(function () {
         $(document).on('click', 'html,body', function (e)
        {
            //e.stopPropagation();
            var container = $(".resultBox");

            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0)
            {
                $(".resultBox").hide();
            }
           $('#vchServiceDate').datepicker({
              format: "dd-M-yyyy",
                  todayBtn: "linked",
                  autoclose: true,
                  todayHighlight: true,
                  endDate: '+0d',
              });
        });
        // getAllService('intServicesId','<?php echo $intServicesId;?>');
        getDepartmentList('intDepartmentId','<?php echo $intDepartmentId;?>');
        // getDistrictList('intDistrictId','<?php echo $intDistrictId;?>');
        // getDeptWiseService('vchServicesId','<?php //echo $intDepartmentId;?>','<?php //echo $intServiceRegistrationId;?>')
      loadNavigation('Dashboard');
      indicate = 'yes';
        <?php if($outMsg != '') { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?> 

    });
     function validateForm(){
         if(!blankCheck('vchMobileNo','Mobile No. can not be left blank'))
          return false;
        if (!equalLength('vchMobileNo', 10, 'Mobile No.'))
           return false;
         // if(!validMobileNo('vchMobileNo','Please enter a valid Mobile No.')) 
         //    return false;
          // if($("#anonymous-form-checkbox").prop("checked") == true){
          //    $(".anonymous-cls").hide();
          // }
          if($("#anonymous-form-checkbox").prop("checked") == false){
              if(!blankCheck('vchName','Name can not be left blank'))
              return false;
          }

        if(!maxLength('vchName',50,'Name'))
           return false;
        if(!checkSpecialChar('vchName')) 
            return false;
        if($("#anonymous-form-checkbox").prop("checked") == false){
            if(!blankCheck('intAge','Age can not be left blank'))
              return false;
        }
        if (!maxLength('intAge', 3, 'Age'))
           return false;
        if(!selectDropdown('intDepartmentId','Please Select Department'))
          return false;     
        if(!selectDropdown('intServicesId','Please Select Service'))
          return false;  
        var intDepartmentId = $("#intDepartmentId").val();
        if((intDepartmentId!='' && intDepartmentId !='0')){
            if(intDepartmentId == <?php echo DEPART_HEALTH;?>){

                if(!selectDropdown('intHospitalDistrictId','Please Select District'))
                  return false; 
                if(!selectDropdown('intHospitalId','Please Select Hospital'))
                  return false; 
                if($("#intHospitalId").find('option:selected').text()=='OTHER'){
                  if(!blankCheck('vchOther','Other Hospital Name can not be left blank'))
                    return false;
                  if(!maxLength('vchOther',100,'Other Hospital Name'))
                     return false;
                  if(!checkSpecialChar('vchOther')) 
                      return false;
                }
            }else{
                if(!selectDropdown('intPoliceDistrictId','Please Select District'))
                  return false; 
               if(!selectDropdown('intPoliceId','Please Select Police Station'))
                return false; 
               if($("#intPoliceId").find('option:selected').text()=='OTHER'){
                   if(!blankCheck('vchOther','Other Police Station can not be left blank'))
                    return false;
                  if(!maxLength('vchOther',100,'Other Police Station'))
                     return false;
                  if(!checkSpecialChar('vchOther')) 
                      return false;
            }
        }
      }
         // if(!validMobileNo('intAge','Please enter a valid age.')) 
         //    return false;
         if($("#anonymous-form-checkbox").prop("checked") == false){
            if(!selectDropdown('intLocation','Please fill location'))
            return false;
        }
         if($("#anonymous-form-checkbox").prop("checked") == false){
           if(!blankCheck('vchAddress','Address can not be left blank'))
          return false;
        }
        
        if(!maxLength('vchAddress',300,'Address'))
           return false;
         if(!checkSpecialChar('vchAddress')) 
            return false;    
        if(!blankCheck('vchComplain','Call Summary can not be left blank'))
          return false;
        if(!maxLength('vchComplain',500,'Call Summary'))
           return false;
         if(!checkSpecialChar('vchComplain')) 
            return false; 
        
        $('#hdnQs').val('U');
        $.blockUI({ message: '<h4><img style="display: block;margin: 0 auto;" src="'+URL+'/img/loader-white1.gif" /> Just a moment...</h4>' });
        $("#addInboundBtn").attr('disabled','disabled');
        $('form').submit();

    }
    $(document).on('keypress', '#vchMobileNo', function (e) {
      if (e.keyCode == 13) {e.preventDefault(); getInboundInformation();}
      // return false;
    });

    function showHospitalPolice(){
      // var intDistrictId = $("#intDistrictId").val();
       getDistrictList('intHospitalDistrictId','<?php echo $intDistrictId;?>');
      var intDepartmentId = $("#intDepartmentId").val();
      if((intDepartmentId!='' && intDepartmentId !='0')){
          if(intDepartmentId == <?php echo DEPART_HEALTH;?>){
            getDistrictList('intHospitalDistrictId','<?php echo $intDistrictId;?>');
             $("#HospitalId").show();
             $("#PoliceStationId").hide();
             $('#intPoliceDistrictId').val(0).trigger('change');
          }else{
              getDistrictList('intPoliceDistrictId','<?php echo $intDistrictId;?>');
             $("#HospitalId").hide();
             $("#PoliceStationId").show();
             $('#intHospitalDistrictId').val(0).trigger('change');
          }
      }else{
        $("#PoliceStationId").hide();
        $("#HospitalId").hide();
      }
    }

    function checkAnonymousUser(){
      if($("#anonymous-form-checkbox").prop("checked") == true){
           $(".anonymous-cls").hide();
           $("#anonymous-form-checkbox").val(1);
        }
        else if($("#anonymous-form-checkbox").prop("checked") == false){
           $(".anonymous-cls").show();
           $("#anonymous-form-checkbox").val(0);
        }
    }
    function checkPoliceOther(){
      if($("#intPoliceId").find('option:selected').text()=='OTHER'){
          $("#otherId").show();
          $("#label-service-name").html('Other Police Station Name <span class="text-danger">*</span>');
      }else{
          $("#otherId").hide();

      }
      //console.log($("#intPoliceId").attr('data-val'));
      // var element = $("#intPoliceId");
      // var myTag = element.attr("data-val");
     // var option = $('#intPoliceId option:selected').attr('ata-val');
      // $(this).find('option:selected').text();
      //console.log($("#intPoliceId").find('option:selected').text());
        // $('#setMyTag').val(myTag);
    }
     function checkHospitalOther(){
      if($("#intHospitalId").find('option:selected').text()=='OTHER'){
          $("#otherId").show();
          $("#label-service-name").html('Other Hospital Name <span class="text-danger">*</span>');
      }else{
          $("#otherId").hide();

      }
    }
</script>
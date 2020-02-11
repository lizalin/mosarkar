<?php 
/* =================================================
  File Name         	  : dashboard.php
  Description		  : This is used for  display new dashboard.
  Developed By            : Ashis kumar Patra
  Developed On            : 01-Jan-2017
  Update History          : <Updated by>		<Updated On>		<Remarks>

  Style sheet             :
  Javscript Files         :
  includes		  :

  ================================================== */

?>
<script language="javascript">
    <?php 
    if(($_SESSION['adminConsole_Desg_Id'] == HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id'] == CMO_DESIGNATION) && $_SESSION['adminConsole_Desg_Id'] != OPERATOR){
    ?>
    var feedbackQuestion = 1;
    <?php }else{ ?>
    var feedbackQuestion = 0;
    <?php } ?>
    $(document).ready(function () {
        getDepartmentList('vchDepartmentId','<?php echo $intServiceRegistrationId;?>');
        getRequestedByList('intRequestedBy','<?php echo $intRequestedBy;?>');
        loadNavigation('Dashboard');
        //indicate = 'yes';
        printMe = 'yes';
        //deleteMe='yes';
         <?php if($outMsg != '') { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?> 


    <?php if($_SESSION['adminConsole_agency']>0){?>
          fillDistrictRangeWise(<?php echo $_SESSION['adminConsole_agency'];?>,'intDistrictId',<?php echo $intDistrictId;?>);
    <?php } else {?>
         getDistrictList('intDistrictId','<?php echo $intDistrictId;?>');
   <?php } ?>

                $('#vchFromDate').datepicker({
                format: "dd-M-yyyy",
                todayBtn: "linked",
                autoclose: true,
                todayHighlight: true,
                endDate: '+0d',
                });

                $('#vchToDate').datepicker({
                format: "dd-M-yyyy",
                todayBtn: "linked",
                autoclose: true,
                todayHighlight: true,
                endDate: '+0d',
                });
        });
        function validateActionSheet(){
               var FIds='';
               $('.chkItem').each(function(){
               if($(this).is(':checked'))
               FIds	+= $(this).val()+',';
               });

               if(FIds.length>0)
		          {
                   generateActionSheet(FIds);

                }else{
                  viewAlert('Please select a record!');
			          return false;
                }

        }   
      function showHideFeedbackAsnwer(vchId, vchValue){
        console.log(<?php echo $_SESSION['adminConsole_Desg_Id']; ?>);
        <?php 
        if(($_SESSION['adminConsole_Desg_Id'] == FSCWS_DESIGNATION || $_SESSION['adminConsole_Desg_Id'] == CSO_DESIGNATION) && $_SESSION['adminConsole_Desg_Id'] != OPERATOR){
        ?>
          if(vchValue == 1){
            $('#feedbackRemarks'+vchId).show();
          }else{
            $('#feedbackRemarks'+vchId).hide();
          }
        <?php } ?>
      }

      function showFeedbackQuestionAnswer(intDepartmentId, intServiceId, intFeedbackRecId){
        $('#UpdateFeedbackAnswer').modal('show');
        $('#divFeedbackAnswer').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
        $('#intFeedbackRecId').val(intFeedbackRecId);
        $.ajax({
          type: "POST",
          url: URL + '/proxy',
          dataType: "json",
          data: {method: 'showFeedbackQuestionAnswer',intDepartmentId:intDepartmentId,intServiceId:intServiceId,csrf_token_id:csrf_token_val},
          success: function (data) {
            // console.log(data.result);
            $('#divFeedbackAnswer').html(data.result);

            // if(data.result==1){
             
            //    window.location.href = URL+'/dashboard';  
            // }
          }
        });
      }
      function submitFeedbackAnswer(){
        var vchStatus = 0;
        $('.feedback-categories').each(function(){

          // if(($(this).find("input[type='checkbox']:checked").length)<=0 && !$(this).find(".option-redio:checked").val()){
          var vchOptionName = $(this).find('.option-redio').attr('name');
          if(!$(this).find("input[name='"+vchOptionName+"']:checked").val()){
            viewAlert('Please Select Answer for All Questions');
            ++vchStatus;
            return false;
          }
          // console.log($(this).find('.option-redio').attr('name'));
          // console.log($(this).find('.radio').children().find(''));
        })
        if(vchStatus == 0){
          $('#hdn_qs').val('U');
          $('#submitBtnFeedbackAnswer').attr('onclick', '');
          $('#submitBtnFeedbackAnswer').html('<i class="fa fa-spinner fa-spin"></i>');
          $.blockUI({ message: '<h4><img style="display: block;margin: 0 auto;" src="'+URL+'/img/loader-white1.gif" /> Just a moment...</h4>' });
          $('form').submit();
        }
        
        
      }
      function showHideFeebackStatusEdit(recieiveId){
        $('.selFeebackStatus'+recieiveId).show();
        $('.btnCancel'+recieiveId).show();
        $('.selFeebackStatusEdit'+recieiveId).hide();
      }
      function CancelCallStatus(recieiveId){
        $('.selFeebackStatus'+recieiveId).hide();
        $('.btnCancel'+recieiveId).hide();
        $('.selFeebackStatusEdit'+recieiveId).show();
      }

</script>
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
</style>

   <div class="mainpanel">
            <div class="section">
               <div class="page-title">
                  <div class="title-details">
                     <!-- <h4>Outbound Call Summary</h4> -->
                  
                  </div>
                   <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"><span class="icon-home1"></span></a></li>
                           <li class="breadcrumb-item"><a href="#">Calls</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Outbound Call Summary</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                        <a href="javascript:void(0);" onclick="validateActionSheet()" class="btn btn-primary btn-sm pull-right" style="margin-left:5px">Download Action Sheet</a>
                            <a href="javascript:void(0);" download id="actionSheetDwnl" class="pull-right" style="display:none;">Action Sheet</a> 
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                           
                              <a class="nav-item nav-link active"  href="javascript:void(0)">Outbound Call Summary
</a>
                           </ul>
                              <div class="indicatorslist">
                           <?php include('includes/util.php'); ?>
                            </div>
                           <div class="clearfix"></div>
                        </div>
                        <!-- Search Panel -->
                        <div class="search-container">
                           <div class="search-sec">
                              
                              <div class="form-group">
                                 <div class="row">
                                  <label class="col-sm-2 ">From</label>
                                        <div class="col-sm-3">
                                        <div class="input-group ">                                        
                                        <input type="text"   name="vchFromDate" id="vchFromDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo (strtotime($strFromDate)>0)?date('d-M-Y',strtotime($strFromDate)):'';?>" >
                                        <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                        </div>
                                        </div>

                                 <label class="col-sm-2 ">To</label>
                                        <div class="col-sm-3">
                                        <div class="input-group ">                                        
                                        <input type="text"   name="vchToDate" id="vchToDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo (strtotime($strToDate)>0)?date('d-M-Y',strtotime($strToDate)):'';?>" >
                                        <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                        </div>
                                        </div>
                                    
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                    <label class="col-sm-2 ">District </label>
                                    <div class="col-sm-3">
                                       <select class="form-control" name="intDistrictId" id="intDistrictId" >
                                       <option value="0">---select---</option>
                                       </select>
                                    </div>

                                    <?php if($_SESSION['adminConsole_Desg_Id'] == HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id'] == CMO_DESIGNATION || $userId == 1) {?>
                                    <label class="col-sm-2 ">Requested By </label>
                                    <div class="col-sm-3">
                                       <select class="form-control" name="intRequestedBy" id="intRequestedBy" >
                                       <option value="0">---select---</option>
                                       </select>
                                    </div>    
                                      <?php } ?>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                    <label class="col-sm-2 ">Mobile No. </label>
                                    <div class="col-sm-3">
                                       <input type="tel" onkeypress="return isNumberKey(event)" maxlength="10" name="vchMobile" id="vchMobile" class="form-control" value="<?php echo $vchMobile ?>">
                                    </div>
                                    <div class="col-lg-2">
                                       <button class="btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="text-center"> <a class="searchopen" title="Search" data-toggle="tooltip" data-placement="bottom" > <i class="icon-angle-arrow-down"></i> </a></div>
                        </div>
                        <!-- Search Panel -->
                        <!--===================================================-->
                        <div class="card-body">
                           <div class="table-responsive">
                            <?php if ($result->num_rows > 0) {   $ctr = 1;  ?>
                         
                            <div class="legandBox pull-left">      
                             <span class="greenLegend">&nbsp;</span>Call Connected &nbsp;     
                             <span class="blueLegend">&nbsp;</span> In Progress  &nbsp;
                             <span class="redLegend">&nbsp;</span> Not Reachable/Invalid No./Wrong No./Did not Pick /Not Intrested/DND  &nbsp;
                              </div>

                              <table data-toggle="table" class="table table-hover table-bordered">
                                 <thead>
                                    <tr>
                                    
                                       <th width="20" class="noPrint">
                                          <label class="position-relative">
                                          <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                       </th>
                                       <th width="40px">Sl#</th>
                                       <th>Date</th>
                                       <th>Caller Detail</th>
                                       <th>Mobile</th>                                      
                                       <th>Service / Scheme</th>
                                       <th>Other Info</th>
                                       <th>Requested By</th>
                                       <th>Call Status</th>                                        
                                       <th width="230">Action </th>
                                                                             
                                    </tr>
                                 </thead>
                      
                                 <tbody>
                              <?php
                                       $dept             = 0;
                                       $rowSpan          = '';
                                       $services         = 0;
                                       $rowSpanService   = '';

                                    while($arrRecords=$result->fetch_array()){
                                      // print_r($arrRecords);
                                       $encDataForPDF=""; 
                                       if($arrRecords['intFeedbackStatus']==0){
                                          $style  = 'class="blueBorder"';
                                       }
                                       else if($arrRecords['intFeedbackStatus']==1){
                                          $style  = 'class="greenBorder"';
                                       }
                                       else
                                          $style  = 'class="redBorder"';
                                       ?>
                                    <tr <?php echo $style;?>>
                                    <td class="noPrint">
                                    <?php if($arrRecords['intCallBackRequest']>0 ){?>
                                    <label class="position-relative">
                                    <input type="checkbox" class="ace chkItem" value="<?php echo $arrRecords['intOutboundDataId'].'_'.$arrRecords['dataType'];?>"><span class="lbl"></span>
                                     </label>
                                    <?php } ?>
                                    </td>
                                      <td><?php echo $ctr;?></td>
                                    
                                      <td ><?php echo date("d-M-Y",strtotime($arrRecords['dtmFeedbackRcvTime']));?></td>
                                      <td><?php echo $arrRecords['vchName'];?>
                                      
                                      <br><small style="color: #18766d;">Age:&nbsp;<?php echo !empty($arrRecords['intAge'])?$arrRecords['intAge']:'--';?>&nbsp;&nbsp;Gender:&nbsp;<?php echo !empty($arrRecords['intGender'])?(($arrRecords['intGender'] == 1)?'Male':(($arrRecords['intGender'] == 2)?'Female':'Transgender')):'--';?>&nbsp;&nbsp; <br>District:&nbsp;<?php echo !empty($arrRecords['vchDistrict'])?$arrRecords['vchDistrict']:'--';?>&nbsp;&nbsp;Block:&nbsp;<?php echo !empty($arrRecords['vchBlock'])?$arrRecords['vchBlock']:'--';?><br>GP:&nbsp;<?php echo !empty($arrRecords['vchGP'])?$arrRecords['vchGP']:'--';?>&nbsp;&nbsp;Village:&nbsp;<?php echo !empty($arrRecords['vchVillage'])?$arrRecords['vchVillage']:'--';?></small>
                                      </td>
                                      <td><?php echo $arrRecords['intMobile'];?></td>
                                     
                                      <td><?php echo $arrRecords['vchServiceName'];?>
                                      <br><small style="color: #18766d;">Scheme: &nbsp;<?php echo $arrRecords['vchSchemeTypeName'];?></small>
                                      
                                      </td>
                                      <td><small style="color: #18766d;">Reg. Date: &nbsp;<?php echo (strtotime($arrRecords['dtmRegdDateTime'])>0)?date("d-M-Y",strtotime($arrRecords['dtmRegdDateTime'])):'--';?><br />
                                        <?php if($arrRecords['intServiceId']==1){ ?>
                                          Ration Card No.: &nbsp;<?php echo !empty($arrRecords['vchRationCardNo'])? $arrRecords['vchRationCardNo']:'--';?><br />No. of Family: &nbsp;<?php echo !empty($arrRecords['intNoFamily'])? $arrRecords['intNoFamily']:'--';?><br />
                                        <?php }else{ ?>
                                          Token No.: &nbsp;<?php echo !empty($arrRecords['vchTokenNo'])? $arrRecords['vchTokenNo']:'--';?><br />Deposite Date: &nbsp;<?php echo (strtotime($arrRecords['dtmPaddyDeposite'])>0)?date("d-M-Y",strtotime($arrRecords['dtmPaddyDeposite'])):'--';?>
                                        <?php } ?>
                                      </small>
                                      </td>

                                      <td><?php echo !empty($arrRecords['VCH_FULL_NAME'])?$arrRecords['VCH_FULL_NAME']:'--';?></td>
                                      <td><span id="updatedStatus<?php echo $arrRecords['intFeedbackRecId'];?>"><?php if($arrRecords['intFeedbackStatus']==0){ 
                                                echo "In Progress";
                                                 ?>
                                            

                                       <?php
                                                }else {
                                                  echo (FEEDBACK_CALL_STATUS[$arrRecords['intFeedbackStatus']])?FEEDBACK_CALL_STATUS[$arrRecords['intFeedbackStatus']]:'--';
                                                }
                                       ?></span></td>
                                       <?php 
                                          if(($_SESSION['adminConsole_Desg_Id'] == HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id'] == CMO_DESIGNATION) && $arrRecords['intFeedbackStatus'] > 0){
                                             $intStatusForEdit = 1;
                                          }else{
                                             $intStatusForEdit = 0;
                                          }
                                       ?>
                                      <td><?php if($arrRecords['intCallBackRequest']>0 && $arrRecords['intRequestedById'] == $userId){ ?>
                                          <div class="selFeebackStatus<?php echo $arrRecords['intFeedbackRecId'];?>" style="margin-bottom: 5px;<?php echo ($arrRecords['intFeedbackStatus'] > 0)?'display: none;':''; ?> ">
                                             <select onchange="showHideFeedbackAsnwer(<?php echo $arrRecords['intFeedbackRecId'];?>, this.value)" class="from-control selFeebackStatus<?php echo $arrRecords['intFeedbackRecId'];?> "  id="selFeebackStatus<?php echo $arrRecords['intFeedbackRecId'];?>">
                                            <?php foreach (FEEDBACK_CALL_STATUS as $key => $statusName) { ?>         
                                       <option value="<?php echo $key; ?>"><?php echo $statusName; ?></option>
                                            <?php } ?>
                                             </select> 
                                             
                                             <a class="btn btn-success btn-sm selFeebackStatus<?php echo $arrRecords['intFeedbackRecId'];?>" title="Update" onclick="updateCallStatus(<?php echo $arrRecords['intFeedbackRecId'];?>);"><i class="icon-arrow-right-circle1" aria-hidden="true"></i></a>
                                             <a style="display: none;" class="btn btn-warning btn-sm btnCancel<?php echo $arrRecords['intFeedbackRecId'];?>" title="Cancel" onclick="CancelCallStatus(<?php echo $arrRecords['intFeedbackRecId'];?>);"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                          </div>
                                          <div onclick="return showHideFeebackStatusEdit(<?php echo $arrRecords['intFeedbackRecId'];?>)" class="selFeebackStatusEdit<?php echo $arrRecords['intFeedbackRecId'];?>" style="<?php echo ($intStatusForEdit == 0)?'display: none;':''; ?>">
                                            <a href="javascript:void(0)"><i class="fa fa-edit"></i></a>
                                          </div>
                                             <div class="radio" id="feedbackRemarks<?php echo $arrRecords['intFeedbackRecId'];?>" style="display: none;">
                                                <input <?php echo ($arrRecords['intDirectCallFeedbackStatus'] == 4)?'checked':''; ?> id="intDirectCallFeedbackStatus_bad1_<?php echo $arrRecords['intFeedbackRecId'];?>" class="magic-radio" value="4" type="radio" name="intDirectCallFeedbackStatus_<?php echo $arrRecords['intFeedbackRecId'];?>">
                                                <label for="intDirectCallFeedbackStatus_bad1_<?php echo $arrRecords['intFeedbackRecId'];?>">Bad</label> &nbsp;
                                                <input <?php echo ($arrRecords['intDirectCallFeedbackStatus'] == 1)?'checked':''; ?> id="intDirectCallFeedbackStatus_bad_<?php echo $arrRecords['intFeedbackRecId'];?>" class="magic-radio" value="1" type="radio" name="intDirectCallFeedbackStatus_<?php echo $arrRecords['intFeedbackRecId'];?>">
                                                <label for="intDirectCallFeedbackStatus_bad_<?php echo $arrRecords['intFeedbackRecId'];?>">Poor</label> &nbsp;
                                                <input <?php echo ($arrRecords['intDirectCallFeedbackStatus'] == 2)?'checked':''; ?> id="intDirectCallFeedbackStatus_average_<?php echo $arrRecords['intFeedbackRecId'];?>" class="magic-radio" type="radio" value="2" name="intDirectCallFeedbackStatus_<?php echo $arrRecords['intFeedbackRecId'];?>">
                                                <label for="intDirectCallFeedbackStatus_average_<?php echo $arrRecords['intFeedbackRecId'];?>">Average</label> &nbsp;
                                               <input <?php echo ($arrRecords['intDirectCallFeedbackStatus'] == 3)?'checked':''; ?> id="intDirectCallFeedbackStatus_good_<?php echo $arrRecords['intFeedbackRecId'];?>" class="magic-radio" type="radio" value="3" name="intDirectCallFeedbackStatus_<?php echo $arrRecords['intFeedbackRecId'];?>">
                                                <label for="intDirectCallFeedbackStatus_good_<?php echo $arrRecords['intFeedbackRecId'];?>">Good</label>&nbsp;
                                                <input <?php echo ($arrRecords['intDirectCallFeedbackStatus'] == 5)?'checked':''; ?> id="intDirectCallFeedbackStatus_outstanding_<?php echo $arrRecords['intFeedbackRecId'];?>" class="magic-radio" value="5" type="radio" name="intDirectCallFeedbackStatus_<?php echo $arrRecords['intFeedbackRecId'];?>">
                                                <label for="intDirectCallFeedbackStatus_outstanding_<?php echo $arrRecords['intFeedbackRecId'];?>">Outstanding</label>
                                             </div>
                                      <?php } ?>
                                      <?php 
                                      if($arrRecords['intRequestedById'] == $userId && $arrRecords['intFeedbackStatus'] == 1 && $arrRecords['intCountFeedbackAns'] == 0 && ($_SESSION['adminConsole_Desg_Id'] != HCM_DESIGNATION && $_SESSION['adminConsole_Desg_Id'] != CMO_DESIGNATION && $_SESSION['adminConsole_Desg_Id'] != OPERATOR)){
                                      ?>
                                      <a href="javascript:void(0)" onclick="return showFeedbackQuestionAnswer('<?php echo $arrRecords['intDepartmentId'] ?>','<?php echo $arrRecords['intServiceId'] ?>', '<?php echo $arrRecords['intFeedbackRecId'] ?>')"><i class="icon-arrow-right-circle1"></i></a>
                                      <?php } ?>
                                    </td>
                                    </tr>
                                 
                                   <?php 
                                   $ctr++; 
                                  } ?>
                                  </tbody>
                              </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
                           </div>
                           <?php if ($result->num_rows > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                         <?php echo $obj->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                       <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                    <?php echo $obj->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
                                </ul>
                            </div>
                        </div>
                <?php } ?>
                </div>
            <?php } ?>
                        </div>
                        <!--===================================================-->
                     </div>
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
                <input type="hidden" name="intFeedbackRecId" id="intFeedbackRecId" value="0">
            </div>
            <div class="modal-body" id="divFeedbackAnswer" style="padding: 20px;">
                 
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URL;?>js/jquery.blockUI.js"></script>  
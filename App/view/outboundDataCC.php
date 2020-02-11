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


         getDistrictList('intDistrictId','<?php echo $intDistrictId;?>');
   

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
        if(($_SESSION['adminConsole_Desg_Id'] == HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id'] == CMO_DESIGNATION) && $_SESSION['adminConsole_Desg_Id'] != OPERATOR){
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
        $('.selFeebackStatusEdit'+recieiveId).hide();
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
                           <li class="breadcrumb-item active" aria-current="page">Outbound Call Summary - Contact Center</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                        <!-- <a href="javascript:void(0);" onclick="validateActionSheet()" class="btn btn-primary btn-sm pull-right" style="margin-left:5px">Download Action Sheet</a>
                            <a href="javascript:void(0);" download id="actionSheetDwnl" class="pull-right" style="display:none;">Action Sheet</a>  -->
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                           
                              <a class="nav-item nav-link active"  href="javascript:void(0)">Outbound Call Summary - Contact Center
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
                                       <th>Department</th>
                                       <th>Institution Name</th>
                                       <th>Other Info</th>
                                       <th>Call Status</th>                                        
                                       
                                                                             
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
                                      
                                      <br><small style="color: #18766d;">Age:&nbsp;<?php echo !empty($arrRecords['intAge'])?$arrRecords['intAge']:'--';?>&nbsp;&nbsp;Gender:&nbsp;<?php echo !empty($row['vchGender'])?$row['vchGender']:'--';?>&nbsp;&nbsp; <br>District:&nbsp;<?php echo !empty($arrRecords['VCH_VALUE_NAME'])?$arrRecords['VCH_VALUE_NAME']:'--';?></small>
                                      </td>
                                      <td><?php echo $arrRecords['intMobile'];?></td>
                                      <!-- <td><?php  // echo $arrRecords['VCH_VALUE_NAME'];?></td>
                                     -->
                                      <td><?php echo $arrRecords['vchDepartment'];?>
                                      <br><small style="color: #18766d;">Service: &nbsp;<?php echo $arrRecords['vchServiceName'];?></small>
                                      
                                      </td>
                                      <td><?php echo !empty($arrRecords['complaintAgainst'])?$arrRecords['complaintAgainst']:'--';?>
                                      <br><small style="color: #18766d;">Visiting Date: &nbsp;<?php echo (strtotime($arrRecords['dtmRegdDateTime'])>0)?date("d-M-Y",strtotime($arrRecords['dtmRegdDateTime'])):'--';?></small>
                                      </td>

                                      <td><?php 
                                            $returnText = '';
                                            if($arrRecords['intDepartmentId'] == DEPART_HOME){
                                              if($arrRecords['vchRegdNo']){
                                                  $returnText .= '<small><div>Reg No. : '. $arrRecords['vchRegdNo'] .'</div></small>';
                                              }
                                              if($arrRecords['jsonRelatedInfo']){
                                                  $jsonRelatedInfo    = json_decode($arrRecords['jsonRelatedInfo']);
                                                  $arrReletedInfo     = (array)$jsonRelatedInfo;
                                                  if(count($arrReletedInfo) > 0){
                                                      foreach($arrReletedInfo as $key => $infoVal){
                                                          // $vchRelatedInfo = str_replace("_"," ",$key).' : '.$infoVal;
                                                          $returnText .= '<small><div>'. str_replace("_"," ",$key) .' : '. $infoVal .'</div></small>';
                                                      }
                                                  }
                                              }
                                            }else{
                                                $returnText .= '--';
                                            }
                                            echo $returnText;
                                                // $otherInfocnt ='';
                                                // $otherInfo=array();
                                                // $vchRegdNo = (empty($arrRecords['vchRegdNo']))?'--':$arrRecords['vchRegdNo']; 
                                                // if(!empty($arrRecords['jsonRelatedInfo'])){
                                                //      $otherInfo= (array)json_decode($arrRecords['jsonRelatedInfo']);
                                                //    }
                                                //       if($arrRecords['intDepartmentId']==14){
                                                //                if($arrRecords['intServiceId']==4){ 
                                                //                      $firnumber = (empty($otherInfo['FIR_NUM']))?'--':$otherInfo['FIR_NUM'];
                                                //                      $sectionname = (empty($otherInfo['SECTION']))?'--':$otherInfo['SECTION'];
                                                //                      $otherInfocnt .= '<small >FIR Number: '.$firnumber;
                                                //                      $otherInfocnt .= '<br>Section: '.$sectionname.'</small>';
                                                //                }
                                                //                else if($arrRecords['intServiceId']==5 || $arrRecords['intServiceId']==6){
                                                //                      $otherInfocnt .= '<small >Request Number: '.$vchRegdNo.'</small>';
                                                //                }
                                                //       }
                                               
                                                // echo (empty($otherInfocnt))?'--':$otherInfocnt;
                                      
                                      ?></td>
                                   
                                      <td><span id="updatedStatus<?php echo $arrRecords['intFeedbackRecId'];?>"><?php if($arrRecords['intFeedbackStatus']==0){ 
                                                echo "In Progress";
                                                 ?>
                                            

                                       <?php
                                                }else {
                                                  echo (FEEDBACK_CALL_STATUS[$arrRecords['intFeedbackStatus']])?FEEDBACK_CALL_STATUS[$arrRecords['intFeedbackStatus']]:'--';
                                                }
                                       ?></span></td>
                                      
                                     
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
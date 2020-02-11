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
        viewSearchPannel('<?php echo $openFlag; ?>', 'searchPanel', 'chkSearch'); 
        getDepartmentList('vchDepartmentId','<?php echo $intServiceRegistrationId;?>');
        getRequestedByList('intRequestedBy','<?php echo $intRequestedBy;?>');
        loadNavigation('Dashboard');
        //indicate = 'yes';
        printMe = 'yes';
        downloadPdf="yes";
         <?php if($outMsg != '') { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?> 


    <?php if($_SESSION['adminConsole_agency']>0){?>
          fillDistrictRangeWise(<?php echo $_SESSION['adminConsole_agency'];?>,'intDistrictId',<?php echo $intDistrictId;?>);
    <?php } else {?>
         <?php if($_SESSION['adminConsole_Desg_Id']==CSO_DESIGNATION){ ?>
                <?php if(!empty($intDistrictId)) { ?>
                  getDistrictList('intDistrictId','<?php echo $intDistrictId;?>',<?php echo $_SESSION['adminConsole_HierarchyId'];?>);
              <?php }else{ ?>
                  getDistrictList('intDistrictId',<?php echo $_SESSION['adminConsole_HierarchyId'];?>,<?php echo $_SESSION['adminConsole_HierarchyId'];?>);
              <?php } ?>
          <?php }else{ ?>
                <?php if(!empty($intDistrictId)) { ?>
                  getDistrictList('intDistrictId','<?php echo $intDistrictId;?>');
              <?php }else{ ?>
                  getDistrictList('intDistrictId',0);
              <?php } ?>
          <?php } ?>
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
        /*console.log(<?php echo $_SESSION['adminConsole_Desg_Id']; ?>);
        <?php 
        if(($_SESSION['adminConsole_Desg_Id'] == HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id'] == CMO_DESIGNATION) && $_SESSION['adminConsole_Desg_Id'] != OPERATOR){
        ?>
          if(vchValue == 1){
            $('#feedbackRemarks'+vchId).show();
          }else{
            $('#feedbackRemarks'+vchId).hide();
          }
        <?php } ?>*/
      }

      function showFeedbackQuestionAnswer(intDepartmentId, intServiceId, intFeedbackRecId, cardNo = 0){
        $('#UpdateFeedbackAnswer').modal('show');
        $('#divFeedbackAnswer').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
        $('#intFeedbackRecId').val(intFeedbackRecId);
        $.ajax({
          type: "POST",
          url: URL + '/proxy',
          dataType: "json",
          data: {method: 'showFeedbackQuestionAnswer',csrf_token_id:csrf_token_val ,intDepartmentId:intDepartmentId,intServiceId:intServiceId, cardNo:cardNo},
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
          if (typeof vchOptionName !== typeof undefined && vchOptionName !== false) {
            if(!$(this).find("input[name='"+vchOptionName+"']:checked").val()){
              // console.log(vchOptionName);
              viewAlert('Please Select Answer for All Questions');
              ++vchStatus;
              return false;
            }
          }
          // console.log($(this).find('.option-redio').attr('name'));
          // console.log($(this).find('.radio').children().find(''));
        })
        if(vchStatus == 0){
          $('#hdn_qs').val('U');
          $('#submitBtnFeedbackAnswer').attr('onclick', '');
          $('#submitBtnFeedbackAnswer').html('<i class="fa fa-spinner fa-spin"></i>');
          $.blockUI({ message: '<h4><img style="display: block;margin: 0 auto;" src="'+URL+'/img/loader-white1.gif" /> Just a moment...</h4>' });
          FeedbackSubmitAuthority($('#intFeedbackRecId').val());
          // $('form').submit();
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

      function updateCallStatusfoCm(intFeedbackRecId, intStatusForEdit,userType){
            var selFeebackStatus= $('#selFeebackStatus'+intFeedbackRecId).val();  
             if(selFeebackStatus==1){
            $('#vchFeedbackRemarks').val('');  
            $('input[name="intDirectCallFeedbackStatus"]').prop('checked', false);
            $('#FeedbackAnswer').modal('show');
            $('.feedbackEntryCls').show();
            $('.feedbackMsgCls').hide();
            var clickFn='updateCallStatus('+intFeedbackRecId+','+intStatusForEdit+','+userType+')';
            $('#btnFeedbakSubmit').attr('onclick',clickFn);
             }else{
               updateCallStatus(intFeedbackRecId, intStatusForEdit,userType);
             }
            if(intStatusForEdit==1) {
               viewCallRemarkStatusEdit(intFeedbackRecId);
            } 
              
            //alert($('#myModal').is(':visible'););     
            
      }
      /*function viewCallRemarkStatus(intFeedbackRecId, intFeedbackAnswer, vchQuery){               
                $('#lblFeedbackRemarks').text(vchQuery);
               if(intFeedbackAnswer == 1){
               $('#intDirectCallFeedbackStatus_bad').click();//attr('checked',true);
               }else if(intFeedbackAnswer == 2){
               $('#intDirectCallFeedbackStatus_average').click();//attr('checked',true);
               }else if(intFeedbackAnswer == 3){
               $('#intDirectCallFeedbackStatus_good').click();//attr('checked',true);
               }else if(intFeedbackAnswer == 4){
               $('#intDirectCallFeedbackStatus_bad1').click();//attr('checked',true);
               }else if(intFeedbackAnswer == 5){
               $('#intDirectCallFeedbackStatus_outstanding').click();//attr('checked',true);
               }else{
               $("input[name='intDirectCallFeedbackStatus']").prop('checked', false);
               }
               $('#vchFeedbackRemarks').hide(); 
               $('#btnFeedbakSubmit').hide(); 
               $('#lblFeedbackRemarks').show();
               $('input[name=intDirectCallFeedbackStatus]').attr("disabled",true);
               $('#FeedbackAnswer').modal('show');  
            
      }*/

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
  .clsRCardNo{
    background: #e1e1e1;
    width: fit-content;
    border-radius: 30px;
    padding: 6px 15px;
    margin: 0 auto;
    margin-bottom: 10px;
    border: 1px solid #848484;
  }
  input.form-controls {
    width: 100px;
    height: 30px;
    padding: 5px 7px;
    border-radius: 2px;
    border: 1px solid #dadada;
    font-size: .9rem;
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
                           <div class="search-sec" id="searchPanel">
                              
                              <div class="form-group">
                                 <div class="row">
                                  <label class="col-sm-2 vchFromDate" for="vchFromDate" data-lbl="vchFromDate">From</label>
                                        <div class="col-sm-3">
                                        <div class="input-group ">                                        
                                        <input type="text"   name="vchFromDate" id="vchFromDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo (strtotime($strFromDate)>0)?date('d-M-Y',strtotime($strFromDate)):'';?>" >
                                        <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                        </div>
                                        </div>

                                 <label class="col-sm-2 vchToDate" for="vchToDate" data-lbl="vchToDate">To</label>
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
                                    <label class="col-sm-2 intDistrictId" for="intDistrictId" data-lbl="intDistrictId">District </label>
                                    <div class="col-sm-3">
                                       <select class="form-control" name="intDistrictId" id="intDistrictId" >
                                       <option value="0">---Select District---</option>
                                       </select>
                                    </div>

                                    <label class="col-sm-2 intCallStatus" for="intCallStatus" data-lbl="intCallStatus">Call Status </label>
                                    <div class="col-sm-3">
                                       <select class="form-control" name="intCallStatus" id="intCallStatus" >
                                       <option value="0">---Select Call Status---</option>
                                       <?php foreach (FEEDBACK_CALL_STATUS as $keys => $statusNames) { 
                                          if($keys==0){
                                             $keys="100";
                                          }
                                             $selectedStatus="";
                                          if($intCallStatus==$keys){
                                             $selectedStatus='selected="selected"';
                                           }

                                           
                                          ?>         
                                       <option value="<?php echo $keys; ?>" <?php echo $selectedStatus; ?>><?php echo $statusNames; ?></option>
                                            <?php } ?>
                                       </select>
                                    </div>
                                    


                                  
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                    <label class="col-sm-2 vchMobile" for="vchMobile" data-lbl="vchMobile">Mobile No. </label>
                                    <div class="col-sm-3">
                                       <input type="text" onkeypress="return isNumberKey(event)" maxlength="10" name="vchMobile" id="vchMobile" class="form-control" value="<?php echo $vchMobile ?>">
                                    </div>

                                    <?php if($_SESSION['adminConsole_Desg_Id'] == FSCWS_DESIGNATION || $_SESSION['adminConsole_Desg_Id'] == PA_DESIGNATION || $userId == 1) {?>
                                    <label class="col-sm-2 intRequestedBy" for="intRequestedBy" data-lbl="intRequestedBy">Requested By </label>
                                    <div class="col-sm-3">
                                       <select class="form-control" name="intRequestedBy" id="intRequestedBy" >
                                       <option value="0">---Select---</option>
                                       </select>
                                    </div>    
                                      <?php } ?>
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
                        <div class="legandBox pull-left">      
                             <span class="greenLegend">&nbsp;</span>Call Connected &nbsp;     
                             <span class="blueLegend">&nbsp;</span> In Progress  &nbsp;
                             <span class="redLegend">&nbsp;</span> Not Reachable/Invalid No./Wrong No./Did not Pick /Not Intrested/DND  &nbsp;
                              </div>
                           <div class="table-responsive" id="viewTable">
                            <?php if ($result->num_rows > 0) {   $ctr = 1;  ?>
                         
                            

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
                                       <th>District</th>                                      
                                       <th>Service / Scheme</th>
                                       <th>Other Info</th>
                                       <th>Requested By</th>
                                       <th>Call Status</th>                                        
                                       <?php  //if(($_SESSION['adminConsole_Desg_Id'] == FSCWS_DESIGNATION || $_SESSION['adminConsole_Desg_Id'] == CSO_DESIGNATION) ){ ?> 
                                        <!-- <th>View Feedback</th>  -->
                                       <?php //} ?>                                       
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
                                      // print"<pre>";
                                      // print_r($arrRecords); exit;
                                       $authFeedbackShow='style="display:none;"';
                                       $authFeedbackReceiveShow='style="display:none;"';
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
                                    <input type="checkbox" class="ace chkItem" value="<?php echo $arrRecords['intOutboundDataId'];?>"><span class="lbl"></span>
                                     </label>
                                    <?php } ?>
                                    </td>
                                      <td><?php echo $ctr;?></td>
                                    
                                      <td ><?php echo date("d-M-Y",strtotime($arrRecords['dtmCreatedOn']));?></td>
                                      <td><?php echo $arrRecords['vchName'];?>
                                      
                                      <br><small style="color: #18766d;">Age:&nbsp;<?php echo !empty($arrRecords['intAge'])?$arrRecords['intAge']:'--';?>&nbsp;&nbsp;Gender:&nbsp;<?php echo !empty($arrRecords['intGender'])?(($arrRecords['intGender'] == 1)?'Male':(($arrRecords['intGender'] == 2)?'Female':'Transgender')):'--';?></small><br>
                                        <small style="color: #18766d;">Reg. Date: &nbsp;<?php echo (strtotime($arrRecords['dtmRegdDateTime'])>0)?date("d-M-Y",strtotime($arrRecords['dtmRegdDateTime'])):'--';?><br />
                                        <?php if($arrRecords['intServiceId']==1){ ?>
                                          Card Type.: &nbsp;<?php echo !empty($arrRecords['vchCardName'])? $arrRecords['vchCardName']:'--';?><br />
                                          Ration Card No.: &nbsp;<?php echo !empty($arrRecords['vchRationCardNo'])? $arrRecords['vchRationCardNo']:'--';?><br />No of Family Member: &nbsp;<?php echo !empty($arrRecords['intNoFamily'])? $arrRecords['intNoFamily']:'--';?><br />
                                        <?php }else{ ?>
                                          Token No.: &nbsp;<?php echo !empty($arrRecords['vchTokenNo'])? $arrRecords['vchTokenNo']:'--';?><br />Deposite Date: &nbsp;<?php echo (strtotime($arrRecords['dtmPaddyDeposite'])>0)?date("d-M-Y",strtotime($arrRecords['dtmPaddyDeposite'])):'--';?>
                                        <?php } ?>
                                      </small>
                                      </td>
                                      <td><?php echo $arrRecords['intMobile'];?></td>

                                      <td><?php echo !empty($arrRecords['vchDistrict'])?$arrRecords['vchDistrict']:'--';?></td>
                                     
                                       <td><?php echo $arrRecords['vchServiceName'];?>
                                      <br><small style="color: #18766d;">Scheme: &nbsp;<?php echo $arrRecords['vchSchemeTypeName'];?></small>
                                      
                                      </td>
                                      <td><?php 
                                        $returnText = '';
                                        /*if($arrRecords['jsonRelatedInfo']){
                                            $jsonRelatedInfo    = json_decode($arrRecords['jsonRelatedInfo'],true);
                                            // print_r($jsonRelatedInfo);exit;
                                          if($arrRecords['intServiceId'] == RCMS){
                                            // echo "01/".$jsonRelatedInfo['dtmAllotment'];
                                                if(strstr($jsonRelatedInfo['dtmAllotment'], '/')){
                                                   $allotDateArr =  explode('/', $jsonRelatedInfo['dtmAllotment']);
                                                    $dtmAllotment = date('Y-m-d',strtotime('01-'.$allotDateArr['0'].'-'.$allotDateArr['1']));
                                                }else{
                                                  $dtmAllotment = date('Y-m-d',strtotime('01-'.$jsonRelatedInfo['dtmAllotment']));
                                                } 
                                                $dtmAllotment = date('M-Y',strtotime($dtmAllotment));
                                                $returnText .= '<small style="color: #18766d;">Allotment Date: '.$dtmAllotment.'<br>Rice in Kg: '.$jsonRelatedInfo['intRice'].'<br>Wheat in Kg: '.$jsonRelatedInfo['intWheat'].'<br>Kerosene in Ltr: '.$jsonRelatedInfo['floatKerosene'].'</small>';
                                          }else{
                                              $returnText = '';
                                          }
                                        }
                                        echo $returnText;*/

                                        if($arrRecords['jsonRelatedInfo'] != '' /*&& $arrRecords['intServiceId'] == RCMS*/){
                                          $jsonRelatedInfo    = json_decode($arrRecords['jsonRelatedInfo']);
                                          $arrReletedInfo     = (array)$jsonRelatedInfo;
                                          if(count($arrReletedInfo) > 0){
                                              foreach($arrReletedInfo as $key => $infoVal){
                                                  // $vchRelatedInfo = str_replace("_"," ",$key).' : '.$infoVal;
                                                  $returnText .= '<small style="color: #18766d;"><div>'. str_replace("_"," ",$key) .' : '. $infoVal .'</div></small>';
                                              }
                                          }
                                        }else{
                                            $returnText .= '--';
                                        }
                                        echo $returnText;
                                    
                                      
                                      ?></td>
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
                                          if(($_SESSION['adminConsole_Desg_Id'] == FSCWS_DESIGNATION || $_SESSION['adminConsole_Desg_Id'] == CSO_DESIGNATION) && $arrRecords['intFeedbackStatus'] > 0){
                                             $intStatusForEdit = 1;
                                          }else{
                                             $intStatusForEdit = 0;
                                          }
                                       ?>
                                     <?php  /*if(($_SESSION['adminConsole_Desg_Id'] == FSCWS_DESIGNATION || $_SESSION['adminConsole_Desg_Id'] == CSO_DESIGNATION)  ){ ?>
                                      <td style="text-align: center;">
                                      <?php if( $arrRecords['intRequestedById'] == $userId){ ?>
                                      <?php if( $arrRecords['intFeedbackStatus']==1){ ?>
                                          <a id="viewFeebackStatus<?php echo $arrRecords['intFeedbackRecId'];?>" class="btn btn-success text-center btn-sm viewFeebackStatus<?php echo $arrRecords['intFeedbackRecId'];?>" title="Update" onclick="viewCallRemarkStatus(<?php echo $arrRecords['intFeedbackRecId'];?>);"><i class="icon-eye1" aria-hidden="true"></i></a>
                                          <?php } else{ ?>
                                             <a style="display:none" id="viewFeebackStatus<?php echo $arrRecords['intFeedbackRecId'];?>" class="btn btn-success text-center btn-sm viewFeebackStatus<?php echo $arrRecords['intFeedbackRecId'];?>" title="Update" onclick="viewCallRemarkStatus(<?php echo $arrRecords['intFeedbackRecId'];?>);"><i class="icon-eye1" aria-hidden="true"></i></a>

                                             <?php  } ?>
                                             <?php  } ?>
                                      </td>
                                      <?php } */?>
                                      <td><?php if($arrRecords['intCallBackRequest']>0 && $arrRecords['intRequestedById'] == $userId){ ?>
                                          <div class="selFeebackStatus<?php echo $arrRecords['intFeedbackRecId'];?>" style="margin-bottom: 5px;<?php echo ($arrRecords['intFeedbackStatus'] > 0)?'display: none;':''; ?> ">
                                             <select onchange="showHideFeedbackAsnwer(<?php echo $arrRecords['intFeedbackRecId'];?>, this.value)" class="from-control selFeebackStatus<?php echo $arrRecords['intFeedbackRecId'];?> "  id="selFeebackStatus<?php echo $arrRecords['intFeedbackRecId'];?>">
                                            <?php foreach (FEEDBACK_CALL_STATUS as $key => $statusName) { ?>         
                                       <option value="<?php echo $key; ?>"><?php echo $statusName; ?></option>
                                            <?php } ?>
                                             </select> 
                                             <?php //if($_SESSION['adminConsole_Desg_Id'] == HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id'] == CMO_DESIGNATION) {
                                                     // $userType = 1; ?>
                                                  <?php /* <a class="btn btn-success btn-sm selFeebackStatus<?php echo $arrRecords['intFeedbackRecId'];?>" title="Update" onclick="updateCallStatusfoCm(<?php echo $arrRecords['intFeedbackRecId'];?>,<?php echo $intStatusForEdit;?>,<?php echo $userType;?>);" id="updateFedbck<?php echo $arrRecords['intFeedbackRecId'];?>"   ><i class="icon-arrow-right-circle1" aria-hidden="true"></i></a> */ ?>

                                             <?php /* } else{
                                                      $userType = 2; ?>

                                             <?php  }  */?>
                                            <?php $userType = 2;?>
                                               <a class="btn btn-success btn-sm selFeebackStatus<?php echo $arrRecords['intFeedbackRecId'];?>" title="Update" onclick="updateCallStatus(<?php echo $arrRecords['intFeedbackRecId'];?>,<?php echo $intStatusForEdit;?>,<?php echo $userType;?>);" id="updateFedbck<?php echo $arrRecords['intFeedbackRecId'];?>" ><i class="icon-arrow-right-circle1" aria-hidden="true"></i></a>

                                             <a style="display: none;" class="btn btn-warning btn-sm btnCancel<?php echo $arrRecords['intFeedbackRecId'];?>" title="Cancel" onclick="CancelCallStatus(<?php echo $arrRecords['intFeedbackRecId'];?>);"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                          </div>

                                          <!-- Edit Only for hcm/CMO :: -->
                                          <?php if($_SESSION['adminConsole_Desg_Id'] == HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id'] == CMO_DESIGNATION ){                    ?> 
                                                   <div onclick="return showHideFeebackStatusEdit(<?php echo $arrRecords['intFeedbackRecId'];?>)" class="selFeebackStatusEdit<?php echo $arrRecords['intFeedbackRecId'];?>" style="<?php echo ($intStatusForEdit == 0)?'display: none;':''; ?>">
                                                   <a href="javascript:void(0)" class="btn btn-primary btn-sm pull-right" ><i class="icon-checkbox-pen-outline"></i></a>
                                                   </div>
                                          <?php } ?>    


                                      <?php } ?>
                                      <?php 
                                      if($arrRecords['intRequestedById'] == $userId && $arrRecords['intFeedbackStatus'] == 1 && $arrRecords['intCountFeedbackAns'] == 0 && ($_SESSION['adminConsole_Desg_Id'] != HCM_DESIGNATION && $_SESSION['adminConsole_Desg_Id'] != CMO_DESIGNATION && $_SESSION['adminConsole_Desg_Id'] != OPERATOR)){ $authFeedbackShow='style="display:block;"'; ?>
                                     
                                        
                                      <?php  } else {
                                        if($arrRecords['intRequestedById'] == $userId && $arrRecords['intFeedbackStatus'] == 1 && $arrRecords['intCountFeedbackAns'] > 0 && ($_SESSION['adminConsole_Desg_Id'] != HCM_DESIGNATION && $_SESSION['adminConsole_Desg_Id'] != CMO_DESIGNATION && $_SESSION['adminConsole_Desg_Id'] != OPERATOR)){
                                          echo '<span>Feedback Received</span>';
                                          $authFeedbackShow='style="display:none;"';
                                          $authFeedbackReceiveShow='style="display:block;"';
                                        }
                                        
                                      }
                                      
                                      if($_SESSION['adminConsole_Desg_Id'] == HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id'] == CMO_DESIGNATION ){ 
                                       $authFeedbackShow='style="display:none;"';
                                       $authFeedbackReceiveShow='style="display:none;"';
                                      }
                                      ?>
                                       <a href="javascript:void(0)" class="btn btn-primary btn-sm pull-left"  id="feedbackUpdate<?php echo $arrRecords['intFeedbackRecId'];?>" onclick="return showFeedbackQuestionAnswer('<?php echo $arrRecords['intDepartmentId'] ?>','<?php echo $arrRecords['intServiceId'] ?>', '<?php echo $arrRecords['intFeedbackRecId'] ?>','<?php echo $arrRecords['vchRationCardNo'] ?>')" <?php echo $authFeedbackShow;?>><i class="icon-arrow-right-circle1"></i></a>

                                       <br/><a href="javascript:void(0)" class="btn btn-success btn-sm pull-left"  id="feedbackReceive<?php echo $arrRecords['intFeedbackRecId'];?>" onclick="return showFeedbackQuestionAnswerReceived('<?php echo $arrRecords['intDepartmentId'] ?>','<?php echo $arrRecords['intServiceId'] ?>', '<?php echo $arrRecords['intFeedbackRecId'] ?>','<?php echo $arrRecords['vchRationCardNo'] ?>')" <?php echo $authFeedbackReceiveShow;?> ><i class="icon-eye1"></i></a>

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
<div class="modal fade" id="FeedbackAnswer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Feedback</h4>
                <input type="hidden" name="FeedbackRecId" id="FeedbackRecId" value="0">
            </div>
            <div class="modal-body" id="divFeedbackOption" style="padding: 20px;">
                           <div class="form-group feedbackEntryCls">
                                                <div class="col-sm-12">
                                                                     <div class="radio">
                                                                        <input id="intDirectCallFeedbackStatus_bad1" class="magic-radio intDirectCallFeedbackStatus" value="4" type="radio" name="intDirectCallFeedbackStatus">
                                                                        <label for="intDirectCallFeedbackStatus_bad1">Bad</label> &nbsp;
                                                                        <input id="intDirectCallFeedbackStatus_bad" class="magic-radio intDirectCallFeedbackStatus" value="1" type="radio" name="intDirectCallFeedbackStatus">
                                                                        <label for="intDirectCallFeedbackStatus_bad">Poor</label> &nbsp;
                                                                        <input id="intDirectCallFeedbackStatus_average" class="magic-radio intDirectCallFeedbackStatus" type="radio" value="2" name="intDirectCallFeedbackStatus">
                                                                        <label for="intDirectCallFeedbackStatus_average">Average</label> &nbsp;
                                                                        <input id="intDirectCallFeedbackStatus_good" class="magic-radio intDirectCallFeedbackStatus" type="radio" value="3" name="intDirectCallFeedbackStatus">
                                                                        <label for="intDirectCallFeedbackStatus_good">Good</label>&nbsp;
                                                                        <input id="intDirectCallFeedbackStatus_outstanding" class="magic-radio intDirectCallFeedbackStatus" value="5" type="radio" name="intDirectCallFeedbackStatus">
                                                                        <label for="intDirectCallFeedbackStatus_outstanding">Outstanding</label>
                                                                     </div>
                                                </div>
                           </div>
               <div class="form-group feedbackEntryCls">
                                <label class="col-sm-2">Remarks : </label>
                                 <div class="col-sm-12">
                                    <textarea name="vchFeedbackRemarks" rows="4" id="vchFeedbackRemarks" class="form-control" maxlength="200"></textarea>
                                    <label name="lblFeedbackRemarks" id="lblFeedbackRemarks" class="" style="display:none;"></label>
                                 </div>
               </div>
               <div class="form-group feedbackEntryCls">
                        <div class="col-sm-12">
                           <button type="button" id="btnFeedbakSubmit" name="btnFeedbakSubmit" onclick="SubmitFeedbackStatus()" class="btn btn-success">Submit</button>
                        </div>
               </div>
               <div class="form-group feedbackMsgCls" style="display:none;">
                        <div class="col-sm-12" id="feedBackMsg">
                           
                        </div>
               </div>



            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="FeedbackAnswerGiven" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Feedback</h4>
                <input type="hidden" name="FeedbackRecId" id="FeedbackRecId" value="0">
            </div>
            <div class="modal-body" id="" style="padding: 20px;">
                           <div class="form-group ">
                                                <div class="col-sm-12">
                                                                     <div class="radio">
                                                                        <input id="intDirectCallFeedbackStatus_bad12" class="magic-radio intDirectCallFeedbackStatus" value="4" type="radio" name="intDirectCallFeedbackStatus1">
                                                                        <label for="intDirectCallFeedbackStatus_bad1">Bad</label> &nbsp;
                                                                        <input id="intDirectCallFeedbackStatus_bad1" class="magic-radio intDirectCallFeedbackStatus" value="1" type="radio" name="intDirectCallFeedbackStatus1">
                                                                        <label for="intDirectCallFeedbackStatus_bad">Poor</label> &nbsp;
                                                                        <input id="intDirectCallFeedbackStatus_average1" class="magic-radio intDirectCallFeedbackStatus" type="radio" value="2" name="intDirectCallFeedbackStatus1">
                                                                        <label for="intDirectCallFeedbackStatus_average">Average</label> &nbsp;
                                                                        <input id="intDirectCallFeedbackStatus_good1" class="magic-radio intDirectCallFeedbackStatus" type="radio" value="3" name="intDirectCallFeedbackStatus1">
                                                                        <label for="intDirectCallFeedbackStatus_good">Good</label>&nbsp;
                                                                        <input id="intDirectCallFeedbackStatus_outstanding1" class="magic-radio intDirectCallFeedbackStatus" value="5" type="radio" name="intDirectCallFeedbackStatus1">
                                                                        <label for="intDirectCallFeedbackStatus_outstanding">Outstanding</label>
                                                                     </div>
                                                </div>
                           </div>
               <div class="form-group ">
                                <label class="col-sm-2">Remarks : </label>
                                 <div class="col-sm-12">
                                    
                                    <label name="lblFeedbackRemarks" id="lblFeedbackRemarks12" class="" ></label>
                                 </div>
               </div>
               
               



            </div>
        </div>
    </div>
</div>







<script src="<?php echo URL;?>js/jquery.blockUI.js"></script>  
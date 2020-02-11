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
<script language="javascript">
         var backPath = 'outboundMisReport';

    $(document).ready(function () {
       viewSearchPannel('<?php echo $openFlag; ?>', 'searchPanel', 'chkSearch'); 
       // getDepartmentList('vchDepartmentId','<?php echo $vchDepartmentId;?>');

       getDepartmentList('vchDepartmentId','<?php echo $vchDepartmentId;?>');
       getDeptWiseService('intServicesId','<?php echo $vchDepartmentId;?>','<?php echo $intServiceId;?>');
       getServiceWiseScheme('intSchemeTypeId','<?php echo $intServiceId;?>');
       <?php if($_SESSION['adminConsole_agency']>0){?>
          fillDistrictRangeWise(<?php echo $_SESSION['adminConsole_agency'];?>,'intDistrictId',<?php echo $intDistrictId;?>);
      <?php } else {?>

         getDistrictList('intDistrictId','<?php echo $intDistrictId; ?>');
    <?php } ?>
    getRequestedByList('intRequestedBy','<?php echo $intUserId;?>');
        loadNavigation('Dashboard');
        //indicate = 'yes';
         //deleteMe     = "yes";
         //printMe     = "yes";
         //publishMe     = "yes";
         //unpublishMe     = "yes";
         backMe     = "yes";
           downloadMe='yes';
         $('#vchFromDate').datepicker({
      format: "dd-M-yyyy",
          todayBtn: "linked",
          autoclose: true,
          todayHighlight: true,
          endDate: '+0d',
      }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#vchToDate').datepicker('setStartDate', minDate);
    });
      $('#vchToDate').datepicker({
      format: "dd-M-yyyy",
          todayBtn: "linked",
          autoclose: true,
          todayHighlight: true,
          endDate: '+0d',
      }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#vchFromDate').datepicker('setEndDate', minDate);
      });
          <?php if($outMsg != '') { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?> 
        });

  function getInboundDetails(vchDetail)
{
   
            //viewAlert(vchDetail);
            var tabDiv = '';

            tabDiv += '<div class="form-group clearfix">';
            tabDiv += '<div class="col-sm-12">';
            tabDiv += '<p class="margin-top-12">'+vchDetail+'</p>';
            tabDiv += '</div>';
            tabDiv += '</div>'; 
            $('#travelAgentDetails').html(tabDiv);
            $('#DetailsModal').modal('show');
            // $('#DetailsModal2').modal('show');

}
 
   
</script>
   <div class="mainpanel">
            <div class="section">
               <div class="page-title">
                  <div class="title-details">
                     <!-- <h4>Details</h4> -->
                  <input type="text" style="position: fixed; left: -10000000px;" disabled/>
                  </div>
                   <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"><span class="icon-home1"></span></a></li>
                           <li class="breadcrumb-item"><a href="#">Reports</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Outbound Call MIS Report Summary</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                              <!-- <a class="nav-item nav-link "  href="<?php echo URL;?>addService">Add</a> -->
                              <a class="nav-item nav-link active"  href="javascript:void(0)">OUTBOUND CALL MIS REPORT Summary</a>
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
                                 <!-- <div class="row">
                                    <label class="col-sm-2 ">Department </label>
                                    <div class="col-sm-2">
                                       <select class="form-control" name="vchDepartmentId" id="vchDepartmentId">
                                 </select>
                                    </div>
                                    <label class="col-lg-2 ">Services Name </label>
                                    <div class="col-lg-3">
                                       <input type="text" class="form-control" name="vchServiceName" id="vchServiceName" placeholder="" data-bv-field="fullName" value="<?php //echo $vchServiceName;?>">
                                    </div>
                                    <div class="col-lg-2">
                                       <button class="btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                                    </div>
                                 </div> -->
           <div class="row">
                                  <label class="col-sm-1 ">From</label>
                                        <div class="col-sm-2">
                                        <div class="input-group ">                                        
                                        <input type="text"   name="vchFromDate" id="vchFromDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo (strtotime($vchFromDate)>0)?date('d-M-Y',strtotime($vchFromDate)):'';?>" >
                                        <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                        </div>
                                        </div>

                                 <label class="col-sm-1 ">To</label>
                                        <div class="col-sm-2">
                                        <div class="input-group ">                                        
                                        <input type="text"   name="vchToDate" id="vchToDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo (strtotime($vchToDate)>0)?date('d-M-Y',strtotime($vchToDate)):'';?>" >
                                        <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                        </div>
                                        </div>
                                <!--  <label class="col-sm-1 ">Department </label>
                                    <div class="col-sm-2">
                                       <select class="form-control" name="vchDepartmentId" id="vchDepartmentId" onchange="getDeptWiseService('intServicesId',this.value,0);">
                                 </select>
                                    </div> -->

                                 <label class="col-sm-1 ">Service</label>       
                                 <div class="col-sm-2">
                                  <select class="form-control" id="intServicesId" name="intServicesId" <?php if($type==2){echo'style="display: none;"'; } ?> onchange="getServiceWiseScheme('intSchemeTypeId',this.value,0);">
                                    <option value="0">--- Services ---</option>
                                  </select>
                                </div>
                                 <label class="col-sm-1 ">Scheme</label>       
                                 <div class="col-sm-2">
                                  <select class="form-control" id="intSchemeTypeId" name="intSchemeTypeId" <?php if($type==2){echo'style="display: none;"'; } ?>>
                                    <option value="0">--- Schemes ---</option>
                                  </select>
                                </div>

                               </div>

          <div class="row"><br/>
                                 
                                    
                                 <label class="col-sm-1 ">Mobile</label>
                                <div class="col-sm-2">
                                       <input type="tel" onkeypress="return isNumberKey(event)" maxlength="10" name="vchMobile" id="vchMobile" placeholder="Mobile No." class="form-control" value="<?php echo $vchMobile ?>">
                                    </div> 
              
                                <label class="col-sm-1 ">District</label>
                                 <div class="col-sm-2">
                                  <select class="form-control" name="intDistrictId" id="intDistrictId">
                                    <option value="0">--- District ---</option>
                                  </select>
                                </div>
                                 

                                <?php if($_SESSION['adminConsole_Desg_Id'] == HCM_DESIGNATION || $_SESSION['adminConsole_Desg_Id'] == CMO_DESIGNATION || $userId == 1) {?> 
                                      <label class="col-sm-1 ">Authority</label>
                                        <div class="col-sm-2">
                                       <select class="form-control" name="intRequestedBy" id="intRequestedBy" >
                                       <option value="0">---Select---</option>
                                       </select>
                                    </div>    
                                      <?php } ?>
                                      <label class="col-sm-1 ">Status</label>
                                      <div class="col-sm-2">
                                       <select class="form-control" name="intCallStatus" id="intCallStatus" >
                                       <option value="">---Select Status---</option>
                              <?php foreach (FEEDBACK_CALL_STATUS as $key => $statusName) { if((string)$status=== (string)$key){ $selected='selected'; }else{$selected='';} ?>         
                                       <option value="<?php echo $key; ?>"<?php echo $selected; ?>><?php echo $statusName; ?></option>
                              <?php } ?>
                                       </select>
                                    </div>    
                              <div class="col-sm-1">
                                <button class="btn btn-primary" id="search" name="search" value="search"> <i class="fa fa-search"></i> Search</button>
                                  </div>
                  </div>                
                              </div>
                           </div>
                             <!-- <div class="center"><a href="javascript:void(0);" class="btn btn-xs btn-info btnSearch" id="chkSearch"></a></div> -->
                           <div class="text-center"> <a class="searchopen" title="Search" data-toggle="tooltip" data-placement="bottom" > <i class="icon-angle-arrow-down" ></i> </a></div>
                        </div>
                        <!-- Search Panel -->
                        <!--===================================================-->
                        <div class="card-body">
                           <div class="table-responsive" id="viewTable">
                             <div class="legandBox pull-left">      
                             <!-- <span class="greenLegend">&nbsp;</span>Published &nbsp;     
                             <span class="yellowLegend">&nbsp;</span> Unpublished  &nbsp; -->
                              </div>
                               <?php if ($result->num_rows > 0) {                  
                                $ctr = $intRecno; 
                             ?>
                              <table data-toggle="table" class="table table-hover table-bordered" id="dataTable" id="dataTable">
                                 <thead>
                                 
                                    <tr>
                                    </th>
                                       <th width="40px">Sl#</th>
                                       <th width="150px">Caller Name</th>
                                       <th width="100px">Mobile Number</th>
                                       <th width="100px">District</th>
                                       <th width="40px">Service</th>
                                       <th width="40px">Scheme</th>
                                       <th width="50px">Other Info.</th>
                                       <th width="100px">Call Date</th>
                                       <th width="100px">Call Status</th>
                                       <th width="100px">Authority Name</th>
                                      <!--  <th width="150px">Created By</th>
                                       <th width="150px">Created On</th> -->
                                    </tr>
                                 </thead>
                                 <tbody>
                                   
                         <?php 
                               while ($row =$result->fetch_array()) { 
                                $vchStatus = FEEDBACK_CALL_STATUS[$row['intFeedbackStatus']];//print_r($row);exit;
                                /*if($row['intFeedbackStatus']==1){
                                   $vchStatus='Received';  
                                }elseif ($row['intFeedbackStatus']==2) {
                                    $vchStatus='Not Reachable';
                                }elseif ($row['intFeedbackStatus']==3) {
                                    $vchStatus='Invalid Number';
                                }elseif ($row['intFeedbackStatus']==4) {
                                    $vchStatus='Phone Not Picked';
                                }elseif ($row['intFeedbackStatus']==4) {
                                    $vchStatus='Not Interested';
                                }elseif ($row['intFeedbackStatus']==4) {
                                    $vchStatus='DND';
                                }*/
                                

                                $ctr++; 
                          ?>  <tr>
                                 <td><?php echo $ctr;?></td>
                                 <td><?php echo !empty($row['vchName'])?$row['vchName']:'---';?></td>
                                 <td><?php echo !empty($row['intMobile'])?$row['intMobile']:'---';?></td>
                                 <td> <?php echo !empty($row['vchDistrict'])?$row['vchDistrict']:'---';?>
                                    <!-- <small><div class="text-muted"><strong>District: </strong> <?php echo !empty($row['vchDistrict'])?$row['vchDistrict']:'---';?></div></small>
                                    <small><div class="text-muted"><strong>Block: </strong> <?php echo !empty($row['vchBlock'])?$row['vchBlock']:'---';?></div></small>
                                    <small><div class="text-muted"><strong>GP: </strong> <?php echo !empty($row['vchGP'])?$row['vchGP']:'---';?></div></small>
                                    <small><div class="text-muted"><strong>Village: </strong> <?php echo !empty($row['vchVillage'])?$row['vchVillage']:'---';?></div></small>
                                  -->
                                    
                                  </td>
                                 <td><?php echo !empty($row['vchServiceName'])?$row['vchServiceName']:'---';?></td>
                                 <td><?php echo !empty($row['vchSchemeTypeName'])?$row['vchSchemeTypeName']:'---';?></td>
                                  <td>
                                    <!-- <small><div class="text-muted"><strong>Reg. Date: </strong> <?php echo !empty($row['dtmRegdDateTime'])?date('d-m-Y',strtotime($row['dtmRegdDateTime'])):'---';?></div></small>
                                    <?php if($row['intServiceId']==RCMS){ ?>
                                    <small><div class="text-muted"><strong>Ration Card No.: </strong> <?php echo !empty($row['vchRationCardNo'])?$row['vchRationCardNo']:'---';?></div></small>
                                    <small><div class="text-muted"><strong>No. Of Family: </strong> <?php echo !empty($row['intNoFamily'])?$row['intNoFamily']:'---';?></div></small>
                                    <small><div class="text-muted"><strong>Card Type: </strong> <?php echo !empty($row['vchCardName'])?$row['vchCardName']:'---';?></div></small>
                                  <?php } else{ ?>
                                    <small><div class="text-muted"><strong>Token No.: </strong> <?php echo !empty($row['vchTokenNo'])?$row['vchTokenNo']:'---';?></div></small>
                                    <small><div class="text-muted"><strong>Deposite Date: </strong> <?php echo !empty($row['dtmPaddyDeposite'])?date('d-m-Y',strtotime($row['dtmPaddyDeposite'])):'---';?></div></small>
                                 
                                    <?php } ?> -->

                                    <?php
                                    $otherInfoTxt = '';
                                    if($row['jsonRelatedInfo'] != '' /*&& $row['intServiceId'] == RCMS*/){
                                      $jsonRelatedInfo    = json_decode($row['jsonRelatedInfo']);
                                      $arrReletedInfo     = (array)$jsonRelatedInfo;
                                      if(count($arrReletedInfo) > 0){
                                          foreach($arrReletedInfo as $key => $infoVal){
                                              // $vchRelatedInfo = str_replace("_"," ",$key).' : '.$infoVal;
                                              $otherInfoTxt .= '<small class="text-muted"><div>'. str_replace("_"," ",$key) .' : '. $infoVal .'</div></small>';
                                          }
                                      }
                                    }else{
                                        $otherInfoTxt .= '--';
                                    }
                                    echo $otherInfoTxt;
                                    ?>
                                  </td>
                          
                                 <td><?php echo !empty($row['dtmFeedbackRcvTime'])?date("d-M-Y",strtotime($row['dtmFeedbackRcvTime'])):'---';?></td>
                                 <td><?php echo $vchStatus;?></td>
                                 <td><?php echo !empty($row['VCH_FULL_NAME'])?$row['VCH_FULL_NAME']:'---';?></td>
                                <!--  <td><?php //echo !empty($row['vchComplain'])?$row['vchComplain']:'---';?></td> -->
                                <!--  <td><a href="javascript:void(0);" onclick="return getInboundDetails('<?php //echo $row['vchComplain'] ?>')">-Details-</a></td> -->
                                 <!-- <td><?php //echo !empty($row['varReferenceNo'])?$row['varReferenceNo']:'---';?></td>
                                 <td><?php //echo !empty($row['vchFullName'])?$row['vchFullName']:'---';?></td> -->
                              </tr>
                           </tbody>
                         <?php } ?>
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
<div class="modal fade" id="DetailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="commentsModalLabel">Call Summary</h4>

            </div>
            <div class="modal-body" id="travelAgentDetails" style="padding: 20px;">
                 
            </div>
        </div>
    </div>
</div>
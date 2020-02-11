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
               <div class="page-title">
                  <div class="title-details">
                     <h4>Inbound Call Summary</h4>
                  
                  </div>
                   <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"><span class="icon-home1"></span></a></li>
                           <!-- <li class="breadcrumb-item"><a href="#">Master Data Mgmt</a></li> -->
                           <li class="breadcrumb-item active" aria-current="page">Inbound Call Summary</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                              <!-- <a class="nav-item nav-link "  href="<?php echo URL;?>addService">Add</a> -->
                              <!-- <li> -->
                              <a class="nav-item nav-link <?php echo (empty($_SESSION['TodayYesterdayAll']) || $_SESSION['TodayYesterdayAll']==1)?'active':'';?>"  href="javascript:void(0)" onclick="setTodayYesterdayAll(1)">Today <sup><strong class="badge badge-success"><?php echo !empty($totalAllResult['TODAYCNT'])?$totalAllResult['TODAYCNT']:0;?></strong></sup> </a>
                            <!-- </li> -->
                              <a class="nav-item nav-link <?php echo (!empty($_SESSION['TodayYesterdayAll']) && $_SESSION['TodayYesterdayAll']==2)?'active':'';?>"  href="javascript:void(0)" onclick="setTodayYesterdayAll(2)">Yesterday <sup><strong class="badge badge-success"><?php echo !empty($totalAllResult['YESTERDAYTCNT'])?$totalAllResult['YESTERDAYTCNT']:0;?></strong></sup></a>
                              <a class="nav-item nav-link <?php echo (!empty($_SESSION['TodayYesterdayAll']) && $_SESSION['TodayYesterdayAll']==3)?'active':'';?>"  href="javascript:void(0)" onclick="setTodayYesterdayAll(3)">All <sup><strong class="badge badge-success"><?php echo !empty($totalAllResult['TOTALCNT'])?$totalAllResult['TOTALCNT']:0;?></strong></sup></a>
                              <?php //include('includes/util.php'); ?>
                           </ul>
                           <div class="indicatorslist">
                            <?php //include('includes/util.php'); ?>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                        <!-- Search Panel -->
                        <?php if(!empty($_SESSION['TodayYesterdayAll']) && $_SESSION['TodayYesterdayAll']==3) { ?>
                        <div class="search-container">
                           <div class="search-sec" id="searchPanel">
                              <div class="form-group">
                                 <!-- <div class="row">
                                    <label class="col-sm-2 ">Department </label>
                                    <div class="col-sm-3">
                                       <select class="form-control" name="vchDepartmentId" id="vchDepartmentId">
                                 </select>
                                    </div>
                                    <label class="col-lg-2 ">Services Name </label>
                                    <div class="col-lg-3">
                                       <input type="text" class="form-control" name="vchServiceName" id="vchServiceName" placeholder="" data-bv-field="fullName" value="<?php echo $vchServiceName;?>">
                                    </div>
                                    <div class="col-lg-2">
                                       <button class="btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                                    </div>
                                 </div> -->
                                 <div class="row">
            <label class="col-sm-2 text-right">From</label>
            <div class="col-sm-4">
              <div class="input-group ">
                                <!-- <input type="text" class="form-control" > -->
                                <input type="text"   name="vchFromDate" id="vchFromDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo !empty($vchFromDate)?date('d-M-y',strtotime($vchFromDate)):'';?>">
                                <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                </div>
                              </div>
                                <label class="col-sm-1 text-right">To</label>
            <div class="col-sm-4">
              <div class="input-group">
                                <!-- <input type="text" class="form-control" > -->
                                <input type="text"   name="vchToDate" id="vchToDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo !empty($vchToDate)? date('d-M-y',strtotime($vchToDate)):'';?>">
                                <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                </div>

                              </div>
                              <div class="col-sm-1">
                                <button class="btn btn-primary" value="btnSearch"> <i class="fa fa-search"></i> Search</button>
                                  </div>
          </div>
                              </div>
                           </div>
                             <!-- <div class="center"><a href="javascript:void(0);" class="btn btn-xs btn-info btnSearch" id="chkSearch"></a></div> -->
                           <div class="text-center"> <a class="searchopen" title="Search" data-toggle="tooltip" data-placement="bottom" > <i class="icon-angle-arrow-down" ></i> </a></div>
                        </div>
                      <?php } ?>
                        <!-- Search Panel -->
                        <!--===================================================-->
                        <div class="card-body">
                           <div class="table-responsive">
                             <div class="legandBox pull-left">      
                             <!-- <span class="greenLegend">&nbsp;</span>Published &nbsp;     
                             <span class="yellowLegend">&nbsp;</span> Unpublished  &nbsp; -->
                              </div>
                               <?php if ($result->num_rows > 0) {                  
                                $ctr = $intRecno; 
                             ?>
                              <table data-toggle="table" class="table table-hover table-bordered">
                                 <thead>
                                 
                                    <tr>
                                    </th>
                                       <th width="30px">Sl#</th>
                                       <th width="30px">Date</th>
                                       <th width="30px">Caller Name</th>
                                       <th width="30px">Mobile</th>
                                       <th width="30px">District</th>
                                       <!-- <th width="40px">Age</th>
                                       <th width="50px">Gender</th> -->
                                       <th width="50px">Department</th>
                                       <th width="50px">Service Date</th>
                                       <th width="50px">Institution Name</th>
                                       <!-- <th width="50px">Requested By</th> -->
                                       <th width="50px">Status</th>
                                       <th width="50px">Call Summary</th>
                                       <th width="50px">Action</th>
                                      <!--  <th width="150px">Created By</th>
                                       <th width="150px">Created On</th> -->
                                    </tr>
                                 </thead>
                                 <tbody>
                                   
                         <?php 
                               while ($row =$result->fetch_array()) { 
                                // print"<pre>";
                                // print_r($row); exit;
                                $intId=$obj->encrypt($row['intDepartmentId']);
                                $ctr++; 
                                if($row['int_hs_ps_id']!=0){
                                  $complaintAgainst=$row['complaintAgainst'];
                                }else{
                                    $complaintAgainst=$row['vchOther'];
                                }
                          ?>  <tr>
                                 <td><?php echo $ctr;?></td>
                                 <td><?php echo !empty($row['dtmCreatedOn'])?date("d-M-Y",strtotime($row['dtmCreatedOn'])):'---';?></td>
                                 <td><?php echo !empty($row['vchName'])?$row['vchName']:'Anonymous User';?><br><small style="color: grey;">age:&nbsp;<?php echo !empty($row['intAge'])?$row['intAge']:'---';?>&nbsp;&nbsp;gender:&nbsp;<?php echo !empty($row['vchGender'])?$row['vchGender']:'---';?></small> </td>
                                 <td><?php echo !empty($row['intMobile'])?$row['intMobile']:'---';?></td>
                                 <td><?php echo !empty($row['vchDisttrictName'])?$row['vchDisttrictName']:'---';?></td>
                                 <td><?php echo !empty($row['vchDepartment'])?$row['vchDepartment']:'---';?> <br><small style="color: grey;"><?php echo !empty($row['vchService'])?$row['vchService']:'---';?></small></td>
                                 <td><?php echo !empty($row['vchServiceDate'])?date('d-M-Y',strtotime($row['vchServiceDate'])):'---';?></td>
                                 <td><?php echo !empty($complaintAgainst)?$complaintAgainst:'---';?></td>
                                <!--  <td><?php //echo !empty($row['vchComplain'])?$row['vchComplain']:'---';?></td> -->
                                 <td>
                                  <?php if($row['intFeedbackStatus']==0){ ?>
                                      <span>Not Called</span>
                                  <!-- <?php //} else if($row['intFeedbackStatus']==1){ ?>
                                      <span>Call Completed</span>
                                  <?php //} else  if($row['intFeedbackStatus']==2){ ?>
                                      <span>Not Reachable</span>
                                  <?php //} else  if($row['intFeedbackStatus']==3){ ?>
                                      <span>Invalid Number</span>
                                  <?php //} else  if($row['intFeedbackStatus']==4){ ?>
                                      <span>Phone Not Picked</span>
                                  <?php //} else  if($row['intFeedbackStatus']==5){ ?>
                                      <span>Did not want to talk</span>
                                  <?php //} else  if($row['intFeedbackStatus']==6){ ?>
                                      <span>DND</span>
                                  <?php //} else  if($row['intFeedbackStatus']==7){ ?>
                                      <span>Call Later</span> -->
                                  <?php }else{ ?>
                                    <span><?php echo FEEDBACK_CALL_STATUS[$row['intFeedbackStatus']] ?></span>
                                  <?php } ?>
                                 </td>
                                 <td><a class="btn btn-info btn-sm" href="javascript:void(0);" onclick="return getInboundDetails('<?php echo $row['vchComplain'] ?>')" data-original-title="Details" title=""><i class="icon-chat"></i></a></td>
                                 <td>
                                  <!-- <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="" data-original-title="Direct Call" href="javascript:void(0);" ><i class="icon-phone-outgoing1"></i></a> -->
                                  <?php if($row['intRequestStatus']==0 && $_SESSION['adminConsole_Desg_Id']!=OPERATOR){ ?>
                                     <?php if($row['intFeedbackStatus']==0 || $row['intFeedbackStatus']==2 || $row['intFeedbackStatus']==4 || $row['intFeedbackStatus']==6 || $row['intFeedbackStatus']==7 || $row['intFeedbackStatus']==9){ ?>
                                     <a class="btn btn-success btn-sm" data-toggle="tooltip" title="" data-original-title="Call Through CC" href="javascript:void(0);"><i class="icon-phone-forwarded1" onclick="return getInboundCallRequest('<?php echo $row['intInboundDataId']; ?>','<?php echo $userId; ?>')"></i></a>
                                  <?php } ?>
                                <?php } ?>
                                </td>

                                 <!-- <td><a href="javascript:void(0);" onclick="return getInboundDetails('<?php echo $row['vchComplain'] ?>')">-Details-</a></td>
                                 <td><a class="btn btn-info btn-sm" data-toggle="tooltip" data-original-title="Action" href="javascript:void(0);" onclick="return getInboundCallRequest('<?php echo $row['intInboundDataId']; ?>','<?php echo $userId; ?>')"><i class="icon-edit1"></i></a></td> -->
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
<script language="javascript">

    $(document).ready(function () {
       viewSearchPannel('<?php echo $openFlag; ?>', 'searchPanel', 'chkSearch'); 
       getDepartmentList('vchDepartmentId','<?php echo $vchDepartmentId;?>');
        loadNavigation('Dashboard');
        //indicate = 'yes';
         deleteMe     = "yes";
         printMe     = "yes";
         publishMe     = "yes";
         unpublishMe     = "yes";
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
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

    $(document).ready(function () {
       viewSearchPannel('<?php echo $openFlag; ?>', 'searchPanel', 'chkSearch'); 
       // getDepartmentList('vchDepartmentId','<?php echo $vchDepartmentId;?>');

       getDepartmentList('intDepartmentId', '<?php echo ($vchDepartmentId)?$vchDepartmentId:0 ?>');
       getDeptWiseService('intServicesId','<?php echo ($vchDepartmentId)?$vchDepartmentId:0 ?>','<?php echo ($intServiceId)?$intServiceId:0; ?>')
       getDistrictList('intDistrictId','<?php echo ($district)?$district:0 ?>');
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
   <div class="mainpanel">
            <div class="section">
               <div class="page-title">
                  <div class="title-details">
                     <!-- <h4>Details</h4>
                   -->
                  </div>
                   <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"><span class="icon-home1"></span></a></li>
                           <!-- <li class="breadcrumb-item"><a href="#">Master Data Mgmt</a></li> -->
                           <li class="breadcrumb-item active" aria-current="page">Citizen Contact</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                              <!-- <a class="nav-item nav-link "  href="<?php echo URL;?>addService">Add</a> -->
                              <a class="nav-item nav-link active"  href="javascript:void(0)">Citizen Contact</a>
                              <?php //include('includes/util.php'); ?>
                           </ul>
                           <div class="indicatorslist">
                            <?php //include('includes/util.php'); ?>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                        <!-- Search Panel -->
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
              <div class="col-sm-2">
                                  <select class="form-control" name="intDepartmentId" id="intDepartmentId" onchange="return getDeptWiseService('intServicesId',this.value,0)" <?php if($type==2){echo'style="display: none;"'; } ?>>
                                    <option value="0">---Department---</option>
                                  </select>
                                </div>
              <div class="col-sm-2">
                                  <select class="form-control" id="intServicesId" name="intServicesId" <?php if($type==2){echo'style="display: none;"'; } ?>>
                                    <option value="0">--- Services ---</option>
                                  </select>
                                </div>
              <div class="col-sm-2">
                                  <select class="form-control" name="intDistrictId" id="intDistrictId">
                                    <option value="0">--- District ---</option>
                                  </select>
                                </div>
                              <div class="col-sm-1">
                                <input name="searchType" type="hidden"  value="search" />
                                <button class="btn btn-primary" > <i class="fa fa-search"></i> Search</button>
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
                                       <th width="40px">Sl#</th>
                                       <th width="150px">Caller Name</th>
                                       <th width="100px">Mobile</th>
                                       <th width="100px">District</th>
                                       <th width="40px">Department</th>
                                       <th width="50px">Service</th>
                                       <th width="100px">Date</th>
                                      <!--  <th width="150px">Created By</th>
                                       <th width="150px">Created On</th> -->
                                    </tr>
                                 </thead>
                                 <tbody>
                                   
                         <?php 
                               while ($row =$result->fetch_array()) { 
                                $intId=$obj->encrypt($row['intDepartmentId']);
                                $ctr++; 
                          ?>  <tr>
                                 <td><?php echo $ctr;?></td>
                                 <td><?php echo !empty($row['vchName'])?$row['vchName']:'---';?></td>
                               
                                 <td><?php echo !empty($row['intMobile'])?$row['intMobile']:'---';?></td>
                                 <td><?php echo !empty($row['vchDistrict'])?$row['vchDistrict']:'---';?></td>
                                 <td><?php echo !empty($row['vchDepartment'])?$row['vchDepartment']:'---';?></td>
                                 <td><?php echo !empty($row['vchService'])?$row['vchService']:'---';?></td>
                                 <td><?php echo !empty($row['dtmCreatedOn'])?date("d-M-Y",strtotime($row['dtmCreatedOn'])):'---';?></td>
                                <!--  <td><?php //echo !empty($row['vchComplain'])?$row['vchComplain']:'---';?></td> -->
                                <!--  <td><a href="javascript:void(0);" onclick="return getInboundDetails('<?php echo $row['vchComplain'] ?>')">-Details-</a></td> -->
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
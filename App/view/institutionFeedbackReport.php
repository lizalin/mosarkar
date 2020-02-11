<?php 
/* =================================================
  File Name         	   : authorityFeedbackReport.php
  Description		         : This is used for view authority feedback report.
  Developed By            : Niranjan Kumar Pandit
  Developed On            : 08-Oct-2019
  Update History          : <Updated by>		<Updated On>		<Remarks>

  Style sheet             :
  Javscript Files         :
  includes		  :

  ================================================== */

?>
<script language="javascript">

    $(document).ready(function () {
      getDepartmentList('intDepartmentId', '<?php echo $intDepartmentId ?>');
      getDistrictList('intDistrictId','<?php echo $intDistrictId ?>');
      $('.searchopen').trigger('click');
        loadNavigation('Dashboard');
        //indicate = 'yes';
        printMe = 'yes';
        // downloadMe='yes';
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
      })
</script>
<style>
  .badge {
  padding: 3px 7px 1px 7px;
  font-size: 12.025px;
  font-weight: bold;
  white-space: nowrap;
  color: #ffffff;
  background-color: #999999;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}
.badge:hover {
  color: #ffffff;
  text-decoration: none;
  cursor: pointer;
}
.badge-error {
  background-color: #b94a48;
}

.badge-rejected {
  background-color: #FF5F7B!important;
}
.badge-notrecieved {
  background-color: #FF5E00!important;
}
.badge-invalid {
  background-color: #b94a48!important;
}
.badge-unreachable {
  background-color: #FFBC29!important;
}
.badge-unintrested {
  background-color: #FF553C!important;
}
.badge-dnd {
  background-color: #FF0000!important;
}
.badge-callater {
  background-color: #FFB690!important;
}
.badge-error:hover {
  background-color: #953b39;
}
.badge-warning {
  background-color: #f89406;
}
.badge-warning:hover {
  background-color: #c67605;
}
.badge-success {
  background-color: #468847;
}
.badge-success:hover {
  background-color: #356635;
}
.badge-info {
  background-color: #3a87ad;
}
.badge-info:hover {
  background-color: #2d6987;
}
.badge-inverse {
  background-color: #333333;
}
.badge-inverse:hover {
  background-color: #1a1a1a;
}
  .tableFixHead { overflow-y: auto; max-height: 550px; }



/* Just common table stuff. */
table  { border-collapse: collapse; width: 100%; }
table thead{background: #fff;    border: 1px solid #ddd;}
table thead tr{
    
    background: #ddd!important;border-top: 1px solid #ddd!important;
}
table thead tr th{border-bottom: 2px solid #ddd!important}
th, td { padding: 8px 16px; }
th     { background:#eee; }
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
                           <li class="breadcrumb-item"><a href="#">Reports</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Institution wise Feedback Report</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                           
                              <a class="nav-item nav-link active"  href="javascript:void(0)">Institution wise Feedback Report - <?= $vchDept ?></a>
                           </ul>
                              <div class="indicatorslist">
                           <?php include('includes/util.php'); ?>
                            </div>
                           <div class="clearfix"></div>
                        </div>
                        <!-- Search Panel -->
                        <div class="search-container">
                           <div class="search-sec" style="display: block;">
                              <div class="form-group">
                                 <div class="row">
                                  <!-- <label class="col-sm-2 ">From</label>
                                        <div class="col-sm-3">
                                        <div class="input-group ">                                        
                                        <input type="text"   name="vchFromDate" id="vchFromDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php //echo (strtotime($strFromDate)>0)?date('d-M-Y',strtotime($strFromDate)):date('01-M-Y');?>" >
                                        <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                        </div>
                                        </div>

                                 <label class="col-sm-2 ">To</label>
                                        <div class="col-sm-3">
                                        <div class="input-group ">                                        
                                        <input type="text"   name="vchToDate" id="vchToDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php //echo (strtotime($strToDate)>0)?date('d-M-Y',strtotime($strToDate)):date('d-M-Y');?>" >
                                        <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                        </div>
                                        </div> -->
                                      <label class="col-sm-1">Department</label>
                                      <div class="col-sm-2">
                                        <select name="intDepartmentId" <?php echo ($vchDepartment)?'disabled':'' ?> id="intDepartmentId" class="form-control">
                                          <option value="0">-Select Department-</option>
                                        </select>
                                      </div>
                                      <label class="col-sm-1 ">District</label>
                                      <div class="col-sm-2">
                                        <select name="intDistrictId" id="intDistrictId" class="form-control">
                                          <option value="0">-Select District-</option>
                                        </select>
                                      </div>
                                      <label class="col-sm-1">Scoring</label>
                                      <div class="col-sm-2">
                                        <select name="vchScoring" id="vchScoring" class="form-control">
                                          <option <?= ($vchScoring == 0)?'selected':''; ?> value="0">-Select Scoring-</option>
                                          <option <?= ($vchScoring == 1)?'selected':''; ?> value="1">0 to 25 %</option>
                                          <option <?= ($vchScoring == 2)?'selected':''; ?> value="2">26 to 50 %</option>
                                          <option <?= ($vchScoring == 3)?'selected':''; ?> value="3">51 to 75 %</option>
                                          <option <?= ($vchScoring == 4)?'selected':''; ?> value="4">76 to 100 %</option>
                                        </select>
                                      </div>
                                      <div class="col-lg-2">
                                         <button class="btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                                      </div>
                                 </div>
                              </div>
                           </div>
                           <div class="text-center"> <a class="searchopen" title="Search" data-toggle="tooltip" data-placement="bottom" > 
                            <!-- <i class="icon-angle-arrow-down"></i>  -->
                            <i class="icon-up-arrow"></i> 
                          </a></div>
                        </div>
                        <!-- Search Panel -->
                        <!--===================================================-->
                        <div class="card-body">
                           <div class="table-responsive" id="viewTable">
                            <?php if ($result->num_rows > 0) {   $ctr = 1;  ?>

                              <table data-toggle="table" class="table table-hover table-bordered" id="dataTable">
                                 <thead>
                                    <tr>
                                       <th rowspan="2" width="40px">Sl#</th>
                                       <th rowspan="2">Institution Name</th>
                                       <th rowspan="2">Department Name</th>
                                       <th rowspan="2">District Name</th>
                                       <th rowspan="2">Call Completed</th>
                                       <th colspan="6" class="text-center">Completed Call Feedback</th>
                                    </tr>
                                    <tr>
                                      <th>Bad</th>
                                      <th>Poor</th>
                                      <th>Average</th>
                                      <th>Good</th>
                                      <th>Outstanding</th>
                                      <th>Scoring (%)<br><small><small>(No. of Good + Outstanding / No. of Calls * 100)</small></small></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                              <?php
                                    while($arrRecords=$result->fetch_array()){
                                      // $d_arr = 'adsad';
                                       ?>
                                    <tr>
                                      <td><?php echo ++$i ;?></td>
                                      <td><?php echo $arrRecords['vchInstitutionName'] ;?></td>
                                      <td><?php echo ($arrRecords['vchDepartmentName'])?$arrRecords['vchDepartmentName']:'--'; ?></td>
                                      <td><?php echo ($arrRecords['vchDestrictName'])?$arrRecords['vchDestrictName']:'--'; ?></td>
                                      <td class="text-right"><?php echo '<a  title="" data-original-title="View" href="javascript:void(0);"><span class="badge badge-primary">'.($arrRecords['vchCallConnected']).'</span></a>'; ?></td>
                                      <!-- <td class="text-right"><?php //echo $arrRecords['vchReceived'] ;?></td> -->
                                       <td class="text-right"><?php echo '<a  title="" data-original-title="View" href="javascript:void(0);"><span class="badge badge-danger">'.$arrRecords['vchBad'].'</span></a>'; ?></td>

                                      <td class="text-right"><?php echo '<a  title="" data-original-title="View" href="javascript:void(0);"><span class="badge badge-rejected">'.$arrRecords['vchPoor'].'</span></a>'; ?></td>

                                      <!-- <td class="text-right"><?php //echo $arrRecords['vchPoor'] ;?></td> -->
                                      <td class="text-right"><?php echo '<a  title="" data-original-title="View" href="javascript:void(0);"><span class="badge badge-warning">'.$arrRecords['vchAverage'].'</span></a>'; ?></td>
                                      <!-- <td class="text-right"><?php //echo $arrRecords['vchAverage'] ;?></td> -->
                                      <td class="text-right"><?php echo '<a  title="" data-original-title="View" href="javascript:void(0);"><span class="badge badge-unreachable">'.$arrRecords['vchGood'].'</span></a>'; ?></td>

                                       <td class="text-right"><?php echo '<a  title="" data-original-title="View" href="javascript:void(0);"><span class="badge badge-success">'.$arrRecords['vchOutstanding'].'</span></a>'; ?></td>
                                      <td class="text-right"><strong><?php echo round(($arrRecords['vchGood'] + $arrRecords['vchOutstanding']) / $arrRecords['vchCallConnected'] * 100) ;?> %</strong></td>
                                      <!-- <td class="text-right"><?php //echo $arrRecords['vchToBeUpdated'] ;?></td> -->
                                    </tr>
                                
                                   <?php 
                                    $totalCallCompleted = $totalCallCompleted + ($arrRecords['vchCallConnected']);
                                    $totalBad           = $totalBad + $arrRecords['vchBad'];
                                    $totalPoor          = $totalPoor + $arrRecords['vchPoor'];
                                    $totalAverage       = $totalAverage + $arrRecords['vchAverage'];
                                    $totalGood          = $totalGood + $arrRecords['vchGood'];
                                    $totalToBeUpdate    = $totalToBeUpdate + $arrRecords['vchToBeUpdated'];
                                    $totalOutstanding    = $totalOutstanding + $arrRecords['vchOutstanding'];
                                   $ctr++; 
                                  } ?>
                                  </tbody>
                                  <tr>
                                    <th colspan="4">Total</th>
                                    <th class="text-right"><?php echo $totalCallCompleted ?></th>
                                    <th class="text-right"><?php echo $totalBad ?></th>
                                    <th class="text-right"><?php echo $totalPoor ?></th>
                                    <th class="text-right"><?php echo $totalAverage ?></th>
                                    <th class="text-right"><?php echo $totalGood ?></th>
                                    <th class="text-right"><?php echo $totalOutstanding ?></th>
                                    <th class="text-right"><?php echo round(($totalGood + $totalOutstanding) / $totalCallCompleted * 100) ;?> %</strong></th>
                                  </tr>
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
                        </div>
                        <!--===================================================-->
                     </div>
                  </div>
               </div>
            </div>
         </div>

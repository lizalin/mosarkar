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
                           <li class="breadcrumb-item active" aria-current="page">District Wise Feedback Report</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                           
                              <a class="nav-item nav-link active"  href="javascript:void(0)">District Wise Feedback Report</a>
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
                                      <?php /* <label class="col-sm-1">Department</label>
                                      <div class="col-sm-2">
                                        <select name="intDepartmentId" <?php echo ($vchDepartment)?'disabled':'' ?> id="intDepartmentId" class="form-control">
                                          <option value="0">-Select Department-</option>
                                        </select>
                                      </div> */ ?>
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
                                       <th width="40px">Sl#</th>
                                       <th>District</th>
                                       <th>Home(%)<br><small>(No. of Good + Outstanding / No. of Calls * 100)</small></th>
                                       <th>Health & Family Welfare(%)<br><small>(No. of Good + Outstanding / No. of Calls * 100)</small></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                              <?php
                                    while($arrRecords=$result->fetch_array()){
                                      // print_r($arrRecords);
                                      // $d_arr = 'adsad';
                                       ?>
                                    <tr>
                                      <td><?php echo ++$i ;?></td>
                                      <td><?php echo $arrRecords['VCH_VALUE_NAME'] ;?></td>
                                      <td>
                                        <?php 
                                        $home['intDistrictId']=$arrRecords['INT_SUBNODEVAL_ID'];            
                                        $home['intDepartmentId']=DEPART_HOME;            
                                        $homeEncrypt   = $obj->encrypt(json_encode($home));
                                        $homePercentage = !empty($arrRecords['vchHomeCallConnected'])?round(($arrRecords['vchHomeGood'] + $arrRecords['vchHomestanding']) / $arrRecords['vchHomeCallConnected'] * 100):0;
                                          $homePercentage= !empty($homePercentage)?$homePercentage.' %':0; 
                                        ?>
                                        <?php if(!empty($homePercentage)){ ?>
                                        <a href="<?php echo URL;?>institutionFeedbackReport\<?php echo $homeEncrypt;?>" target="_blank"><span class="badge badge-primary"><?php echo $homePercentage;?></span></a>
                                      <?php }else{ ?>
                                          <span class="badge badge-primary"><?php echo $homePercentage;?></span>
                                      <?php } ?>
                                      </td>
                                      <td>
                                        <?php 
                                        $health['intDistrictId']=$arrRecords['INT_SUBNODEVAL_ID'];            
                                        $health['intDepartmentId']=DEPART_HEALTH;            
                                        $healthEncrypt   = $obj->encrypt(json_encode($health));
                                          $healthPercentage = !empty($arrRecords['vchHealthCallConnected'])?round(($arrRecords['vchHealthGood'] + $arrRecords['vchHealthstanding']) / $arrRecords['vchHealthCallConnected'] * 100):0;
                                          $healthPercentage = !empty($healthPercentage)?$healthPercentage.' %':0; 

                                        ?>
                                         <?php if(!empty($healthPercentage)){ ?>
                                        <a href="<?php echo URL;?>institutionFeedbackReport\<?php echo $healthEncrypt;?>" target="_blank"><span class="badge badge-success"><?php echo $healthPercentage;?></span></a>
                                      <?php }else{ ?>
                                          <span class="badge badge-success"><?php echo $healthPercentage;?></span></a>
                                      <?php } ?>
                                      </td>
                                    </tr>
                                
                                   <?php 
                               
                                   $ctr++; 
                                  } ?>
                                  </tbody>
                                  <!-- <tr>
                                    <th colspan="4">Total</th>
                                    <th class="text-right"><?php echo $totalCallCompleted ?></th>
                                    <th class="text-right"><?php echo $totalBad ?></th>
                                    <th class="text-right"><?php echo $totalPoor ?></th>
                                    <th class="text-right"><?php echo $totalAverage ?></th>
                                    <th class="text-right"><?php echo $totalGood ?></th>
                                    <th class="text-right"><?php echo $totalOutstanding ?></th>
                                    <th class="text-right"><?php echo round(($totalGood + $totalOutstanding) / $totalCallCompleted * 100) ;?> %</strong></th>
                                  </tr> -->
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

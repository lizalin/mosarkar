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
        loadNavigation('Dashboard');
        //indicate = 'yes';
        printMe = 'yes';
        downloadMe="yes"
        $('#vchFromDate').datepicker({
        format: "dd-M-yyyy",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true,
        endDate: '+0d',
        });
        var $th = $('.tableFixHead').find('thead th')
        $('.tableFixHead').on('scroll', function() {
        $th.css('transform', 'translateY('+ this.scrollTop +'px)');
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
.badge-notvisited {
  background-color: #EA5EC2!important;
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
                           <li class="breadcrumb-item active" aria-current="page">Outbound Call MIS Report</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                           
                              <a class="nav-item nav-link active"  href="javascript:void(0)">Outbound Call MIS Report</a>
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
                                        <input type="text"   name="vchFromDate" id="vchFromDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo (strtotime($strFromDate)>0)?date('d-M-Y',strtotime($strFromDate)):date('01-M-Y');?>" >
                                        <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                        </div>
                                        </div>

                                 <label class="col-sm-2 ">To</label>
                                        <div class="col-sm-3">
                                        <div class="input-group ">                                        
                                        <input type="text"   name="vchToDate" id="vchToDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo (strtotime($strToDate)>0)?date('d-M-Y',strtotime($strToDate)):date('d-M-Y');?>" >
                                        <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                        </div>
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
                           <div class="table-responsive tableFixHead" id="viewTable">
                            <?php if ($result->num_rows > 0) {   $ctr = 1;  ?>

                              <table data-toggle="table" class="table table-hover table-bordered" id="dataTable">
                                 <thead>
                                    <tr>
                                       <th rowspan="2" width="40px">Sl#</th>
                                       <th rowspan="2">Authority Name</th>
                                       <!-- <th rowspan="2">Department Name</th> -->
                                       <th rowspan="2">Call Attempted</th>
                                       <th rowspan="2">Call Completed</th>
                                       <th colspan="10" class="text-center">Not Connected</th>
                                    </tr>
                                    <tr>
                                      <th>Not Reachable</th>
                                      <th>Invalid No. / Wrong No.</th>
                                      <th>Did not Pick</th>
                                      <th>Did not want to talk / DND</th>
                                      <th>Govt. Employee</th>
                                      <th>Call Later</th>
                                      <th>No Incoming Call Facility</th>
                                      <th>Switched Off</th>
                                      <th>Not Visited</th>
                                      <th>To Be Updated</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                              <?php
                                    while($arrRecords=$result->fetch_array()){
                                       ?>
                                    <tr>
                                      <td><?php echo ++$i ;?></td>
                                      <td class="text-left"><?php if($arrRecords['vchTotal'] > 0){ ?> <a  title="" data-original-title="View" target="blank" href="<?php echo APPURL;?>viewOutBoundDetails/<?php echo($obj->encrypt(json_encode(array('intDesignationId' => $arrRecords['intDesignationId'],'intUserId' => $arrRecords['intUserId'],'status' => '','strFromDate' => $strFromDate,'strToDate' => $strToDate)))); ?>"><?php echo $arrRecords['vchFullName'] ;?></a><?php }else{echo '<a  title="" data-original-title="View" href="javascript:void(0);">'.$arrRecords['vchFullName'].'</a>';} ?></td>
                                      <!-- <td><?php //echo ($arrRecords['vchDeptName'])?$arrRecords['vchDeptName']:'--'; ?></td> -->
                                      <!-- <td class="text-right"><?php //echo $arrRecords['vchTotal'] ;?></td> -->
                                     <td class="text-right"><?php if($arrRecords['vchTotal'] > 0){ ?> <a  title="" style="text-align:center;" data-original-title="View" target="blank" href="<?php echo APPURL;?>viewOutBoundDetails/<?php echo($obj->encrypt(json_encode(array('intDesignationId' => $arrRecords['intDesignationId'],'intUserId' => $arrRecords['intUserId'],'status' => '','strFromDate' => $strFromDate,'strToDate' => $strToDate)))); ?>"><span class="badge badge-primary"><?php echo $arrRecords['vchTotal'] ;?></span></a><?php }else{echo '<a  title="" data-original-title="View" href="javascript:void(0);"><span class="badge badge-primary">'.$arrRecords['vchTotal'].'</span></a>';} ?></td>
                                      <td class="text-right"><span class="badge badge-success"><?php echo $arrRecords['vchReceived'] ;?></span></td>
                                      
                                      <td class="text-right"><span class="badge badge-unreachable"><?php echo $arrRecords['vchNotRechable'] ;?></span></td>
                                      
                                      <td class="text-right"><span class="badge badge-invalid"><?php echo $arrRecords['vchInvalidNo'] ;?></span></td>
                                      
                                      <td class="text-right"><span class="badge badge-rejected"><?php echo $arrRecords['vchDidNotPick'] ;?></span></td>
                                      
                                      <td class="text-right"><span class="badge badge-unintrested"><?php echo $arrRecords['vchNotIntrested'] ;?></span></td>
                                      
                                      <td class="text-right"><span class="badge badge-info"><?php echo $arrRecords['vchGovtServant'] ;?></span></td>
                                      
                                      <td class="text-right"><span class="badge badge-callater"><?php echo $arrRecords['vchOther'] ;?></span></td>
                                      
                                      <td class="text-right"><span class="badge badge-warning"><?php echo $arrRecords['vchNotIncFacility'] ;?></span></td>
                                      
                                      <td class="text-right"><span class="badge badge-notrecieved"><?php echo $arrRecords['vchSwitchOff'] ;?></span></td>
                                      

                                      <td class="text-right"><span class="badge badge-notvisited"><?php echo $arrRecords['vchNotVisited'] ;?></span></td>
                                      <td class="text-right"><span class="badge badge-error"><?php echo $arrRecords['vchNotUpdate'] ;?></span></td>
                                      
                                    </tr>
                                
                                   <?php 
                                    $totalCallAttempt   =$totalCallAttempt +$arrRecords['vchTotal']  ;
                                    $totalNotUpdated    =$totalNotUpdated +$arrRecords['vchNotUpdate']  ;
                                    $totalNotReachable  =$totalNotReachable +$arrRecords['vchNotRechable']  ;
                                    $totalInvalid       =$totalInvalid +$arrRecords['vchInvalidNo']  ;
                                    $totalNotPicked     =$totalNotPicked + $arrRecords['vchDidNotPick'] ;
                                    $totalNotWanted     =$totalNotWanted +$arrRecords['vchNotIntrested']  ;
                                    $totalDND           =$totalDND + $arrRecords['vchGovtServant'] ;
                                    $totalCallLatter     =$totalCallLatter +$arrRecords['vchOther']  ;
                                    $totalCallCompleted  =$totalCallCompleted +$arrRecords['vchReceived']  ;
                                    $totalNotIncFacility =$totalNotIncFacility +$arrRecords['vchNotIncFacility']  ;
                                    $totalSwitchOff      =$totalSwitchOff +$arrRecords['vchSwitchOff']  ;
                                    $totalNotVisited     =$totalNotVisited +$arrRecords['vchNotVisited']  ;
                                   $ctr++; 
                                  } ?>
                                  </tbody>
                                  <tr>
                                    <th colspan="2">Total</th>
                                    <th class="text-right"><?php echo $totalCallAttempt ?></th>
                                    <th class="text-right"><?php echo $totalCallCompleted ?></th>
                                    <th class="text-right"><?php echo $totalNotReachable ?></th>
                                    <th class="text-right"><?php echo $totalInvalid ?></th>
                                    <th class="text-right"><?php echo $totalNotPicked ?></th>
                                    <th class="text-right"><?php echo $totalNotWanted ?></th>
                                    <th class="text-right"><?php echo $totalDND ?></th>
                                    <th class="text-right"><?php echo $totalCallLatter ?></th>
                                    <th class="text-right"><?php echo $totalNotIncFacility ?></th>
                                    <th class="text-right"><?php echo $totalSwitchOff ?></th>
                                    <th class="text-right"><?php echo $totalNotVisited ?></th>
                                    <th class="text-right"><?php echo $totalNotUpdated ?></th>
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

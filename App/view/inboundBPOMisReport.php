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
         downloadMe='yes';
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
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
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
                           <li class="breadcrumb-item active" aria-current="page">Inbound Call CC MIS Report</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                           
                              <a class="nav-item nav-link active"  href="javascript:void(0)">Inbound Call CC MIS Report</a>
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
                           <div class="table-responsive" id="viewTable">
                            <?php if ($result->num_rows > 0) {   $ctr = 1;  ?>

                              <table data-toggle="table" class="table table-hover table-bordered" id="dataTable">
                                 <thead>
                                    <tr>
                                       <th width="40px">Sl#</th>
                                       <th>User Name</th>
                                       <th>Registered Calls</th>
                                       <th>Other Calls</th>
                                       <th>Total Calls</th>
                                       <th>Call Attended Percentage (%)</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                              <?php
                                    while($arrRecords=$result->fetch_array()){
                                      // $d_arr = 'adsad';
                                       ?>
                                    <tr>
                                      <td><?php echo ++$i ;?></td>
                                      <td><?php echo $arrRecords['vchFullName'] ;?></td>
                                      <td class="text-right"><span class="badge badge-addas"><?php echo $arrRecords['vchRegisterCalls'] ;?></span></td>
                                      <td class="text-right"><span class="badge badge-warning"><?php echo $arrRecords['vchNotRegisterCalls'] ;?></span></td>
                                      <td class="text-right"><span class="badge badge-success"><?php echo $arrRecords['vchTotal'] ;?></span></td>
                                      <td class="text-right">
                                        <!-- <div style="background-color: #e6e6e6; box-shadow: inset 0 1px 2px rgba(0,0,0,.1);height: 20px;">
                                          <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="<?php echo $arrRecords['vchPercentage'] ;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $arrRecords['vchPercentage'] ;?>%"> -->
                                            <?php echo $arrRecords['vchPercentage'] ;?>%
                                          <!-- </div>
                                        </div> -->
                                      </td>
                                    </tr>
                                
                                   <?php 
                                    $totalvchRegisterCalls   =$totalvchRegisterCalls +$arrRecords['vchRegisterCalls']  ;
                                    $totalvchNotRegisterCalls  =$totalvchNotRegisterCalls +$arrRecords['vchNotRegisterCalls']  ;
                                    $totalvchTotal       =$totalvchTotal +$arrRecords['vchTotal']  ;
                                    $totalvchPercentage     =$totalvchPercentage + $arrRecords['vchPercentage'] ;
                                   $ctr++; 
                                  } ?>
                                  </tbody>
                                  <tr>
                                    <th colspan="2">Total</th>
                                    <th class="text-right"><?php echo $totalvchRegisterCalls ?></th>
                                    <th class="text-right"><?php echo $totalvchNotRegisterCalls ?></th>
                                    <th class="text-right"><?php echo $totalvchTotal ?></th>
                                    <th class="text-right">
                                      <?php echo round($totalvchPercentage).'.00%' ?>
                                      
                                    </th>
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

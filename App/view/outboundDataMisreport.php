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
  exit;
?>
<script language="javascript">

    $(document).ready(function () {
        getDepartmentList('vchDepartmentId','<?php echo $intServiceRegistrationId;?>');
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
        <?php }?>

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
   
</script>

   <div class="mainpanel">
            <div class="section">
               <div class="page-title">
                  <div class="title-details">
                     <h4>Outbound Call Report</h4>
                  
                  </div>
                   <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"><span class="icon-home1"></span></a></li>
                           <li class="breadcrumb-item"><a href="#">MIS</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Outbound Call Report</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                             
                              <a class="nav-item nav-link active"  href="javascript:void(0)">View</a>
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
                                    <label class="col-sm-2 ">District </label>
                                    <div class="col-sm-3">
                                       <select class="form-control" name="intDistrictId" id="intDistrictId" >
                                       <option value="0">---select---</option>
                                       </select>
                                    </div>
                                    

                                        <label class="col-sm-2 ">From</label>
                                        <div class="col-sm-3">
                                        <div class="input-group ">                                        
                                        <input type="text"   name="vchFromDate" id="vchFromDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo (strtotime($strFromDate)>0)?date('d-M-Y',strtotime($strFromDate)):'';?>" >
                                        <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                        </div>
                                        </div>


                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                 <label class="col-sm-2 ">To</label>
                                        <div class="col-sm-3">
                                        <div class="input-group ">                                        
                                        <input type="text"   name="vchToDate" id="vchToDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo (strtotime($strToDate)>0)?date('d-M-Y',strtotime($strToDate)):'';?>" >
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
                           <div class="table-responsive">
                            <?php if ($result->num_rows > 0) {   $ctr = 1;  ?>
                              <table data-toggle="table" class="table table-hover table-bordered">
                                 <thead>
                                    <tr>
                                     
                                       <th width="40px">Sl#</th>
                                       <th>Department</th>
                                       <th>Services Name</th>
                                       <th>Total Transaction</th>
                                       <th>Date</th>                                       
                                    </tr>
                                 </thead>
                      
                                 <tbody>
                              <?php
                                       $dept             = 0;
                                       $rowSpan          = '';
                                       $services         = 0;
                                       $rowSpanService   = '';

                                    foreach($arrAllRecords as $arrRecords){                               
                                            if ($dept == $arrRecords['intDepartmentId']) {
                                            $newDept   = 0;
                                            } else {
                                            $newDept   = 1;
                                            $countValues = array_count_values($deptarr);  
                                            //print_r($countValues[$arrRecords['intDepartmentId']]); exit;                                        
                                            if($countValues[$arrRecords['intDepartmentId']] > 1) {                                             
                                            $rowSpan = 'rowspan="' . $countValues[$arrRecords['intDepartmentId']] . '"';
                                            } else {  
                                            $rowSpan = '';
                                            }
                                                                                        }
                                            //row span for service
                                            if ($services == $arrRecords['intServiceId']) {
                                                $newService   = 0;
                                                } else {
                                                $newService   = 1;
                                                $countValuesServ = array_count_values($servicearr);  
                                                //print_r($countValues[$arrRecords['intDepartmentId']]); exit;                                        
                                                if($countValuesServ[$arrRecords['intServiceId']] > 1) {                                             
                                                $rowSpanService = 'rowspan="' . $countValuesServ[$arrRecords['intServiceId']] . '"';
                                                } else {  
                                                $rowSpanService = '';
                                                }
                                                }

//echo $newDept;
                                       ?>
                                    <tr>
                                      <td><?php echo $ctr;?></td>
                                      <?php if ($ctr == 1 || $newDept == 1) { ?>
                                      <td <?php echo $rowSpan;?> ><?php echo $arrRecords['vchDeptName'];?></td>
                                      <?php } ?>
                                      <?php if ($ctr == 1 || $newService == 1) { ?>
                                      <td <?php echo $rowSpanService;?>><?php echo $arrRecords['vchServiceName'];?></td>
                                      <?php } ?>
                                      <td><?php echo $arrRecords['TotalCnt'];?></td>
                                      <td><?php echo date("d-M-Y",strtotime($arrRecords['RecDate']));?></td>                                      
                                    </tr>
                                 
                                   <?php $dept = $arrRecords['intDepartmentId']; 
                                         $services = $arrRecords['intServiceId']; 
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

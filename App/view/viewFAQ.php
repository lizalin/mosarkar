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
        loadNavigation('Dashboard');
        //indicate = 'yes';
        printMe = 'yes';
        deleteMe='yes';
         <?php if($outMsg != '') { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?> 
        });
   
</script>

   <div class="mainpanel">
            <div class="section">
               <div class="page-title">
                  <div class="title-details">
                     <h4>view FAQ</h4>
                  
                  </div>
                   <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"><span class="icon-home1"></span></a></li>
                           <li class="breadcrumb-item"><a href="#">Master Data Mgmt</a></li>
                           <li class="breadcrumb-item active" aria-current="page">view FAQ</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                              <a class="nav-item nav-link "  href="<?php echo URL;?>addFAQ">Add</a>
                              <a class="nav-item nav-link active"  href="javascript:void(0)">View</a>
                           </ul>
                              <div class="indicatorslist">
                           <?php include('includes/util.php'); ?>
                              <!-- <a  id="printicon" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print"><i class="icon-printer1"></i></a>
                               <a href="javascript:void(0)" title="Delete" id="deleteIcon" data-toggle="tooltip" data-placement="top" class="btn btn-danger btn-sm" onclick="gotoDelete('D');"><i class="icon-white icon-trash"></i></a>
                              <a  title="" href="javascript:void(0)"  id="excelIcon" data-toggle="tooltip" data-placement="top" data-original-title="Excel"><i class="icon-excel-file"></i></a>
                              <a title="" href="javascript:void(0)" id="refreshIcon" data-toggle="tooltip"  onclick="return location.reload();" data-placement="top" data-original-title="Refresh"><i class="icon-reuse"></i></a>
                             
                               <a href="javascript:void(0)" title="Publish" id="publishIcon" data-toggle="tooltip" data-placement="top" class="btn btn-purple btn-sm" onclick="gotoDelete('P');"><i class="icon-eye1"></i></a>
                                <a href="javascript:void(0)" title="Unpublish" id="unpublishIcon" data-toggle="tooltip" data-placement="top" class="btn btn-pink btn-sm" onclick="gotoDelete('IN');"><i class="icon-eye-off1"></i></a>
                              
                              <a  title="" href="javascript:void(0)" id="backIcon" data-toggle="tooltip" data-placement="top" data-original-title="Back" onclick="window.history.back()"><i class="icon-arrow-left1"></i></a>
                              <a  title="" href="javascript:void(0)" id="downloadIcon" data-toggle="tooltip" data-placement="top" data-original-title="Download"><i class="icon-download1"></i></a> -->
                           </div>
                           <div class="clearfix"></div>
                        </div>
                        <!-- Search Panel -->
                        <div class="search-container">
                           <div class="search-sec">
                              <div class="form-group">
                                 <div class="row">
                                    <label class="col-sm-2 ">Department </label>
                                    <div class="col-sm-3">
                                       <select class="form-control" name="vchDepartmentId" id="vchDepartmentId" onchange="getDeptWiseService('vchServicesId',this.value,'<?php echo $vchServicesId;?>');">
                                       </select>
                                    </div>
                                    <label class="col-lg-2 ">Services </label>
                                    <div class="col-lg-3">
                                       <select class="form-control" name="vchServicesId" id="vchServicesId">
                                    <option>---select---</option>
                                 </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                    <label class="col-lg-2 ">FAQ Question </label>
                                    <div class="col-lg-3">
                                       <input type="text" class="form-control" name="vchFAQQuestion" id="vchFAQQuestion" placeholder="" data-bv-field="FAQ Question" value="<?php echo $vchFAQQuestion;?>">
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
                             <div class="legandBox pull-left">      
                             <span class="greenLegend">&nbsp;</span>Published &nbsp;     
                             <span class="yellowLegend">&nbsp;</span> Unpublished  &nbsp;
                              </div>
                               <?php if ($result->num_rows > 0) {                  
                               $ctr = 1; 
                             ?>
                              <table data-toggle="table" class="table table-hover table-bordered">
                                 <thead>
                                    <tr>
                                      <th width="20" class="noPrint">
                                         <label class="position-relative">
                                         <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                    </th>
                                       <th width="40px">Sl#</th>
                                       <th>Department</th>
                                       <th>Services Name</th>
                                       <th>FAQ Question</th>
                                       <th>FAQ Answer</th>
                                       <th>Created On</th>
                                       <th width="100px">Action</th>
                                    </tr>
                                 </thead>
                      
                                 <tbody>
                                   <?php 
                               while ($row =$result->fetch_array()) { 
                                $intId=$obj->encrypt($row['intFaqId']);
                               if($row['tinPublishStatus']==2)
                                $style  = 'class="greenBorder"';
                            else
                                $style  = 'class="yellowBorder"'; 
                               // $ctr++; 
                          ?>  <tr <?php echo $style;?>>
                                      <td class="noPrint">
                                     <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intFaqId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intFaqId'];?>" name="hdnPubStatus<?php echo $row['intFaqId'];?>" value="<?php echo $row['intFaqId'];?>"/>
                                    </label>
                                </td>
                                      <td><?php echo $ctr;?></td>
                                      <td><?php echo $row['deptName'];?></td>
                                      <td><?php echo $row['ServiceName'];?></td>
                                      <td><?php echo $row['vchFaqQuestion'];?></td>
                                      <td><?php echo $row['vchFaqAnswer'];?></td>
                                        <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']));?></td>
                                     <td><a class="btn btn-info btn-sm" data-toggle="tooltip" title="" data-original-title="Edit" href="<?php echo APPURL;?>addFAQ/<?php echo ($intId); ?>"><i class="icon-edit1"></i></a>
                                         
                                       </td>  
                                    </tr>
                                 </tbody>
                                   <?php $ctr++; 
                                  } ?>
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

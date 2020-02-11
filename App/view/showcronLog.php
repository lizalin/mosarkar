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
       // deleteMe='yes';
         <?php if($outMsg != '') { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?> 
        });
   
</script>

   <div class="mainpanel">
            <div class="section">
               <div class="page-title">
                  <div class="title-details">
                     <h4>View Cronjob Configuration</h4>
                  
                  </div>
                   <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"><span class="icon-home1"></span></a></li>
                           <li class="breadcrumb-item"><a href="#">Settings</a></li>
                           <li class="breadcrumb-item active" aria-current="page">View Cronjob Configuration</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                              <!-- <a class="nav-item nav-link "  href="<?php echo URL;?>addCronConfig">Add</a> -->
                              <a class="nav-item nav-link active"  href="javascript:void(0)">View Log</a>
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
                        
                        <!-- Search Panel -->
                        <!--===================================================-->
                        <div class="card-body">
                           <div class="table-responsive">
                           <div class="legandBox">     
                <span class="greenLegend">&nbsp;</span>In Time &nbsp;     
                <span class="redLegend">&nbsp;</span> Out of Time &nbsp;
            </div>
                <div id="viewTable" class="table-responsive">
            <?php if ($result->num_rows > 0) {
                  
                    $ctr = $intRecno; 
              ?>
                    <table class="table  table-bordered">
                        <thead>
                            <tr>  
                                                         
                                <th rowspan="" width="20">Sl.#</th>
                                <th>Job Name</th>
                                <th>Job Type</th>                                
                                <th>User Account</th>
                                <th>Start Time</th> 
                                <th>End Time</th> 
                                <th>Last Cron Updated</th>
                                <th>Mode</th>
                                <th> Last Message</th> 
                               
                            </tr>
                            
                        </thead>
                        <tbody>
                 
                            
                       
                <?php 
                 
                while ($row = $result->fetch_array()) 
                {
                  //  print_r($row);exit;
                    //echo $row['IntJobType']."--".$cr;
                    
                  $intJobId    = $row['intJobId'];
                  $intJobType  = $row['IntJobType'];
                  $jobType     =(!empty($row['vchJobType']))?$row['vchJobType']:'--';
                  $jobName     =(!empty($row['vchJobName']))?$row['vchJobName']:'--';
                  $Username    =(!empty($row['vchScreenName']))? htmlspecialchars_decode($row['vchScreenName'], ENT_QUOTES):'--';
                  $duration    = (!empty($row['vchDuration']))?$row['vchDuration']:'--';
                  $mode        = (!empty($row['intAddedThrough']))?$row['intAddedThrough']:'--';
                  $lastupdated = (!empty($row['dtmUpdatedOn']))? date('d M Y',strtotime($row['dtmUpdatedOn'])):'--';
                  $dtmExcecutionStart = (!empty($row['dtmExcecutionStart']))? date('h:i A',strtotime($row['dtmExcecutionStart'])):'--';
                  $dtmExceutionEnd = (!empty($row['dtmExceutionEnd']))? date('h:i A',strtotime($row['dtmExceutionEnd'])):'--';
                  $lastMessage = (!empty($row['vchlastMessage']))?$row['vchlastMessage']:'--';
                  if($row['background']==1 && $lastMessage!= '--'){
                    $background = 'style="background: green;color:white;"';
                  }else if($row['background']==2 && $lastMessage!= '--'){
                    $background = 'style="background: red;color:white;"';
                  }else{
                    $background = "";
                  }
                   if($row['bitActive']=='1')
                                $style  = 'class="greenBorder"';
                            else
                                $style  = 'class="yellowBorder"'; 
                                $ctr++; 
                                ?>
              
               <tr >
                
                <td><?php echo $ctr;?></td>
                <td><?php echo $jobName; ?></td>
                <td><?php echo $jobType; ?></td>                
                <td><?php echo $Username; ?></td>
                <td><?php echo $dtmExceutionEnd; ?></td>
                <td><?php echo $dtmExcecutionStart; ?></td>
                
                <td><?php echo $lastupdated; ?></td>
                <td><?php  if($mode=='1') echo "Auto"; else if($mode=='2') echo "Manual"; else echo "--"; ?> 
                </td>
                <td  <?php echo $background;?>><?php echo $lastMessage; ?></td>
                
                
              </tr>
                        
              <?php } ?> 
              </tbody>
      
               </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                    <input type="hidden" id="hdnAction" name="hdnAction">
                     <input type="hidden" id="hdnNID" name="hdnNID">
                     <input type="hidden" value="<?php echo session_id();?>" name="hdnPrevSessionId">
               <?php } 
              else {
                  echo '<div class="noRecord">No record found</div>';
                  }?>
        </div>
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

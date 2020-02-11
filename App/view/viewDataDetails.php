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
<style type="text/css" media="screen">
  .yellowColor{color:#ffb752; font-size: 14px; padding-left: 2px;}
  .greenColor{color:#5cb85c; font-size: 14px; padding-left: 2px;cursor: pointer;}
</style>
<script language="javascript">

    $(document).ready(function () {
       viewSearchPannel('<?php echo $openFlag; ?>', 'searchPanel', 'chkSearch'); 
       // getDepartmentList('vchNewDepartmentId','<?php echo $vchNewDepartmentId;?>');

      // getFilterDepartmentList('intDepartmentId', '<?php //echo ($vchNewDepartmentId)?$vchNewDepartmentId:0 ?>');
       getDeptWiseService('intServicesId','1','<?php echo $intServiceId; ?>');
       getServiceWiseScheme('intSchemeTypeId',<?php echo $intServiceId; ?>,0);



       <?php if($_SESSION['adminConsole_Desg_Id']==CSO_DESIGNATION){ ?>
                getDistrictList('intDistrictId',<?php echo $_SESSION['adminConsole_HierarchyId'];?>,<?php echo $_SESSION['adminConsole_HierarchyId'];?>);
          <?php }else{ ?>
                getDistrictList('intDistrictId',0);
          <?php } ?>

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
                                       <select class="form-control" name="vchNewDepartmentId" id="vchNewDepartmentId">
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
              <!-- <div class="col-sm-3">
                  <select class="form-control" name="intDepartmentId" id="intDepartmentId" onchange="getDeptWiseService('intServicesId',this.value,0); getDeptWiseInstitution('intInstitutionId',this.value,0)" >
                    <option value="0">---Select Department---</option>
                  </select>
              </div> -->
              <div class="col-sm-3">
                <select class="form-control" id="intServicesId" name="intServicesId" onchange="getServiceWiseScheme('intSchemeTypeId',this.value,0);" <?php if($type==2){echo'style="display: none;"'; } ?>>
                  <option value="0">--- Select Service ---</option>
                </select>
              </div>

              <div class="col-sm-3">
                  <select class="form-control" name="intSchemeTypeId" id="intSchemeTypeId">
                    <option value="0">--- Select Scheme---</option>
                    
                  </select>
              </div>
              <div class="col-sm-3">
                <select class="form-control" name="intDistrictId" id="intDistrictId">
                  <option value="0">--- Select District ---</option>
                </select>
              </div>
               
          </div> 
          <div class="row" style="padding-top: 15px;">
            
               <?php if($callType==2){ ?>
              <div class="col-sm-3">
                  <select class="form-control" name="intCalledId" id="intCalledId">
                    <option value="0" <?php echo empty($intCalledId)?'selected':'';?>>All</option>
                    <option value="1" <?php echo !empty($intCalledId) && $intCalledId==1?'selected':'';?>>Called</option>
                    <option value="2" <?php echo !empty($intCalledId) && $intCalledId==2 ?'selected':'';?>>Not Called</option>
                  </select>
              </div>
            <?php } ?>
            <!-- <label class="col-sm-1 text-right" style="width: auto;">From</label> -->
            <div class="col-sm-3">
              <div class="input-group ">
                <input type="text"   name="vchFromDate" id="vchFromDate" class="form-control " Placeholder="From" autocomplete="off" readonly="readonly" value="<?php echo !empty($vchFromDate)?date('d-M-Y',strtotime($vchFromDate)):'';?>">
                <span class="input-group-addon"><i class="icon-calendar1"></i></span>
              </div>
            </div>
            <!-- <label class="col-sm-1 text-right" style="width: auto;">To</label> -->
            <div class="col-sm-3">
              <div class="input-group">
                <input type="text"   name="vchToDate" id="vchToDate" class="form-control " Placeholder="To"   autocomplete="off" readonly="readonly" value="<?php echo !empty($vchToDate)? date('d-M-Y',strtotime($vchToDate)):'';?>">
                <span class="input-group-addon"><i class="icon-calendar1"></i></span>
              </div>
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
                               <?php if ($result->num_rows > 0) {                  
                                $ctr = $intRecno; 
                             ?>
                             <div class="legandBox pull-left">     
                              <?php if($callType==2 && $vchNewDepartmentId=='14545'){ ?> 
                             <span class="greenLegend">&nbsp;</span>Called &nbsp; (<?php echo $totalCalls;?>)  
                             <?php } ?>  
                             <!-- <span class="yellowLegend">&nbsp;</span> Not Called  &nbsp; -->
                              </div>
                              <table data-toggle="table" class="table table-hover table-bordered">
                                 <thead>
                                 
                                    <tr>
                                    </th>
                                       <th width="40px">Sl#</th>
                                       <!-- <th width="10px">Type</th> -->
                                       <th width="150px">Citizen Info</th>
                                       <th width="100px">Mobile</th>
                                       <th width="100px">District</th>
                                       <th width="100px">Service & Scheme</th>
                                       <!-- <th width="50px">Institution Name</th> -->
                                        <?php if($vchNewDepartmentId!='14545'){ ?>
                                       <th width="200px">Other Info.</th>
                                     <?php } ?>

                                       <?php if($vchNewDepartmentId!='14545'){ ?>
                                       <th width="50px">Called Date</th>
                                     <?php }else{ ?>
                                        <th width="50px">Called Date</th>
                                     <?php } ?>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   
                         <?php 
                               while ($row =$result->fetch_array()) { //print"<pre>"; print_r($row);
                                $intId=$obj->encrypt($row['intDepartmentId']);
                                $ctr++; 
                                 if($row['totalCalls']>0  && $row['vchType']=='Inbound')
                                  $color  = "greenColor";
                                else
                                  $color  = "yellowColor";
                          ?>  <tr>
                                 <td><?php echo $ctr;?></td>
                                 <!-- <td><?php echo !empty($row['vchType'])?$row['vchType']:'---';?></td> -->
                                
                                 <td><?php echo !empty($row['vchName'])?$row['vchName']:'--';?><br/>
                                   <small style="color: grey;"><?php echo !empty($row['intGender']==1)?'Male':'Female';?>, </small><small style="color: grey;"><?php echo !empty($row['intGender'])?$row['intAge'].' years':'---';?></small>

                                   <small style="color: grey;">
                                        <?php if($row['intServiceId']==1){ ?>
                                          Card Type.: &nbsp;<?php echo !empty($row['vchCardName'])? $row['vchCardName']:'--';?><br />
                                          Ration Card No.: &nbsp;<?php echo !empty($row['vchRationCardNo'])? $row['vchRationCardNo']:'--';?><br />No of Family Members: &nbsp;<?php echo !empty($row['intNoFamily'])? $row['intNoFamily']:'--';?><br />
                                        <?php }else{ ?>
                                          Token No.: &nbsp;<?php echo !empty($row['vchTokenNo'])? $row['vchTokenNo']:'--';?><br />Deposite Date: &nbsp;<?php echo (strtotime($row['dtmPaddyDeposite'])>0)?date("d-M-Y",strtotime($row['dtmPaddyDeposite'])):'--';?>
                                        <?php } ?>
                                      </small>
                                 </td>
                              
                                 <td><?php echo !empty($row['intMobile'])?$row['intMobile']:'---';?></td>
                                 <td><?php echo !empty($row['vchDistrictName'])?$row['vchDistrictName']:'---';?></td>
                                 <td><?php echo !empty($row['vchServiceName'])?$row['vchServiceName']:'---';?><br/><small style="color: grey;"><?php echo !empty($row['vchSchemeTypeName'])?$row['vchSchemeTypeName']:'---';?></small></td>
                                 <!-- <td><?php //echo !empty($row['institutionName'])?$row['institutionName']:'---';?></td> -->
                               
                                 <td>
                               
                                 <?php 
                                        $returnText = '';
                                        if($row['jsonRelatedInfo']){
                                            $jsonRelatedInfo    = json_decode($row['jsonRelatedInfo'],true);
                                          if($row['intServiceId'] == RCMS){
                                            // echo "01/".$jsonRelatedInfo['dtmAllotment'];
                                                if(strstr($jsonRelatedInfo['dtmAllotment'], '/')){
                                                   $allotDateArr =  explode('/', $jsonRelatedInfo['dtmAllotment']);
                                                    $dtmAllotment = date('Y-m-d',strtotime('01-'.$allotDateArr['0'].'-'.$allotDateArr['1']));
                                                }else{
                                                  $dtmAllotment = date('Y-m-d',strtotime('01-'.$jsonRelatedInfo['dtmAllotment']));
                                                } 
                                                $dtmAllotment = date('M-Y',strtotime($dtmAllotment));
                                                $returnText .= '<small style="color: #18766d;">Allotment Date: '.$dtmAllotment.'<br>Rice in Kg: '.$jsonRelatedInfo['intRice'].'<br>Wheat in Kg: '.$jsonRelatedInfo['intWheat'].'<br>Kerosene in Ltr: '.$jsonRelatedInfo['floatKerosene'].'</small>';
                                          }else{
                                              $returnText = '';
                                          }
                                        }
                                        echo $returnText;
                                        
                                    
                                      
                                      ?>  

                                 </td>
                                 
                                 <!-- <td><?php //echo !empty($row['vchService'])?$row['vchService']:'---';?></td> -->
                                 <!-- <td><?php //echo !empty($row['dtmRegdDateTime'])?date("d-M-Y",strtotime($row['dtmRegdDateTime'])):'---';?></td> -->
                               
                                 <td><?php echo (strtotime($row['dtmFeedbackRcvTime'])>0)?date("d-M-Y",strtotime($row['dtmFeedbackRcvTime'])):'---';?></td>
                              
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
                <h4 class="modal-title" id="commentsModalLabel">Contact Details</h4>

            </div>
            <div class="modal-body" id="travelAgentDetails" style="padding: 20px;">
                 
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
   function showNotRegisterModel(intOutboundDataId){
       $.ajax({
            type: "POST",
            url: URL + '/proxy',
            dataType: "html",
            data: { method: 'getCallDetails', intOutboundDataId:intOutboundDataId,csrf_token_id:csrf_token_val},
            success: function (data) {
              $('#travelAgentDetails').html(data);
              $('#DetailsModal').modal('show');
            }
      });
    }
</script>
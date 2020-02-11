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
        //deleteMe='yes';
         <?php if($outMsg != '') { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?> 

        getDistrictList('intDistrictId','<?php echo $intDistrictId;?>');

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
        function validateActionSheet(){
               var FIds='';
               $('.chkItem').each(function(){
               if($(this).is(':checked'))
               FIds	+= $(this).val()+',';
               });

               if(FIds.length>0)
		          {
                   generateActionSheet(FIds);

                }else{
                  viewAlert('Please select a record!');
			          return false;
                }

        }   
</script>

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
                           <li class="breadcrumb-item active" aria-current="page">Inbound Call Report</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                             
                              <a class="nav-item nav-link active"  href="javascript:void(0)">Inbound Call Report
</a>
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
                                    <label class="col-sm-2 ">Year </label>
                                    <div class="col-sm-3">
                                       <select class="form-control"  >
                                       <option value="0">2019</option>
                                       </select>
                                    </div>
                                    

                                        <label class="col-sm-2 ">Month</label>
                                        <div class="col-sm-3">
                                        <select class="form-control"  >
                                       <option value="0">---select---</option>
                                       </select>
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
                            
                            <table data-toggle="table" class="table table-hover table-bordered">
                                 <thead>
                                    <tr>
                                    
                                       
                                       <th width="40px">Sl#</th>
                                       <th>Date</th>
                                       <th>No. of District</th>
                                       <th>Call Received</th>                                        
                                    
                                                                             
                                    </tr>
                                 </thead>
                      
                                 <tbody>
                                    <tr>                                   
                                      <td>1</td>                                    
                                      <td>30-Sep-2019</td>
                                      <td><a href="javascript:void(0);">5</a></td>
                                      <td><a href="javascript:void(0);">11</a></td>
                                                                         
                                    </tr>
                                    <tr>                                   
                                      <td>2</td>                                    
                                      <td>29-Sep-2019</td>
                                      <td><a href="javascript:void(0);">5</a></td>
                                     
                                      <td><a href="javascript:void(0);">20 </a></td>                                     
                                    </tr>
                                    <tr>                                   
                                      <td>3</td>                                    
                                      <td>28-Sep-2019</td>
                                     
                                      <td><a href="javascript:void(0);">15</a></td>
                                      <td><a href="javascript:void(0);">20 </a></td>                                     
                                    </tr>
                                    <tr>                                   
                                      <td>4</td>                                    
                                      <td>27-Sep-2019</td>
                                      <td><a href="javascript:void(0);">5</a></td>
                                      <td><a href="javascript:void(0);">15</a></td>
                                                                         
                                    </tr>
                                    <tr>                                   
                                      <td>5</td>                                    
                                      <td>26-Sep-2019</td>
                                      <td><a href="javascript:void(0);">5</a></td>
                                     
                                      <td><a href="javascript:void(0);">20 </a></td>                                     
                                    </tr>
                                    
                                 
                                                                       
                                                                     </tbody>
                              </table>
                   
                   
                           </div>
                     
                        </div>
                        <!--===================================================-->
                     </div>
                  </div>
               </div>
            </div>
         </div>

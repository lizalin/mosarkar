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
                           <li class="breadcrumb-item active" aria-current="page">Outbound Call Report</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                             
                              <a class="nav-item nav-link active"  href="javascript:void(0)">Outbound Call Report
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
                            
                            <table data-toggle="table" class="table table-hover table-bordered">
                                 <thead>
                                    <tr>
                                    
                                       
                                       <th width="40px">Sl#</th>
                                       <th>Department</th>
                                       <th>Service Name</th>
                                       <th>Total Transaction</th>                                        
                                       <th>Feedback Received </th>
                                                                             
                                    </tr>
                                 </thead>
                      
                                 <tbody>
                                    <tr>                                   
                                      <td>1</td>                                    
                                      <td>Health & Family Welfare</td>
                                      <td>IPD</td>
                                      <td><a href="javascript:void(0);">5</a></td>
                                      <td><a href="javascript:void(0);">11</a></td>
                                                                          
                                    </tr>
                                    <tr>                                   
                                      <td>2</td>                                    
                                      <td>Health & Family Welfare</td>
                                      <td>OPD</td>
                                      <td><a href="javascript:void(0);">5</a></td>
                                      <td><a href="javascript:void(0);">11</a></td>
                                                                          
                                    </tr>
                                    <tr>                                   
                                      <td>3</td>                                    
                                      <td>Health & Family Welfare</td>
                                      <td>SURGERY</td>
                                      <td><a href="javascript:void(0);">5</a></td>
                                      <td><a href="javascript:void(0);">11</a></td>
                                                                          
                                    </tr>
                                    <tr>                                   
                                      <td>4</td>                                    
                                      <td>Home</td>
                                      <td>Citizen Service</td>
                                      <td><a href="javascript:void(0);">5</a></td>
                                      <td><a href="javascript:void(0);">11</a></td>
                                                                          
                                    </tr>
                                    <tr>                                   
                                      <td>5</td>                                    
                                      <td>Home</td>
                                      <td>FIR</td>
                                      <td><a href="javascript:void(0);">5</a></td>
                                      <td><a href="javascript:void(0);">11</a></td>
                                                                          
                                    </tr>
                                    <tr>                                   
                                      <td>6</td>                                    
                                      <td>Home</td>
                                      <td>Petition</td>
                                      <td><a href="javascript:void(0);">5</a></td>
                                      <td><a href="javascript:void(0);">11</a></td>
                                                                          
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

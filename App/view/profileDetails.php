<?php 
/* =================================================
  File Name         	   : profileDetails.php
  Description		      : This is used for Citizen Profile Details.
  Developed By          : Niranjan Kumar Pandit
  Developed On          : 23-Sep-2019
  Update History        : <Updated by>		<Updated On>		<Remarks>

  Style sheet           :
  Javscript Files       :
  includes		         :

  ================================================== */
?>

   <div class="mainpanel">
            <div class="section">
               <div class="page-title">
                  <div class="title-details">
                     <h4>Profile Details</h4>
                  
                  </div>
                   <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"><span class="icon-home1"></span></a></li>
                           <li class="breadcrumb-item"><a href="#">Contact Center Desk</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Profile Details</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                              <a class="nav-item nav-link active"  href="javascript:void(0)">Profile Details</a>
                           </ul>
                           <div class="indicatorslist">
                              <a  id="printicon" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print"><i class="icon-printer1"></i></a>
                              <a  id="deleteIcon" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="icon-trash-21"></i></a>
                              <a  title="" href="javascript:void(0)"  id="excelIcon" data-toggle="tooltip" data-placement="top" data-original-title="Excel"><i class="icon-excel-file"></i></a>
                              <a title="" href="javascript:void(0)" id="refreshIcon" data-toggle="tooltip" data-placement="top" data-original-title="Refresh"><i class="icon-reuse"></i></a>
                              <a  title="" href="javascript:void(0)" id="publishIcon" data-toggle="tooltip" data-placement="top" data-original-title="Publish"><i class="icon-eye1"></i></a>
                              <a  title="" href="javascript:void(0)" id="unpublishIcon" data-toggle="tooltip" data-placement="top" data-original-title="Unpublish"><i class="icon-eye-off1"></i></a>
                              <a  title="" href="javascript:void(0)" id="backIcon" data-toggle="tooltip" data-placement="top" data-original-title="Back"><i class="icon-arrow-left1"></i></a>
                              <a  title="" href="javascript:void(0)" id="downloadIcon" data-toggle="tooltip" data-placement="top" data-original-title="Download"><i class="icon-download1"></i></a>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                        <!-- Search Panel -->
                        <div class="search-container">
                           <div class="search-sec">
                              <div class="form-group">
                                 <div class="row">
                                    <label class="col-lg-2 ">Mobile No. </label>
                                    <div class="col-lg-3">
                                       <input type="text" class="form-control" name="vchMobile" placeholder="Mobile No.">
                                    </div>
                                    <div class="col-lg-2">
                                       <button class="btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- <div class="text-center"> <a class="searchopen" title="Search" data-toggle="tooltip" data-placement="bottom" > <i class="icon-angle-arrow-down"></i> </a></div> -->
                        </div>
                        <!-- Search Panel -->
                        <!--===================================================-->
                        <div class="card-body">
                           <div class="table-responsive">
                              <table data-toggle="table" class="table table-hover table-bordered">
                                 <thead>
                                    <tr>
                                       <th width="25px" valign="top">
                                          <input id="demo-form-inline-checkboxall" class="magic-checkbox" type="checkbox" >
                                          <label for="demo-form-inline-checkboxall"></label>
                                       </th>
                                       <th width="40px">Sl#</th>
                                       <th>Name</th>
                                       <th>Department</th>
                                       <th>Services</th>
                                       <th>Details</th>
                                       <th>Call Date</th>
                                       <th>Dueration</th>
                                       <th>Status</th>
                                       <th>Type</th>
                                       <th width="100px">Feedboack</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td> <input id="demo-form-inline-checkbox" class="magic-checkbox" type="checkbox" >
                                          <label for="demo-form-inline-checkbox"></label>
                                       </td>
                                       <td>1</td>
                                       <td>Niranjan Pandit</td>
                                       <td>Home</td>
                                       <td>Demo Service</td>
                                       <td>Testing Details</td>
                                       <td>20-Sep-2019</td>
                                       <td>13.56 Mins</td>
                                       <td>Not Recived</td>
                                       <td>OutBound</td>
                                       <td><a href="addfeedback" class="btn btn-info btn-sm" data-toggle="tooltip" title="" data-original-title="Feedboack">Feedback</a>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <nav aria-label="Page navigation example">
                              <ul class="pagination justify-content-end">
                                 <li class="page-item "><a class="page-link" href="#">Previous</a></li>
                                 <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                 <li class="page-item"><a class="page-link" href="#">2</a></li>
                                 <li class="page-item"><a class="page-link" href="#">3</a></li>
                                 <li class="page-item"><a class="page-link" href="#">Next</a></li>
                              </ul>
                           </nav>
                        </div>
                        <!--===================================================-->
                     </div>
                  </div>
               </div>
            </div>
         </div>
<script language="javascript">

    $(document).ready(function () {
         $('.search-sec').slideToggle('open');
         loadNavigation('Dashboard');
         indicate = 'yes';
         });
   
</script>
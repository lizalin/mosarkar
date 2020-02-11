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

   <div class="mainpanel">
            <div class="section">
               <div class="page-title">
                  <div class="title-details">
                     <h4>This View Page</h4>
                  
                  </div>
                   <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo URL;?>dashboard"><span class="icon-home1"></span></a></li>
                           <li class="breadcrumb-item"><a href="#">Library</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                     </nav>
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                              <a class="nav-item nav-link "  href="<?php echo URL;?>addpage">Add</a>
                              <a class="nav-item nav-link active"  href="<?php echo URL;?>viewpage" >View</a>
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
                                    <label class="col-sm-2 ">Organization </label>
                                    <div class="col-sm-3">
                                       <select class="form-control">
                                          <option value="0">--All--</option>
                                          <option value="1">BMC</option>
                                          <option value="2">BPTS</option>
                                          <option value="3">BDA</option>
                                          <option value="4">BSCL</option>
                                       </select>
                                    </div>
                                    <label class="col-sm-2 ">Hierarchy</label>
                                    <div class="col-sm-3">
                                       <select class="form-control">
                                          <option value="0">--Select--</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                    <label class="col-lg-2 ">User Id </label>
                                    <div class="col-lg-3">
                                       <input type="text" class="form-control" name="fullName" placeholder="" data-bv-field="fullName">
                                    </div>
                                    <label class="col-lg-2 ">User Name</label>
                                    <div class="col-lg-3">
                                       <input type="text" class="form-control" name="fullName" placeholder="" data-bv-field="fullName">
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
                                       <th width="25px" valign="top">
                                          <input id="demo-form-inline-checkboxall" class="magic-checkbox" type="checkbox" >
                                          <label for="demo-form-inline-checkboxall"></label>
                                       </th>
                                       <th width="40px">Sl#</th>
                                       <th>Organization</th>
                                       <th>Parent Node</th>
                                       <th>Entity</th>
                                       <th>Created On</th>
                                       <th width="100px">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td> <input id="demo-form-inline-checkbox" class="magic-checkbox" type="checkbox" >
                                          <label for="demo-form-inline-checkbox"></label>
                                       </td>
                                       <td>1</td>
                                       <td>BMC</td>
                                       <td>--</td>
                                       <td>Department</td>
                                       <td>12-Jan-2018</td>
                                       <td><a class="btn btn-info btn-sm" data-toggle="tooltip" title="" data-original-title="Edit"><i class="icon-edit1"></i></a>
                                          <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="" data-original-title="Delete"><i class="icon-trash-21"></i></a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td> <input id="demo-form-inline-checkbox2" class="magic-checkbox" type="checkbox" >
                                          <label for="demo-form-inline-checkbox2"></label>
                                       </td>
                                       <td>2</td>
                                       <td>BMC</td>
                                       <td>Department</td>
                                       <td>Section</td>
                                       <td>12-Jan-2018</td>
                                       <td><a class="btn btn-info btn-sm" data-toggle="tooltip" title="" data-original-title="Edit"><i class="icon-edit1"></i></a>
                                          <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="" data-original-title="Delete"><i class="icon-trash-21"></i></a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td> <input id="demo-form-inline-checkbox3" class="magic-checkbox" type="checkbox" >
                                          <label for="demo-form-inline-checkbox3"></label>
                                       </td>
                                       <td>3</td>
                                       <td>BDA</td>
                                       <td>--</td>
                                       <td>Department</td>
                                       <td>12-Jan-2018</td>
                                       <td><a class="btn btn-info btn-sm" data-toggle="tooltip" title="" data-original-title="Edit"><i class="icon-edit1"></i></a>
                                          <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="" data-original-title="Delete"><i class="icon-trash-21"></i></a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td> <input id="demo-form-inline-checkbox4" class="magic-checkbox" type="checkbox" >
                                          <label for="demo-form-inline-checkbox4"></label>
                                       </td>
                                       <td>4</td>
                                       <td>BDA</td>
                                       <td>Department</td>
                                       <td>Section</td>
                                       <td>12-Jan-2018</td>
                                       <td><a class="btn btn-info btn-sm" data-toggle="tooltip" title="" data-original-title="Edit"><i class="icon-edit1"></i></a>
                                          <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="" data-original-title="Delete"><i class="icon-trash-21"></i></a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td> <input id="demo-form-inline-checkbox5" class="magic-checkbox" type="checkbox" >
                                          <label for="demo-form-inline-checkbox5"></label>
                                       </td>
                                       <td>5</td>
                                       <td>BPTS</td>
                                       <td>--</td>
                                       <td>Department</td>
                                       <td>13-Feb-2018</td>
                                       <td><a class="btn btn-info btn-sm" data-toggle="tooltip" title="" data-original-title="Edit"><i class="icon-edit1"></i></a>
                                          <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="" data-original-title="Delete"><i class="icon-trash-21"></i></a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td> <input id="demo-form-inline-checkbox6" class="magic-checkbox" type="checkbox" >
                                          <label for="demo-form-inline-checkbox6"></label>
                                       </td>
                                       <td>6</td>
                                       <td>BPCL</td>
                                       <td>--</td>
                                       <td>Department</td>
                                       <td>13-Feb-2018</td>
                                       <td><a class="btn btn-info btn-sm" data-toggle="tooltip" title="" data-original-title="Edit"><i class="icon-edit1"></i></a>
                                          <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="" data-original-title="Delete"><i class="icon-trash-21"></i></a>
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
        loadNavigation('Dashboard');
        indicate = 'yes';
        });
   
</script>
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
                    <h4>This Add Page</h4>
                    

                  </div>
                 <nav class="bread-nav" aria-label="breadcrumb">
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
                              <a class="nav-item nav-link active"  href="<?php echo URL;?>addpage">Add</a>
                              <a class="nav-item nav-link "  href="<?php echo URL;?>viewpage" >View</a>
                           </ul>
                           <div class="indicatorslist">
                              <a title="" href="javascript:void(0)" id="refreshIcon" data-toggle="tooltip" data-placement="top" data-original-title="Refresh"><i class="icon-reuse"></i></a>
                              <a  title="" href="javascript:void(0)" id="backIcon" data-toggle="tooltip" data-placement="top" data-original-title="Back"><i class="icon-arrow-left1"></i></a>
                              <p class="ml-2">(*) Indicates mandatory </p>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                        <!-- BASIC FORM ELEMENTS -->
                        <!--===================================================-->
                        <div class="card-body">
                           <!--Static-->
                           <!--Text Input-->
                           <div class="form-group row">
                              <label class="col-sm-12 col-md-2 col-lg-2 control-label" for="demo-text-input">Text Input <span class="text-danger">*</span></label>
                              <div class="col-sm-12 col-md-6 col-lg-4"><span class="colon">:</span>
                                 <input type="text" id="demo-text-input" class="form-control" placeholder="Text">
                                 <small class="help-block text-muted">This is a help text</small>
                              </div>
                           </div>
                           <!--Email Input-->
                           <div class="form-group row">
                              <label class="col-sm-12 col-md-2 col-lg-2 control-label" for="demo-email-input">Select Input <span class="text-danger">*</span></label>
                              <div class="col-sm-12 col-md-6 col-lg-4">
                                 <span class="colon">:</span>
                                 <select class="form-control">
                                    <option>---select---</option>
                                 </select>
                                 <small class="help-block text-primary">Please enter your email</small>
                              </div>
                           </div>
                           <!--Password-->
                           <div class="form-group row">
                              <label class="col-sm-12 col-md-2 col-lg-2 control-label" for="demo-password-input">Password <span class="text-danger">*</span></label>
                              <div class="col-sm-12 col-md-6 col-lg-4">
                                 <span class="colon">:</span>
                                 <div class="input-group">
                                    
                                     <span class="input-group-addon"><a class="passwordshowbtn " href="javascript:void(0)"><i class="icon-eye1"></i></a></span>
                                    <input type="password" id="demo-password-input" class="form-control password" placeholder="Password">
                                 </div>
                                 <small class="help-block text-danger">Please enter password</small>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-sm-12 col-md-2 col-lg-2 control-label" for="demo-readonly-input">Date field</label>
                              <div class="col-sm-12 col-md-6 col-lg-4">
                                 <span class="colon">:</span>
                                 <div class="input-group">
                                    
                                    <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                    <input type="text" class="form-control datepicker" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                 </div>
                              </div>
                           </div>
                           <!--Textarea-->
                           <div class="form-group row">
                              <label class="col-sm-12 col-md-2 col-lg-2 control-label" for="demo-textarea-input">Textarea</label>
                              <div class="col-sm-12 col-md-6 col-lg-4"><span class="colon">:</span>
                                 <textarea id="demo-textarea-input" rows="4" class="form-control" placeholder="Your content here.."></textarea>
                              </div>
                           </div>
                           <div class="form-group row pad-ver">
                              <label class="col-sm-12 col-md-2 col-lg-2 control-label">Radio Buttons</label>
                              <div class="col-sm-12 col-md-6 col-lg-4">
                                 <span class="colon">:</span>
                                 <!-- Radio Buttons -->
                                 <div class="radio">
                                    <input id="demo-form-radio" class="magic-radio" type="radio" name="form-radio-button" checked="">
                                    <label for="demo-form-radio">Option 1 (pre-checked)</label>
                                 </div>
                                 <div class="radio">
                                    <input id="demo-form-radio-2" class="magic-radio" type="radio" name="form-radio-button">
                                    <label for="demo-form-radio-2">Option 2</label>
                                 </div>
                                 <div class="radio">
                                    <input id="demo-form-radio-3" class="magic-radio" type="radio" name="form-radio-button">
                                    <label for="demo-form-radio-3">Option 2</label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row pad-ver">
                              <label class="col-sm-12 col-md-2 col-lg-2 control-label">Inline Checkboxes</label>
                              <div class="col-sm-12 col-md-6 col-lg-4">
                                 <span class="colon">:</span>
                                 <div class="checkbox">
                                    <!-- Inline Checkboxes -->
                                    <input id="demo-form-inline-checkbox" class="magic-checkbox" type="checkbox" checked="">
                                    <label for="demo-form-inline-checkbox">Option 1 (pre-checked)</label>
                                    <input id="demo-form-inline-checkbox-2" class="magic-checkbox" type="checkbox">
                                    <label for="demo-form-inline-checkbox-2">Option 2</label>
                                    <input id="demo-form-inline-checkbox-3" class="magic-checkbox" type="checkbox">
                                    <label for="demo-form-inline-checkbox-3">Option 3</label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-sm-12 col-md-2 col-lg-2 control-label">File input</label>
                              <div class="col-sm-12 col-md-6 col-lg-4"><span class="colon">:</span>
                                 <span class="pull-left btn btn-default btn-file">
                                 Browse... <input type="file">
                                 </span>
                              </div>
                           </div>
                           <hr>
                           <div class="form-group row">
                              <label class="col-sm-12 col-md-2 col-lg-2 control-label"></label>
                              <div class="col-sm-12 col-md-6 col-lg-4">
                                 <button class="btn btn-primary mb-1">Submit</button>
                                 <button class="btn btn-danger mb-1">Cancle</button>
                              </div>
                           </div>
                        </div>
                        <!--===================================================-->
                        <!-- END BASIC FORM ELEMENTS -->
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
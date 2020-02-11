<?php 
/* =================================================
  File Name         	  :add FAQ
  Description		          : This is used for  display new FAQ.
  Developed By            : Puja Kumari
  Developed On            :23-09-2019
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
                    <h4>Add FAQ</h4>
                    

                  </div>
                 <nav class="bread-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"><span class="icon-home1"></span></a></li>
                           <li class="breadcrumb-item"><a href="#">Master Data Mgmt</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Add FAQ</li>
                        </ol>
                     </nav> 
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                              <a class="nav-item nav-link active"  href="javascript:void(0)">Add</a>
                              <a class="nav-item nav-link "  href="<?php echo URL;?>viewFAQ" >View</a>
                           </ul>
                           <div class="indicatorslist">
                              <a title="" href="javascript:void(0)" id="refreshIcon" data-toggle="tooltip" data-placement="top" onclick="return location.reload();" data-original-title="Refresh"><i class="icon-reuse"></i></a>
                              <a title="" href="javascript:void(0)" onclick="window.history.back()" id="backIcon" data-toggle="tooltip" data-placement="top" data-original-title="Back"><i class="icon-arrow-left1"></i></a>
                              <p class="ml-2">(*) Indicates mandatory </p>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                        <!-- BASIC FORM ELEMENTS -->
                        <!--===================================================-->
                        <div class="card-body">
                           <!--Static-->
                           <div class="form-group row">
                              <label class="col-12 col-md-2 col-xl-2 control-label" for="demo-email-input">Select Department <span class="text-danger">*</span></label>
                              <div class="col-12 col-md-5 col-xl-4">
                                 <span class="colon">:</span>
                                   <select class="form-control" name="vchDepartmentId" id="vchDepartmentId" onchange="getDeptWiseService('vchServicesId',this.value,0);">
                                 </select>
                                 <!-- <small class="help-block text-primary">Please enter your email</small> -->
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-12 col-md-2 col-xl-2 control-label" for="demo-email-input">Select Services <span class="text-danger">*</span></label>
                              <div class="col-12 col-md-5 col-xl-4">
                                 <span class="colon">:</span>
                                 <select class="form-control" name="vchServicesId" id="vchServicesId">
                                    <option>---select---</option>
                                 </select>
                                 <!-- <small class="help-block text-primary">Please enter your email</small> -->
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-12 col-md-2 col-xl-2 control-label" for="demo-text-input">FAQ Question <span class="text-danger">*</span></label>
                                <div class="col-12 col-md-5 col-xl-4">
                                  <span class="colon">:</span>
                                  <input type="text" id="vchFAQQuestion" name="vchFAQQuestion" class="form-control" maxlength="100" placeholder="Enter FAQ Question" value='<?php echo($vchFaqQuestion); ?>'>
                                </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-12 col-md-2 col-xl-2 control-label" for="demo-text-input">FAQ Answer <span class="text-danger">*</span></label>
                                <div class="col-12 col-md-5 col-xl-4">
                                  <span class="colon">:</span>
                                  <textarea id="vchFAQAnswer" rows="5" name="vchFAQAnswer" class="form-control" maxlength="200" placeholder="Enter FAQ Answer"><?php echo($vchFaqAnswer); ?></textarea>
                                </div>
                           </div>
                           
                           <hr>
                           <div class="form-group row">
                              <label class="col-12 col-md-2 col-xl-2 control-label"></label>
                              <div class="col-12 col-md-6 col-xl-4">
                                 <button type="button" class="btn btn-primary mb-1" onclick="return validateForm();">Submit</button>
                                 <button type="reset" class="btn btn-danger mb-1">Reset</button>
                                  <input type="hidden" name="hdnQs" id="hdnQs" value="">
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
        getDepartmentList('vchDepartmentId','<?php echo $intDepartmentId;?>');
        getDeptWiseService('vchServicesId','<?php echo $intDepartmentId;?>','<?php echo $intServiceRegistrationId;?>')
      loadNavigation('Dashboard');
      indicate = 'yes';
        <?php if($outMsg != '') { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?> 

    });
     function validateForm(){
        if(!selectDropdown('vchDepartmentId','Select Department'))
          return false;    
        if(!selectDropdown('vchServicesId','Select Select Service'))
          return false;     
        if(!blankCheck('vchFAQQuestion','FAQ Question can not be left blank'))
          return false;
        if(!maxLength('vchFAQQuestion',100,'FAQ Question'))
           return false;
         if(!checkSpecialChar('vchFAQQuestion')) 
            return false;
         if(!blankCheck('vchFAQAnswer','FAQ Answer can not be left blank'))
          return false;
        if(!maxLength('vchFAQAnswer',200,'FAQ Answer'))
           return false;
         if(!checkSpecialChar('vchFAQAnswer')) 
            return false;
        $('#hdnQs').val('U');
        $('form').submit();

    }
</script>
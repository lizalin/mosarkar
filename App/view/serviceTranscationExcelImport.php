<?php 
/*=================================================
  File Name    	: serviceTranscationExcelImportInner.php
  Description  	: Used for import the excel data in to the table
  Created By	   : Chinmayee
  Created On	   : 23-09-2019
  Developed By    : Chinmayee
  Developed On    : 23-09-2019
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
                    <h4>Service Transcation Excel Import</h4>
                    

                  </div>
                 <nav class="bread-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"><span class="icon-home1"></span></a></li>
                           <li class="breadcrumb-item"><a href="#">Master Data Mgmt</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Service Transcation Excel Import</li>
                        </ol>
                     </nav> 
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                              <a class="nav-item nav-link active"  href="javascript:void(0)">Excel Import</a>
                              <!-- <a class="nav-item nav-link "  href="<?php echo URL;?>viewService" >View</a> -->
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
                              <label class="col-12 col-md-2 col-xl-2 control-label" for="demo-email-input">Select District <span class="text-danger">*</span></label>
                              <div class="col-12 col-md-5 col-xl-4">
                                 <span class="colon">:</span>
                                 <select class="form-control" name="vchDistrictId" id="vchDistrictId">
                                    <option value="0">---Select District---</option>
                                    <!-- <option value="1">Home Department</option>
                                    <option value="2">H&FW Department</option> -->
                                 </select>
                                 <!-- <small class="help-block text-primary">Please enter your email</small> -->
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-12 col-md-2 col-xl-2 control-label" for="demo-email-input">Select Department <span class="text-danger">*</span></label>
                              <div class="col-12 col-md-5 col-xl-4">
                                 <span class="colon">:</span>
                                 <select class="form-control" name="vchDepartmentId" id="vchDepartmentId" onchange="getDeptWiseService('intServiceId',this.value,0);">
                                    <option value="0">---Select Department---</option>
                                    <!-- <option value="1">Home Department</option>
                                    <option value="2">H&FW Department</option> -->
                                 </select>
                                 <!-- <small class="help-block text-primary">Please enter your email</small> -->
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-12 col-md-2 col-xl-2 control-label" for="demo-email-input">Select Service <span class="text-danger">*</span></label>
                              <div class="col-12 col-md-5 col-xl-4">
                                 <span class="colon">:</span>
                                 <select class="form-control" name="intServiceId" id="intServiceId">
                                     <option value="0">---Select Service---</option>
                                    
                                 </select>
                              </div>
                            </div>


                            <div class="form-group row">
                              <label class="col-12 col-md-2 col-xl-2 control-label" for="demo-email-input">Data Type <span class="text-danger">*</span></label>
                              <div class="col-12 col-md-5 col-xl-4">
                                 <span class="colon">:</span>
                                 <div class="radio">
                                    <input id="rdoMale" class="magic-radio" value="1" type="radio" name="dataType" checked="checked">
                                    <label for="rdoMale">Raw Data</label> &nbsp;&nbsp;
                                    <input id="rdoFemale" class="magic-radio" type="radio" value="2" name="dataType">
                                    <label for="rdoFemale">Feedback Data</label>&nbsp;&nbsp;

                                 </div>
                                 <!-- <small class="help-block text-primary">Please enter your email</small> -->
                              </div>
                           </div>

                            <div class="form-group row addMoreServiceDiv">
                              <label class="col-12 col-md-2 col-xl-2 control-label" for="demo-text-input">Upload Excel File <span class="text-danger">*</span></label>
                              <div class="col-12 col-md-5 col-xl-4">
                                <span class="colon">:</span>
                                <input type="file" id="vchExcelFile" name="vchExcelFile" class="form-control vchExcelFile">
                                 <small class="text-danger">Please Upload Only .xls,.xlsx Format</small>
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


                           <?php  //print_r($excel_data); ?>

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
      getDepartmentList('vchDepartmentId','0');
      getDistrictList('vchDistrictId','0','0')
      <?php if($outMsg != '') { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?> 
      
    });

    function validateForm(){
        if(!selectDropdown('vchDistrictId','Select District')){
        return false;  }
        if(!selectDropdown('vchDepartmentId','Select Department')){
        return false;  }  
        if(!selectDropdown('intServiceId','Select Service')){
        return false;  } 
        if (!blankCheck('vchExcelFile' , 'Please Upload Excel File')) {         
         return false;
         } 
        if (!IsCheckFile('vchExcelFile', 'Invalid file types. Upload only ', 'xls')){
                                   return false;
        }
                           //   var fileSize_inKB = Math.round(($("#vchExcelFile")[0].files[0].size / 1024));
                           //   if (fileSize_inKB > 1024)
                           //   {
                           //       viewAlert(' File size cannot be more than 1MB.');
                           //       return false;
                           //   }
        $('#hdnQs').val('U');
        $('form').submit();

    }
   
</script>
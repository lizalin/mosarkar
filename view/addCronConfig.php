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
                    <h4>Add Cronjob Configuration</h4>
                    

                  </div>
                 <nav class="bread-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"><span class="icon-home1"></span></a></li>
                           <li class="breadcrumb-item"><a href="#">Settings</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Add Cronjob Configuration</li>
                        </ol>
                     </nav> 
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                              <a class="nav-item nav-link active"  href="javascript:void(0)">Add</a>
                              <a class="nav-item nav-link "  href="<?php echo URL;?>viewCronConfig" >View</a>
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
                           <div class="form-group" >
                <label class="col-md-3 col-sm-3 col-lg-2 control-label no-padding-right" for="Sub Category"> CronJob Name </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtJobName" name="txtJobName" class="form-control" maxlength="500"  value="<?php echo $jobName ; ?>"/>
                <input type="hidden" id="hdnLevel" name="hdnLevel" value=""/>
                  <span class="mandatory">*</span>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 col-sm-3 col-lg-2 control-label no-padding-right" for="Complain Type"> CronJob  Type </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <select class="form-control" id="selJobType" name="selJobType" onchange="fillUsers('selUser',$(this).find(':selected').data('val'),0,0);">
                   
                  
                  </select><span class="mandatory">*</span>
                  
                </div>
            </div>

            <div class="form-group" id="divCat" >
              <label class="col-md-3 col-sm-3 col-lg-2 control-label no-padding-right" for="category"> Select User</label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                  <select name="selUser" id="selUser"  class="form-control" >
                    <option value="0">- Select User -</option>
                
                  </select>                 
                  <span class="mandatory">*</span>
                </div>
            </div> 



              <div class="form-group" >
                <label class="col-md-3 col-sm-3 col-lg-2 control-label no-padding-right" for="Sub Category"> Frequency </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
              
                    <input type="text" id="txtFrequency" name="txtFrequency" value="<?php echo $txtFrequency;?>" class="form-control timepickerMask" autocomplete="off" maxlength="10" data-inputmask="'mask':'00:00'">
                  
                
            
                <input type="hidden" id="hdnLevel" name="hdnLevel" value="" />
                  <span class="mandatory">*</span>
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
         <link href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css">	
<script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>	
<script src="<?php echo URL;?>js/jquery.inputmask.bundle.js "></script>
<script language="javascript">

    $(document).ready(function () {
   
      loadNavigation('Dashboard');
      indicate = 'yes';
      $('.clockpicker').clockpicker({
		   	twelvehour:false
		  });

      fillJobType('selJobType','',0,'<?php echo $selJobType;?>');
      <?php if($id>0){?>
      fillUsers('selUser','<?php echo $accountType;?>',0,'<?php echo $selUser;?>'); 
      <?php } ?>
      
 

// For Out msg
         <?php if($outMsg != '') { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?> 
       
        $("#txtFrequency").inputmask();
   
    });


    function validateForm(){
                  if (!blankCheck('txtJobName', 'Job Name can not be left blank'))
                  return false;
                  if (!checkSpecialChar('txtJobName'))
                  return false;
                  if (!maxLength('txtJobName',500, 'length'))
                  return false;
                  if(!selectDropdown('selJobType','Select Job Type'))
                  return false;
                  if(!selectDropdown('selUser','Select User'))
                  return false;
                  if (!blankCheck('txtFrequency', 'Frequency can not be left blank'))
                  return false;
                  if (!checkSpecialChar('txtFrequency'))
                  return false;
                  if (!maxLength('txtFrequency',10, 'length'))
                  return false;
                  $('#hdnQs').val('U');
                  $('form').submit();
    }
   
</script>
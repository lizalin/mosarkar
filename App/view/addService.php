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
                    <h4>Add Service Registration</h4>
                    

                  </div>
                 <nav class="bread-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"><span class="icon-home1"></span></a></li>
                           <li class="breadcrumb-item"><a href="#">Master Data Mgmt</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Add Service Registration</li>
                        </ol>
                     </nav> 
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                              <a class="nav-item nav-link active"  href="javascript:void(0)">Add</a>
                              <a class="nav-item nav-link "  href="<?php echo URL;?>viewService" >View</a>
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
                                 <select class="form-control" name="vchDepartmentId" id="vchDepartmentId" onchange="getService(this.value,'<?php echo $intBlockId; ?>','vchServiceName_1');">
                                 </select>
                                 <!-- <small class="help-block text-primary">Please enter your email</small> -->
                              </div>
                           </div>
                           <div id="addMorecontain">
                             <div class="form-group row addMoreServiceDiv">
                                <label class="col-12 col-md-2 col-xl-2 control-label" for="demo-text-input">Services Name <span class="serviceCount">1</span> <span class="text-danger">*</span></label>
                                  <div class="col-12 col-md-5 col-xl-4">
                                    <span class="colon">:</span>
                                    <input type="text" id="vchServiceName_1" name="vchServiceName[]" class="form-control vchServiceName" maxlength="50" placeholder="Enter Services Name">
                                  </div>
                                  <div class="col-sm-2">
                                    <a href="javascript:void(0);" class="btn btn-xs btn-info addMoreService" data-rel="tooltip" title="" data-original-title="Add More" > <i class="fa fa-plus"></i> </a> &nbsp;
                                    <a href="javascript:void(0);" class="btn btn-xs btn-danger removeService" data-rel="tooltip" title="" data-original-title="Remove" style="display:none;"> <i class="fa fa-times"></i> </a>
                                  </div>
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
      //alert('<?php echo ($obj->decrypt($id));?>');
      //alert('<?php echo $intServiceRegistrationId;?>');
      getDepartmentList('vchDepartmentId','<?php echo ($obj->decrypt($id));?>');
      getService('<?php echo ($obj->decrypt($id));?>','<?php echo $intBlockId; ?>','vchServiceName_1')
      loadNavigation('Dashboard');
      indicate = 'yes';

// For Out msg
         <?php if($outMsg != '') { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?> 
        $("#vchDepartmentId").change(function() {
            $(".vchServiceName").val("");
        });


      // Add More Service
      $('.addMoreService').click(function(){ 
            if (!validateAddMore()){
               return false;
               }

            var row         = $('.addMoreServiceDiv').length;            
            var cloneRow    = $('.addMoreServiceDiv:last').clone(true);
            cloneRow.find('.vchServiceName').val('');
            cloneRow.find('.vchServiceName').attr("value",'');
            $(this).closest('.addMoreServiceDiv').after(cloneRow);
            $.each($('.addMoreServiceDiv'),function(e){
                var rowNo  = Number(e)+1;  
                $(this).find('.vchServiceName').attr("id", "vchServiceName_"+rowNo);
                $(this).find('.serviceCount').html((rowNo-1)+1);
                $('.removeService').show();
            }); 
        });
        // Remove Gallery
        $('.removeService').on('click',function(){
            $(this).closest('.addMoreServiceDiv').remove();
            if($('.removeService').length==1)
                $('.removeService').hide();
            $.each($('.addMoreServiceDiv'),function(e){
                var rowNo   = Number(e)+1;  
                $(this).find('.vchServiceName').attr("id", "vchServiceName_"+rowNo);
                $(this).find('.serviceCount').html((rowNo-1)+1);
            });  
        });
    });
    function validateForm(){
        if(!selectDropdown('vchDepartmentId','Select Department')){
        return false;  }     
        if (!validateAddMore()){
        return false; }      
        
        $('#hdnQs').val('U');
        $('form').submit();

    }
    function validateAddMore(){
      var i=0;
      var flag=0;
      $.each($('.addMoreServiceDiv'), function (e) {
         i++;
         if (!blankCheck('vchServiceName_' + i, 'Services Name ' + i + ' can not left blank')) {
         flag = 1;
         return false;
         }
         if (!maxLength('vchServiceName_' + i, 50,'Services Name ' + i)) {
         flag = 1;
         return false;
         }
      });
           
      if (flag == 0) {
      return true;
      }
      if (flag == 1) {
      return false;
      }


    }
   
</script>
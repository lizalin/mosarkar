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
<style>
  .blockUI{
    padding: 20px!important;
  }
</style>

          <div class="mainpanel">
            <div class="section">
               <div class="page-title">
                  <div class="title-details">
                    <h4>Add Survey Questionnaire</h4>
                    

                  </div>
                 <nav class="bread-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"><span class="icon-home1"></span></a></li>
                           <li class="breadcrumb-item"><a href="#">Master Data Mgmt</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Add Survey Questionnaire</li>
                        </ol>
                     </nav> 
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav nav-tabs nav-fill" role="tablist">
                              <a class="nav-item nav-link active"  href="javascript:void(0)">Add</a>
                              <!-- <a class="nav-item nav-link "  href="<?php echo URL;?>viewFAQ" >View</a> -->
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
                              <div class="col-12 col-md-3 col-xl-4">
                                 <span class="colon">:</span>
                                 <select class="form-control" name="intDepartmentId" id="intDepartmentId" onchange="return getDeptWiseService('intServicesId',this.value,0)">
                                    <option value="0">--select--</option>
                                    <!-- <option value="1">Home</option> -->
                                 </select>
                                 <!-- <small class="help-block text-primary">Please enter your email</small> -->
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-12 col-md-2 col-xl-2 control-label" for="demo-email-input">Select Services <span class="text-danger">*</span></label>
                              <div class="col-12 col-md-3 col-xl-4">
                                 <span class="colon">:</span>
                                 <select class="form-control" name="intServicesId" id="intServicesId">
                                    <option value="0">--select--</option>
                                    <!-- <option value="1">Test Service</option> -->
                                 </select>
                                 <!-- <small class="help-block text-primary">Please enter your email</small> -->
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-12 col-md-2 col-xl-2 control-label" for="demo-email-input">Type <span class="text-danger">*</span></label>
                              <div class="col-12 col-md-3 col-xl-4">
                                 <span class="colon">:</span>
                                 <div class="radio">
                                    <input id="Qualitative" onclick="showHideQualitiveQuantitative(this.value)" class="magic-radio" value="1" type="radio" name="intType" checked="">
                                    <label for="Qualitative">Qualitative</label> &nbsp;&nbsp;
                                    <input id="Quantitative" onclick="showHideQualitiveQuantitative(this.value)" class="magic-radio" type="radio" value="2" name="intType">
                                    <label for="Quantitative">Quantitative</label>
                                 </div>
                                 <!-- <small class="help-block text-primary">Please enter your email</small> -->
                              </div>
                           </div>
                            
                            <div class="addMoreQuestDiv">
                              <div class="form-group row addMoreQuestClnDiv">
                                <div class="col-sm-12 col-md-10">
                                  <div class="well well-sm">
                                    <div class="text-right">
                                      <a href="javascript:void(0)" class="text-danger removeQuest" style="display: none;"><i class="fa fa-window-close"></i></a>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12 col-md-2"></div>
                                      <label class="col-sm-12 col-md-5">In English</label>
                                      <label class="col-sm-12 col-md-5">In Odiya</label>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-12 col-md-2 control-label">Question <span class="countQuest">1</span> <span class="text-danger">*</span></label>
                                      <div class="col-12 col-md-5 col-xl-4">
                                        <span class="colon">:</span>
                                        <input type="text" class="form-control vchQuestionEnglish" maxlength="100" name="vchQuestionEnglish_0" id="vchQuestionEnglish_0" placeholder="Add Question" value="">
                                      </div>
                                      <div class="col-12 col-md-5 col-xl-4">
                                        <input type="text" class="form-control vchQuestionOdia" maxlength="100" name="vchQuestionOdia_0" id="vchQuestionOdia_0" placeholder="" value="">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-12 col-md-2 control-label">Short Name <span class="text-danger">*</span></label>
                                      <div class="col-12 col-md-5 col-xl-4">
                                        <span class="colon">:</span>
                                        <input type="text" class="form-control vchShortName" maxlength="80" name="vchShortName_0" id="vchShortName_0" placeholder="Short Name">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-12 col-md-2 control-label">Option Selection <span class="text-danger">*</span></label>
                                      <div class="col-12 col-md-5 col-xl-4">
                                        <span class="colon">:</span>
                                        <select name="intOptionSelection_0" class="form-control intOptionSelection" onchange="//showHideOptionSelection(this.value, 0)" id="intOptionSelection_0">
                                          <option value="0">--Select--</option>
                                          <option value="1">Single</option>
                                          <option value="2">Multiple</option>
                                          <option value="3">Option With Text</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12 col-md-2"></div>
                                      <label class="col-sm-12 col-md-3">In English</label>
                                      <label class="col-sm-12 col-md-3">In Odiya</label>
                                      <label class="col-sm-12 col-md-1 clsQuantitative">Value</label>
                                    </div>
                                    <div class="form-group addMoreQuanittativeDiv addMoreQuanittativeDiv_0">
                                      <label class="col-sm-12 col-md-2 control-label">Option <span class="divCountOption_0">1</span> <span class="text-danger">*</span></label>
                                      <div class="col-12 col-md-3 col-xl-3">
                                        <span class="colon">:</span>
                                        <input type="text" class="form-control vchOptionEnglish vchOptionEnglish_0" maxlength="50" name="vchOptionEnglish_0[]" id="vchOptionEnglish_0_0" placeholder="Add Option" value="">
                                      </div>
                                      <div class="col-12 col-md-3 col-xl-4">
                                        <input type="text" class="form-control vchOptionOdia vchOptionOdia_0" maxlength="50" name="vchOptionOdia_0[]" id="vchOptionOdia_0_0" placeholder="" value="">
                                      </div>
                                      <div class="col-sm-12 col-md-1 clsQuantitative">
                                        <input type="text" class="form-control clsQuantitative intOptionValue intOptionValue_0" maxlength="2" name="intOptionValue_0[]" id="intOptionValue_0_0" value="" name="">
                                      </div>
                                      <div class="col-sm-12 col-md-2 divOptionSelection divOptionSelection_0">
                                        <a href="javascript:void(0)" class="btn btn-success addMoreQuanittativeOption" onclick="addMoreQuanittativeOption(0, this)"><i class="fa fa-plus"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger removeQuanittativeOption removeQuanittativeOption_0" onclick="removeQuanittativeOption(0, this)" style="display: none;"><i class="fa fa-times"></i></a>
                                      </div>
                                    </div>                                      
                                    <div class="form-group">
                                      <label class="col-sm-12 col-md-2 control-label">Description <span class="text-danger">*</span></label>
                                      <div class="col-12 col-md-7 col-xl-4">
                                        <span class="colon">:</span>
                                        <textarea class="form-control vchDescription" maxlength="200" rows="5" name="vchDescription_0" id="vchDescription_0"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                            </div>
                            <div class="form-group">
                              <div class="col-md-10 text-center">
                                <button type="button" class="btn btn-success addMoreQuest">+ Add More Question</button>
                              </div>
                            </div>
                                
                           <hr>
                           <div class="form-group row">
                              <label class="col-12 col-md-2 col-xl-2 control-label"></label>
                              <div class="col-12 col-md-6 col-xl-4">
                                 <button type="button" class="btn btn-primary mb-1" onclick="return validateQuestionForm()">Submit</button>
                                 <button type="reset" class="btn btn-danger mb-1" onclick="window.location.reload()">Reset</button>
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
             <script src="<?php echo URL;?>js/jquery.blockUI.js"></script>
<script language="javascript">
    function validateQuestionForm(){
      if(!validateQuestion())
        return false;

      addSurveyQuestionnaireOption()
      // $.blockUI({ message: '<h4><img style="display: block;margin: 0 auto;" src="'+URL+'/img/loader-white1.gif" /> Just a moment...</h4>' });
      // var intNoOfQuestion = $('.addMoreQuestClnDiv').length;
      // var frmTCP = document.getElementById("frmCMO");
      // var fd = new FormData(frmTCP );
      // fd.append('method','addSurveyQuestionnaire');
      // fd.append('intNoOfQuestion',intNoOfQuestion);
      // $.ajax({
      //     url: URL + '/proxy',
      //     dataType: "json",
      //     type: "POST",
      //     data: fd,
      //     contentType: false,
      //     processData: false,
      //     success:function(data){
      //       $.unblockUI();
      //       if(data.result.flag != 0){
      //         viewAlert(data.result.outMsg);
      //       }else{
      //         viewAlert(data.result.outMsg,'',window.location.href);
      //       }
      //     }
      // })
    }

    function validateQuestion(){
      if(!selectDropdown('intDepartmentId','Please Select Department'))
        return false;
      if(!selectDropdown('intServicesId', 'Please Select Service'))
        return false;
      var row         = $('.addMoreQuestClnDiv').length;
      if(row > 0){
        for(var i = 0; i < row; i++){
          // console.log(i);
          if(!blankCheck('vchQuestionEnglish_'+i, 'Question '+(i+1)+' In English cannot be left blank'))
            return false;
          if(!checkSpecialChar('vchQuestionEnglish_'+i))
            return false;
          // if(!maxLength('vchQuestionEnglish_'+i,100,'Question In English'))
          //   return false;
          if(!blankCheck('vchQuestionOdia_'+i, 'Question '+(i+1)+' In Odiya cannot be left blank'))
            return false;
          // if(!maxLength('vchQuestionOdia_'+i,100,'Question In Odiya'))
          //   return false;
          if(!blankCheck('vchShortName_'+i, 'Short Name '+(i+1)+' cannot be left blank'))
            return false;
          // if(!maxLength('vchShortName_'+i,80,'Short Name'))
          //   return false;
          if(!checkSpecialChar('vchShortName_'+i))
            return false;
          if(!selectDropdown('intOptionSelection_'+i, 'Please Select Option Selection '+(i+1)))
            return false;


          var rowOption   = $('.vchOptionEnglish_'+i).length;
          var j = 0;

          if(rowOption > 0){
            for(j = 0; j < rowOption; j++){
              if(!blankCheck('vchOptionEnglish_'+i+'_'+j, 'Option '+(j+1)+' In English for Question '+(i+1)+' cannot be left blank'))
                return false;
              if(!checkSpecialChar('vchOptionEnglish_'+i+'_'+j))
                return false;
              // if(!maxLength('vchOptionEnglish_'+i+'_'+j,50,'Option '+(j+1)+' In English'))
              //   return false;
              if(!blankCheck('vchOptionOdia_'+i+'_'+j, 'Option '+(j+1)+' In Odiya for Question '+(i+1)+' cannot be left blank'))
                return false;
              // if(!maxLength('vchOptionOdia_'+i+'_'+j,50,'Option '+(j+1)+' In Odiya'))
              //   return false;

              if($("input[name='intType']:checked").val() == 2){
                if(!blankCheck('intOptionValue_'+i+'_'+j, 'Option '+(j+1)+' Value for Question '+(i+1)+' cannot be left blank'))
                  return false;
                // if(!maxLength('intOptionValue_'+i+'_'+j,50,'Option '+(j+1)+' Value'))
                //   return false;
              }

            }
            // return true;
          }
          if(!blankCheck('vchDescription_'+i, 'Description '+(i+1)+' cannot be left blank'))
            return false;
          if(!checkSpecialChar('vchDescription_'+i))
            return false;
        }
        return true;
      }
    }

    function showHideOptionSelection(intVal, intLenght){
      if(intVal == 1){
        $('.divOptionSelection_'+intLenght).hide();
        $(".addMoreQuanittativeDiv_"+intLenght+":gt("+0+")").detach();
      }else{
        $('.divOptionSelection_'+intLenght).show();
      }
    }
    function addMoreQuanittativeOption(intLenght, vchThis) {
      var cloneRow    = $('.addMoreQuanittativeDiv_'+intLenght+':last').clone(true);
      cloneRow.find('.vchOptionEnglish_'+intLenght).val('');
      cloneRow.find('.vchOptionOdia_'+intLenght).val('');
      $(vchThis).closest('.addMoreQuanittativeDiv_'+intLenght).after(cloneRow);
      $.each($('.addMoreQuanittativeDiv_'+intLenght),function(e){
          var rowNo  = Number(e);  
          $(this).find('.vchOptionEnglish_'+intLenght).attr("id", "vchOptionEnglish_"+intLenght+"_"+rowNo);
          $(this).find('.vchOptionOdia_'+intLenght).attr("id", "vchOptionOdia_"+intLenght+"_"+rowNo);
          $(this).find('.divCountOption_'+intLenght).html(rowNo+1);
          $('.removeQuanittativeOption_'+intLenght).show();
      }); 
    }
    function removeQuanittativeOption(intLenght, vchThis){
        $(vchThis).closest('.addMoreQuanittativeDiv_'+intLenght).remove();
        if($('.removeQuanittativeOption_'+intLenght).length == 1){
          $('.removeQuanittativeOption_'+intLenght).hide();
        }
        $.each($('.addMoreQuanittativeDiv_'+intLenght),function(e){
            var rowsNo   = Number(e)+0;  
            $(this).find('.vchOptionEnglish_'+intLenght).attr("id", "vchOptionEnglish_"+intLenght+"_"+rowsNo);
            $(this).find('.vchOptionOdia_'+intLenght).attr("id", "vchOptionOdia_"+intLenght+"_"+rowsNo);
            $(this).find('.divCountOption_'+intLenght).html(rowsNo+1);
        });  
    }
    function showHideQualitiveQuantitative(vchId){
      if(vchId == 2){
        $('.clsQuantitative').show();
        $('.clsQuantitative').val('');
      }else{
        $('.clsQuantitative').hide();
        $('.clsQuantitative').val('');
      }
    }
    $(document).ready(function () {
      showHideQualitiveQuantitative(1);
      getDepartmentList('intDepartmentId', '<?php echo $intDepartmentId ?>');
      loadNavigation('Dashboard');
      indicate = 'yes';

      // Add More Service
      $('.addMoreQuest').click(function(){
            var row         = $('.addMoreQuestClnDiv').length;
            if(!validateQuestion())
              return false;
            $('.removeQuest').show();
            var intType   = $("input[name='intType']:checked").val();
            addSurveyQuestionnaire(row, intType);

        });
    });
    $('body').on('click', '.removeQuest',function(){
        $(this).closest('.addMoreQuestClnDiv').remove();
        if($('.removeQuest').length==1)
            $('.removeQuest').hide();
        $.each($('.addMoreQuestClnDiv'),function(e){
            var rowNo   = Number(e)+0;  
            $(this).find('.vchQuestionEnglish').attr("id", "vchQuestionEnglish_"+rowNo);
            $(this).find('.vchQuestionEnglish').attr("name", "vchQuestionEnglish_"+rowNo);
            $(this).find('.vchQuestionOdia').attr("id", "vchQuestionEnglish_"+rowNo);
            $(this).find('.vchQuestionOdia').attr("name", "vchQuestionEnglish_"+rowNo);
            $(this).find('.vchShortName').attr("id", "vchShortName_"+rowNo);
            $(this).find('.vchShortName').attr("name", "vchShortName_"+rowNo);
            $(this).find('.intOptionSelection').attr("id", "intOptionSelection_"+rowNo);
            $(this).find('.intOptionSelection').attr("name", "intOptionSelection_"+rowNo);
            //$(this).find('.intOptionSelection').attr("onchange", "showHideOptionSelection(this.value, "+rowNo+")");
            $(this).find('.addMoreQuanittativeDiv').attr("class", "form-group addMoreQuanittativeDiv addMoreQuanittativeDiv_"+rowNo);
            $(this).find('.divOptionSelection').attr("class", "col-sm-12 col-md-2 divOptionSelection divOptionSelection_"+rowNo);
            $(this).find('.divOptionSelection').attr("class", "col-sm-12 col-md-2 divOptionSelection divOptionSelection_"+rowNo);
            $(this).find('.removeQuanittativeOption').attr("class", "btn btn-danger removeQuanittativeOption removeQuanittativeOption_"+rowNo);
            $(this).find('.removeQuanittativeOption').attr("onclick", "removeQuanittativeOption("+rowNo+", this)");
            $(this).find('.addMoreQuanittativeOption').attr("onclick", "addMoreQuanittativeOption("+rowNo+", this)");
            $(this).find('.vchOptionEnglish').attr("class", "form-control vchOptionEnglish vchOptionEnglish_"+rowNo);
            $(this).find('.vchOptionOdia').attr("class", "form-control vchOptionOdia vchOptionOdia_"+rowNo);
            $(this).find('.intOptionValue').attr("class", "form-control intOptionValue intOptionValue_"+rowNo);
            $(this).find('.vchOptionEnglish').attr("name", "vchOptionEnglish_"+rowNo+"[]");
            $(this).find('.vchOptionOdia').attr("name", "vchOptionOdia_"+rowNo+"[]");
            $(this).find('.intOptionValue').attr("name", "intOptionValue_"+rowNo+"[]");
            $(this).find('.countQuest').html(rowNo+1);
            $.each($('.addMoreQuanittativeDiv_'+rowNo), function(d){
              var numRow   = Number(d)+0;  
              $(this).find('.vchOptionEnglish_'+rowNo).attr("id", "vchOptionEnglish_"+rowNo+"_"+numRow);
              $(this).find('.vchOptionOdia_'+rowNo).attr("id", "vchOptionOdia_"+rowNo+"_"+numRow);
              $(this).find('.intOptionValue_'+rowNo).attr("id", "intOptionValue_"+rowNo+"_"+numRow);
            });
        });  

    });

    function addSurveyQuestionnaire(intLenght, intType){
      var returnHTML  = '';
      returnHTML  += '<div class="form-group row addMoreQuestClnDiv">';
      returnHTML  += '  <div class="col-sm-12 col-md-10">';
      returnHTML  += '    <div class="well well-sm">';
      returnHTML  += '      <div class="text-right">';
      returnHTML  += '        <a href="javascript:void(0)" class="text-danger removeQuest"><i class="fa fa-window-close"></i></a>';
      returnHTML  += '      </div>';
      returnHTML  += '      <div class="row">';
      returnHTML  += '        <div class="col-sm-12 col-md-2"></div>';
      returnHTML  += '        <label class="col-sm-12 col-md-5">In English</label>';
      returnHTML  += '        <label class="col-sm-12 col-md-5">In Odiya</label>';
      returnHTML  += '      </div>';
      returnHTML  += '      <div class="form-group">';
      returnHTML  += '        <label class="col-sm-12 col-md-2 control-label">Question <span class="countQuest">'+ (intLenght + 1) +'</span> <span class="text-danger">*</span></label>';
      returnHTML  += '        <div class="col-12 col-md-5 col-xl-4">';
      returnHTML  += '          <span class="colon">:</span>';
      returnHTML  += '          <input type="text" class="form-control vchQuestionEnglish" maxlength="100" name="vchQuestionEnglish_'+ intLenght +'" id="vchQuestionEnglish_'+ intLenght +'" placeholder="Add Question" value="">';
      returnHTML  += '        </div>';
      returnHTML  += '        <div class="col-12 col-md-5 col-xl-4">';
      returnHTML  += '          <input type="text" class="form-control vchQuestionOdia" maxlength="100" name="vchQuestionOdia_'+ intLenght +'" id="vchQuestionOdia_'+ intLenght +'" placeholder="" value="">';
      returnHTML  += '        </div>';
      returnHTML  += '      </div>';
      returnHTML  += '      <div class="form-group">';
      returnHTML  += '        <label class="col-sm-12 col-md-2 control-label">Short Name <span class="text-danger">*</span></label>';
      returnHTML  += '        <div class="col-12 col-md-5 col-xl-4">';
      returnHTML  += '          <span class="colon">:</span>';
      returnHTML  += '          <input type="text" class="form-control vchShortName" maxlength="80" name="vchShortName_'+ intLenght +'" id="vchShortName_'+ intLenght +'" placeholder="Short Name">';
      returnHTML  += '        </div>';
      returnHTML  += '      </div>';
      returnHTML  += '      <div class="form-group">';
      returnHTML  += '        <label class="col-sm-12 col-md-2 control-label">Option Selection <span class="text-danger">*</span></label>';
      returnHTML  += '        <div class="col-12 col-md-5 col-xl-4">';
      returnHTML  += '          <span class="colon">:</span>';
      returnHTML  += '          <select name="intOptionSelection_'+ intLenght +'" class="form-control intOptionSelection" onchange="//showHideOptionSelection(this.value, '+ intLenght +')" id="intOptionSelection_'+ intLenght +'">';
      returnHTML  += '            <option value="0">--Select--</option>';
      returnHTML  += '            <option value="1">Single</option>';
      returnHTML  += '            <option value="2">Multiple</option>';
      returnHTML  += '            <option value="3">Option With Text</option>';
      returnHTML  += '          </select>';
      returnHTML  += '        </div>';
      returnHTML  += '      </div>';
      returnHTML  += '      <div class="row">';
      returnHTML  += '        <div class="col-sm-12 col-md-2"></div>';
      returnHTML  += '        <label class="col-sm-12 col-md-3">In English</label>';
      returnHTML  += '        <label class="col-sm-12 col-md-3">In Odiya</label>';
      returnHTML  += '        <label class="col-sm-12 col-md-1 clsQuantitative">Value</label>';
      returnHTML  += '      </div>';
      returnHTML  += '      <div class="form-group addMoreQuanittativeDiv addMoreQuanittativeDiv_'+ intLenght +'">';
      returnHTML  += '        <label class="col-sm-12 col-md-2 control-label">Option <span class="divCountOption_'+ intLenght +'">1</span> <span class="text-danger">*</span></label>';
      returnHTML  += '        <div class="col-12 col-md-3 col-xl-3">';
      returnHTML  += '          <span class="colon">:</span>';
      returnHTML  += '          <input type="text" maxlength="50" class="form-control vchOptionEnglish vchOptionEnglish_'+ intLenght +'" name="vchOptionEnglish_'+ intLenght +'[]" id="vchOptionEnglish_'+ intLenght +'_0" placeholder="Add Option" value="">';
      returnHTML  += '        </div>';
      returnHTML  += '        <div class="col-12 col-md-3 col-xl-4">';
      returnHTML  += '          <input type="text" maxlength="50" class="form-control vchOptionOdia vchOptionOdia_'+ intLenght +'" name="vchOptionOdia_'+ intLenght +'[]" id="vchOptionOdia_'+ intLenght +'_0" placeholder="" value="">';
      returnHTML  += '        </div>';
      returnHTML  += '        <div class="col-sm-12 col-md-1 clsQuantitative">';
      returnHTML  += '          <input type="text" maxlength="2" class="form-control clsQuantitative intOptionValue intOptionValue_'+ intLenght +'" name="intOptionValue_'+ intLenght +'" id="intOptionValue_'+ intLenght +'_0" value="" name="">';
      returnHTML  += '        </div>';
      returnHTML  += '        <div class="col-sm-12 col-md-2 divOptionSelection divOptionSelection_'+ intLenght +'">';
      returnHTML  += '          <a href="javascript:void(0)" class="btn btn-success addMoreQuanittativeOption" onclick="addMoreQuanittativeOption('+ intLenght +', this)"><i class="fa fa-plus"></i></a>';
      returnHTML  += '          <a href="javascript:void(0)" class="btn btn-danger removeQuanittativeOption removeQuanittativeOption_'+ intLenght +'" onclick="removeQuanittativeOption('+ intLenght +', this)" style="display: none;"><i class="fa fa-times"></i></a>';
      returnHTML  += '        </div>';
      returnHTML  += '      </div>            ';
      returnHTML  += '      <div class="form-group">';
      returnHTML  += '        <label class="col-sm-12 col-md-2 control-label">Description <span class="text-danger">*</span></label>';
      returnHTML  += '        <div class="col-12 col-md-7 col-xl-4">';
      returnHTML  += '          <span class="colon">:</span>';
      returnHTML  += '          <textarea class="form-control vchDescription" maxlength="200" rows="5" name="vchDescription_'+ intLenght +'" id="vchDescription_'+ intLenght +'"></textarea>';
      returnHTML  += '        </div>';
      returnHTML  += '      </div>';
      returnHTML  += '    </div>';
      returnHTML  += '  </div>';
      returnHTML  += '</div>';
      $('.addMoreQuestDiv').append(returnHTML);
      if(intType == 1){
        $('.clsQuantitative').hide();
      }else{
        $('.clsQuantitative').show();
      }
    }
   
</script>
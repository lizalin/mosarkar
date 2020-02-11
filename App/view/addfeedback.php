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
/*  @import url(https://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);
*{
  margin: 0;
  padding: 0;
  font-family: roboto;
}*/



.cont{
      /* width: 93%; */
    /* max-width: 350px; */
    text-align: center;
    /* margin: 4% auto; */
    padding: 30px 0;
    /* background: #111; */
    /* color: #EEE; */
    /* border-radius: 5px; */
    /* overflow: hidden; */
}

/*

div.stars{
  width: 270px;
  display: inline-block;
}

input.star{
  display: none;
}

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content:'\f005';
  color: #FD4;
  transition: all .25s;
}


input.star-5:checked ~ label.star:before {
  color:#FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before {
  color: #F62;
}

label.star:hover{
  transform: rotate(-15deg) scale(1.3);
}

label.star:before{
  content:'\f006';
  font-family: FontAwesome;
}

.rev-box{
  overflow: hidden;
  height: 0;
  width: 100%;
  transition: all .25s;
}

textarea.review{
  background: #222;
  border: none;
  width: 100%;
  max-width: 100%;
  height: 100px;
  padding: 10px;
  box-sizing: border-box;

}

label.review{
  display: block;
  transition:opacity .25s;
}



input.star:checked ~ .rev-box{
  height: 125px;
  overflow: visible;
}*/

</style>
  <div class="mainpanel">
    <div class="section">


      <div class="">
       <div class="card">
        <div class="card-header">
         <div class="indicatorslist">
        <?php if($feqFrom=="CC"){  ?>  
          <a  title="" href="<?php echo URL.'viewfeedback/'.$userId ?>" id="backIcon" data-toggle="tooltip"  data-placement="top" data-original-title="Back"><i class="icon-arrow-left1"></i></a>
        <?php } ?>
        <?php if($feqFrom=="CMB"){ ?>  
          <a  title="" href="javascript:void(0)" id="backIcon" data-toggle="tooltip" onclick="window.history.back()" data-placement="top" data-original-title="Back"><i class="icon-arrow-left1"></i></a>
        <?php } ?>
        </div>
        <h6>Citizen Information</h6>
      </div>
      <input type="hidden" name="intRequestedFrom" id="intRequestedFrom" value="<?php echo $intRequestedFrom; ?>">
      <input type="hidden" name="intRequestedById" id="intRequestedById" value="<?php echo $intRequestedById; ?>">
      <input type="hidden" name="intCallBackRequest" id="intCallBackRequest" value="<?php echo $intCallBackRequest; ?>">
      <input type="hidden" name="feqFrom" id="feqFrom" value="<?php echo $feqFrom; ?>">
      <input type="hidden" name="dataType" id="dataType" value="<?php echo $dataType; ?>">
      <input type="hidden" name="fromAuth" id="fromAuthId" value="1">
      <!--===================================================-->
      <div class="card-body">

        <div class="row">
          <div class="col-sm-12 col-md-8 col-lg-8">

            <div class="row">
             <div class="col-sm-12">
              <div class="personal-info">
                <table class="table">
                 <tr>
                  <th>Name</th>
                  <th>Mobile No.</th>
                  <th colspan="4">District</th>
                  <!-- <th>Block</th>
                  <th>GP</th>
                  <th>Village</th> -->
                  <!-- <th>Address</th> -->
                  
               </tr>
               <tr>
                <td><?= $vchName ?></td>
                <td><?= $intMobile ?></td>
                <td colspan="4"><?= $vchDistrict ?></td>
               <!--  <td><?= $vachBlock ?></td>
                <td><?= $vchGPName ?></td>
                <td><?= $vchVillageName ?></td> -->
              </tr>
               <tr>
                  
                  <th>Services</th>
                  <th>Scheme</th>
                  <?php if($intServiceId==RCMS){ ?>
                  <th>Ration Card No.</th>
                  <th>Card Type</th>
                  <th>No of Family</th>
                  <?php }else{ ?>
                  <th>Token No.</th>
                  <th>Deposite Date</th>
                  <?php } ?>
                  <th>Reg. Date</th>
               </tr>
               <tr>
                <td><?= $vchServiceName ?></td>
                <td><?= $vchSchemeTypeName ?></td>
                <?php if($intServiceId==RCMS){ ?>
                <td><?= $vchRationCardNo ?></td>
                <td><?= $vchCardName ?></td>
                <td><?= $intNoFamily ?></td>
              <?php }else{ ?>
                <td><?= $vchTokenNo ?></td>
                <td><?= $dtmPaddyDeposite ?></td>
              <?php } ?>
                <td><?php echo ($dtmRegdDateTime)?date('d-m-Y',strtotime($dtmRegdDateTime)):'--'; ?></td>
                <!-- <td>Near Jagannath Temple, Panda Sahi, At-po: Kudiary, pin: 752050</td> -->
              </tr>
            </table>
          </div>
        </div>


        <!-- <div class="col-sm-12 col-md-6">
          <div class="feedback-portlet">
           <div class="feedback-portlet-header">
            Service Details
          </div>
          <div class="feedback-portlet-body" id="divServiceDetails">
            <div class="text-center no-content">
              <img style="width: 6%;" src="<?= APPURL.'img/loader-white1.gif' ?>" >
            </div>
        </div>
      </div>
    </div> -->

    <div class="col-sm-12 col-md-12">
      <div class="feedback-portlet">
       <div class="feedback-portlet-header">
         Call information
       </div>
       <div class="feedback-portlet-body" id="divCallInfo">
        <div class="text-center no-content">
          <img style="width: 6%;" src="<?= APPURL.'img/loader-white1.gif' ?>" >
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-12">
    <div class="feedback-portlet">
     <div class="feedback-portlet-header">
       FAQ
     </div>
     <div class="feedback-portlet-body" id="divFAQ">
      <div class="text-center no-content">
        <img style="width: 6%;" src="<?= APPURL.'img/loader-white1.gif' ?>" >
      </div>
        <!-- <input type="text"  class="form-control search-input" id="InpSearch" name="" placeholder="Enter text">
        <ul class="search-list">
          <li><a href="javascript:void(0)">Who is at increased risk for acquiring HAV infection?</a></li>
        </ul>
        <ul class="faq-list">
          <li>
            <span>Who is at increased risk for acquiring HAV infection?</span>
           Travelers to countries with high or intermediate endemicity of HAV infection
          </li>
        </ul> -->
   </div>
 </div>
</div>
<!-- <div class="col-sm-12 col-md-6">
  <div class="feedback-portlet">
   <div class="feedback-portlet-header">
     Call Status
   </div>
   <div class="feedback-portlet-body">
    <div class="form-group">
     <div class="radio">
      <input id="intFeedbackStatus-1" class="magic-radio" value="1" type="radio" name="intFeedbackStatus">
      <label for="intFeedbackStatus-1">Feedback Collected</label>
    </div>
    <div class="radio">
      <input id="intFeedbackStatus-2" class="magic-radio" value="2" type="radio" name="intFeedbackStatus">
      <label for="intFeedbackStatus-2">Not Reachable</label>
    </div>
    <div class="radio">
      <input id="intFeedbackStatus-3" class="magic-radio" value="3" type="radio" name="intFeedbackStatus">
      <label for="intFeedbackStatus-3">Invalid No. / Wrong No.</label>
    </div>
    <div class="radio">
      <input id="intFeedbackStatus-4" value="4" class="magic-radio" type="radio" name="intFeedbackStatus">
      <label for="intFeedbackStatus-4">Did not Pick</label>
    </div>
    <div class="radio">
      <input id="intFeedbackStatus-5" value="5" class="magic-radio" type="radio" name="intFeedbackStatus">
      <label for="intFeedbackStatus-5">Not Intrested</label>
    </div>
    <div class="radio">
      <input id="intFeedbackStatus-6" value="6" class="magic-radio" type="radio" name="intFeedbackStatus">
      <label for="intFeedbackStatus-6">DND</label>
    </div>
   </div>

 </div>
</div>
</div> -->
</div>








</div>
                <?php 
                if($intRequestedFrom == 0){
                  $startCallShowHide = "style='display:block;'";
                  $endCallShowHide = "style='display:none;'";
                }else{
                  $endCallShowHide = "style='display:block;'";
                  $startCallShowHide = "style='display:none;'";
                }

                ?>
                <div class="col-sm-12 col-md-4 col-lg-4">
                  <div class="feedback-right ">
                    <div class="btn-group twobtns">
                      <?php if(strtolower($feqFrom)=='cc'){ ?>
                      <div id="callCenterId">
                      <!-- <button type="button" id="divCallStart" class="btn btn-success" <?php echo $startCallShowHide; ?> onclick="return callStart();"><i class="icon-phone1" ></i> Call Start <span id="callStart"></span></button>
                      <button type="button" id="divCallEnd" class="btn btn-danger" onclick="callEnd()" <?php echo $endCallShowHide ?>><i class="icon-phone-off1"></i> Call End <span id="callEnd"></span></button> -->
                      <button type="button" class="btn btn-primary" onclick="return valildateSubmitFeedback()"><i class="icon-upload-cloud1"></i> Feedback Submit</button>
                    <!-- </div> -->
                    <p class="text-right">Language <a class="lang" id="eng" onclick="changeQuestionLang('eng')">E</a><a class="lang" id="odia"  onclick="changeQuestionLang('odia')">ଓ</a></p>
                    <div class="question-tabs" id="divFeedbackStartAll">
                      <div class="form-group">
                        <div id="divFeedbackStart">
                        <div class="radio">
                          <input id="intFeedbackStatus-1" class="magic-radio feedback-status" value="1" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-1">Call Connected</label>
                        </div>
                        <div class="radio">
                          <input id="intFeedbackStatus-10" class="magic-radio feedback-status" value="10" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-10">Call Not Connected</label>
                        </div>
                      </div>
                        <div id="divCancelFeedback" style="display: none;">
                        <h6 class="form-group">Select Reason</h6>
                        <div class="radio">
                          <input id="intFeedbackStatus-2" class="magic-radio feedback-cancel-reson" value="2" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-2">Not Reachable</label>
                        </div>
                        <div class="radio">
                          <input id="intFeedbackStatus-3" class="magic-radio feedback-cancel-reson" value="3" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-3">Invalid No.</label>
                        </div>
                        <div class="radio">
                          <input id="intFeedbackStatus-4" value="4" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-4">Did not Pick</label>
                        </div>
                        <div class="radio">
                          <input id="intFeedbackStatus-5" value="5" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-5">Did not want to talk / DND</label>
                        </div>
                        <!-- <div class="radio">
                          <input id="intFeedbackStatus-6" value="6" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-6">DND</label>
                        </div> -->
                        <div class="radio">
                          <input id="intFeedbackStatus-7" value="7" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-7">Call Later</label>
                        </div>
                        <div class="radio">
                          <input id="intFeedbackStatus-8" value="8" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-8">No Incoming Call Facility</label>
                        </div>
                        <div class="radio">
                          <input id="intFeedbackStatus-9" value="9" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-9">Switched off</label>
                        </div>

                        <div class="radio">
                          <input id="intFeedbackStatus-11" value="11" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-11">Not Visited</label>
                        </div>
                        <div class="radio">
                          <input id="intFeedbackStatus-12" value="12" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-12">Govt. Employee</label>
                        </div>

                        <div class="col-lg-6" style="margin-top: 14px;">
                          <button type="button" class="btn btn-info" onclick="return showHideFeedbackCollect(0);" style="width: 100%;">Back</button>
                          <!-- <label for="intFeedbackStatus-10">Cancel Feedback</label> -->
                        </div>
                      </div>
                         <!-- <textarea class="form-control"></textarea> -->
                       </div>
                    </div>
                  </div>
                <?php } else{ ?>
                  <div id="authId">
                    <p class="text-right">Language <a class="lang" id="eng" onclick="changeQuestionLang('eng')">E</a><a class="lang" id="odia"  onclick="changeQuestionLang('odia')">ଓ</a></p>
                    <div class="question-tabs" id="divFeedbackStartAll">
                      <div class="form-group">
                        <div id="divFeedbackStart">
                        <div class="col-lg-6">
                          <input id="callConnectedId" class="btn btn-success feedback-status" value="Call Completed" type="button" onclick="FeedbackSubmit();" name="intFeedbackStatus" style="width: 100%">
                          <!-- <label for="intFeedbackStatus-1">Start Feedback Recording</label> -->
                        </div>
                        <div class="col-lg-6">
                          <input id="callNotConnected" class="btn btn-warning feedback-status" value="Call Not Connected" type="button" onclick="showHideFeedbackCollect(10)" name="intFeedbackStatus" style="width: 100%">
                          <!-- <label for="intFeedbackStatus-10">Cancel Feedback</label> -->
                        </div>
                      </div>
                        <div id="divCancelFeedback" style="display: none;">
                        <h6 class="form-group">Select Reason</h6>
                        <div class="radio">
                          <input id="intFeedbackStatus-2" class="magic-radio feedback-cancel-reson" value="2" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-2">Not Reachable</label>
                        </div>
                        <div class="radio">
                          <input id="intFeedbackStatus-3" class="magic-radio feedback-cancel-reson" value="3" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-3">Invalid No. / Wrong No.</label>
                        </div>
                        <div class="radio">
                          <input id="intFeedbackStatus-4" value="4" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-4">Did not Pick</label>
                        </div>
                        <div class="radio">
                          <input id="intFeedbackStatus-5" value="5" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-5">Did not want to talk / DND</label>
                        </div>
                        <!-- <div class="radio">
                          <input id="intFeedbackStatus-6" value="6" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-6">DND</label>
                        </div> -->
                        <div class="radio">
                          <input id="intFeedbackStatus-7" value="7" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-7">Call Later</label>
                        </div>
                        <div class="radio">
                          <input id="intFeedbackStatus-8" value="8" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-8">No Incoming Call Facility</label>
                        </div>
                        <div class="radio">
                          <input id="intFeedbackStatus-9" value="9" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-9">Switched off</label>
                        </div>

                        <div class="radio">
                          <input id="intFeedbackStatus-11" value="11" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-11">Not Visited</label>
                        </div>
                        <div class="radio">
                          <input id="intFeedbackStatus-12" value="12" class="magic-radio feedback-cancel-reson" type="radio" onclick="showHideFeedbackCollect(this.value)" name="intFeedbackStatus">
                          <label for="intFeedbackStatus-12">Govt. Employee</label>
                        </div>
                       <div class="col-lg-6" style="margin-top: 14px;">
                          <button type="button" class="btn btn-primary" onclick="return valildateSubmitFeedback()" style="width: 100%;">Submit</button>
                          <!-- <label for="intFeedbackStatus-10">Cancel Feedback</label> -->
                        </div>
                        <div class="col-lg-6" style="margin-top: 14px;">
                          <button type="button" class="btn btn-info" onclick="return showHideFeedbackCollect(0);" style="width: 100%;">Back</button>
                          <!-- <label for="intFeedbackStatus-10">Cancel Feedback</label> -->
                        </div>
                      </div>
                         <!-- <textarea class="form-control"></textarea> -->
                       </div>
                    </div>
                  </div>
                <?php } ?>
                    <div id="divFeedbackCollect" style="display: none;">
                    <div class="tab-content">
                      <?php
                      if(count($arrSurveyQuestId) > 0){
                        for($i = 0; $i < count($arrSurveyQuestId); $i++){
                          $active   = ($i == 0)?'active':'';
                      ?>
                      <div id="question_<?= $i ?>" class="tab-pane  in <?= $active ?>">
                        <div class="feedback-categories">
                          <h6><span class="english"><?php echo $arrQuestionEnglish[$i] ?></span><span class="odiya"><?php echo $arrQuestionOdia[$i]; ?></span></h6>
                          <input type="hidden" name="question[]" value="<?= $arrSurveyQuestId[$i] ?>">
                          <div class="form-group">
                            <!-- Radio Buttons -->
                            <?php 
                            if(count($arrSurveyOptionId[$i]) > 0){
                              for($j = 0; $j < count($arrSurveyOptionId[$i]); $j++){
                                if($arrOptionSelection[$i] == 1){
                                ?>
                                <div class="radio">
                                  <input id="option-redio-<?= $arrSurveyOptionId[$i][$j] ?>" value="<?= $arrSurveyOptionId[$i][$j] ?>" class="magic-radio option-redio" type="radio" name="<?= $arrSurveyQuestId[$i] ?>[]">
                                  <label for="option-redio-<?= $arrSurveyOptionId[$i][$j] ?>"><span class="english"><?= $arrOptionEnglish[$i][$j] ?></span><span class="odiya"><?= $arrOptionOdia[$i][$j] ?></span></label>
                                </div>
                                <?php  
                                }else if($arrOptionSelection[$i] == 2){
                                ?>
                                <div class="checkbox">
                                  <input id="option-redio-<?= $arrSurveyOptionId[$i][$j] ?>" value="<?= $arrSurveyOptionId[$i][$j] ?>" class="magic-checkbox option-checkbox" type="checkbox" name="<?= $arrSurveyQuestId[$i] ?>[]">
                                  <label for="option-redio-<?= $arrSurveyOptionId[$i][$j] ?>"><span class="english"><?= $arrOptionEnglish[$i][$j] ?></span><span class="odiya"><?= $arrOptionOdia[$i][$j] ?></span></label>
                               </div>
                            <?php 
                                }else{
                                ?>
                                <div class="checkbox">
                                  <input id="option-redio-<?= $arrSurveyOptionId[$i][$j] ?>" value="<?= $arrSurveyOptionId[$i][$j] ?>" class="magic-checkbox option-checkbox" checked  type="checkbox" name="<?= $arrSurveyQuestId[$i] ?>[]">
                                  <input type="hidden" name="<?= $arrSurveyQuestIds[$i] ?>[]" disabled value="<?= $arrSurveyOptionId[$i][$j] ?>">
                                  <label for="option-redio-<?= $arrSurveyOptionId[$i][$j] ?>"><span class="english"><?= $arrOptionEnglish[$i][$j] ?></span><span class="odiya"><?= $arrOptionOdia[$i][$j] ?></span></label>: <input type="tel" maxlength="15" name="text<?= $arrSurveyQuestId[$i] ?>[]" class="form-control" >
                               </div>
                            <?php 
                                }
                              }
                            }
                            if($arrRemarksStatus[$i] == 1){
                              $d_none = 'style="display:block;"';
                            }else{
                              $d_none = 'style="display:none;"';
                            }
                            ?>

                          </div>
                          <div class="form-group">
                              <input type="text" name="vchRemarks[]" <?php echo $d_none; ?> maxlength="80" placeholder="Remarks" class="form-control" id="vchRemarks_<?php echo $arrSurveyQuestId[$i] ?>">
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                      <div class="qs-skiper">
                        <a href="javascript:void(0)" class="prevtab ">Prev</a>
                        <a href="javascript:void(0)"  class="nexttab active">Next</a>
                      </div>
                      <?php } ?>
                    </div>
                    <?php
                    if(count($arrSurveyQuestId) > 0){
                    ?>
                    <div class="question-tabs">
                      <ul class="nav nav-tabs">
                        <?php 
                        for($i = 0; $i < count($arrSurveyQuestId); $i++){
                        $active   = ($i == 0)?'active':'';
                        ?>
                        <li class="<?= $active ?> <?= 'quest_'.$arrSurveyQuestId[$i] ?>"><a data-toggle="tab" href="#question_<?= $i ?>"><?= ($i+1) ?></a></li>
                        <?php } ?>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <?php } ?>
                    <div class="feedback-categories">
                      <div class="form-group row">
                         <div class="col-sm-12 ">
                          <label>Overall Rating </label>
                          <div class="radio">
                            <input id="intRating-1" class="magic-radio" value="1" type="radio" name="intOverallRating">
                            <label for="intRating-1">1 Star</label>&nbsp;&nbsp;
                            <input id="intRating-2" class="magic-radio" value="2" type="radio" name="intOverallRating">
                            <label for="intRating-2">2 Star</label>&nbsp;&nbsp;
                            <input id="intRating-3" class="magic-radio" value="3" type="radio" name="intOverallRating">
                            <label for="intRating-3">3 Star</label>&nbsp;&nbsp;
                            <input id="intRating-4" class="magic-radio" value="4" type="radio" name="intOverallRating">
                            <label for="intRating-4">4 Star</label>&nbsp;&nbsp;
                            <input id="intRating-5" class="magic-radio" value="5" type="radio" name="intOverallRating">
                            <label for="intRating-5">5 Star</label>
                          </div>
                          
                        </div>
                      </div>
                      <div class="form-group row">
                         <div class="col-sm-12 ">
                          <label  for="demo-text-input">Call Summary </label>
                          <textarea class="form-control" rows="3" name="vchAdditionalInfo" onkeypress="TextCounter(this.id,'lblInfo',200)" onkeyup="TextCounter(this.id,'lblInfo',200)" maxlength="200" id="vchAdditionalInfo"><?php echo $vchAdditionalInfo ?></textarea> 
                          <small class="help-block text-primary">Max length <span id="lblInfo">200</span> characters only</small>
                        </div>
                        <div class="col-lg-6" style="margin-top: 14px;">
                          <button type="button" class="btn btn-info" onclick="return showHideFeedbackCollect(0);" style="width: 100%;">Back</button>
                          <!-- <label for="intFeedbackStatus-10">Cancel Feedback</label> -->
                        </div>
                      </div>
                      <!-- <div class="form-group row">
                         <div class="col-sm-12 ">
                          <div class="cont">
                            <div class="stars">
                              <input class="star star-5" id="star-5-2" type="radio" name="star"/>
                              <label class="star star-5" for="star-5-2"></label>
                              <input class="star star-4" id="star-4-2" type="radio" name="star"/>
                              <label class="star star-4" for="star-4-2"></label>
                              <input class="star star-3" id="star-3-2" type="radio" name="star"/>
                              <label class="star star-3" for="star-3-2"></label>
                              <input class="star star-2" id="star-2-2" type="radio" name="star"/>
                              <label class="star star-2" for="star-2-2"></label>
                              <input class="star star-1" id="star-1-2" type="radio" name="star"/>
                              <label class="star star-1" for="star-1-2"></label>
                              <div class="rev-box">
                                <textarea class="review" col="30" name="review"></textarea>
                                <label class="review" for="review">Breif Review</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
                      <div class="form-group row" <?php echo $endCallShowHide; ?>>
                        <div class="col-sm-12">
                          <label>Callback Requested By</label>
                          <select disabled="" id="intCallBackRequest" class="form-control">
                            <option <?php echo ($intCallBackRequest == 0)?'selected':''; ?> value="0">--Select--</option>
                            <option <?php echo ($intCallBackRequest == 6)?'selected':''; ?> value="6">Chief Secretary</option>
                            <option <?php echo ($intCallBackRequest == 16)?'selected':''; ?> value="16">DG Police</option>
                            <option <?php echo ($intCallBackRequest == 8)?'selected':''; ?> value="8">HCM</option>
                            <option <?php echo ($intCallBackRequest == 17)?'selected':''; ?> value="17">IT Secretary</option>
                            <option <?php echo ($intCallBackRequest == 13)?'selected':''; ?> value="13">Operator</option>
                            <option <?php echo ($intCallBackRequest == 15)?'selected':''; ?> value="15">Supervisor</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row" <?php echo $endCallShowHide; ?>>
                        <div class="col-sm-12">
                          <label  for="demo-text-input">Authority Review Summary </label>
                          <textarea class="form-control" rows="3" id="vchQuery" onkeypress="TextCounter(this.id,'lblQuery',200)" onkeyup="TextCounter(this.id,'lblQuery',200)" maxlength="200" name="vchQuery"><?php echo $vchQuery ?></textarea> 
                          <small class="help-block text-primary">Max length <span id="lblQuery">200</span> characters only</small>

                        </div>
                      </div>
                      

                      <!-- <div class="form-group row">
                        <div class="col-sm-12">
                         <a href="javascript:void(0)" onclick="return valildateSubmitFeedback()" class="btn btn-primary mb-1">Submit</a>
                         <button class="btn btn-danger mb-1">Cancel</button>
                       </div>
                     </div> -->
                   </div>
                 </div>
                 </div>
                </div>




             </div>
             <!--===================================================-->
           </div>
         </div>




         
       </div>
     </div>

      <script src="<?php echo URL;?>js/jquery.cookie.js"></script>
      <script src="<?php echo URL;?>js/jquery.blockUI.js"></script>
     <script language="javascript">
      function showHideFeedbackCollect(values){
        if(values == 1){
          $("#fromAuthId").val(1);
          $('#divFeedbackStartAll').hide();
          $('#divFeedbackStart').hide();
          $('#divCancelFeedback').hide();
          $('#divFeedbackCollect').show();
        }else if(values == 10){
          $("#fromAuthId").val(2);
          $('#divFeedbackStart').hide();
          $('#divCancelFeedback').show();
          $('#divFeedbackCollect').hide();
        }else if(values == 0){
          $("#fromAuthId").val(1);
          $('#divFeedbackStartAll').show();
          $('#divFeedbackStart').show();
          $('#divCancelFeedback').hide();
          $('#divFeedbackCollect').hide();
        }
      }


      function UpdateRequestedStatus(intRequestStatus,intOutboundDataId){
        $.ajax({
            type: "POST",
            url: URL + '/proxy',
            dataType: "json",
            data: { method: 'UpdateRequestedStatus', intRequestStatus:intRequestStatus, intOutboundDataId, intOutboundDataId,csrf_token_id:csrf_token_val},
            success: function (data) {

            }
        });
      }

      function callStart(){
        var dt      = new Date();
        var time    = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
        var dates   = dt.getFullYear()+"-"+dt.getMonth()+"-"+dt.getDay();
        var curDate = dates+' '+time;
        $('#callStart').html('('+time+')');
        $('#callEnd').html('('+time+')');
        // alert(dates+' '+time);
        $('#divCallStart').hide();
        $('#divCallEnd').show();
        $.cookie('dtmCallStart',curDate,{'path' : '/'});
        if($('#intRequestedFrom').val() == 1){
          UpdateRequestedStatus(3,'<?php echo $intOutboundDataId; ?>');
        }
      }
      function callEnd(){
        var dt      = new Date();
        var time    = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
        var dates   = dt.getFullYear()+"-"+dt.getMonth()+"-"+dt.getDay();
        var curDate = dates+' '+time;
        $('#callEnd').html('('+time+')');
        $.cookie('dtmCallEnd',curDate,{'path' : '/'});
        if($('#intRequestedFrom').val() != 0 && $.cookie('dtmCallStart')){
          UpdateRequestedStatus(4,'<?php echo $intOutboundDataId; ?>');
        }

      }
      function valildateSubmitFeedback(){
        if(!$("input[name='intFeedbackStatus']:checked").val()){
          viewAlert('Please Select Call Status');
            return false;
        }
        if($("input[name='intFeedbackStatus']:checked").val() == 1){
          if(!$("input[name='intOverallRating']:checked").val()){
            viewAlert('Please Select Overall Rating');
              return false;
          } 
        }
        if($("input[name='intFeedbackStatus']:checked").val() == 10){
          if(!$(".feedback-cancel-reson:checked").val()){
            viewAlert('Please Select Feedback Cancel Reason');
              return false;
          } 
        }
        // alert()
        // return false;
        if($('#intRequestedFrom').val() != 0){
          UpdateRequestedStatus(4,'<?php echo $intOutboundDataId; ?>');
        }
        // if($("input[name='intFeedbackStatus']:checked").val() == 1){
        //   if(($("input[type='checkbox']:checked").length)<=0 && !$(".option-redio:checked").val()){
        //     viewAlert('Please collect feedback answer at least one question');
        //     return false;
        //   }
        // }
        if(!checkSpecialChar('vchAdditionalInfo'))
          return false;
        if(!checkSpecialChar('vchQuery'))
          return false;

        FeedbackSubmit();


      }
      function changeQuestionLang(vchLang){
        if(vchLang == 'eng'){
          $('.lang').removeClass('active');
          $('#eng').addClass('active');
          $('.odiya').hide();
          $('.english').show();
          $.cookie("lang", "eng", { path: '/', expires: 1 });
        }else{
          $('.lang').removeClass('active');
          $('#odia').addClass('active');
          $('.odiya').show();
          $('.english').hide();
          $.cookie("lang", "odia", { path: '/', expires: 1 });
        }
      }
      $(document).ready(function () {
        $.cookie('dtmCallStart','',{'path' : '/'});
        $.cookie('dtmCallEnd','',{'path' : '/'});
        changeQuestionLang($.cookie("lang")?$.cookie("lang"):'eng');
        loadNavigation('Dashboard');
        indicate = 'yes';
      });

    </script>
    <script type="text/javascript">
      $("body").on("keyup", "#InpSearch", function() {
          $('.search-list').css("display", "block");
          var value = $(this).val().toLowerCase();
          $(".search-list li a").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });

        $('body').on("click", ".search-list li a",function(){
         var sdata=$(this).text();
         $('.search-list').css("display", "none");
         $('#InpSearch').val(sdata);
         var svalue = $('#InpSearch').val().toLowerCase();
         $(".faq-list li").filter(function() {
           $(this).toggle($(this).text().toLowerCase().indexOf(svalue) > -1)
         });

       })
      $(document).ready(function(){
        showHideFeedbackCollect(0);
        getCallInformation('<?php echo $intMobile; ?>');
        getServicesDetails('<?php echo $intMobile; ?>');
        getFAQ('<?php echo $intDepartmentId; ?>', '<?php echo $intServiceId ?>')

      });


// function responseMessage(msg) {

//   $('.success-box div.text-message').html("<span>" + msg + "</span>");
// }



</script>
<script type="text/javascript">
  function bootstrapTabControl(){
    var i, items = $('.nav-tabs li'), pane = $('.tab-pane');
            // next
            $('.nexttab').on('click', function(){

              for(i = 0; i < items.length; i++){
                if($(items[i]).hasClass('active') == true){
                  break;
                }
              }
              if(i < items.length - 1){
                    // for tab

                    $(items[i]).removeClass('active');
                    $(items[i+1]).addClass('active');

                    $(items[i+1-1]).addClass('done');
                    // for pane
                    $(pane[i]).removeClass('show active');
                    $(pane[i+1]).addClass('show active');




                  }
                  if(i == items.length-2){
                    $(this).removeClass('active');
                    $('.prevtab').addClass('active');
                    $(items[i]).addClass('done');
                  }
                  else{
                    $(this).addClass('active');
                    $('.prevtab').addClass('active');
                  }


                });
            // Prev
            $('.prevtab').on('click', function(){

              for(i = 0; i < items.length; i++){
                if($(items[i]).hasClass('active') == true){
                  break;
                }
              }
              if(i != 0){
                    // for tab
                    $(items[i]).removeClass('active');
                    $(items[i-1]).addClass('active');
                    // for pane
                    $(pane[i]).removeClass('show active');
                    $(pane[i-1]).addClass('show active');
                  }

                  if(i == 1){
                   $('.nexttab').addClass('active');
                   $(this).removeClass('active');
                 }
               });

            $('.nav-tabs li a').on("click",function(){
              $('.tab-content .tab-pane').removeClass('show');
            })

          }
          bootstrapTabControl();
        </script>
      </script>

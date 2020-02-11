<?php 
/* =================================================
  File Name             : dashboard.php
  Description     : This is used for  display new dashboard.
  Developed By            : Ashis kumar Patra
  Developed On            : 01-Jan-2017
  Update History          : <Updated by>    <Updated On>    <Remarks>

  Style sheet             :
  Javscript Files         :
  includes      :

  ================================================== */
?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
<!-- <script src="https://code.highcharts.com/modules/solid-gauge.js"></script> -->
<script src="<?php echo URL;?>js/agentDashboard.js" type="text/javascript"></script>
<link href="<?php echo URL;?>styles/dashboard.css" rel="stylesheet">
<div class="mainpanel">
  <div class="section">
    <div class="agent-dashboard">
      <div class="row">
        <div class="col-md-6 col-lg-6">
          <div class="agent-portlet">
            <div class="agent-portlet-header">CALL BACK REQUEST
              <div class="indicatorslist">
                <a title="" href="javascript:void(0)" id="refreshIcon" data-toggle="tooltip" data-placement="top" onclick="getHcmInformation('portletCallBackRequest');" data-original-title="Refresh"><i class="icon-reuse"></i></a>
             </div>
            </div>
            
            <div class="agent-portlet-body" id="portletCallBackRequest">
             
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6">
          <div class="agent-portlet">
            <div class="agent-portlet-header">ATTENDED CALLS (<span id="totalCalls">0</span>)
              <div class="filter">
          <div class="row">
            <label class="col-sm-1 text-right">From</label>
            <div class="col-sm-4">
              <div class="input-group ">
                                <!-- <input type="text" class="form-control" > -->
                  <input type="text"   name="vchFromDate" id="vchFromDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo date('d-M-Y');?>" >
                  <span class="input-group-addon"><i class="icon-calendar1"></i></span>
              </div>
            </div>
            <label class="col-sm-1 text-right">To</label>
            <div class="col-sm-4">
              <div class="input-group">
                  <!-- <input type="text" class="form-control" > -->
                  <input type="text"   name="vchToDate" id="vchToDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo date('d-M-Y');?>">
                  <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                  </div>

            </div>
            <div class="col-sm-2">
                <button class="btn btn-primary btn-sm" type="button" onclick="getAttenedCallsInformation('portletAttendedCalls');"><i class="icon-filter1"></i></button>
            
                 <div class="indicatorslist">
                <a title="" href="javascript:void(0)" id="refreshIcon" data-toggle="tooltip" data-placement="top" onclick=" getAttenedCallsInformation('portletAttendedCalls')" data-original-title="Refresh"><i class="icon-reuse"></i></a>
                           </div>
            </div>
          </div>

        </div>
              <!-- <div class="indicatorslist"> -->
                <!-- <a title="" href="javascript:void(0)" id="refreshIcon" data-toggle="tooltip" data-placement="top" onclick=" getAttenedCallsInformation('portletAttendedCalls')" data-original-title="Refresh"><i class="icon-reuse"></i></a> -->
             <!-- </div> -->
            </div>
            
            <div class="agent-portlet-body" id="portletAttendedCalls">
            <h4 class="empty-content">No Request</h4>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-6 col-lg-4">
          <div class="agent-portlet">
            <div class="agent-portlet-header">CHIEF SECRETARY</div>
            <div class="agent-portlet-body" id="portletCs">
            </div>
          </div>
        </div> -->
       
          
      </div>

     <!--  <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="agent-portlet">
            <div class="agent-portlet-header">DG POLICE</div>
            <div class="agent-portlet-body" id="portletDg">
             
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="agent-portlet">
            <div class="agent-portlet-header">SECRETARY HEALTH</div>
            <div class="agent-portlet-body" >
            <h4 class="empty-content">No Request</h4>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="agent-portlet">
            <div class="agent-portlet-header">SECRETARY HOME</div>
            <div class="agent-portlet-body" id="">
            <h4 class="empty-content">No Request</h4>
            </div>
          </div>
        </div>
        
      </div> -->

     <?php /* <div class="row">
        <div class="col-md-12">
          <div class="agent-chart-portlet">

            <div class="agent-chart-header">
     <div class="filter">
         
            <label class="col-sm-1 text-right">From</label>
            <div class="col-sm-4">
              <div class="input-group ">
                                <!-- <input type="text" class="form-control" > -->

                                <input type="text"   name="vchFromDate" id="vchFromDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo date('d-M-Y',strtotime('now -7 days'));?>" >
                                <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                </div>
                              </div>
                                <label class="col-sm-1 text-right">To</label>
            <div class="col-sm-4">
              <div class="input-group">
                                <!-- <input type="text" class="form-control" > -->
                                 <input type="text"   name="vchToDate" id="vchToDate" class="form-control "   autocomplete="off" readonly="readonly" value="<?php echo date('d-M-Y');?>">

                                <span class="input-group-addon"><i class="icon-calendar1"></i></span>
                                </div>

                              </div>
                              <div class="col-sm-1">
                                     <button class="btn btn-primary btn-sm" type="button" onclick="getDataInboundOutbound()"><i class="icon-filter1"></i></button>
                              </div>
                               <div class="col-sm-1">
                                 <!-- <div class="indicatorslist"> -->
                                  <a title="" href="javascript:void(0)" id="refreshIcon" data-toggle="tooltip" data-placement="top" onclick="getDataInboundOutbound();" data-original-title="Refresh"><i class="icon-reuse"></i></a>
                                           <!-- </div> -->
                               </div>
         <div class="clearfix">  </div>
        </div>
            Call Summary</div>
            <div class="agent-chart-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="chart-container">
                    <div class="chart-left">
                      <h2>Inbound</h2>
                      <h4>

<span id='totalInboundCalls'>0</span>
Total Calls
</h4>
                    </div>
                    <div class="chart-right" id="inboundcalls"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="chart-container">
                    <div class="chart-left">
                      <h2>outbound</h2>
                      <h4>

<span class="text-blue" id='totDept'>0</span>
From Authority
</h4>
                      <h4>

<span class="text-blue" id='totCallCenter'>0</span>
From Contact Center
</h4>
                    </div>
                    <div class="chart-right" id="outboundcalls"></div>
                  </div>
                </div>
              </div>*/ ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo URL;?>scripts/custom.js"></script>

<script language="javascript">
  $(document).ready(function () {
    var interval = 3000;
     getHcmInformation('portletCallBackRequest');
     getAttenedCallsInformation('portletAttendedCalls');
     // getDgInformation('portletDg');
     // getCsInformation('portletCs');
     // getItscInformation('portletItsc');
     // setInterval(" getHcmInformation('portletCallBackRequest')",interval);
     //  setInterval("getAttenedCallsInformation('portletAttendedCalls')",interval);
     // setInterval("getCsInformation('portletCs')",interval);
     // setInterval("getItscInformation('portletItsc')",interval);
     getDataInboundOutbound();
      loadNavigation('Dashboard');
      indicate = 'yes';
       $('#vchFromDate').datepicker({
      format: "dd-M-yyyy",
          todayBtn: "linked",
          autoclose: true,
          todayHighlight: true,
          endDate: '+0d',
      }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#vchToDate').datepicker('setStartDate', minDate);
      });
      $('#vchToDate').datepicker({
      format: "dd-M-yyyy",
          todayBtn: "linked",
          autoclose: true,
          todayHighlight: true,
          endDate: '+0d',
      }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#vchFromDate').datepicker('setEndDate', minDate);
      });
  });
  function getDataInboundOutbound(){
    var vchFromDate   = $('#vchFromDate').val();
    var vchToDate     = $('#vchToDate').val();
    // alert(vchFromDate);
    //getOutboundSummary(vchFromDate,vchToDate);
    //getInboundSummary(vchFromDate,vchToDate);
  }
</script>

<script>
if(typeof(EventSource) !== "undefined") {
  var URL ="<?php echo URL;?>";
  var source = new EventSource(URL+"proxy/notification");
  source.onmessage = function(event) {
    console.log(event);
    // document.getElementById("result").innerHTML += event.data + "<br>";
    notifyMe(event.data);
  };
} else {
  document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
}
</script>
<script>
function notifyMe(message) {
  var URL ="<?php echo URL;?>";
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }

  // Let's check if the user is okay to get some notification
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
  var options = {
        body: message,
        icon: URL+"images/logo.gif",
        dir : "ltr"
    };
  var notification = new Notification("Alert",options);
  makeNotification(notification);
  }

  // Otherwise, we need to ask the user for permission
  // Note, Chrome does not implement the permission static property
  // So we have to check for NOT 'denied' instead of 'default'
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      // Whatever the user answers, we make sure we store the information
      if (!('permission' in Notification)) {
        Notification.permission = permission;
      }

      // If the user is okay, let's create a notification
      if (permission === "granted") {
        var options = {
              body: message,
              icon: URL+"images/logo.gif",
              dir : "ltr"
          };
        var notification = new Notification("Alert",options);
        makeNotification(notification);
      }
    });
  }

  // At last, if the user already denied any notification, and you
  // want to be respectful there is no need to bother them any more.
}

function makeNotification(notification) {
    var URL ="<?php echo URL;?>";
    notification.onclick = function () {
      getHcmInformation('portletCallBackRequest');
      window.open(URL+"agentdashboard");
       notification.close();
    };
}

</script>
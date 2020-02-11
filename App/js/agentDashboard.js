/*
    Function for get HCM out bound data
    By: Jaideep Kumar
    On: 26-Sept-2019
*/
function getHcmInformation(controlId) {
    $('#'+controlId).html('<div class="text-center txt-center-center"><img style="width: 6%;" src="'+URL+'/img/loader-white1.gif" ></div>');
    $.ajax({
        type: "POST", 
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getHcmInformation',csrf_token_id:csrf_token_val},
        success: function (data) {
          $('#'+controlId).html(data.result);  
            $(".agent-portlet-body").mCustomScrollbar({
              theme:"inset-2-dark"
            });
        }
    });

}/*
    Function for get HCM out bound data
    By: Jaideep Kumar
    On: 26-Sept-2019
*/
function getAttenedCallsInformation(controlId) {
    var vchFromDate = $("#vchFromDate").val();
    var vchToDate = $("#vchToDate").val();
    $('#'+controlId).html('<div class="text-center txt-center-center"><img style="width: 6%;" src="'+URL+'/img/loader-white1.gif" ></div>');
    $.ajax({
        type: "POST", 
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getAttenedCallsInformation',vchFromDate:vchFromDate,vchToDate:vchToDate,csrf_token_id:csrf_token_val},
        success: function (data) {
          $('#'+controlId).html(data.result);  
          $('#totalCalls').html(data.totalCalls);  
            $(".agent-portlet-body").mCustomScrollbar({
              theme:"inset-2-dark"
            });

        }
    });

}
/*
    Function for get DG out bound data
    By: Jaideep Kumar
    On: 26-Sept-2019
*/
function getDgInformation(controlId) {
    $('#'+controlId).html('<div class="text-center txt-center-center"><img style="width: 6%;" src="'+URL+'/img/loader-white1.gif" ></div>');
    $.ajax({
        type: "POST", 
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getDgInformation',csrf_token_id:csrf_token_val},
        success: function (data) {
          $('#'+controlId).html(data.result);  
           (function($){
            $(".agent-portlet-body").mCustomScrollbar({
              theme:"inset-2-dark"
            });

          })(jQuery);  
        }
    });

}
/*
    Function for get CS out bound data
    By: Jaideep Kumar
    On: 26-Sept-2019
*/
function getCsInformation(controlId) {
    $('#'+controlId).html('<div class="text-center txt-center-center"><img style="width: 6%;" src="'+URL+'/img/loader-white1.gif" ></div>');
    $.ajax({
        type: "POST", 
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getCsInformation',csrf_token_id:csrf_token_val},
        success: function (data) {
          $('#'+controlId).html(data.result);  
           (function($){
            $(".agent-portlet-body").mCustomScrollbar({
              theme:"inset-2-dark"
            });

          })(jQuery);  
        }
    });

}
/*
    Function for get IT SC out bound data
    By: Jaideep Kumar
    On: 26-Sept-2019
*/
function getItscInformation(controlId) {
    $('#'+controlId).html('<div class="text-center txt-center-center"><img style="width: 6%;" src="'+URL+'/img/loader-white1.gif" ></div>');
    $.ajax({
        type: "POST", 
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getItscInformation',csrf_token_id:csrf_token_val},
        success: function (data) {
          $('#'+controlId).html(data.result);  
           (function($){
            $(".agent-portlet-body").mCustomScrollbar({
              theme:"inset-2-dark"
            });

          })(jQuery);  
        }
    });

}

/* ================================================
 File Name            : loadAjax.js
 Description          : This page is used to load AJAX JSON request.
 Author Name          : Niranjan Kumar Pandit  
 Date Created         : 19-Sep-2019
 Update History       :
 <Updated by>           <Updated On>        <Remarks>   
 
  
 ==================================================*/
var TW_MENTION = 1;
var FB_POST = 1;
var FB_COMMENT = 1;
var FB_ANALYTICS = 1;

function UrlExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
}
/*
    Function for Single signon for ATA Users
    By: Manali Ranjan
    On: 22-Jan-2018
*/
function UserLogins(UserId) {

    $.ajax({
        type: "POST", 
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'UserLogins', UserId: UserId,csrf_token_id:csrf_token_val },
        success: function (data) {
            var res = data.result;
            if (res != '') {
                var AccountType = res[0].AccountType;
                if (AccountType == 'switch') {
                    location.reload();
                } else {
                    viewAlert('Error Ocuured In Switching Account.');
                }

            } else {

                viewAlert('Error Ocuured In Switching Account.');
            }
        }
    });

}


function setSessionOutTime() {

    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'setSessionOuttime',csrf_token_id:csrf_token_val },
        success: function (data) {
            // console.log(data.expireTime);
        }
    });

}

function setSessionValues(Gl, Pl, GlName, PlName, page) {
    //var URL			= "http://"+host+"/"+FN1+"/Portal";
    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: "setSessionValues", Gl: Gl, Pl: Pl,csrf_token_id:csrf_token_val },
        success: function (data) {

            setCookie("GLink", Gl, 2);
            setCookie("PLink", Pl, 2);
            setCookie("GlName", GlName, 2);
            setCookie("PlName", PlName, 2);
            if (PlName == 'Social Wall') {
                window.open(page, '_blank');
            } else {
                window.location.href = page;

            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }

    });
}
// Function for get department list
function getDepartmentList(controlId, selVal) {

    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getDepartmentList', selVal:selVal,csrf_token_id:csrf_token_val},
        success: function (data) {
            var res = data.department;    
           $("#"+controlId).html(res);
        }
    });

}
function getFilterDepartmentList(controlId, selVal) {

    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getFilterDepartmentList', selVal:selVal,csrf_token_id:csrf_token_val},
        success: function (data) {
            var res = data.department;    
           $("#"+controlId).html(res);
        }
    });

}
// Function for get service list department wise :: Chinmayee :: 23-09-2019
function getDeptWiseService(controlId,deptId,selVal) {

    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getDeptWiseService', selVal:selVal,deptId:deptId,csrf_token_id:csrf_token_val},
        success: function (data) {
            var opt=data.opt;
            // console.log(opt);
             $('#'+controlId).html(opt);
        }
    });

}
// Function for get service list department wise :: Chinmayee :: 23-09-2019
function getServiceWiseScheme(controlId,serviceId,selVal) {

    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getServiceWiseScheme', selVal:selVal,serviceId:serviceId,csrf_token_id:csrf_token_val},
        success: function (data) {
            var opt=data.opt;
            // console.log(opt);
             $('#'+controlId).html(opt);
        }
    });

}
// Function for get service list  wise :: Jaideep Kumar :: 25-09-2019
function getAllService(controlId,selVal) {

    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getAllService', selVal:selVal,csrf_token_id:csrf_token_val},
        success: function (data) {
            var opt=data.opt;
            // console.log(opt);
             $('#'+controlId).html(opt);
        }
    });
}

/*Function for get servies According to dept Data By:: Puja Kumari On:: 23-09-2019*/
      function getService(deptId,serviceId,ctrlId)
      {
      
            $.ajax({
                type  : "POST",
                dataType:"json",
                url: URL + '/proxy',
                data  : {method: 'getService',deptId: deptId, serviceId: serviceId,csrf_token_id:csrf_token_val},
                success : function(data)
                {   
                    if(data.status == 200){
                        var res = data.result;
                        //console.log(res[0])
                        var htmlDiv = '';
                        if(res.length > 0){
                            $.each( res, function( key, value ) {
                              //console.log( res[key].id);
                                
                                var cnTer = parseInt(key+1);
                                //console.log(cnTer)
                                var serviceId = res[key].id;
                                var serviceName = res[key].serviceName;
                                htmlDiv +='<div class="form-group row addMoreServiceDiv">';
                                htmlDiv +='<label class="col-12 col-md-2 col-xl-2 control-label" for="demo-text-input">Services Name <span class="serviceCount">'+cnTer+'</span> <span class="text-danger">*</span></label>';
                                htmlDiv +='<div class="col-12 col-md-5 col-xl-4">';
                                htmlDiv +='<span class="colon">:</span>';
                                htmlDiv +='<input type="text" id="vchServiceName_'+cnTer+'" value="'+serviceName+'" name="vchServiceName[]" class="form-control vchServiceName" placeholder="Enter Services Name"><input type="hidden" class="hdnservice" name="hdnserviceId[]" value="'+serviceId+'"/>';
                                htmlDiv +='</div>';
                                htmlDiv +='<div class="col-sm-2">';
                                htmlDiv +='<a href="javascript:void(0);" class="btn btn-xs btn-info addMoreService" data-rel="tooltip" title="" data-original-title="Add More" > <i class="fa fa-plus"></i> </a> &nbsp;';
                                htmlDiv +='<a href="javascript:void(0);" class="btn btn-xs btn-danger removeService" data-rel="tooltip" title="" data-original-title="Remove" style="display:none;"> <i class="fa fa-times"></i> </a>';
                                htmlDiv +='</div>';
                                htmlDiv +='</div>';
                            }); 

                            $('#addMorecontain').html(htmlDiv);  
                            $('.removeService').show();
                            $(".addMoreService").show();
                            setTimeout(function(){
                                $(".addMoreService").last().show();
                                //$(".removeService").last().hide();    
                            },200);


                            setTimeout(function(){
                                $('.addMoreService').click(function(){ 
                                    if (!validateAddMore()){
                                       return false;
                                       }

                                    var row         = $('.addMoreServiceDiv').length;            
                                    var cloneRow    = $('.addMoreServiceDiv:last').clone(true);
                                    cloneRow.find('.vchServiceName').val('');
                                    cloneRow.find('.vchServiceName').attr("value",'');
                                    cloneRow.find('.hdnservice').val(0);
                                    
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
                            },600);
                        }
                        

                        //$('#'+ctrlId).html(res.serviceList);    
                    }else{
                        viewAlert('Sorry Something went wrong');
                    }
                    

                }
            });
        
      }

/*Function for get servies According to dept Data By:: Puja Kumari On:: 23-09-2019*/
      function getServices(deptId,serviceId,ctrlId)
      {
      //alert('sawq');
            $.ajax({
                type  : "POST",
                dataType:"json",
                url: URL + '/proxy',
                data  : {method: 'getServices',deptId: deptId, serviceId: serviceId,csrf_token_id:csrf_token_val},
                success : function(data)
                {  
                 var res = JSON.parse(data);
                    $('#'+ctrlId).html(res.service);
               }     
            });
        
      }

      // function to pull, revert, bookmark outbound data :: Chinmayee :: 24-09-2019

      

      function loadOutBoundData(action, ctrlId,pulledBy , revertIds, numberofrec,vchDepartmentId,intServiceId,intSchemeTypeId,district,gender,agegroup) {

        $('#divMentionOutboundData').html('<div class="center" style="height:100px; font-size:100px;margin-top:10%;"><i class="fa icon-loader1 fa-spin"></i></div>');
        setTimeout(function () {
            $.ajax({
                type: "POST",
                url: URL + '/proxy',
                dataType: "json",
                data: { method: 'getOutBoundData', action: action, revertIds: revertIds, pulledBy:pulledBy, numberofrec: numberofrec, vchDepartmentId: vchDepartmentId, intServiceId: intServiceId,intSchemeTypeId:intSchemeTypeId,district:district,gender:gender,agegroup:agegroup,csrf_token_id:csrf_token_val },
                success: function (data) {
                    var res = data.SocialDeskResult;
                    // console.log(res);
                    // var readCount = (data.readCount != null || typeof (data.readCount) != 'undefined') ? data.readCount : 0;
                    // var unreadCount = (data.unReadCount != null || typeof (data.unReadCount) != 'undefined') ? data.unReadCount : 0;
                    //var totresult = (res.length == null) ? 0 : res.length;
                    var listData = '';
    
                    if ($.isEmptyObject(res) != true) { 
                        $.each(res, function (i) {
                            listData += '<div class="col-12 col-md-6 " id="bookMarked'+res[i].intOutboundDataId+'">';
                            listData += '   <div class="feed-details-card readUnread " data-outdataid="'+res[i].intOutboundDataId+'">';
                            //listData += '   <a  class="bookmark" title="Bookmark" href="javascript:void(0)" onclick="setBookMark('+res[i].intOutboundDataId+')"><i class="icon-bookmark1"></i></a>';
                            listData += '   <h6>Name : '+ res[i].vchName +'</h6>';
                            listData += '   <p><i class="icon-phone1"></i>  <span>'+res[i].intMobile +'</span>  <i class="icon-calendar1"></i>  <span> '+res[i].dtmAssignedTime +' </span></p>';
                            listData += '    <p class="mb-3">Service : <span>'+res[i].vchServiceName +' </span></p>  <p class="mb-3">Department : <span>'+res[i].vchDeptName +' </span></p>';
                            listData += '    <a class="btn btn-primary btn-sm" href="'+URL+'/addfeedback/'+res[i].encOutboundDataId+'" >Feedback</a>';
                            listData += '</div>';
                            listData += '</div>';
                        });
                    }else {
                            listData += '<div class="noRecord">Right Now, No Information On Your Desk</div>';
                    }
    
                    //$('#counterText').html(readCount);
                    // $('#unreadCount').html(unreadCount);
                    setTimeout(function () {
                        $('[data-toggle="tooltip"]').tooltip();
                        $('[data-rel=tooltip]').tooltip();
                        $('#' + ctrlId).html(listData);
                        // $(".smile").on('click', function () {
                        //     var status = $(this).parent().find(".smilestatus").css('display');
                        //     $(document).not(this).find(".smilestatus").hide();
                        //     if (status == 'none') {
                        //         $(this).parent().find(".smilestatus").show();
                        //     } else {
                        //         $(this).parent().find(".smilestatus").hide();
                        //     }
                        // });
                    }, 1000);
    
                }
            });
    
        }, 30);
    
    }
/*Function to set bookmark by users BY::Chinmayee ON: 25-09-2019 */
    function setBookMark(intOutboundDataId){
        $.ajax({
            type  : "POST",
            dataType:"json",
            url: URL + '/proxy',
            data  : {method: 'setBookMark',intOutboundDataId: intOutboundDataId,csrf_token_id:csrf_token_val},
            success : function(data)
            {  
                var bookmarkStatus = data.bookmarkStatus;
                if(bookmarkStatus==1){
                    $('#bookMarked'+intOutboundDataId).remove();
                  }else{
                      viewAlert('Error Occured. Try Again !');
                  }               
                
           }     
        });
    }
/*Function to get Online users BY::Chinmayee ON: 25-09-2019 */

    function loadOlUsers(ctrlId) {
        $.ajax({
            type: "POST",
            url: URL + '/proxy',
            dataType: "json",
            data: { method: 'getOLUsers',csrf_token_id:csrf_token_val },
            success: function (data) {
                var res = data.OLUserResult;
                var totusers = (res.length == null) ? 0 : res.length;
                // if (res != null) {
                //     var listData = '';
                //     $.each(res, function (i) {
                //         listData += '<li>' + res[i].fullName + '</li>';
                //     });
    
                // }
                $('#' + ctrlId).html('<p>Online agents  <span class=" badge badge-success">'+totusers+'</span></p>');
               // $('#userlist').html(listData);
            }
        });
    
    }

    /*Function to get total called today BY::Chinmayee ON: 25-09-2019 */

    function loadTotalCall(ctrlId,totalCalledToday) {
        $('#' + ctrlId).html('<div class="center" style="height:100px; font-size:10px;margin-top:10%;"><i class="fa fa-spinner fa-spin"></i></div>');
        $.ajax({
            type: "POST",
            url: URL + '/proxy',
            dataType: "json",
            data: { method: 'loadTotalCall',csrf_token_id:csrf_token_val },
            success: function (data) {
                var recCnt = data.recCnt;
                if(recCnt>0){
                    $('#' + ctrlId).html('');
                    $('#' + ctrlId).text(recCnt);
                }else{
                    $('#' + ctrlId).html('');
                    $('#' + ctrlId).text(totalCalledToday);
                }
                
               
            }
        });
    
    }
/*===============================
     Function to fill District.
     By: Jaiderep Kumar
     On: 25-Sept-2019
     ==================================*/
     function getDistrictList(controlId,selVal,serviceDistrict)
     {     
         $.ajax({
            type: "POST",
            url: URL + '/proxy',
            dataType: "json",
            data: {method: 'getDistrictList',selVal:selVal,intDistrictId:serviceDistrict,csrf_token_id:csrf_token_val},
            success: function (data) {
                $('#'+controlId).html(data.district);    
            }
        });
     }

     /*
    Function to Receive Feedback Submit
    By: Niranjan Kumar Pandit
    On: 24-09-2019 
    */
    function FeedbackSubmit(){
        $.blockUI({ message: '<h4><img style="display: block;margin: 0 auto;" src="'+URL+'/img/loader-white1.gif" /> Just a moment...</h4>' });
        var frmTCP = document.getElementById("frmCMO");
        var fd = new FormData(frmTCP );
        fd.append('method','FeedbackSubmit');
        fd.append('dataType',$('#dataType').val());
        if($("#fromAuthId").val()=="1"){
            fd.append('intFeedbackStatus','1');
        }
        $.ajax({
            url: URL + '/proxy',
            dataType: "json",
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            success:function(data){
              $.unblockUI();
              if(data.result.flag != 0){
                viewAlert(data.result.outMsg);
              }else{
                if($('#intRequestedFrom').val() == 1){
                    viewAlert(data.result.outMsg,'',URL+'/agentdashboard');
                }else{
                    viewAlert(data.result.outMsg,'',URL+'/viewfeedback/'+data.result.userId);
                }
              }
            }
        })
    }

     /*
    Function to Feedback Submit for Authority Calling Time
    By: Niranjan Kumar Pandit
    On: 16-10-2019 
    */
    function FeedbackSubmitAuthority(recId){
        // $.blockUI({ message: '<h4><img style="display: block;margin: 0 auto;" src="'+URL+'/img/loader-white1.gif" /> Just a moment...</h4>' });
        var frmTCP = document.getElementById("frmCMO");
        var fd = new FormData(frmTCP );
        fd.append('method','FeedbackSubmitAuthority');
        $.ajax({
            url: URL + '/proxy',
            dataType: "json",
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            success:function(data){
                $.unblockUI();
                viewAlert(data.result);
                $('#UpdateFeedbackAnswer').modal('hide');
                if(recId > 0){
                    $('#feedbackUpdate'+recId).hide();
                    $('#feedbackReceive'+recId).show();
                }
            }
        })
    }

    /*
    Function to Add Survay Question 
    By: Niranjan Kumar
    On: 23-09-2019
    */
    function addSurveyQuestionnaireOption(){
        $.blockUI({ message: '<h4><img style="display: block;margin: 0 auto;" src="'+URL+'/img/loader-white1.gif" /> Just a moment...</h4>' });
        var intNoOfQuestion = $('.addMoreQuestClnDiv').length;
        var frmTCP = document.getElementById("frmCMO");
        var fd = new FormData(frmTCP );
        fd.append('method','addSurveyQuestionnaire');
        fd.append('intNoOfQuestion',intNoOfQuestion);
        $.ajax({
            url: URL + '/proxy',
            dataType: "json",
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            success:function(data){
              $.unblockUI();
              if(data.result.flag != 0){
                viewAlert(data.result.outMsg);
              }else{
                viewAlert(data.result.outMsg,'',window.location.href);
              }
            }
        })
    }



// Function to fill hierarchy for add## By Sunil Kumar Parida##on##26-09-2013
function fillWebSubnode(parentId, subNode, selVal, className, hdn, curLevel, mandatoryLevel)
{
    var path        = pathName.split("/");
    var FN1         = path[1];
    var FN2         = path[2];
    var FN3         = path[3];
    var siteURL     = 'http://'+hostName+'/'+FN1+'/';//+FN3+'/';
    var consoleProxyUrl = siteURL+"Console/class_file/proxy.php";
    $('#' + hdn).val(parentId);
    var prevId = Number(curLevel) - 1;
    if (parentId == 0 && $('#ddlHierarchy' + prevId).length > 0)
    {
        var prevParent = $('#ddlHierarchy' + prevId).val();
        $('#' + hdn).val(prevParent);
    }
    $('.' + className).each(function () {
        if ($(this).data('val') > curLevel)
            $(this).remove();
    });
    if (parentId == 0)
        return false;
    var jsonData = {method: "SubNode", parentId: parentId, subNodeId: subNode, SelVal: selVal,csrf_token_id:csrf_token_val};
    var dynamicRow = '';
    var rowIndex = $('.' + className).length;
    var rowId = Number(rowIndex) + 1;
    // alert(rowId);
    //var idIndex = $('#' + className).index($('#dynamicRow' + rowIndex));
    //alert(idIndex);
    $.ajaxSetup({async: false});
    $.post(consoleProxyUrl, jsonData).done(function (json) {
        var data = jQuery.parseJSON(json);
        var subnodeVal = data.nodeValue.valueFill;
        var subNodeLabel = data.nodeValue.subNodeLabel;
        var subNodeId = data.nodeValue.subNodeId;
        var flag = data.nodeValue.flag;
        var valueNum = data.nodeValue.valueNum;
        // alert(className);
        dynamicRow += '<div class="form-group row dynamic location" id="location' + rowId + '" data-val="' + rowId + '">';
        dynamicRow += '<label class="col-lg-3 col-md-4 control-label" for="demo-email-input">'+subNodeLabel+'<span class="text-danger">*</span></label>';
        dynamicRow += '<div class="col-lg-8 col-md-7"> <span class="colon">:</span>';
        dynamicRow += '<select class="form-control seldynamic" id="int'+subNodeLabel+'Id" name="int'+subNodeLabel+'Id" onChange="fillWebSubnode(this.value,0,0,&quot;' + className + '&quot;,&quot;' + hdn + '&quot;,&quot;' + rowId + '&quot;,&quot;' + mandatoryLevel + '&quot;);" >' + subnodeVal + '</select>';
        // dynamicRow += '<select class="form-control seldynamic" id="ddlHierarchy' + rowId + '" name="ddlHierarchy' + rowId + '" onChange="fillWebSubnode(this.value,0,0,&quot;' + className + '&quot;,&quot;' + hdn + '&quot;,&quot;' + rowId + '&quot;,&quot;' + mandatoryLevel + '&quot;);" >' + subnodeVal + '</select>';
        // dynamicRow += (rowId <= mandatoryLevel) ? '<span class="mandatory">*</span>' : '';
        dynamicRow += '</div>';
        dynamicRow += '</div>';
        if (parentId > 0)
            $('#' + hdn).val(parentId);

        if (valueNum > 0)
            $('.' + className).last().after(dynamicRow);
    });

}   

 /*Function to get total called today BY::Chinmayee ON: 25-09-2019 */

 function loadTotalRecordCollected(ctrlId,TotalRecordCollected) {
    $('#' + ctrlId).html('<div class="center" style="height:100px; font-size:10px;margin-top:10%;"><i class="fa fa-spinner fa-spin"></i></div>');

    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'loadTotalRecordCollected',csrf_token_id:csrf_token_val },
        success: function (data) {
            var recCnt = data.recCnt;
            if(recCnt>0){
                $('#' + ctrlId).html('');
                $('#' + ctrlId).text(recCnt);
            }else{
                $('#' + ctrlId).html('');
                $('#' + ctrlId).text(TotalRecordCollected);
            }
            
           
        }
    });
 }

       
/*
Function to Get Call Information
By: Niranjan Kumar
On: 24-09-2019
*/
function getCallInformation(vchMobile){
    $('#divCallInfo').html('<div class="text-center txt-center-center"><img style="width: 6%;" src="'+URL+'/img/loader-white1.gif" ></div>');
    var vchMobileNo   = (vchMobile)?vchMobile:'';
    $.ajax({
      type: "POST",
      url: URL + '/proxy',
      dataType: "json",
      data: {method: 'getCallInformation',vchMobile:vchMobileNo,csrf_token_id:csrf_token_val},
      success: function (data) {
          $('#divCallInfo').html(data.result); 
          $('[data-toggle="tooltip"]').tooltip();   
           (function($){
                $(" .feedback-portlet-body").mCustomScrollbar({ 
                  theme:"inset-2-dark"
                });

          })(jQuery);
      }
    });
}


/*
Function to Get Services Details
By: Niranjan Kumar
On: 24-09-2019
*/

function getServicesDetails(vchMobile){
    $('#divServiceDetails').html('<div class="text-center txt-center-center"><img style="width: 6%;" src="'+URL+'/img/loader-white1.gif" ></div>');
    var vchMobileNo   = (vchMobile)?vchMobile:'';
    $.ajax({
      type: "POST",
      url: URL + '/proxy',
      dataType: "json",
      data: {method: 'getServiceDetails',vchMobile:vchMobileNo,csrf_token_id:csrf_token_val},
      success: function (data) {
          $('#divServiceDetails').html(data.result);    
      }
    });
}


/*
Function to Get FAQ Details
By: Niranjan Kumar
On: 24-09-2019
*/

function getFAQ(intDepartmentId, intServiceId){
    $('#divFAQ').html('<div class="text-center txt-center-center"><img style="width: 6%;" src="'+URL+'/img/loader-white1.gif" ></div>');
    var intDepartmentId   = (intDepartmentId)?intDepartmentId:0;
    var intServiceId      = (intServiceId)?intServiceId:0;
    $.ajax({
      type: "POST",
      url: URL + '/proxy',
      dataType: "json",
      data: {method: 'getFAQDetails',intDepartmentId:intDepartmentId, intServiceId:intServiceId,csrf_token_id:csrf_token_val},
      success: function (data) {
          $('#divFAQ').html(data.result);    
      }
    });
}

function getInboundInformation(){
    if(!blankCheck('vchMobileNo','Mobile No. can not be left blank'))
      return false;
    if (!equalLength('vchMobileNo', 10, 'Mobile No.'))
       return false;
    // if(!validMobileNo('vchMobileNo','Please enter a valid Mobile No.')) 
    //     return false;
    var vchMobileNo = $("#vchMobileNo").val();
    $(".loader").show();
    // $('#divFAQ').html('<div class="text-center txt-center-center"><img style="width: 6%;" src="'+URL+'/img/loader-white1.gif" ></div>');
    $.ajax({
      type: "POST",
      url: URL + '/proxy',
      dataType: "json",
      data: {method: 'getInboundInformation',vchMobileNo:vchMobileNo,csrf_token_id:csrf_token_val},
      success: function (data) {
        if(data.flag==1){
            $("#vchName").val(data.result.vchName);
            $("#intAge").val(data.result.intAge);
            $("input[name='intGenderId'][value='"+data.result.intGender+"']").prop('checked', true);
            // $("#intDistrictId").val(data.result.intDistrictId);
            $("#vchAddress").val(data.result.vchAddress);
            $("#hdnPropId").val(data.result.intLocation);
            $("#intLocation").val(data.result.locationName);
            // fillWebSubnode(parentId, subNode, selVal, className, hdn, curLevel, mandatoryLevel)
            // fillWebSubnode(data.result.intDistrictId,0,data.result.intBlockId,'location','dynamic','1',1,'');
            // fillWebSubnode(data.result.intBlockId,0,data.result.intGPId,'location','dynamic','2',1,'');
            // fillWebSubnode(data.result.intGPId,0,data.result.intVillageId,'location','dynamic','3',1,'');
           
          // $('#divFAQ').html(data.result);    
        }else{
             // viewAlert(data.msg,'','');
            $("#vchName").val('');
            $("input[name='intGenderId'][value='1']").prop('checked', true);
            $("#intDistrictId").val(0).trigger('change');
            $("#vchAddress").val('');
            $("#intAge").val('');
        }
        $(".loader").hide();
      }

    }); 

   // alert('<div class="text-center txt-center-center"><img style="width: 6%;" src="'+URL+'/img/loader-white1.gif" ></div>');
    getCallInformation(vchMobileNo);     
}

/** Method For Get Offline Feedback Data From Mobile Number :: By: Niranjan Pandit :: On: 17-10-2019 **/
function getOfflineFeedbackData(){
    if(!blankCheck('vchMobileNo','Mobile No. can not be left blank'))
        return false;
    if (!equalLength('vchMobileNo', 10, 'Mobile No.'))
        return false;
    if(!validateNumber('vchMobileNo'))
        return false;
    var vchMobileNo = $("#vchMobileNo").val();
    $('#feedbackData').html('<div class="text-center  no-content" style="font-size: 100px; padding: 0.5em 0px;"><i class="fa icon-loader1 fa-spin"></i></div>');
    $.ajax({
      type: "POST",
      url: URL + '/proxy',
      dataType: "json",
      data: {method: 'getOfflineFeedbackData',vchMobileNo:vchMobileNo,csrf_token_id:csrf_token_val},
      success: function (data) {
        // console.log(data);
        $('#feedbackData').html(data.result);
      }

    }); 
}

function getMapDataDashboard(fromDate, toDate,type) {
    var deptFilter = $("#deptSel").val();
    var callType = $("#callType").val();
    var outBoundId = $("#outBoundId").val();
    var deptSel1 = $("#deptSel1").val();
    // alert(type);   
    $('#total-cal-blue').html('<i class="fa fa-refresh fa-spin"></i>');
     $("#mapContent").block({ message: '<h4><img style="display: block;margin: 0 auto;" src="'+URL+'/img/loader-white1.gif" /> Just a moment...</h4>' });
    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getMapDataDashboard',fromDate: fromDate, toDate: toDate , deptFilter: deptFilter, callType: callType, outBoundId:outBoundId,deptSel1:deptSel1,csrf_token_id:csrf_token_val },
        success: function (data) {
            
            // if(type==1){
            //     $('#grv-list').hide();
            //      $('#outbound-list').show();
                      
            // }if(type==2){
            //     $('#outbound-list').hide();
            //     $('#grv-list').show();
            // }

            var districtdetails = data.districtdetails;
            if(type==1){
                        $('#inboundFilter').hide();
                        $('#outboundFilter').show();
                        $('#total-cal-blue').html(formatNumber(data.totalOutbound));
            }else{
                        $('#inboundFilter').show();
                        $('#outboundFilter').hide();
                        $('#total-cal').html(formatNumber(data.totalInbound));

            }
            var avgOutbound = data.totalOutbound/3;
            var avgInbound  = data.totalInbound/3;//alert(avgInbound);
            //$('#totCallCenter').html( data.outboundSummary.totalContactCenter);
        //For District colour
            var outboundArray = [];
            var inboundArray  = [];
        for (var i = 0; i < districtdetails.length; i++) { 
            outboundArray.push(districtdetails[i].outbound);
            inboundArray.push(districtdetails[i].inbound);

        }
           var maxOutBound =Math.max.apply(Math,outboundArray);
           var maxInBound = Math.max.apply(Math,inboundArray);

           var minOutBound =Math.min.apply(Math,outboundArray);
           var minInBound = Math.min.apply(Math,inboundArray);

           var outBoundRange = (maxOutBound-minOutBound)/3;
           var inBoundRange  = (maxInBound-minInBound)/3;
           if(type==2){
                // $('#grv-list').show();
                // $('#outbound-list').hide();
                $('#srvcTransactionH').hide();
                $('#feedbackH').hide();
                $('#srvcTransaction').hide();
                $('#feedback').hide();
                $('#callsDetail').text('Calls Recieved');
                $('#total-cal-blue').text(formatNumber(data.totalInbound));
                      
            }else{
                $('#srvcTransactionH').show();
                $('#feedbackH').show();
                $('#srvcTransaction').show();
                $('#feedback').show();
                $('#callsDetail').text('Calls Made');
                $('#total-cal-blue').html(formatNumber(data.totalOutbound));
                    $('#srvcTransaction').text(data.totalSrvcTransaction);
                    $('#feedback').text(data.totalCalls);
            }

            for (var i = 0; i < districtdetails.length; i++) {
                $('#' + districtdetails[i].district_Id).data('districtid', districtdetails[i]);
                 queryString = districtdetails[i].queryString;
                 // var newLink = $("#link-"+districtdetails[i].district_Id).attr('href');
                 
                if(type==1){
                    if(parseInt(districtdetails[i].outbound)>0){
                        $("#link-"+districtdetails[i].district_Id).attr('href', URL+"/viewMapDetails/"+queryString);

                    }else{
                         $("#link-"+districtdetails[i].district_Id).attr('href','javascript:void(0);');
                         $("#link-"+districtdetails[i].district_Id).removeAttr('target');
                    }
                            $('#girevance-details  #' + districtdetails[i].district_Id).removeClass('fill--legend1'); 
                                    $('#girevance-details  #' + districtdetails[i].district_Id).removeClass('fill--legend2');
                                      $('#girevance-details  #' + districtdetails[i].district_Id).removeClass('fill--legend3');
                                      $('#girevance-details  #' + districtdetails[i].district_Id).removeClass('fill--legend'); 

                                  //if( (((districtdetails[i].outbound/data.totalOutbound)*100) > 0) && (((districtdetails[i].outbound/data.totalOutbound)*100) < 20))
                                  if( (districtdetails[i].outbound <= outBoundRange) && (districtdetails[i].outbound >0))
                                   {
                                 $('#girevance-details  #' + districtdetails[i].district_Id).addClass('fill--legend1');
                                   }
                                 else if( (districtdetails[i].outbound >= outBoundRange) && (districtdetails[i].outbound <= (outBoundRange*2)) && (districtdetails[i].outbound >0)){
                                  $('#girevance-details  #' + districtdetails[i].district_Id).addClass('fill--legend2');
                
                                 }
                                 else if( districtdetails[i].outbound >= (outBoundRange*2) && (districtdetails[i].outbound >0)){
                                  $('#girevance-details  #' + districtdetails[i].district_Id).addClass('fill--legend3');
                                 }
                                 
                }if(type==2){
                    if(parseInt(districtdetails[i].inbound)>0){
                        $("#link-"+districtdetails[i].district_Id).attr('href', URL+"/viewMapDetails/"+queryString);

                    }else{
                         $("#link-"+districtdetails[i].district_Id).attr('href','javascript:void(0);');
                         $("#link-"+districtdetails[i].district_Id).removeAttr('target');
                    }
                                 $('#girevance-details  #' + districtdetails[i].district_Id).removeClass('fill--legend1'); 
                                    $('#girevance-details  #' + districtdetails[i].district_Id).removeClass('fill--legend2');
                                      $('#girevance-details  #' + districtdetails[i].district_Id).removeClass('fill--legend3');

                                  if( (districtdetails[i].inbound <= inBoundRange) && (districtdetails[i].inbound > 0) )
                                   {
                                   //$('#girevance-details  #' + districtdetails[i].district_Id).removeClass('fill--legend1'); 
                                 $('#girevance-details  #' + districtdetails[i].district_Id).addClass('fill--legend1');
                                   }
                                 else if( (districtdetails[i].inbound >= inBoundRange) && (districtdetails[i].inbound <= (inBoundRange*2)) && (districtdetails[i].inbound > 0)){
                                  
                                  $('#girevance-details  #' + districtdetails[i].district_Id).addClass('fill--legend2');
                
                                 }
                                 else if( districtdetails[i].inbound >= (inBoundRange*2)  && (districtdetails[i].inbound > 0)){
                                  
                                  $('#girevance-details  #' + districtdetails[i].district_Id).addClass('fill--legend3');
                                 }
                                 // else{
                                 //  $('#girevance-details  #' + districtdetails[i].district_Id).addClass('fill--legend');
                                 // }
                }
            }


                 $("#mapContent").unblock();

                var windowWidth=$(window).width();
                if(windowWidth > 992){

                            // $('#girevance-details .dist-block').click(function (e) {
                            //     window.open( URL+"/viewMapDetails/"+queryString, '_blank');
                            //      // var districtid = $(this).attr('id');
                                
                            //      // var url = 'viewGreveance.html?did='+ districtid;
                            //      // window.open(url, '_self');

                            //  });
                }else{

                            $('#girevance-details .dist-block').dblclick(function (e) {
                                 // var districtid = $(this).attr('id');
                                
                                 // var url = 'viewGreveance.html?did='+ districtid;
                                 // window.open(url, '_self');

                             });
                }





                $(function () {

                  var windwidth = $(window).width();
                   
         $("#girevance-details .dist-block").on( "mouseenter", function() {
                           
                        for (var i = 0; i < districtdetails.length; i++) {

                              $('#' + districtdetails[i].district_Id).data('districtid', districtdetails[i]);

                               var distid = $(this).attr('id');

                              if(distid==districtdetails[i].district_Id){
                                $('#grv-list h5').text(districtdetails[i].district_name);
                                $('#total-cal').text(districtdetails[i].inbound);//Total Call
                                 if(type==1){
                                    var parDistVal = parseInt(districtdetails[i].outbound);
                                    var totalOutbound = parseInt(data.totalOutbound) ;
                                    var percentOutbound = parseFloat((parDistVal*100)/totalOutbound).toFixed(2);;
                                    if(parseInt(districtdetails[i].outbound)>0){
                                     $('#total-cal-blue').text(formatNumber(districtdetails[i].outbound)+" ("+percentOutbound+"%)");//Total Call

                                    }else{
                                        $('#total-cal-blue').text(formatNumber(districtdetails[i].outbound));//Total Call
                                    }
                                     $('#area-name-h5').text(districtdetails[i].district_name);
                                     $('#srvcTransaction').text(districtdetails[i].srvcTransaction);
                                     $('#feedback').text(districtdetails[i].FeedbackRecieved);
                                 }else{
                                    var parDistVal = parseInt(districtdetails[i].inbound);
                                    var totalInbound = parseInt(data.totalInbound) ;
                                    var percentInbound = parseFloat((parDistVal*100)/totalInbound).toFixed(2);
                                    if(parseInt(districtdetails[i].inbound)>0){
                                        $('#total-cal-blue').text(formatNumber(districtdetails[i].inbound)+" ("+percentInbound+"%)");

                                    }else{
                                        $('#total-cal-blue').text(formatNumber(districtdetails[i].inbound));
                                    }
                                     $('#area-name-h5').text(districtdetails[i].district_name);
                                 ///$('#srvcTransaction').text(districtdetails[i].srvcTransaction);
                                 }
                              

                               }
                          }

                if(type==2){
                // $('#grv-list').show();
                // $('#outbound-list').hide();
                $('#srvcTransactionH').hide();
                $('#feedbackH').hide();
                $('#srvcTransaction').hide();
                $('#feedback').hide();
                      
            }else{
                $('#srvcTransactionH').show();
                $('#feedbackH').show();
                $('#srvcTransaction').show();
                $('#feedback').show();
            }


                    })
                   .on( "mouseleave", function() {
                    $('#grv-list h5').text("Odisha");
                    $('#area-name-h5').text("Odisha");
                     if(type==2){
                    $('#total-cal-blue').text(formatNumber(data.totalInbound));
                     }else{

                    $('#total-cal-blue').html( formatNumber(data.totalOutbound));
                    $('#srvcTransaction').text(data.totalSrvcTransaction);
                    $('#feedback').text(data.totalCalls);
                     }

            //         if(type==1){
            //     $('#grv-list').hide();
                      
            // }else{
            //     $('#outbound-list').hide();
            // }
                  
                    });
                    //   $("#girevance-details .dist-block").on( "click", function() {
                           
                    //          for (var i = 0; i < districtdetails.length; i++) {

                    //           $('#' + districtdetails[i].district_Id).data('districtid', districtdetails[i]);

                    //            var distid = $(this).attr('id');
                    //            queryString = districtdetails[i].queryString;
                    //            console.log(districtdetails[i].queryString);

                    //           // if(distid==districtdetails[i].district_Id){
                    //           //   $('#grv-list h5').text(districtdetails[i].district_name);
                    //           //   $('#total-cal').text(districtdetails[i].inbound);//Total Call
                    //           //    if(type==1){
                    //           //    $('#total-cal-blue').text(formatNumber(districtdetails[i].outbound));//Total Call
                    //           //    $('#area-name-h5').text(districtdetails[i].district_name);
                    //           //    $('#srvcTransaction').text(districtdetails[i].srvcTransaction);
                    //           //    $('#feedback').text(districtdetails[i].FeedbackRecieved);
                    //           //    }else{
                    //           //   $('#total-cal-blue').text(formatNumber(districtdetails[i].inbound));//Total Call
                    //           //    $('#area-name-h5').text(districtdetails[i].district_name);
                    //           //    ///$('#srvcTransaction').text(districtdetails[i].srvcTransaction);
                    //           //    }
                              

                    //           //  }
                    //             // console.log(URL+"/viewMapDetails");
                    //       }
                    //     window.open( URL+"/viewMapDetails/"+queryString, '_blank');


                    // });
                 
                });




        }
    });
}


function loadOutBoundDataCm(action, ctrlId,pulledBy ,revertIds, numberofrec,vchDepartmentId,intServiceId,district,gender,agegroup, vchCitizenFromDate = '', vchCitizenToDate = '', intHospitalPolice = '') {
    
   // var Surl = 'http://localhost/mosarkar';

    $('#'+ctrlId).html('<div class="center" style="height:100px; font-size:100px;margin-top:10%;"><i class="fa icon-loader1 fa-spin"></i></div>');
    //setTimeout(function () {
        $.ajax({
            type: "POST",
            url: URL + '/proxy',
            dataType: "json",
            data: { method: 'getOutBoundData', action: action, revertIds: revertIds,pulledBy:pulledBy, numberofrec: numberofrec, vchDepartmentId: vchDepartmentId, intServiceId: intServiceId,district:district,gender:gender,agegroup:agegroup,vchCitizenFromDate:vchCitizenFromDate,vchCitizenToDate:vchCitizenToDate,intHospitalPolice:intHospitalPolice ,csrf_token_id:csrf_token_val},
            success: function (data) {
                var res = data.SocialDeskResult;
                // console.log(res);
                // var readCount = (data.readCount != null || typeof (data.readCount) != 'undefined') ? data.readCount : 0;
                // var unreadCount = (data.unReadCount != null || typeof (data.unReadCount) != 'undefined') ? data.unReadCount : 0;
                //var totresult = (res.length == null) ? 0 : res.length;
                var listData = '';
                var slNo = 0;
                if ($.isEmptyObject(res) != true) { 

                    // listData += ' <table  border="1" id="dataTable" style="display:none;"  >';
                    // if(vchDepartmentId==0){
                    //     listData += ' <tr class="header" > <th colspan="17"  align="center"><h1>FSCW</h1></th></tr>';
                        
                    //     listData += ' <tr >';
                    //     listData += ' <th colspan="8" >CITIZEN LIST</th> <th colspan="5"> HEALTH & FAMILY WELFARE </th><th colspan="4">HOME</th>'; 
                    //     listData += ' </tr> ';


                    //     listData += ' <tr class="addTr">';
                    //     listData += ' <th width="40px">Sl No.</th><th>Name</th><th>Mobile</th><th>District</th><th>Service & Scheme</th><th>Other Info.</th><th>Date</th>'; 
                    //     listData += ' <th>Did the hospital staff behave well? </th> <th>Did anybody ask for illegal money? </th><th>Did any doctor refer you to private hospital?</th><th>Did you get free medicines and diagnosis?</th><th>Are you satisfied with the service?</th>';
                    //     listData += ' <th>Have you been attended well in time?</th><th>Did the police refuse to take the complaint?</th><th>Did anyone ask for bribe?</th><th>Did any police officer misbehave you?</th>';
                    //     listData += ' </tr> ';
                    // }
                    // if(vchDepartmentId==1){
                    //     listData += ' <tr class="header" > <th colspan="12"  align="center"><h1>FSCW</h1></th></tr>';
                    //     listData += ' <tr >';
                    //     listData += ' <th colspan="8" >CITIZEN LIST</th>'; 
                    //     listData += ' </tr> ';

                    //     listData += ' <tr class="addTr">';
                    //     listData += ' <th width="40px">Sl No.</th><th>Name</th><th>Mobile</th><th>District</th><th>Service & Scheme</th><th>Other Info.</th><th>Date</th>'; 
                    //     //listData += ' <th>Did the hospital staff behave well? </th> <th>Did anybody ask for illegal money? </th><th>Did any doctor refer you to private hospital?</th><th>Did you get free medicines and diagnosis?</th><th>Are you satisfied with the service?</th>';
                    //     listData += ' <th>Have you been attended well in time?</th><th>Did the police refuse to take the complaint?</th><th>Did anyone ask for bribe?</th><th>Did any police officer misbehave you?</th>';
                    //     listData += ' </tr> ';
                    // }
                    // if(vchDepartmentId==2){
                    //     listData += ' <tr class="header"  > <th colspan="13"  align="center"><h1>FSCW</h1></th></tr>';
                    //     listData += ' <tr >';
                    //     listData += ' <th colspan="8" >CITIZEN LIST</th>'; 
                    //     listData += ' </tr> ';
                    //     listData += ' <tr class="addTr">';
                    //     listData += ' <th width="40px">Sl No.</th><th>Name</th><th>Mobile</th><th>District</th><th>Service & Scheme</th><th>Other Info.</th><th>Date</th>'; 
                    //     listData += ' <th>Did the hospital staff behave well? </th> <th>Did anybody ask for illegal money? </th><th>Did any doctor refer you to private hospital?</th><th>Did you get free medicines and diagnosis?</th><th>Are you satisfied with the service?</th>';
                    //    // listData += ' <th>Have you been attended well in time?</th><th>Did the police refuse to take the complaint?</th><th>Did anyone ask for bribe?</th><th>Did any police officer misbehave you?</th>';
                    //     listData += ' </tr> ';
                    // }
                   
                    // listData += ' </table>';

                    listData += '<div class="portlet__body" ><div class="table-responsive"><table data-toggle="table"  class="table table-hover table-bordered"> <tr> <th width="40px">Sl#</th><th>Name</th><th>Mobile</th><th>District</th><th>Service & Scheme</th><th>Other Info.</th><th>Date</th><th>Call History</th><th> <input type="checkbox" id="chkAll" class="magic-checkbox chkAll"/><label for="chkAll"></label> Call </th></tr>'; 
                    // listData += '<div class="portlet__body fixed-height" ><div class="table-responsive"><table data-toggle="table"  class="table table-hover table-bordered"> <tr> <th width="40px">Sl#</th><th>Name</th><th>Mobile</th><th>District</th><th>Source</th><th>Department & Service</th><th>Institution</th><th>Date</th><th>Call History</th><th> <input type="checkbox" id="chkAll" class="magic-checkbox chkAll"/><label for="chkAll"></label> Call </th></tr>'; 

                    $.each(res, function (i) {
                        listData += '<tr id="bookMarked'+res[i].intOutboundDataId+'_'+res[i].dataType+'">';
                        listData += '<td>'+ (++slNo) +'</td>';
                        if(res[i].intGender == 1){
                            var vchGender       = '<strong>Gender: </strong>Male';
                        }else if(res[i].intGender == 2){
                            var vchGender       = '<strong>Gender: </strong>Female';
                        }else if(res[i].intGender == 3){
                            var vchGender       = '<strong>Gender: </strong>Transgender';
                        }else{
                            var vchGender       = '<strong>Gender: </strong>--';
                        }
                        var vchAge = '';
                        if(res[i].intAge == 1){
                            vchAge = '<strong>Age: </strong>1 Year';
                        }else if(res[i].intAge > 1){
                            vchAge = '<strong>Age: </strong>'+res[i].intAge+' Years';
                        }else{
                            vchAge = '<strong>Age: </strong>--';
                        }
                        var vchAgeGender = vchGender+', '+vchAge;
                        listData += '<td>'+ res[i].vchName +'<br><small class="text-info">'+vchAgeGender+'</small><br>';
                        if(res[i].intServiceId==1){
                            listData += '<small class="text-info"><strong>Card Type: </strong>'+res[i].vchCardName+'</small>,<small class="text-info"><strong>Reg. Date: </strong>'+res[i].dtmRegdDateTime+'</small><br><small class="text-info"><strong>Ration Card No.: </strong>'+res[i].vchRationCardNo+'</small>,<small class="text-info"><strong>No of Family Member: </strong>'+res[i].intNoFamily+'</small></td>';

                        }else{
                            listData += '<small class="text-info"><strong>Reg. Date: </strong>'+res[i].dtmRegdDateTime+'</small>,<small class="text-info"><strong>Token No.: </strong>'+res[i].vchTokenNo+'</small><br><small class="text-info"><strong>Deposite Date: </strong>'+res[i].dtmPaddyDeposite+'</small></td>';
                        }
                        listData += '<td>'+res[i].intMobile +'</td> ';
                        listData += '<td>'+res[i].DistrictName +'</td> ';
                        //listData += '<td><small><div class="text-muted"><strong>District: </strong>'+res[i].DistrictName+'</div></small><small><div class="text-muted"><strong>Block: </strong>'+res[i].BlockName+'</div></small><small><div class="text-muted"><strong>GP: </strong>'+res[i].GPName+'</div></small></td>';
                        if(res[i].dataType == 1){
                            var vchType     = 'Dept.';
                        }else{
                            var vchType     = 'CC';
                        }
                        // listData += '<td>'+ vchType +'</td> ';
                        listData += '<td>'+res[i].vchServiceName +' <small><div class="text-muted"><strong>Scheme: </strong>'+res[i].vchSchemeTypeName+'</div></small></td>';
                        listData += '<td>'+res[i].vchOtherDetails+'</td>';
                        listData += '<td>'+ res[i].dtmRegdDateTime +'</td>';
                        listData += '<td>';
                        if(res[i].vchCountCallHistory > 0){
                            listData += '<a class="btn btn-primary  btn-sm" href="javascript:void(0)" onclick="DisplayCallLog('+res[i].intMobile +')">View</a> ';
                        }else{
                            listData += '--';//
                        }
                        listData += '</td>';
                        listData += '<td><input type="hidden" class="intType" value="'+res[i].dataType+'"> <input type="hidden" class="intDepartmentId" value="'+res[i].intDepartmentId+'"> <input id="chkCall'+res[i].intOutboundDataId+'_'+res[i].dataType+'" class="magic-checkbox chkCall " value="'+res[i].intOutboundDataId+'" type="checkbox" > <label for="chkCall'+res[i].intOutboundDataId+'_'+res[i].dataType+'"></label></td>';
                        listData += '</tr>';
                        
                    });
                    listData += '</table></div></div><div class="portlet__footer"><a href="javascript:void(0);" id="generate-action-shirt" class="btn btn-success"> <i class="fa fa-download"></i> Action Sheet</a> <a href="javascript:void(0);" download id="actionSheetDwnl"  style="display:none;">Action Sheet</a>';
                    if(vchCMIdHideCC > 0){
                        listData += '&nbsp;<a class="btn btn-success" id="make-call"><i class="icon-phone1"></i> Call through Contact Center</a>';  
                        listData += '&nbsp;<a class="btn btn-success" id="make-call-direct"><i class="icon-phone1"></i> Direct Call</a></div>';
                    }else{
                        listData += '&nbsp;<a class="btn btn-success" id="make-call-direct"><i class="icon-phone1"></i> Direct Call</a></div>';
                   }
                    if(downloadExcel==1)
                    {
                        listData += '&nbsp;<a class="btn btn-success" id="excelExport" onclick=""><i class="icon-download-arrow-with-bar"></i> Export To Excel</a>';
                    }
                   
                }else {
                        listData += '<div class="noRecord">Right Now, No Information On Your Desk </div>';
                        // listData += '<div class="noRecord">Right Now, No Information On Your Desk <br> <a class="btn btn-warning btn-lg" id="make-reset"><i class="fa fa-refresh"></i>  Back</a></div>';
                }

                //$('#counterText').html(readCount);
                // $('#unreadCount').html(unreadCount);
                //setTimeout(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                    $('[data-rel=tooltip]').tooltip();
                    //console.log(listData);
                    $('#' + ctrlId).html(listData);
                    (function($){
                            $(".fixed-height").mCustomScrollbar({
                              theme:"inset-2-dark"
                            });

                      })(jQuery);
                    // $(".smile").on('click', function () {
                    //     var status = $(this).parent().find(".smilestatus").css('display');
                    //     $(document).not(this).find(".smilestatus").hide();
                    //     if (status == 'none') {
                    //         $(this).parent().find(".smilestatus").show();
                    //     } else {
                    //         $(this).parent().find(".smilestatus").hide();
                    //     }
                    // });
                //}, 1000);

            }
        });

    //}, 30);
}

function getInboundSummary(fromDate, toDate) {
    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getInboundSummary',fromDate: fromDate, toDate: toDate,csrf_token_id:csrf_token_val },
        success: function (data) {
            $('#totalInboundCalls').html( data.inboundSummary.totalInbound);
            Highcharts.chart('inboundcalls', {
      chart: {
          type: 'area'
      },
      colors: ['#008f82', '#52dfb5', '#57463f', '#fed500', '#fe7211', '#0d79d6', '#64E572', '#ae84ff', '#6AF9C4'],
      title: {
          text: ''
      },
      subtitle: {
          text: ''
      },
      xAxis: {
          categories: data.inboundSummary.date,
          tickmarkPlacement: 'on',
          title: {
              enabled: false
          }
      },
      yAxis: {
          title: {
              text: 'In Number'
          },
          labels: {
              formatter: function () {
                  return this.value;
              }
          }
      },
      tooltip: {
          split: true,
          valueSuffix: ' '
      },
      plotOptions: {
          area: {
              stacking: 'normal',
              lineColor: '#666666',
              lineWidth: 1,
              marker: {
                  lineWidth: 1,
                  lineColor: '#666666'
              }
          }
      },
      series: [{
          name: 'Calls',
          data: data.inboundSummary.inboundCalls
      }]
  });




        }
    });
}
function getOutboundSummary(fromDate, toDate) {
    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getOutboundSummary',fromDate: fromDate, toDate: toDate,csrf_token_id:csrf_token_val },
        success: function (data) {
            $('#totDept').html( data.outboundSummary.totalDept);
            $('#totCallCenter').html( data.outboundSummary.totalContactCenter);
            var winwidth = $(window).width();
                  var dinnersize; var dinnerdepth; var yside;



                  if (winwidth > 1440) {
                      dinnersize = 100;
                      dinnerdepth = 90;
                      yside = -30;
                  }
                else if ((winwidth <= 1440) && (winwidth > 1050)) {
                      dinnersize = 90;
                      dinnerdepth = 90;
                      yside = -40;
                  } 
                  else if ((winwidth <= 1050) && (winwidth > 900)) {
                      dinnersize = 110;
                      dinnerdepth = 100;
                      yside = -14;
                  } else if ((winwidth <= 901) && (winwidth >480)) {
                              dinnersize = 120;
                              dinnerdepth = 100;
                              yside = -14;
                          }
                  else {
                    dinnersize = 70;
                     dinnerdepth =30;
                      yside = -20;
                  }
                  Highcharts.chart('outboundcalls', {
                      colors: ['#fd9706', '#f44336', '#c874c9', '#43cddf', '#4caf50','#e91e63', '#2196f3', '#ffeb3b', '#607d8b', '#670700','#294f75'],
                      chart: {
                        
                          type: 'pie',
                          options3d: {
                              enabled: true,
                              alpha: 100,
                             
                          }
                      },
                      title: {
                          text: '<strong>' + data.outboundSummary.total +' </strong><br>Total Calls',
                          align: 'center',
                          verticalAlign: 'middle',
                          y: yside
                      },
                      tooltip: {
                          pointFormat: '{series.name}: <b>{point.y}</b>'
                      },
                      plotOptions: {
  
                          pie: {
                              innerSize: dinnersize,
                              depth: dinnerdepth,
                              dataLabels: {
                enabled: false,}
  
                          }
                      },
                     
                 series: [{
                          name: '',
                          
                          data: data.outboundSummary.resData,

                           showInLegend: true
                      }]

                  });




        }
    });
}
$.fillLocationNameValue = function (controlId, fillControlId, proposalValue, flag) {

    var tabDiv = '';
    var qt = '"';
    //if(proposalValue!='')
    //{

    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'searchLocationName', selVal: proposalValue,csrf_token_id:csrf_token_val },
        success: function (data) {
            var len = data.locationName.length;
            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var PName = data.locationName[i].vchLocationName;
                    var ProposalId = data.locationName[i].intSubnodeValId;
                    // var VCH_VALUE_NAME  = data.locationName[i].VCH_VALUE_NAME;  
                    //tabDiv +="<div class='resultList' onclick='$.setProjectVal("+qt+controlId+qt+","+qt+fillControlId+qt+","+qt+PId+qt+","+qt+PName+qt+","+qt+ProposalId+qt+");'>"+PName+"</div>"; 
                    tabDiv += "<div class='resultList' onclick='$.setBusineeVal(" + qt + controlId + qt + "," + qt + fillControlId + qt + "," + qt + ProposalId + qt + "," + qt + PName + qt + "," + flag + ");'>" + PName + "</div>";

                }
                $('#' + controlId).show();
                $('#' + controlId).html(tabDiv);
                //$('#divMan').html('*');
                //$('#id1').html(data.businessName);

            }

            else {
                $('#hdnPropId').val('0');
                $('#' + controlId).hide();
                $('#txtField').val('');
                $('#txtField').attr('readonly', false);
                $('#txtRegdDate').val('');
                $('#txtRegdDate').attr('readonly', false);
                $('#txtRenewalDate').val('');
                $('#txtRenewalDate').attr('readonly', false);
                // $('#divMan').html('');


            }

        }
    });


}

$.setBusineeVal = function (listControlId, controlId, ProposalId, ProposalName, flag) {
    //alert(flag);
    $('#' + controlId).val(ProposalName);
    $('#hdnPropId').val(ProposalId);
    var Namefrm = $('#hdnNamefrm').val();
    //getBusinessFieldName('txtField',ProposalId,Namefrm)
    $('#' + listControlId).hide();
}

/*
Function to Update Call status after self made call
By: Chinmayee 
On: 29-09-2019
*/

function updateCallStatus(intFeedbackRecId, intStatusForEdit,userType){ 


     var selFeebackStatus= $('#selFeebackStatus'+intFeedbackRecId).val();  
     

     if(userType==1 && selFeebackStatus == 1 ){
       
            if(!SubmitFeedbackStatus()){
               return false;
            } 
         var intDirectCallFeedbackStatus = $('input[name="intDirectCallFeedbackStatus"]:checked').val(); 
         var vchFeedbackRemarks          = $('#vchFeedbackRemarks').val();
       }
       else {
        var intDirectCallFeedbackStatus = 0;
        var vchFeedbackRemarks          ='';
       }
//alert(intDirectCallFeedbackStatus);
      // return false;
    $.ajax({
      type: "POST",
      url: URL + '/proxy',
      dataType: "json",
      data: {method: 'updateCallStatus',csrf_token_id:csrf_token_val ,intFeedbackRecId:intFeedbackRecId, selFeebackStatus:selFeebackStatus,intStatusForEdit:intStatusForEdit,intDirectCallFeedbackStatus:intDirectCallFeedbackStatus,vchFeedbackRemarks:vchFeedbackRemarks},
      success: function (data) {
        var sucessSts =data.sucessSts;
        if(sucessSts>0){

            if( selFeebackStatus == 1 ){
                $('.selFeebackStatus'+intFeedbackRecId).hide();
                if(userType==1){
                    $('.selFeebackStatusEdit'+intFeedbackRecId).show();
                    $('#viewFeebackStatus'+intFeedbackRecId).show(); 
                    var onClickFnt='updateCallStatusfoCm('+intFeedbackRecId+',1,1);'
                    $('#updateFedbck'+intFeedbackRecId).attr('onclick',onClickFnt);
                }
                if(userType==2){
                    $('#feedbackUpdate'+intFeedbackRecId).hide(); 
                }
                
                $('.feedbackEntryCls').hide();
                $('#feedBackMsg').html('<h5>Data updated successfully</h5>');
                $('.feedbackMsgCls').show();
                

            }else{

                if(userType==1){
                    $('.selFeebackStatusEdit'+intFeedbackRecId).show();
                    $('#viewFeebackStatus'+intFeedbackRecId).hide(); 
                    var onClickFnt='updateCallStatusfoCm('+intFeedbackRecId+',1,1);'
                    $('#updateFedbck'+intFeedbackRecId).attr('onclick',onClickFnt);
                }
                $('.selFeebackStatus'+intFeedbackRecId).hide();
            }




            if(selFeebackStatus == 1 && feedbackQuestion != 1){
                $('#feedbackUpdate'+intFeedbackRecId).show();
            }
           
            if(selFeebackStatus==1){
                $('#updatedStatus'+intFeedbackRecId).text('Call Connected');   
            }
            else if(selFeebackStatus==2){
                $('#updatedStatus'+intFeedbackRecId).text('Not Reachable');   
            }
            else if(selFeebackStatus==3){
                $('#updatedStatus'+intFeedbackRecId).text('Invalid No. / Wrong No.');   
            }
            else if(selFeebackStatus==4){
                $('#updatedStatus'+intFeedbackRecId).text('Did not Pick');   
            }
            else if(selFeebackStatus==5){
                $('#updatedStatus'+intFeedbackRecId).text('Did not want to talk / DND');   
            }
            // else if(selFeebackStatus==6){
            //     $('#updatedStatus'+intFeedbackRecId).text('DND');   
            // }
            else if(selFeebackStatus==7){
                $('#updatedStatus'+intFeedbackRecId).text('Call Later');   
            }else if(selFeebackStatus==8){
                $('#updatedStatus'+intFeedbackRecId).text('No Incoming Call Facility');   
            }else if(selFeebackStatus==9){
                $('#updatedStatus'+intFeedbackRecId).text('Switched off');   
            }else if(selFeebackStatus==11){
                $('#updatedStatus'+intFeedbackRecId).text('Not Visited');   
            }
            else if(selFeebackStatus==12){
                $('#updatedStatus'+intFeedbackRecId).text('Govt. Employee');   
            }
        }  else{
            $('.feedbackEntryCls').hide();
            $('#feedBackMsg').html('<h5>Error Occured. Try again</h5>');
            $('.feedbackMsgCls').show();
           // viewAlert('Error Occured. Try again');
        }  
      }
    });
}


/*
Function to generate action sheet
By: Chinmayee 
On: 29-09-2019
*/

function generateActionSheet(intFeedbackRecId){  
    $.blockUI({ message: '<h4><img style="display: block;margin: 0 auto;" src="'+URL+'/img/loader-white1.gif" /> Just a moment...</h4>' });
    //alert(intFeedbackRecId);
    $.ajax({
      type: "POST",
      url: URL + '/proxy',
      dataType: "json",
      data: {method: 'generateActionSheet',intFeedbackRecId:intFeedbackRecId,csrf_token_id:csrf_token_val},
      success: function (data) {
       // e.preventDefault();
       
        var docUrl =data.docUrl;
        //console.log(data);
        $('#actionSheetDwnl').attr('href',docUrl);
        setTimeout(function(){
            $(document).find('#actionSheetDwnl')[0].click();
            $.unblockUI();
        },2000);
       
    }
});

}

function getInboundCallRequest(intInboundDataId,userId){  
    // alert(URL);return false;
    $.ajax({
      type: "POST",
      url: URL + '/proxy',
      dataType: "json",
      data: {method: 'getInboundCallRequest',intInboundDataId:intInboundDataId,userId:userId,csrf_token_id:csrf_token_val},
      success: function (data) {
        if(data.result==1){
         
           window.location.href = URL+'/dashboard';  
        }
    }
});

}

$.fillPoliceNameValue = function (controlId, fillControlId, proposalValue, flag) {

    var tabDiv = '';
    var qt = '"';
    //if(proposalValue!='')
    //{

    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'searchLocationName', selVal: proposalValue,csrf_token_id:csrf_token_val },
        success: function (data) {
            var len = data.locationName.length;
            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var PName = data.locationName[i].vchLocationName;
                    var ProposalId = data.locationName[i].intSubnodeValId;
                    // var VCH_VALUE_NAME  = data.locationName[i].VCH_VALUE_NAME;  
                    //tabDiv +="<div class='resultList' onclick='$.setProjectVal("+qt+controlId+qt+","+qt+fillControlId+qt+","+qt+PId+qt+","+qt+PName+qt+","+qt+ProposalId+qt+");'>"+PName+"</div>"; 
                    tabDiv += "<div class='resultList' onclick='$.setBusineeVal(" + qt + controlId + qt + "," + qt + fillControlId + qt + "," + qt + ProposalId + qt + "," + qt + PName + qt + "," + flag + ");'>" + PName + "</div>";

                }
                $('#' + controlId).show();
                $('#' + controlId).html(tabDiv);
                //$('#divMan').html('*');
                //$('#id1').html(data.businessName);

            }

            else {
                $('#hdnPropId').val('0');
                $('#' + controlId).hide();


            }

        }
    });


}

$.setBusineeVal = function (listControlId, controlId, ProposalId, ProposalName, flag) {
    //alert(flag);
    $('#' + controlId).val(ProposalName);
    $('#hdnPropId').val(ProposalId);
    var Namefrm = $('#hdnNamefrm').val();
    //getBusinessFieldName('txtField',ProposalId,Namefrm)
    $('#' + listControlId).hide();
}


// Function for get service list department wise :: Chinmayee :: 23-09-2019
function getDeptWiseHospital(controlId,districtId,selVal) {

    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getDeptWiseHospital', selVal:selVal,districtId:districtId,csrf_token_id:csrf_token_val},
        success: function (data) {
            var opt=data.opt;
            // console.log(opt);
             $('#'+controlId).html(opt);
             $("#"+controlId).trigger('chosen:updated'); 
            $("#"+controlId).chosen({width: "100%"}); 
        }
    });

}
// Function for get service list department wise :: Chinmayee :: 23-09-2019
function getDeptWisePolice(controlId,districtId,selVal) {

    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getDeptWisePolice', selVal:selVal,districtId:districtId,csrf_token_id:csrf_token_val},
        success: function (data) {
            var opt=data.opt;
            // console.log(opt);
             $('#'+controlId).html(opt);
             $("#"+controlId).trigger('chosen:updated'); 
            $("#"+controlId).chosen({width: "100%"}); 
        }
    });
}

function getRequestedByList(controlId, selVal) {

    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getRequestedByList', selVal:selVal,csrf_token_id:csrf_token_val},
        success: function (data) {
            var res = data.department;    
           $("#"+controlId).html(res);
        }
    });

}
function setTodayYesterdayAll(selVal){
   $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'setTodayYesterdayAll', selVal:selVal,csrf_token_id:csrf_token_val},
        success: function (data) {
            location.reload();
            // var res = data.department;    
           // $("#"+controlId).html(res);
        }
    });
}

function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}
function fillRangeWisePolicestation(rangeId,controlId,selVal=0){
    $.ajax({
         type: "POST",
         url: URL + '/proxy',
         dataType: "json",
         data: { method: 'fillRangeWisePolicestation', rangeId:rangeId,selVal:selVal,csrf_token_id:csrf_token_val},
         success: function (data) {
             
              var res = data.result;    
             $("#"+controlId).html(res);
         }
     });
 }
 function fillDistrictRangeWise(rangeId,controlId,selVal=0){
    $.ajax({
         type: "POST",
         url: URL + '/proxy',
         dataType: "json",
         data: { method: 'fillDistrictRangeWise', rangeId:rangeId,selVal:selVal,csrf_token_id:csrf_token_val},
         success: function (data) {
             
              var res = data.result;    
             $("#"+controlId).html(res);
         }
     });
 }
// Function for get service list department wise :: Chinmayee :: 23-09-2019
function getDeptWiseInstitution(controlId,deptId,selVal) {

    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'getDeptWiseInstitution', selVal:selVal,deptId:deptId,csrf_token_id:csrf_token_val},
        success: function (data) {
            var opt=data.opt;
            // console.log(opt);
             $('#'+controlId).html(opt);
        }
    });

}
/*Function to get Job Types  BY: Chinmayee */
function fillJobType(ctrlId, accountType, userId, selVal) {
    $("#" + ctrlId).html('<div class="center" style="font-size:2em;padding-top:25%;"><i class="fa fa-spinner fa-spin"></i></div>');
    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'fillJobType', intAccountType: accountType, intSelval: selVal,csrf_token_id:csrf_token_val },
        success: function (data) {
            //console.log(data);
            var response = data.jobTypeList;
            $('#' + ctrlId).html(response);

        }
    });

}

function fillUsers(ctrlId, accountType, userId, selVal) {
    if (accountType > 0) {
        var accType = '';
        if (accountType == '1')
            accType = 'twitter';
        else if (accountType == '2')
            accType = 'facebook';
        else if (accountType == '4')
            accType = 'HEALTHAPI';
        else if (accountType == '5')
            accType = 'HOMEAPI';

        $("#" + ctrlId).html('<div class="center" style="font-size:2em;padding-top:25%;"><i class="fa fa-spinner fa-spin"></i></div>');
        $.ajax({
            type: "POST",
            url: URL + '/proxy',
            dataType: "json",
            data: { method: 'fillUsers', intAccountType: accType, intUserid: userId, intSelval: selVal,csrf_token_id:csrf_token_val },
            success: function (data) {
                //console.log(data);
                var response = data.userList;
                $('#' + ctrlId).html(response);

            }
        });

    } else {
        $('#' + ctrlId).html('');
    }

}

/*Function to get Job Types  BY: Chinmayee */
function exceuteAPI(intJobId, intJobType) {
   // $("#" + ctrlId).html('<div class="center" style="font-size:2em;padding-top:25%;"><i class="fa fa-spinner fa-spin"></i></div>');
    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'exceuteAPI', intJobId: intJobId, intJobType: intJobType,csrf_token_id:csrf_token_val },
        success: function (data) {
            //console.log(data);
            var response = data.excStatus;
            if(response==1){
                viewAlert('Cron executed successfully');
            }else{
                viewAlert('Cron not executed'); 
            }
            //$('#' + ctrlId).html(response);

        }
    });

}

function viewCallRemarkStatus(intFeedbackRecId){
    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'viewCallRemarkStatus',csrf_token_id:csrf_token_val ,intFeedbackRecId: intFeedbackRecId },
        success: function (data) {  
             var intFeedbackAnswer=data.intDirectCallFeedbackStatus;
            $('#lblFeedbackRemarks12').html(data.vchQuery);           
           
            if(intFeedbackAnswer == 1){
                $('#intDirectCallFeedbackStatus_bad1').prop('checked',true);
            }else if(intFeedbackAnswer == 2){
                $('#intDirectCallFeedbackStatus_average1').prop('checked',true);
            }else if(intFeedbackAnswer == 3){
                $('#intDirectCallFeedbackStatus_good1').prop('checked',true);
            }else if(intFeedbackAnswer == 4){
                $('#intDirectCallFeedbackStatus_bad12').prop('checked',true);
            }else if(intFeedbackAnswer == 5){
                $('#intDirectCallFeedbackStatus_outstanding1').prop('checked',true);
            }
            $('input[name=intDirectCallFeedbackStatus1]').attr("disabled",true);
            $('#FeedbackAnswerGiven').modal('show');
           }
        })

 }
 function viewCallRemarkStatusEdit(intFeedbackRecId){
    $.ajax({
        type: "POST",
        url: URL + '/proxy',
        dataType: "json",
        data: { method: 'viewCallRemarkStatus',csrf_token_id:csrf_token_val ,intFeedbackRecId: intFeedbackRecId },
        success: function (data) {  
             var intFeedbackAnswer=data.intDirectCallFeedbackStatus;
            $('#vchFeedbackRemarks').val(data.vchQuery);           
           
            if(intFeedbackAnswer == 1){
                $('#intDirectCallFeedbackStatus_bad').prop('checked',true);
            }else if(intFeedbackAnswer == 2){
                $('#intDirectCallFeedbackStatus_average').prop('checked',true);
            }else if(intFeedbackAnswer == 3){
                $('#intDirectCallFeedbackStatus_good').prop('checked',true);
            }else if(intFeedbackAnswer == 4){
                $('#intDirectCallFeedbackStatus_bad1').prop('checked',true);
            }else if(intFeedbackAnswer == 5){
                $('#intDirectCallFeedbackStatus_outstanding').prop('checked',true);
            }
            //$('input[name=intDirectCallFeedbackStatus1]').attr("disabled",true);
            //$('#FeedbackAnswerGiven').modal('show');
           }
        })

 }


 function showFeedbackQuestionAnswerReceived(intDepartmentId, intServiceId, intFeedbackRecId, cardNo = 0){
    $('#UpdateFeedbackAnswer').modal('show');
    $('#divFeedbackAnswer').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
    $('#intFeedbackRecId').val(intFeedbackRecId);
    $.ajax({
      type: "POST",
      url: URL + '/proxy',
      dataType: "json",
      data: {method: 'showFeedbackQuestionAnswerReceived',csrf_token_id:csrf_token_val ,intDepartmentId:intDepartmentId,intServiceId:intServiceId,intFeedbackRecId:intFeedbackRecId,cardNo:cardNo},
      success: function (data) {
        // console.log(data.result);
        $('#divFeedbackAnswer').html(data.result);

        // if(data.result==1){
         
        //    window.location.href = URL+'/dashboard';  
        // }
      }
    });
  }
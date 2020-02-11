// JavaScript Document 
var hostName = window.location.host;
var pathName = window.location.pathname;
var path = pathName.split("/");
var FN1 = path[1];
var FN2 = path[2];
var siteURL = 'http://' + hostName + '/' + FN1 + '/' + FN2 + '/';
var consoleProxyUrl = siteURL+"Console/class_file/proxy.php";
//alert(consoleProxyUrl);
$(document).ready(function () {

});

//===== Common Function for json call ========
function getServerData(method, returnEvent, idParam)
{
    var url = siteURL + "dev_class_file/proxy.php?method=" + method;
    if (idParam != '')
    {
        url += '&' + idParam;
    }
    $.getJSON(url, function (json) {
        $(document).trigger(returnEvent, [json]);
    });
}

//============= Progress bar ====================

//===== Function for call hrader & logo Data ========

function bindHeader(header, vfooterText, vurl)
{

    getServerData("theme", "theemeEvent", "");
    $(document).bind("theemeEvent", function (e, myName, myValue) {
		if(myName.length>0)
		{
			var opt = myName[0].option;
			var hederText = myName[0].headerTExt;
			var footerText = myName[0].footerText;
			var url = myName[0].url;
			var companyName = myName[0].companyName;
			var loginLogo = myName[0].loginLogo;
			var innerLogo = myName[0].innerLogo;
			var portalLogo = myName[0].portalLogo;
			var tabDiv = '';
			url = '<a href="' + url + '" title="' + url + '" target="_blank">' + url + '</a>';
			if (opt == 1)
			{
				tabDiv += '<h1 class="logo">';
				tabDiv += companyName;
				tabDiv += '<br/><span>';
				tabDiv += hederText;
				tabDiv += '</span></h1>'
				$('#' + vfooterText).html(footerText);
				$('#' + vurl).html(url);
			}
			if (opt == 2)
			{
				tabDiv += '<span class="navbar-brand"><img src="' + siteURL + 'Console/uploadDocuments/Logo/Inner_logo/' + innerLogo + '" ></span>';
				$('#' + vfooterText).html(footerText);
				$('#' + vurl).html(url);
			}
			$('#' + header).html(tabDiv);
		}
    });
}

//===== Function for call GL & PL By Rasmi Ranjan Swain on 05-Jan-2015 ========


function bindGLPL(uid, GL, PL)
{
    if (uid != '')
    {
        var param = "UID=" + uid;
        param += "&GL=" + GL;
        param += "&PL=" + PL;
        getServerData("upgLink", "glEvent", param);
        $(document).bind("glEvent", function (e, myName, myValue) {

            $('#menulft').html(myName[0].menuValue);
        });
    }
}

//===== Function for call Button By Rasmi Ranjan Swain on 21/10/2013 ========


function bindButton(fid)
{

    if (fid != '')
    {
        var param = "FID=" + fid;
        getServerData("button", "buttonEvent", param);
        $(document).bind("buttonEvent", function (e, myName, myValue) {
            $('#buttonid').html('');
            var temHtml = '';
            for (var i = 0; i < myName.length; i++)
            {
                temHtml += '<a href="#" class="buttons active">' + myName[i].buttonName + '</a> '
            }
            $('#buttonid').append(temHtml);
            //$('#leftul').html('<li> hshhabc</li>');

        });
    }
}


//===== Function for call Tab By Rasmi Ranjan Swain on 25/10/2013 ========


function bindTab(fid)
{

    if (fid != '')
    {
        var param = "FID=" + fid;
        getServerData("tab", "tabEvent", param);
        $(document).bind("tabEvent", function (e, myName, myValue) {
            $('#tabID').html('');
            var temHtml = '';
            for (var i = 0; i < myName.length; i++)
            {
                temHtml += '<li class="active"><a href="#">' + myName[i].tabName + '</a></li>'
            }
            $('#tabID').append(temHtml);
            //$('#leftul').html('<li> hshhabc</li>');

        });
    }
}
// Function to fill subnodes for add## By Rasmi Ranjan Swain##on##03-Feb-2015
function fillSubnode(parentId, subNode, selVal, className, hdn, curLevel, mandatoryLevel)
{

    $('#' + hdn).val(parentId);
    var prevId = Number(curLevel) - 1;
    if (parentId == 0 && $('#ddlHierarchy' + prevId).length > 0)
    {
        var prevParent = $('#ddlHierarchy' + prevId).val();
        $('#' + hdn).val(prevParent);
    }
    //alert($('#'+hdn).val());
    $('.' + className).each(function () {
        if ($(this).data('val') > curLevel)
            $(this).remove();
    });
    if (parentId == 0)
        return false;
    var jsonData = {method: "SubNode", parentId: parentId, subNodeId: subNode, SelVal: selVal};
    var dynamicRow = '';
    var rowIndex = $('.' + className).length;
    var rowId = Number(rowIndex) + 1;
    var idIndex = $('.' + className).index($('#dynamicRow' + rowIndex));
    $.ajaxSetup({async: false});
    $.post(consoleProxyUrl, jsonData).done(function (json) {
        var data = jQuery.parseJSON(json);
        var subnodeVal = data.nodeValue.valueFill;
        var subNodeLabel = data.nodeValue.subNodeLabel;
        var subNodeId = data.nodeValue.subNodeId;
        var flag = data.nodeValue.flag;
        var valueNum = data.nodeValue.valueNum;
        dynamicRow += '<div class="form-group ' + className + '" id="dynamicRow' + rowId + '" data-val="' + rowId + '">';
        dynamicRow += '<label class="col-sm-2 control-label no-padding-right lbldynamic" for="ddlHierarchy' + rowId + '">' + subNodeLabel + '</label>';
        dynamicRow += '<div class="col-sm-4">';
        dynamicRow += '<span class="colon">:</span>';
        dynamicRow += '<select class="form-control seldynamic" id="ddlHierarchy' + rowId + '" name="ddlHierarchy' + rowId + '" onChange="fillSubnode(this.value,0,0,&quot;' + className + '&quot;,&quot;' + hdn + '&quot;,&quot;' + rowId + '&quot;,&quot;' + mandatoryLevel + '&quot;);" >' + subnodeVal + '</select>';
        dynamicRow += (rowId <= mandatoryLevel) ? '<span class="mandatory">*</span>' : '';
        dynamicRow += '</div>';
        dynamicRow += '</div>';
        if (parentId > 0)
            $('#' + hdn).val(parentId);

        if (valueNum > 0)
            $('.' + className).last().after(dynamicRow);
    });
}
// Function to fill hierarchy for add## By Rasmi Ranjan Swain##on##03-Feb-2015
$.fillHierarchy = function (hierarchyId, className, firstSelId, hdn, mandatoryLevel)
{
    if (hierarchyId > 0)
    {
        var jsonData = {method: "fillHierarchy", HID: hierarchyId};
        $.post(consoleProxyUrl, jsonData, function (json) {
            var data = jQuery.parseJSON(json);
            var hierarchyIds = data.hierarchyFill;
            var explIds = hierarchyIds.split(',');
            var curLevel = 1;
            $('#' + firstSelId).val(explIds[Number(explIds.length) - 1]);

            for (var i = Number(explIds.length) - 1; i >= 0; i--)
            {
                var selVal = (i >= 0) ? explIds[Number(i) - 1] : 0;
                curLevel++;
                $.ajaxSetup({async: false});
                $.when(fillSubnode(explIds[i], 0, selVal, className, hdn, curLevel, mandatoryLevel)).done(function () {
                    return true;
                });
            }
        });
    }
}
// Function to fill hierarchy for MIS Report## By Rasmi Ranjan Swain##on##03-Feb-2015
$.fillHierarchyVal = function (hierarchyId, className, firstSelId, hdn, mandatoryLevel, lblLen, ctrlLen, limit)
{
    if (hierarchyId > 0)
    {
        var jsonData = {method: "fillHierarchy", HID: hierarchyId};
        $.post(consoleProxyUrl, jsonData, function (json) {
            var data = jQuery.parseJSON(json);
            var hierarchyIds = data.hierarchyFill;
            var explIds = hierarchyIds.split(',');
            var curLevel = 1;
            $('#' + firstSelId).val(explIds[Number(explIds.length) - 1]);

            for (var i = Number(explIds.length) - 1; i >= 0; i--)
            {
                var selVal = (i >= 0) ? explIds[Number(i) - 1] : 0;
                curLevel++;
                $.ajaxSetup({async: false});
                $.when(fillSubnodeVal(explIds[i], 0, selVal, className, hdn, curLevel, mandatoryLevel, lblLen, ctrlLen, limit)).done(function () {
                    return true;
                });
            }
        });
    }
}

// Function to fill first node By Rasmi Ranjan Swain##on##03-Feb-2015
$.fillFirstNode = function (ctrlId, selVal, hdnId)
{
    var jsonData = {method: "hierarchy", SelVal: selVal};
    $('#' + hdnId).val(selVal);
    $.post(consoleProxyUrl, jsonData, function (json) {
        var data = jQuery.parseJSON(json);
        $('#' + ctrlId).html(data.hierarchy.hierarchyFill);
    });
}
// Function to fill subnodes By Rasmi Ranjan Swain##on##03-Feb-2015
function fillSubnodeVal(parentId,subNode,selVal,className,hdn,curLevel, mandatoryLevel,lblLen,ctrlLen,limit)
{	
                var newClass = '';
                $('#'+hdn).val(parentId);
                var prevId		= Number(curLevel)-1;
                if(parentId==0 && $('#ddlHierarchy'+prevId).length>0)
                {
                        var prevParent	= $('#ddlHierarchy'+prevId).val();				
                        $('#'+hdn).val(prevParent);	
                }
                //alert($('#'+hdn).val());
        $('.'+className).each(function(){
                if($(this).data('val')>curLevel)
                        $(this).remove();
        });		
        if(parentId==0)
                return false;
        var jsonData		= {method:"SubNode",parentId:parentId,subNodeId:subNode,SelVal:selVal};
        var dynamicRow		= '';
        var rowIndex		= $('.'+className).length;		
        var rowId			= Number(rowIndex)+1;		
        var idIndex			= $('.'+className).index($('#dynamicRow'+rowIndex));
        $.ajaxSetup({async: false});
        $.post(consoleProxyUrl,jsonData).done( function(json) {
            if(rowId>=limit){newClass="";}
                var data 		= jQuery.parseJSON(json);
                var subnodeVal	= data.nodeValue.valueFill;
                var subNodeLabel= data.nodeValue.subNodeLabel;
                var subNodeId	= data.nodeValue.subNodeId;	
                var flag		= data.nodeValue.flag;
                var valueNum	= data.nodeValue.valueNum;	
                var rowNumId    = Number(rowId)-1;

                dynamicRow		+= '<div class="'+newClass+' '+className+'" id="dynamicRow'+rowId+'" data-val="'+rowId+'">';
                dynamicRow		+= '<label class="col-sm-2 control-label no-padding-right lbldynamic" for="ddlHierarchy'+rowId+'">'+subNodeLabel+'</label>';
                dynamicRow		+= '<div class="col-sm-3">';
                dynamicRow		+= '<span class="colon">:</span>';
                dynamicRow		+= '<select class="form-control seldynamic" id="ddlHierarchy'+rowId+'" name="ddlHierarchy'+rowId+'" onChange="fillSubnodeVal(this.value,0,0,&quot;'+className+'&quot;,&quot;'+hdn+'&quot;,&quot;'+rowId+'&quot;,&quot;'+mandatoryLevel+'&quot;,&quot;'+lblLen+'&quot;,&quot;'+ctrlLen+'&quot;,&quot;'+limit+'&quot;);" >'+subnodeVal+'</select>';
                dynamicRow		+= (rowId<=mandatoryLevel)?'<span class="mandatory">*</span>':'';
                dynamicRow		+= '</div>';
                dynamicRow		+= '</div>';

                if(parentId>0)
                        $('#'+hdn).val(parentId);

                if(valueNum>0)
                {
                    if( rowNumId %limit==0)
                    {                            
                        $('.'+className).closest('.form-group').after('<div class="form-group control-group">'+dynamicRow+'</div>'); 
                    }
                    else
                    {
                        $('.'+className).last().after(dynamicRow);
                    }
                }
        });	

}

// Function to fill subnodes for add## By Rasmi Ranjan Swain##on##03-Feb-2015
function fillSubnodeDetails(parentId, subNode, selVal, className, hdn, curLevel, mandatoryLevel)
{

    $('#' + hdn).val(parentId);
    var prevId = Number(curLevel) - 1;
    if (parentId == 0 && $('#ddlHierarchy' + prevId).length > 0)
    {
        var prevParent = $('#ddlHierarchy' + prevId).val();
        $('#' + hdn).val(prevParent);
    }
    //alert($('#'+hdn).val());
    $('.' + className).each(function () {
        if ($(this).data('val') > curLevel)
            $(this).remove();
    });
    if (parentId == 0)
        return false;
    var jsonData = {method: "SubNode", parentId: parentId, subNodeId: subNode, SelVal: selVal};
    var dynamicRow = '';
    var rowIndex = $('.' + className).length;
    var rowId = Number(rowIndex) + 1;
    var idIndex = $('.' + className).index($('#dynamicRow' + rowIndex));
    $.ajaxSetup({async: false});
    $.post(consoleProxyUrl, jsonData).done(function (json) {
        var data = jQuery.parseJSON(json);
        var subnodeVal = data.nodeValue.valueFill;
        var subNodeLabel = data.nodeValue.subNodeLabel;
        var subNodeId = data.nodeValue.subNodeId;
        var flag = data.nodeValue.flag;
        var valueNum = data.nodeValue.valueNum;
        dynamicRow += '<div class="' + className + '" id="dynamicRow' + rowId + '" data-val="' + rowId + '">';
        dynamicRow += '<label class="col-sm-2 control-label no-padding-right lbldynamic" for="ddlHierarchy' + rowId + '">' + subNodeLabel + '</label>';
        dynamicRow += '<div class="col-sm-3">';
        dynamicRow += '<span class="colon">:</span>';
        dynamicRow += '<select class="form-control seldynamic" id="ddlHierarchy' + rowId + '" name="ddlHierarchy' + rowId + '" onChange="fillSubnodeDetails(this.value,0,0,&quot;' + className + '&quot;,&quot;' + hdn + '&quot;,&quot;' + rowId + '&quot;,&quot;' + mandatoryLevel + '&quot;);" >' + subnodeVal + '</select>';
        dynamicRow += (rowId <= mandatoryLevel) ? '<span class="mandatory">*</span>' : '';
        dynamicRow += '</div>';
        dynamicRow += '</div>';
        if (parentId > 0)
            $('#' + hdn).val(parentId);

        if (valueNum > 0)
            $('.' + className).last().after(dynamicRow);
    });
}

// Function to fill hierarchy for MIS Report## By Rasmi Ranjan Swain##on##03-Feb-2015
$.fillHierarchyValDetails = function (hierarchyId, className, firstSelId, hdn, mandatoryLevel, lblLen, ctrlLen, limit)
{
    if (hierarchyId > 0)
    {
        var jsonData = {method: "fillHierarchy", HID: hierarchyId};
        $.post(consoleProxyUrl, jsonData, function (json) {
            var data = jQuery.parseJSON(json);
            var hierarchyIds = data.hierarchyFill;
            var explIds = hierarchyIds.split(',');
            var curLevel = 1;
            $('#' + firstSelId).val(explIds[Number(explIds.length) - 1]);

            for (var i = Number(explIds.length) -1; i >= 0; i--)
            {
                var selVal = (i >= 0) ? explIds[Number(i) - 1] : 0;
                curLevel++;
                $.ajaxSetup({async: false});
                $.when(fillSubnodeDetails(explIds[i], 0, selVal, className, hdn, curLevel, mandatoryLevel, lblLen, ctrlLen, limit)).done(function () {
                    return true;
                });
            }
            
        });
    }
}

//========== Function to find total node level By Sunil Kumar Parida On 5-feb-2015 ========
// Function to fill subnodes for add## By Rasmi Ranjan Swain##on##03-Feb-2015
function fillSubnodeOptions(hierarchyId, hierarchyClass, parentId, subNode, curLevel, hdn, hdnFirstId,allId, adminHval)
{
    //console.log(hierarchyId+'=='+hierarchyClass+'=='+parentId+'=='+subNode+'=='+curLevel+'=='+hdn+'=='+hdnFirstId+'=='+allId+'=='+adminHval);
    if(typeof( adminHval )== "undefined" || adminHval=='')
        adminHval='0';
    else
        adminHval=adminHval;
	var splHval	= (adminHval.indexOf(',')>=0)?adminHval.split(","):adminHval;
	var ctrHVal	= splHval.length;
    $('#' + hdn).val(parentId);
    var prevId 	= Number(curLevel) - 1;
	var nextId	= Number(curLevel) + 1;
	if (parentId == 0)
	{ 
		var removeFlag	= 0;
		$('.seldynamic').each(function(i) {
			var thisId	= $(this).attr('id');
			var currentId	= hierarchyId+ nextId;
			if(thisId==currentId)
			{
				removeFlag	= 1;
			}
			if(removeFlag	== 1)
			{
				$(this).find('option').not(':first').remove();
			}
		 });		
	}
	
    if (parentId == 0 && $('#' +hierarchyId+ prevId).length > 0)
    { 
        var prevParent = $('#' + hierarchyId+ prevId).val();
        $('#' + hdn).val(prevParent);
    }
	else
	{
		if($('#' + hdnFirstId).val()=='')
		{
			$('#' + hdnFirstId).val(parentId);
		}
		$('#' + hdn).val($('#' + hdnFirstId).val());
	}
    if (parentId == 0)
        return false;
    if(allId>0){
        var explIds ='';
        var hierarchyIds ='';
     var jsonData = {method: "fillHierarchy", HID: allId};
        $.post(consoleProxyUrl, jsonData, function (json) {
            var data = jQuery.parseJSON(json);
            hierarchyIds = data.hierarchyFill;
           // console.log(hierarchyIds);
             explIds = hierarchyIds.split(','); 
            var ctr	= 0;
            for (var i = (Number(explIds.length) -1); i >= 0; i--)
            { 
				
                var selVal = (i >= 0) ? explIds[Number(i) - 1] : 0;
                var jsonData = {method: "SubNode", parentId: explIds[i], subNodeId: subNode, SelVal:selVal,adminHID:splHval[ctr]}; 
				ctr++;
                $.ajaxSetup({async: false});
                $.post(consoleProxyUrl, jsonData).done(function (json) {
                    var data = jQuery.parseJSON(json);
                    var subnodeVal 		= data.nodeValue.valueFill;
                    var subNodeLabel            = data.nodeValue.subNodeLabel;
                    var subNodeId 		= data.nodeValue.subNodeId;
                    var flag 			= data.nodeValue.flag;
                    var valueNum 		= data.nodeValue.valueNum;  
                            if(flag==0)
                            {      
                                    $('#' + hierarchyId+ nextId).html(subnodeVal);
                                    //$("#ddlHierarchy2").trigger('chosen:updated');
                                   // $("#ddlHierarchy2").chosen({width: "100%"});
                                    //alert($('#' + hierarchyId+ nextId).attr("id"));
                                    //$('#' + hierarchyId+ nextId).attr("id").val(selVal);
                              nextId++;
                            }
                    if (parentId > 0)
                        $('#' + hdn).val(explIds[i]);			
                });
                 
            }
           
            });
        }
        else{
            var jsonData = {method: "SubNode", parentId: parentId, subNodeId: subNode, SelVal:0,adminHID:splHval[0]};   
            $.ajaxSetup({async: false});
            $.post(consoleProxyUrl, jsonData).done(function (json) {
                var data = jQuery.parseJSON(json);
                var subnodeVal 		= data.nodeValue.valueFill;
                var subNodeLabel 	= data.nodeValue.subNodeLabel;
                var subNodeId 		= data.nodeValue.subNodeId;
                var flag 			= data.nodeValue.flag;
                var valueNum 		= data.nodeValue.valueNum;
               if(flag==0)
               {
                $('#' + hierarchyId+ nextId).html(subnodeVal);
                $("#ddlHierarchy2").trigger('chosen:updated');
                $("#ddlHierarchy2").chosen({width: "100%"});
                }
                if (parentId > 0)
                    $('#' + hdn).val(parentId);			
            });
        }
        //$(".seldynamic").trigger('chosen:updated');
        
}


     /*function for User list by : Amitashree Mallick on: 28-Sept-2016*/
        function  getUser(controlId,hId,SelVal)
        { 
           //console.log(SelVal); 
           var param	= "hId="+hId+'&SelVal='+SelVal;
            getServerData("getUser",controlId,param);
            $(document).bind(controlId, function(e, myName, myValue){	
                var opt	= myName.users;
                $('.'+controlId).html(opt);		
		});
        }
     
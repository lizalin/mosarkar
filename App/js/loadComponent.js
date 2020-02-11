var printMe
var indicate
var backMe
var refreshMe
var archiveMe
var publishMe
var unpublishMe
var deleteMe
var activeMe
var inactiveMe
var activeRecMe
var inactiveRecMe
var enableMe
var disableMe
var updateMe
var showHome
var hideHome
var downloadMe
var downloadIcon
var screenMe
// *** Script for get Absolute path and Updated by Sudam Chandra Panda on 28th Jun 2012 ****//
	var host 		= window.location.host;
	
	var pathInfo	= window.location.pathname;
	//var path		= pathInfo.split("/");
	var FN1			= pathInfo.split('/')[1];
	var FN2			= pathInfo.split('/')[2];
	var URL			= "http://"+host+"/"+FN1+"/"+FN2;
	var siteUrl 	        = "http://"+host+"/"+FN1+"/"+FN2;
	var splArr 		= [ "'", "<", ">", "%", "--" ];
$(document).ready(function() {
		//$('[data-rel=tooltip]').tooltip();
		//bindHeader('header','footertext','footerUrl');
              
		//history.forward(1);
		if($('.chkAll').length>0)
		{
			$('.chkAll').on('click',function(){
				if($(this).is(':checked'))
					$('.chkItem').attr('checked',true);
				else
					$('.chkItem').attr('checked',false);
			});
		}
		if($('.chkItem').length>0)
		{			
			$('.chkItem').on('click',function(){
				var chkAllFlag	= 0;
				$('.chkItem').each(function(){
					if($(this).is(':checked'))
						chkAllFlag++;
				});
				if(Number(chkAllFlag)==Number($('.chkItem').length))
					$('.chkAll').attr('checked',true);
				else
					$('.chkAll').attr('checked',false);
			});
		}
                
                
               // if($('.chkAll2').length>0)
		//{
			$('.chkAll2').on('click',function(){
				if($(this).is(':checked'))
					$('.chkItem2').attr('checked',true);
				else
					$('.chkItem2').attr('checked',false);
			});
		//}
                //if($('.chkItem2').length>0)
		//{			
			$('.chkItem2').on('click',function(){ 
				var chkAllFlag	= 0;
				$('.chkItem2').each(function(){
					if($(this).is(':checked'))
						chkAllFlag++;
				});
				if(Number(chkAllFlag)==Number($('.chkItem2').length))
					$('.chkAll2').attr('checked',true);
				else
					$('.chkAll2').attr('checked',false);
			});
		//}

	});
        function loadNavigation(fLink) 
	{		
		var totLink = '';
		var glName	= (getCookie("GlName")!='' && fLink!='Dashboard')?getCookie("GlName"):'Dashboard';
		var plName	= (getCookie("PlName")!='' && fLink!='Dashboard')?getCookie("PlName"):'';
		if(plName!='')
			totLink="<li>" +  glName + " </li><li>" + plName + "</li>";
		else
			totLink=" <li class='active'> " +  glName + "</li>";
		
		$('#navigation').html('<li><a href="'+URL+'/dashboard" alt="Home" title="" data-original-title="ataDashboard" ><i class="ace-icon fa fa-home home-icon"></i></a></li>'+ totLink);
		$('#title').html(fLink);
		
	}

// *** Script for Print page and Updated by Sudam Chandra Panda on 22nd Aug 2012 ****//
	function PrintPage() {
		 var windowName = "PrintPage";
		 var wOption 	= "width=1000,height=600,menubar=yes,scrollbars=yes,location=no,left=100,top=100";
		 var cloneTable 	= $("#viewTable").clone();
		 cloneTable.find('input[type=text],select,textarea').each(function(){
			var elementType	= $(this).prop('tagName');	
			if(elementType=='SELECT')
				var textVal	= $(this).find("option:selected").text();
			else
				var textVal	= $(this).val();
			$(this).replaceWith('<label>'+ textVal +'</label>');
		 });
		 cloneTable.find('a').each(function(){
			var anchorVal	= $(this).html();
			$(this).replaceWith('<label>'+anchorVal+'</label>');
		 });
		 	var pageTitle	= $("#title").text();
                        var pageDetails	= $("#printDetails").html();
                        
                        //console.log(pageDetails);
                        
                     // alert(pageDetails);
		 	var wWinPrint 	= window.open("",windowName,wOption);
			wWinPrint.document.open();
			wWinPrint.document.write("<html><head><link href='"+URL+"/css/Print.css' rel='stylesheet'><title></title><style>.image{width:150px;}</style></head><body>");
			//wWinPrint.document.write("<div id='header'><div class='pull-left text_logo'><h1 class='logo'>CMO<br /><span>Government of Odisha</span></h1></div><div class='clear'>&nbsp;</div></div>")
                        wWinPrint.document.write("<div id='header'><div class='pull-left text_logo'><img src='"+URL+"/images/logo.gif' style='width:480px;height: 80px;' /></div><button type='button' onClick='window.print();' class='btn btn-success noPrint'>Print</button><div class='clear'>&nbsp;</div></div>")
			if(typeof(pageDetails)!='undefined'){
                        wWinPrint.document.write("<div id='printHeader'>" + pageTitle + ' ' + pageDetails + "</div>");	
                                            }else{
                        wWinPrint.document.write("<div id='printHeader'>" + pageTitle +"</div>");                       
                                            }
			wWinPrint.document.write("<div id='printContent'>"+cloneTable.html()+"</div>");
			wWinPrint.document.write("<div id='printFooter'>Copyright &copy; "+new Date().getFullYear()+" Mo Sarkar, All Rights Reserved.</div>");
			wWinPrint.document.write("</body></html>");
			wWinPrint.document.close();
			wWinPrint.focus();
		return wWinPrint;
}

//===================== Function to print modal content By Sunil Kumar Parida On 3-Jan-2015 ==========
function printModal(title,content)
{	
	 var windowName = "PrintPage";
	 var wOption 	= "width=1000,height=600,menubar=yes,scrollbars=yes,location=no,left=100,top=100";
	 var cloneTable 	= $("#"+content).clone();
	 cloneTable.find('input[type=text],select,textarea').each(function(){
		var elementType	= $(this).prop('tagName');	
		if(elementType=='SELECT')
			var textVal	= $(this).find("option:selected").text();
		else
			var textVal	= $(this).val();
		$(this).replaceWith('<label>'+textVal+'</label>');
	 });
	 cloneTable.find('a').each(function(){
		var anchorVal	= $(this).html();
		$(this).replaceWith('<label>'+anchorVal+'</label>');
	 });
		var pageTitle	= $("#"+title).text();
		var wWinPrint 	= window.open("",windowName,wOption);
		wWinPrint.document.open();
		wWinPrint.document.write("<html><head><link href='"+URL+"/css/print.css' rel='stylesheet'><title></title></head><body>");
		wWinPrint.document.write("<div id='header'><div class='pull-left text_logo'><h1 class='logo'>Centre for Environmental Studies<br /><span>Government of Odisha</span></h1></div><div class='clear'>&nbsp;</div></div>")
		wWinPrint.document.write("<div id='printHeader'>" + pageTitle + "</div>");		
		wWinPrint.document.write("<div id='printContent'>"+cloneTable.html()+"</div>");
		wWinPrint.document.write("<div id='printFooter'>&copy; 2015-16, Centre for Environmental Studies, Government of Odisha</div>");
		wWinPrint.document.write("</body></html>");
		wWinPrint.document.close();
		wWinPrint.focus();
		return wWinPrint;
	
}
// ******************** function for Date & Time ********************** //
	function dateTime(idVal)
	{
		//Set Weedday against current day in numeric
		var WeekDay	= new Array(7);
		WeekDay[0]	= "Sunday";
		WeekDay[1]	= "Monday";
		WeekDay[2]	= "Tuesday";
		WeekDay[3]	= "Wednesday";
		WeekDay[4]	= "Thursday";
		WeekDay[5]	= "Friday";
		WeekDay[6]	= "Saturday";
		
		//Set month Name against current Month in numeric 
		var monthName = new Array( "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec")
		
		var CurDateTime	= new Date();
		//alert(CurDate);
		var curDay		= CurDateTime.getDay();
		var curDate		= CurDateTime.getDate();
		var curMonth	= CurDateTime.getMonth();
		var curYear		= CurDateTime.getFullYear();
		var curHH		= CurDateTime.getHours();
		var curMM		= CurDateTime.getMinutes();
		var curSS		= CurDateTime.getSeconds();
		
		if(curHH>=12)
		{
			curHH=curHH-12;
			var Hour = "PM";
		}
		else
			var Hour = "AM";
			
		if(curMM<10)
			curMM='0'+curMM;
		if(curSS<10)
			curSS='0'+curSS;
		
		var date	 	= "<span class='clock'>"+WeekDay[curDay]+", "+monthName[curMonth]+" "+curDate+", "+curYear+"  "+curHH+":"+curMM+":"+curSS+" "+Hour+"</span>";
		//alert(date)
		$('#'+idVal).html(date);
		setTimeout('dateTime(\''+idVal+'\')',1000);
	}
 //======== Function for set cookie value By Sunil Kumar Parida On 11/09/2014 =========
	function setCookie(cname,cvalue,exdays) 
	{
		removeCookie(cname);
		var d = new Date();
		d.setTime(d.getTime() + (exdays*60*60*1000));
		var expires = "expires=" + d.toGMTString();
		document.cookie = cname+"="+cvalue+"; "+expires;
	}
	//======== Function for get cookie value By Sunil Kumar Parida On 11/09/2014 =========
	function getCookie(cname) 
	{
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++) 
		{
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1);
			if (c.indexOf(name) != -1) 
			{
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}
	//======== Function for remove cookie By Sunil Kumar Parida On 11/09/2014 =========
	function removeCookie(cname) 
	{    
		document.cookie = cname+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
	}
	//======== Function for redirect to page By Sunil Kumar Parida On 11/09/2014 =========
	function goToPage(page,Gl,Pl,GlName,PlName)
	{
               setSessionValues(Gl,Pl,GlName,PlName,page);
//		setCookie("GLink",Gl,2);
//		setCookie("PLink",Pl,2);	
//		setCookie("GlName",GlName,2);
//		setCookie("PlName",PlName,2);
//               if(PlName=='Social Wall'){
//                    window.open(page,'_blank');
//                }else{
//                        window.location.href=page;
//                }
	}
//scripts for popover
$(function () { 
		if($(".popover-html").length>0)
			$(".popover-html").popover({ html : true });		
});


//Function to textcounter.
	function TextCounter(ctlTxtName,lblCouter,numTextSize)
    {
		 var txtName = $('#'+ctlTxtName).val();		
		 var txtNameLength = txtName.length;
		 if (parseInt(txtNameLength) > parseInt(numTextSize)) 
		 {
		 	var txtMaxTextSize = txtName.substr(0,numTextSize);
		 	$("#"+ctlTxtName).val(txtMaxTextSize);		 
		 	alert("Entered Text Exceeds '"+ numTextSize +"' Characters.");
		 	$("#"+lblCouter).text(0);		  
		 	return false;
		 }
		 else
		 {
			 $("#"+lblCouter).text ( parseInt(numTextSize) -parseInt(txtNameLength));			 
		   	  return true;
		   
		 }
    }
    // ****************** function for Delete Records ***************** //
	function gotoDelete(action)
	{	
		var PIds='';
		$('.chkItem').each(function(){
			if($(this).is(':checked'))
				PIds	+= $(this).val()+',';
		});
		if(PIds.length>0)
		{
			PIds        = PIds.substring(0,PIds.length - 1);
			var pidVal  =  PIds.split(',');
			if(action=='D')
			{
				confirmAlert('Are you sure to delete selected Record(s)?');				
			}
			if(action=='AC')
			{
				confirmAlert('Are you sure to active selected Record(s)?');
			}
			if(action=='AC1')
			{
				confirmAlert('Are you sure to active selected Record(s)?');
			}
			if(action=='IN')
			{
				confirmAlert('Are you sure to inactive selected Record(s)?');
			}
			if(action=='IN1')
			{
				confirmAlert('Are you sure to inactive selected Record(s)?');
			}
			
			if(action=='P')
			{
				confirmAlert('Are you sure to publish selected Record(s)?');
			}
			if(action=='UP')
			{
				confirmAlert('Are you sure to Unpublish selected Record(s)?');
			}
                        
			$('#btnConfirmOk').on('click',function(){
				$("#hdn_ids").val(PIds);
				$("#hdn_qs").val(action);
				$('form').submit();
			});
		}
		else
		{
			viewAlert('Please select a record!');
			return false;
		}		
	}
        
       
	
	function DoPaging(CurrentPage,RecordNo)
	{
		$("#hdn_PageNo").val(CurrentPage);
		$("#hdn_RecNo").val(RecordNo);
		$("form").submit();
	}
	function callPageNo(pageSize){ 
		var pageNo = parseInt($('#txtPageNo').val());
		var intRecno = (pageNo-1)*pageSize;        
		DoPaging(pageNo, intRecno);
	}
	
	function AlternatePaging()
	{
		if($('#hdn_IsPaging').val()=="0")	
			$("#hdn_IsPaging").val("1");
		else	
			$("#hdn_IsPaging").val("0");
		$("form").submit();	
	}
        
        function displayCkeditor(id)
        {
            if(CKEDITOR.instances[id])
            {
                CKEDITOR.remove(CKEDITOR.instances[id]);
            }

            CKEDITOR.replace(id,  {			
                            filebrowserBrowseUrl : URL+"/controller/browser.php",
                filebrowserUploadUrl :      URL+"/controller/upload.php?type=files",
                filebrowserImageUploadUrl : URL+"/controller/upload.php?type=images",
                filebrowserFlashUploadUrl : URL+"/controller/upload.php?type=flash"
            });
                    CKEDITOR.on( 'dialogDefinition', function( ev ) {
                            // Take the dialog name and its definition from the event data.
                            var dialogName = ev.data.name;
                            var dialogDefinition = ev.data.definition;

                            // Check if the definition is from the dialog window you are interested in (the "Link" dialog window).
                            if ( dialogName == 'image' ) {
                               $('#hdnHttp').val('http://');
                            }
                            else if(dialogName == 'link')
                            {
                             $('#hdnHttp').val('');
                             }
                    });
        }
		
		// *** Script for show hide search pannel by Sunil Kumar Parida on 18th Oct 2013 ****//
function viewSearchPannel(flag, pannelId, buttonId)
{
	if(flag=='S')
	{
		$('#'+pannelId).show();
		$('#'+buttonId).html('Close Search Panel <i class="bigger-110 fa fa-chevron-circle-up"></i>');
	}
	else
	{
		$('#'+pannelId).hide();
		$('#'+buttonId).html('Open Search Panel <b class="bigger-110 fa fa-chevron-circle-down"></b>');
	}
	$("#"+buttonId).click(function(){
		$("#"+pannelId).slideToggle('slow', function() {
          if ($("#"+pannelId).is(":hidden")) 
			$("#"+buttonId).html('Open Search Panel <i class="bigger-110 fa fa-chevron-circle-down"></i>');
		else
			$('#'+buttonId).html('Close Search Panel <i class="bigger-110 fa fa-chevron-circle-up"></i>');	
        });		
	});
}
// *** Script for function to check duplicate by Rasmi Ranjan Swain on 18th Feb 2015 ****//

function hasDuplicates(array) {
           var valuesSoFar = [];
           var flag =0;
           for (var i = 0; i < array.length; ++i) {
               var value = array[i];
               if (valuesSoFar.indexOf(value) !== -1) {           
                         flag++;
               }
               valuesSoFar.push(value);
           }
        return flag;
       }
       
     // function to scroll to topposition
 function scrollToPosition(id)
{  
    $('html, body').animate({ scrollTop: $('#'+id).offset().top-300 }, 'slow');
    $('#'+id).focus();
}
//*** Function for copy Address from Correspondence to Permanent Address, Created by Rasmi ranjan swain 12/March/2015 ***//
function copyAddress(chkField, ParmanentField, CorresspondenceFeild){
		if($('#'+chkField).attr('checked'))
			$('#'+ParmanentField).val($('#'+CorresspondenceFeild).val());
		else
			$('#'+ParmanentField).val('');
	}

// eXPORT TO EXCEL by: chinmayee

	function exportToExcel()
    {
        
        //Check if browser is IE or not
        if (navigator.userAgent.search("MSIE") >= 0) {
           // alert("Browser is InternetExplorer");
           exportToExcel_Firefox_IE();
        }
        //Check if browser is Chrome or not
        else if (navigator.userAgent.search("Chrome") >= 0) {
           // alert("Browser is Chrome");
		  exportToExcel_Chrome();
		 // exportToExcel_Firefox_IE();
        }
        //Check if browser is Firefox or not
        else if (navigator.userAgent.search("Firefox") >= 0) {
           // alert("Browser is FireFox");
            exportToExcel_Firefox_IE();
        }
        //Check if browser is Safari or not
        else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
            //alert("Browser is Safari");
            exportToExcel_Firefox_IE();
        }
        //Check if browser is Opera or not
        else if (navigator.userAgent.search("Opera") >= 0) {
            // alert("Browser is Opera");
             exportToExcel_Firefox_IE();
        }
    }
    
/*function exportToExcel_Chrome()
{
     // window.open('data:application/vnd.ms-excel,' + $('#print-area').html());
        var a = document.createElement('a');
        //getting data from our div that contains the HTML table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('dataTable');
		var name = document.getElementById("dataTable").getAttribute("data-name");
		var tab_text="";
		var j=0;
		//tab = document.getElementById('dataTable'); // id of table
//alert(table_div.rows[0].cells.length); no of column count
		for(j = 0 ; j < table_div.rows.length ; j++) 
		{     
		tab_text=tab_text+table_div.rows[j].innerHTML+"</tr>";
		//tab_text=tab_text+"</tr>";
		}
		//var table_html = table_div.outerHTML.replace(/ /g, '%20');
		tab_text=tab_text+"</table>";
		tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
		tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
		tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

       // sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text)); 
       // console.log(table_html);
		 a.href = data_type + ', ' + tab_text;
		//txtArea1.document.open("txt/html","replace");
		//a.href = data_type + ', ' + tab_text.outerHTML;
		

        //setting the file name
	   // a.download = name+'.xls';
	    a.download = 'excel.xls';
        //triggering the function
        a.click();
        //just in case, prevent default behaviour
      //  e.preventDefault();
}
*/






	function exportToExcel_Chrome()
	{
		 // window.open('data:application/vnd.ms-excel,' + $('#print-area').html());
			var a = document.createElement('a');
			//getting data from our div that contains the HTML table
			var data_type = 'data:application/vnd.ms-excel';
			var table_div = document.getElementById('dataTable');
			var name = document.getElementById("dataTable").getAttribute("data-name");
			var table_html      = table_div.outerHTML.replace(/ /g, '%20');
			table_html          = table_html.replace(/#/g, "");
		    //console.log(table_html);
			a.href = data_type + ', ' + table_html;
			//setting the file name
			var dt = new Date();
			var curDatetime = dt.getDate()+"_"+(dt.getMonth()+1)+"_"+dt.getFullYear()+"_"+dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
			
			a.download = 'Excel_data_'+curDatetime+'.xls';
			//triggering the function
			a.click();
			//just in case, prevent default behaviour
		  //  e.preventDefault();
	}











function exportToExcel_Firefox_IE()
{
     
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
	var textRange; 
	var j=0;
    tab = document.getElementById('dataTable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        //alert(1);
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else{   
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  
    }
    return (sa);
}



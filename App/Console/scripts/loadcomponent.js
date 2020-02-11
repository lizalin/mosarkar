var printMe
var indicate
var backMe
var refreshMe
var deleteMe
var activeMe
var inactiveMe
var enableMe
var disableMe
// *** Script for get Absolute path and Updated by Sudam Chandra Panda on 28th Jun 2012 ****//
	var host 		= window.location.host;
	var pathInfo	= window.location.pathname;
	var path		= pathInfo.split("/");
	var FN1			= path[1];
	var FN2			= path[2];
	var url 		= "http://"+host+"/"+FN1+"/"+FN2;
        var conUrl		= "http://"+host+"/"+FN1+"/"+FN2 +"/"+FN3;
		
// *** Script for display Page Title and Updated by Sudam Chandra Panda on 22nd Aug 2012 ****//
	function configTitleBar()
	{
		if($("#title"))
		{
			$("#title").html(pageHeader);
		}
		
		var FirstLink = strFirstLink;
		var LastLink = strLastLink;
		if(FirstLink=="")
		{
			FirstLink = "";
		}
		else
		{
			FirstLink = FirstLink+"&nbsp; ||";
		}
		
		$("#navigation").html("<a href='"+conUrl+"/welcome' class='home'>Home</a> " +  "&nbsp;|| &nbsp; "+FirstLink+" "+LastLink+" ")
	}
// *** Script for display Top Bar and Updated by Sudam Chandra Panda on 26th Jun 2012 ****//	
	function loadTopBar()
	{
		 
		 if ($("#topBarBg").is(":hidden")) 
		 {
			$("#topBarBg").slideDown("slow");
		 }
		 
		 $("#topBarBg .close").click(function(){
				$("#topBarBg").slideUp();
			  })
	}
// *** Script for Show & Hide menu Control and Updated by Sudam Chandra Panda on 26th Jun 2012 ****//	
	var tempMenuHTml=""
	function menuCtr()
	{
		$("#MnCtr a").attr('title','Hide Menu');
		$("#MnCtr a").click(function(){
			$("#menulft").toggle('fast');					 
			$("#LeftMenu").animate({width: "toggle"}, "fast" );	
			$(this).toggleClass("close");
			if($(this).attr('class')=="close")
				$(this).attr('title','Show Menu');
			else
				$(this).attr('title','Hide Menu');
			/*if(tempMenuHTml=="")
			{
				tempMenuHTml=$(".menulft").html();						
			}
			if($(this).hasClass('close')==false)
			{
				$("#LeftMenu .accNav:eq(0)").hide()
				$("#LeftMenu h1").text(" ");
				$(".menulft ") .html("");
				$("#LeftMenu").animate({width: "10px"}, "fast" );
				$("#MnCtr").animate({marginLeft:"8px"},"fast");
				$(this).addClass("close");
			}
			else
			{				
			   $("#LeftMenu .accNav:eq(0)").fadeIn()  
			   $("#LeftMenu").animate({width:"180px"}, "fast");
			   $("#LeftMenu h1").text("Relate Activities");	
				$(".menulft").html(tempMenuHTml)
			   $("#MnCtr").animate({marginLeft:"180px"},"fast");
			   $(this).removeClass("close");
			}*/
		  })
	}
// *** Script for blur and focus effect in input box and created by Sudam Chandra Panda on 30th Aug 2012 ****//		
	function txtBoxEffect()
	{
		$("input[type=text],[type=password],textarea").focus(function(){
			$(this).addClass("Focus");									   
		});
		
		$("input[type=text],[type=password],textarea").blur(function(){
			$(this).removeClass("Focus");									   
		});
	}
// *** Script for select all the checkbod and Updated by Sudam Chandra Panda on 25th July 2012 ****//
	function isSelectAll(CheckBoxControl,Formname) 
	{
		var FormNM = document.getElementById(Formname);
		//alert(CheckBoxControl);
		if (CheckBoxControl.checked == true) 
		 {			    
			var i;
			for (i=0; i < FormNM.elements.length; i++) 
			{
				if (FormNM.elements[i].type == 'checkbox') 
					{
						if(FormNM.elements[i].disabled==false)
						FormNM.elements[i].checked = true;
					}
			}
		} 
		else 
		{
			var i;
			for (i=0; i < FormNM.elements.length; i++) 
			{
				if (FormNM.elements[i].type == 'checkbox')  
				{
				 FormNM.elements[i].checked = false;
				}
			}
		}
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
			$(this).replaceWith('<label>'+textVal+'</label>');
		 });
		 cloneTable.find('a').each(function(){
			var anchorVal	= $(this).text();
			$(this).replaceWith('<label>'+anchorVal+'</label>');
		 });
		 
		 	var wWinPrint 	= window.open("",windowName,wOption);
			wWinPrint.document.open();
			wWinPrint.document.write("<html><head><link href='"+conUrl+"/styles/print.css' rel='stylesheet'><title>PHP Admin Console</title></head><body>");
			wWinPrint.document.write("<div id='header'><img src='"+conUrl+"/images/websiteLogo.png' style='height:58px;' alt='Department of Town and Country Planning, Himachal Pradesh' title='Department of Town and Country Planning, Himachal Pradesh'></div>")
			wWinPrint.document.write("<div id='printHeader'>" + pageHeader + "</div>");		
			wWinPrint.document.write("<div id='printContent'>"+cloneTable.html()+"</div>");
			wWinPrint.document.write("</body></html>");
			wWinPrint.document.close();
			wWinPrint.focus();
		return wWinPrint;
	}
// *** Script for default focus of field and Updated by Sudam Chandra Panda on 26th Jun 2012 ****//	
	function defaultfocus(FieldName)
		{
			$('#'+FieldName).focus()
		}
// *** Script for cancel the filled data and updated by Sudam Chandra Panda on 26th Jun 2012 ****//	
	function doCancel(FilePath)
		{
			document.location.href=conUrl+'/'+FilePath;
		}
// *** Script for paging and updated by Sudam Chandra Panda on 25th July 2012 ****//	
	function DoPaging(CurrentPage,RecordNo)
	{
		document.getElementById("hdn_PageNo").value=CurrentPage;
		document.getElementById("hdn_RecNo").value=RecordNo;
		document.frmAdmin.submit();
	}
// *** Script for aleternate page and Updated by Sudam Chandra Panda on 25th July 2012 ****//	
	function AlternatePaging()
	{
		if(document.getElementById('hdn_IsPaging').value=="0")	
			document.getElementById("hdn_IsPaging").value="1";
		else	
			document.getElementById("hdn_IsPaging").value="0";
		document.frmAdmin.submit();	
	}
function gotoDelete(StartIndex,EndIndex,action)
	{	
		var PIds='';
		for (i=StartIndex; i <= EndIndex; i++) 
			{
				var itemName='cbItem'+i;
				var PidField='hdnId'+i;
				if(document.getElementById(itemName))
				{
					if (document.getElementById(itemName).checked == true)
						{
							PIds+=','+document.getElementById(PidField).value;
							
						}
				}
			}
		if(PIds.length>1)
		{
			if(action=='D')
			{
				if(!confirm('Are you sure to delete selected Record(s)'))	
					return false;	
			}
			if(action=='AC')
			{
				if(!confirm('Are you sure to activate selected Record(s)'))	
					return false;	
			}
			if(action=='IN')
			{
				if(!confirm('Are you sure to inactive selected Record(s)'))	
					return false;	
			}
			if(action=='US')
			{
				if(!confirm('Are you sure to change the position of selected Record(s)'))	
					return false;	
			}
			if(action=='AP')
			{
				if(!confirm('Are you sure to change the  selected  Designation To Temporary'))	
					return false;	
			}
			if(action=='AT')
			{
				if(!confirm('Are you sure to change the  selected  Designation To Permanent'))	
					return false;	
			}
			if(action=='EX')
			{
				if(!confirm('Are you sure to make  selected  user(s) to ex-employee'))	
					return false;	
			}
			if(action=='ER')
			{
				if(!confirm('Are you sure to Activate  Roaming Access'))	
					return false;	
			}
			if(action=='DR')
			{
				if(!confirm('Are you sure to Deactivate  Roaming Access'))	
					return false;	
			}
			if(action=='UG')
			{
				if(!confirm('Are you sure to Update User Group'))	
					return false;	
			}
			
			PIds=PIds.substr(1);
			//alert(PIds);
			$("#hdn_qs").val(action);
			$("#hdn_ids").val(PIds);
			$('form').submit();
		}
		else
		{
			alert('Please select a record!');
			return false;
		}
	}
	
	
// *** Script for checkbox design ****//
function setupLabel() {
	if ($('.label_check input').length) {
		$('.label_check').each(function(){ 
			$(this).removeClass('c_on');
		});
		$('.label_check input:checked').each(function(){ 
			$(this).parent('label').addClass('c_on');
		});                
	};
	
};

// *** Script for change the row color against checked the checkbox and created by Sudam Chandra Panda on 30th Aug 2012 ****//		
	function RowColChange(){
		var inputChk = $("#viewTable input");
		var inputAllChk = $("input[name=cbBOX]");
		var rowSelector = $("#viewTable tr");
		(inputAllChk).click(function(){			
			if($(this).is(":checked"))
			{
				rowSelector.addClass("select");
			}
			else
			{
				rowSelector.removeClass("select");
			}
		});
		(inputChk).click(function(){
			if($(this).is(":checked"))
			{
				$(this).parent().parent().parent().addClass("select");
			}
			else
			{
				$(this).parent().parent().parent().removeClass("select");
			}
		var chkLength	= $("input[type=checkbox]:not(#cbBOX)").length;
		var checkedChk	= $("input[type=checkbox]:checked:not(#cbBOX)").length;		
		if(checkedChk<chkLength){
			$('#cbBOX').attr('checked', false);
			}
		else{
			$('#cbBOX').attr('checked', true); 
			}
		});
	}
	function defaultBtn(evt,funName)
	{
		 var charCode = (evt.which) ? evt.which : event.keyCode;
		 if(charCode==13)
		 {
		 	return funName();
		 }
	}
	function lessDate(dateFrom,dateTo,controlName,msg)
	{
		var splDateFrom		= dateFrom.split("-");
		var date_from		= new Date(splDateFrom[2],splDateFrom[1],splDateFrom[0]);
		var splDateTo		= dateTo.split("-");
		var date_To			= new Date(splDateTo[2],splDateTo[1],splDateTo[0]);
		
		if(date_from>date_To)
		{
			alert(msg);
			$('#'+controlName).focus();
			return false;
		}	
		return true;
	}
	//=========== Function to compare two time By sunil kumar parida On 21/10/2013=====
	function lessTime(lessTimeControl, GreaterTimeControl, msg)
	{		
		//start time
		var lessTime = $("#"+lessTimeControl).val();
		
		//end time
		var greaterTime = $("#"+GreaterTimeControl).val();
		if(lessTime!='' && greaterTime!='')
		{
			//convert both time into timestamp
			var stt = new Date("January 01, 2000 " + lessTime);
			stt = stt.getTime();
			
			var endt = new Date("January 01, 2000 " + greaterTime);
			endt = endt.getTime();
			
			if(stt >= endt) {
				alert(msg); 
				$('#'+GreaterTimeControl).focus();
				return false;
			}	
		}
		return true;
		
	}
	
	//========== Function to check username By sunil kumar parida On 05/11/2013 =============
	function validUserName(fieldId, msg)
	{
		var userName	= $('#'+fieldId).val();
		if(userName.indexOf(' ')>0)
		{
			alert(msg);	
			$('#'+fieldId).focus();
			return false;
		}
		return true;
	}
	//Check User Name ============================
	function isUserName(evt)
	{
		 var charCode = (evt.which) ? evt.which : event.keyCode
		 if (charCode == 32)
			return false;
		
		 return true;
	}
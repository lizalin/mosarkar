// JavaScript Document
$(document).ready(function(){
	$('form').attr('autocomplete','off');
	$('input[type=text],textarea').keyup(function(){
		return blockspecialchar_first(this);
		 bindHeader();
	});
	$('input[type=reset]').click(function(){		
		if($('#lblChar1').length>0)
		{
			$('#lblChar1').html('500');
		}
		if($('#lblChar').length>0)
		{
			$('#lblChar').html('500');
		}
	});
	/**/
	//history.forward(0);
});

function importScript(JSurl){
   document.write('<script type="text/javascript" src="'+JSurl+'"></script>');
   
}


// *** Script for get Absolute path and created by Sudam Chandra Panda on 27th Jun 2012 ****//
var host=window.location.host;
var pathInfo=window.location.pathname;
var path=pathInfo.split("/");
var FN1=path[1];
var FN2=path[2];
var FN3=path[3];
var url = "http://"+host+"/"+FN1+"/"+FN2+'/'+FN3;
// *** Script for call external Script and created by Sudam Chandra Panda on 27th Jun 2012 ****//

importScript(url+'/scripts/validator.js');
importScript(url+'/scripts/loadcomponent.js');
//importScript(url+'/scripts/loadJson.js');
// Accept all character except Numeric and created by Sunil kumar parida =============
function isNumberKey(evt)
  {
	 var charCode = (evt.which) ? evt.which : event.keyCode
	 if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	 return true;
  }
// *** Script for show hide search pannel by Sunil Kumar Parida on 18th Oct 2013 ****//
function viewSearchPannel(flag, pannelId, buttonId)
{
	if(flag=='S')
	{
		$('#'+pannelId).show();
		$('#'+buttonId).text('Close Search Panel');
	}
	else
	{
		$('#'+pannelId).hide();
		$('#'+buttonId).text('Open Search Panel');
	}
	$("#"+buttonId).click(function(){
		$("#"+pannelId).slideToggle('slow', function() {
          if ($("#"+pannelId).is(":hidden")) 
			$("#"+buttonId).text('Open Search Panel');
		else
			$('#'+buttonId).text('Close Search Panel');	
        });		
	});
}

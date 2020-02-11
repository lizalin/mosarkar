/*===============================================================================================
	File Name         	  : loadAjax.js
	Description			  : Scripts for loading database value through ajax
	Created By			  :	Sunil Kumar Parida
    Created On			  :	19th-Nov-2012
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>
	

==============================================================================================*/
// =============== Script for get Absolute path  ============================
	var host 		= window.location.host;
	var pathInfo	= window.location.pathname;
	var path		= pathInfo.split("/");
	var FN1			= path[1];
	var FN2			= path[2];
	var absPathUrl 	= "http://"+host+"/"+FN1+"/"+FN2+"/";
	
function httpRequest()
{
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	return xmlhttp;
}
//================= Get max serial number on selecting Global link ==========================
function getNodeValues(url,idVal,controlId,selVal)
{
	var urlPath	= url+'/'+idVal+'/'+selVal;
	//console.log(urlPath);
	if(idVal>0)
	{
		var xmlHRequest=httpRequest();	
		xmlHRequest.onreadystatechange=function()
		  {
		  if (xmlHRequest.readyState==4 && xmlHRequest.status==200)
			{
				var result	=xmlHRequest.responseText;//alert(result);
				$('#'+controlId).html(result);
			}
		  }
		xmlHRequest.open("GET",urlPath,true);
		xmlHRequest.send();
	}
	else
	{
		$('#'+controlId+' option').remove();
		$('#'+controlId).append('<option value="0" title="Select">--Select--</option>');
	}
}
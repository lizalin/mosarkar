<input name="pirntHtxt" id="pirntHtxt" type="hidden" value="" />
<input name="pirntFtxt" id="pirntFtxt" type="hidden" value="" />
<script language="javascript">
		function dispPrintHeader(){
			var pHeader	= $('#pirntHtxt').val();
			var pFooter	= $('#pirntFtxt').val();
			PrintPage(pHeader,pFooter);
			
			}
</script>
<div class="utilBox">
<div style="float:right; margin:8px 0px 0px 4px; width:168px; position:relative; text-align:right;" class="mandatory" id="indicate">
	<img src="<?php echo $strPath;?>images/indicates.gif"  align="absmiddle" />(*) indicates mandatory field
</div>
    <a href="#" title="Delete" data-toggle="tooltip" data-placement="top" id="deleteIcon" class="btn btn-small left border" onclick="gotoDelete($('#hdnStartIndex').val(),$('#hdnEndIndex').val(),'D');"><i class="icon-trash"></i></a>
    
    <a href="javascript:dispPrintHeader();void(0)" data-toggle="tooltip" data-placement="top" title="Print" id="printIcon" class="btn btn-small left border" ><i class="icon-print"></i></a>

    <a href="javascript:void(0)" title="Make Inactive" id="inactiveIcon" data-toggle="tooltip" data-placement="top" class="btn btn-small left border" onclick="gotoDelete($('#hdnStartIndex').val(),$('#hdnEndIndex').val(),'IN');"><i class="icon-remove"></i></a>
    
    <a href="javascript:void(0)" title="Make Active" id="activeIcon" data-toggle="tooltip" data-placement="top" class="btn btn-small left border" onclick="gotoDelete($('#hdnStartIndex').val(),$('#hdnEndIndex').val(),'AC');"><i class="icon-ok"></i></a>
    
    <a href="javascript:void(0)" title="Disable" id="disableIcon" data-toggle="tooltip" data-placement="top" class="btn btn-small left border"><i class="icon-ban-circle" ></i></a>
    
    <a href="javascript:void(0)" title="Enable" id="enableIcon" data-toggle="tooltip" data-placement="top" class="btn btn-small left border"><i class="icon-ok-circle"></i></a>
    
    <a href="javascript:void(0)" title="Refresh" data-toggle="tooltip" data-placement="top" id="refreshIcon" class="btn btn-small left border" onclick="location.reload();"><i class="icon-refresh"></i></a>
    
    <a href="javascript:void(0)" onclick="goBack();" data-toggle="tooltip" data-placement="top" title="Back" id="backIcon" class="btn btn-small left border"><i class="icon-arrow-left"></i></a>
</div>    

<script language="javascript" type="text/javascript">

$(document).ready(function(){
			$("#printIcon").tooltip();
			$("#backIcon").tooltip();
			$("#refreshIcon").tooltip();
			$("#deleteIcon").tooltip();
			$("#inactiveIcon").tooltip();
			$("#enableIcon").tooltip();
			$("#disableIcon").tooltip();
			$("#activeIcon").tooltip();
	
});
	function goBack()
	{
		var referrer =  document.referrer;
		window.location.href = referrer;
	}			
$("#printIcon").hide();
$("#backIcon").hide();
$("#refreshIcon").hide();
$("#deleteIcon").hide();
$("#activeIcon").hide();
$("#inactiveIcon").hide();
$("#indicate").hide();
$("#disableIcon").hide();
$("#enableIcon").hide();
		
if(backMe=="yes")
	{
		//document.getElementById('backIcon').style.display='block'
	}
if(printMe=="yes")
	{
		document.getElementById('printIcon').style.display='block'
	}

if(refreshMe=="yes")
	{
		document.getElementById('refreshIcon').style.display='block'
	}
if(deleteMe=="yes")
	{
		document.getElementById('deleteIcon').style.display='block'
	}
if(activeMe=="yes")
	{
		document.getElementById('activeIcon').style.display='block'
	}
if(inactiveMe=="yes")
	{
		document.getElementById('inactiveIcon').style.display='block'
	}
if(enableMe=="yes")
	{
		document.getElementById('enableIcon').style.display='block'
	}
if(disableMe=="yes")
	{
		document.getElementById('disableIcon').style.display='block'
	}
if(indicate=="yes")
	{
		document.getElementById('indicate').style.display='block'
	}

</script>						
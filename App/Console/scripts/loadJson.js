// JavaScript Document
	var hostName	= window.location.host;
	var pathName	= window.location.pathname;
	var path		= pathName.split("/");
	var FN1			= path[1];
	var FN2			= path[2];
        var FN3			= path[3];
	var siteURL		= 'http://'+hostName+'/'+FN1+'/'+FN2+'/'+FN3+'/';
        //alert(siteURL);
	
	$(document).ready(function(){
           bindHeader();
	});
	// Fill Working Location Name By Sunil Kumar parida On 13/11/2013 //
	$.fillPHLocation = function(fillControl,selVal) {
		
		$.ajax({
			type: "GET",
			url: siteURL+"xml/timezone.xml",
			dataType: "xml",
			async: false,
			success: function(xml) {				
				var x = $(xml).find('ZONE');
				$('#' + fillControl + ' option').remove();	
				$('#'+fillControl).append("<option value='0'>" + "--Select--" + "</option>");
				x.each(function(i) {
					var sel			= '';
					var zoneId 		= $(this).find('ID').text();
					var zoneName 	= $(this).find('NAME').text();
					if (selVal == zoneId) {
						sel			= 'selected="selected"';
					}	
					$('#'+fillControl).append("<option value='" + zoneId + "' title='" + zoneName + "' "+sel+">" + zoneName + "</option>");
				});
			}
		});
	}
	
	//===== Common Function for json call ========
	function getServerData(method,returnEvent,idParam)
	{
		var url = siteURL+"class_file/proxy.php?method="+method;	
		if(idParam!='')
		{
			url+='&'+idParam;	
		}
		$.getJSON(url, function(json) {		
			$(document).trigger(returnEvent, [json]);			
		});	
	}	
	
	//===== Fill Global link ==========
	function fillGlink(selval)
	{
		var param	= "SelVal="+selval;
		getServerData("gLink","globalLink",param);
		$(document).bind("globalLink", function(e, myName, myValue){	
				var opt	= myName.gLink.glID;
				$('#selGL').html(opt);		
		});
	}
	
	//====== Fill function action ==============
	function fillAction(funcId)
	{
		$(document).unbind("funcActions");
		if(funcId>0)
		{
			var param	= "FID="+funcId;
			getServerData("action","funcActions",param);
			$(document).bind("funcActions", function(e, myName, myValue){	
					var action1	= myName.action.action1;	
					var action2	= myName.action.action2;
					var action3	= myName.action.action3;
					$('#chkPermission1').show();
					$('#chkPermission2').show();
					$('#chkPermission3').show();
					if(action1=='')
						$('#chkPermission1').hide();
					if(action2=='')
						$('#chkPermission2').hide();
					if(action3=='')
						$('#chkPermission3').hide();
					$('#spnAction1').html(action1);
					$('#spnAction2').html(action2);
					$('#spnAction3').html(action3);
			});
		}
		else
		{
			$('#spnAction1').html('Action 1');
			$('#spnAction2').html('Action 2');
			$('#spnAction3').html('Action 3');
		}
	}
	
	//====== Fill Button ==============
	function fillButton(funcId,selval)
	{
		if(funcId>0)
		{
			var param	= "FID="+funcId+"&SelVal="+selval;
			getServerData("button","fillButton",param);
			$(document).bind("fillButton", function(e, myName, myValue){	
				var opt	= myName.btnId.BTN;
				$('#selButton').html(opt);
			});
		}	
		else
		{
			$('#selButton').html('<option value="0">--Select--</option>');
		}
	}
		
	// Function to fill subnode## By Rsmi Ranjan Swain##on##23-09-2013		
	function fillDesg(locId,hierarchyId,selval,fillControlId)
	{
           
		if(locId>0)
		{ 
			var param	= "locId="+locId+"&SelVal="+selval;
			getServerData("desg","fillDesg",param);
			$(document).bind("fillDesg", function(e, myName, myValue){	
				var opt	= myName.desgId.desg;
				$('#'+fillControlId).html(opt);
			});
		}	
		else if(hierarchyId>0)
		{
			var param	= "HID="+hierarchyId;
			getServerData("fillHierarchy","fillDesgLevel",param);
			$(document).bind("fillDesgLevel", function(e, myName, myValue){	
			var hierarchyIds	= myName.hierarchyFill;
			var explIds			= hierarchyIds.split(',');	
			var locationId		= explIds[Number(explIds.length)-1];
			$(document).unbind("fillDesg2");
				var param2	= "locId="+locationId+"&SelVal="+selval;
				getServerData("desg","fillDesg2",param2);
				$(document).bind("fillDesg2", function(e, myName2, myValue2){	
					var opt	= myName2.desgId.desg;
					$('#'+fillControlId).html(opt);
				});
			});									   
		}
		else
		{
			$('#'+fillControlId).html('<option value="0">--Select--</option>');
		}
	}
	
	// Function to fill grade## By Rsmi Ranjan Swain##on##23-09-2013	
	function fillGrade(locId,hierarchyId,selval,fillControlId)
	{
		if(locId>0)
		{ 
			var param	= "locId="+locId+"&SelVal="+selval;
			getServerData("grade","fillGrade",param);
			$(document).bind("fillGrade", function(e, myName, myValue){	
				var opt	= myName.gradeId.garde;
				$('#'+fillControlId).html(opt);
			});
		}
		else if(hierarchyId>0)
		{
			var param	= "HID="+hierarchyId;
			getServerData("fillHierarchy","fillGradeLevel",param);
			$(document).bind("fillGradeLevel", function(e, myName, myValue){	
			var hierarchyIds	= myName.hierarchyFill;
			var explIds			= hierarchyIds.split(',');	
			var locationId		= explIds[Number(explIds.length)-1];
			$(document).unbind("fillGrade2");
				var param2	= "locId="+locationId+"&SelVal="+selval;
				getServerData("grade","fillGrade2",param2);
				$(document).bind("fillGrade2", function(e, myName2, myValue2){	
					var opt	= myName2.gradeId.garde;
					$('#'+fillControlId).html(opt);
				});
			});									   
		}
		else
		{
			$('#'+fillControlId).html('<option value="0">--Select--</option>');
		}
	}
	
	// Function to fill hierarchy## By Sunil Kumar Parida##on##24-09-2013	
	function fillHierarchy(selval,fillControlId)
	{	
		var param	= "SelVal="+selval;
		getServerData("hierarchy","fillHierarchy",param);
		$(document).bind("fillHierarchy", function(e, myName, myValue){	
			var opt	= myName.hierarchy.hierarchyFill;
			$('#'+fillControlId).html(opt);
                       
                        //$("#"+fillControlId).chosen({width: "100%"});
		});
			
	}	
	
	// Function to fill hierarchy for add## By Sunil Kumar Parida##on##26-09-2013
	function fillSubnode(parentId,subNode,selVal,fillControlId,className,hdn,userFill,userFillId)
	{
		$(document).unbind("SubnodeFill");
                
		$(document).on("change",'.'+className, function (){
			var currentIndex	= $(this).closest("tr")[0].rowIndex;
			$('.'+className).each(function (){
				var allIndex	=$(this).closest("tr")[0].rowIndex;				
				if(allIndex>currentIndex)
				$(this).remove();
			});
										   
		});
		var lastHidden	= ($('.hidIndex').length>0)?Number($('.hidIndex').last().val())+1:1;
		var index		= ($('#hdnIndex1').length==0)?1:lastHidden;
		var fillIndex	= Number(index)+1;
		var hdnVal		= 0;
		$('.sel'+className).each(function (){
				if($(this).val()>0)
					hdnVal	= $(this).val();
				else
					return false;
		});
		$('#'+hdn).val(hdnVal);
		var mainParent	= parentId;
		parentId	= (parentId>0)?parentId:hdnVal;
		if(hdnVal>0)
		{ 
			var param	= "parentId="+parentId+"&subNodeId="+subNode+"&SelVal="+selVal;
			getServerData("SubNode","SubnodeFill",param);
			var tbl	= '';
			$(document).bind("SubnodeFill", function(e, myName, myValue){
				var subnodeVal	= myName.nodeValue.valueFill;
				var subNodeLabel= myName.nodeValue.subNodeLabel;
				var subNodeId	= myName.nodeValue.subNodeId;	
				var flag		= myName.nodeValue.flag;
				subNode			= subNodeId;
				var valueNum	= myName.nodeValue.valueNum;
				if(userFill=='U')	
				{
					fillUser(parentId,userFillId,0);
				}
				else
				{
					if(userFillId!='')	
						$('#'+userFillId).html('<option value="0">--Select--</option>');					
				}
				
				if(valueNum!=0 && mainParent>0 )
				{
					tbl	+= '<tr class="'+className+'" id="'+className+index+'"><td><span class="lbl'+className+'">'+subNodeLabel+'</span></td><td align="center" valign="middle">:</td><td>';
					tbl	+= '<select style="width:207px;" id="sel'+className+index+'" class="sel'+className+'" onchange="fillSubnode(this.value,'+subNode+',0,\''+className+index+'\',\''+className+'\',\''+hdn+'\',\''+userFill+'\',\''+userFillId+'\'); ">'+subnodeVal+'</select>';
					tbl	+=	'<input type="hidden" id="hdnIndex'+index+'" class="hidIndex" value="'+index+'"/>';
					tbl	+= '</td></tr>';		
					
					$('#'+fillControlId).after(tbl);
				}				
			});
		}			
	}
	
	// Function to fill hierarchy for update## By Sunil Kumar Parida##on##27-09-2013	
	function fillLevel(id,className,fillControl,locControlId,hdnHierarchy,hdnLocation)
	{		
		var param	= "HID="+id;
		getServerData("fillHierarchy","fillLevel",param);
		$(document).bind("fillLevel", function(e, myName, myValue){	
			var hierarchyIds	= myName.hierarchyFill;
			var explIds			= hierarchyIds.split(',');
			$('#hdnSelNode').val(explIds[Number(explIds.length)-1]);								
			var ParentParam	= "ParentId="+hierarchyIds+"&class="+className+"&hdn="+hdnHierarchy;
			getServerData("fillParent","fillParentLevel",ParentParam);
			$(document).unbind("fillParentLevel");
			$(document).bind("fillParentLevel", function(evt, myName1, myValue1){	
				var tbl		= myName1.tableRow.fillRow;
				var locId	= myName1.tableRow.locId;
				$('#'+fillControl).after(tbl);
				$('#'+locControlId).val(locId);
				$('#'+hdnLocation).val(locId);
				$('#'+hdnHierarchy).val(id);
			});			
		});
		
	}
	
	// Function to fill User## By Sunil Kumar Parida##on##03-10-2013	
	function fillUser(hirarchyId,fillControl,selVal)
	{
		var param	= "HID="+hirarchyId+"&selVal="+selVal;
		getServerData("userFill","fillUser",param);
		$(document).bind("fillUser", function(e, myName, myValue){	
			var opt	= myName.users;
			$('#'+fillControl).html(opt);
		});
	}
	
	// Function to fill Physical Location ## By Rsmi Ranjan Swain##on##23-09-2013	
	function fillPhysicalLoc(selval,fillControlId)
	{
		var param	= "SelVal="+selval;
		getServerData("phyLoc","fillPhyLoc",param);
		$(document).bind("fillPhyLoc", function(e, myName, myValue){	
			var opt	= myName.physicalLoc;
			$('#'+fillControlId).html(opt);
		});	
	}	

	//===== Function for call hrader & logo Data ========
	function bindHeader()
	{			
			getServerData("theme","theemeEvent","");
			$(document).bind("theemeEvent", function(e, myName, myValue){													
				var opt         = myName[0].option; 
				var hederText	= myName[0].headerText;
				var footerText	= myName[0].footerText;
				var url			= myName[0].url;
				var companyName	= myName[0].companyName;
				var loginLogo	= myName[0].loginLogo;
				var innerLogo	= myName[0].innerLogo;
				var portalLogo	= myName[0].portalLogo;
				var tabDiv='';
				if(opt==1)
				{
					tabDiv	+='<h1 style=" margin:2px 0px 0px 10px; padding:0px;">';
					tabDiv	+=companyName ;
					tabDiv	+='<br/>';
					tabDiv	+= hederText;
					tabDiv	+='</h1>'		
					$('#header').html(tabDiv);			
					$('#footertext').html(footerText);
					$('#footerUrl').html('<a href="'+url+'">'+url+'<a>');
				}
				if(opt==2)
				{ 
                                        var logoText = '<div class="logotitle"><h1>SOCIOMATIC</h1><h2>Government of Odisha</h2></div>';
					$('#header').html('<img src="'+siteURL+'uploadDocuments/Logo/Inner_logo/'+innerLogo+'">');
					$('#footertext').html(footerText);
					$('#footerUrl').html(url);
				}
				else
				{
					$('#header').html('<h1 style=" margin:2px 0px 0px 10px; padding:0px;">Header Text</h1>');
					$('#footertext').html('Footer Text');	
				}
				
			});
		}		
		
	// Function to check user name   ## By Sunil Kumar parida ## On 04-10-2013
	function checkUserName(userName,textControl,fillLabel,hdnExist)
	{
		if(userName!='')
		{
			var param	= "UName="+userName;
			getServerData("checkUserName","userName",param);
			$(document).bind("userName", function(e, myName, myValue){	
				var opt	= myName.userName;
				if(opt==1)		
				{
					$('#'+fillLabel).html('User name Already Exist');	
					$('#'+textControl).focus();					
				}
				else
					$('#'+fillLabel).html('');
					
				$('#'+hdnExist).val(opt);
			});
		}
		else
		{
			$('#'+fillLabel).html('');
			$('#'+hdnExist).val(0);
		}
		
	}	
	
	// Function to check user name   ## By Sunil Kumar parida ## On 04-10-2013
	function checkMailId(mailId,textControl,fillLabel,hdnExist)
	{
		if(mailId!='')
		{
			if(!EmailValidation('txtEmail','Enter a valid Email'))
				return false;
			var param	= "Mail="+mailId;
			getServerData("checkMail","userMail",param);
			$(document).bind("userMail", function(e, myName, myValue){	
				var opt	= myName.userName;
				if(opt==1)		
				{
					$('#'+fillLabel).html('This Mail Id Already Exist');	
					//$('#'+textControl).focus();					
				}
				else
					$('#'+fillLabel).html('');
					$('#'+hdnExist).val(opt);
			});
		}
		else
		{
			$('#'+fillLabel).html('');
			$('#'+hdnExist).val(0);
		}
	}	
	
	// Function to view user details ## By Sunil Kumar Parida On 05-10-2013
	function viewUserDetails(userId)
	{
		var param	= "UID="+userId;
		getServerData("userDetails","details",param);
		$(document).bind("details", function(e, myName, myValue){	
			var strFullName			= (myName.userDetails.strFullName!='')?myName.userDetails.strFullName:'NA';
			var strGender			= (myName.userDetails.strGender!='')?myName.userDetails.strGender:'NA';
			var dtmDtOfBirth		= (myName.userDetails.dtmDtOfBirth!='')?myName.userDetails.dtmDtOfBirth:'NA';
			var strQualification	= (myName.userDetails.strQualification!='')?myName.userDetails.strQualification:'NA';
			var strSpecialization	= (myName.userDetails.strSpecialization!='')?myName.userDetails.strSpecialization:'NA';
			var strHobby			= (myName.userDetails.strHobby!='')?myName.userDetails.strHobby:'NA';
			var strImage			= myName.userDetails.strImage;
			var strPhNo				= 	'';
//                                <!--(myName.userDetails.strPhNo!='')?myName.userDetails.strPhNo:'NA';-->
			 if(myName.userDetails.strPhNo=='/')
				strPhNo='NA';
			else if(myName.userDetails.strPhNo!='')
				strPhNo=myName.userDetails.strPhNo;			
			else
				strPhNo='NA';
			var strMobNo			= (myName.userDetails.strMobNo!='')?myName.userDetails.strMobNo:'NA';
			var strEmail			= (myName.userDetails.strEmail!='')?myName.userDetails.strEmail:'NA';
			var strAddress			= (myName.userDetails.strAddress!='')?myName.userDetails.strAddress:'NA';
			var intHierarchyId		= (myName.userDetails.intHierarchyId!='')?myName.userDetails.intHierarchyId:'NA';
			var parentLabels		= myName.userDetails.parentLabels;
			var parentValues		= myName.userDetails.parentValues;
			var strPhyLocation		= (myName.userDetails.strPhyLocation!='')?myName.userDetails.strPhyLocation:'NA';
			var strEmpType			= myName.userDetails.strEmpType;
			var dtmDtOfJoin			= (myName.userDetails.dtmDtOfJoin!='')?myName.userDetails.dtmDtOfJoin:'NA';
			var dtmProbotionDt		= (myName.userDetails.dtmProbotionDt!='')?myName.userDetails.dtmProbotionDt:'NA';
			var strDesg				= (myName.userDetails.strDesg!='')?myName.userDetails.strDesg:'NA';
			var gradeTbl			= myName.userDetails.gradeTbl;
			var groupTbl			= myName.userDetails.groupTbl;
			var strGrade			= (myName.userDetails.strGrade!='')?myName.userDetails.strGrade:'NA';			
			var strGroup			= (myName.userDetails.strGroup!='')?myName.userDetails.strGroup:'NA';
			var intPrivilege		= (myName.userDetails.intPrivilege!='')?myName.userDetails.intPrivilege:'NA';
			var privilege			= (intPrivilege==1)?'Super Administrator':'User';
			var intAttendance		= myName.userDetails.intAttendance;
			var attendance			= (intAttendance==1)?'Yes':'No';
			var intPayRoll			= myName.userDetails.intPayRoll;
			var payRoll				= (intPayRoll==1)?'Yes':'No';
			var intEPF				= myName.userDetails.intEPF;
			var epf					= (intEPF==1)?'Yes':'No';
			var strUserName			= myName.userDetails.strUserName;
			var strDomainName		= (myName.userDetails.strDomainName!='')?myName.userDetails.strDomainName:'NA';
			var maxSL				= myName.userDetails.maxSL;
			var intStatus			= myName.userDetails.intStatus;
			var intPrimaryRAId		= myName.userDetails.intPrimaryRA;
			var strPrimaryRAName	= (intPrimaryRAId>0)?myName.userDetails.strPrimaryRAName:'NA';
			var intSecondaryRAId	= myName.userDetails.intSecondaryRA;
			var strSecondaryRAName	= (intSecondaryRAId>0)?myName.userDetails.strSecondaryRAName:'NA';
			var intOptionalRAId		= myName.userDetails.intOptionalRA;
			var strOptionalRAName	= (intOptionalRAId>0)?myName.userDetails.strOptionalRAName:'NA';
			var intRACheck			= myName.userDetails.intRACheck;
			var tbl					= '<table border="0" cellpadding="0" cellspacing="0"><tr>';
			tbl		+= '<th colspan="5"><div align="left">Personal Deails</div></th></tr>';
			tbl		+= '<tr><td> Full Name</td><td>'+strFullName+'</td>';
			if(strImage!='')
				tbl		+= '<td rowspan="6" valign="top" width="100"><img src="'+siteURL+'uploadDocuments/UserImage/'+strImage+'" width="135" height="146" alt="'+strFullName+'" /></td></tr>';
			else
				tbl		+= '<td rowspan="6" valign="top" width="100"><img src="'+siteURL+'images/noPhoto.jpg" width="135" height="146" alt="No Photo Available" /></td></tr>';
			tbl		+= '<tr id="ffff"><td>Gender</td><td>'+strGender+'</td></tr>';
			tbl		+= '<tr><td>Date of Birth</td><td>'+dtmDtOfBirth+'</td></tr>';
			tbl		+= '<tr><td>Qualification</td><td>'+strQualification+'</td></tr>';
			tbl		+= '<tr><td>Specialisation</td><td>'+strSpecialization+'</td></tr>';
			tbl		+= '<tr><td>Hobby</td><td>'+strHobby+'</td></tr>';
			tbl		+= '<tr><th colspan="3"><div align="left">Contact Details</div></th></tr>';
			tbl		+= '<tr><td width="145"> Office Phone No./Extn</td><td colspan="2">'+strPhNo+'</td></tr>';
			tbl		+= '<tr><td> Mobile No.</td><td colspan="2">'+strMobNo+'</td></tr>';
			tbl		+= '<tr><td>Email</td><td colspan="2">'+strEmail+'</td></tr>';
			tbl		+= '<tr><td> Address</td><td colspan="2">'+strAddress+'</td></tr>';
			tbl		+= '<tr><th colspan="3"><div align="left">Service Details</div></th></tr>';
			var spltLabel	= parentLabels.split(',');
			var spltValues	= parentValues.split(',');
			for(var i=0; i<spltValues.length; i++)
			{
				tbl		+= '<tr><td width="145"> '+spltLabel[i]+' </td><td colspan="2">'+spltValues[i]+'</td></tr>';
			}
			tbl		+= '<tr><td>Office Name</td><td colspan="2">'+strPhyLocation+'</td></tr>';
			tbl		+= '<tr><td>Employee Type</td><td colspan="2">'+strEmpType+'</td></tr>';
			tbl		+= '<tr><td>Date of Joining</td><td colspan="2">'+dtmDtOfJoin+'</td></tr>';
			tbl		+= '<tr><td>Probation Completion Date</td><td colspan="2">'+dtmProbotionDt+'</td></tr>';
			tbl		+= '<tr><td>Designation</td><td colspan="2">'+strDesg+'</td></tr>';
			if(gradeTbl>0)
				tbl		+= '<tr><td>Grade</td><td colspan="2">'+strGrade+'</td></tr>';
			if(groupTbl>0)	
				tbl		+= '<tr><td>Group</td><td colspan="2">'+strGroup+'</td></tr>';
			tbl		+= '<tr><td>Privilege</td><td colspan="2">'+privilege+'</td></tr>';
			tbl		+= '<tr><td>Enable Attendance</td><td colspan="2">'+attendance+'</td></tr>';
			tbl		+= '<tr><td>Put in Payroll</td><td colspan="2">'+payRoll+'</td></tr>';
			if(intPayRoll==1)
				tbl		+= '<tr><td>EPF</td><td colspan="2">'+epf+'</td></tr>';
			if(intRACheck==1)
			{
				tbl		+= '<tr><th colspan="3"><div align="left">Authority Details</div></th></tr>';
				tbl		+= '<td>Primary Authority</td><td colspan="2">'+strPrimaryRAName+'</td></tr>';
				tbl		+= '<td>Secondary  Authority</td><td colspan="2">'+strSecondaryRAName+'</td></tr>';
				tbl		+= '<td>Optional  Authority</td><td colspan="2">'+strOptionalRAName+'</td></tr>';
			}
			tbl		+= '<tr><th colspan="3"><div align="left">Login Details</div></th></tr>';
			tbl		+= '<tr><td>User Name</td><td colspan="2">'+strUserName+'</td></tr>';
			tbl		+= '<tr><td>Domain Name</td><td colspan="2">'+strDomainName+'</td></tr>';
			tbl		+= '</table>';
			$('#divModal').html(tbl);
		});		
	}
	
	// Function to fill Global link for set permission ## By Sunil Kumar Parida##on##09-10-2013	
	function setGlobal(userId,fillControl)
	{
		var param	= "UID="+userId;
		getServerData("setGL","setGlobal",param);
		$(document).bind("setGlobal", function(e, myName, myValue){	
			var opt	= myName.permission;
			$('#'+fillControl).html(opt);
		});
	}
	
	// Function to show assigning user ## By Sunil Kumar Parida ## On 09-10-2013
	function showAssigningUser(locId,fillControlId)
	{
		$(document).unbind("showAdmin");
		if(locId>0)
		{
			var param	= "locId="+locId;
			getServerData("showAdmin","showAdmin",param);
			$(document).bind("showAdmin", function(e, myName, myValue){	
				var opt	= myName.adminName;
				if(opt==0)
					$('#remAdmin').hide();
				else
					$('#remAdmin').show();
				opt		= (opt==0)?'<font style="color:#ff0000;">Admin not assigned for this location</font>':opt;
				
				$('#'+fillControlId).html(opt);
			});	
		}
		else
		{
				$('#'+fillControlId).html('');
		}
	}
	
	function removeAssigningUser(locId)
	{
		$(document).unbind("removeAdmin");
		if(locId>0)
		{
			var param	= "locId="+locId;
			getServerData("removeAdmin","removeAdmin",param);
			$(document).bind("removeAdmin", function(e, myName, myValue){	
				var msg	= myName.unAssignAdmin;
				if(msg!='')
				{
					
					$('#tblAdmin tr').not($('#trPhyLoc')).hide();
					$('#selphyLoc').val(0);
				}
			});
		}
	}
	// Function to show location wise shift ## By Sunil Kumar Parida ## On 15-10-2013
	function showShift(locId,selVal,fillControlId)
	{
		$(document).unbind("fillShift");
		if(locId>0)	
		{
			var param	= "locId="+locId+"&SelVal="+selVal;
			getServerData("shift","fillShift",param);
			$(document).bind("fillShift", function(e, myName, myValue){	
				var opt	= myName.shiftMaster;
				$('#'+fillControlId).html(opt);
			});	
		}
		else
		{
			$('#'+fillControlId).html('<option value="0">--Select--</select>');
		}
	}
	
	// Function to read office time ## By Sunil Kumar Parida ## On 15-10-2013
	function readOffTime(shiftId,action)
	{
		$(document).unbind("readNShift");
		if(shiftId>0)	
		{
			var param	= "shiftId="+shiftId+"&Type="+action;
			getServerData("nShift","readNShift",param);
			$(document).bind("readNShift", function(e, myName, myValue){	
				var flag			= myName.normalOfficeTime.flag;
				var dateFrom		= (action=='E' && flag==1)?myName.normalOfficeTime.dateFrom:'';
				var dateTo			= (action=='E' && flag==1)?myName.normalOfficeTime.dateTo:'';
				var startTime		= (flag==1)?myName.normalOfficeTime.startTime:'';
				var graceTime		= (flag==1)?myName.normalOfficeTime.graceTime:'';
				var recessFrom		= (flag==1)?myName.normalOfficeTime.recessFrom:'';
				var recessTo		= (flag==1)?myName.normalOfficeTime.recessTo:'';
				var exitTime		= (flag==1)?myName.normalOfficeTime.exitTime:'';
				var lateExitTime	= (flag==1)?myName.normalOfficeTime.lateExitTime:'';
				var extraLateExit	= (flag==1)?myName.normalOfficeTime.extraLateExit:'';
				var earlyEntry		= (flag==1)?myName.normalOfficeTime.earlyEntry:'';
				var lateEntry		= (flag==1)?myName.normalOfficeTime.lateEntry:'';
				var halfStartTime	= (flag==1)?myName.normalOfficeTime.halfStartTime:'';
				var halfEarlyEntry	= (flag==1)?myName.normalOfficeTime.halfEarlyEntry:'';
				var halfLateEntry	= (flag==1)?myName.normalOfficeTime.halfLateEntry:'';
				var halfExitTime	= (flag==1)?myName.normalOfficeTime.halfExitTime:'';
				var halfLateExit	= (flag==1)?myName.normalOfficeTime.halfLateExit:'';
				
				if(halfStartTime!='')
				{
					$('#chkWeekHalfDay').attr("checked","checked");
					$('#weekHalfDayCont').show();
				}
				else
				{
					$('#chkWeekHalfDay').attr("checked",false);
					$('#weekHalfDayCont').hide();
				}
				if(action=='E')
				{
					$('#txtDateFrom').val(dateFrom);	
					$('#txtDateTo').val(dateTo);
				}
				$('#txtStartTime').val(startTime);
				$('#ddlGraceTime').val(graceTime);
				$('#txtRecessFrom').val(recessFrom);
				$('#txtRecessTo').val(recessTo);
				$('#txtExitTime').val(exitTime);
				$('#txtLateExitTime').val(lateExitTime);
				$('#txtExtraLateExitTime').val(extraLateExit);
				$('#txtEarlyEntry').val(earlyEntry);
				$('#txtLateEntry').val(lateEntry);
				$('#txtStartTimeWH').val(halfStartTime);
				$('#txtEarlyEntryWH').val(halfEarlyEntry);
				$('#txtLateEntryWH').val(halfLateEntry);
				$('#txtExitTimeWH').val(halfExitTime);
				$('#txtLateExitTimeWH').val(halfLateExit);
				if(action!='F')
				{
					if(flag==1)
						$('#button').val('Update');
					else
						$('#button').val('Save');
				}
			});	
		}
		else
		{
			$('#chkWeekHalfDay').attr("checked",false);
			$('#weekHalfDayCont').hide();
			$('#txtStartTime').val('');
			$('#ddlGraceTime').val(0);
			$('#txtRecessFrom').val('');
			$('#txtRecessTo').val('');
			$('#txtExitTime').val('');
			$('#txtLateExitTime').val('');
			$('#txtExtraLateExitTime').val('');
			$('#txtEarlyEntry').val('');
			$('#txtLateEntry').val('');
			$('#txtStartTimeWH').val('');
			$('#txtEarlyEntryWH').val('');
			$('#txtLateEntryWH').val('');
			$('#txtExitTimeWH').val('');
			$('#txtLateExitTimeWH').val('');
			$('#button').val('Save');
		}
	}
	
	function viewTimingDetails(timingId,type)
	{
		var param	= "timingId="+timingId+"&Type="+type;
		getServerData("showTiming","timingDetails",param);
		$(document).bind("timingDetails", function(e, myName, myValue){	
			var flag			= myName.normalOfficeTime.flag;
			var dateFrom		= myName.normalOfficeTime.dateFrom;
			var dateTo			= myName.normalOfficeTime.dateTo;
			var startTime		= (myName.normalOfficeTime.startTime!='')?myName.normalOfficeTime.startTime:'NA';
			var graceTime		= (myName.normalOfficeTime.graceTime!='')?myName.normalOfficeTime.graceTime:'NA';
			var recessFrom		= (myName.normalOfficeTime.recessFrom!='')?myName.normalOfficeTime.recessFrom:'NA';
			var recessTo		= (myName.normalOfficeTime.recessTo!='')?myName.normalOfficeTime.recessTo:'NA';
			var exitTime		= (myName.normalOfficeTime.exitTime!='')?myName.normalOfficeTime.exitTime:'NA';
			var lateExitTime	= (myName.normalOfficeTime.lateExitTime!='')?myName.normalOfficeTime.lateExitTime:'NA';
			var extraLateExit	= (myName.normalOfficeTime.extraLateExit!='')?myName.normalOfficeTime.extraLateExit:'NA';
			var earlyEntry		= (myName.normalOfficeTime.earlyEntry!='')?myName.normalOfficeTime.earlyEntry:'NA';
			var lateEntry		= (myName.normalOfficeTime.lateEntry!='')?myName.normalOfficeTime.lateEntry:'NA';
			var halfStartTime	= (myName.normalOfficeTime.halfStartTime!='')?myName.normalOfficeTime.halfStartTime:'NA';
			var halfEarlyEntry	= (myName.normalOfficeTime.halfEarlyEntry!='')?myName.normalOfficeTime.halfEarlyEntry:'NA';
			var halfLateEntry	= (myName.normalOfficeTime.halfLateEntry!='')?myName.normalOfficeTime.halfLateEntry:'NA';
			var halfExitTime	= (myName.normalOfficeTime.halfExitTime!='')?myName.normalOfficeTime.halfExitTime:'NA';
			var halfLateExit	= (myName.normalOfficeTime.halfLateExit!='')?myName.normalOfficeTime.halfLateExit:'NA';
			var tbl				= '<table>';
			if(type=='E')
			{
				tbl					+= '<tr><td>Date From</td><td width="5px">:</td><td>'+dateFrom+'</td>';
				tbl					+= '<tr><td>Date To</td><td width="5px">:</td><td>'+dateTo+'</td>';
			}
			tbl					+= '<tr><td>Start Time</td><td width="5px">:</td><td>'+startTime+'</td>';
			tbl					+= '<tr><td>End Time</td><td width="5px">:</td><td>'+exitTime+'</td>';
			tbl					+= '<tr><td>Recess From</td><td width="5px">:</td><td>'+recessFrom+'</td>';
			tbl					+= '<tr><td>Recess To</td><td width="5px">:</td><td>'+recessTo+'</td>';
			tbl					+= '<tr><td>Grace Time</td><td width="5px">:</td><td>'+graceTime+' min.</td>';
			tbl					+= '<tr><td>Late Exit Time</td><td width="5px">:</td><td>'+lateExitTime+'</td>';
			tbl					+= '<tr><td>Extra Late Exit Time</td><td width="5px">:</td><td>'+extraLateExit+'</td>';
			tbl					+= '<tr><td>Early Entry Time</td><td width="5px">:</td><td>'+earlyEntry+'</td>';
			tbl					+= '<tr><td>Late Entry Time</td><td width="5px">:</td><td>'+lateEntry+'</td>';
			tbl					+= '<tr><th colspan="3">Time for Weekly HalfDay</th>';
			tbl					+= '<tr><td>Start Time</td><td width="5px">:</td><td>'+halfStartTime+'</td>';
			tbl					+= '<tr><td>End Time</td><td width="5px">:</td><td>'+halfExitTime+'</td>';
			tbl					+= '<tr><td>Early Entry Time</td><td width="5px">:</td><td>'+halfEarlyEntry+'</td>';
			tbl					+= '<tr><td>Late Entry Time</td><td width="5px">:</td><td>'+halfLateEntry+'</td>';
			tbl					+= '<tr><td>Late Exit Time</td><td width="5px">:</td><td>'+halfLateExit+'</td>';
			tbl					+= '</table>';
			$('#divModal').html(tbl);
		});	
	}
	//===== Function for get ip  Data by Rasmi Ranjan Swain on 16/10/2013 ========

	function GetIP(locID)
	{		
		$(document).unbind("showIPEvent");
		if(locID>0)
		{
			$('#newRow> tbody').html('');
			var param	= "locId="+locID;	
			getServerData("showIP","showIPEvent",param);
			$(document).bind("showIPEvent", function(e, myName, myValue){
				var first=0; 
				
				if(myName.length==0)
				{
					$('#btnSubmit').val("Submit");
					$('.removeBtn').hide();							
					setTableRow(first);
				
				}
				
				else
				{
					for(var j=0;j<myName.length;j++)
					{
						first=j;		
						setTableRow(first);					
						$('.removeBtn').show();
						var configID	= myName[j].configID;
						var lowerIP		= myName[j].lowerIP;
						var higherIP	= myName[j].higherIP;
						var loweripsep  = lowerIP.split(".");
						var higherIPsep = higherIP.split(".");
						for(var i = 0; i < loweripsep.length; i++)
						{
							$('#txtLow1'+first+'').val(loweripsep[0]);
							$('#txtLow2'+first+'').val(loweripsep[1]);
							$('#txtLow3'+first+'').val(loweripsep[2]);
							$('#txtLow4'+first+'').val(loweripsep[3]);
						
						}
						for(var i = 0; i < higherIPsep.length; i++)
						{					 
							$('#txtHigh1'+first+'').val(higherIPsep[0]);
							$('#txtHigh2'+first+'').val(higherIPsep[1]);
							$('#txtHigh3'+first+'').val(higherIPsep[2]);
							$('#txtHigh4'+first+'').val(higherIPsep[3]);
						}
						$('#hdnId'+j+'').val(configID);
						$('#btnSubmit').val("Update");
					}
				}
			});
		}
		else
		{
			var first=0; 
			$('#newRow> tbody').html('');
			$('#btnSubmit').val("Submit");
			$('.removeBtn').hide();
			setTableRow(first);
		}
	}	
	
	//========= Function to  count  no  of ip  By Rasmi Ranjan Swain On 28/10/2013 =======
	function countIp(locId)
	{
		$(document).unbind("ipcountEvent");
		if(locId>0)
		{
			var param	= "locId="+locId;
			
			getServerData("ipcount","ipcountEvent",param);
			$(document).bind("ipcountEvent", function(e, myName, myValue){												
				$('#hdnipCount').val(myName[0].noofRow);				
			});
		}
		
	}
	
	// Function to set table row ====
	function setTableRow(txtId)
	{
		$('#newRow> tbody').append('<tr id="'+txtId+'"><td><input name="txtLow1[]" type="text" id="txtLow1'+txtId+'" style="width:55px;"  onKeyPress="return isNumberKey(event);" maxlength="3"  class="inputs inputsx"/> . <input name="txtLow2[]" type="text" id="txtLow2'+txtId+'" style="width:55px;"  onKeyPress="return isNumberKey(event);" maxlength="3"  class="inputs inputsx"/> . <input name="txtLow3[]" type="text" id="txtLow3'+txtId+'" style="width:55px;"  onKeyPress="return isNumberKey(event);" maxlength="3"  class="inputs inputsx"/> . <input name="txtLow4[]" type="text" id="txtLow4'+txtId+'" style="width:55px;" onblur="checkNum(this);" onKeyPress="return isNumberKey(event);" maxlength="3" class="inputs"/> &nbsp;&nbsp;<span class="mandatory">*</span></td><td><input name="txtHigh1[]" type="text" id="txtHigh1'+txtId+'" style="width:55px;" onblur="checkNum(this)" onKeyPress="return isNumberKey(event);" maxlength="3" readonly="readonly"/> . <input name="txtHigh2[]" type="text" id="txtHigh2'+txtId+'"  style="width:55px;" onblur="checkNum(this)" onKeyPress="return isNumberKey(event);" value="" maxlength="3" readonly="readonly"/> . <input name="txtHigh3[]" type="text" id="txtHigh3'+txtId+'" style="width:55px;" onblur="checkNum(this)" onKeyPress="return isNumberKey(event);" value="" maxlength="3" readonly="readonly"/> . <input name="txtHigh4[]" type="text" id="txtHigh4'+txtId+'" style="width:55px;"  onKeyPress="return isNumberKey(event);" maxlength="3"/> &nbsp;&nbsp;<span class="mandatory">*</span></td><td><a href="#" class="btn btn-small removeBtn" style="display:none;"><i class="icon-remove-sign"></i></a><input type="hidden" id="hdnId'+txtId+'" /></td></tr>');
	}
	
	//========= Function to remove row By Sunil Kumar Parida On 01/11/2013 ===========
	function deleteRow(configId,tblId)
	{
		$(document).unbind("ipConfigEvent");
		var rowLength	= $('#newRow tr').length-1;
		var param	= "configId="+configId;			
		getServerData("DeleteConfig","ipConfigEvent",param);
		$(document).bind("ipConfigEvent", function(e, myName, myValue){	
			
			if(rowLength>1)
				$('#'+tblId).remove();
			else
			{
				$('#'+tblId+' input[type=text]').val('');
				$('.removeBtn').hide();
			}
			alert('Record deleted successfully');
		});
	}
	//========= Function to view flexi time By Sunil Kumar Parida On 22/10/2013 =======
	function viewFlexiTiming(id)
	{
		var param	= "flexiId="+id;
		getServerData("showFlexi","flexiTiming",param);
		$(document).bind("flexiTiming", function(e, myName, myValue){
			var flag			= myName.flexiTime.flag;
			var shiftName		= myName.flexiTime.shiftName;
			var userName		= myName.flexiTime.userName;
			var dateFrom		= myName.flexiTime.dateFrom;
			var dateTo			= myName.flexiTime.dateTo;
			var startTime		= (myName.flexiTime.startTime!='')?myName.flexiTime.startTime:'NA';
			var graceTime		= (myName.flexiTime.graceTime!='')?myName.flexiTime.graceTime:'NA';
			var recessFrom		= (myName.flexiTime.recessFrom!='')?myName.flexiTime.recessFrom:'NA';
			var recessTo		= (myName.flexiTime.recessTo!='')?myName.flexiTime.recessTo:'NA';
			var exitTime		= (myName.flexiTime.exitTime!='')?myName.flexiTime.exitTime:'NA';
			var lateExitTime	= (myName.flexiTime.lateExitTime!='')?myName.flexiTime.lateExitTime:'NA';
			var extraLateExit	= (myName.flexiTime.extraLateExit!='')?myName.flexiTime.extraLateExit:'NA';
			var earlyEntry		= (myName.flexiTime.earlyEntry!='')?myName.flexiTime.earlyEntry:'NA';
			var lateEntry		= (myName.flexiTime.lateEntry!='')?myName.flexiTime.lateEntry:'NA';
			var halfStartTime	= (myName.flexiTime.halfStartTime!='')?myName.flexiTime.halfStartTime:'NA';
			var halfEarlyEntry	= (myName.flexiTime.halfEarlyEntry!='')?myName.flexiTime.halfEarlyEntry:'NA';
			var halfLateEntry	= (myName.flexiTime.halfLateEntry!='')?myName.flexiTime.halfLateEntry:'NA';
			var halfExitTime	= (myName.flexiTime.halfExitTime!='')?myName.flexiTime.halfExitTime:'NA';
			var halfLateExit	= (myName.flexiTime.halfLateExit!='')?myName.flexiTime.halfLateExit:'NA';
			var tbl				= 'From: '+dateFrom+' To : '+dateTo+'<table>';
			tbl					+= '<tr><th colspan="3">Shift Name : '+shiftName+'</th>';
			tbl					+= '<tr><td>Start Time</td><td width="5px">:</td><td>'+startTime+'</td>';
			tbl					+= '<tr><td>End Time</td><td width="5px">:</td><td>'+exitTime+'</td>';
			tbl					+= '<tr><td>Recess From</td><td width="5px">:</td><td>'+recessFrom+'</td>';
			tbl					+= '<tr><td>Recess To</td><td width="5px">:</td><td>'+recessTo+'</td>';
			tbl					+= '<tr><td>Grace Time</td><td width="5px">:</td><td>'+graceTime+' min.</td>';
			tbl					+= '<tr><td>Late Exit Time</td><td width="5px">:</td><td>'+lateExitTime+'</td>';
			tbl					+= '<tr><td>Extra Late Exit Time</td><td width="5px">:</td><td>'+extraLateExit+'</td>';
			tbl					+= '<tr><td>Early Entry Time</td><td width="5px">:</td><td>'+earlyEntry+'</td>';
			tbl					+= '<tr><td>Extra Late Entry Time</td><td width="5px">:</td><td>'+lateEntry+'</td>';
			tbl					+= '<tr><th colspan="3">Time for Weekly HalfDay</th>';
			tbl					+= '<tr><td>Start Time</td><td width="5px">:</td><td>'+halfStartTime+'</td>';
			tbl					+= '<tr><td>End Time</td><td width="5px">:</td><td>'+halfExitTime+'</td>';
			tbl					+= '<tr><td>Early Entry Time</td><td width="5px">:</td><td>'+halfEarlyEntry+'</td>';
			tbl					+= '<tr><td>Late Entry Time</td><td width="5px">:</td><td>'+halfLateEntry+'</td>';
			tbl					+= '<tr><td>Late Exit Time</td><td width="5px">:</td><td>'+halfLateExit+'</td>';
			tbl					+= '</table>';
			$('#divModal').html(tbl);
			$('#spnUser').html(userName);
		});	
	}
	
	//========= Function to view shift users By Sunil kumar Parida On 22/10/2013 =======
	function viewShiftUser(locId, shiftId, fillControl)
	{
		if(locId>0 || shiftId>0)
		{
			var param	= "locId="+locId+"&shiftId="+shiftId;
			getServerData("ShiftUser","ShiftUser",param);
			$(document).bind("ShiftUser", function(e, myName, myValue){
				$('#'+fillControl).html(myName.shiftUser);
			});
		}
		else
		{
			$('#'+fillControl).html('<option value="0">--Select--</option>');
		}
	}
	
	//========= Function to show permission By sunil Kumar Parida On 25/10/2013 =========
	function showPermission(userId,flag)
	{
		$('input:radio').removeAttr('disabled');
		
		$(document).unbind('permission');
		$('.label_check').removeClass('c_on');
		$('input[type=checkbox]').attr('checked',false);
		$('.plDiv').hide();
		if(userId>0)
		{			
			var param	= "UID="+userId;
			getServerData("permission","permission",param);
			$(document).bind("permission", function(e, myName, myValue){
				
				if(myName.permissions.length>0)								
				{
                                  
					/*if(flag=='V')
					{
						$('.radAction').attr('checked', false);	
						$('.radAction').prop('disabled', true);
					}*/
					
					$.each(myName.permissions,function(index,value){
                                          
						var glId		= value.glId;
						var plId		= value.plId;
						var permission	= value.permission;
						$('#GL'+glId).addClass('active');
						$('#PL'+glId).show();
						$('#chkBox'+glId+'_'+plId).parent().addClass('c_on');
						$('#chkBox'+glId+'_'+plId).attr('checked',true);
						$('input:radio[name=rad'+glId+'_'+plId+'][value='+permission+']').attr('checked', true);
						$('input:radio[name=rad'+glId+'_'+plId+'][value='+permission+']').removeAttr('disabled');
						/*if(flag=='V')
							$('input[type=checkbox]').prop('disabled', true);*/
					});
				}
				else
				{
					alert("Permission is not set for selected record");	
					return false;
				}			
			});
		}
		else
		{
			if(flag=='V')
			{
				$('.radAction').prop('disabled', true);
				$('.radAction').attr('checked', false);
			}
		}
	}
	
	//========= Function to show group wise permission By sunil Kumar Parida On 06/11/2013 =========
	function showGroupPermission(groupId)
	{
		$('.label_check').removeClass('c_on');
		$('input[type=checkbox]').attr('checked',false);
		$('.plDiv').hide();		
		$(document).unbind('grpPermission');
		if(groupId>0)
		{
			var param	= "GID="+groupId;
			getServerData("grpPermission","grpPermission",param);
			$(document).bind("grpPermission", function(e, myName, myValue){
				
				if(myName.permissions.length>0)								
				{
					$('.radAction').prop('disabled', true);
					$('.radAction').attr('checked', false);	
					$.each(myName.permissions,function(index,value){
						var glId		= value.glId;
						var plId		= value.plId;
						var permission	= value.permission;
						$('#GL'+glId).addClass('active');
						$('#PL'+glId).show();
						$('#chkBox'+glId+'_'+plId).parent().addClass('c_on');
						$('#chkBox'+glId+'_'+plId).attr('checked',true);					
						$('input:radio[name=rad'+glId+'_'+plId+'][value='+permission+']').attr('checked', true);
						$('input:radio[name=rad'+glId+'_'+plId+'][value='+permission+']').removeAttr('disabled');
						$('input[type=checkbox]').prop('disabled', true);
					});
				}			
			});
		}		
	}
	
	//========= Function to show permission By sunil Kumar Parida On 25/10/2013 =========
	function showUser(userName,selVal,fillControlId)
	{
		$(document).unbind("UserName");
		if(userName.length>0)
		{
			var param	= "UName="+userName+"&selVal="+selVal;
			getServerData("UName","UserName",param);
			$(document).bind("UserName", function(e, myName, myValue){
				var opt	= myName.userNames.users;
				$('#'+fillControlId).html(opt);
			});
		}
		else
		{
			$('#'+fillControlId).html('<option value="0">--Select--</option>');
		}
	}
	
	// Function to fill group ## By Rsmi Ranjan Swain##on##05-Nov-2013	
	function fillgroup(selval,fillControlId)
	{
		var param	= "SelVal="+selval;
		getServerData("group","eventGroup",param);
		$(document).bind("eventGroup", function(e, myName, myValue){	
			var opt	= myName.group;
			$('#'+fillControlId).html(opt);
		});	
	}	
	
	//========= Function to show all users in a group By sunil Kumar Parida On 25/10/2013 ========= 
	function showGroupUser(groupId,fillControlId)
	{
		$('#myModalLabel').text('Users');
		$(document).unbind("grpUsers");
		if(groupId>0)
		{
			var param	= "grpId="+groupId;
			getServerData("grpUsers","grpUsers",param);
			$(document).bind("grpUsers", function(e, myName, myValue){	
				var opt	= myName.users;
				var tbl	= '<table>'+opt+'</table>';
				$('#'+fillControlId).html(tbl);
			});	
		}
		else
		{
			$('#'+fillControlId).html('Select group to view users');
		}
	}
	
	//====== Fill PrimaryLink IN assign Link page ## By Rsmi Ranjan Swain##on##07-Nov-2013
	function fillPlink(glId,selval)
	{
		if(glId>0)
		{
			var param	= "plId="+glId+"&SelVal="+selval;
			getServerData("plLink","plinkEvent",param);
			$(document).bind("plinkEvent", function(e, myName, myValue){	
				var opt	= myName.pLinkId.pLink;
				$('#selPL').html(opt);
			});
		}
		else
		{
			$('#selPL').html('<option value="0">--Select--</option>');
		}
		
	}
	
	
	//====== Fill function IN assign Link page ## By Rsmi Ranjan Swain##on##07-Nov-2013
	function setlinkPl(plId)
	{
		if(plId>0)
		{
			var param	= "plId="+plId;
			getServerData("linkPermission","linkPermissionEvent",param);
			$(document).bind("linkPermissionEvent", function(e, myName, myValue){	
				var action1	= myName.linkpermission.action1;	
				var action2	= myName.linkpermission.action2;
				var action3	= myName.linkpermission.action3;
				if(action1=='' && action2=='' && action3=='')
				{
					$('#spnAction1').html("External Link");	
				}
				else
				{
					$('#spnAction1').html(action1);
					$('#spnAction2').html(action2);
					$('#spnAction3').html(action3);
				}
			});
		}
		else
		{
			$('#spnAction1').html('Action 1');
			$('#spnAction2').html('Action 2');
			$('#spnAction3').html('Action 3');
		}
	}
	//===== Function to view permission By Sunil Kumar Parida On 12/11/2013 ==========
	function viewPermission(id, type, fillControl)
	{
		$('#myModalLabel').text('User Permission');
		$(document).unbind("viewPermission");
		if(id>0)
		{
			var param	= "ID="+id+"&TYPE="+type;
			getServerData("viewPermission","viewPermission",param);
			$(document).bind("viewPermission", function(e, myName, myValue){	
				if(myName.permissions.length>0)								
				{
					var tbl	= '<table><tr><th>GL name</th><th>PL name</th><th>Permission</th></tr>';
					$.each(myName.permissions,function(index,value){
						var glName		= value.glName;
						var plName		= value.plName;
						var action1		= value.action1;
						var action2		= value.action2;
						var action3		= value.action3;
						var action		= value.permission;
						var permission	= '';
						if(action1 == '' && action2 == '' && action3 == '' )
							permission	= 'External Link';
						else
						{
							if(action==1)
								permission = action1;
							else if(action==2)
								permission = action2;
							else if(action==3)
								permission = action3;
						}
						tbl		+= '<tr><td>';
						tbl		+= glName;
						tbl		+= '</td><td>';
						tbl		+= plName;
						tbl		+= '</td><td>';
						tbl		+= permission;						
						tbl		+= '</td></tr>';						
					});
					tbl		+= '</table>';
					$('#'+fillControl).html(tbl);
				}
				else
				{
					$('#'+fillControl).html('Permission is not set for selected record');
				}
			});
		}		
		else
		{
			$('#'+fillControl).html('Select user to view permission');
		}
	}
        
        function setAssemblyTag(id){
            var selId = $("#selAssemblyId"+id).val();
            if(selId>0){
            $(".clsAssembly").css('border-color','');
            $.ajax({ 
                type: "GET",
                url: siteURL+"class_file/proxy.php?method=setAssemblyTag&villageId="+id+"&assemblyId="+selId,
                dataType: "json",
                async: false,
                success: function(data) {
                    if(data.result == 1){
                        alert('Village tagged successfully.');
                    }else{
                        alert('Error in operation please try again.');
                    }
                }
            });
            }else{
                alert('Please select record.');
                $(".clsAssembly").css('border-color','');
                $("#selAssemblyId"+id).focus();
                $("#selAssemblyId"+id).css('border-color','red');
            }
        }
        //============== Function for resetting password By Manali Ranjan On 30/01/2018 ===========
        
        function resetPass(UserId){
            var r = confirm("Do you really want to reset password");
            if (r == true) {
                     $('#RPdiv'+UserId).html('<img src="'+siteURL+'images/lightbox-ico-loading.gif"/>');
            $.ajax({
                type: "POST",
                url: siteURL+"class_file/proxy.php",
                dataType: "json",
                data: {method: 'resetPass', UserId: UserId},
                //async: false,
                success: function (data) {
                        if(data.Status == 1){
                        $('#RPdiv'+UserId).html('Password reset successfully');
                        setTimeout(function(){ 
                         $('#RPdiv'+UserId).html('<a href="javascript:void(0);" onclick="resetPass('+UserId+')";>Reset Password</a>');
                        }, 3500);
                      var msg = 'Password reset successfully. New Password is : <strong>'+data.userPass+'</strong> Valid for 8 hrs';
                      $('#result').show();
                      $('#result').html(msg);
                    }else{
                        msg = 'Something went wrong. Please try again after some time';
                      $('#result').html(msg);
                    }
                    
                }
            });
           // txt = "You pressed OK!";
            }
         
		}
		
		function fillRange(selVal,controlId){
           
            $.ajax({
                type: "POST",
                url: siteURL+"class_file/proxy.php",
                dataType: "json",
                data: {method: 'fillRange', selVal: selVal},
                //async: false,
                success: function (data) {
					$('#'+controlId).html(data.Range);   
                    
                }
            });
           // txt = "You pressed OK!";
			}
			function fillPoliceStation(selVal,controlId,exceptId=''){
           
				$.ajax({
					type: "POST",
					url: siteURL+"class_file/proxy.php",
					dataType: "json",
					data: {method: 'fillPoliceStation', selVal: selVal,exceptId:exceptId},
					//async: false,
					success: function (data) {
						$('#'+controlId).html(data.PolicestationName);   
						
					}
				});
			   // txt = "You pressed OK!";
			}

			function fillPoliceStionExist(rangeId,controlId){
           
				$.ajax({
					type: "POST",
					url: siteURL+"class_file/proxy.php",
					dataType: "json",
					data: {method: 'fillPoliceStionExist', rangeId: rangeId},
					//async: false,
					success: function (data) {
						$('#'+controlId).html(data.PolicestationName); 
						if(data.ExceptIds.length>0){
							fillPoliceStation(0,'selPoliceStation', data.ExceptIds);
						}  
						
					}
				});
			   // txt = "You pressed OK!";
			}
			function fillDistrict(controlId){
           
				$.ajax({
					type: "POST",
					url: siteURL+"class_file/proxy.php",
					dataType: "json",
					data: {method: 'fillDistrict'},
					//async: false,
					success: function (data) {
						$('#'+controlId).html(data.DistrictName); 
						
					}
				});
			   // txt = "You pressed OK!";
			}

			function searchPoliceStion(districtId,controlId){
           
				$.ajax({
					type: "POST",
					url: siteURL+"class_file/proxy.php",
					dataType: "json",
					data: {method: 'searchPoliceStion',districtId:districtId},
					//async: false,
					success: function (data) {
						$('#'+controlId).html(data.PolicestationName); 
						
					}
				});
			   // txt = "You pressed OK!";
			}


			searchPoliceStion

			

			
         
       
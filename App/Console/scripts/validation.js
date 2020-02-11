// JavaScript Document
var isRequired 			= " should not be left blank";
var isMaxLength 		= " can not be more than "
var isMinLength 		= " can not be less than "
var isChar 				= " Characters";
var isWhitespace	 	= " White space Not allowed at first position";
var ispecialchar_first 	= " Not allowed at first position";
var ispecialcharFirst	= " Special character";
var ispecialcharLast	= " are Not allowed in ";
// *** function for alert msg and Created by Sudam Chandra Panda on 4th Sept 2012 ***
function ErrorAlert(element,msg)
{
	alert(msg);
	element.val('');
	element.focus();
}
// *** function for alert msg on Key UP and Created by Sudam Chandra Panda on 5th Sept 2012 ***
/*function ErrorKeyUpAlert(element,msg)
{
	alert(msg)
	element.val('');
	element.focus();
}*/

// *** function for Blank Field Validation and Created by Sudam Chandra Panda on 4th Sept 2012 ***
function isblankFieldValidation(validateFields, FieldName)
{
	if ($('#' + validateFields).val()=='')
	{
		ErrorAlert($('#' + validateFields), FieldName+isRequired);
		return false;
	}
	return true;
}

function required(validateFields, FieldName)
{
	var val = validateFields.split(',');
	alert(val);
	
	if(!isblankFieldValidation(validateFields, FieldName))
	{
		var fieldLen = $('#' + validateFields).length;
		alert(fieldLen)
		return false;
	}
}

// *** function for Max length Validation and Created by Sudam Chandra Panda on 4th Sept 2012 ***
function isValidMaxLength(validateFields,maxLength,FieldName)
{
	if ($('#' + validateFields).val().length>maxLength)
	{
		ErrorAlert($('#' + validateFields), FieldName+isMaxLength+maxLength+isChar);
		return false;
	}
	return true;
}

// *** function for Min length Validation and Created by Sudam Chandra Panda on 4th Sept 2012 ***
function isValidMinLength(validateFields,minLength,FieldName)
{
	if (minLength>$('#' + validateFields).val().length)
	{
		ErrorAlert($('#' + validateFields), FieldName+isMinLength+minLength+isChar);
		return false;
	}
	return true;
}
// *** function for white space in first place and Created by Sudam Chandra Panda on 5th Sept 2012 ***
function isWhitespaceValidation(validateFields)
{
	var eleVal = $('#' + validateFields).val();
	
	if (eleVal.charAt(0)=='')
	{
		ErrorAlert($('#'+validateFields),isWhitespace);
		return false;
	}
	return true;
}
// *** function for block special char in first place and Created by Sudam Chandra Panda on 5th Sept 2012 ***
function blockspecialchar_first(validateFields) {
	$('#'+validateFields).keyup(function(){
		var eleID = $('#'+validateFields);
		var eleVal = $(this).val();	
		switch(eleVal.charCodeAt(0))
		{
			case 32:{ErrorAlert(eleID,isWhitespace); return false;}
			case 33:{ErrorAlert(eleID,'!'+ispecialchar_first); return false;}
			case 34:{ErrorAlert(eleID,'"'+ispecialchar_first); return false;}
			case 35:{ErrorAlert(eleID,'#'+ispecialchar_first); return false;}
			case 36:{ErrorAlert(eleID,'$'+ispecialchar_first); return false;}
			case 37:{ErrorAlert(eleID,'%'+ispecialchar_first); return false;}
			case 38:{ErrorAlert(eleID,'&'+ispecialchar_first); return false;}
			case 39:{ErrorAlert(eleID,"'"+ispecialchar_first); return false;}
			case 40:{ErrorAlert(eleID,'('+ispecialchar_first); return false;}
			case 41:{ErrorAlert(eleID,')'+ispecialchar_first); return false;}
			case 42:{ErrorAlert(eleID,'*'+ispecialchar_first); return false;}
			case 43:{ErrorAlert(eleID,'+'+ispecialchar_first); return false;}
			case 44:{ErrorAlert(eleID,','+ispecialchar_first); return false;}
			case 45:{ErrorAlert(eleID,'-'+ispecialchar_first); return false;}
			case 46:{ErrorAlert(eleID,'.'+ispecialchar_first); return false;}
			case 47:{ErrorAlert(eleID,'/'+ispecialchar_first); return false;}
			case 58:{ErrorAlert(eleID,':'+ispecialchar_first); return false;}
			case 59:{ErrorAlert(eleID,';'+ispecialchar_first); return false;}
			case 60:{ErrorAlert(eleID,'<'+ispecialchar_first); return false;}
			case 61:{ErrorAlert(eleID,'='+ispecialchar_first); return false;}
			case 62:{ErrorAlert(eleID,'>'+ispecialchar_first); return false;}
			case 63:{ErrorAlert(eleID,'?'+ispecialchar_first); return false;}
			case 64:{ErrorAlert(eleID,'@'+ispecialchar_first); return false;}
			case 91:{ErrorAlert(eleID,'['+ispecialchar_first); return false;}
			case 93:{ErrorAlert(eleID,']'+ispecialchar_first); return false;}
			case 94:{ErrorAlert(eleID,'^'+ispecialchar_first); return false;}
			case 95:{ErrorAlert(eleID,'_'+ispecialchar_first); return false;}
			case 96:{ErrorAlert(eleID,'`'+ispecialchar_first); return false;}
			case 123:{ErrorAlert(eleID,'{'+ispecialchar_first); return false;}
			case 124:{ErrorAlert(eleID,'|'+ispecialchar_first); return false;}
			case 125:{ErrorAlert(eleID,'}'+ispecialchar_first); return false;}
			case 126:{ErrorAlert(eleID,'~'+ispecialchar_first); return false;}
		}
	});
}
// *** function for Special Char Validation and Created by Sudam Chandra Panda on 5th Sept 2012 ***
function isSpecialCharValidation(validateFields,FieldName)
{
	var chkSchar = new Array("<",">","%","'","=","(",")","^");
	for(var i=0; i<=chkSchar.length;i++)
	{
		if($('#'+validateFields).val().lastIndexOf(chkSchar[i])>=0)
		{
			ErrorAlert($('#'+validateFields), ispecialcharFirst+' ('+chkSchar+") "+ispecialcharLast+FieldName);
			return false;
		}
		return true;
	}
	
	
}

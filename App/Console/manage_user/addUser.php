<?php
	/* ================================================
	File Name         	  : addUser.php
	Description	          : This page is used to Add User.
	Devloper Name		  : Rasmi Ranjan Swain
	Date Created		  : 20-sep-2013
	Designed By               : Ramakanta Mishra
	Designed On		  : 15-April-2013
	Update History		  :	<Updated by>		<Updated On>		<Remarks>
							Sunil Kumar Parida	27-Sept-2013		Add user
							Rasmi Ranjan Swain	05-Nov-2013			group filed,filGroup()
							Sunil Kumar Parida	01-Sept-2014		Customize form controls
	Style sheet           : style.php, bootstrap.css                                             
	Javscript Functions   : jquery.js,loadComponent.js,bootstrap.min.js, validator.js
	includes			  : header.php,leftmenu.php,navigation.php,util.php,footer.php
	
	==================================================*/
	require("addUserInner.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $strTitle;?></title>
<link href="<?php echo $strPath;?>styles/bootstrap.css" rel="stylesheet" type="text/css">
<?php include("../includes/incStylesheet.php")?>
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/loadscript.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/loadAjax.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/loadJson.js"></script>
<link rel="stylesheet" href="<?php echo $strPath;?>styles/datepicker.css" />
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/bootstrap-datepicker.js"></script>
<script language="javascript">
	pageHeader="<?php echo $strTab;?> User"
	strFirstLink="Manage User"
	strLastLink="User Profile"	
	indicate="yes"
	function validator()
	{
		<?php if($xmlFullName==1){?>
		if (!blankFieldValidation('txtName', ' Name')) 
			return false;		
		if (!WhiteSpaceValidation1st('txtName'))
			return false;
		<?php }?>
		var today				= new Date();
		var current_datetime	= today.getDate()+'-'+Number(today.getMonth())+'-'+today.getFullYear()+'-'+today.getHours()+'-'+today.getMinutes();
		var current_date= today.getDate()+'-'+Number(today.getMonth())+'-'+today.getFullYear();
		<?php if($xmlDOB==1){?>
		if(!DropDownValidation('ddlDD','Date'))
			return false;
		if(!DropDownValidation('ddlMM','Month'))
			return false;
		if(!DropDownValidation('ddlYY','Year'))
			return false;
		
		var DOB	= $('#ddlDD').val()+'-'+Number($('#ddlMM').val()-1)+'-'+$('#ddlYY').val();
		var dayobj = new Date($('#ddlYY').val(), Number($('#ddlMM').val())-1, $('#ddlDD').val());		
        if ((dayobj.getMonth()!=Number($('#ddlMM').val()-1))||(dayobj.getDate()!=$('#ddlDD').val())||(dayobj.getFullYear()!=$('#ddlYY').val()))
		{
            alert("Invalid Date");
			$('#ddlDD').focus()
			return false;
        }		
		if(DOB==current_date)
		{	
			alert("Date of birth can not be same as current date");
			$('#ddlDD').focus();
			return false;
		}
		if(!lessDate(DOB,current_date,'ddlDD'," Date of birth can not be more than current date"))
		{
			$('#ddlDD').focus();
			return false;
		}		
		<?php }?>
		<?php if($xmlQualification==1){?>
		if (!blankFieldValidation('txtQualification', 'Qualification'))
			return false;					
		if (!IsSpecialCharacter('txtQualification', 'Special Character Not Allowed !'))
			return false;		
		<?php }?>
		<?php if($xmlSpecialization==1){?>
		if (!IsSpecialCharacter('txtSpecialisation', 'Special Character Not Allowed !'))
			return false;		
		<?php }?>
		<?php if($xmlHobby==1){?>
		if (!IsSpecialCharacter('txtSName', 'Special Character Not Allowed !'))
			return false;
		if(!MaxlengthValidation('txtSName','Hobby',500))
			return false;	
		if (!WhiteSpaceValidation1st('txtSName'))
			return false;
		<?php }?>
		<?php if($xmlPhoto==1){?>
		if(!IsCheckFile('FileImage', 'upload a valid filetype','jpg','jpeg'))
		{
			$('#FileImage').focus();
			return false;			
		}
              var file=$('#FileImage').val();
                if(file!=''){
                 if(!chkFileSize('FileImage',1024,1,2)){

                     $('#FileImage').focus();
                          return false;
                  }
              }
		<?php }?>
		<?php if($xmlMobNo==1){?>		
		if (!blankFieldValidation('txtMobile', 'Mobile No'))
			return false;
		if(!MinlengthValidation('txtMobile','Mobile No',10))
			return false;		
		<?php }?>
		<?php if($xmlEmail==1){?>	
		if (!blankFieldValidation('txtEmail', 'Email'))
			return false;
		if(!EmailValidation('txtEmail','Enter a valid Email'))
			return false;
		if($('#hdnemail').val()=='1' && '<?php echo $strEmail;?>'!=$('#txtEmail').val())
		{
			alert('This Mail Id Already Exist');
			$('#txtEmail').focus();
			return false;
		}
		<?php }?>
		<?php if($xmlAddress==1){?>
		if (!blankFieldValidation('txtAddress', 'Address'))
			return false;		
		if (!IsSpecialCharacter('txtAddress', 'Special Character Not Allowed !'))
			return false;
		if(!MaxlengthValidation('txtAddress','Address',500))
			return false;
		<?php }?>
		<?php if($xmlLocation==1){?>
		if(!DropDownValidation('selLocation','Location'))
			return false;	
		<?php }?>
		<?php if($xmlPhyLoc==1){?>
		/*if(!DropDownValidation('selphyLoc','Department Name'))
			return false;*/
		<?php }?>
		<?php if($xmlEmpType==1){?>		
		if(!DropDownValidation('selempType','Employee Type'))
			return false;	
		<?php }?>
		<?php if($xmlDOJ==1){?>		
		if (!blankFieldValidation('txtDoj', 'Date of Join'))
			return false;		
		var txtDoJ	= $('#txtDoj').val();
		var explDoJ	= txtDoJ.split('-');
		var dtDoJ	= explDoJ[0]+'-'+Number(explDoJ[1]-1)+'-'+explDoJ[2];
		var joinDate = new Date(explDoJ[2],Number(explDoJ[1]-1),explDoJ[0]);
		if(!lessDate(dtDoJ,current_date,'txtDoj'," Date of join can not be more than current date"))
		{
			$('#txtDoj').focus();
			return false;
		}
		if(!lessDate(DOB,dtDoJ,'txtDoj'," Date of Join can not be less than Date of Birth"))
				return false;
		if(dayobj.getTime()==joinDate.getTime())
		{
			alert("Date of Join can not be same as Date of Birth");
			$('#txtDoj').focus()
			return false;
		}
		<?php }?>
		<?php if($xmlProbDate==1){?>	
		var txtPrDt	= $('#txtProbation').val();
		if(txtPrDt!='')
		{			
			var explPrDt= txtPrDt.split('-');			
			var dtPrDt	= explPrDt[0]+'-'+Number(explPrDt[1]-1)+'-'+explPrDt[2];
			
			if(!lessDate(dtDoJ,dtPrDt,'txtProbation'," Probotion date can not be less than join date"))
				return false;
		}	
		<?php }?>
		<?php if($xmlDesg==1){?>
		if(!DropDownValidation('selDesignation','Designation'))
			return false;	
		<?php }?>
                    if(!DropDownValidation('selAccessType','Access Type'))
                    return false;	
		<?php if($gradeTable>0){?>
		if(!DropDownValidation('selGrade','Grade'))
			return false;
		<?php } //if($groupTable>0){?>
//		if(!DropDownValidation('selGroup','Agency'))
//			return false;
		<?php //}?>
		<?php if($xmlLogin==1){?>
		if (!blankFieldValidation('txtUser', 'User Name'))
			return false;	
		if (!IsSpecialCharacter('txtUser', 'Special Character Not Allowed !'))
			return false;
//		if($('#txtUser').val().length<2)	
//		{
//			alert('User Id must be greater than 1 character');
//			$('#txtUser').focus();
//			return false;
//		}	
		<?php if($userId==0){ ?>
		if (!blankFieldValidation('txtPassword', 'Password'))
			return false;
		if(!IsSpecialCharacter('txtPassword','Special Character Not Allowed !'))
			return false;
		if($('#txtPassword').val().length<=6)	
		{
			alert('Password must be greater than 6 character');
			$('#txtPassword').focus();
			return false;
		}	
		if (!blankFieldValidation('txtConfirmPwd', 'Confirm Password'))
			return false;
		if(!IsSpecialCharacter('txtConfirmPwd','Special Character Not Allowed !'))
			return false;	
		if($('#txtConfirmPwd').val().length<=6)	
		{
			alert('Confirm password must be greater than 6 character');
			$('#txtConfirmPwd').focus();
			return false;
		}
		if(!PasswordValidation('txtPassword','txtConfirmPwd','Password','Confirm Password'))
			return false;
		<?php }?>
		if (!blankFieldValidation('txtDomainUserName', 'Domain User Name'))
			return false;	
		<?php }?>
		<?php if($xmlRA==1){?>
		if($('#chkAuthority').is(':checked'))
		{		
			
			if (!blankFieldValidation('txtFirstAuth', 'Primary Authority'))
				return false;
		}
		<?php }?>
	}
	
	
$(document).ready(function(){
	
		defaultfocus("txtName");		
		<?php if($xmlHobby==1){?>
		TextCounter('txtHobby','lblChar',500)
		<?php }?>
		<?php if($xmlAddress==1){?>
		TextCounter('txtAddress','lblChar1',500)
		<?php }?>
		setupLabel();
		
		$('.label_check').click(function(){
			setupLabel();
		});		
		<?php if($xmlProbDate==1){?>
		$('#date').datepicker().on('changeDate', function(ev) {
			$(this).datepicker('hide')											  
		});
		<?php }?>
		<?php if($xmlDOJ==1){?>
		$('#doj').datepicker().on('changeDate', function(ev) {
			$(this).datepicker('hide')											  
		});
		<?php }?>
		<?php if($xmlLocation==1){?>fillHierarchy(0,'selLocation');<?php }?>
		<?php if($xmlRA==1){?>fillHierarchy(0,'selRaLocation');<?php }?>
		<?php if($userId>0){ ?>
			<?php if($xmlLocation==1){?>fillLevel(<?php echo $intHierarchyId;?>,'dynamic','location','selLocation','hdnNo');<?php }?>	
			<?php if($intHierarchyId>0){ ?>
				<?php if($xmlDesg==1){?>fillDesg(0,<?php echo $intHierarchyId;?>,'<?php echo $intDesgId;?>','selDesignation');<?php }?> 
			<?php if($gradeTable>0){?>
				fillGrade(0,<?php echo $intHierarchyId;?>,'<?php echo $intGradeId;?>','selGrade');
			<?php }}?>	
			
			<?php if($xmlPrivilege==1){ if($intPayRoll==1){ ?>$("#tbdetails tr.epf").show();<?php }else{?>$("#tbdetails tr.epf").hide();<?php }}?>	
			<?php if($xmlRA==1){ if($intRACheck==1){ ?>$("#tbdetails tr.Authority").show();<?php }else{?>$("#tbdetails tr.Authority").hide();<?php }}?>
		<?php }else{?>
			$("#tbdetails tr.Authority").hide();
			$("#tbdetails tr.epf").hide();
		<?php }?>
		<?php if($xmlPrivilege==1){?>
		$("#chkPayroll").change(function(){
			$("#tbdetails tr.epf").toggle(this.checked); 
		});
		<?php }?>
		<?php if($xmlRA==1){?>
		$("#chkAuthority").change(function(){			
			$("#tbdetails tr.Authority").toggle(this.checked); 
			$('.RA').not(':first').remove();
			$("#selRaLocation").val(0);
			$("#txtFirstAuth").val('');
			$("#txtSecondAuth").val('');
			$("#txtOptionalAuth").val('');
			$("#selUserFill option").remove();
			$("#selUserFill").append('<option value="0">--Select--</option>');
		});
		$( "#selUserFill" ).dblclick(function() {		
			var curVal	= this.value;
			
			if(curVal!=0)
			{
				var curText		= $("#selUserFill option[value='"+curVal+"']").text();			
				var radCheck	= $("input:radio[name=Authority]:checked").val();
				if($('#hdnPrimaryRa').val()==curVal || $('#hdnSecondaryRa').val()==curVal || $('#hdnOptionalRa').val()==curVal)
				{
					alert("This user already assigned as RA");
					return false;
				}
				if(radCheck==1)
				{
					$('#txtFirstAuth').val(curText);
					$('#hdnPrimaryRa').val(curVal);
				}
				if(radCheck==2)
				{
					$('#txtSecondAuth').val(curText);
					$('#hdnSecondaryRa').val(curVal);
				}
				if(radCheck==3)
				{
					$('#txtOptionalAuth').val(curText);
					$('#hdnOptionalRa').val(curVal);
				}
			}
		});
		<?php }?>
			
		<?php if($groupTable>0){?>
			fillgroup('<?php echo $intGroupId; ?>','selGroup');
		<?php }?>
		
		<?php if($outMsg!=''){?>
			alert('<?php echo $outMsg;?>');
			$('form').submit();
		<?php }?>
		<?php if($errFlag==1){?>
			doCancel('viewUser/<?php echo $glId;?>/<?php echo $plId;?>/<?php echo $pageNo;?>/<?php echo $recNo;?>');
		<?php }?>	
		
		

		$("#selDesignation").change(function(){			
			var selDesignation=$(this).val();
			// if(selDesignation==19){
			// 	$('#rangetr').show();
				fillRange(0,'selRange');
			// }else{
			// 	$('#rangetr').hide();
			// }
		});
		<?php if($userId>0 ){?>			
				$('#rangetr').show();
				fillRange(<?php echo $intGroupId;?>,'selRange');
			
	
		<?php }?>
});
	$(document).keyup(function(){
		defaultBtn(event,validator);
	});
	function readImage(input) 
	{
		$('#userImage').show();
		if (input.files && input.files[0]) {
			var reader = new FileReader();
	
			reader.onload = function (e) {
				$('#userImage').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	function doMultiple(flag)
	{
		if(flag==0)
		{
				$("#RaName").hide();
				$("#RaLocation").show();
				$('#txtRAName').val('');
		}		
		else
		{		
				$("#RaName").show();
				$("#RaLocation").hide();				
				$('.RA').not(':first').remove();
				$('#selRaLocation').val('0');
		}
	}
</script>
</head>
<body>
<form id="frmAdmin" name="frmAdmin" method="post" enctype="multipart/form-data" >
  <div id="mainTable">
    <!-- Header Area-->
    <?php include("../includes/header.php");?>
    <!-- Header Area-->
    <!-- Login Area-->
    <div id="MidTab" style="clear:both;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td id="LeftMenu" valign="top"><?php include("../includes/leftmenu.php") ?></td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php include("../includes/navigation.php")?></td>
              </tr>
              <tr>
                <td valign="top"><div id="ContArea">
                    <?php include('../includes/title.php'); ?>
                    <div style="margin-top:-30px; float:right;">
                        <a href="<?php echo $strPath;?>viewUser/<?php echo $glId;?>/<?php echo $plId;?>" class="btn btn-info" title="Total number of user">Total Users <br /><?php echo $totalUsers;?></a>
                        <a href="<?php echo $strPath;?>viewUser/<?php echo $glId;?>/<?php echo $plId;?>/1" class="btn btn-success" title="Number of active user">Active Users<br /><?php echo $activeUsers;?></a>
                        <a href="<?php echo $strPath;?>viewUser/<?php echo $glId;?>/<?php echo $plId;?>/2" class="btn btn-warning" title="Number of inactive user">Inactive Users<br /><?php echo $inactiveUsers;?></a>
                        <a href="<?php echo $strPath;?>viewExUser/<?php echo $glId;?>/<?php echo $plId;?>"class="btn btn-danger" title="Number of Ex Employee">Ex-Employee<br /><?php echo $exEmployees;?></a>
                    </div>
                    <div class="clear"></div>
                    <div class="MyTab">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#"><?php echo $strTab;?></a></li>
                        <li><a href="<?php echo $strPath;?>viewUser/<?php echo $glId;?>/<?php echo $plId;?>">View</a></li>
                        <li><a href="<?php echo $strPath;?>viewExUser/<?php echo $glId;?>/<?php echo $plId;?>">Ex Employee</a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>
                    </div>
                    <div id="addTable">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" id="tbdetails">
                        <tr>
                          <th colspan="4">Personal Details</th>
                        </tr>
                        <tr>
                          <td width="170">Full Name</td>
                          <td width="4" align="center" valign="middle">:</td>
                          <td colspan="2"><input name="txtName" type="text" id="txtName" style="width:200px;"  value="<?php echo $strFullName;?>" maxlength="100" onkeypress="return !isNumberKey(event);"/>
                            &nbsp;<span class="mandatory">*</span></td>
                        </tr>
                            <tr>
                          <td width="170">Short Name</td>
                          <td width="4" align="center" valign="middle">:</td>
                          <td colspan="2"><input name="txtSName" type="text" id="txtSName" style="width:200px;"  value="<?php echo $strShortName;?>" maxlength="100" onkeypress="return !isNumberKey(event);"/>
                            &nbsp;<span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <td>Gender</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><input type="radio" name="radGender" id="radGender" value="1" <?php if($intGender==1){ ?> checked="checked"<?php }?> />
                            Male
                            &nbsp;
                            <input type="radio" name="radGender" id="radGender" value="2" <?php if ($intGender==2){?> checked="checked"<?php }?> />
                            Female 
                            &nbsp;<span class="mandatory">*</span></td>
                        </tr>
						<?php if($xmlDOB==1){?>
                        <tr>
                          <td>Date Of Birth</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><select name="ddlDD" id="ddlDD" style="width:61px; ">
                              <option>DD</option>
                              <?php
							  for($day=1;$day<=31;$day++)
							  {
								  if($day==$explDOB[0])
								  $selectDay='selected="selected"';
							  	  else
								  $selectDay='';
							  ?>
                              <option value="<?php echo $day; ?>"<?php echo $selectDay ?>><?php echo $day; ?></option>
                              <?php } ?>
                            </select>
                            <select name="ddlMM" id="ddlMM" style="width:61px;">
                              <option>MM</option>
                            <?php
                                for ($month=1;$month<=12;$month++)
                                {
                                      if($month== $explDOB[1])
                                      $selectMonth='selected="selected"';
                                      else
                                      $selectMonth='';
                                ?>
                              <option value="<?php echo $month?>"<?php echo $selectMonth?>><?php echo date("M",mktime(0,0,0,$month)); ?></option>
                              <?php }?>
                            </select>
                            <select name="ddlYY" id="ddlYY" style="width:80px;">
                              <option>YYYY</option>
                              <?php 
							  for($year=1950;$year<=date('Y');$year++)
							  {
								  if($year==$explDOB[2])
								  	$selectYear='selected="selected"';
									else
									$selectYear='';
							  ?>
                              <option value="<?php echo $year; ?>" <?php echo $selectYear?> ><?php echo $year; ?></option>
                              <?php } ?>
                            </select>
                            &nbsp;<span class="mandatory">*</span></td>
                        </tr>
						<?php }?>
						<?php if($xmlQualification==1){?>
                        <tr>
                          <td>Qualification</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><input name="txtQualification" type="text" id="txtQualification" style="width:200px;" value="<?php echo $strQualification; ?>" maxlength="50" />
                            &nbsp;<span class="mandatory">*</span></td>
                        </tr>
						<?php } ?>
						<?php if($xmlSpecialization==1){?>
                        <tr>
                          <td>Specialisation</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><input name="txtSpecialisation" type="text" id="txtSpecialisation" style="width:200px;" value="<?php echo $strSpecialization; ?>" maxlength="100" /></td>
                        </tr>
						<?php } ?>
						<?php if($xmlHobby==1){?>
                        <tr>
                          <td>Hobby</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><textarea name="txtHobby" id="txtHobby" rows="3" cols="20" style="width:200px;"   onkeyup="blockspecialchar_first(this);return TextCounter('txtHobby','lblChar',500)"><?php echo $strHobby; ?></textarea>
                            &nbsp; Maximum <span id="lblChar"></span> &nbsp;characters </td>
                        </tr>
						<?php } ?>
						<?php if($xmlPhoto==1){?>
                        <tr>
                          <td>Upload Photo</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><input type="file" id="FileImage"  name="FileImage" value="FileImage" style=" width:200px;" onchange="readImage(this);">
                            <input type="hidden" name="hdnImageFile" id="hdnImageFile" value="<?php echo $strImage;?>" />
                            <img name="userImage" id="userImage" style="<?php echo $display;?>" src="<?php echo $strPath.'uploadDocuments/UserImage/'.$strImage;?>" alt="userImage"  width="75" height="30" /><span >Accepted file types are .jpg,.jpeg.</span></td>
                        </tr>
						<?php } ?>
                        <tr>
                          <th colspan="4">Contact Details</th>
                        </tr>
						<?php if($xmlPhNo==1){?>
                        <tr>
                          <td>Office Phone No./Extn</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><input type="text" name="txtOffPh" id="txtOffPh" style="width:143px;" maxlength="12" value="<?php echo $strPhNo;?>" onKeyPress="return isNumberKey(event);"/> 
                          / 
                           <input type="text" name="txtExtn" id="txtExtn" style="width:40px;" maxlength="3" value="<?php echo $strExtnNo;?>" onKeyPress="return isNumberKey(event);"/></td>
                        </tr>
						<?php } ?>
						<?php if($xmlMobNo==1){?>
                        <tr>
                          <td>Mobile No.</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><input type="text" name="txtMobile" id="txtMobile" style="width:200px;"  value="<?php echo $strMobNo;?>" maxlength="10" onKeyUp="return blockspecialchar_first(this);" onKeyPress="return isNumberKey(event);"/>
                            &nbsp;<span class="mandatory">*</span></td>
                        </tr>
						<?php } ?>
						<?php if($xmlEmail==1){?>
                        <tr>
                          <td>E-Mail</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><input type="text" name="txtEmail" id="txtEmail" style="width:200px;"  value="<?php echo $strEmail;?>" maxlength="50" onKeyUp="return blockspecialchar_first(this);" />
                            &nbsp;<span class="mandatory">*</span> <span id="checkmail" title='eMail Already Exist' data-toggle='tooltip' data-placement='right'></span>
                            <input type="hidden" name="hdnemail" id="hdnemail" value="0" /></td>
                        </tr>
						<?php } ?>
						<?php if($xmlAddress==1){?>
                        <tr>
                          <td>Address</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><textarea name="txtAddress" id="txtAddress" rows="3" cols="20" style="width:200px;"   onkeyup="blockspecialchar_first(this);return TextCounter('txtAddress','lblChar1',500)"><?php echo $strAddress;?></textarea>
                            &nbsp;<span class="mandatory">*</span> &nbsp; Maximum <span id="lblChar1"></span> &nbsp;characters</td>
                        </tr>
						<?php } ?>
                        <tr>
                          <th colspan="4">Service Details</th>
                        </tr>
						<?php if($xmlLocation==1){?>
                        <tr id="location" class="dynamic">
                          <td><span class="lbldynamic">Location</span></td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><select name="selLocation" id="selLocation" style="width:207px;" class="seldynamic" onchange="fillSubnode(this.value,0,0,'location','dynamic','hdnNo','',''); 
                              fillDesg(this.value,0,0,'selDesignation'); ">
                            </select>
                            <input type="hidden" name="hdnNo" id="hdnNo"/>
                            &nbsp;<span class="mandatory">*</span></td>
                        </tr>
						<?php } ?>
						<?php if($xmlEmpType==1){?>
                        <tr>
                          <td>User Type </td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><select name="selempType" id="selempType" style="width:207px;">
                              <option value="0" >--Select--</option>
                              <option value="1" <?php if($intEmpType==1){?> selected="selected" <?php }?>>Supervisor</option>
							  <option value="2" <?php if($intEmpType==2){?> selected="selected" <?php }?>>ATA</option>
                            </select>
                            &nbsp;<span class="mandatory">*</span></td>
                        </tr>
						<?php } ?>
						<?php if($xmlPhyLoc==1){?>
                        <tr>
                          <td>Department name</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><select name="selphyLoc" id="selphyLoc" style="width:207px;" >
						  <?php echo $offOpts;?>
                            </select>
                            <!--&nbsp;<span class="mandatory">*</span>--></td>
                        </tr>
						<?php } ?>
						<?php if($xmlDOJ==1){?>
                        <tr>
                          <td>Date Of Joining </td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><div class="input-append date" id="doj" data-date-format="dd-mm-yyyy">
                              <input name="txtDoj" type="text" class="span2" id="txtDoj" style="width:172px;" value="<?php echo $dtmDtOfJoin;?>" size="16" maxlength="15" readonly="readonly">
                              <span class="add-on"><i class="icon-th"></i></span> </div>  <span class="mandatory">*</span></td>
                        </tr>
						<?php } ?>
						<?php if($xmlProbDate==1){?>
                        <tr>
                          <td>Probation Completion Date </td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><div class="input-append date" id="date" data-date-format="dd-mm-yyyy">
                              <input name="txtProbation" type="text" class="span2" id="txtProbation" style="width:172px;" value="<?php echo $dtmProbotionDt;?>" maxlength="15" readonly="readonly">
                              <span class="add-on"><i class="icon-th"></i></span> </div>
						  	  <a href="javascript:void(0);" class="mandatory" title="Clear" onclick="$('#txtProbation').val('');">X</a>						  </td>
                        </tr>
						<?php } ?>
						<?php if($xmlDesg==1){?>
                        <tr>
                          <td>Designation </td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><select name="selDesignation" id="selDesignation" style="width:207px;" >
                              <option >--Select--</option>
                            </select>
                            &nbsp;<span class="mandatory">*</span></td>
                        </tr>


						
						<?php } ?>


						<tr id="rangetr" >
                          <td>Range </td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2">
						    <select name="selRange" id="selRange" style="width:207px;"  >
								<option value="0">--Select--</option>
							</select>
                            </td>
                        </tr>


						<?php if($gradeTable>0){?>
                        <tr>
                          <td>Grade</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><select name="selGrade" id="selGrade" style="width:207px;">
                              <option >--Select--</option>
                            </select>
                            &nbsp;<span class="mandatory">*</span></td>
                        </tr>
						<?php }if($groupTable>0){?>
                        <!-- <tr>
                          <td>Agency</td>
                          <td align="center" valign="middle">&nbsp;</td>
                          <td colspan="2"><select name="selGroup" id="selGroup" style="width:207px;">
                            <option >--Select--</option>
                          </select> 

                        </tr> -->
						<?php }?>
                           <tr>
                          <td>Access Type</td>
                          <td align="center" valign="middle">&nbsp;</td>
                          <td colspan="2">
                              <select name="selAccessType" id="selAccessType" style="width:207px;">
                                <option val="0">--Select--</option>
                                <option value="1" <?php if($accessType==1){ echo "selected"; }?> >All</option>
                                <option value="2" <?php if($accessType==2){ echo "selected"; }?> >Web</option>
                                <option value="3" <?php if($accessType==3){ echo "selected"; }?> >Mobile</option>
                              </select>
                              &nbsp;<span class="mandatory">*</span>
                          </td>
                         </tr>
						<?php if($xmlPrivilege==1){?>
                        <tr>
                          <td>Option</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><label class="label_check" style="float:left;">
                              <input name="chkPrivilege" id="chkPrivilege" value="1" type="checkbox" <?php if($intPrivilege==1){?> checked="checked" <?php }?>>
                              Super Admin Previlege </label>
                             </td>
                        </tr>						

						<?php }?>
						<?php if($xmlLogin==1){?>
                        <tr>
                          <th colspan="4">Login Details</th>
                        </tr>
                        <tr>
                          <td>User Name</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><input type="text" name="txtUser" id="txtUser" style="width:200px;" onkeypress="return isUserName(event);"  onBlur="if('<?php echo $userId;?>'==0){checkUserName(this.value,'txtUser','checkId','hdnuser');} {this.className='input';} " value="<?php echo $strUserName;?>" maxlength="50" onKeyUp="$('#txtDomainUserName').val(this.value);" <?php  //echo $readOnly; ?> />
                            &nbsp;<span class="mandatory">*</span> <span id="checkId" title='User Already Exist' data-toggle='tooltip' data-placement='right' class="mandatory"></span>
                            <input type="hidden" name="hdnuser" id="hdnuser" /></td>
                        </tr>
                        <?php if($userId==0){ ?>
                        <tr>
                          <td>Password </td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><input name="txtPassword" type="password" id="txtPassword" style="width:200px;"  value="" maxlength="50" onkeypress="return isUserName(event);" />
                            &nbsp;<span class="mandatory">*</span></td>
                        </tr>
                        <tr>
                          <td>Confirm Password</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><input name="txtConfirmPwd" type="password" id="txtConfirmPwd" style="width:200px;"  value="" maxlength="50" onkeypress="return isUserName(event);" />
                            &nbsp;<span class="mandatory">*</span></td>
                        </tr>
                        <?php }?>
                        <tr>
                          <td>Domain Username</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><input name="txtDomainUserName" type="text" id="txtDomainUserName" style="width:200px;"  value="<?php echo $strDomainName;?>" maxlength="50" />
                            &nbsp;<span class="mandatory">*</span>
                            </td>
                        </tr>
						<?php }?>
						<?php if($xmlRA==1){?>
                        <tr>
                          <th colspan="4"><label class="label_check" style="float:left;">
                              <input name="chkAuthority" id="chkAuthority" type="checkbox" value="1" <?php if($intRACheck==1){?> checked="checked" <?php }?>/>
                              Reporting Authority</label></th>
                        </tr>
                        <tr class="Authority">
                          <td>User Type</td>
                          <td align="center" valign="middle">&nbsp;</td>
                          <td colspan="2"><input name="radiobutton" type="radio" value="radiobutton" id="radiobutton" checked="checked" onclick="doMultiple(0);" /> Hierarchy Wise
                          <input name="radiobutton" type="radio" value="radiobutton" id="radio" onclick="doMultiple(1);"/>Name Wise</td>
                        </tr>
                        <tr id="RaLocation" class="Authority RA">
                          <td>Location</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><select name="selRaLocation" id="selRaLocation" style="width:207px;" onchange="fillSubnode(this.value,0,0,'RaLocation','RA','hdnAuthority','U','selUserFill');">
                            </select>&nbsp;<span class="mandatory">*</span>
                            <input type="hidden" name="hdnAuthority" id="hdnAuthority"/>                              </td>
                        </tr>
						<tr id="RaName" style="display:none;">
                          <td>Name</td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2">
						  	<input type="text" id="txtRAName" name="txtRAName" maxlength="100" onkeyup="showUser(this.value,0,'selUserFill');" style="width:200px;"/>
						  </td>
                        </tr>
                        <tr class="Authority">
                          <td>Primary Authority</td>
                          <td align="center" valign="middle">:</td>
                          <td width="270"><input name="txtFirstAuth" type="text" id="txtFirstAuth"  style="width:200px;" value="<?php echo $strPrimaryRAName;?>" maxlength="100" readonly="readonly"/>
                            <input type="hidden" name="hdnPrimaryRa" id="hdnPrimaryRa" value="<?php echo $intPrimaryRA;?>"/>
                            <input type="radio" name="Authority" id="radPrimary" value="1" checked="checked" />
                            <a href="javascript:void(0);" class="mandatory" onclick="$('#txtFirstAuth').val('');$('#hdnPrimaryRa').val('');">X</a> <span class="mandatory">*</span></td>
                          <td rowspan="3"> Doube click on Options to set Authority<br />
                            <select name="selUserFill" id="selUserFill" size="5" multiple style="width:200px;" onchange="$.showUserImage(this.value,'showImg','30','30');">
                              <option value="0">--Select--</option>
                            </select>
							<span id="showImg"></span>
						  </td>
                        </tr>
                        <tr class="Authority">
                          <td>Secondary Authority </td>
                          <td align="center" valign="middle">:</td>
                          <td><input name="txtSecondAuth" type="text" id="txtSecondAuth"  style="width:200px;" value="<?php echo $strSecondaryRAName;?>" maxlength="100" readonly="readonly"/>
                            <input type="hidden" name="hdnSecondaryRa" id="hdnSecondaryRa"  value="<?php echo $intSecondaryRA;?>"/>
                            <input type="radio" name="Authority" id="radSecondary" value="2" />
                            <a href="javascript:void(0);" class="mandatory" onclick="$('#txtSecondAuth').val('');$('#hdnSecondaryRa').val('');">X</a></td>
                        </tr>
                        <tr class="Authority">
                          <td>Optional Authority</td>
                          <td align="center" valign="middle">:</td>
                          <td><input name="txtOptionalAuth" type="text" id="txtOptionalAuth"  style="width:200px;"  value="<?php echo $strOptionalRAName;?>" maxlength="100" readonly="readonly"/>
                            <input type="hidden" name="hdnOptionalRa" id="hdnOptionalRa"  value="<?php echo $intOptionalRA;?>" />
                            <input type="radio" name="Authority" id="radOptional" value="3" />
                            <a href="javascript:void(0);" class="mandatory" onclick="$('#txtOptionalAuth').val('');$('#hdnOptionalRa').val('');">X</a></td>
                        </tr>
						<?php }?>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="center" valign="middle">&nbsp;</td>
                          <td colspan="2"><input name="btnSubmit" type="submit" class="btn btn-success" id="btnSubmit" value="<?php echo $strSubmit; ?>" onclick="return validator();" />
                            <input name="btnReset" type="reset" class="btn btn-danger" id="btnReset" value="<?php echo $strReset;?>" <?php echo $strOnclick; ?> />
							<input type="hidden" name="hdnStatus" id="hdnStatus" value="<?php echo $intStatus;?>" />
                            <input type="hidden" name="hdnSLNo" id="hdnSLNo" value="<?php echo $maxSL;?>" />
							</td>
                        </tr>
                      </table>
                    </div>
                  </div></td>
              </tr>
            </table></td>
        </tr>
      </table>
    </div>
    <!-- Login Area-->
    <!-- Footer Area-->
    <?php include("../includes/footer.php")?>
    <!-- Footer Area-->
  </div>
</form>
</body>
</html>
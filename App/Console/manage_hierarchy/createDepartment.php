<?php 
	/* ================================================
	File Name         	  : createDepartment.php
	Description			  : This page is used to Add Hierarchy Subnode Values.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 23-Aug-2013
	Update History		  :
				<Updated by>		<Updated On>		<Remarks>
			Sunil kumar Parida		11/10/2013			update design and remove mandatory of alias	
			Rasmi Ranjan swain		15/11/2013			Edit action performed.
	includes			  : createSubNodeInner.php
	Style sheet           : style.php,bootstrap.css                                            
	Javscript Functions   : jquery.js,bootstrap.min.js,loadScript.js
	==================================================*/
	require("createDepartmentInner.php");
	
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
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/validator.js"></script>
<script language="javascript">
	pageHeader="<?php echo $strTab;?> <?php echo $subNodeName;?>"
	strFirstLink="Hierarchy Master"
	strLastLink="<?php echo $subNodeName;?>"
	indicate="yes"
	$(document).ready(function(){
		$("form").find('input[type=text],textarea,select').filter(':visible:first').focus();
		$("form").attr('autocomplete','off');
		TextCounter('txtAddress','lblChar1',500);		 
		  <?php 
		  if($intID>0)
		  {
		  	$explParents	= explode(",", $parents);
		  	$countParent	= count($explParents);
			$parentNext		= $countParent-1;
		  }
			?><?php
			if($level>1 && $intID>0){
				for($i=1;$i<$level;$i++){
				if($intID>0)
				{
					$parentNext--;
					$nextParent	= $parentNext-1;
					if($countParent>0)
					{
						$node_id	= $explParents[$parentNext];
					}	
						$next_id	= $explParents[$nextParent];
				}
				
				$fillId	= $i+1;		
				$nodeVal	= ($intID>0)?$node_id:$_REQUEST['ddlNode'.$i];
				if($i<$level-1)
					$fillVal	= ($intID>0)?$next_id:$_REQUEST['ddlNode'.$fillId];	
			?>
			$('#ddlNode<?php echo $i;?>').val('<?php echo $nodeVal;?>');
			<?php 
			if($i<$level-1){?>	
				getNodeValues('<?php echo $strPath;?>fillNode','<?php echo $nodeVal;?>','ddlNode<?php echo $fillId;?>','<?php echo $fillVal;?>');	
			<?php }}}?>			
			
			<?php if($outMsg['outMsg']!=''){?>
				alert('<?php echo $outMsg['outMsg'];?>');
				
				<?php if($outMsg['flag']==1){?>					
					doCancel('viewDepartment/<?php echo $glId;?>/<?php echo $plId;?>/<?php echo $slId;?>/<?php echo $tlId;?>/<?php echo $pageNo;?>/<?php echo $recNo;?>');
			<?php }}?>
	});
</script>
</head>
<body>
<form id="frmAdmin" name="frmAdmin" method="post" enctype="multipart/form-data">
  <div id="mainTable">
    <!-- Header Area-->
    <?php include("../includes/header.php")?>
    <!-- Header Area-->
    <!-- Login Area-->
    <div id="MidTab">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td id="LeftMenu" valign="top"><?php include("../includes/leftmenu.php") ?></td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php include("../includes/navigation.php")?></td>
              </tr>
              <tr>
                <td valign="top"><div id="ContArea" style="min-height:450px;">
                    <?php include('../includes/title.php'); ?>
                    <div class="MyTab">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#"><?php echo $strTab;?></a></li>
                        <li><a href="<?php echo $strPath; ?>viewDepartment/<?php echo $glId;?>/<?php echo $plId;?>/<?php echo $nodeId;?>/<?php echo $subNodeId;?>">view</a></li>
                      </ul>
					  
                      <?php include('../includes/util.php'); ?>
                    </div>
                    <div id="addTable">
                    <table border="0" cellspacing="0" cellpadding="0">
					  <?php 					  
					  	for($tr=1;$tr<$level;$tr++){
						$subNodeNames	= $obj->getSubnode($nodeId,$tr);
						$fillControl	= $tr+1;
						$onChangeFunc	= '';
							if($tr<$level-1)
								$onChangeFunc	= "getNodeValues('".$strPath."fillNode',this.value,'ddlNode".$fillControl."','0');";
					  ?>
					  <tr>
						<td><span id="spnNode<?php echo $tr;?>"><?php echo $subNodeNames;?></span> Name</td>
						<td align="center" valign="middle">:</td>
						<td>
							<select style="width:208px;" name="ddlNode<?php echo $tr;?>" id="ddlNode<?php echo $tr;?>" onchange="<?php echo $onChangeFunc;?>">
								<?php 
									if($tr==1)									
										echo $obj->fillNodeDropdown($nodeId,0);									
									else
										echo '<option value="0" title="Select">--Select--</option>';								
								?>
							</select>&nbsp;<span class="mandatory">*</span>
						</td>
					  </tr>
					  <?php }?>
					  <tr>
						<td><span id="spnNode"><?php echo $subNodeName;?></span> Name</td>
						<td align="center" valign="middle">:</td>
						<td><input type="text" name="txtDept" id="txtDept" style="width:200px;"  value="<?php echo $name;?>" maxlength="50"/>
						<span class="mandatory">*</span>&nbsp;</td>
					  </tr>
					  <tr>
						<td>Hierarchy Code</td>
						<td align="center" valign="middle">:</td>
						<td><input type="text" name="txtHierarchyCode" id="txtHierarchyCode" style="width:200px;" maxlength="10"  value="<?php echo $hCode;?>"/></td>
					  </tr>
					  <tr>
						<td>Telephone No.</td>
						<td align="center" valign="middle">:</td>
						<td><input type="text" name="txtTelNo" id="txtTelNo" style="width:200px;" onkeypress="return isNumberKey(event);" maxlength="15" value="<?php echo $telNo;?>"/></td>
					  </tr>
					  <tr>
						<td>Fax No.</td>
						<td align="center" valign="middle">:</td>
						<td><input type="text" name="txtFaxNo" id="txtFaxNo" style="width:200px;" maxlength="15" value="<?php echo $faxNo;?>"/></td>
					  </tr>
					   <tr>
						<td>Address</td>
						<td align="center" valign="middle">:</td>
						<td><textarea name="txtAddress" id="txtAddress" rows="3" cols="20" style="width:200px;" onkeyup="blockspecialchar_first(this);return TextCounter('txtAddress','lblChar1',500)"><?php echo $address;?></textarea>
												&nbsp; Maximum <span id="lblChar1"></span> &nbsp;characters </td>
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td align="center" valign="middle"></td>
						<td><input name="btnSubmit" type="submit" class="btn btn-success" id="btnSubmit" value="<?php echo $strSubmit; ?>" onclick="return validate('<?php echo $level;?>');"/>
							<input name="reset" type="reset" class="btn btn-danger" id="reset" <?php echo $strReset; ?> <?php echo $strOnclick; ?> /></td>
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
  <script>
  function validate(level)
  {
  	for(var i=1; i<level; i++)
	{
		if($('#ddlNode'+i).val()==0)
		{
			var name	= $('#spnNode'+i).text();
			alert(name+' name can not left blank');
			$('#ddlNode'+i).focus();
			return false;
		}
	}
	var nodeName	= $('#spnNode').text();
	if (!blankFieldValidation('txtDept', nodeName+' Name Value'))
			return false;
	if (!IsSpecialCharacter('txtDept', 'Special Character Not Allowed !')) 
			return false;
			
	if (!IsSpecialCharacter('txtHierarchyCode', 'Special Character Not Allowed !')) 
		return false;
	
	if (!IsSpecialCharacter('txtTelNo', 'Special Character Not Allowed !')) 
		return false;
	if($('#txtTelNo').val().length>0 && $('#txtTelNo').val().length<10)
	{
		alert("Telephone number must be 10 digit number");
		$('#txtTelNo').focus();
		return false;
	}
	
	if (!IsSpecialCharacter('txtFaxNo', 'Special Character Not Allowed !')) 
		return false;
	
	if (!IsSpecialCharacter('txtAddress', 'Special Character Not Allowed !')) 
		return false;
	
	if($('#txtAddress').val().length>500 )
	{
		alert("Address should not more than 500 character");
		$('#txtAddress').focus();
		return false;
	}
  }
  </script>
</form>
</body>
</html>
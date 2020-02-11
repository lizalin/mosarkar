<?php 
	/*================================================
	File Name         	  : viewDepartment.php
	Description			  : This page is used to view Subnode Values.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 05-Sep-2013
	Update History		  :
				<Updated by>		<Updated On>		<Remarks>
				
	
	includes			  : viewDepartmentInner.php

	==================================================*/
	require("viewDepartmentInner.php");
       
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
<script language="javascript">
	pageHeader="View <?php echo $subNodeName;?>"
	strFirstLink="Hierarchy Master"
	strLastLink="<?php echo $subNodeName;?>"
	printMe="yes"
	backMe="yes"
	refreshMe="yes"
	$(document).ready(function(){
		$("form").find('input[type=text],textarea,select').filter(':visible:first').focus();
		$("form").find('input[type=text],textarea').keyup(function() {
		  return blockspecialchar_first(this);
		});
		$("form").attr('autocomplete','off');
		RowColChange()
		setupLabel();
		viewSearchPannel('<?php echo $searchPannelFlag;?>', 'searchPanel', 'chkSearch');
		$('.label_check').click(function(){
			setupLabel();
		});
		$('.txt').hide();
		$('.update').hide();
		$('.cancel').hide();
		<?php if($outMsg['outMsg']!=''){?>		
			alert("<?php echo $outMsg['outMsg'];?>");	
			$('form').submit();
		<?php }?>
	});
</script>
</head>

<body>
<form id="frmAdmin" name="frmAdmin" method="post">
  <div id="mainTable">
    <!-- Header Area-->
    <?php include("../includes/header.php")?>
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
                <td valign="top"><div id="ContArea">
                    <?php include('../includes/title.php'); ?>
                    <div class="MyTab">
                      <ul class="nav nav-tabs">
                        <li><a href="<?php echo $strPath;?>createDepartment/<?php echo $glId;?>/<?php echo $plId;?>/<?php echo $nodeId;?>/<?php echo $subNodeId;?>">Add</a></li>
                        <li class="active"><a href="#">View</a></li>						
                      </ul>
					  
					  <?php include('../includes/util.php'); ?>
                    </div> 
					<?php if($level>1){?>
					<div class="searchpanel" id="searchPanel"> 
                     <table border="0" cellspacing="0" cellpadding="0">
                        <?php 
					  	for($tr=1;$tr<$level;$tr++){
						$alias	= $obj->getSubnode($nodeId,$tr);
						$fillControl	= $tr+1;
						$onChangeFunc	= '';
							if($tr<$level-1)
								$onChangeFunc	= "getNodeValues('".$strPath."fillNode',this.value,'ddlNode".$fillControl."','0');";
					  ?>
					  <tr>
						<td><?php echo $alias;?> Name</td>
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
					  	<td></td>
						<td></td>
						<td><input type="submit" name="btnSearch" value="Show" class="btn btn-success" onclick="return validSearch('<?php echo $level;?>');"/></td>
					  </tr>
                      </table>
                    </div>
					<div align="center"><a href="#" class="btn btn-search" id="chkSearch" style="font-weight:bold;"></a></div>
					<?php }?>
					<div class="pagingResult" style="text-align:right; margin:5px 10px;">
					  <?php
                                          
							if($obj->NumRow($result)>0)
							{
								$intCount	= $intRecno;
								$ctr	= $obj->NumRow($result);
						?>
					<input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno;?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno;?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging;?>" />
                      
					   <?php
						 if($intTotalRec>$intPgSize && $isPaging==0)
                          {
                             $RetPaging=$obj->ShowPaging($intTotalRec,$intCurrPage,$intPgSize,0);
							 echo '<span class="utilBtnTotalPage">'.$RetPaging[0].' of <strong><a onclick="AlternatePaging();" href="#">'.$intTotalRec.'</a></strong></span> ';
                          }
                        else
                          {
                              echo "<span class='utilBtnTotalPage'>All Results: <a onclick='AlternatePaging();' href='#'>".$intTotalRec."</a></span>";
                          }						  
					 
							$TopPaging=$obj->ShowPaging($intTotalRec,$intCurrPage,$intPgSize,1);
							if($intTotalRec > $intPgSize && $isPaging==0)
							  {
								  echo '<span class="utilBtnPagingTop">'.$TopPaging[2].'</span>';
							  }	
							}
						 
						?>
						</div>
                    <div id="viewTable">
					<?php if($ctr>0){?>
                      <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
                        <tr>
                          <th width="20" class="noPrint" style="display:none;"><label class="label_check">
                              <input name="cbBOX" id="cbBOX" value="checkbox"  onClick="isSelectAll(this,'frmAdmin')" type="checkbox">
                            </label>
                          </th>
                          <th width="20">Sl#</th>
                          <th><?php echo $subNodeName;?> Name</th>
                          <th>Hierarchy Code</th>
                          <th>Address</th>
                          <th>Telephone No.</th>
                          <?php if($_REQUEST['TL']==3){?>
                          <th class="noPrint">Tag Assembly<i class="glyphicon glyphicon-tag"></i></th>
                          <?php } ?>
                          <?php if($_REQUEST['TL']!=4){?>
                          <th>Fax No.</th>
                          <?php } ?>
                          <th width="35" class="noPrint">Edit </th>
                        </tr>
						<?php while($row=mysqli_fetch_array($result)){$intCount++;?>
                        <tr>
                          <td class="noPrint" style="display:none;"><label class="label_check">
                              <input name="cbItem<?php echo $intCount;?>" id="cbItem<?php echo $intCount;?>" value="1" type="checkbox">
                            </label><input name="hdnId<?php echo $intCount;?>" id="hdnId<?php echo $intCount;?>" type="hidden" value="<?php echo $row['INT_SUBNODEVAL_ID'];?>" />
						  </td>
                          <td><?php echo $intCount;?></td>
                          <td><?php echo $row['VCH_VALUE_NAME'];?></td>
                          <td><?php echo $row['VCH_HIERARCHY_CODE'];?></td>
                          <td><?php echo $row['VCH_ADDRESS'];?></td>
                          <td><?php echo $row['VCH_TEL_NO'];?></td>
                          <?php if($_REQUEST['TL']==3){?>
                          <td class="noPrint">
                              
                              <select class="clsAssembly" name="selAssemblyId<?php echo $row['INT_SUBNODEVAL_ID'];?>" id="selAssemblyId<?php echo $row['INT_SUBNODEVAL_ID'];?>">
                                  <?php //echo $assemblyResult;?>
                              </select>
                              <script>
                              $("#selAssemblyId<?php echo $row['INT_SUBNODEVAL_ID'];?>").val(<?php echo $row['assemblyId'];?>);
                              </script>
                              <i class="icon-tag" onclick="setAssemblyTag('<?php echo $row['INT_SUBNODEVAL_ID'];?>');" title="Tag" style="cursor:pointer"></i>
                          </td>
                          <?php } ?>
                          <?php if($_REQUEST['TL']!=4){?>
                          <td><?php echo $row['VCH_FAX_NO'];?></td>
                          <?php } ?>
                          <td align="center" valign="middle" class="noPrint" width="90px">					
                          <a href="<?php echo $strPath;?>createDepartment/<?php echo $glId;?>/<?php echo $plId;?>/<?php echo $slId;?>/<?php echo $tlId;?>/<?php echo $row['INT_SUBNODEVAL_ID'];?>/<?php echo $intPgno;?>/<?php echo $intRecno;?>" title="Edit" class="btn btn-info"><i class="icon-white icon-edit"></i></a>
						  </td>
                        </tr>
                        <?php }?>
                      </table>
					 <?php } else {?>
					 	<div align="center" class="mandatory">No records found</div>
					 <?php }?>
					 <input type="hidden" name="hdnAction" id="hdnAction" />
					 <input type="hidden" name="hdnId" id="hdnId" />
					 <input name="hdn_qs" id="hdn_qs" type="hidden" />
                     <input name="hdn_ids" id="hdn_ids" type="hidden" />
					 <input type="hidden" name="hdnStartIndex" id="hdnStartIndex" value="<?php echo $intRecno;?>"/>
					 <input type="hidden" name="hdnEndIndex" id="hdnEndIndex" value="<?php echo $intCount;?>"/>
                    </div>
					<?php						
							if($intTotalRec>$intPgSize && $isPaging==0)
							  {
								  echo "<div class='pagination pagination-right'><ul>".$RetPaging[1]."</ul></div>";
							  }
							   
						?>                    
                  </div></td>
              </tr>
            </table></td>
        </tr>
      </table>
    </div>
    <!-- Footer Area-->
    <?php include("../includes/footer.php")?>
  </div>
  <script type="text/javascript">
	<?php 
	if($level>1){
		for($i=1;$i<$level;$i++){
		$fillId	= $i+1;		
		$nodeVal	= $_REQUEST['ddlNode'.$i];
		if($i<$level-1)
			$fillVal	= $_REQUEST['ddlNode'.$fillId];	
	?>
	$('#ddlNode<?php echo $i;?>').val('<?php echo $nodeVal;?>');
	<?php if($i<$level-1){?>	
		getNodeValues('<?php echo $strPath;?>fillNode','<?php echo $nodeVal;?>','ddlNode<?php echo $fillId;?>','<?php echo $fillVal;?>');	
	<?php }}}?>
	
	function validSearch(no)
	{
		for(var i=1; i<no; i++)
		{
			if($('#ddlNode'+i).val()==0)
			{
				alert('Select value');
				$('#ddlNode'+i).focus();
				return false;
			}
		}
	}
	function editVal(id, flag)
	{
		$('.txt').hide();
		$('.spn').show();
		$('.edit').show();
		$('.update').hide();
		$('.cancel').hide();
		if(flag==1)
		{
			$('#spnName'+id).hide();
			$('#spnHCode'+id).hide();
			$('#spnAddress'+id).hide();
			$('#spnTelNo'+id).hide();
			$('#spnFaxNo'+id).hide();
			$('#txtName'+id).show();
			$('#txtHCode'+id).show();
			$('#txtAddress'+id).show();
			$('#txtTelNo'+id).show();
			$('#txtFaxNo'+id).show();
			$('#txtName'+id).val($('#hdnName'+id).val());
			$('#txtHCode'+id).val($('#hdnHCode'+id).val());
			$('#txtAddress'+id).val($('#hdnAddress'+id).val());
			$('#txtTelNo'+id).val($('#hdnTelNo'+id).val());
			$('#txtFaxNo'+id).val($('#hdnFaxNo'+id).val());
			$('#edit'+id).hide();
			$('#update'+id).show();
			$('#cancel'+id).show();
		}		
	}
	
	function updateVal(id)
	{		
		if (!blankFieldValidation('txtName'+id, 'Name Value'))
			return false;
			
		if (!IsSpecialCharacter('txtName'+id, 'Special Character Not Allowed !')) 
			return false;
			
		if (!IsSpecialCharacter('txtHCode'+id, 'Special Character Not Allowed !')) 
			return false;
		
		if (!IsSpecialCharacter('txtAddress'+id, 'Special Character Not Allowed !')) 
			return false;
		
		if($('#txtAddress'+id).val().length>500 )
		{
			alert("Address should not more than 500 character");
			$('#txtAddress'+id).focus();
			return false;
		}
		
		if (!IsSpecialCharacter('txtTelNo'+id, 'Special Character Not Allowed !')) 
			return false;
		if($('#txtTelNo'+id).val().length>0 && $('#txtTelNo'+id).val().length<10)
		{
			alert("Telephone number must be 10 digit number");
			$('#txtTelNo'+id).focus();
			return false;
		}
		
		if (!IsSpecialCharacter('txtFaxNo'+id, 'Special Character Not Allowed !')) 
			return false;
		if(!confirm("Are you sure to update this record!"))
			return false;
		$('#hdnAction').val('U');
		$('#hdnId').val(id);
		$('#frmAdmin').submit();
	}
  </script>
</form>
</body>
</html>
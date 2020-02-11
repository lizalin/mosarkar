<?php
	/* ================================================
	File Name         	  : viewGroup.php
	Description			  : This page is used to View Group.
	Devloper Name		  : Rasmi Ranjan Swain
	Date Created		  : 05-Nov-2013	
	Update History		  :
	<Updated by>		<Updated On>		<Remarks>
	
	Style sheet           : bootstrap.css                                             
	Javscript Functions   : jquery.js,loadComponent.js,bootstrap.min.js
	includes			  : header.php,leftmenu.php,navigation.php,util.php,footer.php,incStylesheet.php
	
	==================================================*/
	require("viewGroupInner.php");
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
<script language="javascript">
	pageHeader="View Group"
	strFirstLink="Manage User"
	strLastLink="Group Master"
	printMe="yes"
	backMe="yes"
	refreshMe="yes"
	//deleteMe="yes"	
	activeMe="yes"
	inactiveMe="yes"
	$(document).ready(function(){
		$("form").find('input[type=text],textarea,select').filter(':visible:first').focus();
		$("form").find('input[type=text],textarea').keyup(function() {
		  return blockspecialchar_first(this);
		});
		RowColChange()
		setupLabel();
		$('.label_check').click(function(){
			setupLabel();
		});	
		$('.txt').hide();
		$('.update').hide();
		$('.cancel').hide();
		<?php if($outMsg!=''){?>
		$('form').submit();	
        alert('<?php echo $outMsg;?>');
						
		<?php }?>
	});
</script>
</head>
<body>
<form id="frmAdmin" name="frmAdmin" method="post"  enctype="multipart/form-data">
  <div id="mainTable">
    <!-- Header Area-->
    <?php include("../includes/header.php");?>
    <!-- Header Area-->
    <!-- Login Area-->
    <div id="MidTab">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td id="LeftMenu" valign="top"><?php include("../includes/leftmenu.php") ;?></td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
                <td><?php include("../includes/navigation.php")?></td>
           </tr>
           <tr>
                <td valign="top"><div id="ContArea">
                    <?php include('../includes/title.php'); ?>
                  <div class="MyTab">
                      <ul class="nav nav-tabs">
                        <li><a href="<?php echo $strPath;?>addGroup/<?php echo $glId;?>/<?php echo $plId;?>">Add</a></li>
                        <li class="active"><a href="#">View</a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>
                    </div>
                   <div class="pagingResult" style="text-align:right; margin:5px 10px;">
					  <?php
							if(mysqli_num_rows($result)>0)
							{
								$intCount	= $intRecno;
								$ctr		= $obj->NumRow($result);
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
                      <table width="100%" cellpadding="0" cellspacing="0" class="table table-bordered">
                        <tr>
                          <th width="20" class="noPrint"><label class="label_check">
                              <input name="cbBOX" id="cbBOX" value="checkbox"  onClick="isSelectAll(this,'frmAdmin')" type="checkbox">
                            </label>
                          </th>
                          <th width="20">Sl#</th>
                          <th>Group Name</th>
                          <th>Alias Name</th>
                          <th>Description</th>
                          <th>Status</th> 
                          <th>Created On</th>                         
                          <th class="noPrint" width="35">Edit </th>
                        </tr>
                         <?php
								while($row	= mysqli_fetch_array($result))
								{									
									$intCount++;
									if($row['INT_STATUS']==1)
									{
										$actbgColor = "";
										$text		= "Active";
										$strEdit	=  "<a href='javascript:void(0);' id='edit".$row['INT_GROUP_ID']."' title='Edit' class='btn btn-info edit' onclick='editVal(".$row['INT_GROUP_ID'].",1);'><i class='icon-white icon-edit'></i></a>";
									}
									else
									{
										$actbgColor = "actbgColor";
										$text		= "In Active";
										$strEdit	= "<i class='icon-white icon-edit'></i>";
									}
							?>
                        <tr class="<?php echo $actbgColor;?>">
                          <td class="noPrint"><label class="label_check">
								  <input name="cbItem<?php echo $intCount;?>" id="cbItem<?php echo $intCount;?>" value="1" type="checkbox">
							    </label>
							    <input name="hdnId<?php echo $intCount;?>" id="hdnId<?php echo $intCount;?>" type="hidden" value="<?php echo $row['INT_GROUP_ID'];?>" /></td>
                          <td><?php echo $intCount ;?></td>
                          <td><span id="spngroupName<?php echo $row['INT_GROUP_ID'];?>" class="spn noPrint"><?php echo $row['VCH_GROUP_NAME'];?></span> 
                            <input type="text" name="txtgroupName<?php echo $row['INT_GROUP_ID'];?>" id="txtgroupName<?php echo $row['INT_GROUP_ID'];?>" style="width:200px; display:none;" class="txt"   value="<?php echo $row['VCH_GROUP_NAME'];?>" />
							 <input type="hidden" name="hdnGroupName<?php echo $row['INT_GROUP_ID'];?>" id="hdnGroupName<?php echo $row['INT_GROUP_ID'];?>" value="<?php echo $row['VCH_GROUP_NAME'];?>"/> </td>
                          <td>
                          <span id="spngroupAliasName<?php echo $row['INT_GROUP_ID'];?>" class="spn noPrint"><?php echo $row['VCH_ALIAS_NAME']?$row['VCH_ALIAS_NAME']:'-';?></span>
                            <input type="text" name="txtgroupAliasName<?php echo $row['INT_GROUP_ID'];?>" id="txtgroupAliasName<?php echo $row['INT_GROUP_ID'];?>" style="width:200px; display:none;" class="txt"   value="<?php echo $row['VCH_ALIAS_NAME'];?>" />
							 <input type="hidden" name="hdnGroupAliasName<?php echo $row['INT_GROUP_ID'];?>" id="hdnGroupAliasName<?php echo $row['INT_GROUP_ID'];?>" value="<?php echo $row['VCH_ALIAS_NAME'];?>"/></td>
                          <td>
                          <span id="spnDescription<?php echo $row['INT_GROUP_ID'];?>" class="spn noPrint"><?php echo $row['VCH_DESCRIPTION'];?></span>
							<textarea name="txtDescription<?php echo $row['INT_GROUP_ID'];?>" id="txtDescription<?php echo $row['INT_GROUP_ID'];?>" class="txt" style="width:80%;display:none;" maxlength="500" rows="2" ><?php echo $row['VCH_DESCRIPTION'];?></textarea>
							<input type="hidden" name="hdnDescription<?php echo $row['INT_GROUP_ID'];?>" id="hdnDescription<?php echo $row['INT_GROUP_ID'];?>" value="<?php echo $row['VCH_DESCRIPTION'];?>" />
						  </td>
                          <td><?php echo $text;?></td>
                          <td><?php echo ($row['DTM_UPDATED_ON']!='')?date("d-M-Y",strtotime($row['DTM_UPDATED_ON'])):date("d-M-Y",strtotime($row['DTM_CREATED_ON'])) ?>
						 </td>
                           <td align="center" valign="middle" class="noPrint" width="90px">						
                        	<?php echo $strEdit;?>
                           
						 	<a href="javascript:void(0);" id="update<?php echo $row['INT_GROUP_ID'];?>" class="btn btn-success update" title="Update" style="display:none;" onclick="updateVal('<?php echo $row['INT_GROUP_ID'];?>');"><i class="icon-white icon-upload"></i></a>
                            
                            <a href="javascript:void(0);" id="cancel<?php echo $row['INT_GROUP_ID'];?>" class="btn btn-danger cancel" title="Cancel" style="display:none;" onclick="editVal('<?php echo $row['INT_GROUP_ID'];?>',0);"><i class="icon-white icon-remove"></i></a>
                          </td>
                        </tr>
                         <?php }?>
                      </table>
                      <input type="hidden" name="hdnAction" id="hdnAction" />
                      <input type="hidden" name="hdnId" id="hdnId" />
                      <input name="hdn_qs" id="hdn_qs" type="hidden" />
                      <input name="hdn_ids" id="hdn_ids" type="hidden" />
					  <div align="right" class="TotRes noPrint" style="margin-top:10px;">
                        <?php						
							if($intTotalRec>$intPgSize && $isPaging==0)
							  {
								  echo "<div class='pagination pagination-right'><ul>".$RetPaging[1]."</ul></div>";
							  }
							   
						?>
                      </div>
				   <?php } else {?>
					<div align="center" class="mandatory">No records found</div>
				  <?php }?>
                    </div>
                    <input type="hidden" name="hdnStartIndex" id="hdnStartIndex" value="<?php echo $intRecno+1;?>"/>
						<input type="hidden" name="hdnEndIndex" id="hdnEndIndex" value="<?php echo $intCount;?>"/>
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
<script type="text/javascript">
  	
	function updateVal(id)
	{		
		if (!blankFieldValidation('txtgroupName'+id, 'Group Name'))
			return false;
			
		if (!IsSpecialCharacter('txtgroupName'+id, 'Special Character Not Allowed !')) 
			return false;
			
		if (!IsSpecialCharacter('txtgroupAliasName'+id, 'Special Character Not Allowed !')) 
			return false;
		
		if (!IsSpecialCharacter('txtDescription'+id, 'Special Character Not Allowed !')) 
			return false;
		
		if($('#txtDescription'+id).val().length>500 )
		{
			alert("Description should not more than 500 character");
			$('#txtDescription'+id).focus();
			return false;
		}	
		if(!confirm("Are you sure to update this record!"))
			return false;
		$('#hdnAction').val('U');
		$('#hdnId').val(id);
		$('#frmAdmin').submit();
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
			$('#spngroupName'+id).hide();
			$('#spngroupAliasName'+id).hide();
			$('#spnDescription'+id).hide();			
			$('#txtgroupName'+id).show();
			$('#txtgroupAliasName'+id).show();
			$('#txtDescription'+id).show();			
			$('#txtgroupName'+id).val($('#hdnGroupName'+id).val());
			$('#txtgroupAliasName'+id).val($('#hdnGroupAliasName'+id).val());
			$('#txtDescription'+id).val($('#hdnDescription'+id).val());			
			$('#edit'+id).hide();
			$('#update'+id).show();
			$('#cancel'+id).show();
		}		
	}
</script>
</body>
</html>
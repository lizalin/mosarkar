<?php 
/* ================================================
	File Name         	  : viewTab.php
	Description			  : This page is used to View the Tav master.
	Author Name			  : Sunil Kumar Parida
	Date Created		  : 16 Sept 2013
	Designed By			  :	
    Designed On			  :	
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>						
	Style sheet           : style.css , bootstrap.css                                           
	includes			  : viewTabInner.php,header.php,leftmenu.php,navigation.php,title.php,util.php,footer.php

	==================================================*/
	require("viewTabInner.php");
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
<script language="javascript" type="text/javascript" src="<?php echo $strPath;?>scripts/loadJson.js"></script>
<script language="javascript">
	pageHeader="View Tab Master"
	strFirstLink="Manage Link"
	strLastLink="Tab Master"
	printMe="yes"
	backMe="yes"
	refreshMe="yes"
	<?php	if($obj->NumRow($result)>0){?>
	activeMe="yes"
	inactiveMe="yes"
	<?php }?>

$(document).ready(function(){
	defaultfocus("selFunction");
	RowColChange();
	setupLabel();
	$('.label_check').click(function(){
	setupLabel();
	});
	viewSearchPannel('<?php echo $searchPannelFlag;?>', 'searchPanel', 'chkSearch');
	<?php if($outMsg!=''){?>
		alert('<?php echo $outMsg;?>');
			$('form').submit();			
	<?php }?>
	<?php if($ddlFuncId>0){?>
		fillButton('<?php echo $ddlFuncId;?>','<?php echo $ddlButton;?>');
	<?php }?>
});

function validSl(totalVal)
{
	var flag	= 0;
	$('input[type=text]').each(function(){
		if(Number(this.value)==0)
		{
			alert('Serial number must be greater than zero');
			this.focus();
			flag	= 1;
			return false;
		}
		if(Number(this.value)>Number(totalVal))
		{
			alert('Serial number can not greater than total records');
			this.focus();
			flag	= 1;
			return false;
		}
	});
	if(flag==0)
		gotoDelete($('#hdnStartIndex').val(),$('#hdnEndIndex').val(),'US');
}
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
                <td valign="top"><div id="ContArea">
                    <?php include('../includes/title.php'); ?>
                    <div class="MyTab">
                      <ul class="nav nav-tabs">
                        <li><a href="<?php echo $strPath;?>addTab/<?php echo $glId;?>/<?php echo $plId;?>" title="Add">Add</a></li>
                        <li class="active"><a href="#">View</a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>					   
                    </div>
                    <div class="searchpanel" id="searchPanel">
                      <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
						  <td>Select Function </td>
                          <td>
						  <select name="selFunction" id="selFunction" style="width:120px;" onchange="fillButton(this.value,0);">
                            <?php echo $fillFunction;?>
                          </select>
						  </td>	
						  <td>Select Button </td>
                          <td>
						  <select name="selButton" id="selButton" style="width:120px;">
                            <option value="0">--Select--</option>
                          </select>
						  </td>						  
                          <td>Select Status</td>
                          <td>
						  <select name="selStatus" id="selStatus" style="width:120px;">
                            <option value="0">-- All --</option>
                            <option value="1" <?php if($status==1){?> selected="selected"<?php }?>>Active</option>
                            <option value="2" <?php if($status==2){?> selected="selected"<?php }?>>Inactive</option>
                          </select>
						  </td>
                          <td colspan="2"><input name="btnSearch" type="submit" class="btn btn-success" id="button2" value="Show" /></td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                    </div>
					<div align="center"><a href="#" class="btn btn-search" id="chkSearch" style="font-weight:bold;"></a></div>
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
						<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                              <tr>
                                <th width="20" class="noPrint"><label class="label_check">
                              <input name="cbBOX" id="cbBOX" value="checkbox"  onClick="isSelectAll(this,'frmAdmin')" type="checkbox">
                            </label></th>
                                <th width="40">Sl. No.</th>
                                <th>Tab Name </th>
                                <th>File Name  </th>
                                <th>Function Name</th>
                                <th>Action 1 </th>
                                <th>Action 2 </th>
                                <th>Action 3 </th>
                                <th>Status</th>
                                <th class="noPrint" width="35">Edit</th>
                              </tr>
							<?php
								while($row	= mysqli_fetch_array($result))
								{
									$intCount++;
									if($row['INT_STATUS']==1)
									{
										$actbgColor = "";
										$text		= "Active";
										$readOnly	= "";
										$strEdit	= "<a href='".$strPath.'addTab/'.$glId.'/'.$plId.'/'.$row['INT_TAB_ID'].'/'.$intPgno.'/'.$intRecno."'  title='Edit' class='btn btn-info'><i class='icon-white icon-edit'></i></a>";
									}
									else
									{
										$actbgColor = "actbgColor";
										$text		= "In Active";
										$readOnly	= "readonly='readonly'";
										$strEdit	= "<i class='icon-white icon-edit'></i>";
									}
							?>
							  <tr class="<?php echo $actbgColor;?>">
                                <td class="noPrint">
								<label class="label_check">
								  <input name="cbItem<?php echo $intCount;?>" id="cbItem<?php echo $intCount;?>" value="1" type="checkbox">
							    </label>
							    <input name="hdnId<?php echo $intCount;?>" id="hdnId<?php echo $intCount;?>" type="hidden" value="<?php echo $row['INT_TAB_ID'];?>" />                         		</td>
                                <td>
								<input type="text" onkeypress="return isNumberKey(event);" name="txtSLNo<?php echo $row['INT_TAB_ID'];?>" id="txtSLNo<?php echo $row['INT_TAB_ID'];?>" value="<?php echo $row['INT_SL_NO'];?>" style="width:72%" maxlength="5" <?php echo $readOnly;?> />
								</td>
                                <td><?php echo $row['VCH_TAB_NAME'];?></td>
								<td><?php echo $row['VCH_FILE_NAME'];?></td>
								<td><?php echo $row['FUNCTION_NAME'];?></td>
								<td><?php echo $row['ACTION1']?$row['ACTION1']:'-';?></td>
                                <td><?php echo $row['ACTION2']?$row['ACTION2']:'-';?></td>
                                <td><?php echo $row['ACTION3']?$row['ACTION3']:'-';?></td>
                                <td><?php echo $text;?></td>
                                <td class="noPrint"><?php echo $strEdit;?></td>
                              </tr>
                         <?php }?>						 
                      		</table>
					  <input type="button" name="btnUpdateSl" id="btnUpdateSl" class="btn btn-success noPrint" value="Update Serial Number" onclick="return validSl('<?php echo $intTotalRec;?>');"/>
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
                </div>
				</td>
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
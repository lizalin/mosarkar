<?php 
	/* ================================================
	File Name         	  : userProfile.php
	Description			  : This page is used to View User Profile.
	Devloper Name		  : Sunil kumar Parida
	Date Created		  : 07-Oct-2013
	Update History		  :
	<Updated by>		<Updated On>		<Remarks>
	Style sheet           : style.php, bootstrap.css                                             
	Javscript Functions   : jquery.js,loadComponent.js,bootstrap.min.js, validator.js
	includes			  : header.php,leftmenu.php,navigation.php,util.php,footer.php,viewUserInner.php
	
	==================================================*/
	require("userProfileInner.php");
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
	pageHeader="View Ex User"
	strFirstLink="Manage User"
	strLastLink="User Profile"
	printMe="yes"
	backMe="yes"
	refreshMe="yes"
	<?php if($obj->NumRow($result)>0){?>
	deleteMe="yes"
	<?php }?>
	
	$(document).ready(function(){
		defaultfocus("selLocation");
		RowColChange()
		setupLabel();
		$('.label_check').click(function(){
			setupLabel();
		});
		fillHierarchy(0,'selLocation');
		<?php if($hierarchyId>0){?>
			fillLevel(<?php echo $hierarchyId;?>,'dynamic','location','selLocation','hdnNo');
		<?php }?>
		viewSearchPannel('<?php echo $searchPannelFlag;?>', 'searchPanel', 'chkSearch');
		<?php if($outMsg!=''){?>
		alert('<?php echo $outMsg;?>');
		$('form').submit();
	<?php }?>
	});
	function validator()
	{
		if($('.seldynamic:last').val()==0)
		{
			var lastLabel	= $('.lbldynamic:last').text();
			alert('Select '+lastLabel);
			$('.seldynamic:last').focus();
			return false;
		}
		if (!IsSpecialCharacter('txtName', 'Special Character Not Allowed !')) 
			return false;
		if (!WhiteSpaceValidation1st('txtName'))
			return false;
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
                        <li><a href="<?php echo $strPath;?>addUser/<?php echo $glId;?>/<?php echo $plId;?>">Add</a></li>
                        <li><a href="<?php echo $strPath;?>viewUser/<?php echo $glId;?>/<?php echo $plId;?>">View</a></li>
						<li  class="active"><a href="#">Ex Employee</a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>
                    </div>
                    <div class="searchpanel" id="searchPanel">
                      <table border="0" cellspacing="0" cellpadding="0">
					  	<tr id="location" class="dynamic">
                          <td><span class="lbldynamic">Location</span></td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><select name="selLocation" id="selLocation" style="width:207px;"  onchange="fillSubnode(this.value,0,0,'location','dynamic','hdnNo','',''); fillDesg(this.value,0,'selDesignation'); fillGrade(this.value,0,'selGrade');">
                            
                          </select>
						  <input type="hidden" name="hdnNo" id="hdnNo" value="0"/>
                         </td>
                        </tr>
                        <tr>                          
                          <td>Search By Group </td>
						  <td align="center" valign="middle">:</td>
                          <td><select style="width:207px;" name="selGroup" id="selGroup"  >
                              <?php echo $obj->fillGroup($group);?>
                            </select></td>
                        </tr>
						<tr>                          
                          <td>Search By Employee </td>
						  <td align="center" valign="middle">:</td>
                          <td><input name="txtName" type="text" id="txtName" style="width:200px;"  value="<?php echo $fullName; ?>" maxlength="100" /></td>
                        </tr>
						<tr>   
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><input name="btnSearch" type="submit" class="btn btn-success" id="button2" value="Show" onclick="return validator();" /></td>
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
                      <table width="100%" cellpadding="0" cellspacing="0" class="table table-bordered">
                        <tr>
                          <th width="20" class="noPrint"><label class="label_check">
                              <input name="cbBOX" id="cbBOX" value="checkbox"  onClick="isSelectAll(this,'frmAdmin')" type="checkbox">
                            </label>                          </th>
                          <th width="20">Sl#</th>
                          <th>Full Name</th>
                          <th>Designation</th>
                          <th>Grade</th>                          
                          <th>Group</th>
                          <th>User Name</th>
                          <th>User Image</th>
                        </tr>
						<?php
							while($row	= mysqli_fetch_array($result))
							{
							$intCount++;
						?>
                        <tr>
                          <td class="noPrint"><label class="label_check">
                              <input name="cbItem<?php echo $intCount;?>" id="cbItem<?php echo $intCount;?>" value="1" type="checkbox">
							  </label>
							  <input name="hdnId<?php echo $intCount;?>" id="hdnId<?php echo $intCount;?>" type="hidden" value="<?php echo $row['INT_USER_ID'];?>" />						  </td>
                          <td><?php echo $intCount; ?></td>
                          <td><a href="#myModal" data-toggle="modal" onclick="viewUserDetails('<?php echo $row['INT_USER_ID'];?>');"><?php echo $row['VCH_FULL_NAME'];?></a></td>
                          <td><?php echo $row['DESIGNATION_NAME'];?></td>
                          <td><?php echo $row['GRADE_NAME'];?></td>
                          
                          <td><?php echo $row['GROUP_NAME'];?></td>
                          <td><?php echo $row['VCH_USER_NAME'];?></td>
                          <td><img src="<?php echo ($row['VCH_IMAGE'])?$strPath.'uploadDocuments/UserIMage/'.$row['VCH_IMAGE']:$strPath.'images/noPhoto.jpg';?>" style="height:50px; width:75px; border:0;"></td>
                        </tr>
                        <?php }?>
                      </table>
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
 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Ex-User Details</h3>
    </div>
  <div class="modal-body viewTable" id="divModal">
    
  </div>
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
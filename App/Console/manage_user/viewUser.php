<?php 
	/* ================================================
	File Name         	  : viewUser.php
	Description			  : This page is used to View User.
	Devloper Name		  : Sunil kumar Parida
	Date Created		  : 05-Oct-2013
	Update History		  :	<Updated by>		<Updated On>		<Remarks>
	Style sheet           : style.php, bootstrap.css                                             
	Javscript Functions   : jquery.js,loadComponent.js,bootstrap.min.js, validator.js
	includes			  : header.php,leftmenu.php,navigation.php,util.php,footer.php,viewUserInner.php
	
	==================================================*/
	require("viewUserInner.php");
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
	pageHeader="View User"
	strFirstLink="Manage User"
	strLastLink="User Profile"
	printMe="yes"
	backMe="yes"
	refreshMe="yes"
	<?php if($obj->NumRow($result)>0){?>
	//deleteMe="yes"
	activeMe="yes"
	inactiveMe="yes"
 	<?php }?>
	$(document).ready(function(){
		defaultfocus("selLocation");
		RowColChange()
		setupLabel();
		$('.label_check').click(function(){
		setupLabel();
	});
	viewSearchPannel('<?php echo $searchPannelFlag;?>', 'searchPanel', 'chkSearch');
	fillHierarchy(0,'selLocation');			
	<?php if($hierarchyId>0){?>
		fillLevel(<?php echo $hierarchyId;?>,'dynamic','location','selLocation','hdnNo');
	<?php }?>
	<?php if($outMsg!=''){?>
		alert('<?php echo $outMsg;?>');
		$('form').submit();
	<?php }?>
	});
	function validator()
	{
//		if($('.seldynamic:last').val()==0)
//		{
//			var lastLabel	= $('.lbldynamic:last').text();
//			alert('Select '+lastLabel);
//			$('.seldynamic:last').focus();
//			return false;
//		}
		if (!IsSpecialCharacter('txtName', 'Special Character Not Allowed !')) 
			return false;
		if (!WhiteSpaceValidation1st('txtName'))
			return false;
	}
	function validSl(totalVal)
	{
		var flag	= 0;
		$('.txtSerialNo').each(function(){
			if(this.value==0 || this.value=='')
			{
				alert('Serial number must be greater than zero');
				this.focus();
				flag	= 1;
				return false;
			}
			if(this.value>totalVal)
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
	function updateGrroup()
	{
		var flag	= 0;
		$('.groupid').each(function(){
			if(this.value==0 || this.value=='')
			{
				alert('Please Select Agency');
				this.focus();
				flag	= 1;
				return false;
			}
		});
		if(flag==0)
			gotoDelete($('#hdnStartIndex').val(),$('#hdnEndIndex').val(),'UG');
	}
</script>
<style>
    #result{
         text-align: center;
    font-size: 14px;
    color: #4aaecc;
    border: 1px solid #ccc;
    padding: 5px 0;
    margin: 0 0 10px 0;
    display: none;
    }
    </style>
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
                        <li class="active"><a href="#">View</a></li>
						<li><a href="<?php echo $strPath;?>viewExUser/<?php echo $glId;?>/<?php echo $plId;?>">Ex Employee</a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>
                    </div>
                    <div class="searchpanel" id="searchPanel">
                      <table border="0" cellspacing="0" cellpadding="0">
					  	<tr id="location" class="dynamic">
                          <td><span class="lbldynamic">Location</span></td>
                          <td align="center" valign="middle">:</td>
                          <td colspan="2"><select name="selLocation" class="seldynamic" id="selLocation" style="width:207px;"  onchange="fillSubnode(this.value,0,0,'location','dynamic','hdnNo','','');">                            
                          </select>
						  <input type="hidden" name="hdnNo" id="hdnNo" value="0"/>
                         </td>
                        </tr>
						<?php if($groupTable>0){?>
                        <tr>                          
                          <td>Search By Agency </td>
						  <td align="center" valign="middle">:</td>
                          <td><select style="width:207px;" name="selGroup" id="selGroup"  >
                              <?php echo $obj->fillGroup($group);?>
                            </select></td>
                        </tr>
						<?php }?>
						<tr>                          
                          <td>Search By Employee </td>
						  <td align="center" valign="middle">:</td>
                          <td><input name="txtName" type="text" id="txtName" style="width:200px;"  value="<?php echo $fullName; ?>" maxlength="100" /></td>
                        </tr>
						<tr>                          
                          <td>Status</td>
						  <td align="center" valign="middle">:</td>
                          <td>
						  	<select name="selStatus" id="selStatus" style="width:207px">
								<option value="0">--Select--</option>
								<option value="1" title="Active" <?php if($status==1){?> selected="selected"<?php }?>>Active</option>
								<option value="2" title="Inactive" <?php if($status==2){?> selected="selected"<?php }?>>Inactive</option>
							</select>
						  </td>
                        </tr>
						<tr>   
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><input name="btnSearch" type="submit" class="btn btn-success" id="button2" value="Show" onclick="return validator();" /></td>
                        </tr>
                       
                      </table>
                    </div>
					<div align="center"><a href="#" class="btn btn-search" id="chkSearch"></a></div>
					<div class="pagingResult">
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
                                        <div id="result"></div>
                    <div id="viewTable">
					  <?php if($ctr>0){?>
                      <table width="100%" cellpadding="0" cellspacing="0" class="table table-bordered">
                        <tr>
                          <th width="20" class="noPrint"><label class="label_check">
                              <input name="cbBOX" id="cbBOX" value="checkbox"   onClick="isSelectAll(this,'frmAdmin')" type="checkbox">
                            </label>                          </th>
                          <th width="30">Sl No</th>
                          <th>Full Name</th>
                          <th>Short Name</th>
                          <th>Designation</th>
						  <?php if($gradeTable>0){?><th>Grade</th><?php }?>
                          <?php if($groupTable>0){?>
<!--                                                  <th>Agency</th>-->
                                                      <?php }?>
                          <?php if($xmlLogin>0){?><th>User Name</th><?php }?>
						  <?php if($xmlMobNo>0){?><th>Mobile Number</th><?php }?>
                          <?php if($xmlPhoto>0){?><th>Photo</th><?php }?>
                          <th class="noPrint" width="35">Edit</th>
                          <th class="noPrint" width="35">Reset</th>
                        </tr>
						<?php
							while($row	= mysqli_fetch_array($result))
							{
                                                            //print_r($row);
                                                           
							$intCount++;
							$hierarchyId	= $row['INT_SUBNODEVAL_ID'];
							/*$allParentSql	= "SELECT FN_ALL_PARENT($hierarchyId);";
							$allParentResult= $obj->ExecuteQuery($allParentSql);
							$desgLoc		= '';
							if($allParentResult->num_rows>0)
							{
								$allParentRow	= $allParentResult->fetch_array();
								$explParentRow	= explode(',',$allParentRow[0]);
								for($i=0; $i<(count($explParentRow)-1); $i++)
								{
									$nodeValueSql	= "SELECT VCH_VALUE_NAME FROM m_admin_subnode_values WHERE INT_SUBNODEVAL_ID= ".$explParentRow[$i];
									
									$nodeValueResult= $obj->ExecuteQuery($nodeValueSql);
									if($nodeValueResult->num_rows>0)
									{
										$nodeValueRow	= $nodeValueResult->fetch_array();
										$desgLoc		.= ', '.$nodeValueRow[0];
									}
								}
							}
							$desgLoc	= ($desgLoc!='')?$desgLoc:', Himachal Pradesh (HO)';*/
							$desgLoc	= $row['officeName'];
						?>
                        <tr>
                          <td class="noPrint"><label class="label_check">
                              <input name="cbItem<?php echo $intCount;?>" id="cbItem<?php echo $intCount;?>" value="1" type="checkbox">
							  </label>
							  <input name="hdnId<?php echo $intCount;?>" id="hdnId<?php echo $intCount;?>" type="hidden" value="<?php echo $row['INT_USER_ID'];?>" />
						  </td>
                          <td>						  
						  <input type="text" name="txtSlNo<?php echo $row['INT_USER_ID'];?>" id="txtSlNo<?php echo $row['INT_USER_ID'];?>" class="txtSerialNo" value="<?php echo $row['INT_SLNO']; ?>" style="width:30px;" onKeyPress="return isNumberKey(event);"/>		  
						  </td>
                          <td><a href="#myModal" data-toggle="modal" onclick="viewUserDetails('<?php echo $row['INT_USER_ID'];?>');"><?php echo $row['VCH_FULL_NAME2'];?></a>
						  	<?php if($row['INT_STATUS']==1){?>
								<img src="<?php echo $strPath;?>images/userIcon_black.png" alt="Active User" title="Active User" />
							<?php }?>
						  </td>
                             <td><a href="#myModal" data-toggle="modal" onclick="viewUserDetails('<?php echo $row['INT_USER_ID'];?>');"><?php echo $row['VCH_FULL_NAME'];?></a>
						  	<?php if($row['INT_STATUS']==1){?>
								<img src="<?php echo $strPath;?>images/userIcon_black.png" alt="Active User" title="Active User" />
							<?php }?>
						  </td>
                          <td><?php echo $row['DESIGNATION_NAME'].', '.$desgLoc;?></td>
                          <?php if($gradeTable>0){?><td><?php echo $row['GRADE_NAME'];?></td><?php }?>
                          <?php if($groupTable>0){?>
                          <!--<td><select style="width:150px;" name="ddlGroup<?php echo $row['INT_USER_ID'];?>" id="ddlGroup<?php echo $row['INT_USER_ID'];?>" class="groupid" >-->
                            <?php //echo $obj->fillGroup($row['INT_GROUP_ID']);?>
                          <!--</select></td>-->
                              <?php }?>
                         <?php if($xmlLogin>0){?><td><?php echo $row['VCH_USER_NAME'];?></td><?php }?>
						 <?php if($xmlMobNo>0){?><td><?php echo $row['VCH_MOBILE_NO'];?></td><?php }?>
                         <?php if($xmlPhoto>0){?><td width="75"><img src="<?php echo ($row['VCH_IMAGE'])?$strPath.'uploadDocuments/UserImage/'.$row['VCH_IMAGE']:$strPath.'images/noPhoto.jpg';?>" style="height:50px; width:75px; border:0;">
                          </td><?php }?>
                          <td class="noPrint"><a href="<?php echo $strPath;?>addUser/<?php echo $glId;?>/<?php echo $plId;?>/<?php echo $row['INT_USER_ID'];?>/<?php echo $intPgno;?>/<?php echo $intRecno;?>" title="Edit" class="btn btn-info"><i class="icon-white icon-edit"></i></a>
                          
						  </td>
                                                 <td class="noPrint" width="100" id="RPdiv<?php echo $row['INT_USER_ID'];?>"><a href="javascript:void(0);"  onclick="resetPass('<?php echo $row['INT_USER_ID'];?>');">Reset Password</a></td>
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
					  <div style="float:left;" class="noPrint">
						<input name="btnExEmployee" type="button" class="btn btn-success" id="btnExEmployee" value="Make Ex-Employee" onclick="gotoDelete($('#hdnStartIndex').val(),$('#hdnEndIndex').val(),'EX');" />
						<input name="btnExEmployee" type="button" class="btn btn-success" id="btnExEmployee" value="Update Serial Number" onclick="validSl('<?php echo $totalRecord;?>');" />
                        <?php if($groupTable>0){?>
                                                <input name="btnGroup" type="button" class="btn btn-success" id="btnGroup" value="Update Agency" onclick="updateGrroup();"/>
                                                    <?php }?>
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
                        <h3 id="myModalLabel">User Details</h3>
                      </div>
                      <div class="modal-body viewTable" id="divModal"></div>
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
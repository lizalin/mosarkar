<?php 
/* ================================================
	File Name         	  : viewDesignation.php
	Description			  : This page is used to View Designation.
	Author Name			  : Rasmi Ranjan Swain
	Date Created		  : 17 Sept 2013
	Designed By			  :	
    Designed On			  :	
	Update History		  :
						<Updated by>			<Updated On>		<Remarks>						
	Style sheet           : style.css                                             
	Javscript Functions   : 
	includes			  : viewGLInner.php,header.php,leftmenu.php,navigation.php,title.php,util.php,footer.php

	==================================================*/
	require("viewDesignationInner.php");
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
	pageHeader="View Designation"
	strFirstLink="Manage User"
	strLastLink="Designation"
	printMe="yes"
	backMe="yes"
	refreshMe="yes"
	deleteMe="yes"	
	$(document).ready(function(){
		RowColChange()
		setupLabel();
		$('.label_check').click(function(){
			setupLabel();
		});
		viewSearchPannel('<?php echo $searchPannelFlag;?>', 'searchPanel', 'chkSearch');
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
                <td valign="top"><div id="ContArea">
                    <?php include('../includes/title.php'); ?>
                    <div class="MyTab">
                      <ul class="nav nav-tabs">
                        <li><a href="<?php echo $strPath;?>addDesignation/<?php echo $glId;?>/<?php echo $plId;?>" title="Add">Add</a></li>
                        <li class="active"><a href="#">View</a></li>
                      </ul>
                      <?php include('../includes/util.php'); ?>
                    </div>
                     <div class="searchpanel" id="searchPanel">
                      <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
						  <td>Select Location</td>
                          <td>
						  <select name="selLocation" id="selLocation" style="width:120px;">
                            <?php echo $fillLoc;?>
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
                      <table width="100%" cellpadding="0" cellspacing="0" class="table table-bordered">
                        <tr>
                          <th width="20" class="noPrint"><label class="label_check">
                              <input name="cbBOX" id="cbBOX" value="checkbox"  onClick="isSelectAll(this,'frmAdmin')" type="checkbox">
                            </label></th>
                          <th width="20">Sl#</th>
                          <th>Location</th>
                          <th>Designation</th>                         
                          <th>Alias Name</th>
                          <th>Rank</th>
                          <th>Type</th>
                          <th class="noPrint" width="35">Created On</th>
                          <th class="noPrint" width="35">Edit </th>
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
							    <input name="hdnId<?php echo $intCount;?>" id="hdnId<?php echo $intCount;?>" type="hidden" value="<?php echo $row['INT_DESG_ID'];?>" /></td>
                          <td><?php echo $intCount;?></td>
                          <td><?php 
									$explLocId	= explode(",",$row['VCH_LOC_ID']);
									$locName	= '';
									for($i=0; $i<count($explLocId); $i++)
									{
										if($explLocId[$i]=='All')
										{
											$locName	= 'All ';
											break;
										}
										else
											$locName	.= $obj->getLocation($explLocId[$i]).',';
									}
									echo substr($locName, 0, -1);
								?></td>
                          <td><?php echo $row['VCH_DESG_NAME'];?></td>                          
                          <td><?php echo $row['VCH_ALIAS_NAME'];?></td>
                          <td><?php echo $row['INT_RANK_ID'];?></td>
                          <td width="60">
                          <?php if($row['INT_DESG_ID']!='') {if($row['INT_TYPE']==1){?><a href="#" class="btn btn-success"  onClick="return gotoDelete($('#hdnStartIndex').val(),$('#hdnEndIndex').val(),'AP');">Permanent</a><?php }else{?><a href="#" class="btn btn-danger" onClick="return  gotoDelete($('#hdnStartIndex').val(),$('#hdnEndIndex').val(),'AT');">Temporary</a><?php }}?>
                          </td>
                          <td width="90" class="noPrint"><?php echo date('d-M-Y',strtotime ($row['DTM_CREATED_ON']));?></td>
                          <td class="noPrint"><a href="<?php echo $strPath;?>addDesignation/<?php echo $glId;?>/<?php echo $plId;?>/<?php echo $row['INT_DESG_ID'];?>/<?php echo $intPgno;?>/<?php echo $intRecno;?>" title="Edit" class="btn btn-info"><i class="icon-white icon-edit"></i></a></td>
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
  	$(document).ready(function(){
		<?php if($outMsg!=''){?>
       		alert('<?php echo $outMsg;?>');
			//$('form').submit();				
		<?php }?>
		
	});
</script>
</body>
</html>
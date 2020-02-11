<?php
	include("../class_file/leftMenu_class.php");		
	$hirarchyClassObj	= new leftMenu;
	$nodeLevelResult	= $hirarchyClassObj->viewLeftMenu();	
?>
<script type="text/javascript" src="<?php echo $strPath;?>scripts/scriptbreaker-multiple-accordion-1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	//menuCtr();					   
	$(".accNav").accordion({
		accordion:false,
		speed: 500,
		closedSign: '[+]',
		openedSign: '[-]'
	});
});
</script>
<div class="menulft" id="menulft">
  <ul class="accNav" id="leftul">
    <li <?php if($_REQUEST['GL']=='1' && $_REQUEST["PL"]=='1'){?> class="active"<?php }?>><a href="#" <?php if($_REQUEST['GL']=='1' && $_REQUEST["PL"]=='1'){?> class="active"<?php }?>>&nbsp;</a>
      <p class="accordionLink" onclick="window.location.href='<?php echo $strPath;?>hierarachy/1/1'"><img src="<?php echo $strPath;?>images/hierarchyIcon.png" alt="" width="16" height="16" border="0" align="absmiddle" /> &nbsp;Hierarchy Master</p>
	  <?php
	  	if($hirarchyClassObj->NumRow($nodeLevelResult)>0){		
	  ?>
	  <ul>
	  	<?php
		while($leftHirarchyRow	= mysqli_fetch_array($nodeLevelResult)){
		?>
			<li <?php if($_REQUEST['GL']=='1' && $_REQUEST["PL"]=='1' && $_REQUEST["SL"]==$leftHirarchyRow['INT_NODE_ID']){?> class="active"<?php }?>><a href="#" <?php if($_REQUEST['GL']=='1' && $_REQUEST["PL"]=='1' && $_REQUEST["SL"]==$leftHirarchyRow['INT_NODE_ID']){?> class="active"<?php }?>>&nbsp;</a>
          <p class="accordionLink" onclick="window.location.href='<?php echo $strPath;?>createSubNode/1/1/<?php echo $leftHirarchyRow['INT_NODE_ID'];?>'"><?php echo $leftHirarchyRow['VCH_HIERARCHY_NAME'];?></p>
		   <?php
		   	$nodeSubmenuResult	= $hirarchyClassObj->viewSubMenu($leftHirarchyRow['INT_NODE_ID']);
			if($hirarchyClassObj->NumRow($nodeSubmenuResult)>0){		
		  ?>
		  <ul>
		  	<?php
				while($leftSubmenuRow	= mysqli_fetch_array($nodeSubmenuResult)){
			?>			
			<li <?php if($_REQUEST['GL']=='1' && $_REQUEST["PL"]=='1' && $_REQUEST["SL"]==$leftHirarchyRow['INT_NODE_ID'] && $_REQUEST["TL"]==$leftSubmenuRow['INT_SUBNODE_ID']){?> class="active"<?php }?>><a href="#" <?php if($_REQUEST['GL']=='1' && $_REQUEST["PL"]=='1' && $_REQUEST["SL"]==$leftHirarchyRow['INT_NODE_ID'] && $_REQUEST["TL"]==$leftSubmenuRow['INT_SUBNODE_ID']){?> class="active"<?php }?>>&nbsp;</a>
          <p class="accordionLink" onclick="window.location.href='<?php echo $strPath;?>createDepartment/1/1/<?php echo $leftHirarchyRow['INT_NODE_ID'];?>/<?php echo $leftSubmenuRow['INT_SUBNODE_ID'];?>'"><?php echo $leftSubmenuRow['VCH_SUBNODE_NAME'];?></p>		
		  </li>	
			<?php }?>
		  </ul>
		  <?php }?>
			</li>
		<?php
		}
		?>
	  </ul>
	  <?php
	  }
	  ?>
    </li>
	<?php
		$leftPaneSql	= "CALL USP_PACKAGED_LINK('GL','0','0');";
		$leftPaneResult	= $hirarchyClassObj->ExecuteQuery($leftPaneSql);
		if($hirarchyClassObj->NumRow($leftPaneResult)>0)
		{
			while($leftPaneRow=mysqli_fetch_array($leftPaneResult))
			{
				$leftGlId		= $leftPaneRow['INT_P_GL_ID'];
				$leftGlName		= $leftPaneRow['VCH_P_GL_NAME'];
				$leftGlImage	= $leftPaneRow['VCH_IMAGE_NAME'];
				$leftGlCtSql	= "CALL USP_PACKAGED_LINK('CT','0',$leftGlId);";
				$leftGlCtResult	= $hirarchyClassObj->ExecuteQuery($leftGlCtSql);
				$leftGlCtRow	= mysqli_fetch_array($leftGlCtResult);
				$leftPlExist	= $leftGlCtRow['PL_EXIST'];
				if($leftPlExist>0)
				{
				?>
				<li <?php if($_REQUEST['GL']== $leftGlId ){?> class="active"<?php }?>><a href="#" <?php if($_REQUEST['GL']== $leftGlId ){?> class="active"<?php }?>><img src="<?php echo $strPath;?>images/<?php echo $leftGlImage;?>" alt="" width="16" height="16" border="0" align="absmiddle" /> &nbsp;<?php echo $leftGlName;?></a>					
				<?php
					$leftPlSql		= "CALL USP_PACKAGED_LINK('PL','0',$leftGlId);";
					$leftPlResult	= $hirarchyClassObj->ExecuteQuery($leftPlSql);
					if($hirarchyClassObj->NumRow($leftPlResult)>0)
					{
					?>
					<ul>
					<?php
						while($leftPlRow=mysqli_fetch_array($leftPlResult))
						{
							$leftPlId	= $leftPlRow['INT_P_PL_ID'];
							$leftPlName	= $leftPlRow['VCH_P_PL_NAME'];
							$leftPlURL	= $leftPlRow['VCH_URL_NAME'];
						?>
						<li><a href="<?php echo $strPath.$leftPlURL.'/'.$leftGlId.'/'.$leftPlId;?>" <?php if($_REQUEST['GL']==$leftGlId && $_REQUEST["PL"]==$leftPlId){?> class="active"<?php }?>><?php echo $leftPlName;?></a></li>
					<?php }?>
					</ul>
					<?php }?>
				
				</li>
				<?php
				}
			}
		}
	?>
  </ul>
</div>

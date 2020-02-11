<?php
	if(file_exists('../config.php'))
	{
		include('../config.php');
	}
	if(!class_exists('linkClass'))
		include(ABSPATH."/class_file/manageLink_class.php");		
	if(!class_exists('hierarchy'))
		include (ABSPATH."/class_file/hierarchy_class.php");
	if(!class_exists('user'))
		include (ABSPATH."/class_file/manageUser_class.php");	
	if(!class_exists('offTiming'))
		include (ABSPATH."/class_file/officeTiming_class.php");
	if(!class_exists('romaingAccess'))
		include (ABSPATH."/class_file/manageRoaming_class.php");
	if(!class_exists('fillPermission'))
		include (ABSPATH."/class_file/setPermission_class.php");
	include (ABSPATH."/class_file/manageTheme_class.php");
	if(!class_exists('clsPolicestation'))
		include (ABSPATH."/class_file/policestationRange_class.php");
	
	
	
	
	//======== class extends from link class ==============
	class viewLinks extends linkClass
	{	
		//=========== Function To View Global Link drop down ========		
		public function viewGLDrp($selVal)
		{
			$result	= linkClass::manageGL('F', 0, 0, '', '0', '0', '0', '0');
			$opt	= '<option value="0">--Select--</option>';
			if(mysqli_num_rows($result)>0)
			{							
				while($row	= mysqli_fetch_array($result))
				{
					$intGLId	= $row["INT_GL_ID"];
					$strGLName	= $row["VCH_GL_NAME"];
					$select		= ($intGLId==$selVal)?'selected="selected"':'';
					$opt .= '<option value="'.$intGLId.'" title="'.$strGLName.'" '.$select.'>'.$strGLName.'</option>';
				}				
			}
			$link_arr["glID"]			= $opt;
			echo json_encode(array('gLink'=>$link_arr));
		}
		
		//=========== Function To View Function actions ========	
		public function viewFuncActions($funcId)
		{
			$link_arr["action1"]	= 'Action 1';
			$link_arr["action2"]	= 'Action 2';
			$link_arr["action3"]	= 'Action 3';
			$result	= linkClass::manageFunction('V', $funcId, '','', '', '', '', '', 0, 0, '', 0, 0);			
			if(mysqli_num_rows($result)>0)
			{							
				while($row	= mysqli_fetch_array($result))
				{
					$link_arr["action1"]	= $row["VCH_ACTION1"];
					$link_arr["action2"]	= $row["VCH_ACTION2"];
					$link_arr["action3"]	= $row["VCH_ACTION3"];
				}				
			}
			echo json_encode(array('action'=>$link_arr));
		}	
		
		//=========== Function To View Button Drop down ========
		public function viewBtnDrp($funcId,$selVal)
		{
			$result	= linkClass::manageButton('F', 0, $funcId, '', '0', '', '1',  '0', '0', '0', '0', '', '0');
			$opt	= '<option value="0">--Select--</option>';
			if(mysqli_num_rows($result)>0)
			{							
				while($row	= mysqli_fetch_array($result))
				{
					$intBtnId	= $row["INT_BTN_ID"];
					$strBtnName	= $row["VCH_BUTTON_NAME"];
					$select		= ($intBtnId==$selVal)?'selected="selected"':'';
					$opt .= '<option value="'.$intBtnId.'" title="'.$strBtnName.'" '.$select.'>'.$strBtnName.'</option>';
				}				
			}
			$link_arr["BTN"]			= $opt;
			echo json_encode(array('btnId'=>$link_arr));
		}		
		
		//=========== Function to fill global link for set permission === By Sunil Kumar Parida On 09/10/2013 ===========
		function setPermission($uid)
		{
			$glResult	= linkClass::manageGL('V', 0, '', '', 0, 0, 1, 0);
			$glContent	= '<ul>';
			while($glRow	= mysqli_fetch_array($glResult))
			{	
				$plResult	= linkClass::managePL('PF', '0', '', $glRow['INT_GL_ID'], '', '0', '1', '0', '0', 1, 0);
				if(commonClass::NumRow($plResult)>0)
				{
					$glContent	.= '<li>';
					$glContent	.= '<h2><span id="GL'.$glRow['INT_GL_ID'].'" onClick="$(\'#PL'.$glRow['INT_GL_ID'].'\').slideToggle(\'medium\'); ($(\'#symbole'.$glRow['INT_GL_ID'].'\').text()==\'+\')?$(\'#symbole'.$glRow['INT_GL_ID'].'\').text(\'-\'):$(\'#symbole'.$glRow['INT_GL_ID'].'\').text(\'+\');	$(\'#GL'.$glRow['INT_GL_ID'].'\').toggleClass(\'active\');" style="padding:5px 0px 0px 5px;"><strong id="symbole'.$glRow['INT_GL_ID'].'" class="bigSymbol">+</strong>&nbsp;'.$glRow['VCH_GL_NAME'].'</span></h2>';
					$glContent	.= '<div id="PL'.$glRow['INT_GL_ID'].'" class="plDiv" style="display:none; margin-top:5px;">';
					$glContent	.= '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">';
					
					while($plRow	=  mysqli_fetch_array($plResult))
					{
						if($plRow['VCH_ACTION1']=='' && $plRow['VCH_ACTION2']=='' && $plRow['VCH_ACTION3']=='' )
						{
							$td		= '<td colspan="3">External link</td>';
						}
						else 
						{
							$action1	= ($plRow['VCH_ACTION1']!='')?'
								<input name="rad'.$glRow['INT_GL_ID'].'_'.$plRow['INT_PL_ID'].'" id="rad'.$glRow['INT_GL_ID'].'_'.$plRow['INT_PL_ID'].'_1" type="radio" value="1" class="radAction">'.$plRow['VCH_ACTION1'].'
							':'';
							$action2	= ($plRow['VCH_ACTION2']!='')?'
								<input name="rad'.$glRow['INT_GL_ID'].'_'.$plRow['INT_PL_ID'].'" id="rad'.$glRow['INT_GL_ID'].'_'.$plRow['INT_PL_ID'].'_2" type="radio" value="2" class="radAction">'.$plRow['VCH_ACTION2'].'
							':'';
							$action3	= ($plRow['VCH_ACTION3']!='')?'
								<input name="rad'.$glRow['INT_GL_ID'].'_'.$plRow['INT_PL_ID'].'" id="rad'.$glRow['INT_GL_ID'].'_'.$plRow['INT_PL_ID'].'_3" type="radio" value="3" class="radAction">'.$plRow['VCH_ACTION3'].'
							':'';
							$td		= '<td width="200px">'.$action1.'</td><td width="200px">'.$action2.'</td><td width="200px">'.$action3.'</td>';
						}
						$glContent	.= '
						  <tr id="'.$glRow['INT_GL_ID'].'_'.$plRow['INT_PL_ID'].'">
							<td>		
								<label class="label_check">		
								<input name="chkBox'.$glRow['INT_GL_ID'].'_'.$plRow['INT_PL_ID'].'" id="chkBox'.$glRow['INT_GL_ID'].'_'.$plRow['INT_PL_ID'].'" type="checkbox" value="'.$glRow['INT_GL_ID'].'_'.$plRow['INT_PL_ID'].'" class="firstChk" >				
								'.$plRow['VCH_PL_NAME'].'</label>
							</td>
							'.$td.'			
						  </tr>
						';
					}			
					$glContent	.=	'</table></div></li>';
					$glContent	.=	'</li>';
				}
			}
			$glContent	.= '</ul>';
			echo json_encode(array('permission'=>$glContent));
		}
		
		/*=========== function to Fill Primary Link ===============
			By				: Rasmi Ranjan Swain
			ON				: 07/Nov/2013
			Procedure Used 	: USP_ADMIN_PLINK
		=======================================================*/
		function fillPrimaryLink($glId,$selVal)
		{
			$primaryResult		= linkClass::managePL('F',0,'0', $glId,'', 0, 0,0,0,0,0);
			$opt				= '<option value="0">--Select--</option>';
			if(mysqli_num_rows($primaryResult)>0)
			{							
				while($row	= mysqli_fetch_array($primaryResult))
				{
					$intPlId	= $row["INT_PL_ID"];
					$strPLName	= $row["VCH_PL_NAME"];
					$select		= ($intPlId==$selVal)?'selected="selected"':'';
					$opt .= '<option value="'.$intPlId.'" title="'.$strPLName.'" '.$select.'>'.$strPLName.'</option>';
				}				
			}
			$link_arr["pLink"]			= $opt;
			echo json_encode(array('pLinkId'=>$link_arr));
			
		}
		
		/*=========== function to Buuton Action On primary Link ===============
			By				: Rasmi Ranjan Swain
			ON				: 07/Nov/2013
			Procedure Used 	: USP_ADMIN_PLINK
		=======================================================*/
		function assignLinkPl($plID)
		{			
			$plResult	= linkClass::managePL('PF', $plID, '',0, '', '0', '1', '0', '0', 1, 0);
			$link_arr["action1"]	= '';
			$link_arr["action2"]	= '';
			$link_arr["action3"]	= '';
			if(commonClass::NumRow($plResult)>0)
			{			
				while($plRow	=  mysqli_fetch_array($plResult))
				{
					$link_arr["action1"]	= ($plRow["VCH_ACTION1"]!='')?$plRow["VCH_ACTION1"]:'';
					$link_arr["action2"]	= ($plRow["VCH_ACTION2"]!='')?$plRow["VCH_ACTION2"]:'';
					$link_arr["action3"]	= ($plRow["VCH_ACTION3"]!='')?$plRow["VCH_ACTION3"]:'';
					
				}
			}
			echo json_encode(array('linkpermission'=>$link_arr));
		}
	
	}
	
	//======= Function to fill subnode## By Rsmi Ranjan Swain##on##23-09-2013
	class viewNode extends hierarchy
	{
            // function to set assembly tagging | By: sukanta kumar mishra | On: 18 Mar 2016
            public function setAssemblyTag($villageId,$assemblyId)
            {
                $result = hierarchy::manageAssembles('A',$assemblyId,'0',$villageId,'','0','0','0','0');
                if($result)
                    echo json_encode(array('result'=>'1'));
                else
                    echo json_encode(array('result'=>'2'));
            }
		//============ function to view Hierarchy ===================
		public function viewHierarchy($selVal)
		{
			$hierarchyResult	= hierarchy::manageNodeValues('FP',0,0,'','','','','',0,0,0);
			$opt	= '<option value="0">--Select--</option>';
			if(mysqli_num_rows($hierarchyResult)>0)
			{							
				while($row	= mysqli_fetch_array($hierarchyResult))
				{
					$intHId		= $row["INT_SUBNODEVAL_ID"];
					$strHName	= $row["VCH_VALUE_NAME"];
					$select		= ($intHId==$selVal)?'selected="selected"':'';
					$opt .= '<option value="'.$intHId.'" title="'.$strHName.'" '.$select.'>'.$strHName.'</option>';
				}				
			}
			$link_arr["hierarchyFill"]			= $opt;
			echo json_encode(array('hierarchy'=>$link_arr));
		}
		
		//=============== View subnode ==================
		public function viewSubnode($nodeId)
		{
			$arrList=array();
			$result	= hierarchy::manageSubNode(V, '0', '', '',$nodeId,'0', '0');
			if(mysqli_num_rows($result)>0)
			{	
			    while($row= mysqli_fetch_array($result))
			    {                                       
                 	array_push($arrList,array("subnodeID"=> $row['INT_SUBNODE_ID'],"subnodeName"=> $row['VCH_SUBNODE_NAME'],"subnodeAliasname"=> $row['VCH_SUBALIAS_NAME']));
                }
			} 
			echo(json_encode($arrList));
		}
		
		//=========== Fill subnode hierarchy values ====== By Sunil Kumar Parida On 27/09/2013 ===========
		public function viewSubnodeValue($subnodeID,$parentId,$selVal,$adminHVal)
		{	
			$subnodeResult			= hierarchy::manageNodeValues('F',$adminHVal,$parentId,'','','','','',0,0,0);	
			$opt					= '<option value="0">--Select--</option>';	
			$intNodeId				= '';
			$intSubNodeId			= '';
			$link_arr["flag"]		= 0;
			$rowSubnodeResult		= mysqli_num_rows($subnodeResult);
			$numSubNode				= 0	;
			if($rowSubnodeResult>0)
			{		
				while($row=mysqli_fetch_array($subnodeResult))
				{
					$intValueId		= $row["INT_SUBNODEVAL_ID"];
					$strValueName	= ucwords(strtolower($row["VCH_VALUE_NAME"]));
					$intNodeId		= $row["INT_NODE_ID"];
					$intSubNodeId	= $row["INT_SUBNODE_ID"];
					$select			= ($intValueId==$selVal)?'selected="selected"':'';
					$opt .= '<option value="'.$intValueId.'" title="'.$strValueName.'" '.$select.'>'.$strValueName.'</option>';
				}
			}				
			
			if($intSubNodeId!='')
			{
				$subNodeNameResult			= hierarchy::manageSubNode('V', $intSubNodeId, '', '',0,'0', '0');
				$numSubNode					= mysqli_num_rows($subNodeNameResult);
				$subNodeRow					= mysqli_fetch_array($subNodeNameResult);
				$subNodeName				= $subNodeRow['VCH_SUBNODE_NAME'];
			}
			else 
			{	
				$valueResult			= hierarchy::manageNodeValues('V',$parentId,'0','','','','','',0,0,0);
				$valueRow				= mysqli_fetch_array($valueResult);
				$valueNode				= $valueRow['INT_NODE_ID'];
				$valueSubNode			= $valueRow['INT_SUBNODE_ID'];
				if($valueSubNode>0)
				{
					$subNodeNameResult			= hierarchy::manageSubNode('V', $valueSubNode, '', '',0,'0', '0');
					$subNodeRow					= mysqli_fetch_array($subNodeNameResult);
					$nodeId						= $subNodeRow['INT_NODE_ID'];
					$levelId					= $subNodeRow['INT_SUB_LEVEL'];
					$subNodeNextResult			= hierarchy::manageSubNode('R', 0, '', '',$nodeId,$levelId+1, '0');
					$numSubNode					= mysqli_num_rows($subNodeNextResult);
					if($numSubNode>0)
					{
						$subNodeNextRow			= mysqli_fetch_array($subNodeNextResult);
						$subNodeName			= $subNodeNextRow['VCH_SUBNODE_NAME'];
					}
					else
					{
						$link_arr["flag"]	= 1;
					}
				}
				else if($valueSubNode==0 && $valueNode>0)	
				{
					$valNameResult			= hierarchy::manageSubNode('V', 0, '', '',$valueNode,'1', '0');
					$numSubNode				= mysqli_num_rows($valNameResult);
					if($numSubNode>0)
					{
						$subNodeValRow		= mysqli_fetch_array($valNameResult);
						$nodeId				= $subNodeValRow['INT_NODE_ID'];
						$levelId			= $subNodeValRow['INT_SUB_LEVEL'];
						$subNodeName		= $subNodeValRow['VCH_SUBNODE_NAME'];
					}
					else
					{
						$link_arr["flag"]	= 1;
					}
					
				}			
				else
				{
					$numSubNode				= 0;
					$link_arr["flag"]		= 1;
				}
			}			
			$link_arr["subNodeLabel"]	= $subNodeName;
			$link_arr["subNodeId"]		= $intSubNodeId;
			$link_arr["nodeId"]			= $intNodeId;			
			$link_arr["valueNum"]		= $numSubNode;
			$link_arr["valueFill"]		= $opt;
			echo json_encode(array('nodeValue'=>$link_arr));
		}
		
		//========= Fill parent level ===== By Sunil Kumar Parida On 30/09/2013 =========
		public function fillParent($parentId,$class,$hdn)
		{
			$explParentId	= explode(",",$parentId);
			$explParentIndex= count($explParentId)-1;
			$tbl			= '';
			$ctr			= 0;
			for($i=$explParentIndex; $i>=0; $i--)
			{
				$ctr++;
				$pId			= $explParentId[$i];
				$valueResult	= hierarchy::manageNodeValues('P','0',$pId,'','','','','',0,0,0);
				$valResult		= hierarchy::manageNodeValues('F','0',$pId,'','','','','',0,0,0);
				if(mysqli_num_rows($valueResult)>0)
				{
					$select		= '';
					$nameRow 	= mysqli_fetch_array($valResult);
					$subNodeId	= $nameRow['INT_SUBNODE_ID'];
					$subNodeName= commonClass::getName('VCH_SUBNODE_NAME','m_admin_subnode','INT_SUBNODE_ID',$subNodeId,'BIT_DELETED_FLAG');
					$tbl		.= '<tr class="'.$class.'" id="'.$class.$ctr.'" ><td><span class="lbl'.$class.'">'.$subNodeName.'</span></td><td align="center" valign="middle">:</td><td>';
					$tbl		.= '<select style="width:207px;" onchange="fillSubnode(this.value,'.$subNodeId.',0,\''.$class.$ctr.'\',\''.$class.'\',\''.$hdn.'\');" class="sel'.$class.'"><option value="0">--Select--</option>';
					while($valueRow	= mysqli_fetch_array($valueResult))
					{						
						$valueId = $valueRow['INT_SUBNODEVAL_ID'];
						$select	 = ($valueId==$explParentId[$i-1])?'selected="selected"':'';						
						$tbl	.= '<option value="'.$valueId.'" '.$select.'>'.$valueRow['VCH_VALUE_NAME'].'</option>';
					}
					$tbl		.= '</select>';
					$tbl		.= '<input type="hidden" id="hdnIndex'.$ctr.'" class="hidIndex" value="'.$ctr.'"/>';
					$tbl		.= '</tr>';
				}
			}
			$arr_fill['fillRow']=$tbl;
			$arr_fill['locId']=$explParentId[$ctr-1];
			echo json_encode(array('tableRow'=>$arr_fill));
		}	
		
		//========= Fill parent level details ===== By Sunil Kumar Parida On 04/10/2013 =========
		public function fillParentLabel($parentId)
		{
			$explParentId	= explode(",",$parentId);
			$explParentIndex= count($explParentId)-1;
			$tbl			= 'Location,';
			$val			= '';
			$ctr			= 0;
			for($i=$explParentIndex; $i>=0; $i--)
			{
				$ctr++;
				$pId			= $explParentId[$i];				
				$hierarchyName	.= commonClass::getName('VCH_VALUE_NAME','m_admin_subnode_values','INT_SUBNODEVAL_ID',$pId,'BIT_DELETED_FLAG').',';
				$valueResult	= hierarchy::manageNodeValues('P','0',$pId,'','','','','',0,0,0);
				$valResult		= hierarchy::manageNodeValues('F','0',$pId,'','','','','',0,0,0);
				if(mysqli_num_rows($valueResult)>0)
				{
					$select		= '';
					$nameRow 	= mysqli_fetch_array($valResult);
					$subNodeId	= $nameRow['INT_SUBNODE_ID'];
					$subNodeName= commonClass::getName('VCH_SUBNODE_NAME','m_admin_subnode','INT_SUBNODE_ID',$subNodeId,'BIT_DELETED_FLAG');
					$tbl		.= $subNodeName.',';					
				}
			}
			$tbl			= substr($tbl,0,-1);
			$hierarchyName	= substr($hierarchyName,0,-1);
			$arr_fill['fillLabel']	= $tbl;
			$arr_fill['fillValue']	= $hierarchyName;
			return  $arr_fill;
		}	
		
		//============ Get hierarchy parents ===== By Sunil Kumar Parida On 04/10/2013  ================
		public function fillHierarchy($id, $nodeId=0)
		{		
			
			$subnodeResult	= hierarchy::manageNodeValues('V',$id,'0','','','','','',0,'0',0);	
			$nodeValRow		= mysqli_fetch_array($subnodeResult);			
			$parent			= $nodeValRow['INT_PARENT_NODE'];
			$nodeId			= $nodeValRow['INT_SUBNODE_ID'];
			if($parent	>='0')
			{				
				if($parent!=0)
				{
					$id	.= ','.$this->fillHierarchy($parent,$nodeId);			
				}
			}		
			return $id;		
		}
		
		//============= Get hierarchy level ===== By Sunil Kumar Parida On 04/10/2013  ===============
		public function fillLevel($selVal)
		{
			$hierarchyId	=  $this->fillHierarchy($selVal);
			echo json_encode(array('hierarchyFill'=>$hierarchyId));
		}
	

	}
	
	
	//========= Function to fillDepartment## By Rsmi Ranjan Swain##on##23-09-2013
	class viewdept extends user
	{
		
		public function viewdeptDrp($locId,$selVal)
		{
			$hierarchyObj	= new hierarchy;
			$nodeId	= $hierarchyObj->getHierarchyNodeId($locId);			
			$result	= user::manageDesignation('F', 0, $nodeId, '', '', '0',  '0','0');
			$opt	= '<option value="0">--Select--</option>';
			if(mysqli_num_rows($result)>0)
			{							
				while($row	= mysqli_fetch_array($result))
				{
					$intdesgId		= $row["INT_DESG_ID"];
					$strdesgName	= $row["VCH_DESG_NAME"];
					$select			= ($intdesgId==$selVal)?'selected="selected"':'';
					$opt .= '<option value="'.$intdesgId.'" title="'.$strdesgName.'" '.$select.'>'.$strdesgName.'</option>';
				}				
			}
			$desg_arr["desg"]			= $opt;
			echo json_encode(array('desgId'=>$desg_arr));
		}	
		
		## Function to fillGrade## By Rsmi Ranjan Swain##on##23-09-2013
		public function viewGardeDrp($locId,$selVal)
		{
			$hierarchyObj	= new hierarchy;
			$nodeId	= $hierarchyObj->getHierarchyNodeId($locId);
			$result	= user::manageGrade('F', 0, $nodeId, '', '','0');			
			$opt	= '<option value="0">--Select--</option>';
			if(mysqli_num_rows($result)>0)
			{							
				while($row	= mysqli_fetch_array($result))
				{
					$intgradeId		= $row["INT_GRADE_ID"];
					$strgradeName	= $row["VCH_GRADE_NAME"];
					$select			= ($intgradeId==$selVal)?'selected="selected"':'';	
					$opt .= '<option value="'.$intgradeId.'" title="'.$strgradeName.'" '.$select.'>'.$strgradeName.'</option>';
				}				
			}
			$grade_arr["garde"]			= $opt;
			echo json_encode(array('gradeId'=>$grade_arr));
		}		
		
		//============= Function to fill physical location drop down ===========
		public function fillPhyLoc($selVal)
		{
			$result	= user::manageLocation('F', 0, 0, '', '', '', 0);
			$opt	= '<option value="0">--Select--</option>';
			if(mysqli_num_rows($result)>0)
			{							
				while($row	= mysqli_fetch_array($result))
				{
					$intLocId		= $row["INT_LOC_ID"];
					$strLocName		= $row["VCH_LOCATION"];
					$strCountryName	= $row["COUNTRY_NAME"];
					$select			= ($intLocId==$selVal)?'selected="selected"':'';	
					$opt .= '<option value="'.$intLocId.'" title="'.$strLocName.' ('.$strCountryName.')" '.$select.'>'.$strLocName.' ('.$strCountryName.')</option>';
				}				
			}
			echo json_encode(array('physicalLoc'=>$opt));
		}
		
		//============= Function to fillUser ### By Sunil Kumar Parida ## On 03-10-2013 =====================
		public function fillUser($hierarchyId,$selVal)
		{
			$options	= user::fillUserDrp(0,$hierarchyId,$selVal);
			echo json_encode(array('users'=>$options));
		}

                
                //============= Function to fillDemographyUser ### By Ashok Kumar Samal ## On 19-9-2016 =====================
		public function fillDemographyUser($hierarchyId,$selVal)
		{ //echo 'jjjjjjjjjjjjjjjj'.$selVal;
			$hierarchyArr   = explode('_', $hierarchyId);
                        $hierarchyId    = $hierarchyArr[0];
                        $options	= user::fillUserDrp1(0,$hierarchyId,$selVal);
			echo json_encode(array('users'=>$options));
		}


		//============= Function to fillUser ### By Sunil Kumar Parida ## On 03-10-2013 =====================
		public function checkUName($name,$mailId)
		{
			$userNameResult	= user::manageUser('CD', '0', '', '0', '0000-00-00', '', '', '', '', '', '', $mailId, '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', $name, '', '', '0', '0', '0', '0', '0', '0', '0',  '0', '1','0');

			$userNameRow	= mysqli_fetch_array($userNameResult);
			$userNameCount	= ($userNameRow[0]>0)?1:0;
			echo json_encode(array('userName'=>$userNameCount));
		}
		
		//============= Function to view user details ### By Sunil Kumar Parida ## On 03-10-2013 =====================
		public function viewUserDetails($hierarchyObj,$Uid)
		{
			$gradeTable		= user::NumRow(user::ExecuteQuery("SHOW TABLES LIKE 'm_admin_grade_master'"));
			$groupTable		= user::NumRow(user::ExecuteQuery("SHOW TABLES LIKE 'm_admin_group_master'"));
			$userResult	= user::manageUser('V', $Uid, '', '0', '0000-00-00', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0',0);
			if(mysqli_num_rows($userResult)>0)
			{
				$readUserRow					= mysqli_fetch_array($userResult);
				$arr_show['strFullName']		= $readUserRow['VCH_FULL_NAME'];
				$arr_show['strGender']			= ($readUserRow['INT_GENDER']==1)?'Male':'Female';
				$arr_show['dtmDtOfBirth']		= (strtotime($readUserRow['DTM_DATE_OF_BIRTH'])>0)?date("d-m-Y",strtotime($readUserRow['DTM_DATE_OF_BIRTH'])):'';
				$arr_show['strQualification']	= $readUserRow['VCH_QUALIFICATION'];
				$arr_show['strSpecialization']	= $readUserRow['VCH_SPECIALIZATION'];
				$arr_show['strHobby']			= $readUserRow['VCH_HOBBY'];
				$arr_show['strImage']			= $readUserRow['VCH_IMAGE'];
				$arr_show['strPhNo']			= $readUserRow['VCH_PH_NO'];
				$arr_show['strMobNo']			= $readUserRow['VCH_MOBILE_NO'];
				$arr_show['strEmail']			= $readUserRow['VCH_EMAIL'];
				$arr_show['strAddress']			= $readUserRow['VCH_ADDRESS'];
				$intHierarchyId					= $readUserRow['INT_SUBNODEVAL_ID'];
				$arr_show['intHierarchyId']		= $intHierarchyId;
				$jsonParents					= $hierarchyObj->fillHierarchy($intHierarchyId,0);
				$parentNames					= $hierarchyObj->fillParentLabel($jsonParents);
				$arr_show['parentLabels']		= $parentNames['fillLabel'];
				$arr_show['parentValues']		= $parentNames['fillValue'];
				$arr_show['strPhyLocation']		= ($readUserRow['LOCATION_NAME']!='')?$readUserRow['LOCATION_NAME']:'';
				$intEmpType						= $readUserRow['INT_EMP_TYPE'];
				if($intEmpType==1)
					$arr_show['strEmpType']		= "CMS Manager";
				else if($intEmpType==2)
					$arr_show['strEmpType']		= "ULB";
				else if($intEmpType==3)
					$arr_show['strEmpType']		= "TCP";	
				else if($intEmpType==4)
					$arr_show['strEmpType']		= "SADA";	
				$arr_show['dtmDtOfJoin']		= (strtotime($readUserRow['VCH_DATE_OF_JOIN'])>0)?date("d-m-Y",strtotime($readUserRow['VCH_DATE_OF_JOIN'])):'';
				$arr_show['dtmProbotionDt']		= (strtotime($readUserRow['VCH_PROBATION_DATE'])>0)?date("d-m-Y",strtotime($readUserRow['VCH_PROBATION_DATE'])):'';
				$arr_show['strDesg']			= $readUserRow['DESIGNATION_NAME'];
				$arr_show['strGrade']			= $readUserRow['GRADE_NAME'];
				$arr_show['strGroup']			= $readUserRow['GROUP_NAME'];
				$arr_show['intPrivilege']		= $readUserRow['INT_PRIVILEGE'];
				$arr_show['intAttendance']		= $readUserRow['INT_ATTENDANCE'];
				$arr_show['intPayRoll']			= $readUserRow['INT_PAY_ROLL'];
				$arr_show['intEPF']				= ($intPayRoll==1)?$readUserRow['INT_EPF']:'2';
				$arr_show['strUserName']		= $readUserRow['VCH_USER_NAME'];
				$arr_show['strDomainName']		= $readUserRow['VCH_DOMAIN_USER_NAME'];
				$arr_show['maxSL']				= $readUserRow['INT_SLNO'];
				$arr_show['intStatus']			= $readUserRow['INT_STATUS'];
				$arr_show['intPrimaryRA']		= $readUserRow['INT_PRIMARY_RA'];
				$arr_show['strPrimaryRAName']	= $readUserRow['PRIMARY_RA_NAME'];
				$arr_show['intSecondaryRA']		= $readUserRow['INT_SECONDARY_RA'];
				$arr_show['strSecondaryRAName']	= $readUserRow['SECONDARY_RA_NAME'];
				$arr_show['intOptionalRA']		= $readUserRow['INT_OPTIONAL_RA'];
				$arr_show['strOptionalRAName']	= $readUserRow['OPTIONAL_RA_NAME'];
				$arr_show['intRACheck']			= $readUserRow['INT_RA_CHECK'];
				$arr_show['gradeTblExist']		= $gradeTable;
				$arr_show['groupTblExist']		= $groupTable;
			}
			echo json_encode(array('userDetails'=>$arr_show));
		}
		
		//============ Function to show all user of a group ### By Sunil Kumar Parida ## On 06-11-2013 =====================
		public function viewGrpUsers($grpId)
		{
			$userResult	= user::manageUser('V', 0, '', '0', '0000-00-00', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1',$grpId);
			if(mysqli_num_rows($userResult)>0)
			{
				$tbl	= '<tr><th>User Full Name</th><th>Designation</th></tr>';
				while($userRow=mysqli_fetch_array($userResult))
				{
					$tbl	.= '<tr><td>';
					$tbl	.= $userRow['VCH_FULL_NAME'];
					$tbl	.= '</td><td>';
					$tbl	.= $userRow['DESIGNATION_NAME'];
					$tbl	.= '</td></tr>';
				}
			}			
			else
			{
				$tbl	=	'<tr><td align="center">No users in this group</td></tr>';
			}
			echo json_encode(array('users'=>$tbl));
		}
		
		//============= Function to show admin user name ### By Sunil Kumar Parida ## On 09-10-2013 =====================
		public function showAdmin($locId)
		{
			$adminResult	= user::manageAssignAdmin('R', $locId, 0, 0);
			$adminName		= '';
			if(mysqli_num_rows($adminResult)>0)
			{
				$adminRow	= mysqli_fetch_array($adminResult);
				$adminName	= $adminRow['USER_NAME'];				
			}
			else
			{
				$adminName	= '0';
			}
			echo json_encode(array('adminName'=>$adminName));
		}
		
		//============= Function to remove admin user name ### By Sunil Kumar Parida ## On 11-11-2013 =====================
		public function removeAdmin($locId)
		{
			$msg			= '';
			$sessUserId		= $_SESSION['adminConsole_userID'];
			$result			= user::manageAssignAdmin('RM', $locId, 0, $sessUserId);
			if($result)
				$msg		= 'Admin unassigned successfully';
			echo json_encode(array('unAssignAdmin'=>$msg));
		}
		
		//============ Function to fill user dropdown === By Sunil Kumar Parida On 28-10-2013 ==========
		function fillUName($userName,$selVal)
		{
			$userResult	= user::manageUser('F', 0, $userName, '0', '0000-00-00', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1','0');

			$opt	= '<option value="0">--Select--</option>';
			if(mysqli_num_rows($userResult)>0)
			{							
				while($row	= mysqli_fetch_array($userResult))
				{
					$intUserId		= $row["INT_USER_ID"];
					$designation	= $row["DESIGNATION_NAME"];
					$strFullName	= $row["VCH_FULL_NAME"];
					$select			= ($intUserId==$selVal)?'selected="selected"':'';	
					$opt .= '<option value="'.$intUserId.'" title="'.$strFullName.' ('.$designation.')" '.$select.'>'.$strFullName.' ('.$designation.')</option>';
				}				
			}
			$user_arr["users"]			= $opt;
			echo json_encode(array('userNames'=>$user_arr));
			
		}
		
		//============= Function to fill group drop down ===========
		public function fillGroup($selVal)
		{
			$result	= user::fillGroup($selVal);
			echo json_encode(array('group'=>$result));
		}
		
	}
	
	//Class to Show Logo and Header Footer
	
	class HeaderClass extends themeClass
	{
		public function viewHeaderFooter()
		{
			$arrList		= array();
			$headerResult	= themeClass::manageHeaderFooter('V',0,0,'','','','','','','',0);
			if(mysqli_num_rows($headerResult)>0)
			{
				$headerRow	= mysqli_fetch_array($headerResult);
				array_push($arrList,array("headerTExt"=>$headerRow['VCH_HEADER_TEXT'],"footerText"=>$headerRow['VCH_FOOTER_TEXT'],"url"=>$headerRow['VCH_URL'],"companyName"=>$headerRow['VCH_COMPANY_NAME'],"loginLogo"=>$headerRow['VCH_LOGIN_LOGO'],"innerLogo"=>$headerRow['VCH_INNER_LOGO'],"portalLogo"=>$headerRow['VCH_PORTAL_LOGO'],"option"=>$headerRow['INT_OPTION']));
			}
			echo(json_encode($arrList));
		}
	}
	
	//========= Class for office timing module ## By Sunil Kumar Parida On 15-10-2013 =========
	class timing extends offTiming
	{
		//========= Function to fill shift options ===========
		function fillShift($locId, $selVal)
		{
			$shiftOptions	= offTiming::fillShiftMaster($locId, $selVal);
			echo json_encode(array('shiftMaster'=>$shiftOptions));
		}
		
		//========= Function to fill shift options ===========
		function readNOffTime($timingId,$shiftId,$type)
		{
			$arr_time['flag']		= 0;
			$timingResult	= offTiming::manageOffTime('V', $type, $timingId, '', '', '0', $shiftId, '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '0');
			if(offTiming::NumRow($timingResult)>0)
			{
				$timingRow					= mysqli_fetch_array($timingResult);
				$arr_time['dateFrom']		= commonClass::dbDateFormat($timingRow['DTM_DATE_FROM']); 
				$arr_time['dateTo']			= commonClass::dbDateFormat($timingRow['DTM_DATE_TO']); 
				$arr_time['startTime']		= $timingRow['VCH_START_TIME']; 
				$arr_time['graceTime']		= $timingRow['INT_GRACE_TIME']; 
				$arr_time['recessFrom']		= $timingRow['VCH_RECESS_FROM']; 
				$arr_time['recessTo']		= $timingRow['VCH_RECESS_TO']; 
				$arr_time['exitTime']		= $timingRow['VCH_EXIT_TIME']; 
				$arr_time['lateExitTime']	= $timingRow['VCH_LATE_EXIT_TIME']; 
				$arr_time['extraLateExit']	= $timingRow['VCH_EXTRA_LATE_EXIT']; 
				$arr_time['earlyEntry']		= $timingRow['VCH_EARLY_ENTRY']; 
				$arr_time['lateEntry']		= $timingRow['VCH_LATE_ENTRY']; 
				$arr_time['halfStartTime']	= $timingRow['VCH_HALF_START_TIME']; 
				$arr_time['halfEarlyEntry']	= $timingRow['VCH_HALF_EARLY_ENTRY']; 
				$arr_time['halfLateEntry']	= $timingRow['VCH_HALF_LATE_ENTRY']; 
				$arr_time['halfExitTime']	= $timingRow['VCH_HALF_EXIT_TIME']; 
				$arr_time['halfLateExit']	= $timingRow['VCH_HALF_LATE_EXIT'];
				$arr_time['flag']			= 1;
			}
			echo json_encode(array('normalOfficeTime'=>$arr_time));
		}
		
		//============ Function to view flexi timing =====================
		function showFlexiTiming($id)
		{
			$timingResult	= offTiming::manageFlexiTime('V', $id, 0, 0, 0, 0, 0, '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '0');
			if(offTiming::NumRow($timingResult)>0)
			{
				$timingRow					= mysqli_fetch_array($timingResult);
				$arr_time['shiftName']		= $timingRow['SHIFT_NAME'];
				$arr_time['userName']		= $timingRow['USER_NAME'];
				$arr_time['dateFrom']		= commonClass::dbDateFormat($timingRow['DTM_DATE_FROM']); 
				$arr_time['dateTo']			= commonClass::dbDateFormat($timingRow['DTM_DATE_TO']); 
				$arr_time['startTime']		= $timingRow['VCH_START_TIME']; 
				$arr_time['graceTime']		= $timingRow['INT_GRACE_TIME']; 
				$arr_time['recessFrom']		= $timingRow['VCH_RECESS_FROM']; 
				$arr_time['recessTo']		= $timingRow['VCH_RECESS_TO']; 
				$arr_time['exitTime']		= $timingRow['VCH_EXIT_TIME']; 
				$arr_time['lateExitTime']	= $timingRow['VCH_LATE_EXIT_TIME']; 
				$arr_time['extraLateExit']	= $timingRow['VCH_EXTRA_LATE_EXIT']; 
				$arr_time['earlyEntry']		= $timingRow['VCH_EARLY_ENTRY']; 
				$arr_time['lateEntry']		= $timingRow['VCH_LATE_ENTRY']; 
				$arr_time['halfStartTime']	= $timingRow['VCH_HALF_START_TIME']; 
				$arr_time['halfEarlyEntry']	= $timingRow['VCH_HALF_EARLY_ENTRY']; 
				$arr_time['halfLateEntry']	= $timingRow['VCH_HALF_LATE_ENTRY']; 
				$arr_time['halfExitTime']	= $timingRow['VCH_HALF_EXIT_TIME']; 
				$arr_time['halfLateExit']	= $timingRow['VCH_HALF_LATE_EXIT'];
				$arr_time['flag']			= 1;
			}
			echo json_encode(array('flexiTime'=>$arr_time));
		}
		
		//========== Function to view shift wise user ================
		function viewShiftUser($locId, $shiftId)
		{
			$shiftUserResult	= offTiming::manageAssignShift('F', 0, $locId, $shiftId, 0, 0);
			$options			= '';
			$optTable			= '<table>';
			if(offTiming::NumRow($shiftUserResult)>0)
			{
				$optTable		.= '<tr><th>User Name</th><th>Designation</th></tr>';
				while($shiftUserRow	= mysqli_fetch_array($shiftUserResult))
				{
					$options		.= '<option value="'.$shiftUserRow[0].'">'.$shiftUserRow[1].' ('.$shiftUserRow[2].')</option>';
					$optTable		.= '<tr><td>'.$shiftUserRow[1].'</td><td>'.$shiftUserRow[2].'</td></tr>';
				}
			}
			else
			{
				$options			= '<option value="0">No Record Found</option>';
				$optTable		.= '<tr><td>No user assign to this shift</td></tr>';
			}
			$optTable			.= '</table>';
			echo json_encode(array('shiftUser'=>$options,'shiftUserTable'=>$optTable));
		}
	}
	
	//======= Function to fill IP## By Rsmi Ranjan Swain##on##16-10-2013
	class classviewIP extends romaingAccess
	{
		//============ function to view IP ===================
		public function viewIP($locID)
		{
			$arrList=array();
			$ipResult=romaingAccess::manageIPconfigre('V',0,$locID,'','',0,'0');
			if(mysqli_num_rows($ipResult)>0)
			{
				while($ipRow=mysqli_fetch_array($ipResult))
				{
				array_push($arrList,array("configID"=>$ipRow['INT_CONFIG_ID'],"lowerIP"=>$ipRow['VAR_LOWER_IP'],"higherIP"=>$ipRow['VAR_HIGHER_IP']));
				}
			}echo(json_encode($arrList));
		}
	
		//============ function to count IP ===================
		public function countIP($locID)
		{
			$arrList	= array();
			$ipResult	= romaingAccess::manageIPconfigre('CR',0,$locID,'','',0,'0');
			if(mysqli_num_rows($ipResult)>0)
			{
				while($ipRow=mysqli_fetch_array($ipResult))
				{
				array_push($arrList,array("noofRow"=>$ipRow['NOOFROW']));
				}
			}
			echo(json_encode($arrList));
		}
		
		//============ function to delete ip By Sunil Kumar Parida On 01/11/2013 ============
		function deleteIP($ID)
		{
			$ipResult	= romaingAccess::manageIPconfigre('D',$ID,0,'','',0,'0');
			if($ipResult)
				$msg	= "Record deleted successfully";
			echo(json_encode(array('message'=>$msg)));
		}
	}
	
	//======== Class to manage set permission ## By Sunil Kumar parida On 25/10/2013 =======
	class permission extends fillPermission
	{
		//============== Function to view group permission By Sunil kumar parida On 25/10/2013 ===========
		function viewPermission($userId)
		{
			$permissionResult	= fillPermission::managePermission('V', '0', $userId, '0', '0', '0', '0', '0', '0', '');
			$arr_row			= array();
			$arrList=array();
			if(commonClass::NumRow($permissionResult)>0)
			{
				while($permissionRow		= mysqli_fetch_array($permissionResult))
				{
					$arr_row['userId']		= $userId;
					$arr_row['glId']		= $permissionRow['INT_GL_ID'];
					$arr_row['plId']		= $permissionRow['INT_PL_ID'];
					$arr_row['permission']	= $permissionRow['INT_PERMISSION'];					
					array_push($arrList,$arr_row);					
				}				
			}
                     
			echo json_encode(array('permissions'=>$arrList));
		}
		
		//============== Function to view User and group permission By Sunil kumar parida On 12/11/2013 ===========
		function viewUserPermission($Id, $Type)
		{
			if($Type=='U')
			{
				$permissionResult	= fillPermission::managePermission('VP', '0', $Id, '0', '0', '0', '0', '0', '0', '');
				$arr_row			= '';
				$arrList			= array();
				if(commonClass::NumRow($permissionResult)>0)
				{
					while($permissionRow		= mysqli_fetch_array($permissionResult))
					{
						$arr_row['ID']			= $Id;
						$arr_row['glId']		= $permissionRow['INT_GL_ID'];
						$arr_row['glName']		= $permissionRow['GL_NAME'];
						$arr_row['plId']		= $permissionRow['INT_PL_ID'];
						$arr_row['plName']		= $permissionRow['PL_NAME'];
						$arr_row['action1']		= ($permissionRow['ACTION1']!='')?$permissionRow['ACTION1']:'';
						$arr_row['action2']		= ($permissionRow['ACTION2']!='')?$permissionRow['ACTION2']:'';
						$arr_row['action3']		= ($permissionRow['ACTION3']!='')?$permissionRow['ACTION3']:'';
						$arr_row['permission']	= $permissionRow['INT_PERMISSION'];					
						array_push($arrList,$arr_row);					
					}				
				}
			}
			else
			{
				$permissionResult	= fillPermission::manageGroupPermission('VP', '0', $Id, '0', '0', '0', '0', '0');
				$arr_row			= '';
				$arrList			= array();
				if(commonClass::NumRow($permissionResult)>0)
				{
					while($permissionRow		= mysqli_fetch_array($permissionResult))
					{
						$arr_row['ID']			= $Id;
						$arr_row['glId']		= $permissionRow['INT_GL_ID'];
						$arr_row['glName']		= $permissionRow['GL_NAME'];
						$arr_row['plId']		= $permissionRow['INT_PL_ID'];
						$arr_row['plName']		= $permissionRow['PL_NAME'];
						$arr_row['action1']		= ($permissionRow['ACTION1']!='')?$permissionRow['ACTION1']:'';
						$arr_row['action2']		= ($permissionRow['ACTION2']!='')?$permissionRow['ACTION2']:'';
						$arr_row['action3']		= ($permissionRow['ACTION3']!='')?$permissionRow['ACTION3']:'';
						$arr_row['permission']	= $permissionRow['INT_ACTION'];					
						array_push($arrList,$arr_row);					
					}				
				}
			}
			echo json_encode(array('permissions'=>$arrList));
			
		}
		
		//============== Function to view group permission By Sunil kumar parida On 06/11/2013 ===========
		function viewGrpPermission($grpId)
		{
			$permissionResult	= fillPermission::manageGroupPermission('V', '0', $grpId, '0', '0', '0', '0', '0');
			$arr_row			= '';
			$arrList=array();
			if(commonClass::NumRow($permissionResult)>0)
			{
				while($permissionRow		= mysqli_fetch_array($permissionResult))
				{
					$arr_row['grpId']		= $grpId;
					$arr_row['glId']		= $permissionRow['INT_GL_ID'];
					$arr_row['plId']		= $permissionRow['INT_PL_ID'];
					$arr_row['permission']	= $permissionRow['INT_ACTION'];					
					array_push($arrList,$arr_row);					
				}				
			}
			echo json_encode(array('permissions'=>$arrList));
		}
             }   
        //============== Function for resetting password By Manali Ranjan On 29/01/2018 ===========
      
        
        class UserPass extends user
	{
            
            function resetPass($UserId) {
                     $pass = 'pass'.rand();
                     $encrpyPass = md5($pass);
                    $userSql	= user::manageUser('RP',$UserId, '',0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '',0, 0, 0,0,0,0, '', $encrpyPass, '', 0, 0,0, 0, 0,0,0,0,0,0,'','','','','', @OUT);
                    while ($row = $userSql->fetch_array()){
                         $Status=$row['P_Status'];
                         $userPass = $pass;
                }
                echo json_encode(array('Status'=>$Status,'userPass'=>$userPass));
            }
	}


		class Policestation extends clsPolicestation
		{
				
				function fillRange($selVal) {
					$dataArr    = array();					
					$userSql	= clsPolicestation::managePolicestation('RP',$dataArr);
					$opt         = '<option value="0">--Select Range--</option>';

					if($userSql->num_rows>0)
					{               
						while($row  = $userSql->fetch_array()){ 
						  // echo "<pre>";print_r($row);exit;
						   $intRangeId    = $row["intRangeId"];
						   $vchRangeName  = $row["vchRangeName"];
						   $select = ($intRangeId==$selVal)?'selected="selected"':'';
		
							$opt .= '<option value="'.$intRangeId.'" title="'.$vchRangeName.'" '.$select;
						   
							$opt .= '>'.$vchRangeName.'</option>';
		
						}
						
					}
					echo json_encode(array('Range'=>$opt));
				}





				function fillPoliceStation($selVal,$exceptId) {
					$dataArr    = array();
					$dataArr['exceptId']=$exceptId;					
					$userSql	= clsPolicestation::managePolicestation('FP',$dataArr);
					$opt         = '';

					if($userSql->num_rows>0)
					{               
						while($row  = $userSql->fetch_array()){ 
						  // echo "<pre>";print_r($row);exit;
						   $intPolicestationId    = $row["intPolicestationId"];
						   $vchPolicestationName  = $row["vchPolicestationName"];
						   $districtName          = $row["districtName"];
						   $select = ($intPolicestationId==$selVal)?'selected="selected"':'';
		
							$opt .= '<option value="'.$intPolicestationId.'" title="'.$vchPolicestationName.'" '.$select;
						   
							$opt .= '>'.$vchPolicestationName.' , '.$districtName.'</option>';
		
						}
						
					}else{
						$opt         = '<option value="0">--Select Police Station--</option>';
					}
					echo json_encode(array('PolicestationName'=>$opt));
				}


				function fillPoliceStionExist($rangeId) {
					$dataArr    = array();
					$dataArr['rangeId']    =$rangeId;					
					$userSql	 = clsPolicestation::managePolicestation('FT',$dataArr);
					$opt         = '';
					$ExceptIds   = '';

					if($userSql->num_rows>0)
					{               
						while($row  = $userSql->fetch_array()){ 
						  // echo "<pre>";print_r($row);exit;
						   $intPolicestationId    = $row["intPolicestationId"];
						   $ExceptIds             .=$intPolicestationId.',';
						   $vchPolicestationName  = $row["vchPolicestationName"];
						   $districtName          = $row["districtName"];
						   $select = ($intPolicestationId==$selVal)?'selected="selected"':'';
		
							$opt .= '<option value="'.$intPolicestationId.'" title="'.$vchPolicestationName.'" '.$select;
						   
							$opt .= '>'.$vchPolicestationName.' , '.$districtName.'</option>';
		
						}
						$ExceptIds=substr($ExceptIds,0,-1);
						
					}else{
						$opt         = '<option value="0">--Select Police Station--</option>';
					}
					echo json_encode(array('PolicestationName'=>$opt,'ExceptIds'=>$ExceptIds));
				}


				function fillDistrict() {
					$dataArr    = array();					
					$userSql	= clsPolicestation::managePolicestation('AD',$dataArr);
					$opt         = '<option value="0">--Select District--</option>';
					if($userSql->num_rows>0)
					{               
						while($row  = $userSql->fetch_array()){ 
						  // echo "<pre>";print_r($row);exit;
						   $INT_SUBNODEVAL_ID    = $row["INT_SUBNODEVAL_ID"];
						   $VCH_VALUE_NAME  = $row["VCH_VALUE_NAME"];
						   $select = ($INT_SUBNODEVAL_ID==$selVal)?'selected="selected"':'';
		
							$opt .= '<option value="'.$INT_SUBNODEVAL_ID.'" title="'.$VCH_VALUE_NAME.'" '.$select;
						   
							$opt .= '>'.$VCH_VALUE_NAME.'</option>';
		
						}
						
					}
					echo json_encode(array('DistrictName'=>$opt));
				}



				function searchPoliceStion($districtId) {
					$dataArr    = array();
					$dataArr['districtId']=$districtId;					
					$userSql	= clsPolicestation::managePolicestation('FP',$dataArr);
					$opt         = '';

					if($userSql->num_rows>0)
					{               
						while($row  = $userSql->fetch_array()){ 
						  // echo "<pre>";print_r($row);exit;
						   $intPolicestationId    = $row["intPolicestationId"];
						   $vchPolicestationName  = $row["vchPolicestationName"];
						   $districtName          = $row["districtName"];
						   $select = ($intPolicestationId==$selVal)?'selected="selected"':'';
		
							$opt .= '<option value="'.$intPolicestationId.'" title="'.$vchPolicestationName.'" '.$select;
						   
							$opt .= '>'.$vchPolicestationName.' , '.$districtName.'</option>';
		
						}
						
					}else{
						$opt         = '<option value="0">--Select Police Station--</option>';
					}
					echo json_encode(array('PolicestationName'=>$opt));
				}




		}
?>

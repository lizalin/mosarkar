<?php
/**
 * Description of clsService
 *
 * @author Puja 
 */
class clsAgentdashboard extends Model {

    private function manageInBound($action, $arrCondition) {

        //print_r($arrCondition);exit;
        $operatorResult = $this->callProc('USP_MS_AGENT_DASHBOARD', $action, $arrCondition);
//echo $operatorResult;exit;
        /* Activity log Tracker End */
        return $operatorResult;
    }

    //------ Get All Inbound function for Blog By::Jaideep Kumar date: 25-Sept-2019
    function getHcmInformation(){
        // print_r()
        $outMsg                 = '';
        $errFlag = 0;
        $idata['INT_DESIGNATION_ID']        = implode(',', DESIGNATION);
        $resData = array();
        $action         = 'R';
        // print_r($idata); exit;
        $result     = $this->manageInBound($action, $idata);
         if($result->num_rows > 0){
                $vchReturnText  = '<div class="table-responsive"><table data-toggle="table" class="table table-hover table-bordered"><thead><tr><th width="40px">Sl#</th><th>Date</th> <th>Name</th> <th>Mobile No.</th><th>Demography Details</th> <th>Service & Scheme</th><th>Requested By</th> <th width="60px">Call</th> </tr></thead><tbody>';
                $i=0;
                while($row = $result->fetch_array()){
                    // print_r($row); exit;
                    $encArry['intOutboundDataId']=$row['intOutboundDataId'];
                    $encArry['requestFrom']='CMB';
                    $encArry['dataType']=$row['dataType'];
                    $encArry['designationId']=$row['INT_DESIGNATION_ID'];
                    $encArry['userId']=$row['INT_USER_ID'];
                    
                    $encOutboundDataId   = $this->encrypt(json_encode($encArry));
                    $dtmAssignedTime    = ($row['dtmAssignedTime'])?date('d-M-Y h:i A',strtotime($row['dtmAssignedTime'])):'--';
                    $dtmRegdDateTime    = (strtotime($row['dtmRegdDateTime'])>0)?date("d-M-Y",strtotime($row['dtmRegdDateTime'])):'--';
                    $intAge    = !empty($row["intAge"])?$row["intAge"]:'--';
                    $intGender    = !empty($row['intGender'])?(($row['intGender'] == 1)?'Male':(($row['intGender'] == 2)?"Female":"Transgender")):'--';
                    $vchReturnText .= "<tr>";
                    $vchReturnText .= "<td>".(++$i)."</td>";
                    $vchReturnText .= "<td>". $dtmAssignedTime ."</td>";
                    $vchReturnText .="<td>".$row['vchName'];
                    $vchReturnText .='<br><small style="color: #18766d;">Age:&nbsp;'.$intAge.'&nbsp;&nbsp;Gender:&nbsp;'.$intGender.'<br>Reg. Date: &nbsp;'.$dtmRegdDateTime.'<br/>';
                    if($row['intServiceId']==1){ 
                        $vchCardName    = !empty($row['vchCardName'])? $row['vchCardName']:'--';
                        $vchRationCardNo    = !empty($row['vchRationCardNo'])? $row['vchRationCardNo']:'--';
                        $intNoFamily    = !empty($row['intNoFamily'])? $row['intNoFamily']:'--';
                        $vchReturnText .='Card Type.: &nbsp;'.$vchCardName.'<br />Ration Card No.: &nbsp;'.$vchRationCardNo.'<br />No of Family Member: &nbsp;'.$intNoFamily.'<br />';
                    }else{
                        $vchTokenNo    = !empty($row['vchTokenNo'])? $row['vchTokenNo']:'--';
                        $dtmPaddyDeposite    = (strtotime($row['dtmPaddyDeposite'])>0)?date("d-M-Y",strtotime($row['dtmPaddyDeposite'])):'---';
                        $vchReturnText .='Token No.: &nbsp;'.$vchTokenNo.'<br />Deposite Date: &nbsp;'.$dtmPaddyDeposite;
                     }
                    $vchReturnText .="</small></td>";
                    $vchReturnText .= !empty($row['intMobile'])?"<td>".$row['intMobile']."</td>":"<td>---</td>";
                    $vchReturnText .= '<td>';
                    $vchReturnText .= '<small><div class="text-muted"><strong>District: </strong>'. $row['vchDistrict'] .'</div></small>';
                    $vchReturnText .= '<small><div class="text-muted"><strong>Block: </strong>'. $row['vachBlock'] .'</div></small>';
                    $vchReturnText .= '<small><div class="text-muted"><strong>GP: </strong>'. $row['vchGPName'] .'</div></small>';
                    $vchReturnText .= '</td>';
                    $vchReturnText .= '<td>';
                    $vchReturnText .= 'Service: '.$row['vchServiceName'];
                    $vchReturnText .= '<small><div class="text-muted"><strong>Scheme: </strong>'. $row['vchSchemeTypeName'] .'</div></small>'.$OtherServicesText;
                    $vchReturnText .= '</td>';
                    // $vchReturnText .= '<td>';
                    // $vchReturnText .= '<small><div class="text-muted"><strong>Reg. Date: </strong>'. date('d-m-Y',strtotime($row['dtmRegdDateTime'])) .'</div></small>';
                    // if($row['intServiceId']==RCMS){
                    //   $vchReturnText .= '<small><div class="text-muted"><strong>Ration Card No.: </strong>'. $row['vchRationCardNo'] .'</div></small>';
                    //   $vchReturnText .= '<small><div class="text-muted"><strong>No of Family Member: </strong>'. $row['intNoFamily'] .'</div></small>';

                    // }else{
                    //   $vchReturnText .= '<small><div class="text-muted"><strong>Token No.: </strong>'. $row['vchTokenNo'] .'</div></small>';
                    //   $vchReturnText .= '<small><div class="text-muted"><strong>Deposite Date: </strong>'. date('d-m-Y',strtotime($row['dtmPaddyDeposite'])) .'</div></small>';
                    // }
                    $vchReturnText .= !empty($row['VCH_FULL_NAME'])?"<td>".$row['VCH_FULL_NAME']."<div><small>Contact No. ".$row['VCH_MOBILE_NO']."</small></div></td>":"<td>---</td>";
                    
                    $vchReturnText .= '<td> <a class="btn  btn-primary btn-sm" href="'.URL.'addfeedback/'.$encOutboundDataId.'"><i class="icon-phone1"></i></a></td>';
                    $vchReturnText .= "</tr>";

                    
                }
                $vchReturnText .= '</tbody></table></div>';


            }else{
                $vchReturnText = '<h4 class="empty-content">No Request</h4>';
            }
            
            
                // $vchReturnText = '<div class="text-center no-content"><h4>No Records Found...</h4></div>';
        // echo $vchReturnText; exit;
        echo json_encode(array('result' => $vchReturnText));
    }

    //------ Get All Inbound function for Blog By::Jaideep Kumar date: 25-Sept-2019
    function getDgInformation(){
        // print_r()
        $outMsg                 = '';
        $errFlag = 0;
        $idata['INT_DESIGNATION_ID']        = DG_DESIGNATION;
        $resData = array();
        $action         = 'R';
        $result     = $this->manageInBound($action, $idata);
         if($result->num_rows > 0){
                $vchReturnText  = '<div class="table-responsive"><table data-toggle="table" class="table table-hover table-bordered"><thead><tr><th width="40px">Sl#</th> <th>Name</th> <th>Mobile No.</th> <th>Services</th> <th>Department</th> <th width="60px">Call</th> </tr></thead><tbody>';
                $i=0;
                while($row = $result->fetch_array()){
                    $vchReturnText .= "<tr>";
                    $vchReturnText .= "<td>".(++$i)."</td>";
                    $vchReturnText .= !empty($row['vchName'])?"<td>".$row['vchName']."</td>":"<td>---</td>";
                    $vchReturnText .= !empty($row['intMobile'])?"<td>".$row['intMobile']."</td>":"<td>---</td>";
                    $vchReturnText .= !empty($row['vchServiceName'])?"<td>".$row['vchServiceName']."</td>":"<td>---</td>";
                    $vchReturnText .= !empty($row['vchShrtDeptName'])?"<td>".$row['vchShrtDeptName']."</td>":"<td>---</td>";
                    $vchReturnText .= '<td> <a class="btn  btn-primary btn-sm" href="'.URL.'addfeedback"><i class="icon-phone1"></i></a></td>';
                    $vchReturnText .= "</tr>";
                }
                $vchReturnText .= '</tbody></table></div>';
            }else{
                $vchReturnText = '<h4 class="empty-content">No Request</h4>';
            }
                // $vchReturnText = '<div class="text-center no-content"><h4>No Records Found...</h4></div>';
        // echo $vchReturnText; exit;
        echo json_encode(array('result' => $vchReturnText));
    }

    //------ Get All Inbound function for Blog By::Jaideep Kumar date: 25-Sept-2019
    function getCsInformation(){
        // print_r()
        $outMsg                 = '';
        $errFlag = 0;
        $idata['INT_DESIGNATION_ID']        = CS_DESIGNATION;
        $resData = array();
        $action         = 'R';
        $result     = $this->manageInBound($action, $idata);
         if($result->num_rows > 0){
                $vchReturnText  = '<div class="table-responsive"><table data-toggle="table" class="table table-hover table-bordered"><thead><tr><th width="40px">Sl#</th> <th>Name</th> <th>Mobile No.</th> <th>Services</th> <th>Department</th> <th width="60px">Call</th> </tr></thead><tbody>';
                $i=0;
                while($row = $result->fetch_array()){
                    $vchReturnText .= "<tr>";
                    $vchReturnText .= "<td>".(++$i)."</td>";
                    $vchReturnText .= !empty($row['vchName'])?"<td>".$row['vchName']."</td>":"<td>---</td>";
                    $vchReturnText .= !empty($row['intMobile'])?"<td>".$row['intMobile']."</td>":"<td>---</td>";
                    $vchReturnText .= !empty($row['vchServiceName'])?"<td>".$row['vchServiceName']."</td>":"<td>---</td>";
                    $vchReturnText .= !empty($row['vchShrtDeptName'])?"<td>".$row['vchShrtDeptName']."</td>":"<td>---</td>";
                    $vchReturnText .= '<td> <a class="btn  btn-primary btn-sm" href="'.URL.'addfeedback"><i class="icon-phone1"></i></a></td>';
                    $vchReturnText .= "</tr>";
                }
                $vchReturnText .= '</tbody></table></div>';
            }else{
                $vchReturnText = '<h4 class="empty-content">No Request</h4>';
            }
                // $vchReturnText = '<div class="text-center no-content"><h4>No Records Found...</h4></div>';
        // echo $vchReturnText; exit;
        echo json_encode(array('result' => $vchReturnText));
    }

    //------ Get All Inbound function for Blog By::Jaideep Kumar date: 25-Sept-2019
    function getItscInformation(){
        // print_r()
        $outMsg                 = '';
        $errFlag = 0;
        $idata['INT_DESIGNATION_ID']        = ITSC_DESIGNATION;
        $resData = array();
        $action         = 'R';
        $result     = $this->manageInBound($action, $idata);
         if($result->num_rows > 0){
                $vchReturnText  = '<div class="table-responsive"><table data-toggle="table" class="table table-hover table-bordered"><thead><tr><th width="40px">Sl#</th> <th>Name</th> <th>Mobile No.</th> <th>Services</th> <th>Department</th> <th width="60px">Call</th> </tr></thead><tbody>';
                $i=0;
                while($row = $result->fetch_array()){
                    $vchReturnText .= "<tr>";
                    $vchReturnText .= "<td>".(++$i)."</td>";
                    $vchReturnText .= !empty($row['vchName'])?"<td>".$row['vchName']."</td>":"<td>---</td>";
                    $vchReturnText .= !empty($row['intMobile'])?"<td>".$row['intMobile']."</td>":"<td>---</td>";
                    $vchReturnText .= !empty($row['vchShrtDeptName'])?"<td>".$row['vchShrtDeptName']."</td>":"<td>---</td>";
                    $vchReturnText .= !empty($row['vchServiceName'])?"<td>".$row['vchServiceName']."</td>":"<td>---</td>";
                    $vchReturnText .= '<td> <a class="btn  btn-primary btn-sm" href="'.URL.'addfeedback"><i class="icon-phone1"></i></a></td>';
                    $vchReturnText .= "</tr>";
                }
                $vchReturnText .= '</tbody></table></div>';
            }else{
                $vchReturnText = '<h4 class="empty-content">No Request</h4>';
            }
                // $vchReturnText = '<div class="text-center no-content"><h4>No Records Found...</h4></div>';
        // echo $vchReturnText; exit;
        echo json_encode(array('result' => $vchReturnText));
    }

    function getAttenedCallsInformation(){
        // print_r()
        $outMsg                 = '';
        $errFlag = 0;
        $idata['INT_DESIGNATION_ID']        = implode(',', DESIGNATION);
        $idata['fromDate']        = !empty($_POST['vchFromDate'])?date('Y-m-d',strtotime($_POST['vchFromDate'])):'';
        $idata['toDate']        = !empty($_POST['vchToDate'])?date('Y-m-d',strtotime($_POST['vchToDate'])):'';

        $resData = array();
        $action         = 'RA';
        $action1         = 'RAC';
        $statusList = FEEDBACK_CALL_STATUS;
        // print_r(FEEDBACK_CALL_STATUS); exit;
        $result     = $this->manageInBound($action, $idata);
        // $result1     = $this->manageInBound($action, $idata);
        // print_r($result1->fetch_array()); exit;
        $totalCalls = 0;
         if($result->num_rows > 0 || $result1->num_rows > 0){
                $totalCalls =$result->num_rows;
                $vchReturnText  = '<div class="table-responsive"><table data-toggle="table" class="table table-hover table-bordered"><thead><tr><th width="40px">Sl#</th> <th>Date</th><th>Name</th> <th>Mobile No.</th><th>Demography Details</th> <th>Service & Scheme</th> <th>Requested By</th> <th idth="60px">Status</th><th width="60px">Feedback</th> </tr></thead><tbody>';
                $i=0;
                while($row = $result->fetch_array()){
                   // print_r($row); exit;

                    $encArry['intOutboundDataId']=$row['intOutboundDataId'];
                    $encArry['requestFrom']='CMB';
                    $encArry['dataType']=$row['dataType'];
                    $encArry['designationId']=$row['INT_DESIGNATION_ID'];
                    $encArry['userId']=$row['INT_USER_ID'];
                    
                    $encOutboundDataId   = $this->encrypt(json_encode($encArry));
                    $dtmAssignedTime    = ($row['dtmAssignedTime'])?date('d-M-Y h:i A',strtotime($row['dtmAssignedTime'])):'--';
                    $dtmRegdDateTime    = (strtotime($row['dtmRegdDateTime'])>0)?date("d-M-Y",strtotime($row['dtmRegdDateTime'])):'--';
                    $intAge    = !empty($row["intAge"])?$row["intAge"]:'--';
                    $intGender    = !empty($row['intGender'])?(($row['intGender'] == 1)?'Male':(($row['intGender'] == 2)?"Female":"Transgender")):'--';
                    $vchReturnText .= "<tr>";
                    $vchReturnText .= "<td>".(++$i)."</td>";
                    $vchReturnText .= !empty($row['dtmCreatedOn'])?"<td>".date('d-M-Y h:i A',strtotime($row['dtmCreatedOn']))."</td>":"<td>---</td>";
                      $vchReturnText .="<td>".$row['vchName'];
                    $vchReturnText .='<br><small style="color: #18766d;">Age:&nbsp;'.$intAge.'&nbsp;&nbsp;Gender:&nbsp;'.$intGender.'<br>Reg. Date: &nbsp;'.$dtmRegdDateTime.'<br/>';
                    if($row['intServiceId']==1){ 
                        $vchCardName    = !empty($row['vchCardName'])? $row['vchCardName']:'--';
                        $vchRationCardNo    = !empty($row['vchRationCardNo'])? $row['vchRationCardNo']:'--';
                        $intNoFamily    = !empty($row['intNoFamily'])? $row['intNoFamily']:'--';
                        $vchReturnText .='Card Type.: &nbsp;'.$vchCardName.'<br />Ration Card No.: &nbsp;'.$vchRationCardNo.'<br />No of Family Member: &nbsp;'.$intNoFamily.'<br />';
                    }else{
                        $vchTokenNo    = !empty($row['vchTokenNo'])? $row['vchTokenNo']:'--';
                        $dtmPaddyDeposite    = (strtotime($row['dtmPaddyDeposite'])>0)?date("d-M-Y",strtotime($row['dtmPaddyDeposite'])):'---';
                        $vchReturnText .='Token No.: &nbsp;'.$vchTokenNo.'<br />Deposite Date: &nbsp;'.$dtmPaddyDeposite;
                     }
                    $vchReturnText .="</small></td>";
                    $vchReturnText .= !empty($row['intMobile'])?"<td>".$row['intMobile']."</td>":"<td>---</td>";
                    // $vchReturnText .= !empty($row['vchDeptName'])?"<td>".$row['vchDeptName']."</td>":"<td>---</td>";
                      $vchReturnText .= '<td>';
                    $vchReturnText .= '<small><div class="text-muted"><strong>District: </strong>'. $row['vchDistrict'] .'</div></small>';
                    $vchReturnText .= '<small><div class="text-muted"><strong>Block: </strong>'. $row['vachBlock'] .'</div></small>';
                    $vchReturnText .= '<small><div class="text-muted"><strong>GP: </strong>'. $row['vchGPName'] .'</div></small>';
                    $vchReturnText .= '</td>';
                    $vchReturnText .= '<td>';
                    $vchReturnText .= 'Service: '.$row['vchServiceName'];
                    $vchReturnText .= '<small><div class="text-muted"><strong>Scheme: </strong>'. $row['vchSchemeTypeName'] .'</div></small>'.$OtherServicesText;
                    $vchReturnText .= '</td>';
                     $vchReturnText .= !empty($row['VCH_FULL_NAME'])?"<td>".$row['VCH_FULL_NAME']."<div><small>Contact No. ".$row['VCH_MOBILE_NO']."</small></div></td>":"<td>---</td>";
                    $vchReturnText .= !empty($statusList[$row['intFeedbackStatus']])?"<td>".$statusList[$row['intFeedbackStatus']]."</td>":"<td>---</td>";
                    // $vchReturnText .= !empty($row['VCH_FULL_NAME'])?"<td>".$row['VCH_FULL_NAME']."</td>":"<td>---</td>";
                    if($row['intRequestStatus']!=4){
                         $vchReturnText .= '<td> <a class="btn  btn-danger btn-sm" href="'.URL.'addfeedback/'.$encOutboundDataId.'" title="Call End"><i class="icon-phone-off1"></i></a></td>';
                    }else{
                        $vchReturnText .= '<td><a class="btn  btn-success btn-sm" href="javascript:void(0)" title="Completed"><i class="icon-check-square1"></i></a></td>';
                    }
                    // $vchReturnText .= !empty($row['VCH_FULL_NAME'])?"<td>".$row['VCH_FULL_NAME']."<div><small>".$row['VCH_DESG_NAME']."</small></div></td>":"<td>---</td>";
                    // $vchReturnText .= '<td> <a class="btn  btn-danger btn-sm" href="'.URL.'addfeedback/'.$encOutboundDataId.'"><i class="icon-phone-off1"></i></a></td>';
                    $vchReturnText .= "</tr>";

                    
                }
                //  while($row1 = $result1->fetch_array()){
                //     // print_r($row); exit;
                //     $encArry['intOutboundDataId']=$row1['intOutboundDataId'];
                //     $encArry['requestFrom']='CMB';
                    
                //     // $encOutboundDataId   = $this->encrypt(json_encode($encArry));

                //     $vchReturnText .= "<tr>";
                //     $vchReturnText .= "<td>".(++$i)."</td>";
                //     $vchReturnText .= !empty($row1['vchName'])?"<td>".$row1['vchName']."</td>":"<td>---</td>";
                //     $vchReturnText .= !empty($row1['intMobile'])?"<td>".$row1['intMobile']."</td>":"<td>---</td>";
                //     $vchReturnText .= !empty($row1['vchServiceName'])?"<td>".$row1['vchServiceName']."</td>":"<td>---</td>";
                //     $vchReturnText .= !empty($row1['vchDeptName'])?"<td>".$row1['vchDeptName']."</td>":"<td>---</td>";
                //     $vchReturnText .= !empty($row1['VCH_FULL_NAME'])?"<td>".$row1['VCH_FULL_NAME']."</td>":"<td>---</td>";
                //     // $vchReturnText .= !empty($row['VCH_FULL_NAME'])?"<td>".$row['VCH_FULL_NAME']."<div><small>".$row['VCH_DESG_NAME']."</small></div></td>":"<td>---</td>";
                //     $vchReturnText .= '<td></td>';
                //     $vchReturnText .= "</tr>";

                    
                // }
                $vchReturnText .= '</tbody></table></div>';


            }else{
                $vchReturnText = '<h4 class="empty-content">No Request</h4>';
            }
            
            
                // $vchReturnText = '<div class="text-center no-content"><h4>No Records Found...</h4></div>';
        // echo $vchReturnText; exit;
        echo json_encode(array('result' => $vchReturnText,'totalCalls'=>$totalCalls));
    }
}// end Class
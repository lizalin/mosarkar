<?php  
$objMod =new Model();
$strPdfcontent ='';

while($row=$result->fetch_array()){
    $RelatedInfo =array();
    $returnText = '';
    if($row['jsonRelatedInfo']){
        $jsonRelatedInfo    = json_decode($row['jsonRelatedInfo'],true);
      if($row['intServiceId'] == RCMS){
        // echo "01/".$jsonRelatedInfo['dtmAllotment'];
            if(strstr($jsonRelatedInfo['dtmAllotment'], '/')){
               $allotDateArr =  explode('/', $jsonRelatedInfo['dtmAllotment']);
                $dtmAllotment = date('Y-m-d',strtotime('01-'.$allotDateArr['0'].'-'.$allotDateArr['1']));
            }else{
              $dtmAllotment = date('Y-m-d',strtotime('01-'.$jsonRelatedInfo['dtmAllotment']));
            } 
            $dtmAllotment = date('M-Y',strtotime($dtmAllotment));
            $returnText .= '<small class="text-info"><strong>Allotment Date: </strong>'.$dtmAllotment.'</small><br><small class="text-info"><strong>Rice in Kg: </strong>'.$jsonRelatedInfo['intRice'].'</small>,<small class="text-info"><strong>Wheat in Kg: </strong>'.$jsonRelatedInfo['intWheat'].'</small>,<small class="text-info"><strong>Kerosene in Ltr: </strong>'.$jsonRelatedInfo['floatKerosene'].'</small>';
      }else{
          $returnText = '';
      }
    }
    // echo $returnText; exit;
$htmlHead = '<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <style type="text/css" media="All">
        body{font-family:sans-serif}
        
  .pdfContainer .certName h3 {width: 35%}
  .pdfContainer .certName h3 {color:#0b4666; border:#0b4666 solid 2px; height:auto; padding:8px 30px; margin-bottom:20px; -webkit-border-radius:20px; -moz-border-radius:20px; border-radius:20px; display: inline-block;width:auto;}
  .mgn-20{margin:0px 10px 0px 20px;}
  .underline{border-bottom:#000 1px solid;}
  .outBorder{border: #0b4666 solid 8px;}
 
  .bdrBox{border: #0b4666 solid 8px; background-color:#fff; position:absolute;  height:20px; width:20px; display:inline-block;}
  .topLeft{top:-3px; left:-3px;}
  .topRight{top:-3px; right:-3px;}
  .btmLeft{bottom:-3px; left:-3px;}
  .btmRight{bottom:-3px; right:-3px;}
  .pdfContainer table tr td {padding: 5px;}
  .pdfContainer table td{font-family:Gotham-Book;font-size:13px;line-height:22px;}
  .pdfContainer .certName h3 {margin: 10px auto;width: auto;color: #0b4666;border: #0b4666 solid 2px;height: auto;padding: 8px 30px;-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;display: block;}
.planTable td{padding:3px!important;}
.planTable1 td{padding:3px!important;line-height:0;}
.list{margin:0px 0px 0px 15px; padding:0px;}
.list li{margin-bottom:8px;line-height:28px;}
.para{line-height:28px; padding:0px; margin:0px; text-align:justify;}
.container table tr td{padding: 5px;}
.table{padding:0px;line-height: 1.22857143;vertical-align: top;width: 100%;max-width: 100%;margin-bottom: 5px;border-collapse: collapse;}
.table-tab{margin-left:20px; margin-bottom: 2px; padding:3px;}
.golden{border-bottom:#d6ac31 2px solid; padding-top:50px;}
#adjHeight{height:100px;}
.pageBreak{page-break-after: always;}
table {
    border-collapse: collapse;
}
table td, .table th {
    border: 1px solid #000000;
}

</style>
</head>';
$htmlBody = '<div id="viewTable" class="box-body table-responsive">
    <div id="divPrint" class="print-area"> 
     <div class="pdfContainer">
            <div class="outBorder2">
                <div class="inBorder2">
               <div style="">
                    <div style="text-align:center; "><img style="width:480px;height: 60px;margin:5px 0px" src="../App/images/logo.gif" border="0" align="absmiddle" alt="Mosarkar" ></div>
                    <h2 style="text-align:center; margin: 10px 10px 13px 0px; font-size: 24px;font-family:san-sarif;border-bottom:1px solid #000;margin-bottom:20px;padding-bottom:10px"> FEEDBACK & ACTION FORM</h2>
                     
                   <div style="text-align:justify;margin-top:10px;margin-bottom:10px;">
                       <h4 style="text-align:left; margin: 10px 10px 5px 0px; font-size: 24px;font-family:sans-serif;"> Citizen Information</h4>                 
                   </div>
                  

                    <div style="text-align:justify;margin-top:10px;">  
                     <table style="border: 1px solid #000000;" width="100%" border="1" cellspacing="2" cellpadding="0" style="font-size:13px;text-align:justify;">                        
                        <tr><td width="20%"> Citizen Name </td>  <td colspan="3">'.$row['vchName'];
                        $htmlBody .='<br><br><small class="text-info"><strong>Gender: </strong>Male, <strong>Age: </strong>47 Years</small><br>';
                    if($row['intServiceId']==RCMS){
                        $htmlBody .='<small class="text-info"><strong>Card Type: </strong>'.$row['vchCardName'].'</small>,<small class="text-info"><strong>Ration Card No.: </strong>'.$row['vchRationCardNo'].'</small>,<small class="text-info"><strong>No of Family Member: </strong>'.$row['intNoFamily'].'</small></td></tr>';
                      }else{
                        $htmlBody .='<small class="text-info"><strong>Token No.: </strong>'.$row['vchTokenNo'].'</small>,<small class="text-info"><strong>Deposite Date: </strong>'.date('d-m-Y',strtotime($row['dtmPaddyDeposite'])).'</small></td></tr>';
                      }
                      $htmlBody .='<tr><td width="20%"> Mobile Number </td> <td colspan="3">'.$row['intMobile'].'</td></tr>
                            
                        <tr><td> Address</td>  <td colspan="3">'.$row['DistrictName'].', '.$row['BlockName'].', '.$row['BlockName'].', '.$row['VillageName'].'</td></tr>
                        <tr><td> Service </td>  <td>'.$row['vchServiceName'].'</td><td> Scheme </td>  <td>'.$row['vchSchemeTypeName'].'</td></tr>'; 
    //$htmlBody .= '<tr><td> Other Info. </td><td><small><strong>Card Type: </strong>'.$row['vchCardName'].'</small><br/><small><strong>Ration Card No.: </strong>'.$row['vchRationCardNo'].'</small><br/><small><strong>No of Family Member: </strong>'.$row['intNoFamily'].'</small></td></tr>';
  // }else{
  //   $htmlBody .= '<tr><td> Other Info. </td><td><small><strong>Token No.: </strong>'.$row['vchTokenNo'].'</small><br /><small><strong>Deposite Date: </strong>'.date('d-m-Y',strtotime($row['dtmPaddyDeposite'])).'</small></td></tr>';
  // }

                              // $dataType='Department';
                        // if($row['dataType']==1){  
                        // }else{ $dataType='Contact Center';
                        // }
                        // $htmlBody .= '<tr><td> Source </td>  <td>'.$dataType.'</td></tr> ';

            

           // if($row['intDepartmentId']==14){ 
                        
           //              $htmlBody .= '<tr><td> Service </td>  <td>'.$row['vchServiceName'].'</td></tr> ';
           //              $jsonRelatedInfo =$row['jsonRelatedInfo'];
           //              if(!empty($jsonRelatedInfo)){
           //                          $RelatedInfo = (array)json_decode($jsonRelatedInfo);
           //                         // print_r($RelatedInfo);exit;
                                   
           //              }
           //              if($row['intServiceId']==4){ 
           //                  $firnumber = (empty($RelatedInfo['FIR_NUM']))?'--':$RelatedInfo['FIR_NUM'];
           //                  $sectionname = (empty($RelatedInfo['SECTION']))?'--':$RelatedInfo['SECTION'];;
                            
           //                  $htmlBody .= '<tr><td> FIR Number </td>  <td>'.$firnumber.'</td></tr> ';
           //                  $htmlBody .= '<tr><td> Section </td>  <td>'.$sectionname.'</td></tr> ';
           //                  $vchRegdNo = (empty($row['vchRegdNo']))?'--':$row['vchRegdNo'];
           //                  //$htmlBody .= '<tr><td> Request Number </td>  <td>'.$vchRegdNo.'</td></tr> '; 
           //              }
           //              if($row['intServiceId']==5){ 
           //                  $vchRegdNo = (empty($row['vchRegdNo']))?'--':$row['vchRegdNo'];
           //                  $htmlBody .= '<tr><td> Request Number </td>  <td>'.$vchRegdNo.'</td></tr> ';                                        
           //              }
           //              if($row['intServiceId']==6){ 
           //                  $vchRegdNo = (empty($row['vchRegdNo']))?'--':$row['vchRegdNo'];
           //                  $htmlBody .= '<tr><td> Request Number </td>  <td>'.$vchRegdNo.'</td></tr> ';                                        
           //              }


           //              $htmlBody .= '<tr><td> Police Station </td> <td>'.$row['hospitalPolice'].'</td></tr> ';
           //             }
           // if($row['intDepartmentId']==12){ 
           //              $htmlBody .= '<tr><td> Service </td>  <td>'.$row['vchServiceName'].'</td></tr> ';
           //              $htmlBody .= '<tr><td> Hospital </td> <td>'.$row['hospitalPolice'].'</td></tr> ';
           //             }
           if(strtotime($row['dtmRegdDateTime'])>0){ 
                        $htmlBodyTdval = date("d-M-Y",strtotime($row['dtmRegdDateTime']));
                                  }
                                  else{
                        $htmlBodyTdval = '--';              
                                  }
             if($row['intServiceId']==5){ 
                                  $htmlBodyTdlbl = 'Request Date';
             }
             else {
                                  $htmlBodyTdlbl = 'Date of Service Taken';
             }

                        $htmlBody .= '<tr><td> '.$htmlBodyTdlbl.' </td>  <td colspan="3">'.$htmlBodyTdval.'</td></tr>';
                        $htmlBody .= '<tr><td>Other Info.</td><td colspan="3">'.$returnText.'</td></tr>';

             $htmlBody .= '  </table>                        
                   </div> 
                   

                   <div style="text-align:justify;margin-top:5px;margin-bottom:5px;">
                       <h4 style="text-align:left; margin: 10px 10px 5px 0px; font-size: 24px;"> Citizen Feedback</h4>                 
                   </div>
                   

                    <div style="text-align:justify;margin-top:15px;">  
                     <table width="100%" border="1" cellspacing="2" cellpadding="0" style="font-size:13px;text-align:justify;">                        
                        <tr> <td style="height:80px;"></td></tr>
                                            
                    </table>                        
                   </div> 
                   
                    <div style="text-align:justify;margin-top:10px;margin-bottom:5px;">
                       <h4 style="text-align:left; margin: 5px 10px 5px 0px; font-size: 24px;"> Action Taken</h4>      

                   </div>
                   

                    <div style="text-align:justify;margin-top:15px;">  
                     <table width="100%" border="1" cellspacing="2" cellpadding="0" style="font-size:13px;text-align:justify;">                        
                        <tr> <td style="height:80px;"></td></tr>
                                            
                    </table>                        
                   </div> 





  

                    <div style="margin-bottom:5px;margin-top:5px;line-height:22px;text-align:center;text-align:right;margin-top:100px;page-break-after: always;">
                                       
                       
                       <p style="margin:0px;"><strong>'.$_SESSION['adminConsole_Desg'].'</strong></p>
                       <p style="margin:0px;margin-top:5px;"> Date : '.date('d-M-Y').'</p>
                                            
                   
                    </div>


                  ';
    $htmlFooter = '</body></html>';
    $strPdfcontent .= $htmlHead . $htmlBody . $htmlFooter;
    //echo  $strPdfcontent;
}


$objMod->generatePdfP($strPdfcontent,DOC_SERVER_UPLOAD_PATH,$fileName); 

 ?>                               

 
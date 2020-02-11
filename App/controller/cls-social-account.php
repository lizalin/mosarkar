<?php
/* * ****Class to manage account ********************
  '	By	 	 : Sukanta Kumar Mishra	'
  '	On	 	 : 04-Nov-2016          '
  ' Procedure Used       : USP_SOCIAL_ACCOUNT           '
 * ************************************************** */
//require_once('twitteroauth-master/autoload.php');
//require_once 'facebook-master/src/Facebook/autoload.php';
//use Abraham\TwitterOAuth\TwitterOAuth;
class clsSocialAccount extends model {

    // manage account
    public function manageAccount($action, $accountId, $accountType, $accountName, $screenName, $userName, $accessToken,$accessTokenSecret,$createdBy,$userPhoto,$displayStatus,$replyStatus,$authQry) {
        $sql        = "CALL USP_MS_SOCIAL_ACCOUNT('$action', '$accountId', '$accountType', '$accountName', '$screenName', '$userName', '$accessToken','$accessTokenSecret','$createdBy','$userPhoto',$displayStatus,$replyStatus,'$authQry');";
       //echo '<br /><br /><br /><br /><br /><br />'.$sql;//exit;
        //exit;
        $result     = Model::executeQry($sql);
        return $result;
    }

    // generate Twitter Request Token
    public function generateRequestToken() {
               
	$_SESSION['account_name']		= $_POST['txtName'];
 //echo "<pre>";print_r($_REQUEST);exit;
	//TWITTER APP KEYS
	$consumer_key 		= STPI_CONSUMER_KEY;
	$consumer_secret 	= STPI_CONSUMER_SECRET;
       //echo $consumer_key."====";exit;
	//CONNECTION TO THE TWITTER APP TO ASK FOR A REQUEST TOKEN
	$connection 		= new TwitterOAuth($consumer_key, $consumer_secret);
        $connection->setTimeouts(1000, 1000);
	$request_token 		= $connection->oauth("oauth/request_token", array("oauth_callback" => URL.'authenticate'));
	
      
       //callback is set to where the rest of the script is
         
	//TAKING THE OAUTH TOKEN AND THE TOKEN SECRET AND PUTTING THEM IN COOKIES (NEEDED IN THE NEXT SCRIPT)
	$oauth_token		= $request_token['oauth_token'];
	$token_secret		= $request_token['oauth_token_secret'];
        //echo $oauth_token."---";exit;

	$_SESSION['request_token']		= $oauth_token;
	$_SESSION['request_token_secret']	= $token_secret;
       //echo '<pre>';print_r($_SESSION);echo '</pre>';exit;

	//GETTING THE URL FOR ASKING TWITTER TO AUTHORIZE THE APP WITH THE OAUTH TOKEN
	$url = $connection->url("oauth/authorize", array("oauth_token" => $oauth_token,'force_login'=>true));

	//REDIRECTING TO THE URL
	//header('Location: ' . $url);
	$_SESSION['twitter_url']		= $url; 
	echo '<script>window.open("'.URL.'authenticate", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=400");</script>';
    }
    
     public function generateRequestTokenATA() {
               
	$_SESSION['account_name']		= $_POST['txtName'];
            //echo "<pre>";print_r($_REQUEST);exit;
	//TWITTER APP KEYS
	$consumer_key 		= STPI_CONSUMER_KEY ;
	$consumer_secret 	= STPI_CONSUMER_SECRET;
       //echo $consumer_key."====";exit;
	//CONNECTION TO THE TWITTER APP TO ASK FOR A REQUEST TOKEN
        try{
	$connection 		= new TwitterOAuth($consumer_key, $consumer_secret);
        $connection->setTimeouts(1000, 1000);
	$request_token 		= $connection->oauth("oauth/request_token", array("oauth_callback" => URL.'authenticate-responsive'));
	//callback is set to where the rest of the script is
         
	//TAKING THE OAUTH TOKEN AND THE TOKEN SECRET AND PUTTING THEM IN COOKIES (NEEDED IN THE NEXT SCRIPT)
	$oauth_token		= $request_token['oauth_token'];
	$token_secret		= $request_token['oauth_token_secret'];

        }catch(Exception $e){
            echo $e->getMessage();
        }
	$_SESSION['request_token']		= $oauth_token;
	$_SESSION['request_token_secret']	= $token_secret;
       // echo '<pre>';print_r($_SESSION);echo '</pre>';exit;

	//GETTING THE URL FOR ASKING TWITTER TO AUTHORIZE THE APP WITH THE OAUTH TOKEN
	$url = $connection->url("oauth/authorize", array("oauth_token" => $oauth_token,'force_login'=>true));

	//REDIRECTING TO THE URL
	//header('Location: ' . $url);
	$_SESSION['twitter_url']		= $url; 
	echo '<script>window.open("'.URL.'authenticate-responsive", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=400");</script>';
    }
    
    // generate Twitter Access Token
    public function generateAccessToken($oauth_verifier,$req_oauth_token) {
        //echo '<pre>';print_r($_SESSION);echo '</pre>';exit;

        //echo $oauth_verifier.'<br />'.$req_oauth_token.'<br />'.$_SESSION['request_token'].'<br />'.$_SESSION['request_token_secret'];
        $outMsg         = '';
        $userId         = ($_SESSION['adminConsole_userID']!='')?$_SESSION['adminConsole_userID']:1;
        $errFlag        = 0;

        $txtName        = $_SESSION['account_name'];

	//TWITTER APP KEYS
	$consumer_key 		= STPI_CONSUMER_KEY;
	$consumer_secret 	= STPI_CONSUMER_SECRET;

	//GETTING ALL THE TOKEN NEEDED
	$oauth_verifier = $oauth_verifier;
	$token_secret = $_SESSION['request_token_secret'];
	$oauth_token = $_SESSION['request_token'];

	//EXCHANGING THE TOKENS FOR OAUTH TOKEN AND TOKEN SECRET
	$connection = new TwitterOAuth($consumer_key, $consumer_secret, $oauth_token, $token_secret);
        $connection->setTimeouts(1000, 1000);
	$access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $oauth_verifier));

	$accessToken=$access_token['oauth_token'];
	$accessTokenSecret=$access_token['oauth_token_secret'];
        

        $twConnection = new TwitterOAuth($consumer_key, $consumer_secret, $accessToken, $accessTokenSecret);
        $twConnection->setTimeouts(1000, 1000);
	$credentials = $twConnection->get('account/verify_credentials');
	$screenName = $credentials->name;
	$userName = $credentials->screen_name;
        $userPhoto = $credentials->profile_image_url;
        
        $log   = 0;
        if ($_SESSION['authenticated_acc'] != '' && ('@'.$userName != $_SESSION['authenticated_acc']))
        {
            $log   = 1;$count = 1;            
        }
        
        if($log == 0){
            $countResult = $this->manageAccount('C', 0, 'Twitter', '', '', $userName, '','',0,0,0,0,'');
            $row = $countResult->fetch_array();
            $count = $row['TOTAL'];
            if($count==0){
                    $result = $this->manageAccount('A', 0, 'Twitter', $txtName, $screenName, $userName, $accessToken,$accessTokenSecret,$userId,$userPhoto,0,0,'');
                    $outMsg     = 'Account Added successfully ';
            }else{
                    $outMsg     = 'Account Already Exist ';
            }
        }else{
            $outMsg     = 'This authorization is not valid for <b>'.$_SESSION['authenticated_acc'].'</b>';
        }
        
        $arrResult      = array('msg' => $outMsg,'twCount'=>$count);
        return $arrResult;
    }
    
    // Facebook Configuration
    public function facebookConfiguration() {
        $fb = new Facebook\Facebook([
        'app_id' => STPI_FB_APP_ID, 
        'app_secret' => STPI_FB_APP_ID_SECRET
        ]);
//         $fb = new Facebook\Facebook([
//        'app_id' => '1749734578581994',
//            'app_secret' => '308889f8aee12f0b31ab3e13a815d494'
//        ]);
        
        $helper = $fb->getRedirectLoginHelper();
        //$permissions = ['email','publish_actions','pages_show_list','manage_pages','publish_pages','user_posts']; 
        $permissions = ['email','publish_actions','pages_show_list','manage_pages','publish_pages','user_posts','user_photos','ads_management','read_insights']; 
        //$permissions = ['pages_show_list','manage_pages','publish_pages']; 
        
        $loginUrl = $helper->getLoginUrl(URL.'fb-authenticate.php', $permissions)."&auth_type=reauthenticate";
        //$loginUrl = $helper->getLoginUrl(URL.'fb-authenticate', $permissions);
        $_SESSION['facebook_url']		= $loginUrl; 
	echo '<script>window.open("'.URL.'fb-authenticate", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=1000,height=500");</script>';
    }
    
    public function facebookConfigurationATA() {
        $fb = new Facebook\Facebook([
        'app_id' => STPI_FB_APP_ID, 
        'app_secret' => STPI_FB_APP_ID_SECRET
        ]);
        
        $helper         = $fb->getRedirectLoginHelper(); 
        $permissions    = ['email','publish_actions','pages_show_list','manage_pages','publish_pages','user_posts','user_photos','ads_management','read_insights'];                 
        $loginUrl       = $helper->getLoginUrl(URL.'fb-authenticate-responsive.php', $permissions)."&auth_type=reauthenticate";
        $_SESSION['facebook_url']		= $loginUrl; 
	echo '<script>window.open("'.URL.'fb-authenticate-responsive", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=1000,height=500");</script>';
    }
    
    // Facebook Configuration
    public function generateFBAccessToken() {
        
        $userId         = ($_SESSION['adminConsole_userID']!='')?$_SESSION['adminConsole_userID']:1;
        $userName       = $_SESSION['fbUserId'];
        $screenName     = $_SESSION['fbUserName'];
        $userPhoto      = $_SESSION['fbPictureUrl'];
        $accessToken    = $_SESSION['fbAccessToken'];
        $txtName        = '';
        $findLog        = 0;
        //echo '<pre>';print_r($_SESSION);echo '</pre>';exit;
        if($_SESSION['authenticated_acc'] != ''){
            $findLog        = 1;
            if($_SESSION['pageObjects'] != ''){                
                foreach($_SESSION['pageObjects'] as $pages){
                    $pagesArr    = explode('~:~', $pages);
                    if ($pagesArr[1] == $_SESSION['authenticated_acc']){                        
                        $findLog        = 0;
                    }
                }
                if($findLog > 0){
                    $outMsg     = 'This authorization is not valid for <b>'.$_SESSION['authenticated_acc'].'</b>';
                }
            }else{
                $outMsg     = 'This authorization is not having any pages ';
            }
        }
        
        if($findLog == 0){
            $result         = $this->manageAccount('A', 0, 'Facebook', $txtName, $screenName, $userName, $accessToken,$accessTokenSecret,$userId,$userPhoto,0,0,$authQry);        
            if($_SESSION['pageObjects'] != ''){
                $authQry = '';
                foreach($_SESSION['pageObjects'] as $pages){
                    $pagesArr    = explode('~:~', $pages);
                    $txtName     = "FB Page";
                    //$authQry	.= '("Facebook","FB Page","'.$pagesArr[0].'","'.$pagesArr[1].'","'.$pagesArr[2].'",'.$userId.'),';
                    $result      = $this->manageAccount('A', 0, 'Facebook', "FB Page", $pagesArr[1], $pagesArr[0], $pagesArr[2],'',$userId,'',0,0,'');                    
                }
                //$authQry	 = substr($authQry,0,-1);
            }
            $outMsg     = 'Account Added successfully ';
        }
        //echo $outMsg;exit;
        
        /*echo $userName."</br>";
        echo $authQry;exit;
        $countResult = $this->manageAccount('C', 0, 'Facebook', '', '', $userName, '','',0,0,0,0,'');
        $row = $countResult->fetch_array();
        $count = $row['TOTAL'];
            $count = 0;
             
            if($count==0){
    		$result         = $this->manageAccount('A', 0, 'Facebook', $txtName, $screenName, $userName, $accessToken,$accessTokenSecret,$userId,$userPhoto,0,0,$authQry);
                    $outMsg     = 'Account Added successfully ';
            }else{
            	$outMsg     = 'Account Already Exist ';
            }*/
       
        $arrResult      = array('msg' => $outMsg,'findLog'=>$findLog);
        return $arrResult;
    }
    
    // delete account
    public function deleteAccount($action, $ID) {
        $intID          = explode(',', $ID);
        $success        = 0;
        $fail           = '';
        for ($i = 0; $i < count($intID); $i++) {
            $indvidualID    = $intID[$i];
            $result         = $this->manageAccount('D', $indvidualID, '', '', '', '', '','',0,0,0,0,'');
        }
        $outMsg = 'Record(s) Deleted Successfully.';
        
        return $outMsg;
    }
    // change status
    public function changeStatus($action, $ID) {
        $intID          = explode(',', $ID);
        $success        = 0;
        $fail           = '';
        for ($i = 0; $i < count($intID); $i++) {
            $indvidualID    = $intID[$i];
            $result         = $this->manageAccount($action, $indvidualID, '', '', '', '', '','',0,0,0,0,'');
        }
        
        $outMsg = 'Status Updated Successfully.';
        
        return $outMsg;
    }
    
    // check 
    public function publishPost($action,$grvToken,$userId) {
        $countResult = $this->manageAccount($action,0,$grvToken,$userId,'','','','',0,0,0,0,'');
        return $countResult;
    }
}

<?php
if(!session_id()){
    session_start();
}

// Include the autoloader provided in the SDK V.9
require_once('sdk/src/Facebook/autoload.php');

// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

/*
 * Configuration and setup Facebook SDK
 */
$appId         = '1223348801109118'; //Facebook App ID
$appSecret     = '6c977db0c731ef60a6aeb9971331eba9'; //Facebook App Secret
$redirectURL   = 'http://localhost/dashboard/CopyCat_fb/'; //Callback URL
$fbPermissions = array('publish_actions'); //Facebook permission

//creating class
$fb = new Facebook(array(
    'app_id' => $appId,
    'app_secret' => $appSecret,
    'default_graph_version' => 'v2.4',
));

// Get redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Try to get access token
try {
    if(isset($_SESSION['facebook_access_token'])){
        $accessToken = $_SESSION['facebook_access_token'];
    }else{
        $accessToken = $helper->getAccessToken();
    }
} catch(FacebookResponseException $e) {
     echo 'Graph returned an error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
}
?>

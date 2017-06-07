<?php

//Include FB config file
require_once 'fbConfig.php';
include 'conv_img.php';

use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;
use Facebook\FacebookSession;
$message=$_POST['message'];
//echo $message;
if(isset($message)){
   $img = new TextToImage;
   //$path="C:\Users\Ricky\Pictures";
   $img->createImage($message);
   $filename=rand(100,99999);
   $img->saveAsPng($filename,'image/');
   $pth=$filename.'.png';
   $FILE_PATH='http://localhost/dashboard/CopyCat_fb/image/'.$pth;
   //$file_path= realpath($FILE_PATH);
   echo $FILE_PATH;
   if(isset($accessToken)){
      if(isset($_SESSION['facebook_access_token'])){
         $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
      }
	  else{
        // Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;

        // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
     $session = new FacebookSession($accessToken);
      $session = FacebookSession::newAppSession();

    try{
      $response = (new FacebookRequest(
      $session, 'POST', '/me/photos', array(
      'source' => new CURLFile($FILE_PATH, 'image/png'),
      'message' => 'User provided message'
    )
   ))->execute()->getGraphObject();
  echo "Posted with id: " . $response->getProperty('id');

  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }
 }

else{
    //Get FB login URL
    $fbLoginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);

    //Redirect to FB login
    header("Location:".$fbLoginURL);
}
}
else{
    //Get FB login URL
    $fbLoginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);

    //Redirect to FB login
    header("Location:".$fbLoginURL);
	echo "Please Write Your Favourite Quote";
}

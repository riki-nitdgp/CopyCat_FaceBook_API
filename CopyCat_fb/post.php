<?php

//Include FB config file
require_once 'fbConfig.php';
include 'conv_img.php';
use Facebook\FileUpload\FacebookFile;

$message=$_POST['message'];
//echo $message;
if(isset($message)){
   $img = new TextToImage;

   $img->createImage($message);
   // file name
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

    $myFileToUpload = new FacebookFile($FILE_PATH);

    $attachment = array(
      'source' => $fb->fileToUpload($FILE_PATH),
    );

    try{
        //Post to Facebook
        $fb->post('/me/photos', $attachment);

        //Display post submission status
        echo 'The post was submitted successfully to Facebook timeline.';
    }catch(FacebookResponseException $e){
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    }catch(FacebookSDKException $e){
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
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

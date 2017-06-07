# Facebook API
Facebook API to Convert Any Your Favorite  Quote In Image And Post In On Your FB Wall

# Setup
*  Login to Facebook
* Developer Account link: https://developers.facebook.com
* Create new Facebook app
* Choose Platform (Web, Android, IOS etc)
* Choose a Name
* Follow "Quick Start" Steps
* App ID
* Protect your App Secret
* Contact Email
* App Details
* Disable Development Mode
* Install XAMMP Server link:https://www.apachefriends.org/download.html
* Create a Ditectory C://Xammp/dashboard/CopyCat_fb.
* And Copy all the file to CopyCat_fb.


# File Structure

![screenshot 15](https://user-images.githubusercontent.com/17308141/26863960-71e75090-4b0a-11e7-88ea-8860c40a709c.png)

# Description

## SDK

It contains all the necessary file required for creating facebook API Download link: https://codeload.github.com/facebook/php-graph-sdk/zip/5.0.0

## Facebook API Configuration (fbConfig.php)

The fbConfig.php file is used to configure Facebook SDK and connect to Facebook Graph API. Specify your Facebook App ID ($appId), App Secret ($appSecret), Callback URL ($redirectURL), and Permissions ($fbPermissions) to connect with Facebook API and working with SDK.

Note that: The access token must have the publish_actions permission to post on Facebook wall.

## Converting String Image (image_conv.php)

The inmage_conv.php file is used to convert any string to an image, In includes utliti function for save image as jpg or png .

# Posting To Facebook (post.php)

Include the fbConfig.php file to connect Facebook API and get the access token.

If FB access token ($accessToken) is available, the following will happen.

* Access token will be stored in the session that will be used for next time API calls.
* The page include image_conv.php, at first String will be converted to image and store  in a image directory by calling function
* Picture will be submitted to Facebook wall.
* Post submission status will be shown.
* If FB access token ($accessToken) is not available, the Facebook Login URL will be generated and the user would be redirected to the   FB login page.

# Result 

![screenshot 16](https://user-images.githubusercontent.com/17308141/26864936-65543dca-4b0f-11e7-8219-0e605e28ecb1.png)
![screenshot 17](https://user-images.githubusercontent.com/17308141/26864935-6553550e-4b0f-11e7-8957-395c3cdafae0.png)
![screenshot 18](https://user-images.githubusercontent.com/17308141/26864938-65578a66-4b0f-11e7-9448-c734c9ab7772.png)
![screenshot 19](https://user-images.githubusercontent.com/17308141/26864937-65579cfe-4b0f-11e7-896e-ac7a6f278269.png)




<?php
//include TextToImage class
require_once 'image_conv.php';

//create img object
$img = new TextToImage;

//create image from text
$text = 'Riki Mondal2';
$path="C:\Users\Ricky\Pictures";
$img->createImage($text);
//$img->showImage();
$img->saveAsPng($text,'image/');
?>

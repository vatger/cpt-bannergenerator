<?php
require_once("dbinterface.php");

//get & check the _GET params
$params_valid = true;
$background_image_id = urldecode($_GET["bg"]);
if(intval($background_image_id) == 0)
    $params_valid = false;
if (!$params_valid)
    die("Wrong params");

//load the background
$imagecontent = getBackgoundImageContent($background_image_id);
if ($imagecontent == false)
    die("No background image data");
try {
    $im_background = imagecreatefromstring($imagecontent["content"]);
} catch (\Throwable $th) {
    die("Failed to load background image");
}
//set the header type to img
header("Content-type: image/png");
header("Cache-Control: max-age=" . (60 * 60));
//done return the image
imagepng($im_background);
imagedestroy($im_background);

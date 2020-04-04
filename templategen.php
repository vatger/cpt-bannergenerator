<?php
require_once("dbinterface.php");

//get & check the _GET params
$params_valid = true;
$template_id = urldecode($_GET["tp"]);
if (intval($template_id) == 0)
    $params_valid = false;
if (!$params_valid)
    die("Wrong params");

//get & check & check compatibility the background_image
$template = getTemplateNoChecks($template_id);
if ($template == false)
    die("Template not found or not compatible");

//get the associated textlines and the logo data
//      replace the $xyz parts with the data
$textlines = getTextlines($template_id);
if ($textlines == false)
    die("No textlines avail");

//create the image, load the colores, load the fonts
$im = imagecreatetruecolor(1280, 720);
imagefilledrectangle($im, 0, 0, 1280, 720 - 155, imagecolorallocate($im, 100, 100, 100));
$colordatas = getAllColors();
if ($colordatas == false)
    die("No colors avail");
$colors = array();
foreach ($colordatas as $colordata) {
    $colors[$colordata["id"]] = imagecolorallocate($im, intval($colordata["R"]), intval($colordata["G"]), intval($colordata["B"]));
}
$fontdatas = getAllFonts();
if ($fontdatas == false)
    die("No fonts avail");
$fonts = array();
foreach ($fontdatas as $fontdata) {
    $fonts[$fontdata["id"]] = realpath($fontdata["ressource"]);
}

//the colorbar
imagefilledrectangle($im, 0, 720 - 155, 1280, 720, $colors[$template["rectangle_id_color"]]);

//loop over all textlines and place them in the image
foreach ($textlines as $textline) {
    ImageTTFText($im, intval($textline["fontsize"]),  intval($textline["rotation"]),  intval($textline["position_x"]),  intval($textline["position_y"]), $colors[$textline["id_color"]], $fonts[$textline["id_font"]], $textline["text"]);
}

//place the logo on the image
$im_logo = imagecreatefrompng($template["logo_ressource"]);
imagecopymerge($im, $im_logo, intval($template["logo_x"]), intval($template["logo_y"]), 0, 0, imagesx($im_logo), imagesy($im_logo), 100);

//make image smaller
$im = imagescale($im, 300);

//set the header type to img
header("Content-type: image/png");
header("Cache-Control: max-age=" . (60 * 60));

//done return the image
imagepng($im);
imagedestroy($im);
imagedestroy($im_logo);

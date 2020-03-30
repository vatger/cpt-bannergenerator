<?php
//test 
echo "version 2251";
echo "<br><br>";

require_once("dbinterface.php");
//set the header type to img
//header("Type: image/png");
//get & check the _GET params
$background_image_id = "1";
$template_id = "1";
$traineename = "trainee1";
$time = "19002000";

//get & check the banner template from db
$backgoundImageAttributes = getBackgoundImageAttributes($background_image_id);
if ($backgoundImageAttributes == false)
    die("Background image not found");

getBackgoundImageContent($background_image_id); //...


//get & check & check compatibility the background_image
$template = getTemplate($background_image_id, $template_id);
if ($template == false)
    die("Template not found or not compatible");

//get the associated textlines and the logo data
//      replace the $xyz parts with the data
$textlines = getTextlines($template_id);
if ($textlines == false)
    die("");
foreach ($textlines as $textline) {
    $textline["text"] = str_replace("\$traineename", $traineename, $textline["text"]);
    $textline["text"] = str_replace("\$callsign", $callsign, $textline["text"]);
    $textline["text"] = str_replace("\$timestarthours", substr($time, 0, 2), $textline["text"]);
    $textline["text"] = str_replace("\$timestartminutes", substr($time, 2, 2), $textline["text"]);
    //...
}

//create the image, load the colores, load the fonts
$im = imagecreatetruecolor(1280, 720);
$colordatas = getAllColores();
if ($colordatas == false)
    die("");
$colors = array();
foreach ($colordatas as $colordata) {
    $colors[$colordata["id"]] = imagecolorallocate($im, $colordata["R"], $colordata["G"], $colordata["B"]);
}
$fontdatas = getAllFonts();
if ($fontdatas == false)
    die("");
$fonts = array();
foreach ($fontdatas as $fontdata) {
    $fonts[$fontdata["id"]] = realpath($fontdata["ressource"]);
}

//place the background and the colorbar
//TODO
imagefilledrectangle($im, 0, 720 - 155, 1280, 720, $colors[$template["rectangle_id_color"]]);

//loop over all textlines and place them in the image
foreach ($textlines as $textline) {
    ImageTTFText($im, $textline["fontsize"], $textline["rotation"], $textline["position_x"], $textline["position_y"], $colors[$textline["id_color"]], $fonts[$textline["id_font"]], $textline["text"]);
}

//place the logo on the image



//done return the image
imagepng($im);
imagedestroy($im);

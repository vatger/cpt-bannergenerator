<?php


require_once("dbinterface.php");

//get & check the _GET params
$params_valid = true;
$background_image_id = urldecode($_GET["bg"]);
if(intval($background_image_id) == 0)
    $params_valid = false;
$template_id = urldecode($_GET["tp"]);
if(intval($template_id) == 0)
    $params_valid = false;
$traineename = urldecode($_GET["tn"]);
$traineename = urldecode($_GET["tn"]);
$stationcallsign = urldecode($_GET["sc"]);
$stationname = urldecode($_GET["sn"]);
$date = urldecode($_GET["dt"]);
$timestart = urldecode($_GET["ts"]);
if(intval($timestart) == 0)
    $params_valid = false;
$timeend = urldecode($_GET["te"]);
if(intval($timeend) == 0)
    $params_valid = false;
if (!$params_valid)
    die("Wrong params");

//get & check the banner template from db
$backgoundImageAttributes = getBackgoundImageAttributes($background_image_id);
if ($backgoundImageAttributes == false)
    die("Background image attribs not found");

getBackgoundImageContent($background_image_id); //...


//get & check & check compatibility the background_image
$template = getTemplate($background_image_id, $template_id);
if ($template == false)
    die("Template not found or not compatible");

//get the associated textlines and the logo data
//      replace the $xyz parts with the data
$textlines = getTextlines($template_id);
if ($textlines == false)
    die("No textlines avail");

for ($i = 0; $i < sizeof($textlines); $i++) {
    $textlines[$i]["text"] = str_replace("\$traineename", $traineename, $textlines[$i]["text"]);
    $textlines[$i]["text"] = str_replace("\$stationcallsign", $stationcallsign, $textlines[$i]["text"]);
    $textlines[$i]["text"] = str_replace("\$stationname", $stationname, $textlines[$i]["text"]);
    $textlines[$i]["text"] = str_replace("\$stationtype", substr($stationcallsign, sizeof($stationcallsign) - 3, 3), $textlines[$i]["text"]);
    $textlines[$i]["text"] = str_replace("\$date", $date, $textlines[$i]["text"]);
    $textlines[$i]["text"] = str_replace("\$timestarthours", substr($timestart, 0, 2), $textlines[$i]["text"]);
    $textlines[$i]["text"] = str_replace("\$timestartminutes", substr($timestart, 2, 2), $textlines[$i]["text"]);
    $textlines[$i]["text"] = str_replace("\$timestartfull", $timestart, $textlines[$i]["text"]);
    $textlines[$i]["text"] = str_replace("\$timeendhours", substr($timeend, 0, 2), $textlines[$i]["text"]);
    $textlines[$i]["text"] = str_replace("\$timeendminutes", substr($timeend, 2, 2), $textlines[$i]["text"]);
    $textlines[$i]["text"] = str_replace("\$timeendfull", $timeend, $textlines[$i]["text"]);
    //...
}

//create the image, load the colores, load the fonts
$im = imagecreatetruecolor(1280, 720);
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

//place the background and the colorbar
$imagecontent = getBackgoundImageContent($background_image_id);
if ($imagecontent == false)
    die("No background image data");
try {
    $im_background = imagecreatefromstring($imagecontent["content"]);
} catch (\Throwable $th) {
    die("Failed to load background image");
}
imagecopymerge($im, $im_background, 0, 0, 0, 0, 1280, 720 - 155, 100);
imagefilledrectangle($im, 0, 720 - 155, 1280, 720, $colors[$template["rectangle_id_color"]]);

//loop over all textlines and place them in the image
foreach ($textlines as $textline) {
    ImageTTFText($im, intval($textline["fontsize"]),  intval($textline["rotation"]),  intval($textline["position_x"]),  intval($textline["position_y"]), $colors[$textline["id_color"]], $fonts[$textline["id_font"]], $textline["text"]);
}

//place the logo on the image
$im_logo = imagecreatefrompng($template["logo_ressource"]);
imagecopymerge($im, $im_logo, intval($template["logo_x"]), intval($template["logo_y"]), 0, 0, imagesx($im_logo), imagesy($im_logo), 100);

//set the header type to img
header("Content-type: image/png");

//done return the image
imagepng($im);
imagedestroy($im);
imagedestroy($im_background);
imagedestroy($im_logo);

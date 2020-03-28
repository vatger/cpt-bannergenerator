<?php
require_once("dbinterface.php");
//set the header type to img
header("");
//get & check the _GET params
$background_image_id = "";
$template_id = "";
$traineename = "";
$time = "";

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


//loop over all textlines and place them in the image
//      


//place the logo on the image


//done return the image

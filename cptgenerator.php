<?php
header('Content-type: image/png');
$im = imagecreate(1280, 720);
$font_regular = realpath("fonts/Myriad_Pro_Regular.ttf");
$font_blod = realpath("fonts/Myriad_Pro_Bold.ttf");
$font_italic = realpath("fonts/Myriad_Pro_Italic.ttf");
$font_bolditalic = realpath("fonts/Myriad_Pro_Bold_Italic.ttf");
$background = imagecolorallocate($im, random_int (1,250), random_int (1,250), random_int (1,250));
$colorblack = imagecolorallocate($im, 0, 0, 0);
$colorwhite = imagecolorallocate($im, 255, 255, 255);
$colorgreyoffical = imagecolorallocate($im, 161, 161, 161);
$colorblueoffical = imagecolorallocate($im, 0, 18, 255);
$colorredofficial = imagecolorallocate($im, 255, 25, 36);
$coloryellowofficial = imagecolorallocate($im, 255, 209, 0);
$colorpink = imagecolorallocate($im, 190, 0, 250);
//$im_ = imagecreatefrompng('vroute_20px.png');
if (isset($_GET["bannerstyle"])) {
    $bannerstyle = $_GET["bannerstyle"];
    if ($bannerstyle == 1) {
        imagefilledrectangle($im, 0, 720 - 155, 1280, 720, $colorblack);
        ImageTTFText($im, 40, 0, 20, 720 - 90, $colorwhite, $font_bolditalic, "EDDF_N_APP Controller Practical Test");
        ImageTTFText($im, 35, 0, 20, 720 - 40, $colorwhite, $font_regular, "21.14.2030 | 1900 - 2000 UTC");
        ImageTTFText($im, 80, 0, 1280-450,  125, $colorwhite, $font_blod, "APP CPT");
        ImageTTFText($im, 30, 0, 1280-450,  175, $colorwhite, $font_bolditalic, "feat. Paul Hollmann");
    }
    if ($bannerstyle == 2) {
        imagefilledrectangle($im, 0, 720 - 155, 1280, 720, $colorblack);
        ImageTTFText($im, 35, 0, 20, 720 - 90, $colorwhite, $font_bolditalic, "Controller Practical Test");
        ImageTTFText($im, 30 , 0, 20+ 500, 720 - 90, $colorwhite, $font_bolditalic, "feat. Sven Dolata");
        ImageTTFText($im, 30, 0, 20, 720 - 40, $colorwhite, $font_regular, "21.14.2030 1900-2000z");
        ImageTTFText($im, 30, 0, 20 + 425, 720 - 40, $colorwhite, $font_italic, "EDDS_TWR Stuttgart Tower");
    }
}
//imagecopymerge($im, $im_, imx, $j * $px_block_y + $px_space * $nr + 5, 0, 0, 20, 20, 100);
imagepng($im);
imagedestroy($im);

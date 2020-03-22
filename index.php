<?php

//$im_ = imagecreatefrompng('vroute_20px.png');

//?sc=EDDF_TWR&sd=Farnkfurt+Tower&st=TWR&tn=Paul+Hollmann&td=21.10.2000&ts=2000&te=2100&bs=1

//GENEATE BANNER
$allparamsset = true;
$allparams = array("sc", "sd", "st", "tn", "td", "ts", "te", "bs");
foreach ($allparams as $param)
    if (!isset($_GET[strval($param)]))
        $allparamsset = false;
if ($allparamsset) {
    header('Content-type: image/png');
    $im = imagecreate(1280, 720);
    $im_vatgerblack = imagecreatefrompng("res/img/vatger_black.png");
    $font_regular = realpath("res/fonts/Myriad_Pro_Regular.ttf");
    $font_blod = realpath("res/fonts/Myriad_Pro_Bold.ttf");
    $font_italic = realpath("res/fonts/Myriad_Pro_Italic.ttf");
    $font_bolditalic = realpath("res/fonts/Myriad_Pro_Bold_Italic.ttf");
    $background = imagecolorallocate($im, random_int(1, 250), random_int(1, 250), random_int(1, 250));
    $colorblack = imagecolorallocate($im, 0, 0, 0);
    $colorwhite = imagecolorallocate($im, 255, 255, 255);
    $colorgreyoffical = imagecolorallocate($im, 161, 161, 161);
    $colorblueoffical = imagecolorallocate($im, 0, 18, 255);
    $colorredofficial = imagecolorallocate($im, 255, 25, 36);
    $coloryellowofficial = imagecolorallocate($im, 255, 209, 0);
    $colorpink = imagecolorallocate($im, 190, 0, 250);
    //set the inputvalues
    $bannerstyle = urldecode($_GET["bs"]);
    $stationcallsign = htmlspecialchars(urldecode($_GET["sc"]));
    $stationdescription = htmlspecialchars(urldecode($_GET["sd"]));
    $stationtype = htmlspecialchars(substr(urldecode($_GET["st"]), 0, 3));
    $traineename = htmlspecialchars(urldecode($_GET["tn"]));
    $date = htmlspecialchars(substr(urldecode($_GET["td"]), 0, 10));
    $timestart = htmlspecialchars(substr(urldecode($_GET["ts"]), 0, 4));
    $timeend = htmlspecialchars(substr(urldecode($_GET["te"]), 0, 4));

    //set the background image

    if ($bannerstyle == 1) {
        imagefilledrectangle($im, 0, 720 - 155, 1280, 720, $colorblack);
        ImageTTFText($im, 35, 0, 20, 720 - 90, $colorwhite, $font_bolditalic, $stationcallsign
            . " Controller Practical Test");
        ImageTTFText($im, 35, 0, 20, 720 - 40, $colorwhite, $font_regular, $date . " | " .   $timestart . " - " . $timeend . " z");
        ImageTTFText($im, 80, 0, 1280 - 450,  125, $colorwhite, $font_blod, $stationtype . " CPT");
        ImageTTFText($im, 30, 0, 1280 - 450,  175, $colorwhite, $font_bolditalic, "feat. " . $traineename);
        imagecopymerge($im, $im_vatgerblack, 1280 - 455, 720 - 155, 0, 0, 460, 300, 100);
    }
    if ($bannerstyle == 2) {
        imagefilledrectangle($im, 0, 720 - 155, 1280, 720, $colorblack);
        ImageTTFText($im, 35, 0, 20, 720 - 90, $colorwhite, $font_bolditalic, "Controller Practical Test");
        ImageTTFText($im, 20, 0, 20 + 500, 720 - 90, $colorwhite, $font_bolditalic, "feat. " . $traineename);
        ImageTTFText($im, 30, 0, 20, 720 - 40, $colorwhite, $font_regular, $date . "  " . $timestart  . "z");
        ImageTTFText($im, 25, 0, 20 + 350, 720 - 40, $colorwhite, $font_italic, $stationcallsign
            . " " . $stationdescription);
        imagecopymerge($im, $im_vatgerblack, 1280 - 455, 720 - 155, 0, 0, 460, 300, 100);
    }

    //CLEANUP
    imagepng($im);
    imagedestroy($im);
} else {
    //SHOW WEBSITE
?>
    <!DOCTYPE html>
    <html lang="de">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VATSIM Germany - Bannergenerator</title>
        
    </head>

    <body>
        <script src="res/js/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="res/js/bannergenerator.js" crossorigin="anonymous"></script>
        <div>
            <form id="input" action="">
                <label for="sc">stationcallsign</label>
                <input type="text" name="sc" maxlength="10" placeholder="EDDF_W_TWR">
                <br>
                <label for="sd">stationdescription</label>
                <input type="text" name="sd" placeholder="Frankfurt Tower">
                <br>
                <label for="st">stationtype</label>
                <input type="text" name="st" maxlength="3" placeholder="TWR">
                <br>
                <label for="tn">traineename</label>
                <input type="text" name="tn" placeholder="Max Mustertrainee">
                <br>
                <label for="td">date</label>
                <input type="text" name="td" maxlength="10" placeholder="00.00.0000">
                <br>
                <label for="ts">timestart</label>
                <input type="text" name="ts" maxlength="4" placeholder="1900">
                <br>
                <label for="te">timeend</label>
                <input type="text" name="te" maxlength="4" placeholder="2000">
                <br>
                <label for="bs">bannerstyle</label>
                <input type="text" name="bs"maxlength="1" placeholder="1-2">
                <br>
            </form>
            <br>
            <br>
            <button onclick="clicked_preview();">Preview</button>
            <br>
            <br>
            <code id="outputlink"></code>
            <br>
            <br>
            <img id="preview_img" src="">
        </div>
    </body>

    </html>
<?php
}
?>
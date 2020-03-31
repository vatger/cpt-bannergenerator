<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VATSIM Germany - Bannergenerator</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

    <div id="gallery">
        <img src="http://upload.wikimedia.org/wikipedia/commons/8/84/Example.svg" />
        <img src="http://mirrors.rit.edu/CTAN/macros/latex/contrib/incgraph/example.jpg" />
        <img src="http://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/HTML_source_code_example.svg/315px-HTML_source_code_example.svg.png" />
        <img src="http://t0.gstatic.com/images?q=tbn:ANd9GcQ7F-2LZB83RcmOfsBynfGT5S7k0fNpGrsywIlem1WQGfKca0bp6Q" />
        <img src="https://pbs.twimg.com/profile_images/447372216133758978/PRwNTMkI.jpeg" />
    </div>
    <br><br><br><br>
    <div>
        <form id="input" action="">
            <label for="sc">stationcallsign</label>
            <input type="text" name="sc" maxlength="10" value="EDDF_W_TWR">
            <br>
            <label for="sn">stationname</label>
            <input type="text" name="sn" maxlength="15" value="Frankfurt Tower">
            <br>
            <label for="tn">traineename</label>
            <input type="text" name="tn" maxlength="15" value="Max Mustertrainee">
            <br>
            <label for="dt">date</label>
            <input type="text" name="dt" maxlength="10" value="00.00.0000">
            <br>
            <label for="ts">timestart</label>
            <input type="text" name="ts" maxlength="4" value="1900">
            <br>
            <label for="te">timeend</label>
            <input type="text" name="te" maxlength="4" value="2000">
            <br>
            <label for="bg">background_image_id</label>
            <input type="hidden" name="bg" maxlength="1" value="1">
            <br>
            <label for="tp">template_id</label>
            <input type="hidden" name="tp" maxlength="1" value="1">
            <br>
        </form>
        <br>
        <br>
        <button id="button">Preview</button>
        <br>
        <br>
        <code id="outputlink"></code>
        <br>
        <br>
        <img id="preview_img" src="">
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/vatgercptbannergenerator.js"></script>
</body>

</html>
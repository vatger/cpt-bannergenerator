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

    <div class="container">
        <div class="row">
        <div class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=251" class="img-fluid">
            </div><div class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=252" class="img-fluid">
            </div><div class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=253" class="img-fluid">
            </div>
            <div class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=254" class="img-fluid">
            </div>
            
        </div>
        <div class="row">
        <div class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=255" class="img-fluid">
            </div><div class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=256" class="img-fluid">
            </div>
        </div>
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
            <input type="text" readonly name="bg" maxlength="1" value="1">
            <br>
            <label for="tp">template_id</label>
            <input type="text" readonly name="tp" maxlength="1" value="1">
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
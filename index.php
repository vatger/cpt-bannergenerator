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

    <!-- Page Content -->
    <div class="container">

        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Thumbnail Gallery</h1>

        <hr class="mt-2 mb-5">

        <div class="row text-center text-lg-left">

            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/aob0ukAYfuI/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/EUfxH-pze7s/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/M185_qYH8vg/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/sesveuG_rNo/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/AvhMzHwiE_0/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/2gYsZUmockw/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/EMSDtjVHdQ8/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/8mUEy0ABdNE/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/G9Rfc1qccH4/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/aJeH0KcFkuc/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/p2TQ-3Bh3Oo/400x300" alt="">
                </a>
            </div>
        </div>

    </div>
    <!-- /.container -->
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
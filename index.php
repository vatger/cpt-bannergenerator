<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VATSIM Germany - Bannergenerator</title>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
    <script>
        function clicked_preview() {
            var data = $("#input").serialize();
            $("#outputlink").html("//link-to-mainfolder/?" + data);
            $("#preview_img").attr("src", "?" + data);
        }
    </script>
    <div>
        <form id="input" action="">
            <label for="sc">stationcallsign</label>
            <input type="text" name="sc" maxlength="10" placeholder="EDDF_W_TWR">
            <br>
            <label for="sd">stationname</label>
            <input type="text" name="sn" maxlength="15" placeholder="Frankfurt Tower">
            <br>
            <label for="tn">traineename</label>
            <input type="text" name="tn" maxlength="15" placeholder="Max Mustertrainee">
            <br>
            <label for="td">date</label>
            <input type="text" name="dt" maxlength="10" placeholder="00.00.0000">
            <br>
            <label for="ts">timestart</label>
            <input type="text" name="ts" maxlength="4" placeholder="1900">
            <br>
            <label for="te">timeend</label>
            <input type="text" name="te" maxlength="4" placeholder="2000">
            <br>
            <label for="bs">background_image_id</label>
            <input type="text" name="bg" maxlength="1" placeholder="1">
            <br>
            <label for="bs">template_id</label>
            <input type="text" name="tp" maxlength="1" placeholder="1">
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
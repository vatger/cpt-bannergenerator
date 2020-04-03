<?php
require_once("dbinterface.php");
$filter_rg = urldecode($_GET["rg"]);
$filter_station = urldecode($_GET["station"]);
$filter_airport = urldecode($_GET["airport"]);

if (!isset($_GET["number"])) {
    $count = getBackgoundImageCountViaFilter($filter_rg, $filter_station, $filter_airport);
    if ($count == false)
        $count = 0;
    else
        $count = $count["count"];
    echo $count;
} else {
    $number = urldecode($_GET["number"]);

    $im_db = getBackgoundImageViaFilter($number, $filter_rg, $filter_station, $filter_airport);
    $im = imagescale(imagecreatefromstring($im_db["content"]), 150);
    ob_start();
    imagepng($im);
    $stringdata = ob_get_contents();
    ob_end_clean();
    if ($im_db != false) {
?>
        <img src="data:image/png;base64,<?php echo base64_encode($stringdata); ?>" class="img-fluid" data-imageid="<?php echo $im_db["id"]; ?>" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>RG</b> <?php echo $im_db["regional_group"]; ?> <br><b>Station</b> <?php echo $im_db["station"]; ?> <br><b>Airport</b> 
        <?php
        if (empty($im_db["airport"]))
            echo "<em>N/A</em>";
        else
            echo $im_db["airport"]; 
        ?><br><em>Zum Auswählen: <wbr>Bild klicken</em>">
        </img>
    <?php
    } else {
    ?>
        <img src="assets/img/150x66.png" class="img img-fluid" data-imageid="null"></img>
<?php
    }
}

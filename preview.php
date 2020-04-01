<?php
require_once("dbinterface.php");
if (true) {
    $number = urldecode($_GET["number"]);
    $filter_airport = "EDDF";
    $filter_station = "TWR";
    $filter_rg = "EDFF";

    $im_db = getBackgoundImageViaFilter($number, $filter_rg, $filter_station, $filter_airport);

    $im = imagescale(imagecreatefromstring($im_db["content"]), 150);
    ob_start();
    imagepng($im);
    $stringdata = ob_get_contents();
    ob_end_clean();
    if ($im_db != false) {
?>
        <img src="data:image/png;base64,<?php echo base64_encode($stringdata); ?>" class='img' data-imageid="<?php echo $im_db["id"]; ?>"></img>
    <?php
    } else {
    ?>
        <img src='https://via.placeholder.com/200x88' class='img' data-imageid="null"></img>
<?php
    }
}

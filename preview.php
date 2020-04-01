<?php
require_once("dbinterface.php");

$number = urldecode($_GET["number"]);
$filter_airport = "EDDF";
$filter_station = "TWR";
$filter_rg = "EDFF";
sleep(2);
$im_db = getBackgoundImageViaFilter($number, $filter_rg, $filter_station, $filter_airport);

$im = imagescale(imagecreatefromstring($im_db["content"]), 200);
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
    <img src='https://via.placeholder.com/140x100' class='img' data-imageid="null"></img>
<?php
}

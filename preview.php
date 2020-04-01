<?php
require_once("dbinterface.php");

$number = urldecode($_GET["number"]);
$filter_airport = "EDDF";
$filter_station = "TWR";
$filter_rg = "EDFF";

$im_db = getBackgoundImageViaFilter($number, $filter_rg, $filter_station, $filter_airport);

/*
if ($im_db != false) {
?>
    <img src='https://via.placeholder.com/140x100' class='img' data-imageid="<?php echo $im_db["id"]; ?>"></img>
<?php
} else {
?>
    <img src='https://via.placeholder.com/140x100' class='img' data-imageid="null"></img>
<?php
}
*/
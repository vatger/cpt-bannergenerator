<?php
require_once("dbinterface.php");

$number = urldecode($_GET["number"]);
$filter_airport = "EDDF";
$filter_station = "TWR";
$filter_rg = "EDFF";
sleep(2);
$im_db = getBackgoundImageViaFilter($number, $filter_rg, $filter_station, $filter_airport);


if ($im_db != false) {
?>
    <img src=' data:image/gif;base64,R0lGODdhEAAQAMwAAPj7+FmhUYjNfGuxYY
    DJdYTIeanOpT+DOTuANXi/bGOrWj6CONzv2sPjv2CmV1unU4zPgISg6DJnJ3ImTh8Mtbs00aNP1CZSGy0YqLEn47RgXW8amasW
    7XWsmmvX2iuXiwAAAAAEAAQAAAFVyAgjmRpnihqGCkpDQPbGkNUOFk6DZqgHCNGg2T4QAQBoIiRSAwBE4VA4FACKgkB5NGReAS
    FZEmxsQ0whPDi9BiACYQAInXhwOUtgCUQoORFCGt/g4QAIQA7' class='img' data-imageid="<?php echo $im_db["id"]; ?>"></img>
<?php
} else {
?>
    <img src='https://via.placeholder.com/140x100' class='img' data-imageid="null"></img>
<?php
}

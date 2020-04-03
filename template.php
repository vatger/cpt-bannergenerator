<?php
require_once("dbinterface.php");
$filter_bg_id = urldecode($_GET["background_id"]);

if (!isset($_GET["number"])) {
    $count = getTeamplateCountViaFilter($filter_bg_id);
    if ($count == false)
        $count = 0;
    else
        $count = $count["count"];
    echo $count;
} else {
    $number = urldecode($_GET["number"]);

    $template = getTeamplateViaFilter($number, $filter_bg_id);

    if ($template == false) {
        echo "<code><em>false</em></code>";
    } else {
        echo "<img src='previewgen.php?tp=".."'>";
    }
}

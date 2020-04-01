<?php
require_once("dbinterface.php");

$number = urldecode($_GET["number"]);
$filter_airport = "";
$filter_station = "";
$filter_rg = "";

/**
 * 
 * SELECT * FROM `background_image` 
 * WHERE `airport` LIKE "EDDF" AND `regional_group` LIKE "%EDFF%" 
 * LIMIT 1 OFFSET 0
 * 
 */
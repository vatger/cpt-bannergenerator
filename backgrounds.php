<?php
require_once("dbinterface.php");
$filter_rg = urldecode($_GET["rg"]);
$filter_station = urldecode($_GET["station"]);
$filter_airport = urldecode($_GET["airport"]);

$background_datas = getBackgoundImageDataViaFilter($filter_rg, $filter_station, $filter_airport);
if ($background_datas == false) {
?>
    <div class="col-auto align-items-center align-middle">
        <span class="badge badge-dark">No images found</span>
    </div>
    <?php
} else {
    foreach ($background_datas as $background_data) {
    ?>
        <div class="col-auto">
            <img src="backgroundgen.php?bg=<?php echo $background_data["id"] ?>" class="img-fluid mx-auto d-block" data-imageid="<?php echo $background_data["id"]; ?>" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>RG</b> <?php echo $background_data["regional_group"]; ?> <br><b>Station</b> <?php echo $background_data["station"]; ?> <br><b>Airport</b> 
              <?php
                if (empty($background_data["airport"]))
                    echo "<em>N/A</em>";
                else
                    echo $background_data["airport"];
                ?><br><em>Zum Auswählen: <wbr>Bild klicken</em>">
            </img>


            >
        </div>
<?php
    }
}
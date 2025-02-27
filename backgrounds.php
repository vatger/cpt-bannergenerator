<?php
require_once("dbinterface.php");
$filter_rg = urldecode($_GET["rg"]);
$filter_station = urldecode($_GET["station"]);
$filter_airport = urldecode($_GET["airport"]);

$background_datas = getBackgoundImageDataViaFilter($filter_rg, $filter_station, $filter_airport);
if ($background_datas == false) {
?>
    <div class="col-auto">
        <span class="badge badge-dark">Keine Hintergrundbilder gefunden</span>
    </div>
    <?php
} else {
    foreach ($background_datas as $background_data) {
        $id = $background_data["id"];
        $rg = $background_data["regional_group"];
        $station = $background_data["station"];
        $airport = $background_data["airport"];
    ?>
        <div class="col-auto mt-1 mb-1">
            <img alt="IMAGE" data-lazysrc="backgroundgen.php?bg=<?php echo $background_data["id"] ?>" class="img-fluid mx-auto d-block" data-imageid="<?php echo $id ?>" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>RG</b> <?php echo $background_data["regional_group"]; ?> <br><b>Station</b> <?php echo $station; ?> <br><b>Airport</b> 
              <?php
                if (empty($airport))
                    echo "<em>N/A</em>";
                else
                    echo $airport;
                ?><br><em>Zum Auswählen: <wbr>Bild klicken</em>">
            </img>
        </div>
<?php
    }
}

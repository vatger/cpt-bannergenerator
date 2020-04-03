<?php
require_once("dbinterface.php");
$filter_bg_id = urldecode($_GET["background_id"]);

if (!isset($_GET["number"])) {
    $count = getTemplateCountViaFilter($filter_bg_id);
    if ($count == false)
        $count = 0;
    else
        $count = $count["count"];
    echo $count;
} else {
    $number = urldecode($_GET["number"]);

    $template = getTemplateViaFilter($number, $filter_bg_id);

    if ($template == false) {
?>
        <img src="assets/img/150x66.png" class="img img-fluid" data-imageid="null"></img>
    <?php
    } else {
    ?>
        <img src="previewgen.php?tp=<?php echo $template["id_template"]; ?>" data-templateid="<?php echo $template["id_template"]; ?>">
<?php
    }
}

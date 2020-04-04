<?php
require_once("dbinterface.php");
$filter_backgroundimage = urldecode($_GET["background_id"]);

$templates = getCompatibleTemplateIds($filter_backgroundimage);
if ($templates == false) {
?>
    <div class="col-auto align-items-center align-middle">
        <span class="badge badge-dark">No tempates found</span>
    </div>
    <?php
} else {
    foreach ($templates as $template) {
        $id = $template["id_template"];
    ?>
        <div class="col-auto">
            <img alt="IMAGE" data-lazysrc="templategen.php?tp=<?php echo $id;?>" class="img-fluid mx-auto d-block" data-templateid="<?php echo $id ?>">
            </img>
        </div>
<?php
    }
}

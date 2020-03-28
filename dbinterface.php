<?php
require_once("dbconfig.php");

$link = false;

function connect()
{
    global $link;
    if ($link != false)
        $link = mysqli_connect(DBHOST, DBUSER, DBPWD, DBNAME);
    return $link;
}

function getBackgoundImageContent($background_image_id)
{
}

function getBackgoundImageAttributes($background_image_id)
{
    echo "<br>";
    var_dump($background_image_id);
    echo "<br>";
    $background_image_id = mysqli_real_escape_string(connect(), $background_image_id);
    echo "SELECT regional_group, station, airport FROM background_image WHERE id LIKE " . $background_image_id;
    $res = mysqli_query(connect(), "SELECT regional_group, station, airport FROM background_image WHERE id LIKE " . $background_image_id);
    echo "<br>";
    var_dump($res);
    echo "<br>";
    if (mysqli_num_rows($res) > 0)
        return mysqli_fetch_array($res);
    else
        return false;
}

function getCompatibleTemplateIds($background_image_id)
{
    $background_image_id = mysqli_real_escape_string(connect(), $background_image_id);
    $res = mysqli_query(connect(), "SELECT id_template FROM template_background WHERE id_background LIKE " . $background_image_id);
    if (mysqli_num_rows($res) > 0)
        return mysqli_fetch_all($res);
    else
        return false;
}

function getTemplate($background_image_id, $template_id)
{
    $background_image_id = mysqli_real_escape_string(connect(), $background_image_id);
    $template_id = mysqli_real_escape_string(connect(), $template_id);
    $res = mysqli_query(connect(), "SELECT template.rectangle_id_color, template.logo_x, template.logo_y, template.logo_ressource 
                                    FROM template JOIN template_background ON template.id = template_background.id_template 
                                    WHERE template_background.id_background LIKE " . $background_image_id .
                                    " AND template.id LIKE ". $template_id);
    if (mysqli_num_rows($res) > 0)
        return mysqli_fetch_array($res);
    else
        return false;
}
function getTextlines($template_id){
    $template_id = mysqli_real_escape_string(connect(), $template_id);
    $res = mysqli_query(connect(), "SELECT fontsize, rotation, position_x, position_y, id_color, id_font, text
                                    FROM textline JOIN template_textlines ON textline.id = template_textlines.id_textline
                                    WHERE template_textlines.id_template LIKE " . $template_id);
    if (mysqli_num_rows($res) > 0)
        return mysqli_fetch_all($res);
    else
        return false;
}

function getAllColores()
{
    $res = mysqli_query(connect(), "SELECT id, R, G, B FROM colores");
    if (mysqli_num_rows($res) > 0)
        return mysqli_fetch_all($res);
    else
        return false;
}

function getAllFonts()
{
    $res = mysqli_query(connect(), "SELECT id, ressource FROM fonts");
    if (mysqli_num_rows($res) > 0)
        return mysqli_fetch_all($res);
    else
        return false;
}

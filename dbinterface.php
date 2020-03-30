<?php
require_once("dbconfig.php");

$link = false;

function connect()
{
    global $link;
    if ($link == false)
        $link = mysqli_connect(DBHOST, DBUSER, DBPWD, DBNAME);
    return $link;
}
function query_array($qstring)
{
    echo "QUERY: ".$qstring."<br><br>";
    $res = mysqli_query(connect(), $qstring);
    if (mysqli_num_rows($res) > 0)
        return mysqli_fetch_array($res);
    else
        return false;
}
function query_all($qstring)
{
    echo "QUERY: ".$qstring."<br><br>";
    $res = mysqli_query(connect(), $qstring);
    if (mysqli_num_rows($res) > 0)
        return mysqli_fetch_all($res);
    else
        return false;
}
function esc_str($str)
{
    return mysqli_real_escape_string(connect(), $str);
}

function getBackgoundImageContent($background_image_id)
{
}

function getBackgoundImageAttributes($background_image_id)
{
    $background_image_id = esc_str($background_image_id);
    return query_array("SELECT id,regional_group, station, airport FROM background_image WHERE id LIKE " . $background_image_id);
}

function getCompatibleTemplateIds($background_image_id)
{
    $background_image_id = esc_str($background_image_id);
    return query_all("SELECT id_template FROM template_background WHERE id_background LIKE " . $background_image_id);
}

function getTemplate($background_image_id, $template_id)
{
    $background_image_id = esc_str($background_image_id);
    $template_id = esc_str($template_id);
    return query_array("SELECT template.rectangle_id_color, template.logo_x, template.logo_y, template.logo_ressource 
                    FROM template JOIN template_background ON template.id = template_background.id_template 
                    WHERE template_background.id_background LIKE " . $background_image_id .
        " AND template.id LIKE " . $template_id);
}
function getTextlines($template_id)
{
    $template_id = esc_str($template_id);
    return query_all("SELECT id, fontsize, rotation, position_x, position_y, id_color, id_font, text
                    FROM textline JOIN template_textlines ON textline.id = template_textlines.id_textline
                    WHERE template_textlines.id_template LIKE " . $template_id);
}

function getAllColores()
{
    return query_all("SELECT id, R, G, B FROM colores");
}

function getAllFonts()
{
    return query_all("SELECT id, ressource FROM fonts");
}

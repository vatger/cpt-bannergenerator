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
function query_row($qstring)
{
    //echo "QUERY: <code>".$qstring."</code><br><br>";
    $res = mysqli_query(connect(), $qstring);
    if (mysqli_num_rows($res) > 0)
        return mysqli_fetch_assoc($res);
    else
        return false;
}
function query_all($qstring)
{
    //echo "QUERY: <code>".$qstring."</code><br><br>";
    $res = mysqli_query(connect(), $qstring);
    if (mysqli_num_rows($res) > 0)
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    else
        return false;
}
function esc_str($str)
{
    return mysqli_real_escape_string(connect(), $str);
}

function getBackgoundImageDataViaFilter($rg, $station, $airport)
{
    $rg = esc_str($rg);
    $station = esc_str($station);
    $airport = esc_str($airport);
    $querystr = "SELECT id, regional_group, station, airport, activated FROM background_image 
    WHERE `activated` LIKE 'yes'
    AND `regional_group` LIKE '%" . $rg . "%'
    AND `station` LIKE '%" . $station . "%'";
    if (!empty($airport))
        $querystr .= "AND `airport` LIKE '" . $airport . "%' ";
    return query_all($querystr);
}

function getBackgoundImageContent($background_image_id)
{
    $background_image_id = esc_str($background_image_id);
    return query_row("SELECT id, imageformat, content FROM background_image WHERE id LIKE " . $background_image_id);
}

function getBackgoundImageAttributes($background_image_id)
{
    $background_image_id = esc_str($background_image_id);
    return query_row("SELECT id, regional_group, station, airport FROM background_image WHERE id LIKE " . $background_image_id);
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
    return query_row("SELECT template.rectangle_id_color, template.logo_x, template.logo_y, template.logo_ressource 
                    FROM template JOIN template_background ON template.id = template_background.id_template 
                    WHERE template_background.id_background LIKE " . $background_image_id .
        " AND template.id LIKE " . $template_id);
}
function getTemplateNoChecks($template_id)
{
    $template_id = esc_str($template_id);
    return query_row("SELECT id,rectangle_id_color, logo_x, logo_y, logo_ressource 
                    FROM template WHERE id LIKE " . $template_id);
}
function getTextlines($template_id)
{
    $template_id = esc_str($template_id);
    return query_all("SELECT id, fontsize, rotation, position_x, position_y, id_color, id_font, text
                    FROM textline WHERE id_template LIKE " . $template_id);
}

function getAllColors()
{
    return query_all("SELECT id, R, G, B FROM colors");
}

function getAllFonts()
{
    return query_all("SELECT id, ressource FROM fonts");
}
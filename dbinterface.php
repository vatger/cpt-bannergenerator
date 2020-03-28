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

function getBackgoundImageAttributes(){

}


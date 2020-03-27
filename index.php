<?php
/*
 */
echo "PHP Check: OK <br>";


include("dbconfig.php");
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect(DBHOST, DBUSER, DBPWD, DBNAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}else{
    echo "DB Check: OK";
}


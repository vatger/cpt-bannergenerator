<?php
/*
 */
echo "PHP Check: OK";

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "cpt", "123456789", "cptgen");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    echo "DB Check: NOT OK";
}else{
    echo "DB Check: OK";
}


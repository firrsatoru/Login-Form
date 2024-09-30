<?php

$hostname = "";
$username = "";
$password = "";
$database_name = "";

$conn = mysqli_connect($hostname, $username, $password, $database_name);

if ($conn->connect_error) {
    echo "Err";
    die("Err!");
}

?>

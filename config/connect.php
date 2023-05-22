<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "biodata";

try {
    $conn = mysqli_connect($hostname, $username, $password, $database);
} catch (\Throwable $th) {
    echo $th;
}

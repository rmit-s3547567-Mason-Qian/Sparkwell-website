<?php

$dbServername ="sparkwell2018.mysql.database.azure.com:3306";
$dbUsername = "sparkwelladmin@sparkwell2018";
$dbPassword = "sparkwellNASM2018";
$dbName = "loginsystem";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



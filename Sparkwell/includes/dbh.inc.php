<?php
/*
$dbServername ="sparkwell2018.mysql.database.azure.com:3306";
$dbUsername = "sparkwelladmin@sparkwell2018";
$dbPassword = "sparkwellNASM2018";
$dbName = "loginsystem";

/*
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
*/

$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "/SSL/BaltimoreCyberTrustRoot.crt.pem", NULL, NULL) ; 
mysqli_real_connect($conn, 'sparkwell2018.mysql.database.azure.com', 'sparkwelladmin@sparkwell2018', 'sparkwellNASM2018', 'loginsystem', 3306, MYSQLI_CLIENT_SSL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "repules_db"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Adatbázis kapcsolat sikertelen: " . mysqli_connect_error());
}
?>

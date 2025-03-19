<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "telefon_db";

$conn = new mysqli($servername, $username, $password, $dbname);

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

if ($method == "POST") {
    $tipus = $input["tipus"];
    $modell = $input["modell"];
    $tarhely = $input["tarhely"];
    $egyeb = $input["egyeb"];

    $sql = "INSERT INTO `telefon`(`tipus`, `modell`, `tarhely`, `egyeb`) VALUES ('$tipus','$modell','$tarhely','$egyeb')";
    mysqli_query($conn,$sql);
}

if ($method == "GET") {
    $sql = "SELECT `tipus`, `modell`, `tarhely`, `egyeb` FROM `telefon` WHERE 1";
    mysqli_query($conn,$sql);
}

?>

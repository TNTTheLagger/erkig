<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type");


$servername = "localhost";
$username = "root";
$password = "";
$database = "recept_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Adatbázis hiba"]));
}

$sql = "SELECT id, nev, mertekegyseg FROM hozzavalok";
$result = $conn->query($sql);

$hozzavalok = [];
while ($row = $result->fetch_assoc()) {
    $hozzavalok[] = $row;
}

$conn->close();

echo json_encode($hozzavalok);
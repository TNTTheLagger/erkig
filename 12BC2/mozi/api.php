<?php

header("Content-Type: application/json");

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "film_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $conn->connect_error]));
}

 if ($_SERVER['REQUEST_METHOD'] == "GET") {

 }
 else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $cim = $data["cim"];
    $kategoria = $data["kategoria"];
    $hossz = $data["hossz"];
    $sql = "INSERT INTO filmek (cim, kategoria, hossz) VALUES ('$cim', '$kategoria', $hossz)";
    mysqli_query($conn, $sql);
 }  

$conn->close();
?>

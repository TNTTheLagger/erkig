<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

$mysqli = new mysqli("localhost", "root", "", "tura_db");
if ($mysqli->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $result = $mysqli->query("SELECT * FROM turak");
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
}

elseif ($method == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (!isset($data['nev']) || !isset($data['tav']) || !isset($data['elerheto_hely'])) {
        die(json_encode(["uzenet" => "Hiányzó adatok"]));
    }
    $stmt = $mysqli->prepare("INSERT INTO turak (nev, tav, elerheto_hely) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $data['nev'], $data['tav'], $data['elerheto_hely']);
    $stmt->execute();
    echo json_encode(["uzenet" => "Túra rögzítve"]);
}

$mysqli->close();
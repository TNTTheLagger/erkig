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
$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));


if ($method == 'GET') {
    $result = $mysqli->query("SELECT jelentkezesek.id, turak.nev as turanev, jelentkezesek.email, jelentkezesek.letszam FROM jelentkezesek JOIN turak ON jelentkezesek.tura_id = turak.id");
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
}

elseif ($method == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (!isset($data['tura_id']) || !isset($data['email']) || !isset($data['letszam'])) {
        die(json_encode(["uzenet" => "Hiányzó adatok"]));
    }
    $stmt = $mysqli->prepare("INSERT INTO jelentkezesek (tura_id, email, letszam) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $data['tura_id'], $data['email'], $data['letszam']);
    $stmt->execute();
    echo json_encode(["uzenet" => "Jelentkezés rögzítve"]);
}

elseif ($method == 'DELETE' && isset($_GET['id'])) {
    $stmt = $mysqli->prepare("DELETE FROM jelentkezesek WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    echo json_encode(["uzenet" => "Jelentkezés törölve"]);
}



$mysqli->close();
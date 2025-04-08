<?php
require 'db.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Content-Type: application/json");
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $date = $_GET['date'] ?? '';
    $departure = $_GET['departure'] ?? '';

    if (empty($date) || empty($departure)) {
        echo json_encode([]);
        exit;
    }

    $stmt = $pdo->prepare("SELECT seat, name FROM bookings WHERE date = ? AND departure = ?");
    $stmt->execute([$date, $departure]);
    $seats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($seats);
}

elseif ($method === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['date'], $data['departure'], $data['name'], $data['seat'])) {
        echo json_encode(["success" => false, "message" => "Invalid data"]);
        exit;
    }

    $date = $data['date'];
    $departure = $data['departure'];
    $name = $data['name'];
    $seat = $data['seat'];

    try {
        $stmt = $pdo->prepare("INSERT INTO bookings (date, departure, name, seat) VALUES (?, ?, ?, ?)");
        $stmt->execute([$date, $departure, $name, $seat]);
        echo json_encode(["success" => true]);
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "message" => "Seat already booked"]);
    }
}

elseif ($method === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['date'], $data['departure'], $data['seat'])) {
        echo json_encode(["success" => false, "message" => "Invalid data"]);
        exit;
    }

    $date = $data['date'];
    $departure = $data['departure'];
    $seat = $data['seat'];

    $stmt = $pdo->prepare("DELETE FROM bookings WHERE date = ? AND departure = ? AND seat = ?");
    $stmt->execute([$date, $departure, $seat]);

    echo json_encode(["success" => true]);
}

else {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
}
?>

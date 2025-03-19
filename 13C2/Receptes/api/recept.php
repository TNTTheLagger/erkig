<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recept_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "Adatbázis kapcsolat sikertelen"]));
}

// Új recept hozzáadása
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data["nev"], $data["ido"], $data["nehezseg"], $data["leiras"], $data["hozzavalok"])) {
        echo json_encode(["error" => "Hiányzó adatok"]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO receptek (nev, ido, nehezseg, leiras) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $data["nev"], $data["ido"], $data["nehezseg"], $data["leiras"]);

    if ($stmt->execute()) {
        $recept_id = $stmt->insert_id;
        $stmt->close();

        foreach ($data["hozzavalok"] as $hozzavalo) {
            $stmt = $conn->prepare("INSERT INTO kapcsolo (recept_id, hozzavalo_id, mennyiseg) VALUES (?, ?, ?)");
            $stmt->bind_param("iii", $recept_id, $hozzavalo["id"], $hozzavalo["mennyiseg"]);
            $stmt->execute();
        }
        
        echo json_encode(["success" => "Recept hozzáadva"]);
    } else {
        echo json_encode(["error" => "Hiba a recept mentésekor"]);
    }
    exit;
}

// Receptek lekérdezése
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["id"])) {
        $stmt = $conn->prepare("SELECT * FROM receptek WHERE  id = ?");
        $stmt->bind_param("i", $_GET["id"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $recept = $result->fetch_assoc();

        if ($recept) {
            $stmt = $conn->prepare("SELECT h.nev, h.mertekegyseg, k.mennyiseg FROM kapcsolo k JOIN hozzavalok h ON k.hozzavalo_id = h.id WHERE k.recept_id = ?");
            $stmt->bind_param("i", $_GET["id"]);
            $stmt->execute();
            $result = $stmt->get_result();
            $recept["hozzavalok"] = $result->fetch_all(MYSQLI_ASSOC);

            echo json_encode($recept);
        } else {
            echo json_encode(["error" => "Nincs ilyen recept"]);
        }
        exit;
    } else {
        $result = $conn->query("SELECT id, nev FROM receptek");
        echo json_encode($result->fetch_all(MYSQLI_ASSOC));
    }
}

$conn->close();
?>

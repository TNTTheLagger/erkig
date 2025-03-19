<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $sql = "SELECT * FROM foglalasok";
    $result = mysqli_query($conn, $sql);
    $foglalasok = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $foglalasok[] = $row;
    }

    echo json_encode($foglalasok);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['nev'], $data['darab'], $data['jaratszam'])) {
        $nev = mysqli_real_escape_string($conn, $data['nev']);
        $darab = (int) $data['darab'];
        $jaratszam = mysqli_real_escape_string($conn, $data['jaratszam']);

        $sql = "INSERT INTO foglalasok (nev, darab, jaratszam) VALUES ('$nev', $darab, '$jaratszam')";
        
        if (mysqli_query($conn, $sql)) {
            echo json_encode(["uzenet" => "Sikeres foglalás"]);
        } else {
            echo json_encode(["uzenet" => "Hiba a foglalás mentésekor"]);
        }
    } else {
        echo json_encode(["uzenet" => "Hiányzó adatok"]);
    }
}

mysqli_close($conn);
?>

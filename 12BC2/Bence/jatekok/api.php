<?php
header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "", "nyilvantartas_db");
if (!$conn) {
    die(json_encode(["uzenet" => "Database connection failed"]));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    
    $cim = mysqli_real_escape_string($conn, $data["cim"]);
    $platform = mysqli_real_escape_string($conn, $data["platform"]);

    $sql = "INSERT INTO `jatekok`(`cim`, `platform`) VALUES ('$cim','$platform')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo json_encode(["uzenet" => "Sikeres rögzites"]);
    } else {
        echo json_encode(["uzenet" => "Sikerteloen rögzites"]);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT cim, platform FROM jatekok";
    $result = mysqli_query($conn, $sql);
    $lista = array();
    while ($sor = mysqli_fetch_assoc($result)) {
        array_push($lista, $sor);
    }
    echo json_encode($lista);
}

mysqli_close($conn);
?>

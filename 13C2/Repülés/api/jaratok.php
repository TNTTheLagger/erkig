<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require 'db.php';


if (isset($_GET['honnanhova'])) {
    $honnanhova = explode("-", $_GET['honnanhova']); 
    $honnan = !empty($honnanhova[0]) ? trim($honnanhova[0]) : "";
    $hova = !empty($honnanhova[1]) ? trim($honnanhova[1]) : "";

    $sql = "SELECT * FROM jaratok WHERE 1=1";

    if (!empty($honnan)) {
        $sql .= " AND honnan = '".mysqli_real_escape_string($conn, $honnan)."'";
    }

    if (!empty($hova)) {
        $sql .= " AND hova = '".mysqli_real_escape_string($conn, $hova)."'";
    }

    $result = mysqli_query($conn, $sql);
    $jaratok = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $jaratok[] = $row;
    }

    echo json_encode($jaratok);
} else {
    echo json_encode(["uzenet" => "Hibás kérés"]);
}

mysqli_close($conn);
?>

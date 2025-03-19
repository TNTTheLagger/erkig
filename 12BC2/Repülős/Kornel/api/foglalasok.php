<?php

$conn = mysqli_connect("localhost","root","","repules_db");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $data = json_decode(file_get_contents("php://input"),true);
    $nev = $data["nev"];
    $darab = $data["darab"];
    $jaratszam = $data["jaratszam"];
    $sql = "INSERT INTO foglalasok (nev, darab, jaratszam) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt,"sis",$nev, $darab, $jaratszam);
    mysqli_stmt_execute($stmt);
}
if ($_SERVER["REQUEST_METHOD"]=="GET"){
    $sql = "SELECT * FROM foglalasok";
    $result = mysqli_query($conn, $sql);
    $listakuld = array();
    while ($sor = mysqli_fetch_assoc($result)){
        array_push($listakuld,$sor);
    }
    echo json_encode($listakuld);
}
if ($_SERVER["REQUEST_METHOD"]=="DELETE"){
    $id = $_GET["id"];
    $sql = "DELETE FROM foglalasok WHERE foglalasid = $id";
    mysqli_query($conn, $sql);
}

?>
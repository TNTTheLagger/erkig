<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    $conn= mysqli_connect("localhost","root", "","tabor_db");
    $data = json_decode(file_get_contents("php://input"),true);
    $nev = $data["nev"];
    $kor = $data["kor"];
    $sql = "INSERT INTO `diakok`(`nev`, `kor`) VALUES ('$nev', $kor)";
    mysqli_query($conn,$sql);

?>
<?php

$conn = mysqli_connect("localhost","root","","repules_db");
header("Access-Control-Allow-Origin: *");
$data = $_GET["honnanhova"];
$lista = explode("-",$data);
$honnan = "%".$lista[0]."%";
$hova = "%".$lista[1]."%";
$sql = "SELECT * FROM jaratok WHERE honnan LIKE ? AND hova LIKE ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt,"ss",$honnan, $hova);
if (mysqli_stmt_execute($stmt)){
    $result = mysqli_stmt_get_result($stmt);
    $listakuld = array();
    while ($sor = mysqli_fetch_assoc($result)){
        array_push($listakuld,$sor);
    }
    echo json_encode($listakuld);
}






?>
<?php
header("Content-Type:application/json");
$conn= mysqli_connect("localhost","root","","recept_db");

$method = $_SERVER["REQUEST_METHOD"];
if ($method=="POST")
{
    $data = json_decode(file_get_contents("php://input"),true);
    $nev = $data["nev"];
    $sql = "INSERT INTO `hozzavalok`(`nev`) VALUES ('$nev')";
    mysqli_query($conn,$sql);
}
elseif($method == "DELETE"){
    $uri = $_SERVER["REQUEST_URI"];
    $lista = explode("/",$uri);
    $id = $lista[3];
    $sql = "DELETE FROM hozzavalok WHERE id = $id";
    mysqli_query($conn,$sql);

}

?>
<?php
$conn = $conn = mysqli_connect("localhost","root","","etterem_db");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = json_decode(file_get_contents("php://input"),true);
    $asztal = $data["asztal"];
    $etelid = $data["etelid"];
    $mennyiseg = $data["mennyiseg"];
    $sql = "INSERT INTO `rendelesek`(`asztal`, `etelid`, `mennyiseg`) VALUES ($asztal,$etelid,$mennyiseg)";
    mysqli_query($conn, $sql);
    echo "OK";
}
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $sql = "SELECT statusz , `nev` , `asztal`, `etelid`, `mennyiseg`, rendelesek.id FROM `rendelesek`, etelek WHERE etelek.id = rendelesek.etelid";
    $result = mysqli_query($conn,$sql);
    $etelek = array();
    while($sor = mysqli_fetch_assoc($result))
    {
        array_push($etelek,$sor);
    }
    echo json_encode($etelek);
}
if($_SERVER["REQUEST_METHOD"] == "DELETE")
{
    $id = $_GET["id"];
    $sql = "DELETE FROM `rendelesek` WHERE rendelesek.id=$id";
    mysqli_query($conn,$sql);
}
if($_SERVER["REQUEST_METHOD"] == "UPDATE")
{

    $id = $_GET["id"];
    $sql = "UPDATE `rendelesek` SET `statusz`='1' WHERE id = $id";
    mysqli_query($conn, $sql);
    echo "OK";
}

?>
<?php

$conn = mysqli_connect("localhost","root","","etterem_db");

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $sql = "SELECT `id`,`nev` FROM `etelek`";
    $result = mysqli_query($conn,$sql);
    $etelek = array();
    while($sor = mysqli_fetch_assoc($result))
    {
        array_push($etelek,$sor);
    }
    echo json_encode($etelek);
}
?>
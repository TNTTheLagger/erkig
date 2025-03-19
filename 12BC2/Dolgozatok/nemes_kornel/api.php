<?php
header("'Content-Type':'application/json'");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = json_decode(file_get_contents("php://input"));
    $epitkezes = $data["epitkezes"];
    $emberek = $data["emberek"];
    $epitkezes_kezdete = $data["epitkezes_kezdete"];
    $famennyiseg = $data["famennyiseg"];
    $teglamennyiseg = $data["teglamennyiseg"];
    $femmennyiseg = $data["femmennyiseg"];
    $conn = mysqli_connect("localhost","root","","epitkezes_db");
    $sql = "INSERT INTO `epulet`(`epitkezes`, `emerek`, `epitkezes_kezdete`, `famennyiseg`, `teglamennyiseg`, `femmennyiseg`) VALUES ('$epitkezes',$emberek,'$epitkezes_kezdete', $famennyiseg, $teglamennyiseg, $femmennyiseg)";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        echo "feltoltottuk";
    }
}

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $conn = mysqli_connect("localhost","root","","epitkezes_db");
    $sql = "SELECT * FROM `epulet`";
    $result = mysqli_query($conn,$sql);
    $lista = array();
    while($row = mysqli_fetch_assoc($result))
    {
        array_push($lista,$row);
    }
    echo json_encode($lista);
}

?>
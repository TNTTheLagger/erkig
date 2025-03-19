<?php
    header("Content-Type:application/json");

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($_SERVER['REQUEST_METHOD'] == "GET")
    {
        $sql = "SELECT * FROM `bloggok`";
        $result = mysqli_query($conn, $sql);
        $lista = array();
        while($sor = mysqli_fetch_assoc($result))
        {
            array_push($lista, $sor);
        }
        echo json_encode($lista);
    }
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {   
        
        $data = json_decode(file_get_contents('php://input'), true);
        $nev = $data["nev"];
        $kor = $data["kor"];
        $tema = $data["tema"];
        $poszt = $data["poszt"];
        
        $sql = "INSERT INTO `bloggok`(`nev`, `kor`, `tema`, `poszt`) VALUES ('$nev','$kor','$tema','$poszt')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            echo json_encode(["uzenet" => "Sikeres feltoltes"]);
        }
        else
        {
            echo json_encode(["uzenet" => "Sikertelen feltoltes"]);
        }
    }
?>
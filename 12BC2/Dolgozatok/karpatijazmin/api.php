<?php

    header("Content-Type: application/json");

    $conn = mysqli_connect("localhost","root","","alkotasok_db");
    if ($conn -> connect_error) 
    {
        die(json_encode(['status' => 'error', 'message' => 'Sikertelen elérés: ' . $conn->connect_error]));
    }

    if ($_SERVER['REQUEST_METHOD'] == "GET") 
    {
        $sql = "SELECT `nev`, `tipus` FROM `alkotasok` WHERE 1";
        $result = mysqli_query($conn,$sql);
        $lista = array();
        while ($sor = mysqli_fetch_assoc($result))
        {
            array_push($lista,$sor);
        }
        echo json_encode($lista);
    }
    elseif($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $data = json_decode(file_get_contents('php://input'),true);
        $nev = $data["nev"];
        $tipus = $data["tipus"];

        $sql = "INSERT INTO `alkotasok`(`nev`, `tipus`) VALUES ('$nev','$tipus')";
        $result = mysqli_query($conn,$sql);
        if ($result)
        {
            echo json_encode(["uzenet" => "sikeres rogzites"]);
        }
        else
        {
            echo json_encode(["uzenet" => "sikertelen rogzites"]);
        }
    }

    $conn -> close();


?>
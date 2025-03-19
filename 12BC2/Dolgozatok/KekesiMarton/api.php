<?php
    header("Content-Type:application/json");
 
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "autok_db"; 
 
    $conn = new mysqli($servername, $username, $password, $dbname);
 
    if ($_SERVER['REQUEST_METHOD'] == "GET")
    {
        $sql = "SELECT `nev`, `marka`, `motor` FROM `autok` WHERE 1";
        $result = mysqli_query($conn, $sql);
        $tomb = array();
            while ($sor = mysqli_fetch_assoc($result)) 
            {
                array_push($tomb,$sor);
            }
            echo json_encode($tomb);
            
    }
 
    else if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $nev = $data["nev"];
        $marka = $data["marka"];
        $motor = $data["motor"];
        $sql = "INSERT INTO `autok`(`nev`, `marka`, `motor`) VALUES ('$nev','$marka', '$motor')";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
            echo json_encode(["uzenet" => "sikeres rogzites"]);
        }
        else
        {
            echo json_encode(["uzenet" => "sikertelen rogzites"]);
        }
    }
 
    $conn->close();
?>
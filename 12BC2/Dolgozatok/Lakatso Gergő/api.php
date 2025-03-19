<?php
    header("Content-Type: application/json");

    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "autok_db"; 

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error)
    {
        die(json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $conn->connect_error]));
    }

    if ($_SERVER['REQUEST_METHOD'] == "GET")
    {
        $sql = "SELECT `Rendszám`, `Márka` FROM `adatok` WHERE 1";
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
        $rendszám = $data["rendszám"];
        $márka = $data["márka"];
        $sql = "INSERT INTO `adatok`(`Rendszám`, `Márka`) VALUES ('$rendszám','$márka')";
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
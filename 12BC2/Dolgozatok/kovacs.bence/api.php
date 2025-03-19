<?php
 
header("Content-Type: application/json");
 
$conn = new mysqli("localhost", "root", "", "allatok_db");
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $conn->connect_error]));
}
 
if ($_SERVER['REQUEST_METHOD'] == "GET")
{
    $sql = "SELECT Nev, Kategoria, Eletkor FROM adatok WHERE 1";
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
    $kategoria = $data["kategoria"];
    $eletkor = $data["eletkor"];
    $sql = "INSERT INTO adatok (Nev, Kategoria, Eletkor) VALUES ('$nev', '$kategoria', $eletkor)";
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
<?php
    headers("Content-Type : applications/json");
    $conn = mysqli_connect("localhost", "root", "", "iskola");
    $rawr = file_get_contents("php://input");
    $data = json_decode($rawr, true);
    var_dump($data);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $nev = $data["nev"];
        $osztaly = $data["osztaly"];
        $sql = "INSERT INTO `diakok`(`nev`, `osztaly`) VALUES ('$nev','$osztaly')";
        $result = mysqli_query($conn, $sql);
    }
    echo json_encode($result);


?>
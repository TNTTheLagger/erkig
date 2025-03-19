<?php
    include "conn.php";
    header("Content-Type: application/json");
    $lekedezesTipus = $_SERVER["REQUEST_METHOD"];
    $input = json_decode(file_get_contents("php://input"), true);

    switch ($lekedezesTipus) {
        case "GET":
            if (isset($_GET["megnevezes"])) {
                $megnevezes = $_GET["megnevezes"];
                $sql = "SELECT * FROM `esemenyek` WHERE megnevezes = `$megnevezes`";
            } else {
                $sql = "SELECT * FROM `esemenyek`";
            }
            $result = mysqli_query($conn, $sql);
            $esemenyek = [];
            while ($sor = mysqli_fetch_assoc($result)) {
                $esemenyek[] = $sor;
            }
            echo json_encode($esemenyek);
            break;
        case "POST":
            $megnevezes = $input["megnevezes"];
            $idopont = $input["idopont"];
            $sql = "INSERT INTO `esemenyek`(`megnevezes`, `idopont`, `lezajlott`) VALUES ('$megnevezes','$idopont',0)";
            mysqli_query($conn, $sql);
            echo "Esemény sikeresen rögzítve.";
            break;
        case "PUT":
            $id = $_GET["id"];
            $sql = "UPDATE `esemenyek` SET `lezajlott`=1 WHERE id = $id";
            echo "Esemény sikeresen frissítve.";
            break;
    }
?>
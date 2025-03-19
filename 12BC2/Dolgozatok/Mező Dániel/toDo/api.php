<?php
    $conn = mysqli_connect("localhost", "root", "", "todo_db");
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $data = json_decode(file_get_contents("php://input"), true);
        $teendo = $data["teendo"];
        $datum = $data["datum"];
        $sql = "INSERT INTO `todo`(`teendo`, `datum`) VALUES ('$teendo','$datum')";
        $result = mysqli_query($conn, $sql);
       
        
        if($result) {
            echo "Sikeres rögzítés";
        } else {
            echo "Sikertelen rögzítés";
        }
    } else if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $sql = "SELECT * FROM todo";
        $result = mysqli_query($conn, $sql);
        $lista = array();
        while ($sor = mysqli_fetch_array($result)) {
            array_push($lista, $sor);
        }
        echo json_encode($lista);
    } else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data["id"];
        for ($i=0; $i < count($id); $i++) { 
            $sql = "DELETE FROM `todo` WHERE todo.id = $id[$i]";
            $result = mysqli_query($conn, $sql);
        }
        echo json_encode($id);
    }
?>
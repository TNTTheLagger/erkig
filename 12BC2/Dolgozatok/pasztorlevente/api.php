<?php 
    $conn = mysqli_connect("localhost", "root", "", "konyvek_db");
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $sql = "SELECT * FROM konyv";
        $lista = array();
        $result = mysqli_query($conn, $sql);
        while($sor = mysqli_fetch_assoc($result)){
            array_push($lista, $sor);
        }
        echo json_encode($lista);
    } 
    else if($_SERVER['REQUEST_METHOD'] == "POST") {
        $data = json_decode(file_get_contents('php://input'), true);
        $cim = $data["cim"];
        $hatarido = $data["hatarido"];
        $sql = "INSERT INTO `konyv`(`cim`, `hatarido`) VALUES ('$cim','$hatarido')";
        $result = mysqli_query($conn, $sql);
        if($result == true){
            echo json_encode(["uzenet" => "Feltöltés sikeres"]);
        } else {
            echo json_encode(["uzenet" =>"Nem sikerült rögzíteni"]);
        }
    }
?>
<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    $conn= mysqli_connect("localhost","root", "","tabor_db");

    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {    
        $data = json_decode(file_get_contents("php://input"),true);
        $diakid = $data["diakid"];
        $tabor = $data["tabor"];
        $sql = "INSERT INTO `jelentkezesek`(`diakid`, `tabor`) VALUES ($diakid, '$tabor')";
        mysqli_query($conn,$sql);
    }
    if ($_SERVER["REQUEST_METHOD"]=="GET")
    { 
        $sql  = "SELECT diakok.nev, jelentkezesek.tabor FROM jelentkezesek, diakok WHERE jelentkezesek.diakid = diakok.id";
        $result = mysqli_query($conn,$sql);
        $lista=array();
        while ($sor = mysqli_fetch_assoc($result))
        {
            array_push($lista,$sor);
        }
        echo json_encode($lista);
    }

    

?>
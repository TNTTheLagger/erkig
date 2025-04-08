<?php
$conn = $conn = mysqli_connect("localhost","root","","etterem_db");
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $sql = "SELECT 
    etelek.nev AS etel_nev,
    SUM(rendelesek.mennyiseg) AS ossz_mennyiseg
FROM 
    rendelesek
INNER JOIN 
    etelek ON etelek.id = rendelesek.etelid
GROUP BY 
    etelek.nev
ORDER BY 
    etelek.nev ASC

";
    $result = mysqli_query($conn,$sql);
    $etelek = array();
    while($sor = mysqli_fetch_assoc($result))
    {
        array_push($etelek,$sor);
    }
    echo json_encode($etelek);
}


?>
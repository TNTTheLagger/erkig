<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  $tipus = $data['tipus'];
  $zsak = $data['zsak'];
  $szalitas = $data['szalitas'];
  $megjegyzes = $data['megjegyzes'];

  $conn = mysqli_connect("localhost", "root", "", "fu_db");
  $sql = "INSERT INTO behejezett (tipus, zsak, szalitas, megjegyzes) VALUES ('$tipus', $zsak, '$szalitas', '$megjegyzes')";
  $result = mysqli_query($conn, $sql);

} 

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    $conn = mysqli_connect("localhost", "root", "", "fu_db");
    $sql = "SELECT * FROM behejezett";
    $result = mysqli_query($conn, $sql);

    $data = array();
    while($row = mysqli_fetch_assoc($result)) {
      array_push($data, $row);
    }
    echo json_encode($data);
}
?>
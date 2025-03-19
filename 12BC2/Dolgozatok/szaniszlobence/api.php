<?php

header("Content-Type: application/json");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forum_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $conn->connect_error]));
}

$response = ['status' => 'error', 'message' => 'Unknown request method'];

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $sql = "SELECT id, lenyilo, content FROM posts";
        $result = mysqli_query($conn, $sql);

        $posts = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($posts, $row);
        }
        $response = ['status' => 'success', 'data' => $posts];
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['lenyilo']) && isset($data['content'])) {
            $lenyilo = $data['lenyilo'];
            $content = $data['content'];

            if (!empty($lenyilo) && !empty($content)) {
                $sql = "INSERT INTO posts (lenyilo, content) VALUES ('$lenyilo', '$content')";
                if ($conn->query($sql) === TRUE) {
                    $response = ['status' => 'success', 'message' => 'Post successfully created'];
                } else {
                    $response = ['status' => 'error', 'message' => 'Failed to create post'];
                }
            } else {
                $response = ['status' => 'error', 'message' => 'Invalid input data'];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'Missing input data'];
        }
        break;

    default:
        $response = ['status' => 'error', 'message' => 'Invalid request method'];
}

echo json_encode($response);
$conn->close();

?>

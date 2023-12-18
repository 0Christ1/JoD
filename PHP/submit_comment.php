<?php
$servname = "localhost";
$username = "root";
$password = "";
$dbname = "JOD";

$conn = new mysqli($servname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$share_id = isset($_POST['share_id']) ? intval($_POST['share_id']) : 0;
$comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

if (empty($comment)) {
    echo "Comment cannot be empty.";
    exit;
}

$share_id = $conn->real_escape_string($share_id);
$comment = $conn->real_escape_string($comment);

$sql = "INSERT INTO discuss (share_id, comment) VALUES ('$share_id', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "New comment added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


header("Location: ../Homepage/index.php");
?>

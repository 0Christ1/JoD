<?php
$servname = "localhost";
$username = "root";
$password = "";
$dbname = "JOD";

$conn = new mysqli($servname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$id = $conn->real_escape_string($id);

$sql_share = "SELECT title, dreamer, content FROM share WHERE id = '$id'";
$result_share = $conn->query($sql_share);

if ($result_share->num_rows > 0) {

    $row_share = $result_share->fetch_assoc();
    echo "<button style='margin-left: 20px'; onclick='window.location.href = \"index.php\";'>Back to homepage</button>";
    echo "<div style='margin: 20px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; max-width: 897px; height: 48vh; overflow-y: auto;'>";
    echo "<h1 style='color: #3366cc;'>" . htmlspecialchars($row_share["title"]) . ' - ' . htmlspecialchars($row_share["dreamer"]) . "</h1>";
    echo "<p style='font-size: 16px;'>" . nl2br(htmlspecialchars($row_share["content"])) . "</p>";

    $sql_discuss = "SELECT comment FROM discuss WHERE share_id = '$id'";
    $result_discuss = $conn->query($sql_discuss);

    echo "<h2 style='color: #3366cc;'>Discussion</h2>";

    if ($result_discuss->num_rows > 0) {
        while ($row_discuss = $result_discuss->fetch_assoc()) {
            echo "<p style='font-size: 16px;'>" . nl2br(htmlspecialchars($row_discuss["comment"] ?? '')) . "</p>";
        }
    } else {
        echo "<p>No comments yet.</p>";
    }
    echo "</div>";
    echo "<div style='margin: 20px;'>";
    echo "<h3>Leave your Comment</h3>";
    echo "<form action='../PHP/submit_comment.php' method='post'>";
    echo "<input type='hidden' name='share_id' value='" . htmlspecialchars($id) . "'>";
    echo "<textarea name='comment' style='width: 100%; height: 100px; resize: none;'></textarea><br>";
    echo "<input type='submit' value='Submit Comment'>";
    echo "</form>";
    echo "</div>";
}

$conn->close();
?>

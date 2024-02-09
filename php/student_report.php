<?php
$dbhost = "localhost";
$username = "root";
$password = "";
$dbname = "rlcmrs_dtb";

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}

$building = $_POST['building'];
$room = $_POST['room'];
$problem = $_POST['problem'];
$course = $_POST['course'];
$professor = $_POST['professor'];
$commentType = $_POST['commentType'];
$commentText = isset($_POST['commentField']) ? $_POST['commentField'] : null;

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO student_report_tbl (building, room, problem, course, professor, comment_type, comment_text) VALUES (?, ?, ?, ?, ?, ?, ?)");

// Check if the prepared statement was successfully created
if ($stmt === false) {
    die('Error in preparing the statement: ' . $conn->error);
}

$stmt->bind_param("sssssss", $building, $room, $problem, $course, $professor, $commentType, $commentText);

// Check if the prepared statement was successfully bound
if ($stmt === false) {
    die('Error in binding parameters: ' . $stmt->error);
}

if ($stmt->execute()) {
    echo '<script>window.location.href = "../student_statistics.php";</script>';
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<?php
$dbhost = "localhost";
$username = "root";
$password = "";
$dbname = "rlcmrs_dtb";

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}

$student_number = isset($_POST['stdNumber']) ? $_POST['stdNumber'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($student_number) || empty($password)) {
    die("Invalid input data");
}

$sql = "SELECT * FROM student_registration_tbl WHERE student_number = '$student_number' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: ../student_home.html");  // Corrected redirection
    exit();
} else {
    echo "Invalid login credentials";
}

$conn->close();
?>
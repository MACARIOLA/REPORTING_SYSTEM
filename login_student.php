<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $student_number = $_POST['student_number'];
    $password = $_POST['password'];

    // Database Connection
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "rlcmrs_dtb";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate login authentication
    $query = "SELECT * FROM student_registration_tbl WHERE student_number ='$student_number' AND password ='$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Login success, redirect to student_home.html
        header("Location: student_home.html");
        exit();
    } else {
        // Login failed, redirect to login_student.html
        header("Location: login_student.html");
        // Optionally, you can include an error message in the URL query string
        // header("Location: login_student.html?error=1");
        exit();
    }

    $conn->close();
}
?>

<?php
session_start();

$dbhost = "localhost";
$username = "root";
$password = "";
$dbname = "rlcmrs_dtb";

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['uname'];

    // Check if the email exists in any table
    $result_faculty = mysqli_query($conn, "SELECT * FROM faculty_registration_tbl WHERE email='$email'");
    $result_maintenance = mysqli_query($conn, "SELECT * FROM maintenance_registration_tbl WHERE email='$email'");
    $result_student = mysqli_query($conn, "SELECT * FROM student_registration_tbl WHERE email='$email'");

    if (mysqli_num_rows($result_faculty) > 0 || mysqli_num_rows($result_maintenance) > 0 || mysqli_num_rows($result_student) > 0) {
        // Email exists, redirect to confirm.html
        header("Location: confirm.php");
        exit();
    } else {
        // Email does not exist, handle accordingly (e.g., show an error message)
        $_SESSION['error_message'] = "Email not found. Please try again.";
        echo "<script>alert('Email not found. Please try again.');</script>";
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PUP - RLCMRS | FORGOT PASSWORD</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">

    <!-- LOGO -->
    <link rel="icon" href="images/PUPLogo.png" type="image/x-icon">

    <!-- MAIN CSS -->
    <link rel="stylesheet" type="text/css" href="css/forgotpassword.css">
</head>

<body class="page-container">
    <!-- CONTENTS -->
    <div class="content-container">
        <p class="university-text"><b> POLYTECHNIC UNIVERSITY OF THE PHILIPPINES </b> </p>
        <p class="system-name">ROOM AND LABORATORY <br> CLEANLINESS AND MAINTENANCE REPORTING SYSTEM</p>

        <form id="searchForm" method="post" action="forgotpassword.php">
            <div class="forgot-password-container">
                <div class="form-group">
                    <p class="instruction">YOU FORGOT YOUR PASSWORD? <br> YOU CAN EASILY REQUEST A <br> NEW PASSWORD HERE.</p>
                    <label for="uname"> ENTER YOUR EMAIL: </label>
                    <input type="text" name="uname" required>
                </div>
            </div>

            <div class="buttons-container">
                <button id="requestBtn" class="request-btn" type="submit">REQUEST</button>
                <hr class="separator">
                <button id="loginBtn" class="login-btn" onclick="goBack()">LOGIN</button>
            </div>
        </form>
    </div>

    <!-- MAIN SCRIPT -->
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
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
    if(isset($_POST['saveBtn'])) {
        $newPassword = $_POST['newPassword'];
        $email = $_SESSION['email']; 
        
        // Update password in faculty_registration_tbl
        $sql_faculty = "UPDATE faculty_registration_tbl SET `password`='$newPassword' WHERE `email`='$email'";
        $result_faculty = mysqli_query($conn, $sql_faculty);

        // Update password in maintenance_registration_tbl
        $sql_maintenance = "UPDATE maintenance_registration_tbl SET `password`='$newPassword' WHERE `email`='$email'";
        $result_maintenance = mysqli_query($conn, $sql_maintenance);

        // Update password in student_registration_tbl
        $sql_student = "UPDATE student_registration_tbl SET `password`='$newPassword' WHERE `email`='$email'";
        $result_student = mysqli_query($conn, $sql_student);

        if($result_faculty && $result_maintenance && $result_student) {
            echo "<script>alert('Password updated successfully!'); window.location.href = 'front_page.html';</script>";
            exit(); // Exit to prevent further execution
        } else {
            $_SESSION['error_message'] = "Error updating password: " . mysqli_error($conn);
            echo "<script>alert('Email not found. Please try again.'); window.location.href = 'front_page.html';</script>";
            exit(); // Exit to prevent further execution
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>PUP - RLCMRS | CONFIRM PASSWORD</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">

    <!-- LOGO -->
    <link rel="icon" href="images/PUPLogo.png" type="image/x-icon">

    <!-- MAIN CSS -->
    <link rel="stylesheet" type="text/css" href="css/confirm.css">
</head>

<body class="page-container">
    <!-- CONTENTS -->
    <div class="content-container">
        <p class="university-text"><b> POLYTECHNIC UNIVERSITY OF THE PHILIPPINES </b> </p>
        <p class="system-name">ROOM AND LABORATORY <br> CLEANLINESS AND MAINTENANCE REPORTING SYSTEM</p>

        <form id="passwordForm" method="post" action="">
            <div class="forgot-password-container">
                <div class="form-group">
                    <label for="newPassword"> INPUT YOUR <br> NEW PASSWORD HERE: </label>
                    <input type="password" name="newPassword" required>
                </div>
            </div>

            <div class="buttons-container">
                <button id="saveBtn" class="save-btn" type="submit" name="saveBtn">SAVE</button>
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

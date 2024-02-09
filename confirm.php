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
    $newPassword = $_POST['newPassword'];

    // Retrieve the email from the session or however you have stored it
    $email = $_SESSION['email'];

    // Update the password in the appropriate table based on the email
    $update_faculty = mysqli_query($conn, "UPDATE faculty_registration_tbl SET password='$newPassword' WHERE email='$email'");
    $update_maintenance = mysqli_query($conn, "UPDATE maintenance_registration_tbl SET password='$newPassword' WHERE email='$email'");
    $update_student = mysqli_query($conn, "UPDATE student_registration_tbl SET password='$newPassword' WHERE email='$email'");

    if ($update_faculty || $update_maintenance || $update_student) {
        // Password updated successfully, you may redirect to a success page
        header("Location: confirm.php");
        exit();
    } else {
        // Failed to update password, handle accordingly
        $_SESSION['error_message'] = "Failed to update password. Please try again.";
        header("Location: confirm.php");
        exit();
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

        <form id="passwordForm" method="post" action="confirm.php">
            <div class="forgot-password-container">
                <div class="form-group">
                    <label for="newPassword"> INPUT YOUR <br> NEW PASSWORD HERE: </label>
                    <input type="password" name="newPassword" required>
                </div>
            </div>

            <div class="buttons-container">
                <button id="saveBtn" class="save-btn" type="submit">SAVE</button>
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
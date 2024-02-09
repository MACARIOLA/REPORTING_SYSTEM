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
        // Assuming you're passing the email through session from forgotpassword.php
        $email = $_SESSION['email']; 
        
        // Update the password in the database
        $sql = "UPDATE faculty_registration_tbl SET `password`='$newPassword' WHERE `email`='$email'";
        $result = mysqli_query($conn, $sql);
        
        if($result) {
            echo "Password updated successfully!";
        } else {
            echo "Error updating password: " . mysqli_error($conn);
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

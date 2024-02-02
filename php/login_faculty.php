<?php
$dbhost = "localhost";
$username = "root";
$password = "";
$dbname = "rlcmrs_dtb";

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}

$username = isset($_POST['faculty_username']) ? $_POST['faculty_username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($username) || empty($password)) {
    die("Invalid input data");
}

$sql = "SELECT * FROM faculty_registration_tbl WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: ../faculty_home.html");  // Corrected redirection
    exit();
} else {
    // Display popup with JavaScript
    echo "<script>
            alert('Invalid login credentials');
            window.location.href = '../login_faculty.html';
          </script>";
}

$conn->close();
?>

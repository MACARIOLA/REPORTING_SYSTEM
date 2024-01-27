<?php
$dbhost = "localhost";
$username = "root";
$password = "";
$dbname = "rlcmrs_dtb";

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve and sanitize form data
    $first_name = mysqli_real_escape_string($conn, $_POST["fname"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $task = mysqli_real_escape_string($conn, $_POST["task"]);
    $username = mysqli_real_escape_string($conn, $_POST["uname"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

    // SQL query to insert data into the registration_tbl using prepared statement
    $sql = "INSERT INTO maintenance_registration_tbl (first_name, last_name, email, task, username, password) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $last_name, $email, $task, $username, $password);

    // Execute the query
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to login_faculty.html using JavaScript
        echo '<script>window.location.href = "../login_maintenance.html";</script>';
    }
    
    else {
        // Echo the error message along with the SQL error
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);
}
?>

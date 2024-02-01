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
    $course = mysqli_real_escape_string($conn, $_POST["course"]);
    $student_number = mysqli_real_escape_string($conn, $_POST["stdNumber"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);


    // SQL query to insert data into the registration_tbl using prepared statement
    $sql = "INSERT INTO student_registration_tbl (first_name, last_name, email, course, student_number, password) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $last_name, $email, $course, $student_number, $password);

    // Execute the query
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to login_student.html using JavaScript
        echo '<script>window.location.href = "../login_student.html";</script>';
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

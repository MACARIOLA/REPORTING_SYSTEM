<?php
$dbhost = "localhost";
$username = "root";
$password = "";
$dbname = "rlcmrs_dtb";

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}

// Fetch data from the database (include 'state' column in the query)
$sql = "SELECT id, room, timestamp, `Date End`, state FROM student_report_tbl ORDER BY timestamp DESC";
$result = $conn->query($sql);

if ($result) {
    $data = $result->fetch_all(MYSQLI_ASSOC);

    // Handle form submission
    if (isset($_POST['save_btn'])) {
        foreach ($_POST['custom_field'] as $key => $value) {
            $id = $data[$key]['id'];
            $dateEnd = mysqli_real_escape_string($conn, $value);

            // Check if 'state' key exists and is not null
            $state = isset($data[$key]['state']) && $data[$key]['state'] !== null
                ? mysqli_real_escape_string($conn, $_POST['state'][$key])
                : '';

            $updateSql = "UPDATE student_report_tbl SET `Date End`='$dateEnd', `state`='$state' WHERE `id`='$id'";
            $updateResult = $conn->query($updateSql);

            if (!$updateResult) {
                echo "Error updating record: " . $conn->error;
            }
        }

        // Fetch updated data after submission
        $result = $conn->query("SELECT id, room, timestamp, `Date End`, state FROM student_report_tbl ORDER BY timestamp DESC");
        $data = $result->fetch_all(MYSQLI_ASSOC);
    }

    echo '<!DOCTYPE html>
<html lang="en">

<head>
    <title>PUP - RLCMRS | STATUS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">

    <!-- LOGO -->
    <link rel="icon" href="images/PUPLogo.png" type="image/x-icon">
    
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/maintenance_status.css">
</head>

<body>
    <!-- NAVIGATION BAR -->
    <header>
        <nav>
            <ul>
                <li><a href="maintenance_home.html" id="home">Home</a></li>
                <li><a href="maintenance_statistics.php" id="statistics">Statistics</a></li>
                <li class="active"><a href="maintenance_status.php" id="status">Status</a></li>
            </ul>
        </nav>
    </header>

    <!-- STATUS -->
    <main>
        <div class="spacer"></div>
        <div class="table-section">
            <div class="table-container">
                <form method="post" action="">
                    <table class="status-table">
                        <thead>
                            <tr>
                                <th>Room/Laboratory</th>
                                <th>State</th>
                                <th>Date-Started</th>
                                <th>Date-Finished</th>
                                <th>Update State</th>
                            </tr>
                        </thead>
                        <tbody>';
                        foreach ($data as $key => $row) {
                            echo '<tr>
                                    <td>' . $row['room'] . '</td>
                                    <td class="state-cell">
                                        <select name="state[]">
                                            <option value="standby" ' . ($row['state'] == 'standby' ? 'selected' : '') . '>Standby</option>
                                            <option value="cleaning" ' . ($row['state'] == 'cleaning' ? 'selected' : '') . '>Cleaning</option>
                                            <option value="fixing" ' . ($row['state'] == 'fixing' ? 'selected' : '') . '>Fixing</option>
                                            <option value="replacing" ' . ($row['state'] == 'replacing' ? 'selected' : '') . '>Replacing</option>
                                            <option value="done" ' . ($row['state'] == 'done' ? 'selected' : '') . '>Done</option>
                                        </select>
                                    </td>
                                    <td>' . ($row['timestamp'] == '0000-00-00 00:00:00' ? '---' : $row['timestamp']) . '</td>
                                    <td><input type="text" name="custom_field[]" placeholder="YYYY-MM-DD" pattern="\d{4}-\d{2}-\d{2}" title="Please enter a valid date (YYYY-MM-DD)" value="' . (isset($_POST['custom_field'][$key]) ? htmlspecialchars($_POST['custom_field'][$key]) : '') . '" /></td>
                                    <td> <button type="submit" name="save_btn" class="save-btn">SAVE</button> </td>
                                  </tr>';
                        }
                    echo '</tbody>
                    </table>
                </form>
            </div>
        </div>
    </main>

<!-- MAIN SCRIPT -->
<script>
    function createDropdown(cell) {
        var select = document.createElement("select");
        select.onchange = function () {
            updateStatus(this);
        };


        for (var i = 0; i < options.length; i++) {
            var option = document.createElement("option");
            option.value = options[i].toLowerCase();
            option.text = options[i];
            select.appendChild(option);
        }

        cell.appendChild(select);
    }

    function initializeDropdowns() {
        var stateCells = document.querySelectorAll(".state-cell");
        stateCells.forEach(function (cell) {
            createDropdown(cell);
        });
    }

    document.addEventListener("DOMContentLoaded", initializeDropdowns);
</script>

<!-- FOOTER -->
<footer>
    <table class="footer-table">
        <tr>
            <td class="contact-title">Contact Us:</td>
            <td class="contact-info">binan@pup.edu.ph</td>
            <td class="contact-info">(049) 513-5034</td>
            <td class="quick-links">Quick Links:</td>
            <td class="quick-links">
                <a href="https://www.pup.edu.ph/about/" class="footer-link">About us</a>
            </td>
            <td class="quick-links">
                <a href="https://www.pup.edu.ph/about/contactus" class="footer-link">Contacts</a>
            </td>
        </tr>
    </table>
</footer>
</body>

</html>';

$result->close();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>PUP - RLCMRS | STATISTICS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!---------------
              FONTS
        ---------------->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">

        <!---------------
              LOGO
        ---------------->
        <link rel="icon" href="images/PUPLogo.png" type="image/x-icon">
        
        <!---------------
            MAIN CSS
        ---------------->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/statistics.css">
    </head>



    <body>
        <!---------------
         NAVIGATION BAR
        ---------------->
        <header>
            <nav>
                <ul>
                    <li><a href="maintenance_home.html" id="home">Home</a></li>
                    <li class="active"><a href="maintenance_statistics.php" id="statistics">Statistics</a></li>
                    <li><a href="maintenance_status.php" id="status">Status</a></li>
                </ul>
            </nav>
        </header>



        <!---------------
           STATISTICS
        ---------------->
        <main>
            <div class="spacer"></div>
            <div class="table-section">
                <div class="table-container">
                    <table class="status-table">
                        <thead>
                            <tr>
                                <th>Building</th>
                                <th>Room / Laboratory</th>
                                <th>Problem</th>
                                <th>Course</th>
                                <th>Professor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $dbhost = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "rlcmrs_dtb";

                                $conn = mysqli_connect($dbhost, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Connection failed" . $conn->connect_error);
                                }
    
                            $sql = "SELECT * FROM student_report_tbl ORDER BY timestamp DESC";
                            $result = $conn->query($sql);
    
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['building'] . "</td>";
                                    echo "<td>" . $row['room'] . "</td>";
                                    echo "<td>" . $row['problem'] . "</td>";
                                    echo "<td>" . $row['course'] . "</td>";
                                    echo "<td>" . $row['professor'] . "</td>";
                                    echo "</tr>";
                                }
                            } 
                            
                            else {
                                echo "<tr><td colspan='5'>No records found</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
            


        <!---------------
             FOOTER
        ---------------->
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
                    <td class="quick-links logout"><a href="front_page.html">Logout</a></td>
                </tr>
            </table>
        </footer>
    </body>
</html>

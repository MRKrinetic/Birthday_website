<?php
// Database connection details
$host = "localhost"; // Change if using a remote server
$username = "birthday_user"; // Your database username
$password = "4118"; // Your database password
$dbname = "birthdayremainder"; // Your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get today's date in 'mm-dd' format
$today = date('m-d');

// Fetch birthdays from Working_info
$sql_working = "SELECT First_Name, Last_Name, Organization, Designation, contactno 
                FROM Working_info 
                WHERE DATE_FORMAT(DoB, '%m-%d') = '$today'";
$result_working = $conn->query($sql_working);

// Fetch birthdays from Students_info
$sql_students = "SELECT First_Name, Last_Name, Branch, contactno 
                 FROM Students_info 
                 WHERE DATE_FORMAT(DoB, '%m-%d') = '$today'";
$result_students = $conn->query($sql_students);

// Display results for Working_info
if ($result_working->num_rows > 0) {
    echo "<h3>Birthdays - Working Professionals</h3>";
    while ($row = $result_working->fetch_assoc()) {
        echo "Name: " . $row['First_Name'] . " " . $row['Last_Name'] . "<br>";
        echo "Organization: " . $row['Organization'] . ", Designation: " . $row['Designation'] . "<br>";
        echo "Contact No: " . $row['contactno'] . "<br><br>";
    }
} else {
    echo "<h3>No birthdays found for working professionals today.</h3>";
}

// Display results for Students_info
if ($result_students->num_rows > 0) {
    echo "<h3>Birthdays - Students</h3>";
    while ($row = $result_students->fetch_assoc()) {
        echo "Name: " . $row['First_Name'] . " " . $row['Last_Name'] . "<br>";
        echo "Branch: " . $row['Branch'] . "<br>";
        echo "Contact No: " . $row['contactno'] . "<br><br>";
    }
} else {
    echo "<h3>No birthdays found for students today.</h3>";
}

// Close the connection
$conn->close();
?>

<?php

$host = "localhost";
$username = "birthday_user"; 
$password = "4118"; 
$dbname = "birthdayremainder"; 


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$today = date('m-d');


$sql_working = "SELECT First_Name, Last_Name, Organization, Designation, contactno 
                FROM Working_info 
                WHERE DATE_FORMAT(DoB, '%m-%d') = '$today'";
$result_working = $conn->query($sql_working);


$sql_students = "SELECT First_Name, Last_Name, Branch, contactno 
                 FROM Students_info 
                 WHERE DATE_FORMAT(DoB, '%m-%d') = '$today'";
$result_students = $conn->query($sql_students);

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

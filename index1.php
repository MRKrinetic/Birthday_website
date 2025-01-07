<?php
$host = "sql112.infinityfree.com";
$username = "if0_38042314";
$password = "15619842Gawaree";
$dbname = "if0_38042314_Birthdaywish";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $conn->real_escape_string($_POST['First_Name']);
    $last_name = $conn->real_escape_string($_POST['Last_Name']);
    $type = $conn->real_escape_string($_POST['Type']);
    $dob = $conn->real_escape_string($_POST['DoB']);
    $organization = $designation = $class = $branch = $contactno = "";

    $contactno = $conn->real_escape_string($_POST['ContactNo']);

    if ($type == 'Student') {
        $class = $conn->real_escape_string($_POST['Class']);
        $branch = $conn->real_escape_string($_POST['Branch']);
    } elseif ($type == 'Working') {
        $organization = $conn->real_escape_string($_POST['Organization']);
        $designation = $conn->real_escape_string($_POST['Designation']);
    }

    if (isset($_FILES['Photograph']) && $_FILES['Photograph']['error'] == 0) {
        $image = file_get_contents($_FILES['Photograph']['tmp_name']);
    } else {
        echo "Error uploading image.";
        exit;
    }

    if ($type == 'Student') {
        $sql = "INSERT INTO Student_info (First_Name, Last_Name, Type, Class, Branch, DoB, Photograph, contactno) 
                VALUES ('$first_name', '$last_name', '$type', '$class', '$branch', '$dob', ?, ?)";
    } elseif ($type == 'Working') {
        $sql = "INSERT INTO Working_info (First_Name, Last_Name, Type, Organization, Designation, DoB, Photograph, contactno) 
                VALUES ('$first_name', '$last_name', '$type', '$organization', '$designation', '$dob', ?, ?)";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("bs", $image, $contactno);

    if ($stmt->execute()) {
        echo "New record created successfully in " . $type . " table.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Management</title>
    <style>
       body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f9;
                position: relative;
                overflow-y: scroll; /* This will ensure a scrollbar appears */
                height: 110vh; 
            }

            h1 {
                text-align: center;
                color: #333;
                margin-top: 20px;
            }

            form {
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 450px;
                margin: 0 auto;
                position: fixed; /* Fixes the form in place */
                top: 50%; /* Centers the form vertically */
                left: 50%; /* Centers the form horizontally */
                transform: translate(-50%, -50%); /* Corrects the centering */
                z-index: 1000; /* Keeps it above other content */
                width: 100%; /* Adjust width to fit smaller screens */
                max-width: 450px; /* Maximum width */
            }

            label {
                display: block;
                margin: 10px 0 5px;
            }

            input[type="text"], input[type="date"], input[type="file"], input[type="submit"], input[type="radio"] {
                width: 90%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }

            input[type="radio"] {
                width: auto;
                margin-right: 5px;
            }

            input[type="submit"] {
                background-color: #4CAF50;
                color: white;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #45a049;
            }

            .balloon {
                position: absolute;
                width: 60px;
                height: 80px;
                border-radius: 50%;
                animation: float 5s infinite;
            }

            .balloon:nth-child(1) {
                background-color: #ff69b4;
                left: 10%;
                animation-delay: 0s;
            }

            .balloon:nth-child(2) {
                background-color: #ff6347;
                left: 20%;
                animation-delay: 1s;
            }

            .balloon:nth-child(3) {
                background-color: #ff8c00;
                left: 30%;
                animation-delay: 2s;
            }

            .balloon:nth-child(4) {
                background-color: #20b2aa;
                left: 40%;
                animation-delay: 3s;
            }

            .balloon:nth-child(5) {
                background-color: #ba55d3;
                left: 50%;
                animation-delay: 4s;
            }

            .balloon:nth-child(6) {
                background-color: #8a2be2;
                left: 60%;
                animation-delay: 5s;
            }

            .balloon:nth-child(7) {
                background-color: #00bfff;
                left: 70%;
                animation-delay: 6s;
            }

            .balloon:nth-child(8) {
                background-color: #ff1493;
                left: 80%;
                animation-delay: 7s;
            }

            .balloon:nth-child(9) {
                background-color: #32cd32;
                left: 90%;
                animation-delay: 8s;
            }

            @keyframes float {
                0% {
                    transform: translateY(0) rotate(0);
                }
                50% {
                    transform: translateY(-30px) rotate(15deg);
                }
                100% {
                    transform: translateY(0) rotate(0);
                }
            }

    </style>
</head>
<body>
    <h1>Information Management</h1>
    <div></div>
    <div></div>
    <div class="balloon"></div>
    <div class="balloon"></div>
    <div class="balloon"></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    
    <br><br><br><br>
    <!-- Balloons -->
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <label for="First_Name">First Name:</label>
        <input type="text" id="First_Name" name="First_Name" required>

        <label for="Last_Name">Last Name:</label>
        <input type="text" id="Last_Name" name="Last_Name" required>

        <label>Type:</label>
        <label for="Student">Student</label>
        <input type="radio" id="Student" name="Type" value="Student" required onclick="toggleFields()">
        <label for="Working">Working</label>
        <input type="radio" id="Working" name="Type" value="Working" onclick="toggleFields()">

        <div id="studentFields" style="display: none;">
            <label for="Class">Class:</label>
            <input type="text" id="Class" name="Class">

            <label for="Branch">Branch:</label>
            <input type="text" id="Branch" name="Branch">
        </div>

        <div id="workingFields" style="display: none;">
            <label for="Organization">Organization:</label>
            <input type="text" id="Organization" name="Organization">

            <label for="Designation">Designation:</label>
            <input type="text" id="Designation" name="Designation">
        </div>

        <label for="ContactNo">Contact Number:</label>
        <input type="text" id="ContactNo" name="ContactNo" pattern="\d{10}" placeholder="Enter 10-digit number" required>

        <label for="DoB">Date of Birth:</label>
        <input type="date" id="DoB" name="DoB" required>

        <label for="Photograph">Photograph:</label>
        <input type="file" id="Photograph" name="Photograph" accept="image/*">

        <input type="submit" value="Add Record">
    </form>

    <script>
        function toggleFields() {
            var type = document.querySelector('input[name="Type"]:checked').value;
            if (type === "Student") {
                document.getElementById('studentFields').style.display = "block";
                document.getElementById('workingFields').style.display = "none";
            } else {
                document.getElementById('studentFields').style.display = "none";
                document.getElementById('workingFields').style.display = "block";
            }
        }
    </script>

</body>
</html>

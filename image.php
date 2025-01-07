<?php
$host = "sql112.infinityfree.com";
$username = "if0_38042314";
$password = "15619842Gawaree";
$dbname = "if0_38042314_Birthdaywish";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Photograph FROM Working_info WHERE id = 1";
if ($stmt = $conn->prepare($sql)) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($photo);
    if ($stmt->fetch()) {
        ob_end_clean();
        header("Content-Type: image/jpeg");
        echo $photo;
    } else {
        echo "No image found.";
    }

    $stmt->close();
} else {
    echo "Error in query: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Image from Database</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: #4CAF50;
        }
        img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ddd;
            padding: 5px;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

    <h1>Birthday Wish</h1>
    <p>Here is the image from the database:</p>
    <img src="<?php echo $_SERVER['PHP_SELF']; ?>" alt="Birthday Image" />

</body>
</html>

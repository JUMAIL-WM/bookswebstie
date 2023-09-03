<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $fullname = $_POST['fname'];
    $regnumber = $_POST['rnumber'];
    $guardian = $_POST['gname'];
    $grade = $_POST['grade'];
    $address = $_POST['address'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $gender = $_POST['gender'];
    
    // Validate and sanitize the data (you can add more validation as needed)
    $fullname = trim($fullname);
    $regnumber = trim($regnumber);
    $guardian = trim($guardian);
    $grade = trim($grade);
    $address = trim($address);
    $day = trim($day);
    $month = trim($month);
    $year = trim($year);
    $gender = trim($gender);

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "enrollment";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO registar (name, r_num, guardian, grade, address, day, month, year, gender) VALUES ( $fullname, $regnumber, $guardian, $grade, $address, $day, $month, $year, $gender");
    $stmt->bind_param("sssssssss", $fullname, $regnumber, $guardian, $grade, $address, $day, $month, $year, $gender);
    $stmt->execute();

    // Check if the data is inserted successfully
    if ($stmt->affected_rows > 0) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

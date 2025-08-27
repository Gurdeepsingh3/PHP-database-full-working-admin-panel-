<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student";

// Connect to database
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $course_name = $_POST['course_name'];
    $course_duration = $_POST['course_duration'];
    $course_fees = $_POST['course_fees'];
    $discounted_fees = $_POST['discounted_fees'];

    // Insert into database
    $sql = "INSERT INTO courses (course_name, course_duration, course_fees, discounted_fees)
            VALUES ('$course_name', '$course_duration', '$course_fees', '$discounted_fees')";

    if ($conn->query($sql) === TRUE) {
        echo " Course created successfully!";
    } else {
        echo " Error: " . $conn->error;
    }

    $conn->close();
}
?>


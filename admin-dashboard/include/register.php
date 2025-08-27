<?php

$servername = "localhost";  // usually "localhost"
$username = "root";         // default username in XAMPP/WAMP
$password = "";             // default password is empty
$database = "student";  // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Upload files
    $photo = $_FILES["photo"]["name"];
    $adhar = $_FILES["adhar"]["name"];
    $marksheet = $_FILES["marksheet"]["name"];

    move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $photo);
    move_uploaded_file($_FILES["adhar"]["tmp_name"], "uploads/" . $adhar);
    move_uploaded_file($_FILES["marksheet"]["tmp_name"], "uploads/" . $marksheet);

    // Form data
    $student_name = $_POST['student_name'];
    $fathers_name = $_POST['fathers_name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $mobile_no = $_POST['mobile_no'];
    $parents_mobile_no = $_POST['parents_mobile_no'];
    $admission_date = $_POST['admission_date'];
    $course_name = $_POST['course_name'];
    $total_fees = $_POST['total_fees'];
    $discount_fee = $_POST['discount_fee'];
    $student_fee = $_POST['student_fee'];

    // Insert Query
  $sql = "INSERT INTO students (
    student_name, fathers_name, dob, address, mobile_no, parents_mobile_no,
    photo, adhar_card_photo, marksheet_photo, admission_date, course_name,
    total_fees, discount_fee, student_fee
) VALUES (
    '$student_name', '$fathers_name', '$dob', '$address', '$mobile_no', '$parents_mobile_no',
    '$photo', '$adhar', '$marksheet', '$admission_date', '$course_name',
    '$total_fees', '$discount_fee', '$student_fee'
)";


    if ($conn->query($sql) === TRUE) {
        echo "Student Registered Successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>



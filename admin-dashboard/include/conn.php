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
echo "Connected successfully";


?>

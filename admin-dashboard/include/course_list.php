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

// Fetch all courses
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Course List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7f8;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #007BFF;
            color: white;
        }
        a.button {
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            color: white;
        }
        .edit-btn {
            background: #28a745;
        }
        .delete-btn {
            background: #dc3545;
        }
        a.button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

<h2>All Courses</h2>

<table>
    <tr>
        <th>No.</th>
        <th>Course Name</th>
        <th>Duration (Months)</th>
        <th>Fees</th>
        <th>Discounted Fees</th>
        <th>Total Fees</th>
        <th>Actions</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        $counter = 1;
        while ($row = $result->fetch_assoc()) {
            
            $total_fees = $row['course_fees'] - $row['discounted_fees'];

            echo "<tr>
                    <td>{$counter}</td>
                    <td>{$row['course_name']}</td>
                    <td>{$row['course_duration']}</td>
                    <td>{$row['course_fees']}</td>
                    <td>{$row['discounted_fees']}</td>
                    <td>{$total_fees}</td>
                    <td>
                        <a class='button edit-btn' href='edit_course.php?id={$row['id']}'>Edit</a>
                        <a class='button delete-btn' href='delete_course.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this course?\")'>Delete</a>
                    </td>
                  </tr>";
            $counter++;
        }
    } else {
        echo "<tr><td colspan='7'>No courses found.</td></tr>";
    }
    ?>
</table>


</body>
</html>
<?php $conn->close(); ?>


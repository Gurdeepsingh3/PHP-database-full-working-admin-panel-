<?php
// 1. CONNECT TO DATABASE
$conn = new mysqli("localhost", "root", "", "student");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SEARCH LOGIC
$search_mobile = "";
if (isset($_GET['search_mobile']) && $_GET['search_mobile'] !== "") {
    $search_mobile = $_GET['search_mobile'];
    $sql = "SELECT * FROM students WHERE mobile_no LIKE '%$search_mobile%'";
} else {
    $sql = "SELECT * FROM students";
}

// FETCH STUDENTS
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
   <link rel="stylesheet" href="custom.css">
</head>
<body>

<h2>Registered Students</h2>

<!-- Search Form -->
<div class="search-box">
    <form method="GET">
        <input type="text" name="search_mobile" placeholder="Enter Mobile No" value="<?php echo htmlspecialchars($search_mobile); ?>">
        <input type="submit" value="Search">
        <a href="serch.php" style="padding:8px 12px; background:#6c757d; color:white; text-decoration:none; border-radius:4px;">Reset</a>
    </form>
</div>

<table>
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Father's Name</th>
        <th>DOB</th>
        <th>Mobile No</th>
        <th>Course</th>
        <th>Photo</th>
        <th>Action</th>
    </tr>

    <?php
    $counter = 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$counter}</td>
                <td>{$row['student_name']}</td>
                <td>{$row['fathers_name']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['mobile_no']}</td>
                <td>{$row['course']}</td>
                <td><img src='uploads/{$row['photo']}' width='60'></td>
                <td>
                    <a class='button' href='edit.php?id={$row['id']}'>Edit</a>
                    <a class='button delete-btn' href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
            </tr>";
            $counter++;
        }
    } else {
        echo "<tr><td colspan='8'>No students found.</td></tr>";
    }
    ?>

</table>
<style>
    body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f4f7f8;
        }
        h2 {
            text-align: center;
        }
        .search-box {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 8px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 8px 15px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            opacity: 0.9;
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
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a.delete-btn {
            background: #dc3545;
        }
        a.button:hover {
            opacity: 0.8;
        }
</style>
</body>
</html>

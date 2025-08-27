<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!--  App Topstrip -->

        <!-- Sidebar Start -->
        <?php
    include ('include/sidebar.php')
    ?>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php
    include ('include/header.php')
    ?>
            <!--  Header End -->
            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <div class="card">

                        <div class="card-body">
                            <h2>Course Details Form</h2>
                            <form action="include/couses_register.php" method="POST">
                                <div class="form-grid">

                                    <div>
                                        <label for="course_name">Course Name</label>
                                        <input list="courseList" id="course_name" name="course_name" required
                                            style="width: 100%; padding: 8px; border: 1px solid #aaa; border-radius: 5px;">
                                        <datalist id="courseList">
                                            <option value="CSE101 - Computer Science">
                                            <option value="ECE201 - Electronics">
                                            <option value="BBA301 - Business Administration">
                                            <option value="MATH401 - Mathematics">
                                        </datalist>
                                    </div>

                                    <div>
                                        <label for="course_duration">Duration (in months)</label>
                                        <input type="text" id="course_duration" name="course_duration" required>
                                    </div>

                                    <div>
                                        <label for="course_fee">Course Fees</label>
                                        <input type="number" id="course_fee" name="course_fees" required>
                                    </div>

                                    <div>
                                        <label for="discounted_fees">Discounted Fees</label>
                                        <input type="number" id="discounted_fees" name="discounted_fees">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit">Submit</button>
                                </div>
                            </form>







                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
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



            </div>
        </div>
        <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./assets/js/sidebarmenu.js"></script>
        <script src="./assets/js/app.min.js"></script>
        <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
        <!-- solar icons -->
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>


<style>
    h2 {
        text-align: center;
        color: #333;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px 40px;
        margin-top: 20px;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
        color: #333;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #aaa;
        border-radius: 5px;
    }

    .form-actions {
        text-align: center;
        margin-top: 20px;
    }

    button {
        padding: 10px 25px;
        border: none;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

 
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



</html>
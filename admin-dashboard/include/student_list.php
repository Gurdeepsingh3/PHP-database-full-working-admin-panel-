<?php
$conn = new mysqli("localhost", "root", "", "student");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f4f7f8;
        }
        h2 {
            text-align: center;
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
        a.button, button.view-btn {
            padding: 6px 12px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        a.delete-btn {
            background: #dc3545;
        }
        a.button:hover, button.view-btn:hover {
            opacity: 0.8;
        }
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            padding-top: 80px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background: white;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0px 0px 10px #000;
        }
        .modal-content h3 {
            margin-top: 0;
        }
        .close {
            color: red;
            float: right;
            font-size: 22px;
            cursor: pointer;
        }
        .info {
            margin: 8px 0;
        }
    </style>
</head>
<body>

<h2>Registered Students</h2>

<table>
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Father's Name</th>
        <th>DOB</th>
        <th>Mobile No</th>
        <th>course_name</th>
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
                <td>{$row['course_name']}</td>
                <td>
                    <button class='view-btn'
                        data-name='{$row['student_name']}'
                        data-father='{$row['fathers_name']}'
                        data-dob='{$row['dob']}'
                        data-mobile='{$row['mobile_no']}'
                        data-course_name='{$row['course_name']}'
                        data-photo='uploads/{$row['photo']}'
                    >View</button>
                    <a class='button delete-btn' href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
            </tr>";
            $counter++;
        }
    } else {
        echo "<tr><td colspan='7'>No students found.</td></tr>";
    }
    ?>
</table>

<!-- Modal -->
<div id="studentModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Student Details</h3>
        <div class="info"><b>Name:</b> <span id="modalName"></span></div>
        <div class="info"><b>Father's Name:</b> <span id="modalFather"></span></div>
        <div class="info"><b>DOB:</b> <span id="modalDob"></span></div>
        <div class="info"><b>Mobile:</b> <span id="modalMobile"></span></div>
        <div class="info"><b>course_name:</b> <span id="modalcourse_name"></span></div>
        <div class="info"><b>Photo:</b><br><img id="modalPhoto" src="" width="100"></div>
    </div>
</div>

<script>
    var modal = document.getElementById("studentModal");
    var span = document.getElementsByClassName("close")[0];

    document.querySelectorAll(".view-btn").forEach(button => {
        button.addEventListener("click", function() {
            document.getElementById("modalName").innerText = this.dataset.name;
            document.getElementById("modalFather").innerText = this.dataset.father;
            document.getElementById("modalDob").innerText = this.dataset.dob;
            document.getElementById("modalMobile").innerText = this.dataset.mobile;
            document.getElementById("modalcourse_name").innerText = this.dataset.course_name;
            document.getElementById("modalPhoto").src = this.dataset.photo;
            modal.style.display = "block";
        });
    });

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>

<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "student");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all courses
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

$courses = [];
while ($row = $result->fetch_assoc()) {
    $courses[] = $row;
}
?>
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
              <h2 class="text-center text-primary">Student Registration Form</h2>
              <form method="POST" action="include/register.php" enctype="multipart/form-data">
                <div class="form-grid">

                  <!-- Left Column -->
                  <div class="column">
                    <div class="form-group">
                      <label>Student Name:</label>
                      <input type="text" name="student_name" required />
                    </div>

                    <div class="form-group">
                      <label>Father's Name:</label>
                      <input type="text" name="fathers_name" />
                    </div>

                    <div class="form-group">
                      <label>DOB:</label>
                      <input type="date" name="dob" />
                    </div>

                    <div class="form-group">
                      <label>Address:</label>
                      <textarea name="address" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Mobile No:</label>
                      <input type="text" name="mobile_no" />
                    </div>

                    <div class="form-group">
                      <label>Parents Mobile No:</label>
                      <input type="text" name="parents_mobile_no" />
                    </div>

                    <div class="form-group">
                      <label>Admission Date:</label>
                      <input type="date" name="admission_date" />
                    </div>
                  </div>

                  <!-- Right Column -->
               <div class="column">
        <div class="form-group">
            <label>Course Name:</label>
            <select name="course_name" id="courseSelect" required>
                <option value="">-- Select Course-Name --</option>
                <?php foreach ($courses as $course) { ?>
                    <option value="<?= htmlspecialchars($course['course_name']) ?>">
                        <?= htmlspecialchars($course['course_name']) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Total Fees:</label>
            <input type="number" step="0.01" name="total_fees" id="totalFees" readonly />
        </div>

        <div class="form-group">
            <label>Discount Fee:</label>
            <input type="number" step="0.01" name="discount_fee" id="discountFee"  />
        </div>

        <div class="form-group">
            <label>Student Fee:</label>
            <input type="number" step="0.01" name="student_fee" id="studentFee"  />
        </div>

        <div class="form-group">
            <label>Student Photo:</label>
            <input type="file" name="photo" />
        </div>

        <div class="form-group">
            <label>Aadhaar Card Photo:</label>
            <input type="file" name="adhar" />
        </div>

        <div class="form-group">
            <label>Marksheet Photo:</label>
            <input type="file" name="marksheet" />
        </div>
    </div>

   
                </div>

                <div class="form-submit">
                  <input type="submit" value="Register Student" />
                </div>
              </form>
            </div>






          </div>
        </div>
      </div>
    </div>
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/sidebarmenu.js"></script>
    <script src="./assets/js/app.min.js"></script>
    <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script>

let coursesData = <?php echo json_encode($courses); ?>;

document.getElementById('courseSelect').addEventListener('change', function() {
    let selectedCourse = this.value;
    
    // Find course in data
    let course = coursesData.find(c => c.course_name === selectedCourse);

    if (course) {
        let totalFees = course.course_fees - course.discounted_fees;

        document.getElementById('totalFees').value = course.course_fees;
        document.getElementById('discountFee').value = course.discounted_fees;
        document.getElementById('studentFee').value = totalFees;
    } else {
        // Clear fields if no course selected
        document.getElementById('totalFees').value = '';
        document.getElementById('discountFee').value = '';
        document.getElementById('studentFee').value = '';
    }
});
</script>
  </body>




</html>
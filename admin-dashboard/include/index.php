<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7f8;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h2>Student Registration Form</h2>
    <form method="POST" action="register.php" enctype="multipart/form-data">
        <label>Student Name:</label>
        <input type="text" name="student_name" required>

        <label>Father's Name:</label>
        <input type="text" name="fathers_name">

        <label>DOB:</label>
        <input type="date" name="dob">

        <label>Address:</label>
        <textarea name="address" rows="3"></textarea>

        <label>Mobile No:</label>
        <input type="text" name="mobile_no">

        <label>Parents Mobile No:</label>
        <input type="text" name="parents_mobile_no">

        <label>Admission Date:</label>
        <input type="date" name="admission_date">

        <label>Course:</label>
        <input type="text" name="course">

        <label>Total Fees:</label>
        <input type="number" step="0.01" name="total_fees">

        <label>Discount Fee:</label>
        <input type="number" step="0.01" name="discount_fee">

        <label>Student Fee:</label>
        <input type="number" step="0.01" name="student_fee">

        <label>Student Photo:</label>
        <input type="file" name="photo">

        <label>Aadhaar Card Photo:</label>
        <input type="file" name="adhar">

        <label>Marksheet Photo:</label>
        <input type="file" name="marksheet">

        <input type="submit" value="Register Student">
    </form>

</body>
</html>

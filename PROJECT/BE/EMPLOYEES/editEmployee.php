<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../dbconnection.php';

if (!isset($_GET['id'])) {
    die("Employee ID not provided");
}

$id = $_GET["id"];

$query = "SELECT * FROM employees WHERE emp_id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) != 1) {
    die("Employee not found");
}

$employee = mysqli_fetch_assoc($result);

$name    = $employee["emp_name"];
$gender  = $employee["emp_gender"];
$dob     = $employee["emp_dob"];
$doj     = $employee["emp_join_date"];
$contact = $employee["emp_phno"];
$address = $employee["emp_address"];
$salary  = $employee["emp_salary"];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Employee</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="../PRODUCTS/style1.css">
</head>

<body>

<div class="container my-5">
    <h1 class="text-center mb-4">Edit Employee Details</h1>

    <form action="updateEmployee.php" method="post">

        <!-- Employee ID (hidden) -->
        <input type="hidden" name="employee_id" value="<?php echo $id; ?>">

        <!-- Name -->
        <div class="form-group">
            <label>Employee Name</label>
            <input type="text" class="form-control"
                   name="employee_name"
                   value="<?php echo $name; ?>"
                   readonly>
        </div>

        <!-- Gender -->
        <div class="form-group">
            <label>Gender</label>
            <input type="text" class="form-control"
                   name="employee_gender"
                   value="<?php echo $gender; ?>"
                   readonly>
        </div>

        <!-- DOB -->
        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" class="form-control"
                   name="birthday"
                   value="<?php echo $dob; ?>"
                   readonly>
        </div>

        <!-- Join Date -->
        <div class="form-group">
            <label>Joining Date</label>
            <input type="date" class="form-control"
                   name="join_date"
                   value="<?php echo $doj; ?>"
                   readonly>
        </div>

        <!-- Contact -->
        <div class="form-group">
            <label>Contact Number</label>
            <input type="text" class="form-control"
                   name="employee_contact"
                   value="<?php echo $contact; ?>"
                   required>
        </div>

        <!-- Address -->
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control"
                   name="employee_address"
                   value="<?php echo $address; ?>"
                   required>
        </div>

        <!-- Salary -->
        <div class="form-group">
            <label>Salary</label>
            <input type="number" class="form-control"
                   name="employee_salary"
                   value="<?php echo $salary; ?>"
                   required>
        </div>

        <!-- Buttons -->
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="employee.php" class="btn btn-secondary">Cancel</a>

    </form>
</div>

</body>
</html>

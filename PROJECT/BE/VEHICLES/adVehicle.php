<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>

<?php
include '../dbconnection.php';
?>

<div class="container my-4">

    <h1 class="text-center">Enter Vehicle Details</h1>

    <form action="../BE/VEHICLES/addVehicle.php" method="post">

        <div class="form-group">
            <label for="vehicle_no">Vehicle Registration No</label>
            <input type="text" class="form-control" id="vehicle_no"
                   name="vehicle_no" required>
        </div>

        <div class="form-group">
            <label for="employee_id">Assign Employee</label>
            <select class="form-control" name="employee_id" id="employee_id" required>
                <option value="">-- Select Employee --</option>

                <?php
                $fetch_employee_id = "SELECT emp_id, emp_name FROM employees";
                $res1 = mysqli_query($conn, $fetch_employee_id);

                while ($row = mysqli_fetch_assoc($res1)) {
                    echo "<option value='{$row['emp_id']}'>
                            {$row['emp_name']} (ID: {$row['emp_id']})
                          </option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>

    </form>
</div>

</body>
</html>

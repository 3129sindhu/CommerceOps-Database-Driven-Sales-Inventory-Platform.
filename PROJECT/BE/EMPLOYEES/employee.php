<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../dbconnection.php';
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employee Details</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

<div class="container my-4">

    <button type="button" class="btn btn-primary mb-3">
        <a href="http://localhost/DBMS_PRO/PROJECT/FE/addEmployee.html" style="color:white;">
            <i class="fa fa-plus"></i> <strong>Add Employee</strong>
        </a>
    </button>

    <h1 class="text-center"><u>Employee Details</u></h1>
    <br>

    <table class="table table-striped table-bordered">

        <tr class="thead-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Salary</th>
            <th>Join Date</th>
            <th>Leaving Date</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>

        <?php
        $query = "SELECT * FROM employees";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $leaving_date = $row['emp_leaving_date'] ?? '';

                echo "<tr>
                    <td>{$row['emp_id']}</td>
                    <td>{$row['emp_name']}</td>
                    <td>{$row['emp_gender']}</td>
                    <td>{$row['emp_dob']}</td>
                    <td>{$row['emp_phno']}</td>
                    <td>{$row['emp_address']}</td>
                    <td>{$row['emp_salary']}</td>
                    <td>{$row['emp_join_date']}</td>
                    <td>{$leaving_date}</td>

                    <td>
                        <a href='editEmployee.php?id={$row['emp_id']}'>
                            <i class='fas fa-edit'></i> Edit
                        </a>
                    </td>

                    <td>
                        <a href='removeEmployee.php?id={$row['emp_id']}'
                           onclick=\"return confirm('Are you sure you want to remove this employee?');\">
                            <i class='fas fa-trash-alt' style='color:red'></i> Remove
                        </a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='11' class='text-center'>No employees found</td></tr>";
        }
        ?>

    </table>

    <button type="button" class="btn btn-primary">
        <a href="http://localhost/DBMS_PRO/PROJECT/FE/adminInterface.html" style="color:white;">
            <i class="fa fa-arrow-left"></i> <strong>Back</strong>
        </a>
    </button>

</div>

</body>
</html>

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
</head>

<body>

<div class="container my-4">

    <h1 class="text-center"><u>Employee Details</u></h1>
    <br>

    <table class="table table-striped table-bordered">

        <tr class="thead-dark">
            <th>Name</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Salary</th>
        </tr>

        <?php
        $query = "SELECT * FROM employees WHERE emp_leaving_date IS NULL";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['emp_name']}</td>
                    <td>{$row['emp_gender']}</td>
                    <td>{$row['emp_phno']}</td>
                    <td>{$row['emp_address']}</td>
                    <td>{$row['emp_salary']}</td>
                </tr>";
            }
        } else {
            echo "<tr>
                    <td colspan='5' class='text-center'>
                        No active employees found
                    </td>
                  </tr>";
        }
        ?>

    </table>

</div>

</body>
</html>

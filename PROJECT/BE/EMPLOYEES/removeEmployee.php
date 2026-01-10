<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../dbconnection.php';

if (!isset($_GET['id'])) {
    die("Employee ID not provided");
}

$id = $_GET['id'];
$date = date("Y-m-d");

$check_query = "SELECT emp_id FROM employees WHERE emp_id = '$id'";
$result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($result) > 0) {
    $update_query = "
        UPDATE employees 
        SET emp_leaving_date = '$date' 
        WHERE emp_id = '$id'
    ";

    if (mysqli_query($conn, $update_query)) {
        header("Location: employee.php");
        exit();
    } else {
        echo "Error updating employee: " . mysqli_error($conn);
    }

} else {
    echo "Employee does not exist";
}
?>

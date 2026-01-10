<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id      = $_POST["employee_id"];
    $contact = $_POST["employee_contact"];
    $address = $_POST["employee_address"];
    $salary  = $_POST["employee_salary"];
    $query = "
        UPDATE employees 
        SET 
            emp_phno = '$contact',
            emp_address = '$address',
            emp_salary = '$salary'
        WHERE emp_id = '$id'
    ";

    if (mysqli_query($conn, $query)) {
        header("Location: employee.php");
        exit();
    } else {
        echo "Error updating employee: " . mysqli_error($conn);
    }
}
?>

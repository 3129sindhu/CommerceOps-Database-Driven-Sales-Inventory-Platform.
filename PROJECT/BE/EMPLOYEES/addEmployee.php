<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name      = $_POST["employee_name"];
    $dob       = $_POST["birthday"];
    $join_date = $_POST["join_date"];
    $address   = $_POST["address"];
    $gender    = $_POST["gender"];
    $contact   = $_POST["contact"];
    $salary    = $_POST["salary"];

    $sql = "INSERT INTO employees 
            (emp_name, emp_dob, emp_join_date, emp_address, emp_gender, emp_phno, emp_salary)
            VALUES 
            ('$name','$dob','$join_date','$address','$gender','$contact','$salary')";

    if (!mysqli_query($conn, $sql)) {
        die("DB ERROR: " . mysqli_error($conn));
    }

    header("Location: http://localhost/DBMS_PRO/PROJECT/BE/EMPLOYEES/employee.php");
    exit();
}
?>

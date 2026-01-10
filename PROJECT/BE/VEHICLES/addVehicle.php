<?php
include '../dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $reg_no = $_POST["vehicle_no"];
    $vehicle_name = $_POST["vehicle_name"];

    $vehicle_insert_query = "
        INSERT INTO vehicles (vehicle_reg_no, vehicle_name)
        VALUES ('$reg_no', '$vehicle_name')
    ";

    mysqli_query($conn, $vehicle_insert_query);
    header("Location: http://localhost/DBMS_PRO/PROJECT/BE/VEHICLES/vehicle.php");
    exit;
}
?>

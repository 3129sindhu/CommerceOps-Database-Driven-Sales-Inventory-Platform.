<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_GET["order_id"])) {
        die("Order ID missing");
    }

    $order_id = $_GET["order_id"];
    $status = $_POST["delivery_status"];
    $employee_id = $_POST["employee_id"];

    $order_update_query = "
        UPDATE orders 
        SET 
            delivery_status = '$status',
            emp_id = '$employee_id'
        WHERE order_id = '$order_id'
    ";

    if (mysqli_query($conn, $order_update_query)) {
        header("Location: order.php");
        exit();
    } else {
        echo "Error updating order: " . mysqli_error($conn);
    }
}
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../dbconnection.php';

if (!isset($_GET["id"])) {
    die("Payment ID missing");
}

$payment_id = $_GET["id"];

$update_payment = "
    UPDATE payment SET payment_status = 'Paid' WHERE payment_id = '$payment_id'";

if (mysqli_query($conn, $update_payment)) {

    echo "<script>
        alert('Payment status updated successfully!');
        window.location.href = 'payments.php';
    </script>";

} else {
    echo "Error updating payment: " . mysqli_error($conn);
}
?>

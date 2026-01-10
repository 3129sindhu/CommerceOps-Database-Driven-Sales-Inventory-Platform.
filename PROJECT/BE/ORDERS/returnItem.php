<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../dbconnection.php';

if (
    !isset($_GET['order_id']) || !isset($_GET['prod_id']) ||!isset($_GET['order_quantity']) ||!isset($_GET['quantity'])) {
    die("Invalid return request");
}

$order_id       = $_GET["order_id"];
$prod_id        = $_GET["prod_id"];
$order_quantity = $_GET["order_quantity"];
$quantity       = $_GET["quantity"];


$insert_return = "
    INSERT INTO return_details (order_id, prod_id, quantity) VALUES ('$order_id', '$prod_id', '$order_quantity')
";
mysqli_query($conn, $insert_return);


$updated_quantity = $order_quantity + $quantity;
$update_stock = "
    UPDATE products 
    SET prod_availability = '$updated_quantity' 
    WHERE prod_id = '$prod_id'
";
mysqli_query($conn, $update_stock);


$price_query = "SELECT prod_price FROM products WHERE prod_id = '$prod_id'";
$result = mysqli_query($conn, $price_query);
$row = mysqli_fetch_assoc($result);
$price = $row["prod_price"];


$remove_order_details = "
    DELETE FROM order_details 
    WHERE order_id = '$order_id' AND prod_id = '$prod_id'
";
mysqli_query($conn, $remove_order_details);


$fetch_order = "SELECT bill_amount FROM orders WHERE order_id = '$order_id'";
$result = mysqli_query($conn, $fetch_order);
$row = mysqli_fetch_assoc($result);
$bill_amount = $row["bill_amount"];


$updated_bill = $bill_amount - ($price * $order_quantity);
$update_bill = "
    UPDATE orders 
    SET bill_amount = '$updated_bill' 
    WHERE order_id = '$order_id'
";
mysqli_query($conn, $update_bill);


header("Location: viewOrder.php?id=$order_id");
exit();
?>

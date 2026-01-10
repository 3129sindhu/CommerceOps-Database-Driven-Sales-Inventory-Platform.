<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../dbconnection.php';


if (
    !isset($_GET['product_id']) ||
    !isset($_GET['product_quantity']) ||
    !isset($_GET['cust_id'])
) {
    die("Invalid order request");
}


$product_ids = explode(",", $_GET["product_id"]);
$product_quantities = explode(",", $_GET["product_quantity"]);


$cust_id = $_GET["cust_id"];


$bill_amount = 0;

for ($i = 0; $i < count($product_ids); $i++) {

    $prod_id = $product_ids[$i];
    $qty     = $product_quantities[$i];

    $get_product_query = "SELECT * FROM products WHERE prod_id = '$prod_id'";
    $result = mysqli_query($conn, $get_product_query);

    if (mysqli_num_rows($result) == 1) {

        $product = mysqli_fetch_assoc($result);

        $price        = $product["prod_price"];
        $availability = $product["prod_availability"];


        if ($qty > $availability) {
            die("Insufficient stock for product ID $prod_id");
        }

    
        $bill_amount += ($price * $qty);

    
        $updated_quantity = $availability - $qty;
        $update_stock = "
            UPDATE products 
            SET prod_availability = '$updated_quantity' 
            WHERE prod_id = '$prod_id'
        ";
        mysqli_query($conn, $update_stock);
    }
}

$date = date("Y-m-d");

$insert_order = "
    INSERT INTO orders (cust_id, order_date, bill_amount)
    VALUES ('$cust_id', '$date', '$bill_amount')
";
mysqli_query($conn, $insert_order);

$get_order_id = "SELECT MAX(order_id) AS order_id FROM orders";
$result = mysqli_query($conn, $get_order_id);
$row = mysqli_fetch_assoc($result);
$order_id = $row["order_id"];

$insert_payment = "
    INSERT INTO payment (order_id, cust_id)
    VALUES ('$order_id', '$cust_id')
";
mysqli_query($conn, $insert_payment);

for ($i = 0; $i < count($product_ids); $i++) {

    $prod_id = $product_ids[$i];
    $qty     = $product_quantities[$i];

    $insert_order_details = "
        INSERT INTO order_details (order_id, prod_id, quantity)
        VALUES ('$order_id', '$prod_id', '$qty')
    ";
    mysqli_query($conn, $insert_order_details);
}
header("Location: orderHistory.php?id=$cust_id");
exit();
?>

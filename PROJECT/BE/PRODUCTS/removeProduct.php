<?php
include '../dbconnection.php';

$id = $_GET["id"];
$check_product_query = "SELECT * FROM products WHERE prod_id = '$id'";
$result = mysqli_query($conn, $check_product_query);

if (mysqli_num_rows($result) > 0) {
    $remove_product_query = "
        UPDATE products 
        SET prod_availability = 0 
        WHERE prod_id = '$id'
    ";

    mysqli_query($conn, $remove_product_query);
    header("Location: http://localhost/DBMS_PRO/PROJECT/BE/PRODUCTS/product.php");
    exit;

} else {
    echo "Product does not exist";
}
?>

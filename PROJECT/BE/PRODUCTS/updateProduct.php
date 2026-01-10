<?php
include '../dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["product_id"];
    $price = $_POST["price"];
    $description = "'" . $_POST["description"] . "'";
    $stock = $_POST["stock"]; 

    $product_update_query = "
        UPDATE products 
        SET 
            prod_price = $price,
            prod_description = $description,
            prod_availability = $stock
        WHERE prod_id = $id
    ";

    mysqli_query($conn, $product_update_query);
    header("Location: http://localhost/DBMS_PRO/PROJECT/BE/PRODUCTS/product.php");
    exit;
}
?>

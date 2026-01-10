<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name        = $_POST["product_name"];
    $category    = $_POST["category"];
    $price       = $_POST["price"];
    $description = $_POST["description"];
    $stock       = $_POST["stock"];

    $product_insert_query = "
        INSERT INTO products 
        (prod_name, prod_price, prod_availability, prod_category, prod_description)
        VALUES ('$name', '$price', '$stock', '$category', '$description')
    ";

    if (mysqli_query($conn, $product_insert_query)) {

        header("Location: product.php");
        exit();

    } else {
        echo "Error adding product: " . mysqli_error($conn);
    }
}
?>

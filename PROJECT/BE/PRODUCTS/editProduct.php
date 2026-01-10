<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Product</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="style1.css">

</head>

<body>

<img class="bg" src="img2.jpg" alt="Background">

<?php
include '../dbconnection.php';

$id = $_GET["id"];

$fetch_product_details_sql = "SELECT * FROM products WHERE prod_id = $id";
$result = mysqli_query($conn, $fetch_product_details_sql);

if (mysqli_num_rows($result) == 1) {
    $product = mysqli_fetch_assoc($result);

    $name = $product["prod_name"];
    $category = $product["prod_category"];
    $price = $product["prod_price"];
    $description = $product["prod_description"];
    $stock = $product["prod_availability"];
}
?>

<div class="container my-4">

    <h1 class="text-center">Edit Product Details</h1>

    <form action="../../BE/PRODUCTS/updateProduct.php" method="POST">

        <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control"
                   value="<?php echo $name; ?>" disabled>
        </div>
        <input type="hidden" name="product_id" value="<?php echo $id; ?>">

        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" required><?php echo $description; ?></textarea>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control"
                   name="price" value="<?php echo $price; ?>" required>
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" class="form-control"
                   name="stock" value="<?php echo $stock; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-secondary">Reset</button>

    </form>

</div>

</body>
</html>

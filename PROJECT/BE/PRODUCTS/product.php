<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product Management</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>

<body>

<div class="container my-4">

    <a href="http://localhost/DBMS_PRO/PROJECT/FE/addProduct.html"
       class="btn btn-primary">
        <i class="fa fa-plus"></i> Add Product
    </a>

    <h1 class="text-center mt-3"><u>Product Details</u></h1>
    <br>

    <table class="table table-striped table-bordered">

        <tr class="thead-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Availability</th>
            <th>Category</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>

        <?php
        include '../dbconnection.php';

        $fetch_products_query = "SELECT * FROM products";
        $result = mysqli_query($conn, $fetch_products_query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>
                    <td>{$row['prod_id']}</td>
                    <td>{$row['prod_name']}</td>
                    <td>{$row['prod_price']}</td>
                    <td>{$row['prod_availability']}</td>
                    <td>{$row['prod_category']}</td>
                    <td>{$row['prod_description']}</td>

                    <td>
                        <a href='http://localhost/DBMS_PRO/PROJECT/BE/PRODUCTS/editProduct.php?id={$row['prod_id']}'>
                            <i class='fas fa-edit'></i> Edit
                        </a>
                    </td>

                    <td>
                        <a href='http://localhost/DBMS_PRO/PROJECT/BE/PRODUCTS/removeProduct.php?id={$row['prod_id']}'
                           onclick=\"return confirm('Are you sure you want to remove this product?');\">
                            <i class='fas fa-trash-alt' style='color:red'></i> Remove
                        </a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr>
                    <td colspan='8' class='text-center'>No products found</td>
                  </tr>";
        }
        ?>

    </table>

    <a href="http://localhost/DBMS_PRO/PROJECT/FE/adminInterface.html"
       class="btn btn-primary">
        <i class="fa fa-arrow-left"></i> Back
    </a>

</div>

</body>
</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../dbconnection.php';

if (!isset($_GET["id"])) {
    die("Order ID missing");
}

$order_id = $_GET["id"];

$fetch_order = "SELECT cust_id FROM orders WHERE order_id = '$order_id'";
$result2 = mysqli_query($conn, $fetch_order);

if (mysqli_num_rows($result2) != 1) {
    die("Order not found");
}

$row2 = mysqli_fetch_assoc($result2);
$cust_id = $row2["cust_id"];
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order Details</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

<div class="container my-4">

    <h1 class="text-center"><u>Order Details</u></h1>
    <br>

    <table class="table table-striped table-bordered">

        <tr class="thead-dark">
            <th>Product Name</th>
            <th>Description</th>
            <th>Price / Qty</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>

        <?php
        $fetch_order_details = "SELECT * FROM order_details WHERE order_id = '$order_id'";
        $result = mysqli_query($conn, $fetch_order_details);

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $fetch_product = "SELECT * FROM products WHERE prod_id = '{$row['prod_id']}'";
                $res1 = mysqli_query($conn, $fetch_product);
                $row1 = mysqli_fetch_assoc($res1);

                echo "<tr>
                    <td>{$row1['prod_name']}</td>
                    <td>{$row1['prod_description']}</td>
                    <td>{$row1['prod_price']}</td>
                    <td>{$row['quantity']}</td>

                    <td>
                        <a href='returnitem.php?order_id={$row['order_id']}&prod_id={$row['prod_id']}&order_quantity={$row['quantity']}&quantity={$row1['prod_availability']}'>
                            <i class='fa fa-undo'></i> Return
                        </a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr>
                    <td colspan='5' class='text-center'>No products in this order</td>
                  </tr>";
        }
        ?>
    </table>

    <br><hr><br>

    <h1 class="text-center"><u>Returns</u></h1>
    <br>

    <table class="table table-striped table-bordered">
        <tr class="thead-dark">
            <th>Product Name</th>
            <th>Description</th>
            <th>Price / Qty</th>
            <th>Quantity</th>
        </tr>

        <?php
        $fetch_returns = "SELECT * FROM return_details WHERE order_id = '$order_id'";
        $result = mysqli_query($conn, $fetch_returns);

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $fetch_product = "SELECT * FROM products WHERE prod_id = '{$row['prod_id']}'";
                $res1 = mysqli_query($conn, $fetch_product);
                $row1 = mysqli_fetch_assoc($res1);

                echo "<tr>
                    <td>{$row1['prod_name']}</td>
                    <td>{$row1['prod_description']}</td>
                    <td>{$row1['prod_price']}</td>
                    <td>{$row['quantity']}</td>
                </tr>";
            }
        } else {
            echo "<tr>
                    <td colspan='4' class='text-center'>No returns for this order</td>
                  </tr>";
        }
        ?>
    </table>

    <button type="button" class="btn btn-primary">
        <a href="orderHistory.php?id=<?php echo $cust_id; ?>" style="color:white;">
            <i class="fa fa-arrow-left"></i> <strong>Back</strong>
        </a>
    </button>

</div>

</body>
</html>

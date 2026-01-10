<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_GET["id"])) {
    die("Customer ID missing");
}

$ids = $_GET["id"];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create Order</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<script>
let product_ids = [];
let product_quantities = [];

function addToCart(id) {

    let qty = document.getElementById("quantity_" + id).value;

    if (qty === "0") {
        alert("Please select quantity first");
        return;
    }

    if (product_ids.includes(id)) {
        alert("Product already added to cart");
        return;
    }

    product_ids.push(id);
    product_quantities.push(qty);

    document.getElementById("quantity_" + id).disabled = true;
    document.getElementById("addCartBtn_" + id).disabled = true;
    document.getElementById("removeCartBtn_" + id).hidden = false;
}

function removeFromCart(id) {

    let index = product_ids.indexOf(id);
    if (index > -1) {
        product_ids.splice(index, 1);
        product_quantities.splice(index, 1);

        document.getElementById("quantity_" + id).disabled = false;
        document.getElementById("addCartBtn_" + id).disabled = false;
        document.getElementById("removeCartBtn_" + id).hidden = true;
    }
}

function createOrder() {

    if (product_ids.length === 0) {
        alert("Your cart is empty");
        return;
    }

    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            alert("Order Placed Successfully!");
            window.location.href =
                "http://localhost/DBMS_PRO/PROJECT/BE/ORDERS/orderHistory.php?id=<?php echo $ids; ?>";
        }
    };

    request.open(
        "GET",
        "orderProduct.php?product_id=" + product_ids +
        "&product_quantity=" + product_quantities +
        "&cust_id=<?php echo $ids; ?>",
        true
    );
    request.send();
}
</script>

<body>

<div class="container my-4">

    <h1 class="text-center"><u>Available Products</u></h1>
    <br>

    <table class="table table-striped table-bordered">
        <tr class="thead-dark">
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>

        <?php
        include '../dbconnection.php';

        $query = "SELECT * FROM products WHERE prod_availability > 0";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>
                    <td>{$row['prod_name']}</td>
                    <td>{$row['prod_price']}</td>
                    <td>{$row['prod_category']}</td>
                    <td>{$row['prod_description']}</td>

                    <td>
                        <select id='quantity_{$row['prod_id']}' class='form-control'>
                            <option value='0'>Select</option>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                        </select>
                    </td>

                    <td>
                        <button class='btn btn-primary'
                            id='addCartBtn_{$row['prod_id']}'
                            onclick='addToCart({$row['prod_id']})'>
                            <i class='fa fa-cart-plus'></i> Add
                        </button>

                        <button class='btn btn-danger'
                            id='removeCartBtn_{$row['prod_id']}'
                            hidden
                            onclick='removeFromCart({$row['prod_id']})'>
                            <i class='fa fa-minus-circle'></i> Remove
                        </button>
                    </td>
                </tr>";
            }
        }
        ?>

    </table>

    <button class="btn btn-success" onclick="createOrder()">
        <i class="fa fa-check"></i> Place Order
    </button>

</div>

</body>
</html>

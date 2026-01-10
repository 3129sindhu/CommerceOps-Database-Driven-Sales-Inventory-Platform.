<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS --> 
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
          crossorigin="anonymous">

    <link rel="stylesheet" href="../PRODUCTS/style1.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

<?php
include '../dbconnection.php';

$id = null;

/* LOGIN HANDLING */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $loginQuery = "SELECT * FROM customer_login 
                   WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $loginQuery);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $id = $row["cust_id"];
    } else {
        echo "<script>
                alert('Incorrect Credentials');
                window.location.href = 'http://localhost/DBMS_PRO/PROJECT/FE/loginPage.html';
              </script>";
        exit;
    }
}

/* ACCESS VIA URL */
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
?>

<div class="container_my-4">

    <h1 class="text-center"><u>Order Here</u></h1>
    <br>

    <button type="button" class="btn btn-primary">
        <a href="http://localhost/DBMS_PRO/PROJECT/BE/ORDERS/orderHistory.php?id=<?php echo $id; ?>"
           style="color:white;">
           <i class="fa fa-history"></i> Order History
        </a>
    </button>

    <button type="button" class="btn btn-primary">
        <a href="http://localhost/DBMS_PRO/PROJECT/BE/ORDERS/createOrder.php?id=<?php echo $id; ?>"
           style="color:white;">
           <i class="fa fa-plus-circle"></i> Create Order
        </a>
    </button>

    <button type="button" class="btn btn-primary">
        <a href="http://localhost/DBMS_PRO/PROJECT/FE/mainpage.html"
           style="color:white;">
           <i class="fa fa-times-circle"></i> Log Out
        </a>
    </button>

</div>

<img class="shopping-cart" src="shopping-cart-icon.jpg" alt="Shopping Cart">

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>

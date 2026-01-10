<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../dbconnection.php';
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Payment Details</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

<div class="container my-4">

    <h1 class="text-center"><u>Payment Details</u></h1>
    <br>

    <table class="table table-striped table-bordered">

        <tr class="thead-dark">
            <th>Payment ID</th>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Payment Status</th>
            <th>Action</th>
        </tr>

        <?php
        $fetch_payments_query = "SELECT * FROM payment";
        $result = mysqli_query($conn, $fetch_payments_query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>
                    <td>{$row['payment_id']}</td>
                    <td>{$row['order_id']}</td>
                    <td>{$row['cust_id']}</td>
                    <td>{$row['payment_status']}</td>

                    <td>
                        <a href='editPayment.php?id={$row['payment_id']}'>
                            <i class='fas fa-edit'></i> Change
                        </a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr>
                    <td colspan='5' class='text-center'>
                        No payment records found
                    </td>
                  </tr>";
        }
        ?>
    </table>

    <button type="button" class="btn btn-primary">
        <a href="http://localhost/DBMS_PRO/PROJECT/FE/adminInterface.html" style="color:white;">
            <i class="fa fa-arrow-left"></i> <strong>Back</strong>
        </a>
    </button>

</div>

</body>
</html>

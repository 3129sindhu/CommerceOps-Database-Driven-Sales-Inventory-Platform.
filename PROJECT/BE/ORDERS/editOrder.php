<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../dbconnection.php';

if (!isset($_GET["id"])) {
    die("Order ID missing");
}

$id = $_GET["id"];

$fetch_orders_details_sql = "SELECT * FROM orders WHERE order_id = $id";
$result = mysqli_query($conn, $fetch_orders_details_sql);

if (mysqli_num_rows($result) != 1) {
    die("Order not found");
}

$order = mysqli_fetch_assoc($result);

$order_id        = $order["order_id"];
$cust_id         = $order["cust_id"];
$order_date      = $order["order_date"];
$bill_amount     = $order["bill_amount"];
$delivery_status = $order["delivery_status"];
$emp_id          = $order["emp_id"];
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order Details</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>

<div class="container my-4">

    <h1 class="text-center">Order Details</h1>

    <form action="../../BE/ORDERS/updateOrder.php?order_id=<?php echo $order_id; ?>" method="post">

        <div class="form-group">
            <label>Order Number</label>
            <input type="text" class="form-control" disabled value="<?php echo $order_id; ?>">
        </div>

        <div class="form-group">
            <label>Customer ID</label>
            <input type="text" class="form-control" disabled value="<?php echo $cust_id; ?>">
        </div>

        <div class="form-group">
            <label>Order Date</label>
            <input type="date" class="form-control" disabled value="<?php echo $order_date; ?>">
        </div>

        <div class="form-group">
            <label>Bill Amount</label>
            <input type="number" class="form-control" disabled value="<?php echo $bill_amount; ?>">
        </div>


        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="delivery_status">
                <option value="In Process" <?php if ($delivery_status=="In Process") echo "selected"; ?>>In Process</option>
                <option value="Not Delivered" <?php if ($delivery_status=="Not Delivered") echo "selected"; ?>>Not Delivered</option>
                <option value="Delivered" <?php if ($delivery_status=="Delivered") echo "selected"; ?>>Delivered</option>
            </select>
        </div>

        <div class="form-group">
            <label>Employee</label>
            <select class="form-control" name="employee_id">
                <option value="">-- Select Employee --</option>

                <?php
                $fetch_employee_id = "SELECT * FROM employees";
                $res1 = mysqli_query($conn, $fetch_employee_id);

                if (mysqli_num_rows($res1) > 0) {
                    while ($row = mysqli_fetch_assoc($res1)) {
                        $selected = ($row['emp_id'] == $emp_id) ? "selected" : "";
                        echo "<option value='{$row['emp_id']}' $selected>{$row['emp_name']}</option>";
                    }
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-secondary">Reset</button>

    </form>
</div>

</body>
</html>

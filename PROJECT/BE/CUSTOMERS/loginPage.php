<?php
include '../dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $loginQuery = "SELECT * FROM customer_login 
                   WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $loginQuery);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        $cust_id = $row["cust_id"];
        header("Location: http://localhost/DBMS_PRO/PROJECT/BE/CUSTOMERS/customer.php?id=$cust_id");
        exit();

    } else {
        echo "<script>
                alert('Invalid username or password');
                window.location.href = 'http://localhost/DBMS_PRO/PROJECT/FE/loginPage.html';
              </script>";
        exit();
    }
}
?>

<?php
include '../dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name      = $_POST["cust_name"];
    $gender    = $_POST["gender"];
    $dob       = $_POST["birthday"];
    $address   = $_POST["address"];
    $contact   = $_POST["contact"];
    $username  = $_POST["username"];
    $password  = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // check if username already exists
    $checkUser = "SELECT * FROM customer_login WHERE username='$username'";
    $result = mysqli_query($conn, $checkUser);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
                alert('Username already exists');
                window.location.href='http://localhost/DBMS_PRO/PROJECT/FE/signUpPage.html';
              </script>";
        exit();
    }

    // check password match
    if ($password !== $cpassword) {
        echo "<script>
                alert('Passwords do not match');
                window.location.href='http://localhost/DBMS_PRO/PROJECT/FE/signUpPage.html';
              </script>";
        exit();
    }

    // insert customer details
    $insertCustomer = "
        INSERT INTO customers
        (cust_name, cust_gender, cust_dob, cust_phno, cust_address)
        VALUES ('$name', '$gender', '$dob', '$contact', '$address')
    ";
    mysqli_query($conn, $insertCustomer);

    // get last inserted customer id
    $cust_id = mysqli_insert_id($conn);

    // insert login details
    $insertLogin = "
        INSERT INTO customer_login (username, password, cust_id)
        VALUES ('$username', '$password', '$cust_id')
    ";
    mysqli_query($conn, $insertLogin);

    // redirect to login page
    header("Location: http://localhost/DBMS_PRO/PROJECT/FE/loginPage.html");
    exit();
}
?>

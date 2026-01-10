<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "admin") {
        header("Location: http://localhost/DBMS_PRO/PROJECT/FE/adminInterface.html");
        exit();
    } else {
        echo "<script>
            alert('Incorrect Credentials');
            window.location.href='http://localhost/DBMS_PRO/PROJECT/FE/adminLogin.html';
        </script>";
        exit();
    }
}
?>

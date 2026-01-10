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

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
    
<body>

<div class="container my-4">

    <u><h1 class="text-center">Customer Details</h1></u> 
    <br>

    <table class="table table-striped table-bordered">
        <tr class="thead-dark">
            <th>Name</th>
            <th>Contact</th>
            <th>Address</th>
        </tr>

        <?php
        include '../dbconnection.php';

        $fetch_customers_query = "SELECT * FROM customers";
        $result = mysqli_query($conn, $fetch_customers_query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['cust_name']}</td>
                        <td>{$row['cust_phno']}</td>
                        <td>{$row['cust_address']}</td>
                      </tr>";
            }
        } else {
            echo "<tr>
                    <td colspan='3' class='text-center'>No customers found</td>
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

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>

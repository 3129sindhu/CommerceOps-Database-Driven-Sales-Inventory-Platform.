<!doctype html>
<html lang="en">
  
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">  

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
    
<body>

<div class="container my-4">

    <button type="button" class="btn btn-primary">
        <a href="http://localhost/DBMS_PRO/PROJECT/FE/addVehicle.html" style="color:white;">
            <i class="fa fa-plus"></i> <strong>Add Vehicle</strong>
        </a>
    </button>

    <u><h1 class="text-center mt-3">Vehicle Details</h1></u>
    <br>

    <table class="table table-striped table-bordered">
        <tr class="thead-dark">
            <th>Vehicle Registration Number</th>
            <th>Vehicle Name</th>
        </tr>

        <?php
        include '../dbconnection.php';

        $fetch_vehicles_query = "SELECT * FROM vehicles";
        $result = mysqli_query($conn, $fetch_vehicles_query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['vehicle_reg_no']}</td>
                        <td>{$row['vehicle_name']}</td>
                      </tr>";
            }
        }
        ?>
    </table>

    <button type="button" class="btn btn-primary">
        <a href="http://localhost/DBMS_PRO/PROJECT/FE/adminInterface.html" style="color:white;">
            <i class="fa fa-arrow-left"></i> <strong>Back</strong>
        </a>
    </button>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>

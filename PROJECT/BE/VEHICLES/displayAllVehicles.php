<!doctype html>
<html lang="en">
  
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">  
</head>
    
<body>

<div class="container my-4">

    <u><h1 class="text-center">Vehicle Details</h1></u> 
    <br>

    <table class="table table-striped table-bordered">
        <tr class="thead-dark">
            <th>Vehicle Registration No</th>
            <th>Employee ID</th>
        </tr>

        <?php
        include '../dbconnection.php';

        $fetch_vehicles_query = "SELECT * FROM vehicles";
        $result = mysqli_query($conn, $fetch_vehicles_query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $emp_id = isset($row["emp_id"]) && $row["emp_id"] != ""
                          ? $row["emp_id"]
                          : "Not Assigned";

                echo "<tr>
                        <td>{$row['vehicle_reg_no']}</td>
                        <td>{$emp_id}</td>
                      </tr>";
            }
        }
        ?>
    </table>

    <button type="button" class="btn btn-primary">
        <a href="http://localhost/DBMS_PRO/PROJECT/FE/adminInterface.html" style="color:white;">
            Back
        </a>
    </button>

</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body> 
</html>

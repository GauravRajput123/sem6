<?php
session_start();

// Retrieve employee details and earning details from session
$employee_details = $_SESSION["employee_details"];
$earning_details = $_SESSION["earning_details"];

// Calculate total earnings
$total = $earning_details["Basic"] + $earning_details["DA"] + $earning_details["HRA"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Information</title>
</head>
<body>
    <h2>Employee Information</h2>
    <p><strong>Employee Number:</strong> <?php echo $employee_details["Eno"]; ?></p>
    <p><strong>Employee Name:</strong> <?php echo $employee_details["Ename"]; ?></p>
    <p><strong>Address:</strong> <?php echo $employee_details["Address"]; ?></p>
    <p><strong>Basic:</strong> <?php echo $earning_details["Basic"]; ?></p>
    <p><strong>DA:</strong> <?php echo $earning_details["DA"]; ?></p>
    <p><strong>HRA:</strong> <?php echo $earning_details["HRA"]; ?></p>
    <p><strong>Total Earnings:</strong> <?php echo $total; ?></p>
</body>
</html>



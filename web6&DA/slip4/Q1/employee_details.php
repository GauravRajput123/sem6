<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["employee_details"] = array(
        "Eno" => $_POST["Eno"],
        "Ename" => $_POST["Ename"],
        "Address" => $_POST["Address"]
    );
    
    header("Location: earning_details.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
</head>
<body>
    <h2>Enter Employee Details</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="Eno">Employee Number:</label>
        <input type="text" id="Eno" name="Eno" required><br>
        <label for="Ename">Employee Name:</label>
        <input type="text" id="Ename" name="Ename" required><br>
        <label for="Address">Address:</label>
        <input type="text" id="Address" name="Address" required><br>
        <input type="submit" value="Next">
    </form>
</body>
</html>


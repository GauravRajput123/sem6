<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["earning_details"] = array(
        "Basic" => $_POST["Basic"],
        "DA" => $_POST["DA"],
        "HRA" => $_POST["HRA"]
    );
    
    header("Location: employee_info.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Earning Details</title>
</head>
<body>
    <h2>Enter Earning Details</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="Basic">Basic:</label>
        <input type="text" id="Basic" name="Basic" required><br>
        <label for="DA">DA:</label>
        <input type="text" id="DA" name="DA" required><br>
        <label for="HRA">HRA:</label>
        <input type="text" id="HRA" name="HRA" required><br>
        <input type="submit" value="Next">
    </form>
</body>
</html>


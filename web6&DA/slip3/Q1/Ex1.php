<?php
session_start();

// Define correct username and password
$correct_username = "user";
$correct_password = "password";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve entered username and password
    $entered_username = $_POST["username"];
    $entered_password = $_POST["password"];

    // Check if entered username and password are correct
    if ($entered_username === $correct_username && $entered_password === $correct_password) {
        // Set session variable to indicate successful login
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $entered_username;

        // Redirect to welcome page
        header("Location: welcome.php");
        exit;
    } else {
        // Increment login attempts
        if (!isset($_SESSION["login_attempts"])) {
            $_SESSION["login_attempts"] = 1;
        } else {
            $_SESSION["login_attempts"]++;
        }

        // Check if maximum login attempts reached
        if ($_SESSION["login_attempts"] >= 3) {
            $error_message = "Maximum login attempts reached. Please try again later.";
        } else {
            $error_message = "Invalid username or password. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($error_message)) echo "<p style='color:red;'>$error_message</p>"; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>



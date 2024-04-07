<?php
// Database connection parameters
$host = "localhost";
$dbname = "info1";
$username = "postgres";
$password = "tybcs";

// Get username and password from POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Connect to database
$conn = pg_connect("host=$host dbname=$dbname user=$username password=$password");
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Prepare SQL statement to check if username and password are valid
$sql = "SELECT * FROM users WHERE username = $1 AND password = $2";
$stmt = pg_prepare($conn, "check_login", $sql);
$result = pg_execute($conn, "check_login", array($username, $password));

// Check if user exists
if (pg_num_rows($result) > 0) {
    echo 'valid';
} else {
    echo 'invalid';
}

// Close connection
pg_close($conn);
?>

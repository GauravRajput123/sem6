<?php
// Database connection parameters
$host = "localhost";
$dbname = "info1";
$username = "postgres";
$password = "tybcs";

// Connect to PostgreSQL database
$conn = pg_connect("host=$host dbname=$dbname user=$username password=$password");

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Retrieve selected employee number from POST request
$eno = $_POST['eno'];

// Query to fetch employee details based on employee number
$sql = "SELECT * FROM EMP WHERE eno = $eno";
$result = pg_query($conn, $sql);

// Prepare data to send as JSON
$employee = array();
if (pg_num_rows($result) > 0) {
    $employee = pg_fetch_assoc($result);
}

// Close connection
pg_close($conn);

// Send data as JSON
header('Content-Type: application/json');
echo json_encode($employee);
?>

<!--
CREATE TABLE EMP (
    eno SERIAL PRIMARY KEY,
    ename VARCHAR(50),
    designation VARCHAR(50),
    salary DECIMAL(10, 2)
);

INSERT INTO EMP (ename, designation, salary) VALUES
    ('John Doe', 'Manager', 50000.00),
    ('Alice Smith', 'Developer', 45000.00),
    ('Michael Johnson', 'Analyst', 48000.00),
    ('Sarah Lee', 'Designer', 47000.00),
    ('David Brown', 'Engineer', 49000.00);-->

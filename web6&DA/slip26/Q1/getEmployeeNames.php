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

// Query to fetch employee names
$sql = "SELECT eno, ename FROM EMP";
$result = pg_query($conn, $sql);

// Prepare data to send as JSON
$employees = array();
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
        $employees[] = $row;
    }
}

// Close connection
pg_close($conn);

// Send data as JSON
header('Content-Type: application/json');
echo json_encode($employees);
?>
<!--
CREATE TABLE users (
    username VARCHAR(50) PRIMARY KEY,
    password VARCHAR(50)
);

INSERT INTO users (username, password) VALUES
    ('john_doe', 'password123'),
    ('alice_smith', 'qwerty'),
    ('michael_johnson', 'abc123'),
    ('sarah_lee', 'pass123'),
    ('david_brown', 'password456');-->

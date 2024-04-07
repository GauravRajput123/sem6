<?php
// Database connection parameters
$host = "localhost";
$dbname = "info";
$username = "postgres";
$password = "tybcs";

// Connect to PostgreSQL database
$conn = pg_connect("host=$host dbname=$dbname user=$username password=$password");

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Query to fetch teacher names
$sql = "SELECT tno, tname FROM TEACHER";
$result = pg_query($conn, $sql);

// Prepare data to send as JSON
$teachers = array();
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
        $teachers[] = $row;
    }
}

// Close connection
pg_close($conn);

// Send data as JSON
header('Content-Type: application/json');
echo json_encode($teachers);
?>

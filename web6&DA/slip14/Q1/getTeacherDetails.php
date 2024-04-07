<?php
$host = "localhost";
$dbname = "info";
$username = "postgres";
$password = "tybcs";

$conn = pg_connect("host=$host dbname=$dbname user=$username password=$password");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

$tno = $_POST['tno'];

$sql = "SELECT * FROM TEACHER WHERE tno = $tno";
$result = pg_query($conn, $sql);

$teacher = array();
if (pg_num_rows($result) > 0) {
    $teacher = pg_fetch_assoc($result);
}

pg_close($conn);

header('Content-Type: application/json');
echo json_encode($teacher);
?>


<!--CREATE TABLE TEACHER (
    tno SERIAL PRIMARY KEY,
    tname VARCHAR(100),
    qualification VARCHAR(100),
    salary DECIMAL(10, 2)

INSERT INTO TEACHER (tname, qualification, salary) VALUES
    ('John Doe', 'Ph.D.', 60000.00),
    ('Alice Smith', 'Masters', 55000.00),
    ('Michael Johnson', 'Bachelor', 50000.00),
    ('Sarah Lee', 'Masters', 58000.00),
    ('David Brown', 'Ph.D.', 62000.00);

);-->

<?php
// Database connection parameters
$host = "localhost";
$dbname = "info";
$username = "postgres";
$password = "tybcs";

// Establish connection
$conn = pg_connect("host=$host dbname=$dbname user=$username password=$password");

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Retrieve teacher name from GET request
$teacherName ="John Doe";

// Prepare SQL statement to select teacher details
$sql = "SELECT * FROM TEACHER WHERE tname = '$teacherName'";
$result = pg_query($conn, $sql);

// Check if query was successful
if ($result) {
    // Check if result contains rows
    if (pg_num_rows($result) > 0) {
        // Output data of each row
        while($row = pg_fetch_assoc($result)) {
            echo "Teacher Number: " . $row["tno"] . "<br>";
            echo "Teacher Name: " . $row["tname"] . "<br>";
            echo "Qualification: " . $row["qualification"] . "<br>";
            echo "Salary: $" . $row["salary"] . "<br>";
        }
    } else {
        echo "No details found for the selected teacher.";
    }
} else {
    echo "Error: " . pg_last_error($conn);
}

// Close connection
pg_close($conn);
?>

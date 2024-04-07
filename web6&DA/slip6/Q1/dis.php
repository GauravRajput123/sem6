<?php
// Load the XML file into a SimpleXML object
$xml = simplexml_load_file("book.xml");

// Display attributes and elements
echo "<h2>Book Information:</h2>";
echo "<ul>";

// Loop through each book element
foreach ($xml->book as $book) {
    echo "<li>";
    echo "<strong>Title:</strong> " . $book->title . "<br>";
    echo "<strong>Author:</strong> " . $book->author . "<br>";
    echo "<strong>Year:</strong> " . $book->attributes()->year . "<br>";
    echo "<strong>Price:</strong> $" . $book->price . "<br>";
    echo "</li>";
}

echo "</ul>";
?>

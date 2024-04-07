<?php
$bookTitle = $_POST['bookTitle'];
$xml = simplexml_load_file('books.xml');

foreach ($xml->book as $book) {
    if ($book->title == $bookTitle) {
        $author = $book->author;
        $year = $book->year;
        $price = $book->price;

        echo "<p>Title: $bookTitle</p>";
        echo "<p>Author: $author</p>";
        echo "<p>Year: $year</p>";
        echo "<p>Price: $price</p>";
        break;
    }
}
?>

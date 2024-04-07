<?php
// Load the XML file using DOMDocument
$doc = new DOMDocument();
$doc->load("Movie.xml");

// Get all elements with tag name "MovieInfo"
$movieInfos = $doc->getElementsByTagName("MovieInfo");

// Loop through each "MovieInfo" element
foreach ($movieInfos as $movieInfo) {
    // Get MovieTitle and ActorName elements for each MovieInfo
    $movieTitle = $movieInfo->getElementsByTagName("MovieTitle")->item(0)->nodeValue;
    $actorName = $movieInfo->getElementsByTagName("ActorName")->item(0)->nodeValue;

    // Print MovieTitle and ActorName
    echo "Movie Title: $movieTitle, Actor Name: $actorName<br>";
}
?>



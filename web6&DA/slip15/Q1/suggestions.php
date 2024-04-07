<?php
$suggestionsArray = array("Apple", "Banana", "Orange", "Grapes", "Pineapple", "Strawberry", "Watermelon");
$query = $_POST['query'];
$matches = array();

if (!empty($query)) {
    foreach ($suggestionsArray as $suggestion) {
        if (stripos($suggestion, $query) !== false) {
            $matches[] = $suggestion;
        }
    }
}

header('Content-Type: application/json');
echo json_encode($matches);
?>

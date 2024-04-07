<?php

session_start();

if(isset($_SESSION['page_views'])) {
    $_SESSION['page_views']++; 
} else {
    $_SESSION['page_views'] = 1; 
}
echo "You have visited this page " . $_SESSION['page_views'] . " times.";

?>

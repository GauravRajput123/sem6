<!DOCTYPE html>
<html>
<head>
    <title>Selected Settings</title>
</head>
<body>
    <h2>Selected Settings:</h2>
    <?php
    // Set cookies for selected preferences
    setcookie("font_style", $_POST["font_style"], time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie("font_size", $_POST["font_size"], time() + (86400 * 30), "/");
    setcookie("font_color", $_POST["font_color"], time() + (86400 * 30), "/");
    setcookie("bg_color", $_POST["bg_color"], time() + (86400 * 30), "/");

    // Display selected preferences
    echo "<p>Font Style: " . $_POST["font_style"] . "</p>";
    echo "<p>Font Size: " . $_POST["font_size"] . "</p>";
    echo "<p>Font Color: <span style='color:" . $_POST["font_color"] . "'>Text</span></p>";
    echo "<p>Background Color: <span style='background-color:" . $_POST["bg_color"] . "'>Text</span></p>";
    ?>
    <br>
    <a href="actual_page.php">View Page with New Settings</a>
</body>
</html>

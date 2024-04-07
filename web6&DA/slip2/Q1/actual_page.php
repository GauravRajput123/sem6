<!DOCTYPE html>
<html>
<head>
    <title>Actual Page</title>
    <?php
    // Retrieve selected preferences from cookies
    $font_style = isset($_COOKIE['font_style']) ? $_COOKIE['font_style'] : 'Arial';
    $font_size = isset($_COOKIE['font_size']) ? $_COOKIE['font_size'] : 'medium';
    $font_color = isset($_COOKIE['font_color']) ? $_COOKIE['font_color'] : '#000000'; // Black
    $bg_color = isset($_COOKIE['bg_color']) ? $_COOKIE['bg_color'] : '#ffffff'; // White

    // Apply selected preferences
    echo "<style>";
    echo "body { font-family: $font_style; font-size: $font_size; color: $font_color; background-color: $bg_color; }";
    echo "</style>";
    ?>
</head>
<body>
    <h2>Actual Page with Selected Settings:</h2>
    <p>This is the actual page with the selected preferences applied.</p>
</body>
</html>

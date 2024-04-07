<!DOCTYPE html>
<html>
<head>
    <title>Preferences</title>
</head>
<body>
    <h2>Select Your Preferences:</h2>
    <form action="display_settings.php" method="post">
        <label for="font_style">Font Style:</label>
        <select name="font_style" id="font_style">
            <option value="Arial">Arial</option>
            <option value="Verdana">Verdana</option>
            <option value="Times New Roman">Times New Roman</option>
        </select><br>

        <label for="font_size">Font Size:</label>
        <select name="font_size" id="font_size">
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
        </select><br>

        <label for="font_color">Font Color:</label>
        <input type="color" name="font_color" id="font_color"><br>

        <label for="bg_color">Background Color:</label>
        <input type="color" name="bg_color" id="bg_color"><br>

        <input type="submit" value="Save Preferences">
    </form>
</body>
</html>

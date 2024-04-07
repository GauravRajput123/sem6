<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fibonacci Series & Sum of Digits</title>
</head>
<body>
    <h2>Fibonacci Series & Sum of Digits</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Enter a number: <input type="number" name="number" required><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <br>

    <?php
    // Function to generate Fibonacci series
    function fibonacci($n) {
        $fib = [];
        $fib[0] = 0;
        $fib[1] = 1;
        for ($i = 2; $i < $n; $i++) {
            $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
        }
        return $fib;
    }

    // Function to find sum of digits of a number
    function sumOfDigits($num) {
        $sum = 0;
        while ($num != 0) {
            $sum += $num % 10;
            $num = floor($num / 10);
        }
        return $sum;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $number = $_POST["number"];

        // Validate input
        if ($number <= 0) {
            echo "Please enter a positive number.";
        } else {
            echo "<h3>Fibonacci Series:</h3>";
            $fibonacciSeries = fibonacci($number);
            foreach ($fibonacciSeries as $fib) {
                echo $fib . " ";
            }

            echo "<h3>Sum of Digits:</h3>";
            $sum = sumOfDigits($number);
            echo "Sum of digits of $number is: $sum";
        }
    }
    ?>
</body>
</html>

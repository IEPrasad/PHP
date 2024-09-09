<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Calculator</title>
</head>
<body>

<h2>PHP Calculator</h2>

<form method="post">
    <label for="num1">Enter first number:</label>
    <input type="number" name="num1" id="num1" required><br><br>

    <label for="num2">Enter second number:</label>
    <input type="number" name="num2" id="num2" required><br><br>

    <label for="operation">Select operation:</label>
    <select name="operation" id="operation" required>
        <option value="add">Addition</option>
        <option value="subtract">Subtraction</option>
        <option value="multiply">Multiplication</option>
        <option value="divide">Division</option>
    </select><br><br>

    <input type="submit" name="submit" value="Calculate">
</form>

<?php
if (isset($_POST['submit'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];
    $result = '';

    // Perform calculation based on the selected operation
    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'subtract':
            $result = $num1 - $num2;
            break;
        case 'multiply':
            $result = $num1 * $num2;
            break;
        case 'divide':
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Cannot divide by zero!";
            }
            break;
        default:
            $result = "Invalid Operation!";
            break;
    }

    // Display result
    echo "<h3>Result: $result</h3>";
}
?>

</body>
</html>


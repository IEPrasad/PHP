<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <style>
        /* Your existing styles remain the same */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
          font-family: cursive;
          font-size: 54px;
          font-weight: bold;
          letter-spacing: 12px;
          background-color: orange;
          border-radius: 4px 12px 4px 12px;
          padding: 3px 12px;
        }

        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .calculator input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            margin-bottom: 10px;
            text-align: right;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .calculator button {
            width: 60px;
            height: 60px;
            margin: 5px;
            font-size: 18px;
            background-color: #f0f0f0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .calculator button:hover {
            background-color: #ddd;
        }

        .calculator button.operation {
            background-color: #ff9500;
            color: white;
        }

        .calculator button.operation:hover {
            background-color: #e08b00;
        }

        .calculator button.equal {
            background-color: #4caf50;
            color: white;
        }

        .calculator button.equal:hover {
            background-color: #45a049;
        }

        .calculator button.clear {
            background-color: #d32f2f;
            color: white;
        }

        .calculator button.clear:hover {
            background-color: #c62828;
        }
    </style>
</head>
<body>

<h2>Calculator App</h2>

<div class="calculator">
    <form method="post">
        <input type="text" name="display" id="display" value="<?php echo isset($_POST['display']) ? $_POST['display'] : ''; ?>" >
        <br>
        <button type="submit" name="button" value="1">1</button>
        <button type="submit" name="button" value="2">2</button>
        <button type="submit" name="button" value="3">3</button>
        <button type="submit" name="button" value="+ " class="operation">+</button>
        <br>
        <button type="submit" name="button" value="4">4</button>
        <button type="submit" name="button" value="5">5</button>
        <button type="submit" name="button" value="6">6</button>
        <button type="submit" name="button" value="- " class="operation">-</button>
        <br>
        <button type="submit" name="button" value="7">7</button>
        <button type="submit" name="button" value="8">8</button>
        <button type="submit" name="button" value="9">9</button>
        <button type="submit" name="button" value="* " class="operation">*</button>
        <br>
        <button type="submit" name="button" value="C" class="clear">C</button>
        <button type="submit" name="button" value="0">0</button>
        <button type="submit" name="button" value="=" class="equal">=</button>
        <button type="submit" name="button" value="/ " class="operation">/</button>
    </form>

    <?php
    if (isset($_POST['button'])) {
        $current = isset($_POST['display']) ? $_POST['display'] : '';

        if ($_POST['button'] === 'C') {
            $current = ''; // Clear display
        } elseif ($_POST['button'] === '=') {
            // Evaluate the expression and handle errors
            try {
                // Prevent code injection by sanitizing the input, allowing only basic operations and numbers
                if (preg_match('/^[0-9+\-*\/\s.()]+$/', $current)) {
                    $current = eval("return $current;"); // Safely evaluate the expression
                } else {
                    $current = "Invalid Input"; // Handle invalid input
                }
            } catch (Throwable $e) {
                $current = "Error"; // Show error if the calculation fails
            }
        } else {
            // Append button value to the current display
            $current .= $_POST['button'];
        }

        echo "<script>document.getElementById('display').value = '$current';</script>";
    }
    ?>
</div>

</body>
</html>

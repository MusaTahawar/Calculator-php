<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .calculator {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .calculator input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .calculator input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        .calculator input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h1>PHP Calculator</h1>
        <form method="post">
            <input type="text" name="num1" placeholder="Enter first number" required>
            <input type="text" name="num2" placeholder="Enter second number" required>
            <select name="operation">
                <option value="add">Add</option>
                <option value="subtract">Subtract</option>
                <option value="multiply">Multiply</option>
                <option value="divide">Divide</option>
            </select>
            <input type="submit" value="Calculate">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve and sanitize input
            $num1 = filter_input(INPUT_POST, 'num1', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $num2 = filter_input(INPUT_POST, 'num2', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $operation = filter_input(INPUT_POST, 'operation', FILTER_SANITIZE_STRING);

            // Validate and perform calculation
            if ($num1 !== false && $num2 !== false && is_numeric($num1) && is_numeric($num2)) {
                switch ($operation) {
                    case 'add':
                        $result = $num1 + $num2;
                        echo "<p>Result: $result</p>";
                        break;
                    case 'subtract':
                        $result = $num1 - $num2;
                        echo "<p>Result: $result</p>";
                        break;
                    case 'multiply':
                        $result = $num1 * $num2;
                        echo "<p>Result: $result</p>";
                        break;
                    case 'divide':
                        if ($num2 != 0) {
                            $result = $num1 / $num2;
                            echo "<p>Result: $result</p>";
                        } else {
                            echo "<p>Error: Division by zero is not allowed.</p>";
                        }
                        break;
                    default:
                        echo "<p>Invalid operation selected.</p>";
                        break;
                }
            } else {
                echo "<p>Please enter valid numbers.</p>";
            }
        }
        ?>
    </div>
</body>
</html>

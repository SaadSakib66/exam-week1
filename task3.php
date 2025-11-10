<?php
session_start(); // Step 1: Start the session

// Step 2: Handle form submission (name and budget)
if (isset($_POST['submit'])) {
    $_SESSION['name']   = $_POST['name'];
    $_SESSION['budget'] = $_POST['budget'];
}

// Step 3: Handle session delete
if (isset($_POST['delete_session'])) {
    session_unset();   // Remove all session variables
    session_destroy(); // Destroy the session
    header("Location: task3.php"); // Refresh the page
    exit;
}

// Step 4: Recursive function to calculate sum of an array
function recursiveSum($array) {
    if (empty($array)) return 0;  // base case
    return array_shift($array) + recursiveSum($array);
}

// Step 5: Function that applies a discount using a callback
function applyDiscount($amount, $callback) {
    return $callback($amount);
}

// Step 6: Function to divide two numbers with try-catch-finally
function divide($a, $b) {
    try {
        if ($b == 0) {
            throw new Exception("Division by zero is not allowed.");
        }
        return $a / $b;
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    } finally {
        // Always executes
        // Could be used to close resources or log
    }
}
?>

<!-- Step 1 & 2: Simple Form to Take User Input -->
<!DOCTYPE html>
<html>
<head>
    <title>Task 3 - PHP Practice</title>
</head>
<body>
    <h2>Enter Your Details</h2>

    <?php if (!isset($_SESSION['name'])): ?>
        <form method="POST" action="">
            <label>Name: </label>
            <input type="text" name="name" required><br><br>

            <label>Budget: </label>
            <input type="number" name="budget" required><br><br>

            <button type="submit" name="submit">Save</button>
        </form>

    <?php else: ?>
        <h3>Welcome, <?= htmlspecialchars($_SESSION['name']); ?>! 
        Your budget is <?= htmlspecialchars($_SESSION['budget']); ?>.</h3>

        <form method="POST" action="">
            <button type="submit" name="delete_session">Delete Session</button>
        </form>

        <hr>
        <!-- Demonstrating the Recursive Function -->
        <?php
        $numbers = [10, 20, 30, 40];
        echo "<b>Array:</b> " . implode(", ", $numbers) . "<br>";
        echo "<b>Sum (recursive):</b> " . recursiveSum($numbers) . "<br><br>";

        // Demonstrating the callback discount function
        $price = 1000;
        $discount = function($amount) {
            return $amount * 0.9; // 10% discount
        };
        echo "<b>Original Price:</b> $price<br>";
        echo "<b>After Discount:</b> " . applyDiscount($price, $discount) . "<br><br>";

        // Demonstrating try-catch-finally
        echo "<b>Division Result (10 / 2):</b> " . divide(10, 2) . "<br>";
        echo "<b>Division Result (10 / 0):</b> " . divide(10, 0) . "<br>";
        ?>
    <?php endif; ?>
</body>
</html>

<?php
// Expense Calculator - Task 1

// 1) Create constants for app name and author
define('APP_NAME', 'Expense Calculator');
define('APP_AUTHOR', 'Codex');

// 2) Print them using echo, print, and printf
echo '<h2>' . APP_NAME . '</h2>';
print '<p>Author: ' . APP_AUTHOR . '</p>';
printf('<p>%s by %s</p>', APP_NAME, APP_AUTHOR);

// 3) Create variables for food, transport, and other expenses
$food = 450.75;
$transport = 320.00;
$other = 150.25;

// 7) Function to calculate total expense
function calculateTotal(float $food, float $transport, float $other): float {
    return $food + $transport + $other;
}

// 8) Function to check the budget and show the result
function budgetStatus(float $total, float $limit = 1000): string {
    return $total > $limit ? 'Budget Exceeded' : 'Within Budget';
}

// 4) Calculate total and average expense
$total = calculateTotal($food, $transport, $other);
$average = $total / 3;

echo '<h3>Expenses</h3>';
printf('<p>Food: %.2f</p>', $food);
printf('<p>Transport: %.2f</p>', $transport);
printf('<p>Other: %.2f</p>', $other);
printf('<p><strong>Total:</strong> %.2f</p>', $total);
printf('<p><strong>Average:</strong> %.2f</p>', $average);

// 5) If total > 1000, show a budget message
if ($total > 1000) {
    echo "<p style='color:red;'>Budget Exceeded</p>";
} else {
    echo "<p style='color:green;'>Within Budget</p>";
}

// 6) Ternary for a quick expense range message
echo '<p>Quick Status (ternary): ' . ($total > 1000 ? 'Over Budget' : 'OK') . '</p>';

// 6) Switch case for expense range message
$rangeMessage = '';
switch (true) {
    case $total < 500:
        $rangeMessage = 'Low expense range';
        break;
    case $total <= 1000:
        $rangeMessage = 'Moderate expense range';
        break;
    default:
        $rangeMessage = 'High expense range';
        break;
}
echo '<p>Range (switch): ' . $rangeMessage . '</p>';

// Use function to check budget
echo '<p>Budget Check (function): ' . budgetStatus($total) . '</p>';

?>


<?php
echo "<h1><b>Problem 1</b></h1>";
// Problem 1
$expenses = [
    "Food" => 2500,
    "Transport" => 800,
    "Rent" => 12000,
    "Utilities" => 1500,
    "Entertainment" => 700
];

// Print all categories and expenses
foreach ($expenses as $category => $amount) {
    echo "$category: $amount Tk<br>";
}

// Problem-2

echo "<h1><b>Problem 2</b></h1>";

$categories = ["Food", "Transport", "Rent"];
$expenses   = [2500, 800, 12000];

array_push($categories, "Utilities", "Travel");
array_push($expenses, 1500, 700);

$lastCategory = array_pop($categories);
$lastExpense  = array_pop($expenses);

echo "Removed Category: $lastCategory, Expense: $lastExpense<br><br>";

// Step 4: Merge arrays (example: merging with another month's data)
$extraCategories = ["Healthcare", "Education"];
$extraExpenses   = [1200, 2000];

$allCategories = array_merge($categories, $extraCategories);
$allExpenses   = array_merge($expenses, $extraExpenses);

// Step 5: Display all categories and expenses
echo "<b>All Expenses:</b><br>";
foreach ($allCategories as $index => $cat) {
    echo "$cat: {$allExpenses[$index]} Tk<br>";
}

// Step 6: Calculate total expense using array_sum()
$totalExpense = array_sum($allExpenses);
echo "<br><b>Total Expense:</b> $totalExpense Tk";


// Problem 3

echo "<h1><b>Problem 3</b></h1>";


// Step 1: Create a string of expenses
$expenseString = "2500,800,12000,1500,700";

echo "<b>Original String:</b> $expenseString<br><br>";

// Step 2: Convert string to array using explode()
$expensesArray = explode(",", $expenseString);

echo "<b>Converted to Array:</b><br>";
print_r($expensesArray);
echo "<br><br>";

// Step 3: You can now modify the array
array_push($expensesArray, 1000); // Add a new expense

// Step 4: Convert array back to string using implode()
$newExpenseString = implode(",", $expensesArray);

echo "<b>Converted Back to String:</b> $newExpenseString";



// Problem 4

echo "<h1><b>Problem 4</b></h1>";

$category = "entertainment";

// Step 2: Convert to uppercase using strtoupper()
$upperCategory = strtoupper($category);
echo "Uppercase Category: $upperCategory<br>";

// Step 3: Find the string length using strlen()
$length = strlen($category);
echo "Length of '$category': $length characters<br>";

// Step 4: Get a substring using substr()
$shortCategory = substr($category, 0, 5); // first 5 letters
echo "Shortened Category: $shortCategory<br>";

// Step 5: Replace part of a string using str_replace()
$updatedCategory = str_replace("entertain", "fun", $category);
echo "Updated Category: $updatedCategory<br><br>";

// Step 6: Combine with an expense string
$expenseString = "2500,800,12000,1500,700";
echo "Original Expense String: $expenseString<br>";

// Replace commas with ' | ' for nicer display
$formattedExpenses = str_replace(",", " | ", $expenseString);
echo "Formatted Expense String: $formattedExpenses";


// Problem 5

echo "<h1><b>Problem 5</b></h1>";

$categories = ["Food", "Transport", "Rent", "Utilities", "Entertainment"];
$expenses   = [2500, 800, 12000, 1500, 700];

// Step 2: Combine categories and expenses into one string
$data = "Category | Expense (Tk)\n";
$data .= "--------------------\n";

foreach ($categories as $index => $category) {
    $data .= $category . " | " . $expenses[$index] . "\n";
}

// Step 3: Write data into a text file
$file = "expenses.txt"; // file name

// fopen() opens the file; 'w' means write mode (creates if not exists, overwrites if exists)
$handle = fopen($file, "w");

if ($handle) {
    fwrite($handle, $data); // write data to file
    fclose($handle);        // close the file
    echo "✅ Expense data written to <b>$file</b> successfully!";
} else {
    echo "❌ Unable to open file for writing.";
}


// Problem 6

echo "<h1><b>Problem 6</b></h1>";

$file = "expenses.txt";

// Step 2: New expense data to append
$newCategory = "Healthcare";
$newExpense  = 1200;

// Step 3: Format the new line (same structure as before)
$newLine = $newCategory . " | " . $newExpense . PHP_EOL;

// Step 4: Append new data to file using 'a' mode (append)
$handle = fopen($file, "a"); // 'a' means append mode — it won’t erase old data

if ($handle) {
    fwrite($handle, $newLine);
    fclose($handle);
    echo "✅ New expense added successfully!<br><br>";
} else {
    echo "❌ Unable to open file for appending.<br><br>";
}

// Step 5: Read the full file contents
if (file_exists($file)) {
    echo "<b>📄 Current Expenses Data:</b><br><pre>";

    // Method 1: Read the entire file as a string
    $contents = file_get_contents($file);
    echo htmlspecialchars($contents); // safely display file content on the web page

    echo "</pre>";
} else {
    echo "❌ File not found!";
}













?>
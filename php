QUESTION 1
<?php
$capital = 67;
print("Variable capital is $capital");
print("Variable CaPiTaL is $CaPiTaL");
?>

Output:
Variable capital is 67Variable CaPiTaL is 

QUESTION 2
<?php
// Define the size of the table
$size = 3;

// Print header row
for ($i = 1; $i <= $size; $i++) {
    echo "$i ";
}
echo "\n";

// Print the division table
for ($row = 1; $row <= $size; $row++) {
    echo "$row "; // Row header
    for ($col = 1; $col <= $size; $col++) {
        $result = $row / $col;
        // Format to 2 decimal places
        echo number_format($result, 2) . " ";
    }
    echo "\n";
}
?>

Output:

1 2 3 
1 1.00 0.50 0.33 
2 2.00 1.00 0.67 
3 3.00 1.50 1.00 

QUESTION 4
<?php
$animal = "antelope"; 
$animal_heads = 1; 
$animal_legs = 4;

echo "The $animal has $animal_heads head(s).";
echo "The $animal has $animal_legs leg(s).";
?>
Output:
The antelope has 1 head(s).The antelope has 4 leg(s).

QUESTION 5
<!DOCTYPE html>
<html>
<head>
  <title>Purchase Cost Calculator</title>
</head>
<body>
  <h2>Purchase Cost Calculator</h2>

  <form method="post">
    <h3>Item 1:</h3>
    Price: <input type="number" name="price1" step="0.01" required>
    Quantity: <input type="number" name="qty1" required><br><br>

    <h3>Item 2:</h3>
    Price: <input type="number" name="price2" step="0.01" required>
    Quantity: <input type="number" name="qty2" required><br><br>

    <h3>Item 3:</h3>
    Price: <input type="number" name="price3" step="0.01" required>
    Quantity: <input type="number" name="qty3" required><br><br>

    <input type="submit" name="submit" value="Calculate Total">
  </form>

  <?php
  if (isset($_POST['submit'])) {
    // Collect prices and quantities
    $price1 = $_POST['price1'];
    $qty1 = $_POST['qty1'];

    $price2 = $_POST['price2'];
    $qty2 = $_POST['qty2'];

    $price3 = $_POST['price3'];
    $qty3 = $_POST['qty3'];

    // Calculate subtotal
    $subtotal = ($price1 * $qty1) + ($price2 * $qty2) + ($price3 * $qty3);

    // Calculate tax and total
    $tax = $subtotal * 0.10;
    $total = $subtotal + $tax;

    // Display results
    echo "<h3>Results:</h3>";
    echo "Subtotal: ₹" . number_format($subtotal, 2) . "<br>";
    echo "Tax (10%): ₹" . number_format($tax, 2) . "<br>";
    echo "<strong>Total Cost: ₹" . number_format($total, 2) . "</strong>";
  }
  ?>
</body>
</html>

QUESTION 6
<?php
// Start the session at the top of the page
session_start();

// Set session variables
$_SESSION['username'] = 'Gayathri';
$_SESSION['role'] = 'Student';

// Handle POST form submission
$postName = $_POST['post_name'] ?? null;
$postAge = $_POST['post_age'] ?? null;

// Handle GET parameters
$getName = $_GET['name'] ?? null;
$getAge = $_GET['age'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Passing in PHP</title>
</head>
<body>
  <h1>PHP Data Passing Example</h1>

  <!-- GET Method -->
  <h2>1. Pass data using GET</h2>
  <a href="data_passing.php?name=Gayathri&age=21">Click here to send data using GET</a>

  <!-- POST Method -->
  <h2>2. Pass data using POST</h2>
  <form method="post" action="data_passing.php">
    Name: <input type="text" name="post_name" required><br>
    Age: <input type="number" name="post_age" required><br>
    <input type="submit" value="Send with POST">
  </form>

  <!-- Display Results -->
  <hr>

  <h2>📤 Received via GET:</h2>
  <?php
  if ($getName && $getAge) {
    echo "Name: " . htmlspecialchars($getName) . "<br>";
    echo "Age: " . htmlspecialchars($getAge) . "<br>";
  } else {
    echo "No GET data received.<br>";
  }
  ?>

  <h2>📤 Received via POST:</h2>
  <?php
  if ($postName && $postAge) {
    echo "Name: " . htmlspecialchars($postName) . "<br>";
    echo "Age: " . htmlspecialchars($postAge) . "<br>";
  } else {
    echo "No POST data received.<br>";
  }
  ?>

  <h2>📤 Session Data:</h2>
  <?php
  echo "Username: " . $_SESSION['username'] . "<br>";
  echo "Role: " . $_SESSION['role'] . "<br>";
  ?>

</body>
</html>

QUESTION 7
<!DOCTYPE html>
<html>
<head>
  <title>Greeting Form</title>
</head>
<body>

  <h2>Enter Your Name</h2>

  <form method="post" action="">
    Name: <input type="text" name="username">
    <input type="submit" value="Submit">
  </form>

  <br>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['username']); // remove extra spaces

    if (empty($name)) {
      echo "<p style='color:red;'>Error: Name field cannot be empty.</p>";
    } else {
      echo "<h3>Hello $name, Welcome to Everyone!</h3>";
      echo "<h4>Have a nice day!!</h4>";
    }
  }
  ?>

</body>
</html>

QUESTION 8
<?php
function deal($costA, $sizeA, $costB, $sizeB) {
    // Calculate cost per unit for both drinks
    $unitA = $costA / $sizeA;
    $unitB = $costB / $sizeB;

    echo "Drink A - ₹$costA for $sizeA units: ₹" . round($unitA, 2) . " per unit<br>";
    echo "Drink B - ₹$costB for $sizeB units: ₹" . round($unitB, 2) . " per unit<br><br>";

    // Compare and give recommendation
    if ($unitA < $unitB) {
        echo "<strong>Choose Drink A. It offers a better deal.</strong>";
    } elseif ($unitB < $unitA) {
        echo "<strong>Choose Drink B. It offers a better deal.</strong>";
    } else {
        echo "<strong>Both drinks cost the same per unit. Choose any.</strong>";
    }
}

// Call the function with given values
deal(25, 11, 23, 9);
?>
OUTPUT:
Drink A - ₹25 for 11 units: ₹2.27 per unit<br>Drink B - ₹23 for 9 units: ₹2.56 per unit<br><br><strong>Choose Drink A. It offers a better deal.</strong>
=== Code Execution Successful ===

QUESTION 9
<!DOCTYPE html>
<html>
<head>
  <title>PHP Variable Output</title>
</head>
<body>

  <h2>PHP Output with Variables</h2>

  <?php
  // Correct variable names
  $var1 = "this";
  $that = "that";
  $the_other = 2.2000000000;

  // Display each variable
  echo "<p><strong>var1:</strong> $var1</p>";
  echo "<p><strong>that:</strong> $that</p>";
  echo "<p><strong>the_other:</strong> $the_other</p>";

  // Display combined output (with undefined variable $not_set)
  echo "<h3>Combined Output:</h3>";
  echo "<p>";
  echo "$var1," . @$not_set . ",$that+$the_other";
  echo "</p>";
  ?>

</body>
</html>

OUTPUT:
PHP Output with Variables
var1: $var1
"; echo "
that: $that

"; echo "
the_other: $the_other

"; // Display combined output (with undefined variable $not_set) echo "
Combined Output:
"; echo "
"; echo "$var1," . @$not_set . ",$that+$the_other"; echo "

"; ?>

QUESTION 13
<?php
// Convert number to string and extract a substring
$sub = substr(12345, 2, 2);

// Display the result
echo "sub is $sub";
?>
Output:
sub is 34

QUESTION 18
<!DOCTYPE html>
<html>
<head>
  <title>Using isset() in PHP</title>
</head>
<body>

<h2>Enter Your Name</h2>

<form method="post">
  <input type="text" name="username" placeholder="Enter your name"><br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Check if the username is set and not empty
    if (isset($_POST['username']) && $_POST['username'] != "") {
        $name = $_POST['username'];
        echo "<h3>Hello, $name!</h3>";
    } else {
        echo "<h3>Error: Name field is empty!</h3>";
    }
}
?>

</body>
</html>

QUESTION 19
<!DOCTYPE html>
<html>
<head>
  <title>Find Highest and Lowest</title>
</head>
<body>

<h2>Enter Numbers (comma-separated):</h2>

<form method="post">
  <input type="text" name="numbers" placeholder="e.g., 10, 25, 5, 88, 43">
  <input type="submit" name="submit" value="Find">
</form>

<?php
// Define the function
function findHighLow($array) {
    $highest = max($array);
    $lowest = min($array);
    return array("highest" => $highest, "lowest" => $lowest);
}

// When form is submitted
if (isset($_POST['submit'])) {
    $input = $_POST['numbers'];
   
    if (!empty($input)) {
        // Convert string to array
        $num_array = array_map('intval', explode(",", $input));

        // Call the function
        $result = findHighLow($num_array);

        echo "<h3>Results:</h3>";
        echo "Highest Number: " . $result['highest'] . "<br>";
        echo "Lowest Number: " . $result['lowest'];
    } else {
        echo "<p style='color:red;'>Please enter some numbers.</p>";
    }
}
?>

</body>
</html>

QUESTION 20
<!DOCTYPE html>
<html>
<head>
  <title>Find Highest and Lowest</title>
</head>
<body>

<h2>Enter Numbers (comma-separated):</h2>

<form method="post">
  <input type="text" name="numbers" placeholder="e.g., 10, 25, 5, 88, 43">
  <input type="submit" name="submit" value="Find">
</form>

<?php
// Define the function
function findHighLow($array) {
    $highest = max($array);
    $lowest = min($array);
    return array("highest" => $highest, "lowest" => $lowest);
}

// When form is submitted
if (isset($_POST['submit'])) {
    $input = $_POST['numbers'];
   
    if (!empty($input)) {
        // Convert string to array
        $num_array = array_map('intval', explode(",", $input));

        // Call the function
        $result = findHighLow($num_array);

        echo "<h3>Results:</h3>";
        echo "Highest Number: " . $result['highest'] . "<br>";
        echo "Lowest Number: " . $result['lowest'];
    } else {
        echo "<p style='color:red;'>Please enter some numbers.</p>";
    }
}
?>

</body>
</html>

QUESTION 21
<!DOCTYPE html>
<html>
<head>
  <title>Leap Year Checker</title>
</head>
<body>

<h2>Check if a Year is a Leap Year</h2>

<form method="post">
  Enter Year: <input type="number" name="year" required>
  <input type="submit" name="submit" value="Check">
</form>

<?php
// Leap year checking function
function isLeapYear($year) {
    // Leap year rules
    return ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
}

// If form is submitted
if (isset($_POST['submit'])) {
    $year = intval($_POST['year']);

    if (isLeapYear($year)) {
        echo "<p><strong>$year</strong> is a <span style='color:green;'>Leap Year.</span></p>";
    } else {
        echo "<p><strong>$year</strong> is <span style='color:red;'>Not a Leap Year.</span></p>";
    }
}
?>

</body>
</html>

QUESTION 22
<!DOCTYPE html>
<html>
<head>
  <title>Word Occurrence Counter</title>
</head>
<body>

<h2>Count Word Occurrences</h2>

<form method="post">
  Enter a sentence:<br>
  <textarea name="text" rows="4" cols="50" required></textarea><br><br>

  Enter the word to count:<br>
  <input type="text" name="word" required><br><br>

  <input type="submit" name="submit" value="Count Word">
</form>

<?php
if (isset($_POST['submit'])) {
    $text = strtolower($_POST['text']);
    $word = strtolower(trim($_POST['word']));

    // Count occurrences using substr_count
    $wordCount = substr_count($text, $word);

    echo "<h3>Result:</h3>";
    echo "The word '<strong>$word</strong>' appears <strong>$wordCount</strong> time(s) in the given text.";
}
?>

</body>
</html>

QUESTION 23
<!DOCTYPE html>
<html>
<head>
  <title>GET and POST Example</title>
</head>
<body>

<h2>Search Form (GET Method)</h2>
<form method="get">
  Search: <input type="text" name="search">
  <input type="submit" value="Search">
</form>

<?php
// Handle GET request
if (isset($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);
    echo "<p>You searched for: <strong>$search</strong></p>";
}
?>

<hr>

<h2>Login Form (POST Method)</h2>
<form method="post">
  Username: <input type="text" name="username" required><br>
  Password: <input type="password" name="password" required><br>
  <input type="submit" name="login" value="Login">
</form>

<?php
// Handle POST request
if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
   
    // Dummy login check (for example only)
    if ($username == "admin" && $password == "1234") {
        echo "<p>✅ Welcome, <strong>$username</strong>! You are logged in.</p>";
    } else {
        echo "<p>❌ Invalid username or password.</p>";
    }
}
?>

</body>
</html>

QUESTION 24
<?php
// Sample string
$text = "  Hello World! Welcome to PHP string functions.  ";

// Display original string
echo "<h3>Original String:</h3>";
echo "<pre>$text</pre>";

// 1. strlen() – Get string length
echo "<p><strong>Length:</strong> " . strlen($text) . "</p>";

// 2. trim() – Remove whitespace
$trimmed = trim($text);
echo "<p><strong>Trimmed:</strong> '$trimmed'</p>";

// 3. strtolower() – Convert to lowercase
echo "<p><strong>Lowercase:</strong> " . strtolower($trimmed) . "</p>";

// 4. strtoupper() – Convert to uppercase
echo "<p><strong>Uppercase:</strong> " . strtoupper($trimmed) . "</p>";

// 5. ucfirst() – First character uppercase
echo "<p><strong>ucfirst:</strong> " . ucfirst($trimmed) . "</p>";

// 6. ucwords() – Uppercase first character of each word
echo "<p><strong>ucwords:</strong> " . ucwords($trimmed) . "</p>";

// 7. strrev() – Reverse the string
echo "<p><strong>Reversed:</strong> " . strrev($trimmed) . "</p>";

// 8. strpos() – Find position of word
$position = strpos($trimmed, "PHP");
echo "<p><strong>Position of 'PHP':</strong> $position</p>";

// 9. str_replace() – Replace words
$replaced = str_replace("PHP", "HTML", $trimmed);
echo "<p><strong>After Replace 'PHP' with 'HTML':</strong> $replaced</p>";

// 10. substr() – Extract part of string
echo "<p><strong>Substring (start at 6, length 5):</strong> " . substr($trimmed, 6, 5) . "</p>";

// 11. explode() – Convert string to array
$words = explode(" ", $trimmed);
echo "<p><strong>Exploded into array:</strong><pre>";
print_r($words);
echo "</pre></p>";

// 12. implode() – Convert array to string
$joined = implode("-", $words);
echo "<p><strong>Imploded back:</strong> $joined</p>";

// 13. str_repeat() – Repeat a string
echo "<p><strong>Repeat 'Hi ' 3 times:</strong> " . str_repeat("Hi ", 3) . "</p>";

// 14. strcmp() – Compare strings (case-sensitive)
echo "<p><strong>Compare 'Hello' and 'hello':</strong> " . strcmp("Hello", "hello") . "</p>";

// 15. str_shuffle() – Shuffle characters
echo "<p><strong>Shuffled string:</strong> " . str_shuffle($trimmed) . "</p>";

// 16. number_format() – Format number as string
$number = 12345.6789;
echo "<p><strong>Formatted Number:</strong> " . number_format($number, 2) . "</p>";

?>

QUESTION 25
<?php
// Original string
$text = "The Thing will come to you soon";

// Replace the first occurrence of 'the' (case-insensitive)
$updated = preg_replace('/\bthe\b/i', 'best', $text, 1);

// Display the result
echo "<p><strong>Original:</strong> $text</p>";
echo "<p><strong>Modified:</strong> $updated</p>";
?>

QUESTION 26
<!DOCTYPE html>
<html>
<head>
    <title>Chess Board</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td {
            width: 60px;
            height: 60px;
        }
        .white {
            background-color: #ffffff;
        }
        .black {
            background-color: #000000;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Chess Board using PHP</h2>

<table border="1">
    <?php
    for ($row = 1; $row <= 8; $row++) {
        echo "<tr>";
        for ($col = 1; $col <= 8; $col++) {
            $total = $row + $col;
            if ($total % 2 == 0) {
                echo "<td class='white'></td>";
            } else {
                echo "<td class='black'></td>";
            }
        }
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>

QUESTION 27
<?php
$a = 10;
$b = 3;

echo "Addition (a + b): " . ($a + $b) . "<br>";        // 13
echo "Subtraction (a - b): " . ($a - $b) . "<br>";     // 7
echo "Multiplication (a * b): " . ($a * $b) . "<br>";  // 30
echo "Division (a / b): " . ($a / $b) . "<br>";        // 3.333...
echo "Modulus (a % b): " . ($a % $b) . "<br>";         // 1
echo "Exponentiation (a ** b): " . ($a ** $b) . "<br>";// 1000
?>

QUESTION 28
<?php
$a = 100;
$b = "100";
$c = 100.0;

// Compare values using var_dump
echo "Comparing \$a and \$b:<br>";
var_dump($a == $b);  // true - values are equal
var_dump($a === $b); // false - different types

echo "<br><br>Comparing \$a and \$c:<br>";
var_dump($a == $c);  // true - values are equal
var_dump($a === $c); // false - integer vs float

echo "<br><br>Comparing \$b and \$c:<br>";
var_dump($b == $c);  // true - after type juggling
var_dump($b === $c); // false - string vs float
?>

QUESTION 29
<?php
echo "<h2>PHP Function Examples</h2>";

// 1. rand()
echo "<strong>1. rand():</strong><br>";
$randomNumber = rand(1, 100);
echo "Random number between 1 and 100 is: $randomNumber<br><br>";

// 2. abs()
echo "<strong>2. abs():</strong><br>";
$number = -25;
echo "Absolute value of $number is: " . abs($number) . "<br><br>";

// 3. str_replace()
echo "<strong>3. str_replace():</strong><br>";
$text = "Hello world!";
$replaced = str_replace("world", "PHP", $text);
echo "After replacement: $replaced<br><br>";

// 4. pi()
echo "<strong>4. pi():</strong><br>";
echo "Value of pi is: " . pi() . "<br><br>";

// 5. ceil()
echo "<strong>5. ceil():</strong><br>";
$value = 4.3;
echo "Ceiling value of $value is: " . ceil($value) . "<br>";
?>

QUESTION 30
<?php
function generatePassword($length = 12) {
    // Character set including letters, numbers, and special characters
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{}|;:,.<>?';

    $password = '';
    $charLength = strlen($chars);

    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[rand(0, $charLength - 1)];
    }

    return $password;
}

// Generate and display the password
echo "<h3>Generated Random Password:</h3>";
echo "<strong>" . generatePassword(12) . "</strong>"; // 12-character password
?>

QUESTION 31
<?php
$fruits = array("Apple", "Banana", "Cherry", "Mango");

echo "Original array:\n";
print_r($fruits);

// Remove the first element
array_shift($fruits);

echo "Array after removing first element:\n";
print_r($fruits);
?>

Output:

Original array:
Array
(
    [0] => Apple
    [1] => Banana
    [2] => Cherry
    [3] => Mango
)
Array after removing first element:
Array
(
    [0] => Banana
    [1] => Cherry
    [2] => Mango
)

QUESTION 32 a)
<?php
$mail = "admin@example.com";                     // Step 1: $mail contains "admin@example.com"
$mail = str_replace("a","@",$mail);              // Step 2: Replace every "a" with "@"
echo "Contact me at $mail.";                     // Step 3: Output the string
?>

Output:
Contact me at @dmin@ex@mple.com.

QUESTION 32 b)
<?php
$names = array("alex", "jean", "emily", "jane");

// Find all names starting with 'e'
$name = preg_grep("/^e/", $names);

// Display the matching names
print_r($name);
?>

Output:
Array
(
    [2] => emily
)

QUESTION 33
<?php
// Create a 3x3 matrix as a multidimensional array
$matrix = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

// Access the value in the second row and third column
$value = $matrix[1][2]; // Index starts at 0: row 1 = second row, col 2 = third column

// Display the value
echo "The value in the second row and third column is: $value";
?>

Output:

The value in the second row and third column is: 6

QUESTION 34
<?php
// Original string
$text = "PHP is great. Learning PHP is fun! PHP PHP PHP.";

// Replace all occurrences of the word 'PHP' with 'JavaScript'
$newText = preg_replace("/\bPHP\b/", "JavaScript", $text);

// Display the result
echo $newText;
?>

Output:
JavaScript is great. Learning JavaScript is fun! JavaScript JavaScript JavaScript.

QUESTION 35

<?php
// Array of strings
$strings = array(
    "PHP is great for web development.",
    "I love coding in JavaScript.",
    "Python is popular for data science."
);

// The word to search for
$search = "PHP";

// Loop through each string and check if it contains the search word
foreach ($strings as $text) {
    if (strpos($text, $search) !== false) {
        echo "The string '$text' contains '$search'.<br>";
    } else {
        echo "The string '$text' does not contain '$search'.<br>";
    }
}
?>

Output:
The string 'PHP is great for web development.' contains 'PHP'.<br>The string 'I love coding in JavaScript.' does not contain 'PHP'.<br>The string 'Python is popular for data science.' does not contain 'PHP'.<br>

QUESTION 36
<?php
// Create an array of fruits
$fruits = array("Apple", "Banana", "Cherry", "Mango", "Orange");

// Display the third element (index 2, because arrays are zero-based)
echo "The third fruit is: " . $fruits[2];
?>

Output:
The third fruit is: Cherry

QUESTION 37
<?php
// Step 1: Create an array of fruits
$fruits = array("Apple", "Banana", "Cherry");
echo "Initial fruits:\n";
print_r($fruits);

// Step 2: Push new fruits to the end of the array
array_push($fruits, "Mango", "Orange");
echo "\nAfter pushing Mango and Orange:\n";
print_r($fruits);

// Step 3: Pop the last fruit from the array
$removedFruit = array_pop($fruits);
echo "\nAfter popping last fruit ($removedFruit):\n";
print_r($fruits);

// Step 4: Display the third element (index 2)
if (isset($fruits[2])) {
    echo "\nThe third fruit is: " . $fruits[2];
} else {
    echo "\nThere is no third fruit in the array.";
}
?>

Output:

Initial fruits:
Array
(
    [0] => Apple
    [1] => Banana
    [2] => Cherry
)

After pushing Mango and Orange:
Array
(
    [0] => Apple
    [1] => Banana
    [2] => Cherry
    [3] => Mango
    [4] => Orange
)

After popping last fruit (Orange):
Array
(
    [0] => Apple
    [1] => Banana
    [2] => Cherry
    [3] => Mango
)

The third fruit is: Cherry

QUESTION 38
<?php
// Step 1: Create an array
$fruits = array("Apple", "Banana", "Cherry", "Mango");

// Step 2: Initialize counter
$i = 0;

// Step 3: Find total number of elements
$total = count($fruits);

// Step 4: Iterate using while loop
while ($i < $total) {
    echo "Fruit at index $i: " . $fruits[$i] . "\n";
    $i++; // Step 6: Increment counter
}
?>

Output:

Fruit at index 0: Apple
Fruit at index 1: Banana
Fruit at index 2: Cherry
Fruit at index 3: Mango

QUESTION 39
<?php
// Step 1: Input student scores
$students = array(
    "Alice" => 92,
    "Bob" => 81,
    "Charlie" => 68,
    "David" => 45,
    "Eva" => 30
);

// Step 2: Function to determine grade
function getGrade($score) {
    if ($score >= 90) {
        return "A";
    } elseif ($score >= 75) {
        return "B";
    } elseif ($score >= 50) {
        return "C";
    } elseif ($score >= 35) {
        return "D";
    } else {
        return "F";
    }
}

// Step 3: Calculate grades and store results
$results = array();
foreach ($students as $name => $score) {
    $results[$name] = array(
        "Score" => $score,
        "Grade" => getGrade($score)
    );
}

// Step 4: Generate summary statistics
$totalScore = array_sum($students);
$average = $totalScore / count($students);
$highest = max($students);
$lowest = min($students);

// Step 5: Display report
echo "Student Grade Report:\n";
foreach ($results as $name => $data) {
    echo $name . " - Score: " . $data['Score'] . ", Grade: " . $data['Grade'] . "\n";
}

echo "\nSummary:\n";
echo "Average Score: " . round($average, 2) . "\n";
echo "Highest Score: " . $highest . "\n";
echo "Lowest Score: " . $lowest . "\n";
?>

Output:

Student Grade Report:
Alice - Score: 92, Grade: A
Bob - Score: 81, Grade: B
Charlie - Score: 68, Grade: C
David - Score: 45, Grade: D
Eva - Score: 30, Grade: F

Summary:
Average Score: 63.2
Highest Score: 92
Lowest Score: 30

QUESTION 40
<?php
// Input string
$text = "Hello@# World! 123 *&^%$ PHP_2025";

// Convert the string into an array of characters
$chars = str_split($text);

// Create a new array to hold only allowed characters
$filtered = array();

// Loop through each character
foreach ($chars as $char) {
    // Check if the character is allowed
    if (ctype_alnum($char) || $char === " ") {
        $filtered[] = $char;
    }
}

// Convert filtered array back to string
$cleanText = implode("", $filtered);

// Output result
echo "Original: $text\n";
echo "Cleaned: $cleanText\n";
?>

Output:
Original: Hello@# World! 123 *&^%$ PHP_2025
Cleaned: Hello World 123  PHP2025

QUESTION 41
<?php
// Sample text containing email addresses
$text = "Contact us at support@example.com or sales@shop.co.in. 
You can also write to admin123@domain.org.";

// Regular expression pattern for email addresses
$pattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/';

// Use preg_match_all to find all emails
preg_match_all($pattern, $text, $matches);

// $matches[0] contains the list of found email addresses
$emails = $matches[0];

// Display extracted emails
echo "Extracted Email Addresses:\n";
print_r($emails);
?>

Output:

Extracted Email Addresses:
Array
(
    [0] => support@example.com
    [1] => sales@shop.co.in
    [2] => admin123@domain.org
)

QUESTION 42
<?php
// Given arrays
$marks1 = array(360, 310, 310, 330, 313, 375, 456, 111, 256);
$marks2 = array(350, 340, 356, 330, 321);
$marks3 = array(630, 340, 570, 635, 434, 255, 298);

// Merge all arrays into one
$allMarks = array_merge($marks1, $marks2, $marks3);

// Find maximum and minimum
$maxMark = max($allMarks);
$minMark = min($allMarks);

// Display results
echo "Maximum mark: $maxMark\n";
echo "Minimum mark: $minMark\n";
?>

Output:
Maximum mark: 635
Minimum mark: 111

QUESTION 43
<?php
// Sample passwords to test
$passwords = array(
    "Pass@123",     // Valid
    "pass1234",     // No uppercase, no special char
    "PASS@123",     // No lowercase
    "Pass123",      // No special char, length < 8
    "Valid@Password1" // Valid
);

$pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/';

foreach ($passwords as $pwd) {
    if (preg_match($pattern, $pwd)) {
        echo "$pwd → Valid\n";
    } else {
        echo "$pwd → Invalid\n";
    }
}
?>

Output:
Pass@123 → Valid
pass1234 → Invalid
PASS@123 → Invalid
Pass123 → Invalid
Valid@Password1 → Valid

QUESTION 44
<?php
// Step 1: Create empty playlists array
$playlists = array();

// Step 2: Create a playlist
function createPlaylist(&$playlists, $name) {
    if (!isset($playlists[$name])) {
        $playlists[$name] = array();
        echo "Playlist '$name' created successfully.\n";
    } else {
        echo "Playlist '$name' already exists.\n";
    }
}

// Step 3: Add a song to a playlist
function addSong(&$playlists, $playlistName, $title, $artist, $duration) {
    if (isset($playlists[$playlistName])) {
        $playlists[$playlistName][] = array(
            "title" => $title,
            "artist" => $artist,
            "duration" => $duration
        );
        echo "Song '$title' added to '$playlistName'.\n";
    } else {
        echo "Playlist '$playlistName' does not exist.\n";
    }
}

// Step 4: Remove a song from a playlist
function removeSong(&$playlists, $playlistName, $title) {
    if (isset($playlists[$playlistName])) {
        foreach ($playlists[$playlistName] as $index => $song) {
            if (strcasecmp($song["title"], $title) == 0) {
                unset($playlists[$playlistName][$index]);
                $playlists[$playlistName] = array_values($playlists[$playlistName]); // Reindex
                echo "Song '$title' removed from '$playlistName'.\n";
                return;
            }
        }
        echo "Song '$title' not found in '$playlistName'.\n";
    } else {
        echo "Playlist '$playlistName' does not exist.\n";
    }
}

// Step 5: Display songs in a playlist
function displayPlaylist($playlists, $playlistName) {
    if (isset($playlists[$playlistName])) {
        echo "\nPlaylist: $playlistName\n";
        if (empty($playlists[$playlistName])) {
            echo "(No songs in this playlist)\n";
            return;
        }
        foreach ($playlists[$playlistName] as $song) {
            echo "- {$song['title']} by {$song['artist']} ({$song['duration']})\n";
        }
    } else {
        echo "Playlist '$playlistName' does not exist.\n";
    }
}

// Step 6: Sort playlist by song title
function sortPlaylistByTitle(&$playlists, $playlistName) {
    if (isset($playlists[$playlistName])) {
        usort($playlists[$playlistName], function($a, $b) {
            return strcasecmp($a["title"], $b["title"]);
        });
        echo "Playlist '$playlistName' sorted by title.\n";
    }
}

// Step 7: Shuffle playlist
function shufflePlaylist(&$playlists, $playlistName) {
    if (isset($playlists[$playlistName])) {
        shuffle($playlists[$playlistName]);
        echo "Playlist '$playlistName' shuffled.\n";
    }
}

// ----------- Example Usage -----------

// Create playlists
createPlaylist($playlists, "Favorites");
createPlaylist($playlists, "Workout");

// Add songs
addSong($playlists, "Favorites", "Shape of You", "Ed Sheeran", "4:24");
addSong($playlists, "Favorites", "Blinding Lights", "The Weeknd", "3:20");
addSong($playlists, "Workout", "Stronger", "Kanye West", "5:12");

// Display before sorting
displayPlaylist($playlists, "Favorites");

// Sort and display
sortPlaylistByTitle($playlists, "Favorites");
displayPlaylist($playlists, "Favorites");

// Shuffle and display
shufflePlaylist($playlists, "Favorites");
displayPlaylist($playlists, "Favorites");

// Remove a song
removeSong($playlists, "Favorites", "Shape of You");
displayPlaylist($playlists, "Favorites");
?>

Output:

Playlist 'Favorites' created successfully.
Playlist 'Workout' created successfully.
Song 'Shape of You' added to 'Favorites'.
Song 'Blinding Lights' added to 'Favorites'.
Song 'Stronger' added to 'Workout'.

Playlist: Favorites
- Shape of You by Ed Sheeran (4:24)
- Blinding Lights by The Weeknd (3:20)
Playlist 'Favorites' sorted by title.

Playlist: Favorites
- Blinding Lights by The Weeknd (3:20)
- Shape of You by Ed Sheeran (4:24)
Playlist 'Favorites' shuffled.

Playlist: Favorites
- Blinding Lights by The Weeknd (3:20)
- Shape of You by Ed Sheeran (4:24)
Song 'Shape of You' removed from 'Favorites'.

Playlist: Favorites
- Blinding Lights by The Weeknd (3:20)

QUESTION 45
<?php
// Function to compare two multidimensional arrays
function array_diff_multidimensional($array1, $array2) {
    $result = array();

    foreach ($array1 as $key => $value) {
        if (is_array($value)) {
            // Recursively compare if value is an array
            if (!isset($array2[$key]) || !is_array($array2[$key])) {
                $result[$key] = $value;
            } else {
                $diff = array_diff_multidimensional($value, $array2[$key]);
                if (!empty($diff)) {
                    $result[$key] = $diff;
                }
            }
        } else {
            // Compare non-array values
            if (!isset($array2[$key]) || $array2[$key] !== $value) {
                $result[$key] = $value;
            }
        }
    }

    return $result;
}

// Example arrays
$array1 = array(
    "fruits" => array("apple", "banana", "cherry"),
    "vegetables" => array("carrot", "peas"),
    "dairy" => "milk"
);

$array2 = array(
    "fruits" => array("apple", "banana", "mango"),
    "vegetables" => array("carrot"),
    "dairy" => "milk"
);

// Get the difference
$difference = array_diff_multidimensional($array1, $array2);

print_r($difference);
?>

Output:

Array
(
    [fruits] => Array
        (
            [2] => cherry
        )

    [vegetables] => Array
        (
            [1] => peas
        )

)

QUESTION 46
<?php
// Create an array
$colors = array("Red", "Green", "Blue", "Yellow", "Orange");

// Value to search
$searchValue = "Blue";

// Use array_search() to find the index
$index = array_search($searchValue, $colors);

if ($index !== false) {
    echo "The index of '$searchValue' is: $index";
} else {
    echo "'$searchValue' was not found in the array.";
}
?>

Output:
The index of 'Blue' is: 2

QUESTION 47
<?php
// Original array
$x = array(1, 2, 3, 4, 5);

// Remove element at index 2 (which is value 3)
unset($x[2]);

// Print array elements
foreach ($x as $value) {
    echo $value . " ";
}
?>

Output:
1 2 4 5 

QUESTION 48
<?php
echo "<h2>📌 Record Number Handling in PHP</h2>";

/* -----------------------------------
   1. Array Record Numbering
------------------------------------ */
$students = array("Alice", "Bob", "Charlie", "David");

echo "<h3>Array Records:</h3>";
foreach ($students as $index => $name) {
    // +1 because array index starts at 0
    echo "Record #" . ($index + 1) . ": $name<br>";
}

/* -----------------------------------
   2. Database Record Numbering
------------------------------------ */
// Database connection
$conn = mysqli_connect("localhost", "root", "", "school");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name FROM students";
$result = mysqli_query($conn, $sql);

echo "<h3>Database Records:</h3>";
$recordNumber = 1; // Counter for database records

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Record #$recordNumber: ID=" . $row['id'] . ", Name=" . $row['name'] . "<br>";
        $recordNumber++;
    }
} else {
    echo "No records found in database.";
}

// Close the database connection
mysqli_close($conn);
?>

Output:

<h2>📌 Record Number Handling in PHP</h2><h3>Array Records:</h3>Record #1: Alice<br>Record #2: Bob<br>Record #3: Charlie<br>Record #4: David<br>
PHP Fatal error:  Uncaught Error: Call to undefined function mysqli_connect() in /HelloWorld.php:19
Stack trace:
#0 {main}
  thrown in /HelloWorld.php on line 19

QUESTION 49
<?php
echo "<h1>🏆 Player Performance Evaluation</h1>";

/* ==================================================
   A) SMALL DATA (IN-MEMORY CALCULATION)
   ================================================== */
$players = [
    ["name" => "Alice",   "matches" => 10, "points" => 250, "assists" => 15, "goals" => 5, "rebounds" => 20],
    ["name" => "Bob",     "matches" => 12, "points" => 300, "assists" => 12, "goals" => 8, "rebounds" => 25],
    ["name" => "Charlie", "matches" =>  8, "points" => 200, "assists" => 10, "goals" => 6, "rebounds" => 15],
];

// Calculate performance index & average
foreach ($players as &$p) {
    $p['performance_index'] =
        $p['points']   * 0.5 +
        $p['assists']  * 0.3 +
        $p['goals']    * 0.4 +
        $p['rebounds'] * 0.2;

    $p['avg_points'] = $p['matches'] > 0 ? $p['points'] / $p['matches'] : 0.0;
}
unset($p);

// Sort by performance index (DESC)
usort($players, fn($a, $b) => $b['performance_index'] <=> $a['performance_index']);

// Display results
echo "<h2>In-Memory Rankings</h2>";
$rank = 1;
foreach ($players as $p) {
    printf(
        "Rank #%d: %s | PI: %.2f | Avg Points: %.2f<br>",
        $rank++,
        htmlspecialchars($p['name']),
        $p['performance_index'],
        $p['avg_points']
    );
}

/* ==================================================
   B) LARGE DATA (MYSQL + PDO)
   ================================================== */

// Database connection settings
$dbHost = '127.0.0.1';
$dbName = 'sportsdb';
$dbUser = 'root';
$dbPass = '';
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4";

// Pagination setup
$page     = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$pageSize = isset($_GET['size']) ? max(1, min(200, (int)$_GET['size'])) : 10;
$offset   = ($page - 1) * $pageSize;

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    $sql = "
        SELECT
            player_id,
            name,
            matches,
            points,
            assists,
            goals,
            rebounds,
            (points * 0.5 + assists * 0.3 + goals * 0.4 + rebounds * 0.2) AS performance_index,
            CASE WHEN matches > 0 THEN points / matches ELSE 0 END AS avg_points
        FROM players_stats
        ORDER BY performance_index DESC
        LIMIT :lim OFFSET :off
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':lim',  $pageSize, PDO::PARAM_INT);
    $stmt->bindValue(':off',  $offset,   PDO::PARAM_INT);
    $stmt->execute();

    echo "<h2>Database Rankings (Page {$page})</h2>";
    $rank = $offset + 1;

    while ($row = $stmt->fetch()) {
        printf(
            "Rank #%d: %s | PI: %.2f | Avg Points: %.2f (Matches: %d, Pts: %d, Ast: %d, Gls: %d, Reb: %d)<br>",
            $rank++,
            htmlspecialchars($row['name']),
            $row['performance_index'],
            $row['avg_points'],
            (int)$row['matches'],
            (int)$row['points'],
            (int)$row['assists'],
            (int)$row['goals'],
            (int)$row['rebounds']
        );
    }

    $total = (int)$pdo->query("SELECT COUNT(*) FROM players_stats")->fetchColumn();
    $totalPages = (int)ceil($total / $pageSize);
    echo "<br><small>Total players: {$total} | Pages: {$totalPages}</small>";

} catch (PDOException $e) {
    echo "<p style='color:red'>Database error: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>

Output:
<h1>🏆 Player Performance Evaluation</h1><h2>In-Memory Rankings</h2>Rank #1: Bob | PI: 161.80 | Avg Points: 25.00<br>Rank #2: Alice | PI: 135.50 | Avg Points: 25.00<br>Rank #3: Charlie | PI: 108.40 | Avg Points: 25.00<br><p style='color:red'>Database error: could not find driver</p>

QUESTION 50
<?php
// Original array
$words = array("Apple", "Banana", "Cherry", "Mango");

// Convert all elements to lowercase
$lowercaseArray = array_map('strtolower', $words);

// Convert all elements to uppercase
$uppercaseArray = array_map('strtoupper', $words);

// Display results
echo "Original Array: ";
print_r($words);

echo "<br>Lowercase Array: ";
print_r($lowercaseArray);

echo "<br>Uppercase Array: ";
print_r($uppercaseArray);
?>

Output:

Original Array: Array
(
    [0] => Apple
    [1] => Banana
    [2] => Cherry
    [3] => Mango
)
<br>Lowercase Array: Array
(
    [0] => apple
    [1] => banana
    [2] => cherry
    [3] => mango
)
<br>Uppercase Array: Array
(
    [0] => APPLE
    [1] => BANANA
    [2] => CHERRY
    [3] => MANGO
)

QUESTION 51
<?php
// Original array
$fruits = ["Apple", "Banana", "Cherry", "Mango"];

echo "<h3>Original Array:</h3>";
print_r($fruits);

// --------------------
// 1. array_shift()
// --------------------
$removed = array_shift($fruits); // Removes first element

echo "<h3>After array_shift():</h3>";
echo "Removed Element: $removed<br>";
print_r($fruits);

// --------------------
// 2. array_unshift()
// --------------------
$newCount = array_unshift($fruits, "Pineapple", "Grapes"); // Adds at the beginning

echo "<h3>After array_unshift():</h3>";
echo "New Array Length: $newCount<br>";
print_r($fruits);
?>

Output:

<h3>Original Array:</h3>Array
(
    [0] => Apple
    [1] => Banana
    [2] => Cherry
    [3] => Mango
)
<h3>After array_shift():</h3>Removed Element: Apple<br>Array
(
    [0] => Banana
    [1] => Cherry
    [2] => Mango
)
<h3>After array_unshift():</h3>New Array Length: 5<br>Array
(
    [0] => Pineapple
    [1] => Grapes
    [2] => Banana
    [3] => Cherry
    [4] => Mango
)

QUESTION 52
<?php
echo "<h2>Stack vs Queue in PHP</h2>";

// --------------------
// STACK Example (LIFO)
// --------------------
echo "<h3>STACK (LIFO)</h3>";
$stack = [];

// Push elements onto the stack
array_push($stack, "A", "B", "C");
echo "Stack after pushes: ";
print_r($stack);

// Pop last element from the stack
$popped = array_pop($stack);
echo "<br>Element Popped (LIFO): $popped<br>";
echo "Stack after pop: ";
print_r($stack);

echo "<hr>";

// --------------------
// QUEUE Example (FIFO)
// --------------------
echo "<h3>QUEUE (FIFO)</h3>";
$queue = [];

// Enqueue elements
array_push($queue, "A", "B", "C");
echo "Queue after enqueues: ";
print_r($queue);

// Dequeue first element from the queue
$dequeued = array_shift($queue);
echo "<br>Element Dequeued (FIFO): $dequeued<br>";
echo "Queue after dequeue: ";
print_r($queue);
?>

Output:

<h2>Stack vs Queue in PHP</h2><h3>STACK (LIFO)</h3>Stack after pushes: Array
(
    [0] => A
    [1] => B
    [2] => C
)
<br>Element Popped (LIFO): C<br>Stack after pop: Array
(
    [0] => A
    [1] => B
)
<hr><h3>QUEUE (FIFO)</h3>Queue after enqueues: Array
(
    [0] => A
    [1] => B
    [2] => C
)
<br>Element Dequeued (FIFO): A<br>Queue after dequeue: Array
(
    [0] => B
    [1] => C
)

QUESTION 53
<?php
echo "<h2>Difference between array_pop() and array_shift()</h2>";

// Create a numeric array
$numbers = [10, 20, 30, 40, 50];

echo "<h3>Original Array:</h3>";
print_r($numbers);

// --------------------
// array_pop()
// --------------------
$lastElement = array_pop($numbers);
echo "<h3>After array_pop()</h3>";
echo "Removed Last Element: $lastElement<br>";
echo "Array Now: ";
print_r($numbers);

// Reset the array
$numbers = [10, 20, 30, 40, 50];

// --------------------
// array_shift()
// --------------------
$firstElement = array_shift($numbers);
echo "<h3>After array_shift()</h3>";
echo "Removed First Element: $firstElement<br>";
echo "Array Now: ";
print_r($numbers);
?>

Output:

<h2>Difference between array_pop() and array_shift()</h2><h3>Original Array:</h3>Array
(
    [0] => 10
    [1] => 20
    [2] => 30
    [3] => 40
    [4] => 50
)
<h3>After array_pop()</h3>Removed Last Element: 50<br>Array Now: Array
(
    [0] => 10
    [1] => 20
    [2] => 30
    [3] => 40
)
<h3>After array_shift()</h3>Removed First Element: 10<br>Array Now: Array
(
    [0] => 20
    [1] => 30
    [2] => 40
    [3] => 50
)

QUESTION 54
<?php
echo "<h2>Ticket Booking Queue Simulation</h2>";

// Initialize empty queue
$queue = [];

// Function to add a person to the queue
function bookTicket(&$queue, $name) {
    array_push($queue, $name); // Enqueue
    echo "$name has been added to the booking queue.<br>";
}

// Function to process the next booking
function processBooking(&$queue) {
    if (!empty($queue)) {
        $person = array_shift($queue); // Dequeue
        echo "Processing ticket booking for: $person<br>";
    } else {
        echo "No one in the queue.<br>";
    }
}

// Add people to the queue
bookTicket($queue, "Alice");
bookTicket($queue, "Bob");
bookTicket($queue, "Charlie");

echo "<br><strong>Current Queue:</strong> ";
print_r($queue);
echo "<br><br>";

// Process ticket bookings in order
processBooking($queue);
processBooking($queue);

echo "<br><strong>Queue After Processing:</strong> ";
print_r($queue);
echo "<br><br>";

// Add another person
bookTicket($queue, "David");

// Continue processing
processBooking($queue);
processBooking($queue);
?>

Output:

<h2>Ticket Booking Queue Simulation</h2>Alice has been added to the booking queue.<br>Bob has been added to the booking queue.<br>Charlie has been added to the booking queue.<br><br><strong>Current Queue:</strong> Array
(
    [0] => Alice
    [1] => Bob
    [2] => Charlie
)
<br><br>Processing ticket booking for: Alice<br>Processing ticket booking for: Bob<br><br><strong>Queue After Processing:</strong> Array
(
    [0] => Charlie
)
<br><br>David has been added to the booking queue.<br>Processing ticket booking for: Charlie<br>Processing ticket booking for: David<br>

QUESTION 55
<?php
echo "<h2>Reverse a String using Stack Functions in PHP</h2>";

// Input string
$string = "HELLO";

// Convert string to array of characters
$chars = str_split($string);

// Initialize empty stack
$stack = [];

// Push each character onto the stack
foreach ($chars as $char) {
    array_push($stack, $char);
}

// Pop characters from the stack to reverse
$reversed = "";
while (!empty($stack)) {
    $reversed .= array_pop($stack);
}

echo "Original String: $string<br>";
echo "Reversed String: $reversed";
?>

Output:
<h2>Reverse a String using Stack Functions in PHP</h2>Original String: HELLO<br>Reversed String: OLLEH

QUESTION 56
<?php
echo "<h2>PHP Array Sorting Functions Demo</h2>";

$array = ["Banana", "apple", "Mango", "Cherry", "banana10", "banana2"];

echo "<strong>Original Array:</strong><br>";
print_r($array);
echo "<hr>";

// sort() - Ascending, reindexes keys
$temp = $array;
sort($temp);
echo "<strong>sort() - Ascending:</strong><br>";
print_r($temp);
echo "<br><br>";

// rsort() - Descending, reindexes keys
$temp = $array;
rsort($temp);
echo "<strong>rsort() - Descending:</strong><br>";
print_r($temp);
echo "<br><br>";

// asort() - Ascending by values, preserves keys
$temp = $array;
asort($temp);
echo "<strong>asort() - Ascending (Preserve Keys):</strong><br>";
print_r($temp);
echo "<br><br>";

// arsort() - Descending by values, preserves keys
$temp = $array;
arsort($temp);
echo "<strong>arsort() - Descending (Preserve Keys):</strong><br>";
print_r($temp);
echo "<br><br>";

// ksort() - Ascending by keys
$temp = $array;
$temp = array_combine(range(1, count($array)), $array); // Give numeric keys for demo
ksort($temp);
echo "<strong>ksort() - Ascending Keys:</strong><br>";
print_r($temp);
echo "<br><br>";

// krsort() - Descending by keys
$temp = $array;
$temp = array_combine(range(1, count($array)), $array);
krsort($temp);
echo "<strong>krsort() - Descending Keys:</strong><br>";
print_r($temp);
echo "<br><br>";

// natsort() - Natural order sort
$temp = $array;
natsort($temp);
echo "<strong>natsort() - Natural Order:</strong><br>";
print_r($temp);
echo "<br><br>";

// natcasesort() - Natural order case-insensitive
$temp = $array;
natcasesort($temp);
echo "<strong>natcasesort() - Natural Order (Case Insensitive):</strong><br>";
print_r($temp);
echo "<br><br>";

// usort() - Custom sort (string length)
$temp = $array;
usort($temp, function($a, $b) {
    return strlen($a) <=> strlen($b);
});
echo "<strong>usort() - Custom Sort by String Length:</strong><br>";
print_r($temp);
echo "<br><br>";

// array_multisort() - Sorting multiple arrays
$names = ["John", "Jane", "Dave"];
$scores = [90, 80, 95];
array_multisort($scores, SORT_DESC, $names);
echo "<strong>array_multisort() - Sort Scores Desc, Names Adjust:</strong><br>";
print_r($names);
print_r($scores);
?>

Output:

<h2>PHP Array Sorting Functions Demo</h2><strong>Original Array:</strong><br>Array
(
    [0] => Banana
    [1] => apple
    [2] => Mango
    [3] => Cherry
    [4] => banana10
    [5] => banana2
)
<hr><strong>sort() - Ascending:</strong><br>Array
(
    [0] => Banana
    [1] => Cherry
    [2] => Mango
    [3] => apple
    [4] => banana10
    [5] => banana2
)
<br><br><strong>rsort() - Descending:</strong><br>Array
(
    [0] => banana2
    [1] => banana10
    [2] => apple
    [3] => Mango
    [4] => Cherry
    [5] => Banana
)
<br><br><strong>asort() - Ascending (Preserve Keys):</strong><br>Array
(
    [0] => Banana
    [3] => Cherry
    [2] => Mango
    [1] => apple
    [4] => banana10
    [5] => banana2
)
<br><br><strong>arsort() - Descending (Preserve Keys):</strong><br>Array
(
    [5] => banana2
    [4] => banana10
    [1] => apple
    [2] => Mango
    [3] => Cherry
    [0] => Banana
)
<br><br><strong>ksort() - Ascending Keys:</strong><br>Array
(
    [1] => Banana
    [2] => apple
    [3] => Mango
    [4] => Cherry
    [5] => banana10
    [6] => banana2
)
<br><br><strong>krsort() - Descending Keys:</strong><br>Array
(
    [6] => banana2
    [5] => banana10
    [4] => Cherry
    [3] => Mango
    [2] => apple
    [1] => Banana
)
<br><br><strong>natsort() - Natural Order:</strong><br>Array
(
    [0] => Banana
    [3] => Cherry
    [2] => Mango
    [1] => apple
    [5] => banana2
    [4] => banana10
)
<br><br><strong>natcasesort() - Natural Order (Case Insensitive):</strong><br>Array
(
    [1] => apple
    [0] => Banana
    [5] => banana2
    [4] => banana10
    [3] => Cherry
    [2] => Mango
)
<br><br><strong>usort() - Custom Sort by String Length:</strong><br>Array
(
    [0] => apple
    [1] => Mango
    [2] => Banana
    [3] => Cherry
    [4] => banana2
    [5] => banana10
)
<br><br><strong>array_multisort() - Sort Scores Desc, Names Adjust:</strong><br>Array
(
    [0] => Dave
    [1] => John
    [2] => Jane
)
Array
(
    [0] => 95
    [1] => 90
    [2] => 80
)

QUESTION 57
<?php
echo "<h2>PHP Regular Expressions - Combined Examples</h2>";

// 1. Simple Match
echo "<h3>1. Simple Match</h3>";
$pattern = "/php/i"; // case-insensitive
$string = "I love PHP programming.";
if (preg_match($pattern, $string)) {
    echo "Match found!<br>";
} else {
    echo "No match found.<br>";
}

// 2. Extract All Matches
echo "<h3>2. Extract All Matches</h3>";
$pattern = "/\d+/"; // Match one or more digits
$string = "Order numbers: 123, 456, and 789.";
preg_match_all($pattern, $string, $matches);
echo "Numbers found: ";
print_r($matches[0]);
echo "<br>";

// 3. Replace Using RegEx
echo "<h3>3. Replace Using RegEx</h3>";
$pattern = "/\s+/"; // Match one or more spaces
$replacement = "-";
$string = "Hello   World   PHP";
echo "Before: $string<br>";
echo "After: " . preg_replace($pattern, $replacement, $string) . "<br>";

// 4. Validate Email
echo "<h3>4. Validate Email</h3>";
$email = "user@example.com";
if (preg_match("/^[\w.-]+@[\w.-]+\.[a-z]{2,}$/i", $email)) {
    echo "$email is a valid email.<br>";
} else {
    echo "$email is an invalid email.<br>";
}

// 5. Split String Using RegEx
echo "<h3>5. Split String Using RegEx</h3>";
$string = "apple, banana; cherry orange";
$pattern = "/[\s,;]+/"; // Split by spaces, commas, or semicolons
$fruits = preg_split($pattern, $string);
echo "Fruits: ";
print_r($fruits);
echo "<br>";
?>

Output:

<h2>PHP Regular Expressions - Combined Examples</h2><h3>1. Simple Match</h3>Match found!<br><h3>2. Extract All Matches</h3>Numbers found: Array
(
    [0] => 123
    [1] => 456
    [2] => 789
)
<br><h3>3. Replace Using RegEx</h3>Before: Hello   World   PHP<br>After: Hello-World-PHP<br><h3>4. Validate Email</h3>user@example.com is a valid email.<br><h3>5. Split String Using RegEx</h3>Fruits: Array
(
    [0] => apple
    [1] => banana
    [2] => cherry
    [3] => orange
)
<br>

QUESTION 58
<?php
echo "<h2>Extract Email Addresses Using RegEx in PHP</h2>";

// Sample string containing emails
$string = "Hello, contact us at info@example.com, support@domain.org, or sales@company.co.uk.";

// Regular expression pattern to match email addresses
$pattern = "/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}/i";

// Use preg_match_all to find all email addresses
preg_match_all($pattern, $string, $matches);

// Display results
if (!empty($matches[0])) {
    echo "Email addresses found:<br>";
    foreach ($matches[0] as $email) {
        echo "- $email<br>";
    }
} else {
    echo "No email addresses found in the string.";
}
?>

Output:
<h2>Extract Email Addresses Using RegEx in PHP</h2>Email addresses found:<br>- info@example.com<br>- support@domain.org<br>- sales@company.co.uk<br>

QUESTION 59
<?php
// Function to calculate average
function calculateAverage($numbers) {
    if (empty($numbers)) {
        return 0; // Avoid division by zero
    }
    $sum = array_sum($numbers);      // Sum of all elements
    $count = count($numbers);        // Number of elements
    $average = $sum / $count;        // Calculate average
    return $average;
}

// Example usage
$numbers = [10, 20, 30, 40, 50];
$avg = calculateAverage($numbers);

echo "Numbers: ";
print_r($numbers);
echo "<br>Average: $avg";
?>

Output:

Numbers: Array
(
    [0] => 10
    [1] => 20
    [2] => 30
    [3] => 40
    [4] => 50
)
<br>Average: 30

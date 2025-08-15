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

QUESTION 60
<?php
// Function to search a value in an associative array
function searchValueInAssocArray($array, $value) {
    $keys = array_keys($array, $value); // Find all keys with the specified value
    if (!empty($keys)) {
        return $keys; // Return array of matching keys
    } else {
        return null; // Return null if value not found
    }
}

// Example associative array
$students = [
    "A101" => "Alice",
    "A102" => "Bob",
    "A103" => "Charlie",
    "A104" => "Alice"
];

// Search for a value
$searchValue = "Alice";
$result = searchValueInAssocArray($students, $searchValue);

// Display results
if ($result) {
    echo "Value '$searchValue' found at key(s): ";
    echo implode(", ", $result);
} else {
    echo "Value '$searchValue' not found in the array.";
}
?>

Output:
Value 'Alice' found at key(s): A101, A104

QUESTION 61
<?php
echo "<h2>Deleting Elements from an Array in PHP</h2>";

// Original array
$array = [1, 2, 3, 4, 5];
echo "<strong>Original Array:</strong> ";
print_r($array);
echo "<br><br>";

// 1. Delete by Key/Index using unset()
unset($array[2]); // Deletes element with index 2 (value 3)
echo "<strong>After unset() by index 2:</strong> ";
print_r($array);
echo "<br><br>";

// Re-index array
$array = array_values($array);
echo "<strong>After re-indexing:</strong> ";
print_r($array);
echo "<br><br>";

// 2. Delete by Value
$array = [1, 2, 3, 4, 5];
$valueToDelete = 3;
$key = array_search($valueToDelete, $array);
if ($key !== false) {
    unset($array[$key]);
}
$array = array_values($array); // Re-index
echo "<strong>After deleting value 3:</strong> ";
print_r($array);
echo "<br><br>";

// 3. Remove First Element using array_shift()
$array = [1, 2, 3, 4, 5];
array_shift($array);
echo "<strong>After array_shift() (remove first element):</strong> ";
print_r($array);
echo "<br><br>";

// 4. Remove Last Element using array_pop()
$array = [1, 2, 3, 4, 5];
array_pop($array);
echo "<strong>After array_pop() (remove last element):</strong> ";
print_r($array);
echo "<br><br>";
?>

Output:

<h2>Deleting Elements from an Array in PHP</h2><strong>Original Array:</strong> Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
)
<br><br><strong>After unset() by index 2:</strong> Array
(
    [0] => 1
    [1] => 2
    [3] => 4
    [4] => 5
)
<br><br><strong>After re-indexing:</strong> Array
(
    [0] => 1
    [1] => 2
    [2] => 4
    [3] => 5
)
<br><br><strong>After deleting value 3:</strong> Array
(
    [0] => 1
    [1] => 2
    [2] => 4
    [3] => 5
)
<br><br><strong>After array_shift() (remove first element):</strong> Array
(
    [0] => 2
    [1] => 3
    [2] => 4
    [3] => 5
)
<br><br><strong>After array_pop() (remove last element):</strong> Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
)
<br><br>

QUESTION 62
<?php
echo "<h2>Rounding Values in PHP</h2>";

// Sample values
$values = [1.65, 1.65, -1.54];

echo "<strong>Original Values:</strong> ";
print_r($values);
echo "<br><br>";

echo "<strong>Rounded Values (1 decimal place):</strong><br>";

// Round each value to 1 decimal place
foreach ($values as $value) {
    $rounded = round($value, 1); // 1 decimal place
    echo "Original: $value => Rounded: $rounded<br>";
}
?>

Output:

<h2>Rounding Values in PHP</h2><strong>Original Values:</strong> Array
(
    [0] => 1.65
    [1] => 1.65
    [2] => -1.54
)
<br><br><strong>Rounded Values (1 decimal place):</strong><br>Original: 1.65 => Rounded: 1.7<br>Original: 1.65 => Rounded: 1.7<br>Original: -1.54 => Rounded: -1.5<br>

QUESTION 63
<?php
function sumEvenNumbers($numbers) {
    $sum = 0;
    foreach ($numbers as $num) {
        if ($num % 2 == 0) {  // check if the number is even
            $sum += $num;     // add it to the sum
        }
    }
    return $sum;
}

// Example usage
$array = [1, 2, 3, 4, 5, 6];
echo "Sum of even numbers: " . sumEvenNumbers($array);  // Output: 12
?>

Output:
Sum of even numbers: 12

QUESTION 64
<?php
// Historical monthly sales data (example in units or revenue)
$sales = [1200, 1350, 1420, 1500, 1600, 1720, 1800, 1900, 2050, 2200, 2300, 2450];

// Function to calculate monthly growth rates
function calculateGrowthRates($sales) {
    $growthRates = [];
    for ($i = 1; $i < count($sales); $i++) {
        $growth = (($sales[$i] - $sales[$i - 1]) / $sales[$i - 1]) * 100; // % growth
        $growthRates[] = round($growth, 2);
    }
    return $growthRates;
}

// Function to forecast next month's sales based on average growth rate
function forecastNextMonth($sales) {
    $growthRates = calculateGrowthRates($sales);
    $avgGrowthRate = array_sum($growthRates) / count($growthRates); // average growth %
    $lastMonthSales = end($sales);
    $forecast = $lastMonthSales * (1 + $avgGrowthRate / 100);
    return round($forecast, 2);
}

// Calculate growth rates
$growthRates = calculateGrowthRates($sales);
echo "Monthly Growth Rates (%): ";
print_r($growthRates);

// Forecast next month's sales
$nextMonthForecast = forecastNextMonth($sales);
echo "Forecasted sales for next month: " . $nextMonthForecast;
?>

Output:

Monthly Growth Rates (%): Array
(
    [0] => 12.5
    [1] => 5.19
    [2] => 5.63
    [3] => 6.67
    [4] => 7.5
    [5] => 4.65
    [6] => 5.56
    [7] => 7.89
    [8] => 7.32
    [9] => 4.55
    [10] => 6.52
)
Forecasted sales for next month: 2614.77

QUESTION 65
<?php
// Main string
$mainString = "Welcome to the world of PHP programming.";

// Substring to search
$searchString = "PHP";

// Check if the substring exists in the main string
if (strpos($mainString, $searchString) !== false) {
    echo "The string '$searchString' was found in the main string.";
} else {
    echo "The string '$searchString' was NOT found in the main string.";
}
?>

Output:
The string 'PHP' was found in the main string.

QUESTION 66
<?php
// 1. Sum of even numbers in an array
function sumEvenNumbers($numbers) {
    $sum = 0;
    foreach ($numbers as $num) {
        if ($num % 2 == 0) {
            $sum += $num;
        }
    }
    return $sum;
}

// 2. Sales forecasting system
function calculateGrowthRates($sales) {
    $growthRates = [];
    for ($i = 1; $i < count($sales); $i++) {
        $growth = (($sales[$i] - $sales[$i - 1]) / $sales[$i - 1]) * 100;
        $growthRates[] = round($growth, 2);
    }
    return $growthRates;
}

function forecastNextMonth($sales) {
    $growthRates = calculateGrowthRates($sales);
    $avgGrowthRate = array_sum($growthRates) / count($growthRates);
    $lastMonthSales = end($sales);
    $forecast = $lastMonthSales * (1 + $avgGrowthRate / 100);
    return round($forecast, 2);
}

// 3. Check if a string contains another string
function checkSubstring($mainString, $searchString) {
    if (strpos($mainString, $searchString) !== false) {
        return "The string '$searchString' was found in the main string.";
    } else {
        return "The string '$searchString' was NOT found in the main string.";
    }
}

// 4. Count elements in an array (demonstrating count() and sizeof())
function countElements($array) {
    return "Count using count(): " . count($array) . 
           ", Count using sizeof(): " . sizeof($array);
}

// ----------------------
// Example usage:

// Sum of even numbers
$numbers = [1, 2, 3, 4, 5, 6];
echo "Sum of even numbers: " . sumEvenNumbers($numbers) . "\n\n";

// Sales forecasting
$sales = [1200, 1350, 1420, 1500, 1600, 1720, 1800, 1900, 2050, 2200, 2300, 2450];
echo "Monthly Growth Rates (%): ";
print_r(calculateGrowthRates($sales));
echo "Forecasted sales for next month: " . forecastNextMonth($sales) . "\n\n";

// Check substring
$mainString = "Welcome to the world of PHP programming.";
$searchString = "PHP";
echo checkSubstring($mainString, $searchString) . "\n\n";

// Count elements
$arrayExample = ["apple", "banana", "orange"];
echo countElements($arrayExample);
?>

Output:

Sum of even numbers: 12

Monthly Growth Rates (%): Array
(
    [0] => 12.5
    [1] => 5.19
    [2] => 5.63
    [3] => 6.67
    [4] => 7.5
    [5] => 4.65
    [6] => 5.56
    [7] => 7.89
    [8] => 7.32
    [9] => 4.55
    [10] => 6.52
)
Forecasted sales for next month: 2614.77

The string 'PHP' was found in the main string.

Count using count(): 3, Count using sizeof(): 3

QUESTION 67
<?php
// Input sentence
$sentence = "PHP is great. PHP is easy to learn, and PHP is powerful.";

// Step 1: Convert to lowercase to make counting case-insensitive
$sentence = strtolower($sentence);

// Step 2: Tokenize the sentence into words using regular expressions
// \b\w+\b matches word boundaries (words)
preg_match_all('/\b\w+\b/', $sentence, $matches);
$words = $matches[0];

// Step 3: Count the occurrences of each word
$wordCount = array_count_values($words);

// Step 4: Display the results
echo "Word Occurrences:\n";
foreach ($wordCount as $word => $count) {
    echo "$word => $count\n";
}
?>

Output:

Word Occurrences:
php => 3
is => 3
great => 1
easy => 1
to => 1
learn => 1
and => 1
powerful => 1

QUESTION 68
<?php
// Function to perform division
function divide($a, $b) {
    try {
        if ($b == 0) {
            throw new DivisionByZeroError("Cannot divide by zero.");
        }
        $result = $a / $b;
        echo "Result: $result\n";
    } catch (DivisionByZeroError $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

// Example usage
divide(10, 2); // Normal division
divide(10, 0); // Division by zero
?>

Output:

Result: 5
Error: Cannot divide by zero.

QUESTION 69
<?php
// Function to convert array values to upper or lower case
function changeArrayCase($array, $case = 'lower') {
    if ($case === 'lower') {
        return array_map('strtolower', $array); // Convert all values to lower case
    } elseif ($case === 'upper') {
        return array_map('strtoupper', $array); // Convert all values to upper case
    } else {
        return $array; // Return unchanged if invalid case type
    }
}

// Sample array
$Color = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');

// Convert to lower case
$lowerCaseArray = changeArrayCase($Color, 'lower');
echo "Values are in lower case.\n";
print_r($lowerCaseArray);

// Convert to upper case
$upperCaseArray = changeArrayCase($Color, 'upper');
echo "Values are in upper case.\n";
print_r($upperCaseArray);
?>

Output:

Values are in lower case.
Array
(
    [A] => blue
    [B] => green
    [c] => red
)
Values are in upper case.
Array
(
    [A] => BLUE
    [B] => GREEN
    [c] => RED
)

QUESTION 70
<?php
// ===========================
// 1. Take input from user (CLI version)
echo "Enter numbers separated by spaces: ";
$handle = fopen("php://stdin", "r");
$line = fgets($handle);
fclose($handle);
$numbers = array_map('intval', explode(' ', trim($line)));
echo "You entered: ";
print_r($numbers);
echo "\n";

// ===========================
// 2. Sum of even numbers
function sumEvenNumbers($array) {
    $sum = 0;
    foreach ($array as $num) {
        if ($num % 2 == 0) $sum += $num;
    }
    return $sum;
}
echo "Sum of even numbers: " . sumEvenNumbers($numbers) . "\n\n";

// ===========================
// 3. Sales forecasting
$sales = [1200, 1350, 1420, 1500, 1600, 1720, 1800, 1900, 2050, 2200, 2300, 2450];
function calculateGrowthRates($sales) {
    $growthRates = [];
    for ($i = 1; $i < count($sales); $i++) {
        $growthRates[] = round((($sales[$i] - $sales[$i-1]) / $sales[$i-1]) * 100, 2);
    }
    return $growthRates;
}
function forecastNextMonth($sales) {
    $growthRates = calculateGrowthRates($sales);
    $avgGrowth = array_sum($growthRates) / count($growthRates);
    return round(end($sales) * (1 + $avgGrowth/100), 2);
}
echo "Sales Growth Rates: ";
print_r(calculateGrowthRates($sales));
echo "Next Month Sales Forecast: " . forecastNextMonth($sales) . "\n\n";

// ===========================
// 4. Check if a string contains another string
function checkSubstring($mainString, $searchString) {
    return (strpos($mainString, $searchString) !== false) 
        ? "The string '$searchString' was found in the main string." 
        : "The string '$searchString' was NOT found in the main string.";
}
$mainString = "Welcome to the world of PHP programming.";
$searchString = "PHP";
echo checkSubstring($mainString, $searchString) . "\n\n";

// ===========================
// 5. Count elements in an array
function countElements($array) {
    return "Count using count(): " . count($array) . ", Count using sizeof(): " . sizeof($array);
}
echo countElements($numbers) . "\n\n";

// ===========================
// 6. Change array values to upper or lower case
function changeArrayCase($array, $case='lower') {
    if ($case === 'lower') return array_map('strtolower', $array);
    if ($case === 'upper') return array_map('strtoupper', $array);
    return $array;
}
$Color = ['A'=>'Blue','B'=>'Green','c'=>'Red'];
echo "Lower case array:\n"; print_r(changeArrayCase($Color,'lower'));
echo "Upper case array:\n"; print_r(changeArrayCase($Color,'upper'));
echo "\n";

// ===========================
// 7. Word tokenization and count occurrences
$sentence = "PHP is great. PHP is easy to learn, and PHP is powerful.";
$sentence = strtolower($sentence);
preg_match_all('/\b\w+\b/', $sentence, $matches);
$words = $matches[0];
$wordCount = array_count_values($words);
echo "Word occurrences:\n";
print_r($wordCount);
echo "\n";

// ===========================
// 8. Division with error handling
function divide($a, $b) {
    try {
        if ($b == 0) throw new DivisionByZeroError("Cannot divide by zero.");
        echo "Result of $a / $b = " . ($a/$b) . "\n";
    } catch (DivisionByZeroError $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}
divide(10,2);
divide(10,0);
?>

Output:
Enter numbers separated by spaces: 
Error: Command failed: timeout 7 php HelloWorld.php

QUESTION 71
<?php
// Example file name
$filename = "example.txt";

// Writing to a file using 'w' mode (creates or overwrites)
$file = fopen($filename, "w");
fwrite($file, "This is written in 'w' mode.\n");
fclose($file);

// Reading from a file using 'r' mode
$file = fopen($filename, "r");
echo "Reading with 'r' mode:\n";
echo fread($file, filesize($filename));
fclose($file);

// Appending to a file using 'a' mode
$file = fopen($filename, "a");
fwrite($file, "This is appended in 'a' mode.\n");
fclose($file);

// Reading and writing using 'r+' mode
$file = fopen($filename, "r+");
fwrite($file, "Updated text at the beginning.\n");
rewind($file);
echo "\nReading with 'r+' mode:\n";
echo fread($file, filesize($filename));
fclose($file);

// Creating a file only if it does not exist using 'x' mode
$newFile = "newfile.txt";
$file = fopen($newFile, "x");
fwrite($file, "This file is created in 'x' mode.\n");
fclose($file);

echo "\nAll file handling modes demonstrated successfully!";
?>

Output:

PHP Warning:  fopen(example.txt): Failed to open stream: Permission denied in /HelloWorld.php on line 6
PHP Fatal error:  Uncaught TypeError: fwrite(): Argument #1 ($stream) must be of type resource, false given in /HelloWorld.php:7
Stack trace:
#0 /HelloWorld.php(7): fwrite()
#1 {main}
  thrown in /HelloWorld.php on line 7

QUESTION 72
<?php
// Start the session
session_start();

// (i) Equivalent to session_register() - Assign values to session variables
$_SESSION['username'] = "Indira";
$_SESSION['role'] = "Admin";
echo "<b>Session variables have been set:</b><br>";
echo "Username: " . $_SESSION['username'] . "<br>";
echo "Role: " . $_SESSION['role'] . "<br><br>";

// (ii) session_unset() - Removes all session variables but keeps the session alive
session_unset();
echo "<b>After session_unset():</b><br>";
if (empty($_SESSION)) {
    echo "All session variables are now removed (session still active).<br><br>";
}

// (iii) session_destroy() - Completely ends the session
session_destroy();
echo "<b>After session_destroy():</b><br>";
echo "Session destroyed successfully.<br>";
?>

Output:
<b>Session variables have been set:</b><br>Username: Indira<br>Role: Admin<br><br><b>After session_unset():</b><br>All session variables are now removed (session still active).<br><br><b>After session_destroy():</b><br>Session destroyed successfully.<br>

QUESTION 73
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded without errors
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $fileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        // Allow only jpg and png
        if ($fileType === "jpg" || $fileType === "jpeg" || $fileType === "png") {
            echo "<p style='color:green;'>File uploaded successfully: " . htmlspecialchars($_FILES['image']['name']) . "</p>";
        } else {
            echo "<p style='color:red;'>Error: Only JPG and PNG files are allowed.</p>";
        }
    } else {
        echo "<p style='color:red;'>Error: Please select a file to upload.</p>";
    }
}
?>

<!-- Simple HTML Form -->
<form method="post" enctype="multipart/form-data">
    Select a JPG or PNG file:
    <input type="file" name="image" required>
    <input type="submit" value="Upload">
</form>

Output:

<!-- Simple HTML Form -->
<form method="post" enctype="multipart/form-data">
    Select a JPG or PNG file:
    <input type="file" name="image" required>
    <input type="submit" value="Upload">
</form>

PHP Warning:  Undefined array key "REQUEST_METHOD" in /HelloWorld.php on line 2

QUESTION 74
<?php
// ====== WRITING TO A FILE ======
$filename = "sample.txt";

// 1. Writing using fopen + fwrite
$file = fopen($filename, "w"); // "w" mode creates/overwrites the file
fwrite($file, "Hello, this is the first line.\n");
fwrite($file, "This is the second line.\n");
fclose($file);

// 2. Appending using file_put_contents
file_put_contents($filename, "This line is appended at the end.\n", FILE_APPEND);

echo "<b>Data written to file successfully.</b><br><br>";

// ====== READING FROM A FILE ======

// Method 1: Reading the whole file using file_get_contents()
echo "<b>Reading using file_get_contents():</b><br>";
$content = file_get_contents($filename);
echo nl2br($content) . "<br><br>";

// Method 2: Reading line-by-line using fopen + fgets
echo "<b>Reading line-by-line using fopen + fgets:</b><br>";
$file = fopen($filename, "r");
while (!feof($file)) {
    echo fgets($file) . "<br>";
}
fclose($file);

// Method 3: Reading file into an array using file()
echo "<br><b>Reading into an array using file():</b><br>";
$lines = file($filename);
foreach ($lines as $line) {
    echo htmlspecialchars($line) . "<br>";
}
?>

Output:

PHP Warning:  fopen(sample.txt): Failed to open stream: Permission denied in /HelloWorld.php on line 6
PHP Fatal error:  Uncaught TypeError: fwrite(): Argument #1 ($stream) must be of type resource, false given in /HelloWorld.php:7
Stack trace:
#0 /HelloWorld.php(7): fwrite()
#1 {main}
  thrown in /HelloWorld.php on line 7

QUESTION 75
<?php
function appendLineToFile($filename, $newLine) {
    // Ensure the line ends with a newline character
    $newLine = rtrim($newLine) . PHP_EOL;

    // Append the line to the file
    if (file_put_contents($filename, $newLine, FILE_APPEND) !== false) {
        echo "Line appended successfully to {$filename}.<br>";
    } else {
        echo "Error: Unable to append line to {$filename}.<br>";
    }
}

// Example usage
$filename = "myfile.txt";
appendLineToFile($filename, "This is the first new line");
appendLineToFile($filename, "This is another line");
?>

Output:

Error: Unable to append line to myfile.txt.<br>Error: Unable to append line to myfile.txt.<br>
PHP Warning:  file_put_contents(myfile.txt): Failed to open stream: Permission denied in /HelloWorld.php on line 7
PHP Warning:  file_put_contents(myfile.txt): Failed to open stream: Permission denied in /HelloWorld.php on line 7

QUESTION 76
<?php
// Function to calculate days until next birthday
function daysUntilBirthday($month, $day) {
    $currentYear = date("Y");
    $today = new DateTime();
    $birthday = new DateTime("$currentYear-$month-$day");

    // If birthday already passed this year, use next year
    if ($birthday < $today) {
        $birthday->modify('+1 year');
    }

    $interval = $today->diff($birthday);
    return $interval->days;
}

// Example: Birthday on 25th December
$month = 12;
$day = 25;

$daysLeft = daysUntilBirthday($month, $day);
echo "Your birthday is in <b>$daysLeft</b> day(s)!";
?>

Output:
Your birthday is in <b>131</b> day(s)!

QUESTION 77
<?php
echo "<h3>1. Hostname and IP Address Functions</h3>";
$domain = "example.com";
$ip = "93.184.216.34";

echo "IP of $domain: " . gethostbyname($domain) . "<br>";
echo "Hostname for IP $ip: " . gethostbyaddr($ip) . "<br>";
echo "All IPs of $domain: ";
print_r(gethostbynamel($domain));
echo "<br>Current Server Hostname: " . gethostname() . "<br>";

echo "<hr><h3>2. DNS Functions</h3>";
if (checkdnsrr($domain, "MX")) {
    echo "$domain has an MX record.<br>";
} else {
    echo "$domain does not have an MX record.<br>";
}
echo "DNS Records for $domain:<br>";
print_r(dns_get_record($domain));

echo "<hr><h3>3. Protocol and Service Functions</h3>";
echo "Protocol number for TCP: " . getprotobyname("tcp") . "<br>";
echo "Protocol name for 6: " . getprotobynumber(6) . "<br>";
echo "Port number for HTTP: " . getservbyname("http", "tcp") . "<br>";
echo "Service name for port 80: " . getservbyport(80, "tcp") . "<br>";

echo "<hr><h3>4. Socket and Connection Functions</h3>";
$fp = @fsockopen($domain, 80, $errno, $errstr, 5);
if ($fp) {
    echo "Connected successfully to $domain on port 80.<br>";
    fclose($fp);
} else {
    echo "Connection failed: $errstr ($errno)<br>";
}
?>

Output:

<h3>1. Hostname and IP Address Functions</h3>IP of example.com: example.com<br>Hostname for IP 93.184.216.34: 93.184.216.34<br>All IPs of example.com: <br>Current Server Hostname: 3de04d470e50<br><hr><h3>2. DNS Functions</h3>example.com does not have an MX record.<br>DNS Records for example.com:<br><hr><h3>3. Protocol and Service Functions</h3>Protocol number for TCP: 6<br>Protocol name for 6: tcp<br>Port number for HTTP: 80<br>Service name for port 80: http<br><hr><h3>4. Socket and Connection Functions</h3>Connection failed: php_network_getaddresses: getaddrinfo for example.com failed: Temporary failure in name resolution (0)<br>
PHP Warning:  dns_get_record(): A temporary server error occurred. in /HelloWorld.php on line 19

QUESTION 78
<?php
// Step 1: Set a cookie if it doesn't exist
if (!isset($_COOKIE['username'])) {
    setcookie("username", "Indira", time() + 3600, "/"); // Expires in 1 hour
    echo "Cookie 'username' has been set.<br>";
    echo "Refresh the page to read the cookie.<br>";
} else {
    // Step 2: Read the cookie
    echo "Cookie 'username' value: " . $_COOKIE['username'] . "<br>";

    // Step 3: Delete the cookie
    setcookie("username", "", time() - 3600, "/");
    echo "Cookie 'username' has been deleted.<br>";
}
?>

Output:
Cookie 'username' has been set.<br>Refresh the page to read the cookie.<br>

QUESTION 79
<?php
// File names
$file1 = "file1.txt";
$file2 = "file2.txt";
$finalFile = "combined.txt";

// Read contents of first file
$content1 = file_get_contents($file1);

// Read contents of second file
$content2 = file_get_contents($file2);

// Combine and append into final file
if (file_put_contents($finalFile, $content1 . PHP_EOL . $content2, FILE_APPEND) !== false) {
    echo "Files '$file1' and '$file2' have been appended to '$finalFile' successfully.";
} else {
    echo "Error: Could not append files.";
}
?>

Output:

Error: Could not append files.
PHP Warning:  file_get_contents(file1.txt): Failed to open stream: No such file or directory in /HelloWorld.php on line 8
PHP Warning:  file_get_contents(file2.txt): Failed to open stream: No such file or directory in /HelloWorld.php on line 11
PHP Warning:  file_put_contents(combined.txt): Failed to open stream: Permission denied in /HelloWorld.php on line 14

QUESTION 80
<?php
// Create a cookie named "TestCookie" with value "HelloWorld"
// Cookie will expire in 1 hour (3600 seconds) from now
setcookie("TestCookie", "HelloWorld", time() + 3600, "/");

// Display message
echo "Test cookie 'TestCookie' has been set.<br>";

// Check if cookie is available (will be available only after page refresh)
if (isset($_COOKIE['TestCookie'])) {
    echo "Cookie value: " . $_COOKIE['TestCookie'];
} else {
    echo "Please refresh the page to see the cookie value.";
}
?>

Output:
Test cookie 'TestCookie' has been set.<br>Please refresh the page to see the cookie value.

QUESTION 81
<?php
session_start();

// Handle logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// If already logged in, show admin dashboard
if (isset($_SESSION['admin'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Admin Dashboard</title>
    </head>
    <body>
        <h2>Welcome, <?php echo $_SESSION['admin']; ?>!</h2>
        <p>This is the admin dashboard.</p>
        <a href="?logout=true">Logout</a>
    </body>
    </html>
    <?php
    exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Simple admin credentials (for demo)
    $adminUser = "admin";
    $adminPass = "12345";

    if ($username === $adminUser && $password === $adminPass) {
        $_SESSION['admin'] = $username;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

QUESTION 82
<?php
// 1. Simple cookie (name, value)
setcookie("user", "Indira");

// 2. Cookie with expiry time (1 hour from now)
setcookie("theme", "dark", time() + 3600);

// 3. Cookie with expiry time and path
setcookie("language", "English", time() + 3600, "/");

// 4. Cookie with expiry time, path, and domain
setcookie("country", "India", time() + 3600, "/", "localhost");

// 5. Cookie with secure and httponly flags
setcookie("secure_cookie", "This is secure", time() + 3600, "/", "", true, true);

// Display all cookies (will be available on next page load)
echo "<h2>Cookie Setting Example</h2>";
echo "<p>Cookies have been sent to the browser. Refresh the page to see stored cookies.</p>";

if (!empty($_COOKIE)) {
    echo "<h3>Stored Cookies:</h3>";
    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>";
} else {
    echo "<p>No cookies available yet. Please refresh.</p>";
}
?>

Output:
<h2>Cookie Setting Example</h2><p>Cookies have been sent to the browser. Refresh the page to see stored cookies.</p><p>No cookies available yet. Please refresh.</p>

QUESTION 83
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email'] ?? '');

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Extract domain name
        $parts = explode("@", $email);
        $domain = $parts[1];
        $message = "<p style='color:green;'>✅ Valid email address!</p>";
        $message .= "<p><strong>Domain:</strong> $domain</p>";
    } else {
        $message = "<p style='color:red;'>❌ Invalid email address!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Validation</title>
</head>
<body>
    <h2>Email Address Validator</h2>
    <form method="post" action="">
        Enter Email: <input type="text" name="email" required>
        <input type="submit" value="Validate">
    </form>
    <hr>
    <?php if (!empty($message)) echo $message; ?>
</body>
</html>

QUESTION 84
<?php
// Start the session
session_start();

// Step 1: Set session values
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "Indira";
    $_SESSION['role'] = "Admin";
    echo "<p>✅ Session variables have been set.</p>";
}

// Step 2: Display session values
echo "<h3>Session Data:</h3>";
if (!empty($_SESSION)) {
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
} else {
    echo "<p>No session data found.</p>";
}

// Step 3: Remove a specific session variable
if (isset($_GET['remove'])) {
    unset($_SESSION['role']); // Removes 'role' only
    echo "<p>⚠️ 'role' session variable removed.</p>";
}

// Step 4: Destroy the session completely
if (isset($_GET['destroy'])) {
    session_unset();     // Remove all session variables
    session_destroy();   // Destroy the session
    echo "<p>❌ All session data has been cleared and session destroyed.</p>";
}
?>

<hr>
<!-- Links to test removal and destruction -->
<a href="?remove=1">Remove 'role' from session</a> | 
<a href="?destroy=1">Destroy Session</a>

Output:

<p>✅ Session variables have been set.</p><h3>Session Data:</h3><pre>Array
(
    [username] => Indira
    [role] => Admin
)
</pre>
<hr>
<!-- Links to test removal and destruction -->
<a href="?remove=1">Remove 'role' from session</a> | 
<a href="?destroy=1">Destroy Session</a>

QUESTION 85
<?php
// Function to extract file information from a given path
function getFileDetails($path) {
    // Get file name with extension
    $filename = basename($path);

    // Get file name without extension
    $nameWithoutExt = pathinfo($path, PATHINFO_FILENAME);

    // Get file extension
    $extension = pathinfo($path, PATHINFO_EXTENSION);

    // Display results
    echo "Full Path: $path<br>";
    echo "File Name (with extension): $filename<br>";
    echo "File Name (without extension): $nameWithoutExt<br>";
    echo "File Extension: $extension<br>";
}

// Example usage
$filePath = "/var/www/html/uploads/myfile.txt";
getFileDetails($filePath);
?>

Output:
Full Path: /var/www/html/uploads/myfile.txt<br>File Name (with extension): myfile.txt<br>File Name (without extension): myfile<br>File Extension: txt<br>

QUESTION 86
<?php
$filename = "sample.txt";

// 1. Create and write to file using fopen & fwrite
$file = fopen($filename, "w");
fwrite($file, "Hello, this is a test file.\n");
fwrite($file, "This is the second line.\n");
fclose($file);
echo "File created and written successfully.<br>";

// 2. Read file using fopen & fread
if (file_exists($filename)) {
    $file = fopen($filename, "r");
    $contents = fread($file, filesize($filename));
    fclose($file);
    echo "<strong>File Contents:</strong><br><pre>$contents</pre>";
}

// 3. Append content to file
$file = fopen($filename, "a");
fwrite($file, "This line is appended.\n");
fclose($file);
echo "Content appended successfully.<br>";

// 4. Read entire file using file_get_contents
echo "<strong>Updated File:</strong><br>";
echo nl2br(file_get_contents($filename));

// 5. Copy file
copy($filename, "sample_copy.txt");
echo "<br>File copied as sample_copy.txt.<br>";

// 6. Rename file
rename("sample_copy.txt", "renamed_sample.txt");
echo "File renamed to renamed_sample.txt.<br>";

// 7. Delete renamed file
unlink("renamed_sample.txt");
echo "Renamed file deleted.<br>";
?>

Output:

PHP Warning:  fopen(sample.txt): Failed to open stream: Permission denied in /HelloWorld.php on line 5
PHP Fatal error:  Uncaught TypeError: fwrite(): Argument #1 ($stream) must be of type resource, false given in /HelloWorld.php:6
Stack trace:
#0 /HelloWorld.php(6): fwrite()
#1 {main}
  thrown in /HelloWorld.php on line 6

QUESTION 87
<?php
session_start();

// Hardcoded admin credentials (for demo only — use DB + password hashing in real apps)
$admin_user = "admin";
$admin_pass = "12345";

// Logout process
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();
    header("Location: ?page=login");
    exit();
}

// Login process
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $admin_user && $password === $admin_pass) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header("Location: ?page=dashboard");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}

// Determine page
$page = $_GET['page'] ?? 'login';

// Protected page check
if ($page === 'dashboard' && (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true)) {
    header("Location: ?page=login");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
<?php if ($page === 'login'): ?>
    <h2>Admin Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>

<?php elseif ($page === 'dashboard'): ?>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>!</h2>
    <p>You are logged in as Admin.</p>
    <a href="?action=logout">Logout</a>
<?php endif; ?>
</body>
</html>

QUESTION 88
<?php
// Set your birthday (format: month/day)
$birthday = "11-25"; // Example: 25th November

// Current year
$currentYear = date("Y");

// Create DateTime objects for current date and birthday
$today = new DateTime();
$birthdayDate = new DateTime($currentYear . "-" . $birthday);

// If birthday has already passed this year, set it for next year
if ($today > $birthdayDate) {
    $birthdayDate->modify('+1 year');
}

// Calculate the difference
$interval = $today->diff($birthdayDate);
$daysLeft = $interval->days;

// Display the countdown
echo "Today is: " . $today->format("Y-m-d") . "<br>";
echo "Your birthday is on: " . $birthdayDate->format("Y-m-d") . "<br>";
echo "🎉 Days until your birthday: <b>$daysLeft</b> days!";
?>

Output:
Today is: 2025-08-15<br>Your birthday is on: 2025-11-25<br>🎉 Days until your birthday: <b>101</b> days!

QUESTION 89
<?php
// File name
$filename = "example.txt";

// Check if the file exists
if (file_exists($filename)) {
    // Open the file in read mode
    $file = fopen($filename, "r") or die("Unable to open file!");

    echo "<h3>File Contents:</h3>";

    // Read until end of file
    while (!feof($file)) {
        echo fgets($file) . "<br>"; // Reads line by line
    }

    // Close the file
    fclose($file);
} else {
    echo "File '$filename' does not exist.";
}
?>

Output:
File 'example.txt' does not exist.

QUESTION 90
<?php
// File name
$filename = "example.txt";

// Check if file exists
if (file_exists($filename)) {
    // Open the file in read mode
    $file = fopen($filename, "r") or die("Unable to open file!");

    // Read the entire file contents
    $contents = fread($file, filesize($filename));

    // Display the contents
    echo "<h3>File Contents:</h3>";
    echo nl2br($contents); // nl2br() converts newlines to <br> for HTML

    // Close the file
    fclose($file);
} else {
    echo "File '$filename' not found!";
}
?>

Output:
File 'example.txt' not found!

QUESTION 91
<?php
// Start the session
session_start();

// Store some data in the session
$_SESSION['username'] = 'Indira';
$_SESSION['role'] = 'Admin';

// Display the session ID
echo "<h3>Session ID:</h3> " . session_id();

// Display where sessions are stored on the server
echo "<h3>Session Save Path:</h3> " . session_save_path();

// Display all session data
echo "<h3>Session Data:</h3>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>

Output:

<h3>Session ID:</h3> 71h6ce9hm97c5knstpmpj8setu<h3>Session Save Path:</h3> /var/lib/php/sessions<h3>Session Data:</h3><pre>Array
(
    [username] => Indira
    [role] => Admin
)
</pre>

QUESTION 92
<?php
// Step 1: Create/Set Cookie (valid for 1 hour)
setcookie("username", "Indira", time() + 3600, "/"); // Must be before HTML output

// Step 2: Display Cookie Value (if it exists)
if (isset($_COOKIE['username'])) {
    echo "<h3>Cookie Value:</h3> " . $_COOKIE['username'];
} else {
    echo "<h3>Cookie not found or expired.</h3>";
}

// Step 3: Delete Cookie (Uncomment to test deletion)
// setcookie("username", "", time() - 3600, "/");
// echo "<br><strong>Cookie Deleted!</strong>";
?>

Output:
<h3>Cookie not found or expired.</h3>

QUESTION 93
<?php
// File name
$filename = "example.txt";

// Check if file exists
if (file_exists($filename)) {
    // Open the file in read mode
    $file = fopen($filename, "r") or die("Unable to open file!");

    // Read the entire file contents
    $contents = fread($file, filesize($filename));

    // Display the contents
    echo "<h3>File Contents:</h3>";
    echo nl2br($contents); // nl2br() converts newlines to <br> for HTML

    // Close the file
    fclose($file);
} else {
    echo "File '$filename' not found!";
}
?>

Output:
<h2>You have visited this page 1 time(s).</h2>

QUESTION 94
<?php
// Combined demonstration of all PHP file handling modes

$filename = "example.txt";

// --------------------
// 1. "w" mode - Write Only
// --------------------
$file = fopen($filename, "w") or die("Unable to open file in w mode!");
fwrite($file, "This is written in 'w' mode.\n");
fclose($file);

// --------------------
// 2. "r" mode - Read Only
// --------------------
$file = fopen($filename, "r") or die("Unable to open file in r mode!");
echo "Reading with 'r' mode:\n";
echo fread($file, filesize($filename));
fclose($file);

// --------------------
// 3. "a" mode - Append Only
// --------------------
$file = fopen($filename, "a") or die("Unable to open file in a mode!");
fwrite($file, "This is appended in 'a' mode.\n");
fclose($file);

// --------------------
// 4. "r+" mode - Read & Write
// --------------------
$file = fopen($filename, "r+") or die("Unable to open file in r+ mode!");
fwrite($file, "Updated text at the beginning.\n");
rewind($file);
echo "\nReading with 'r+' mode:\n";
echo fread($file, filesize($filename));
fclose($file);

// --------------------
// 5. "w+" mode - Write & Read
// --------------------
$file = fopen($filename, "w+") or die("Unable to open file in w+ mode!");
fwrite($file, "This file is opened in 'w+' mode.\n");
rewind($file);
echo "\nReading with 'w+' mode:\n";
echo fread($file, filesize($filename));
fclose($file);

// --------------------
// 6. "a+" mode - Append & Read
// --------------------
$file = fopen($filename, "a+") or die("Unable to open file in a+ mode!");
fwrite($file, "Appended with 'a+' mode.\n");
rewind($file);
echo "\nReading with 'a+' mode:\n";
echo fread($file, filesize($filename));
fclose($file);

// --------------------
// 7. "x" mode - Create & Write (fails if exists)
// --------------------
$newFile = "newfile.txt";
if (!file_exists($newFile)) {
    $file = fopen($newFile, "x") or die("Unable to create file in x mode!");
    fwrite($file, "This file is created in 'x' mode.\n");
    fclose($file);
    echo "\nFile 'newfile.txt' created successfully with 'x' mode.\n";
} else {
    echo "\nFile 'newfile.txt' already exists. 'x' mode skipped.\n";
}

// --------------------
// 8. "x+" mode - Create & Read/Write
// --------------------
$anotherFile = "anotherfile.txt";
if (!file_exists($anotherFile)) {
    $file = fopen($anotherFile, "x+") or die("Unable to create file in x+ mode!");
    fwrite($file, "Created with 'x+' mode.\n");
    rewind($file);
    echo "\nReading from 'x+' mode file:\n";
    echo fread($file, filesize($anotherFile));
    fclose($file);
} else {
    echo "\nFile 'anotherfile.txt' already exists. 'x+' mode skipped.\n";
}

echo "\n\nAll file handling modes demonstrated successfully!";
?>

Output:

Unable to open file in w mode!
PHP Warning:  fopen(example.txt): Failed to open stream: Permission denied in /HelloWorld.php on line 9

QUESTION 94
<?php
session_start(); // Start or resume session

// Initialize shopping cart if not already
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add an item to the cart
if (isset($_GET['item']) && !empty($_GET['item'])) {
    $item = htmlspecialchars($_GET['item']); // Prevent XSS
    $_SESSION['cart'][] = $item;
    echo "<p>✅ Item '<b>$item</b>' added to your cart.</p>";
}

// Remove an item from the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
    $index = $_GET['remove'];
    if (isset($_SESSION['cart'][$index])) {
        $removed = $_SESSION['cart'][$index];
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
        echo "<p>❌ Item '<b>$removed</b>' removed from your cart.</p>";
    }
}

// Empty the cart
if (isset($_GET['empty'])) {
    $_SESSION['cart'] = [];
    echo "<p>🛒 Your cart is now empty.</p>";
}

// Display the cart
echo "<h3>Your Shopping Cart</h3>";
if (count($_SESSION['cart']) > 0) {
    echo "<ul>";
    foreach ($_SESSION['cart'] as $index => $product) {
        echo "<li>$product 
              <a href='?remove=$index'>[Remove]</a></li>";
    }
    echo "</ul>";
    echo "<a href='?empty=true'>Empty Cart</a>";
} else {
    echo "<p>Your cart is empty.</p>";
}

// Add item form
?>
<hr>
<form method="get">
    <label>Enter Item Name:</label>
    <input type="text" name="item" required>
    <button type="submit">Add to Cart</button>
</form>

Output:

<h3>Your Shopping Cart</h3><p>Your cart is empty.</p><hr>
<form method="get">
    <label>Enter Item Name:</label>
    <input type="text" name="item" required>
    <button type="submit">Add to Cart</button>
</form>

QUESTION 96
<?php
session_start(); // Start session at the top

// Handle Login (Register Session Variable)
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    if (!empty($username)) {
        $_SESSION['username'] = $username;
        $message = "Session variable 'username' is set to '$username'.";
    } else {
        $message = "Please enter a username.";
    }
}

// Handle Logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    $message = "Session destroyed. You have been logged out.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Session Example</title>
</head>
<body>
    <h2>PHP Session Variable Example</h2>
    <?php if (isset($message)) echo "<p><strong>$message</strong></p>"; ?>

    <?php if (!isset($_SESSION['username'])): ?>
        <!-- Login Form -->
        <form method="post">
            <label>Enter Username: </label>
            <input type="text" name="username" required>
            <button type="submit" name="login">Login</button>
        </form>
    <?php else: ?>
        <!-- Show Session Data -->
        <p>Hello, <strong><?php echo $_SESSION['username']; ?></strong>! Welcome back.</p>
        <form method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    <?php endif; ?>
</body>
</html>

QUESTION 97
<?php
// Set custom session name and cookie parameters before starting the session
session_name("MYSESSION");
session_set_cookie_params(3600, "/", "", false, true);

// Start session
session_start();

// Display current session ID and name
echo "<h3>Session Details</h3>";
echo "Session Name: " . session_name() . "<br>";
echo "Session ID: " . session_id() . "<br>";

// Store session variables
$_SESSION['username'] = "JohnDoe";
$_SESSION['email'] = "john@example.com";

// Display stored variables
echo "<h3>Stored Session Variables</h3>";
echo "Username: " . $_SESSION['username'] . "<br>";
echo "Email: " . $_SESSION['email'] . "<br>";

// Regenerate session ID for security
session_regenerate_id(true);
echo "<p>New Session ID after regeneration: " . session_id() . "</p>";

// Display cookie parameters
echo "<h3>Session Cookie Parameters</h3>";
print_r(session_get_cookie_params());

// Example of unsetting variables
if (isset($_GET['unset'])) {
    session_unset();
    echo "<p>All session variables have been removed.</p>";
}

// Example of destroying session
if (isset($_GET['destroy'])) {
    session_destroy();
    echo "<p>Session destroyed. Reload page to start a new session.</p>";
}

// Links for testing
echo "<hr>";
echo '<a href="?unset=1">Unset Session Variables</a><br>';
echo '<a href="?destroy=1">Destroy Session</a>';
?>

Output:

<h3>Session Details</h3>Session Name: MYSESSION<br>Session ID: v5uj0pq8q3cobg5sm8mr00g08t<br><h3>Stored Session Variables</h3>Username: JohnDoe<br>Email: john@example.com<br><p>New Session ID after regeneration: v5uj0pq8q3cobg5sm8mr00g08t</p><h3>Session Cookie Parameters</h3>Array
(
    [lifetime] => 3600
    [path] => /
    [domain] => 
    [secure] => 
    [httponly] => 1
    [samesite] => 
)
<hr><a href="?unset=1">Unset Session Variables</a><br><a href="?destroy=1">Destroy Session</a>
PHP Warning:  session_regenerate_id(): Session ID cannot be regenerated after headers have already been sent in /HelloWorld.php on line 24

QUESTION 98
<?php
session_start();

// Restrict access if not logged in
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['admin_username']; ?>!</h2>
    <p>This is the secure Admin Dashboard.</p>
    <a href="logout.php">Logout</a>
</body>
</html>

Output:
Program did not output anything!

QUESTION 99
<?php
session_start(); // (a) Initiate or resume session

// (b) & (c) & (d) - Visit Counter
if (!isset($_SESSION['visit_count'])) {
    $_SESSION['visit_count'] = 1; // First visit
} else {
    $_SESSION['visit_count']++; // Increment on each visit
}

echo "<h2>You have visited this page " . $_SESSION['visit_count'] . " time(s).</h2>";

// (e) - Link back to the page with session ID
echo "<p><a href='" . $_SERVER['PHP_SELF'] . "?".SID."'>Reload Page with Session ID</a></p>";

// (f) File Upload Restriction
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $target_dir = "uploads/"; // Make sure this folder exists and is writable
    $file_name = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $file_name;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<p style='color:red;'>Error: File '$file_name' already exists. Please upload a different file.</p>";
    } else {
        // Try to move uploaded file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<p style='color:green;'>File '$file_name' uploaded successfully.</p>";
        } else {
            echo "<p style='color:red;'>Error uploading file. Please try again.</p>";
        }
    }
}
?>

<!-- HTML Form for File Upload -->
<h3>Upload a File</h3>
<form action="" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" required>
    <input type="submit" value="Upload File">
</form>

QUESTION 100
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $target_dir = "uploads/";  // Folder to store files
    $file_name = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $file_name;

    // Create folder if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<p style='color:red;'>Error: The file '$file_name' already exists. Please upload a different file.</p>";
    } 
    else {
        // Move uploaded file to target directory
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<p style='color:green;'>Success: File '$file_name' uploaded successfully.</p>";
        } 
        else {
            echo "<p style='color:red;'>Error: There was a problem uploading your file.</p>";
        }
    }
}
?>

<!-- HTML Form -->
<h2>Upload a File</h2>
<form action="" method="post" enctype="multipart/form-data">
    Select file: <input type="file" name="fileToUpload" required>
    <input type="submit" value="Upload File">
</form>

QUESTION 101
<?php
// Step 1: Set the cookie (name: user, value: Indira, expires in 1 hour)
setcookie("user", "Indira", time() + 3600, "/");

// Step 2: Retrieve the cookie value (only available on next page load)
if (isset($_COOKIE["user"])) {
    echo "Cookie value is: " . $_COOKIE["user"];
} else {
    echo "Cookie is not set yet.";
}
?>

Output:
Cookie is not set yet.

QUESTION 102
<?php
// Start the session
session_start();

// Set session variables
$_SESSION["username"] = "Indira";
$_SESSION["role"] = "Admin";

// Display session variables
echo "Session variables have been set.<br>";
echo "Username: " . $_SESSION["username"] . "<br>";
echo "Role: " . $_SESSION["role"] . "<br>";

// Check if a session variable exists
if (isset($_SESSION["username"])) {
    echo "Welcome back, " . $_SESSION["username"] . "!";
} else {
    echo "No session data found.";
}
?>

Output:
Session variables have been set.<br>Username: Indira<br>Role: Admin<br>Welcome back, Indira!

QUESTION 103
<?php
// Start session to store pageview count
session_start();

// Check if 'pageview' exists in session
if (isset($_SESSION['pageview'])) {
    $_SESSION['pageview'] += 1; // Increment if it exists
} else {
    $_SESSION['pageview'] = 1;  // Initialize if not exists
}

// Display the pageview count
echo "<h2>Page View Counter</h2>";
echo "You have visited this page " . $_SESSION['pageview'] . " time(s).";
?>

Output:
<h2>Page View Counter</h2>You have visited this page 1 time(s).

QUESTION 104
<?php
$filename = "example.txt"; // Replace with your file name
$n = 3; // Change this to the line number you want to read (nth line)

// Check if file exists
if (!file_exists($filename)) {
    die("File does not exist.");
}

// Read all lines into an array
$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Check if nth line exists
if (isset($lines[$n - 1])) { // Arrays are 0-indexed
    echo "Line $n: " . $lines[$n - 1];
} else {
    echo "No data";
}
?>

Output:
File does not exist.

QUESTION 105
<?php
function getStartAndEndDateOfWeek($weekNumber, $year) {
    // Ensure week number and year are integers
    $weekNumber = intval($weekNumber);
    $year = intval($year);

    // Get timestamp for the first day of the given week
    $dto = new DateTime();
    $dto->setISODate($year, $weekNumber);

    // Start date (Monday)
    $startDate = $dto->format('Y-m-d');

    // End date (Sunday)
    $dto->modify('+6 days');
    $endDate = $dto->format('Y-m-d');

    return array('start_date' => $startDate, 'end_date' => $endDate);
}

// Example usage:
$weekDates = getStartAndEndDateOfWeek(33, 2025);
echo "Week 33 of 2025 starts on " . $weekDates['start_date'] . " and ends on " . $weekDates['end_date'];
?>

Output:
Week 33 of 2025 starts on 2025-08-11 and ends on 2025-08-17

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

QUESTION 32
<?php
// Original array
$numbers = array(10, 20, 30, 40, 50);

// Remove the first element
array_shift($numbers);

// Display the updated array
print_r($numbers);
?>
Output:

Array
(
    [0] => 20
    [1] => 30
    [2] => 40
    [3] => 50
)

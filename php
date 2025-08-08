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

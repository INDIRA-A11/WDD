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

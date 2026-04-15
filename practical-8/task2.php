<?php

//* ---- Task 2.1

$a = 5;
$b = 10;
$sum = $a + $b;
$difference = $a - $b;
$product = $a * $b;
$division = $a / $b;

echo "Sum: $sum<br>\n";
echo "Difference: $difference<br>\n";
echo "Product: $product<br>\n";
echo "Division: $division<br>\n";


//* ---- Task 2.2

$days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
echo "3rd day: " . $days[2] . "<br>\n";
echo "5th day: " . $days[4] . "<br>\n";


//* ---- Task 2.3

$products = [
    "Apple"  => 15,
    "Bread"  => 28,
    "Milk"   => 42,
];
foreach ($products as $product => $price) {
    echo "$product: {$price} UAH<br>\n";
}


//* ---- Task 2.4

$day = "Monday";
switch ($day) {
    case "Monday":
        echo "Start of the work week!<br>\n";
        break;
    case "Friday":
        echo "Almost the weekend!<br>\n";
        break;
    case "Saturday":
        echo "It's Saturday — enjoy your day off!<br>\n";
        break;
    case "Sunday":
        echo "It's Sunday — rest up!<br>\n";
        break;
    default:
        echo "It's $day — keep going!<br>\n";
        break;
}


//* ---- Task 2.5

$x = 15;
$result = ($x % 2 === 0) ? "even" : "odd";
echo "$x is $result.<br>\n";
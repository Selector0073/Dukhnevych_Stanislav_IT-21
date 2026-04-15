<?php

//* ---- Task 3.1

$price1 = 120;
$price2 = 350;
$price3 = 85;
$total = $price1 + $price2 + $price3;
echo "Total cost: $total UAH<br>\n";


//* ---- Task 3.2

$movies = ["Inception", "The Matrix", "Interstellar", "The Godfather", "Fight Club"];
foreach ($movies as $movie) {
    echo "- $movie<br>\n";
}


//* ---- Task 3.3

$user = [
    "login"    => "john_doe",
    "password" => "secret123",
    "email"    => "john@example.com",
];
foreach ($user as $field => $value) {
    echo "$field: $value<br>\n";
}


//* ---- Task 3.4

if ($total > 500) {
    $discount = $total * 0.10;
    $total_after_discount = $total - $discount;
    echo "Discount applied (10%): -$discount UAH<br>\n";
    echo "Amount to pay: $total_after_discount UAH<br>\n";
} else {
    echo "Amount to pay (no discount): $total UAH<br>\n";
}


//* ---- Task 3.5

$correct_login    = "john_doe";
$correct_password = "secret123";

$entered_login    = "john_doe";
$entered_password = "secret123";

if ($entered_login === $correct_login && $entered_password === $correct_password) {
    echo "Access granted!<br>\n";
} else {
    echo "Invalid login or password.<br>\n";
}
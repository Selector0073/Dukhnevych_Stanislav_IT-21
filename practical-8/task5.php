<?php

//* ---- Task 5.1

$first_name = "Greg";
$last_name = "Doe";
$year_of_birth = 1995;
$full_name = "$first_name $last_name";
$current_year = (int) date("Y");
$age = $current_year - $year_of_birth;
echo "Full name: $full_name<br>\n";
echo "Age: $age<br>\n";


//* ---- Task 5.2

$countries = ["Ukraine", "Germany", "France", "Japan"];
echo "<ol>\n";
foreach ($countries as $country) {
    echo "    <li>$country</li>\n";
}
echo "</ol>\n";


//* ---- Task 5.3

$cities = [
    "Kyiv"       => 2900000,
    "Lviv"       => 720000,
    "Kharkiv"    => 1400000,
    "Odesa"      => 1010000,
    "Mykolaiv"   => 480000,
];
foreach ($cities as $city => $population) {
    if ($population > 1000000) {
        echo "$city: " . number_format($population) . " people<br>\n";
    }
}


//* ---- Task 5.4

$number = 8;
$parity = ($number % 2 === 0) ? "Even" : "Odd";
echo "$number is: $parity<br>\n";


//* ---- Task 5.5

$year = (int) date("Y");
if ($year % 4 === 0) {
    echo "$year is a leap year.<br>\n";
} else {
    echo "$year is not a leap year.<br>\n";
}
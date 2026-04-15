<?php

//* ---- Task 4.1

$x = 42;
$y = 17;
$max = ($x > $y) ? $x : $y;
$min = ($x < $y) ? $x : $y;
echo "Max: $max<br>\n";
echo "Min: $min<br>\n";


//* ---- Task 4.2

$nums = [4, 8, 15, 16, 23, 42];
$total = 0;
foreach ($nums as $n) {
    $total += $n;
}
$count = count($nums);
$mean = $total / $count;
echo "Arithmetic mean: $mean<br>\n";


//* ---- Task 4.3


$students = [
    "Smith"   => 91,
    "Johnson" => 74,
    "Brown"   => 85,
];
foreach ($students as $last_name => $score) {
    if ($score > 80) {
        echo "$last_name: $score<br>\n";
    }
}


//* ---- Task 4.4

$num = 12;
if ($num % 3 === 0 && $num % 5 === 0) {
    echo "$num is a multiple of both 3 and 5.<br>\n";
} elseif ($num % 3 === 0) {
    echo "$num is a multiple of 3.<br>\n";
} elseif ($num % 5 === 0) {
    echo "$num is a multiple of 5.<br>\n";
} else {
    echo "$num is not a multiple of 3 or 5.<br>\n";
}


//* ---- Task 4.5

for ($i = 1; $i <= 10; $i++) {
    $result = 7 * $i;
    echo "7 x $i = $result<br>\n";
}
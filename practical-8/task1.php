<?php

//* ---- Task 1.1

$name = "Alice";
$age = 20;
$is_student = true;

$student_word = $is_student ? "is" : "is not";
echo "$name is $age years old and $student_word a student.<br>\n";


//* ---- Task 1.2

$numbers = [1, 2, 3, 4, 5];
$sum = 0;

foreach ($numbers as $num) {
    $sum += $num;
}
echo "Sum of 1 to 5: $sum<br>\n";


//* ---- Task 1.3

$contact = [
    "name"  => "Bob Smith",
    "email" => "bob@example.com",
    "phone" => "+380501234567",
];
echo "<ul>\n";

foreach ($contact as $key => $value) {
    echo "    <li><strong>$key:</strong> $value</li>\n";
}
echo "</ul>\n";


//* ---- Task 1.4

if ($age > 18) {
    echo "Age $age: adult (over 18).<br>\n";
} else {
    echo "Age $age: minor (18 or under).<br>\n";
}


//* ---- Task 1.5

$grade = 75;
if ($grade >= 90) {
    echo "Grade $grade: Excellent<br>\n";
} elseif ($grade >= 70) {
    echo "Grade $grade: Good<br>\n";
} elseif ($grade >= 50) {
    echo "Grade $grade: Satisfactory<br>\n";
} else {
    echo "Grade $grade: Unsatisfactory<br>\n";
}
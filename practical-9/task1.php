<?php

// Define the OnlyAdults attribute targeting functions/methods
#[Attribute(Attribute::TARGET_FUNCTION | Attribute::TARGET_METHOD)]
class OnlyAdults
{
    // Store the function name when attribute is instantiated
    public function __construct(public string $functionName = '') {}
}

$users = [
    ['name' => 'Alice',      'age' => 25, 'email' => 'alice@mail.com'],
    ['name' => 'Bob',        'age' => 17, 'email' => 'bob@mail.com'],
    ['name' => 'Charlie',    'age' => 30, 'email' => 'charlie@mail.com'],
    ['name' => 'Diana',      'age' => 15, 'email' => 'diana@mail.com'],
    ['name' => 'Ed',         'age' => 22, 'email' => 'ed@mail.com'],
    ['name' => 'Fiona',      'age' => 18, 'email' => 'fiona@mail.com'],
    ['name' => 'George',     'age' => 16, 'email' => 'george@mail.com'],
    ['name' => 'Hannah',     'age' => 28, 'email' => 'hannah@mail.com'],
    ['name' => 'Ivan',       'age' => 19, 'email' => 'ivan@mail.com'],
    ['name' => 'Josephine',  'age' => 14, 'email' => 'josephine@mail.com'],
    ['name' => 'Karl',       'age' => 35, 'email' => 'karl@mail.com'],
];

// Define the filter function with the OnlyAdults attribute
#[OnlyAdults(functionName: 'filterAdults')]
function filterAdults(array $users): array
{
    // Use ReflectionFunction to read attributes and log usage
    $ref = new ReflectionFunction(__FUNCTION__);
    // Get all OnlyAdults attributes on this function
    $attrs = $ref->getAttributes(OnlyAdults::class);
    // Loop through each attribute found
    foreach ($attrs as $attr) {
        // Instantiate the attribute to access its properties
        $instance = $attr->newInstance();
        // Log the function call to PHP error log
        error_log("[OnlyAdults] Function '{$instance->functionName}' called at " . date('Y-m-d H:i:s'));
    }
    // Filter and return only users aged 18 or older
    return array_filter($users, fn($u) => $u['age'] >= 18);
}

// Define the comparison callback for usort by name length
function compareByNameLength(array $a, array $b): int
{
    // Compare lengths of the two names, returning negative/zero/positive
    return strlen($a['name']) <=> strlen($b['name']);
}

// Apply the filter to get only adult users
$adults = filterAdults($users);

// Sort the filtered adults array by name length ascending
usort($adults, 'compareByNameLength');

?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Task 1</title></head>
<body>
<h2>Adults sorted by name length</h2>
<table border="1" cellpadding="6">
    <tr><th>#</th><th>Name</th><th>Age</th><th>Email</th></tr>
    <?php // Iterate over sorted adults to render table rows ?>
    <?php foreach ($adults as $i => $u): ?>
        <tr>
            <?php // Output row index starting from 1 ?>
            <td><?= $i + 1 ?></td>
            <?php // Output each user field ?>
            <td><?= htmlspecialchars($u['name']) ?></td>
            <td><?= htmlspecialchars($u['age']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
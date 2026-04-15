<?php

// Define the ValidatePassword attribute targeting functions/methods
#[Attribute(Attribute::TARGET_FUNCTION | Attribute::TARGET_METHOD)]
class ValidatePassword
{
    // Counter to track failed generation attempts across calls
    public static int $failCount = 0;
}

// Define the password validation callback with the attribute
#[ValidatePassword]
function isStrongPassword(string $password): bool
{
    // Check minimum length of 8 characters
    if (strlen($password) < 8) return false;
    // Check for at least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) return false;
    // Check for at least one digit
    if (!preg_match('/[0-9]/', $password)) return false;
    // All checks passed — password is strong
    return true;
}

// Define the password generation function accepting a validation callback
function generatePassword(int $length, callable $validator): string
{
    // Define the character pool for password generation
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*';
    // Read ValidatePassword attribute via reflection to enable logging
    $ref = new ReflectionFunction($validator);
    // Get all ValidatePassword attributes on the validator function
    $hasAttr = !empty($ref->getAttributes(ValidatePassword::class));
    // Keep generating until a valid password is produced
    do {
        // Build the password character by character
        $pwd = '';
        // Append a random character from the pool for each position
        for ($i = 0; $i < $length; $i++) {
            $pwd .= $chars[random_int(0, strlen($chars) - 1)];
        }
        // Check if the generated password fails validation
        if (!$validator($pwd)) {
            // Increment fail counter if attribute is present
            if ($hasAttr) ValidatePassword::$failCount++;
        }
    } while (!$validator($pwd));
    // Return the first password that passes validation
    return $pwd;
}

// Read form inputs, defaulting to 5 passwords of length 12
$count  = isset($_GET['count'])  ? max(1, (int)$_GET['count'])  : 5;
$length = isset($_GET['length']) ? max(8, (int)$_GET['length']) : 12;

// Generate the requested number of valid passwords
$passwords = [];
// Reset the fail counter before this batch
ValidatePassword::$failCount = 0;
// Loop to generate each password
for ($i = 0; $i < $count; $i++) {
    // Generate one password and store it
    $passwords[] = generatePassword($length, 'isStrongPassword');
}

?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Task 2</title></head>
<body>
<h2>Password Generator</h2>
<form method="get">
    <?php // Input for number of passwords to generate ?>
    Count: <input type="number" name="count"  value="<?= $count ?>"  min="1" max="64">
    <?php // Input for password length ?>
    Length: <input type="number" name="length" value="<?= $length ?>" min="8" max="64">
    <button type="submit">Generate</button>
</form>
<hr>
<h3>Generated passwords (<?= $count ?> × length <?= $length ?>):</h3>
<ol>
    <?php // Render each generated password as a list item ?>
    <?php foreach ($passwords as $pwd): ?>
        <li><?= htmlspecialchars($pwd) ?></li>
    <?php endforeach; ?>
</ol>
<?php // Display the total number of failed generation attempts logged by the attribute ?>
<p>Failed attempts logged by [ValidatePassword]: <?= ValidatePassword::$failCount ?></p>
</body>
</html>
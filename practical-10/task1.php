<?php
# Start with an empty errors array and empty values
$errors = [];
$login = '';
$password = '';
$confirm = '';
# Track whether registration succeeded
$success = false;

# Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    # Trim whitespace from the login field
    $login = trim($_POST['login'] ?? '');
    # Trim whitespace from the password field
    $password = trim($_POST['password'] ?? '');
    # Trim whitespace from the confirmation field
    $confirm = trim($_POST['confirm'] ?? '');

    # Check that login is not empty
    if ($login === '') {
        # Add an error message for empty login
        $errors[] = 'Login is required.';
    } else {
        # Use filter_var with a regex to allow only letters, digits, and underscores
        $clean = filter_var($login, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^[a-zA-Z0-9_]+$/']]);
        # If the regex did not match, the login contains special characters
        if ($clean === false) {
            # Add an error for invalid characters
            $errors[] = 'Login may only contain letters, digits, and underscores.';
        }
    }

    # Check that password is not empty
    if ($password === '') {
        # Add an error for empty password
        $errors[] = 'Password is required.';
    }

    # Check that the confirmation field is not empty
    if ($confirm === '') {
        # Add an error for empty confirmation
        $errors[] = 'Password confirmation is required.';
    }

    # Compare password and confirmation only when both are filled in
    if ($password !== '' && $confirm !== '' && $password !== $confirm) {
        # Add an error when passwords do not match
        $errors[] = 'Passwords do not match.';
    }

    # If there are no errors, mark registration as successful
    if (empty($errors)) {
        # Set the success flag to true
        $success = true;
        # Reset the fields so the form appears empty after success
        $login = '';
        $password = '';
        $confirm = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 1 – Registration</title>
</head>
<body>

<h2>Registration</h2>

<?php # Show a success message if registration was completed successfully ?>
<?php if ($success): ?>
    <p style="color:green;">Registration successful!</p>
<?php endif; ?>

<?php # Loop through all errors and display each one ?>
<?php foreach ($errors as $error): ?>
    <p style="color:red;"><?php
        # Output the error text, escaping HTML special characters for safety
        echo htmlspecialchars($error);
    ?></p>
<?php endforeach; ?>

<form method="post" action="">

    <label>Login:<br>
        <input type="text" name="login" value="<?php
            echo htmlspecialchars($login);
        ?>">
    </label><br><br>

    <label>Password:<br>
        <input type="password" name="password">
    </label><br><br>

    <label>Confirm password:<br>
        <input type="password" name="confirm">
    </label><br><br>

    <button type="submit">Register</button>

</form>

</body>
</html>
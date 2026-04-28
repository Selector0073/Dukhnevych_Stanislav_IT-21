<?php
# Start with empty errors array and default field values
$errors = [];
$name = '';
$age = '';
$gender = '';
$hobbies = [];
$description = '';
# Track whether the profile was submitted successfully
$success = false;

# List of available hobby options
$hobbyOptions = ['Reading', 'Gaming', 'Cooking', 'Sports', 'Traveling'];

# List of allowed gender values
$genderOptions = ['male', 'female', 'other'];

# Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    # Trim whitespace from the name field
    $name = trim($_POST['name'] ?? '');
    # Trim whitespace from the age field
    $age = trim($_POST['age'] ?? '');
    # Retrieve the gender value from POST
    $gender = $_POST['gender'] ?? '';
    # Retrieve hobbies array from POST, default to empty array
    $hobbies = $_POST['hobbies'] ?? [];
    # Trim whitespace from the description field
    $description = trim($_POST['description'] ?? '');

    # Check that name is not empty
    if ($name === '') {
        # Add an error for missing name
        $errors[] = 'Name is required.';
    }

    # Use filter_var to check that age is an integer
    $ageInt = filter_var($age, FILTER_VALIDATE_INT, ['options' => ['min_range' => 10, 'max_range' => 100]]);
    # If filter_var returned false, the age is invalid or out of range
    if ($ageInt === false) {
        # Add an error for invalid age
        $errors[] = 'Age must be a whole number between 10 and 100.';
    }

    # Check that gender is one of the allowed values
    if (!in_array($gender, $genderOptions, true)) {
        # Add an error for missing or invalid gender
        $errors[] = 'Please select a valid gender.';
    }

    # Filter the hobbies array to keep only allowed values
    $hobbies = array_filter($hobbies, function($h) use ($hobbyOptions) {
        # Return true only if the hobby is in the allowed list
        return in_array($h, $hobbyOptions, true);
    });
    # Re-index the array after filtering
    $hobbies = array_values($hobbies);

    # Check that description is not empty
    if ($description === '') {
        # Add an error for missing description
        $errors[] = 'Short description is required.';
    }

    # If there are no errors, mark the profile save as successful
    if (empty($errors)) {
        # Set the success flag to true
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 2 – User Profile</title>
</head>
<body>

<h2>User Profile</h2>

<?php # Display errors if any exist ?>
<?php foreach ($errors as $error): ?>
    <p style="color:red;"><?php
        # Escape and output each error message safely
        echo htmlspecialchars($error);
    ?></p>
<?php endforeach; ?>

<?php # If submission was successful, show the saved profile data ?>
<?php if ($success): ?>
    <div style="border:1px solid #999; padding:10px; margin-bottom:16px;">
        <h3>Saved Profile</h3>
        <p><strong>Name:</strong> <?php
            # Output the name safely
            echo htmlspecialchars($name);
        ?></p>
        <p><strong>Age:</strong> <?php
            # Output the age safely
            echo htmlspecialchars($age);
        ?></p>
        <p><strong>Gender:</strong> <?php
            # Output the gender safely
            echo htmlspecialchars($gender);
        ?></p>
        <p><strong>Hobbies:</strong> <?php
            # Check whether any hobbies were selected
            if (empty($hobbies)) {
                # Display a fallback message when no hobbies were chosen
                echo 'None';
            } else {
                # Escape each hobby, then join them with a comma
                echo implode(', ', array_map('htmlspecialchars', $hobbies));
            }
        ?></p>
        <p><strong>Description:</strong> <?php
            # Output the description safely
            echo htmlspecialchars($description);
        ?></p>
    </div>
<?php endif; ?>

<form method="post" action="">

    <label>Name:<br>
        <input type="text" name="name" value="<?php
            # Re-fill name field with the previous value
            echo htmlspecialchars($name);
        ?>">
    </label><br><br>

    <label>Age:<br>
        <input type="text" name="age" value="<?php
            # Re-fill age field with the previous value
            echo htmlspecialchars($age);
        ?>">
    </label><br><br>

    <fieldset style="border:none; padding:0;">
        <legend>Gender:</legend>
        <?php # Loop through each allowed gender option to render a radio button ?>
        <?php foreach ($genderOptions as $g): ?>
            <label>
                <input
                    type="radio"
                    name="gender"
                    value="<?php
                        # Output the option value safely
                        echo htmlspecialchars($g);
                    ?>"
                    <?php
                        # Mark this radio button as checked if it matches the submitted value
                        echo ($gender === $g) ? 'checked' : '';
                    ?>
                >
                <?php
                    # Display the capitalised label for this option
                    echo htmlspecialchars(ucfirst($g));
                ?>
            </label>
        <?php endforeach; ?>
    </fieldset><br>

    <fieldset style="border:none; padding:0;">
        <legend>Hobbies:</legend>
        <?php # Loop through each hobby option to render a checkbox ?>
        <?php foreach ($hobbyOptions as $hobby): ?>
            <label>
                <input
                    type="checkbox"
                    name="hobbies[]"
                    value="<?php
                        # Output the hobby value safely
                        echo htmlspecialchars($hobby);
                    ?>"
                    <?php
                        # Pre-check the box if this hobby was previously selected
                        echo in_array($hobby, $hobbies, true) ? 'checked' : '';
                    ?>
                >
                <?php
                    # Display the hobby label
                    echo htmlspecialchars($hobby);
                ?>
            </label><br>
        <?php endforeach; ?>
    </fieldset><br>

    <label>Short description:<br>
        <textarea name="description" rows="4" cols="40"><?php
            # Re-fill the textarea with the previous value, escaped for safety
            echo htmlspecialchars($description);
        ?></textarea>
    </label><br><br>

    <button type="submit">Save profile</button>

</form>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP PRACTICE</title>
</head>

<script>

    function redirectToSignin() {
        window.location.href = 'Signin.php';
    }
   
</script>
<body>
    <h1>Sign Up</h1>

    <?php
    // Include the database connection file (assuming it's in the same directory)
    include 'handleDatabases.php';
    include 'processActions.php';
    // Rest of your code
    // You can add more PHP and HTML code here
    
    ?>

<h1>POST Request Form</h1>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">
<input type="hidden" name="action" value="signup">
    <!-- Input fields go here -->
    <label for="firstname">Firstname:</label>
    <input type="text" id="firstname" name="firstname" required>

    <label for="lastname">lastname:</label>
    <input type="text" id="lastname" name="lastname" required>
    
    <label for="email">email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <!-- Submit button -->
    <input type="submit" value="Submit">
</form>

<button onclick="redirectToSignin()">Sign in instead</button>

</body>
</html>

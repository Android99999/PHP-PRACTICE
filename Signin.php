<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEARNING PHP</title>
</head>
<script>

    function redirectToSignup() {
        window.location.href = 'Signup.php';
    }
   
</script>




<body>
    <h1>SIGN IN</h1>

    <?php
   
    // Include the database connection file (assuming it's in the same directory)
    include 'handleDatabases.php';
    include 'processActions.php';

    
    ?>
    

<h1>POST Request Form</h1>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">
<input type="hidden" name="action" value="signin">
    <!-- Input fields go here -->
    
    <label for="email">email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <!-- Submit button -->
    <input type="submit" value="Submit">
</form>

<button onclick="redirectToSignup()">Sign up</button>

</body>
</html>
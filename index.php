<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP PRACTICE</title>
</head>

<script>
    function redirectToSignup() {
        window.location.href = 'Signup.php';
    }
    function redirectToSignin() {
        window.location.href = 'Signin.php';
    }
</script>

<body>
    <h1>INDEX</h1>

    <button onclick="redirectToSignin()">Sign in</button>
    <button onclick="redirectToSignup()">Sign up</button>






</body>
</html>

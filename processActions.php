<?php
// process.php

include_once 'handleDatabases.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : "";
    
    if ($action == "signup") {
        handleSignup($conn);
    } elseif ($action == "signin") {
        handleSignin($conn);
    } else {
        // Handle unexpected or unsupported request
        echo "Invalid request type.";
    }
}

?>
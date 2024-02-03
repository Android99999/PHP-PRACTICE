<?php


    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'auth';


    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "Connected successfully";


    function handleSignup($conn){

        $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
        $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
        $fullname = $firstname . " " . $lastname;
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        $emailisUsed =  emailChecker($email, $conn);

        if($emailisUsed){
            echo "email is already used.";
        }else{

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
            $result = insertUser($conn, $fullname, $email,  $hashedPassword);

            if ($result === true) {
                echo "User inserted successfully";
            } else {
                echo "Error: " . $result;
            }
        }
    }




    function insertUser($conn, $fullname, $email, $hashedPassword) {

        $stmt = $conn->prepare("INSERT INTO admin (fullname, email, hashedPass) VALUES (?, ?, ?)");
                
        $stmt->bind_param("sss", $fullname, $email, $hashedPassword);
                
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            return $stmt->error;
        }
    }

    function emailChecker($email, $conn) {
                    
        $stmt = $conn->prepare("SELECT id FROM admin WHERE `email` = ?");
                    
        if (!$stmt) {
            return $conn->error;
        }
                
        $stmt->bind_param("s", $email);
                
        if ($stmt->execute()) {
            $stmt->store_result();
                
            if ($stmt->num_rows > 0) {
                            // If there is at least one row, bind the result to a variable
                $stmt->bind_result($userId);
                            // Fetch the result
                $stmt->fetch();
                $stmt->close();
                            // return $userId; // Return the user ID or any other relevant data
                return true;
            } else {
                $stmt->close();
                return false; // Email does not exist
            }
        } else {
            return $stmt->error;
        }
    }


   


    function handleSignin($conn) {

        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        $stmt = $conn->prepare("SELECT hashedPass FROM admin WHERE `email` = ?");

        if (!$stmt) {
            return $conn->error;
        }
                
        $stmt->bind_param("s", $email);
                
        if ($stmt->execute()) {
            $stmt->store_result();
                
            if ($stmt->num_rows > 0) {
                            // If there is at least one row, bind the result to a variable
                $stmt->bind_result($dbPassword);
                            // Fetch the result
                $stmt->fetch();
                $stmt->close();
                            // return $userId; // Return the user ID or any other relevant data
               
            } else {
                $stmt->close();
                echo "Email does not exist";
              // Email does not exist
            }
        } else {
            return $stmt->error;
        }
        
        // Verifying a password
        if (password_verify($password, $dbPassword)) {
            // Password is correct
           
            echo '<script>alert("Password is correct!");</script>';
            echo '<script>window.location.href = "index.php";</script>';
            
            exit();
        } else {
            // Password is incorrect
            echo '<script>alert("Password is incorrect!");</script>';;
        }
    }
   
?>
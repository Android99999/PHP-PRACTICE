<?php
$host = 'localhost';
$user = 'id19452532_scfos';
$password = 'Mcbaque01!';
$database = 'id19452532_scfosv3';


$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>
<?php
//<h4>Attempting MySQL connection from php...</h4>


$server = 'mysql';
$user = 'main';
$pass = 'main';
$db = "main";
//connection to database
$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn ) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected to MySQL successfully!"."<br>";
?>
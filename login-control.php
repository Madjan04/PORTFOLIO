<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST["username"];
    $password = $_POST["password"];

    $valid_username = "admin";
    $valid_password = "admin";

    if ($username === $valid_username && $password === $valid_password) {
    
        $_SESSION["loggedin"] = true;
        
      
        header("Location: cms.php");
        exit;
    } else {
       
        header("Location: login.php?error=invalid_credentials");
        exit;
    }
} else {
   
    header("Location: login.php");
    exit;
}
?>

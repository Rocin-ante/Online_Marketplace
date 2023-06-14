<?php

if (isset($_POST["submit"])) {
    
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once '../../config/dbaccess.php';
    require_once 'creat.konto.php';

    if(emptyInputLogin($email, $pwd) !== false){
        echo "<script>alert('Please enter your email and password'); location.href='../../index.php'; </script>";
        exit();
    }
    loginUser($conn, $email,$pwd);
}
else{
    echo "<script>alert('Login failed! ! !'); location.href='../../index.php'; </script>";
    exit();
}
<?php

if (isset($_POST["submit"])) {
    
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once '../config/dbaccess.php';
    require_once 'creat.konto.php';

    if(emptyInputLogin($email, $pwd) !== false){
        header("location: ../inc/login.php?error=emptyinput");
        exit();
    }
    loginUser($conn, $email,$pwd);
}
else{
    header("location: ../../index.php");
    exit();
}
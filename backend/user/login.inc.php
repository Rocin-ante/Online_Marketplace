<?php

if (isset($_POST["submit"])) {
    
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once '../config/dbaccess.php';
    require_once 'creat.konto.php';

    if(emptyInputLogin($uid, $pwd) !== false){
        header("location: ../inc/Anmeldung.php?error=emptyinput");
        exit();
    }
    loginUser($conn, $uid,$pwd);
}
else{
    header("location: ../inc/Anmeldung.php");
    exit();
}
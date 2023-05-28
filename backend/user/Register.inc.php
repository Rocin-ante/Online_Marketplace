<?php 

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $shipping_address = $_POST["shipping_address"];
    $payment_method = $_POST["payment_method"];
    require_once '../../config/dbaccess.php';
    require_once 'creat.konto.php';
    if (emptyInputSignup($first_name,$last_name,$email,
    $pwd,$pwdRepeat,$shipping_address,$payment_method) !== false) {
         header("location:../../index.php?error=emptyinput");
         exit();
    }
    if(invalidEmail($email) !== false ) {
        header("location:../../index.php?error=invalidEmail");
        exit();
        
    }
    if(pwdMatch($pwd, $pwdRepeat) !== false ) {
        header("location:../../index.php?error=Passworddonotmatch");
        exit();
    }
    if (uidExists($conn, $email) !== false) {
        header("location:../../index.php?error=stmtfailed");
        exit();
    }
    createUser($conn, $email, $pwd,$first_name,$last_name,$shipping_address,$payment_method);


}   
else {
    header("location: ../../index.php");
    exit();
}
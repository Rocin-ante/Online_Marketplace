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
        echo "<script>alert('Please enter all important information'); location.href='../../index.php'; </script>";
         exit();
    }
    if(invalidEmail($email) !== false ) {
        echo "<script>alert('Please enter the correct email address'); location.href='../../index.php'; </script>";
        exit();
        
    }
    if(pwdMatch($pwd, $pwdRepeat) !== false ) {
        echo "<script>alert('The passwords entered twice do not match'); location.href='../../index.php'; </script>";
        exit();
    }
    if (uidExists($conn, $email) !== false) {
        echo "<script>alert('This email adress has already been registered '); location.href='../../index.php'; </script>";
        exit();
    }
    createUser($conn, $email, $pwd,$first_name,$last_name,$shipping_address,$payment_method);


}   
else {
    echo "<script>alert('error'); location.href='../../index.php'; </script>";
    exit();
}
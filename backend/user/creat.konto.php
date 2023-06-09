<?php
// Überprüfen !!! , Ob notwendige infomationen fehlen 
function emptyInputSignup($first_name,$last_name,$email,$pwd,$pwdRepeat,$shipping_address,$payment_method){
            $result = ' ';
            if (empty($first_name) || empty($last_name) || empty($email) ||empty($pwd) ||empty($pwdRepeat) ||empty($shipping_address) ||empty($payment_method) ) {
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;
        }

        
// Überprüfen !!! , Ob der Benutzername in ordnung ist.
/*function invalidUid($uid){
            $result;
            if (!preg_match("/^[a-zA-Z0-9]*$/",$uid) ) {
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;
        }*/
// Überprüfen !!! , Ob email in ordnung ist.
function invalidEmail($email){
            $result = ' ';
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;
        }
// Überprüfen !!! , ob die beiden Eingaben sind inkonsistent.
function pwdMatch($pwd,$pwdRepeat){
            $result = ' ';
            if ($pwd !== $pwdRepeat) {
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;
        }
//Überprüfen !!! , ob Konto und email korrekt sind.
function uidExists($conn, $email){
    $sql ="SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>alert('Invalid Email!'); location.href='../../index.php';</script>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
//Überprüfen des Administratorkennworts und der Kontonnummer
/*    function AdminExists($conn,$uid,$pwd){
        $sql ="SELECT * FROM admin WHERE admin_usersname = ? OR admin_pwd = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location:../inc/admin.login.php?error=stmtfailed");
            exit();
        }
    

    mysqli_stmt_bind_param($stmt, "ss", $uid, $pwd);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}  */ 
function createUser($conn, $email, $pwd, $first_name, $last_name, $shipping_address, $payment_method){
    $sql = "INSERT INTO `users` (`email`, `password`, `first_name`, `last_name`, `shipping_address`, `payment_method`) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>alert('Please fill in the information correctly!');location.href='../../index.php';</script>";
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $email, $hashedPwd, $first_name, $last_name, $shipping_address, $payment_method);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<script>alert('Signup successful! Welcome to the Online Shop!'); location.href='../../index.php';</script>";
    exit();
}

function emptyInputLogin($email,$pwd){
            $result = ' ';
            if (empty($email)||empty($pwd)) {
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;
        }
    
function loginUser($conn, $email,$pwd){
    $emailExists = uidExists($conn, $email, $pwd);

    if($emailExists == false){
        echo "<script>alert('Sorry,this email adresse does not exist! ! !'); history.back();</script>";
        exit();
    }
    $pwdHashed = $emailExists["pwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        echo "<script>alert('Please enter the correct password! ! !'); history.back(); </script>";
        exit();
    }
    else if ($checkPwd === true ) {
        session_start();
        //$_SESSION["username"] = $emailExists["username"];
        $_SESSION["username"] = $emailExists["email"];
        echo "<script>alert('Login successful ! ! ! Welcome to the Online Shop ! ! !'); location.href='../../index.php'; </script>";
        exit();
    }
}
/*function loginAdmin($conn, $uid,$pwd){
    $uidExists = AdminExists($conn, $uid,$uid);

    $pwdin = $uidExists["admin_pwd"];

    if( $pwdin != $pwd){
        header("location: ../inc/login.php?error=FlaschPwd");
        exit();
    }
    else {
        session_start();
        $_SESSION["userid"] = $uidExists["ID"];
        $_SESSION["useruid"] = $uidExists["admin_usersname"];
        header("location:../inc/Admin.index.php");
        exit();
    }
}
*/
<?php
// Überprüfen !!! , Ob notwendige infomationen fehlen 
function emptyInputSignup($First_name,$Last_name,$email,$uid,
        $Anrede,$pwd,$pwdRepeat){
            $result;
            if (empty($First_name) || empty($Last_name) || empty($email) || empty($uid) || empty($Anrede) ||empty($pwd) ||empty($pwdRepeat) ) {
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;
        }


// Überprüfen !!! , Ob der Benutzername in ordnung ist.
function invalidUid($uid){
            $result;
            if (!preg_match("/^[a-zA-Z0-9]*$/",$uid) ) {
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;
        }
// Überprüfen !!! , Ob email in ordnung ist.
function invalidEmail($email){
            $result;
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
            $result;
            if ($pwd !== $pwdRepeat) {
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;
        }
//Überprüfen !!! , ob Konto und email korrekt sind.
function uidExists($conn, $uid,$email){
            $sql ="SELECT * FROM users WHERE users_uid = ? OR users_email = ?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location:../inc/account.php?error=stmtfailed");
                exit();
            }
        

        mysqli_stmt_bind_param($stmt, "ss", $uid, $email);
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
    function AdminExists($conn, $uid,$pwd){
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
}   
function createUser($conn, $First_name, $Last_name,$email,$uid,$Anrede,$pwd){
        $sql ="INSERT INTO users (users_First_name,users_Last_name,users_email,users_uid,Anrede,users_pwd) VALUES (?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location:../inc/account.php?error=stmtfailed");
            exit();
        }
    
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $First_name, $Last_name,$email,$uid,$Anrede,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:../inc/Register.php?error=none");
            exit();
   
}
function emptyInputLogin($uid,$pwd){
            $result;
            if (empty($uid)||empty($pwd)) {
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;
        }
    
function loginUser($conn, $uid,$pwd){
    $uidExists = uidExists($conn, $uid,$uid);

    if($uidExists == false){
        header("location: ../inc/login.php?error=UidExists");
        exit();
    }
    $pwdHashed = $uidExists["users_pwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../inc/login.php?error=FlaschPwd");
        exit();
    }
    else if ($checkPwd === true ) {
        session_start();
        $_SESSION["userid"] = $uidExists["users_id"];
        $_SESSION["useruid"] = $uidExists["users_uid"];
        header("location:../inc/index.php");
        exit();
    }
}
function loginAdmin($conn, $uid,$pwd){
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

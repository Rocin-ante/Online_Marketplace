<?php
// Überprüfen !!! , Ob notwendige infomationen fehlen 
function emptyInputSignup($first_name,$last_name,$email,$pwd,$pwdRepeat,$shipping_address){
            $result = ' ';
            if (empty($first_name) || empty($last_name) || empty($email) ||empty($pwd) ||empty($pwdRepeat) ||empty($shipping_address)) {
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;
        }

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
function createUser($conn, $email, $pwd, $first_name, $last_name, $shipping_address){
    $sql = "INSERT INTO `users` (`email`, `password`, `first_name`, `last_name`, `shipping_address`) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>alert('Please fill in the information correctly!');location.href='../../index.php';</script>";
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $email, $hashedPwd, $first_name, $last_name, $shipping_address);
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

    $sql = "SELECT * FROM `users` WHERE binary `email` = '".$emailExists["email"]."'";
    $result = mysqli_query($conn, $sql);
    $info = mysqli_fetch_array($result);
    if ($info['state'] == 0) {
        echo "<script>alert('Account has been banned ! ! !'); history.back();</script>";
        exit();
    }
    else {
        if($emailExists == false){
            echo "<script>alert('Sorry,this email adresse does not exist! ! !'); history.back();</script>";
            exit();
        }
        $pwdHashed = $emailExists["password"];
        $checkPwd = password_verify($pwd, $pwdHashed);
    
        if($checkPwd === false){
            echo "<script>alert('Please enter the correct password! ! !'); history.back();</script>";
            exit();
        }
        else if ($checkPwd === true ) {
            session_start();
    
            $sql = "SELECT * FROM `users` WHERE binary `email` = '".$emailExists["email"]."'";
            $result = mysqli_query($conn, $sql);
            $info = mysqli_fetch_array($result);
            if ($info['admin'])
            {
                $_SESSION['isAdmin'] = 1;
            }
            else
            {
                $_SESSION['isAdmin'] = 0;
            }
            
            $_SESSION["username"] = $info["email"];
            $_SESSION["userID"] = $info["user_id"];
            $_SESSION["firstname"] = $info["first_name"];
    
            $cookie_username = $info["email"];
            $cookie_userID = $info["user_id"];
            $cookie_admin = $info["admin"];
            $cookie_firstname = $info["first_name"];
            setcookie('username', $cookie_username, time()+(120), "/");
            setcookie('userID', $cookie_userID, time()+(120), "/");
            setcookie('admin', $cookie_admin, time()+(120), "/");
            setcookie('firstname', $cookie_firstname, time()+(120), "/");
    
            echo "<script>alert('Login successful ! ! ! Welcome to the Online Shop ! ! !'); location.href='../../index.php'; </script>";
            exit();
        }
    }   
}

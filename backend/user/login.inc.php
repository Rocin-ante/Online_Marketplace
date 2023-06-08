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

/*
<?php
//Login-Skript

session_start();

$Username = trim($_POST['email']);
$Password = trim($_POST['pwd']);

//判断用户名和密码的正确性和完整性
//Feststellung der Korrektheit und Integrität von Benutzernamen und Passwörtern
if (!strlen($Username) or !strlen($Password))
{
    echo "<script>alert('User name and password must be filled in ! ! !'); history.back(); </script>";
    exit;
}
else {
    if (!preg_match("/^[a-zA-Z0-9]{3,10}$/", $Username)) {
        echo "<script>alert('Illegal characters in username or password !'); history.back(); </script>";
        exit;
    }
    if (!preg_match("/^[a-zA-Z0-9_*]{3,10}$/", $Password)) {
        echo "<script>alert('Illegal characters in username or password !'); history.back(); </script>";
        exit;
    }
}

//连接数据库
include_once "../config/dbaccess.php";

//检查是否为活跃状态，只允许活跃状态下的用户登录
//Prüfung auf aktiven Status und Erlaubnis, dass sich nur Benutzer mit aktivem Status anmelden können
$sql = "SELECT * from `users` where `email` = '$Username' and `state` = 1";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if (!$num)
{
    echo "<script>alert('Account has been banned ! ! !'); history.back(); </script>";
    exit;
}

//查询数据，对比用户名和密码是否正确（密码加密）
//Daten abfragen, Benutzername und Passwort auf Korrektheit vergleichen (Passwortverschlüsselung)
$sql = "SELECT * from `users` where binary `email` = '$Username' and  binary `password` = '".md5($Password)."'";
//执行查询
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num)
{
    $info = mysqli_fetch_array($result);
    //判断当前用户是否为管理员
    //Feststellen, ob der aktuelle Benutzer ein Administrator ist
    if ($info['admin'])
    {
        $_SESSION['isAdmin'] = 1;
    }
    else
    {
        $_SESSION['isAdmin'] = 0;
    }
    $_SESSION['username'] = $Username;
    $cookie_username = $Username;
    $cookie_password = $Password;
    setcookie('username', $cookie_username, time()+(120), "/");
    setcookie('password', $cookie_password, time()+(120), "/");
    echo "<script>alert('Login successful ! ! ! Welcome to the hotel ! ! !'); location.href='../index.php'; </script>";
}
else 
{
    unset($_SESSION['isAdmin']);
    unset($_SESSION['username']);
    echo "<script>alert('Incorrect username or password ! ! !'); history.back(); </script>";
}
*/
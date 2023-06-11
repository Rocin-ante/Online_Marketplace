<?php
//Skript zur Änderung persönlicher Daten

session_start();
$Username = $_POST['email'];
$FirstName = trim($_POST['first_name']);
$LastName = trim($_POST['last_name']);
$OPassword;
$Konto = $_SESSION['username'];
//判断用户是否为管理员，如果是管理员，则不需要确认旧密码
//Stellen Sie fest, ob der Benutzer ein Administrator ist. Wenn ja, brauchen Sie das alte Kennwort nicht zu bestätigen.
if ($_SESSION['isAdmin'] != 1)
{
    $OPassword = trim($_POST['OPassword']);
    $NPassword = trim($_POST['Npassword']);
}
$NPassword = trim($_POST['NPassword']);
//连接服务器
include_once "../config/dbaccess.php";

//更新数据
if ($_SESSION['isAdmin'] == 1)
{
    //管理员修改用户信息 Administratoren ändern Benutzerinformationen
    //判断是否需要修改密码 Feststellen, ob das Passwort geändert werden muss 
    if ($NPassword)
    {
        $sql = "UPDATE `users` set `first_name` = '$FirstName', `last_name` = '$LastName',  `password` = '".password_hash($NPassword,PASSWORD_DEFAULT)."' where  `email` = '$Username'";
    }
    else
    {
        $sql = "UPDATE `users` set `first_name` = '$FirstName', `last_name` = '$LastName' where  `email` = '$Username'";
    }
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
        echo "<script>alert('User profile updated successfully ! ! !'); location.href='../index.php?site=usermanagement';</script>";
        exit;
    }
    else
    {
        echo "<script>alert('Failed to update user profile ! ! !'); history.back();</script>";
        exit;
    }
}
else
{
    //用户修改个人信息 Berichtigung persönlicher Informationen durch den Nutzer
    //判断是否需要修改密码 Feststellen, ob das Passwort geändert werden muss
    if ($OPassword)
    {
        $sql = "SELECT * from `users` where `email` = '$Username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_object($result);
        if (password_verify($OPassword,$row->password))
        {
            $sql = "UPDATE `users` set `first_name` = '$FirstName', `last_name` = '$LastName', `password` = '".password_hash($NPassword,PASSWORD_DEFAULT)."' where `email` = '$Username'";
            mysqli_query($conn,$sql);
            //echo "<script>alert('password has been changend ! ! !'); location.href='../index.php';</script>";
        }
        else
        {
            echo "<script>alert('Wrong old password ! ! !'); history.back(); </script>";
        }
    }
    else
    {
        $sql = "UPDATE `users` set `first_name` = '$FirstName', `last_name` = '$LastName' where `email` = '$Username'";
    }   
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
        echo "<script>alert('User profile updated successfully ! ! !'); location.href='../index.php';</script>";
    }
    else
    {
        echo "<script>alert('Failed to update user profile ! ! !'); history.back();</script>";
    }
}
<?php
//设置管理员脚本
//Einrichten von Administratorskripten

session_start();

//如果不是管理员则没有权限修改
//Wenn Sie kein Administrator sind, haben Sie keine Berechtigung zum Ändern von
if (!isset($_SESSION['isAdmin']) || !$_SESSION['isAdmin'])
{
    echo "<script>alert('Please visit this page as an administrator ! ! !'); location.href='../?site=login';</script>";
    exit;
}
$action = $_GET['action'];
//action为信息传输时在之前页面定义的数值，如果是管理员则action为0，如果不是则action为1
//Aktion ist der auf der vorhergehenden Seite definierte Wert, wenn die Nachricht übermittelt wird. Wenn es sich um einen Administrator handelt, ist die Aktion 0, wenn nicht, ist die Aktion 1.
$id = $_GET['id'];
if (is_numeric($action) && is_numeric($id)) //判断是否为数字
{
    if ($action == 1 || $action == 0) //设置管理员
    {
        $sql = "UPDATE `users` set `admin` = '$action' where `user_id` = '$id'";
    }
    else
    {
        echo "<script>alert('Parameter error ! ! !'); history.back();</script>";
        exit;
    }
    //连接数据库
    include_once "../config/dbaccess.php";
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
        echo "<script>alert('Successfully set ! ! !'); location.href='../?site=usermanagement';</script>";
    }
    else
    {
        echo "<script>alert('Setup failed ! ! !'); history.back();</script>";
    }
}
else
{
    //如果action或id不是数字
    echo "<script>alert('Parameter error ! ! !'); history.back();</script>";
}
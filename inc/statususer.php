<?php
//修改用户活跃状态
//Status der Benutzeraktivität ändern

session_start();
//确认是否是管理员修改信息
//Vergewissern Sie sich, dass die Informationen von einem Administrator geändert wurden.
if (!isset($_SESSION['isAdmin']) || !$_SESSION['isAdmin'])
{
    echo "<script>alert('Please visit this page as an administrator ! ! !'); location.href='../?site=login';</script>";
    exit;
}
//连接数据库
include_once "../config/dbaccess.php";
$id = $_GET['id'];
$email = $_GET['email'];
$state = $_GET['state'];
//确认信息是否传递成功
//Bestätigen, dass die Nachricht erfolgreich zugestellt wurde
if (is_numeric($id))
{
    if ($state)
    {
        $sql = "UPDATE `users` set `state` = 0 where `email` = '$email'";
    }
    else
    {
        $sql = "UPDATE `users` set `state` = 1 where `email` = '$email'";
    }
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
        echo "<script>alert('Successfully modified ! ! !'); location.href='../?site=usermanagement';</script>";
    }
    else
    {
        echo "<script>alert('Failed to modify data ! ! !'); history.back();</script>";
    }
}
else
{
    echo "<script>alert('Parameter error ! ! !'); history.back();</script>";
}
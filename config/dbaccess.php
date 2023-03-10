<?php
//连接数据库
//Kapselung von Datenbankverbindungsfunktionen.
$hostname = "localhost";
$username = "admin";
$password = "admin";
$database = "online_market";
$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn)
{
    echo "<script>alert('Database connection failed ! ! !'); history.back();</script>";
    //如果数据库连接失败，则会弹出提示窗口并返回上一个页面
    // Wenn die Datenbankverbindung fehlschlägt, wird ein Warnfenster eingeblendet und zur vorherigen Seite zurückgekehrt
}
/*
else
{
    echo "<script>alert('Database connection succeeded ! ! !');</script>";
}
*/
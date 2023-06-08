<?php

//登出脚本，销毁session，重新回到主页
//Aus dem Skript ausloggen, die Sitzung löschen und zur Startseite zurückkehren
session_start();
session_destroy();
header(header:"Location:../index.php");
?>
<?php 
//登出時把sesstion清除
session_start(); 
$_SESSION = array(); 
session_destroy(); 
header('location:login.php'); 
?>
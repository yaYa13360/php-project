<?php
require("index.html");
session_start(); 
$name=$_SESSION["name"];
echo "<script> alert('welcome ".$name." !!!');</script>";
?>
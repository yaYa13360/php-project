<?php
$server="localhost";//主機
$db_username="yaya";//你的資料庫使用者名稱
$db_password="emily890923";//你的資料庫密碼
$db_name="ppyweb";
$link = mysqli_connect($server,$db_username,$db_password,$db_name);//連結資料庫
mysqli_query($link, 'SET NAMES utf8');
if(!$link){
die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
	 return $link;
}
?>
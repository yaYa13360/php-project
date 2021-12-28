<?php 
require("upLoadGame.html");
$conn=require_once("config.php"); //引入資料庫

if($_SERVER["REQUEST_METHOD"]=="POST"){	
	$gameName=$_POST["gameName"];
	$introduction=$_POST["introduction"];
	$classification=$_POST["classification"];
	
	$sql="INSERT INTO gamelist (gameName,introduction,classification)VALUES('".$gameName."','".$introduction."','".$classification."')";       
	if(mysqli_query($conn, $sql)){
		echo "<script> alert('上傳成功!');parent.location.href='personal.html'; </script>";
		exit;
	}else{
		echo "<script> alert('wrong!!!');</script>";
	}
	
}
mysqli_close($conn); //關閉資料庫
?>
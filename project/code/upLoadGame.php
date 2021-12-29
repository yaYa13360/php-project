<?php 
require("upLoadGame.html");
$conn=require_once("config.php"); //引入資料庫

if($_SERVER["REQUEST_METHOD"]=="POST"){	
	$gameName=$_POST["gameName"];
	$introduction=$_POST["introduction"];
	$classification=$_POST["classification"];
	
	$gameQR = $_FILES['gameQR']['tmp_name'];

	$gameIcon = $_FILES['gameIcon']['tmp_name'];
	
	$data1 = addslashes(fread(fopen($gameQR, "r"), filesize($gameQR)));
	$data2 = addslashes(fread(fopen($gameIcon, "r"), filesize($gameIcon)));
	echo "mysqlPicture=".$data1;
	$sql="INSERT INTO gamelist (gameName,introduction,classification,gameQR,gameIcon)
			VALUES('".$gameName."','".$introduction."','".$classification."','".$data1."','".$data2."')";       
	if(mysqli_query($conn, $sql)){
		echo "<script> alert('上傳成功!');parent.location.href='personal.html'; </script>";
		exit;
	}else{
		echo "<script> alert('wrong!!!');</script>";
	}
	
}
mysqli_close($conn); //關閉資料庫
?>
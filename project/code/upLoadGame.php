<?php 
require("uploadGame.html");
$conn=require_once("config.php"); //引入資料庫

if($_SERVER["REQUEST_METHOD"]=="POST"){	
	$gameName=$_POST["gameName"];
	$introduction=$_POST["introduction"];
	$classification=$_POST["classification"];
	
	$gameQR = $_FILES['gameQR']['tmp_name'];

	$gameIcon = $_FILES['gameIcon']['tmp_name'];
	
	$gamePic1 = $_FILES['gamePic1']['tmp_name'];
	$gamePic2 = $_FILES['gamePic2']['tmp_name'];
	$gamePic3 = $_FILES['gamePic3']['tmp_name'];
	$gamePic4 = $_FILES['gamePic4']['tmp_name'];
	$gamePic5 = $_FILES['gamePic5']['tmp_name'];
	
	$data1 = addslashes(fread(fopen($gameQR, "r"), filesize($gameQR)));
	$data2 = addslashes(fread(fopen($gameIcon, "r"), filesize($gameIcon)));
	$pic1 = addslashes(fread(fopen($gamePic1, "r"), filesize($gamePic1)));
	$pic2 = addslashes(fread(fopen($gamePic2, "r"), filesize($gamePic2)));
	$pic3 = addslashes(fread(fopen($gamePic3, "r"), filesize($gamePic3)));
	$pic4 = addslashes(fread(fopen($gamePic4, "r"), filesize($gamePic4)));
	$pic5 = addslashes(fread(fopen($gamePic5, "r"), filesize($gamePic5)));
	
	$sql="INSERT INTO gamelist (gameName,introduction,classification,gameQR,gameIcon,gamePic1,gamePic2,gamePic3,gamePic4,gamePic5)
			VALUES('".$gameName."','".$introduction."','".$classification."','".$data1."','".$data2."','".$pic1."','".$pic2."','".$pic3."','".$pic4."','".$pic5."')";      
	if(mysqli_query($conn, $sql)){
		echo "<script> alert('上傳成功!');parent.location.href='personal.html'; </script>";
		exit;
	}else{
		echo "<script> alert('wrong!!!');</script>";
	}
	
}
mysqli_close($conn); //關閉資料庫
?>
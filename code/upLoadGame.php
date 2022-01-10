<?php 
$conn=require_once("config.php"); //引入資料庫
session_start();
$creator_id = $_SESSION['id'];
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
	
	$creatorName=$_POST["creatorName"];
	
	$data1 = addslashes(fread(fopen($gameQR, "r"), filesize($gameQR)));
	$data2 = addslashes(fread(fopen($gameIcon, "r"), filesize($gameIcon)));
	$pic1 = addslashes(fread(fopen($gamePic1, "r"), filesize($gamePic1)));
	$pic2 = addslashes(fread(fopen($gamePic2, "r"), filesize($gamePic2)));
	$pic3 = addslashes(fread(fopen($gamePic3, "r"), filesize($gamePic3)));
	$pic4 = addslashes(fread(fopen($gamePic4, "r"), filesize($gamePic4)));
	$pic5 = addslashes(fread(fopen($gamePic5, "r"), filesize($gamePic5)));
	
	$sql="INSERT INTO gamelist (gameName,introduction,classification,gameQR,gameIcon,gamePic1,gamePic2,gamePic3,gamePic4,gamePic5,creatorName)
			VALUES('".$gameName."','".$introduction."','".$classification."','".$data1."','".$data2."','".$pic1."','".$pic2."','".$pic3."','".$pic4."','".$pic5."','".$creatorName."')";      
	$sql2="INSERT INTO creator_upload (creator_id,upload_gameName)VALUES('".$creator_id."','".$gameName."')"; 
	if(mysqli_query($conn, $sql) && mysqli_query($conn,$sql2)){
		echo "<script> alert('上傳成功!');parent.location.href='personal.php'; </script>";
		exit;
	}else{
		echo "<script> alert('wrong!!!');</script>";
	}
	
}
mysqli_close($conn); //關閉資料庫
?>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src="../js/bootstrap.min.js"></script>
</head>
<body style='color:white;'>
<div>
	<form name="upLoadForm" method="post" action="upLoadGame.php" enctype="multipart/form-data">
		<center>
			<p><input type="text" id="gameName" style="font-size:18px" name="gameName" placeholder="遊戲名稱"></p>
			<p><input type="text" id="gameClass" style="font-size:18px" name="classification" placeholder="遊戲分類"></p>
			<p><textarea id="gameIntro" style="height:30%;width:60%;font-size:18px;" name="introduction" placeholder="遊戲介紹"></textarea></p>
			<p>遊戲連結（QRcode）：<input type="file" id="gameQR" name="gameQR" size="40"></p>
			<p>遊戲縮圖（Icon）&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;：
			<input type="file" id="gameIcon" name="gameIcon" size="40"></p>
			<p>遊戲截圖(五張)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;：
			<input type="file" id="gamePic1" name="gamePic1" size="40"></p>
			<p><input type="file" id="gamePic2" name="gamePic2" size="40">
			<input type="file" id="gamePic3" name="gamePic3" size="40"></p>
			<p><input type="file" id="gamePic4" name="gamePic4" size="40">
			<input type="file" id="gamePic5" name="gamePic5" size="40"></p>
			<p><input type="text" id="creatorName" style="font-size:18px" name="creatorName" placeholder="Creator Name"></p>
			<p><button id="sendButton" onclick="send()" name="submit">上傳</button></p>
		</center>
	</form>
</div>
</body>
</html>
<?php 
require("register.html");
$conn=require_once("config.php"); //引入資料庫

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if($_POST["email"]){ 
		$email=$_POST["email"];
		$identity='user';
	}
	else if($_POST["creatoremail"]){
		$email=$_POST["creatoremail"];
		$identity='creator';
	}
	else{
		echo "<script> alert('wrong!!!');</script>";
	}
	
	$username=$_POST["name"];
	$password=$_POST["password"];
	$check="SELECT * FROM account where email='".$email."'"; //選取資料庫email欄位
	
	if(mysqli_num_rows(mysqli_query($conn,$check))==0){
			$sql="INSERT INTO account (identity,name,email,password)VALUES('".$identity."','".$username."','".$email."','".$password."')";       
			if(mysqli_query($conn, $sql)){
				echo "<script> alert('註冊成功!請使用新帳號登入~');parent.location.href='login.php'; </script>";
				exit;
			}else{
				echo "<script> alert('wrong!!!');</script>";
			}
	}
	else{
			echo "<script> alert('此帳號已有人註冊');parent.location.href='register.php'; </script>";
			exit;
	}	
}
mysqli_close($conn); //關閉資料庫
?>
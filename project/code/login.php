<?php
require("signIn.html");
$conn=require_once "config.php"; //引入資料庫



if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if($_POST["email"]){ 
		$email=$_POST["email"];
		}
	else if($_POST["creatoremail"]){
		$email=$_POST["creatoremail"];
		}
	else{
		//echo "<script> alert('wrong222!!!');</script>";
		}
	 
	$username=$_POST["name"];
	$password=$_POST["password"];
	$password_hash=password_hash($password,PASSWORD_DEFAULT); //提高密碼安全性
		
    $sql = "SELECT * FROM account WHERE email ='".$email."'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1 && $password==mysqli_fetch_assoc($result)["password"]){
		$sql2 = "SELECT name FROM account WHERE email ='".$email."'";
		$result2 = mysqli_query($conn,$sql2);
		$username = mysqli_fetch_assoc($result2)["name"];
        session_start();
        $_SESSION["login"] = true;
		$_SESSION["name"] = $username ;
        header("location:index.php");
    }
	else{
            function_alert("帳號或密碼錯誤"); 
    }
}
else{
	//echo "<script>alert('sth wrong');</script>";       
}
    mysqli_close($link); //關閉資料庫

function function_alert($message) { 

    echo "<script>alert('$message');
    window.location.href='login.php';
    </script>"; 
    return false;
	} 
?>


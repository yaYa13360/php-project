<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPY WEB</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
	<link rel="stylesheet" href="../css/ppy.css">
	<script src="../js/bootstrap.min.js"></script>	
	<style>
	    div[class|="col"] {background-color:rgba(0, 0, 0, 0.8); border:0.5px solid rgba(207, 207, 247, 0.7)}
	
		.up{
			height:20vh;
			width:100%;
		}
		.down{
			height:70vh;
			width:100%;
		}
	
		.col-9 button{
			width:25%;
			height:100%;
			border:transparent;
			background:transparent;
		}
		.bt{
			border: none;
			background: transparent; 
			color: white;
			font-size: 20px;
			padding: 20px;
			width: 200px;
			border-radius: 5px;
		} 
		.bt span{ 
			transition: 0.5s; 
		} 
		.bt:hover span{ 
			padding-right: 25px;
		} 
		.bt span:after{ 
			content: "»";
			opacity: 0; 
			transition: 0.5s;
		} 
		.bt:hover span:after{ opacity: 1;}

		.navbar-style{
			background-color: #51244C;
			box-shadow: 0px 0px 5px 0px #CDBCCB;
		}
		nav a {
			color: inherit; /* 移除超連結顏色 */
			text-decoration: none;  /* 移除超連結底線 */
			color: #F5F5FF;
		}
		nav a:hover {
			color: #C7C7E2;
		}
	</style>
  </head>
  <script>

		function upLoad(){
			document.getElementById('middleCol').innerHTML = "";
			var iframe= document.createElement('iframe');
			iframe.src= 'upLoadGame.php';
			iframe.width= 820;
			iframe.height = 500;
			iframe.frameBorder = 0;
			document.getElementById('middleCol').appendChild(iframe);
		}
		function topUp(){
			document.getElementById('middleCol').innerHTML = "";
			var iframe= document.createElement('iframe');
			iframe.src= 'topup.php';
			iframe.width= 820;
			iframe.height = 500;
			iframe.frameBorder = 0;
			document.getElementById('middleCol').appendChild(iframe);
		}
		function record(){
			document.getElementById('middleCol').innerHTML = "";
			var iframe= document.createElement('iframe');
			iframe.src= 'record.php';
			iframe.width= 820;
			iframe.height = 500;
			iframe.frameBorder = 0;
			document.getElementById('middleCol').appendChild(iframe);
		}
		function gameUpload(){
			document.getElementById('middleCol').innerHTML = "";
			var iframe= document.createElement('iframe');
			iframe.src= 'gameUpload.php';
			iframe.width= 820;
			iframe.height = 500;
			iframe.frameBorder = 0;
			document.getElementById('middleCol').appendChild(iframe);
		}
		function gameTotal(){
			document.getElementById('middleCol').innerHTML = "";
			var iframe= document.createElement('iframe');
			iframe.src= 'gameTotal.php';
			iframe.width= 820;
			iframe.height = 500;
			iframe.frameBorder = 0;
			document.getElementById('middleCol').appendChild(iframe);
		}
		

	</script>

<body background="../src/bg.jpg" style="background-size:100% 100%; color: rgb(255, 255, 255);">
	<nav class="navbar sticky-top navbar-expand-sm navbar-style">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">PPY WEB</a>
			<div>
				<ul class="navbar-nav">
					<li class="navbar-item"><a class="nav-link" href="logout.php">LOG_OUT</a></li>
					<li class="navbar-item"><div class="userImgBox"><a href="personal.php"><img src="../src/people.png" class="userImg"></a></div></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-3 up">
				<!--(一)圖片放置-->
				<center><img src="../src/people.png" style="height:100%;width:auto"></center>
			</div>
			<div class="col-9 up" id="upCol">
			</div>
		</div>
		<div class="row">
				
			<div class="col-3 down">
			<?php
			session_start(); 
			$identity=$_SESSION["identity"];
			
			echo '<center>';
			if($identity == 'user'){
				echo '<button class="bt" onclick="topUp();"><span>';
				echo '儲值紀錄';
				echo '</span></button><br>';
				echo '<button class="bt" onclick="record();"><span>';
				echo '遊戲紀錄';
				echo '</span></button><br>';
			}
			else{
				echo '<button class="bt" onclick="gameTotal();"><span>';
				echo '遊戲收益';
				echo '</span></button><br>';
				echo '<button class="bt" onclick="gameUpload();"><span>';
				echo '已上傳的遊戲';
				echo '</span></button><br>';
				echo '<button class="bt" onclick="upLoad();"><span>';
				echo '上傳遊戲';
				echo '</span></button>';
			}			
			echo '</center>';
			?>
			
			</div>
				
			
			<div class="col-9 down" id="middleCol">
			</div>
		</div>
	</div>



</body>
</html>
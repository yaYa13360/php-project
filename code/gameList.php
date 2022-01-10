<?php
    session_start();
    if(isset($_SESSION["login"]) && $_SESSION["login"]===true){
        $name=$_SESSION["name"];
        $log_text = "LOG_OUT";
        $log_link = "logout.php";
		$link = "personal.php";
    }
    else{
        $log_text = "LOG_IN";
        $log_link = "login.php";
		$link = "index.php";
    }
?>
<html>
<head>
    <title>PPY WEB</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
	<link rel="stylesheet" href="../css/ppy.css">
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>	
	
	<style>
		/* div[class|="col"] {background-color:rgba(0, 0, 0, 0.7); border:0.5px solid rgba(207, 207, 247, 0.7)}; */
		/* .iconImg{
			width: 350px;
			height: auto;
		} */
		.gameTypeText{
			font-weight:800;
			font-size:50;
		}
		.gameTypePos{
			margin-left: 20px;
			margin-top: 20px;
			margin-bottom: 20px;
		}
		.box-border{
			position:relative;
			width:400px;
			border-bottom:2px solid #878a8dc7;
		}
		.gamePic{
			width: 250px;
			height: 250px;
			border:4px solid rgb(128, 82, 122);
		}
		a:hover{
			color:rgb(215, 193, 213);
		}
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
<body background="../src/bg.jpg" style="background-size:100% 100%; color: rgb(255, 255, 255);">
	<nav class="navbar sticky-top navbar-expand-sm navbar-style">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">PPY WEB</a>
			<div>
				<ul class="navbar-nav">
					<li class="navbar-item">
			<?php
				echo '<a class="nav-link" href="'.$log_link.'">'.$log_text.'</a>';
			?>
					</li>
					<li class="navbar-item"><div class="userImgBox">
			<?php
				echo '<a href="'.$link.'"><img src="../src/people.png" class="userImg"></a>';
			?>
					</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
    <!--網頁內容-->
	<div class="container" style="background-color:rgba(0, 0, 0, 0.7); border:0.5px solid rgba(207, 207, 247, 0.7);">
		<div class="row">
				<div class="col-12 gameTypePos">
					<p id="gameType"">
						<font class="gameTypeText">
							<h1>
						<?php 
							$gName = $_GET["gameName"];
							echo $gName . "遊戲";
						?>
							</h1>
						</font>
					</p>
				</div>
		</div>
		<div class="row">
			<div class="col-9">
				<?php
					$gameName = $_GET["gameName"];
					$con=require_once("config.php"); //引入資料庫
					$sql = 'SELECT `gameName`, `introduction`, `classification`, `gameIcon` FROM `gamelist` WHERE classification="'.$gName.'"';
					$result=mysqli_query($con, $sql);//選擇從資料表中讀取資料
					
					for($i=1;$i<=mysqli_num_rows($result);$i++){
						$rs=mysqli_fetch_row($result);
				?>
				<div class="row" style="margin-bottom: 10px;">
					<div class="gamePicBox">
						<?php 
							echo "<div class='col-4'><img src='showPic.php?gName=". $rs[0] ."&kind=gameIcon' class='gamePic'></div>";
						?>
					</div>
					<div class="col-8" style="background-color:rgba(0, 0, 0, 0.7); border:0.5px solid rgba(207, 207, 247, 0.7)">
						<?php
							echo '<span style="font-size:30px;font-weight:bold;"><a href="app.php?gameName='.$rs[0].'" style="color:rgba(255,255,255,1);text-decoration: none;">';
							echo $rs[0];
							echo '</a></span>';
							echo '<div class="box-border"></div>';
							echo '<br><span style="font-weight:bold;size:20;">遊戲介紹：</span><br><span>'.mb_substr( $rs[1], 0, 132, 'utf-8').'</span>';
							//超過165字數則做縮減
							//echo strlen($rs[1]);
							if(strlen($rs[1])>132*3)
								echo "<br><span style='float:right;'><a href='app.php?gameName=".$rs[0]."' style='color:rgb(215, 193, 213);'>...more>></a></span>";
						?>
					</div>
				</div>
				<?php		
					}
					mysqli_free_result($result);
					mysqli_close($con);
				?>
			</div>
			<div class="col-3" style="background-size:100% 100%; border:0.5px solid rgba(207, 207, 247, 0.7)">ads</div>
			
		</div>
	</div>
</body>
<script>
    
</script>
</html>
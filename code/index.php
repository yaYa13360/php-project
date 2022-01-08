<?php
    session_start();
    if(isset($_SESSION["login"]) && $_SESSION["login"]===true){
        $name=$_SESSION["name"];
        echo "<script> alert('welcome ".$name." !!!');</script>";
        $log_text = "LOG_OUT";
        $log_link = "logout.php";
    }
    else{
        echo "<script> alert('welcome guest !!!');</script>";
        $log_text = "LOG_IN";
        $log_link = "login.php";
    }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPY WEB</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/ppy.css">
	<script src="../js/bootstrap.min.js"></script>
	<meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css">
	<style>
	div[class|="col"] {background-color:#EBDEF0; border:0.5px solid purple}
	.swiper-container{
		left:10px;
		width:98%;

	}
	.swiper-item{
		width:100%;
		height:90%;
		top:10%;
    }
	.col-3 img{
		width:100%;
		height:100%;
	}
	.a-class{ border: none;
		background: transparent; 
		color: blue;
		font-size: 20px;
		padding: 20px;
		width: 200px;
		border-radius: 5px;
	} 
	.a-class span{ 
		transition: 0.5s; 
	} 
	.a-class:hover span{ 
		padding-right: 25px;
	} 
	.a-class span:after{ 
		content: "»";
		opacity: 0; 
		transition: 0.5s;
	} 
	.a-class:hover span:after{ opacity: 1;}
	</style>
  </head>
<body>
	<nav class="navbar sticky-top bg-light navbar-light navbar-expand-sm navbar-style">
		<div class="container-fluid containerStyle">
			<a class="navbar-brand" href="index.php">PPY WEB</a>
			<div>
				<ul class="navbar-nav">
					<li class="navbar-item">
            <?php
                echo '<a class="nav-link" href="'.$log_link.'">'.$log_text.'</a>';
            ?>
          </li>
					<li class="navbar-item"><div class="userImgBox"><a href="#"><img src="../src/Tako.png" class="userImg"></a></div></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col" style = "height: 300px;">
				  <div class="swiper-container">
						<img class="swiper-item" src="../src/bird1.jpg">
						<img class="swiper-item" src="../src/bird2.jpg">
						<img class="swiper-item" src="../src/bird3.jpg">
				  </div>
			</div>
		</div>
		<div class="row">
			<div class="col-3" style = "height: 600px;">
				<!--遊戲類別-->
				<br>
				<?php
					$con=require_once("config.php"); //引入資料庫
					$sql = "SELECT DISTINCT `classification` FROM `gameList`";
					$result=mysqli_query($con, $sql);//選擇從資料表中讀取classification的資料

					for($i=1;$i<=mysqli_num_rows($result);$i++){
						$rs=mysqli_fetch_row($result);
						echo '<center><a href="gameList.php?gameName='.$rs[0].'" class="a-class" style="color:#5151A2"><b><span>';
						echo $rs[0];
						echo '</span></b></a></center><br>';
					}
					mysqli_free_result($result);
					mysqli_close($con);
				?>
			</div>
			<div class="col-6" style = "height: 600px;">
				<span style="font-size:30px;font-weight:bold;"><關於我們></span><br>
				<p style='line-height: 45px;font-size:20px;'>PPY全名pay per year，顧名思義讓您每年都想使用這個遊戲網站。<br>
					☆如果你是玩家，不知道要玩什麼嗎，那就來PPY網站吧，這裡有各式各樣的遊戲介紹，
					從RPG遊戲到休閒小遊戲都應有盡有，還可以看到您各個遊戲的排行與儲值紀錄喔。<br>
					☆如果你是遊戲開發商，有了好遊戲不知道怎麼推廣嗎，來PPY網站吧，只要一年繳一點點的錢，
					就可以讓您的遊戲全年365天被放在我們的網站上，比在別的平台上打廣告要來的棒多了，
					還在等甚麼，快來註冊PPY吧!
				</p>
			</div>
			<div class="col-3" style = "height: 600px;">
				<img src="../src/我是廣告.png"> 
			</div>
		</div>
	</div>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
$('.swiper-container').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  dots:true
});
</script>
</body>
</html>

<?php
    include("config.php");
    $gameName = $_GET["gameName"];
    $sql_query = "SELECT * FROM `gamelist` WHERE `gameName` = '$gameName'";
    $result = mysqli_query($link, $sql_query);
    $row_result = mysqli_fetch_assoc($result);

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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css">
        <link rel="stylesheet" href="../css/ppy.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <style>
            /* div[class|="col"] {background-color:rgba(0, 0, 0, 0.7); border:0.5px solid rgba(207, 207, 247, 0.7)} */
            .containerStyle{
                margin-left: 10px;
                margin-right: 10px;
            }
            .navbar-style{
                background-color: white;
                box-shadow: 0 0 5px 0 #878a8d;
            }
            .navbar-brand{
                font-size: 30px;
            }
            .userImgBox{
                height: 40px;
                width: 40px;
            }
            .userImg{
                border:2px rgba(187, 187, 187, 0.65) solid;
                height: 100%;
                width: 100%;
            }
            .userImg:hover{
                border:2px rgba(131, 131, 131, 0.65) solid;
            }
            .appName{
                font-size: 40px;
                font-style: italic;
                border-bottom: 3px #878a8dc7 solid;
                margin-left: 20px;
            }
            .creatorName{
                font-size: 25px;
                color:rgb(175, 175, 175);
                border-bottom: 3px #c9c9c9c7 solid;
                padding-top: 15px;
                margin-bottom: 10px;
                margin-left: 20px;
            }
            .UperArea{
                background-color:rgba(0, 0, 0, 0.7); 
                border:0.5px solid rgba(207, 207, 247, 0.7);
                position: relative;
                /* margin-bottom: 25px; */
                margin-top: 25px;
                height: 220px;
            }
            .UperLeftArea{
                /* background-color: rgb(202, 230, 139); */
                position: absolute;
                bottom: 0px;
                /* padding-bottom: 5px; */
            }
            .iconArea{
                /* background-color: rgba(0, 0, 0, 1); */
                position: absolute;
                right: 0px;
                bottom: 0px;
            }
            .iconImg{
                /* max-width: 100%;
                max-height: 100%; */
                width: 100%;
                height: 100%;
                /* border:4px solid rgb(128, 82, 122); */
            }
            .iconBox{
                width: 200px;
                height: 200px;
                /* padding-top: 10px; */
                padding-bottom: 10px;
            }
            .qrArea{
                /* background-color: rgb(255, 204, 179); */
                padding-top: 10px;
            }
            .qrBox{
                width: 200px;
                height: 200px;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            .introArea{
                /* background-color: rgb(224, 224, 255); */
                background-color:rgba(255, 255, 255, 0.1); 
                margin-left: 45px;
                margin-right: 45px;
                padding-left: 30px;
                padding-right: 30px;
                padding-bottom: 100px;
                margin-top: 20px;
                line-height: 50px;
                font-family: Gill Sans, sans-serif;
                font-size: 20px;
            }
            .LowerLeftArea{
                /* background-color: rgb(246, 240, 255); */
                background-color:rgba(0, 0, 0, 0.7); 
                border:0.5px solid rgba(207, 207, 247, 0.7);
                padding-bottom: 100px;
            }
            .LowerRightArea{
                /* background-color: rgb(255, 237, 225); */
                background-color:rgba(0, 0, 0, 0.7); 
                border:0.5px solid rgba(207, 207, 247, 0.7);
            }
            .swiper-container{
                width: 90%;
                height: 100%;
                margin-left: auto;
                margin-right: auto;

                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            
            }
            .swiper-container img{
                width:100%;
                height:100%;
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

        <!--上半-->
        <div class="container">
            <div class="row UperArea">
                <div class="col-9 UperLeftArea">
                    <div class="row">
                        <!-- appName -->
                        <span class="col-md-8 appName">
                            <?php 
                                echo $gameName 
                            ?>
                        </span>
                    </div>
                    <div class="row">
                        <!-- creatorName -->
                        <span class="col-md-6 creatorName">
                            <?php 
                                echo $row_result['creatorName'];
                            ?>
                        </span>
                    </div>
                </div>
                <div class="col-3 iconArea">
                    <!-- iconPic -->
                    <center>
                        <div class="iconBox">
                            <?php
                                echo "<img src='showPic.php?gName=". $gameName ."&kind=gameIcon' class='iconImg' id='icon'>"
                            ?>
                        </div>
                    </center>
                </div>
            </div>
            <!--下半-->
            <div class="row LowerArea">
                <div class="col-9 LowerLeftArea">
                    <!-- 圖片區域 -->
                    <!-- <div class="row" style="background-color: rgb(215, 255, 217); height: 400px;"> -->
                    <div class="row" style="height: 400px; padding-top: 20px;">
                        <div class="swiper-container">
                            <?php
                                echo "<div><img src='showPic.php?gName=". $gameName ."&kind=gamePic1'></div>";
                                echo "<div><img src='showPic.php?gName=". $gameName ."&kind=gamePic2'></div>";
                                echo "<div><img src='showPic.php?gName=". $gameName ."&kind=gamePic3'></div>";
                                echo "<div><img src='showPic.php?gName=". $gameName ."&kind=gamePic4'></div>";
                                echo "<div><img src='showPic.php?gName=". $gameName ."&kind=gamePic5'></div>";
                            ?>
                        </div>
                    </div>
                    <!-- 介紹區域 -->
                    <!-- <div class="row" style="background-color: rgb(215, 230, 255); height: 700px;"> -->
                    <div class="row">
                        <div class="introArea">
                            <b>Introduction:</b><br>
                            <?php
                                $tempS = strtok($row_result['introduction'], "\n");
                                while($tempS){
                                    echo $tempS ."<br>";
                                    $tempS = strtok("\n");
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- 廣告區 -->
                <div class="col LowerRightArea">
                    <div class="qrArea">
                        <center>
                        <b>Download:</b>
                        <div class="qrBox">
                            <?php
                                echo "<img src='showPic.php?gName=". $gameName ."&kind=gameQR' class='iconImg' id='icon'>"
                            ?>
                        </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script>
            $('.swiper-container').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            // dots:true,

            responsive: [
                {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
                },
                {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
                }
            ]
            });
        </script>
    </body>
</html>
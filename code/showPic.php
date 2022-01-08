<?php
    include("config.php");
    $gameName = $_GET["gName"];
    $kind = $_GET["kind"];
    $sql_query = "SELECT * FROM `gamelist` WHERE `gameName` = '$gameName'";
    $result = mysqli_query($link, $sql_query);
    $row_result = mysqli_fetch_assoc($result);
    Header( "Content-type: image/png"); 
    echo $row_result[$kind];
    // echo $gameName;
?>
<?php
//creator 上傳的所有遊戲的營收顯示
$con=require("config.php"); //引入資料庫

session_start(); 

$creator_id =$_SESSION["id"];

				$sql = "SELECT income_gameName,income FROM creator_income WHERE creator_id ='".$creator_id."'";
				$result=mysqli_query($con, $sql);

				while($rs=mysqli_fetch_row($result)) {
echo "<br>";
echo "<font size= '5'>";
echo "<ul style='list-style-type: square;'>";
echo "<li>";
                for($j=0; $j<mysqli_num_fields($result); $j++) {
				if($j!=0){
					echo "$";
				}
                echo "$rs[$j]";
				echo "&nbsp&nbsp&nbsp&nbsp";
                }				
echo "</li>";	
echo "</ul>";
echo "</font>";

                echo "</br>";
				}
				mysqli_free_result($result);
				mysqli_close($con);


?>
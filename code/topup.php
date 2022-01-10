<?php
//user 儲值每個遊戲的顯示
$con=require("config.php"); //引入資料庫

session_start(); 

$user_id =$_SESSION["id"];
				$sql = "SELECT topup_gameName,topup FROM user_topup WHERE user_id ='".$user_id."'";
				$result=mysqli_query($con, $sql);

				while($rs=mysqli_fetch_row($result)) {
echo "<br>";
echo "<font size= '5' color='white'>";
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


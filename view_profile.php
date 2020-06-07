<?php
session_start();
include "connect.php";
 
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{

	$u_id = $_GET['id'];
	
	$query = "SELECT name,branch,user_img FROM users WHERE id = '$u_id'";
	if($query_run = mysql_query($query))
	{
		$num_row = mysql_num_rows($query_run);
		if($num_row == 1)
		{
		
			$arr = mysql_fetch_assoc($query_run);
			echo '<div>';
				echo '<div style="text-align:center;">';
					echo '<img src="uploads/'.$arr['user_img'].'" style="border:1px solid black;padding:2px;width:300px;height:300px;" />';
				echo '</div>';
				echo '<br>';
				echo '<div style="text-align:center;">';
					echo '<div style="color:#3F64C8;font-family:sans-serif;font-weight:bold;font-size:20px;">'.$arr['name'].'</div>';
					echo '<br>';
					echo '<div style="color:#3F64C8;font-family:sans-serif;font-weight:bold;font-size:20px;">'.$arr['branch'].'</div>';
				echo '</div>';
			echo '</div>';
		}
		else
		{
			echo '<h3><center>Stop Playing with URL you idiot</center></h3>';
		}
	}




}
else
{
	echo '<h3><center>Kindly Login And try</center></h3>';
}




?>
<?php
session_start();
include "connect.php";

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{
	$br = $_POST['branch'];
	$query = "SELECT p_author,p_title,p_desc FROM posts WHERE author_branch = '$br'";
	if($query_run = mysql_query($query)){
		while($arr = mysql_fetch_assoc($query_run)){
		
			echo $arr['p_author'].' posted<br>';
			
			echo $arr['p_title'].'<br>';
				
			echo $arr['p_desc'];
			
			
/*			echo '<div id="rep_data" style="padding:5px;font-weight:bold;font-family:arial;text-decoration:underline;">Replies</div>';
			echo '<div id="r_box">';
				echo '<textarea placeholder="Reply..." style="resize:none;width:400px;height:80px;">';
					
				echo '</textarea><br>';
				echo '<input type="button" value="Reply" style="width:50px;font-weight:bold;margin-top:5px;"/>';
			echo '</div>';

			
		echo '</div>';
	*/	
		}	
	}
}else
{
	echo '<h2><center>Kindly login and try</center></h2>';
}


?>
<html>

<head>
	<link rel="stylesheet" href="m_m.css" type="text/css"/>
	<script src="jquery.min.js" type="text/javascript"></script>
	<script>
	
	</script>
	
</head>	
	
</html>
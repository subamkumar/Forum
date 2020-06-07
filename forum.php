<?php
include "connect.php"; 
session_start();

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{
	$user_id = $_SESSION['user_id'];
	
	//echo '<div id="big_wrapper">';
		echo '<div id="sidebar">';
			echo '<div id="logo-text">';
				echo '<img src="logo.png">';
			echo '</div>';

			$query = "SELECT user_img,name,branch FROM users WHERE id = '$user_id'";
			
			$query_run = mysql_query($query);
			
			$arr = mysql_fetch_assoc($query_run);
		
			echo '<img src="uploads/'.$arr['user_img'].'" id="user_img"/>';
			
			echo '<a href="edit_profile.php" style="margin-left:100px;">Change Pic</a>';
			
			echo '<div id="user_info">';
				echo '<div style="text-align:center;padding:5px;margin-top:10px;color:#3F64C8;">';
					echo '<h2>'.strtoupper($arr['name']).'</h2>';
				echo '</div>';
				echo '<div style="text-align:center;padding:5px;margin-top:10px;color:#3F64C8;">';
					echo '<h3>'.$arr['branch'].'</h3>';
				echo '</div>';
				echo '<div>';
					//echo '<h3>'.$arr['dob'].'</h3>';
				echo '</div>';
			echo '</div>';
			
		echo '</div>';
		
		echo '<div id="header">';
			echo '<ul class="branches">';
				echo '<li><div style="margin-top:15px;"><a href="'.$_SERVER['PHP_SELF'].'?q=Computer'.'" id="header-link">Computer</a></div></li>';
				echo '<li><div style="margin-top:15px;"><a href="'.$_SERVER['PHP_SELF'].'?q=IT'.'" id="header-link">IT</a></div></li>';
				echo '<li><div style="margin-top:15px;"><a href="'.$_SERVER['PHP_SELF'].'?q=Mechanical'.'" id="header-link">Mechanical</a></div></li>';
				echo '<li><div style="margin-top:15px;"><a href="'.$_SERVER['PHP_SELF'].'?q=Electrical'.'" id="header-link">Electrical</a></div></li>';
				echo '<li><div style="margin-top:15px;"><a href="'.$_SERVER['PHP_SELF'].'?q=ENTC'.'" id="header-link">ENTC</a></div></li>';
				echo '<li><div style="margin-top:15px;"><a href="'.$_SERVER['PHP_SELF'].'?q=Printing'.'" id="header-link">Printing</a></div></li>';
			echo '</ul>';
				echo '<a href="logout.php" id="logout_button">Logout</a>';
		echo '</div>';
		
		echo '<div id="mainbar">';
			echo '<input type="button" id="message_button" value="Show Message BOX"/>';
			echo '<div id="message_gen">';
				echo '<div id="erer" style="text-align:center;background-color:blue;color:white;border-radius:5px;font-weight:bold;"></div>';
				echo '<input type="text" placeholder="Message Title" name="message_title" id="message_title"/><br><br>';
				echo '<textarea id="message_area" placeholder="Message Desc" name="message_desc">';
				echo '</textarea>';
					if(isset($_GET['q'])){
						$branch_sel = $_GET['q'];
					}else if(empty($_GET['q']) || !isset($_GET['q'])){
					
						$querybranch_sel = "SELECT branch FROM users WHERE id = '$user_id'";
						if($querybranch_sel_run = mysql_query($querybranch_sel))
						{
							$res_name = mysql_result($querybranch_sel_run, 0, 'branch');
						}
						
						$branch_sel = $res_name;
					}
				echo '<input type="button" value="POST MESSAGE" name="submit_message" id="post_message" onclick="load(\''.$branch_sel.'\');"/>';
			echo '</div>';
			
			echo '<div id="n_m">';
			echo '</div>';
			
			echo '<div id="o_m">';
				
				$qu1 = "SELECT p_id,p_author,p_title,p_desc,DATE_FORMAT(p_time, '%T %D %M %Y') FROM posts WHERE author_branch = '$branch_sel' ORDER BY p_id DESC";
				
						if($qu1_run = mysql_query($qu1)){
							while($arr = mysql_fetch_assoc($qu1_run)){
							$aa = $arr['p_author'];
							$q2 = "SELECT name FROM users WHERE id = '$aa'";
							$q2_run2 = mysql_query($q2);
							$p_author = mysql_result($q2_run2, 0, 'name');
							echo '<div id="r_m_box">';
								echo '<div style="padding:5px;">';
									echo '<a href="view_profile.php?id='.$aa.'" id="author_link">'.$p_author.'</a>'.' <span style="font-family:sans-serif;">Posted On </span>';
									echo '<span style="font-weight:bold;">'.$arr['DATE_FORMAT(p_time, \'%T %D %M %Y\')'].'</span>'.'<br>';
								echo '</div>';
								echo '<div style="margin-top:5px;padding:5px;">';
									echo '<a href="showqueue.php?p_id='.$arr['p_id'].'" id="author_title">Title: '.$arr['p_title'].'</a>'.'<br>';
								echo '</div>';
							echo '</div>';
							}
						}
			echo '</div>';
			
		echo '</div>';
	//echo '</div>';
}
else
{
	echo '<h1><center>Kindly login and proceed</center></h1>';
}


?>				
<html>
	<head>
		<link rel="stylesheet" href="forum.css"/>
		<script src="jquery.min.js" type="text/javascript"></script>
		<script src="main.js" type="text/javascript"></script>
	</head>
</html>
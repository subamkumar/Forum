<?php
	session_start();
	include "connect.php";
?>

<?php
	if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id']))
	{
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
		echo '<div id="content">';
			if(isset($_GET['q']) && !empty($_GET['q']))
			{
				$branch = $_GET['q'];
				$qu1 = "SELECT p_id,p_author,p_title,p_desc,DATE_FORMAT(p_time, '%T %D %M %Y') FROM posts WHERE author_branch = '$branch' ORDER BY p_id DESC";
				if($qu1_run = mysql_query($qu1)){
				
					while($arr = mysql_fetch_assoc($qu1_run)){
							$aa = $arr['p_author'];
							$q2 = "SELECT name FROM users WHERE id = '$aa'";
							$q2_run2 = mysql_query($q2);
							$p_author = mysql_result($q2_run2, 0, 'name');
							echo '<div id="m_box">';
								echo '<div style="padding:5px;">';
									echo '<a href="view_profile.php?id='.$aa.'" id="author_link">'.$p_author.'</a>'.' <span style="font-family:sans-serif;">Posted On </span>';
									echo '<span style="font-weight:bold;">'.$arr['DATE_FORMAT(p_time, \'%T %D %M %Y\')'].'</span>'.'<br>';
								echo '</div>';
								echo '<div style="margin-top:5px;padding:5px;">';
									echo '<a href="admindesc.php?p_id='.$arr['p_id'].'" id="author_title">Title: '.$arr['p_title'].'</a>'.'&nbsp&nbsp&nbsp&nbsp';
									echo '<a href="'.$_SERVER['PHP_SELF'].'?d='.$arr['p_id'].'">Delete</a>';
								echo '</div>';
							echo '</div>';
							}
				}

			}else
			{
				echo "<center><div>Click on the respective branches to see messages</div></center>";
			}
		echo '</div>';
	}
	else
	{
		echo "<center><h1>You are not logined</h1></center>";
	}
?>

<?php
	if(isset($_GET['d']) && !empty($_GET['d']))
	{
		$thread = $_GET['d'];
		$b1 = $_GET['q'];
		$q_del = "DELETE FROM posts WHERE p_id = '$thread'";
		mysql_query($q_del);
		header('Location: modify.php?q=Computer');
	}
?>
<html>
	<head>
		<link rel="stylesheet" href="admin.css"/>
		<script src="jquery.min.js" type="text/javascript"></script>
		<script src="main.js" type="text/javascript"></script>
	</head>
</html>
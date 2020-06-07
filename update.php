<?php
session_start();
include "connect.php";

	$user_id = $_SESSION['user_id'];
	
	$query1 = "SELECT name FROM users WHERE id = '$user_id'";
	$query_run1 = mysql_query($query1);
	
	$p_author = mysql_result($query_run1, 0, 'name'); 
	$title = $_POST['title'];
	$branch = $_POST['branch'];
	$desc = $_POST['desc'];

		$date = time();
		$time = date('h:i:s',$date);
		$date = date('Y-m-d',$date);
		$date1 = getdate();
	$p_time = $date.' '.$time;
	
	$query = "INSERT INTO posts(p_id,p_title,p_desc,p_time,p_author,author_branch) VALUES('', '$title', '$desc', '$p_time', '$user_id', '$branch')";
	if($query_run = mysql_query($query)){
				$q1 = "SELECT p_id FROM posts WHERE p_author = '$user_id' ORDER BY p_id DESC";
				$q1_r = mysql_query($q1);
				$p__id = mysql_result($q1_r, 0, 'p_id');

		echo '<div style="padding:5px;">';
			echo '<a href="view_profile.php?id='.$user_id.'" id="author_link">'.$p_author.'</a>'.' <span style="font-family:sans-serif;">Posted On </span>';
			echo '<span style="font-weight:bold;">'.$time.' '.$date1['mday'].'th '.$date1['month'].$date1['year'].'</span>'.'<br>';
		echo '</div>';
		echo '<div style="margin-top:5px;padding:5px;">';
			echo '<a href="showqueue.php?p_id='.$p__id.'" id="author_title">Title: '.$title.'</a>'.'<br>';
		echo '</div>';

	}

	
	
?>
<html>
	<head>
		<link rel="stylesheet" href="forum.css"/>
	</head>
</html>
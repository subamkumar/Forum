<?php
include "connect.php";
session_start();

$user_id = $_SESSION['user_id'];
	$query1 = "SELECT name FROM users WHERE id = '$user_id'";
	$query_run1 = mysql_query($query1);
	
	$p_author = mysql_result($query_run1, 0, 'name'); 

	$reply = $_POST['rep'];
	$postid = $_POST['id'];
	
		$date = time();
		$time = date('h:i:s',$date);
		$date = date('Y-m-d',$date);
		$date1 = getdate();

	$p_time = $date.' '.$time;
	$query = "INSERT INTO reply(r_id,p_id,r_author,r_desc,r_time) VALUES('', '$postid', '$user_id', '$reply','$p_time')";
	if($query_run = mysql_query($query)){
		
		
		echo '<div >';
			echo '<a href="view_profile.php?id='.$user_id.'" id="author_l">'.$p_author.'</a>'.' <span style="font-family:sans-serif;font-size:13px;">Replied On </span>';
			echo '<span style="font-weight:bold;font-size:14px;">'.$time.' '.$date1['mday'].'th '.$date1['month'].' '.$date1['year'].'</span>'.'<br>';
		echo '</div>';
		echo '<div style="margin-top:2px;padding:5px;">';
			echo '<div id="author_desc" style="width:500px;word-wrap: break-word;">'.$reply.'</div>'.'<br>';
		echo '</div>';	
	}
?>
<html>
	<head>
		<link rel="stylesheet" href="showqueue.css"/>
	</head>
</html>
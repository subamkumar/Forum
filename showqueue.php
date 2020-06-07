<?php
include "connect.php";
session_start();

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{
	$p_id = $_GET['p_id'];
	if(isset($p_id) && !empty($p_id))
	{
		$query = "SELECT p_author,p_title,p_desc,DATE_FORMAT(p_time, '%T %D %M %Y') FROM posts WHERE p_id = '$p_id'";
		if($query_run = mysql_query($query))
		{
			$num_row = mysql_num_rows($query_run);
			if($num_row>0)
			{
				echo '<div id="main_box">';
					echo '<div>';
						while($arr = mysql_fetch_assoc($query_run)){
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
									echo '<div id="a_title"><span style="color:black;">Title:</span> '.$arr['p_title'].'</div>'.'<br>';
								echo '</div>';
								echo '<div style="margin-top:5px;padding:5px;">';
									echo '<span style="color:black;font-weight:bold;font-family:sans-serif;">Description:</span><br><br>';
									echo '<div id="a_desc"> '.$arr['p_desc'].'</div>'.'<br>';
								echo '</div>';
									echo '<div style="color:#3F64C8;margin-left:10px;text-decoration:underline;font-weight:bold;font-size:18px;">Replies</div>';
									echo '<br>';
								echo '<div id="reply_box">';
									echo '<div id="o_reply" style="margin-left:10px;">';
										$qu1 = "SELECT r_author,r_desc,DATE_FORMAT(r_time, '%T %D %M %Y') FROM reply WHERE p_id = '$p_id'";
										if($qu1_run = mysql_query($qu1))
										{
											while($arr = mysql_fetch_assoc($qu1_run))
											{
													$aa = $arr['r_author'];
													$q2 = "SELECT name FROM users WHERE id = '$aa'";
													$q2_run2 = mysql_query($q2);
													$r_author = mysql_result($q2_run2, 0, 'name');
													echo '<div >';
														echo '<a href="view_profile.php?id='.$aa.'" id="author_l">'.$r_author.'</a>'.' <span style="font-family:sans-serif;font-size:13px;">Replied On </span>';
														echo '<span style="font-weight:bold;font-size:14px;">'.$arr['DATE_FORMAT(r_time, \'%T %D %M %Y\')'].'</span>'.'<br>';
													echo '</div>';
													echo '<div style="margin-top:2px;padding:5px;width:500px;">';
													echo '<div id="author_desc" style="width:500px;word-wrap:break-word;">'.$arr['r_desc'].'</div>'.'<br>';
													echo '</div>';
											}
										}else{
											echo 'not kk';
										}
									echo '</div>';
									echo '<div id="n_reply" style="margin-left:10px;">';
									
									echo '</div>';
									
								echo '</div>';
								echo '<div id="reply_m_box">';
									echo '<textarea id="reply_area" placeholder="Reply...">';
									echo '</textarea>';
									echo '<br><br>';
									echo '<input type="button" value="Reply" id="reply_button" onclick="reply('.$p_id.');"/>';
								echo '</div>';
							echo '</div>';
							}
					echo '</div>';
				echo '</div>';
			}else{
				echo 'INVALID POST';
			}
		}else{
			echo 'BAD REQUEST';
		}
	}

}else{
	echo 'Kindly Login and Try';
}
?>
<html>
	<head>
		<link rel="stylesheet" href="showqueue.css" type="text/css"/>
		<link rel="stylesheet" href="forum.css" type="text/css"/>
		<script src="jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			function reply(id)
			{
				var rep = $('#reply_area').val();
				rep = rep.replace(/\r?\n/g, '<br />');
				if(rep == '')
				{
					alert('Must write something on the reply box');
				}else{
					$.post('reply.php',{rep:rep, id:id}, function(data){
						if(data)
						{
						var mydiv = document.createElement('div');
									mydiv.setAttribute("id","rep_box");
									mydiv.innerHTML = data;
									mydiv.setAttribute("style","margin-top:5px;border-radius:5px;width:500px;");
									
									var div1 = document.getElementById('n_reply');
									div1.appendChild(mydiv);
									document.getElementById('reply_area').value = "";
						}
						
					});
				}
			}
		</script>
	</head>
</html>
<?php
include "connect.php";

session_start();
$current = $_SERVER['PHP_SELF'];
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
		
		$query = "SELECT user_img FROM users WHERE id = '$user_id'";
		
		$query_run = mysql_query($query);
		
		$res = mysql_result($query_run,0,'user_img'); 
		
		if(isset($_POST['submit']))
		{
			if($res == 'face.jpg')
			{
				$name = $_FILES['img']['name'];
				$tmploc = $_FILES['img']['tmp_name'];
				if(!preg_match("/\.(gif|jpg|png)$/i",$name))
				{
					echo '<div style="text-align:center;background-color:#ff0040;color:white;font-weight:bold;">Uploded files should be of type JPEG,PNG,GIF Only</div>';
				}
				$size = $_FILES['img']['size'];
				if($size > 5242880)
				{
					echo '<div style="text-align:center;background-color:#ff0040;color:white;font-weight:bold;">Uploded files size is greater than 5MB</div>';
					echo '<a href="'.$current.'" style="margin-left:700px;">Try Again</a>';
					unlink($tmploc);
					exit();
				}
				$uplad_suc = move_uploaded_file($tmploc,"uploads/$name");
				if($uplad_suc == true)
				{
					echo '<div style="text-align:center;background-color:#008000;color:white;font-weight:bold;">Uploded Successfully</div>';
					echo '<div style="text-align:center;">';			
						echo '<img src="uploads/'.$name.'" style="border:2px solid black;background-color:rgba(0,0,0,0.3);padding:5px;height:200px;width:200px;" />';
					echo '</div>';
					//echo '<a href="'.$current.'" style="margin-left:670px;">Try Again</a>';
					echo '<div style="text-align:center;margin-top:20px;"><a href="forum.php">Back to forum</a></div>';
				}else
				{
					echo '<div style="text-align:center;background-color:#ff0040;color:white;font-weight:bold;">Uplodation failed</div>';
				}
				$query1 = "UPDATE users SET user_img = '$name' WHERE id = '$user_id'";
				
				mysql_query($query1);
				exit();
				
			}
			else
			{
				$name = $_FILES['img']['name'];
				$tmploc = $_FILES['img']['tmp_name'];
				if(!preg_match("/\.(gif|jpg|png)$/i",$name))
				{
					echo '<div style="text-align:center;background-color:#ff0040;color:white;font-weight:bold;">Uploded files should be of type JPEG,PNG,GIF Only</div>';
				}
				$size = $_FILES['img']['size'];
				if($size > 1242880)
				{
					echo '<div style="text-align:center;background-color:#ff0040;color:white;font-weight:bold;">Uploded files size is greater than 5MB</div>';
					echo '<a href="'.$current.'" style="margin-left:700px;">Try Again</a>';
					unlink($tmploc);
					exit();
				}
				$uplad_suc = move_uploaded_file($tmploc,"uploads/$name");
				if($uplad_suc == true)
				{
					echo '<div style="text-align:center;background-color:#008000;color:white;font-weight:bold;">Uploded Successfully</div>';
					echo '<div style="text-align:center;">';			
						echo '<img src="uploads/'.$name.'" style="border:2px solid black;background-color:rgba(0,0,0,0.3);padding:5px;height:200px;width:200px;" />';
					echo '</div>';
					//echo '<a href="'.$current.'" style="margin-left:670px;">Try Again</a>';
					echo '<div style="text-align:center;margin-top:20px;"><a href="forum.php">Back to forum</a></div>';
				}else
				{
					echo '<div style="text-align:center;background-color:#ff0040;color:white;font-weight:bold;">Uplodation failed</div>';
					$query1 = "UPDATE users SET user_img = 'face.jpg' WHERE id = '$user_id'";
				
					mysql_query($query1);
					echo '<div style="text-align:center;margin-top:20px;"><a href="forum.php">Back to forum</a></div>';
				}
				
				unlink("uploads/$res");
				
				$query1 = "UPDATE users SET user_img = '$name' WHERE id = '$user_id'";
				
				mysql_query($query1);
				exit();
			}
		}else{
			echo '<div style="text-align:center;background-color:#ff0040;color:white;font-weight:bold;">Upload something</div>';
		}
	
	
		echo '<div style="text-align:center;">';
			echo '<div style="text-align:center;">';			
				echo '<img src="uploads/'.$res.'" style="border:2px solid black;background-color:rgba(0,0,0,0.3);padding:5px;height:200px;width:200px;" />';
			echo '</div>';
			echo '<div>';
			echo '<form enctype="multipart/form-data" method="post" action="'.$current.'">';
				echo '<input type="file" id="img" name="img" style="margin-left:80px;margin-top:20px;"/><br><br>';
				echo '<input type="submit" name="submit" value="Upload" style="padding:5px;font-weight:bold;"/>';
			echo '</form>';
			echo '</div>';
		echo '</div>';
		
		echo '<div style="text-align:center;"><a href="forum.php">Back to forum</a></div>';
	}else
	{
		echo '<h1><center>Kindly login and proceed</center></h1>';
	}
?>

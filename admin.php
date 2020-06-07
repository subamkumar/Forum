<?php
	session_start();
	include "connect.php";
?>

<?php

	if(isset($_POST['submit']) && isset($_POST['admin']) && isset($_POST['pass']))
	{
		if(!empty($_POST['admin']) && !empty($_POST['pass']))
		{
			$user1 = stripslashes($_POST['admin']);
			$pass1 = stripslashes($_POST['pass']);
			$query1 = "SELECT id FROM admin WHERE username = '$user1' AND password = '$pass1'";
			
			if($res = mysql_query($query1))
			{
				if($row = mysql_num_rows($res))
				{
					if($row == 1)
					{
						$user_id = mysql_result($res,0,'id');
						$_SESSION['admin_id'] = $user_id;
								  
						header('Location: modify.php');
					}
				}
				else
				{
					echo "<center><div style=\"background-color:red;color:white;font-weight:bold;width:500px;border-radius:5px;\">Invalid Username or Password</div></center>";
				}
			}
		}
		else
		{
			echo "<center><div style=\"background-color:red;color:white;font-weight:bold;width:500px;border-radius:5px;\">Must Enter the Username and Password both</div></center>";
		}
	}
	

?>
<div>
	<center>
	<h1 style="font-family:Comic Sans MS;text-decoration:underline;">Admin Page</h1>
	</center>
</div>
<center>
<div style="margin-top:100px;border:2px solid black;padding:8px;width:300px;">
	
	<form action="admin.php" method="post">
		<input type="text" name="admin" style="width:200px;padding:5px;color:black;font-weight:bold;" placeholder="Username..."/><br><br>
		<input type="password" name="pass" style="width:200px;padding:5px;color:black;font-weight:bold;" placeholder="Password..."/><br><br>
		<input type="submit" name="submit" style="width:100px;font-weight:bold;" value="LogIn"/>
	</form>
	
</div>
</center>
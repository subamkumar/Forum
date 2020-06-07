<!doctype html>
<?php
	session_start();
	include "connect.php";
?>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="css/main.css"/>
<link rel="stylesheet" type="text/css" href="css/slide.css"/>

<script type="text/javascript">
	var imagecount = 1;
	var total = 6;
	
	function slide(x){
		var image =document.getElementById('img');
		
		imagecount = imagecount + x;
		if(imagecount > total){imagecount = 1;}
		if(imagecount < 1){imagecount = total;}
		image.src = "img" + imagecount + ".jpg";
	}
	
	window.setInterval(function slideA(){
		var image =document.getElementById('img');
		
		imagecount = imagecount + 1;
		if(imagecount > total){imagecount = 1;}
		if(imagecount < 1){imagecount = total;}
		image.src = "img" + imagecount + ".jpg";
	},3000);	
</script>

<title>Home Page - PVG Forum</title>
</head>

<body>
	<div id="big_wrapper">
		<header id="logo">
    		<h1><center>PVG FORUM</center></h1>
    	</header>
    
    	<!--<nav id="menu">
        <hr>
    		<ul>
        		<li>Home</li>
	            <li>Topics</li>
    	        <li>About</li>
        	</ul>
        <hr>
	    </nav>-->
		
		<br>
        
        <section id="slide_show"	onload="slideA()">
        	
                <img src="img6.jpg" id="img"/>
                        <div id="left_arrow"><img src="arrow_left.png" class="left" onclick="slide(-1)"/></div>
                        <div id="right_arrow"><img src="arrow_right.png" class="right" onclick="slide(1)"/></div>
        	
        </section>
        
        <br><br>
    
		
    	<section id="login">
			<?php
				if(isset($_POST['username1']) && isset($_POST['password1']))
				{
					if(!empty($_POST['username1']) && !empty($_POST['password1']))
					{
						$user1 = stripslashes($_POST['username1']);
						$pass1 = md5(stripslashes($_POST['password1']));
						$query1 = "SELECT id FROM users WHERE username = '$user1' AND password = '$pass1'";
						
						if($res = mysql_query($query1))
						{
							if($num_row = mysql_num_rows($res))
							{
								if($num_row == 1)
								{
									$user_id = mysql_result($res,0,'id');
									$_SESSION['user_id'] = $user_id;
								  
									header('Location: forum.php');
								}
							}
							else
							{
								echo '<div id="Info-box">Invalid Username/Password</div>';
							}
						}
						else
						{
							echo '<div id="Info-box">Login Failed</div>';
						}
					}
					else
					{
						echo '<div id="Info-box">Must Provide Username/Password</div>';
					}
				}
			?>
    		<header>
        		<h3>Already a member !</h3>
                <hr>
                <br>
	        </header>
            <div id="input_box">
			
				<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
            	Enter User Name
            	<input type='text' name='username1'/>
                <br><br><br>
                Enter Password
                <input type='password' name='password1'/>
                <br><br>
                <input type='submit' value='Login'/>
				</form>
			
			</div>	
    	</section>
    
   		<section id="register">
                <?php
                
                if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['branches']) && isset($_POST['password']) && isset($_POST['confirm_pass'])){
                        if(!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['branches']) && !empty($_POST['password']) && !empty($_POST['confirm_pass'])){
                                $name=stripslashes($_POST['name']);
								$branch = stripslashes($_POST['branches']);
                                $username = stripslashes($_POST['username']);
                                $email = stripslashes($_POST['email']);
                                $password = stripslashes($_POST['password']);
                                $confirm_pass = stripslashes($_POST['confirm_pass']);
     
                                if($password != $confirm_pass){
                                        echo '<div  id="Info-box">Password Didn\'t Match!Please Try again</div>';
                                }
                                else{
                                        $pass = md5($password);
										
										$qu = "SELECT username FROM users WHERE username = '$username'";
										
										if($qu_run = mysql_query($qu)){
											$num_r = mysql_num_rows($qu_run);
											if($num_r>0){
												echo '<div  id="Info-box">Username Not Available</div>';
											}else{
											
													$query = "INSERT INTO users(id,name,branch,username,password,user_img) VALUES('', '$name', '$branch', '$username', '$pass', 'face.jpg')";
										
													if(mysql_query($query))
													{
														echo '<div  id="message-box">Registration Successful</div>';
													}
													else
													{
														echo '<div  id="Info-box">Registration Failed</div>';
													}
											}
										}
                                }
                        }
                        else{
                                echo '<div id="Info-box">All Fields Are Mandatory</div>';
                        }
                }
                ?>
    		<header>	
        		<h3>New Here !</h3>
                <hr>
                <br>
	        </header>
            <div id="input_box">
                      
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            	Enter Name
		<input type="text" name="name"/>
		<br><br><br>
            	Enter User Name
            	<input type="text" name="username"/>
				<br><br><br>
				Enter Branch
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<select style="width:150px;padding:5px;" name="branches">
					<option value="">Select Branch</option>
					<option value="Computer">Computer</option>
					<option value="IT">IT(Information Technology)</option>
					<option value="Mechanical">Mechanical</option>
					<option value="ENTC">ENTC(Electronic & Telecommunication)</option>
					<option value="Electrical">Electrical</option>
					<option value="Printing">Printing</option>
				</select>
                <br><br><br>
                Enter your e-mail
                <input type="text" name="email"/>
   				<br><br><br>             
                Enter Password
                <input type="password" name="password"/>
                <br><br><br>
                Confirm Password
                <input type="password" name="confirm_pass"/>
                <br><br>
                <input type="submit" value="Register"/>            
             </form>  
            
            
            </div>          
    	</section>
        
        <footer id="web_footer">
           	<p>Protected Under Copyright Act 2016-2017</p>
       	</footer>           
	</div>     
   
</body>
</html>
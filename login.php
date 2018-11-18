<!DOCTYPE HTML> 
<html> <head> <title>LogIn</title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
	<link rel="stylesheet" type="text/css" href="signuperror.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
 <div class="box"> 
		<h2>Login</h2>
		<form action="includes/login.inc.php" method="POST">
			<?php
			if (isset($_GET['error'])){
				if($_GET['error']== "wrongpwd"){
					echo '<p class="signuperror">Login Denied!</p>';

				}
			}
				?>
			<div class="inputBox">
				<input type="email"  name="email" required="">
				<label >Email</label>
			</div>
			<div class="inputBox">
				<input type="password" name="pwd" required="">
				<label>Password</label>
				
			</div>
			<input type="submit" name="login-submit" value="Submit" >
			<h4 class="label1"><a href="signup.php">Not a User? Sign Up</h4></a>

		</form>
		
	</div>
		

		</body> 
		</html> 
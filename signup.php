<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Form</title>
	<link rel="stylesheet" type="text/css" href="signupstyle.css">
	<link rel="stylesheet" type="text/css" href="signuperror.css">
</head>
<body style="font-family: sans-serif;">

	<div class="reg">
<form id="reg" method="POST" action="includes/signup12.inc.php">
			<h2>Register here</h2>
		<?php
		if (!empty($_GET)) {
		if (isset($_GET['error'])){
				if($_GET['error']== "emptyfields"){
					echo '<p class="signuperror">Fill in all fields!</p>';

				}
				else if($_GET['error']=="invalidemail"){
					echo '<p class="signuperror">Invalid email!</p>';
				
				}
				else if($_GET["error"] == "usertaken") {
					echo '<p class ="signuperror"> Email already taken!</p>';
				}
				else if($_GET["error"] == "passwordcheck"){
					echo '<p class ="signuperror"> Password donot match!</p>';
				}
			}
			else if($_GET["signup"] == "success"){
				echo '<p class ="signuperror"> SignUp Success!</p>';
			}
}
			?>
		
				<div class="inputBox">
			
			<input type="text"  name="name" autocomplete="off" required="" ><br><br>
			<label>Name</label><br>
		</div>
		<div class="inputBox">
			
			<input type="email"  name="email" required=""><br><br>
			<label>Email</label><br>
		</div>
		<div class="inputBox">
			
			<input type="password"  name="pass" required=""><br><br>
			<label>Password</label><br>
		</div>
		<div class="inputBox">
			
			<input type="password"  name="passrepeat" required=""><br><br>
			<label>Re-type Password</label><br>
		</div>
		<input type="submit" name="signup-submit" value="Register">
		<button type="submit" name="submit" onclick="location.href='login.php'">LOGIN</button>


		</form>
	</div>

</body>
</html>
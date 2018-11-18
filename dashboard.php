<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="dashboard1.css">
	<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
</head>

<body>
	<header>
		<nav>
			 <ul class="main-nav">
				 	<li>
				 		<a href="#">Home</a>
				 	</li>
				 	<li><a href="about.html">About</a></li>
				 	<li><a href="faq.html">FAQ?</a></li>
				 	<li><a href="contact.html">Contact US</a></li>
				 	
				 	<?php
				 	if (isset($_SESSION['Email'])){
					 	echo '<li><form action="includes/logout.inc.php" method="POST">
			<input type="submit" name="logout-submit" value="Logout"></li>	
			
		</form>';
	}
	?>
				 </ul>
				</nav>
			<b><a href="be.php" class="btn btn-button1">B.E.</a></b>
			<b><a href="#" class="btn btn-button2">M.B.A</a></b>
			<b><a href="#" class="btn btn-button3">B.ARCH</a></b>

		</header>

</body>
</html>
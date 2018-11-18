<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Financial Accounting System</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header>
		<nav>
			<div class="row clearfix">
				<img src="images/transparentFASnew.png" class="logo">
				 <ul class="main-nav animated slideInDown">
				 	<li>
				 		<a href="#">Home</a>
				 	</li>
				 	<li><a href="about.html">About</a></li>
				 	<li><a href="faq.html">FAQ?</a></li>
				 	<li><a href="contact.html">Contact us</a></li>
				 </ul>
				 <a href="#" class="mobile-icon" id="check-class" onclick="slideshow()"> <i class="fa fa-bars"></i></a>
				
			</div>
		</nav>

		<div class="main-content-header" style="font-family: 'Flamenco',cursive;">
		<h1>WELCOME TO MY <span class="colorchange">DBMS MINI PROJECT</span>.<br>
			CLICK LOGIN OR SIGN UP TO CONTINUE.</h1>

			<a href="login.php" class="btn btn-one">LOGIN</a>
			<a href="signup.php" class="btn btn-two">SIGNUP</a>
			
		</div>
	</header>
	<script type="text/javascript">
		
		function slideshow(){
			var x = document.getElementById('check-class');
			if (x.style.display == "none"){
				x.style.display="block";
			}else {
				x.xtyle.display="none";
			}

		}

	</script>

</body>
</html>
<?php
session_start();
if($_SESSION['status']!="Active")
{
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>BE</title>
	<link rel="stylesheet" type="text/css" href="be2.css">
	<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
				</header>

				<!-- <a href="AddStudent.php" style="" class="btn btn-button1">ADD STUDENT</a>
			<a href="delete.php" class="btn btn-button2">DELETE STUDENT</a>
			<a href="Viewstudent.php" class="btn btn-button3">VIEW </a>
			<a href="update.php" class="btn btn-button3">UPDATE</a> -->


			<button onclick="location.href='AddStudent.php'" style="outline: none;" class="btn btn-button1"><i class="fa fa-plus-square" aria-hidden="true" style="width: 40px; "></i>ADD STUDENT</button>

			<button onclick="location.href='beforeprintreceipt.php'" style="outline: none;" class="btn btn-button1"><i class="fa fa-print" aria-hidden="true" style="width: 30px;"></i>Print Receipt</button>

			<button onclick="location.href='delete.php'" style="outline: none;" class="btn btn-button1"><i class="fa fa-trash" style="width: 40px; "></i>DELETE STUDENT</button>
			<button onclick="location.href='Viewstudent.php'" style="outline: none;" class="btn btn-button1"><i class="fa fa-info" aria-hidden="true" style="width: 40px;"></i>VIEW STUDENT</button>
			<button onclick="location.href='update.php'" style="outline: none;" class="btn btn-button1"><i class="fa fa-wrench" aria-hidden="true" style="width: 40px;"></i>UPDATE STUDENT</button>
	
</body>
</html>
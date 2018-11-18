<!DOCTYPE html>
<html>
<head>
	<title>Add Student</title>
	<link rel="stylesheet" type="text/css" href="test1.css">
	
	<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">

</head>
<body style="padding: 20px">
	<header>

	<nav class="main-nav">
		
		 <ul >
				 	<li>
				 		<a href="#">Home</a>
				 	</li>
				 	<li><a href="about.html">About</a></li>
				 	<li><a href="faq.html">FAQ?</a></li>
				 	<li><a href="contact.html">Contact us</a></li>
				 </ul>

	</nav>
	<div class="tabcontainer">
			<div class="buttonContainer">
				<button onclick="showPanel(0,'#FFA500')">Student Details </button>
				<button onclick="showPanel(1,'#FFA500')"> Academic Fees </button>
				<button onclick="showPanel(2,'#FFA500')"> Hostel Fees </button>
				<button onclick="showPanel(3,'#FFA500')">Examination Fees </button>
				<button onclick="showPanel(4,'#FFA500')">Transportaion Fees </button>
				
		</div>
		 <div class ="tabPanel"> <div>
                <label for="username">First Name</label>
                <input id="user_first_name" name="user[first_name]" size="30" type="text" />

            </div>

            <div>
                <label for="name">Last Name</label>
                <input id="user_last_name" name="user[last_name]" size="30" type="text" />
            </div>
</div>
		 <div class ="tabPanel"> Academic Fees: Content</div>
		 <div class ="tabPanel"> Hostel Fees: Content</div>
		 <div class ="tabPanel"> Examination Fees: Content</div>
		 <div class ="tabPanel"> Transportaion Fees: Content</div>

</div>

<script src="myScript.js"></script>
</header>



</body>
</html>
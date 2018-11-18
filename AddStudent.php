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
	<title>Add Student</title>
	<link rel="stylesheet" type="text/css" href="ad.css">
	
	
	<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">

</head>
<body >
	<header>

	<nav class="main-nav">
		
		 <ul >
				 	<li>
				 		<a href="be.php">Home</a>
				 	</li>
				 	<li><a href="about.html">About</a></li>
				 	<li><a href="faq.html">FAQ?</a></li>
				 	<li><a href="contact.html">Contact us</a></li>
          <li><a href="be.php">BACK</a></li>
				 	<?php
				 	if (isset($_SESSION['Email'])){
					 	echo '<li><form action="includes/logout.inc.php" method="POST">
			<input type="submit" name="logout-submit" value="Logout"></li>	
			
		</form>';
	}
	?>
				 </ul>

	</nav><br><br><br><br><br><br><br>
	<div class="tabcontainer">
			<div class="buttonContainer">
				<button    onclick="showPanel(0,'#')">Student Details </button>
				<button    onclick="showPanel(1,'#')"> Academic Fees </button>
				<button     onclick="showPanel(2,'#')"> Hostel Fees </button>
				<button    onclick="showPanel(3,'#')">Examination Fees </button>
				<button    onclick="showPanel(4,'#')">Transportaion Fees </button>

		</div>
		 <div class ="tabPanel"> <form method="POST" enctype="multipart/form-data" action="includes/Studentdetails.inc.php">
<ul class="form-style-1">
    <li><label>USN <span class="required">*</span></label><input type="text" style="font-family: sans-serif;" name="USN" class="field-divided" placeholder="USN" required maxlength="10" pattern="^[1][Dd][Tt]\d\d[a-zA-Z][A-Za-z]\d\d\d$" /> </li>
    
       <li><label>NAME <span class="required">*</span></label>
        <input type="text" style="font-family: sans-serif;" name="Name" class="field-long" placeholder="Name" required pattern="[A-Za-z\s]*$" />
    </li>
    <li>
        <label>BRANCH</label>
        <select style="font-family: sans-serif;" name="Branch" style="font-family: sans-serif;" class="field-select">
        <option style="font-family: sans-serif;" value="Information Science">Information Science</option>
        <option style="font-family: sans-serif;" value="Computer Science">Computer Science</option>
        <option style="font-family: sans-serif;" value="Electronics and Communication">Electronics and Communication</option>
        <option style="font-family: sans-serif;" value="Mechanical">Mechanical</option>
        <option style="font-family: sans-serif;" value="Civil">Civil</option>
        <option style="font-family: sans-serif;" value="Electrical">Electrical</option>
        </select>
    </li>
    <li>
        <label>MOBILE<span class="required">*</span></label>
        <input name="Phone" style="font-family: sans-serif;" id="field5" class="field-textarea" required maxlength="10" pattern="^\d*$" >
    </li>
    <li>
        <label>DOB<span class="required">*</span></label>
        <input type="Date" style="font-family: sans-serif;" name="DOB" id="field5" class="field-textarea">
    </li>
  <!--   <li>
        <label1>Gender<span class="required">*</span></label>
       <input type="radio" name="gender" value="male" checked> Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
    </li> -->
     <!-- <li>
        <label1>Address<span class="required">*</span></label>
        <TEXTAREA name="field5" id="field5" class="field-textarea1"></TEXTAREA>
    </li> -->
     <li>
        <label>HOSTELLITE<span class="required">*</span></label>
       <input type="radio" name="Hostellite" value="Yes" checked> Yes<br>
  <input type="radio" style="font-family: sans-serif;" name="Hostellite" value="No"> No<br>
    </li>
   <li><label>IMAGE</label> <input type="file" name="image" required=""></li>
    <li>
        <input type="submit" name="form-submit" value="Submit" />
    </li>
</ul>
</form></div>
		 <div class ="tabPanel"> <form method="POST" action="includes/Academicfee.inc.php">
<ul class="form-style-1">
    <li><label>USN <span class="required">*</span></label><input type="text" style="font-family: sans-serif;" name="USN" class="field-divided" placeholder="USN" required maxlength="10" pattern="^[1][Dd][Tt]\d\d[a-zA-Z][A-Za-z]\d\d\d$" /> </li>
    
       <li><label>RECEIPT NO. <span class="required">*</span></label>
        <input type="text" style="font-family: sans-serif;" name="Receipt_no" class="field-long" placeholder="Receipt no." />
    </li>
    <li>
        <label>QUOTA</label>
        <select name="Quota" style="font-family: sans-serif;" class="field-select">
        <option style="font-family: sans-serif;" value="COMEDK">COMEDK</option>
        <option style="font-family: sans-serif;" value="DSAT">DSAT</option>
        <option style="font-family: sans-serif;" value="CET">CET</option>
        <option style="font-family: sans-serif;" value="MANAGEMENT">MANAGEMENT</option>
        
        </select>
    </li>
    <li>
        <label>Tution Fees<span class="required"></span></label>
        <input name="first" style="font-family: sans-serif;" id="field5" class="field-textarea" placeholder="₹">
    </li>
    <li>
        <label>Developement Fees<span class="required"></span></label>
        <input type="text" style="font-family: sans-serif;" name="second" id="field5" class="field-textarea"placeholder="₹">
    </li>
  <li>
  	<label>Library Fees<span class="required"></span></label>
        <input type="text" style="font-family: sans-serif;" name="third" id="field5" class="field-textarea"placeholder="₹"placeholder="₹">
  </li>
 <!--  <li>
  	<label>Total<span class="required"></span></label>
        <input type="text" style="font-family: sans-serif;" name="fourth" id="field5" class="field-textarea"placeholder="₹">
  </li> -->
    <li>
        <input type="submit" name="form-submit" value="Submit" />
    </li>
</ul>
</form></div>
		 <div class ="tabPanel"> <form method="POST" action="includes/hostelfee.inc.php">
<ul class="form-style-1">
    <li><label>USN <span class="required">*</span></label><input type="text" style="font-family: sans-serif;" name="USN" class="field-divided" placeholder="USN" required maxlength="10" pattern="^[1][Dd][Tt]\d\d[a-zA-Z][A-Za-z]\d\d\d$" /> </li>
    
       <li><label>HOSTEL RECEIPT NO. <span class="required">*</span></label>
        <input type="text" style="font-family: sans-serif;" name="hostel_receipt_no" class="field-long" placeholder="Receipt no." required="" />
    </li>
   
    <li>
        <label>MESS FEE<span class="required"></span></label>
        <input name="mess_fee" style="font-family: sans-serif;" id="field5" class="field-textarea"placeholder="₹">
    </li>
    <li>
        <label>ACCOMODATION FEE<span class="required"></span></label>
        <input type="text" style="font-family: sans-serif;" name="accomodation_fee" id="field5" class="field-textarea"placeholder="₹">
    </li>
  <li>
  	<label>SECURITY FEE<span class="required"></span></label>
        <input type="text" style="font-family: sans-serif;" name="security_fee" id="field5" class="field-textarea"placeholder="₹">
  </li>
 <!--  <li>
  	<label>Total<span class="required"></span></label>
        <input type="text" style="font-family: sans-serif;" name="room_no" id="field5" class="field-textarea">
  </li> -->
    <li>
        <input type="submit" name="form-submit" value="Submit" />
    </li>
</ul></form></div>
		 <div class ="tabPanel"> <form method="POST" action="includes/examinationfee.inc.php">
<ul class="form-style-1">
    <li><label>USN <span class="required">*</span></label><input type="text" style="font-family: sans-serif;" name="USN" class="field-divided" placeholder="USN" required maxlength="10" pattern="^[1][Dd][Tt]\d\d[a-zA-Z][A-Za-z]\d\d\d$" /> </li>
    
       <li><label>REGISTRATION NO. <span class="required">*</span></label>
        <input type="text" style="font-family: sans-serif;" name="Registration_no" class="field-long" placeholder="Receipt no." required="" />
    </li>
   
    <li>
        <label>AMOUNT<span class="required"></span></label>
        <input name="Amount" style="font-family: sans-serif;" id="field5" class="field-textarea" placeholder="₹">
    </li>
    <li>
        <label>BACKLOG<span class="required"></span></label>
        <input type="text" style="font-family: sans-serif;" name="backlogfee" id="field5" class="field-textarea"placeholder="₹">
    </li>
 <!--  <li>
  	<label>TOTAL<span class="required"></span></label>
    
        <input type="text" style="font-family: sans-serif;" name="total"  id="field5" class="field-textarea"placeholder="₹">
  </li> -->
  
    <li>
        <input type="submit" name="form-submit"value="Submit" />
    </li>
</ul></form></div>
		 <div class ="tabPanel">  <form method="POST" action="includes/transportation.inc.php" >
<ul class="form-style-1">
    <li><label>USN <span class="required">*</span></label><input type="text" style="font-family: sans-serif;" name="USN" class="field-divided" placeholder="USN" required maxlength="10" pattern="^[1][Dd][Tt]\d\d[a-zA-Z][A-Za-z]\d\d\d$" /> </li>
    
       <li><label>TRECEIPT NO. <span class="required">*</span></label>
        <input type="text" style="font-family: sans-serif;" name="treceiptno" class="field-long" placeholder="Receipt no." required="" />
    </li>
   
    <li>
        <label>AMOUNT<span class="required"></span></label>
        <input name="amount" style="font-family: sans-serif;" id="field5" class="field-textarea" placeholder="₹">
    </li>
 <li>
        <input type="submit" name="form-submit" value="Submit" />
    </li>
</ul></form>
</div>

</div>

<script src="myScript.js"></script>
</header>



</body>
</html>
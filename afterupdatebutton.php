<?php
include_once 'includes/dbh.inc.php';
$usn =$_GET['usn'];
$sql = "SELECT * FROM student WHERE usn='$usn';";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$sql1 = "SELECT * FROM  academic_fees WHERE usn='$usn';";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_assoc($result1);

$sql2 = "SELECT * FROM  hostel_fees WHERE usn='$usn';";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);

$sql3 = "SELECT * FROM  examination_fee WHERE usn='$usn';";
$result3 = mysqli_query($conn,$sql3);
$row3 = mysqli_fetch_assoc($result3);

$sql4 = "SELECT * FROM  transportation WHERE usn='$usn';";
$result4 = mysqli_query($conn,$sql4);
$row4 = mysqli_fetch_assoc($result4);


session_start();

if($_SESSION['status']!="Active")
{
    header("location:login.php");
}

$_SESSION['usn'] = $row['USN'];
$_SESSION['name'] = $row['Name'];
$_SESSION['phone'] = $row['Phone'];
$_SESSION['dob'] = $row['DOB'];
$_SESSION['hostellite'] = $row['Hostellite'];
$_SESSION['branch'] = $row['Branch'];


$_SESSION['receipt_no'] = $row1['Receipt_No'];
$_SESSION['quota'] = $row1['Quota'];
$_SESSION['frstyr'] = $row1['Frst_Yr'];//new name=yearly fees
$_SESSION['secondyr'] = $row1['Second_Yr'];//total
$_SESSION['thirdyr'] = $row1['third_Yr'];
$_SESSION['fourthyr'] = $row1['fourth_Yr'];

// $_SESSION['usn'] = $row2['USN'];
$_SESSION['hostelreceiptno'] = $row2['Hostel_Receipt_no'];
$_SESSION['messfee'] = $row2['Mess_Fee'];
$_SESSION['accomodationfee'] = $row2['Accomodation_Fee'];
$_SESSION['securityfee'] = $row2['Securty_Fee'];
$_SESSION['roomno'] = $row2['Room_no'];//new name=total


// $_SESSION['usn'] = $row3['USN'];
$_SESSION['registrationno'] = $row3['Registration_no'];
$_SESSION['amount1'] = $row3['Amount'];
$_SESSION['backlogfee'] = $row3['Backlog_fee'];
$_SESSION['total'] = $row3['Total'];


// $_SESSION['usn'] = $row4['USN'];
$_SESSION['treceiptno'] = $row4['Treceipt_no'];
$_SESSION['amount'] = $row4['Amount'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
	<link rel="stylesheet" type="text/css" href="ad.css">
	<!-- <link rel="stylesheet" type="text/css" href="be2.css">	 -->
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
				<button onclick="showPanel(0,'#')">Student Details </button>
				<button onclick="showPanel(1,'#')"> Academic Fees Details </button>
				<button onclick="showPanel(2,'#')"> Hostel Fees Details</button>
				<button onclick="showPanel(3,'#')">Examination Fees Details</button>
				<button onclick="showPanel(4,'#')">Transportaion Fees Details</button>
		</div>

	<div class ="tabPanel"> <form action="includes/updatestudentdetails.inc.php" method="POST"><fieldset class="fieldset" style="border: 0;">
			
    <label for="name">USN:</label>
   <input type="text" style="font-family: sans-serif; background-color: transparent; border: 0; color: white;font-size: 15px;" name="USN" value="<?php echo $_SESSION['usn'];?>" readonly="true">    <br /><br>
    <label for="mail">Name:</label>
   <input type="text" style="font-family: sans-serif;" name="Name" required pattern="[A-Za-z\s]*$" value="<?php echo $_SESSION['name'];?>">  
    <br /><br>
    <label for="address">Mobile:</label>
    <input type="text" style="font-family: sans-serif;" name="Phone" required maxlength="10" pattern="^\d*$" value="<?php echo $_SESSION['phone'];?>"> <br><br>
    <label for="name">DOB:</label>
   <input type="text" style="font-family: sans-serif;" name="DOB" value="<?php echo $_SESSION['dob'];?>"> <br><br>
    <label for="name">Hostellite:</label>
  <input type="text" style="font-family: sans-serif;" name="Hostellite" value="<?php echo $_SESSION['hostellite'];?>"><br><br>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label for="name">Branch:</label>
 <input type="text" style="font-family: sans-serif;" name="Branch" value="<?php echo $_SESSION['branch'];?>"><br><br>
 <input type="submit" style="font-family: sans-serif;" name="submit" value="Update">
		</fieldset></form></div>

		<div class ="tabPanel">	<form action="includes/updateacademicfeedetails.inc.php" method="POST"><fieldset class="fieldset" style="border: 0;">
			
    <label for="name">USN:</label>
    <input type="text" style="font-family: sans-serif; background-color: transparent; border: 0; color: white
;font-size: 15px;" name="USN" value="<?php echo $_SESSION['usn'];?>" readonly="true">  
    <br /><br>
    <label for="mail">Receipt No:</label>
    <input type="text" style="font-family: sans-serif; background-color: transparent; border: 0; color: white
;font-size: 15px;" name="Receipt_no" value="<?php echo $_SESSION['receipt_no'];?>" readonly="true">  
    <br /><br>
    <label for="address">Quota:</label>
     <input type="text" style="font-family: sans-serif;" name="Quota" value="<?php echo $_SESSION['quota'];?>">  <br><br>
    <label for="name">Tution Fees:</label>
      <input type="text" style="font-family: sans-serif;" name="first" value="<?php echo $_SESSION['frstyr'];?>">  <br><br>
    <label for="name">Development Fees:</label>
     <input type="text" style="font-family: sans-serif;" name="second" value="<?php echo $_SESSION['secondyr'];?>">  <br><br>
    <label for="name">Library Fees:</label>
      <input type="text" style="font-family: sans-serif;" name="third" value="<?php echo $_SESSION['thirdyr'];?>">  <br><br>
     <label for="name">Total:</label>
     <?php echo $_SESSION['fourthyr'];?><br><br>
      <input type="submit" name="submit" value="Update">
</fieldset></form></div>

<div class ="tabPanel"><form action="includes/updatehostelfees.inc.php" method="POST"><fieldset class="fieldset" style="border: 0;">
			
    <label for="name">USN:</label>
    <input type="text" style="font-family: sans-serif; background-color: transparent; border: 0; color: white
;font-size: 15px;" name="USN" value="<?php echo $_SESSION['usn'];?>" readonly="true">  
    <br /><br>
    <label for="mail">Hostel Receipt No.:</label>
     <input type="text" style="font-family: sans-serif; background-color: transparent; border: 0; color: white
;font-size: 15px;" name="hostel_receipt_no" value="<?php echo $_SESSION['hostelreceiptno'];?>" readonly="true">  
    <br /><br>
    <label for="address">Mess Fee:</label>
      <input type="text" style="font-family: sans-serif;" name="mess_fee" value="<?php echo $_SESSION['messfee'];?>">  <br><br>
    <label for="name">Accomodation Fee:</label>
    <input type="text" style="font-family: sans-serif;" name="accomodation_fee" value="<?php echo $_SESSION['accomodationfee'];?>">  <br><br>
    <label for="name">Security Fee:</label>
    <input type="text" style="font-family: sans-serif;" name="security_fee" value="<?php echo $_SESSION['securityfee'];?>">  <br><br>
    <label for="name">Total:</label>
    <?php echo $_SESSION['roomno'];?><br><br>
    <input type="submit"style="font-family: sans-serif;" name="submit" value="Update">
		</fieldset></form></div>


		<div class ="tabPanel"><form action="includes/updateexaminationfee.inc.php" method="POST"><fieldset class="fieldset" style="border: 0;">
			    <label for="name">USN:</label>
   <input type="text" style="font-family: sans-serif; background-color: transparent; border: 0; color: white
;font-size: 15px;" name="USN" value="<?php echo $_SESSION['usn'];?>" readonly="true">
    <br /><br>
    <label for="mail">Registration No.:</label>
  <input type="text" style="font-family: sans-serif; background-color: transparent; border: 0; color: white
;font-size: 15px;" name="Registration_no" value="<?php echo $_SESSION['registrationno'];?>" readonly="true">
    <br /><br>
    <label for="address">Amount:</label>
   <input type="text" style="font-family: sans-serif;" name="Amount" value="<?php echo $_SESSION['amount1'];?>"><br><br>
    <label for="name">Backlog Fee:</label>
    <input type="text" style="font-family: sans-serif;" name="backlogfee" value="<?php echo $_SESSION['backlogfee'];?>"><br><br>
    <label for="name">Total:</label>
    <?php echo $_SESSION['total'];?><br><br>
    <input type="submit" name="submit" value="Update">
		</fieldset></form></div>

			<div class ="tabPanel"><form action="includes/updatetransportationfeedetails.inc.php" method="POST"><fieldset class="fieldset" style="border: 0;">
			    <label for="name">USN:</label>
    <input type="text" style="font-family: sans-serif; background-color: transparent; border: 0; color: white
;font-size: 15px;" name="USN" value="<?php echo $_SESSION['usn'];?>" readonly="true">
    <br /><br>
    <label for="mail">TReceipt No.:</label>
     <input type="text" style="font-family: sans-serif; background-color: transparent; border: 0; color: white
;font-size: 15px;" name="treceiptno" value="<?php echo $_SESSION['treceiptno'];?>" readonly="true">
    <br /><br>
    <label for="address">Amount:</label>
    <input type="text" style="font-family: sans-serif;" name="Amount" value="<?php echo $_SESSION['amount'];?>"><br><br>
    <input type="submit" name="submit" value="Update">
   </fieldset></form></div>
     	
		<script src="myScript.js"></script>
</header>
</div>
</body>
</html>

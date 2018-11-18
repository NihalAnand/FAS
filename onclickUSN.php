<?php
include_once 'includes/dbh.inc.php';
if(isset($_GET['usn'])){$usn =$_GET['usn'];}

if(isset($_POST['usn'])){$usn = $_POST['usn'];}
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
$_SESSION['usn'] = $row['USN'];
$_SESSION['name'] = $row['Name'];
$_SESSION['phone'] = $row['Phone'];
$_SESSION['dob'] = $row['DOB'];
$_SESSION['hostellite'] = $row['Hostellite'];
$_SESSION['branch'] = $row['Branch'];


$_SESSION['receipt_no'] = $row1['Receipt_No'];
$_SESSION['quota'] = $row1['Quota'];
$_SESSION['frstyr'] = $row1['Frst_Yr'];//new name=yearly fees
$_SESSION['secondyr'] = $row1['Second_Yr'];//new name=total
$_SESSION['thirdyr'] = $row1['third_Yr'];
$_SESSION['fourthyr'] = $row1['fourth_Yr'];

//$_SESSION['usn'] = $row2['USN'];
$_SESSION['hostelreceiptno'] = $row2['Hostel_Receipt_no'];
$_SESSION['messfee'] = $row2['Mess_Fee'];
$_SESSION['accomodationfee'] = $row2['Accomodation_Fee'];
$_SESSION['securityfee'] = $row2['Securty_Fee'];
$_SESSION['roomno'] = $row2['Room_no'];//new name=total


//$_SESSION['usn'] = $row3['USN'];
$_SESSION['registrationno'] = $row3['Registration_no'];
$_SESSION['amount1'] = $row3['Amount'];
$_SESSION['backlogfee'] = $row3['Backlog_fee'];
$_SESSION['total'] = $row3['Total'];


//$_SESSION['usn'] = $row4['USN'];
$_SESSION['treceiptno'] = $row4['Treceipt_no'];
$_SESSION['amount'] = $row4['Amount'];


$backfee = $_SESSION['backlogfee'];
$sqlback = "SET @bf='$backfee';";
mysqli_query($conn,$sqlback);
$sqlback1 = "call backlogcalc(@bf,@abc);";
mysqli_query($conn,$sqlback1);
$sqlback2 = "SELECT @abc;";
$resd = mysqli_query($conn,$sqlback2);
while ($rowd = $resd ->fetch_assoc()) {
     $var=$rowd['@abc'];
 } 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
	<link rel="stylesheet" type="text/css" href="ad.css">
	<!-- <link rel="stylesheet" type="text/css" href="be1.css"> -->
	
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

	<div class ="tabPanel"><fieldset class="fieldset" style="border: 0;">
		
        <?php echo '<img style="margin-right:-80px; margin-top:-40px;" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"width="100" height="100">';?><br><br>	
    <label for="name">USN:</label>
   <?php echo $_SESSION['usn'];?>
    <br /><br>
    <label for="mail">Name:</label>
   <?php echo $_SESSION['name'];?>
    <br /><br>
    <label for="address">Mobile:</label>
    <?php echo $_SESSION['phone'];?> <br><br>
    <label for="name">DOB:</label>
    <?php echo $_SESSION['dob'];?> <br><br>
    <label for="name">Hostellite:</label>
   <?php echo $_SESSION['hostellite'];?><br><br>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label for="name">Branch:</label>
  <?php echo $_SESSION['branch'];?><br><br>

		</fieldset></div>

		<div class ="tabPanel">	<fieldset class="fieldset" style="border: 0;">
			
    <label for="name">USN:</label>
    <?php echo $_SESSION['usn'];?>
    <br /><br>
    <label for="mail">Receipt No:</label>
     <?php echo $_SESSION['receipt_no'];?>
    <br /><br>
    <label for="address">Quota:</label>
     <?php echo $_SESSION['quota'];?><br><br>
    <label for="name">Tution Fees:</label>
      <?php echo $_SESSION['frstyr'];?><br><br>
    <label for="name">Development Fees:</label>
    <?php echo $_SESSION['secondyr'];?><br><br>
    <label for="name">Library Fees:</label>
     <?php echo $_SESSION['thirdyr'];?><br><br>
    <label for="name">Total:</label>
     <?php echo $_SESSION['fourthyr'];?><br><br>
</fieldset></div>

<div class ="tabPanel"><fieldset class="fieldset" style="border: 0;">
			
    <label for="name">USN:</label>
    <?php echo $_SESSION['usn'];?>
    <br /><br>
    <label for="mail">Hostel Receipt No.:</label>
     <?php echo $_SESSION['hostelreceiptno'];?>
    <br /><br>
    <label for="address">Mess Fee:</label>
     <?php echo $_SESSION['messfee'];?><br><br>
    <label for="name">Accomodation Fee:</label>
    <?php echo $_SESSION['accomodationfee'];?><br><br>
    <label for="name">Security Fee:</label>
    <?php echo $_SESSION['securityfee'];?><br><br>
    <label for="name">Total:</label>
    <?php echo $_SESSION['roomno'];?><br><br>
		</fieldset></div>


		<div class ="tabPanel"><fieldset class="fieldset" style="border: 0;">
			    <label for="name">USN:</label>
    <?php echo $_SESSION['usn'];?>
    <br /><br>
    <label for="mail">Registration No.:</label>
   <?php echo $_SESSION['registrationno'];?>
    <br /><br>
    <label for="address">Amount:</label>
    <?php echo $_SESSION['amount1'];?><br><br>
    <label for="name">Backlog Fee:</label>
    <?php echo $_SESSION['backlogfee'];?><br><br>
    <label>No. of Backlog Subjects:</label>
    <?php echo $var;?><br><br>
    <label for="name">Total:</label>
    <?php echo $_SESSION['total'];?><br><br>
    
		</fieldset></div>

			<div class ="tabPanel"><fieldset class="fieldset" style="border: 0;">
			    <label for="name">USN:</label>
    <?php echo $_SESSION['usn'];?>
    <br /><br>
    <label for="mail">TReceipt No.:</label>
     <?php echo $_SESSION['treceiptno'];?>
    <br /><br>
    <label for="address">Amount:</label>
   <?php echo $_SESSION['amount'];?><br><br>
   </fieldset></div>
     	
		<script src="myScript.js"></script>
</header>
</div>
</body>
</html>

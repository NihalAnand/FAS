<?php
include_once 'dbh.inc.php';

$usn = $_POST['USN'];
		$hostelreceiptno = $_POST['hostel_receipt_no'];
		$mess_fee = $_POST['mess_fee'];
		$accomodation_fee = $_POST['accomodation_fee'];
		$security_fee = $_POST['security_fee'];
		$room_no = $_POST['room_no'];//new name= total	
// echo $usn  ;
// echo $name ; 
// echo $phone; 
// echo $dob; echo $hostellite; echo $branch;
$sql = "UPDATE hostel_fees set USN = '$usn',Hostel_Receipt_no ='$hostelreceiptno',Mess_Fee ='$mess_fee',Accomodation_Fee ='$accomodation_fee',Securty_Fee = '$security_fee',Room_no ='$room_no' WHERE USN='$usn';";
mysqli_query($conn,$sql);
header("Location:../afterupdatebutton.php?update=success&usn=$usn");
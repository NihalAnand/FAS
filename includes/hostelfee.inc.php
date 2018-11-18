<?php
		
		if (isset($_POST['form-submit'])){	 
		include_once 'dbh.inc.php';

		$USN = $_POST['USN'];
		$hostelreceiptno = $_POST['hostel_receipt_no'];
		$mess_fee = $_POST['mess_fee'];
		$accomodation_fee = $_POST['accomodation_fee'];
		$security_fee = $_POST['security_fee'];
		$room_no = $_POST['room_no'];//new name=total	
// echo $USN; 
// echo $hostelreceiptno;
// echo $mess_fee;
// echo $accomodation_fee;
//  echo $security_fee;
// echo $room_no   ;
$sql = "INSERT INTO hostel_fees (Hostel_Receipt_no,USN,Mess_Fee,Accomodation_Fee,Securty_Fee,Room_no) VALUES ('$hostelreceiptno','$USN','$mess_fee','$accomodation_fee','$security_fee','$room_no');";
mysqli_query($conn,$sql);
header("Location: ../AddStudent.php?entry=success");
}

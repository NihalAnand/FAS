<?php
include_once 'dbh.inc.php';

$usn = $_POST['USN'];
		$registration_no = $_POST['Registration_no'];
		$amount = $_POST['Amount'];
		$backlogfee = $_POST['backlogfee'];
		$total = $_POST['total'];
// echo $usn  ;
// echo $name ; 
// echo $phone; 
// echo $dob; echo $hostellite; echo $branch;
$sql = "UPDATE examination_fee set USN = '$usn',Registration_no ='$registration_no',Amount ='$amount',Backlog_fee ='$backlogfee',Total = '$total' WHERE USN='$usn';";
mysqli_query($conn,$sql);
header("Location:../afterupdatebutton.php?update=success&usn=$usn");
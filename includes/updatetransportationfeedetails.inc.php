<?php
include_once 'dbh.inc.php';


		$usn = $_POST['USN'];
		$Treceipt_no = $_POST['treceiptno'];
		$amount = $_POST['Amount'];
// echo $amount;
$sql = "UPDATE transportation set USN = '$usn',Treceipt_no ='$Treceipt_no',Amount ='$amount' WHERE USN='$usn';";
mysqli_query($conn,$sql);
header("Location:../afterupdatebutton.php?update=success&usn=$usn");
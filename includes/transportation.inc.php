<?php
		
		if (isset($_POST['form-submit'])){	 
		include_once 'dbh.inc.php';

		$USN = $_POST['USN'];
		$treceipt_no = $_POST['treceiptno'];
		$amount = $_POST['amount'];
		
// echo $USN +" "+ $registration_no+" " +$amount+" "+ $backlogfee+" "+ $total ;
$sql = "INSERT INTO transportation (Treceipt_no,USN,Amount) VALUES ('$treceipt_no','$USN','$amount');";
mysqli_query($conn,$sql);
header("Location: ../AddStudent.php?entry=success");
}

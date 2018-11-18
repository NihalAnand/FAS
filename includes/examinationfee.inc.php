<?php
		
		if (isset($_POST['form-submit'])){	 
		include_once 'dbh.inc.php';

		$USN = $_POST['USN'];
		$registration_no = $_POST['Registration_no'];
		$amount = $_POST['Amount'];
		$backlogfee = $_POST['backlogfee'];
		$total = $_POST['total'];
			
// echo $USN +" "+ $registration_no+" " +$amount+" "+ $backlogfee+" "+ $total ;
$sql = "INSERT INTO examination_fee (Registration_no,USN,Amount,Backlog_fee,Total) VALUES ('$registration_no','$USN','$amount','$backlogfee','$total');";
mysqli_query($conn,$sql);
header("Location: ../AddStudent.php?entry=success");
}

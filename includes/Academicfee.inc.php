<?php
		
		if (isset($_POST['form-submit'])){	 
		include_once 'dbh.inc.php';

		$USN = $_POST['USN'];
		$Receiptno = $_POST['Receipt_no'];
		$Quota = $_POST['Quota'];
		$firstyr = $_POST['first'];//new name=Tution fees
		$secondyr = $_POST['second'];//new name=developement fees
		$thirdyr = $_POST['third'];	//new name=library fees
		$fourthyr = $_POST['fourth'];//newname=total
		// echo $USN +" "+ $Receiptno+" " +$Quota+" "+ $firstyr+" "+ $secondyr+" "+ $thirdyr+" "+$fourthyr   ;
$sql = "INSERT INTO academic_fees (USN,Receipt_No,Quota,Frst_Yr,Second_Yr,third_Yr,fourth_Yr) VALUES ('$USN','$Receiptno','$Quota','$firstyr','$secondyr','$thirdyr','$fourthyr');";
mysqli_query($conn,$sql);
header("Location: ../AddStudent.php?entry=success");
}
<?php
include_once 'dbh.inc.php';

        $usn= $_POST['USN'];
		// $Receiptno = $_POST['Receipt_no'];
		$Quota = $_POST['Quota'];
		$firstyr = $_POST['first'];//new name=yearly fees
		$secondyr = $_POST['second'];//new name=total
		$thirdyr = $_POST['third'];	
		$fourthyr = $_POST['fourth'];

// echo $usn  ;
// echo $Receiptno ; 
// echo $Quota; 
// echo $firstyr; echo $thirdyr; echo $fourthyr;
$sql = "UPDATE  academic_fees set USN = '$usn', Quota = '$Quota',Frst_Yr ='$firstyr', Second_Yr ='$secondyr', third_Yr ='$thirdyr', fourth_Yr = '$fourthyr' WHERE USN='$usn';";
mysqli_query($conn,$sql);
header("Location:../afterupdatebutton.php?update=success&usn=$usn");


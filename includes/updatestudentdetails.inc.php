<?php
include_once 'dbh.inc.php';

$usn = $_POST['USN'];
$name = $_POST['Name'];
$phone = $_POST['Phone']; 
$dob = $_POST['DOB'];
$hostellite = $_POST['Hostellite'];
$branch = $_POST['Branch'];
// echo $usn  ;
// echo $name ; 
// echo $phone; 
// echo $dob; echo $hostellite; echo $branch;
$sql = "UPDATE student set USN = '$usn',Name ='$name',Phone ='$phone',DOB ='$dob',Hostellite = '$hostellite',Branch ='$branch' WHERE USN='$usn';";
mysqli_query($conn,$sql);
header("Location:../afterupdatebutton.php?update=success&usn=$usn");
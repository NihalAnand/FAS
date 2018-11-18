<?php
		
		if (isset($_POST['form-submit'])){	 
		include_once 'dbh.inc.php';

		$USN = $_POST['USN'];
		$Name = $_POST['Name'];
		$Phone = $_POST['Phone'];
		$DOB = $_POST['DOB'];
		$Hostellite = $_POST['Hostellite'];
		$Branch = $_POST['Branch'];	

		$filename = addslashes($_FILES['image']['name']);
		$tmpname = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$filetype = addslashes($_FILES['image']['type']);

		$array = array('jpg','png','jpeg');
		$ext = pathinfo($filename, PATHINFO_EXTENSION);

		if(!empty($filename)){
			if (in_array($ext,$array)) {
				
			
		$sql = "INSERT INTO student (USN,Name,Phone,DOB,Hostellite,Branch,image) VALUES ('$USN','$Name','$Phone','$DOB','$Hostellite','$Branch','$tmpname');";
mysqli_query($conn,$sql);


header("Location: ../AddStudent.php?entry=success");
}
else{
	header("Location: ../AddStudent.php?error=format");
}
}
}	
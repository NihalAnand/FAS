<?php

	if (isset($_POST['login-submit'])) {
		include_once 'dbh.inc.php';
		$email = $_POST['email'];
		$password = $_POST['pwd'];
	
		if (empty($email) || empty($password)){
			header("Location: ../login.php?error=emptyfields");
		exit();
		}
		else {
			$sql = "SELECT * FROM  user WHERE email='$email';";
			$result=mysqli_query($conn,$sql);
			$resultCheck=mysqli_num_rows($result);
			if($resultCheck > 0){
				$row=mysqli_fetch_assoc($result);
				$passwordcheck = password_verify($password, $row['Password']);
				if($passwordcheck==false){
					header("Location: ../login.php?error=wrongpwd");
					exit();
				}
				else {
			
						session_start();

						$_SESSION['userID'] = $row['ID']; 
						$_SESSION['userName'] = $row['Name'];
						$_SESSION['Email'] = $row['Email'];
						$_SESSION['status']="Active";

						header("Location: ../be.php?login=success");
						exit();
				
					}
				}
			
				else {
					header("Location: ../login.php?error=nouser");
					exit();
				}
			
		}
	}

			
		
	

	else
	{
		header("Location: ../dashboard.php");
		exit();

	}




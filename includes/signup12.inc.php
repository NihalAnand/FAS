<?php
		
		if (isset($_POST['signup-submit'])){	 
		include_once 'dbh.inc.php';


		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$pass = mysqli_real_escape_string($conn,$_POST['pass']);
		$passrepeat = mysqli_real_escape_string($conn,$_POST['passrepeat']);

		if (empty($name)|| empty($email) || empty($pass) || empty($passrepeat) ) {

			header("Location: ../signup.php?error=emptyfields&name=".$name."&email=".$email);
			exit();
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $name)) {
				header("Location: ../signup.php?error=invalidemailname");
				exit();
		}

		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?error=invalidemail&name=".$name);
				exit();
			}
			else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
				header("Location: ../signup.php?error=invalidemail&email=".$email);
				exit();
			}
			else if ($pass !==$passrepeat) {
				header("Location: ../signup.php?error=passwordcheck&name=".$name."&email=".$email);
			exit();
			}
			else {

				$sql = "SELECT Email FROM user WHERE Email=?";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../signup.php?error=sqlerror");
					exit();
				}
				else {
					mysqli_stmt_bind_param($stmt, "s", $email);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					$resultCheck = mysqli_stmt_num_rows($stmt);
					if ($resultCheck > 0) {
						header("Location: ../signup.php?error=usertaken&email=".$email);
						exit();
					}
					else {
						 $sql = "INSERT INTO user (Name, Password, Email) VALUES (?,?,?)";
						 	$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../signup.php?error=sqlerror");
					exit();
					}
					else {
						$hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

						mysqli_stmt_bind_param($stmt, "sss", $name, $hashedPwd, $email);
					mysqli_stmt_execute($stmt);
					header("Location: ../login.php?signup=success");
					exit();

					}
				}
			}
		}

				
	
}
else{
	header("Location: ../signup.php");
	exit();
}
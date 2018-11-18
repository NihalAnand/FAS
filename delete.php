	<?php
session_start();
if($_SESSION['status']!="Active")
{
    header("location:login.php");
}

include_once 'includes/dbh.inc.php';
$sql = "SELECT * FROM student";
		$result = mysqli_query($conn,$sql);

?>

	<?php
		if (isset($_POST["submit"])) {
			
		include_once 'includes/dbh.inc.php';
		  $delete_usn = $_POST['chk'];
		$usn = count($delete_usn);
		if (count($usn)>0) {
			foreach ($delete_usn as $key) {
				$sql="delete from student where USN='$key';";
				mysqli_query($conn,$sql);
			}
		}
		header("Location: delete.php");
	}

		
		
		?>


<!DOCTYPE html>
<html>
<head>
	<title>delete</title>
	<link rel="stylesheet" type="text/css" href="be1.css">
	<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<form style="margin-left: 100px;	 margin-top:140px; " action="delete.php" method="POST">
			<input type="text" style="margin-left: 100px;" name="search" value="">
			<button  type="submit" style="margin-left: 20px;" name="viewbutton"><i class="fa fa-search" style="width: 20px;"></i>Search Here </button>
	<header>
		<nav>
			 <ul class="main-nav">
				 	<li>
				 		<a href="be.php">Home</a>
				 	</li>
				 	<li><a href="about.html">About</a></li>
				 	<li><a href="faq.html">FAQ?</a></li>
				 	<li><a href="contact.html">Contact US</a></li>
				 	 <li><a href="be.php">BACK</a></li>
				 	
				 	<?php
				 	if (isset($_SESSION['Email'])){
					 	echo '<li><form action="includes/logout.inc.php" method="POST">
			<input type="submit" name="logout-submit" value="Logout"></li>	
			
		</form>';
	}
	?>
</ul>
				</nav>
<form method="POST" action="delete.php">
	<?php 
	if(!isset($_POST['viewbutton'])){
echo "<table style= 'padding-right:180px;'>";
	echo "<tr>
		<th><input type='submit' name='submit' value='Delete'></th>
		<th>USN</th>
		<th>Name</th>
		<th>Phone</th>
		<th>DOB</th>
		<th>Hostellite</th>
		<th>Branch</th>
	</tr>
	";
		if ( mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
				<td><input type='checkbox' name='chk[]' value={$row["USN"]} </td>";
				echo "<td><a href='onclickUSN.php?usn={$row['USN']}'>{$row['USN']}</a></td>
					<td>{$row['Name']}</td>
					<td>{$row['Phone']}</td>
					<td>{$row['DOB']}</td>
					<td>{$row['Hostellite']}</td>
					<td>{$row['Branch']}</td>
				</tr>";
			}
		}
 echo "</table>";
}

else{
	$search = $_POST['search'];
	$sql = "SELECT * FROM student WHERE USN LIKE '%$search%' OR Name LIKE '%$search%' OR Branch LIKE '%$search%'; ";
	$result = mysqli_query($conn, $sql);
	echo "<table style= 'padding-right:180px;'>";
	echo "<tr>
		<th><input type='submit' name='submit' value='Delete'></th>
		<th>USN</th>
		<th>Name</th>
		<th>Phone</th>
		<th>DOB</th>
		<th>Hostellite</th>
		<th>Branch</th>
	</tr>
	";

		if ( mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
				<td><input type='checkbox' name='chk[]' value={$row["USN"]} </td>";
				echo "<td><a href='onclickUSN.php?usn={$row['USN']}'>{$row['USN']}</a></td>
					<td>{$row['Name']}</td>
					<td>{$row['Phone']}</td>
					<td>{$row['DOB']}</td>
					<td>{$row['Hostellite']}</td>
					<td>{$row['Branch']}</td>
				</tr>";
			}
		}
 echo "</table>";
}
?>
</table>
</form>
</header>
</body>
</html> 
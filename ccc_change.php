<?php

session_start();
if (!isset($_SESSION['cccname'])) {
	header('location:ccc_login.php');
}
require 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">
	
</head>
<body bgcolor=" #ffffe6">
<header class="w3-conatiner w3-center w3-highway-red w3-padding" style="height: 80px; width: 100%">
	<h1><b><center>Welcome to Leave Portal</center></b></h1>
</header>
<br>
<div class="w3-top-right" style="margin-left: 85%;">
	<form method="post">		
		<button name="back" type="submit" class="w3-btn w3-vivid-greenish-blue  w3-padding w3-round-xlarge">Back</button>
		<button name="logout" type="submit" class="w3-btn w3-vivid-greenish-blue  w3-padding w3-round-xlarge">Logout</button>
	</form>
</div>

<div id="frm" class="w3-card w3-white w3-round-large w3-conatiner" style="width:450px; margin-top: 50px; margin: 20px auto;">
		<div class="w3-highway-red  w3-round-large">
 		 <h1 class="w3-center"><b>Change Password </h1>
	</div>

	<form class="w3-container" method="post">
	<table>
		<tr>
			<td><label><b>Old Password :</b></label></td>
			<td><input class="w3-input" type="password" name="Password1" id="pat"></td>
		</tr>
		<tr>
			<td><label><b>New Password :</b></label></td>
			<td><input class="w3-input" type="password" name="Password2" id="pat"></td>
		</tr>
		<tr>
			<td><label><b>Confirm New Password :</b></label></td>
			<td><input class="w3-input" type="password" name="Password3" id="pat"></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		</table>
		<p><button name="change" type="submit" class="w3-btn w3-signal-green w3-padding w3-round-xlarge" style="width:100%; margin-bottom:10px;" ">Change Password</button></p>
				
	</form>
</div>


<?php
if(isset($_POST['change'])){
	$p1 = $_POST['Password1'];
	$p2 = $_POST['Password2'];
	$p3 = $_POST['Password3'];
	$fname = $_SESSION['cccname'];
	$pass = $_SESSION['cccpassword'];
	

	if ($p1!=$pass) {
		echo "<script type='text/javascript'>alert('Old Password does not match!')</script>";

	}

	if ($p2==$p3) {
		$pass = $p2;
	}
	else{
		echo "<script type='text/javascript'>alert('Passwords does not match!')</script>";
		die();
	}
	if($conn){
		$sql = "UPDATE ccc set password = '$p2' where password = '$p1' and fname = '$fname'";

		if($result = (mysqli_query($conn, $sql))){
			
				echo "<script type='text/javascript'>alert('Password successfully changed! Logout to continue')</script>";
			
		}
		else{
			echo "<script type='text/javascript'>alert('Some error occurred! Please try again' )</script>";
			die();
		}
	}
}

if(isset($_POST['logout'])){
	 header('location:ccc_logout.php');
}
if(isset($_POST['back'])){
	 header('location:ccc_info.php');
}

?>

</body>
</html>
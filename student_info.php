<?php
	session_start();
if (!isset($_SESSION['studentname'])) {
	header('location:index.php.php');
}

	require 'connect.php';

		$fname = $_SESSION['studentname'] ;
		$pass = $_SESSION['studentpassword'];

		if(!$conn)
		{  
	  		echo "<script type='text/javascript'>alert('Could not connect!')</script>";
		}  
	
		$sql = "SELECT * FROM student WHERE fname = '$fname' and password='$pass'";	

		if($result=(mysqli_query($conn,$sql)))
		{ 
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{

					$fname    	=$row["fname"];
					$lname    	=$row["lname"];
					$mname    	=$row["mname"];
					$contact  	=$row["contact"];
					$address  	=$row["address"];
					$division   =$row["division"];
					$class   	=$row["class"];
					$rollno     =$row["rollno"];
					$mail     	=$row["email"];

				}
			}	
		}
		$_SESSION['lname']=$lname;
		$_SESSION['mname']=$mname;	

?>

<style>
	

</style>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<title>Student Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">
	
</head>
<body bgcolor=" #ffffe6">

<header class="w3-conatiner w3-center w3-highway-red w3-padding" style="height: 80px; width: 100%">
	<h1><b><center>Welcome to Leave Portal</center></b></h1>
</header>



<div class="w3-bar w3-border w3-signal-red">
  <a href="student_info.php" class="w3-bar-item w3-button w3-green">&nbsp;&nbsp;Home &nbsp;&nbsp;</a>
  <a href="student_modify.php" class="w3-bar-item w3-button w3-hover-teal">&nbsp;&nbsp;Modify Details&nbsp;&nbsp;</a>
  <a href="student_change.php" class="w3-bar-item w3-button w3-hover-teal">&nbsp;&nbsp;Change Password&nbsp;&nbsp;</a>
  <a href="application.php" class="w3-bar-item w3-button w3-hover-teal">&nbsp;&nbsp;Apply for Leave&nbsp;&nbsp;</a>
  <a href="status.php" class="w3-bar-item w3-button w3-hover-teal">&nbsp;&nbsp;Check Status&nbsp;&nbsp;</a>
  <a href="student_logout.php" class="w3-bar-item w3-button w3-green w3-right w3-hover-teal">&nbsp;&nbsp;Logout&nbsp;&nbsp;</a>
</div>

	<div id="frm" class="w3-card w3-white w3-round-large w3-conatiner" style="width: 550px; margin-top: 50px; margin: 50px auto;">
		<div class="w3-highway-red  w3-round-large">
 		 <h1 class="w3-center" style="font-size: 40px"><b>WELCOME <?php echo "$lname $fname $mname";?> </h1>
	</div>
       	<center>
		<table>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td><b>Address :</b></td>
				<td colspan="2" align="right"><?php echo $address; ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td><b>Roll No:</b></td>
				<td colspan="2" align="right"><?php echo $rollno; ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td><b>Class:</b></td>
				<td colspan="2" align="right"><?php echo $class; ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td><b>Division:</b></td>
				<td colspan="2" align="right"><?php echo $division; ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td><b>Contact :</b></td>
				<td colspan="2" align="right"><?php echo $contact; ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td><b>Email :</b></td>
				<td colspan="2" align="right"><?php echo $mail; ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
		</table>
		</center>
</body>
</html>
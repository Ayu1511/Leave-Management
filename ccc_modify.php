<?php
	session_start();
if (!isset($_SESSION['cccname'])) {
	header('location:ccc_login.php');
}


		require 'connect.php'; 
		$fname = $_SESSION['cccname'] ;
		
		$pass = $_SESSION['cccpassword'];

		if(!$conn)
		{  
	  		echo "<script type='text/javascript'>alert('Could not connect!')</script>";
	  		die();
		}  
	
		$sql = "SELECT * FROM ccc WHERE fname = '$fname' and password='$pass'";	

		if($result=(mysqli_query($conn,$sql)))
		{ 
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
					$contact  	=$row["contact"];
					$address  	=$row["address"];
					$division   =$row["division"];
					$class   	=$row["class"];
					$mail     	=$row["mail"];	
				}
			}	
		}
if(isset($_POST['update'])){

	$contact  =$_POST['contact'];
	$address  =$_POST['address'];
	$class   =$_POST['class'];
	$mail     =$_POST['mail'];
	$division =$_POST['division'];

	$sql = "UPDATE ccc set contact = '$contact' , address = '$address', class = '$class', division = '$division', mail='$mail' where fname = '$fname' and password = '$pass'  ";
 	if ($result=(mysqli_query($conn,$sql))) {
 		echo "<script type='text/javascript'>alert('Successfully updated!')</script>";
 		header('location:ccc_info.php');
 	}
 	else{
 		echo "<script type='text/javascript'>alert('Some error occurred! Please try again!')</script>";
 	}

}

if(isset($_POST['logout'])){

 	 header('location:ccc_logout.php');
 }

 if(isset($_POST['back'])){

 	 header('location:ccc_info.php');
 }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Modify Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">
	
</head>
<body bgcolor=" #ffffe6">
<header class="w3-conatiner w3-center w3-highway-red w3-padding" style="height: 80px; width: 100%">
	<h1><b><center>Welcome to Leave Portal</center></b></h1>
</header>
<br>
<div class="w3-top-right" style="margin-left: 87%;">
	<form method="post">		
		<button name="back" type="submit" class="w3-btn w3-vivid-greenish-blue  w3-padding w3-round-xlarge">Back</button>
		<button name="logout" type="submit" class="w3-btn w3-vivid-greenish-blue  w3-padding w3-round-xlarge">Logout</button>
	</form>
</div>
	<div id="frm" class="w3-card w3-white w3-round-large w3-conatiner" style="width:400px; margin-top: 50px; margin: 20px auto;">
		<div class="w3-highway-red  w3-round-large">
 		 <h1 class="w3-center"><b>Details</h1>
	</div>
	<br>
	<form class="w3-container" method="post">
		<center>
			<table>
				<tr>
					<td><b>Name : </b></td>
					<td colspan="2"><input class="w3-input" type="text" id="pat" name="fname" value ="<?php echo "$fname";?>" readonly ></td>
				</tr>
				<tr>
					<td><b>Address : </b></td>
					<td colspan="2"><input class="w3-input" type="text" id="pat" name="address" value ="<?php echo "$address";?>" required></td>
				</tr>
				<tr>
					<td><b>Class : </b></td>
					<td colspan="2"><input class="w3-input" type="text" id="pat" name="class" value ="<?php echo "$class";?>" required></td>
				</tr>
				<tr>
					<td><b>Division : </b></td>
					<td colspan="2"><input class="w3-input" type="text" id="pat" name="division" value ="<?php echo "$division";?>" required></td>
				</tr>
				<tr>
					<td><b>Contact : </b></td>
					<td colspan="2"><input class="w3-input" type="text" id="pat" name="contact" value ="<?php echo "$contact";?>" required></td>
				</tr>
				<tr>
					<td><b>Email : </b></td>
					<td colspan="2"><input class="w3-input" type="text" id="pat" name="mail" value ="<?php echo "$mail";?>" required></td>
				</tr>
				</table>
					<p><button name="update" type="submit" class="w3-btn w3-signal-green w3-padding w3-round-xlarge" style="width:100%; margin-bottom:10px;" >UPDATE</button></p>
				

			 
		</center>
		</form>
	</div>
</body>
</html>
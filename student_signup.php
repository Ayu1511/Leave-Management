<?php
	session_start();

if (isset($_POST['register'])) {
	require 'connect.php';
	if(!$conn){
		 echo "<script type='text/javascript'>alert('Could not connect!')</script>";
	}
	
	$fname    	=$_POST['fname'];
	$lname    	=$_POST['lname'];
	$mname    	=$_POST['mname'];
	$contact  	=$_POST['contact'];
	$address  	=$_POST['address'];
	$division   =$_POST['division'];
	$class   	=$_POST['class'];
	$rollno     =$_POST['rollno'];
	$password1	=$_POST['Password1'];
	$password2	=$_POST['Password2'];
	$mail     	=$_POST['mail'];

	if($password1 == $password2){
		$pass=$password1;
	}
	else{
		
		echo "<script type='text/javascript'>alert('Passwords does not match!')</script>";
	}
	$sql = "INSERT INTO student (lname,fname,mname,class,rollno,email,division,address,password,contact) values ('$lname','$fname','$mname','$class','$rollno','$mail','$division','$address','$pass','$contact')";

		$_SESSION['studentname'] = $_POST['fname'];
		$_SESSION['studentpassword'] = $pass;

 	if ($result=(mysqli_query($conn,$sql))) {

		header('location:student_info.php');
	}
	else{
  				die('Could not insert: ' . mysqli_error($conn));  
//		echo "<script type='text/javascript'>alert('Please try again!')</script>";

		}

}


if(isset($_POST['cc'])){
	header('location:cc_login.php');
}
if(isset($_POST['ccc'])){
	header('location:ccc_login.php');
}
?>

<html>
<head>
	<title>STUDENT SIGN_UP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">
	
</head>
<body bgcolor=" #ffffe6">

<header class="w3-conatiner w3-center w3-highway-red w3-padding" style="height: 80px; width: 100%">
	<h1><b>Welcome to the Leave Portal</b></h1>
</header>
<br>
<div class="w3-top-right" style="margin-left: 75%;">
	<form method="post">
		<button name="ccc" type="submit" class="w3-btn w3-vivid-greenish-blue  w3-padding w3-round-xlarge">Class councillor<br> Coordinator</button>
		<button name="cc" type="submit" class="w3-btn w3-vivid-greenish-blue  w3-padding w3-round-xlarge">Class Councillor</button>
	</form>
</div>

<div id="frm" class="w3-card w3-white w3-round-large w3-conatiner" style="width:400px; margin-top: 50px; margin: 20px auto; ">
	<div class="w3-highway-red  w3-round-large">
 		 <h1 class="w3-center"><b>Student Signup</h1>
	</div>
	<form class="w3-container" method="post">
		<table>
			<tr>
				<td><label><b>Last name :</b></label></td>
				<td><input type="text" name="lname" placeholder="Last Name" class="w3-input" required></td>
			</tr>
			<tr>
				<td><label><b>First name :</b></label></td>
				<td><input type="text" name="fname" placeholder="First Name" class="w3-input" required></td>
			</tr>
			<tr>
				<td><label><b>Middle name :</b></label></td>
				<td><input type="text" name="mname" placeholder="Middle Name" class="w3-input" required></td>
			</tr>
			<tr>
				<td><label><b>Class :</b></label></td>
				<td><input type="text" name="class" placeholder="Class" class="w3-input" required ></td>
			</tr>
			<tr>
				<td><label><b>Division :</b></label></td>
				<td><input type="text" name="division" placeholder="Division" class="w3-input" required ></td>
			</tr>
			<tr>
				<td><label><b>Roll no :</b></label></td>
				<td><input type="text" name="rollno" placeholder="Roll no" class="w3-input" required ></td>
			</tr>
			<tr>
				<td><label><b>Contact :</b></label></td>
				<td><input type="text" name="contact" placeholder="Contact" class="w3-input" required></td>
			</tr>
			<tr>
				<td><label><b>Address :</b></label></td>
				<td><input type="text" name="address" placeholder="Address" class="w3-input" required></td>
			</tr>
			<tr>
				<td><label><b>Email :</b></label></td>
				<td><input type="email" name="mail" placeholder="Email" class="w3-input" required></td>
			</tr>
			<tr>
				<td><label><b>Password :</b></label></td>
				<td><input type="password" name="Password1" placeholder="Password" class="w3-input" required></td>
			</tr>
			<tr>
				<td><label><b>Confirm Password :</b></label></td>
				<td><input type="password" name="Password2" placeholder="Re-Enter Password" class="w3-input" required></td>
			</tr>

			</table>
			<p>
  				<div class="w3-text-red w3-right w3-hover-text-blue"><a href="index.php">Already Registered?</a></div><br>
  			<p>
  			<button class="w3-btn w3-signal-green w3-round-xlarge " style="width:100%; margin-bottom 10px;" name="register" type="submit">Register</button></p>
		</form>
	</div>
</body>
</html>
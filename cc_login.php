<?php
	session_start();
	require 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>CLASS COUNCILLOR LOGIN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">

</head>
<body bgcolor=" #ffffe6">

<?php
if (isset($_POST['login'])) {

	$fname = $_POST['fname'];
	$pass = $_POST['password'];
	if($conn){
		$sql = "SELECT * from cc where fname = '$fname' and password = '$pass'"; 

		if($result=(mysqli_query($conn,$sql))){
			if (mysqli_num_rows($result) > 0) {
				$_SESSION['ccname'] = $_POST['fname'];
				$_SESSION['ccpassword'] = $_POST['password'];

				header('location:cc_info.php');
			}
			else{
				echo "<script type='text/javascript'>alert('Enter valid name and password')</script>";
				
			}
		}
		else{
				echo "<script type='text/javascript'>alert('Could not connect!')</script>";
		}
	} 
}

if(isset($_POST['Student'])){
	header('location:index.php');
}
if(isset($_POST['Class Councillor Coordinator'])){
	header('location:ccc_login.php');
}

?>

<header class="w3-conatiner w3-center w3-highway-red w3-padding" style="height: 80px; width: 100%">
	<h1><b>Welcome to the Class Councillor Portal</b></h1>
</header>
<br>
<div class="w3-top-right" style="margin-left: 80%;">
	<form method="post">
		<button name="Student" type="submit" class="w3-btn w3-vivid-greenish-blue  w3-padding w3-round-xlarge">Student</button>
		<button name="Class Councillor Cooridinator" type="submit" class="w3-btn w3-vivid-greenish-blue  w3-padding w3-round-xlarge">Class Councillor <br> Cooridinator</button>
	</form>
</div>

<div id="frm" class="w3-card w3-white w3-round-large w3-conatiner" style="width: 500px; margin-top: 80px; margin: 100px auto;">
	<div class="w3-highway-red  w3-round-large">
 		 <h1 class="w3-center"><b>Class Councillor Login</h1>
	</div>
	<form class="w3-container" method="post">
  		<p>
  			<label>First Name</label>
  			<input class="w3-input" type="text" name="fname" placeholder="Enter Name" required></p>
  		<p>
  			<label>Password</label>
  			<input class="w3-input" type="password" name="password" placeholder="Enter Password" required></b></p>
  		<p>
  			<div class="w3-text-red w3-left w3-hover-text-blue"><a href="cc_signup.php"><b>Not Yet Registered?</b></a></div>
  			<br>
  		<p>
  		<button class="w3-btn w3-signal-green w3-round-xlarge " style="width:100%; margin-bottom 10px;" name="login" type="submit">Login</button></p>
	</form>
</div>
</body>
</html>
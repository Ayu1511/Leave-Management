<?php

session_start();
if (!isset($_SESSION['ccname'])) {
	header('location:cc_login.php');
}
require 'connect.php';

if(isset($_SESSION)){
	session_unset();
}

if(isset($_POST['login'])){
	header('location:cc_login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Logout</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">

</head>
<header class="w3-conatiner w3-center w3-highway-red w3-padding" style="height: 80px; width: 100%">
	<h1><b><center>Welcome to Leave Portal</center></b></h1>
</header>
<body bgcolor=" #ffffe6">
<center>
<h2>
<script type='text/javascript'>alert('Successfully logged out!')
</script>
<div id="frm" class="w3-card w3-white w3-round-large w3-conatiner" style="width:400px; margin-top: 100px; margin: 20px auto;">
	<form method="post">
		<table>
			<tr><td align="center"><h3><b>To Login again</b></h3></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td><center><button name="login" type="submit" class="w3-btn w3-signal-green  w3-padding w3-round-xlarge" style="width:100%">Click Here</button></center</td></tr>
		</table>
	</form>
	
</div>
</h2>
</center>
</body>
</html>
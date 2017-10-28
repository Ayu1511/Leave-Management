<?php
	session_start();
	if(!isset($_SESSION['studentname']) || !isset($_SESSION['studentpassword']) || !isset($_SESSION['lname']) || !isset($_SESSION['mname'])){
		header('location:index.php');
	}
	require 'connect.php';
	if(!$conn)
			{  
		  		echo "<script type='text/javascript'>alert('Could not connect!')</script>";
			}  
			
			$fname = $_SESSION['studentname'] ;
			$mname = $_SESSION['mname'];
			$lname = $_SESSION['lname'];

			

if(isset($_POST['back'])){

 	 header('location:student_info.php');
 }

if(isset($_POST['logout'])){

 	 header('location:student_logout.php');
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Check Status</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){  
    $("div#status").hover(function(){  
        $('#myimage').width(300); // Units are assumed to be pixels
        $('#myimage').height(300);
        $(this).css("font-size","35px");
        }, function(){  
        $('#myimage').width(255); // Units are assumed to be pixels
        $('#myimage').height(255);
        $(this).css("font-size","15px");
    });  
});  
</script>
	
</head>
<body bgcolor=" #ffffe6">

	<header class="w3-conatiner w3-center w3-highway-red w3-padding" style="height: 80px; width: 100%">
		<h1><b>Welcome to the Leave Portal</b></h1>
	</header>
	<br>
	<div class="w3-top-right" style="margin-left: 85%;">
		<form method="post">
			<button name="back" type="submit" class="w3-btn w3-vivid-greenish-blue  w3-padding w3-round-xlarge">Back</button>
			<button name="logout" type="submit" class="w3-btn w3-vivid-greenish-blue  w3-padding w3-round-xlarge">Logout</button>
		</form>
	</div>

	<?php
	$sql = "SELECT status from application where stfname='$fname' and stmname='$mname' and stlname='$lname'";

			if($result=(mysqli_query($conn,$sql)))
			{ 
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
						$status    	=$row["status"];
					}
				}
			}	

			if($status=="Waiting for Response"){
				echo "<html><body><div id='status' align='center'><img id='myimage' src='waiting.jpg'><br><b>Waiting for the Response</b></div>";
			}

			else if ($status=="Granted") {
				echo "<html><body><div id='status' align='center'><img id='myimage' src='granted.jpg'>";
  				echo "<br><br><b>Leave Granted</b></div>	";
			}
			else{
				echo "<html><body><div id='status' align='center'><img id='myimage' src='notGrant.png'>";
   				echo "<br><b>Leave Not Granted</b>";
   				echo "<br><b>Contact your class councillor for more information</b></div>";
			}
	?>

</body>
</html>
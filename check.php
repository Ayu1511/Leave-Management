<?php
	session_start();
	if(!isset($_SESSION['ccname']) || !isset($_SESSION['ccpassword']) || !isset($_SESSION['lname']) || !isset($_SESSION['mname'])){
		header('location:cc_login.php');
	}
	require 'connect.php';
	if(!$conn)
			{  
		  		echo "<script type='text/javascript'>alert('Could not connect!')</script>";
			}  
			
			$fname = $_SESSION['ccname'] ;
			$mname = $_SESSION['mname'];
			$lname = $_SESSION['lname'];

			

if(isset($_POST['back'])){

 	 header('location:cc_info.php');
 }

if(isset($_POST['logout'])){

 	 header('location:cc_logout.php');
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Check Status</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">
	
</head>
<body>

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
	<br>
	<table class="w3-table w3-bordered w3-striped w3-hoverable w3-border w3-centered">
		<tr bgcolor="#609cff">
		<th><b>Student's Name</b></th>
		<th><b>Type of Leave</b></th>
		<th><b>No.of days</b></th>
		<th><b>Start Date</b></th>
		<th><b>Document</b></th>
		<th><b>Status</b></th>
	</tr>

	<?php
	$sql = "SELECT a.id,a.stfname,a.stmname,a.stlname,a.type,a.days,a.startDate,a.file,a.status from application a, cc c where a.trfname=c.fname and a.trmname=c.mname and a.trlname=c.lname";

			if($result=(mysqli_query($conn,$sql)))
			{ 
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
	?>
					<tr bgcolor="#d5e0f2">
					<td><?php echo $row['stfname'] ;?>&nbsp;<?php  echo $row['stmname'];?>&nbsp;<?php  echo $row['stlname'];?></td>
					<td><?php echo $row['type']; ?></td>
					<td><?php echo $row['days'];?></td>
					<td><?php echo $row['startDate'];?></td>
					<td><a href="images/<?php echo $row['file']; ?>" download="<?php echo $row['file'] ?>" download><?php echo $row['file']; ?></a></td>
					<td><form method="post">
						<select name="sta" style="background-color: transparent; border-radius: 4px; border: 0px; border-bottom: 1px solid black;">
							<option selected disabled><?php echo $row['status']; ?></option>
							<option>Waiting for Response</option>
							<option>Granted</option>
							<option>Not Granted</option>
						</select>&nbsp;&nbsp;
						<?php $id= $row['id'];?>
						<input class="w3-btn w3-round-xxlarge w3-teal" type="submit" name="<?php echo $id ?>" value="Go">
					</form>
					<?php
						if(isset($_POST[$id])){
						$status=$_POST['sta'];
						$sqli = "UPDATE application set status='$status' where id='$id'";
						if($res=mysqli_query($conn,$sqli)){
							echo "<script type=text/javascript>alert('Click OK to confirm the changes')</script>";
						}
						header('location:check.php');
					?>
					</td>
<?php
						
						}
					}
				}
			}	
	?>

</body>
</html>
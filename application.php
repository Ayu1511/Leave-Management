<?php
	session_start();

	//Check if the session is set
	if(!isset($_SESSION['studentname']) || !isset($_SESSION['studentpassword'])){
		header('location:index.php');
	}
	require 'connect.php';

	//Check the connection
	if(!$conn)
	{  
		  echo "<script type='text/javascript'>alert('Could not connect!')</script>";
	} 

	//Set the name and password for retrieval
	$fname = $_SESSION['studentname'] ;
	$pass = $_SESSION['studentpassword'];

	//Retrieval of the information
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
				$division   =$row["division"];
				$class   	=$row["class"];
				$rollno     =$row["rollno"];
				$mail     	=$row["email"];
			}
		}	
	}

	//Set the session variables 
	$_SESSION['lname']=$lname;
	$_SESSION['mname']=$mname;

	//Retrieve the CC information where class and divison are same
	$sql = "SELECT * FROM cc WHERE division = '$division' and class='$class'";
	if($result=(mysqli_query($conn,$sql)))
	{ 
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_array($result))
			{
				$trfname    	=$row["fname"];
				$trlname    	=$row["lname"];
				$trmname    	=$row["mname"];
			}
		}	
	}
	
	if(isset($_POST['status'])){
	header('location:status.php');
	}
	if(isset($_POST['back'])){
		header('location:student_info.php');
	}
				
?>


<!DOCTYPE html>
<html>
<head>
	<title>Application Form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">
</head>

<body bgcolor=" #ffffe6">

	<header class="w3-conatiner w3-center w3-highway-red w3-padding" style="height: 80px; width: 100%">
		<h1><b>Welcome to the Leave Portal</b></h1>
	</header>

	<br>

	<div class="w3-top-right" style="margin-left: 85%;">
		<form method="post">
			<button name="back" type="submit" class="w3-btn w3-vivid-greenish-blue  w3-padding w3-round-xlarge">Back</button>
			<button name="status" type="submit" class="w3-btn w3-vivid-greenish-blue  w3-padding w3-round-xlarge">Status</button>
		</form>
	</div>

	<div id="frm" class="w3-card w3-white w3-round-large w3-conatiner w3-padding" style="width: 800px; margin-top: 50px; margin: 50px auto;">
		<div class="w3-highway-red  w3-round-large">
 		 	<h1 class="w3-center"><b>Application Form</h1>
		</div>
		<form method="post" enctype="multipart/form-data" class="w3-conatiner">
			
			<p>
				<?php echo "I <i>$fname $mname $lname</i> from <i>$class $division</i> Roll no.<i>$rollno</i> is submitting this application to apply for leave." ?>
			</p>

			<p>
				<b>Type of Leave:</b> &nbsp;&nbsp;
				<input type="radio" name="type" value="sports" required>SPORTS &nbsp;
				<input type="radio" name="type" value="medical" required>MEDICAL &nbsp;
				<input type="radio" name="type" value="personal" required>PERSONAL &nbsp;
				<input type="radio" name="type" value="personal" required>COMMITTEE &nbsp;
				<input type="radio" name="type" value="personal" required>GRE &nbsp;
			</p>

			<p>
				From: 
				<input type="date" name="start_date" required> &nbsp;&nbsp;&nbsp;
				No. of days:
				<select name="days" required>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>
				</select>
			</p>

			<p>
				Documents(Scanned copies) to be attached : 
				<input type="file" name="image" />
			</p>

			<p class="w3-text-red"><small>*The image must be of type .png or .jpg and size less than 2MB</small></p>

         	<input class="w3-btn w3-signal-green w3-padding w3-round-xlarge" style="width:100%; margin-bottom:10px;" type="submit" name="submit" value="Submit Application" />
		</form>
	</div>
</body>
</html>



<?php
//Checks if the submit is clicked
if(isset($_POST['submit']))
{
 	if(isset($_FILES['image']))
 	{
 		//Get the file attributes
		$errors= array();
	    $file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
		 
		//allowed extension array     
		$extensions= array("image/jpeg","image/jpg","image/png");
		 
		//checking the allowed extensions    
		if(in_array($file_type,$extensions)=== false){
		    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}
		
		//Checking the allowed file size      
		if($file_size > 2097152){
		    $errors[]='File size must be exactely 2 MB';
		}
		 
		//no errors then upload the file to the destination     
		if(empty($errors)==true){
		    move_uploaded_file($file_tmp,"images/".$file_name);
		}
		else
		{
		    print_r($errors);
			echo "<script type='text/javascript'>alert('Could not insert! Please try again')</script>";
			exit();
		}

		//Get the variables to be inserted in the database
		$type=$_POST['type'];
		$days=$_POST['days'];
		$start_date=$_POST['start_date'];
		   $name=$file_name;
		$sql = "INSERT INTO application (stfname,stmname,stlname,class,division,trfname,trmname,trlname,type,days,startDate,file,status) VALUES ('$fname','$mname','$lname','$class','$division','$trfname','$trmname','$trlname','$type','$days','$start_date','$name','Waiting for Response')";

		//Check for query
		$result=(mysqli_query($conn,$sql));
		if ($result) 
		{
		 	echo "<script type='text/javascript'>alert('Application submitted successfully')</script>";
		}
		else{
			echo "Go to hell nahi jaari teri application";
		}
				
	}
	else
	{
	    print_r($errors);
	    echo "<script type='text/javascript'>alert('Could not insert! Please try again')</script>";
	}
}
?>

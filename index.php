<?php 
	session_start();

	if(isset($_SESSION['user_id'])) {
		header("location: Yourprofile.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">
	<style>
		* {
			font-family: 'Work Sans', sans-serif;
		}
		body {
		    background-color: #fafafa;
		    background-image: url("https://i.pinimg.com/originals/ba/5e/2a/ba5e2a348e3d45ae404313bce8185290.jpg");
			
			background-size: cover;
			font-family: 'Work Sans', sans-serif;

					
		}
		.card {
			 background-color: #fff;
   			 border: 1px solid #e6e6e6;
   			 border-radius: 1px;
   			 margin: 0 0 10px;
   			 padding: 10px 0;
			margin-left: 35%;
			margin-top: 7%;
			margin-bottom: 7%;
			border-radius: 4px;
			background: #fff;
			justify-content: center;
			width: 25%;
		

		}
		.card > .card-body {
			padding: 8em 4em 4em 4em;
		}

		.card > .card-body > h1 {
			margin-top: -3em;
			margin-bottom: -0em;
			text-transform: uppercase;
		}

		label {
			display: block;
			color: #fff;
		}

		.input {
			width: 75%;
			margin: 0.5em 0;
			padding: 1em ;
			border: 1px solid #b5b5b5;
			outline: none;
			color: #333333;
			border-radius: 4px;
			background: #fafafa;
			position: center;
 			
		}
		.btn {
			outline: none;
			border: 0;
			padding: 1em 1em;
			color: #fff;
			border-radius: 4px;
			width: 100%;
			
			    background: #3897f0;
   			    border-color: #3897f0;
    			
		}
		.date
		{
			padding: 1em 5em 1em 2em;
		}
		.error {
			padding: 1em 1em;
			color: #988e8e;}
		sup{
			font-size: 12px;
		}
	
		.tlang{
	 color: #999;
    font-size: 12px;
    height: 36px;
    left: 8px;
    line-height: 36px;
    overflow: hidden;
    pointer-events: none;
    
    right: 0;
    text-overflow: ellipsis;
    
    transform-origin: left;
    
      
    
    user-select: none;
    white-space: nowrap;
		}

		.h1s{
	font-style: lavanga;
	    margin: 24px auto 12px;
    background-repeat: no-repeat;
    background-position: -98px -264px;
    height: 51px;
    width: 175px;
    margin-left: 18%;
	
		}
	</style>

</head> 	
<body>



	<div class="card">
		<div class="card-body">
			<h1>&nbsp<img src = "http://i0.kym-cdn.com/entries/icons/original/000/010/944/instagram.jpg"style="width:250px;height:180px;" class = "center">
</h1>
			
			<form action ="<?= $_SERVER['PHP_SELF'] ?>" method="post">
				<!--<div class="error"> <?= $_SESSION['required'] ?></div> -->

				
				
				<div class="form-group" ><label for="MNE" class="tlang">Mobile Number or Email</label><input type="text" class="input" id="MNE" name="MNE" autocomplete="tel" placeholder="" required/> 
				</div>
				<div class="form-group"><label for="FN" class="tlang">Full Name</label><input type="text" class="input" name="fname" autocomplete="tel" id="FN" placeholder="" required/ ></div>
				<div class="form-group"><label for="UN" class="tlang">username</label><input type="text" class="input" name="Uname" autocomplete="tel" id="UN" placeholder="" required/ ></div>
				<div class="form-group"><label for="PA" class="tlang">Password</label><input type="password" class="input" name="Pass" autocomplete="tel" id="PA" placeholder="" required/ ></div>
				
				



				<div class="form-group"><button class="btn" name="sbmit"  type="submit"> Sign up</button ></div>
				
				</form>
				<br>
				<div class="form-group"><a href = "Signin.php"><button class="btn" name="sbmit"  type="submit"> Sign in</button ></div>
			


<?php

require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' ){


	// For Declaration purpose only
	$MNE=$_REQUEST['MNE'];
	$fname=$_REQUEST['fname'];
	$Uname = $_REQUEST['Uname'];
	$Pass = md5($_REQUEST["Pass"]);

	$sql = "SELECT * FROM grams WHERE Uname='$Uname'";
	$result = $conn->query($sql);
	if ( $result === FALSE) {
		echo 'Error: ' . $sql . '<br>' . $conn->connect_error;
	} else {
		if ($result->num_rows > 0 ) 
			echo "Username is taken";
		else {
			$sql = "INSERT INTO grams (MNE,fname, Uname, Pass, active) VALUES ('$MNE','$fname', '$Uname', '$Pass', 1)";
			if ($conn->query($sql) == TRUE) {
		    	echo "New record created successfully";

		    	header("location: Signup.php");
			}
			else 
			    echo "Error: " . $sql . "<br>" . $conn->error;

			$conn->close();
		}
	}
}


?> 


	
</body>
</html>
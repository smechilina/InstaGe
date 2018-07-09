<?php
	require 'db_config.php';
	
    
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location: Signin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<title>edit</title>
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">
	<style>
		* {
			font-family: 'Work Sans', sans-serif;
		}
		body {
		    background-color: #fafafa;
			background-image: url("https://d1qhuz9ahqnrhh.cloudfront.net/wp-content/uploads/2016/05/instagram_gradient_wallpaper_by_jasonzigrino-da28exh.png");
			background-size: cover;
			font-family: 'Work Sans', sans-serif;

		/*  */
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
			width: 22%;
		

		}
		.card > .card-body {
			padding: 1em 2em 3em 2em;
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
    margin-left: 40%;
    margin-top: : 10em;
	
		}
		.pimage{
			padding: 0.1em 0.1em 0.0001em 1em;

		}

	</style>

</head> 	
<body>

      <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="yourprofile.php">  <img src = "https://blog.inkjetwholesale.com.au/wp-content/uploads/2017/09/instagram-challenges.png" style="width:250px;height:40px;"></a>
    </div>
    <ul class="nav navbar-nav">
    	<li><a href="feed.php">Feed</a></li>
      <li class="active"><a href="edit.php">Edit</a></li>
      <li><a href="logout.php">Sign out</a></li>
      
    </ul>
  </div>
</nav>
	


	<div class="card">
		<div class="card-body">
			
			
			<form action ="edit.php" method="post" enctype="multipart/form-data">


				<?php

					$user_id = $_SESSION['user_id'];

				    $sql = "SELECT * FROM grams WHERE user_id='$user_id'";
				    $result = $conn->query($sql);

				    if($result === FALSE) {
				    	echo "Error: " . $sql . "<br>" . $conn->connect_error;
				    } else {
				    	if ($result->num_rows > 0) {
				    		$rws = $result->fetch_assoc();
				    	}
				    }
				  
				   
				?>

				
				<h1 class="h1s"> PROFILE EDIT</h1>
				<div class= "pimage">	<img src="<?php echo $rws['Pimage'];?>" width= "100"> </div>
				<div class="form-group" ><label>File: </label><input type="file" name="image" /> </div>
				
				<div class="form-group" ><label for="MNE" class="tlang">Mobile Number or Email</label><input type="text" class="input" id="MNE" name="MNE" autocomplete="tel" placeholder="" value="<?php echo $rws['MNE'];?>"required/> 
				</div>
				<div class="form-group"><label for="FN" class="tlang">Full Name</label><input type="text" class="input" name="fname" autocomplete="tel" id="FN" placeholder="" value="<?php echo $rws['fname'];?>"required/ ></div>
				<div class="form-group"><label for="UN" class="tlang">username</label><input type="text" class="input" name="Uname" autocomplete="tel" id="UN" placeholder="" value="<?php echo $rws['Uname'];?>"required/ ></div>
				<div class="form-group"><label for="PA" class="tlang">Password</label><input type="password" class="input" name="Pass" autocomplete="tel" id="PA" placeholder= "Password"  value="" required/ ></div>
				<div class="form-group" ><input type="checkbox" name="check" 
						<?php if($rws['active'] == 1) {
								echo "checked";
							} 
						?>
					> private<br></div>
				
				

   

				<div class="form-group"><button class="btn" name="sbmit"  type="submit"> Edit</button ></div>
			


			<?php 

				if($_SERVER['REQUEST_METHOD'] == 'POST') {
					$fname = $_REQUEST['fname'];
					$uname = $_REQUEST['Uname'];
					$mne = $_REQUEST['MNE'];
					$checked = isset($_REQUEST['check'])? 1:0;

					if($_FILES['image']['name'] != '') {
						$file_path = 'images/' .  basename($_FILES['image']['name']);
						move_uploaded_file($_FILES['image']['tmp_name'], $file_path);
						$sql = "UPDATE grams SET fname='$fname', Uname='$uname', MNE='$mne', Pimage = '$file_path', active = '$checked' WHERE user_id = '$user_id'";
					} else {
						$sql = "UPDATE grams SET fname='$fname', Uname='$uname', MNE='$mne', active = '$checked' WHERE user_id = '$user_id'";
					}

					if($conn->query($sql) === TRUE) {
						echo "Profile Updated";

						$_SESSION['MNE'] = $mne;
						$_SESSION['fname'] = $fname;
						$_SESSION['Uname'] = $uname;
								
					}
					else 
						echo "Error: " . $sql . "<br>" . $conn->connect_error;
					
				}


			?>

	
</body>
</html>




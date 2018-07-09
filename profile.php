
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">
  <style>
    * {
      font-family: 'Work Sans', sans-serif;
    }
    body {
        background-color: #fafafa;
      
      background-size: cover;
      font-family: 'Work Sans', sans-serif;

          
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
 
    .error {
      padding: 1em 1em;
      color: #988e8e;}
    sup{
      font-size: 12px;
    }
  
  
  </style>

</head>   
<body>



  <div class="card">
    <div class="card-body">
      <h1 class="h1s">INSTAGRAM</h1>
      
      <form action ="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <!--<div class="error"> <?= $_SESSION['required'] ?></div> -->

        
        
        <div class="form-group" ><label for="MNE" class="tlang">Mobile Number or Email</label><input type="text" class="input" id="MNE" name="MNE" autocomplete="tel" placeholder="" required/> 
        </div>
        <div class="form-group"><label for="FN" class="tlang">Full Name</label><input type="text" class="input" name="fname" autocomplete="tel" id="FN" placeholder="" required/ ></div>
        <div class="form-group"><label for="UN" class="tlang">username</label><input type="text" class="input" name="Uname" autocomplete="tel" id="UN" placeholder="" required/ ></div>
        <div class="form-group"><label for="PA" class="tlang">Password</label><input type="password" class="input" name="Pass" autocomplete="tel" id="PA" placeholder="" required/ ></div>
        
        



        <div class="form-group"><button class="btn" name="sbmit"  type="submit"> Sign up</button ></div>
      


<?php





if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
  $db = new mysqli('localhost', 'root', '', 'Insta');
  if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
  } 

  // For Declaration purpose only
  $MNE=$_REQUEST['MNE'];
  $fname=$_REQUEST['fname'];
  $Uname = $_REQUEST['Uname'];
  $Pass = md5($_REQUEST["Pass"]);
  
  
  
  

  $sqls= "SELECT * FROM grams WHERE Uname='$Uname'";
  $result=mysqli_query($db,$sqls);


  if(mysqli_num_rows($result)>0)
  {
    echo "Username is taken";

  }


else{

  $sql = "INSERT INTO grams (MNE,fname, Uname, Pass) VALUES ('$MNE','$fname', '$Uname', '$Pass')";

  if ($db->query($sql) == TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $db->error;
  }


  $db->close();

}
}


?> 


  
</body>
</html>
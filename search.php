<?php
	require 'db_config.php';
        
  session_start();
  if(!isset($_SESSION['user_id'])){
      header("location: Signin.php");
  }  
?>

<html>
<body>

<form action="search.php" method="get">

  <input name="search" type="search" autofocus>
  <button>Submit</button>

</form>

<table>

<?php


if($_SERVER['REQUEST_METHOD'] == 'GET'){    //trigger button click

  $search=$_REQUEST['search'];
  $sql ="SELECT * from grams where Uname like '%".$search."%'";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    if($row['user_id'] != $_SESSION['user_id']){
          $image = $row['Pimage'];
          echo "<tr><td><a href='sample.php?user=".$row['user_id']."'> <img src='$image' style='border-radius: 50%;' width='64px' height='64px'>".$row['Uname'] ."</a></tr></td>";
    }
  }
}
else{
    echo "No User Found<br><br>";
  }

}


?>
</body>
</html>
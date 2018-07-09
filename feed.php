<?php
  require 'db_config.php';
        
  session_start();
  if(!isset($_SESSION['user_id'])){
      header("location: Signin.php");
  }

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $image_text = $conn->real_escape_string($_POST['image_text']);

    // image file directory
    $target = "images/".basename($image);

    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO images (image, image_text, user_id) VALUES ('$image', '$image_text', '$user_id')";
    // execute query
    if($conn->query($sql) === TRUE) {
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }
    } else {
      echo "Error: " . $sql . "<br>" . $conn->connect_error;
    }

  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Image Upload
<meta charset="utf-8">
  
</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
   #content{
    width: 50%;
    margin: 20px auto;
    border: 1px solid #cbcbcb;
   }
   form{
    width: 50%;
    margin: 20px auto;
   }
   form div{
    margin-top: 5px;
   }
   #img_div{
    width: 80%;
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #cbcbcb;
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    margin: 5px;
    width: 300px;
    height: 140px;
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
    <div class="topnav">
  <div class="search-container">
    <form action="search.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
  </div>
</nav>
<div id="content">
  <?php
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM images INNER JOIN grams ON images.user_id = grams.user_id WHERE grams.active = 0 OR images.user_id = '$user_id' ORDER BY id DESC";

    $result = $conn->query($sql);

    if($result === FALSE ) {
      echo "Error: " . $sql . "<br>" . $conn->connect_error;
    } else {
      while ( $row = $result->fetch_assoc() ) {
        echo "<div id='img_div'>";
        echo "<img src='images/".$row['image']."' >";
        echo "<p>".$row['image_text']."</p>";
        echo "<p>".  $row['fname'] . "</p>";
        echo "</div>";
      }  
    }

    
  ?>
  <form method="POST" action="feed.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file" name="image">
    </div>
    <div>
      <textarea 
        id="text" 
        cols="40" 
        rows="4" 
        name="image_text" 
        placeholder="Say something about this image..."></textarea>
    </div>
    <div>
      <button type="submit" name="upload">POST</button>
    </div>
  </form>
</div>
</body>
</html>